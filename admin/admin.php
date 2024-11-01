<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class newsletter_subscription_admin{

	var $options;

	function __construct() {
	
		
	$this->slug = 'newsletter_subscription';	
	$this->subslug = 'newsletter_subscription';
	add_action('admin_enqueue_scripts', array(&$this, 'load_js_css'), 9);
	add_action('admin_init', array(&$this, 'admin_init'), 9);
	add_action('admin_menu', array(&$this, 'add_menu'), 9);
 }


function admin_init() {
	
		$this->tabs = array(
			'options' => __('Setting','wns'),
			 'form' => __('Form','wns'),
			 //'social' => __('Social Integration','wns'),	
			 'subscribe' => __('Subscribe from CSV','wns'),
			 'design' => __('Design','wns'),
			'integration' => __('Integration','wns'),	
			
		);
		$this->default_tab = 'options';
		
		
	}
	

	function load_js_css()
	{
		if ($_GET['page'] == "newsletter_subscription" )
		
		{	
			wp_enqueue_script('wns_boostrapjs', wns_url.'admin/js/bootstrap.min.js');
			wp_register_style('wns_boostrap', wns_url.'admin/css/bootstrap.min.css');
			wp_enqueue_style('wns_boostrap');
		}
	}
function add_menu() {
			
		$menu_label = __('WP Newsletter Subscription','wns');
		
		
		add_menu_page( __('WP Newsletter Subscription','wns'), $menu_label, 'manage_options', $this->slug, array(&$this, 'admin_page'), wns_url .'admin/img/newsletter.png', '19');
	}


function admin_tabs( $current = null ) {
			$tabs = $this->tabs;
			$links = array();
			if ( isset ( $_GET['tab'] ) ) {
				$current = $_GET['tab'];
			} else {
				$current = $this->default_tab;
			}
			foreach( $tabs as $tab => $name ) :
				if ( $tab == $current ) :
					$links[] = "<a class='nav-tab nav-tab-active' href='?page=".$this->subslug."&tab=$tab'>$name</a>";
				else :
					$links[] = "<a class='nav-tab' href='?page=".$this->subslug."&tab=$tab'>$name</a>";
				endif;
			endforeach;
			foreach ( $links as $link )
				echo $link;
	}

	function get_tab_content() {
		$screen = get_current_screen();
		if( strstr($screen->id, $this->subslug ) ) {
			if ( isset ( $_GET['tab'] ) ) {
				$tab = $_GET['tab'];
			} else {
				$tab = $this->default_tab;
			}
			require_once wns_path.'admin/panels/'.$tab.'.php';
		}
	}
	function import_users_to_mailchimp()
	{
		
		$filetype=array('text/csv','application/csv','application/excel','application/vnd.ms-excel','application/vnd.msexcel','text/anytext');
		if(	isset(	$_FILES['import_users_mailchimp']['tmp_name'] ) ){
		
			$filename = $_FILES['import_users_mailchimp']['tmp_name'];
			if (!in_array($_FILES['import_users_mailchimp']['type'], $filetype))
			{
				echo '<div class="error fade"><p><strong>'.__('Invalid file uploaded . Please upload file in csv format','userpro').'</strong></p></div>';
			}
			else{	
			
			$this->process_mailchimp( $filename );
			echo '<div class="updated fade"><p><strong>'.__('Users d successfully','userpro').'</strong></p></div>';
			}
		}


	}
function process_mailchimp( $filename)
{
	$list_id=esc_attr($_POST['mailchimp_lists']);

	global $userpro;
		$errors = array();
		
		$file_handle = fopen( $filename , 'r');
		$first_column = true;
		while($line = fgetcsv($file_handle)){
				if( empty( $line ) ){
			if( $first_column )
					break;
				else 
					continue;
				}
				if( $first_column ){
					$headers = $line;
					$first_column = false;
					continue;
				}
			foreach( $line as $key => $column_value ){
                            
				
				

				if($key=="2")
				$email=$column_value;
				
				if($key=="1")
				$fname=$column_value;
		

		$objMailChimp = new UserProMailChimp( userpro_get_option('mailchimp_api') );
		$objMailChimp->call('lists/subscribe', array(
                'id'                => $list_id,
                'email'             => array('email'=> $email),
                'merge_vars'        => array('FNAME'=> $fname),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
		));
		}
			
			}
		

}
	function save() {
		

		
		/* other post fields */
		$newsletter_subscription_options = get_option('newsletter_subscription');
		if(!isset($_POST['lnamecheck']))
		{
			update_option("lname",'0');
		}
		else
		{
			update_option("lname",'1');
		}
		if(!isset($_POST['fnamecheck']))
		{
			update_option("fname",'0');
		}
		else
		{
			update_option("fname",'1');
		}
		foreach($_POST as $key => $value) {
		
			if ($key != 'submit') {
				if (!is_array($_POST[$key])) {
					$newsletter_subscription_options[$key] = esc_attr($_POST[$key]);
				} else {
					$newsletter_subscription_options[$key] = $_POST[$key];
				}
				
			}
		}
		
		update_option('newsletter_subscription',$newsletter_subscription_options);
		echo '<div class="updated"><p><strong>'.__('Settings saved.','ultimate_contact').'</strong></p></div>';
	}

	function reset() {
		update_option('newsletter_subscription', newsletter_subscription_default_options() );
		$this->options = array_merge( $this->options,newsletter_subscription_default_options() );
		echo '<div class="updated"><p><strong>'.__('Settings are reset to default.','wns').'</strong></p></div>';
	}
	
	

	function admin_page() {

		if (isset($_POST['submit'])) {

			
			$this->save();
			
		}
		if (isset($_POST['import_users_to_mailchimp'])){
			$this->import_users_to_mailchimp();
		}
		if (isset($_POST['reset-options'])) {
			$this->reset();
		}
		
		
	?>
	
		<div class="wrap <?php echo $this->slug; ?>-admin">
			
			
			
			<h2 class="nav-tab-wrapper"><?php $this->admin_tabs(); ?></h2>

			<div class="<?php echo $this->slug; ?>-admin-contain">
				
				<?php $this->get_tab_content(); ?>
				
				<div class="clear"></div>
				
			</div>
			
		</div>

	<?php }

        /* add the messagin fields to admin panel*/	

}
$newsletter_subscription_admin=new  newsletter_subscription_admin();
