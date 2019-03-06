<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 add_action( 'add_meta_boxes', 'neder_add_meta_boxes' );
 function neder_add_meta_boxes() {
	global $post;
    add_meta_box( 
        'neder_layout',
        esc_html__( 'Neder Layout', 'neder' ),
        'neder_layout_function',
        'post' 
    );
    if(!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate != 'page-fullwidth.php' )
        {	
			add_meta_box( 
				'neder_layout',
				esc_html__( 'Neder Layout', 'neder' ),
				'neder_layout_function',
				'page' 
			);	
		}
	}			
 }
 
function neder_layout_function($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>

	<!-- start:metabox container -->
    <div id="neder-metabox">
        
        <!-- Layout Type -->
        <?php 
		global $current_screen;
		if($current_screen ->id !== "post") : ?>
        <div class="neder-metabox-item">
            <?php $title_page_value = get_post_meta($object->ID, "neder-title-page", true); ?>
            <label for="neder-title-page"><?php esc_html_e('Title Page/Blog','neder'); ?></label>
            <select name="neder-title-page">   
				<option value="no" <?php if($title_page_value == 'no') : echo 'selected'; endif; ?>>No</option>          
            	<option value="yes" <?php if($title_page_value == 'yes') : echo 'selected'; endif; ?>>Yes</option>
            </select>
        </div>  		
		<div class="neder-metabox-item">
            <label for="neder-layout-type"><?php esc_html_e('Layout Type','neder'); ?></label>
            <select id="neder-layout-type" name="neder-layout-type">
            <?php 
                    $blog_option_values = array(
						 		'neder-page'	 			=> 'Page',
								'neder-blog' 			=> 'Blog',
					);

                    foreach($blog_option_values as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "neder-layout-type", true))
                        {
                            ?>
                                <option selected value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>
        
        
        <!-- start:blog query -->    
		<div id="blog-query" 
			<?php if(get_post_meta($object->ID, "neder-layout-type", true) == 'neder-page' || 
			get_post_meta($object->ID, "neder-layout-type", true) == '' ) : ?> 
            	style="display:none" 
			<?php endif; ?>
		>
        	<h2><?php esc_html_e('Query Blog','neder'); ?></h2>
			
			<div class="neder-metabox-item">
				<label for="neder-num-posts"><?php esc_html_e('Numbers posts to load / Number posts per page','neder'); ?></label>
				<input name="neder-num-posts" type="text" value='<?php echo get_post_meta($object->ID, "neder-num-posts", true); ?>'><br>
				<span class="neder-description"><?php esc_html_e('Add int number value. Examples: 8. Leave empty for get default posts setted in general WordPress setting','neder'); ?></span>
			</div>	   
				
            <!-- Category -->
            <div class="neder-metabox-item">
			
					
				
                <?php     
                $categories = get_categories(array('orderby' => 'name','order' => 'ASC'));?>
                <?php 
                $categories_selected = (get_post_meta($object->ID, "neder-category", true));
                ?>
                <label for="neder-category"><?php esc_html_e('Category','neder'); ?></label>
                <select multiple="multiple" name="neder-category[]">
                <?php foreach ($categories as $category) {  ?>
                    <option  value="<?php echo esc_html($category->term_id); ?>"              
                    <?php
                    if($categories_selected != '') : 
                        foreach($categories_selected as $category_selected) : 
                            if($category_selected == $category->term_id) :
                                echo 'selected'; 
                            endif;
                        endforeach;
                    endif;
                    ?>            
                    >		
                <?php echo esc_html($category->name); ?></option>
                <?php } ?>
                </select>
            </div>    

          	<div class="neder-metabox-item">
            	<?php $orderby_value = get_post_meta($object->ID, "neder-orderby", true); ?>
            	<label for="neder-orderby"><?php esc_html_e('Order By','neder'); ?></label>
            	<select name="neder-orderby">            
            		<option value="none" <?php if($orderby_value == 'none') : echo 'selected'; endif; ?>><?php esc_html_e('none','neder'); ?></option>
                    <option value="comment_count" <?php if($orderby_value == 'comment_count') : echo 'selected'; endif; ?>><?php esc_html_e('Comment Count','neder'); ?></option>
            		<option value="meta_value_num" <?php if($orderby_value == 'meta_value_num') : echo 'selected'; endif; ?>><?php esc_html_e('Views','neder'); ?></option>
                    <option value="date" <?php if($orderby_value == 'date') : echo 'selected'; endif; ?>><?php esc_html_e('date','neder'); ?></option>
            		<option value="modified" <?php if($orderby_value == 'modified') : echo 'selected'; endif; ?>><?php esc_html_e('modified','neder'); ?></option>
                    <option value="title" <?php if($orderby_value == 'title') : echo 'selected'; endif; ?>><?php esc_html_e('title','neder'); ?></option>
                    <option value="rand" <?php if($orderby_value == 'rand') : echo 'selected'; endif; ?>><?php esc_html_e('rand','neder'); ?></option>
            	</select>
            </div> 

          	<div class="neder-metabox-item">
            	<?php $orderdir_value = get_post_meta($object->ID, "neder-orderdir", true); ?>
            	<label for="neder-orderdir"><?php esc_html_e('Order dir','neder'); ?></label>
            	<select name="neder-orderdir">                     
                	<option value="DESC" <?php if($orderdir_value == 'DESC') : echo 'selected'; endif; ?>>DESC</option>           
            		<option value="ASC" <?php if($orderdir_value == 'ASC') : echo 'selected'; endif; ?>>ASC</option>
            	</select>
            </div> 

			<h2><?php esc_html_e('Blog Style','neder'); ?></h2>
			
          	<div class="neder-metabox-item">
            	<?php $blog_posts_type_value = get_post_meta($object->ID, "neder-blog-posts-type", true); ?>
            	<label for="neder-blog-posts-type"><?php esc_html_e('Blog Layout Type','neder'); ?></label>
            	<select id="neder-blog-posts-type" name="neder-blog-posts-type">            
            		<option value="grid" <?php if($blog_posts_type_value == 'grid') : echo 'selected'; endif; ?>><?php esc_html_e('Grid','neder'); ?></option>
                    <option value="masonry" <?php if($blog_posts_type_value == 'masonry') : echo 'selected'; endif; ?>><?php esc_html_e('Masonry','neder'); ?></option>
             	</select>
            </div> 
          	
			<div class="neder-metabox-item">
            	<?php $blog_posts_layout_value = get_post_meta($object->ID, "neder-blog-posts-layout", true); ?>
            	<label for="neder-blog-posts-layout"><?php esc_html_e('Blog Layout Style','neder'); ?></label>
            	<select name="neder-blog-posts-layout">            
            		<option value="neder-posts-layout1" <?php if($blog_posts_layout_value == 'neder-posts-layout1') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 1','neder'); ?></option>
                    <option value="neder-posts-layout2" <?php if($blog_posts_layout_value == 'neder-posts-layout2') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 2','neder'); ?></option>
            		<option value="neder-posts-layout3" <?php if($blog_posts_layout_value == 'neder-posts-layout3') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 3','neder'); ?></option>
                    <option value="neder-posts-layout4" <?php if($blog_posts_layout_value == 'neder-posts-layout4') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 4','neder'); ?></option>
            	</select>
            </div> 

          	<div class="neder-metabox-item">
            	<?php $blog_columns_value = get_post_meta($object->ID, "neder-blog-columns", true); ?>
            	<label for="neder-blog-columns"><?php esc_html_e('Blog Columns','neder'); ?></label>
            	<select id="neder-blog-columns" name="neder-blog-columns">            
            		<option value="1" <?php if($blog_columns_value == '1') : echo 'selected'; endif; ?>><?php esc_html_e('1','neder'); ?></option>
                    <option value="2" <?php if($blog_columns_value == '2') : echo 'selected'; endif; ?>><?php esc_html_e('2','neder'); ?></option>
            		<option value="3" <?php if($blog_columns_value == '3') : echo 'selected'; endif; ?>><?php esc_html_e('3','neder'); ?></option>
                    <option value="4" <?php if($blog_columns_value == '4') : echo 'selected'; endif; ?>><?php esc_html_e('4','neder'); ?></option>
            	</select>
            </div>
			
          	<div class="neder-metabox-item">
            	<?php $pagination_value = get_post_meta($object->ID, "neder-pagination", true); ?>
            	<label for="neder-pagination"><?php esc_html_e('Pagination','neder'); ?></label>
            	<select name="neder-pagination">            
            		<option value="yes" <?php if($pagination_value == 'yes') : echo 'selected'; endif; ?>>Yes</option>
					<option class="neder-load-more" value="load-more" <?php if($pagination_value == 'load-more') : echo 'selected'; endif; ?> <?php if($blog_posts_type_value == 'masonry') : echo 'style="display:none"'; endif; ?>>Yes with Load More</option>
                    <option value="no" <?php if($pagination_value == 'no') : echo 'selected'; endif; ?>>No</option>
            	</select>
            </div>  
            
            
            
		</div>
        <!-- end:blog query -->
        <?php endif; ?>
        
        <!-- sidebar -->
		<div id="neder-sidebar" class="neder-metabox-item"
			<?php if(get_post_meta($object->ID, "neder-blog-columns", true) == '3' || get_post_meta($object->ID, "neder-blog-columns", true) == '4') : ?> 
            	style="display:none" 
			<?php endif; ?>        
        >
            <label for="neder-sidebar"><?php esc_html_e('Sidebar','neder'); ?></label>
            <select name="neder-sidebar">
                <?php 
					if($current_screen ->id == "post") :		
						$option_values = array(
										'sidebar-panel'	=> 'Default Value',
										'sidebar-none'  => 'None',
										'sidebar-left'  => 'Left',
										'sidebar-right' => 'Right'
						);
					else :
						$option_values = array(
										'sidebar-none'  => 'None',
										'sidebar-left'  => 'Left',
										'sidebar-right' => 'Right'
						);					
					endif;
                    foreach($option_values as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "neder-sidebar", true))
                        {
                            ?>
                                <option selected value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
			
            <label for="neder-sidebar-name"><?php esc_html_e('Sidebar Name','neder'); ?></label>
            <select name="neder-sidebar-name">
                <?php 
					global $wp_registered_sidebars;		
					if($current_screen ->id == "post") :
						$sidebar_options['sidebar-default-panel-name'] = 'Default Value';
					endif;
					foreach ($wp_registered_sidebars as $sidebar) {
						$sidebar_options[$sidebar['id']] = $sidebar['name'];
					}

                    foreach($sidebar_options as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "neder-sidebar-name", true))
                        {
                            ?>
                                <option selected value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php
                        }
                    }
                ?>
            </select>			
			
			
			
		</div>
		
        <?php 
		if($current_screen ->id == "post") : ?>  
			
			<div class="neder-metabox-item" id="neder_container_post_layout">
            	<?php $posts_layout_value = get_post_meta($object->ID, "neder_post_layout", true); ?>
            	<label for="neder_post_layout"><?php esc_html_e('Post Layout Style','neder'); ?></label>
            	<select name="neder_post_layout">    
            		<option value="default" <?php if($posts_layout_value == 'default') : echo 'selected'; endif; ?>><?php esc_html_e('Default (get option setted on panel)','neder'); ?></option>					
            		<option value="neder-post-layout1" <?php if($posts_layout_value == 'neder-post-layout1') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 1','neder'); ?></option>
                    <option value="neder-post-layout2" <?php if($posts_layout_value == 'neder-post-layout2') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 2','neder'); ?></option>
            		<option value="neder-post-layout3" <?php if($posts_layout_value == 'neder-post-layout3') : echo 'selected'; endif; ?>><?php esc_html_e('Posts Layout 3','neder'); ?></option>
            	</select>
            </div> 

		<?php endif; ?>
    </div>
    <!-- end:metabox container -->
    <?php  
}

