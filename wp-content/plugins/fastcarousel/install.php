<?php
/*
File: inc/install.php
Description: Install functions
Plugin: FAST CAROUSEL
Author: Ad-theme.com
*/

/**************************************************************************/
/*********************** REGISTER CUSTOM POST TYPE ************************/
/**************************************************************************/

add_action( 'init', 'fastcarousel_register_posttype' );

function fastcarousel_register_posttype() {

	$labels = array(
		'name'               => __('Fast Carousel', 'fastcarousel'),
		'singular_name'      => __('Carousel', 'fastcarousel'),
		'add_new'            => __('Create New Carousel', 'fastcarousel'),
		'add_new_item'       => __('Create New Carousel', 'fastcarousel'),
		'edit_item'          => __('Edit Carousel', 'fastcarousel'),
		'new_item'           => __('New Carousel', 'fastcarousel'),
		'all_items'          => __('All Carousel', 'fastcarousel'),
		'view_item'          => __('View Carousel', 'fastcarousel'),
		'search_items'       => __('Search Carousel', 'fastcarousel'),
		'not_found'          => __('No Carousel found', 'fastcarousel'),
		'not_found_in_trash' => __('No Carousel found in Trash', 'fastcarousel'),
		'parent_item_colon'  => '',
		'menu_name'          => __('Fast Carousel', 'fastcarousel')
	  );
	
	  $args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'fastcarousel' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'show_in_admin_bar'	 => false,
		'menu_position'      => null,		
		'menu_icon'			 => plugins_url( 'fastcarousel/img/fastcarousel.png'),
		'supports'           => array('title','editor' )
	  );
	
	  register_post_type( 'fastcarousel', $args );

}

/**************************************************************************/
/******************* HIDE PERMALINK CUSTOM POST TYPE **********************/
/**************************************************************************/

add_filter('get_sample_permalink_html', 'adt_fastcarousel_hide_permalinks', 10, 5);

function adt_fastcarousel_hide_permalinks($return, $post_id, $new_title, $new_slug, $post)
{
    if($post->post_type == 'fastcarousel') {
        return '';
    }
    return $return;
}

/**************************************************************************/
/**************************** SHORTCODE BY ID *****************************/
/**************************************************************************/

add_action('admin_init', 'fastcarousel_add_metabox', 1);
function fastcarousel_add_metabox() {
	add_meta_box( 	'fastcarousel_metabox_options', 
			'Shortcode Name', 
			'fastcarousel_metabox_shortcode', 
			'fastcarousel', 
			'normal', 
			'high'
	);
}

function fastcarousel_metabox_shortcode() {
	global $post;
	$fastcarousel_metabox_shortcode = get_post_meta($post->ID, 'fastcarousel_metabox_shortcode', true);
	wp_nonce_field( 'fastcarousel_metabox_shortcode_nonce', 'fastcarousel_metabox_shortcode_nonce' );

?>
        <h2><?php echo __('Shortcode (Copy and past it)'); ?></h2>
        <input readonly type="text" id="fastcarousel_metabox_shortcode" name="fastcarousel_metabox_shortcode" value='[fastcarousel_id id="<?php echo get_the_id(); ?>"]' size="25">

<?php

}

add_action('save_post', 'fastcarousel_metabox_shortcode_save');
function fastcarousel_metabox_shortcode_save($post_id) {   
	if ( ! isset( $_POST['fastcarousel_metabox_shortcode_nonce'] ) ||
	! wp_verify_nonce( $_POST['fastcarousel_metabox_shortcode_nonce'], 'fastcarousel_metabox_shortcode_nonce' ) )
		return;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	
	if (!current_user_can('edit_post', $post_id))
		return;
	
  	$fastcarousel_metabox_shortcode = $_POST['fastcarousel_metabox_shortcode'];
  	update_post_meta( $post_id, 'fastcarousel_metabox_shortcode', $fastcarousel_metabox_shortcode );	

}

function fastcarousel_id ( $attr ) {
	
		extract(
			shortcode_atts(
				array(
					"id" => ''
					), 
					$attr)
		);		
		
		$content = get_post_field('post_content', $id);
		
		$content = str_replace('gallery', 'fastcarousel', $content);
		
		$return = do_shortcode($content);
	
		return $return;
}


