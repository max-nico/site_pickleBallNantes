<?php

     $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'insomnia_top',
        'label'       => __( 'Top Bar', 'insomnia' ),
        'section'     => 'insomnia_top_bar',
        'default'     => '2',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_adress',
        'label'       => __( 'Adress', 'insomnia' ),
        'section'     => 'insomnia_top_bar',
        'default'     => '455 Martinson, Los Angeles',
        'priority'    => 10,
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_mobile',
        'label'       => __( 'Phone', 'insomnia' ),
        'section'     => 'insomnia_top_bar',
        'default'     => '8 (043) 567 - 89 - 30',
        'priority'    => 10,
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_email',
        'label'       => __( 'E-mail', 'insomnia' ),
        'section'     => 'insomnia_top_bar',
        'default'     => 'support@email.com',
        'priority'    => 10,
);

?>