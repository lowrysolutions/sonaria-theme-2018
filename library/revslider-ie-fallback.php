<?php
/**
 * Tracking scripts like Google Tag Manaager
 *
 * @package Sonaria_Theme_2018
 * @since {{VERSION}}
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'do_shortcode_tag', 'sonaria_revslider_ie_fallback', 10, 4 );

/**
 * Force the saved Fallback for Revslider to always show for all IE versions
 * 
 * @param		string $output            Shortcode Output
 * @param		string $tag               Shortcode Tag
 * @param		array  $args              Shortcode Args
 * @param		array  $regex_match_array Regex Match Array
 *                                               
 * @since		{{VERSION}}
 * @return		string Shortcode Output
 */
function sonaria_revslider_ie_fallback( $output, $tag, $args, $regex_match_array ) {

	if ( $tag == 'revslider' && 
		sonaira_detect_ie() ) {

		extract( shortcode_atts( array( 'alias' => '' ), $args, 'rev_slider' ) );
		extract( shortcode_atts( array( 'settings' => '' ), $args, 'rev_slider' ) );
		extract( shortcode_atts( array( 'order' => '' ), $args, 'rev_slider' ) );

		if ( $settings !== '' ) $settings = json_decode( str_replace( array( '({', '})', "'" ), array( '[', ']', '"' ), $settings ), true );
		if ( $order !== '' ) $order = explode( ',', $order );

		$sliderAlias = ( $alias != '' ) ? $alias : RevSliderFunctions::getVal( $args, 0 );

		$gal_ids = RevSliderFunctionsWP::check_for_shortcodes( $mid_content ); // check for example on gallery shortcode and do stuff

		if ( ! empty( $gal_ids ) ) { // add a gallery based slider
			$slider = RevSliderOutput::putSlider( $sliderAlias, '', $gal_ids );
		}
		else {
			$slider = RevSliderOutput::putSlider( $sliderAlias, '', array(), $settings, $order );
		}

		$show_alternate_image = $slider->getParam( "show_alternate_image", "" );
		
		// Fallback for the Fallback
		if ( ! $show_alternate_image ) return $output;
		
		return '<img class="tp-slider-alternative-image" src="' . $show_alternate_image . '" data-no-retina>';

	}

	return $output;

}