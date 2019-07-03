<?php

     $fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'insomnia_logo_image',
    'label'       => __( 'Logo by image', 'insomnia' ),
    'section'     => 'insomnia_logo_section',
    'default'     => '1',
    'priority'    => 10,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'insomnia' ),
        'off' => esc_attr__( 'Disable', 'insomnia' ),
    ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_logo_text',
        'description' => __( 'Add text logo', 'insomnia' ),
        'section'     => 'insomnia_logo_section',
        'default'     => 'Insomnia',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_logo_image',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'insomnia_logo_upload',
        'description' => __( 'Add logo for transparent menu', 'universal-wp' ),
        'section'     => 'insomnia_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo.png',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_logo_image',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'insomnia_retina_logo_upload',
        'description' => __( 'Add retina logo (2x) for transparent menu', 'universal-wp' ),
        'section'     => 'insomnia_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo@2x.png',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_logo_image',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'insomnia_logo_dark_upload',
        'description' => __( 'Add logo for white background menu', 'universal-wp' ),
        'section'     => 'insomnia_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo.png',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_logo_image',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'insomnia_retina_logo_dark_upload',
        'description' => __( 'Add retina (2x) for white background menu', 'universal-wp' ),
        'section'     => 'insomnia_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/logo@2x.png',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_logo_image',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    ); 

     $fields[] = array(
        'type'        => 'image',
        'settings'     => 'insomnia_logo_favicon',
        'label'       => __( 'Favicon', 'insomnia'),
        'description' => __( 'Image 144x144, png', 'insomnia' ),
        'section'     => 'insomnia_logo_section',
        'default'     => get_template_directory_uri() . '/assets/images/favicon.png',
        'priority'    => 10,
    );

?>