<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
function mailchimp_subscription($email,$fname='',$lname='',$listid)
{ 

	$wnssubscribe = new MNSMailChimp( newsletter_subscription_get_option('wns_mailchimp_api_key') );
		$wnssubscribe->call('lists/subscribe', array(
                'id'                => $listid,
                'email'             => array('email'=> $email),
                'merge_vars'        => array('FNAME'=> $fname, 'LNAME'=> $lname),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => false,
		));
	return true;
}		
