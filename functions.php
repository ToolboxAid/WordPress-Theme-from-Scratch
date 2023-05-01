<?php

// Define a global variables
global $version;
$version = "1.0.13";

global $debug_page;
$debug_page = true;

function debug_location($location) {
    global $debug_page; // Use the global variable inside the function

    if ($debug_page) { // Only display the location if debug_page is true
		echo '<div style="position: absolute; left: 0px; top: 280px; color: Yellow; font-weight: bold; font-style: italic; font-size: 26px;">' . $location . '</div>';
    }
}


function get_version() {
	global $version; // Use the global variable inside the function
	echo $version;
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
// Usage:  [icon47 name="fa-solid fa-coffee fa-3x"].
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









/* be sure perma links are set to */
/*    /%category%/%postname%/     */
function create_exercise_post_type() {
    register_post_type( 'exercise',
        array(
            'labels' => array(
                'name' => __( 'Exercises' ),
                'singular_name' => __( 'Exercise' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array('slug' => 'exercises'),
        )
    );
}
add_action( 'init', 'create_exercise_post_type' );

function add_exercise_meta_boxes() {

	add_meta_box(
        'equipment_group',
        'Equipment Group',
        'equipment_group_callback',
        'exercise',
        'normal',
        'default'
    );	

    add_meta_box(
        'body_group',
        'Body Group',
        'body_group_callback',
        'exercise',
        'normal',
        'default'
    );

    add_meta_box(
        'muscle_group',
        'Muscle Group',
        'muscle_group_callback',
        'exercise',
        'normal',
        'default'
    );

	add_meta_box(
		'primary_muscle_group',
		'Primary Muscle Group',
		'primary_muscle_group_callback',
		'exercise',
		'normal',
		'default'
	);

	add_meta_box(
		'secondary_muscle_group',
		'Secondary Muscle Group',
		'secondary_muscle_group_callback',
		'exercise',
		'normal',
		'default'
	);

	add_meta_box(
		'tertiary_muscle_group',
		'Tertiary Muscle Group',
		'tertiary_muscle_group_callback',
		'exercise',
		'normal',
		'default'
	);

	add_meta_box(
        'difficulty_group',
        'Difficulty Group',
        'difficulty_group_callback',
        'exercise',
        'normal',
        'default'
    );	


}
add_action( 'add_meta_boxes', 'add_exercise_meta_boxes' );

function equipment_group_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'equipment_group_nonce' );
    $equipment_group = get_post_meta( $post->ID, 'equipment_group', true );
    $equipment_list = array( 'Barbell', 'Body Weight', 'Dumbbell', 'Exercise Ball', 'Flexibility', 'Kettlebell', 'Resistance Band',  'Suspention',  'Strength',  'Stretch', 'Warm-up', 'Yoga' );
    echo '<p>Select Equipment Group:</p>';
    foreach ($equipment_list as $option) {
        $checked = ($option == $equipment_group) ? 'checked' : '';
        echo '<input type="radio" name="equipment_group" value="' . esc_attr( $option ) . '" ' . $checked . '> ' . ucfirst($option) . '   <->   ';
    }
}

function body_group_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'body_group_nonce' );
    $body_group = get_post_meta( $post->ID, 'body_group', true );
    $equipment_list = array( 'Abs (core)', 'Arms', 'Back', 'Cardio', 'Chest', 'Legs', 'Sholders', 'Stretch', 'Warm-up' );
    echo '<p>Select Body Group:</p>';
    foreach ($equipment_list as $option) {
        $checked = ($option == $body_group) ? 'checked' : '';
        echo '<input type="radio" name="body_group" value="' . esc_attr( $option ) . '" ' . $checked . '> ' . ucfirst($option) . '   <->   ';
    }
}

function muscle_group_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'muscle_group_nonce' );
    $muscle_group = get_post_meta( $post->ID, 'muscle_group', true );
    $equipment_list = array( 'Abdominals', 'Biceps', 'Back Upper', 'Back Middle', 'Back Lower', 'Calves', 'Chest', 'Deltoid', 
							'Forearm','Glutes', 'Hamstring', 'Heart', 'Lungs', 'Quadriceps', 'Side Abs', 'Triceps');
    echo '<p>Select Muscle Group:</p>';
    foreach ($equipment_list as $option) {
        $checked = ($option == $muscle_group) ? 'checked' : '';
        echo '<input type="radio" name="muscle_group" value="' . esc_attr( $option ) . '" ' . $checked . '> ' . ucfirst($option) . '   <->   ';
    }
}

