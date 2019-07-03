<?php
/*PORTFOLIO  ITEM*/
add_shortcode('vc_portfolio_item_2', 'vc_portfolio_item_2_f');
function vc_portfolio_item_2_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'id' => '',
			'height' => '293px',
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
	
       $output ='<div class="portfolio-dankov" style="height:'.$height.';">';
        	$output .='<figure class="effect-goliath" style="background:url('.$image[0].')">';
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
	"name" => __("Portfolio Item #2",'dankov'),
	"base" => "vc_portfolio_item_2",
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
		array(
			"type" => "textfield",
			"param_name" => "height",
			"heading" => __("Size", "dankov"),
			"value" => '293px',
			"admin_label" => true,
			"description" => __( "Picture height in px. for example: 300px", 'dankov' )
		)
	)
) );
