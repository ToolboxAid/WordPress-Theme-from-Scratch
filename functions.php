<?php

/* Seperate control files for Header, Body, Footer */
require_once('ctl-header.php');
require_once('ctl-header-social.php');
require_once('ctl-header-title.php');



require_once('controls-for-test.php');
require get_template_directory() . '/customizer.php';
$typography_header_title = new PersonalTypography('typography_hdr_title', 'Typography Header Title', 0);
$customizer_settings1 = new PersonalTypography('personal_typography1', 'Personal Typography 1', 191);
$customizer_settings2 = new PersonalTypography('personal_typography2', 'Personal Typography 2', 292);
$customizer_settings3 = new PersonalTypography('personal_typography3', 'Personal Typography 3', 393);
$customizer_settings4 = new PersonalTypography('personal_typography4', 'Personal Typography 4', 494);
/**/



/* Resource */
function script_resources() {	
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'script_resources');

/* Theme setup */
function my_theme_setup()
{
	// Navigation Menus
	register_nav_menus(array(
		'header' => __( 'Header Menu'),
		'footer' => __( 'Footer Menu'),
	));

	// Add feature image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);// true forces aspect ratio
	add_image_size('square-thumbnail', 80, 80, true);	
	add_image_size('banner-image', 920, 210, true);	
//	add_image_size('banner-image', 920, 210, 'left', 'top'); crop location

	// Add post type support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'my_theme_setup');

?>