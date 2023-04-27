<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_nav( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_nav', array(
		'title' => __('Footer - Nav', 'qbytesworld_WordPress'),
		'priority' => 171,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

	
    /* Border color */
	$wp_customize->add_setting('footer_nav_border_color', array(
		'default' => '#333333',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_border_color_control', array(
		'label' => __('Border Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_border_color',
        'description'=> __( 'Color for footer border', 'qbytesworld_WordPress' ),        
	) ) );
    /* Background color */
	$wp_customize->add_setting('footer_nav_background_color', array(
		'default' => '#aa0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_background_color_control', array(
		'label' => __('Background Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_background_color',
        'description'=> __( 'Color for background', 'qbytesworld_WordPress' ),        
	) ) );


	
	/* Heading (h1-h6) color */
	$wp_customize->add_setting('footer_nav_header_background_color', array(
		'default' => '#00aaaa',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_header_background_color_control', array(
		'label' => __('Header background color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_header_background_color',
		'description'=> __( 'Header bacground color for Nav Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Heading (h1-h6) color */
	$wp_customize->add_setting('footer_nav_header_color', array(
		'default' => '#00aaaa',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_header_color_control', array(
		'label' => __('Header Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_header_color',
        'description'=> __( 'Header text color for Nav Item', 'qbytesworld_WordPress' ),        
	) ) );


    /* Link color */
	$wp_customize->add_setting('footer_nav_color', array(
		'default' => '#00aaaa',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_color_control', array(
		'label' => __('Link Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_color',
        'description'=> __( 'Color for Nav Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Link hover color */
	$wp_customize->add_setting('footer_nav_color_hover', array(
		'default' => '#00cccc',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_nav_color_hover_control', array(
		'label' => __('Link Hover Color', 'qbytesworld_WordPress'),
		'section' => 'footer_nav',
		'settings' => 'footer_nav_color_hover',
        'description'=> __( 'Mouse Nav Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'footer_nav');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_nav_css() { ?>

	<style type="text/css">
		footer {
            border-top: <?php echo get_theme_mod('header_order_border_size'); ?>px solid <?php echo get_theme_mod('footer_nav_border_color'); ?>  ;   
			background-color: <?php echo get_theme_mod('footer_nav_background_color'); ?>;
		}

		.footer-col h4 {
			background-color: <?php echo get_theme_mod('footer_nav_header_background_color'); ?>;		}

		footer h1, footer h2, footer h3, footer h4, footer h5, footer h6 {
            color: <?php echo get_theme_mod('footer_nav_header_color'); ?>;
		}

		div.footer-col ul li a {
            color: <?php echo get_theme_mod('footer_nav_color'); ?>;
		}

		div.footer-col ul li a:hover {
            color: <?php echo get_theme_mod('footer_nav_color_hover'); ?>;
		}		
	</style>

<?php }
add_action('wp_head', 'footer_nav_css');

?>