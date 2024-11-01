<?php 
if(!class_exists("wns__integration_hooks")):
class wns__integration_hooks{

	function __construct()
	{	
		if(newsletter_subscription_get_option('wns_comment')=='1')
		add_action( 'comment_form_after_fields', array( $this, 'wns__newsletter_checkbox' ), 90 );
		if(newsletter_subscription_get_option('wns_wpregiter')=='1')
     		add_action('register_form',array( $this, 'wns__newsletter_checkbox' ),10,1);
		add_action( 'user_register', array( $this, 'subscribe_from_wp_registration' ), 90, 1 );
		add_action( 'comment_post', array( $this, 'wns__subscribe_from_comment' ), 40, 2 );
		if(newsletter_subscription_get_option('wns_woocommerce')=='1')
		{
		add_action('woocommerce_register_form',array( $this, 'wns__newsletter_checkbox' ));
                add_action( 'woocommerce_after_order_notes', array( $this, 'wns__newsletter_checkbox' ) );
		add_action( 'woocommerce_checkout_billing', array( $this, 'wns__newsletter_checkbox' ), 20 );
		}
		add_action( 'woocommerce_checkout_order_processed', array( $this, 'wns__subscribe_from_woocommerce_checkout' ) );
		add_action( 'woocommerce_checkout_update_order_meta', array( $this, 'wns__save_woocommerce_checkout_checkbox_value' ) );
		if(newsletter_subscription_get_option('wns_buddypress')=='1')
		add_action( 'bp_before_registration_submit_buttons', array( $this, 'wns__newsletter_checkbox' ), 20 );
		add_action( 'bp_core_signup_user', array( $this, 'wns__subscribe_from_registration' ), 10, 1 );
		
		
		
	}

 function subscribe_from_wp_registration( $user_id )
{   
        
	if(isset($_POST['newsletter_enabled']) && $_POST['newsletter_enabled'] == '1')
	{  
		$user = get_userdata(  $user_id  );
				$fname=$user->user_firstname;
				$lname=$user->user_lastname;
				$email=$user->user_email;	

			$listid=newsletter_subscription_get_option('wns_mailchimp_wpregister');
		mailchimp_subscription($email,$fname,$lname,$listid);	
	}	

}

function wns__save_woocommerce_checkout_checkbox_value($order_id)
{
	if(isset($_POST['newsletter_enabled']) && $_POST['newsletter_enabled'] == '1')
	{
		update_post_meta( $order_id, '_wns__woo_checkout', '1');
	}

}

function wns__subscribe_from_woocommerce_checkout($order_id)
{

	$order = new WC_Order( $order_id );
	$merge_vars = array(
			'first_name' => $order->billing_first_name,
			'last_name' => $order->billing_last_name,
			'email'=> $order->billing_email,
		);
		$listid=newsletter_subscription_get_option('wns_mailchimp_woocommerce');
		$fname=$order->billing_first_name;
		$lname= $order->billing_last_name;
		$email=$order->billing_email;
	$do_optin = get_post_meta( $order_id, '__wns__woo_checkout', true );
	
	if(!empty($do_optin))
	{
		mailchimp_subscription($email,$fname,$lname,$listid);

	}
	
}

function wns__subscribe_from_comment($comment_id, $comment_approved = '')
{
	
	$comment = get_comment( $comment_id );

		$email = $comment->comment_author_email;
		$merge_vars = array(
			'first_name' => $comment->comment_author,
			'OPTIN_IP' => $comment->comment_author_IP,
			'email'=> $comment->comment_author_email,
		);
			$fname= $comment->comment_author;
			$lname=$comment->comment_author;
			$email=$comment->comment_author_email;
			$listid=newsletter_subscription_get_option('wns_mailchimp_comment');

		if(isset($_POST['newsletter_enabled']) && $_POST['newsletter_enabled'] == '1')
		{
              			

			mailchimp_subscription($email,$fname,$lname,$listid);

		}


}


function wns__newsletter_checkbox()
{ 
	
		$newsletter_enable = "";
		?><br><div id = "newsletter" ><label class="wns_label"><input type="checkbox" id="newsletter_enable" value='1' name="newsletter_enabled" <?php echo ($newsletter_enable == 'newsletter') ? 'checked="checked"' : ''; ?> /><?php _e("   Newsletter Subscription",'wns') ?></label><br>
						</div> <?php

}


	function wns__subscribe_from_registration( $user_id ) 
	{

		if(isset($_POST['newsletter_enabled']) && $_POST['newsletter_enabled'] == '1')
		{
              			$listid=newsletter_subscription_get_option('wns_mailchimp_buddypress');
			$user = get_userdata(  $user_id  );
				$fname=$user->user_firstname;
				$lname=$user->user_lastname;
				$email=$user->user_email;	
			
		mailchimp_subscription($email,$fname,$lname,$listid);

		}



	}
}
endif;
new  wns__integration_hooks;
