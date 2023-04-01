<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_star( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_star', array(
		'title' => __('Footer - Star', 'qbytesworld_WordPress'),
		'priority' => 168,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    /* Star color */
	$wp_customize->add_setting('footer_star_color', array(
		'default' => '#ffff01',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_star_color_control', array(
		'label' => __('Star Color', 'qbytesworld_WordPress'),
		'section' => 'footer_star',
		'settings' => 'footer_star_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );


    /* ************************************************************ */
    // font size size
    $wp_customize->add_setting( 'footer_star_font_size', array(
        'default'    => '50',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'footer_star_font_size_control', array(
        'section'    => 'footer_star',
        'settings'   => 'footer_star_font_size',
        'label'      => __( 'Font size', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the font size of the star', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '100',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Offset size
    $wp_customize->add_setting( 'footer_star_offset', array(
        'default'    => '30',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'footer_star_offset_control', array(
        'section'    => 'footer_star',
        'settings'   => 'footer_star_offset',
        'label'      => __( 'Offset size', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the offset size of the star', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '80',
        'step'   => '1',
        ),
     ) );
	 
	     /* ************************************************************ */
    // Border size
    $wp_customize->add_setting( 'footer_star_hr_size', array(
        'default'    => '4',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'footer_star_hr_size_control', array(
        'section'    => 'footer_star',
        'settings'   => 'footer_star_hr_size',
        'label'      => __( 'Star HR size', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the border size of the star', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '10',
        'step'   => '1',
        ),
     ) );


}
add_action('customize_register', 'footer_star');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_star_css() { ?>

	<style type="text/css">
		footer .star{
			font-size: <?php echo get_theme_mod('footer_star_font_size'); ?>px;
			color: <?php echo get_theme_mod('footer_star_color'); ?>;

			margin: 0px;
			display: flex; 
			align-items: center;	
		}
		footer .star i{
			padding-left: <?php echo get_theme_mod('footer_star_offset'); ?>px;
			padding-right: <?php echo get_theme_mod('footer_star_offset'); ?>px;		
		}		
		footer .star hr{
			height: <?php echo get_theme_mod('footer_star_hr_size'); ?>px;
			background-color: <?php echo get_theme_mod('footer_star_color'); ?>;;

			width: 50%; 
		}
	</style>

<?php }
add_action('wp_head', 'footer_star_css');

?>