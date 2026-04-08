<?php
/**
 * UXNitro Performance - Media Optimization
 *
 * Controls lazy loading and media optimization settings.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enable lazy loading for images
 */
function uxnitro_lazy_load_images( $value, $image, $context ) {
	if ( 'the_content' === $context && uxnitro_get_setting( 'lazy_load_images', true ) ) {
		$image_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
		
		// Add loading="lazy" attribute
		if ( false === strpos( $image, 'loading=' ) ) {
			$image = str_replace( '<img', '<img loading="lazy"', $image );
		}
	}
	
	return $image;
}
add_filter( 'wp_get_attachment_image_attributes', 'uxnitro_lazy_load_images_attributes', 10, 2 );

/**
 * Add lazy load to image attributes
 */
function uxnitro_lazy_load_images_attributes( $attributes ) {
	if ( uxnitro_get_setting( 'lazy_load_images', true ) && ! is_admin() ) {
		$attributes['loading'] = 'lazy';
	}
	return $attributes;
}

/**
 * Enable lazy loading for iframes
 */
function uxnitro_lazy_load_iframes( $html ) {
	if ( uxnitro_get_setting( 'lazy_load_iframes', true ) && ! is_admin() ) {
		$html = str_replace( '<iframe', '<iframe loading="lazy"', $html );
	}
	return $html;
}
add_filter( 'embed_oembed_html', 'uxnitro_lazy_load_iframes', 10, 2 );
add_filter( 'video_embed_html', 'uxnitro_lazy_load_iframes' ); // Jetpack

/**
 * Add native lazy load support
 */
function uxnitro_native_lazy_load() {
	if ( ! is_admin() ) {
		// WordPress 5.5+ has native lazy loading
		// This ensures it's enabled for content
		if ( uxnitro_get_setting( 'lazy_load_images', true ) ) {
			add_filter( 'wp_img_tag_add_loading_attr', '__return_true' );
		}
	}
}
add_action( 'init', 'uxnitro_native_lazy_load' );
