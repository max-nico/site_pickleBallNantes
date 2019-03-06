<?php
function neder_button( $page = null, $target = null ) {
  
  $return = '<script>
  function neder_open_shortcodes_popup() {
	  jQuery(document).ready(function($){
		  
		  $("#neder-generator-wrap, #neder-generator-overlay").show();
		 
		 $("#neder-generator-close").click(function(){
		  $("#neder-generator-wrap, #neder-generator-overlay").hide();
		 });
	  });	 
  }
  </script>';
  $return .= '<a href="#" onclick="neder_open_shortcodes_popup()" class="button" title="Neder SHORTCODES"><span class="neder-button-portfolio"></span>'.__('Neder SHORTCODES','neder-core').'</a>';	

  echo $return;

}

add_action( 'media_buttons', 'neder_button', 100 );

function neder_generator() {

	?>

<div id="neder-generator-overlay" class="neder-overlay-bg" style="display:none"></div>

  <div id="neder-generator-wrap" style="display:none">

   <div id="neder-generator">

    <a href="#" id="neder-generator-close"><span class="neder-close">x</span></a>

	<div class="neder_shortcodes_type">

	 <h1 class="neder_main_title"><?php _e('Neder Shortcodes','neder-core'); ?></h1>


     <p class="wpmp-title"><?php _e('Select your shortcode','neder-core'); ?></p>
     
     <select id="neder_shortcode_type" name="neder_shortcode_type" class="">
         	 <option value="neder_lists_line">List Type 1 (Line)</option>              
         	 <option value="neder_lists_arrow">List Type 2 (Arrow)</option>              
         	 <option value="neder_blockquotes">Blockquotes</option>              
         	 <option value="neder_typography">Typography</option>              
         	 <option value="neder_dropcaps">Dropcaps</option>              
         	 <option value="neder_columns">Columns</option>              
     </select>

	<div id="neder_blockquotes" style="display:none">
		
		<div class="wpmp-field">
			<select id="neder_blockquotes_align" name="neder_blockquotes_align" class="">
				 <option value="center">Center</option>              
				 <option value="left">Left</option>              
				 <option value="right">Right</option>             
			</select>
		</div>
		
		<div class="wpmp-field">
			<p class="title"><?php _e('Main Color','neder-core'); ?></p>
			<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="neder_blockquotes_background" /> 
		</div>

		<div class="wpmp-field">
			<p class="title"><?php _e('Secondary Color','neder-core'); ?></p>
			<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="neder_blockquotes_color" /> 
		</div>

	</div>	 
	 
	<div id="neder_typography" style="display:none">
	
		<div class="wpmp-field">
			<p class="title"><?php _e('Main Color','neder-core'); ?></p>
			<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="neder_typography_background" /> 
		</div>

		<div class="wpmp-field">
			<p class="title"><?php _e('Secondary Color','neder-core'); ?></p>
			<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="neder_typography_color" /> 
		</div>

	</div>	

	<div id="neder_dropcaps" style="display:none">
		
		<div class="wpmp-field">
			<select id="neder_dropcaps_align" name="neder_dropcaps_align" class="">             
				 <option value="left">Left</option>              
				 <option value="right">Right</option>             
			</select>
		</div>
		
		<div class="wpmp-field">
			<p class="title"><?php _e('Main Color','neder-core'); ?></p>
			<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="neder_dropcaps_background" /> 
		</div>

		<div class="wpmp-field">
			<p class="title"><?php _e('Secondary Color','neder-core'); ?></p>
			<input type="text" value="#eeeeee" class="wp-color-picker-field" data-default-color="#eeeeee" id="neder_dropcaps_color" /> 
		</div>

	</div>	
	 
     <div id="neder_columns" style="display:none"> 
         
         <p class="title"><?php _e('Columns','neder-core'); ?></p>
     
         <select id="neder-columns-value">
    
             <option value="col_2">2</option>
             <option value="col_3">3</option>
             <option value="col_4">4</option>
             <option value="col_6">6</option>
             <option value="col_13_23">1/3 + 2/3</option>
             <option value="col_23_13">2/3 + 1/3</option>
             <option value="col_14_34">1/4 + 3/4</option>
             <option value="col_34_14">3/4 + 1/4</option>
             <option value="col_16_56">1/6 + 5/6</option>
             <option value="col_56_16">5/6 + 1/6</option>        
                               
         </select>
      
      
      </div>
            
	</div>
     
      
      
      
        
     <div class="neder_clear_box"></div>
        
     <br />
     <br />
            
     <input name="neder-generator-insert" type="submit" class="button button-primary button-large" id="neder-generator-insert" value="<?php _e('Insert Shortcode','neder-core'); ?>">
       
   </div> <!-- #neder-generator -->

</div> <!-- #neder-generator-wrap -->


   
	<?php

}


add_action( 'admin_footer', 'neder_generator' );
