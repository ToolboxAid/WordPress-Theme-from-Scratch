

<?php
/*
Template Name: Single Workout
Template Post Type: post
*/

/* Page is used for posts of type page */
get_header();

debug_location("Single-workout"); ?>

<div class="content-column"> <?php
//======================================================================
//======================================================================
//======================================================================

// Get database connection details from wp-config.php
// Get the path to the wp-config.php file
// Define the absolute path to the WordPress directory
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

// Get the path to wp-config.php file
$wp_config_path = ABSPATH . 'wp-config.php';
//echo $wp_config_path;

// Include the wp-config.php file
require_once($wp_config_path);

// Create a new connection to the database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if (!$conn) {
    //die('Could not connect to the database: ' . mysqli_connect_error());
    die('Could not connect to the database.');
} else {
    //echo 'Connection successful, do something with $conn';
}


/*   equipment_group */
// Execute the SQL query to select distinct values from the 'equipment_group' custom field
$query = "SELECT DISTINCT meta_value FROM wp_postmeta WHERE meta_key = 'equipment_group'  ORDER BY meta_value ASC"; // selects only equipment types in use
$result = mysqli_query($conn, $query);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and create a checkbox for each value
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        // echo $row['meta_value'] . ', ';
        if ($row['meta_value']  !== 'N/A' && $row['meta_value']  !== '*other*') {
            echo '<li>';
            echo '<input type="checkbox" name="equipment_group[]" value="' . $row['meta_value'] . '"> ' . $row['meta_value'] . '<br>';
            echo '</li>';        
        }
    }
    echo "</ul>";
} else {
    echo 'No values found for custom field.';
}



// Get the database table prefix
global $table_prefix;
$prefix = $table_prefix;

// Execute the SQL query
$query = "SELECT DISTINCT `ID`, `post_title`, `post_type`
FROM {$prefix}posts
INNER JOIN {$prefix}postmeta ON {$prefix}posts.ID = {$prefix}postmeta.post_id
INNER JOIN {$prefix}term_relationships ON {$prefix}posts.ID = {$prefix}term_relationships.object_id
INNER JOIN {$prefix}term_taxonomy ON {$prefix}term_relationships.term_taxonomy_id = {$prefix}term_taxonomy.term_taxonomy_id
INNER JOIN {$prefix}terms ON {$prefix}term_taxonomy.term_id = {$prefix}terms.term_id
WHERE {$prefix}posts.post_type = 'post'
AND {$prefix}posts.post_status = 'publish'
AND {$prefix}postmeta.meta_key = 'workout_type'
AND {$prefix}postmeta.meta_value = 'Exercise'
AND EXISTS (
    SELECT 1
    FROM {$prefix}postmeta
    WHERE {$prefix}postmeta.post_id = {$prefix}posts.ID
        AND {$prefix}postmeta.meta_key = 'equipment_group'
        AND {$prefix}postmeta.meta_value = 'Barbell'
) 
AND EXISTS (
    SELECT 1
    FROM {$prefix}postmeta
    WHERE {$prefix}postmeta.post_id = {$prefix}posts.ID
        AND {$prefix}postmeta.meta_key = 'body_group'
        AND {$prefix}postmeta.meta_value = 'Chest'
) 
ORDER BY RAND()
LIMIT 1";


$result = mysqli_query($conn, $query);

// Check for errors in query execution
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and display them
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<h2>' . $row['post_title'] . '</h2>';
    }
} else {
    echo 'No posts found.';
}

// Close the database connection
mysqli_close($conn);



//======================================================================
//======================================================================
//======================================================================
if (have_posts()) :
	while (have_posts()) : the_post(); ?>

    <!-- post-thumbnail -->
    <article class="post image-container has-thumbnail">
        <h2><?php the_title(); ?></h2>
        <div id="content-container">
            <p class="post-info">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php the_time(' F jS, Y '); ?>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <?php the_time(' g:i A '); 
                    echo '<i class="fa fa-user" aria-hidden="true"></i> ';
                    if (get_the_author_meta('display_name')) {
                    $display_name = get_the_author_meta('display_name');
                    echo $display_name; 
                } else {
                    $current_user = wp_get_current_user();
                    $user_nickname = get_user_meta($current_user->ID, 'nickname', true);
                    echo $user_nickname;
                } ?>
                
                <i class="fa fa-gear fa-spin" aria-hidden="true"></i> Categories: <?php
                $categories = get_the_category();
                $separator = ", ";
                $output = '';
                
                if ($categories) {				
                    foreach ($categories as $category) {				
                        $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>'  . $separator;
                    }				
                    echo trim($output, $separator);
                } ?>
            </p>
            <div class="tba-message tba-warn">
                <p>
                    <i class="fa fa-exclamation-triangle"></i>
                    <i>Talk to your doctor.</i>&nbsp; 
                    Caution and common sense should be used...as these are my experiences, and my unique situations.&nbsp; 
                    They may work for you or they may not.&nbsp; 
                    You may have different results.&nbsp; Please read our 
                    <a href="/legal_pages/disclaimer/">disclaimer</a>.
                </p>
            </div> <?php
                    $workout_type = get_post_meta( get_the_ID(), 'workout_type', true );
                    if ( $workout_type ) {
                        echo '<p><h3 style="display: inline;">Type: </h3>' . esc_html( $workout_type ) . '</p>';
                    }
                    $equipment = get_post_meta( get_the_ID(), 'equipment_group', true );
                    if ( $equipment ) {
                        echo '<p><h3 style="display: inline;">Equipment: </h3>' . esc_html( $equipment ) . '</p>';
                    }

