<?php

     $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'insomnia_slider_sticky',
        'label'       => __( 'Sticky Posts in Slider', 'insomnia' ),
        'section'     => 'insomnia_slider',
        'default'     => '2',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);
     $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'insomnia_slider_sticky_ignore',
        'label'       => __( 'Show Sticky Posts', 'insomnia' ),
        'description'       => __( 'Disable, if you want to hide sticky posts when slider enable', 'insomnia' ),
        'section'     => 'insomnia_slider',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);

?>