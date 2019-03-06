<?php
/*
File: inc/widget/social.php
Description: social widget
*/
  
add_action( 'widgets_init', 'neder_ndwp_social_widgets' );
function neder_ndwp_social_widgets() {
	register_widget('neder_ndwp_social');
}
class neder_ndwp_social extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_neder_ndwp_social ndwp-widget neder_widget neder_ndwp_social', 'description' => esc_html__('Your Neder social','neder') );
		parent::__construct('widget-neder_ndwp_social', 'Neder Social', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		
		if ( !empty( $instance['style'] ) ) {
 			$style = $instance['style'];
		}else{			
			$style = 'neder-widget-social-style1';
		}		
		
		$facebook = apply_filters( 'widget_neder_ndwp_social', empty( $instance['facebook'] ) ? '' : $instance['facebook'], $instance );
		$twitter = apply_filters( 'widget_neder_ndwp_social', empty( $instance['twitter'] ) ? '' : $instance['twitter'], $instance );
		$googleplus = apply_filters( 'widget_neder_ndwp_social', empty( $instance['googleplus'] ) ? '' : $instance['googleplus'], $instance );
		$pinterest = apply_filters( 'widget_neder_ndwp_social', empty( $instance['pinterest'] ) ? '' : $instance['pinterest'], $instance );
		$flickr = apply_filters( 'widget_neder_ndwp_social', empty( $instance['flickr'] ) ? '' : $instance['flickr'], $instance );
		$instagram = apply_filters( 'widget_neder_ndwp_social', empty( $instance['instagram'] ) ? '' : $instance['instagram'], $instance );
		$linkedin = apply_filters( 'widget_neder_ndwp_social', empty( $instance['linkedin'] ) ? '' : $instance['linkedin'], $instance );
		$youtube = apply_filters( 'widget_neder_ndwp_social', empty( $instance['youtube'] ) ? '' : $instance['youtube'], $instance );
		$vimeo = apply_filters( 'widget_neder_ndwp_social', empty( $instance['vimeo'] ) ? '' : $instance['vimeo'], $instance );

		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="box_social ad_one_one <?php echo esc_html($style); ?>">   
			<?php if($style == 'neder-widget-social-style1') : ?>
				<?php 
					if($facebook) {					 
						echo '<div class="box-icon-social ad_one_third facebook"><a href="'.$facebook.'" class="nedericon fa-facebook-official"></a><p class="text-social">'.esc_html__('FACEBOOK','neder').'</p></div>';
					} 
					if($twitter) {					 
						echo '<div class="box-icon-social ad_one_third twitter"><a href="'.$twitter.'" class="nedericon fa-twitter-square"></a><p class="text-social">'.esc_html__('TWITTER','neder').'</p></div>';
					}
					if($googleplus) {					 
						echo '<div class="box-icon-social ad_one_third google-plus"><a href="'.$googleplus.'" class="nedericon fa-google-plus-square"></a><p class="text-social">'.esc_html__('GOOGLE PLUS','neder').'</p></div>';
					}
					if($pinterest) {					 
						echo '<div class="box-icon-social ad_one_third pinterest"><a href="'.$pinterest.'" class="nedericon fa-pinterest-square"></a><p class="text-social">'.esc_html__('PINTEREST','neder').'</p></div>';
					}
					if($flickr) {					 
						echo '<div class="box-icon-social ad_one_third flickr"><a href="'.$flickr.'" class="nedericon fa-flickr"></a><p class="text-social">'.esc_html__('FLICKR','neder').'</p></div>';
					}
					if($instagram) {					 
						echo '<div class="box-icon-social ad_one_third instagram"><a href="'.$instagram.'" class="nedericon fa-instagram"></a><p class="text-social">'.esc_html__('INSTAGRAM','neder').'</p></div>';
					}
					if($linkedin) {					 
						echo '<div class="box-icon-social ad_one_third linkedin"><a href="'.$linkedin.'" class="nedericon fa-linkedin"></a><p class="text-social">'.esc_html__('LINKEDIN','neder').'</p></div>';
					}
					if($youtube) {					 
						echo '<div class="box-icon-social ad_one_third youtube"><a href="'.$youtube.'" class="nedericon fa-youtube"></a><p class="text-social">'.esc_html__('YOUTUBE','neder').'</p></div>';
					}
					if($vimeo) {					 
						echo '<div class="box-icon-social ad_one_third vimeo"><a href="'.$vimeo.'" class="nedericon fa-vimeo"></a><p class="text-social">'.esc_html__('VIMEO','neder').'</p></div>';
					}					
				?>
			<?php else : ?>
				<?php 
					if($facebook) {					 
						echo '<div class="box-icon-social col-xs-2 facebook"><a href="'.$facebook.'" class="nedericon fa-facebook"></a></div>';
					} 
					if($twitter) {					 
						echo '<div class="box-icon-social col-xs-2 twitter"><a href="'.$twitter.'" class="nedericon fa-twitter"></a></div>';
					}
					if($googleplus) {					 
						echo '<div class="box-icon-social col-xs-2 google-plus"><a href="'.$googleplus.'" class="nedericon fa-google-plus"></a></div>';
					}
					if($pinterest) {					 
						echo '<div class="box-icon-social col-xs-2 pinterest"><a href="'.$pinterest.'" class="nedericon fa-pinterest"></a></div>';
					}
					if($flickr) {					 
						echo '<div class="box-icon-social col-xs-2 flickr"><a href="'.$flickr.'" class="nedericon fa-flickr"></a></div>';
					}
					if($instagram) {					 
						echo '<div class="box-icon-social col-xs-2 instagram"><a href="'.$instagram.'" class="nedericon fa-instagram"></a></div>';
					}
					if($linkedin) {					 
						echo '<div class="box-icon-social col-xs-2 linkedin"><a href="'.$linkedin.'" class="nedericon fa-linkedin"></a></div>';
					}
					if($youtube) {					 
						echo '<div class="box-icon-social col-xs-2 youtube"><a href="'.$youtube.'" class="nedericon fa-youtube"></a></div>';
					}
					if($vimeo) {					 
						echo '<div class="box-icon-social col-xs-2 vimeo"><a href="'.$vimeo.'" class="nedericon fa-vimeo"></a></div>';
					}					
				?>
			<?php endif; ?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['style'] 			= strip_tags($new_instance['style']);
		$instance['facebook'] 		= strip_tags($new_instance['facebook']);
		$instance['twitter'] 		= strip_tags($new_instance['twitter']);
		$instance['googleplus'] 	= strip_tags($new_instance['googleplus']);
		$instance['pinterest'] 		= strip_tags($new_instance['pinterest']);
		$instance['flickr'] 		= strip_tags($new_instance['flickr']);
		$instance['instagram'] 		= strip_tags($new_instance['instagram']);
		$instance['linkedin'] 		= strip_tags($new_instance['linkedin']);
		$instance['youtube'] 		= strip_tags($new_instance['youtube']);
		$instance['vimeo'] 			= strip_tags($new_instance['vimeo']);
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' 		=> 'Social', 
											'style'			=> 'neder-widget-social-style1',
											'facebook' 		=> '', 
											'twitter' 		=> '' ,
											'googleplus' 	=> '',
											'pinterest' 	=> '',
											'flickr' 		=> '',
											'instagram' 	=> '',
											'linkedin' 		=> '',
											'youtube' 		=> '',
											'vimeo' 		=> '',
											) 
								);
		$title = strip_tags($instance['title']);
		$style = isset($instance['style']) ? strip_tags($instance['style']) : 'neder-widget-social-style1';
		$facebook 		= strip_tags($instance['facebook']);
		$twitter 		= strip_tags($instance['twitter']);
		$googleplus 	= strip_tags($instance['googleplus']);
		$pinterest		= strip_tags($instance['pinterest']);
		$flickr 		= strip_tags($instance['flickr']);
		$instagram		= strip_tags($instance['instagram']);
		$linkedin		= strip_tags($instance['linkedin']);
		$youtube		= strip_tags($instance['youtube']);
		$vimeo			= strip_tags($instance['vimeo']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('style'); ?>"><?php echo esc_html__('Style:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" class="widefat">
            <option <?php if ($style == 'neder-widget-social-style1' ){echo 'selected="selected"';} ?> value="neder-widget-social-style1">Style 1</option>
            <option <?php if ($style == 'neder-widget-social-style2' ){echo 'selected="selected"';} ?> value="neder-widget-social-style2">Style 2</option>
            <option <?php if ($style == 'neder-widget-social-style3' ){echo 'selected="selected"';} ?> value="neder-widget-social-style3">Style 3</option>
        </select>
        </p>
		
        <p><label for="<?php echo $this->get_field_id('facebook'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Facebook Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_html($facebook); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('twitter'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Twitter Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_html($twitter); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('googleplus'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Google Plus Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo esc_html($googleplus); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('pinterest'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Pinterest Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_html($pinterest); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('flickr'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Flickr Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_html($flickr); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('instagram'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('instagram Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_html($instagram); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('linkedin'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('linkedin Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_html($linkedin); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('youtube'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('youtube Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_html($youtube); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('vimeo'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('vimeo Url:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo esc_html($vimeo); ?>" /></p>
		

		
<?php
	}
}
?>