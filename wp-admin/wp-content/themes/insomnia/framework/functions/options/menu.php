<?php

     $fields[] = array(
    'type'        => 'radio',
    'settings'    => 'insomnia_menu_style',
    'label'       => __( 'Menu Style', 'insomnia' ),
    'section'     => 'insomnia_menu',
    'default'     => 'style8',
    'priority'    => 10,
    'choices'     => array(
        'style1'  => esc_attr__( 'Wide Menu With Extras', 'insomnia' ),
        'style2'  => esc_attr__( 'Fixed Menu With Cart', 'insomnia' ),
        'style3'  => esc_attr__( 'Minimal With Burger', 'insomnia' ),
        'style4'  => esc_attr__( 'Menu With Search Field', 'insomnia' ),
        'style5'  => esc_attr__( 'Magazine Style With Social Link', 'insomnia' ),
        'style6'  => esc_attr__( 'Logo Center With Menu And Search', 'insomnia' ),
        'style7'  => esc_attr__( 'Top Bar With Widget Area', 'insomnia' ),
        'style8'  => esc_attr__( 'Menu With Cart And Top Bar', 'insomnia' ),

    ),
);

$fields[] = array(

    'type'      => 'toggle',
    'settings'  => 'insomnia_transparent_1',
    'label'     => __( 'Transparent menu', 'insomnia' ),
    'section'   => 'insomnia_menu',
    'default'   => '2',
    'priority'  => 10,
    'choices'   => array(
        'on'    => esc_attr__( 'Enable', 'insomnia' ),
        'off'   => esc_attr__( 'Disable', 'insomnia' ),
    ),
    'active_callback'  => array(
        array(
            'setting'=> 'insomnia_menu_style',
            'operator' => '==',
            'value'=> 'style1',
            )
        )
    );

$fields[] = array('type'=> 'toggle','settings'=> 'insomnia_transparent_2','label'=> __( 'Transparent menu', 'insomnia' ),'section'=> 'insomnia_menu','default'=> '2','priority'=> 10,'choices'=> array('on'=> esc_attr__( 'Enable', 'insomnia' ),'off' => esc_attr__( 'Disable', 'insomnia' ),),'active_callback'  => array(array('setting'=> 'insomnia_menu_style','operator' => '==','value'=> 'style2',),),);

$fields[] = array('type'=> 'toggle','settings'=> 'insomnia_transparent_3','label'=> __( 'Transparent menu', 'insomnia' ),'section'=> 'insomnia_menu','default'=> '2','priority'=> 10,'choices'=> array('on'=> esc_attr__( 'Enable', 'insomnia' ),'off' => esc_attr__( 'Disable', 'insomnia' ),),'active_callback'  => array(array('setting'=> 'insomnia_menu_style','operator' => '==','value'=> 'style3',),),);

$fields[] = array('type'=> 'toggle','settings'=> 'insomnia_transparent_4','label'=> __( 'Transparent menu', 'insomnia' ),'section'=> 'insomnia_menu','default'=> '2','priority'=> 10,'choices'=> array('on'=> esc_attr__( 'Enable', 'insomnia' ),'off' => esc_attr__( 'Disable', 'insomnia' ),),'active_callback'  => array(array('setting'=> 'insomnia_menu_style','operator' => '==','value'=> 'style4',),),);

