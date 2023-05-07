<?php

// Define a global variables
global $debug_page;
$debug_page = false;

function debug_location($location) {
    global $debug_page; // Use the global variable inside the function

    if ($debug_page) { // Only display the location if debug_page is true
		echo '<div style="position: absolute; left: 0px; top: 280px; color: Yellow; font-weight: bold; font-style: italic; font-size: 26px;">' . $location . '</div>';
    }
}

////////////////////////////////////////////////////////////////
/* Seperate control files for Header, Body, & Footer sections */
////////////////////////////////////////////////////////////////
require_once('ctl-header-order.php');
require_once('ctl-header-social.php');
require_once('ctl-header-title.php');
require_once('ctl-header-title-tagline.php');
require_once('ctl-header-nav.php');
require_once('ctl-header-breadcrumbs.php');

require_once('ctl-main-content.php');
require_once('ctl-main-pagination.php');
require_once('ctl-main-code.php');

require_once('ctl-footer-nav.php');
require_once('ctl-footer-star.php');
require_once('ctl-footer-copyright.php');
require_once('ctl-footer-top.php');

//require_once('function-exercise.php');

//////////////
/* Resource */
//////////////
function my_enqueue_css() {	
	wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_enqueue_css');


function my_enqueue_scripts() {
	// echo get_template_directory_uri() . '/assets/js/javascript.js';
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/assets/js/javascript.js', array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );


// function custom_exercise_pagination( $query ) {
// 	if ( is_admin() || ! $query->is_main_query() ) {
// 	  return;
// 	}
  
// 	if ( is_category( 'exercise' ) ) {
// 	  $query->set( 'posts_per_page', 3 );
// 	}
//   }
//   add_action( 'pre_get_posts', 'custom_exercise_pagination' );
/////////////////
/* Theme setup */
/////////////////
function my_theme_setup()
{
	// Navigation Menus
	register_nav_menus(array(
		'header' =>  __( 'Header Menu'),
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
	return 50;
}
add_filter('excerpt_length', 'custom_excerpt_length');


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



/* ************************ */
// Usage: [image_container src="http://path-to-image" width="100" height="100"]
// Define the shortcode function
function image_container_shortcode($atts) {
	// Extract the shortcode attributes
	extract(shortcode_atts(array(
	  'src' => '',
	  'width' => '200',
	  'height' => '200',
	), $atts));
	
	// Set the image URL to use HTTPS instead of HTTP
	$src = str_replace('http://', 'https://', $src);
  
	// Build the HTML for the image container
	//width:' . $width . 'px; height:' . $height . 'px;
	$html = '<div class="image-container-no-overflow ">';
	$html .= '<div class="image-hover-zoom-rotate" style="background-image:url(' . $src . ');"></div>';
	$html .= '</div>';

	// Return the HTML
	return $html;
  }
  // Register the shortcode
  add_shortcode('image_container', 'image_container_shortcode');
// Usage: [image_container src="http://path-to-image" width="100" height="100"]

/* ************************ */
// Usage:  [iconAF name="fa-solid fa-coffee fa-3x"].
// Define the shortcode function for awesome font
function awesome_font_icon_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'name'   => '',
        'prefix' => 'fa',
    ), $atts );

    $icon = '<i class="' . esc_attr( $atts['prefix'] ) . ' ' . esc_attr( $atts['name'] ) . '"></i>';

    return $icon;
}
add_shortcode( 'iconAF', 'awesome_font_icon_shortcode' );


/* ************************ */
/* To prevent an administrator from
   creating posts and pages in WordPress,
   you can use this code snippet. */
function remove_admin_post_types() {
	if ( current_user_can( 'administrator' ) ) {
		remove_menu_page( 'edit.php' );                // removes Posts
		remove_menu_page( 'edit.php?post_type=page' ); // removes Pages
		remove_menu_page('edit-comments.php');         // remove "Comments" menu item
		remove_menu_page( 'upload.php' ); 
	}
}
//add_action( 'admin_menu', 'remove_admin_post_types', 999 );

add_filter( 'upload_mimes', 'custom_upload_mimes' );
function custom_upload_mimes( $mime_types ) {
    // Add .properties file type
    $mime_types['properties'] = 'text/plain';
    
    // Add .js file type
    $mime_types['js'] = 'application/javascript';
    
    // Add .css file type
    $mime_types['css'] = 'text/css';
    
    // Add .html file type
    $mime_types['html'] = 'text/html';
    
    return $mime_types;
}
add_filter( 'upload_mimes', 'custom_upload_mimes' );

// Nothing below here.  I must be last
?>