<?php
/*
File: tab.php
Description: Widget Tab: recent, popular and tags
*/
 
add_action( 'widgets_init', 'neder_ndwp_tab_widgets' );
function neder_ndwp_tab_widgets() {
	register_widget('neder_ndwp_Widget_tab');
}
 
class neder_ndwp_Widget_tab extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'ndwp-widget neder_widget neder_ndwp_tab', 'description' => esc_html__('Display your posts as a tab!','neder') );
		parent::__construct('tab', 'Neder Tab', $widget_ops);
	}
	function widget($args, $instance) {
		
		static $instance_widget = 0;
		$instance_widget++;		
		
		extract($args);
		
		$recent = $instance['recent'];
		$popular = $instance['popular'];
		$tag = $instance['tag'];
		
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
 			$number = 5;
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
		
		$tags_number = $instance['tags_number'];
		wp_enqueue_script('neder-widget-tab-js', NEDER_JS_URL . 'widget-tab.js', array('jquery'), '', true);
		
		echo $before_widget;
		
		$class_popular = $class_tag = '';
		if(!$recent) { $class_popular = 'style="display:block"'; } 
		if(!$recent && !$popular) { $class_tag = 'style="display:block"'; }
		
		echo $before_title;
		if ( $recent ) echo '<span class="neder_ndwp_title_recent neder_ndwp_tab_active">' . $recent . '</span>';
		if ( $popular ) echo '<span class="neder_ndwp_title_popular">' . $popular . '</span>';
		if ( $tag ) echo '<span class="neder_ndwp_title_tag">' . $tag . '</span>'; 		
		echo $after_title;
		
		
		?>
        
<?php	
		if ( $recent ) {
				
		$r = new WP_Query( array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__in' => $cat_filter, 'orderby' => 'date', 'order' => $orderdir ) );
		if ($r->have_posts()) :
?>

		<div class="ndwp-tab-container ndwp-tab-widget-<?php echo $instance_widget; ?> ndwp-recent" style="display:block">
        
		<?php $count = 0; while ($r->have_posts()) : $r->the_post(); ?>
        <div class="box_post">
        	<div class="container_post ad_one_one">
            	<div class="img-post ndwp-tab-item-<?php echo $count; ?> ad_one_third">
					<?php echo neder_thumbs('neder-vc-header-small'); ?>
					<?php echo neder_check_format(); ?>
				</div>
            	<div class="box-info ad_two_third">
 					<h4 class="title-post">
        						<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">		
									<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
        						</a>                    
        			</h4>
               		<span class="data"><i class="icon-calendar"></i><?php echo get_the_date(); ?></span>
				</div>
            </div>
        </div>
        
		<?php 
		$count++; endwhile; wp_reset_query();  ?>
		</div>
		   
<?php endif; } // #RECENT

		if ( $popular ) {

		$r = new WP_Query( array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'category__in' => $cat_filter, 'meta_key' => 'wpb_post_neder_views_count', 'orderby' => 'meta_value_num', 'order' => $orderdir ) );
		if ($r->have_posts()) :           
?>           
           
		<div class="ndwp-tab-container ndwp-tab-widget-<?php echo $instance_widget; ?> ndwp-popular" <?php echo esc_html($class_popular); ?>>
        
		<?php $count = 0; while ($r->have_posts()) : $r->the_post(); ?>
        <div class="box_post">
        	<div class="container_post ad_one_one">
            	<div class="img-post ndwp-tab-item-<?php echo $count; ?> ad_one_third">
					<?php echo neder_thumbs('neder-vc-header-small'); ?>
					<?php echo neder_check_format(); ?>
				</div>
            	<div class="box-info ad_two_third">
 					<h4 class="title-post">
        						<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">		
									<?php if ( get_the_title() ) the_title(); else the_ID(); ?>
        						</a>                    
        			</h4>
               		<span class="data"><i class="icon-calendar"></i><?php echo get_the_date(); ?></span>
				</div>
            </div>
        </div>
        
		<?php $count++; endwhile; wp_reset_postdata(); ?>
		</div>
        <?php endif; 
		
		} // #POPULAR
		
		if ( $tag ) {
			
		?>
      	<div class="ndwp-tab-container ndwp-tab-widget-<?php echo $instance_widget; ?> ndwp-tag box_tag" <?php echo esc_html($class_tag); ?>>
        
        	<?php 
			$args_get_tags = $tags_number;
			$tags = get_tags(array('number' => $args_get_tags));
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				
				echo '<div class="content_tag"><a href="'.$tag_link.'" title="'.$tag->name.'" class="'.$tag->slug.'">'.$tag->name.'</a></div>';
			}	?>
        
        </div>
		
        <?php } // #TAG ?>
		<?php echo $after_widget; ?>
    
