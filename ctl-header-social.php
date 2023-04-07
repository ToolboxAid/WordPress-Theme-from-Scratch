<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_social_icons( $wp_customize ) {

	/* Create section */
	$wp_customize->add_section('header_social_icons', array(
		'title' => __('Header - Social Icons', 'qbytesworld_WordPress'),
		'priority' => 160,
	));

    /* ************************************************************ */
    // Add font size setting and control
    $wp_customize->add_setting( 'header_social_icons_size', array(
        'default'    => '36',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_social_icons_size', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_size',
        'label'      => __( 'Icon Font Size', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the size between the social icons.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '20',
        'max'    => '50',
        'step'   => '1',
        ),
     ) );


    /* ************************************************************ */
    // Add spacing control
    $wp_customize->add_setting( 'header_social_icons_spacing', array(
        'default'    => '0',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_social_icons_spacing_control', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_spacing',
        'label'      => __( 'Icon Spacing', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the font spacing of the social icons', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '150',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Color
	$wp_customize->add_setting('header_social_icons_color', array(
		'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_social_icons_color', array(
		'section' => 'header_social_icons',
		'settings' => 'header_social_icons_color',
		'label' => __('Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the color of the social icons', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Hover
	$wp_customize->add_setting('header_social_icons_hover', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_social_icons_hover', array(
		'section' => 'header_social_icons',
		'settings' => 'header_social_icons_hover',
		'label' => __('Hover Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the hover color of the social icons', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Background
	$wp_customize->add_setting('header_social_icons_background', array(
		'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_social_icons_background', array(
		'section' => 'header_social_icons',
		'settings' => 'header_social_icons_background',
		'label' => __('Background Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the background color of the social icons', 'qbytesworld_WordPress' ),
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Add FaceBook url
    $wp_customize->add_setting( 'header_social_icons_facebook_url', array(
        'default'           => 'https://facebook.com/#',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'header_social_icons_facebook_url', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_facebook_url',
        'label'      => __( 'FaceBook URL', 'qbytesworld_WordPress' ),
        'description'=> __( 'URL to your facebook page (leave blank to remove)', 'qbytesworld_WordPress' ),        
        'type'       => 'link',
    ) );
    /* ************************************************************ */
    // Add Instagram url
    $wp_customize->add_setting( 'header_social_icons_instagram_url', array(
        'default'           => 'https://instagram.com/#',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'header_social_icons_instagram_url', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_instagram_url',
        'label'      => __( 'Instagram URL', 'qbytesworld_WordPress' ),
        'description'=> __( 'URL to your instagram page (leave blank to remove)', 'qbytesworld_WordPress' ),        
        'type'       => 'link',
    ) );

    /* ************************************************************ */
    // Add Linked In url
    $wp_customize->add_setting( 'header_social_icons_linkedin_url', array(
        'default'           => 'https://linkedin.com/#',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'header_social_icons_linkedin_url', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_linkedin_url',
        'label'      => __( 'Linked-In URL', 'qbytesworld_WordPress' ),
        'description'=> __( 'URL to your linked-in page (leave blank to remove)', 'qbytesworld_WordPress' ),
        'type'       => 'link',

        ) );

        /* ************************************************************ */
    // Add Twitter url
    $wp_customize->add_setting( 'header_social_icons_twitter_url', array(
        'default'           => 'https://twitter.com/#',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'header_social_icons_twitter_url', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_twitter_url',
        'label'      => __( 'Twitter URL', 'qbytesworld_WordPress' ),
        'description'=> __( 'URL to your twitter page (leave blank to remove)', 'qbytesworld_WordPress' ),        
        'type'       => 'link',
    ) );

    /* ************************************************************ */
    // Add YouTube url
    $wp_customize->add_setting( 'header_social_icons_youtube_url', array(
        'default'           => 'https://youtube.com/#',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'header_social_icons_youtube_url', array(
        'section'    => 'header_social_icons',
        'settings'   => 'header_social_icons_youtube_url',
        'label'      => __( 'YouTube URL', 'qbytesworld_WordPress' ),
        'description'=> __( 'URL to your youtube page (leave blank to remove)', 'qbytesworld_WordPress' ),
        'type'       => 'link',
    ) );   
    
}
add_action('customize_register', 'header_social_icons');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_social_icons_css() { ?>

	<style type="text/css">
        header .social-icons {
	        background-color: <?php echo get_theme_mod('header_social_icons_background'); ?>;
        }
        header .social-icons a {
            color: <?php echo get_theme_mod('header_social_icons_color'); ?>;
            /* letter-spacing: <?php echo get_theme_mod('header_social_icons_spacing'); ?>px; */
            margin-left: <?php echo get_theme_mod('header_social_icons_spacing'); ?>px;
            margin-right: <?php echo get_theme_mod('header_social_icons_spacing'); ?>px;
        }
        header .social-icons a i {
            font-size:  <?php echo get_theme_mod('header_social_icons_size'); ?>px;
        }
        header .social-icons a:hover {
	        color: <?php echo get_theme_mod('header_social_icons_hover'); ?>;
        }
	</style>

<?php }
add_action('wp_head', 'header_social_icons_css');

?>