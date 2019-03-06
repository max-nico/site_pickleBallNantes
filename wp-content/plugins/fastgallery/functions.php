<?php
/*
File: inc/assets.php
Description: FUNCTIONS
Plugin: FAST GALLERY
Author: Ad-theme.com
*/


// ADD SIZE

function fastgallery_add_image_sizes() {

add_image_size( 'fg-masonry', 500 );
add_image_size( 'fg-normal', 800 , 800 , true);
add_image_size( 'fg-fotorama', 1000 );

}

add_action( 'init', 'fastgallery_add_image_sizes' );



//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
 
//activate own function
add_shortcode('gallery', 'fastgallery_gallery_shortcode');
function fastgallery_gallery_shortcode($attr) {
	$post = get_post();
 
	static $instance = 0;
	$instance++;
 
	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
		$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}
 
	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
	return $output;
 
	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
		unset( $attr['orderby'] );
	}
 
	extract(shortcode_atts(array(
		'order' => 'ASC',
		'orderby' => 'menu_order ID',
		'id' => $post ? $post->ID : 0,
		'itemtag' => 'div',
		'icontag' => 'div',
		'captiontag' => 'div',
		'columns' => 3,
		'size' => 'fg-normal',
		'include' => '',
		'exclude' => '',
		'link' => 'file', // CHANGE #1
		'fg_type' => 'prettyphoto',
		'fg_responsive' => 'fg_responsive',
		'fg_style' => 'fg_style1',
		'fg_over_image' => 'fg_over_image_on',
		'fg_main_color' => '#000',
		'fg_main_color_opacity' => '0.7',
		'fg_secondary_color' => '#000',
		'fg_thumbs_one' => 'fg_thumbs_one_off',
		'fg_autoplay' => 'true',
		'fg_nav' =>'thumbs',
		'fg_navposition' => 'bottom',
		'fg_allowfullscreen' =>'true',
		'fg_transition' => 'slide',
		'fg_arrow' => 'true',
		'fg_fit' => 'none',
		'fg_loop' => 'true',		
		
	), $attr, 'gallery'));
 
	$id = intval($id);
	if ( 'RAND' == $order )
	$orderby = 'none';
 
	if ( !empty($include) ) {
	$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
	$attachments = array();
	foreach ( $_attachments as $key => $val ) {
		$attachments[$val->ID] = $_attachments[$key];
	}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
 
	if ( empty($attachments) )
	return '';
 
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
		$output .= fastgallery_wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
 
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
	$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
	$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
	$icontag = 'dt';
 
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
 
 
 
 
 
 
 	// CHECK MAIN COLOR
	$check_color = stripos($fg_main_color, '#');
	if ($check_color === false) {
		$rgb_main_color = fastgalleryhex2rgb('#000');
	} else {
		$rgb_main_color = fastgalleryhex2rgb($fg_main_color);
	}
	$rgba_main_color = "rgba( ".$rgb_main_color[0]." , ".$rgb_main_color[1]." , ".$rgb_main_color[2]." , ".$fg_main_color_opacity.")";	
 	
	$check_color = stripos($fg_secondary_color, '#');
	if ($check_color === false) {
		$rgb_secondary_color = fastgalleryhex2rgb('#000');
	} else {
		$rgb_secondary_color = fastgalleryhex2rgb($fg_secondary_color);
	}
	$rgba_secondary_color = "rgba( ".$rgb_secondary_color[0]." , ".$rgb_secondary_color[1]." , ".$rgb_secondary_color[2]." , 0.3)";	
	// END MAIN COLOR
 
	$selector = "gallery-{$instance}";
 
	$gallery_style = $gallery_div = '';
	//if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
			margin: auto;
			}
			#{$selector} .fg-gallery-item {
			float: {$float};
			margin-top: 10px;
			text-align: center;
			width: {$itemwidth}%;
			}
			#{$selector} .fg-gallery-caption {
			margin-left: 0;
			}
			#{$selector}.fastgallery .fg-gallery-caption, 
			#{$selector}.fastgallery .fg-gallery-caption:hover {
				background-color:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.gallery .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery.gallery .gallery-icon .fg_zoom a:hover {
				color:".$fg_main_color.";
			}
			#{$selector}.fastgallery.fg_style1 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			#{$selector}.fastgallery.gallery.fg_style2 .gallery-icon .fg_zoom a {
				background:".$rgba_secondary_color.";
			}
			#{$selector}.fastgallery.fg_style2 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}			
			#{$selector}.fastgallery.gallery.fg_style3 .fg_zoom, #{$selector}.fastgallery.gallery.fg_style3 .fg_zoom:hover {
				background:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.fg_style3 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}				
			#{$selector}.fastgallery.fg_style4 .fg-gallery-caption,			
			#{$selector}.fastgallery.gallery.fg_style4 .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery.gallery.fg_style4 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.gallery.fg_style4 .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery.gallery.fg_style4 .gallery-icon .fg_zoom a:hover	{
				background:".$rgba_main_color.";
			}			
			#{$selector}.fastgallery.gallery.fg_style5 .gallery-icon .fg_zoom a, 
			#{$selector}.fastgallery.gallery.fg_style5 .gallery-icon .fg_zoom a:hover	{
				color:".$fg_secondary_color.";
				background-color:".$rgba_main_color.";
			}					
			#{$selector}.fastgallery.gallery.fg_style6 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery.gallery.fg_style6 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}
		
			#{$selector}.fastgallery.fg_style6 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			#{$selector}.fastgallery.gallery.fg_style7 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery.gallery.fg_style7 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastgallery.fg_style7 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			
			#{$selector}.fastgallery.gallery.fg_style8 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery.gallery.fg_style8 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}
		
			#{$selector}.fastgallery.fg_style8 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			
			#{$selector}.fastgallery.gallery.fg_style9 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery.gallery.fg_style9 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastgallery.fg_style9 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			
			#{$selector}.fastgallery.gallery.fg_style10 .gallery-icon .fg_zoom a,
			#{$selector}.fastgallery.gallery.fg_style10 .gallery-icon .fg_zoom a:hover {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastgallery.fg_style10 .fg-gallery-caption {
				color:".$fg_secondary_color.";	
			}
			/* FOTORAMA */
			#{$selector}.fastgallery.fotorama.fg_style1 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style1 .fotorama__html > div {
				background:".$rgba_main_color.";
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style2 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style2 .fotorama__html > div {
				background:".$rgba_main_color.";
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style3 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style3 .fotorama__html > div {
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style4 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style4 .fotorama__html > div {
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style5 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
				background:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style5 .fotorama__html > div {
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style6 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
				background:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style6 .fotorama__html > div {
				color:".$fg_secondary_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style7 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
				background:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style7 .fotorama__html > div {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style8 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
				background:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style8 .fotorama__html > div {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style9 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
				background:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style9 .fotorama__html > div {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";
			}
			#{$selector}.fastgallery.fotorama.fg_style10 .fotorama__thumb-border {
				border-color:".$rgba_main_color.";
				background:".$rgba_main_color.";
			}						
			#{$selector}.fastgallery.fotorama.fg_style10 .fotorama__html > div {
				color:".$fg_secondary_color.";
				background:".$rgba_main_color.";
			}
			/* THUMBS ONE ON */
			#{$selector}.fastgallery.fg_thumbs_one .fg-gallery-item {
				display:none;
			}
			#{$selector}.fastgallery.fg_thumbs_one .fg-gallery-item:first-child {
				display:block;
			}
			#{$selector}.fastgallery.fg_thumbs_one {
				width:auto!important;
			}
		/* see gallery_shortcode() in wp-includes/media.php */
		</style>";	
	
	
	
	
	// PHOTOBOX
	if($fg_type == 'photobox') { // PHOTOBOX CSS/JS
	

		$gallery_script = '<script type="text/javascript">
			jQuery(function($){
				$(\'#'.$selector.'\').photobox(\'a\', { 
					thumbs: true, 
					time: 2000,
					autoplay: true,
					counter: true				 
				});
			});
		</script>';
		
	} // CLOSE PHOTOBOX CSS/JS
	
	
	// PRETTYPHOTO
	if($fg_type == 'prettyphoto') {
		$gallery_script = '<script type="text/javascript">		
		jQuery(function($){
			jQuery(document).ready(function($){
					$("#'.$selector.' a[data-rel^=\'prettyPhoto\']").prettyPhoto();
			}); 
		});
		</script>';
	}
	
	// MAGNIFIC POPUP
	if($fg_type == 'magnific-popup') {
		$gallery_script = '<script type="text/javascript">
			jQuery(function($){
  				$(\'#'.$selector.' .fg_magnificPopup\').magnificPopup({
		  			type: \'image\',					
		  			gallery:{
						enabled:true
  					}
					});
			});		
		</script>';
	}
	
	
	
	
	// FOTORAMA
	if($fg_type == 'fotorama') {
		
	$gallery_script = "<script type=\"text/javascript\">
		jQuery(function($){
			$('#$selector.fastgallery').fotorama({
			  	width: '100%',
			  	maxwidth: '100%', 			  
				autoplay: '".$fg_autoplay."',";
				if($fg_nav != 'dot') { 
					$gallery_script .= "nav: '".$fg_nav."',"; 
				}	
	$gallery_script .=	"navposition: '".$fg_navposition."',
				allowfullscreen: '".$fg_allowfullscreen."',
				transition: '".$fg_transition."',
				arrow: '".$fg_arrow."',
				fit: '".$fg_fit."',
				loop: '".$fg_loop."'			  
			});
		});
		</script>";
	}
	
	if($fg_type == 'custom_url') {
		$gallery_script = '';
	}
	
	
	
		
	$size_class = sanitize_html_class( $size );
	// != FOTORAMA
	if($fg_type == 'fotorama') {	
		$gallery_div = "<div id='$selector' class='fastgallery ".$fg_style."'>";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_script . "\n\t\t" . $gallery_div );
	} elseif ($fg_thumbs_one == 'fg_thumbs_one') {
		$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class} fastgallery ".$fg_responsive." ".$fg_style." ".$fg_thumbs_one." ".$fg_over_image."'>";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_script . "\n\t\t" . $gallery_div );		
	} else {
		$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class} fastgallery brick-masonry ".$fg_responsive." ".$fg_style." ".$fg_thumbs_one." ".$fg_over_image."'>";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_script . "\n\t\t" . $gallery_div );
	}
	
 

 
 
 	// IF FOTORAMA CHANGE FOREACH
 	if($fg_type == 'fotorama') {	
 
 		foreach ( $attachments as $id => $attachment ) {
 
			$image_url = wp_get_attachment_image_src( $id, 'fg-fotorama' );
			$attachment_caption_array = get_post( $id );
			$attachment_caption	= $attachment_caption_array->post_excerpt;
			if(empty($attachment_caption)) { $attachment_caption = ' '; }
 			$output .= '<div data-img="'.$image_url[0].'">'.$attachment_caption.'</div>';

		}
 
 
 
 		$output .= '<div style="clear:both"></div>';
 
 
	} else { 
		$i = 0;
		foreach ( $attachments as $id => $attachment ) {
		// CHECK CAPTION
		$caption_check = '';
		if(empty($attachment->post_excerpt)) {
			$caption_check = 'no-caption';
		}
		// END CHECK CAPTION
		
		// IF CUSTOM URL
		if($fg_type == 'custom_url') {
			$image_output = fastgallery_wp_get_attachment_custom_link( $id, $size, true, false);			
		} else {
			$image_output = fastgallery_wp_get_attachment_link( $id, $size, true, false);
		}
		$image_meta = wp_get_attachment_metadata( $id );
	 
		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
		$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
	 	
		if($fg_thumbs_one == 'fg_thumbs_one') {
			
			$output .= "<{$itemtag} class='fg-gallery-item'>";
		
		} else {
			
			$output .= "<{$itemtag} class='fg-gallery-item'>";
		}
		
		
		$output .= "
		<{$icontag} class='gallery-icon {$orientation} $caption_check'>
		$image_output
	
		";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
		$output .= "
		<{$captiontag} class='fg-wp-caption-text fg-gallery-caption'><div class='caption-container'>
		" . wptexturize($attachment->post_excerpt) . "
		</div></{$captiontag}>";
		}
		$output .= "</{$icontag}></{$itemtag}>";
		}
	 

	}
		$output .= "
		</div>\n";	
	return $output;
}
 
 
function fastgallery_wp_get_attachment_link( $id = 0, $size = 'fastgallery-masonry', $permalink = true, $icon = false, $text = false, $type = 'prettyphoto' ) {
	$id = intval( $id );
	$_post = get_post( $id );
	static $instance_prettyphoto = 0;
	$instance_prettyphoto++;
	if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
	return __( 'Missing Attachment' );
	 
	if ( $permalink )
	// $url = get_attachment_link( $_post->ID ); // we want the "large" version!!
	// FIX!! ask for large URL
	$image_attributes = wp_get_attachment_image_src( $_post->ID, 'large' );
	$url = $image_attributes[0];
	
	$attachment_caption_array = get_post( $_post->ID );
	$attachment_caption	= $attachment_caption_array->post_excerpt;
	
	// $url = wp_get_attachment_image( $_post->ID, 'large' );
	 
	$post_title = esc_attr( $_post->post_title );
	 
	if ( $text )
	$link_text = $text;
	elseif ( $size && 'none' != $size )
	$link_text = wp_get_attachment_image( $id, $size, $icon );
	else
	$link_text = '';
	 
	if ( trim( $link_text ) == '' )
	$link_text = $_post->post_title;
	
	
	return apply_filters( 'wp_get_attachment_link', "<div class='fg_zoom'>$link_text<a href='$url' title=\"$attachment_caption\" data-rel='prettyPhoto[album]' class='fg_magnificPopup'><span class='fg-zoom-icon icon-plus'></span><span style='display:none'>$link_text</span></a></div>", $id, $size, $permalink, $icon, $text );
}

