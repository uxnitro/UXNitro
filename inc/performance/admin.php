<?php
/**
 * UXNitro Performance - Admin Optimization
 *
 * Cleans up the WordPress admin area for better performance and UX.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hide Dashboard Widgets
 */
function uxnitro_hide_dashboard_widgets() {
	if ( uxnitro_get_setting( 'hide_dashboard_widgets', false ) ) {
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPress Events and News
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // Quick Draft
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // Activity
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // At a Glance
		remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' ); // Site Health
	}
}
add_action( 'wp_dashboard_setup', 'uxnitro_hide_dashboard_widgets' );

/**
 * Disable Admin Welcome Panel
 */
function uxnitro_disable_welcome_panel() {
	if ( uxnitro_get_setting( 'disable_welcome_panel', true ) ) {
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
	}
}
add_action( 'load-index.php', 'uxnitro_disable_welcome_panel' );

/**
 * Hide Plugin Nags and Notices for Non-Admin Users
 */
function uxnitro_hide_plugin_nags() {
	if ( uxnitro_get_setting( 'hide_plugin_nags', false ) && ! current_user_can( 'manage_options' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_init', 'uxnitro_hide_plugin_nags' );

/**
 * Disable Update Nags for Non-Admin Users
 */
function uxnitro_disable_update_nags() {
	if ( uxnitro_get_setting( 'disable_update_nags', false ) && ! current_user_can( 'manage_options' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'network_admin_notices', 'update_nag', 3 );
	}
}
add_action( 'admin_init', 'uxnitro_disable_update_nags' );

/**
 * Simplify Admin Menu
 */
function uxnitro_simplify_admin_menu() {
	if ( ! uxnitro_get_setting( 'simplify_admin_menu', false ) ) {
		return;
	}

	// Only for non-admin users
	if ( ! current_user_can( 'manage_options' ) ) {
		// Remove various menu items for non-admin users
		remove_menu_page( 'edit.php' ); // Posts
		remove_menu_page( 'upload.php' ); // Media
		remove_menu_page( 'edit.php?post_type=page' ); // Pages
		remove_menu_page( 'edit-comments.php' ); // Comments
		remove_menu_page( 'themes.php' ); // Appearance
		remove_menu_page( 'plugins.php' ); // Plugins
		remove_menu_page( 'users.php' ); // Users
		remove_menu_page( 'tools.php' ); // Tools
		remove_menu_page( 'options-general.php' ); // Settings
	}
}
add_action( 'admin_menu', 'uxnitro_simplify_admin_menu', 999 );

/**
 * Remove unnecessary admin bar items
 */
function uxnitro_cleanup_admin_bar( $wp_admin_bar ) {
	if ( uxnitro_get_setting( 'cleanup_admin_bar', false ) ) {
		$wp_admin_bar->remove_node( 'wp-logo' ); // WordPress logo
		$wp_admin_bar->remove_node( 'about' ); // About WordPress
		$wp_admin_bar->remove_node( 'wporg' ); // WordPress.org
		$wp_admin_bar->remove_node( 'documentation' ); // Documentation
		$wp_admin_bar->remove_node( 'support-forums' ); // Support
		$wp_admin_bar->remove_node( 'feedback' ); // Feedback
	}
	return $wp_admin_bar;
}
add_filter( 'admin_bar_menu', 'uxnitro_cleanup_admin_bar', 999 );

/**
 * Disable admin notices on specific pages
 */
function uxnitro_disable_admin_notices() {
	if ( uxnitro_get_setting( 'disable_admin_notices', false ) ) {
		$screen = get_current_screen();
		
		// Disable notices on certain admin pages
		$hide_pages = array( 'dashboard', 'plugins', 'update-core' );
		
		if ( in_array( $screen->id, $hide_pages, true ) && ! current_user_can( 'manage_options' ) ) {
			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );
		}
	}
}
add_action( 'admin_head', 'uxnitro_disable_admin_notices' );

/**
 * Clean up admin CSS
 */
function uxnitro_admin_cleanup_css() {
	if ( uxnitro_get_setting( 'admin_cleanup_css', false ) ) {
		$css = '
			/* UXNitro Admin Cleanup */
			.update-nag, .notice.notice { display: none; }
		';
		wp_add_inline_style( 'wp-admin', $css );
	}
}
add_action( 'admin_enqueue_scripts', 'uxnitro_admin_cleanup_css' );
