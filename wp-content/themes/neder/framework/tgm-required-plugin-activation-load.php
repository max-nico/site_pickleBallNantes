<?php
/**
 * Theme by: AD-Theme
 * http://themeforest.net/user/ad-theme/portfolio
 */
 
 if (is_admin()) {
	 
    # TGM_Plugin_Activation
    require_once (get_template_directory() . '/framework/class/class-tgm-plugin-activation.php');
    
	add_action('tgmpa_register', 'neder_required_plugins');
    
	function neder_required_plugins() {
		
        /**
         * Array of plugin arrays. Required keys are name and slug.
         */
		 
        $plugins = array(
            // Redux Framework
            array(
                'name'					=> 'Redux Framework', // The plugin name
                'slug'					=> 'redux-framework', // The plugin slug (typically the folder name)
                'required'				=> true, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),
            array(
                'name'					=> 'Neder Core Functions', // The plugin name
                'slug'					=> 'neder-core', // The plugin slug (typically the folder name)
                'source'				=> get_template_directory() . '/framework/plugins/neder-core.zip', // The plugin source
                'required'				=> true, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'			=> '', // If set, overrides default API URL and points to an external URL
				'version'				=> '1.0'
            ),
            array(
                'name'					=> 'One Click Demo Import', // The plugin name
                'slug'					=> 'one-click-demo-import', // The plugin slug (typically the folder name)
                'required'				=> true, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),			
            array(
                'name'					=> 'Visual Composer', // The plugin name
                'slug'					=> 'js_composer', // The plugin slug (typically the folder name)
                'source'				=> get_template_directory() . '/framework/plugins/js_composer.zip', // The plugin source
                'required'				=> false, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'			=> '', // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'					=> 'Fast Gallery for Visual Composer', // The plugin name
                'slug'					=> 'fastgallery_vc', // The plugin slug (typically the folder name)
				'source'				=> get_template_directory() . '/framework/plugins/fastgallery_vc.zip', // The plugin source
                'required'				=> false, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),
            array(
                'name'					=> 'Fast Media Gallery for Visual Composer', // The plugin name
                'slug'					=> 'fastmediagallery', // The plugin slug (typically the folder name)
				'source'				=> get_template_directory() . '/framework/plugins/fastmediagallery.zip', // The plugin source
                'required'				=> false, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),			
            array(
                'name'					=> 'Fast Gallery', // The plugin name
                'slug'					=> 'fastgallery', // The plugin slug (typically the folder name)
				'source'				=> get_template_directory() . '/framework/plugins/fastgallery.zip', // The plugin source
                'required'				=> false, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),
            array(
                'name'					=> 'Fast Carousel', // The plugin name
                'slug'					=> 'fastcarousel', // The plugin slug (typically the folder name)
				'source'				=> get_template_directory() . '/framework/plugins/fastcarousel.zip', // The plugin source
                'required'				=> false, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),
            array(
                'name'					=> 'Wp Review', // The plugin name
                'slug'					=> 'wp-review', // The plugin slug (typically the folder name)
                'required'				=> false, // If false, the plugin is only 'recommended' instead of required
                'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            ),			
        );
		
        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
         $config = array(
     		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
     		'default_path' => '',                      // Default absolute path to bundled plugins.
     		'menu'         => 'tgmpa-install-plugins', // Menu slug.
     		'parent_slug'  => 'themes.php',            // Parent menu slug.
     		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
     		'has_notices'  => true,                    // Show admin notices or not.
     		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
     		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
     		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
     		'message'      => '',                      // Message to output right before the plugins table.
     		'strings'      => array(
     			'page_title'                      => esc_html__( 'Install Required Plugins', 'neder' ),
     			'menu_title'                      => esc_html__( 'Install Plugins', 'neder' ),
     			'installing'                      => esc_html__( 'Installing Plugin: %s', 'neder' ), // %s = plugin name.
     			'updating'                        => esc_html__( 'Updating Plugin: %s', 'neder' ), // %s = plugin name.
     			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'neder' ),
     			'notice_can_install_required'     => _n_noop(
     				'This theme requires the following plugin: %1$s.',
     				'This theme requires the following plugins: %1$s.',
     				'neder'
     			), // %1$s = plugin name(s).
     			'notice_can_install_recommended'  => _n_noop(
     				'This theme recommends the following plugin: %1$s.',
     				'This theme recommends the following plugins: %1$s.',
     				'neder'
     			), // %1$s = plugin name(s).
     			'notice_ask_to_update'            => _n_noop(
     				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
     				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
     				'neder'
     			), // %1$s = plugin name(s).
     			'notice_ask_to_update_maybe'      => _n_noop(
     				'There is an update available for: %1$s.',
     				'There are updates available for the following plugins: %1$s.',
     				'neder'
     			), // %1$s = plugin name(s).
     			'notice_can_activate_required'    => _n_noop(
     				'The following required plugin is currently inactive: %1$s.',
     				'The following required plugins are currently inactive: %1$s.',
     				'neder'
     			), // %1$s = plugin name(s).
     			'notice_can_activate_recommended' => _n_noop(
     				'The following recommended plugin is currently inactive: %1$s.',
     				'The following recommended plugins are currently inactive: %1$s.',
     				'neder'
     			), // %1$s = plugin name(s).
     			'install_link'                    => _n_noop(
     				'Begin installing plugin',
     				'Begin installing plugins',
     				'neder'
     			),
     			'update_link' 					  => _n_noop(
     				'Begin updating plugin',
     				'Begin updating plugins',
     				'neder'
     			),
     			'activate_link'                   => _n_noop(
     				'Begin activating plugin',
     				'Begin activating plugins',
     				'neder'
     			),
     			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'neder' ),
     			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'neder' ),
     			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'neder' ),
     			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'neder' ),  // %1$s = plugin name(s).
     			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'neder' ),  // %1$s = plugin name(s).
     			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'neder' ), // %s = dashboard link.
     			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'neder' ),
     			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'neder' ),
     			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
     		),
     	);
		
        tgmpa( $plugins, $config );
    
	}
	
}
