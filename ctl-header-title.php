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
    // Color
	$wp_customize->add_setting('header_title_color', array(
		'default' => '#eeeeee',
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
		'transport' => 'refresh',
	));
	$wp_customize->add_control( 'header_title_border_color', array(
		'section' => 'header_title',
		'settings' => 'header_title_border_color',
		'label' => __('Background Color', 'qbytesworld_WordPress'),
        'description'=> __( 'Set the background color of the title', 'qbytesworld_WordPress' ),
        'type'       => 'color',
	) );

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


<?php
// header .header-image {
// 	height: 150px;
// 	background-color: #aa0000;
// 	border-top: 9px solid #aa0000;
// 	border-bottom: 9px solid #aa0000;
// }
//                   header_title_size
//
?>


	<style type="text/css">
        header .header-image {
	        background-color: <?php echo get_theme_mod('header_title_background'); ?>;
            background-image: url('<?php echo get_template_directory_uri();?>/assets/images/banner-920x210.png');
            border-top: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>;
            border-bottom: <?php echo get_theme_mod('header_title_border_size'); ?>px solid <?php echo get_theme_mod('header_title_border_color'); ?>  ;          
height: 150px;
        }


        header h1.site-name a {
            color: <?php echo get_theme_mod('header_title_color'); ?>;
            
            font-size: clamp(5px, 7vw, <?php echo get_theme_mod('header_title_size') ?>px);
            letter-spacing: <?php echo get_theme_mod('header_title_spacing'); ?>px;

/*	text-shadow: 3px 3px #333333;*/

        }
        header h1.site-name a:hover {
            color: <?php echo get_theme_mod('header_title_hover'); ?>;
        }        

header {/* tag */
color: <?php echo get_theme_mod('header_title_color'); ?>;
/* 	text-shadow: 3px 3px #33333388; */
}

        header .header-image a i {
            font-size:  <?php echo get_theme_mod('header_title_size'); ?>px;
        }
        header .header-image a:hover {
	        color: <?php echo get_theme_mod('header_title_hover'); ?>;
        }
	</style>

<?php }
add_action('wp_head', 'header_title_css');

?>