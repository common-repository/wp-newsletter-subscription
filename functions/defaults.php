<?php
if ( ! defined( 'ABSPATH' ) ) exit;

	/* get a global option */
	function newsletter_subscription_get_option( $option ) {
		$wpbackup_default_options = newsletter_subscription_default_options();
		$settings = get_option('newsletter_subscription');
		switch($option){
		
			default:
				if (isset($settings[$option])){
					return $settings[$option];
				} else {
					return $wpbackup_default_options[$option];
				}
				break;
	
		}
	}
	
	/* set a global option */
	function newsletter_subscription_set_option($option, $newvalue){
		$settings = get_option('newsletter_subscription');
		$settings[$option] = $newvalue;
		update_option('newsletter_subscription', $settings);
	}

	function newsletter_subscription_default_options(){
		$array = array();
		/* Order Tab Default options */
		$array['wns_first_name'] = 'First Name';
		$array['wns_last_name'] = 'Last Name';
		$array['wns_form_title'] = 'Subscription Form';
		$array['wns_submit_title'] = 'Subscribe';
		$array['wns_sussesfull_message'] = 'Thanks for Subscription';
		$array['wns_comment_textmessage'] = '';
		$array['wns_mailchimp_api_key'] = '';
		$array['wns_double_optin'] = 'false';
		$array['wns_mailchimp_api_key'] = '';
		$array['wns_wpregiter']='';
		$array['wns_mailchimp_wpregiter']='';
		$array['wns_woocommerce']='';
		$array['wns_mailchimp_woocommerce']='';
		$array['wns_comment']='';
		$array['wns_mailchimp_comment']='';
		$array['wns_buddypress']='';
		$array['wns_mailchimp_buddypress']='';
		$array['wns_wpregiter']='';

		
		$array['backgroud_color']='rgba(19, 35, 47, 0.9)';

		
		return apply_filters('newsletter_subscription_default_options_array', $array);
	}
