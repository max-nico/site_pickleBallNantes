<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 
 
function neder_dynamic_enqueue_scripts() {
    wp_enqueue_style(
        'dynamic-css',
        admin_url( 'admin-ajax.php' ) . '?action=dynamic_css_action&wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ), // src
        array(),
        1.0
    );
}
function neder_dynamic_css_loader() {
    $nonce = $_REQUEST['wpnonce'];
    if ( ! wp_verify_nonce( $nonce, 'dynamic-css-nonce' ) ) {
        die( 'invalid nonce' );
    } else {
        require_once get_template_directory() . '/assets/css/dynamic.css.php';
    }
    exit;
}

add_action( 'wp_enqueue_scripts', 'neder_dynamic_enqueue_scripts' );

add_action( 'wp_ajax_dynamic_css_action', 'neder_dynamic_css_loader' );
add_action( 'wp_ajax_nopriv_dynamic_css_action', 'neder_dynamic_css_loader' );


# Function Views
if ( ! function_exists( 'neder_get_post_views' ) ) {
	function neder_get_post_views($postID){
		$count_key = 'wpb_post_neder_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			$view = esc_html__('Views','neder');
			return "0";
		}
		$count_final = $count; 
		return $count_final;
	}
}
if ( ! function_exists( 'neder_set_post_views' ) ) {
	function neder_set_post_views() {
		if ( is_single() ) {
		global $post;
		$postID = $post->ID;	
		$count_key = 'wpb_post_neder_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 1;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '1');
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
		}
	}
	add_filter( 'wp_footer', 'neder_set_post_views', 200000 );
}

# Function Thumbnails
if ( ! function_exists( 'neder_thumbs' ) ) {
	function neder_thumbs($thumbs_size = 'neder-preview-post') {
		global $post;
		global $neder_theme;
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), $thumbs_size );
				if($neder_theme['neder_lazy_load']) :
					$return = '<a href="'.$link.'"><img class="neder-lazy-load" data-original="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				else :
					$return = '<a href="'.$link.'"><img src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				endif;		
			} else {               
				 $return = '';                 
		}	
		return $return;
	}
}

# Function Thumbnails
if ( ! function_exists( 'neder_related_thumbs' ) ) {
	function neder_related_thumbs($thumbs_size = 'neder-preview-post') {
		global $post;
		global $neder_theme;
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), $thumbs_size );	
				if($neder_theme['neder_lazy_load']) :
					$return = '<a href="'.$link.'"><img class="owl-lazy" data-src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				else :
					$return = '<a href="'.$link.'"><img class="neder-vc-thumbs" src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				endif;
			} else {               
				$return = '';                 
		}			
		return $return;
	}
}

# Function Thumbnails
if ( ! function_exists( 'neder_thumbs_nll' ) ) {
	function neder_thumbs_nll($thumbs_size = 'neder-preview-post') {
		global $post;
		global $neder_theme;
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), $thumbs_size );	
				if($neder_theme['neder_lazy_load']) :
					$return = '<a href="'.$link.'"><img class="owl-lazy" data-src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				else :
					$return = '<a href="'.$link.'"><img class="neder-vc-thumbs" src="'.$single_image[0].'" alt="'.get_the_title().'"></a>';
				endif;
			} else {               
				$return = '';                 
		}			
		return $return;
	}
}

# Function Thumbnails
if ( ! function_exists( 'neder_thumbs_url_inline' ) ) {
	function neder_thumbs_url_inline($thumbs_size = 'neder-post-full-image') {
		global $post;
		$link = get_the_permalink();
		if(has_post_thumbnail()){ 
				$id_post = get_the_id();					
				$single_image = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), $thumbs_size );	 					 
				$return = 'style="background-image:url('.$single_image[0].')"';
			} else {               
				 $return = '';                 
		}	
		return $return;
	}
}

# Function Category
if ( ! function_exists( 'neder_category' ) ) {
	function neder_category($limit = '') {
			$categories = get_the_category();
			$separator = '';
			if(is_single()) : 
				$separator = ', ';
			endif;
			$output = '';
			if($limit == '') :
				if($categories){
					foreach($categories as $category) {
						$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'neder' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
					}
				};
			else :
				$count = 1;
				if($categories){
					foreach($categories as $category) {
						$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'neder' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						if($count == $limit) { break; }
						$count++;
					}
				};		
			endif;
		$return = trim($output, $separator);
		return $return;
	}
}

# Function Date
if ( ! function_exists( 'neder_post_data' ) ) {
	function neder_post_data($date_format) {
		$return = get_the_date($date_format); 
		return $return;
	}
}

# Function Post Content
if ( ! function_exists( 'neder_post_content' ) ) {
	function neder_post_content($excerpt) {
		$return = substr(get_the_excerpt(), 0, $excerpt);
		$return .= '<a href="'.get_the_permalink().'" title="'.esc_html__('Read More','neder').'"><i class="icon-arrow-right2"></i></a>';
		return $return;
	}
}

# Function Post By
if ( ! function_exists( 'neder_post_by' ) ) {
	function neder_post_by() {
		$return = esc_html__('Post by ','neder');
		$return .= '<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author_meta( 'display_name' ).'</a>';
		return $return;
	}
}

# Function Post Extra Info
if ( ! function_exists( 'neder_post_extra_info' ) ) {
	function neder_post_extra_info() {
		
    $return = '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.strtolower(str_replace(' ', '%20', get_the_title())).'" title="'.esc_html__('Click to share this post on Facebook','neder').'"><i class="icon-facebook5"></i></a>
		<a target="_blank" href="http://twitter.com/home?status='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Twitter','neder').'"><i class="icon-twitter4"></i></a>
        <a target="_blank" href="https://plus.google.com/share?url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Google+','neder').'"><i class="icon-google-plus"></i></a>';
	$num_comments = get_comments_number();
	if($num_comments > 0) :
		$return .= '<span class="comments"><a href="' . get_comments_link() .'">' . get_comments_number(get_the_ID()) . ' <i class="icon-bubble2"></i></a></span>';
	else :
		$return .= '<span class="comments">' . get_comments_number(get_the_ID()) . ' <i class="icon-bubble2"></i></span>';	
	endif;
		return $return;
	}
}

# Function Post Social
if ( ! function_exists( 'neder_post_social' ) ) {
	function neder_post_social() {
		
    $return = '<div class="container-social">
		<a target="_blank" href="http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;t='.get_the_title().'" title="'.esc_html__('Click to share this post on Facebook','neder').'"><i class="nedericon fa-facebook"></i></a>
		<a target="_blank" href="http://twitter.com/home?status='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Twitter','neder').'"><i class="nedericon fa-twitter"></i></a>
        <a target="_blank" href="https://plus.google.com/share?url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Google+','neder').'"><i class="nedericon fa-google-plus"></i></a>
        <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.get_the_permalink().'" title="'.esc_html__('Click to share this post on Linkedin','neder').'"><i class="nedericon fa-linkedin"></i></a></div>';
		
		return $return;
	}
}

# Get N° Comments	
if ( ! function_exists( 'neder_get_num_comments' ) ) :	
	function neder_get_num_comments() {
			$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

			if ( $num_comments == 0 ) {
					$comments = esc_html__('No Comments','neder');
					$return = $comments;
			} elseif ( $num_comments > 1 ) {
					$comments = $num_comments . esc_html__(' Comments','neder');
					$return = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
			} else {
					$comments = esc_html__('1 Comment','neder');
					$return = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
			}
			return $return;
	}
