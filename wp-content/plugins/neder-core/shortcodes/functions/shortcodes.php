<?php
/* LISTS */

function neder_list ( $attr, $content = null ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"type"	=> ''
				), 
				$attr)
		);	
		$return = '<ul class="neder_'.$type.'">' . do_shortcode($content) . '</ul>';
		
		return $return;
}

add_shortcode("neder_list", "neder_list");

function neder_list_item ( $attr, $content = null ) {	
	$return = '<li>' . do_shortcode($content) . '</li>';
	return $return;
}

add_shortcode("neder_list_item", "neder_list_item");

function neder_typography ( $attr, $content = null ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"background" => '',
					"color" => ''
				), 
				$attr)
		);	
		$return = '<span style="margin:5px;padding:5px;background:'.$background.';color:'.$color.';">' . do_shortcode($content) . '</span>';
		
		return $return;
}

add_shortcode("neder_typography", "neder_typography");

function neder_blockquotes ( $attr, $content = null ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"background" => '',
					"color" => '',
					"align" => '',
				), 
				$attr)
		);	
		$return = '<blockquotes class="neder-blockquotes neder-blockquotes-'.$align.'" style="background:'.$background.';color:'.$color.';border-left-color:'.$color.';">' . do_shortcode($content) . '</blockquotes>';
		
		return $return;
}

add_shortcode("neder_blockquotes", "neder_blockquotes");

function neder_dropcaps ( $attr, $content = null ) {	
		
		static $instance = 0;
		$instance++;	
				
		extract(
			shortcode_atts(
				array(
					"background" => '',
					"color" => '',
					"align" => '',
				), 
				$attr)
		);	
		$return = '<div class="neder-dropcaps neder-dropcaps-'.$align.'"><span class="neder-dropcaps-element" style="background:'.$background.';color:'.$color.';">'.$content[0].'</span>' . do_shortcode(substr($content, 1)) . '</div>';
		
		return $return;
}

add_shortcode("neder_dropcaps", "neder_dropcaps");

/* COLUMNS */

function neder_open_row( $atts, $content = null ) {
    return '<div class="neder-columns-row">';
}
add_shortcode('neder_open_row', 'neder_open_row');

function neder_close_row( $atts, $content = null ) {
    return '<div class="neder-clear"></div></div>';
}
add_shortcode('neder_close_row', 'neder_close_row');

function neder_one_third( $atts, $content = null ) {
    return '<div class="col-xs-4">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_one_third', 'neder_one_third');
     
function neder_two_third( $atts, $content = null ) {
    return '<div class="col-xs-8">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_two_third', 'neder_two_third');
     
function neder_one_half( $atts, $content = null ) {
    return '<div class="col-xs-6">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_one_half', 'neder_one_half');
     
function neder_one_fourth( $atts, $content = null ) {
    return '<div class="col-xs-3">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_one_fourth', 'neder_one_fourth');
     
function neder_three_fourth( $atts, $content = null ) {
    return '<div class="col-xs-9">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_three_fourth', 'neder_three_fourth');
     
function neder_one_sixth( $atts, $content = null ) {
    return '<div class="col-xs-2">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_one_sixth', 'neder_one_sixth');
     
function neder_five_sixth( $atts, $content = null ) {
    return '<div class="col-xs-10">' . do_shortcode($content) . '</div>';
}
add_shortcode('neder_five_sixth', 'neder_five_sixth');

?>