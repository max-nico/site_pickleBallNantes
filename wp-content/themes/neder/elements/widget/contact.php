<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */ 

// add admin scripts
add_action('admin_enqueue_scripts', 'neder_widget_contact_image_upload');
function neder_widget_contact_image_upload() {
    wp_register_script('neder_widget_image_upload_js', get_template_directory_uri() . '/elements/widget/widget_image_upload.js', false, '1.0', true);
}

 
add_action( 'widgets_init', 'neder_contact_widgets' );
function neder_contact_widgets() {
	register_widget('neder_Widget_contact');
}
class neder_Widget_contact extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_contact ndwp-widget neder_widget neder_widget_contact', 'description' => esc_html__('Your contact','neder') );
		parent::__construct('widget-contact', 'Neder - Contact', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);
		$title 			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$image_uri 		= apply_filters( 'widget_contact', empty( $instance['image_uri'] ) ? '' : $instance['image_uri'], $instance );
		$htmlText 		= apply_filters( 'widget_contact', empty( $instance['htmlText'] ) ? '' : $instance['htmlText'], $instance );
		$address_title 	= apply_filters( 'widget_contact', empty( $instance['address_title'] ) ? '' : $instance['address_title'], $instance );
		$address 		= apply_filters( 'widget_contact', empty( $instance['address'] ) ? '' : $instance['address'], $instance );
		$mail 			= apply_filters( 'widget_contact', empty( $instance['mail'] ) ? '' : $instance['mail'], $instance );
		$tel_number 	= apply_filters( 'widget_contact', empty( $instance['tel_number'] ) ? '' : $instance['tel_number'], $instance );
		$cell_number 	= apply_filters( 'widget_contact', empty( $instance['cell_number'] ) ? '' : $instance['cell_number'], $instance );
		
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		?>
        <?php
		if($image_uri) { 
			echo '<div class="neder-widget-contact-image">
					<img src="'.$image_uri.'" title="'.esc_html__('contact Image','neder').'" alt="'.$title.'">';	
			echo '</div>'; 
		}
		?>
        <?php if($htmlText) { 
			echo '<div class="neder-widget-contact-text">
					<p>'.$htmlText.'</p>';		
			echo '</div>'; 
		} ?>
        <?php if($address_title) { 
			echo '<div class="neder-widget-contact-address-title">
					<h4>'.$address_title.'</h4>';		
			echo '</div>'; 
		} ?>
        <?php if($address) { 
			echo '<div class="neder-widget-contact-address">
					<i class="nedericon fa-map-marker"></i>'.$address;		
			echo '</div>'; 
		} ?>
        <?php if($mail) { 
			echo '<div class="neder-widget-contact-mail">
					<i class="nedericon fa-envelope-o"></i>'.$mail;		
			echo '</div>'; 
		} ?>
        <?php if($tel_number) { 
			echo '<div class="neder-widget-contact-tel-number">
					<i class="nedericon fa-phone"></i>'.$tel_number;		
			echo '</div>'; 
		} ?>
        <?php if($cell_number) { 
			echo '<div class="neder-widget-contact-cell-number">
					<i class="nedericon fa-mobile-phone"></i>'.$cell_number;		
			echo '</div>'; 
		} ?>		
             <div class="clearfix"></div>
             
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 			= $new_instance['title'];
		$instance['htmlText'] 		= $new_instance['htmlText'];	
		$instance['image_uri'] 		= $new_instance['image_uri'];
		$instance['address_title'] 	= $new_instance['address_title'];
		$instance['address'] 		= $new_instance['address'];
		$instance['mail'] 			= $new_instance['mail'];
		$instance['tel_number'] 	= $new_instance['tel_number'];
		$instance['cell_number'] 	= $new_instance['cell_number'];
		return $instance;
	}
	function form( $instance ) {
		wp_enqueue_media();
		wp_enqueue_script('thickbox');
    	wp_enqueue_style('thickbox');
		wp_enqueue_script('neder_widget_image_upload_js');
		$instance = wp_parse_args( (array) $instance, array( 
																'title' => 'Contact', 
																'htmlText' => '', 
																'address_title' => '', 
																'address' => '', 
																'mail' => '', 
																'tel_number' => '', 
																'cell_number' => '', 
															)
					);
		$title = strip_tags($instance['title']);
		$htmlText = $instance['htmlText'];
		$address_title 				= $instance['address_title'];
		$address 					= $instance['address'];
		$mail 						= $instance['mail'];
		$tel_number 				= $instance['tel_number'];
		$cell_number 				= $instance['cell_number'];		
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
		
        <p>
        <div class="neder-widget-image-upload">
        <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
        <?php
            if ( $instance['image_uri'] != '' ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
            endif;
        ?> 
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" style="margin-top:5px;">

        <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="Upload Image" style="margin-top:5px;" onClick="add_slide(this)"/>
    	</div>
        </p>              
				
        <p><label for="<?php echo $this->get_field_id('htmlText'); ?>" style="width:78px; display:inline-block;"><?php echo 'Html Text:'; ?></label>
        <br>
        <textarea cols="31" id="<?php echo $this->get_field_id('htmlText'); ?>" name="<?php echo $this->get_field_name('htmlText'); ?>" type="text"><?php echo $htmlText; ?></textarea>
        <em><small>HTML allowed</small></em></p>

		<p><label for="<?php echo $this->get_field_id('address_title'); ?>"><?php echo 'Address Title:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('address_title'); ?>" name="<?php echo $this->get_field_name('address_title'); ?>" type="text" value="<?php echo esc_attr($address_title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('address'); ?>"><?php echo 'Address:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($address); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('mail'); ?>"><?php echo 'Mail:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('mail'); ?>" name="<?php echo $this->get_field_name('mail'); ?>" type="text" value="<?php echo esc_attr($mail); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('tel_number'); ?>"><?php echo 'Tel Number:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('tel_number'); ?>" name="<?php echo $this->get_field_name('tel_number'); ?>" type="text" value="<?php echo esc_attr($tel_number); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('cell_number'); ?>"><?php echo 'cell Number:'; ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('cell_number'); ?>" name="<?php echo $this->get_field_name('cell_number'); ?>" type="text" value="<?php echo esc_attr($cell_number); ?>" /></p>
		
<?php
	}
}
?>