<?php
     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_cart_disable',
        'label'       => __( 'Shop Cart In Menu', 'insomnia' ),
        'section'     => 'insomnia_woocommerce',
        'default'     => '2',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);
     $fields[] = array(
    'type'        => 'radio',
    'settings'    => 'insomnia_per_row',
    'label'       => __( 'Product Per Row', 'insomnia' ),
    'section'     => 'insomnia_woocommerce',
    'default'     => 'three',
    'priority'    => 10,
    'choices'     => array(
        'two'   => esc_attr__( '2', 'insomnia' ),
        'three' => esc_attr__( '3', 'insomnia' ),
        'four'  => esc_attr__( '4', 'insomnia' ),
    ),
);
     $fields[] = array(
        'type'        => 'number',
        'settings'     => 'insomnia_per_page',
        'label'       => __( 'Product Per Page', 'insomnia' ),
        'section'     => 'insomnia_woocommerce',
        'default'     => 10,
        'priority'    => 10,
        'choices'     => array(
            'min'  => 1,
            'max'  => 50,
            'step' => 1,
        ),
    ); 
     $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'insomnia_woo_sidebars',
        'label'       => esc_html__( 'Shop Sidebar Position', 'insomnia' ),
        'section'     => 'insomnia_woocommerce',
        'default'     => 'sidebar-no',
        'priority'    => 10,
        'choices'     => array(
            'sidebar-left' => get_template_directory_uri() . '/assets/images/2cl.jpg',
            'sidebar-no'  => get_template_directory_uri() . '/assets/images/1c.jpg',
            'sidebar-right'  => get_template_directory_uri() . '/assets/images/2cr.jpg',
        ),

);
?>