$fields[] = array('type'=> 'toggle','settings'=> 'insomnia_transparent_6','label'=> __( 'Transparent menu', 'insomnia' ),'section'=> 'insomnia_menu','default'=> '2','priority'=> 10,'choices'=> array('on'=> esc_attr__( 'Enable', 'insomnia' ),'off' => esc_attr__( 'Disable', 'insomnia' ),),'active_callback'  => array(array('setting'=> 'insomnia_menu_style','operator' => '==','value'=> 'style6',),),);


     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_menu_top_bar',
        'label'       => __( 'Top Bar', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_adress',
        'label'       => __( 'Adress', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '455 Martinson, Los Angeles',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_mobile',
        'label'       => __( 'Phone', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '8 (043) 567 - 89 - 30',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_email',
        'label'       => __( 'E-mail', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'support@email.com',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_adress_2',
        'label'       => __( 'Adress', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '455 Martinson, Los Angeles',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_mobile_2',
        'label'       => __( 'Phone', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '8 (043) 567 - 89 - 30',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_top_email_2',
        'label'       => __( 'E-mail', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'support@email.com',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
);


  $fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'insomnia_menu_soc',
    'label'       => __( 'Social Link', 'insomnia' ),
    'section'     => 'insomnia_menu',
    'default'     => '1',
    'priority'    => 10,
    'active_callback'  => array(
        array(
            'setting'  => 'insomnia_menu_style',
            'operator' => '==',
            'value'    => 'style5',
        ),
    ),
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'insomnia' ),
        'off' => esc_attr__( 'Disable', 'insomnia' ),
    ),
);

  

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_facebook',
        'label'       => __( 'Facebook', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://facebook.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_twitter',
        'label'       => __( 'Twitter', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://twitter.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );
     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_dribbble',
        'label'       => __( 'Dribbble', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://dribbble.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_instagram',
        'label'       => __( 'Instagram', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://instagram.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_tumblr',
        'label'       => __( 'Tumblr', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_youtube',
        'label'       => __( 'YouTube', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_googleplus',
        'label'       => __( 'Google Plus', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_linkedin',
        'label'       => __( 'LinkedIn', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_vk',
        'label'       => __( 'Vkontakte', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_behance',
        'label'       => __( 'Behance', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_pinterest',
        'label'       => __( 'Pinterest', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_facebook',
        'label'       => __( 'Facebook', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://facebook.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_twitter',
        'label'       => __( 'Twitter', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://twitter.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );
     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_dribbble',
        'label'       => __( 'Dribbble', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://dribbble.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_instagram',
        'label'       => __( 'Instagram', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://instagram.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_tumblr',
        'label'       => __( 'Tumblr', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_youtube',
        'label'       => __( 'YouTube', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_googleplus',
        'label'       => __( 'Google Plus', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_linkedin',
        'label'       => __( 'LinkedIn', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_vk',
        'label'       => __( 'Vkontakte', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_behance',
        'label'       => __( 'Behance', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_pinterest',
        'label'       => __( 'Pinterest', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => '',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style5',
            ),
        ),
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style7_twitter',
        'label'       => __( 'Twitter', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://twitter.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
    );
     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style7_dribbble',
        'label'       => __( 'Dribbble', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://dribbble.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style7_instagram',
        'label'       => __( 'Instagram', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://instagram.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style7_tumblr',
        'label'       => __( 'Tumblr', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://tumblr.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style7_vimeo',
        'label'       => __( 'Vimeo', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://vimeo.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style7_dropbox',
        'label'       => __( 'Dropbox', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://dropbox.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_menu_widgets',
        'label'       => __( 'Widget Area', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'description' => 'Use "Banner Area" on Apperance > Widgets.',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style7',
            ),
        ),
);
  $fields[] = array(
    'type'        => 'toggle',
    'settings'    => 'insomnia_menu_search_menu',
    'label'       => __( 'Search Button', 'insomnia' ),
    'section'     => 'insomnia_menu',
    'default'     => '1',
    'priority'    => 10,
    'active_callback'  => array(
        array(
            'setting'  => 'insomnia_menu_style',
            'operator' => '==',
            'value'    => 'style7',
        ),
    ),
    'choices'     => array(
        'on'  => esc_attr__( 'Enable', 'insomnia' ),
        'off' => esc_attr__( 'Disable', 'insomnia' ),
    ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style8_twitter',
        'label'       => __( 'Twitter', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://twitter.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
    );
     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style8_dribbble',
        'label'       => __( 'Dribbble', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://dribbble.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style8_instagram',
        'label'       => __( 'Instagram', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://instagram.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
    );

     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style8_tumblr',
        'label'       => __( 'Tumblr', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://tumblr.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
    );



     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style8_vimeo',
        'label'       => __( 'Vimeo', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://vimeo.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
    );


     $fields[] = array(
        'type'        => 'text',
        'settings'     => 'insomnia_menu_soc_style8_dropbox',
        'label'       => __( 'Dropbox', 'insomnia' ),
        'section'     => 'insomnia_menu',
        'default'     => 'http://dropbox.com/',
        'priority'    => 10,
        'active_callback'  => array(
            array(
                'setting'  => 'insomnia_menu_style',
                'operator' => '==',
                'value'    => 'style8',
            ),
        ),
    );
?>