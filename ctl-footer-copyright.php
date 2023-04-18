<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_copyright( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_copyright', array(
		'title' => __('Footer - Copyright', 'qbytesworld_WordPress'),
		'priority' => 173,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */
	
	/* Establish Year */
    $wp_customize->add_setting( 'footer_copyright_established', array(
        'default'           => '1900',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'footer_copyright_established', array(
        'section'    => 'footer_copyright',
        'settings'   => 'footer_copyright_established',
        'label'      => __( 'Establish Year', 'qbytesworld_WordPress' ),
        'description'=> __( 'The year to start the copyright', 'qbytesworld_WordPress' ),        
        'type'       => 'text',
    ) );
    /* Text color */
	$wp_customize->add_setting('footer_copyright_color', array(
		'default' => '#00aaaa',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_color_control', array(
		'label' => __('Text Color', 'qbytesworld_WordPress'),
		'section' => 'footer_copyright',
		'settings' => 'footer_copyright_color',
        'description'=> __( 'Color for Copyright', 'qbytesworld_WordPress' ),        
	) ) );
}
add_action('customize_register', 'footer_copyright');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_copyright_css() { ?>

	<style type="text/css">
		footer div.footer-col p{
            color: <?php echo get_theme_mod('footer_copyright_color'); ?>;
		}
	</style>

<?php }
add_action('wp_head', 'footer_copyright_css');

?>