<?php
/*LATEST NEWS*/
add_shortcode('vc_posts_slider', 'vc_posts_slider_f');
function vc_posts_slider_f( $atts, $content = null)
{
	extract(shortcode_atts(
        array(
			'insomnia_items_1300' =>'3',
			'insomnia_items_900' =>'2',
			'insomnia_items_750' =>'2',
    ), $atts));


	$output='';
	$output .= '<div class="blog_slider"><ul class="owl-carousel" id="insomnia_posts_slider">'.vc_posts_slider_loop($show_posts).'</ul></div>';
	$output .='<script>
	jQuery(window).load(function(){
		jQuery("#insomnia_posts_slider").owlCarousel({
			loop:true,
			nav:false,
			autoHeight: true,
			autoplay:true,
			autoplayHoverPause:true,
			dots:false,
			responsive: {
				0: {
					margin: 0,
					items: 1
				},
				750: {
					margin: 15,
					items: '.$insomnia_items_750.'
				},
				900: {
					margin: 30,
					items: '.$insomnia_items_900.'
				},
				1300: {
					margin: 30,
					items: '.$insomnia_items_1300.'
				}
			},
		});
		});
</script>';
	return $output;

}

function social_icons_slider() {
	$multicheck_value = get_theme_mod( 'insomnia_soc_link', array( 'facebook', 'twitter', 'pinterest') ); 
	if ( ! empty( $multicheck_value ) ) { 
		echo '<ul class="icon-links">';
			foreach ( $multicheck_value as $checked_value )  {
				if ($checked_value == 'facebook') {
					echo '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink($post_id). '" target="_blank"><span class="icon-social-facebook"></span></a></li>';
				} elseif ($checked_value == 'twitter') {
					echo '<li><a href="https://twitter.com/home?status=Check out this great post by '. get_the_author($post_id).' '.get_permalink($post_id) .'" target="_blank"><span class="icon-social-twitter"></span></a></li>';
				} elseif ($checked_value == 'pinterest') {
					echo '<li><a href="https://pinterest.com/pin/create/button/?url= '. get_permalink($post_id) .'&amp;media='. esc_url($feat_image[0]) .'&amp;description='. esc_html(get_the_title($post_id)) .'" target="_blank"><span class="ti-pinterest"></span></a></li>';
				} elseif ($checked_value == 'tumblr') {
					echo '<li><a href="http://www.tumblr.com/share/link?url= '. get_permalink($post_id) .'" target="_blank"><span class="icon-social-tumblr"></span></a></li>';
				} elseif ($checked_value == 'google') {
					echo '<li><a href="https://plus.google.com/share?url= '. get_permalink($post_id) .'" target="_blank"><span class="ti-google"></span></a></li>';
				} elseif ($checked_value == 'linkedin') {
					echo '<li><a href="https://www.linkedin.com/shareArticle?mini=true&url= '. get_permalink($post_id) .'&title='. esc_html(get_the_title($post_id)) .'&summary=&source=" target="_blank"><span class="ti-linkedin"></span></a></li>';
				};
			};
		echo '</ul>'; 
	};
};

function vc_posts_slider_loop($show_posts)
{

	$query =  new WP_Query(array('post_type' => 'post', 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
		$category = get_the_category(); 
		$post_id = get_the_id();
		$author = get_the_author();
		$format = get_post_format( $post_id );

		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'blog-standart');
				echo '<li class="post-set">';
               echo ' <div class="blog-images">';
                   echo '<div class="post-thumbnail">';
                   echo '<img src="'.$feat_image[0].'" alt="">';
				 		social_icons_slider();	
                  echo '  </div>';
               echo ' </div>';
               echo ' <div class="blog-name"><a href="'. get_permalink($post_id).'">'.get_the_title($post_id).'</a></div>';
              echo '  <div class="blog-text"><p>' . get_the_excerpt($post_id) . '</p></div>';
              echo '  <div class="blog-desc">';
               echo '   <ul>';
                 echo '   <li><i class="pe-7s-date"></i> '.get_the_date('j M, Y').'</li>';
                echo '    <li><i class="pe-7s-user"></i> '. $author .'</li>';
                echo '    <li><i class="pe-7s-look"></i> '. insomnia_get_post_views($post_id) .' Views</li>';
               echo '   </ul>';
             echo '   </div>'; 
             echo '   </li>'; 

	}
	wp_reset_postdata();
	return ob_get_clean();
};


/*Latest News*/
vc_map( array(
	"name" => __("Posts Slider",'insomnia'),
	"base" => "vc_posts_slider",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_items_1300",
			"heading" => __("Post per row for 1300px wide screen", 'insomnia'),
			"value" => '3',
			"admin_label" => true,
			"description" => __( "For big desktops", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_items_900",
			"heading" => __("Post per row for 900px wide screen", 'insomnia'),
			"value" => '2',
			"admin_label" => true,
			"description" => __( "For desktops or big tables", 'insomnia' )
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_items_750",
			"heading" => __("Post per row for 750px wide screen", 'insomnia'),
			"value" => '2',
			"admin_label" => true,
			"description" => __( "For tablet", 'insomnia' )
		),	
	)
) );

