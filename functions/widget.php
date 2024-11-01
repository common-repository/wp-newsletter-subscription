<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'newsletter_subscription_widget' );


function newsletter_subscription_widget() {
	register_widget( 'NEWSLETTER_WIDGET' );
	
}

class NEWSLETTER_WIDGET extends WP_Widget {

	function __construct()  {
		$widget_ops = array( 'classname' => 'NEWSLETTER_subscription', 'description' => __('Newsletter Subscription Widget', 'wns') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'NEWSLETTER_subscription' );
		
		parent::__construct( 'NEWSLETTER_subscription', __('Newsletter Subscription', 'wns'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		
		
		$before_title = $args['before_title'];
		$after_title = $args['after_title'];
			// hard excluded by post type
			
			
			// soft excluded by post id
			

			//Our variables
			$title = apply_filters('widget_title', $instance['title'] );

			echo $args['before_widget'];
			if ( $title )
				echo $before_title . $title . $after_title;

			 echo do_shortcode('[newsletter_subscriptin/]');
			
			echo $args['after_widget'];
			
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Newsletter Subscription', 'wns_') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wns_'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>

	<?php
	}
}
