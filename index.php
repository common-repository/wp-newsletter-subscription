<?php
/*
Plugin Name: WP Newsletter Subscription
Plugin URI:
Description: Plugin which allows Subscribe their email to the MailChimp subscription list
Version: 1.1
Author:wpdev33
Author URI: 
*/
if(!defined('ABSPATH')) {exit;}
if( !class_exists('Newsletter_Subscription') ){

class Newsletter_Subscription {

function __construct(){
	
			$this->define_constants();
			$this->includes_file();
			add_action('wp_head', array(&$this, 'wns_ajaxurl'), 9);
			add_action('wp_enqueue_scripts', array(&$this, 'loadstyle'), 9);
	}


function includes_file(){

		if (!class_exists('MNSMailChimp')){
			require_once wns_path . '/lib/mailchimp/MailChimp.php';
		}

			
		if (is_admin()){
			
			foreach (glob(wns_path . 'admin/*.php') as $filename) { include $filename; }
		}
		
		foreach (glob(wns_path . 'functions/*.php') as $filename) { require_once $filename; }

		require_once wns_path .'/css/style.php';
	}
function wns_ajaxurl() {
		?>
	<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
	<?php
	}

function loadstyle()
{			
			wp_enqueue_script('jquery');	
			wp_register_style('wns_style', wns_url.'css/style.css');
			wp_enqueue_style('wns_style');
			wp_enqueue_script('wns_scripts', wns_url.'js/scripts.js');
}
function define_constants()
{

	define('wns_url',plugin_dir_url(__FILE__ ));
	define('wns_path',plugin_dir_path(__FILE__ ));


}
}
new Newsletter_Subscription();
}
?>
