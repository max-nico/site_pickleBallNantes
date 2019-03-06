<?php
/*
File: inc/widget/archivies.php
Description: archivies
*/
  
add_action( 'widgets_init', 'neder_archivies_widgets' );
function neder_archivies_widgets() {
	register_widget('neder_ndwp_archivies');
}
class neder_ndwp_archivies extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_archivies ndwp-widget neder_widget neder_ndwp_archivies', 'description' => esc_html__('Your archivies','neder') );
		parent::__construct('widget-archivies', 'Neder archivies', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		$type = apply_filters( 'widget_archivies', empty( $instance['type'] ) ? '' : $instance['type'], $instance );
		$show_post_count = apply_filters( 'widget_archivies', empty( $instance['show_post_count'] ) ? '' : $instance['show_post_count'], $instance );
		$orderdir = $instance['orderdir'];
		$source = $instance['source'];
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="box_archivies"><ul>
            <?php
				if($show_post_count == 'true') {
					$args = array(
						'type'            => $type,
						'limit'           => '',
						'format'          => 'html', 
						'before'          => '<span class="box_archivies_item">',
						'after'           => '</span>',
						'show_post_count' => true,
						'echo'            => 1,
						'order'           => $orderdir,
						'post_type'       => $source
					);
				} else {
					$args = array(
						'type'            => $type,
						'limit'           => '',
						'format'          => 'html', 
						'before'          => '<span class="box_archivies_item">',
						'after'           => '</span>',
						'echo'            => 1,
						'order'           => $orderdir,
						'post_type'       => $source
					);					
				}
				wp_get_archives( $args ); 		
            	?>
             </ul><div class="ndwp-clear"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
		$instance['show_post_count'] = strip_tags($new_instance['show_post_count']);
		$instance['orderdir'] = $new_instance['orderdir'];
		$instance['source'] = $new_instance['source'];
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title'     		=> 'Archivies', 
											'type'  			=> 'monthly', 
											'show_post_count' 	=> 'true',
											'orderdir'			=> 'DESC',
											'source'			=> 'post', 
											) 
								);
		$title = strip_tags($instance['title']);
		$type = isset($instance['type']) ? $instance['type'] : 'monthly';
		$show_post_count = $instance['show_post_count'];
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
		$source = isset($instance['source']) ? $instance['source'] : 'post';

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
        <p><label for="<?php echo $this->get_field_id('type'); ?>"><?php echo esc_html__('Type (Archivie by):','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
            <option <?php if ($type == 'yearly' ){echo 'selected="selected"';} ?> value="yearly">Yearly</option>
            <option <?php if ($type == 'monthly' ){echo 'selected="selected"';} ?> value="monthly">Monthly</option>  
            <option <?php if ($type == 'daily' ){echo 'selected="selected"';} ?> value="daily">Daily</option>
            <option <?php if ($type == 'weekly' ){echo 'selected="selected"';} ?> value="weekly">Weekly</option>
        </select></p>
 
        <p><label for="<?php echo $this->get_field_id('show_post_count'); ?>"><?php echo esc_html__('Show post count:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'show_post_count' ); ?>" name="<?php echo $this->get_field_name( 'show_post_count' ); ?>" class="widefat">
            <option <?php if ($show_post_count == 'true' ){echo 'selected="selected"';} ?> value="true">Yes</option>
            <option <?php if ($show_post_count == 'false' ){echo 'selected="selected"';} ?> value="false">no</option>
        </select></p> 

        <p><label for="<?php echo $this->get_field_id('orderdir'); ?>"><?php echo esc_html__('Order direction:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderdir' ); ?>" name="<?php echo $this->get_field_name( 'orderdir' ); ?>" class="widefat">
            <option <?php if ($orderdir == 'ASC' ){echo 'selected="selected"';} ?> value="ASC">Ascending order </option>
            <option <?php if ($orderdir == 'DESC' ){echo 'selected="selected"';} ?> value="DESC">Descending order</option>
        </select>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('source'); ?>"><?php echo esc_html__('Source Posts:','neder'); ?></label>
       	<?php echo neder_ndwp_all_post_types_for_widget($this->get_field_id('source'),$this->get_field_name( 'source' ),$source); ?></p>
        
        
        
<?php
	}
}
?>