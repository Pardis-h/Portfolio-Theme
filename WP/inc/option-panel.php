<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'pas_mph_' . get_locale();  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = dirname( __FILE__ ) . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */


// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'My Portfolio Options', 'pas_mph' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'My Portfolio Options', 'pas_mph' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => true,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => null,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
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
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);





Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'pas_mph' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'pas_mph' ) . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'pas_mph' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'pas_mph' ) . '</p>',
	),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'pas_mph' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

 // -> START General Fields
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'General Front Page', 'pas_mph' ),
		'id'               => 'general_op',
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
		'fields'		   => [
			array(
				'id'       => 'Hero-text_1',
				'type'     => 'text',
				'title'    => esc_html__( 'Hero Section text Line 1', 'pas_mph' ),
				'default'  => 'Hii,',
			),
			array(
				'id'       => 'Hero-text_2',
				'type'     => 'editor',
				'title'    => esc_html__( 'Hero Section text Line 2', 'pas_mph' ),
				'default'  => `I'm <span class="text-primary-color">P</span> ardis,`,
				'args'    => array(
                    'textarea_rows' => 2,
                ),
			),
			array(
				'id'       => 'Hero-text_3',
				'type'     => 'text',
				'title'    => esc_html__( 'Hero Section text Line 3', 'pas_mph' ),
				'default'  => 'Web Developer',
			),
			array(
				'id'       => 'Hero-desc',
				'type'     => 'text',
				'title'    => esc_html__( 'Hero Section desc', 'pas_mph' ),
				'default'  => 'Front End Developer / Wordpress Expert',
			),
			array(
				'id'       => 'Portfolio-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Section Title', 'pas_mph' ),
				'default'  => 'My Portfolio',
			),
			array(
				'id'       => 'Portfolio-bg-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Background Text', 'pas_mph' ),
				'default'  => 'Works.',
			),
			array(
				'id'       => 'Portfolio-desc',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Section desc', 'pas_mph' ),
				'default'  => 'A small gallery of my recent project',
			),
			array(
				'id'       => 'Portfolio-link-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Section Link Text', 'pas_mph' ),
				'default'  => 'See More!',
			),
			array(
				'id'       => 'About-title',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section Title', 'pas_mph' ),
				'default'  => 'About Me',
			),
			array(
				'id'       => 'About-desc',
				'type'     => 'textarea',
				'title'    => esc_html__( 'About Section desc', 'pas_mph' ),
				'default'  => "Passionate Front-End developer with over 2 years of experience. Extensively worked developing Responsive Web Applications. Strong experience in development of web applications for using HTML5, CSS3, Bootstrap, Sass, JavaScript, JQuery and Recently I've started learning React. Moderate knowledge and experience with WordPress development and theming. I'm always willing to learn new traits . I work well both independently and as part of a team.",

			),
			array(
				'id'       => 'About-link-text',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section Link Text', 'pas_mph' ),
				'default'  => 'See More!',
			),
			array(
				'id'       => 'Blog-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Section Title', 'pas_mph' ),
				'default'  => 'My Blog',
			),
			array(
				'id'       => 'Blog-bg-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Background Text', 'pas_mph' ),
				'default'  => 'Blog.',
			),
			array(
				'id'       => 'Blog-desc',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Section desc', 'pas_mph' ),
				'default'  => 'A small gallery of my recent project',
			),
			array(
				'id'       => 'Blog-link-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Section Link Text', 'pas_mph' ),
				'default'  => 'See More',
			),
			array(
				'id'       => 'Contact-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Section Title', 'pas_mph' ),
				'default'  => 'Contact Me',
			),
			array(
				'id'       => 'Contact-desc',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Section desc', 'pas_mph' ),
				'default'  => "Lorem ipsum dolor sit amet, consectetur adipisicing elit.",

			),
			array(
                'id'   => 'divider-1',
                'type' => 'divide',
            ),
			array(
                'id'       => 'intagram-url',
                'type'     => 'text',
                'title'    => esc_html__( 'instagram address', 'pas_mph' ),
            ),
		]
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'Social Links', 'pas_mph' ),
		'id'               => 'social_op',
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
		'fields'		   => [
			array(
                'id'       => 'intagram-url',
                'type'     => 'text',
                'title'    => esc_html__( 'instagram address', 'pas_mph' ),
				'default'  => "https://instagram.com/pardis_haghdoust",
            ),
			array(
                'id'       => 'twitter-url',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter address', 'pas_mph' ),
				'default'  => "https://twitter.com/iampardis_h",
            ),
			array(
                'id'       => 'linkedin-url',
                'type'     => 'text',
                'title'    => esc_html__( 'Linkedin address', 'pas_mph' ),
				'default'  => "https://linkedin.com/in/pardis-haghdoust",
            ),
			array(
                'id'       => 'github-url',
                'type'     => 'text',
                'title'    => esc_html__( 'Github address', 'pas_mph' ),
				'default'  => "https://github.com/Pardis-h",
            ),
		]
	)
);
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__( 'About Me Page', 'pas_mph' ),
		'id'               => 'About_op',
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
		'fields'		   => [
			array(
				'id'       => 'About-text_1',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section text Line 1', 'pas_mph' ),
				'default'  => 'Hey, my name is',
			),
			array(
				'id'       => 'About-name',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section Name Line', 'pas_mph' ),
				'default'  => 'Pardis',
			),
			array(
				'id'       => 'About-lastname',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section LastName Line', 'pas_mph' ),
				'default'  => 'Haghdoust',
			),
			array(
				'id'       => 'About-jobtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section Job Title Line', 'pas_mph' ),
				'default'  => 'Web Developer',
			),
			array(
				'id'       => 'About-bg-text',
				'type'     => 'text',
				'title'    => esc_html__( 'About Section Background Text', 'pas_mph' ),
				'default'  => 'About Me.',
			),
			array(
				'id'       => 'About-text_2',
				'type'     => 'text',
				'title'    => esc_html__( 'My Skill Section Title', 'pas_mph' ),
				'default'  => 'My Skills & Experience',
			),
			array(
				'id'       => 'About-skill-desc',
				'type'     => 'editor',
				'title'    => esc_html__( 'About Description', 'pas_mph' ),
				'default'  => `Passionate Front-End developer with over 2 years of experience. Extensively worked developing Responsive Web Applications. Strong experience in development of web applications for using <a href="">HTML5</a>, <a href="">CSS3</a>, <a href="">Bootstrap</a>, <a href="">Sass</a>, <a href="">JavaScript</a>, <a href="">JQuery</a> and Recently I've started learning <a href="">React</a>. Moderate knowledge and experience with <a href="">WordPress</a> development and theming. I'm always willing to learn new traits . I work well both independently and as part of a team.`,
				'args'    => array(
                    'textarea_rows' => 6,
                ),
			),
			array(
				'id'          => 'About-skill-lists',
				'type'        => 'repeater',
				'title'       => esc_html__( 'Skill bar lists', 'pas_mph' ),
				'full_width'  => true,
				'subtitle'    => esc_html__( 'add your skill', 'pas_mph' ),
				'sortable'    => true,
				'active'      => false,
				'collapsible' => false,
				'fields'      => array(
					array(
						'id'          => 'About-skill-li-text',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Skill Title', 'pas_mph' ),
						'default'     => 'Front-End',
					),
					array(
						'id'          => 'About-skill-li-per',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Skill %', 'pas_mph' ),
						'default'     => '90',
					),
				),
			),
			array(
				'id'          => 'About-job-exp',
				'type'        => 'repeater',
				'title'       => esc_html__( 'Job Exprience', 'pas_mph' ),
				'full_width'  => true,
				'subtitle'    => esc_html__( 'add your job details', 'pas_mph' ),
				'sortable'    => true,
				'active'      => false,
				'collapsible' => false,
				'fields'      => array(
					array(
						'id'          => 'About-job-li-text',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Company Name', 'pas_mph' ),
						'default'     => 'UnityB',
					),
					array(
						'id'          => 'About-job-li-date',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Date', 'pas_mph' ),
						'default'     => 'July 2021 Until now',
					),
					array(
						'id'          => 'About-job-li-loc',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Locate', 'pas_mph' ),
						'default'     => 'Rasht, Iran',
					),
					array(
						'id'          => 'About-job-li-title',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Job Title', 'pas_mph' ),
						'default'     => 'Front-End Developer ( Remotly )',
					),
					array(
						'id'          => 'About-job-li-desc',
						'type'        => 'textarea',
						'placeholder' => esc_html__( 'Job Description', 'pas_mph' ),
						'default'     => 'Developed 10+ dynamic responsive websites using Html5, Css3, Bootstrap, Sass, JQuery and Javascript.',
					),
				),
			),
			array(
				'id'          => 'About-eduction',
				'type'        => 'repeater',
				'title'       => esc_html__( 'Eduction', 'pas_mph' ),
				'full_width'  => true,
				'subtitle'    => esc_html__( 'add eductions', 'pas_mph' ),
				'sortable'    => true,
				'active'      => false,
				'collapsible' => false,
				'fields'      => array(
					array(
						'id'          => 'About-edc-li-uni',
						'type'        => 'text',
						'placeholder' => esc_html__( 'University Name', 'pas_mph' ),
						'default'     => 'Shahid Beheshti University of Tehran',
					),
					array(
						'id'          => 'About-edc-li-date',
						'type'        => 'text',
						'placeholder' => esc_html__( 'Date', 'pas_mph' ),
						'default'     => 'September 2015 to August 2018',
					),
					array(
						'id'          => 'About-edc-li-degree',
						'type'        => 'text',
						'placeholder' => esc_html__( 'degree', 'pas_mph' ),
						'default'     => 'Master, Computer Science',
					),
				),
			),
			array(
				'id'       => 'About-contact-location',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Section Location', 'pas_mph' ),
				'default'  => 'Rasht, Iran',
			),
			array(
				'id'       => 'About-contact-mail',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Section Email', 'pas_mph' ),
				'default'  => 'pardis.haghdoust@gmail.com',
			),
			array(
				'id'       => 'About-contact-phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Contact Section Phone Number', 'pas_mph' ),
				'default'  => '09356459036',
			),
		]
	)
);