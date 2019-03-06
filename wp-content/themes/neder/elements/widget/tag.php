<?php
/*
File: tag.php
Description: Widget Tag
*/
 
add_action( 'widgets_init', 'neder_ndwp_vc_tag_widgets' );
function neder_ndwp_vc_tag_widgets() {
	register_widget('neder_ndwp_vc_Widget_tag');
}
 
class neder_ndwp_vc_Widget_tag extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'ndwp-widget neder_widget neder_ndwp_tag', 'description' => esc_html__('Display your tags!','neder') );
		parent::__construct('tag', 'Neder Tags', $widget_ops);
	}
	function widget($args, $instance) {	
		static $instance_widget = 0;
		$instance_widget++;		
		
		extract($args);

		$tag = $instance['tag'];
		$number = $instance['number'];
?>
        
		<?php echo $before_widget; ?>
		<?php 
		
		echo $before_title;
		
		if ( $tag ) echo $tag; 
		
		echo $after_title;
		
		
		?>

      	<div class="ndwp-tab-container ndwp-tab-widget-<?php echo $instance_widget; ?> box_tag" style="display:block">
        
        	<?php 
			$args_get_tags = $number;
			$tags = get_tags(array('number' => $args_get_tags));
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				
				echo '<div class="content_tag"><a href="'.$tag_link.'" title="'.$tag->name.'" class="'.$tag->slug.'">'.$tag->name.'</a></div>';
			}	?>
        
        </div>
        
		<?php 
		
		
		echo $after_widget; ?>
        
        
<?php	
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['tag'] = strip_tags($new_instance['tag']);
		$instance['number'] = strip_tags($new_instance['number']);
		return $instance;
	}
	function form( $instance ) {
		$tag = isset($instance['tag']) ? esc_attr($instance['tag']) : '';
		$number = isset($instance['number']) ? esc_attr($instance['number']) : '';

?>		
		<p><label for="<?php echo $this->get_field_id('tag'); ?>"><?php echo esc_html__('Tags tab:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo esc_html($tag); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo esc_html__('Max number of tags to show:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_html($number); ?>" /></p>
         
<?php
	}
}
?>