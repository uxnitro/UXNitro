<?php
/**
 * UXNitro Performance - WordPress Cleanup
 *
 * Removes unnecessary WordPress features for better performance.
 *
 * @package uxnitro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Disable WordPress Emojis
 */
function uxnitro_disable_emojis() {
	if ( uxnitro_get_setting( 'disable_emojis', false ) ) {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'uxnitro_disable_emojis_tinymce' );
		add_filter( 'emoji_svg_url', '__return_false' );
	}
}
add_action( 'init', 'uxnitro_disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 */
function uxnitro_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	}
	return array();
}

/**
 * Disable WordPress Embeds
 */
function uxnitro_disable_embeds() {
	if ( ! uxnitro_get_setting( 'disable_embeds', false ) ) {
		return;
	}

	global $wp;
	$wp->public_query_vars = array_diff( $wp->public_query_vars, array( 'embed' ) );

	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	add_filter( 'tiny_mce_plugins', 'uxnitro_disable_embeds_tinymce' );
	add_filter( 'rewrite_rules_array', 'uxnitro_disable_embeds_rewrites' );
}
add_action( 'plugins_loaded', 'uxnitro_disable_embeds' );

/**
 * Remove the embed JavaScript from the TinyMCE editor.
 */
function uxnitro_disable_embeds_tinymce( $plugins ) {
	return array_diff( $plugins, array( 'wpembed' ) );
}

/**
 * Remove the rewrite rule for embedding.
 */
function uxnitro_disable_embeds_rewrites( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( false !== strpos( $rewrite, 'embed=true' ) ) {
			unset( $rules[ $rule ] );
		}
	}
	return $rules;
}

/**
 * Disable Block Library CSS
 */
function uxnitro_disable_block_library_css() {
	if ( uxnitro_get_setting( 'disable_block_library_css', false ) ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-blocks-style' );
	}
}
add_action( 'wp_enqueue_scripts', 'uxnitro_disable_block_library_css', 100 );

/**
 * Disable Dashicons for non-admin users
 */
function uxnitro_disable_dashicons_guests() {
	if ( uxnitro_get_setting( 'disable_dashicons', false ) && ! is_admin() && ! current_user_can( 'manage_options' ) ) {
		wp_dequeue_style( 'dashicons' );
	}
}
add_action( 'wp_enqueue_scripts', 'uxnitro_disable_dashicons_guests' );

/**
 * Disable RSS Feeds
 */
function uxnitro_disable_rss_feeds() {
	if ( uxnitro_get_setting( 'disable_rss_feeds', false ) ) {
		function uxnitro_disable_feed() {
			wp_die( __( 'No feeds available, <a href="' . esc_url( home_url() ) . '">go back to the homepage</a>' ) );
		}
		add_action( 'do_feed', 'uxnitro_disable_feed', 1 );
		add_action( 'do_feed_rdf', 'uxnitro_disable_feed', 1 );
		add_action( 'do_feed_rss', 'uxnitro_disable_feed', 1 );
		add_action( 'do_feed_rss2', 'uxnitro_disable_feed', 1 );
		add_action( 'do_feed_atom', 'uxnitro_disable_feed', 1 );
		add_action( 'do_feed_rss2_comments', 'uxnitro_disable_feed', 1 );
		add_action( 'do_feed_atom_comments', 'uxnitro_disable_feed', 1 );
	}
}
add_action( 'init', 'uxnitro_disable_rss_feeds' );

/**
 * Disable XML-RPC
 */
function uxnitro_disable_xmlrpc( $methods ) {
	if ( uxnitro_get_setting( 'disable_xmlrpc', false ) ) {
		return array( 'pingback.ping' );
	}
	return $methods;
}
add_filter( 'xmlrpc_methods', 'uxnitro_disable_xmlrpc' );

/**
 * Disable REST API for guests
 */
function uxnitro_restrict_rest_api_for_guests() {
	if ( uxnitro_get_setting( 'disable_rest_api_guests', false ) && ! is_user_logged_in() ) {
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	}
}
add_action( 'init', 'uxnitro_restrict_rest_api_for_guests' );

