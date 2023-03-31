<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_title( $wp_customize ) {

	/* Create section */
	$wp_customize->add_section('header_title', array(
		'title' => __('Header - Title info', 'qbytesworld_WordPress'),
		'priority' => 161,
	));


    /* ************************************************************ */
    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'header_title_hide', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_title_hide', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'header_title',
        'settings' => 'header_title_hide',
        'description' => __( 'Hides the Title and Tagline on header', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );
    
    /* ************************************************************ */
    // Add font size setting and control
    $wp_customize->add_setting( 'header_title_size', array(
        'default'    => '36',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_title_size', array(
        'section'    => 'header_title',
        'settings'   => 'header_title_size',
        'label'      => __( 'Title Font Size', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the font size for title.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '5',
        'max'    => '60',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Add spacing control
    $wp_customize->add_setting( 'header_title_spacing', array(
        'default'    => '0',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_title_spacing_control', array(
        'section'    => 'header_title',
        'settings'   => 'header_title_spacing',
        'label'      => __( 'Title Spacing', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the font space of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '150',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Drop Shadow Color
	$wp_customize->add_setting('header_title_drop_shadow_color', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_title_drop_shadow_color', array(
		'section' => 'header_title',
		'settings' => 'header_title_drop_shadow_color',
		'label' => __('Drop Shadow Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the drop shadow color of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Add font size setting and control
    $wp_customize->add_setting( 'header_title_drop_shadow_spacing', array(
        'default'    => '3',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_title_drop_shadow_spacing', array(
        'section'    => 'header_title',
        'settings'   => 'header_title_drop_shadow_spacing',
        'label'      => __( 'Drop Shadow spacing', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the drop shadow spacing.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '15',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Add checkbox to show tagline in DIV
    $wp_customize->add_setting( 'header_tagline_location', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_tagline_location', array(
        'label'    => __( 'Display Tagline in seperate location', 'qbytesworld_WordPress' ),
        'section'  => 'header_title',
        'settings' => 'header_tagline_location',
        'description' => __( 'Shows Tagline below header', 'qbytesworld_WordPress' ),
        'type'     => 'checkbox',
    ) );

    /* ************************************************************ */
    // Color
	$wp_customize->add_setting('header_title_color', array(
		'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_title_color', array(
		'section' => 'header_title',
		'settings' => 'header_title_color',
		'label' => __('Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the color of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Hover
	$wp_customize->add_setting('header_title_hover', array(
		'default' => '#aa0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_title_hover', array(
		'section' => 'header_title',
		'settings' => 'header_title_hover',
		'label' => __('Hover Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the hover color of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Background
	$wp_customize->add_setting('header_title_background', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_title_background', array(
		'section' => 'header_title',
		'settings' => 'header_title_background',
		'label' => __('Background Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the background color of the title', 'qbytesworld_WordPress' ),
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Border color
	$wp_customize->add_setting('header_title_border_color', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_title_border_color', array(
		'section' => 'header_title',
		'settings' => 'header_title_border_color',
		'label' => __('Border Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the dorder color of the title', 'qbytesworld_WordPress' ),
        'type'       => 'color',
	) );

    /* ************************************************************ */
    /* Add control for Header image */
    /*  Add control for Background Image */
    $wp_customize->add_setting('header_title_image', array(
        'default' => get_template_directory_uri() . '/assets/images/banner-image.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_title_image', array(
        'section' => 'header_title',
        'settings' => 'header_title_image',
        'label' => __('Header Image', 'qbytesworld_WordPress'),
        'description'=> __( 'Image to display behind the title', 'qbytesworld_WordPress' ),
    )));
    
    /* ************************************************************ */
    // Border size
    $wp_customize->add_setting( 'header_title_border_size', array(
        'default'    => '10',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_title_border_size_control', array(
        'section'    => 'header_title',
        'settings'   => 'header_title_border_size',
        'label'      => __( 'Border size', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the border size of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '50',
        'step'   => '1',
        ),
     ) );
}
add_action('customize_register', 'header_title');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_title_css() { ?>

	<style type="text/css">

        header .header-image {
	        background-color: <?php echo get_theme_mod('header_title_background'); ?>;
            background-image: url('<?php echo get_theme_mod('header_title_image'); ?>');
            border-top: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>;
            border-bottom: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>  ;          
        }
        header h1.site-name a {
            color: <?php echo get_theme_mod('header_title_color'); ?>;
            font-size: clamp(5px, 7vw, <?php echo get_theme_mod('header_title_size') ?>px);
            letter-spacing: <?php echo get_theme_mod('header_title_spacing'); ?>px;

            color: <?php echo get_theme_mod('header_title_color'); ?>;
            text-shadow: <?php echo get_theme_mod('header_title_drop_shadow_spacing'); ?>px <?php echo get_theme_mod('header_title_drop_shadow_spacing'); ?>px  <?php echo get_theme_mod('header_title_drop_shadow_color'); ?>;                   
        }        
        header h1.site-name a:hover {
            color: <?php echo get_theme_mod('header_title_hover'); ?>;
        }        
        header .site-tagline,
        header .site-tagline-2{/* tag */
            color: <?php echo get_theme_mod('header_title_color'); ?>;
            text-shadow: <?php echo get_theme_mod('header_title_drop_shadow_spacing'); ?>px <?php echo get_theme_mod('header_title_drop_shadow_spacing'); ?>px  <?php echo get_theme_mod('header_title_drop_shadow_color'); ?>;                   
        }

        header .site-tagline-2{
            background-color: <?php echo get_theme_mod('header_title_background'); ?>;
        }

        header .header-image a i {
            font-size:  <?php echo get_theme_mod('header_title_size'); ?>px;
        }
        header .header-image a:hover {
	        color: <?php echo get_theme_mod('header_title_hover'); ?>;
        }

        <?php if ( get_theme_mod( 'header_title_hide', false ) ) {?>
                header h1.site-name a,
                header h2.site-tagline,
                header h1.site-name a:hover {
                    font-size: 0px;
                    color:  #00000000;
                }
        <?php } ?>

        header .site-tagline-2 {
            border-bottom: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>  ;          
        }

	</style>

<?php }
add_action('wp_head', 'header_title_css');

?>