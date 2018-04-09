<?php
/**
 * Add a TinyMCE button to create [sonaria_button] Shortcodes
 *
 * @since   {{VERSION}}
 * @package Sonaria_Theme_2018
 * @subpackage  Sonaria_Theme_2018/library/admin/tinymce
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add Button Shortcode to TinyMCE
 *
 * @since       {{VERSION}}
 * @return      void
 */
add_action( 'admin_init', 'add_sonaria_button_tinymce_filters' );
function add_sonaria_button_tinymce_filters() {
    
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        
        add_filter( 'mce_buttons', function( $buttons ) {
            array_push( $buttons, 'sonaria_button_shortcode' );
            return $buttons;
        } );
        
        // Attach script to the button rather than enqueueing it
        add_filter( 'mce_external_plugins', function( $plugin_array ) {
            $plugin_array['sonaria_button_shortcode_script'] = get_stylesheet_directory_uri() . '/dist/assets/js/tinymce/sonaria-button.js';
            return $plugin_array;
        } );
        
    }
    
}

/**
 * Add Localized Text for our TinyMCE Button
 *
 * @since       {{VERSION}}
 * @return      Array Localized Text
 */
add_filter( 'sonaria_tinymce_l10n', 'sonaria_button_tinymce_l10n' );
function sonaria_button_tinymce_l10n( $l10n ) {
    
    $l10n['sonaria_button_shortcode'] = array(
        'tinymce_title' => _x( 'Add Button', 'Button Shortcode TinyMCE Button Text', 'sonaria-theme-2018' ),
        'button_text' => array(
            'label' => _x( 'Button Text', "Button's Text", 'sonaria-theme-2018' ),
        ),
        'button_url' => array(
            'label' => _x( 'Button Link', 'Link for the Button', 'sonaria-theme-2018' ),
        ),
        'colors' => array(
            'label' => _x( 'Color', 'Button Color Selection Label', 'sonaria-theme-2018' ),
            'default' => 'secondary',
            'choices' => array(
                'primary' => _x( 'Blue', 'Primary Theme Color', 'sonaria-theme-2018' ),
                'secondary' => _x( 'Orange', 'Secondary Theme Color', 'sonaria-theme-2018' ),
				'tertiary' => _x( 'Green', 'Tertiary Theme Color', 'sonaria-theme-2018' ),
            ),
        ),
        'size' => array(
            'label' => _x( 'Size', 'Button Size Selection Lable', 'sonaria-theme-2018' ),
            'default' => '',
            'choices' => array(
				'' => _x( 'Default', 'Default Button Size', 'sonaria-theme-2018' ),
                'tiny' => _x( 'Tiny', 'Tiny Button Size', 'sonaria-theme-2018' ),
                'small' => _x( 'Small', 'Small Button Size', 'sonaria-theme-2018' ),
                'medium' => _x( 'Medium', 'Medium Button Size', 'sonaria-theme-2018' ),
                'large' => _x( 'Large', 'Large Button Size', 'sonaria-theme-2018' ),
            ),
        ),
        'hollow' => array(
            'label' => _x( 'Hollow/"Ghost" Button?', 'Hollow Button Style', 'sonaria-theme-2018' ),
        ),
        'expand' => array(
            'label' => _x( 'Full Width?', 'Full Width Button', 'sonaria-theme-2018' ),
        ),
        'new_tab' => array(
            'label' => __( 'Open Link in a New Tab?', 'sonaria-theme-2018' ),
        ),
    );
    
    return $l10n;
    
}