function fastgallery_wp_get_attachment_custom_link( $id = 0, $size = 'fastgallery-masonry', $permalink = true, $icon = false, $text = false, $type = 'prettyphoto' ) {
	$id = intval( $id );
	$_post = get_post( $id );
	static $instance_prettyphoto = 0;
	$instance_prettyphoto++;
	if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
	return __( 'Missing Attachment' );
	 
	if ( $permalink )
	// $url = get_attachment_link( $_post->ID ); // we want the "large" version!!
	// FIX!! ask for large URL
	$image_attributes = wp_get_attachment_image_src( $_post->ID, 'large' );
	$url = get_post_meta( $id, '_custom_url', true );
	
	$attachment_caption_array = get_post( $_post->ID );
	$attachment_caption	= $attachment_caption_array->post_excerpt;
	
	// $url = wp_get_attachment_image( $_post->ID, 'large' );
	 
	$post_title = esc_attr( $_post->post_title );
	 
	if ( $text )
	$link_text = $text;
	elseif ( $size && 'none' != $size )
	$link_text = wp_get_attachment_image( $id, $size, $icon );
	else
	$link_text = '';
	 
	if ( trim( $link_text ) == '' )
	$link_text = $_post->post_title;
	
	
	return apply_filters( 'wp_get_attachment_link', "<div class='fg_zoom'>$link_text<a href='$url' target='_blank' title=\"$attachment_caption\"><span class='fg-zoom-icon icon-plus'></span></a></div>", $id, $size, $permalink, $icon, $text );
}



function fastgalleryhex2rgb($hex) {

   $hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
}

add_filter('widget_text', 'do_shortcode');

add_action( 'after_setup_theme', 'fix_fastgallery' ); 
function fix_fastgallery() {
	remove_shortcode('gallery');
	add_shortcode('gallery', 'fastgallery_gallery_shortcode');
}
?>