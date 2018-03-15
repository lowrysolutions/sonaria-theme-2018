<?php
/**
 * Tracking scripts like Google Tag Manaager
 *
 * @package Sonaria_Theme_2018
 * @since {{VERSION}}
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Replace Rev Slider shortcode with our Wrapper
remove_shortcode( 'rev_slider', 'rev_slider_shortcode' );
add_shortcode( 'rev_slider', 'sonaria_revslider_ie_fallback' );

/**
 * Override the Rev Slider shortcode with this wrapper to force the fallback on all IE versions, including Edge
 * 
 * @param		array  $atts    Shortcode Atts
 * @param		string $content Shortcode Content
 *                        
 * @since		{{VERSION}}
 * @return		string Shortcode Output
 */
function sonaria_revslider_ie_fallback( $atts, $content ) {

	if ( sonaria_detect_ie() ) {
		
		$atts = shortcode_atts(
			array( // a few default values
				'alias' => '',
				'settings' => '',
				'order' => '',
			),
			$atts,
			'rev_slider'
		);

		if ( $atts['settings'] !== '' ) $atts['settings'] = json_decode( str_replace( array( '({', '})', "'" ), array( '[', ']', '"' ), $atts['settings'] ), true );
		if ( $atts['order'] !== '' ) $atts['order'] = explode( ',', $atts['order'] );

		$sliderAlias = ( $atts['alias'] != '' ) ? $atts['alias'] : RevSliderFunctions::getVal( $atts, 0 );
		
		$slider = new RevSliderSlider();
		$slider->initByAlias( $sliderAlias );

		$show_alternate_image = $slider->getParam( "show_alternate_image", "" );
		
		// Fallback for the Fallback
		if ( ! $show_alternate_image ) return rev_slider_shortcode( $atts, $content );
		
		return '<img class="tp-slider-alternative-image" src="' . $show_alternate_image . '" data-no-retina>';

	}
	else {
		
		// Run the regular shortcode
		return rev_slider_shortcode( $atts, $content );
		
	}

}