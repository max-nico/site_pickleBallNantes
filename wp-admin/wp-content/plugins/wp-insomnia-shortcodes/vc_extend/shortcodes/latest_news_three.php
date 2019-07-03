<?php
/*LATEST NEWS*/
add_shortcode('vc_latest_news_three', 'vc_latest_news_three_f');
function vc_latest_news_three_f( $atts, $content = null)
{
	extract(shortcode_atts(
        array(
			'id' => '',
    ), $atts));

	$posts = $id;

	$output='';
	$output .= '<div class="blog-main-personal">'.latest_news_loop_three($posts).'</div>';
	return $output;

}
function latest_news_loop_three($posts)
{

	$query =  new WP_Query(array('post_type' => 'post', 'p'=> $posts, 'order' => 'DESC'));
	$loop_count = 0;
	ob_start();	
	while ($query->have_posts()) { $query->the_post();
		$category = get_the_category(); 
		$post_id = get_the_id();
		$format = get_post_format( $post_id );

		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'blog-standart');
									echo '<div class="post-thumbnail-personal">';
										echo '<div class="img-blog" style="background:url('.$feat_image[0].');"></div>';
										echo '<div class="img-overlay"></div>';
									echo '</div>';
									echo '<div class="post-details-personal">';
										echo '<div class="post-content-wrap">';
										echo '<div class="post-content-personal">';
											echo '<div class="date-blog-personal"><a href="#">'.get_the_date('j M, Y').'</a></div>';
											echo '<h5 class="title-blog-personal"><a href="'. get_the_permalink() .'">'.get_the_title($post_id).'</a></h5>';
											echo '<ul class="category-blog-personal"><li>in <a href="'. get_category_link(1) .'">'. $category[0]->cat_name .'</a></li></ul>';
										echo '</div>';
									echo '</div>';
									echo '</div>';

	}
	wp_reset_postdata();
	return ob_get_clean();
};

/*Latest News*/
vc_map( array(
	"name" => __("Latest News Style #3",'insomnia'),
	"base" => "vc_latest_news_three",
	"category" => __('Insomnia','insomnia'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "id",
			"heading" => __("Post Item", 'insomnia'),
			"value" => '',
			"admin_label" => true,
			"description" => __( "Post ID", 'insomnia' )
		)
	)
) );