/**
 * Disable Pingbacks
 */
function uxnitro_disable_pingbacks() {
	if ( uxnitro_get_setting( 'disable_pingbacks', false ) ) {
		add_filter( 'xmlrpc_methods', function( $methods ) {
			unset( $methods['pingback.ping'] );
			return $methods;
		} );
		add_filter( 'pings_open', '__return_false' );
	}
}
add_action( 'init', 'uxnitro_disable_pingbacks' );

/**
 * Disable Shortlink
 */
function uxnitro_disable_shortlink() {
	if ( uxnitro_get_setting( 'disable_shortlink', false ) ) {
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
	}
}
add_action( 'init', 'uxnitro_disable_shortlink' );

/**
 * Disable Generator Meta Tag
 */
function uxnitro_disable_generator_meta() {
	if ( uxnitro_get_setting( 'disable_generator', false ) ) {
		remove_action( 'wp_head', 'wp_generator' );
	}
}
add_action( 'init', 'uxnitro_disable_generator_meta' );

/**
 * Disable oEmbed Discovery Links
 */
function uxnitro_disable_oembed_discovery() {
	if ( uxnitro_get_setting( 'disable_oembed_discovery', false ) ) {
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	}
}
add_action( 'init', 'uxnitro_disable_oembed_discovery' );

/**
 * Remove Query Strings from Static Files
 */
function uxnitro_remove_query_strings( $src ) {
	if ( uxnitro_get_setting( 'disable_query_strings', false ) && strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'uxnitro_remove_query_strings', 15, 1 );
add_filter( 'style_loader_src', 'uxnitro_remove_query_strings', 15, 1 );

/**
 * Disable Heartbeat API
 */
function uxnitro_disable_heartbeat() {
	if ( uxnitro_get_setting( 'disable_heartbeat', false ) ) {
		wp_deregister_script( 'heartbeat' );
	}
}
add_action( 'init', 'uxnitro_disable_heartbeat' );

/**
 * Disable Comment Reply Script when comments are disabled
 */
function uxnitro_disable_comment_reply_script() {
	if ( uxnitro_get_setting( 'disable_comment_reply', false ) && ! is_singular() ) {
		wp_deregister_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uxnitro_disable_comment_reply_script', 100 );

/**
 * Disable jQuery Migrate
 */
function uxnitro_disable_jquery_migrate( $scripts ) {
	if ( uxnitro_get_setting( 'disable_jquery_migrate', false ) ) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$scripts->registered['jquery']->deps = array_diff(
				$scripts->registered['jquery']->deps,
				array( 'jquery-migrate' )
			);
		}
	}
	return $scripts;
}
add_filter( 'wp_default_scripts', 'uxnitro_disable_jquery_migrate' );

/**
 * Disable Font Awesome
 */
function uxnitro_disable_font_awesome() {
	if ( uxnitro_get_setting( 'disable_font_awesome', false ) ) {
		// Remove Font Awesome stylesheets (various handles used by plugins)
		$fa_handles = array(
			'font-awesome',
			'fontawesome',
			'fa-style',
			'font-awesome-5',
			'font-awesome-6',
			'fa-free',
			'fa-pro',
			'elementor-icons-fa5',
			'elementor-icons-fa-solid',
			'elementor-icons-fa-brands',
		);
		
		foreach ( $fa_handles as $handle ) {
			wp_dequeue_style( $handle );
			wp_deregister_style( $handle );
		}
		
		// Remove inline Font Awesome CSS
		add_action( 'wp_print_styles', function() {
			global $wp_styles;
			if ( ! is_a( $wp_styles, 'WP_Styles' ) ) {
				return;
			}
			
			foreach ( $wp_styles->registered as $handle => $style ) {
				if ( strpos( $handle, 'font-awesome' ) !== false || strpos( $handle, 'fa-' ) !== false ) {
					wp_dequeue_style( $handle );
				}
			}
		}, 100 );
	}
}
add_action( 'wp_enqueue_scripts', 'uxnitro_disable_font_awesome', 100 );
