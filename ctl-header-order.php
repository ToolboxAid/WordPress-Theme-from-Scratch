<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_order( $wp_customize ) {

	/* Create section */
	$wp_customize->add_section('header_order', array(
		'title' => __('Header - Order', 'qbytesworld_WordPress'),
		'priority' => 159,
	));

    /* ************************************************************ */
    // Social Order
    $wp_customize->add_setting( 'header_order_social', array(
        'default'    => '1',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_order_social_control', array(
        'section'    => 'header_order',
        'settings'   => 'header_order_social',
        'label'      => __( 'Social DIV order', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the Social DIV order', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '10',
        'step'   => '1',
        ),
     ) );



    /* ************************************************************ */
    // Image Order
    $wp_customize->add_setting( 'header_order_image', array(
        'default'    => '2',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_order_image_control', array(
        'section'    => 'header_order',
        'settings'   => 'header_order_image',
        'label'      => __( 'Image DIV order', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the Image DIV order', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '10',
        'step'   => '1',
        ),
     ) );


    /* ************************************************************ */
    // Image Order
    $wp_customize->add_setting( 'header_order_tagline', array(
        'default'    => '3',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_order_tagline_control', array(
        'section'    => 'header_order',
        'settings'   => 'header_order_tagline',
        'label'      => __( 'Tagline DIV order', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the Tagline DIV order', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '10',
        'step'   => '1',
        ),
     ) );

     
    /* ************************************************************ */
    // Nav Order
    $wp_customize->add_setting( 'header_order_nav', array(
        'default'    => '4',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_order_nav_control', array(
        'section'    => 'header_order',
        'settings'   => 'header_order_nav',
        'label'      => __( 'Nav DIV order', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the Nav DIV order', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '10',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // Nav Order
    $wp_customize->add_setting( 'header_order_breadcrumb', array(
      'default'    => '5',
      'transport'  => 'refresh',
   ) );
   $wp_customize->add_control( 'header_order_breadcrumb_control', array(
      'section'    => 'header_order',
      'settings'   => 'header_order_breadcrumb',
      'label'      => __( 'Bread-Crumb DIV order', 'qbytesworld_WordPress' ),
      'description'=> __( 'Adjust the Bread-Crumb DIV order', 'qbytesworld_WordPress' ),        
      'type'       => 'range',
      'priority'   => 10,
      'input_attrs' => array(
      'min'    => '0',
      'max'    => '10',
      'step'   => '1',
      ),
   ) );
   
   /* ************************************************************ */
   // Border color
	$wp_customize->add_setting('header_order_border_color', array(
		'default' => '#aa0000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_order_border_color', array(
		'section' => 'header_order',
		'settings' => 'header_order_border_color',
		'label' => __('Border Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the dorder color of the title', 'qbytesworld_WordPress' ),
        'type'       => 'color',
	) );

    /* ************************************************************ */
    // Border size
    $wp_customize->add_setting( 'header_order_border_size', array(
        'default'    => '10',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'header_order_border_size_control', array(
        'section'    => 'header_order',
        'settings'   => 'header_order_border_size',
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
add_action('customize_register', 'header_order');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_order_css() { ?>

	<style type="text/css">

        #flex    { display: flex; flex-direction: column; }
        #social  { order: <?php echo get_theme_mod('header_order_social');    ?>; }
        #image   { order: <?php echo get_theme_mod('header_order_image');     ?>; }
        #tagline { order: <?php echo get_theme_mod('header_order_tagline');   ?>; }
        #nav     { order: <?php echo get_theme_mod('header_order_nav');       ?>; }
        #crumb   { order: <?php echo get_theme_mod('header_order_breadcrumb');?>; }

        div.flex.header-content{
            border-top: <?php echo get_theme_mod('header_order_border_size'); ?>px solid <?php echo get_theme_mod('header_order_border_color'); ?>  ;          
        }
        
	</style>

<?php }
add_action('wp_head', 'header_order_css');

?>