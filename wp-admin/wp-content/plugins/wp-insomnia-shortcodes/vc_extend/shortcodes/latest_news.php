<?php
/*LATEST NEWS*/
add_shortcode('vc_latest_news', 'vc_latest_news_f');
function vc_latest_news_f( $atts, $content = null)
{
	extract(shortcode_atts(
        array(
			'id' => '',
			'padding' => null,
    ), $atts));

	if ($padding) $padding = 'no-padding';

	$posts = $id;

	$output = '<div class="blog-main '. esc_attr($padding) .'">'.latest_news_loop($posts).'</div>';
	return $output;

}

function social_icons() {
	$post_id = get_the_id();
	$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'blog-standart');
	$multicheck_value = get_theme_mod( 'insomnia_soc_link', array( 'facebook', 'twitter', 'pinterest') ); 
	if ( ! empty( $multicheck_value ) ) { 
		echo '<ul class="icon-links">';
			foreach ( $multicheck_value as $checked_value )  {
				if ($checked_value == 'facebook') {
					echo '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink($post_id). '" target="_blank"><span class="icon-social-facebook"></span></a></li>';
				} elseif ($checked_value == 'twitter') {
					echo '<li><a href="https://twitter.com/home?status=Check out this great post '.get_permalink($post_id) .'" target="_blank"><span class="icon-social-twitter"></span></a></li>';
				} elseif ($checked_value == 'pinterest') {
					echo '<li><a href="https://pinterest.com/pin/create/button/?url='. get_permalink($post_id) .'&amp;media='. esc_url($feat_image[0]) .'&amp;description='. esc_html(get_the_title($post_id)) .'" target="_blank"><span class="ti-pinterest"></span></a></li>';
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

function latest_news_loop($posts)
{

	$query =  new WP_Query(array('post_type' => 'post', 'p'=> $posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
		$category = get_the_category(); 
		$post_id = get_the_id();
		$author = get_the_author();
		$format = get_post_format( $post_id );

		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'blog-standart');
               echo ' <div class="blog-images">';
                   echo '<div class="post-thumbnail">';
                   echo '<img src="'.$feat_image[0].'" alt="">';
				 		social_icons();	
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

	}
	wp_reset_postdata();
	return ob_get_clean();
};

/*Latest News*/
vc_map( array(
	"name" => __("Latest News Style #1",'insomnia'),
	"base" => "vc_latest_news",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "id",
			"heading" => __("Post Item", 'insomnia'),
			"value" => '',
			"admin_label" => true,
			"description" => __( "Post ID", 'insomnia' )
		),
		array(
			"type" => "checkbox",
			"heading" => __("No padding", 'insomnia'),
			"param_name" => "padding",
			"value" => array("Yes" => true),
		),
	)
) );

			
	










