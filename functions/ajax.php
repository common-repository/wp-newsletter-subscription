<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('wp_ajax_nopriv_wns_add_user_to_mailchimplist', 'wns_add_user_to_mailchimplist');
add_action('wp_ajax_wns_add_user_to_mailchimplist', 'wns_add_user_to_mailchimplist');
function wns_add_user_to_mailchimplist()
{

	$fname=esc_attr($_POST['fname']);
	$lname=esc_attr($_POST['lname']);
	$email=esc_attr($_POST['email']);
       $listid=newsletter_subscription_get_option('wns_mailchimp_lists');

		
		
	if(mailchimp_subscription($email,$fname,$lname,$listid))
	{
		echo newsletter_subscription_get_option('wns_sussesfull_message');
		
	}
die();

}
