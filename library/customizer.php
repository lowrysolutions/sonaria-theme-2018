<?php
/**
 * Customizer Additions
 *
 * @since   {{VERSION}}
 * @package Sonaria_Theme_2018
 * @subpackage Sonaria_Theme_2018/library
 */

add_action( 'customize_register', function( $wp_customize ) {
    
    // Global Script Options
    $wp_customize->add_section( 'sonaria_settings' , array(
            'title'      => __( 'Sonaria Settings', 'sonaria-theme-2018' ),
            'priority'   => 30,
        ) 
    );
    
    $wp_customize->add_setting( 'sonaria_phone_number', array(
            'default'     => '',
            'transport'   => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sonaria_phone_number', array(
        'type' => 'text',
        'label'        => __( 'Phone Number', 'sonaria-theme-2018' ),
        'section'    => 'sonaria_settings',
        'settings'   => 'sonaria_phone_number',
    ) ) );
    
} );