<?php
/**
 * UXNitro Performance - Font Optimization
 *
 * Controls how fonts are loaded and optimized.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Disable Google Fonts loading
 */
function uxnitro_disable_google_fonts( $fonts_url ) {
	if ( uxnitro_get_setting( 'disable_google_fonts', false ) ) {
		return '';
	}
	return $fonts_url;
}
add_filter( 'customify_google_fonts_url', 'uxnitro_disable_google_fonts' );

/**
 * Add font-display: swap to Google Fonts
 */
function uxnitro_font_display_swap( $translator_text ) {
	if ( uxnitro_get_setting( 'font_display_swap', true ) ) {
		return '&display=swap';
	}
	return $translator_text;
}
add_filter( 'customify_google_fonts_args', 'uxnitro_font_display_swap' );

/**
 * Preload primary font
 */
function uxnitro_preload_primary_font() {
	if ( uxnitro_get_setting( 'preload_font', false ) ) {
		$font_url = uxnitro_get_setting( 'preload_font_url', '' );
		if ( ! empty( $font_url ) ) {
			echo '<link rel="preload" href="' . esc_url( $font_url ) . '" as="font" type="font/woff2" crossorigin>' . "\n";
		}
	}
}
add_action( 'wp_head', 'uxnitro_preload_primary_font', 1 );

/**
 * Use system fonts only
 */
function uxnitro_use_system_fonts() {
	return uxnitro_get_setting( 'use_system_fonts', false );
}

/**
 * Get system font stack
 */
function uxnitro_get_system_font_stack() {
	return '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif';
}

/**
 * Add system font stack to CSS when enabled
 */
function uxnitro_system_font_css() {
	if ( uxnitro_use_system_fonts() ) {
		$system_fonts = uxnitro_get_system_font_stack();
		$css = "
			/* UXNitro System Font Stack */
			body, button, input, select, textarea {
				font-family: {$system_fonts};
			}
		";
		wp_add_inline_style( 'uxnitro-style', $css );
	}
}
add_action( 'wp_enqueue_scripts', 'uxnitro_system_font_css', 100 );
