<?php

// Allow Exercise Posts to show in search
/* ***** */
function add_cpt_exercise_to_search( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array( 'post', 'page', 'exercise' ) ); // add 'exercise' to the list of post types
    }
    return $query;
}
add_filter( 'pre_get_posts', 'add_cpt_exercise_to_search' );

/* ***** */
function namespace_add_custom_types( $query ) {
    if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
      $query->set( 'post_type', array(
       'post', 'exercise'
          ));
      }
  }
  add_action( 'pre_get_posts', 'namespace_add_custom_types' );

/* ***** */
function add_cpt_exercise_to_archive_widget( $where ) {
    global $wpdb;
    $post_type = 'exercise'; // Replace with your CPT name
    $where = str_replace( "post_type = 'post'", "post_type IN ('post', '$post_type')", $where );
    return $where;
}
add_filter( 'getarchives_where', 'add_cpt_exercise_to_archive_widget' );

function add_cpt_exercise_to_archive_page( $query ) {
    // Don't modify the query if we're on the edit post list
    if ( is_admin() && $query->is_main_query() && $query->get( 'post_type' ) === 'exercise' && $GLOBALS['current_screen'] instanceof WP_Posts_List_Table ) {
        return;
    }
    
    if ( ! is_admin() && isset( $_GET['post_type'] ) && $_GET['post_type'] === 'exercise' 
        || $query->is_archive() && ! $query->is_post_type_archive( 'exercise' ) ) {
        // do something
        $post_type = 'exercise'; // Replace with your CPT name
        $query->set( 'post_type', array( 'post', $post_type ) );
    }
}
add_action( 'pre_get_posts', 'add_cpt_exercise_to_archive_page' );

/*

function add_cpt_exercise_to_calendar_widget( $post_types ) {
    $post_types[] = 'exercise';
    return $post_types;
}
add_filter( 'get_post_types', 'add_cpt_exercise_to_calendar_widget' );

function add_custom_post_types_to_calendar( $post_types ) {
    $post_types[] = 'exercise';
    return $post_types;
}
add_filter( 'get_calendar_post_types', 'add_custom_post_types_to_calendar' );


// function add_cpt_to_calendar_widget( $query ) {
//     if ( $query->is_main_query() && is_calendar() ) {
//         $post_type = 'exercise'; // Replace with your CPT name
//         $query->set( 'post_type', array( 'post', $post_type ) );
//     }
// }
// add_action( 'pre_get_posts', 'add_cpt_to_calendar_widget' );


function add_cpt_to_calendar_widget( $join ) {
    global $wpdb, $wp_query;
    if ( $wp_query->is_main_query() ) {
        $post_type = 'exercise'; // Replace with your CPT name
        $join .= " LEFT JOIN $wpdb->posts AS p2 ON (p2.post_type = '$post_type' AND YEAR(p2.post_date) = YEAR($wpdb->posts.post_date) AND MONTH(p2.post_date) = MONTH($wpdb->posts.post_date))";
        return $join;
    }
}
add_filter( 'getarchives_join', 'add_cpt_to_calendar_widget' );


 ******************************************************************************** */


/* ******************************************************************************** */
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
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'author', 'comments' ),
            'rewrite' => array('slug' => 'exercises'),
			'editor' => 'block',
            'show_in_rest' => true,
			// This is where we add taxonomies to our CPT
			'taxonomies'          => array( 'category', 'post_tag' ),			
        )
    );
}
add_action( 'init', 'create_exercise_post_type' );

function enable_gutenberg_for_exercise_post_type( $can_edit, $post_type ) {
    if ( 'exercise' === $post_type ) {
        $can_edit = true;
    }
    return $can_edit;
}
add_filter( 'use_block_editor_for_post_type', 'enable_gutenberg_for_exercise_post_type', 10, 2 );

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

/* ******************************************************************************** */
?>