<?php 
/*Console Text*/
add_shortcode('insomnia_typed_text', 'insomnia_typed_text_f');
function insomnia_typed_text_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'insomnia_text' => "No coding or design skills required... It's time to create something",
			'insomnia_text_1' => "special",
			'insomnia_text_2' => "easy",
			'insomnia_text_3' => "quick",
		), $atts)
	);
	$output ="

        <div class='type-wrap'>". esc_attr($insomnia_text) ."
            <div id='typed-strings'>
                <p>". esc_attr($insomnia_text_1) ."</p>
                <p>". esc_attr($insomnia_text_2) ."</p>
                <p>". esc_attr($insomnia_text_3) ."</p>
            </div>
             <span id='typed' style='white-space:pre;'></span>

        </div>

	<script>
    jQuery(function(){

        jQuery('#typed').typed({
            stringsElement: jQuery('#typed-strings'),
            typeSpeed: 60,
            startDelay: 0,
            backDelay: 1500,
            shuffle: false,
            showCursor: false,
            loop: true,
            contentType: 'html', // or text
            loopCount: true,
        });

    });

</script>";

	return $output;
};


/*Console Text*/
vc_map( array(
	"name" => __("Typed Text",'insomnia'),
	"base" => "insomnia_typed_text",
	"category" => __('Insomnia','insomnia'), 
	"params" => array(
		array(
			"type" => "textarea",
			"param_name" => "insomnia_text",
			"heading" => __("Text", 'insomnia'),
			"value" => "No coding or design skills required... It's time to create something",
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text_1",
			"heading" => __("First line", 'insomnia'),
			"value" => "special",
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text_2",
			"heading" => __("First line", 'insomnia'),
			"value" => "easy",
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text_3",
			"heading" => __("Second line", 'insomnia'),
			"value" => "quick",
			"admin_label" => true,
		),

	)
) );