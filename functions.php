<?php
/**
 * Author: Eric Defore
 * URL: https://realbigmarketing.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package Sonaria_Theme_2018
 * @since FoundationPress 1.0.0
 */

$theme_header = wp_get_theme();

define( 'THEME_VER', $theme_header->get( 'Version' ) );
define( 'THEME_URL', get_stylesheet_directory_uri() );
define( 'THEME_DIR', get_stylesheet_directory() );

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

/**
 * Determine if we're on Live or Staging
 * 
 * @since {{VERSION}}
 * @return boolean Live (True) or Staging (False)
 */
function sonaria_is_live_site() {
	
	$site_url = site_url();
	
	if ( strpos( $site_url, 'staging' ) === false ) return true;
	
	return false;
	
}

/**
 * Return the Version Number for IE. False if not IE.
 * Based on https://codepen.io/gapcode/pen/vEJNZN
 *
 * @since        {{VERSION}}
 * @return       int|boolean IE Version Number. False if not IE
 */
function sonaria_detect_ie() {

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	// Return the Version Number for IE 10 and Older
	$msie = strpos( $user_agent, 'MSIE ' );
	if ( $msie !== false ) {
		return (int) substr( $user_agent, $msie + 5, strpos( $user_agent, '.', $msie ) );
	}

	// Return the Version Number for IE 11
	$trident = strpos( $user_agent, 'Trident/' );
	if ( $trident !== false ) {

		$rv = strpos( $user_agent, 'rv:' );

		return (int) substr( $user_agent, $rv + 3, strpos( $user_agent, '.', $rv ) );

	}

	// Return the Version Number for Edge, AKA IE 12+
	$edge = strpos( $user_agent, 'Edge/' );
	if ( $edge !== false ) {
		return (int) substr( $user_agent, $edge + 5, strpos( $user_agent, '.', $edge ) );
	}

	// Not IE
	return false;

}

if ( sonaria_is_live_site() ) : 

	// Includes Google Tag Manager and other stuff we do not necessarily want on Staging
	require_once( 'library/tracking-scripts.php' );

endif;

if ( function_exists( 'rev_slider_shortcode' ) ) {

	// Force Revslider to use the Fallback for IE
	require_once( 'library/revslider-ie-fallback.php' );
	
}