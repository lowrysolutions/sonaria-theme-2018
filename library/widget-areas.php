<?php
/**
 * Register widget areas
 *
 * @package Sonaria_Theme_2018
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
		'id' => 'sidebar-widgets',
		'name' => __( 'Sidebar widgets', 'sonaria-theme-2018' ),
		'description' => __( 'Drag widgets to this sidebar container.', 'sonaria-theme-2018' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));

	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => __( 'Footer widgets', 'sonaria-theme-2018' ),
		'description' => __( 'Drag widgets to this footer container', 'sonaria-theme-2018' ),
		'before_widget' => '<div id="%1$s" class="small-12 columns widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
