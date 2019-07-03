<?php

     $fields[] = array(
    'type'        => 'switch',
    'settings'    => 'insomnia_soc',
    'label'       => __( 'Social Link', 'insomnia' ),
    'section'     => 'insomnia_soc_link',
    'default'     => '1',
    'priority'    => 10,
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'insomnia' ),
        'off' => esc_attr__( 'Disable', 'insomnia' ),
    ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_facebook',
        'description' => __( 'Facebook', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => 'http://facebook.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_twitter',
        'description' => __( 'Twitter', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_dribbble',
        'description' => __( 'Dribbble', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => 'http://dribbble.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_instagram',
        'description' => __( 'Instagram', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => 'http://instagram.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_youtube',
        'description' => __( 'YouTube', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_googleplus',
        'description' => __( 'Google Plus', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_linkedin',
        'description' => __( 'LinkedIn', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_flickr',
        'description' => __( 'Flickr', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_tumblr',
        'description' => __( 'Tumblr', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_foursquare',
        'description' => __( 'Foursquare', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );




     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_apple',
        'description' => __( 'Apple', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_android',
        'description' => __( 'Android', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_windows',
        'description' => __( 'Windows', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_vk',
        'description' => __( 'Vkontatke', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_behance',
        'description' => __( 'Behance', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_delicious',
        'description' => __( 'Delicious', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_pinterest',
        'description' => __( 'Pinterest', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_skype',
        'description' => __( 'Skype', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_github',
        'description' => __( 'GitHub', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_vimeo',
        'description' => __( 'Vimeo', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_soc_rss',
        'description' => __( 'RSS', 'insomnia' ),
        'section'     => 'insomnia_soc_link',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'settings'  => 'insomnia_soc',
                'operator' => '==',
                'value'    => 1,
            ),
        ),
    );
?>