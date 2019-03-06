<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
class neder_posts_display_class {
    function __construct() {
        add_action( 'init', array( $this, 'integrate_neder_posts_displayWithVC' ) );
        add_shortcode( 'neder_posts_display', array( $this, 'neder_posts_display_function' ) );	
    }
 
    public function integrate_neder_posts_displayWithVC() {
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		$categories = get_categories(array('orderby' => 'name','order' => 'ASC'));
		$categories_lists = array();
		$i = 0;
		foreach ($categories as $category) { 
			$categories_lists[$category->name] = $category->slug;
			$i++;
		}
		vc_map( array(
            "name" => esc_html__("Display Posts", 'neder-core'),
            "description" => esc_html__("Display your posts", 'neder-core'),
            "base" => "neder_posts_display",
            "class" => "neder",
            "controls" => "full",
            "icon" => NEDER_IMG_URL . 'vc_icon.png',
            "category" => esc_html__('Neder', 'neder-core'),
            "params" => array(						
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("Posts Display Name",'neder-core'),
						"param_name" => "name",
						"admin_label" => true,				  				  			  				  
				),		
                array(		
					  "type" => "dropdown",
					  "class" => "",
					  "heading" => esc_html__("Type", 'neder-core'),
					  "param_name" => "type",
					  "value" => array(
										esc_html__('Type 1','neder-core') 				=> 'type1',
										esc_html__('Type 2','neder-core')  				=> 'type2',
										esc_html__('Type 3','neder-core')  				=> 'type3',
										esc_html__('Type 4','neder-core') 				=> 'type4',
										esc_html__('Type 5','neder-core')  				=> 'type5',
										esc_html__('Type 6','neder-core')  				=> 'type6'											
					   ),			   
				),			
                array(		
					  "type" => "dropdown",
					  "class" => "",
					  "heading" => esc_html__("Columns", 'neder-core'),
					  "param_name" => "columns",
					  "value" => array(
										'1' => '1',
										'2' => '2',
										'3' => '3',										
					   ),
					  "dependency" => array(
							'element' => 'type',
							'value' => array( 'type2', 'type3', 'type4', 'type5', 'type6'  )
					  ),					   
				),			
                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("Date Format", 'neder-core'),
                  "param_name" => "date_format",
                  "value" => array(
									esc_html__('November 6, 2010','neder-core')  					=> 'F j, Y',
				  					esc_html__('November 6, 2010 12:50 am','neder-core') 			=> 'F j, Y g:i a',
				  					esc_html__('November, 2010','neder-core') 					=> 'F, Y',
									esc_html__('12:50 am','neder-core')  							=> 'g:i a',
				  					esc_html__('12:50:48 am','neder-core') 						=> 'g:i:s a',
									esc_html__('Saturday, November 6th, 2010','neder-core')  		=> 'l, F jS, Y',
				  					esc_html__('Nov 6, 2010 @ 0:50','neder-core') 				=> 'M j, Y @ G:i',
									esc_html__('2010/11/06 at 12:50 AM','neder-core')  			=> 'Y/m/d \a\t g:i A',
				  					esc_html__('2010/11/06 at 12:50am','neder-core') 				=> 'Y/m/d \a\t g:ia',
									esc_html__('2010/11/06 12:50:48 AM','neder-core')  			=> 'Y/m/d g:i:s A',
									esc_html__('2010/11/06','neder-core')  						=> 'Y/m/d',																																														
				   ),
				),
				
				// QUERY
                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("Source", 'neder-core'),
                  "param_name" => "source",
                  "value" => array(
				  					esc_html__('WordPress Posts','neder-core') 		=> 'post',
									esc_html__('Custom Posts Type','neder-core')  	=> 'post_type',
				   ),
				   "group" => "Query"				   			   
				),

                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("All Posts/Sticky posts", 'neder-core'),
                  "param_name" => "posts_source",
                  "value" => array(
				  					esc_html__('All Posts','neder-core') 		 		=> 'all_posts',
									esc_html__('Only Sticky Posts','neder-core')  	=> 'sticky_posts',
				   ),
				   "group" => "Query",
				  "dependency" => array(
							'element' => 'source',
							'value' => array( 'post' )
				  ),					   				   			   
				),

