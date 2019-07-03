<?php 
/*Console Text*/
add_shortcode('insomnia_console_text', 'insomnia_console_text_f');
function insomnia_console_text_f( $atts, $content = null)
{
	extract(shortcode_atts(
		array(
			'insomnia_text_1' => "I am <i>Charles Montgomery</i>,",
			'insomnia_text_2' => "Miami based. French <i>designer</i>,",
			'insomnia_text_3' => "with <i>15 years</i> of experiences",
		), $atts)
	);
	$output ="
        <h1 class='insomnia_text'>
            <span id='typed'></span>
        </h1>


	<script>
    jQuery(function(){
        jQuery('#typed').typed({
					strings: ['$insomnia_text_1<br>$insomnia_text_2<br>$insomnia_text_3'],
                    contentType: 'html', // or 'text'
                    typeSpeed: 40,
                    showCursor: false,
                    callback: function(){
                        lift();
                    }
        });
    });
        function lift(){
        jQuery('.insomnia_text').addClass('insomnia_conosle_done_text');
    }
</script>";
	return $output;
};

vc_map( array(
	"name" => __("Console Text",'insomnia'),
	"base" => "insomnia_console_text",
	"category" => __('Insomnia','insomnia'), 
	"params" => array(
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text_1",
			"heading" => __("First line", 'insomnia'),
			"value" => "I am <i>Charles Montgomery</i>,",
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text_2",
			"heading" => __("Second line", 'insomnia'),
			"value" => "Miami based. French <i>designer</i>,",
			"admin_label" => true,
		),
		array(
			"type" => "textfield",
			"param_name" => "insomnia_text_3",
			"heading" => __("Third line", 'insomnia'),
			"description" => __("Mark word or words in tag 'i' for line after finish", 'insomnia'),
			"value" => "with <i>15 years</i> of experiences",
			"admin_label" => true,
		),
	)
) );