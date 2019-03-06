<?php
/*
File: inc/widget/menu.php
Description: menu widget
*/
  
add_action( 'widgets_init', 'neder_ndwp_menu_widgets' );
function neder_ndwp_menu_widgets() {
	register_widget('neder_ndwp_menu');
}
class neder_ndwp_menu extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_neder_ndwp_menu ndwp-widget neder_widget neder_ndwp_menu', 'description' => esc_html__('Your Neder menu','neder') );
		parent::__construct('widget-neder_ndwp_menu', 'Neder Menu', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="neder-widget-custom-menu">
			<?php 

				$nav_menu_args = array(
					'fallback_cb' => '',
					'menu'        => esc_html($instance['menu'])
				);
				
				wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, esc_html($instance['menu']), $args, $instance ) );
			?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['menu'] 			= strip_tags($new_instance['menu']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' 		=> 'Menu', 
											'menu'			=> '',
											) 
								);
		$title = strip_tags($instance['title']);
		$menu_selected = isset($instance['menu']) ? strip_tags($instance['menu']) : '';

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		
        <p><label for="<?php echo $this->get_field_id('menu'); ?>"><?php echo esc_html__('Menu:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'menu' ); ?>" name="<?php echo $this->get_field_name( 'menu' ); ?>" class="widefat">		
		<?php
			$menus = wp_get_nav_menus();
			foreach ( $menus as $reg_menu ) { ?>
				<option value="<?php echo esc_attr( $reg_menu->term_id ); ?>" <?php selected( $menu_selected, $reg_menu->term_id ); ?>>
					<?php echo esc_html( $reg_menu->name ); ?>
				</option>		
			<?php }	?>
	    </select>
        </p>
		
<?php
	}
}
?>