add_shortcode("fastcarousel_id", "fastcarousel_id");

add_filter( 'media_view_strings', 'carousel_view_strings');
function carousel_view_strings($strings) {
	  if( get_post_type() == 'fastcarousel') {
		  	$strings["createNewGallery"] 	= __("Create a new Carousel",'fastcarousel');
			$strings["createGalleryTitle"] 	= __("Create Carousel",'fastcarousel');
			$strings["cancelGalleryTitle"] 	= __("&#8592; Cancel Carousel",'fastcarousel');
			$strings["insertGallery"] 		= __("Insert Carousel",'fastcarousel');
			$strings["editGalleryTitle"] 	= __("Edit Carousel",'fastcarousel');
			$strings["updateGallery"] 		= __("Update Carousel",'fastcarousel');
			$strings["addToGallery"] 		= __("Add to Carousel",'fastcarousel');
			$strings["addToGalleryTitle"] 	= __("Add to Carousel",'fastcarousel');
	  }
  return $strings;
}

//***************************************************************************
// Plugin INIT
//***************************************************************************

// ASSETS
require_once(AD_FC_DIR.'assets.php');

// FUNCTION
require_once(AD_FC_DIR.'functions.php');

// CUSTOM MEDIA OPTIONS
require_once(AD_FC_DIR.'media_options.php');

// CUSTOM MEDIA FIELDS
require_once(AD_FC_DIR.'medias_fields.php');


/**************************************************************************/
/******************************* MEDIA BUTTON *****************************/
/**************************************************************************/

function fastcarousel_button( $page = null, $target = null ) {
	global $post;
 	if($post->post_type != 'fastcarousel') {
  		echo '<a href="#" class="button" title="Add Carousel" id="fastcarousel-generator-button"><span class="fastcarousel-button-portfolio"></span>Add Carousel</a>';
 	}
}

add_action( 'media_buttons', 'fastcarousel_button', 100 );

function fastcarousel_generator() {

?>
	<script type="text/ecmascript">
		jQuery(document).ready(function($){
		
			 $("#fastcarousel-generator-button").click(function(){
			  $("#fastcarousel-generator-wrap, #fastcarousel-generator-overlay").show();
			 });
			 
			 $("#fastcarousel-generator-close").click(function(){
			  $("#fastcarousel-generator-wrap, #fastcarousel-generator-overlay").hide();
			 });
				 
			
			 $('#fastcarousel-generator-insert').live('click', function(event) {
				var id = $('#fastcarousel-shortcodes-id-grid').val();
				var shortcode = '[fastcarousel_id id="'+ id + '"]';
				window.send_to_editor(shortcode);
				$("#fastcarousel-generator-wrap, #fastcarousel-generator-overlay").hide();
			});
			
		});
    </script>
	<div id="fastcarousel-generator-overlay" class="fastcarousel-overlay-bg" style="display:none"></div>

  <div id="fastcarousel-generator-wrap" style="display:none">

   <div id="fastcarousel-generator">

       	<a href="#" id="fastcarousel-generator-close"><span class="fastcarousel-close">x</span></a>
       
     	<p class="position"><?php _e('Select your favorite Carousel: ', 'fastcarousel'); ?></p>			
     
     	<select id="fastcarousel-shortcodes-id-grid" name="fastcarousel-shortcodes-id-grid" class="">

	   	<?php 		
			$query = 'post_type=Post&post_status=publish&post_type=fastcarousel&posts_per_page=-1';
			$loop = new WP_Query($query);
			if($loop) { 
			while ( $loop->have_posts() ) : $loop->the_post();
			
			echo '<option class="fastcarousel-shortcode" value="'.get_the_id().'">';
			echo the_title() . ' : [fastcarousel_id id="'.get_the_id().'"]';
			echo '</option>'; 
			
			
			endwhile;
			}
		?>
		
       	</select>
       
        </div>
        <br />      
       	<input name="fastcarousel-generator-insert" type="submit" class="button button-primary button-large" id="fastcarousel-generator-insert" value="<?php echo __('Insert Carousel','fastcarousel'); ?>">
       
       </div>

   </div>
   
<?php

}

add_action( 'admin_footer', 'fastcarousel_generator' );