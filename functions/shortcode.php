<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_shortcode('newsletter_subscriptin', 'mailchimp_subscriptin' );
	function mailchimp_subscriptin( $args=array() ) {

		
		include wns_path ."templates/subscriptionform.php";
		
	
	}

?>
