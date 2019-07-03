<?php
     $fields[] = array(
       'type'        => 'color',
       'settings'    => 'insomnia_theme_color',
       'label'       => __( 'Theme Main Color', 'insomnia' ),
       'section'     => 'insomnia_other',
       'default'     => '#5AC8FB',
       'priority'    => 10,
        'choices'     => array(
            'alpha' => true,
        ),
    );

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_scroll_up',
        'label'       => __( 'Scroll Up', 'insomnia' ),
        'section'     => 'insomnia_other',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Show', 'insomnia' ),
            'off' => esc_attr__( 'Hide', 'insomnia' ),
        ),
);