function save_neder_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
	
	$current_screen = get_current_screen();
	
    $neder_sidebar_value = "";
	$neder_sidebar_name_value = "";
	$neder_layout_type = ""; 
	$neder_num_posts = "";
	$neder_category = "";
	$neder_pagination = "";
	$neder_title_page = "";
	$neder_blog_posts_type = "";
	$neder_blog_posts_layout = "";
	$neder_blog_columns = "";
	$neder_orderby = "";
	$neder_orderdir = "";
	$neder_posts_layout = "";
		
    if(isset($_POST["neder-sidebar"]))
    {
        $neder_sidebar_value = $_POST["neder-sidebar"];
    }   
    update_post_meta($post_id, "neder-sidebar", $neder_sidebar_value);

    if(isset($_POST["neder-sidebar-name"]))
    {
        $neder_sidebar_name_value = $_POST["neder-sidebar-name"];
    }   
    update_post_meta($post_id, "neder-sidebar-name", $neder_sidebar_name_value);
	
    if(isset($_POST["neder-layout-type"]))
    {
        $neder_layout_type = $_POST["neder-layout-type"];
    }   
    update_post_meta($post_id, "neder-layout-type", $neder_layout_type);

    if(isset($_POST["neder-num-posts"]))
    {
    	$neder_num_posts = $_POST["neder-num-posts"]; 
	} 
    update_post_meta($post_id, "neder-num-posts", $neder_num_posts);
	
    if(isset($_POST["neder-category"]))
    {
    	$neder_category = $_POST["neder-category"]; 
	} 
    update_post_meta($post_id, "neder-category", $neder_category);

	
    if(isset($_POST["neder-pagination"]))
    {
    	$neder_pagination = $_POST["neder-pagination"]; 
	} 
    update_post_meta($post_id, "neder-pagination", $neder_pagination);

	if(isset($_POST["neder-title-page"]))
    {
    	$neder_title_page = $_POST["neder-title-page"]; 
	} 
    update_post_meta($post_id, "neder-title-page", $neder_title_page);
	
    if(isset($_POST["neder-blog-posts-type"]))
    {
    	$neder_blog_posts_type = $_POST["neder-blog-posts-type"]; 
	} 
    update_post_meta($post_id, "neder-blog-posts-type", $neder_blog_posts_type);	
	
	
    if(isset($_POST["neder-blog-posts-layout"]))
    {
    	$neder_blog_posts_layout = $_POST["neder-blog-posts-layout"]; 
	} 
    update_post_meta($post_id, "neder-blog-posts-layout", $neder_blog_posts_layout);	
	
	
    if(isset($_POST["neder-blog-columns"]))
    {
    	$neder_blog_columns = $_POST["neder-blog-columns"]; 
	} 
    update_post_meta($post_id, "neder-blog-columns", $neder_blog_columns);
	
	
    if(isset($_POST["neder-orderby"]))
    {
    	$neder_orderby = $_POST["neder-orderby"]; 
	} 
    update_post_meta($post_id, "neder-orderby", $neder_orderby);


    if(isset($_POST["neder-orderdir"]))
    {
    	$neder_orderdir = $_POST["neder-orderdir"]; 
	} 
    update_post_meta($post_id, "neder-orderdir", $neder_orderdir);

	if($current_screen ->id == "post") :
		if(isset($_POST["neder_post_layout"]))
		{
			$neder_post_layout = $_POST["neder_post_layout"];
		}
		update_post_meta($post_id, "neder_post_layout", $neder_post_layout);
	endif;
}

