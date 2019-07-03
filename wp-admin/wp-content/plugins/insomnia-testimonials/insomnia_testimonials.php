<?php
/**
* Plugin Name: Insomnia Testimonials
* Plugin URI: http://themeforest.net/user/DankovThemes
* Description: Testimonials Plugin
* Version: 1.0.0
* Author: DankovThemes
* Author URI: http://themeforest.net/user/DankovThemes
* License: 
*/

//Create Post Formats
add_action( 'init', 'insomnia_testimonials' );
function insomnia_testimonials() {
	register_post_type( 'testimonials',
		array(
			'menu_icon'           => 'dashicons-format-status',
			'labels' => array(
				'name' => __( 'Testimonials', 'insomnia' ),
				'singular_name' => __( 'Testimonials', 'insomnia' ),
				'new_item' => __( 'Add New testimonial', 'insomnia' ),
				'add_new_item' => __( 'Add New testimonial', 'insomnia' )
			),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'comments', 'editor', 'excerpt', 'thumbnail', 'title' ),
			'capability_type' => 'post',
			'show_ui' => true,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => 'testimonials'),
		)
	);
}

?>