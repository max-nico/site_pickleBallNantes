<?php
/*
File: inc/assets.php
Description: FUNCTIONS
Plugin: FAST CAROUSEL
Author: Ad-theme.com
*/


// ADD SIZE

function fastcarousel_add_image_sizes() {

	add_image_size( 'fc-normal', 800 , 800 , true);
	add_image_size( 'fc-lightbox', 1024 , 800 , true);
	
}

add_action( 'init', 'fastcarousel_add_image_sizes' );
 
add_shortcode('fastcarousel', 'fastcarousel_gallery_shortcode');
function fastcarousel_gallery_shortcode($attr) {
	$post = get_post();
 
	static $instance = 0;
	$instance++;
 
	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) )
		$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}
 
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
		'size' => 'fc-normal',
		'include' => '',
		'exclude' => '',
		'link' => 'file',
		'fc_type' => 'prettyphoto',
		'fc_style' => 'fc_style1',
		'fc_over_image' => 'fc_over_image_on',
		'fc_thumbs_size' => 'fc-normal',
		'fc_lightbox_size' => 'fc-lightbox',
		'fc_lightbox_icon' => 'plus',
		'fc_image_width' => 'small',
		'fc_main_color' => '#000', 
		'fc_main_color_opacity' => '0.7',
		'fc_secondary_color' => '#FFF',
		'fc_thumbs_one' => 'fc_thumbs_one_off',
		'fc_navigation' => 'true',
		'fc_dots' => 'false', 
		'fc_lazy_load'	=> 'false',   
		'fc_item_show'		=> '4', 
		'fc_item_show_900'	=> '3',
		'fc_item_show_600'	=> '1',
		'fc_autoplay'		=> '2000',
		'fc_margin'		=> '0',
		'fc_loop'		=> 'true',
		'fc_nav_style'	=> 'fc_nav_style1',
		'fc_speed'	=> '',
		'fc_rtl'	=> 'false'
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
		$output .= fastcarousel_wp_get_attachment_link($att_id, $fc_thumbs_size, true) . "\n";
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
	$check_color = stripos($fc_main_color, '#');
	if ($check_color === false) {
		$rgb_main_color = fastcarouselhex2rgb('#000');
	} else {
		$rgb_main_color = fastcarouselhex2rgb($fc_main_color);
	}
	$rgba_main_color = "rgba( ".$rgb_main_color[0]." , ".$rgb_main_color[1]." , ".$rgb_main_color[2]." , ".$fc_main_color_opacity.")";	
 	
	$check_color = stripos($fc_secondary_color, '#');
	if ($check_color === false) {
		$rgb_secondary_color = fastcarouselhex2rgb('#FFF');
	} else {
		$rgb_secondary_color = fastcarouselhex2rgb($fc_secondary_color);
	}
	$rgba_secondary_color = "rgba( ".$rgb_secondary_color[0]." , ".$rgb_secondary_color[1]." , ".$rgb_secondary_color[2]." , 0.3)";	
	// END MAIN COLOR
 
	$selector = "gallery-{$instance}";
 
	$gallery_style = $gallery_div = '';
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
			margin: auto;
			}
			#{$selector} .fg-gallery-caption {
			margin-left: 0;
			}
			#{$selector}.fastcarousel .fg-gallery-caption, 
			#{$selector}.fastcarousel .fg-gallery-caption:hover {
				background-color:".$rgba_main_color.";
			}
			#{$selector}.fastcarousel.gallery .gallery-icon .fc_zoom a, 
			#{$selector}.fastcarousel.gallery .gallery-icon .fc_zoom a:hover {
				color:".$fc_main_color.";
			}
			#{$selector}.fastcarousel.fc_style1 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}
			#{$selector}.fastcarousel.gallery.fc_style2 .gallery-icon .fc_zoom a {
				background:".$rgba_secondary_color.";
			}
			#{$selector}.fastcarousel.fc_style2 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}			
			#{$selector}.fastcarousel.gallery.fc_style3 .fc_zoom, 
			#{$selector}.fastcarousel.gallery.fc_style3 .fc_zoom:hover {
				background:".$rgba_main_color.";
			}
			#{$selector}.fastcarousel.fc_style3 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}				
			#{$selector}.fastcarousel.fc_style4 .fg-gallery-caption,			
			#{$selector}.fastcarousel.gallery.fc_style4 .gallery-icon .fc_zoom a, 
			#{$selector}.fastcarousel.gallery.fc_style4 .gallery-icon .fc_zoom a:hover {
				color:".$fc_secondary_color.";
			}
			#{$selector}.fastcarousel.gallery.fc_style4 .gallery-icon .fc_zoom a, 
			#{$selector}.fastcarousel.gallery.fc_style4 .gallery-icon .fc_zoom a:hover	{
				background:".$rgba_main_color.";
			}			
			#{$selector}.fastcarousel.gallery.fc_style5 .gallery-icon .fc_zoom a, 
			#{$selector}.fastcarousel.gallery.fc_style5 .gallery-icon .fc_zoom a:hover	{
				color:".$fc_secondary_color.";
				background-color:".$rgba_main_color.";
			}					
			#{$selector}.fastcarousel.gallery.fc_style6 .gallery-icon .fc_zoom a,
			#{$selector}.fastcarousel.gallery.fc_style6 .gallery-icon .fc_zoom a:hover {
				color:".$fc_secondary_color.";
				background:".$rgba_main_color.";				
			}
		
			#{$selector}.fastcarousel.fc_style6 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}
			#{$selector}.fastcarousel.gallery.fc_style7 .gallery-icon .fc_zoom a,
			#{$selector}.fastcarousel.gallery.fc_style7 .gallery-icon .fc_zoom a:hover {
				color:".$fc_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastcarousel.fc_style7 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}
			
			#{$selector}.fastcarousel.gallery.fc_style8 .gallery-icon .fc_zoom a,
			#{$selector}.fastcarousel.gallery.fc_style8 .gallery-icon .fc_zoom a:hover {
				color:".$fc_secondary_color.";
				background:".$rgba_main_color.";				
			}
		
			#{$selector}.fastcarousel.fc_style8 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}
			
			#{$selector}.fastcarousel.gallery.fc_style9 .gallery-icon .fc_zoom a,
			#{$selector}.fastcarousel.gallery.fc_style9 .gallery-icon .fc_zoom a:hover {
				color:".$fc_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastcarousel.fc_style9 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}
			
			#{$selector}.fastcarousel.gallery.fc_style10 .gallery-icon .fc_zoom a,
			#{$selector}.fastcarousel.gallery.fc_style10 .gallery-icon .fc_zoom a:hover {
				color:".$fc_secondary_color.";
				background:".$rgba_main_color.";				
			}		
			#{$selector}.fastcarousel.fc_style10 .fg-gallery-caption {
				color:".$fc_secondary_color.";	
			}
			/* THUMBS ONE ON */
			#{$selector}.fastcarousel.fc_thumbs_one .fg-gallery-item {
				display:none;
			}
			#{$selector}.fastcarousel.fc_thumbs_one .fg-gallery-item:first-child {
				display:block;
			}
			#{$selector}.fastcarousel.fc_thumbs_one {
				width:auto!important;
			}
			#{$selector}.fastcarousel.owl-theme .owl-controls .owl-nav [class*=\"owl-\"] {
				background:".$rgba_main_color.";
				color:".$fc_secondary_color.";
			}
			#{$selector}.fastcarousel.owl-theme .owl-controls .owl-nav [class*=\"owl-\"]:hover {
				background:".$fc_main_color.";
			}
			#{$selector}.fastcarousel.owl-theme .owl-dots .owl-dot span {
				background:".$fc_main_color.";
			}
			#{$selector}.fastcarousel.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
				background:".$rgba_main_color.";
			}			
			";
		

				if($fc_lightbox_icon == 'image') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e900"!important;
					}';
				}	
				if($fc_lightbox_icon == 'images') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e901"!important;
					}';
				}
				if($fc_lightbox_icon == 'file') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e902"!important;
					}';
				}					
				if($fc_lightbox_icon == 'spinner') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e903"!important;
					}';
				}
				if($fc_lightbox_icon == 'spinner2') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e904"!important;
					}';
				}
				if($fc_lightbox_icon == 'heart') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e85c"!important;
					}';
				}
				if($fc_lightbox_icon == 'heart2') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e85d"!important;
					}';
				}				
				if($fc_lightbox_icon == 'star') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e85e"!important;
					}';
				}
				if($fc_lightbox_icon == 'star2') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e85f"!important;
					}';
				}				
				if($fc_lightbox_icon == 'search') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e867"!important;
					}';
				}
				if($fc_lightbox_icon == 'link') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e86b"!important;
					}';
				}					
				if($fc_lightbox_icon == 'camera') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e871"!important;
					}';
				}									
				if($fc_lightbox_icon == 'pictures') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e8df"!important;
					}';
				}	
				if($fc_lightbox_icon == 'info') {
					$gallery_style .= '#'.$selector.'.fastcarousel .gallery-icon .icon-plus4:before {	
										content: "\e8c6"!important;
					}';
				}
				
				
				if($fc_image_width == 'small') {
					$gallery_style .= "#{$selector}.fastcarousel span {
										font-size:20px!important;
					}
					#{$selector}.fastcarousel .gallery-icon .fg-zoom-icon {
										margin-left:-10px!important;
										margin-top:-40px;
					}
					#{$selector}.fastcarousel.fg_style2 .gallery-icon .fg-zoom-icon,
					#{$selector}.fastcarousel.fg_style5 .gallery-icon .fg-zoom-icon  {
										margin-top:-10px;
					}		
					#{$selector}.fastcarousel .gallery-icon.no-caption .fg-zoom-icon {
										margin-top:-10px!important;
					}
					#{$selector}.fastcarousel.fg_style7 .fg-gallery-caption,
					#{$selector}.fastcarousel.fg_style8 .fg-gallery-caption {
										top:55%;
					}
					";
				}
				
				if($fc_image_width == 'medium') {
					$gallery_style .= "#{$selector}.fastcarousel.gallery span {
										font-size:30px!important;
					}
					#{$selector}.fastcarousel .gallery-icon .fg-zoom-icon {
										margin-left:-15px!important;
										margin-top:-40px;
					}
					#{$selector}.fastcarousel.fg_style2 .gallery-icon .fg-zoom-icon,
					#{$selector}.fastcarousel.fg_style5 .gallery-icon .fg-zoom-icon  {
										margin-top:-15px;
					}		
					#{$selector}.fastcarousel .gallery-icon.no-caption .fg-zoom-icon {
										margin-top:-15px!important;
					}
					#{$selector}.fastcarousel.fg_style7 .fg-gallery-caption,
					#{$selector}.fastcarousel.fg_style8 .fg-gallery-caption {
										top:55%;
					}
					";
				}
		
				if($fc_image_width == 'large') {
					$gallery_style .= "#{$selector}.fastcarousel.gallery span {
										font-size:50px!important;
					}
					#{$selector}.fastcarousel .gallery-icon .fg-zoom-icon {
										margin-left:-25px!important;
										margin-top:-50px;
					}
					#{$selector}.fastcarousel.fg_style2 .gallery-icon .fg-zoom-icon,
					#{$selector}.fastcarousel.fg_style5 .gallery-icon .fg-zoom-icon {
										margin-top:-25px;
					}		
					#{$selector}.fastcarousel .gallery-icon.no-caption .fg-zoom-icon {
										margin-top:-25px!important;
					}
					#{$selector}.fastcarousel.fg_style7 .fg-gallery-caption,
					#{$selector}.fastcarousel.fg_style8 .fg-gallery-caption {
										top:55%;
					}
					";
				}					
				
						
		if($fc_type == 'only_image') {
					$gallery_style .= "
						#{$selector}.fastcarousel .fc_zoom a {
							display:none;	
						}
					";
		}
	
	$gallery_style .= '</style>';
	
	wp_enqueue_style( 'fc-owl-carousel-css' );	
	wp_enqueue_script('fc-owl.carousel-js');

	if(empty($fc_speed) || $fc_speed == '') {
		$fc_speed = '1000';
	}
		$gallery_script = '<script type="text/javascript">
					jQuery(document).ready(function($){
					$(\'#'.$selector.'\').owlCarousel({
						loop:'.$fc_loop.',
						margin:'.$fc_margin.',
						nav:'.$fc_navigation.',
						lazyLoad: '.$fc_lazy_load.',
						autoplayHoverPause: true,
						smartSpeed: '.$fc_speed.',
						dots:'.$fc_dots.',';
		if(!empty($fc_autoplay) || $fc_autoplay != '') { 
				$gallery_script .= 'autoplay: true,
				autoplayTimeout: '.$fc_autoplay.',';
		}
		
		if($fc_rtl == 'true') { 
			$gallery_script .= 'rtl: true,';
		}
		
		$gallery_script .= 'navText: [\'<i class="icon-arrow-left8"></i>\',\'<i class="icon-arrow-right8"></i>\'],
						responsive:{
							0:{
								items:'.$fc_item_show_600.'
							},
							600:{
								items:'.$fc_item_show_600.'
							},
							700:{
								items:'.$fc_item_show_600.'
							},
							800:{
								items:'.$fc_item_show_900.'
							},
							900:{
								items:'.$fc_item_show_900.'
							},
							1000:{
								items:'.$fc_item_show_900.'
							},
							1200:{
								items:'.$fc_item_show.'
							}
							
						}
					});
				});		
				</script>';	
	
	// PHOTOBOX
	if($fc_type == 'photobox') { // PHOTOBOX CSS/JS
		wp_enqueue_style( 'photobox' );	
 		wp_enqueue_style( 'photoboxie' );	
		wp_enqueue_style( 'photobox-style' );
		wp_enqueue_script('photobox-js');
		
		$gallery_script .= '<script type="text/javascript">
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
	if($fc_type == 'prettyphoto') {
		wp_enqueue_style( 'prettyPhoto' );
		wp_enqueue_script('prettyPhoto-js');
		
		$gallery_script .= '<script type="text/javascript">		
		jQuery(function($){
			jQuery(document).ready(function($){
					$("#'.$selector.' a[data-rel^=\'fc_prettyPhoto\']").prettyPhoto();
			}); 
		});
		</script>';
	}
	
	// MAGNIFIC POPUP
	if($fc_type == 'magnific-popup') {
		wp_enqueue_style( 'magnific-popup' );
		wp_enqueue_script('magnific-popup-js');
		
		$gallery_script .= '<script type="text/javascript">
			jQuery(function($){
  				$(\'#'.$selector.' .fc_magnificPopup\').magnificPopup({
		  			type: \'image\',					
		  			gallery:{
						enabled:true
  					}
					});
			});		
		</script>';
	}
	
	if($fc_type == 'custom_url') {
		$gallery_script .= '';
	}
	
	
	
		
	$size_class = sanitize_html_class( $fc_thumbs_size );

	if ($fc_thumbs_one == 'fc_thumbs_one') {
		$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-size-{$size_class} fastcarousel ".$fc_style." ".$fc_thumbs_one." ".$fc_over_image." ".$fc_nav_style." owl-carousel'>";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_script . "\n\t\t" . $gallery_div );		
	} else {
		$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-size-{$size_class} fastcarousel ".$fc_style." ".$fc_thumbs_one." ".$fc_over_image." ".$fc_nav_style." owl-carousel'>";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_script . "\n\t\t" . $gallery_div );
	}
	
 
		$i = 0;
		foreach ( $attachments as $id => $attachment ) {
		// CHECK CAPTION
		$caption_check = '';
		if(empty($attachment->post_excerpt)) {
			$caption_check = 'no-caption';
		}
		// END CHECK CAPTION
		
		// IF CUSTOM URL
		if($fc_type == 'custom_url') {
			$image_output = fastcarousel_wp_get_attachment_custom_link( $id, $fc_thumbs_size, true, false);			
		} else {
			$image_output = fastcarousel_wp_get_attachment_link( $id, $fc_thumbs_size, true, false, false, $fc_type, $fc_lightbox_size);
		}
		$image_meta = wp_get_attachment_metadata( $id );
	 
		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
		$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
	 	
		if($fc_thumbs_one == 'fc_thumbs_one') {
			
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

		$output .= "
		</div>\n";	
	return $output;
}
 
 
function fastcarousel_wp_get_attachment_link( $id = 0, $fc_thumbs_size = 'fc-normal', $permalink = true, $icon = false, $text = false, $type = 'prettyphoto', $fc_lightbox_size ) {
	$id = intval( $id );
	$_post = get_post( $id );
	static $instance_prettyphoto = 0;
	$instance_prettyphoto++;
	if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
	return __( 'Missing Attachment' );
	 
	if ( $permalink )
	// $url = get_attachment_link( $_post->ID ); // we want the "large" version!!
	// FIX!! ask for large URL
	$image_attributes = wp_get_attachment_image_src( $_post->ID, $fc_lightbox_size );
	$url = $image_attributes[0];
	
	$attachment_caption_array = get_post( $_post->ID );
	$attachment_caption	= $attachment_caption_array->post_excerpt;
	
	// $url = wp_get_attachment_image( $_post->ID, 'large' );
	 
	$post_title = esc_attr( $_post->post_title );
	 
	if ( $text )
	$link_text = $text;
	elseif ( $fc_thumbs_size && 'none' != $fc_thumbs_size )
	$link_text = wp_get_attachment_image( $id, $fc_thumbs_size, $icon );
	else
	$link_text = '';
	 
	if ( trim( $link_text ) == '' )
	$link_text = $_post->post_title;
	
	
	return apply_filters( 'wp_get_attachment_link', "<div class='fc_zoom'>$link_text<a href='$url' title=\"$attachment_caption\" data-rel='fc_prettyPhoto[album]' class='fc_magnificPopup'><span class='fg-zoom-icon icon-plus4'></span><span style='display:none'>$link_text</span></a></div>", $id, $fc_thumbs_size, $permalink, $icon, $text );
}

function fastcarousel_wp_get_attachment_custom_link( $id = 0, $fc_thumbs_size = 'fc-normal', $permalink = true, $icon = false, $text = false, $type = 'prettyphoto' ) {
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
	elseif ( $fc_thumbs_size && 'none' != $fc_thumbs_size )
	$link_text = wp_get_attachment_image( $id, $fc_thumbs_size, $icon );
	else
	$link_text = '';
	 
	if ( trim( $link_text ) == '' )
	$link_text = $_post->post_title;
	
	
	return apply_filters( 'wp_get_attachment_link', "<div class='fc_zoom'>$link_text<a href='$url' target='_blank' title=\"$attachment_caption\"><span class='fg-zoom-icon icon-plus4'></span></a></div>", $id, $fc_thumbs_size, $permalink, $icon, $text );
}



function fastcarouselhex2rgb($hex) {

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
	return $rgb;
}

add_filter('widget_text', 'do_shortcode');
?>