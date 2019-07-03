<?php

    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_breadcrumbs',
        'label'       => __( 'Breadcrumbs', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Show', 'insomnia' ),
            'off' => esc_attr__( 'Hide', 'insomnia' ),
        ),
    );

     $fields[] = array(
        'type'        => 'select',
        'settings'    => 'insomnia_post_type',
        'label'       => __( 'Post Style', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => 'classic',
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => array(
            'classic' => esc_attr__( 'Classic', 'insomnia' ),
            'medium' => esc_attr__( 'Medium', 'insomnia' ),
            'masonry' => esc_attr__( 'Masonry', 'insomnia' ),
            'tiles' => esc_attr__( 'Tiles', 'insomnia' ),
        ),
 );

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_background_grey',
        'label'       => __( 'Grey Background', 'insomnia' ),
        'description'       => __( 'Recommend for Masonry or Tilies Style', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => '2',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);

     $fields[] = array(
        'type'        => 'text',
        'settings'    => 'insomnia_post_height',
        'label'       => __( 'Post Image Height', 'insomnia' ),
        'description'       => __( 'Set your own height of image in px (ex: 500px)', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => '',
        'priority'    => 10,
);

     $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'insomnia_post_format',
        'label'       => __( 'Post Format Icon', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => '1',
        'priority'    => 10,
        'choices'     => array(
            'on'  => esc_attr__( 'Enable', 'insomnia' ),
            'off' => esc_attr__( 'Disable', 'insomnia' ),
        ),
);

    $fields[] = array(
       'type'        => 'toggle',
       'settings'    => 'insomnia_dropcaps',
       'label'       => __( 'Show Drop Caps', 'insomnia' ),
       'description' => __( 'For the single posts.', 'insomnia' ),
       'section'     => 'insomnia_content',
       'default'     => '1',
       'choices'     => array(
           'on'  => esc_attr__( 'Enable', 'insomnia' ),
           'off' => esc_attr__( 'Disable', 'insomnia' ),
       ),
   );

     $fields[] = array(
    'type'         => 'multicheck',
    'settings'     => 'insomnia_soc_link',
    'label'        => esc_attr__( 'Meta Box', 'insomnia' ),
    'description' => __( 'Choose your social media', 'insomnia' ),
    'section'      => 'insomnia_content',
    'default'      => array('facebook', 'twitter', 'pinterest'),
    'priority'     => 10,
    'choices'      => array(
        'facebook' => esc_attr__( 'Facebook', 'insomnia' ),
        'twitter'   => esc_attr__( 'Twitter', 'insomnia' ),
        'pinterest'    => esc_attr__( 'Pinterest', 'insomnia' ),
        'tumblr'     => esc_attr__( 'Tumblr', 'insomnia' ),
        'google'      => esc_attr__( 'Google Plus', 'insomnia' ),
        'linkedin'     => esc_attr__( 'LinkedIn', 'insomnia' ),
    ),
);

     $fields[] = array(
    'type'         => 'multicheck',
    'settings'     => 'insomnia_meta',
    'label'        => esc_attr__( 'Meta Box', 'insomnia' ),
    'description' => __( 'Control meta information', 'insomnia' ),
    'section'      => 'insomnia_content',
    'default'      => array('date', 'views', 'category', 'more'),
    'priority'     => 10,
    'choices'      => array(
        'author'   => esc_attr__( 'Author', 'insomnia' ),
        'date'     => esc_attr__( 'Date', 'insomnia' ),
        'views'    => esc_attr__( 'Views', 'insomnia' ),
        'category' => esc_attr__( 'Category', 'insomnia' ),
        'comments' => esc_attr__( 'Comments', 'insomnia' ),
        'tag'      => esc_attr__( 'Tags', 'insomnia' ),
        'more'     => esc_attr__( 'Read More', 'insomnia' ),
    ),
);


     $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'insomnia_sidebars',
        'label'       => esc_html__( 'Sidebar Position', 'insomnia' ),
        'description' => __( 'Sidebars within site, except single post.', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => 'sidebar-right',
        'priority'    => 10,
        'choices'     => array(
            'sidebar-left' => get_template_directory_uri() . '/assets/images/2cl.jpg',
            'sidebar-no'  => get_template_directory_uri() . '/assets/images/1c.jpg',
            'sidebar-right'  => get_template_directory_uri() . '/assets/images/2cr.jpg',
        ),
);
     $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'insomnia_single_sidebars',
        'label'       => esc_html__( 'Single Sidebar Position', 'insomnia' ),
        'description' => __( 'Sidebars in single post.', 'insomnia' ),
        'section'     => 'insomnia_content',
        'default'     => 'sidebar-no',
        'priority'    => 10,
        'choices'     => array(
            'sidebar-left' => get_template_directory_uri() . '/assets/images/2cl.jpg',
            'sidebar-no'  => get_template_directory_uri() . '/assets/images/1c.jpg',
            'sidebar-right'  => get_template_directory_uri() . '/assets/images/2cr.jpg',
        ),

);

?>