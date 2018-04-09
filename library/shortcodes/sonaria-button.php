<?php
/**
 * Adds the [sonaria_button] shortcode
 *
 * @since   {{VERSION}}
 * @package Sonaria_Theme_2018
 * @subpackage  Sonaria_Theme_2018/library/shortcodes
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add Button Shortcode
 *
 * @since       {{VERSION}}
 * @return      HTML
 */
add_shortcode( 'sonaria_button', 'add_sonaria_button_shortcode' );
function add_sonaria_button_shortcode( $atts, $content = '' ) {
    
    $atts = shortcode_atts(
        array( // a few default values
            'url' => '#',
            'color' => 'secondary',
            'size' => '',
            'hollow' => 'false',
            'expand' => 'false',
            'new_tab' => 'false',
        ),
        $atts,
        'sonaria_button'
    );
    
    ob_start();
    
    if ( ( strpos( $atts['url'], '#' ) !== 0 ) && 
        ( strpos( $atts['url'], 'http' ) !== 0 ) && 
        ( strpos( $atts['url'], '/' ) !== 0 ) 
    ) :
        $atts['url'] = '//' . $atts['url'];
    endif;
    ?>

    <a href="<?php echo $atts['url']; ?>" class="<?php echo $atts['color'] . ' ' . $atts['size'] . ' button' . ( strtolower( $atts['hollow'] == 'true' ) ? ' hollow' : '' ) . ( strtolower( $atts['expand'] == 'true' ) ? ' expanded' : '' ); ?>" target="<?php echo ( strtolower( $atts['new_tab'] ) == 'true' ? '_blank' : '_self' ); ?>"><?php echo $content; ?></a>

    <?php
    
    $output = ob_get_contents();
    ob_end_clean();
    
    return html_entity_decode( $output );
    
}