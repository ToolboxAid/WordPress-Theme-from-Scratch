<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<?php wp_head(); ?>
		<title><?php bloginfo('name'); ?></title>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="/wp-content/uploads/font-awesome-4.7.0/css/font-awesome.min.css"> -->
    	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>		
	</head>

    <body <?php body_class(); ?>>
        <header>
            <div class="flex header-content">
                <div id="social" class="social-icons align-center">
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

                <div id="image" class="header-image bg-image-fill site-tagline ">

                    <h1 class="site-name align-center"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>

                    <?php if ( ! get_theme_mod( 'header_tagline_hide', false ) ) {
                            if ( ! get_theme_mod( 'header_tagline_location', false ) ) {?>                                          
                                <h2 class="site-tagline align-center"><?php bloginfo('description'); 
                                /* if (is_page(7)) {*/
                                if (is_page('front-page')) {?>
                                    - Thank you for the visit our KEWL site.<?php } ?>  
                                </h2>
                            <?php } } ?>                
                </div>	<!-- header-image end -->

                <?php if ( ! get_theme_mod( 'header_tagline_hide', false ) ) {
                         if ( get_theme_mod( 'header_tagline_location', false ) ) {?>   
                    <div id="tagline" class="site-tagline site-tagline-alt align-center">                                        
                        <h2><?php bloginfo('description'); 
                        ?></h2>
                    </div>
                <?php } } ?> <!-- end div diff location -->

                <div id="nav" class="site-nav align-center">
                    <nav>				
                        <?php
                        $args = array( 'theme_location' => 'header' ); 
 wp_nav_menu(  $args ); ?>
                    </nav>
                </div>	<!-- site-nav end -->

                <?php 
                // if (function_exists('get_header_breadcrumbs')) {
                //         get_header_breadcrumbs(); }
                 ?>

                <?php if (function_exists('get_breadcrumbs')) {
                        //get_header_breadcrumbs();
                        get_breadcrumbs(
                            array(
                                'separator'   => '&gt; ',
                                'linkFinal'   => true,
                                'echo'        => true,
                                'printOnHome' => false, 
                            )
                        );                         
                        //display_breadcrumb();
                    } ?>

            </div> <!-- header-content end -->

            <noscript>
                <style>
                    article,
                    .widget-item {
                        opacity: 1;
                        transform: translateY(0);
                    }
                    .no-script-content{
                        background-color: red;
                        margin: 0 auto;
                        font-family: arial;
                        font-size: 26px;
                        outline: dashed 5px black;  
                        text-align: center;
                        padding:10px;
                    }
                    .no-script-content p{
                        color: white !important;
                        padding: 6px;
                    }
                </style>
                <div class="no-script-content ">
                    <p>Oh Me, Oh My: looks like somebody does not like having fun.</p>
                    <p>Please enable JavaScript to view this site properly.</p>
                    <p>Pages not displays properly, missing parts and may adjust without JavaScript.</p>
                </div>
            </noscript>


        </header>
        <main class="align-center">
            <section class="side-by-side">
