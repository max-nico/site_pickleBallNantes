<?php

/**
 * Add function to widgets_init that'll load our widget.
 */

add_action('widgets_init', 'insomnia_soc_link_widget');

function insomnia_soc_link_widget() {
	register_widget('Insomnia_Soc_Link_Widget');
}


/**
 * Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update. 
 *
 */
class Insomnia_Soc_Link_Widget extends WP_Widget {

	function __construct() {
			parent::__construct(
				// Base ID of your widget
				'insomnia-soc-link-widget',

				// Widget name will appear in UI
				esc_attr__('Insomnia: Social Links', 'pioneer'),

				// Widget description
				array( 'description' => esc_attr__( 'Add yours social links', 'pioneer' ) )
			);
		}

	/*-----------------------------------------------------------------------------------*/
	/*	Display Widget
	/*-----------------------------------------------------------------------------------*/
	
	function widget( $args, $instance ) {
		extract( $args );
		
		// Our variables from the widget settings
		$title = apply_filters('widget_title', $instance['title'] );
		$twitter = $instance['twitter'];
		$tumblr = $instance['tumblr'];
		$dropbox = $instance['dropbox'];
		$dribbble = $instance['dribbble'];
		$vimeo = $instance['vimeo'];
		$instagram = $instance['instagram'];

		$time_id = rand();

		/* Before widget (defined by themes). */
		// Before widget (defined by theme functions file)
	echo $before_widget;
	// Display the widget title if one was input
	if ( $title )
		echo $before_title . $title . $after_title;
		?>

		<div class="dankov_about_widget">
            <ul class="soc-footer">
                  <?php if($twitter != false) {?><li><a href="<?php echo  $instance['twitter']?>"><i class="ti-twitter"></i></a></li><?php } ?>
                  <?php if($tumblr != false) {?><li><a href="<?php echo  $instance['tumblr']?>"><i class="ti-tumblr"></i></a></li><?php } ?>
                  <?php if($dropbox != false) {?><li><a href="<?php echo  $instance['dropbox']?>"><i class="ti-dropbox"></i></a></li><?php } ?>
                  <?php if($dribbble != false) {?><li><a href="<?php echo  $instance['dribbble']?>"><i class="ti-dribbble"></i></a></li><?php } ?>
                  <?php if($vimeo != false) {?><li><a href="<?php echo  $instance['vimeo']?>"><i class="ti-vimeo"></i></a></li><?php } ?>
                  <?php if($instagram != false) {?><li><a href="<?php echo  $instance['instagram']?>"><i class="ti-instagram"></i></a></li><?php } ?>
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
	$instance['twitter'] = $new_instance['twitter'];
	$instance['tumblr'] = $new_instance['tumblr'];
	$instance['dropbox'] = $new_instance['dropbox'];
	$instance['dribbble'] = $new_instance['dribbble'];
	$instance['vimeo'] = $new_instance['vimeo'];
	$instance['instagram'] = $new_instance['instagram'];

	return $instance;
}


/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	 
function form( $instance ) {

	// Set up some default widget settings
	$defaults = array(	'title'			=> '',
						'twitter'		=> 'http://twitter.com',
						'tumblr'		=> 'http://tumblr.com',
						'dropbox'		=> 'http://dropbox.com',
						'dribbble'		=> 'http://dribbble.com',
						'vimeo'			=> 'http://vimeo.com',
						'instagram'		=> 'http://instagram.com',
					);
	
	$instance = wp_parse_args((array) $instance, $defaults);
	?>


	<!-- Widget Title: Text Input -->
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['title'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['twitter'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['tumblr'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'dropbox' ); ?>"><?php _e('Dropbox:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'dropbox' ); ?>" name="<?php echo $this->get_field_name( 'dropbox' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['dropbox'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e('Dribbble:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['dribbble'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e('Vimeo:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['vimeo'] ), ENT_QUOTES)); ?>" />
	</p>
    <p>
		<label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:', 'insomnia') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['instagram'] ), ENT_QUOTES)); ?>" />
	</p>

	<?php
	}
}
?>