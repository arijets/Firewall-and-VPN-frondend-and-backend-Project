<?php
/**
 * Register the required plugins for this theme.
 */
if ( ! function_exists ( 'medical_theme_register_required_plugins' ) ) {
    function medical_theme_register_required_plugins() {

        /**
         * Array of plugins
         * Required keys are name, slug and required.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
            /* Redux Framework plugin is required for theme options */
            array(
                'name' => esc_html__( 'Redux Framework', 'framework' ),
                'slug' => 'redux-framework',
                'required' => true,
            ),
            /* Meta box plugin is required for meta boxes */
            array(
                'name' => esc_html__( 'Meta Box', 'framework' ),
                'slug' => 'meta-box',
                'required' => true,
            ),
	        /* Classic Editor */
	        array(
		        'name' => esc_html__( 'Classic Editor', 'framework' ),
		        'slug' => 'classic-editor',
		        'required' => true,
	        ),
	        // One Click Demo Import.
	        array(
		        'name'      => 'One Click Demo Import',
		        'slug'      => 'one-click-demo-import',
		        'required'  => false,
	        )
        );


    /*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
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

            /*
            'strings'      => array(
                'page_title'                      => esc_html__( 'Install Required Plugins', 'theme-slug' ),
                'menu_title'                      => esc_html__( 'Install Plugins', 'theme-slug' ),
                'installing'                      => esc_html__( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
                'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'theme-slug' ),
                'notice_can_install_required'     => _n_noop(
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_can_install_recommended'  => _n_noop(
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_cannot_install'           => _n_noop(
                    'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_ask_to_update'            => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_ask_to_update_maybe'      => _n_noop(
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_cannot_update'            => _n_noop(
                    'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_can_activate_required'    => _n_noop(
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'notice_cannot_activate'          => _n_noop(
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
                    'theme-slug'
                ), // %1$s = plugin name(s).
                'install_link'                    => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'theme-slug'
                ),
                'update_link' 					  => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'theme-slug'
                ),
                'activate_link'                   => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'theme-slug'
                ),
                'return'                          => esc_html__( 'Return to Required Plugins Installer', 'theme-slug' ),
                'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'theme-slug' ),
                'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'theme-slug' ),
                'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
                'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
                'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
                'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'framework' ),

                'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            ),
            */
        );

        tgmpa( $plugins, $config );

    }

    add_action('tgmpa_register', 'medical_theme_register_required_plugins');

}