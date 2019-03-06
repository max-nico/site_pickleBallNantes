<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
class neder_newsticker_display_class {
    function __construct() {
        add_action( 'init', array( $this, 'integrate_neder_newsticker_displayWithVC' ) );
        add_shortcode( 'neder_newsticker_display', array( $this, 'neder_newsticker_display_function' ) );	
    }
 
    public function integrate_neder_newsticker_displayWithVC() {
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
            "name" => esc_html__("News Ticker", 'neder-core'),
            "description" => esc_html__("Display your posts", 'neder-core'),
            "base" => "neder_newsticker_display",
            "class" => "neder",
            "controls" => "full",
            "icon" => NEDER_IMG_URL . 'vc_icon.png',
            "category" => esc_html__('Neder', 'neder-core'),
            "params" => array(						
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => esc_html__("News Ticker Name",'neder-core'),
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
					   ),			   
				),
			    array(
				  "type" => "textfield", 
				  "class" => "",
				  "heading" => esc_html__("Autoplay (ms)",'neder-core'),
				  "param_name" => "autoplay",
				  "description" => esc_html__("Example 2000. Leave empty for default value",'neder-core')					  				  					  				  			  				  
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
                  "heading" => esc_html__("All Posts/Sticky Posts", 'neder-core'),
                  "param_name" => "newsticker_source",
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
				  "heading" => esc_html__("Categories Post Type",'neder-core'),
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
				  "type" => "textfield", 
				  "class" => "",
				  "heading" => esc_html__("Number Posts",'neder-core'),
				  "param_name" => "num_posts",
				  "description" => "ex 10",
				  "group" => "Query",					  				  					  				  			  				  
			    ),			
				
		)		
		) // CLOSE VC MAP
	  );
    }					
}
// Finally initialize code
new neder_newsticker_display_class();
?>
