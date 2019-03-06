jQuery(document).ready(function($){
// Custom popup box
	 $("#neder-generator-button").click(function(){
	  $("#neder-generator-wrap, #neder-generator-overlay").show();
	 });
	 
	 $("#neder-generator-close").click(function(){
	  $("#neder-generator-wrap, #neder-generator-overlay").hide();
	 });

	 $("#neder_shortcode_type").on('click', function(event) {
		 
		 var type = $('#neder_shortcode_type').val();

		 if(type == 'neder_columns') {
			$("#neder_columns").css("display", "block");
		 } else {
			$("#neder_columns").css("display", "none");
		 }

		 if(type == 'neder_typography') {
			$("#neder_typography").css("display", "block");
		 } else {
			$("#neder_typography").css("display", "none");
		 }

		 if(type == 'neder_dropcaps') {
			$("#neder_dropcaps").css("display", "block");
		 } else {
			$("#neder_dropcaps").css("display", "none");
		 }		 
		 
		 if(type == 'neder_blockquotes') {
			$("#neder_blockquotes").css("display", "block");
		 } else {
			$("#neder_blockquotes").css("display", "none");
		 }
		 
	 });
	 	 
	 // Insert shortcode
	 $('#neder-generator-insert').on('click', function(event) {
		
		var type = $('#neder_shortcode_type').val();
		
		if(type == 'neder_lists_line') {
			
				var shortcode = '[neder_list type="line"][neder_list_item]Your Item Text[/neder_list_item][neder_list_item]Your Item Text[/neder_list_item][neder_list_item]Your Item Text[/neder_list_item][/neder_list]';			
			
		}
		
		if(type == 'neder_lists_arrow') {
			
				var shortcode = '[neder_list type="arrow"][neder_list_item]Your Item Text[/neder_list_item][neder_list_item]Your Item Text[/neder_list_item][neder_list_item]Your Item Text[/neder_list_item][/neder_list]';			
			
		}

		if(type == 'neder_blockquotes') {
			
				var blockquotes_align 		= $('#neder_blockquotes_align').val();
				var blockquotes_background 	= $('#neder_blockquotes_background').val();
				var blockquotes_color 		= $('#neder_blockquotes_color').val();
			
				var shortcode = '[neder_blockquotes align="' + blockquotes_align + '" background="' + blockquotes_background + '" color="' + blockquotes_color + '"]Your Blockquores Text[/neder_blockquotes]';			
			
		}

		if(type == 'neder_dropcaps') {
			
				var dropcaps_align 		= $('#neder_dropcaps_align').val();
				var dropcaps_background = $('#neder_dropcaps_background').val();
				var dropcaps_color 		= $('#neder_dropcaps_color').val();
			
				var shortcode = '[neder_dropcaps align="' + dropcaps_align + '" background="' + dropcaps_background + '" color="' + dropcaps_color + '"]Your Dropcaps Text[/neder_dropcaps]';			
			
		}
		
		if(type == 'neder_typography') {
			
				var typography_background 	= $('#neder_typography_background').val();
				var typography_color 		= $('#neder_typography_color').val();
			
				var shortcode = '[neder_typography background="' + typography_background + '" color="' + typography_color + '"]Your Item Text[/neder_typography]';			
			
		}		
		
		// COLUMNS
		if(type == 'neder_columns') {
		
			var columns_numbers 	= $('#neder-columns-value').val(); 
			
			if(columns_numbers == 'col_2') {
				var shortcode = '[neder_open_row][neder_one_half]Your content goes here.....[/neder_one_half]' +
								'[neder_one_half]Your content goes here.....[/neder_one_half][neder_close_row]';
			}
		
			if(columns_numbers == 'col_3') {
				var shortcode = '[neder_open_row][neder_one_third]Your content goes here.....[/neder_one_third]' + 
    						    '[neder_one_third]Your content goes here.....[/neder_one_third]' +
								'[neder_one_third]Your content goes here.....[/neder_one_third][neder_close_row]';
			}		
		
			if(columns_numbers == 'col_4') {
				var shortcode = '[neder_open_row][neder_one_fourth]Your content goes here.....[/neder_one_fourth]' + 
    						    '[neder_one_fourth]Your content goes here.....[/neder_one_fourth]' +
								'[neder_one_fourth]Your content goes here.....[/neder_one_fourth]' +
								'[neder_one_fourth]Your content goes here.....[/neder_one_fourth][neder_close_row]';
			}		

			if(columns_numbers == 'col_6') {
				var shortcode = '[neder_open_row][neder_one_sixth]Your content goes here.....[/neder_one_sixth]' + 
    						    '[neder_one_sixth]Your content goes here.....[/neder_one_sixth]' +
								'[neder_one_sixth]Your content goes here.....[/neder_one_sixth]' +
								'[neder_one_sixth]Your content goes here.....[/neder_one_sixth]' +
								'[neder_one_sixth]Your content goes here.....[/neder_one_sixth]' +
								'[neder_one_sixth]Your content goes here.....[/neder_one_sixth][neder_close_row]';
			}			

			if(columns_numbers == 'col_13_23') {
				var shortcode = '[neder_open_row][neder_one_third]Your content goes here.....[/neder_one_third]' + 
    						    '[neder_two_third]Your content goes here.....[/neder_two_third][neder_close_row]';
			}			

			if(columns_numbers == 'col_23_13') {
				var shortcode = '[neder_open_row][neder_two_third]Your content goes here.....[/neder_two_third]' + 
    						    '[neder_one_third]Your content goes here.....[/neder_one_third][neder_close_row]';
			}

			if(columns_numbers == 'col_14_34') {
				var shortcode = '[neder_open_row][neder_one_fourth]Your content goes here.....[/neder_one_fourth]' + 
    						    '[neder_three_fourth]Your content goes here.....[/neder_three_fourth][neder_close_row]';
			}

			if(columns_numbers == 'col_34_14') {
				var shortcode = '[neder_open_row][neder_three_fourth]Your content goes here.....[/neder_three_fourth]' + 
    						    '[neder_one_fourth]Your content goes here.....[/neder_one_fourth][neder_close_row]';
			}

			if(columns_numbers == 'col_16_56') {
				var shortcode = '[neder_open_row][neder_one_sixth]Your content goes here.....[/neder_one_sixth]' + 
    						    '[neder_five_sixth]Your content goes here.....[/neder_five_sixth][neder_close_row]';
			}

			if(columns_numbers == 'col_56_16') {
				var shortcode = '[neder_open_row][neder_five_sixth]Your content goes here.....[/neder_five_sixth]' + 
    						    '[neder_one_sixth]Your content goes here.....[/neder_one_sixth][neder_close_row]';
			}
										
		}	

		shortcode += '&nbsp;'; 		
		window.send_to_editor(shortcode);
		$("#neder-generator-wrap, #neder-generator-overlay").hide();
	});
});