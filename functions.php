<?php

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
require_once('ctl-footer-line.php');
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


///////////////////////////////////////////
/* Menu items setup for parent / child ? */
///////////////////////////////////////////

/* Get top ancestor ID */
function get_top_ancestor_id() {
	
	global $post;	
	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];		
	}	
	return $post->ID;	
}

/* Does page have children? */
function has_children() {	
	global $post;	
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);	
}

?>