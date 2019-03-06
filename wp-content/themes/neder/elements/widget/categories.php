<?php
/*
File: inc/widget/categories.php
Description: categories
*/
  
add_action( 'widgets_init', 'neder_categories_widgets' );
function neder_categories_widgets() {
	register_widget('neder_ndwp_categories');
}
class neder_ndwp_categories extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_categories ndwp-widget neder_widget neder_ndwp_categories', 'description' => esc_html__('Your categories','neder') );
		parent::__construct('widget-categories', 'Neder categories', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		$type = apply_filters( 'widget_categories', empty( $instance['type'] ) ? '' : $instance['type'], $instance );
		$show_post_count = apply_filters( 'widget_categories', empty( $instance['show_post_count'] ) ? '' : $instance['show_post_count'], $instance );
		$orderby = $instance['orderby'];
		$orderdir = $instance['orderdir'];
		$source = $instance['source'];
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="box_categories">
            <?php
				if($show_post_count == 'true') {
					$args = array(
					    'style'           => 'list',
						'show_count' 	  => true,
						'echo'            => 1,
						'order'           => $orderdir,
						'orderby'         => $orderby,
						'taxonomy'        => $source,
						'title_li'        => '',
					);
				} else {
					$args = array(
					    'style'           => 'list',
						'show_count' 	  => false,
						'echo'            => 1,
						'order'           => $orderdir,
						'orderby'         => $orderby,
						'taxonomy'        => $source,
						'title_li'        => '',
					);				
				}
				
				wp_list_categories($args);	
					
            	?>
             <div class="ndwp-clear"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_post_count'] = strip_tags($new_instance['show_post_count']);
		$instance['orderby'] = $new_instance['orderby'];
		$instance['orderdir'] = $new_instance['orderdir'];
		$instance['source'] = $new_instance['source'];
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title'     		=> 'categories',
											'show_post_count' 	=> 'true',
											'orderby'			=> 'name',
											'orderdir'			=> 'DESC',
											'source'			=> 'post', 
											) 
								);
		$title = strip_tags($instance['title']);
		$show_post_count = $instance['show_post_count'];
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'name';
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
		$source = isset($instance['source']) ? $instance['source'] : 'post';

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
 
        <p><label for="<?php echo $this->get_field_id('show_post_count'); ?>"><?php echo esc_html__('Show post count:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'show_post_count' ); ?>" name="<?php echo $this->get_field_name( 'show_post_count' ); ?>" class="widefat">
            <option <?php if ($show_post_count == 'true' ){echo 'selected="selected"';} ?> value="true">Yes</option>
            <option <?php if ($show_post_count == 'false' ){echo 'selected="selected"';} ?> value="false">no</option>
        </select></p> 

        <p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html__('Order posts by:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat">
            <option <?php if ($orderby == 'none' ){echo 'selected="selected"';} ?> value="none">No order</option>
            <option <?php if ($orderby == 'comment_count' ){echo 'selected="selected"';} ?> value="comment_count">Comment Count</option>
            <option <?php if ($orderby == 'meta_value_num' ){echo 'selected="selected"';} ?> value="meta_value_num">Post Views</option>
            <option <?php if ($orderby == 'date' ){echo 'selected="selected"';} ?> value="date">Creation Date</option>
            <option <?php if ($orderby == 'modified' ){echo 'selected="selected"';} ?> value="modified">Edit Date</option>
            <option <?php if ($orderby == 'name' ){echo 'selected="selected"';} ?> value="name">Name</option>
            <option <?php if ($orderby == 'rand' ){echo 'selected="selected"';} ?> value="rand">Random</option>
        </select>
        </p>

        <p><label for="<?php echo $this->get_field_id('orderdir'); ?>"><?php echo esc_html__('Order direction:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderdir' ); ?>" name="<?php echo $this->get_field_name( 'orderdir' ); ?>" class="widefat">
            <option <?php if ($orderdir == 'ASC' ){echo 'selected="selected"';} ?> value="ASC">Ascending order </option>
            <option <?php if ($orderdir == 'DESC' ){echo 'selected="selected"';} ?> value="DESC">Descending order</option>
        </select>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('source'); ?>"><?php echo esc_html__('Source Posts:','neder'); ?></label>
       	<?php echo neder_ndwp_all_taxonomy_for_widget($this->get_field_id('source'),$this->get_field_name( 'source' ),$source); ?></p>
        
        
        
<?php
	}
}
?>