<?php	
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['recent'] = strip_tags($new_instance['recent']);
		$instance['popular'] = strip_tags($new_instance['popular']);
		$instance['tag'] = strip_tags($new_instance['tag']);
		
		
		$instance['number'] = (int) $new_instance['number'];
		
		$instance['cat_filter'] = $new_instance['cat_filter'];
		
		$instance['orderby'] = $new_instance['orderby'];
		
		$instance['orderdir'] = $new_instance['orderdir'];
		
		$instance['tags_number'] = strip_tags($new_instance['tags_number']);
		
		if(function_exists('icl_object_id')) {
			do_action( 'wpml_register_single_string', 'Widgets', 'Widget Tab - Recent', $instance['recent'] );
			do_action( 'wpml_register_single_string', 'Widgets', 'Widget Tab - Popular', $instance['popular'] );
			do_action( 'wpml_register_single_string', 'Widgets', 'Widget Tab - Tag', $instance['tag'] );
		}		
		
		return $instance;
	}
	function form( $instance ) {
		$recent = isset($instance['recent']) ? esc_attr($instance['recent']) : '';
		$popular = isset($instance['popular']) ? esc_attr($instance['popular']) : '';
		$tag = isset($instance['tag']) ? esc_attr($instance['tag']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		
		$cat_filter = isset($instance['cat_filter']) ? $instance['cat_filter'] : '0';
		
		$orderby = isset($instance['orderby']) ? $instance['orderby'] : 'none';
		
		$orderdir = isset($instance['orderdir']) ? $instance['orderdir'] : 'DESC';
		
		$tags_number = isset($instance['tags_number']) ? esc_attr($instance['tags_number']) : '';
?>		<h2><?php echo esc_html__('TAB NAME','neder'); ?></h2>
		<p><label for="<?php echo $this->get_field_id('recent'); ?>"><?php echo esc_html__('Recent tab:','neder'); ?><br><span style="padding-bottom:5px;display:block"><small>- <?php echo esc_html__('Leave empty for disable recent tab','neder'); ?></small></span></label>
		<input class="widefat" id="<?php echo $this->get_field_id('recent'); ?>" name="<?php echo $this->get_field_name('recent'); ?>" type="text" value="<?php echo esc_html($recent); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('popular'); ?>"><?php echo esc_html__('Popular tab:','neder'); ?><br><span style="padding-bottom:5px;display:block"><small>- <?php echo esc_html__('Leave empty for disable popular tab','neder'); ?></small></span></label>
		<input class="widefat" id="<?php echo $this->get_field_id('popular'); ?>" name="<?php echo $this->get_field_name('popular'); ?>" type="text" value="<?php echo esc_html($popular); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('tag'); ?>"><?php echo esc_html__('Tags tab:','neder'); ?><br><span style="padding-bottom:5px;display:block"><small>- <?php echo esc_html__('Leave empty for disable tags tab','neder'); ?></small></span></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo esc_html($tag); ?>" /></p>
        
        <h2 style="margin-top:30px"><?php echo esc_html__('TAB OPTIONS','neder'); ?></h2>
        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php echo esc_html__('Number of posts to show:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_html($number); ?>" size="3" /></p>
           
        <p><label for="<?php echo $this->get_field_id('cat_filter'); ?>"><?php echo esc_html__('Filter posts by category:','neder'); ?></label>
       
        <?php $categories = get_categories(array('orderby' => 'name','order' => 'ASC')); ?>
        
        <select multiple="multiple" id="<?php echo $this->get_field_id( 'cat_filter' ); ?>" name="<?php echo $this->get_field_name( 'cat_filter' ).'[]'; ?>" class="widefat">
        <?php foreach ($categories as $category) {  ?>
        <?php echo esc_html($cat_filter);?>
        <option <?php if ( $cat_filter && in_array($category->term_id, $cat_filter) ){echo 'selected="selected"';} ?> value="<?php echo esc_html($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
		<?php } ?>
		</select>
      
        
        </p>
        
        <p><label for="<?php echo $this->get_field_id('orderdir'); ?>"><?php echo esc_html__('Order direction:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'orderdir' ); ?>" name="<?php echo $this->get_field_name( 'orderdir' ); ?>" class="widefat">
            <option <?php if ($orderdir == 'ASC' ){echo 'selected="selected"';} ?> value="ASC">Ascending order </option>
            <option <?php if ($orderdir == 'DESC' ){echo 'selected="selected"';} ?> value="DESC">Descending order</option>
        </select>
        </p>
		
		<h2 style="margin-top:30px"><?php echo esc_html__('TAGS OPTIONS','neder'); ?></h2>
		
		<p><label for="<?php echo $this->get_field_id('tags_number'); ?>"><?php echo esc_html__('Max number of tags to show:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tags_number'); ?>" name="<?php echo $this->get_field_name('tags_number'); ?>" type="text" value="<?php echo esc_html($tags_number); ?>" /></p>
		
<?php
	}
}
?>