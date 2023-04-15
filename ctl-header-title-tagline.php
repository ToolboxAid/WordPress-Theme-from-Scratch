<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_tagline( $wp_customize ) {

	/* Create section */
	$wp_customize->add_section('header_tagline', array(
		'title' => __('Header - Tagline info', 'qbytesworld_WordPress'),
		'priority' => 162,
	));

    /* ************************************************************ */
    // Add checkbox to hide tagline 
    $wp_customize->add_setting( 'header_tagline_hide', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_tagline_hide', array(
        'label'    => __( 'Hide Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'header_tagline',
        'settings' => 'header_tagline_hide',
        'description' => __( 'Hides the Tagline on header', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );
    

    /* ************************************************************ */
    // Add checkbox to show tagline in different DIV
    $wp_customize->add_setting( 'header_tagline_location', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_tagline_location', array(
        'label'    => __( 'Display Tagline in seperate location', 'qbytesworld_WordPress' ),
        'section'  => 'header_tagline',
        'settings' => 'header_tagline_location',
        'description' => __( 'Shows Tagline below header', 'qbytesworld_WordPress' ),
        'type'     => 'checkbox',
    ) );
        
     /* ************************************************************ */
    // Color
	$wp_customize->add_setting('header_tagline_color', array(
		'default' => '#eeeeee',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_tagline_color', array(
		'section' => 'header_tagline',
		'settings' => 'header_tagline_color',
		'label' => __('Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the color of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );
    
    /* ************************************************************ */
    // Add font size setting and control
    $wp_customize->add_setting( 'header_tagline_size', array(
        'default'    => '20',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_tagline_size', array(
        'section'    => 'header_tagline',
        'settings'   => 'header_tagline_size',
        'label'      => __( 'Tagline Font Size', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the font size for title.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '4',
        'max'    => '40',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Add spacing control
    $wp_customize->add_setting( 'header_tagline_spacing', array(
        'default'    => '0',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_tagline_spacing_control', array(
        'section'    => 'header_tagline',
        'settings'   => 'header_tagline_spacing',
        'label'      => __( 'Tagline Spacing', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the font space of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '050',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Drop Shadow Color
	$wp_customize->add_setting('header_tagline_drop_shadow_color', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_tagline_drop_shadow_color', array(
		'section' => 'header_tagline',
		'settings' => 'header_tagline_drop_shadow_color',
		'label' => __('Drop Shadow Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the drop shadow color of the title', 'qbytesworld_WordPress' ),        
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Add drop shadow x setting and control
    $wp_customize->add_setting( 'header_tagline_drop_shadow_x', array(
        'default'    => '3',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_tagline_drop_shadow_x', array(
        'section'    => 'header_tagline',
        'settings'   => 'header_tagline_drop_shadow_x',
        'label'      => __( 'Drop Shadow X spacing', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the drop shadow X spacing.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '-15',
        'max'    => '15',
        'step'   => '1',
        ),
     ) );


    /* ************************************************************ */
    // Add drop shadow y setting and control
    $wp_customize->add_setting( 'header_tagline_drop_shadow_y', array(
        'default'    => '3',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_tagline_drop_shadow_y', array(
        'section'    => 'header_tagline',
        'settings'   => 'header_tagline_drop_shadow_y',
        'label'      => __( 'Drop Shadow Y spacing', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the drop shadow Y spacing.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '-15',
        'max'    => '15',
        'step'   => '1',
        ),
     ) );

         /* ************************************************************ */
    // Add drop shadow blur setting and control
    $wp_customize->add_setting( 'header_tagline_drop_shadow_blur', array(
        'default'    => '3',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_tagline_drop_shadow_blur', array(
        'section'    => 'header_tagline',
        'settings'   => 'header_tagline_drop_shadow_blur',
        'label'      => __( 'Drop Shadow blur', 'qbytesworld_WordPress' ),
        'description' => __( 'Adjust the blur of the shadow.', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '30',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Background
	$wp_customize->add_setting('header_tagline_background', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_tagline_background', array(
		'section' => 'header_tagline',
		'settings' => 'header_tagline_background',
		'label' => __('Background Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the background color of the title', 'qbytesworld_WordPress' ),
        'type'       => 'color',
	) );

}
add_action('customize_register', 'header_tagline');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_tagline_css() { ?>

	<style type="text/css">

        .site-tagline {/* tag */
            color: <?php echo get_theme_mod('header_tagline_color'); ?>;
            font-size: clamp(3px, 3vw, <?php echo get_theme_mod('header_tagline_size') ?>px);
            letter-spacing: <?php echo get_theme_mod('header_tagline_spacing'); ?>px;

            text-shadow:<?php echo get_theme_mod('header_tagline_drop_shadow_x'); ?>px 
                        <?php echo get_theme_mod('header_tagline_drop_shadow_y'); ?>px  
                        <?php echo get_theme_mod('header_tagline_drop_shadow_blur'); ?>px  
                        <?php echo get_theme_mod('header_tagline_drop_shadow_color'); ?>                                                                       
                        ; 
        }

        .site-tagline-alt{
            background-color:  <?php echo get_theme_mod('header_tagline_background'); ?>                                                
        }

        header .site-tagline-alt {
            border-bottom: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>  ;          
        }

        <?php if ( get_theme_mod( 'header_tagline_hide', false ) ) {?>
                header h2.site-tagline{
                    font-size: 0px;
                    color:  #00000000;
                }
        <?php } ?>        

	</style>

<?php }
add_action('wp_head', 'header_tagline_css');

?>