<?php
/*
File: inc/widget/separator.php
Description: separator
*/
  
add_action( 'widgets_init', 'neder_separator_widgets' );
function neder_separator_widgets() {
	register_widget('neder_ndwp_separator');
}
class neder_ndwp_separator extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_separator ndwp-widget neder_widget neder_ndwp_separator', 'description' => esc_html__('Your Line Separator','neder') );
		parent::__construct('widget-separator', 'Neder Separator', $widget_ops);
	}
	function widget( $args, $instance ) {
		extract($args);

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		$type = $instance['type'];
		$width = $instance['width'];
		$height = $instance['height'];
		$margintop = $instance['margintop'];
		$marginbottom = $instance['marginbottom'];
		$color = $instance['color'];
		
		echo $before_widget;?>
		
		<div class="neder-separator" style="border-style:<?php echo esc_html($type); ?>;border-top-width:<?php echo esc_html($height); ?>px;border-bottom:none;border-left:none;border-right:none;border-color:<?php echo esc_html($color); ?>;margin-top:<?php echo esc_html($margintop); ?>px;margin-bottom:<?php echo esc_html($marginbottom); ?>px;width:<?php echo esc_html($width); ?>%;display:block;margin-left:auto;margin-right:auto;"></div>
		
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
		$instance['width'] = $new_instance['width'];
		$instance['height'] = $new_instance['height'];
		$instance['margintop'] = $new_instance['margintop'];
		$instance['marginbottom'] = $new_instance['marginbottom'];
		$instance['color'] = $new_instance['color'];
		return $instance;
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
											'title'     		=> 'Line Separator',
											'type'				=> 'dotted',
											'width'  			=> '50', 
											'height' 			=> '2',
											'margintop'			=> '20',
											'marginbottom'		=> '20', 
											'color'				=> '#000000', 
											) 
								);
		$title = strip_tags($instance['title']);
		$type = isset($instance['type']) ? $instance['type'] : 'dotted';
		$width = isset($instance['width']) ? $instance['width'] : '50';
		$height = isset($instance['height']) ? $instance['height'] : '2';
		$margintop = isset($instance['margintop']) ? $instance['margintop'] : '20';
		$marginbottom = isset($instance['marginbottom']) ? $instance['marginbottom'] : '20';
		$color = isset($instance['color']) ? $instance['color'] : '#000000';

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title:','neder'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('type'); ?>"><?php echo esc_html__('Type:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
            <option <?php if ($type == 'dotted' ){echo 'selected="selected"';} ?> value="dotted"><?php esc_html_e('Dotted','neder'); ?></option>
            <option <?php if ($type == 'dashed' ){echo 'selected="selected"';} ?> value="dashed"><?php esc_html_e('Dashed','neder'); ?></option>
            <option <?php if ($type == 'solid' ){echo 'selected="selected"';} ?> value="solid"><?php esc_html_e('Solid','neder'); ?></option>
            <option <?php if ($type == 'double' ){echo 'selected="selected"';} ?> value="double"><?php esc_html_e('Double','neder'); ?></option>
            <option <?php if ($type == 'groove' ){echo 'selected="selected"';} ?> value="groove"><?php esc_html_e('Groove','neder'); ?></option>
            <option <?php if ($type == 'ridge' ){echo 'selected="selected"';} ?> value="ridge"><?php esc_html_e('Ridge','neder'); ?></option>
            <option <?php if ($type == 'inset' ){echo 'selected="selected"';} ?> value="inset"><?php esc_html_e('Inset','neder'); ?></option>
            <option <?php if ($type == 'outset' ){echo 'selected="selected"';} ?> value="outset"><?php esc_html_e('Outset','neder'); ?></option>
            <option <?php if ($type == 'initial' ){echo 'selected="selected"';} ?> value="initial"><?php esc_html_e('Initial','neder'); ?></option>
        </select></p>
        
        <p><label for="<?php echo $this->get_field_id('width'); ?>"><?php echo esc_html__('Width:','neder'); ?></label>
		<select id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" class="widefat">
            <option <?php if ($width == '5' ){echo 'selected="selected"';} ?> value="5"><?php esc_html_e('5%','neder'); ?></option>
            <option <?php if ($width == '10' ){echo 'selected="selected"';} ?> value="10"><?php esc_html_e('10%','neder'); ?></option>
            <option <?php if ($width == '15' ){echo 'selected="selected"';} ?> value="15"><?php esc_html_e('15%','neder'); ?></option>
            <option <?php if ($width == '20' ){echo 'selected="selected"';} ?> value="20"><?php esc_html_e('20%','neder'); ?></option>
            <option <?php if ($width == '25' ){echo 'selected="selected"';} ?> value="25"><?php esc_html_e('25%','neder'); ?></option>
            <option <?php if ($width == '30' ){echo 'selected="selected"';} ?> value="30"><?php esc_html_e('30%','neder'); ?></option>
            <option <?php if ($width == '35' ){echo 'selected="selected"';} ?> value="35"><?php esc_html_e('35%','neder'); ?></option>
            <option <?php if ($width == '40' ){echo 'selected="selected"';} ?> value="40"><?php esc_html_e('40%','neder'); ?></option>
            <option <?php if ($width == '45' ){echo 'selected="selected"';} ?> value="45"><?php esc_html_e('45%','neder'); ?></option>
            <option <?php if ($width == '50' ){echo 'selected="selected"';} ?> value="50"><?php esc_html_e('50%','neder'); ?></option>
            <option <?php if ($width == '55' ){echo 'selected="selected"';} ?> value="55"><?php esc_html_e('55%','neder'); ?></option>
            <option <?php if ($width == '60' ){echo 'selected="selected"';} ?> value="60"><?php esc_html_e('60%','neder'); ?></option>
            <option <?php if ($width == '65' ){echo 'selected="selected"';} ?> value="65"><?php esc_html_e('65%','neder'); ?></option>
            <option <?php if ($width == '70' ){echo 'selected="selected"';} ?> value="70"><?php esc_html_e('70%','neder'); ?></option>
            <option <?php if ($width == '75' ){echo 'selected="selected"';} ?> value="75"><?php esc_html_e('75%','neder'); ?></option>
            <option <?php if ($width == '80' ){echo 'selected="selected"';} ?> value="80"><?php esc_html_e('80%','neder'); ?></option>
            <option <?php if ($width == '85' ){echo 'selected="selected"';} ?> value="85"><?php esc_html_e('85%','neder'); ?></option>
            <option <?php if ($width == '90' ){echo 'selected="selected"';} ?> value="90"><?php esc_html_e('90%','neder'); ?></option>
            <option <?php if ($width == '95' ){echo 'selected="selected"';} ?> value="95"><?php esc_html_e('95%','neder'); ?></option>
            <option <?php if ($width == '100' ){echo 'selected="selected"';} ?> value="100"><?php esc_html_e('100%','neder'); ?></option>
        </select></p> 

		<p><label for="<?php echo $this->get_field_id('height'); ?>"><?php echo esc_html__('Height','neder'); ?></label><br> 
		<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" />
		<small><?php esc_html_e('add number of Pixel. Example: 2','neder'); ?></small>
		</p>

		<p><label for="<?php echo $this->get_field_id('margintop'); ?>"><?php echo esc_html__('Margin Top','neder'); ?></label><br> 
		<input class="widefat" id="<?php echo $this->get_field_id('margintop'); ?>" name="<?php echo $this->get_field_name('margintop'); ?>" type="text" value="<?php echo esc_attr($margintop); ?>" />
		<small><?php esc_html_e('add number of Pixel of margin top. Example: 20','neder'); ?></small>
		</p>

		<p><label for="<?php echo $this->get_field_id('marginbottom'); ?>"><?php echo esc_html__('Margin Bottom','neder'); ?></label><br> 
		<input class="widefat" id="<?php echo $this->get_field_id('marginbottom'); ?>" name="<?php echo $this->get_field_name('marginbottom'); ?>" type="text" value="<?php echo esc_attr($marginbottom); ?>" />
		<small><?php esc_html_e('add number of Pixel of margin bottom. Example: 20','neder'); ?></small>
		</p>

		<p><label for="<?php echo $this->get_field_id('color'); ?>"><?php echo esc_html__('Color','neder'); ?></label><br> 
		<input class="widefat" id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" type="text" value="<?php echo esc_attr($color); ?>" />
		<small><?php esc_html_e('Separator color. Example: #000000 or black','neder'); ?></small>
		</p>
		
<?php
	}
}
?>