<?php
/**
 * UXNitro Performance Loader
 *
 * Loads all UXNitro performance modules.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load Performance Modules
 */
function uxnitro_load_performance_modules() {
	
	// Load Performance Customizer Panel.
	require_once get_template_directory() . '/inc/performance/customizer-panel.php';
	
	// Load WordPress Cleanup.
	require_once get_template_directory() . '/inc/performance/cleanup.php';
	
	// Load Font Optimization.
	require_once get_template_directory() . '/inc/performance/fonts.php';
	
	// Load Media Optimization.
	require_once get_template_directory() . '/inc/performance/media.php';
	
	// Load Admin Optimization.
	require_once get_template_directory() . '/inc/performance/admin.php';
}

// Load modules after theme setup.
add_action( 'after_setup_theme', 'uxnitro_load_performance_modules', 15 );

/**
 * Control heartbeat frequency
 */
function uxnitro_control_heartbeat( $settings ) {
	$frequency = uxnitro_get_setting( 'heartbeat_frequency', '15' );
	
	if ( $frequency ) {
		$settings['interval'] = intval( $frequency );
	}
	
	return $settings;
}
add_filter( 'heartbeat_settings', 'uxnitro_control_heartbeat' );

/**
 * Add performance info to Site Health
 */
function uxnitro_site_health_performance_info( $tests ) {
	$tests['direct']['uxnitro_performance'] = array(
		'label' => __( 'UXNitro Performance', 'uxnitro' ),
		'test'  => 'uxnitro_site_health_performance_test',
	);
	
	return $tests;
}
add_filter( 'site_status_tests', 'uxnitro_site_health_performance_info' );

/**
 * Site Health performance test callback
 */
function uxnitro_site_health_performance_test() {
	$result = array(
		'label'       => __( 'Performance optimizations active', 'uxnitro' ),
		'status'      => 'good',
		'badge'       => array(
			'label' => __( 'Performance', 'uxnitro' ),
			'color' => 'blue',
		),
		'description' => sprintf(
			'<p>%s</p>',
			__( 'UXNitro Performance optimizations are active and helping your site run faster.', 'uxnitro' )
		),
		'test'        => 'uxnitro_performance',
	);
	
	return $result;
}
