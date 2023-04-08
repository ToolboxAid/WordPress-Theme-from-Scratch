<?php

/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function footer_top( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('footer_top', array(
		'title' => __('Footer - Top Of Page', 'qbytesworld_WordPress'),
		'priority' => 170,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    /* Top Of Page color font */
    $wp_customize->add_setting('footer_top_color', array(
		'default' => '#333333',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_top_color_control', array(
		'label' => __('Top Of Page font Color', 'qbytesworld_WordPress'),
		'section' => 'footer_top',
		'settings' => 'footer_top_color',
        'description'=> __( 'Ball font Color', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Top Of Page color ball */
    $wp_customize->add_setting('footer_top_ball_color', array(
		'default' => '#ff0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_top_ball_color_control', array(
		'label' => __('Top Of Page Ball Color', 'qbytesworld_WordPress'),
		'section' => 'footer_top',
		'settings' => 'footer_top_ball_color',
        'description'=> __( 'Color for Ball', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    /* Top Of Page ripple color */
    $wp_customize->add_setting('footer_top_ripple_color', array(
		'default' => '#ff0000',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_top_ripple_color_control', array(
		'label' => __('Top Of Page Ball Color', 'qbytesworld_WordPress'),
		'section' => 'footer_top',
		'settings' => 'footer_top_ripple_color',
        'description'=> __( 'Color for Ball', 'qbytesworld_WordPress' ),        
	) ) );

    /* ************************************************************ */
    // font font size
    $wp_customize->add_setting( 'footer_top_font_size', array(
        'default'    => '36',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'footer_top_font_size_control', array(
        'section'    => 'footer_top',
        'settings'   => 'footer_top_font_size',
        'label'      => __( 'Font size', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the font size of the Top Of Page', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '50',
        'step'   => '1',
        ),
     ) );

    /* ************************************************************ */
    // font font size
    $wp_customize->add_setting( 'footer_top_ball_size', array(
      'default'    => '36',
      'transport'  => 'refresh',
   ) );
   $wp_customize->add_control( 'footer_top_ball_size_control', array(
      'section'    => 'footer_top',
      'settings'   => 'footer_top_ball_size',
      'label'      => __( 'Ball size', 'qbytesworld_WordPress' ),
      'description'=> __( 'Adjust the ball size of the Top Of Page', 'qbytesworld_WordPress' ),        
      'type'       => 'range',
      'priority'   => 10,
      'input_attrs' => array(
      'min'    => '0',
      'max'    => '75',
      'step'   => '1',
      ),
   ) );



      /* ************************************************************ */
      // Offset X size (across)
      $wp_customize->add_setting( 'footer_top_x_offset', array(
        'default'    => '80',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'footer_top_x_offset_control', array(
        'section'    => 'footer_top',
        'settings'   => 'footer_top_x_offset',
        'label'      => __( 'Offset x', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the offset x of the Top Of Page', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0',
        'max'    => '100',
        'step'   => '1',
        ),
     ) );

   /* ************************************************************ */
   // Offset y size (across)
   $wp_customize->add_setting( 'footer_top_y_offset', array(
      'default'    => '80',
      'transport'  => 'refresh',
   ) );
   $wp_customize->add_control( 'footer_top_y_offset_control', array(
      'section'    => 'footer_top',
      'settings'   => 'footer_top_y_offset',
      'label'      => __( 'Offset y', 'qbytesworld_WordPress' ),
      'description'=> __( 'Adjust the offset y of the Top Of Page', 'qbytesworld_WordPress' ),        
      'type'       => 'range',
      'priority'   => 10,
      'input_attrs' => array(
      'min'    => '0',
      'max'    => '100',
      'step'   => '1',
      ),
   ) );

	     /* ************************************************************ */
    // TOP delay size
    $wp_customize->add_setting( 'footer_top_delay', array(
        'default'    => '0.4',
        'transport'  => 'refresh',
     ) );
     $wp_customize->add_control( 'footer_top_delay_control', array(
        'section'    => 'footer_top',
        'settings'   => 'footer_top_delay',
        'label'      => __( 'Top Of Page wave delay', 'qbytesworld_WordPress' ),
        'description'=> __( 'Adjust the delay between rings for Top Of Page', 'qbytesworld_WordPress' ),        
        'type'       => 'range',
        'priority'   => 10,
        'input_attrs' => array(
        'min'    => '0.0',
        'max'    => '1.0',
        'step'   => '0.1',
        ),
     ) );

      /* ************************************************************ */
      // TOP size size
      $wp_customize->add_setting( 'footer_ring_size', array(
         'default'    => '100',
         'transport'  => 'refresh',
      ) );
      $wp_customize->add_control( 'footer_ring_size_control', array(
         'section'    => 'footer_top',
         'settings'   => 'footer_ring_size',
         'label'      => __( 'Top Of Page ring size', 'qbytesworld_WordPress' ),
         'description'=> __( 'Adjust the max ring size for Top Of Page', 'qbytesworld_WordPress' ),        
         'type'       => 'range',
         'priority'   => 10,
         'input_attrs' => array(
         'min'    => '0',
         'max'    => '200',
         'step'   => '1',
         ),
      ) );     

}
add_action('customize_register', 'footer_top');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function footer_top_css() { ?>

	<style type="text/css">

      i.fa.fa-arrow-up {
         font-size: <?php echo get_theme_mod('footer_top_font_size'); ?>px;
         color: <?php echo get_theme_mod('footer_top_color'); ?>;
      }
      .static-ball {
         background-color: <?php echo get_theme_mod('footer_top_ball_color'); ?>;
      }
      

      .wave1 {
         background-color: <?php echo get_theme_mod('footer_top_ripple_color'); ?>;
         animation-delay: 0.0s;
      }

      .wave2 {
         background-color: <?php echo get_theme_mod('footer_top_ripple_color'); ?>;
         animation-delay: <?php echo (floatval(get_theme_mod('footer_top_delay')) * 1); ?>s;
      }

      .wave3 {
         background-color: <?php echo get_theme_mod('footer_top_ripple_color'); ?>;
         animation-delay: <?php echo (floatval(get_theme_mod('footer_top_delay')) * 2); ?>s;
      }

      
      .ball-loc {
         left: <?php echo get_theme_mod('footer_top_x_offset'); ?>vw;
         top:  <?php echo get_theme_mod('footer_top_y_offset'); ?>vh;
      }

      .ball {
         width:  <?php echo get_theme_mod('footer_top_ball_size'); ?>px;
         height: <?php echo get_theme_mod('footer_top_ball_size'); ?>px;
      }

      @keyframes wave-animation {
         0% {
            opacity: 0.75;
            width: 0px;
            height: 0px;
         }

         100% {
            opacity: 0;
            width: <?php echo get_theme_mod('footer_ring_size'); ?>px;
            height: <?php echo get_theme_mod('footer_ring_size'); ?>px;
         }
      }   

	</style>

<?php }
add_action('wp_head', 'footer_top_css');

?>