function primary_muscle_group_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'primary_muscle_group_nonce' );
	$primary_muscle_group = get_post_meta( $post->ID, 'primary_muscle_group', true );
	echo '<p><label for="primary_muscle_group_field">Primary Muscle Group:</label></p>';
	echo '<input type="text" id="primary_muscle_group_field" name="primary_muscle_group" value="' . esc_attr( $primary_muscle_group ) . '">';
}

function secondary_muscle_group_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'secondary_muscle_group_nonce' );
	$secondary_muscle_group = get_post_meta( $post->ID, 'secondary_muscle_group', true );
	echo '<p><label for="secondary_muscle_group_field">Secondary Muscle Group:</label></p>';
	echo '<input type="text" id="secondary_muscle_group_field" name="secondary_muscle_group" value="' . esc_attr( $secondary_muscle_group ) . '">';
}

function tertiary_muscle_group_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'tertiary_muscle_group_nonce' );
	$tertiary_muscle_group = get_post_meta( $post->ID, 'tertiary_muscle_group', true );
	echo '<p><label for="tertiary_muscle_group_field">Tertiary Muscle Group:</label></p>';
	echo '<input type="text" id="tertiary_muscle_group_field" name="tertiary_muscle_group" value="' . esc_attr( $tertiary_muscle_group ) . '">';
}

function difficulty_group_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'difficulty_group_nonce' );
    $difficulty_group = get_post_meta( $post->ID, 'difficulty_group', true );
    $difficulty_list = array( 'Beginner', 'Intermediate', 'Advanced' );
    echo '<p>Select Difficulty Group:</p>';
    foreach ($difficulty_list as $option) {
        $checked = in_array($option, (array)$difficulty_group) ? 'checked' : '';
        echo '<input type="checkbox" name="difficulty_group[]" value="' . esc_attr( $option ) . '" ' . $checked . '> ' . ucfirst($option) . '   <->   ';
    }
}


function save_exercise_meta( $post_id ) {

	/******/
	if ( ! isset( $_POST['equipment_group_nonce'] ) || ! wp_verify_nonce( $_POST['equipment_group_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    $equipment_group = sanitize_text_field( $_POST['equipment_group'] );
    update_post_meta( $post_id, 'equipment_group', $equipment_group );

	/******/
    if ( ! isset( $_POST['muscle_group_nonce'] ) || ! wp_verify_nonce( $_POST['muscle_group_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    $muscle_group = sanitize_text_field( $_POST['muscle_group'] );
    update_post_meta( $post_id, 'muscle_group', $muscle_group );

	/******/
    if ( ! isset( $_POST['body_group_nonce'] ) || ! wp_verify_nonce( $_POST['body_group_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    $body_group = sanitize_text_field( $_POST['body_group'] );
    update_post_meta( $post_id, 'body_group', $body_group );

	/*******/
    // Update primary_muscle meta
	// Check if nonce is set and valid
	if ( ! isset( $_POST['primary_muscle_group_nonce'] ) || ! wp_verify_nonce( $_POST['primary_muscle_group_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}
	if ( ! isset( $_POST['secondary_muscle_group_nonce'] ) || ! wp_verify_nonce( $_POST['secondary_muscle_group_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}
	if ( ! isset( $_POST['tertiary_muscle_group_nonce'] ) || ! wp_verify_nonce( $_POST['tertiary_muscle_group_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	// Sanitize and save primary_muscle_group field data
	if ( isset( $_POST['primary_muscle_group'] ) ) {
		$primary_muscle_group = sanitize_text_field( $_POST['primary_muscle_group'] );
		update_post_meta( $post_id, 'primary_muscle_group', $primary_muscle_group );
	}

	// Sanitize and save secondary_muscle_group field data
	if ( isset( $_POST['secondary_muscle_group'] ) ) {
		$secondary_muscle_group = sanitize_text_field( $_POST['secondary_muscle_group'] );
		update_post_meta( $post_id, 'secondary_muscle_group', $secondary_muscle_group );
	}

	// Sanitize and save tertiary_muscle_group field data
	if ( isset( $_POST['tertiary_muscle_group'] ) ) {
		$tertiary_muscle_group = sanitize_text_field( $_POST['tertiary_muscle_group'] );
		update_post_meta( $post_id, 'tertiary_muscle_group', $tertiary_muscle_group );
	}	

	/******/
	if ( ! isset( $_POST['difficulty_group_nonce'] ) || ! wp_verify_nonce( $_POST['difficulty_group_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}
	$difficulty_group = (isset($_POST['difficulty_group']) && is_array($_POST['difficulty_group'])) ? array_map('sanitize_text_field', $_POST['difficulty_group']) : '';
	update_post_meta( $post_id, 'difficulty_group', $difficulty_group );
	
}
add_action( 'save_post_exercise', 'save_exercise_meta' );





// Nothing below here.  I must be last
?>