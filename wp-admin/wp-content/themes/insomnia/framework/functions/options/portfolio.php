<?php

    $fields[] = array(
        'type'        => 'image',
        'settings'     => 'insomnia_single_portfolio_image',
        'label' =>    esc_html__( 'Static Top Image', 'insomnia' ),
        'section'     => 'insomnia_portfolio',
        'priority'    => 10,
    );

    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_title_portfolio',
        'label'       => __( 'Static Title', 'insomnia' ),
        'description' => __( 'You can set up static title for all single portfolio.', 'insomnia' ),
        'section'     => 'insomnia_portfolio',
        'priority'    => 10,
    );

    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_link_portfolio',
        'label'       => __( 'Link to Works', 'insomnia' ),
        'description' => __( 'Add link to "All Works"', 'insomnia' ),
        'section'     => 'insomnia_portfolio',
        'default'     => home_url('/portfolio'),
        'priority'    => 10,
    );


     