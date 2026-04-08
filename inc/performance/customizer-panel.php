<?php
/**
 * UXNitro Performance - Customizer Panel
 *
 * Adds the UXNitro Performance panel to the WordPress Customizer.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the UXNitro Performance Panel and Sections
 */
function uxnitro_customizer_performance_panel( $wp_customize ) {

	// Add Performance Panel.
	$wp_customize->add_panel(
		'uxnitro_performance',
		array(
			'title'          => __( 'UXNitro Performance', 'uxnitro' ),
			'description'    => __( 'Optimize your site performance with these powerful settings. Each option includes clear descriptions and recommendations.', 'uxnitro' ),
			'priority'       => 200,
			'capability'     => 'edit_theme_options',
		)
	);

	// WordPress Cleanup Section.
	$wp_customize->add_section(
		'uxnitro_performance_wordpress',
		array(
			'title'       => __( 'WordPress Cleanup', 'uxnitro' ),
			'description' => __( 'Remove unnecessary WordPress features to improve performance. Each setting is safe for most sites.', 'uxnitro' ),
			'panel'       => 'uxnitro_performance',
			'priority'    => 10,
		)
	);

	// Font Optimization Section.
	$wp_customize->add_section(
		'uxnitro_performance_fonts',
		array(
			'title'       => __( 'Font Optimization', 'uxnitro' ),
			'description' => __( 'Control how fonts are loaded and displayed on your site.', 'uxnitro' ),
			'panel'       => 'uxnitro_performance',
			'priority'    => 20,
		)
	);

	// Media Optimization Section.
	$wp_customize->add_section(
		'uxnitro_performance_media',
		array(
			'title'       => __( 'Media Optimization', 'uxnitro' ),
			'description' => __( 'Optimize images and iframes for faster page loading.', 'uxnitro' ),
			'panel'       => 'uxnitro_performance',
			'priority'    => 30,
		)
	);

	// Database & Background Tasks Section.
	$wp_customize->add_section(
		'uxnitro_performance_database',
		array(
			'title'       => __( 'Database & Background Tasks', 'uxnitro' ),
			'description' => __( 'Control background processes that can slow down your site.', 'uxnitro' ),
			'panel'       => 'uxnitro_performance',
			'priority'    => 40,
		)
	);

	// Admin Optimization Section.
	$wp_customize->add_section(
		'uxnitro_performance_admin',
		array(
			'title'       => __( 'Admin Optimization', 'uxnitro' ),
			'description' => __( 'Clean up and optimize the WordPress admin experience.', 'uxnitro' ),
			'panel'       => 'uxnitro_performance',
			'priority'    => 50,
		)
	);

	// ===========================
	// WordPress Cleanup Settings
	// ===========================

	// Disable Emojis.
	$wp_customize->add_setting(
		'uxnitro_disable_emojis',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_emojis',
			array(
				'label'       => __( 'Disable Emojis', 'uxnitro' ),
				'description' => __( 'Removes the extra WordPress emoji script and styles from the frontend. Safe for most sites. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Embeds.
	$wp_customize->add_setting(
		'uxnitro_disable_embeds',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_embeds',
			array(
				'label'       => __( 'Disable Embeds', 'uxnitro' ),
				'description' => __( 'Prevents others from embedding your site and stops external embed scripts. May affect plugins that rely on oEmbed. Safe for most sites.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Block Library CSS.
	$wp_customize->add_setting(
		'uxnitro_disable_block_library_css',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_block_library_css',
			array(
				'label'       => __( 'Disable Block Library CSS', 'uxnitro' ),
				'description' => __( 'Removes the Gutenberg block library CSS from the frontend. Only disable if you don\'t use Gutenberg blocks. May affect plugin appearance.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Dashicons for Guests.
	$wp_customize->add_setting(
		'uxnitro_disable_dashicons',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_dashicons',
			array(
				'label'       => __( 'Disable Dashicons for Guests', 'uxnitro' ),
				'description' => __( 'Removes the dashicons font for non-logged-in users. Safe for most sites. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable RSS Feeds.
	$wp_customize->add_setting(
		'uxnitro_disable_rss_feeds',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_rss_feeds',
			array(
				'label'       => __( 'Disable RSS Feeds', 'uxnitro' ),
				'description' => __( 'Disables all RSS/Atom feeds. Only disable if you don\'t want users subscribing to your content. May affect email marketing plugins.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable XML-RPC.
	$wp_customize->add_setting(
		'uxnitro_disable_xmlrpc',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_xmlrpc',
			array(
				'label'       => __( 'Disable XML-RPC', 'uxnitro' ),
				'description' => __( 'Disables XML-RPC endpoint for security and performance. Only disable if you use mobile apps or third-party services that need XML-RPC. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable REST API for Guests.
	$wp_customize->add_setting(
		'uxnitro_disable_rest_api_guests',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_rest_api_guests',
			array(
				'label'       => __( 'Disable REST API for Guests', 'uxnitro' ),
				'description' => __( 'Removes REST API discovery links for non-logged-in users. May affect plugins that use the REST API. Only disable if unused.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Pingbacks.
	$wp_customize->add_setting(
		'uxnitro_disable_pingbacks',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_pingbacks',
			array(
				'label'       => __( 'Disable Pingbacks', 'uxnitro' ),
				'description' => __( 'Disables pingbacks and trackbacks. Reduces spam and improves performance. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Shortlink.
	$wp_customize->add_setting(
		'uxnitro_disable_shortlink',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_shortlink',
			array(
				'label'       => __( 'Disable Shortlink', 'uxnitro' ),
				'description' => __( 'Removes the shortlink meta tag from the head. Safe for most sites. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Generator Meta.
	$wp_customize->add_setting(
		'uxnitro_disable_generator',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_generator',
			array(
				'label'       => __( 'Disable Generator Meta Tag', 'uxnitro' ),
				'description' => __( 'Removes the WordPress version meta tag for security. Safe for most sites. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable oEmbed Discovery.
	$wp_customize->add_setting(
		'uxnitro_disable_oembed_discovery',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_oembed_discovery',
			array(
				'label'       => __( 'Disable oEmbed Discovery Links', 'uxnitro' ),
				'description' => __( 'Removes oEmbed discovery links from the head. May affect embed functionality. Only disable if unused.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Query Strings.
	$wp_customize->add_setting(
		'uxnitro_disable_query_strings',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_query_strings',
			array(
				'label'       => __( 'Disable Query Strings from Static Files', 'uxnitro' ),
				'description' => __( 'Removes ?ver= query strings from CSS and JS files for better caching. Safe for most sites. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Heartbeat.
	$wp_customize->add_setting(
		'uxnitro_disable_heartbeat',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_heartbeat',
			array(
				'label'       => __( 'Disable Heartbeat API', 'uxnitro' ),
				'description' => __( 'Disables the WordPress Heartbeat API completely. May affect auto-save and other real-time features. Only disable if unused.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Font Awesome.
	$wp_customize->add_setting(
		'uxnitro_disable_font_awesome',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_font_awesome',
			array(
				'label'       => __( 'Disable Font Awesome', 'uxnitro' ),
				'description' => __( 'Removes Font Awesome stylesheets from the frontend. Only disable if your theme and plugins don\'t use Font Awesome icons. May affect plugins that rely on Font Awesome. Review before enabling.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Comment Reply Script.
	$wp_customize->add_setting(
		'uxnitro_disable_comment_reply',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_comment_reply',
			array(
				'label'       => __( 'Disable Comment Reply Script', 'uxnitro' ),
				'description' => __( 'Removes the comment-reply script when not needed. Safe if comments are disabled on most pages. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable jQuery Migrate.
	$wp_customize->add_setting(
		'uxnitro_disable_jquery_migrate',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_jquery_migrate',
			array(
				'label'       => __( 'Disable jQuery Migrate', 'uxnitro' ),
				'description' => __( 'Removes the jQuery Migrate library. Safe for modern sites using updated plugins. May affect older plugins. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_wordpress',
				'type'        => 'checkbox',
			)
		)
	);

	// ===========================
	// Font Optimization Settings
	// ===========================

	// Disable Google Fonts.
	$wp_customize->add_setting(
		'uxnitro_disable_google_fonts',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_google_fonts',
			array(
				'label'       => __( 'Disable Google Fonts', 'uxnitro' ),
				'description' => __( 'Prevents external font requests to Google Fonts. Recommended if using local fonts or system fonts. May affect the appearance of imported starter templates.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_fonts',
				'type'        => 'checkbox',
			)
		)
	);

	// Font Display Swap.
	$wp_customize->add_setting(
		'uxnitro_font_display_swap',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_font_display_swap',
			array(
				'label'       => __( 'Font Display Swap', 'uxnitro' ),
				'description' => __( 'Adds display=swap to Google Fonts for better perceived performance. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_fonts',
				'type'        => 'checkbox',
			)
		)
	);

	// Preload Primary Font.
	$wp_customize->add_setting(
		'uxnitro_preload_font',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_preload_font',
			array(
				'label'       => __( 'Preload Primary Font', 'uxnitro' ),
				'description' => __( 'Preloads your main font for faster rendering. Only enable if you know your font URL.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_fonts',
				'type'        => 'checkbox',
			)
		)
	);

	// Preload Font URL.
	$wp_customize->add_setting(
		'uxnitro_preload_font_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_preload_font_url',
			array(
				'label'       => __( 'Preload Font URL', 'uxnitro' ),
				'description' => __( 'Enter the full URL to your primary font file (.woff2 recommended).', 'uxnitro' ),
				'section'     => 'uxnitro_performance_fonts',
				'type'        => 'url',
			)
		)
	);

	// Use System Fonts.
	$wp_customize->add_setting(
		'uxnitro_use_system_fonts',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_use_system_fonts',
			array(
				'label'       => __( 'Use System Fonts Only', 'uxnitro' ),
				'description' => __( 'Replaces all custom fonts with native system fonts. Fastest option. May affect design.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_fonts',
				'type'        => 'checkbox',
			)
		)
	);

	// ===========================
	// Media Optimization Settings
	// ===========================

	// Lazy Load Images.
	$wp_customize->add_setting(
		'uxnitro_lazy_load_images',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_lazy_load_images',
			array(
				'label'       => __( 'Enable Lazy Load for Images', 'uxnitro' ),
				'description' => __( 'Loads images only when they enter the viewport. Recommended for performance. Safe for most sites.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_media',
				'type'        => 'checkbox',
			)
		)
	);

	// Lazy Load Iframes.
	$wp_customize->add_setting(
		'uxnitro_lazy_load_iframes',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_lazy_load_iframes',
			array(
				'label'       => __( 'Enable Lazy Load for Iframes', 'uxnitro' ),
				'description' => __( 'Loads iframes (videos, maps) only when they enter the viewport. Recommended for performance.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_media',
				'type'        => 'checkbox',
			)
		)
	);

	// ===========================
	// Database & Background Tasks
	// ===========================

	// Heartbeat Frequency.
	$wp_customize->add_setting(
		'uxnitro_heartbeat_frequency',
		array(
			'default'           => '15',
			'sanitize_callback' => 'uxnitro_sanitize_select',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_heartbeat_frequency',
			array(
				'label'       => __( 'Heartbeat Frequency (seconds)', 'uxnitro' ),
				'description' => __( 'Controls how often WordPress sends heartbeat requests. Lower = more frequent. 60s is recommended for most sites.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_database',
				'type'        => 'select',
				'choices'     => array(
					'15'  => '15 seconds (Default)',
					'30'  => '30 seconds',
					'60'  => '60 seconds (Recommended)',
					'120' => '120 seconds',
				),
			)
		)
	);

	// ===========================
	// Admin Optimization Settings
	// ===========================

	// Hide Dashboard Widgets.
	$wp_customize->add_setting(
		'uxnitro_hide_dashboard_widgets',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_hide_dashboard_widgets',
			array(
				'label'       => __( 'Hide Dashboard Widgets', 'uxnitro' ),
				'description' => __( 'Removes default WordPress dashboard widgets for a cleaner admin area. Safe for most sites.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_admin',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Welcome Panel.
	$wp_customize->add_setting(
		'uxnitro_disable_welcome_panel',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_welcome_panel',
			array(
				'label'       => __( 'Disable Welcome Panel', 'uxnitro' ),
				'description' => __( 'Hides the WordPress welcome panel on the dashboard. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_admin',
				'type'        => 'checkbox',
			)
		)
	);

	// Hide Plugin Nags.
	$wp_customize->add_setting(
		'uxnitro_hide_plugin_nags',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_hide_plugin_nags',
			array(
				'label'       => __( 'Hide Plugin Nags', 'uxnitro' ),
				'description' => __( 'Hides upgrade notices and nags from plugins for non-admin users. Safe for most sites.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_admin',
				'type'        => 'checkbox',
			)
		)
	);

	// Disable Update Nags for Non-Admin.
	$wp_customize->add_setting(
		'uxnitro_disable_update_nags',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_disable_update_nags',
			array(
				'label'       => __( 'Disable Update Nags for Non-Admin Users', 'uxnitro' ),
				'description' => __( 'Hides update notifications from non-admin users. Recommended: Enabled.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_admin',
				'type'        => 'checkbox',
			)
		)
	);

	// Simplify Admin Menu.
	$wp_customize->add_setting(
		'uxnitro_simplify_admin_menu',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_simplify_admin_menu',
			array(
				'label'       => __( 'Simplify Admin Menu', 'uxnitro' ),
				'description' => __( 'Removes admin menu items for non-admin users. Only disable if you want simplified admin.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_admin',
				'type'        => 'checkbox',
			)
		)
	);

	// Cleanup Admin Bar.
	$wp_customize->add_setting(
		'uxnitro_cleanup_admin_bar',
		array(
			'default'           => false,
			'sanitize_callback' => 'uxnitro_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'uxnitro_cleanup_admin_bar',
			array(
				'label'       => __( 'Cleanup Admin Bar', 'uxnitro' ),
				'description' => __( 'Removes WordPress logo and links from the admin bar. Safe for most sites.', 'uxnitro' ),
				'section'     => 'uxnitro_performance_admin',
				'type'        => 'checkbox',
			)
		)
	);
}
add_action( 'customize_register', 'uxnitro_customizer_performance_panel' );

/**
 * Add custom CSS for Performance toggle switches
 */
function uxnitro_performance_custom_css() {
	?>
	<style>
		/* Add dividers between settings */
		#sub-accordion-section-uxnitro_performance_wordpress .customize-control,
		#sub-accordion-section-uxnitro_performance_fonts .customize-control,
		#sub-accordion-section-uxnitro_performance_media .customize-control,
		#sub-accordion-section-uxnitro_performance_database .customize-control,
		#sub-accordion-section-uxnitro_performance_admin .customize-control {
			padding: 15px 0;
			border-bottom: 1px solid #e2e4e7;
		}
		
		#sub-accordion-section-uxnitro_performance_wordpress .customize-control:last-child,
		#sub-accordion-section-uxnitro_performance_fonts .customize-control:last-child,
		#sub-accordion-section-uxnitro_performance_media .customize-control:last-child,
		#sub-accordion-section-uxnitro_performance_database .customize-control:last-child,
		#sub-accordion-section-uxnitro_performance_admin .customize-control:last-child {
			border-bottom: none;
		}
		
		/* Hide default checkbox */
		.customize-control-checkbox input[type="checkbox"] {
			display: none;
		}
		
		/* Toggle switch container */
		.customize-control-checkbox label {
			position: relative;
			display: flex;
			justify-content: space-between;
			align-items: center;
			cursor: pointer;
			padding-right: 60px;
		}
		
		/* Toggle track */
		.customize-control-checkbox label::before {
			content: '';
			position: absolute;
			right: 0;
			top: 50%;
			transform: translateY(-50%);
			width: 44px;
			height: 24px;
			background: #dcdcde;
			border-radius: 12px;
			transition: background 0.3s ease;
		}
		
		/* Toggle thumb */
		.customize-control-checkbox label::after {
			content: '';
			position: absolute;
			right: 22px;
			top: 50%;
			transform: translateY(-50%);
			width: 18px;
			height: 18px;
			background: #fff;
			border-radius: 50%;
			transition: all 0.3s ease;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
		}
		
		/* Checked state - GREEN */
		.customize-control-checkbox input[type="checkbox"]:checked + label::before {
			background: #22c55e;
		}
		
		.customize-control-checkbox input[type="checkbox"]:checked + label::after {
			right: 4px;
			box-shadow: 0 1px 4px rgba(34, 197, 94, 0.4);
		}
		
		/* Hover effects */
		.customize-control-checkbox label:hover::before {
			opacity: 0.85;
		}
		
		/* Focus for accessibility */
		.customize-control-checkbox input[type="checkbox"]:focus + label::before {
			outline: 2px solid #2271b1;
			outline-offset: 2px;
		}
		
		/* Description styling */
		.customize-control-checkbox .customize-control-description {
			margin-top: 8px;
			font-size: 12px;
			color: #646970;
			line-height: 1.5;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'uxnitro_performance_custom_css', 999 );

/**
 * Sanitize checkbox
 */
function uxnitro_sanitize_checkbox( $checked ) {
	return ( bool ) $checked;
}

/**
 * Sanitize select
 */
function uxnitro_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Get UXNitro setting with fallback
 */
function uxnitro_get_setting( $key, $default = false ) {
	$value = get_theme_mod( 'uxnitro_' . $key, $default );
	return $value;
}