the_content(); ?>
            <div id="exercise_container" style="display: flex;">
                <div id="exercise_data" style="    flex: 1; width: 65%;">
                <?php
                    $body = get_post_meta( get_the_ID(), 'body_group', true );
                    if ( $body ) {
                        echo '<p><h3 style="display: inline;">Body Group: </h3>' . esc_html( $body ) . '</p>';
                    }

                    $muscle_group = get_post_meta( get_the_ID(), 'muscle_group', true );
                    if ( ! empty( $muscle_group ) ) {
                        echo '<p><h3 style="display: inline;">Muscle Group(s): </h3>';
                        echo implode( ', ', array_map( 'esc_html', $muscle_group ) ) . '</p>';
                    } ?>

                    <h3>Muscles used:</h3>           
                    <div class="muscle-groups" style="padding-left:30px;">
                    <?php if ( $primary_muscle_group = get_post_meta( get_the_ID(), 'primary_muscle_group', true ) ) : ?>
                    <p style="display: inline;"><strong>Primary:</strong> </p><?php echo esc_html( $primary_muscle_group ); ?><br>
                    <?php endif; ?>

                    <?php if ( $secondary_muscle_group = get_post_meta( get_the_ID(), 'secondary_muscle_group', true ) ) : ?>
                    <p style="display: inline;"><strong>Secondary:</strong></p> <?php echo esc_html( $secondary_muscle_group ); ?><br>
                    <?php endif; ?>

                    <?php if ( $tertiary_muscle_group = get_post_meta( get_the_ID(), 'tertiary_muscle_group', true ) ) : ?>
                    <p style="display: inline;"><strong>Tertiary:</strong></p> <?php echo esc_html( $tertiary_muscle_group ); ?><br>
                    <?php endif; ?>
                </div> <?php               
                $difficulty_group = get_post_meta( get_the_ID(), 'difficulty_group', true );
                if ( ! empty( $difficulty_group ) ) {
                    echo '<p><h3 style="display: inline;">Difficulty: </h3>';
                    echo implode( ', ', array_map( 'esc_html', $difficulty_group ) ) . '</p>';
                } ?>
            </div>
            <div id="exercise_image" style="margin-left: 20px; width: 35%;">
            <div class="image"></div>
            </div> <?php

            $image_name = get_post_meta( get_the_ID(), 'image_name', true );
            $image_across = get_post_meta( get_the_ID(), 'image_across', true );
            $image_down = get_post_meta( get_the_ID(), 'image_down', true );

            $uploads_dir = wp_upload_dir();
            $exercises_dir = $uploads_dir['basedir'] . '/tba/exercises';
            $file_path = $exercises_dir . '/' . $image_name . '.properties';

            if (file_exists($file_path)) {
                $props = parse_ini_file($file_path);// get the values for the properties                        
                $offsetX = intval($props['offsetX']);
                $offsetY = intval($props['offsetY']);
                $topLeftX  = 0; //intval($props['topLeftX']);
                $topLeftY  = 0; // intval($props['topLeftY']);
                $bottomRightX  = intval($props['bottomRightX']);
                $bottomRightY  = intval($props['bottomRightY']);
                $imagesX  = intval($props['imagesX']);
                $imagesY  = intval($props['imagesY']); 
                
                $imageW = intval( ( ( $bottomRightX - $offsetX )  /  $imagesX) );
                $imageH = intval( ( ( $bottomRightY - $offsetY )  /  $imagesY) );
                $imageX = $offsetX + ($image_across * $imageW);// Across X
                $imageY = $offsetY + ($image_down * $imageH);// Down Y

                // echo "A: " . $image_across . "<br>";
                // echo "D: " . $image_down . "<br>";
                // echo "W: " . $imageW . "<br>";
                // echo "H: " . $imageH . "<br>";                
                // echo "X: " . $imageX . "<br>";
                // echo "Y: " . $imageY . "<br>";                                

                echo "<style>";
                    echo ".image {";
                    echo "background-image: url('/wp-content/uploads/tba/exercises/". $image_name . ".png');";
                    echo "background-position: -" . $imageX . "px -" . $imageY . "px;";
                    //echo "background-position: -120px -5px;";
                    echo "width: " . $imageW . "px;";
                    echo "height: " . $imageH . "px;";
                    echo "}";
                echo "</style>";
            } ?>

        </div> 
        <div class="tba-message tba-warn">
                <p>
                    <i class="fa fa-exclamation-triangle"></i>
                    <i>Talk to your doctor.</i>&nbsp; 
                    Caution and common sense should be used...as these are my experiences, and my unique situations.&nbsp; 
                    They may work for you or they may not.&nbsp; 
                    You may have different results.&nbsp; Please read our 
                    <a href="/legal_pages/disclaimer/">disclaimer</a>.
                </p>
            </div> <?php
        get_template_part( 'content-comments' );  ?>
	</article>
<?php

	endwhile;	

	// Previous/next post navigation.
	get_template_part( 'content-pagination-post' );  
     
else : 
	get_template_part('content-sorry');
endif; ?>

</div>

<?php
get_sidebar();

get_footer();
?>