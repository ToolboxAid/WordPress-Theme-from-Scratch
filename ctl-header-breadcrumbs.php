<?php

function get_header_breadcrumbs() {
	if ( get_theme_mod( 'mytheme_breadcrumbs_toggle', false ) )
	{
		if ( !is_home() && !is_front_page() ) {
			echo '<div class="center-breadcrumb clear-formatting">';	
			echo '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
			echo '<li class="breadcrumb-item"><a href="'.home_url('/').'">'.__('Home').'</a></li>';
			echo '<li class="breadcrumb-item"> > </li>';
			if ( is_category() || is_single() ) {
				echo '<li class="breadcrumb-item">';
				the_category(' </li><li class="breadcrumb-item"> ');
				if ( is_single() ) {
					echo '</li><li class="breadcrumb-item">';
					the_title();
					echo '</li>';
				}
			} elseif ( is_page() ) {
				echo '<li class="breadcrumb-item">';
				echo the_title();
				echo '</li>';
			}
			echo '</ol></nav>';
		}
echo '</div>';		
	}
}
//add_action( 'wp_head', 'get_header_breadcrumbs' );


/////////////////////////////////////////
/* Customize Appearance Options header */
/////////////////////////////////////////
function header_breadcrumbs( $wp_customize ) {    

	/* Create section */
	$wp_customize->add_section('header_breadcrumbs', array(
		'title' => __('Header - Bread Crumbs (incomplete)', 'qbytesworld_WordPress'),
		'priority' => 165,
	));

    /* ************************************************************ */
    /* ************************************************************ */
    /* ************************************************************ */

    // Add setting for breadcrumbs
    $wp_customize->add_setting( 'mytheme_breadcrumbs_toggle', array(
        'default'    => true,
        'transport'  => 'refresh',
     ) );
     
    // Add control for breadcrumbs
    $wp_customize->add_control( 'mytheme_breadcrumbs_toggle', array(
        'section'    => 'header_breadcrumbs',
        'settings'   => 'mytheme_breadcrumbs_toggle',
        'label'      => __( 'Display Breadcrumbs', 'mytheme' ),
        'description' => __( 'Toggle breadcrumbs on or off.', 'mytheme' ),
        'type'       => 'checkbox',
     ) );

    /* ************************************************************ */

    // Add checkbox to hide title & tagline 
    $wp_customize->add_setting( 'header_breadcrumbs_sub_checkbox', array(
        'default'   => false,
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'header_breadcrumbs_sub_checkbox', array(
        'label'    => __( 'Hide Title & Tagline', 'qbytesworld_WordPress' ),
        'section'  => 'header_breadcrumbs',
        'settings' => 'header_breadcrumbs_checkbox',
        'description' => __( 'True/False', 'qbytesworld_WordPress' ),        
        'type'     => 'checkbox',
    ) );	
	
    /* Button color */
	$wp_customize->add_setting('header_breadcrumbs_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_color_control', array(
		'label' => __('Button Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_color',
        'description'=> __( 'Color for Menu Item', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_breadcrumbs_color_hover', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_color_hover_control', array(
		'label' => __('Button Hover Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_color_hover',
        'description'=> __( 'Mouse Menu Item Hover color', 'qbytesworld_WordPress' ),        
	) ) );

    /* Button hover color */
	$wp_customize->add_setting('header_breadcrumbs_color_active', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_breadcrumbs_color_active_control', array(
		'label' => __('Button Active Color', 'qbytesworld_WordPress'),
		'section' => 'header_breadcrumbs',
		'settings' => 'header_breadcrumbs_color_active',
        'description'=> __( 'Active Menu Item color', 'qbytesworld_WordPress' ),        
	) ) );

}
add_action('customize_register', 'header_breadcrumbs');


///////////////////////////////////////////////
/* Output Customize CSS to support controls  */
///////////////////////////////////////////////
function header_breadcrumbs_css() { ?>

	<style type="text/css">
		/* breadcrumbs */
		header div.clear-formatting * {
		all: unset;
		margin: 0;
		padding: 0;
		font-size: inherit;
		font-family: inherit;		
		}

		header div.center-breadcrumb{
		background-color: #444444;	
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 5px 0;
		}

		header div.center-breadcrumb nav ol li{
		color: #ffffff;	
		padding: 5px;
		font-size:18px;
		}
	</style>

<?php }
add_action('wp_head', 'header_breadcrumbs_css');

?>