endif;

# Function Pagination
if ( ! function_exists( 'neder_paging_nav' ) ) :
	function neder_paging_nav() {
		global $wp_query;
		if ( $wp_query->max_num_pages < 2 )
			return;
		?>
		<div class="navigation"> 
        
				<?php if ( get_previous_posts_link() ) : ?>
					<div class="prev"><?php echo previous_posts_link( 
								wp_kses ( 	__( '<i class="icon-arrow-left8"></i> Previous Posts', 'neder' ), 
											array('i' => array( 
																'class' => array()
															)
											),
											$allowed_protocols 							
								) ); ?>
                    </div>
				<?php endif; ?>	
                        
				<?php if ( get_next_posts_link() ) : ?>
					<div class="next"><?php echo next_posts_link( 
								wp_kses ( 	__( 'Next Posts <i class="icon-arrow-right8"></i>', 'neder' ), 
											array('i' => array( 
																'class' => array()
															)
											),
											$allowed_protocols 
								) ); ?>
                    </div>
				<?php endif; ?>
                
                <div class="clear"></div>	
                                                                       
		</div>
		<?php
	}
endif;

# Function Numeric Pagination
if ( ! function_exists( 'neder_numeric_posts_nav' ) ) :
	function neder_numeric_posts_nav() {
	
		if( is_singular() )
			return;
	
		global $wp_query;
	
		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;
	
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
	
		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;
	
		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
	
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
	
		echo '<div class="ndwp-numeric-pagination"><ul>' . "\n";
	
		/**	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
	
		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';
	
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
	
			if ( ! in_array( 2, $links ) )
				echo '<li>...</li>';
		}
	
		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}
	
		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>...</li>' . "\n";
	
			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}
	
		/**	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );
	
		echo '</ul><div class="clear"></div></div>' . "\n";
	
	}
endif;

# Function Post Navigation
if ( ! function_exists( 'neder_post_nav' ) ) :
	function neder_post_nav() {
		global $post;
		?>                      
        <div class="navigation-post">
        
                <?php $prev_post = get_previous_post();
                        if (!empty( $prev_post )): ?>    
                        <div class="prev-post">
                                <?php echo get_the_post_thumbnail($prev_post->ID, array(60,60) ); ?>                     
                                <a href="<?php echo get_post_permalink($prev_post->ID); ?>" class="prev">
                                	<span class="prev-post-text"><i class="nedericon  fa-angle-left"></i> <?php echo esc_html__('Previous Post','neder'); ?></span>
									<span class="name-post"><?php echo esc_html($prev_post->post_title); ?></span>
                                </a>
                             <div class="clearfix"></div>
                        </div>    
                <?php endif ?>  
                
                          
                <?php $next_post = get_next_post();
                        if (!empty( $next_post )): ?>        
                        <div class="next-post">
                        	<a href="<?php echo get_post_permalink($next_post->ID); ?>" class="next">
                        		<span class="next-post-text"><?php echo esc_html__('Next Post','neder'); ?> <i class="nedericon  fa-angle-right"></i></span>                            
                            	<span class="name-post"><?php echo esc_html($next_post->post_title); ?></span>
                            </a>
                            <?php echo get_the_post_thumbnail($next_post->ID, array(60,60) ); ?>
                        	<div class="clearfix"></div>
                        </div>                    
                <?php endif; ?>
    
            
            	<div class="clearfix"></div>
        
        </div>
		<?php
	}
endif;

# Function Comments
if ( ! function_exists( 'neder_comment' ) ) :
	function neder_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :		
		?>
		<div class="comments-list">
			<div class="main-comment post pingback">
				<p><?php esc_html_e( 'Pingback:', 'neder' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'neder' ), '<span class="edit-link">', '</span>' ); ?></p>
			</div>
	
		<?php
			break;
		default :
		?>
		
		<div class="comments-list">
			<div id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> class="main-comment">
					<div class="comment-image-author">
						<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, 70 ); ?>    
					</div>
					<div class="comment-info">
						  <div class="comment-name-date">
							<span class="comment-name"><?php comment_author( $comment ); ?></span>
							<span class="comment-date">
								<?php printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'neder' ), get_comment_date(), get_comment_time() ); ?>
								<?php if(is_user_logged_in()) : echo '-'; endif; ?> 
								<?php edit_comment_link( esc_html__( 'Edit', 'neder' ), '<span class="edit-link">', '</span>' ); ?>
							</span>
							<div class="clearfix"></div>
						  </div>
						  <?php if ( '0' == $comment->comment_approved ) : ?>
						  <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'neder' ); ?></p>
						  <?php endif; ?>                      
						  <span class="comment-description"><?php comment_text(); ?> <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'reply_text' => '<i class="nedericon fa-long-arrow-right"></i>' ,'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>                     
					</div>
					<div class="clearfix"></div>
			</div>
		
	<?php 
			break;
		endswitch;
	}
endif;

if ( ! function_exists( 'neder_comment_end' ) ) :
	function neder_comment_end ($comment, $args, $depth) { ?>
		</div>
	<?php }
endif;

# Meta Functions
if ( ! function_exists( 'neder_meta' ) ) :
	function neder_meta($neder_theme) {
		global $post;
		$seo_redux = $neder_theme['seo_active'];
		$seo_redux_d = $neder_theme['seo_description'];
		$seo_redux_k = $neder_theme['seo_keywords'];
		$seo_metabox = get_post_meta( get_the_id(), 'neder-seo', true );
		$seo_metabox_d = get_post_meta( get_the_id(), 'neder-seo-description', true );
		$seo_metabox_k = get_post_meta( get_the_id(), 'neder-seo-keywords', true );	
		$return = '';
		if($seo_metabox == 'on') : 
			$return .= '<meta name="description" content="'.esc_attr($seo_metabox_d).'">';
			$return .= '<meta name="keywords" content="'.esc_attr($seo_metabox_k).'">';
		elseif($seo_redux == true) :
			$return .= '<meta name="description" content="'.esc_attr($seo_redux_d).'">';
			$return .= '<meta name="keywords" content="'.esc_attr($seo_redux_k).'">';		
		endif;
		return $return;
	}
endif;

# User Meta Fields
if ( ! function_exists( 'neder_extra_social_links' ) ) :
	add_action( 'show_user_profile', 'neder_extra_social_links' );
	add_action( 'edit_user_profile', 'neder_extra_social_links' );
	
	function neder_extra_social_links( $user )
	{
		?>
			<h3><?php esc_html_e('Social Author','neder'); ?></h3>
	
			<table class="form-table">
				<tr>
					<th><label for="facebook_profile">Facebook Profile</label></th>
					<td><input type="text" name="facebook_profile" value="<?php echo esc_attr(get_the_author_meta( 'facebook_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
	
				<tr>
					<th><label for="twitter_profile">Twitter Profile</label></th>
					<td><input type="text" name="twitter_profile" value="<?php echo esc_attr(get_the_author_meta( 'twitter_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
	
				<tr>
					<th><label for="google_plus_profile">Google+ Profile</label></th>
					<td><input type="text" name="google_plus_profile" value="<?php echo esc_attr(get_the_author_meta( 'google_plus_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
                
				<tr>
					<th><label for="vimeo_profile">Vimeo Profile</label></th>
					<td><input type="text" name="vimeo_profile" value="<?php echo esc_attr(get_the_author_meta( 'vimeo_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>
                
				<tr>
					<th><label for="linkedin_profile">Linkedin Profile</label></th>
					<td><input type="text" name="linkedin_profile" value="<?php echo esc_attr(get_the_author_meta( 'linkedin_profile', $user->ID )); ?>" class="regular-text" /></td>
				</tr>                                
                
			</table>
		<?php
	}

	add_action( 'personal_options_update', 'neder_save_extra_social_links' );
	add_action( 'edit_user_profile_update', 'neder_save_extra_social_links' );
	
	function neder_save_extra_social_links( $user_id )
	{
		update_user_meta( $user_id,'facebook_profile', sanitize_text_field( $_POST['facebook_profile'] ) );
		update_user_meta( $user_id,'twitter_profile', sanitize_text_field( $_POST['twitter_profile'] ) );
		update_user_meta( $user_id,'google_plus_profile', sanitize_text_field( $_POST['google_plus_profile'] ) );
		update_user_meta( $user_id,'vimeo_profile', sanitize_text_field( $_POST['vimeo_profile'] ) );
		update_user_meta( $user_id,'linkedin_profile', sanitize_text_field( $_POST['linkedin_profile'] ) );
	
	}	
	
endif;

# ADD Field Category Form
add_action ( 'edit_category_form_fields', 'neder_category_options');
function neder_category_options( $tag ) {
    $t_id = $tag->term_id;
    $Neder_cat_meta = get_option( "category_$t_id");
?>
<tr class="form-field">
	<th scope="row" valign="top"><h1><?php esc_html_e('Neder','neder'); ?></h1></th>
	<td scope="row" valign="top"><h1><?php esc_html_e('Category Options','neder'); ?></h1></td>
</tr>	


<tr class="form-field">
	<th scope="row" valign="top"><label for="neder_category_sidebar_position"><?php esc_html_e('Sidebar Position','neder'); ?></label></th>
	<td>		
				<select id="Neder_Cat_meta[neder_category_sidebar_position]" name="Neder_Cat_meta[neder_category_sidebar_position]">
				<?php 
						$neder_sidebar_values_positions = array(
									'default'					=> 'Default (if selected, gets category options panel)',
									'sidebar-left'	 			=> 'Left',
									'sidebar-right' 			=> 'Right',
									'sidebar-none' 				=> 'None'
						);

						foreach($neder_sidebar_values_positions as $key => $value) 
						{
							if($key == $Neder_cat_meta['neder_category_sidebar_position'])
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
			</td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="neder_category_layout"><?php esc_html_e('Category Layout','neder'); ?></label></th>
<td>		
            <select id="Neder_Cat_meta[neder_category_layout]" name="Neder_Cat_meta[neder_category_layout]">
            <?php 
                    $neder_layout_values = array(
								'default'					=> 'Default (if selected, gets category options panel)',
						 		'neder-posts-layout1'	=> 'Layout 1',
								'neder-posts-layout2' 	=> 'Layout 2',
								'neder-posts-layout3' 	=> 'Layout 3',
								'neder-posts-layout4' 	=> 'Layout 4'
					);

                    foreach($neder_layout_values as $key => $value) 
                    {
                        if($key == $Neder_cat_meta['neder_category_layout'])
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
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="neder_category_columns"><?php esc_html_e('Columns','neder'); ?></label></th>
<td>		
            <select id="Neder_Cat_meta[neder_category_columns]" name="Neder_Cat_meta[neder_category_columns]">
            <?php 
                    $neder_columns_values = array(
								'default'	=> 'Default (if selected, gets category options panel)',
						 		'1'	 		=> '1',
								'2' 		=> '2',
								'3' 		=> '3',
								'4' 		=> '4',
					);

                    foreach($neder_columns_values as $key => $value) 
                    {
                        if($key == $Neder_cat_meta['neder_category_columns'])
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
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="neder_category_layout_type"><?php esc_html_e('Layout Type','neder'); ?></label></th>
<td>		
            <select id="Neder_Cat_meta[neder_category_layout_type]" name="Neder_Cat_meta[neder_category_layout_type]">
            <?php 
                    $neder_layout_type_values = array(
								'default'	=> 'Default (if selected, gets category options panel)',
						 		'grid'	 	=> 'Grid',
								'masonry' 	=> 'Masonry'
					);

                    foreach($neder_layout_type_values as $key => $value) 
                    {
                        if($key == $Neder_cat_meta['neder_category_layout_type'])
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
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="neder_category_description"><?php esc_html_e('Category Description','neder'); ?></label></th>
<td>		
            <select id="Neder_Cat_meta[neder_category_description]" name="Neder_Cat_meta[neder_category_description]">
            <?php 
                    $neder_layout_type_values = array(
								'default'	=> 'Default (if selected, gets category options panel)',
						 		'on'	 	=> 'Show',
								'off' 		=> 'Hidden'
					);

                    foreach($neder_layout_type_values as $key => $value) 
                    {
                        if($key == $Neder_cat_meta['neder_category_description'])
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
        </td>
</tr>


<?php
}

// save extra category extra fields hook
add_action ( 'edited_category', 'neder_category_options_save');
function neder_category_options_save( $term_id ) {
    if ( isset( $_POST['Neder_Cat_meta'] ) ) {
        $t_id = $term_id;
        $Neder_cat_meta = get_option( "category_$t_id");
        $Neder_cat_keys = array_keys($_POST['Neder_Cat_meta']);
            foreach ($Neder_cat_keys as $key){
            if (isset($_POST['Neder_Cat_meta'][$key])){
                $Neder_cat_meta[$key] = $_POST['Neder_Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $Neder_cat_meta );
    }
}

# Google Fonts
function redux_fonts_url() {

    // global variable
    global $neder_theme;

    $fonts_url = '';

    $font_1 = $neder_theme['main-typography'];
    $font_1_family = $font_1['font-family'];

    $font_2 = $neder_theme['p-typography'];
    $font_2_family = $font_2['font-family'];

    $font_families = array();
    $font_subsets = array();
	
    if ( 'false' !== $font_1['google'])
    	$font_1_weight = $font_1['font-weight'];
    	$font_1_subset = $font_1['subsets'];		
        $font_families[] = $font_1_family.':'.$font_1_weight;
        $font_subsets[] = $font_1_subset;

    if ( 'false' !== $font_2['google'] )    
		$font_2_weight = $font_2['font-weight'];
    	$font_2_subset = $font_2['subsets'];
        $font_families[] = $font_2_family.':'.$font_2_weight;
        $font_subsets[] = $font_2_subset;

	// Remove duplicate values
	$font_families = array_unique($font_families);
	$font_subsets = array_unique($font_subsets);

    // Combine multiple fonts into one request
    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( implode( ',', $font_subsets )),
    );
    $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

    return $fonts_url;
}

function redux_custom_google_fonts() {
	global $neder_theme;
	
	$font_1 = $neder_theme['main-typography'];
	$font_2 = $neder_theme['p-typography'];
	
	if($font_1['google'] == 1 || $font_2['google'] == 1) :
    	wp_enqueue_style( 'redux-google-fonts', redux_fonts_url(), array(), null );
	endif;
}

add_action( 'wp_enqueue_scripts', 'redux_custom_google_fonts' );

# Function Custom Code
		
## Inline Custom Css
function neder_css_custom_code($neder_theme) {
    wp_enqueue_style(
        'neder-custom-css',
        get_template_directory_uri() . '/assets/css/owl.carousel.css'
    );
    wp_add_inline_style( 'neder-custom-css', $neder_theme['css-custom-code'] );
}

## Inline Custom Js
function neder_js_custom_code($neder_theme) {
   wp_enqueue_script( 'neder-custom-js', get_template_directory_uri() . '/assets/js/main.js' );
   wp_add_inline_script( 'neder-custom-js', $neder_theme['js-custom-code'] );
}

## Helper Demo Imported
function neder_helper_imported() {
    wp_enqueue_style(
        'neder-theme-css',
        get_template_directory_uri() . '/assets/css/owl.carousel.css'
    );
    wp_add_inline_style( 'neder-custom-css', get_theme_mod('neder_theme_css') );	
}

# Function Wp Title
function neder_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;
	
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'name' );
	
    if ( is_home() || is_front_page() ) :
		$title = "$site_description";
	elseif ( !is_home() || !is_front_page()) :
		$title = "$site_description $title";
	endif;
	
    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )    
	$title = "$title " . sprintf( esc_html__( 'Page %s', 'neder' ), max( $paged, $page ) );
	
    return $title;
}
add_filter( 'wp_title', 'neder_wp_title', 10, 2 );
 
wp_link_pages();




# Function VC
add_action( 'vc_before_init', 'neder_vcSetAsTheme' );
function neder_vcSetAsTheme() {
    vc_set_as_theme();
	$list = array(
		'page',
		'post'
	);
	vc_set_default_editor_post_types( $list );	
}

function neder_layout_class( $classes ) {
	global $neder_theme;
	
	if(!isset($neder_theme['layout-type'])) : 
	 	$neder_theme['layout-type'] = 'neder-fullwidth'; 
	endif;
	
    $classes[] = $neder_theme['layout-type']; 

	if(!isset($neder_theme['layout-content'])) : 
	 	$neder_theme['layout-type'] = 'neder-layout-default'; 
	endif;
	
	$classes[] = $neder_theme['layout-content']; 
	
    return $classes;
}
add_filter( 'body_class','neder_layout_class' );

# Function Logo
function neder_logo() {
	global $neder_theme;
	$return = '';
	
    $return .= '<a href="'.esc_url( home_url( '/' ) ).'">';
            
    if($neder_theme['logo']['url'] == '') :            
      	$return .= '<img src="'.get_template_directory_uri().'/assets/img/logo.png" alt="'.esc_html__('Logo','neder').'">';                	
    else :        	
      	$return .= '<img src="'.esc_url($neder_theme['logo']['url']).'" alt="'.esc_html__('Logo','neder').'">';
	endif;      
    
	$return .= '</a>';   
	  
	return $return;
}

# Function Sticky
function neder_logo_sticky() {
	global $neder_theme;
	$return = '';
	
    $return .= '<a href="'.esc_url( home_url( '/' ) ).'">';
            
    if($neder_theme['logo-sticky']['url'] == '' && $neder_theme['logo']['url'] == '') :            
      	$return .= '<img src="'.get_template_directory_uri().'/assets/img/logo-white.png" alt="'.esc_html__('Logo','neder').'">';                	
    elseif($neder_theme['logo-sticky']['url'] == '') : 
		$return .= '<img src="'.esc_url($neder_theme['logo']['url']).'" alt="'.esc_html__('Logo','neder').'">';
	else :        	
      	$return .= '<img src="'.esc_url($neder_theme['logo-sticky']['url']).'" alt="'.esc_html__('Logo','neder').'">';
	endif;      
    
	$return .= '</a>';   
	  
	return $return;
}

# Function Logo
function neder_logo_mobile() {
	global $neder_theme;
	$return = '';
	
    $return .= '<a href="'.esc_url( home_url( '/' ) ).'">';
            
    if($neder_theme['logo-mobile']['url'] == '' && $neder_theme['logo']['url'] == '') :            
      	$return .= '<img src="'.get_template_directory_uri().'/assets/img/logo.png" alt="'.esc_html__('Logo','neder').'">';                	
    elseif($neder_theme['logo-mobile']['url'] == '') : 
		$return .= '<img src="'.esc_url($neder_theme['logo']['url']).'" alt="'.esc_html__('Logo','neder').'">';
	else :        	
      	$return .= '<img src="'.esc_url($neder_theme['logo-mobile']['url']).'" alt="'.esc_html__('Logo','neder').'">';
	endif;      
    
	$return .= '</a>';   
	  
	return $return;
}

# Function Banner TOP
function neder_banner_top() {
	global $neder_theme;
	
	$advertisement_top 						= $neder_theme['advertisement-top'];
	$advertisement_top_type 				= $neder_theme['advertisement-top-type'];
	$advertisement_top_banner 				= esc_url($neder_theme['advertisement-top-banner']['url']);
	$advertisement_top_banner_link			= esc_url($neder_theme['advertisement-top-banner-link']);
	$advertisement_top_banner_link_target 	= $neder_theme['advertisement-top-banner-link-target'];
	$advertisement_top_banner_custom_code 	= $neder_theme['advertisement-top-banner-custom-code'];
	
	$return = '';
	
	if($advertisement_top_type == 'banner-image' && $advertisement_top == true) :
	
		if($advertisement_top_banner != '') :
			
			$return .= '<div class="neder_advertisement_top_banner">';
			
				if($advertisement_top_banner_link) :
				
					$return .= '<a href="'.esc_url($advertisement_top_banner_link).'" target="'.$advertisement_top_banner_link_target.'">';
						$return .= '<img src="'.esc_url($advertisement_top_banner).'" alt="'.esc_html__('Banner Top','neder').'">';
					$return .= '</a>';
				
				else :
				
					$return .= '<img src="'.esc_url($advertisement_top_banner).'" alt="'.esc_html__('Banner Top','neder').'">';		
				
				endif;
		
			$return .= '</div>';
		
		endif;
	
	elseif($advertisement_top_type == 'custom-code' && $advertisement_top == true) :
	
		$return .= html_entity_decode($advertisement_top_banner_custom_code);
		
	endif;
	
	return $return;
}

function neder_advertisement_content() {
	global $neder_theme;
	
	$advertisement_content_bottom_type 					= $neder_theme['advertisement-content-bottom-type'];
	$advertisement_content_banner 						= esc_url($neder_theme['advertisement-content-banner']['url']);
	$advertisement_content_banner_link					= esc_url($neder_theme['advertisement-content-banner-link']);
	$advertisement_content_banner_link_target 			= $neder_theme['advertisement-content-banner-link-target'];
	$advertisement_content_bottom_banner_custom_code 	= $neder_theme['advertisement-content-bottom-banner-custom-code'];
	
	$return = '';
	$return .= '<div class="neder_advertisement_content_banner">';
	
	if($advertisement_content_bottom_type  == 'banner-image' && $advertisement_content_banner != '') :
				
			if($advertisement_content_banner_link) :
				
				$return .= '<a href="'.esc_url($advertisement_content_banner_link).'" target="'.$advertisement_content_banner_link_target.'">';
					$return .= '<img src="'.esc_url($advertisement_content_banner).'" alt="'.esc_html__('Banner Content','neder').'">';
				$return .= '</a>';
				
			else :
				
				$return .= '<img src="'.esc_url($advertisement_content_banner).'" alt="'.esc_html__('Banner Content','neder').'">';		
				
			endif;
			
	elseif($advertisement_content_bottom_type  == 'custom-code') :
	
		$return .= html_entity_decode($advertisement_content_bottom_banner_custom_code);
	
	endif;
	
	$return .= '</div>';
    return $return;
}

function neder_advertisement_content_top() {
	global $neder_theme;
	
	$advertisement_content_top_type 				= $neder_theme['advertisement-content-top-type'];
	$advertisement_content_top_banner 				= esc_url($neder_theme['advertisement-content-top-banner']['url']);
	$advertisement_content_top_banner_link			= esc_url($neder_theme['advertisement-content-top-banner-link']);
	$advertisement_content_top_banner_link_target 	= $neder_theme['advertisement-content-top-banner-link-target'];
	$advertisement_content_top_banner_custom_code 	= $neder_theme['advertisement-content-top-banner-custom-code'];
	
	$return = '';
	$return .= '<div class="neder_advertisement_content_banner content_top_banner">';
	
	if($advertisement_content_top_type  == 'banner-image' && $advertisement_content_top_banner != '') :
				
			if($advertisement_content_top_banner_link) :
				
				$return .= '<a href="'.esc_url($advertisement_content_top_banner_link).'" target="'.$advertisement_content_top_banner_link_target.'">';
					$return .= '<img src="'.esc_url($advertisement_content_top_banner).'" alt="'.esc_html__('Banner Content','neder').'">';
				$return .= '</a>';
				
			else :
				
				$return .= '<img src="'.esc_url($advertisement_content_top_banner).'" alt="'.esc_html__('Banner Content','neder').'">';		
				
			endif;
			
	elseif($advertisement_content_top_type  == 'custom-code') :
	
		$return .= html_entity_decode($advertisement_content_top_banner_custom_code);
	
	endif;
	
	$return .= '</div>';
    return $return;
}

function neder_banner_footer() {
	global $neder_theme;
	
	$advertisement_footer 						= $neder_theme['advertisement-footer'];
	$advertisement_footer_type 					= $neder_theme['advertisement-footer-type'];
	$advertisement_footer_banner 				= esc_url($neder_theme['advertisement-footer-banner']['url']);
	$advertisement_footer_banner_link			= esc_url($neder_theme['advertisement-footer-banner-link']);
	$advertisement_footer_banner_link_target 	= $neder_theme['advertisement-footer-banner-link-target'];
	$advertisement_footer_banner_custom_code 	= $neder_theme['advertisement-footer-banner-custom-code'];
	
	$return = '';
	
	if($advertisement_footer_type == 'banner-image' && $advertisement_footer == true) :
	
		if($advertisement_footer_banner != '') :
			
			$return .= '<div class="neder_advertisement_footer_banner">';
			
				if($advertisement_footer_banner_link) :
				
					$return .= '<a href="'.esc_url($advertisement_footer_banner_link).'" target="'.$advertisement_footer_banner_link_target.'">';
						$return .= '<img src="'.esc_url($advertisement_footer_banner).'" alt="'.esc_html__('Banner Top','neder').'">';
					$return .= '</a>';
				
				else :
				
					$return .= '<img src="'.esc_url($advertisement_footer_banner).'" alt="'.esc_html__('Banner Top','neder').'">';		
				
				endif;
		
			$return .= '</div>';
		
		endif;
	
	elseif($advertisement_footer_type == 'custom-code' && $advertisement_footer == true) :
	
		$return .= html_entity_decode($advertisement_footer_banner_custom_code);
		
	endif;
	
	return $return;
}

# Function Date
function neder_date() {
	global $neder_theme;
	
 	$header_date_format = esc_html($neder_theme['header-date-format']);

	$return = date_i18n( $header_date_format, current_time( 'timestamp' ) );	
	
	return $return;	
}

# Function Get Category Slug by ID
function neder_get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = get_category($cat_id);
	return $category->slug;
}

# Function Ticker
function neder_ticker() {
	global $neder_theme;
	
	/* RTL */	
	if ($neder_theme['rtl']) :  $rtl = 'rtl:true,'; else : $rtl = ''; endif;  
	/* #RTL */
	

	$autoplay 			= $neder_theme['news-ticker-autoplay'];
	$num_posts 			= $neder_theme['news-ticker-num-posts'];
	$posts_source 		= $neder_theme['news-ticker-posts-source'];
	$redux_categories 	= $neder_theme['news-ticker-categories'];
	$order 				= $neder_theme['news-ticker-order'];
	$orderby 			= $neder_theme['news-ticker-orderby'];	
	if($num_posts == '1') : $num_posts = 2; endif;
	$categories = '';
	
	if($autoplay == '') : $autoplay = '2000'; endif;
	if(!empty($redux_categories)) :
		foreach($redux_categories as $category) :
			$categories .= neder_get_cat_slug($category) . ',';
		endforeach;
	else :
		$categories = '';
	endif;
	
	$posts_source = 'all_posts';
	// LOOP QUERY
	$query = neder_query( 'post',
							 $posts_source, 
							 '', 
							 $categories,
							 '', 
							 $order, 
							 $orderby, 
							 'no', 
							 '',
							 $num_posts, 
							 '' );
							 
	$loop = new WP_Query($query);
	
	$style	= $neder_theme['news-ticker-style'];

	if($style == 'style2') :
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_script( 'owl-carousel-script' );	
	
	
		if($loop->post_count === 1) :
			$return = '';
		else :
			$return = '<script type="text/javascript">jQuery(document).ready(function($){
						$(\'.neder-top-news-ticker\').owlCarousel({
							loop:true,
							margin:0,
							nav:true,
							lazyLoad: false,
							dots:false,
							autoplay: true,
							smartSpeed: 2000,
							'.$rtl.'
							navText: [\'<i class="nedericon fa-angle-left"></i>\',\'<i class="nedericon fa-angle-right"></i>\'],
							autoplayTimeout: '.$autoplay.',
							responsive:{
									0:{
										items:1
									}							
								}
							});
						});</script>';
		endif;
		
		$return .= '<div class="neder-top-news-ticker">';
		
		if($loop) :
			while ( $loop->have_posts() ) : $loop->the_post();
		
				$id_post = get_the_id();
				$link = get_permalink(); 	
				
				$return .= '<div class="news-ticker-item">';
				
					$return .= '<div class="news-ticker-item-category">'.neder_category(1).'</div>';
					$return .= '<div class="news-ticker-item-title"><a href="'.$link.'">'.get_the_title().'</a></div>';
					
				$return .= '</div>';
	
			endwhile;
		endif;	
		
		$return .= '</div>';	
	
	else :
		if($neder_theme['rtl']) : $rtl = 'direction: \'rtl\','; endif;	
		wp_enqueue_script('neder-newsticker-js', NEDER_JS_URL . 'newsticker.js', array('jquery'), '', true);
		$return = '<script type="text/javascript">jQuery(document).ready(function($){
			$(\'#neder-top-news-ticker\').ticker({
													titleText: \''.esc_html__('Trending','neder').'\',
													'.$rtl.'
													pauseOnItems: '.$autoplay.'														
													});
		});</script>';
	
		$return .= '<div class="neder-top-news-ticker"><ol id="neder-top-news-ticker" class="ticker">';
		
		if($loop) :
			while ( $loop->have_posts() ) : $loop->the_post();
		
				$id_post = get_the_id();
				$link = get_permalink(); 	
				
				$return .= '<li>';
				
					$return .= '<a class="news-ticker-item-title" href="'.$link.'">'.get_the_title().'</a>';
					
				$return .= '</li>';
	
			endwhile;
		endif;		
	
		$return .= '</ol></div>';
	endif;	
	

	

	wp_reset_query();
	return $return; 
}
# Function Header Top Social
function neder_social() {
	global $neder_theme;
    
	$return = '<div class="neder-header-top-social">';
            
		# Facebook
		if($neder_theme['facebook'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['facebook']).'"><i class="nedericon fa-facebook"></i></a>';
		endif;
		
		# Twitter
		if($neder_theme['twitter'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['twitter']).'"><i class="nedericon fa-twitter"></i></a>';
		endif;		

		# Google Plus
		if($neder_theme['googleplus'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['googleplus']).'"><i class="nedericon fa-google-plus"></i></a>';
		endif;

		# Instagram
		if($neder_theme['instagram'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['instagram']).'"><i class="nedericon fa-instagram"></i></a>';
		endif;	

		# Linkedin
		if($neder_theme['linkedin'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['linkedin']).'"><i class="nedericon fa-linkedin"></i></a>';
		endif;		

		# Vimeo
		if($neder_theme['vimeo'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['vimeo']).'"><i class="nedericon fa-vimeo"></i></a>';
		endif;                

		# Youtube
		if($neder_theme['youtube'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['youtube']).'"><i class="nedericon fa-youtube"></i></a>';
		endif;     
        
	$return	.= '</div>';	
	
	return $return;
}


# Function Menu
function neder_menu() {
	
	
}

# Function Top Menu
function neder_top_menu() {
		global $neder_theme;	
		$defaults = array(
			'menu_id'		  => $neder_theme['top-menu'],
            'container'       => 'ul',
            'container_class' => 'neder-top-menu',
            'container_id'    => '',
            'fallback_cb'     => 'nav_fallback',
            'menu_class'      => 'neder-top-menu',
            'echo'            => true,
            'depth'           => 0,
			'walker' 		  => new My_Walker_Nav_Menu()
        );
        wp_nav_menu( $defaults );
}

# Function Seach
function neder_search() {
	 $return = '<div class="neder-search-menu-button">
						<i class="nedericon fa-search search-open-form"></i>
						<i class="nedericon fa-close search-close-form"></i>
				</div>
				<div class="neder-search">
					<form action="'.esc_url( home_url( '/' ) ).'" method="get">
						<div class="form-group-search">
							<input type="search" class="search-field" name="s" placeholder="'.esc_html__('Search...','neder').'">
							<button type="submit" class="search-btn"><i class="nedericon fa-search"></i></button>
						</div>
					</form>
				</div>';
	return $return;		
}

# Function Seach
function neder_add_to_cart() {
	global $woocommerce; 
	$cart_url = $woocommerce->cart->get_cart_url();
    $return = '<div class="neder-woocommerce-menu">
                                <a class="cart-contents" href="'.$cart_url.'" title="'.__('View your shopping cart', 'neder').'">
									<i class="nedericon fa-cart-plus"></i>
									'.sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'neder'), $woocommerce->cart->cart_contents_count).'    
                                </a>
				</div>';
	return $return;		
}

# Get Post Types
function neder_ndwp_all_post_types() {

	// Select all public post types
	$args = array(
	   'public'   => true,
	);
	
	$all_types = get_post_types($args, 'names', 'and');
	
	
	// Put them in an ordered array filtering the types you don't want
	
	$sel_types = array();
	
	foreach ($all_types as $type) {
	
		if ($type != 'attachment' && $type != 'post' && $type != 'page') { 
			$sel_types[] = $type; 
		}
		
	}
	
	
	// Return Selected Post Types Array
	$return = '';
	$return .= '<select id="admegaposts_post_type">';
	foreach ($sel_types as $slug) {
		$return .= '<option value="'.$slug.'">'.$slug.'</option>';	
	}
	$return .= '</select>';
	
	
	return $return;

}

# Get Post Types Widget 
function neder_ndwp_all_post_types_for_widget($id_select,$name_select,$source) {

	// Select all public post types
	$args = array(
	   'public'   => true,
	);
	
	$all_types = get_post_types($args, 'names', 'and');
	
	
	// Put them in an ordered array filtering the types you don't want
	
	$sel_types = array();
	
	foreach ($all_types as $type) {
	
		if ($type != 'attachment' && $type != 'page') { 
			$sel_types[] = $type; 
		}
		
	}
	
	
	// Return Selected Post Types Array
	$return = '';
	$return .= '<select id="'.$id_select.'" name="'.$name_select.'" class="widefat">';
	foreach ($sel_types as $slug) {
		if($source == $slug) { $selected = 'selected="selected"'; } else { $selected = ''; }
		$return .= '<option '.$selected.' value="'.$slug.'">'.$slug.'</option>';	
	}
	$return .= '</select>';
	
	
	return $return;

}
 
# Get Taxonomy for Widget
function neder_ndwp_all_taxonomy_for_widget($id_select,$name_select,$source) { 
	$args = array(
	  'public'   => true,
	  '_builtin' => false  
	); 
	$output = 'names'; 
	$operator = 'and';
	$taxonomies = get_taxonomies( $args, $output, $operator ); 
	$return = '';
	$return .= '<select id="'.$id_select.'" name="'.$name_select.'" class="widefat">';
	if($source == 'category') { $selected = 'selected="selected"'; } else { $selected = ''; }
	$return .= '<option '.$selected.' value="category">Category</option>';	
	if ( $taxonomies ) {
	  foreach ( $taxonomies  as $taxonomy ) {
		if($source == $taxonomy) { $selected = 'selected="selected"'; } else { $selected = ''; }		  
		$return .= '<option '.$selected.' value="'.$taxonomy.'">' . $taxonomy . '</option>';
	  }
	}
	$return .= '</select>';
	return $return;	
}

# Get Excerpt
function neder_ndwp_excerpt($excerpt = 'default') {
	global $post;
	if($excerpt == 'default') : 
		
		$return = get_the_excerpt();
	
	else :
	
		$return = substr(get_the_excerpt(), 0, $excerpt);
	
		$return .= ' <a class="article-read-more" href="'. get_permalink($post->ID) . '">...</a>';
	
	endif;
	
	return $return;
}

function neder_ndwp_excerpt_more( $more ) {
	global $post;
    return ' <a class="article-read-more" href="'. get_permalink($post->ID) . '">...</a>';
}
add_filter( 'excerpt_more', 'neder_ndwp_excerpt_more' );

# Get Numeric Pagination for VC
function neder_posts_numeric_pagination($pages = '', $range = 2,$loop,$paged)
{  
     $showitems = ($range * 2)+1;  

     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         $pages = $loop->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
	
	 $return = '';
	
     if(1 != $pages) {		 	
         $return .= "<div class='ndwp-numeric-pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) $return .=  "<a href='".get_pagenum_link(1)."' class=\"ndwp-pagination-numeric-arrow\"><i class=\"nedericon fa-angle-double-left ndwp-icon-double-left\"></i></a>";
         if($paged > 1 && $showitems < $pages) $return .=  "<a href='".get_pagenum_link($paged - 1)."' class=\"ndwp-pagination-numeric-arrow\"><i class=\"nedericon fa-angle-left ndwp-icon-left\"></i></a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 $return .=  ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) $return .= "<a href='".get_pagenum_link($paged + 1)."' class=\"ndwp-pagination-numeric-arrow\"><i class=\"nedericon fa-angle-right ndwp-icon-right\"></i></a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $return .=  "<a href='".get_pagenum_link($pages)."' class=\"ndwp-pagination-numeric-arrow\"><i class=\"nedericon fa-angle-double-right ndwp-icon-double-right\"></i></a>";
         $return .=  "</div>\n";
     }
	 
	 return $return;
}

# WP Query
function neder_query( $source,
						 $posts_source, 
						 $post_type, 
						 $categories,
						 $categories_post_type,
						 $order, 
						 $orderby, 
						 $pagination, 
						 $pagination_type,
						 $num_posts, 
						 $num_posts_page ) {
								  
						if($orderby == 'views') { 
								$orderby = 'meta_value_num'; 
								$view_order = 'views';
						} else { $view_order = ''; }	
										
						if($source == 'wp_custom_posts_type') {
							$posts_source = 'all_posts';
						}
						
						if($posts_source == 'all_posts') {
						
							$query = 'post_type=Post&post_status=publish&ignore_sticky_posts=1&orderby='.$orderby.'&order='.$order.'';						
							
							// CUSTOM POST TYPE
							if($source == 'posts_type') {
								$query .= '&post_type='.$post_type.'';
							}

							if($view_order == 'views') { 
								$query .= '&meta_key=wpb_post_views_count';
							}
							
							// CATEGORIES POST TYPE
							if($categories_post_type != '' && !empty($categories_post_type) && $source == 'posts_type') {
								$taxonomy_names = get_object_taxonomies( $post_type );
								$query .= '&'.$taxonomy_names[0].'='.$categories_post_type.'';	
							}

							// CATEGORIES POSTS
							if($categories != '' && $categories != 'all' && !empty($categories) && $source == 'post') {
								$query .= '&category_name='.$categories.'';	
							}
								
							if($pagination == 'yes' || $pagination == 'load-more') {
								$query .= '&posts_per_page='.$num_posts_page.'';	
							} else {
								if($num_posts == '') { $num_posts = '-1'; }
								$query .= '&posts_per_page='.$num_posts.'';
							}
						
							// PAGINATION		
							if($pagination == 'yes' || $pagination == 'load-more') {
								if ( get_query_var('paged') ) {
									$paged = get_query_var('paged');
								
								} elseif ( get_query_var('page') ) {			
									$paged = get_query_var('page');			
								} else {			
									$paged = 1;			
								}			
								$query .= '&paged='.$paged.'';
							}
							// #PAGINATION	
						
						} else { // IF STICKY
							

							if($pagination == 'yes' || $pagination == 'load-more') {
								$num_posts = $num_posts_page;	
							} else {
								if($num_posts == '') { $num_posts = '-1'; }
								$num_posts = $num_posts;
							}

							// PAGINATION		
							
							if ( get_query_var('paged') ) {
								$paged = get_query_var('paged');							
							} elseif ( get_query_var('page') ) {			
								$paged = get_query_var('page');			
							} else {			
								$paged = 1;			
							}			
							
							// #PAGINATION	
												
							/* STICKY POST DA FARE ARRAY PER SCRITTURA IN ARRAY */
						
							$sticky = get_option( 'sticky_posts' );
							$sticky = array_slice( $sticky, 0, 5 );
							if($view_order == 'views') { 
								$query = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'orderby' 	=> $orderby,
									'order' => $order,
									'category_name' => $categories,
									'posts_per_page' => $num_posts,
									'meta_key' => 'wpb_post_views_count',
									'paged' => $paged, 
									'post__in'  => $sticky,
									'ignore_sticky_posts' => 1
								);
							} else {
								$query = array(
									'post_type' => 'post',
									'post_status' => 'publish',
									'orderby' 	=> $orderby,
									'order' => $order,
									'category_name' => $categories,
									'posts_per_page' => $num_posts,
									'paged' => $paged, 
									'post__in'  => $sticky,
									'ignore_sticky_posts' => 1
								);
							}						
							
						} // #all_posts
						
						return $query;	
}

# Comment Form Reorder

add_filter( 'comment_form_fields', 'neder_comment_form_fields' );

function neder_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	if ( ! isset( $args['format'] ) ) :
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';	
	endif;
	$html5    = 'html5' === $args['format'];
	$comment_field = $fields['comment'];
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);	
	unset($fields['comment']);		
	
	$fields['author'] = '<div class="comment-form-author col-xs-4">
		            <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_html__( 'Name','neder' ) . '" /></div>';

	$fields['url'] = '<div class="comment-form-url col-xs-4">
		            <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_html__( 'Url','neder' ) . '" /></div>';
					
					
	$fields['email']  = '<div class="comment-form-email col-xs-4">
		            <input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="' . esc_html__( 'Email','neder' ) . '" /></div>';
	
	$fields['comment'] = '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_html__( 'Comment','neder' ) . '"></textarea></div>';				
					
	return $fields;
}

# Footer Social
function neder_footer_social() {
	global $neder_theme;
	
	$return = '<div class="neder-footer-social">';
            
		# Facebook
		if($neder_theme['footer-facebook'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-facebook']).'"><i class="nedericon fa-facebook"></i></a>';
		endif;
		
		# Twitter
		if($neder_theme['footer-twitter'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-twitter']).'"><i class="nedericon fa-twitter"></i></a>';
		endif;		

		# Google Plus
		if($neder_theme['footer-googleplus'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-googleplus']).'"><i class="nedericon fa-google-plus"></i></a>';
		endif;

		# Instagram
		if($neder_theme['footer-instagram'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-instagram']).'"><i class="nedericon fa-instagram"></i></a>';
		endif;	

		# Linkedin
		if($neder_theme['footer-linkedin'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-linkedin']).'"><i class="nedericon fa-linkedin"></i></a>';
		endif;		

		# Vimeo
		if($neder_theme['footer-vimeo'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-vimeo']).'"><i class="nedericon fa-vimeo"></i></a>';
		endif;                

		# Youtube
		if($neder_theme['footer-youtube'] != '') :
			$return .= '<a href="'.esc_url($neder_theme['footer-youtube']).'"><i class="nedericon fa-youtube"></i></a>';
		endif;     
        
	$return	.= '</div>';	
	
	return $return;	
	
}

# Function Top Menu
function neder_footer_menu() {
		global $neder_theme;	
		$defaults = array(
			'menu_id'		  => $neder_theme['footer-top-menu'],
            'container'       => 'ul',
            'container_class' => 'neder-top-menu',
            'container_id'    => '',
            'fallback_cb'     => 'nav_fallback',
            'menu_class'      => 'neder-top-menu',
            'echo'            => false,
            'depth'           => 0,
			'walker' 		  => new My_Walker_Nav_Menu()
        );
        $return = wp_nav_menu( $defaults );
		//$return = wp_get_nav_menu_items($neder_theme['footer-top-menu']);
		//print_r($return);
		return $return;
}

function neder_get_menu_array($current_menu) {
    $array_menu = wp_get_nav_menu_items($current_menu);	
	$return = '<ul id="'.$current_menu.'" class="neder-top-menu">';
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
			$return .= '<li class="menu-item"><a href="'.$m->url.'">'.$m->title.'</a>';
        }
    }
	$return .= '</ul>';
    return $return; 
}

function neder_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/',' class="submenu"',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','neder_submenu_class'); 

add_action( 'after_setup_theme', 'neder_custom_sidebar_setup' );
if ( ! function_exists( 'neder_custom_sidebar_setup' ) ) {
    function neder_custom_sidebar_setup() {
		if ( class_exists( 'Redux' ) ) {
			Redux::init('neder_theme');
			global $neder_theme;
			if(empty($neder_theme['custom-sidebar-name'])) : $neder_theme['custom-sidebar-name'] = ''; endif; 
			if(!empty($neder_theme['custom-sidebar-name']) && $neder_theme['custom-sidebar-name'] != '' && $neder_theme['custom-sidebar-name'] != 1) :
				$count=0;
				foreach ($neder_theme['custom-sidebar-name'] as $custom_sidebar_name) :
					$custom_sidebar_id_string = str_replace(' ','-',$custom_sidebar_name) . '-' .$count;				
					$custom_sidebar_id = strtolower($custom_sidebar_id_string);
					register_sidebar(
						array(
							'name'          => $custom_sidebar_name,
							'id'            => $custom_sidebar_id,
							'before_widget' => '<div id="%1$s" class="widget %2$s">',
							'after_widget'  => "</div>",
							'before_title'  => '<h3 class="widget-title"><span class="ndwp-title-widget">',
							'after_title'   => '</span></h3>',
						)
					);
				$count++;
				endforeach;
			endif;
		}
	}
}

function neder_hex2rgb($hex) {

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

add_editor_style();

function neder_check_color() {
	global $neder_theme;
	$return = '';
 	if ($neder_theme['bg-types'] == 'color') :
		$bg1 = $neder_theme['bg-color']['rgba'];
		$preset = $neder_theme['preset'];
		
		if($preset == 'default') : $content_background 			= '#FFFFFF'; endif;
		if($preset == 'custom') :  $content_background 			= $neder_theme['content_background']; endif;

		$bg2_rgba = neder_hex2rgb($content_background);
		$bg2 = 'rgba('.$bg2_rgba[0].','.$bg2_rgba[1].','.$bg2_rgba[2].',1)';
		if (strcmp($bg1, $bg2) == 0) {
			$return = 'class="neder-content-no-padding"';
		};
	else :
		$return = '';
	endif;
	return $return;
}

add_filter( 'body_class','neder_body_class' );
function neder_body_class( $classes ) {
	global $neder_theme;
	if ($neder_theme['rtl']) : 
		$classes[] = 'neder-rtl'; 
		wp_enqueue_style( 'neder-rtl',  NEDER_CSS_URL . 'rtl.css' );
	endif;
	if ($neder_theme['neder_panel_post_article_info']) : 
		$classes[] = 'neder-no-comment-data';
	endif;
    return $classes;
}

function neder_check_format() {
	global $post;
	$format = get_post_format_string( get_post_format() );
	if($format == 'Video') :
		$return = '<span class="neder-format-type nedericon fa-play-circle-o"></span>';
	elseif($format == 'Audio') :
		$return = '<span class="neder-format-type nedericon fa-headphones"></span>';
	else :
		$return = '';
	endif;
	return $return;
}


function neder_header_top() {
	global $neder_theme;
	$header_top_elements_order = $neder_theme['header-top-order']['enabled'];
	$count_elements = count($header_top_elements_order);
	
	
	
	$return =	'<div class="neder-header-top">
					<div class="neder-wrap-container">';	
	
	if ($header_top_elements_order): 
			
	foreach ($header_top_elements_order as $key=>$value) {
	switch($key) {
					
	# CASE News Ticker							
	case 'newsticker':
	
		$return .=  '<div class="neder-ticker col-sm-';
		if($count_elements == '2') :
			$return .= '12';
		elseif($count_elements == '3') :	
			$return .= '6';
		elseif($count_elements == '4') :
			$return .= '4';
		else :
			$return .= esc_html($neder_theme['header-login-register']);
		endif;
		$return .= '">'.neder_ticker().'</div>';
	break;
	case 'menu-social':
	
		if($count_elements == '2') :
			$columns = '12';
		elseif($count_elements == '3') :	
			$columns = '6';
		elseif($count_elements == '4') :
			$columns = '4';
		else :
			$columns = '3';
		endif;
	
		if(esc_html($neder_theme['type-header-top-right']) == 'social') :
			$return .= '<div class="neder-social col-sm-'.$columns.'">
							'.neder_social().'
						</div>';	
								
		elseif(esc_html($neder_theme['type-header-top-right']) == 'top-menu') :

			$return .= '<div class="neder-top-menu col-sm-'.$columns.'">
							'.neder_get_menu_array($neder_theme['top-menu']).'
						</div>';							
								
		else :
								
			$return .= '<div class="col-sm-'.$columns.'">
						</div>';								
								
		endif;
								
	break;
	case 'date':	

		if($count_elements == '2') :
			$columns = '12';
		elseif($count_elements == '3') :	
			$columns = '6';
		elseif($count_elements == '4') :
			$columns = '4';
		else :
			$columns = '2';
		endif;
	
		$return .= '<div class="neder-date col-sm-'.$columns.'">
						'.neder_date().'
					</div>';	
					
	break;
	case 'login':	

		if($count_elements == '2') :
			$columns = '12';
		elseif($count_elements == '3') :	
			$columns = '6';
		elseif($count_elements == '4') :
			$columns = '4';
		else :
			$columns = '2';
		endif;
		
		if(esc_html($neder_theme['header-login-register']) == '5') :
								
			$return .= '<div class="flonews-login-register col-sm-'.$columns.'">';
							if( ! is_user_logged_in() ) :
								$return .= '<div class="flonews-login-register-logout"><a href="#neder-login">'.esc_html__( 'Login/Register', 'neder' ).'</a></div>';
							else :
								$current_user = wp_get_current_user();
								$return .= '<div class="flonews-login-register-logged">' . esc_html__('Howdy','neder') . ' ' . $current_user->display_name . ' <a href="'.wp_logout_url( get_permalink() ).'">'.esc_html__( 'Logout', 'neder' ).'</a></div>';
							endif;
			$return .= '</div>';
								
		endif;
		}
	}	
	endif;
	$return .=	'<div class="neder-clear"></div>
			</div>						
		</div>';	
	return $return; 	
}