<?php
/*PORTFOLIO  ITEM*/
add_shortcode('vc_portfolio_item', 'vc_portfolio_item_f');
function vc_portfolio_item_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'id' => '',
			'height' => '',
		), $atts)
	);
	$post = get_post($id);
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'wall-portfolio-15'); 
	$title = $post->post_title;
	$catt = get_the_terms( $id, 'portfolio-category' );
	if (isset($catt) && ($catt!='')){
		$slugg = '';
		$slug = ''; 
		foreach($catt  as $vallue=>$key){
			$slugg .= strtolower($key->slug) . " ";
			$slug  .= ''.$key->name.', ';
		}
		
	};
	
        $output ='<div class="portfolio-dankov">';
               $output .='<figure class="effect-goliath">';
                $output .='<img src="'.$image[0].'" alt="img23"/>';
                $output .='<figcaption>';
                  $output .='<div class="icon-links">';
                    $output .='<a href="'.get_the_permalink($id).'" class="cbp-singlePageInline attach-icon"><i class="pe-7s-link"></i></a>';
                    $output .='<a href="'.$image[0].'" class="cbp-lightbox search-icon" data-gal="prettyphoto"><i class="pe-7s-search"></i></a>';
                  $output .='</div>';
                  $output .='<p>'.$title.'</p>';
                $output .='</figcaption>';
              $output .='</figure>';
            $output .='</div>';
	
	return $output;
};

vc_map( array(
	"name" => __("Portfolio Item",'dankov'),
	"base" => "vc_portfolio_item",
	"category" => __('Insomnia','dankov'),
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "id",
			"heading" => __("Portfolio Item", "dankov"),
			"value" => '',
			"admin_label" => true,
			"description" => __( "Portfolio ID", 'dankov' )
		),
	)
) );