			    array(
				  "type" => "posttypes", 
				  "class" => "",
				  "heading" => esc_html__("Select Post Type Source",'neder-core'),
				  "param_name" => "posts_type",
				  "group" => "Query",
				  "dependency" => array(
							'element' => 'source',
							'value' => array( 'post_type' )
				  ),					  				  					  				  			  				  
			    ),
			    array(
				  "type" => "checkbox", 
				  "class" => "",
				  "heading" => esc_html__("Categories",'neder-core'),
				  "param_name" => "categories",
				  "group" => "Query", 
				  "value" => $categories_lists,	  
				  "dependency" => array(
							'element' => 'source',
							'value' => array( 'post' )
				  ),				  					  				  					  				  			  				  
			    ),				
				
				
			    array(
				  "type" => "textfield", 
				  "class" => "",
				  "heading" => esc_html__("Categories Posts Type",'neder-core'),
				  "param_name" => "categories_post_type",
				  "description" => esc_html__("Write Categories slug separate by comma(,) for example: cat-slug1, cat-slug2, cat-slug3 (Leave empty for all categories)","neder"),
				  "group" => "Query",
				  "dependency" => array(
							'element' => 'source',
							'value' => array( 'post_type' )
				  ),				  					  				  					  				  			  				  
			    ),

                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("Order", 'neder-core'),
                  "param_name" => "order",
                  "value" => array(
				  					esc_html__('DESC','neder-core')  	=> 'DESC',
				  					esc_html__('ASC','neder-core') 	=> 'ASC'
									
				   ),
				   "group" => "Query"				   			   
				),

                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("Order By", 'neder-core'),
                  "param_name" => "orderby",
                  "value" => array(
				  					esc_html__('Date','neder-core') 				=> 'date',
									esc_html__('ID','neder-core')  				=> 'ID',
				  					esc_html__('Author','neder-core') 			=> 'author',
									esc_html__('Title','neder-core')  			=> 'title',
				  					esc_html__('Name','neder-core') 				=> 'name',
									esc_html__('Modified','neder-core')  			=> 'modified',
				  					esc_html__('Parent','neder-core') 			=> 'parent',
									esc_html__('Rand','neder-core')  				=> 'rand',
									esc_html__('Comments Count','neder-core')  	=> 'comment_count',
									esc_html__('Views','neder-core')				=> 'views',
									esc_html__('None','neder-core')  				=> 'none',																																													
				   ),
				   "group" => "Query"				   			   
				),												

                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("Pagination", 'neder-core'),
                  "param_name" => "pagination",
                  "value" => array(
				  					esc_html__('No','neder-core')  						=> 'no',
				  					esc_html__('Yes','neder-core') 						=> 'yes',
									esc_html__('Yes with load more','neder-core') 		=> 'load-more'
									
				   ),
				  "dependency" => array(
							'element' => 'type',
							'value' => array( 'type2','type3','type4','type5','type6' )
				  ),				   
				  "group" => "Query"				   			   
				),

			    array(
				  "type" => "textfield", 
				  "class" => "",
				  "heading" => esc_html__("Number Posts",'neder-core'),
				  "param_name" => "num_posts",
				  "description" => "ex 10",
				  "group" => "Query",
				  "dependency" => array(
							'element' => 'pagination',
							'value' => array( 'no' )
				  ),					  				  					  				  			  				  
			    ),

                array(
                  "type" => "dropdown",
                  "class" => "",
                  "heading" => esc_html__("Pagination Type", 'neder-core'),
                  "param_name" => "pagination_type",
                  "value" => array(
				  					esc_html__('Numeric','neder-core') 		=> 'numeric',
									esc_html__('Normal','neder-core')  		=> 'normal',
				  ),
				  "group" => "Query",
				  "dependency" => array(
							'element' => 'pagination',
							'value' => array( 'yes' )
				  ),				   				   			   
				),

			    array(
				  "type" => "textfield", 
				  "class" => "",
				  "heading" => esc_html__("Number Posts For Page",'neder-core'),
				  "param_name" => "num_posts_page",
				  "description" => "ex 10",
				  "group" => "Query",
				  "dependency" => array(
							'element' => 'pagination',
							'value' => array( 'yes','load-more' )
				  ),					  				  					  				  			  				  
			    )				
				
		)		
		) // CLOSE VC MAP
	  );
    }					
}
// Finally initialize code
new neder_posts_display_class();
?>
