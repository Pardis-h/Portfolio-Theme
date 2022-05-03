<?php

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );


function my_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name'      => 'advanced custom fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
			'force_activation'   => false
		),
		array(
			'name'        => 'redux framework',
			'slug'        => 'redux-framework',
			'required'  => true,
			'force_activation'   => true
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

	);


	$config = array(
		'id'           => 'pas_myp_tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
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
			'page_title'                      => __( 'Install Required Plugins', 'pas_mph' ),
			'menu_title'                      => __( 'Install Plugins', 'pas_mph' ),
			'installing'                      => __( 'Installing Plugin: %s', 'pas_mph' ),
			'updating'                        => __( 'Updating Plugin: %s', 'pas_mph' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'pas_mph' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'pas_mph'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'pas_mph'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'pas_mph'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'pas_mph'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'pas_mph'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'pas_mph'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'pas_mph'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'pas_mph'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'pas_mph'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'pas_mph' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'pas_mph' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'pas_mph' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'pas_mph' ),
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'pas_mph' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'pas_mph' ),
			'dismiss'                         => __( 'Dismiss this notice', 'pas_mph' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'pas_mph' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'pas_mph' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		
	);

	tgmpa( $plugins, $config );
}
