<?php
/*
File: slider-posts.php
Description: Widget Mega Posts
*/
 
add_action( 'widgets_init', 'neder_ndwp_slider_posts_widgets' );
function neder_ndwp_slider_posts_widgets() {
	register_widget('neder_ndwp_Widget_slider_posts');
}
 
class neder_ndwp_Widget_slider_posts extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'ndwp-widget neder_widget neder_ndwp_slider_posts', 'description' => esc_html__('Display your posts as a slider!','neder') );
		parent::__construct('slider-posts', 'Neder Slider Posts', $widget_ops);
	}
	function widget($args, $instance) {
		global $neder_theme;
		static $instance_widget = 0;
		$instance_widget++;		
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'owl-carousel-script' );
		
		/* RTL */	
		if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
		/* #RTL */									
		
		if($neder_theme['neder_lazy_load']) : $lazyLoad = 'lazyLoad:true,'; else : $lazyLoad = ''; endif;
		
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? 'Slider Posts' : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
 			$number = 5;
		}

		if ( !empty( $instance['orderby'] ) ) {
 			$orderby = $instance['orderby'];
			
		}else{
			
			$orderby = 'none';
			
		}
		
		if ( !empty( $instance['orderdir'] ) ) {
 			$orderdir = $instance['orderdir'];
			
		}else{
			
			$orderdir = 'DESC';
			
		}
		
		if ( !empty( $instance['cat_filter'] ) ) {
 			$cat_filter = $instance['cat_filter'];
			
		}else{
			
			$cat_filter = '0';
			
		}
		
		if($orderdir == 'meta_value_num') :
			$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__in' => $cat_filter, 'meta_key' => 'wpb_post_neder_views_count', 'orderby' => $orderby, 'order' => $orderdir ) ) );
		else :
			$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__in' => $cat_filter, 'orderby' => $orderby, 'order' => $orderdir ) ) );			
		endif;
		if ($r->have_posts()) :
		
		$script_slider_post = 'jQuery(document).ready(function($){
			$(\'.ndwp-box-slider-widget-'.$instance_widget.'\').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				'.$lazyLoad.'
				dots:false,
				autoplay:true,
				speed:2000,
				smartSpeed: 2000,
				'.$rtl.'
				navText: [\'<i class="nedericon fa-angle-left"></i>\',\'<i class="nedericon fa-angle-right"></i>\'],
				responsive:{
							0:{
								items:1
							}							
				}
			});
		});';		
	
		wp_add_inline_script( 'owl-carousel-script', $script_slider_post );		
		
?>

		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<div class="box_slider owl-carousel ndwp-box-slider-widget-<?php echo $instance_widget; ?>">
        
		<?php $count = 0; while ($r->have_posts()) : $r->the_post(); ?>
        <div class="ad_one_one">        
        		<div class="slider-posts-item ndwp-slider-posts-item-<?php echo $count; ?> ad_one_one ad_last big-post sixth item">
					<?php echo neder_thumbs_nll('neder-vc-header'); ?>
					<?php echo '<div class="category">'.neder_category(1).'</div>'; ?> 
                    <div class="box-text">   
                        <div class="box-padding">   
                            <h3 class="title-post">
        						<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">		
									<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
        						</a>  
								 
                            </h3>					
                            <span class="data"><i class="nedericon fa-calendar-o"></i><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
				</div>			
        </div>
        
		<?php $count++; endwhile; ?>
		</div>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		
		$instance['cat_filter'] = $new_instance['cat_filter'];
		
		$instance['orderby'] = $new_instance['orderby'];
		
		$instance['orderdir'] = $new_instance['orderdir'];
		return $instance;
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
		$cat_filter = isset($instance['cat_filter']) ? $instance['cat_filter'] : '0';
		
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'none';
		
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo esc_html__('Number of posts to show:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_html($number); ?>" size="3" /></p>
        
       
        <p><label for="<?php echo $this->get_field_id('cat_filter'); ?>"><?php echo esc_html__('Filter posts by category:','neder'); ?></label>
       
        <?php $categories = get_categories(array('orderby' => 'name','order' => 'ASC')); ?>
        
		       
        
        <select multiple="multiple" id="<?php echo $this->get_field_id( 'cat_filter' ); ?>" name="<?php echo $this->get_field_name( 'cat_filter' ).'[]'; ?>" class="widefat">
        <?php foreach ($categories as $category) {  ?>
        <?php echo $cat_filter;?>
        <option <?php if ( $cat_filter && in_array($category->term_id, $cat_filter) ){echo 'selected="selected"';} ?> value="<?php echo esc_html($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
		<?php } ?>
		</select>
      
        
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html__('Order posts by:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat">
            <option <?php if ($orderby == 'none' ){echo 'selected="selected"';} ?> value="none">No order</option>
            <option <?php if ($orderby == 'comment_count' ){echo 'selected="selected"';} ?> value="comment_count">Comment Count</option>
            <option <?php if ($orderby == 'meta_value_num' ){echo 'selected="selected"';} ?> value="meta_value_num">Post Views</option>
            <option <?php if ($orderby == 'date' ){echo 'selected="selected"';} ?> value="date">Creation Date</option>
            <option <?php if ($orderby == 'modified' ){echo 'selected="selected"';} ?> value="modified">Edit Date</option>
            <option <?php if ($orderby == 'title' ){echo 'selected="selected"';} ?> value="title">Title</option>
            <option <?php if ($orderby == 'rand' ){echo 'selected="selected"';} ?> value="rand">Random</option>
        </select>
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderdir'); ?>"><?php echo esc_html__('Order direction:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderdir' ); ?>" name="<?php echo $this->get_field_name( 'orderdir' ); ?>" class="widefat">
            <option <?php if ($orderdir == 'ASC' ){echo 'selected="selected"';} ?> value="ASC">Ascending order </option>
            <option <?php if ($orderdir == 'DESC' ){echo 'selected="selected"';} ?> value="DESC">Descending order</option>
        </select>
        </p>
<?php
	}
}
?>