<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<?php wp_head(); ?>
		<title><?php bloginfo('name'); ?></title>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--	< link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<link rel="stylesheet" href="/wp-content/uploads/font-awesome-4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>		
	</head>

    <body <?php body_class(); ?>>
        <header>
            <div class="header-content">
                	
                <div class="social-icons">
                    <?php 
                    $url = get_theme_mod('header_social_icons_facebook_url');
                    if (!empty($url) ){ ?>
                    <a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a>
                    <?php } ?>

                    <?php 
                    $url = get_theme_mod('header_social_icons_instagram_url');
                    if (!empty($url) ){ ?>
                    <a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php } ?>

                    <?php 
                    $url = get_theme_mod('header_social_icons_linkedin_url');
                    if (!empty($url) ){ ?>
                    <a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>

                    <?php 
                    $url = get_theme_mod('header_social_icons_twitter_url');
                    if (!empty($url) ){ ?>
                    <a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php } ?>

                    <?php 
                    $url = get_theme_mod('header_social_icons_youtube_url');
                    if (!empty($url) ){ ?>
                    <a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    <?php } ?>
                </div> <!-- social-icons end -->

                <div class="header-image">
                    <h1 class="site-name"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
                    <h2 class="site-tagline"><?php bloginfo('description'); ?>
					<?php /* if (is_page(7)) {*/
					if (is_page('front-page')) {?>
						- Thank you for the visit our KEWL site.
					<?php } ?>                
                    </h2>
                </div>	<!-- header-image end -->

                <div class="site-nav">
                    <nav>				
                        <?php				
                        $args = array( 'theme_location' => 'header' ); 
                        wp_nav_menu(  $args );
                        ?>
                    </nav>
                </div>	<!-- site-nav end -->

            </div> <!-- header-content end -->
<div>


<?php

/*
////////////////////////////////////////////////////////////////////////////////////
$header_image_url = get_header_image();
if ($header_image_url) {
    // Display the header image.
    echo '<img src="' . esc_url($header_image_url) . '" alt="Header Image">';
} else {
    // Display a default header image or alternative content.
}
///////////////////////////////////////////////////////////////////////////////////
$background_image = get_background_image();
if($background_image) {
    // The background image exists, so you can use it
    echo '<img src="' . esc_url($background_image) . '" alt="Background Image">';
} else {
    // The background image does not exist
}
///////////////////////////////////////////////////////////////////////////////////
*/
?>

<br/> <?php
echo '*header_image*: ';
echo $image_url = get_header_image();

?> <br/> <?php
echo '*background_image*: ';
echo $image_url = get_background_image();



?> <br/> <?php
echo '*image_setting*: ';
echo $image_url = get_theme_mod('image_setting');
?> <br/> <?php
echo '*my_radio_setting*: ';
echo $image_url = get_theme_mod('my_radio_setting');
?> <br/> <?php
echo '*mytheme_text_control*: ';
echo $image_url = get_theme_mod('mytheme_text_control');
?> <br/> <?php
echo '*slider_setting*: ';
echo $image_url = get_theme_mod('slider_setting');
?> <br/> <?php
echo '*my_textarea_setting*: ';
echo $image_url = get_theme_mod('my_textarea_setting');
?> <br/> <?php
echo '*custom_checkbox*: ';
echo $image_url = get_theme_mod('custom_checkbox');
?> <br/> <?php
echo '*my_select_control*: ';
echo $image_url = get_theme_mod('my_select_setting');
?> <br/><br/> <?php


echo '*typography_hdr_title-name*: ';
echo $image_url = get_theme_mod('typography-hdr-title-name');
?> <br/> <?php
echo '*typography_hdr_title-font_size*: ';
echo $image_url = get_theme_mod('typography-hdr-title-font_size');
?> <br/> <?php
echo '*typography_hdr_title-font_spacing*: ';
echo $image_url = get_theme_mod('typography-hdr-title-font_spacing');
?> <br/><br/> <?php


echo '*personal_typography1_name*: ';
echo get_theme_mod('personal-typography1-name');
?> <br/> <?php
echo '*personal-typography1-font_size*: ';
echo get_theme_mod('personal-typography1-font_size');
?> <br/> <?php
echo '*personal_typography1_font_spacing*: ';
echo get_theme_mod('personal-typography1-font_spacing');
?> <br/><br/> <?php


echo '*personal-typography2-name*: ';
echo $image_url = get_theme_mod('personal-typography2-name');
?> <br/> <?php
echo '*personal-typography2-font_size*: ';
echo $image_url = get_theme_mod('personal-typography2-font_size');
?> <br/> <?php
echo '*personal-typography2-font_spacing*: ';
echo $image_url = get_theme_mod('personal-typography2-font_spacing');
?> <br/><br/> <?php


///////////////////////////////////////////////////////////////////////////////////
?>

</div>
        </header>
        <main>
            <section>