add_action("save_post", "save_neder_meta_box", 10, 3);

/* METABOX TOP CONTENT SECTION */
 add_action( 'add_meta_boxes', 'neder_add_meta_boxes_top_content' );
 function neder_add_meta_boxes_top_content() {
	global $post;
    add_meta_box( 
        'neder_top_content',
        esc_html__( 'Neder Top Content', 'neder' ),
        'neder_top_content_function',
        'post' 
    );
    if(!empty($post)) {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate != 'page-fullwidth.php' )
        {		
			add_meta_box( 
				'neder_top_content',
				esc_html__( 'Neder Top Content', 'neder' ),
				'neder_top_content_function',
				'page' 
			);
		}
	}		
 }

function neder_top_content_function($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
?>
	<!-- start:metabox container -->
    <div id="neder-metabox">
		<div class="neder-metabox-item">
            <label for="neder-top-content-active"><?php esc_html_e('Top Content Section','neder'); ?></label>
            <select id="neder-top-content-active" name="neder-top-content-active">
            <?php 
                    $top_content_values = array(
						 		'off'	 			=> 'Off',
								'on' 				=> 'on'
					);

                    foreach($top_content_values as $key => $value) 
                    {
                        if($key == get_post_meta($object->ID, "neder-top-content-active", true))
                        {
                            ?>
                                <option selected value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option value="<?php echo esc_html($key); ?>"><?php echo esc_html($value); ?></option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>		
	</div>

	<div id="neder-top-content" 
			<?php if(get_post_meta($object->ID, "neder-top-content-active", true) == 'off' || get_post_meta($object->ID, "neder-top-content-active", true) == '') : ?> 
            	style="display:none" 
			<?php endif; ?>	
	
	>
	
		<!-- Layout Style -->
		<div class="neder-metabox-item">
            <?php $top_content_layout_value = get_post_meta($object->ID, "neder-top-content-layout-style", true); ?>
            <label for="neder-top-content-layout-style"><?php esc_html_e('Top Content Layout Style','neder'); ?></label>
            <select name="neder-top-content-layout-style">            
            	<option value="neder-top-content-layout1" <?php if($top_content_layout_value == 'neder-top-content-layout1') : echo 'selected'; endif; ?>><?php esc_html_e('Layout 1','neder'); ?></option>
                <option value="neder-top-content-layout2" <?php if($top_content_layout_value == 'neder-top-content-layout2') : echo 'selected'; endif; ?>><?php esc_html_e('Layout 2','neder'); ?></option>
				<option value="neder-top-content-layout3" <?php if($top_content_layout_value == 'neder-top-content-layout3') : echo 'selected'; endif; ?>><?php esc_html_e('Layout 3','neder'); ?></option>
                <option value="neder-top-content-layout4" <?php if($top_content_layout_value == 'neder-top-content-layout4') : echo 'selected'; endif; ?>><?php esc_html_e('Layout 4 (Carousel)','neder'); ?></option>
				<option value="neder-top-content-layout5" <?php if($top_content_layout_value == 'neder-top-content-layout5') : echo 'selected'; endif; ?>><?php esc_html_e('Layout 5','neder'); ?></option>
				<option value="neder-top-content-layout6" <?php if($top_content_layout_value == 'neder-top-content-layout6') : echo 'selected'; endif; ?>><?php esc_html_e('Layout 6 (Single Post Featured)','neder'); ?></option>
			</select>
        </div> 	
	
        <!-- start:blog query -->    
		<div id="top-content-query">
        	<h2><?php esc_html_e('Query Top Content','neder'); ?></h2> 
				
            <!-- Category -->
            <div class="neder-metabox-item">			
                <?php     
                $top_content_categories = get_categories(array('orderby' => 'name','order' => 'ASC'));?>
                <?php 
                $top_content_categories_selected = (get_post_meta($object->ID, "neder-top-content-category", true));
                ?>
                <label for="neder-top-content-category"><?php esc_html_e('Category','neder'); ?></label>
                <select multiple="multiple" name="neder-top-content-category[]">
                <?php foreach ($top_content_categories as $top_content_category) {  ?>
                    <option  value="<?php echo esc_html($top_content_category->term_id); ?>"              
                    <?php
                    if($top_content_categories_selected != '') : 
                        foreach($top_content_categories_selected as $top_content_category_selected) : 
                            if($top_content_category_selected == $top_content_category->term_id) :
                                echo 'selected'; 
                            endif;
                        endforeach;
                    endif;
                    ?>            
                    >		
                <?php echo esc_html($top_content_category->name); ?></option>
                <?php } ?>
                </select>
            </div>    

          	<div class="neder-metabox-item">
            	<?php $top_content_orderby_value = get_post_meta($object->ID, "neder-top-content-orderby", true); ?>
            	<label for="neder-top-content-orderby"><?php esc_html_e('Order By','neder'); ?></label>
            	<select name="neder-top-content-orderby">            
            		<option value="none" <?php if($top_content_orderby_value == 'none') : echo 'selected'; endif; ?>><?php esc_html_e('none','neder'); ?></option>
                    <option value="comment_count" <?php if($top_content_orderby_value == 'comment_count') : echo 'selected'; endif; ?>><?php esc_html_e('Comment Count','neder'); ?></option>
            		<option value="meta_value_num" <?php if($top_content_orderby_value == 'meta_value_num') : echo 'selected'; endif; ?>><?php esc_html_e('Views','neder'); ?></option>
                    <option value="date" <?php if($top_content_orderby_value == 'date') : echo 'selected'; endif; ?>><?php esc_html_e('date','neder'); ?></option>
            		<option value="modified" <?php if($top_content_orderby_value == 'modified') : echo 'selected'; endif; ?>><?php esc_html_e('modified','neder'); ?></option>
                    <option value="title" <?php if($top_content_orderby_value == 'title') : echo 'selected'; endif; ?>><?php esc_html_e('title','neder'); ?></option>
                    <option value="rand" <?php if($top_content_orderby_value == 'rand') : echo 'selected'; endif; ?>><?php esc_html_e('rand','neder'); ?></option>
            	</select>
            </div> 

          	<div class="neder-metabox-item">
            	<?php $top_content_orderdir_value = get_post_meta($object->ID, "neder-top-content-orderdir", true); ?>
            	<label for="neder-top-content-orderdir"><?php esc_html_e('Order dir','neder'); ?></label>
            	<select name="neder-top-content-orderdir">                     
                	<option value="DESC" <?php if($top_content_orderdir_value == 'DESC') : echo 'selected'; endif; ?>>DESC</option>           
            		<option value="ASC" <?php if($top_content_orderdir_value == 'ASC') : echo 'selected'; endif; ?>>ASC</option>
            	</select>
            </div>            
            
		</div>
        <!-- end:blog query -->
	
	</div>
	
	
	
<?php }

function save_neder_top_content_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

	# Top Content Active
	$neder_top_content_value = "";
    if(isset($_POST["neder-top-content-active"])) {
        $neder_top_content_value = $_POST["neder-top-content-active"];
    }   
    update_post_meta($post_id, "neder-top-content-active", $neder_top_content_value);	

	# Top Content Style
	$neder_top_content_layout_style = "";
    if(isset($_POST["neder-top-content-layout-style"])) {
        $neder_top_content_layout_style = $_POST["neder-top-content-layout-style"];
    }   
    update_post_meta($post_id, "neder-top-content-layout-style", $neder_top_content_layout_style);	

	# Top Content Query Category
	$neder_top_content_category = "";
    if(isset($_POST["neder-top-content-category"])) {
        $neder_top_content_category = $_POST["neder-top-content-category"];
    }   
    update_post_meta($post_id, "neder-top-content-category", $neder_top_content_category);

	# Top Content Query Orderby
	$neder_top_content_orderby = "";
    if(isset($_POST["neder-top-content-orderby"])) {
        $neder_top_content_orderby = $_POST["neder-top-content-orderby"];
    }   
    update_post_meta($post_id, "neder-top-content-orderby", $neder_top_content_orderby);

	# Top Content Query Orderdir
	$neder_top_content_orderdir = "";
    if(isset($_POST["neder-top-content-orderdir"])) {
        $neder_top_content_orderdir = $_POST["neder-top-content-orderdir"];
    }   
    update_post_meta($post_id, "neder-top-content-orderdir", $neder_top_content_orderdir);	
}	
add_action("save_post", "save_neder_top_content_meta_box", 10, 3);

/* Format Video */
 add_action( 'add_meta_boxes', 'neder_add_meta_boxes_video_format' );
 function neder_add_meta_boxes_video_format() {
	global $post;
    add_meta_box( 
        'neder_video_format',
        esc_html__( 'Neder Featured Video', 'neder' ),
        'neder_video_format_function',
        'post',
		'side'
    );	
 }

function neder_video_format_function($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
?>

	<div class="neder-metabox-item">
		<label for="neder-url-video-embed"><?php esc_html_e('Url video','neder'); ?></label>
		<input name="neder-url-video-embed" type="text" value='<?php echo get_post_meta($object->ID, "neder-url-video-embed", true); ?>'>
	</div>
	
<?php }

function save_neder_video_format_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
	
	# Url Video Embed
	$neder_url_video_embed = "";
    if(isset($_POST["neder-url-video-embed"])) {
        $neder_url_video_embed = $_POST["neder-url-video-embed"];
    }   
    update_post_meta($post_id, "neder-url-video-embed", $neder_url_video_embed);	
}	
add_action("save_post", "save_neder_video_format_meta_box", 10, 3);	

/* Format Audio */
 add_action( 'add_meta_boxes', 'neder_add_meta_boxes_audio_format' );
 function neder_add_meta_boxes_audio_format() {
	global $post;
    add_meta_box( 
        'neder_audio_format',
        esc_html__( 'Neder Featured Audio', 'neder' ),
        'neder_audio_format_function',
        'post',
		'side'
    );	
 }

function neder_audio_format_function($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
?>

	<div class="neder-metabox-item">
		<label for="neder-url-audio-embed"><?php esc_html_e('Url audio','neder'); ?></label>
		<input name="neder-url-audio-embed" type="text" value='<?php echo get_post_meta($object->ID, "neder-url-audio-embed", true); ?>'>
	</div>
	
<?php }

function save_neder_audio_format_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;
	
	# Url Audio Embed
	$neder_url_audio_embed = "";
    if(isset($_POST["neder-url-audio-embed"])) {
        $neder_url_audio_embed = $_POST["neder-url-audio-embed"];
    }   
    update_post_meta($post_id, "neder-url-audio-embed", $neder_url_audio_embed);	
}	
add_action("save_post", "save_neder_audio_format_meta_box", 10, 3);	