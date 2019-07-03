<?php
/**
* Plugin Name: Insomnia Widgets
* Plugin URI: http://themeforest.net/user/DankovThemes
* Description: Widgets Plugin
* Version: 1.0.3
* Author: DankovThemes
* Author URI: http://themeforest.net/user/DankovThemes
* License: 
*/

include(plugin_dir_path( __FILE__ ).'widgets/insomnia_popular_posts.php');
include(plugin_dir_path( __FILE__ ).'widgets/insomnia_latest_posts.php');
include(plugin_dir_path( __FILE__ ).'widgets/insomnia_recent_posts_comments.php');
include(plugin_dir_path( __FILE__ ).'widgets/insomnia_soc_link.php');


/**
 * Add function to widgets_init that'll load our widget.
 */

add_action('widgets_init', 'insomnia_get_in_touch_widget');

function insomnia_get_in_touch_widget() {
	register_widget('Insomnia_Get_In_Touch_Widget');
}


/**
 * Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update. 
 *
 */
class Insomnia_Get_In_Touch_Widget extends WP_Widget {


	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'insomnia-get-in-touch-widget',

			// Widget name will appear in UI
			esc_attr__('Insomnia: Get in Touch', 'pioneer'),

			// Widget description
			array( 'description' => esc_attr__( 'Get in touch with clients', 'pioneer' ) )
		);
	}

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		// Our variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		$adress = $instance['adress'];
		$phone = $instance['phone'];
		$fax = $instance['fax'];
		$skype = $instance['skype'];
		$email = $instance['email'];
		$weekend = $instance['weekend'];

		$time_id = rand();

		/* Before widget (defined by themes). */
		// Before widget (defined by theme functions file)
	echo $before_widget;
	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;
		?>

		<div class="dankov_about_widget">
				<ul class="contact-footer contact-composer">
                  	<?php if($adress != false) {?><li><i class="pe-7s-home"></i> <span><?php echo  $instance['adress']?></span></li><?php } ?>
                  	<?php if($phone != false) {?><li><i class="pe-7s-call"></i> <span><?php echo  $instance['phone']?></span></li><?php } ?>
                  	<?php if($fax != false) {?><li><i class="pe-7s-print"></i> <span><?php echo  $instance['fax']?></span></li><?php } ?>
                  	<?php if($skype != false) {?><li><i class="pe-7s-video"></i> <span><?php echo  $instance['skype']?></span></li><?php } ?>
                  	<?php if($email != false) {?><li><i class="pe-7s-mail"></i> <span><?php echo  $instance['email']?></span></li><?php } ?>
                  	<?php if($weekend != false) {?><li><i class="pe-7s-lock"></i> <span><?php echo  $instance['weekend']?></span></li><?php } ?>
                </ul>   
        </div>

		<?php

		// After widget (defined by theme functions file)
		echo $after_widget;
	}


/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip tags to remove HTML (important for text inputs)
	$instance['title'] = strip_tags( $new_instance['title'] );
	// Stripslashes for html inputs
	$instance['adress'] = $new_instance['adress'];
	$instance['phone'] = $new_instance['phone'];
	$instance['fax'] = $new_instance['fax'];
	$instance['skype'] = $new_instance['skype'];
	$instance['email'] = $new_instance['email'];
	$instance['weekend'] = $new_instance['weekend'];

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(	'title'		=> __( 'Our Contacts' , 'insomnia' ),
						'adress'	=> __( 'Adress: 455 Martinson, Los Angeles' , 'insomnia' ),
						'fax'		=> '',
						'skype'		=> '',
						'phone'		=> __( 'Phone: 8 (043) 567 - 89 - 30' , 'insomnia' ),
						'email'		=> __( 'E-mail: support@email.com' , 'insomnia' ),
						'weekend'	=> __( 'Weekend: from 9 am to 6 pm' , 'insomnia' ),
					);
	
	$instance = wp_parse_args((array) $instance, $defaults);
	?>


	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['title'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'adress' ); ?>"><?php _e('Adress:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'adress' ); ?>" name="<?php echo $this->get_field_name( 'adress' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['adress'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['phone'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e('Fax:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['fax'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php _e('Skype:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['skype'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('E-mail:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['email'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'weekend' ); ?>"><?php _e('Open/Close:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'weekend' ); ?>" name="<?php echo $this->get_field_name( 'weekend' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['weekend'] ), ENT_QUOTES)); ?>" />
	</p>

	<?php
	}
}
?>