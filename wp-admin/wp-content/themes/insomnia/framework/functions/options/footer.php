<?php

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_sticky_footer',
        'label'       => __( 'Sticky Footer', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => '0',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
    );

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_widget_footer',
        'label'       => __( 'Widgets Footer', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);
     
     $fields[] = array(
        'type'        => 'select',
        'settings'    => 'insomnia_widget_footer_count',
        'label'       => __( 'Count Of Widgets', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => 'four',
        'priority'    => 10,
        'choices'     => array(
            'three'   => esc_attr__( '1/4 + 1/4 + 1/4', 'insomnia' ),
            'four' => esc_attr__( '1/3 + 1/3 + 1/3 + 1/3', 'insomnia' ),
            'five' => esc_attr__( '1/4 + 2/4 + 1/4', 'insomnia' ),
            ),
);

     $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'insomnia_footer_light',
        'label'       => __( 'Small Footer Style', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Dark', 'insomnia' ),
            'off' => esc_attr__( 'Light', 'insomnia' ),
        ),
);


     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_author_footer',
        'label'       => __( 'Author Info', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);
     $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'insomnia_footer_author',
        'label'       => __( 'Author', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => 'Powered by <a href="https://themeforest.net/user/DankovThemes" target="_blank">DankovThemes</a>',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_author_footer',
                'operator' => '==',
                'value'    => 1,
            ),
    ),
 );
     $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'insomnia_footer_copy',
        'label'       => __( 'Copyright', 'insomnia' ),
        'section'     => 'insomnia_footer',
        'default'     => 'Copyright 2019. All Rights Reserved.',
        'priority'    => 10,
 );



?>