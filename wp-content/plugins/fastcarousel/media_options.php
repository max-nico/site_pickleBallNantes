<?php
/*
File: inc/assets.php
Description: MEDIA OPTIONS
Plugin: FAST CAROUSEL
Author: Ad-theme.com
*/


add_action('print_media_templates','fastcarousel'); 


function fastcarousel(){
	
  if( get_post_type() == 'fastcarousel') {
  ?>
  <script type="text/html" id="tmpl-fast_carousel_type">
  	<h3><?php _e('Carousel Settings','fastcarousel'); ?></h3>
	<h4><?php _e('General Settings','fastcarousel'); ?></h3>
    <label class="fc-field">
      <span><?php _e('Type Carousel','fastcarousel'); ?></span>
      <select data-setting="fc_type">
        <option value="prettyphoto"><?php _e('Prettyphoto','fastcarousel'); ?></option>
        <option value="photobox"><?php _e('Photobox','fastcarousel'); ?></option>        
        <option value="magnific-popup"><?php _e('Magnific Popup','fastcarousel'); ?></option>
		<option value="custom_url"><?php _e('Custom Url','fastcarousel'); ?></option>
		<option value="only_image"><?php _e('Only Image (no Lightbox)','fastcarousel'); ?></option>      
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Style','fastcarousel'); ?></span>
      <select data-setting="fc_style">
        <option value="fc_style1"><?php _e('Style 1','fastcarousel'); ?></option>
        <option value="fc_style2"><?php _e('Style 2','fastcarousel'); ?></option>        
        <option value="fc_style3"><?php _e('Style 3','fastcarousel'); ?></option>
        <option value="fc_style4"><?php _e('Style 4','fastcarousel'); ?></option>
        <option value="fc_style5"><?php _e('Style 5','fastcarousel'); ?></option>
        <option value="fc_style6"><?php _e('Style 6','fastcarousel'); ?></option>
        <option value="fc_style7"><?php _e('Style 7','fastcarousel'); ?></option>
        <option value="fc_style8"><?php _e('Style 8','fastcarousel'); ?></option>
        <option value="fc_style9"><?php _e('Style 9','fastcarousel'); ?></option>
        <option value="fc_style10"><?php _e('Style 10','fastcarousel'); ?></option>
		<option value="fc_no_style"><?php _e('No Style','fastcarousel'); ?></option>								
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Over Image','fastcarousel'); ?></span>
      <select data-setting="fc_over_image">
        <option value="fc_over_image_on"><?php _e('On','fastcarousel'); ?></option>
        <option value="fc_over_image_off"><?php _e('Off','fastcarousel'); ?></option>							
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Image Thumbnails Size','fastcarousel'); ?></span>
      <select data-setting="fc_thumbs_size">
        <option value="fc-normal"><?php _e('Default (800px)','fastcarousel'); ?></option>
        <option value="thumbnail"><?php _e('Thumbnail','fastcarousel'); ?></option>        
        <option value="medium"><?php _e('Medium','fastcarousel'); ?></option>
		<option value="large"><?php _e('Large','fastcarousel'); ?></option> 
		<option value="full"><?php _e('Full','fastcarousel'); ?></option>        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Image Lightbox Size','fastcarousel'); ?></span>
      <select data-setting="fc_lightbox_size">
        <option value="fc-lightbox"><?php _e('Default (1024px)','fastcarousel'); ?></option>
        <option value="thumbnail"><?php _e('Thumbnail','fastcarousel'); ?></option>        
        <option value="medium"><?php _e('Medium','fastcarousel'); ?></option>
		<option value="large"><?php _e('Large','fastcarousel'); ?></option> 
		<option value="full"><?php _e('Full','fastcarousel'); ?></option>        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Image Lightbox Icon','fastcarousel'); ?></span>
      <select data-setting="fc_lightbox_icon">
        <option value="plus"><?php _e('Plus','fastcarousel'); ?></option>
        <option value="image"><?php _e('Image','fastcarousel'); ?></option>        
        <option value="images"><?php _e('Images','fastcarousel'); ?></option>
		<option value="file"><?php _e('File','fastcarousel'); ?></option>
        <option value="spinner"><?php _e('Spinner','fastcarousel'); ?></option>
        <option value="spinner2"><?php _e('Spinner 2','fastcarousel'); ?></option>
        <option value="heart"><?php _e('Heart','fastcarousel'); ?></option>        
        <option value="heart2"><?php _e('Heart 2','fastcarousel'); ?></option>
        <option value="star"><?php _e('Star','fastcarousel'); ?></option>
		<option value="star2"><?php _e('Star 2','fastcarousel'); ?></option>
		<option value="search"><?php _e('Search','fastcarousel'); ?></option>
		<option value="link"><?php _e('Link','fastcarousel'); ?></option>
		<option value="camera"><?php _e('Camera','fastcarousel'); ?></option>
		<option value="pictures"><?php _e('Pictures','fastcarousel'); ?></option>
		<option value="info"><?php _e('Info','fastcarousel'); ?></option>								
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Image Lightbox Width','fastcarousel'); ?></span>
      <select data-setting="fc_image_width">
        <option value="small"><?php _e('Small','fastcarousel'); ?></option>
        <option value="medium"><?php _e('Medium','fastcarousel'); ?></option>
		<option value="large"><?php _e('Large','fastcarousel'); ?></option>
      </select>
    </label>					
	<h4><?php _e('Carousel Options','fastcarousel'); ?></h3>	
    <label class="fc-field">
      <span><?php _e('Navigation','fastcarousel'); ?></span>
      <select data-setting="fc_navigation">
        <option value="false"><?php _e('Off','fastcarousel'); ?></option>
        <option value="true"><?php _e('On','fastcarousel'); ?></option>        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Show dots navigation','fastcarousel'); ?></span>
      <select data-setting="fc_dots">
	  	<option value="false"><?php _e('Off','fastcarousel'); ?></option>
	  	<option value="true"><?php _e('On','fastcarousel'); ?></option>
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Navigation/Dots Style','fastcarousel'); ?></span>
      <select data-setting="fc_nav_style">
        <option value="fc_nav_style1"><?php _e('Style 1','fastcarousel'); ?></option>
        <option value="fc_nav_style2"><?php _e('Style 2','fastcarousel'); ?></option>        
        <option value="fc_nav_style3"><?php _e('Style 3','fastcarousel'); ?></option>
        <option value="fc_nav_style4"><?php _e('Style 4','fastcarousel'); ?></option>
        <option value="fc_nav_style5"><?php _e('Style 5','fastcarousel'); ?></option>
        <option value="fc_nav_style6"><?php _e('Style 6','fastcarousel'); ?></option>        
        <option value="fc_nav_style7"><?php _e('Style 7','fastcarousel'); ?></option>
        <option value="fc_nav_style8"><?php _e('Style 8','fastcarousel'); ?></option>											
      </select>
    </label>		
    <label class="fc-field">
      <span><?php _e('Lazy Load','fastcarousel'); ?></span>
      <select data-setting="fc_lazy_load">
        <option value="false"><?php _e('Off','fastcarousel'); ?></option>
        <option value="true"><?php _e('On','fastcarousel'); ?></option>        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Item Show','fastcarousel'); ?></span>
      <select data-setting="fc_item_show">
        <option value="1"><?php _e('1','fastcarousel'); ?></option>
        <option value="2"><?php _e('2','fastcarousel'); ?></option>
        <option value="3"><?php _e('3','fastcarousel'); ?></option>
        <option value="4"><?php _e('4','fastcarousel'); ?></option>   
        <option value="5"><?php _e('5','fastcarousel'); ?></option>
        <option value="6"><?php _e('6','fastcarousel'); ?></option>   
        <option value="7"><?php _e('7','fastcarousel'); ?></option>
        <option value="8"><?php _e('8','fastcarousel'); ?></option>   
        <option value="9"><?php _e('9','fastcarousel'); ?></option> 								        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Item Show Responsive (600px to 900px)','fastcarousel'); ?></span>
      <select data-setting="fc_item_show_900">
        <option value="1"><?php _e('1','fastcarousel'); ?></option>
        <option value="2"><?php _e('2','fastcarousel'); ?></option>
        <option value="3"><?php _e('3','fastcarousel'); ?></option>
        <option value="4"><?php _e('4','fastcarousel'); ?></option>   
        <option value="5"><?php _e('5','fastcarousel'); ?></option>
        <option value="6"><?php _e('6','fastcarousel'); ?></option>   
        <option value="7"><?php _e('7','fastcarousel'); ?></option>
        <option value="8"><?php _e('8','fastcarousel'); ?></option>   
        <option value="9"><?php _e('9','fastcarousel'); ?></option> 								        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Item Show Responsive (0px to 599px)','fastcarousel'); ?></span>
      <select data-setting="fc_item_show_600">
        <option value="1"><?php _e('1','fastcarousel'); ?></option>
        <option value="2"><?php _e('2','fastcarousel'); ?></option>
        <option value="3"><?php _e('3','fastcarousel'); ?></option>
        <option value="4"><?php _e('4','fastcarousel'); ?></option>   
        <option value="5"><?php _e('5','fastcarousel'); ?></option>
        <option value="6"><?php _e('6','fastcarousel'); ?></option>   
        <option value="7"><?php _e('7','fastcarousel'); ?></option>
        <option value="8"><?php _e('8','fastcarousel'); ?></option>   
        <option value="9"><?php _e('9','fastcarousel'); ?></option> 								        
      </select>
    </label>
	<label class="fc-field">
		<span><?php _e('Autoplay (Leave Empty for disable or put ms, ie: 2000)','fastcarousel'); ?></span>	
		<input data-setting="fc_autoplay" type="text" id="fc_autoplay"> 
    </label>
	<label class="fc-field">
		<span><?php _e('Speed (Default value: 1000)','fastcarousel'); ?></span>	
		<input data-setting="fc_speed" type="text" id="fc_speed"> 
    </label>	
	<label class="fc-field">
		<span><?php _e('Margin on Item (default value 0px - correct value is for ie 5)','fastcarousel'); ?></span>	
		<input data-setting="fc_margin" type="text" id=s"fc_margin"> 
    </label>	
    <label class="fc-field">
      <span><?php _e('Loop','fastcarousel'); ?></span>
      <select data-setting="fc_loop">
	  	<option value="false"><?php _e('Off','fastcarousel'); ?></option>
        <option value="true"><?php _e('On','fastcarousel'); ?></option>        
      </select>
    </label>
    <label class="fc-field">
      <span><?php _e('Rtl','fastcarousel'); ?></span>
      <select data-setting="fc_rtl">
	  	<option value="false"><?php _e('Off','fastcarousel'); ?></option>
        <option value="true"><?php _e('On','fastcarousel'); ?></option>        
      </select>
    </label>			
	<h3><?php _e('Style Settings','fastcarousel'); ?></h3>
    <p><?php _e('Leave empty for default value','fastcarousel'); ?></p>
	<label class="fc-field">
		<span><?php _e('Main Color (ex #EEEEEE)','fastcarousel'); ?></span>	
		<input data-setting="fc_main_color" type="text" id="fc_main_color"> 
    </label>
	<label class="fc-field">
		<span><?php _e('Main Color Opacity (0.1 to 1)','fastcarousel'); ?></span>	
		<input data-setting="fc_main_color_opacity" type="text" id="fc_main_color_opacity" > 
    </label>
	<label class="fc-field">
		<span><?php _e('Secondary Color (ex #EEEEEE)','fastcarousel'); ?></span>	
		<input data-setting="fc_secondary_color" type="text" id="fc_secondary_color" > 
    </label>							
  </script>
  <script>

    jQuery(document).ready(function(){

      _.extend(wp.media.gallery.defaults, {
        fc_type: 'prettyphoto',
		size: 'fc-normal',
		fc_reponsive: 'fc_responsive',
		fc_style: 'fc_style1',
		fc_over_image: 'fc_over_image_on',
		fc_thumbs_size: 'fc-normal',
		fc_lightbox_size: 'fc-lightbox',		
		fc_lightbox_icon: 'plus',
		fc_image_width: 'small',
		fc_main_color: '',
		fc_main_color_opacity: '',
		fc_secondary_color: '',
		fc_navigation: 'false',
		fc_lazy_load: 'false',   
		fc_item_show: '1', 
		fc_item_show_900: '1',
		fc_item_show_600: '1',
		fc_autoplay: '',
		fc_speed: '',
		fc_margin: '',
		fc_loop: 'false',
		fc_dots: 'false',
		fc_nav_style: 'fc_nav_style1',
		
      });

      wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
        template: function(view){
          return wp.media.template('gallery-settings')(view)
               + wp.media.template('fast_carousel_type')(view);
        }
      });

    });
  </script>
  
  <?php
  }
}