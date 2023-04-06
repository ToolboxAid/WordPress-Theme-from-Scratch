<?php

// Define a global boolean variable
global $debug_page;
$debug_page = true;

function debug_location($location) {
    global $debug_page; // Use the global variable inside the function

    if ($debug_page) { // Only display the location if debug_page is true
		echo '<div style="position: absolute; left: 0px; top: 280px; color: Yellow; font-weight: bold; font-style: italic; font-size: 26px;">' . $location . '</div>';
    }
}

////////////////////////////////////////////////////////////////
/* Seperate control files for Header, Body, & Footer sections */
////////////////////////////////////////////////////////////////
require_once('ctl-header-social.php');
require_once('ctl-header-title.php');
require_once('ctl-header-nav.php');
require_once('ctl-header-nav-sub.php');
require_once('ctl-header-breadcrumbs.php');
require_once('ctl-main-content.php');
require_once('ctl-main-sidebar.php');
require_once('ctl-footer-nav.php');
require_once('ctl-footer-star.php');
require_once('ctl-footer-copyright.php');

//////////////
/* Resource */
//////////////
function script_resources() {	
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'script_resources');

/////////////////
/* Theme setup */
/////////////////
function my_theme_setup()
{
	// Navigation Menus
	register_nav_menus(array(
		'header' => __( 'Header Menu'),
		'footer1' => __( 'Footer Menu 1'),
		'footer2' => __( 'Footer Menu 2'),
		'footer3' => __( 'Footer Menu 3'),
		'footer4' => __( 'Footer Menu 4'),
	));

	// Add feature image support
	add_theme_support('post-thumbnails');
 	add_image_size('small-thumbnail', 180, 120, true);  //true forces aspect ratio
// 	add_image_size('square-thumbnail', 80, 80, true);	
	add_image_size('banner-image', 920, 210, true);	
//	add_image_size('banner-image', 920, 210, 'left', 'top'); crop location

	// Add post type support
	//add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}
add_action('after_setup_theme', 'my_theme_setup');

/////////////////////////////////////////
/* Customize excerpt word count length */
/////////////////////////////////////////
function custom_excerpt_length() {
	return 35;
}
add_filter('excerpt_length', 'custom_excerpt_length');

/* ******************************************************************************************* */
/* ******************************************************************************************* */
/* ******************************************************************************************* */


//////////////////////
// Add Widget Areas //
//////////////////////
function ourWidgetsInit() {
	
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	
	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));	
}
add_action('widgets_init', 'ourWidgetsInit');


?>