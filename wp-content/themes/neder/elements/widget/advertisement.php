<?php
/*
File: inc/advertisement.php
Description: Advertisement
*/
  
add_action( 'widgets_init', 'neder_advertisement_widgets' );
function neder_advertisement_widgets() {
	register_widget('neder_advertisement');
}
class neder_advertisement extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_advertisement ndwp-widget neder_widget neder_ndwp_advertisement', 'description' => esc_html__('Your Advertisement','neder') );
		parent::__construct('widget-advertisement', 'Neder Advertisement', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
							
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		$htmlText = apply_filters( 'widget_advertisement', empty( $instance['htmlText'] ) ? '' : $instance['htmlText'], $instance );
		$buttonUrl = apply_filters( 'widget_advertisement', empty( $instance['buttonUrl'] ) ? '' : $instance['buttonUrl'], $instance );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="box_advertisement">
            
            <?php 
				if($buttonUrl) {
					 
					echo '<a href="'.$buttonUrl.'" class="button-readmore"><div class="container_advertisement">'.$htmlText.'</div></a>'; } else {
				 
				 	echo '<div class="container_advertisement">'.$htmlText.'</div>';
				
				} 
			?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['htmlText'] = $new_instance['htmlText'];
		$instance['buttonUrl'] = strip_tags($new_instance['buttonUrl']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' => 'Advertisement', 
											'htmlText' => '', 
											'buttonUrl' => '#' 
											) 
								);
		$title = strip_tags($instance['title']);
		
		$htmlText = $instance['htmlText'];
		$buttonUrl = strip_tags($instance['buttonUrl']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        
		<p><label for="<?php echo $this->get_field_id('htmlText'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Html Text:','neder'); ?></label>
       
        <textarea cols="31" id="<?php echo $this->get_field_id('htmlText'); ?>" name="<?php echo $this->get_field_name('htmlText'); ?>" type="text"><?php echo $htmlText; ?></textarea>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('buttonUrl'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Button Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('buttonUrl'); ?>" name="<?php echo $this->get_field_name('buttonUrl'); ?>" type="text" value="<?php echo esc_url($buttonUrl); ?>" /></p>
		
<?php
	}
}
?>