<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "neder_theme";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns
    $sample_patterns_path = NEDER_DIR . '/assets/img/patterns/';
    $sample_patterns_url  = NEDER_URL . '/assets/img/patterns/'; 
	$sample_patterns = array();
	$sample_patterns_files = array(
						'squares.png',
						'swirl.png',
						'simple_dashed.png',
						'agsquare.png',
						'grunge_wall.png',
						'skulls.png',
						'perforated_white_leather.png',
						'vaio_hard_edge.png',
						'diagonal_striped_brick.png',
						'polonez_car.png',
						'white-wood.jpg',
						'point_small.png',
						'giftly.png',
						'diagmonds.png',
						'tasky_pattern.png',
						'cubes.png',
						'gradient_squares.png',
						'cartographer.png',
						'starring.png',
						'dark_wood.png',
						'grey_wash_wall.png',
						'argyle.png',
						'straws.png',
						'rockywall.png',
						'robots.png',
						'vaio_hard_edge_@2X.png',
						'carbon_fibre.png',
						'stardust.png',
						'escheresque_ste.png',
						'food.png',
						'point.png',
						'shattered.png',
						'triangular.png',
						'pw_pattern.png',
						'padded.png'
	);
						
    foreach( $sample_patterns_files as $sample_patterns_file ) {

        if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
            $name              = explode( '.', $sample_patterns_file );
            $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
            $sample_patterns[$sample_patterns_file] = array(
                'alt' => $name,
                'img' => $sample_patterns_url . $sample_patterns_file
            );
        }
    }
	
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Neder', 'neder' ),
        'page_title'           => esc_html__( 'Neder', 'neder' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
		'forced_dev_mode_off'  => false,
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
	/*
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'neder' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'neder' );
    }*/

    // Add content after the form.
    $args['footer_text'] = esc_html__( 'Neder Option Panel - Created by AD-Theme', 'neder' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START General
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'neder' ),
        'id'               => 'general',
        'desc'             => esc_html__( 'General Settings', 'neder' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    // -> START General Setttings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'neder' ),
        'id'         => 'general-options',
        'desc'       => esc_html__( 'Basic Options for neder Theme', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'layout-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Aspect', 'neder' ),
                'options'  => array(
                    'neder-boxed' => esc_html__('Boxed','neder'),
                    'neder-fullwidth' => esc_html__('Full Width','neder')
                ),
                'default'  => 'neder-fullwidth',
            ),
            array(
                'id'       => 'layout-content',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Content', 'neder' ),
                'options'  => array(
                    'neder-layout-default' => esc_html__('Default (1180px)','neder'),
                    'neder-layout-1400' => esc_html__('1400 px','neder'),
                    'neder-layout-1600' => esc_html__('1600 px','neder'),
                ),
                'default'  => 'neder-layout-default',
            ),			
            array(
                'id'       => 'preloader',
                'type'     => 'switch',
                'title'    => 'Preloader',
                'subtitle' => esc_html__( 'Click On for active Preloader', 'neder' ),
                'default'  => true
            ),
            array(
                'id'       => 'preloader-type',
                'type'     => 'select',
                'title'    => esc_html__( 'Preloader Type', 'neder' ),
                'options'  => array(
                    'image'  => esc_html__('Image','neder'),
                    'style1' => esc_html__('Css Style','neder')
                ),
                'default'  => 'image',
				'required' => array( 'preloader', '=', true ),
            ),	
            array(
                'id'       => 'preloader-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Preloader Image', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your image', 'neder' ),
                'subtitle' => esc_html__( 'Upload your image', 'neder' ),
				'required' => array( 'preloader-type', '=', 'image' ),
            ),
            array(
                'id'       => 'preloader-image-effect',
                'type'     => 'select',
                'title'    => esc_html__( 'Preloader Image Effect', 'neder' ),
                'options'  => array(
                    'neder-rotate'  => esc_html__('Rotate','neder'),
                    'neder-bounce' => esc_html__('Bounce','neder')
                ),
                'default'  => 'neder-bounce',
				'required' => array( 'preloader-type', '=', 'image' ),
            ),			
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),			
            array(
                'id'       => 'favicon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Favicon', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your favicon', 'neder' ),
                'subtitle' => esc_html__( 'Upload your favicon', 'neder' ),
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your Logo', 'neder' ),
                'subtitle' => esc_html__( 'Upload your Logo', 'neder' ),
            ),
            array(
                'id'       => 'logo-mobile',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Mobile Logo', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your logo for mobile device (optional)', 'neder' ),
                'subtitle' => esc_html__( 'Upload your Logo Mobile', 'neder' ),
            ),
            array(
                'id'       => 'pagination',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Pagination Type', 'neder' ),
				'subtitle' => esc_html__( 'Choose pagination type. Standard (next, prev) or numeric', 'neder' ),
                'options'  => array(
                    'standard' => 'Standard',
                    'numeric'  => 'Numeric',
                ),
                'default'  => 'standard'
            ),
            array(
                'id'       => 'rtl',
                'type'     => 'switch',
                'title'    => 'RTL',
                'subtitle' => esc_html__( 'RTL: right to left', 'neder' ),
                'default'  => false
            ),			
        )
    ) );

    // -> START Background Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Background', 'neder' ),
        'id'         => 'general-background',
        'desc'       => esc_html__( 'Background Options Style', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'bg-types',
                'type'     => 'select',
                'title'    => esc_html__( 'Background Types', 'neder' ),
                'options'  => array(
                    'color' => esc_html__('Color','neder'),
                    'pattern' => esc_html__('Pattern','neder'),
                    'image'  => esc_html__('Image','neder')
                ),
                'default'  => 'color',
            ),            
			array(
                'id'       => 'bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'neder' ),
                'subtitle' => esc_html__( 'Gives you the RGBA background Color.', 'neder' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '1'
                ),
                'mode'     => 'background',
				'required' => array( 'bg-types', '=', 'color' ),
            ),
			array(
				'id'       => 'bg-pattern',
				'type'     => 'image_select',
				'title'    => esc_html__('Pattern Background', 'neder'), 
				'options'  => $sample_patterns,
				'width'	   => '50',
				'height'   => '50',
				'required' => array( 'bg-types', '=', 'pattern' ),
			),							 
            array(
                'id'       => 'bg-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Image Background', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your image background', 'neder' ),
				'required' => array( 'bg-types', '=', 'image' ),
            ),
						
        )
    ) );

    // -> START Slider Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider', 'neder' ),
        'id'         => 'general-slider',
        'desc'       => esc_html__( 'Slider Options', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'header-slider',
                'type'     => 'switch',
                'title'    => esc_html__('Header Slider','neder'),
                'subtitle' => 'Click <code>On</code> for active Slider',
                'default'  => false
            ),		
            array(
                'id'       => 'header-slider-position',
                'type'     => 'select',
                'title'    => esc_html__( 'Slider Position', 'neder' ),
                'subtitle' => esc_html__( 'Select pages shows slider', 'neder' ),
                'options'  => array(
                    'allpages' => esc_html__('All Pages','neder'),
                    'homepage' => esc_html__('Home Page','neder')
                ),
                'default'  => 'homepage',
				'required' => array( 'header-slider', '=', true ),
            ),
            array(
                'id'       => 'header-slider-shortcode',
                'type'     => 'text',
                'title'    => esc_html__( 'Slider Shortcode', 'neder' ),
                'subtitle' => esc_html__( 'Add your slider shortcode', 'neder' ),
				'required' => array( 'header-slider', '=', true ),
                'default'  => '',
            ),
            array(
                'id'       => 'header-slider-container',
                'type'     => 'select',
                'title'    => esc_html__( 'Slider Container', 'neder' ),
                'subtitle' => esc_html__( 'Select slider container', 'neder' ),
                'options'  => array(
                    'fullwidth' 				=> esc_html__('Full Width','neder'),
                    'neder-wrap-container' 	=> esc_html__('Content','neder'),
                ),
                'default'  => 'fullwidth',
				'required' => array( 'header-slider', '=', true ),
            ),			
        )
    ) );	
	
    // -> START Header
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'neder' ),
        'id'               => 'header',
        'customizer_width' => '500px',
        'icon'             => 'el el-inbox',
    ) );

    // -> START Header Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Top', 'neder' ),
        'id'         => 'header-settings',
        'desc'       => esc_html__( 'Header Top Settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(	
           array(
                'id'       => 'header-top-active',
                'type'     => 'switch',
                'title'    => esc_html__('Active Header Top','neder'),
                'subtitle' => esc_html__('Click On for active header top','neder'),
                'default'  => false,
            ),		
			array(
				'id'   => 'info-date',
				'type' => 'info',
				'title' => esc_html__('Date', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for Top header date', 'neder')
			),	
            array(
                'id'       => 'header-date-format',
                'type'     => 'select',
                'title'    => esc_html__( 'Header Date Format', 'neder' ),
                'options'  => array(
                    'l, F j, Y' 		=> esc_html__('Friday, November 24, 2010','neder'),
					'D, M j, Y' 		=> esc_html__('Fri, Nov 24, 2010','neder'),
                    'F j, Y' 			=> esc_html__('November 6, 2010','neder'),
                    'M j, Y' 			=> esc_html__('Nov 6, 2010','neder'),
                    'F, Y' 				=> esc_html__('November, 2010','neder'),
					'Y, F' 				=> esc_html__('2010, November','neder'),
                    'g:i a' 			=> esc_html__('12:50 am','neder'),					
                    'g:i:s a' 			=> esc_html__('12:50:48 am','neder'),
                    'l, F jS, Y' 		=> esc_html__('Saturday, November 6th, 2010','neder'),					
					'M j, Y @ G:i' 		=> esc_html__('Nov 6, 2010 @ 0:50','neder'),
					'Y/m/d \a\t g:i A' 	=> esc_html__('2010/11/06 at 12:50 AM','neder'),
					'Y/m/d' 			=> esc_html__('2010/11/06','neder'),
					'l, j F, Y' 		=> esc_html__('Friday, 24 November, 2010','neder'),
					'D, j M, Y' 		=> esc_html__('Fri, 24 Nov, 2010','neder'),
					'j F, Y' 			=> esc_html__('6 November, 2010','neder'),
					'j M, Y' 			=> esc_html__('6 Nov, 2010','neder'),
					'l, jS F, Y' 		=> esc_html__('Saturday, 6th November, 2010','neder'),
					'j M, Y @ G:i' 		=> esc_html__('6 Nov, 2010 @ 0:50','neder'),
					'd/m/Y \a\t H:i' 	=> esc_html__('2010/11/06 at 18:50','neder'),
					'd/m/Y' 			=> esc_html__('2010/11/06','neder'),
					'H:i' 				=> esc_html__('18:50','neder'),
					'H:i:s' 			=> esc_html__('18:50:48','neder'),					
                ),
                'default'  => 'l, F j, Y',
            ),
			array(
				'id'   => 'info-news-ticker',
				'type' => 'info',
				'title' => esc_html__('News Ticker', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for news ticker', 'neder')
			),
            array(
                'id'       => 'news-ticker-style',
                'type'     => 'select',
                'title'    => esc_html__( 'Style', 'neder' ),
                'options'  => array(
                    'style1' 		=> esc_html__('Style 1','neder'),
                    'style2' 		=> esc_html__('Style 2','neder')
                ),
                'default'  => 'style1'
            ),			
            array(
                'id'       => 'news-ticker-autoplay',
                'type'     => 'text',
                'title'    => esc_html__( 'Autoplay (ms)', 'neder' ),
                'default'  => '',
				'desc'     => esc_html__( 'Example 2000. Leave empty for default value', 'neder' ),
            ),
            array(
                'id'       => 'news-ticker-num-posts',
                'type'     => 'text',
                'title'    => esc_html__( 'Enter number of posts to load', 'neder' ),
                'default'  => '',
				'desc'     => esc_html__( 'Leave empty for default value (all posts)', 'neder' ),
            ),
            array(
                'id'       => 'news-ticker-posts-source',
                'type'     => 'select',
                'title'    => esc_html__( 'Posts Source', 'neder' ),
                'options'  => array(
                    'all_posts' 		=> esc_html__('All Posts','neder'),
                    'sticky_posts' 		=> esc_html__('Sticky Posts','neder')
                ),
                'default'  => 'all_posts'
            ),
			array(
				'id'       => 'news-ticker-categories',
				'type'     => 'select',
				'multi'    => true,
				'title'    => esc_html__('Select Categories', 'neder'), 
				'desc'     => esc_html__('Select your favorite categories', 'neder'),
				'data'	   => 'category',
			),
            array(
                'id'       => 'news-ticker-order',
                'type'     => 'select',
                'title'    => esc_html__( 'Order', 'neder' ),
                'options'  => array(
                    'DESC' 		=> esc_html__('DESC','neder'),
                    'ASC' 		=> esc_html__('ASC','neder')
                ),
                'default'  => 'DESC'
            ),
            array(
                'id'       => 'news-ticker-orderby',
                'type'     => 'select',
                'title'    => esc_html__( 'Order By', 'neder' ),
                'options'  => array(
                    'date' 			=> 	esc_html__('Date','neder'),
                    'ID' 			=> 	esc_html__('ID','neder'),
				  	'author'		=> 	esc_html__('Author','neder'),
					'title'			=> 	esc_html__('Title','neder'),
				  	'name'			=> 	esc_html__('Name','neder'),
					'modified'		=> 	esc_html__('Modified','neder'),
				  	'parent'		=> 	esc_html__('Parent','neder'),
					'rand'			=> 	esc_html__('Rand','neder'),
					'comment_count'	=>	esc_html__('Comments Count','neder'),
					'views'			=>	esc_html__('Views','neder'),
					'none'			=> 	esc_html__('None','neder')			
                ),
                'default'  => 'date'
            ),
			
			array(
				'id'       => 'type-header-top-right',
				'type'     => 'button_set',
				'title'    => esc_html__('Social or Menu', 'neder'),
				'desc'     => esc_html__('Select if you want in Header right social or menu', 'neder'),
				'options' => array(
					'social' 	 => esc_html__('Social', 'neder'),
					'top-menu' 	 => esc_html__('Top menu', 'neder'),
					'disable' 	 => esc_html__('Disable Section', 'neder')
				 ), 
				'default' => 'social'
			),					
			array(
				'id'   => 'info-social',
				'type' => 'info',
				'title' => esc_html__('Social Settings', 'neder'),
				'style' => 'success',
				'required' => array( 'type-header-top-right', '=', 'social' ),
				'desc' => esc_html__('Your social account', 'neder')
			),
            array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Facebook URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),			
            array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Twitter URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'googleplus',
                'type'     => 'text',
                'title'    => esc_html__( 'Google Plus', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Google Plus URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),
			array(
                'id'       => 'instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Instagram URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),            
			array(
                'id'       => 'linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Linkedin URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),	
            array(
                'id'       => 'vimeo',
                'type'     => 'text',
                'title'    => esc_html__( 'Vimeo', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Vimeo URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'youtube',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'youtube URL', 'neder' ),
				'required' => array( 'type-header-top-right', '=', 'social' ),
                'default'  => '#',
            ),
			array(
				'id'   => 'info-menu',
				'type' => 'info',
				'title' => esc_html__('Top Menu Settings', 'neder'),
				'style' => 'success',
				'required' => array( 'type-header-top-right', '=', 'top-menu' ),
				'desc' => esc_html__('Select your menu created in Appearance -> Menu', 'neder')
			),
			array(
				'id'       => 'top-menu',
				'type'     => 'select',
				'title'    => esc_html__('Select Top Menu', 'neder'), 
				'desc'     => esc_html__('Select your favorite top menu', 'neder'),
				'required' => array( 'type-header-top-right', '=', 'top-menu' ),
				'data'	   => 'menu',
			),			
			array(
				'id'   => 'info-login-register',
				'type' => 'info',
				'title' => esc_html__('Login / Register Link Lightbox', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for Top header Login/Register', 'neder')
			),
            array(
                'id'       => 'header-login-register',
                'type'     => 'select',
                'title'    => esc_html__( 'Login/Register', 'neder' ),
                'options'  => array(
                    '5' 		=> esc_html__('Show','neder'),
                    '7' 		=> esc_html__('Hidden','neder')
                ),
                'default'  => '7'
            ),		
            array(
                'id'       => 'header-top-order',
                'type'     => 'sorter',
                'title'    => esc_html__( 'Header Top Order and Enable/Disable', 'neder' ),
				'options' => array(
					'enabled'  => array(
						'newsticker' 	=> 'News Ticker',
						'date'    		=> 'Date',
						'menu-social' 	=> 'Menu/Social',
						'login' 		=> 'Login/Register'
					),
					'disabled' => array(
					)
				),
            ),
            array(
                'id'       => 'header-top-align',
                'type'     => 'select',
                'title'    => esc_html__( 'Header Top Text Align', 'neder' ),
                'options'  => array(
                    'default' 	=> esc_html__('Default','neder'),
                    'left' 		=> esc_html__('Left','neder'),
                    'right' 	=> esc_html__('Right','neder'),
                    'center' 	=> esc_html__('Center','neder'),
                ),
                'default'  => 'default'
            ),				
        )
    ) );
	
    // -> START Header Middle
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Middle (Logo)', 'neder' ),
        'id'         => 'header-middle-settings',
        'desc'       => esc_html__( 'Header Middle Settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'header-middle-logo-potision',
                'type'     => 'select',
                'title'    => esc_html__( 'Logo Position', 'neder' ),
                'options'  => array(
                    'left' => esc_html__('Left','neder'),
                    'center' => esc_html__('Center. If select you disable banner top','neder'),
                    'right'  => esc_html__('Right','neder')
                ),
                'default'  => 'center',
            ),
           array(
                'id'       => 'header-middle-bg-types',
                'type'     => 'select',
                'title'    => esc_html__( 'Background Types', 'neder' ),
                'options'  => array(
                    'color' => esc_html__('Color','neder'),
                    'pattern' => esc_html__('Pattern','neder'),
                    'image'  => esc_html__('Image','neder')
                ),
                'default'  => 'color',
            ),            
			array(
                'id'       => 'header-middle-bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Background Color', 'neder' ),
                'subtitle' => esc_html__( 'Gives you the RGBA background Color.', 'neder' ),
                'default'  => array(
                    'color' => '#000000',
                    'alpha' => '1'
                ),
                'mode'     => 'header-middle-background',
				'required' => array( 'header-middle-bg-types', '=', 'color' ),
            ),
			array(
				'id'       => 'header-middle-bg-pattern',
				'type'     => 'image_select',
				'title'    => esc_html__('Pattern Background', 'neder'), 
				'options'  => $sample_patterns,
				'width'	   => '50',
				'height'   => '50',
				'required' => array( 'header-middle-bg-types', '=', 'pattern' ),
			),							 
            array(
                'id'       => 'header-middle-bg-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Image Background', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your image background', 'neder' ),
				'required' => array( 'header-middle-bg-types', '=', 'image' ),
            ),			
        )
    ) );

    // -> START Header Middle
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Bottom (Menu)', 'neder' ),
        'id'         => 'header-bottom-settings',
        'desc'       => esc_html__( 'Header Bottom Settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'search',
                'type'     => 'switch',
                'title'    => 'Search Button',
                'subtitle' => esc_html__( 'Click On for active Search Button', 'neder' ),
                'default'  => true
            ),
            array(
                'id'       => 'header-menu-align',
                'type'     => 'select',
                'title'    => esc_html__( 'Menu Align', 'neder' ),
                'options'  => array(
                    'neder-menu-left' 		=> esc_html__('Left','neder'),
                    'neder-menu-center' 	=> esc_html__('Center','neder'),
                    'neder-menu-right'  	=> esc_html__('Right','neder')
                ),
                'default'  => 'neder-menu-center',
            ),
            array(
                'id'       => 'header-menu-style',
                'type'     => 'select',
                'title'    => esc_html__( 'Menu Style', 'neder' ),
                'options'  => array(
                    'neder-menu-style1' 	=> esc_html__('Style 1','neder'),
                    'neder-menu-style2' 	=> esc_html__('Style 2','neder'),
                    'neder-menu-style3'  	=> esc_html__('Style 3','neder')
                ),
                'default'  => 'neder-menu-style2',
            ),			
        )
    ) );	

    // -> START Header Order
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Order', 'neder' ),
        'id'         => 'header-order-settings',
        'desc'       => esc_html__( 'Header Order Settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
			array(
				'id'      => 'header-order',
				'type'    => 'sorter',
				'title'   => esc_html__( 'Header Order Manager', 'neder' ),
				'desc'    => esc_html__( 'Select your order of element header. Other element options are available in relative header element area', 'neder' ),
				'options' => array(
					'enabled'  => array(
						'header-top' 	=> 'Header Top',
						'header-middle' => 'Header Middle',
						'header-bottom' => 'Header Bottom',
					)
				) 
			)
		)
    ) );

    // -> START Header Sticky
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Sticky', 'neder' ),
        'id'         => 'header-sticky-settings',
        'desc'       => esc_html__( 'Header Sticky Settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
           array(
                'id'       => 'header-sticky',
                'type'     => 'switch',
                'title'    => esc_html__('Active Header Sticky','neder'),
                'default'  => true,
            ),
            array(
                'id'       => 'header-sticky-logo-position',
                'type'     => 'select',
                'title'    => esc_html__( 'Logo Position', 'neder' ),
                'options'  => array(
                    'left' 	 => esc_html__('Left','neder'),
                    'center' => esc_html__('Center. If select you disable banner top','neder'),
                    'right'  => esc_html__('Right','neder')
                ),
                'default'  => 'left',
            ),
            array(
                'id'       => 'logo-sticky',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Sticky Logo', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your logo for sticky header (optional)', 'neder' ),
                'subtitle' => esc_html__( 'Upload your Logo Sticky Header', 'neder' ),
            ),			
		)
    ) );
	
    // -> START Footer
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'neder' ),
        'id'               => 'footer',
        'customizer_width' => '500px',
        'icon'             => 'el el-inbox',
    ) );

    // -> START Footer Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Settings', 'neder' ),
        'id'         => 'footer-settings',
        'desc'       => esc_html__( 'All footer settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'footer-top-active',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Top (Widget Area)', 'neder' ),
                'subtitle' => esc_html__('Click On for active Footer Top Widget Area', 'neder' ),
                'default'  => false
			),
            array(
                'id'       => 'footer-top-widget',
                'type'     => 'select',
                'title'    => esc_html__( 'Footer Widget Positions', 'neder' ),
                'options'  => array(
					'footer-top-widget-1'  	=> esc_html__('1','neder'),
					'footer-top-widget-2'  	=> esc_html__('2','neder'),
					'footer-top-widget-3' 	=> esc_html__('3','neder')
                ),
                'default'  => 'footer-top-widget-3',
				'required' => array( 'footer-top-active', '=', true ),
            ),			
            array(
                'id'   => 'ofooter-top-active-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'back-to-top',
                'type'     => 'switch',
                'title'    => esc_html__('Back to top Button', 'neder'),
                'subtitle' => esc_html__('Click On for active back to top Button', 'neder'),
                'default'  => true
            ),
            array(
                'id'   => 'back-to-top-divide',
                'type' => 'divide'
            ),			
            array(
                'id'       => 'footer-bottom-active',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Bottom', 'neder' ),
                'subtitle' => esc_html__('Click On for active Footer Bottom', 'neder' ),
                'default'  => true
			),
            array(
                'id'       => 'footer-bottom-type',
                'type'     => 'sorter',
                'title'    => esc_html__( 'Footer Bottom Type', 'neder' ),
				'options' => array(
					'enabled'  => array(
						'text' 		=> 'Text',			
						'menu' 		=> 'Menu'
					),
					'disabled' => array(
						'social'    => 'Social',
					)
				),
            ),
			array(
				'id'   => 'footer-info-text',
				'type' => 'info',
				'title' => esc_html__('Footer Text Settings', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('Add your footer text', 'neder')
			),			
            array(
                'id'       => 'footer-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Footer Text', 'neder' ),
                'default'  => esc_html__('Theme Created by Copyright 2017. All Rights Reserved','neder'),
            ), 
			array(
				'id'   => 'footer-info-social',
				'type' => 'info',
				'title' => esc_html__('Footer Social Settings', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('Your social account', 'neder')
			),
            array(
                'id'       => 'footer-facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Facebook URL', 'neder' ),
                'default'  => '#',
            ),			
            array(
                'id'       => 'footer-twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Twitter URL', 'neder' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'footer-googleplus',
                'type'     => 'text',
                'title'    => esc_html__( 'Google Plus', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Google Plus URL', 'neder' ),
                'default'  => '#',
            ),
			array(
                'id'       => 'footer-instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Instagram URL', 'neder' ),
                'default'  => '#',
            ),            
			array(
                'id'       => 'footer-linkedin',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Linkedin URL', 'neder' ),
                'default'  => '#',
            ),	
            array(
                'id'       => 'footer-vimeo',
                'type'     => 'text',
                'title'    => esc_html__( 'Vimeo', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'Vimeo URL', 'neder' ),
                'default'  => '#',
            ),
            array(
                'id'       => 'footer-youtube',
                'type'     => 'text',
                'title'    => esc_html__( 'Youtube', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
				'desc'     => esc_html__( 'youtube URL', 'neder' ),
                'default'  => '#',
            ),
			array(
				'id'   => 'footer-info-menu',
				'type' => 'info',
				'title' => esc_html__('Footer Menu Settings', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('Select your menu created in Appearance -> Menu', 'neder')
			),
			array(
				'id'       => 'footer-top-menu',
				'type'     => 'select',
				'title'    => esc_html__('Select Footer Menu', 'neder'), 
				'desc'     => esc_html__('Select your favorite footer menu', 'neder'),
				'data'	   => 'menu',
			),
			array(
				'id'   => 'footer-info-background',
				'type' => 'info',
				'title' => esc_html__('Backgroud Image', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('Choose if you want put an image background on your footer', 'neder')
			),			
            array(
                'id'       => 'footer-image-background-active',
                'type'     => 'switch',
                'title'    => esc_html__('Footer Image Background active', 'neder'),
                'subtitle' => esc_html__('Click On for active footer background image.', 'neder'),
                'default'  => false
            ),			
            array(
                'id'       => 'footer-bg-image',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Footer Image Background', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your image background', 'neder' ),
				'required' => array( 'footer-image-background-active', '=', true ),
            ),
			array(
                'id'       => 'footer-pattern-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Pattern Background Color', 'neder' ),
                'subtitle' => esc_html__( 'Gives you the RGBA background Color.', 'neder' ),
                'default'  => array(
                    'color' => '#000000',
                    'alpha' => '0.9'
                ),
				'required' => array( 'footer-image-background-active', '=', true ),
            ),			
        )
    ) );

    // -> START Post
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Post', 'neder' ),
        'id'               => 'single',
        'customizer_width' => '500px',
        'icon'             => 'el el-file',
    ) );

    // -> START Post Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Post Settings', 'neder' ),
        'id'         => 'single-settings',
        'desc'       => esc_html__( 'All posts settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'neder_panel_post_sidebar',
                'type'     => 'select',
                'title'    => esc_html__( 'Post Sidebar', 'neder' ),
                'options'  => array(
					'sidebar-right'  	=> esc_html__('Right','neder'),
					'sidebar-left'  	=> esc_html__('Left','neder'),
					'sidebar-none' 		=> esc_html__('None','neder')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'neder_panel_post_sidebar_name',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Name', 'neder' ),
                'data' 	   => 'sidebars',
                'default'  => 'neder-default'
            ),			
            array(
                'id'       => 'neder_panel_post_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout', 'neder' ),
                'options'  => array(
					'neder-post-layout1'  	=> esc_html__('Layout 1','neder'),
					'neder-post-layout2'  	=> esc_html__('Layout 2','neder'),
					'neder-post-layout3' 	=> esc_html__('Layout 3','neder')
                ),
                'default'  => 'neder-post-layout1',
            ),
            array(
                'id'       => 'neder_panel_post_social_share',
                'type'     => 'switch',
                'title'    => esc_html__('Social Share Post','neder'),
                'subtitle' => esc_html__('Click On for active Social Share Post','neder'),
                'default'  => false
            ),			
            array(
                'id'       => 'neder_panel_post_pagination',
                'type'     => 'switch',
                'title'    => esc_html__('Pagination Post','neder'),
                'subtitle' => esc_html__('Click On for active Pagination Post','neder'),
                'default'  => true
            ),
            array(
                'id'       => 'neder_panel_post_author_bio',
                'type'     => 'select',
                'title'    => esc_html__('Author Info','neder'),
                'subtitle' => esc_html__('Click On for active Author Bio','neder'),
                'options'  => array(
					'on'  		=> esc_html__('Show','neder'),
					'hidden'  	=> esc_html__('Show only when author description is not empty','neder'),
					'off' 		=> esc_html__('Hidden','neder')
                ),				
                'default'  => 'hidden'
            ),							
            array(
                'id'       => 'neder_panel_post_related_posts',
                'type'     => 'switch',
                'title'    => esc_html__('Related Posts','neder'),
                'subtitle' => esc_html__('Click On for active Related Posts','neder'),
                'default'  => false
            ),
            array(
                'id'       => 'neder_panel_post_article_info',
                'type'     => 'switch',
                'title'    => esc_html__('Article Info Hidden','neder'),
                'subtitle' => esc_html__('Click On for hidden author, comment and data to each preview layout','neder'),
                'default'  => false
            ),
            array(
                'id'       => 'neder_panel_post_show_tags',
                'type'     => 'switch',
                'title'    => esc_html__('Tags','neder'),
                'subtitle' => esc_html__('Click On for hidden author, comment and data to each preview layout','neder'),
                'default'  => true
            ),			
        )
    ) );

    // -> START General Pages
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Pages', 'neder' ),
        'id'               => 'general-pages',
        'customizer_width' => '500px',
        'icon'             => 'el el-adjust-alt',
    ) );
		
    // -> START 404 Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404', 'neder' ),
        'id'         => 'general-pages-404',
        'desc'       => esc_html__( '404 Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'neder_panel_404_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar 404 Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),										
        )
    ) );	
	
	// -> START Archive Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Archive', 'neder' ),
        'id'         => 'general-pages-archive',
        'desc'       => esc_html__( 'Archive Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'neder_panel_archive_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Archive Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'neder_panel_archive_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Archive Page', 'neder' ),
                'options'  => array(
					'neder-posts-layout1'  => esc_html__('Layout 1','neder'),
					'neder-posts-layout2'  => esc_html__('Layout 2','neder'),
					'neder-posts-layout3'  => esc_html__('Layout 3','neder'),
					'neder-posts-layout4'  => esc_html__('Layout 4','neder')				
                ),
                'default'  => 'neder-posts-layout1',
            ),
            array(
                'id'       => 'neder_panel_archive_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Columns Archive Posts', 'neder' ),
                'options'  => array(
					'1'  => esc_html__('1','neder'),
					'2'  => esc_html__('2','neder'),
					'3'  => esc_html__('3','neder'),
					'4'  => esc_html__('4','neder')					
                ),
                'default'  => '2',
            ),			
            array(
                'id'       => 'neder_panel_archive_layout_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Archive Layout Type', 'neder' ),
                'options'  => array(
					'grid'  	=> esc_html__('Grid','neder'),
					'masonry'  	=> esc_html__('Masonry','neder')				
                ),
                'default'  => 'grid',
            )								
        )
    ) );		

	// -> START Author Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Author', 'neder' ),
        'id'         => 'general-pages-author',
        'desc'       => esc_html__( 'Author Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'neder_panel_author_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Author Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'neder_panel_author_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Author Page', 'neder' ),
                'options'  => array(
					'neder-posts-layout1'  => esc_html__('Layout 1','neder'),
					'neder-posts-layout2'  => esc_html__('Layout 2','neder'),
					'neder-posts-layout3'  => esc_html__('Layout 3','neder'),
					'neder-posts-layout4'  => esc_html__('Layout 4','neder')				
                ),
                'default'  => 'neder-posts-layout1',
            ),
            array(
                'id'       => 'neder_panel_author_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Columns Author Posts', 'neder' ),
                'options'  => array(
					'1'  => esc_html__('1','neder'),
					'2'  => esc_html__('2','neder'),
					'3'  => esc_html__('3','neder'),
					'4'  => esc_html__('4','neder')					
                ),
                'default'  => '2',
            ),			
            array(
                'id'       => 'neder_panel_author_layout_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Author Layout Type', 'neder' ),
                'options'  => array(
					'grid'  	=> esc_html__('Grid','neder'),
					'masonry'  	=> esc_html__('Masonry','neder')				
                ),
                'default'  => 'grid',
            )													
        )
    ) );		

	// -> START Category Options
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Category', 'neder' ),
        'id'         => 'general-pages-category',
        'desc'       => esc_html__( 'Category Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'neder_panel_category_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Category Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'neder_panel_category_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Category Page', 'neder' ),
                'options'  => array(
					'neder-posts-layout1'  => esc_html__('Layout 1','neder'),
					'neder-posts-layout2'  => esc_html__('Layout 2','neder'),
					'neder-posts-layout3'  => esc_html__('Layout 3','neder'),
					'neder-posts-layout4'  => esc_html__('Layout 4','neder')					
                ),
                'default'  => 'neder-posts-layout1',
            ),
            array(
                'id'       => 'neder_panel_category_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Columns Category Posts', 'neder' ),
                'options'  => array(
					'1'  => esc_html__('1','neder'),
					'2'  => esc_html__('2','neder'),
					'3'  => esc_html__('3','neder'),
					'4'  => esc_html__('4','neder')					
                ),
                'default'  => '2',
            ),			
            array(
                'id'       => 'neder_panel_category_layout_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Category Layout Type', 'neder' ),
                'options'  => array(
					'grid'  	=> esc_html__('Grid','neder'),
					'masonry'  	=> esc_html__('Masonry','neder')				
                ),
                'default'  => 'grid',
            ),			
            array(
                'id'       => 'neder_panel_category_description',
                'type'     => 'select',
                'title'    => esc_html__( 'Category Description', 'neder' ),
                'options'  => array(
					'on'   => esc_html__('Show','neder'),
					'off'  => esc_html__('Hidden','neder')
                ),
                'default'  => 'off',
            ),																		
        )
    ) );

    // -> START Image Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Image', 'neder' ),
        'id'         => 'general-pages-image',
        'desc'       => esc_html__( 'Image Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'neder_panel_image_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Image Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),										
        )
    ) );
	
	
	// -> START Search Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search', 'neder' ),
        'id'         => 'general-pages-search',
        'desc'       => esc_html__( 'Search Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'neder_panel_search_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Search Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'neder_panel_search_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Search Page', 'neder' ),
                'options'  => array(
					'neder-posts-layout1'  => esc_html__('Layout 1','neder'),
					'neder-posts-layout2'  => esc_html__('Layout 2','neder'),
					'neder-posts-layout3'  => esc_html__('Layout 3','neder'),
					'neder-posts-layout4'  => esc_html__('Layout 4','neder')					
                ),
                'default'  => 'neder-posts-layout1',
            ),
            array(
                'id'       => 'neder_panel_search_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Columns Search Posts', 'neder' ),
                'options'  => array(
					'1'  => esc_html__('1','neder'),
					'2'  => esc_html__('2','neder'),
					'3'  => esc_html__('3','neder'),
					'4'  => esc_html__('4','neder')					
                ),
                'default'  => '2',
            ),			
            array(
                'id'       => 'neder_panel_search_layout_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Search Layout Type', 'neder' ),
                'options'  => array(
					'grid'  	=> esc_html__('Grid','neder'),
					'masonry'  	=> esc_html__('Masonry','neder')				
                ),
                'default'  => 'grid',
            ),											
        )
    ) );	
	
	// -> START Search Options
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tag', 'neder' ),
        'id'         => 'general-pages-tag',
        'desc'       => esc_html__( 'Tag Page settings', 'neder' ),
        'subsection' => true,
        'fields'     => array(
             array(
                'id'       => 'neder_panel_tag_sidebar_position',
                'type'     => 'select',
                'title'    => esc_html__( 'Sidebar Tag Page', 'neder' ),
                'options'  => array(
					'sidebar-none'  => esc_html__('None','neder'),
					'sidebar-left'  => esc_html__('Left','neder'),
					'sidebar-right' => esc_html__('Right','neder')
                ),
                'default'  => 'sidebar-right',
            ),
            array(
                'id'       => 'neder_panel_tag_layout',
                'type'     => 'select',
                'title'    => esc_html__( 'Layout Tag Page', 'neder' ),
                'options'  => array(
					'neder-posts-layout1'  => esc_html__('Layout 1','neder'),
					'neder-posts-layout2'  => esc_html__('Layout 2','neder'),
					'neder-posts-layout3'  => esc_html__('Layout 3','neder'),
					'neder-posts-layout4'  => esc_html__('Layout 4','neder')					
                ),
                'default'  => 'neder-posts-layout1',
            ),
            array(
                'id'       => 'neder_panel_tag_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Columns Tag Posts', 'neder' ),
                'options'  => array(
					'1'  => esc_html__('1','neder'),
					'2'  => esc_html__('2','neder'),
					'3'  => esc_html__('3','neder'),
					'4'  => esc_html__('4','neder')					
                ),
                'default'  => '2',
            ),			
            array(
                'id'       => 'neder_panel_tag_layout_type',
                'type'     => 'select',
                'title'    => esc_html__( 'Tag Layout Type', 'neder' ),
                'options'  => array(
					'grid'  	=> esc_html__('Grid','neder'),
					'masonry'  	=> esc_html__('Masonry','neder')				
                ),
                'default'  => 'grid',
            ),															
        )
    ) );	
	
    // -> START Style
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Theme Colors', 'neder' ),
        'id'               => 'general-color',
        'customizer_width' => '500px',
        'icon'             => 'el el-tasks',
    ) );	
	
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Color Theme', 'neder' ),
        'id'         => 'style-color',
        'desc'       => esc_html__( 'General Color Theme: ', 'neder' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'preset',
                'type'     => 'select',
                'title'    => esc_html__( 'Presets', 'neder' ),
                'options'  => array(
					'default'  	=> esc_html__('Default','neder'),
					'custom'  	=> esc_html__('Custom','neder')					
                ),
                'default'  => 'default',
            ),			
            array(
                'id'       => 'main-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Main color', 'neder' ),
                'default'  => '#6a84a4',
				'validate' => 'color',
				'required' => array( 'preset', '=', 'custom' )
            ),
            array(
                'id'       => 'secondary-color',
                'type'     => 'color',
                'title'    => esc_html__( 'Secondary color', 'neder' ),
                'default'  => '#4d627b',
                'validate' => 'color',
				'required' => array( 'preset', '=', 'custom' )
            ),	
        ),
    ) );	

    // -> START Header Top Colors
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header Top', 'neder' ),
        'id'     => 'header_top_color',
        'desc'   => esc_html__( 'Header Top Colors', 'neder' ),
		'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'header_top_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Background', 'neder' ),
                'default'  => '#000000',
                'validate' => 'color'
            ),
            array(
                'id'       => 'header_top_text',
                'type'     => 'color',
                'title'    => esc_html__( 'Text and Icon', 'neder' ),
                'default'  => '#1e73be',
                'validate' => 'color'
            ),
            array(
                'id'       => 'header_top_line',
                'type'     => 'color',
                'title'    => esc_html__( 'Line Separator', 'neder' ),
                'default'  => '#ffffff',
                'validate' => 'color'
            ),			
        )
    ) );		

	// -> START Header Bottom Colors
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header Bottom', 'neder' ),
        'id'     => 'header_bottom_color',
        'desc'   => esc_html__( 'Header Bottom', 'neder' ),
		'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'header_bottom_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Background Bottom', 'neder' ),
                'default'  => '#ffffff',
                'validate' => 'color'
            ),            
			array(
                'id'       => 'header_bottom_line',
                'type'     => 'color',
                'title'    => esc_html__( 'Line Separator', 'neder' ),
                'default'  => '#ffffff',
                'validate' => 'color'
            ),	
			array(
				'id'   => 'header-bottom-menu-style',
				'type' => 'info',
				'title' => esc_html__('Menu', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('Menu Colors', 'neder')
			),							
            array(
                'id'       => 'header_bottom_text_menu',
                'type'     => 'color',
                'title'    => esc_html__( 'Active-Hover Menu Text and Icon', 'neder' ),
                'default'  => '#6a84a4',
                'validate' => 'color'
            ),
            array(
                'id'       => 'header_bottom_main_text_menu',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Text and Icon', 'neder' ),
                'default'  => '#333333',
                'validate' => 'color'
            ),			
            array(
                'id'       => 'header_bottom_text_submenu',
                'type'     => 'color',
                'title'    => esc_html__( 'Sub menu Text and Icon', 'neder' ),
                'default'  => '#333333',
                'validate' => 'color'
            ),			
            array(
                'id'       => 'header_bottom_background_submenu',
                'type'     => 'color',
                'title'    => esc_html__( 'Sub menu Background', 'neder' ),
                'default'  => '#FFFFFF',
                'validate' => 'color'
            ),
            array(
                'id'       => 'header_bottom_border_submenu',
                'type'     => 'color',
                'title'    => esc_html__( 'Sub menu Border', 'neder' ),
                'default'  => '#f4f4f4',
                'validate' => 'color'
            )			
        )
    ) );
	
    // -> START Content Colors
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Content', 'neder' ),
        'id'     => 'content_color',
        'desc'   => esc_html__( 'Content Color', 'neder' ),
		'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'content_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Background', 'neder' ),
                'default'  => '#FFFFFF',
                'validate' => 'color'
            ),
            array(
                'id'       => 'content_title',
                'type'     => 'color',
                'title'    => esc_html__( 'Title', 'neder' ),
                'default'  => '#333333',
                'validate' => 'color'
            ),			
            array(
                'id'       => 'content_text',
                'type'     => 'color',
                'title'    => esc_html__( 'Text', 'neder' ),
                'default'  => '#747474',
                'validate' => 'color'
            ),
            array(
                'id'       => 'content_text_info',
                'type'     => 'color',
                'title'    => esc_html__( 'Text info (date, comments, categories)', 'neder' ),
                'default'  => '#646464',
                'validate' => 'color'
            ),
            array(
                'id'       => 'content_navigation_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Navigation Background and Border (active, hover)', 'neder' ),
                'default'  => '#f4f4f4',
                'validate' => 'color'
            ),
            array(
                'id'       => 'content_post',
                'type'     => 'color',
                'title'    => esc_html__( 'Post Title', 'neder' ),
                'default'  => '#ffffff',
                'validate' => 'color'
            ),				
        )
    ) );

    // -> START Footer Colors
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer Top', 'neder' ),
        'id'     => 'footer_top_color',
        'desc'   => esc_html__( 'Footer Top Colors', 'neder' ),
		'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'footer_top_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Background', 'neder' ),
                'default'  => '#282828',
				'required' => array( 'footer-image-background-active', '=', false ),
                'validate' => 'color'
            ),
            array(
                'id'       => 'footer_top_title',
                'type'     => 'color',
                'title'    => esc_html__( 'Title', 'neder' ),
                'default'  => '#FFFFFF',
                'validate' => 'color'
            ),			
            array(
                'id'       => 'footer_top_text',
                'type'     => 'color',
                'title'    => esc_html__( 'Text and Icon', 'neder' ),
                'default'  => '#949494',
                'validate' => 'color'
            ),
            array(
                'id'       => 'footer_top_line',
                'type'     => 'color',
                'title'    => esc_html__( 'Border Line', 'neder' ),
                'default'  => '#333333',
                'validate' => 'color'
            ),			
        )
    ) );

    // -> START Footer Colors
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer Bottom', 'neder' ),
        'id'     => 'footer_bottom_color',
        'desc'   => esc_html__( 'Footer Bottom Colors', 'neder' ),
		'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'footer_bottom_background',
                'type'     => 'color',
                'title'    => esc_html__( 'Background', 'neder' ),
                'default'  => '#000000',
                'validate' => 'color'
            ),			
            array(
                'id'       => 'footer_bottom_text',
                'type'     => 'color',
                'title'    => esc_html__( 'Text and Icon', 'neder' ),
                'default'  => '#b7b7b7',
                'validate' => 'color'
            ),
            array(
                'id'       => 'footer_bottom_line',
                'type'     => 'color',
                'title'    => esc_html__( 'Border Line', 'neder' ),
                'default'  => '#333333',
                'validate' => 'color'
            ),			
        )
    ) );
	
    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'neder' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'All typography settings', 'neder' ),
		'subsection' => true,
        'fields' => array(
            array(
                'id'          	=> 'main-typography',
                'type'        	=> 'typography',
                'title'       	=> esc_html__( 'Body Typography', 'neder' ),
                'font-backup' 	=> false,
                'font-size'     => false,
                'line-height'   => false,
                'word-spacing'  => false, 
                'letter-spacing'=> false,
                'color'         => false,
				'text-align'	=> false,
				'font-weight'	=> true,
				'subsets'		=> true,
				'font-style'	=> true,
                'all_styles'  	=> true,
                'default'     	=> array(
					'font-style'  => '',
                    'font-family' => 'Roboto Condensed',
					'font-weight' => '400',
					'subsets'	  => 'latin',
					'google'      => true
                ),
            ),
            array(
                'id'          	=> 'p-typography',
                'type'        	=> 'typography',
                'title'       	=> esc_html__( 'Paragraph Typography', 'neder' ),
                'font-backup' 	=> false,
                'font-size'     => false,
                'line-height'   => false,
                'word-spacing'  => false, 
                'letter-spacing'=> false,
                'color'         => false,
				'text-align'	=> false,
				'font-weight'	=> true,
				'subsets'		=> true,
				'font-style'	=> true,				
                'all_styles'  	=> true,
                'default'     	=> array(
					'font-style'  => '',
                    'font-family' => 'Lato',                  
					'font-weight' => '400',
					'subsets'	  => 'latin',
					'google'      => true					
                ),
            ),								
        )
    ) );		

   // -> START Advertisement
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'ADV', 'neder' ),
        'id'               => 'advertisement',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Advertisement Options', 'neder' ),
        'id'         => 'advertisement-fields',
        'subsection' => true,
        'fields'     => array(
			array(
				'id'   => 'info-banner-top',
				'type' => 'info',
				'title' => esc_html__('Top Banner', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for Top Banner', 'neder')
			),		
            array(
                'id'       => 'advertisement-top',
                'type'     => 'switch',
                'title'    => esc_html__('Advertisement Top Banner Activation','neder'),
				'desc'     => esc_html__( 'if logo is setted on center this position is OFF by default', 'neder' ),
                'default'  => true
            ),
            array(
                'id'       => 'advertisement-top-type',
                'type'     => 'select',
                'title'    => esc_html__('Banner Type','neder'),
                'options'  => array(
					'banner-image'  => esc_html__('Banner Image','neder'),
					'custom-code'  	=> esc_html__('Custom Code','neder'),			
                ),
                'default'  => 'banner-image',
				'required' => array( 'advertisement-top', '=', true )
            ),				
            array(
                'id'       => 'advertisement-top-banner',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Advertisement Top Banner', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your banner', 'neder' ),
                'subtitle' => esc_html__( 'Dimension advised: 800x100 px', 'neder' ),
				'required' => array( 'advertisement-top-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-top-banner-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Advertisement Top Banner Link', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
                'default'  => '#',
				'required' => array( 'advertisement-top-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-top-banner-link-target',
                'type'     => 'select',
                'title'    => esc_html__( 'Advertisement Top Banner Link Target', 'neder' ),
                'options'  => array(
					'_blank'  	=> esc_html__('Blank (new window)','neder'),
					'_self'  	=> esc_html__('Self (same window)','neder')				
                ),
                'default'  => '_blank',
				'required' => array( 'advertisement-top-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-top-banner-custom-code',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Top Banner Custom Code', 'neder' ),
                'subtitle' => esc_html__( 'Put here your custom top advertisement. For example google adsense script', 'neder' ),
				'required' => array( 'advertisement-top-type', '=', 'custom-code' )
            ),


			array(
				'id'   => 'info-banner-content-bottom',
				'type' => 'info',
				'title' => esc_html__('Content Bottom Banner', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for Content Bottom Banner', 'neder')
			),				
            array(
                'id'       => 'advertisement-content',
                'type'     => 'select',
                'title'    => esc_html__('Advertisement Content Bottom Banner Activation','neder'),
                'options'  => array(
					'all'  		=> esc_html__('Active All Page/Posts','neder'),
					'post'  	=> esc_html__('Active only on Posts','neder'),				
					'page'  	=> esc_html__('Active only on Pages','neder'),				
					'disabled' 	=> esc_html__('Disabled','neder')			
                ),
                'default'  => 'all'
            ),
            array(
                'id'       => 'advertisement-content-bottom-type',
                'type'     => 'select',
                'title'    => esc_html__('Banner Bottom Type','neder'),
                'options'  => array(
					'banner-image'  => esc_html__('Banner Image','neder'),
					'custom-code'  	=> esc_html__('Custom Code','neder'),			
                ),
                'default'  => 'banner-image',
				'required' => array( 'advertisement-content', '!=', 'disabled' )
            ),			
            array(
                'id'       => 'advertisement-content-banner',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Advertisement Content Banner', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your banner', 'neder' ),
                'subtitle' => esc_html__( 'Dimension advised: 800x100 px', 'neder' ),
				'required' => array( 'advertisement-content-bottom-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-content-banner-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Advertisement Content Bottom Banner Link', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
                'default'  => '#',
				'required' => array( 'advertisement-content-bottom-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-content-banner-link-target',
                'type'     => 'select',
                'title'    => esc_html__( 'Advertisement Content Bottom Banner Link Target', 'neder' ),
                'options'  => array(
					'_blank'  	=> esc_html__('Blank (new window)','neder'),
					'_self'  	=> esc_html__('Self (same window)','neder')				
                ),
                'default'  => '_blank',
				'required' => array( 'advertisement-content-bottom-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-content-bottom-banner-custom-code',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content Bottom Banner Custom Code', 'neder' ),
                'subtitle' => esc_html__( 'Put here your custom content bottom advertisement. For example google adsense script', 'neder' ),
				'required' => array( 'advertisement-content-bottom-type', '=', 'custom-code' )
            ),

			array(
				'id'   => 'info-banner-content-top',
				'type' => 'info',
				'title' => esc_html__('Content Top Banner', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for Content Top Banner', 'neder')
			),
            array(
                'id'       => 'advertisement-content-top',
                'type'     => 'select',
                'title'    => esc_html__('Advertisement Content Top Banner Activation','neder'),
                'options'  => array(
					'all'  		=> esc_html__('Active All Page/Posts','neder'),
					'post'  	=> esc_html__('Active only on Posts','neder'),				
					'page'  	=> esc_html__('Active only on Pages','neder'),				
					'disabled' 	=> esc_html__('Disabled','neder')			
                ),
                'default'  => 'disable'
            ),
            array(
                'id'       => 'advertisement-content-top-type',
                'type'     => 'select',
                'title'    => esc_html__('Banner Top Type','neder'),
                'options'  => array(
					'banner-image'  => esc_html__('Banner Image','neder'),
					'custom-code'  	=> esc_html__('Custom Code','neder'),			
                ),
                'default'  => 'banner-image',
				'required' => array( 'advertisement-content-top', '!=', 'disabled' )
            ),			
            array(
                'id'       => 'advertisement-content-top-banner',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Advertisement Content Top Banner', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your banner', 'neder' ),
                'subtitle' => esc_html__( 'Dimension advised: 800x100 px', 'neder' ),
				'required' => array( 'advertisement-content-top-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-content-top-banner-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Advertisement Content top Banner Link', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
                'default'  => '#',
				'required' => array( 'advertisement-content-top-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-content-top-banner-link-target',
                'type'     => 'select',
                'title'    => esc_html__( 'Advertisement Content Top Banner Link Target', 'neder' ),
                'options'  => array(
					'_blank'  	=> esc_html__('Blank (new window)','neder'),
					'_self'  	=> esc_html__('Self (same window)','neder')				
                ),
                'default'  => '_blank',
				'required' => array( 'advertisement-content-top-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-content-top-banner-custom-code',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Content Top Banner Custom Code', 'neder' ),
                'subtitle' => esc_html__( 'Put here your custom content top advertisement. For example google adsense script', 'neder' ),
				'required' => array( 'advertisement-content-top-type', '=', 'custom-code' )
            ),

			array(
				'id'   => 'info-banner-footer',
				'type' => 'info',
				'title' => esc_html__('Footer Banner', 'neder'),
				'style' => 'success',
				'desc' => esc_html__('All settings for Footer Banner', 'neder')
			),		
            array(
                'id'       => 'advertisement-footer',
                'type'     => 'switch',
                'title'    => esc_html__('Advertisement Footer Banner Activation','neder'),
				'desc'     => esc_html__( 'if logo is setted on center this position is OFF by default', 'neder' ),
                'default'  => false
            ),
            array(
                'id'       => 'advertisement-footer-type',
                'type'     => 'select',
                'title'    => esc_html__('Banner Type','neder'),
                'options'  => array(
					'banner-image'  => esc_html__('Banner Image','neder'),
					'custom-code'  	=> esc_html__('Custom Code','neder'),			
                ),
                'default'  => 'banner-image',
				'required' => array( 'advertisement-footer', '=', true )
            ),				
            array(
                'id'       => 'advertisement-footer-banner',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Advertisement Footer Banner', 'neder' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload your banner', 'neder' ),
                'subtitle' => esc_html__( 'Dimension advised: 800x100 px', 'neder' ),
				'required' => array( 'advertisement-footer-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-footer-banner-link',
                'type'     => 'text',
                'title'    => esc_html__( 'Advertisement Footer Banner Link', 'neder' ),
                'subtitle' => esc_html__( 'Leave Empty for disable', 'neder' ),
                'default'  => '#',
				'required' => array( 'advertisement-footer-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-footer-banner-link-target',
                'type'     => 'select',
                'title'    => esc_html__( 'Advertisement Footer Banner Link Target', 'neder' ),
                'options'  => array(
					'_blank'  	=> esc_html__('Blank (new window)','neder'),
					'_self'  	=> esc_html__('Self (same window)','neder')				
                ),
                'default'  => '_blank',
				'required' => array( 'advertisement-footer-type', '=', 'banner-image' )
            ),
            array(
                'id'       => 'advertisement-footer-banner-custom-code',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer Banner Custom Code', 'neder' ),
                'subtitle' => esc_html__( 'Put here your custom Footer advertisement. For example google adsense script', 'neder' ),
				'required' => array( 'advertisement-footer-type', '=', 'custom-code' )
            ),



			
        )
    ) );	
	
   // -> START Sidebar
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Sidebar', 'neder' ),
        'id'               => 'custom-sidebar',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Create your custom sidebar', 'neder' ),
        'id'         => 'custom-sidebar-field',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'custom-sidebar-name',
                'type'     => 'multi_text',
                'title'    => esc_html__('Create Your Custom Sidebar','neder'),
				'desc'     => esc_html__( 'Write name of custom sidebar.', 'neder' ),
                'default'  => true
            )	
        )
    ) );		

    // -> START Slide Panel
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Slide Panel', 'neder' ),
        'id'               => 'slide-panel',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

	// -> START Slide Panel Options
	Redux::setSection( $opt_name, array(
		'title'      => esc_html__( 'Slide Panel Settings', 'neder' ),
		'id'         => 'slide-panel-settings',
		'desc'       => esc_html__( 'Extra slide Panel', 'neder' ),
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'slide_panel_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Slide Panel Position', 'neder' ),
				'options'  => array(
					'none'  => esc_html__('None (disable)','neder'),
					'left'  => esc_html__('Left','neder'),
					'right' => esc_html__('Right','neder')
				),
				'default'  => 'none',
			),
			array(
				'id'       => 'slide_panel_sidebar',
				'type'     => 'select',
				'title'    => esc_html__('Select Sidebar','neder'),
				'data'  => 'sidebar',
				'required' => array( 'slide_panel_position', '!=', 'none' ),
				'default'  => ''
			),					
		)
	) );	
	
	
	if ( class_exists( 'woocommerce' ) ) {
		// -> START WooCommerce Pages
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'WooCommerce', 'neder' ),
			'id'               => 'woocommerce',
			'customizer_width' => '500px',
			'icon'             => 'el el-adjust-alt',
		) );
			
		// -> START WooCommerce Options
		Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'WooCommerce', 'neder' ),
			'id'         => 'woocommerce-options',
			'desc'       => esc_html__( 'WooCommerce Page settings', 'neder' ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'neder_woocommerce_sidebar_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar WooCommerce Page', 'neder' ),
					'options'  => array(
						'sidebar-none'  => esc_html__('None','neder'),
						'sidebar-left'  => esc_html__('Left','neder'),
						'sidebar-right' => esc_html__('Right','neder')
					),
					'default'  => 'sidebar-right',
				),
				array(
					'id'       => 'neder_woocommerce_add_to_cart',
					'type'     => 'switch',
					'title'    => esc_html__('Add to cart Menu Button','neder'),
					'desc'     => esc_html__( 'if select On search button will be hidden', 'neder' ),
					'default'  => true
				),					
			)
		) );		
	}

	if ( class_exists( 'bbPress' ) ) {
		// -> START BBPress Pages
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'BBPress', 'neder' ),
			'id'               => 'bbpress',
			'customizer_width' => '500px',
			'icon'             => 'el el-adjust-alt',
		) );
			
		// -> START bbPress Options
		Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'BBPress', 'neder' ),
			'id'         => 'bbpress-options',
			'desc'       => esc_html__( 'bbpress Page settings', 'neder' ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'neder_bbpress_sidebar_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar bbPress Page', 'neder' ),
					'options'  => array(
						'sidebar-none'  => esc_html__('None','neder'),
						'sidebar-left'  => esc_html__('Left','neder'),
						'sidebar-right' => esc_html__('Right','neder')
					),
					'default'  => 'sidebar-right',
				),
				array(
					'id'       => 'neder_bbpress_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Name', 'neder' ),
					'options'  => array(
						'neder-bbpress'  => esc_html__('BBPress','neder'),
						'neder-default'  => esc_html__('Default','neder')
					),
					'default'  => 'neder-bbpress',
				),					
			)
		) );		
	}	

	if ( class_exists( 'BuddyPress' ) ) {
		// -> START BuddyPress Pages
		Redux::setSection( $opt_name, array(
			'title'            => esc_html__( 'BuddyPress', 'neder' ),
			'id'               => 'bubbypress',
			'customizer_width' => '500px',
			'icon'             => 'el el-adjust-alt',
		) );
			
		// -> START BuddyPress Options
		Redux::setSection( $opt_name, array(
			'title'      => esc_html__( 'BuddyPress', 'neder' ),
			'id'         => 'buddypress-options',
			'desc'       => esc_html__( 'BuddyPress Page settings', 'neder' ),
			'subsection' => true,
			'fields'     => array(
				array(
					'id'       => 'neder_buddypress_sidebar_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar BuddyPress Page', 'neder' ),
					'options'  => array(
						'sidebar-none'  => esc_html__('None','neder'),
						'sidebar-left'  => esc_html__('Left','neder'),
						'sidebar-right' => esc_html__('Right','neder')
					),
					'default'  => 'sidebar-right',
				),
				array(
					'id'       => 'neder_buddypress_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Name', 'neder' ),
					'options'  => array(
						'neder-buddypress'  => esc_html__('BuddyPress','neder'),
						'neder-default'  => esc_html__('Default','neder')
					),
					'default'  => 'neder-buddypress',
				),					
			)
		) );		
	}

    // -> START Speed Site
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Speed Site', 'neder' ),
        'id'               => 'speed-settings',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Speed Site', 'neder' ),
        'id'         => 'speed-fields',
        'subsection' => true,
        'desc'       => esc_html__( 'Lazy Load Image', 'neder' ),
        'fields'     => array(
            array(
                'id'       => 'neder_lazy_load',
                'type'     => 'switch',
                'title'    => esc_html__('Lazy Load','neder'),
				'desc'     => esc_html__( 'Active Image Lazy load', 'neder' ),
                'default'  => false
            ),
            array(
                'id'       => 'neder_min_assets',
                'type'     => 'switch',
                'title'    => esc_html__('Minify css/js assets','neder'),
				'desc'     => esc_html__( 'Active Minify assets', 'neder' ),
                'default'  => false
            ),			
        )
    ) );	
	
    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'neder' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'neder' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'neder' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }  