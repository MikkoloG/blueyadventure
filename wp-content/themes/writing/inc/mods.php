<?php
/**
 * Functions used to implement options
 *
 * @package Customizer Library Demo
 */

/**
 * Enqueue Google Fonts Example
 */
function demo_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'asalah_logo_font_type'),
		get_theme_mod( 'asalah_main_font_type'),
		get_theme_mod( 'asalah_tagline_font_type'),
		get_theme_mod( 'asalah_head_font_type'),
		get_theme_mod( 'asalah_blog_font_type'),
		get_theme_mod('asalah_menu_font_type'),
		get_theme_mod('asalah_bloglist_title_font_type'),
		get_theme_mod('asalah_blogsingle_title_font_type'),
		get_theme_mod('asalah_metainfo_font_type'),
		get_theme_mod('asalah_widgettitle_font_type'),
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'demo_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'demo_fonts' );