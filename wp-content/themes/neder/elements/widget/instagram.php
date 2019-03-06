<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 
add_action( 'widgets_init', 'neder_instagram_widgets' );
function neder_instagram_widgets() {
	register_widget('neder_instagram');
}
class neder_instagram extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_neder_instagram neder-widget neder_instagram widget-gallery', 'description' => esc_html__('Your neder_instagram','neder') );
		parent::__construct('widget-neder_instagram', 'Neder - Instagram', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$account_id = apply_filters( 'widget_neder_instagram', empty( $instance['account_id'] ) ? '' : $instance['account_id'], $instance );
		$access_token = apply_filters( 'widget_neder_instagram', empty( $instance['access_token'] ) ? '' : $instance['access_token'], $instance );
		$num_image = apply_filters( 'widget_neder_instagram', empty( $instance['num_image'] ) ? '' : $instance['num_image'], $instance );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
            <div class="instagram-image <?php echo 'instagram-image-loaded-'.$num_image.''; ?>">    
            <?php 
			$url = "https://api.instagram.com/v1/users/".$account_id."/media/recent?access_token=". $access_token ."&count=". $num_image;
			$caption = (!empty($data->caption)) ? $data->caption->text : '';
			$array = wp_remote_get( $url );
			$data_json = json_decode($array['body']);
			$i = 0;
			if($data_json) {
				while ( $i <= ( $num_image-1 ) ) {			
					$data = $data_json->data[$i];
					$thumb = $data->images->thumbnail->url;		
					$shortlink = $data->link;
					echo '<a class="insta_shortlink" target="_blank" href="'. $shortlink .'">
							<img class="insta_img" src="'. $thumb .'" alt="'.htmlspecialchars($caption).'" />
					</a>';
				$i++;
				}
			}
			?>
             <div class="clearfix"></div>
            </div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['account_id'] 		= strip_tags($new_instance['account_id']);
		$instance['access_token'] 		= strip_tags($new_instance['access_token']);
		$instance['num_image'] 		= strip_tags($new_instance['num_image']);

		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title' 		=> 'instagram', 
											'account_id' 	=> '', 
											'access_token'	=> '',
											'num_image' 	=> '' ,
											) 
								);
		$title = strip_tags($instance['title']);
		
		$account_id 	= strip_tags($instance['account_id']);
		$access_token	= strip_tags($instance['access_token']);
		$num_image 		= strip_tags($instance['num_image']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
                
        <p><label for="<?php echo $this->get_field_id('account_id'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Instagram Account ID:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('account_id'); ?>" name="<?php echo $this->get_field_name('account_id'); ?>" type="text" value="<?php echo esc_html($account_id); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('access_token'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Access Token:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('access_token'); ?>" name="<?php echo $this->get_field_name('access_token'); ?>" type="text" value="<?php echo esc_html($access_token); ?>" /></p>
				
        <p><label for="<?php echo $this->get_field_id('num_image'); ?>" style="width:78px; display:inline-block;"><?php echo esc_html__('Number images to Load:','neder'); ?></label>
		<input id="<?php echo $this->get_field_id('num_image'); ?>" name="<?php echo $this->get_field_name('num_image'); ?>" type="text" value="<?php echo esc_html($num_image); ?>" /></p>
		
<?php
	}
}
 
 

?>