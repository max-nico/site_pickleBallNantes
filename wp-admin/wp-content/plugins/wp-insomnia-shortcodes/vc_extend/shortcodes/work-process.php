<?php 

add_shortcode('insomnia_process', 'insomnia_process_f');
function insomnia_process_f( $atts, $content = null)
{
  extract(shortcode_atts(
    array(
      'insomnia_process_icon_1' => 'pe-7s-chat',
      'insomnia_process_name_1' => 'Discuss tasks',
      'insomnia_process_icon_2' => 'pe-7s-note2',
      'insomnia_process_name_2' => 'Make some notes',
      'insomnia_process_icon_3' => 'pe-7s-tools',
      'insomnia_process_name_3' => 'Create project',
      'insomnia_process_icon_4' => 'pe-7s-gift',
      'insomnia_process_name_4' => 'Give your product',
      'white' => null,
      'cirle' => null,
      "css" => null
    ), $atts)
  );
  
  if ($white) $white = 'white';
  if ($cirle) $cirle = 'cirle';

  $output ='
            <div class="process-work '. esc_attr($white) .'">
            <div class="process-block-one">
              <div class="process-round '. esc_attr($cirle) .'">
                <div class="process-icon"><i class="'. esc_attr($insomnia_process_icon_1) .'"></i></div>
                <div class="process-text">'. esc_attr($insomnia_process_name_1) .'</div>
              </div>
            </div>
            <div class="process-block-two">
              <div class="process-arrow"><i class="pe-7s-angle-right"></i></div>
            </div>
            <div class="process-block-one">
              <div class="process-round '. esc_attr($cirle) .'">
                <div class="process-icon"><i class="'. esc_attr($insomnia_process_icon_2) .'"></i></div>
                <div class="process-text">'. esc_attr($insomnia_process_name_2) .'</div>
              </div>
            </div>
            <div class="process-block-two">
              <div class="process-arrow"><i class="pe-7s-angle-right"></i></div>
            </div>
            <div class="process-block-one">
              <div class="process-round '. esc_attr($cirle) .'">
                <div class="process-icon red"><i class="'. esc_attr($insomnia_process_icon_3) .'"></i></div>
                <div class="process-text">'. esc_attr($insomnia_process_name_3) .'</div>
              </div>
            </div>
            <div class="process-block-two">
              <div class="process-arrow"><i class="pe-7s-angle-right"></i></div>
            </div>
            <div class="process-block-one">
              <div class="process-round '. esc_attr($cirle) .'">
                <div class="process-icon green"><i class="'. esc_attr($insomnia_process_icon_4) .'"></i></div>
                <div class="process-text">'. esc_attr($insomnia_process_name_4) .'</div>
              </div>
            </div> 
            </div> 

            ';
  return $output;


};

vc_map( array(
  "name" => __("Work Process",'insomnia'),
  "base" => "insomnia_process",
  "category" => __('Insomnia','insomnia'),
  "params" => array(
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_icon_1",
      "heading" => __("Icon", 'insomnia'),
      "value" => 'pe-7s-chat',
      "group" => __("1st stage", 'insomnia'),
      "description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_name_1",
      "heading" => __("Name", 'insomnia'),
      "value" => 'Discuss tasks',
      "group" => __("1st stage", 'insomnia'),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_icon_2",
      "heading" => __("Icon", 'insomnia'),
      "value" => 'pe-7s-note2',
      "group" => __("2nd stage", 'insomnia'),
      "description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_name_2",
      "heading" => __("Name", 'insomnia'),
      "value" => 'Make some notes',
      "group" => __("2nd stage", 'insomnia'),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_icon_3",
      "heading" => __("Icon", 'insomnia'),
      "value" => 'pe-7s-tools',
      "group" => __("3rd stage", 'insomnia'),
      "description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_name_3",
      "heading" => __("Name", 'insomnia'),
      "value" => 'Create project',
      "group" => __("3rd stage", 'insomnia'),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_icon_4",
      "heading" => __("Icon", 'insomnia'),
      "value" => 'pe-7s-gift',
      "group" => __("4th stage", 'insomnia'),
      "description" => __( 'Select icon from <a href="https://dankov-themes.com/icon/insomnia/index.html" target="_blank">here</a>.', 'insomnia' ),
      "admin_label" => true,
    ),
    array(
      "type" => "textfield",
      "param_name" => "insomnia_process_name_4",
      "heading" => __("Name", 'insomnia'),
      "value" => 'Give your product',
      "group" => __("4th stage", 'insomnia'),
      "admin_label" => true,
    ),
    array(
      "type" => "checkbox",
      "heading" => __("White fonts", 'insomnia'),
      "param_name" => "white",
      "value" => array("Yes" => true),
      "group" => __("Settings", 'insomnia'),
      "admin_label" => true,

    ),  
    array(
      "type" => "checkbox",
      "heading" => __("White cirle", 'insomnia'),
      "param_name" => "cirle",
      "value" => array("Yes" => true),
      "group" => __("Settings", 'insomnia'),
      "admin_label" => true,
    ),  
  )
) );