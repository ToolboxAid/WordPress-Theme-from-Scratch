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

                    <?php if ( ! get_theme_mod( 'header_tagline_location', false ) ) {?>                                          
                        <h2 class="site-tagline"><?php bloginfo('description'); ?>
                    <?php } ?>

					<?php /* if (is_page(7)) {*/
					if (is_page('front-page')) {?>
						- Thank you for the visit our KEWL site.
					<?php } ?>                
                    </h2>
                </div>	<!-- header-image end -->

                <?php if ( get_theme_mod( 'header_tagline_location', false ) ) {?>  
                    <div class="site-tagline-2">                                        
                        <h2><?php bloginfo('description'); ?>
                    </div>
                <?php } ?> <!-- end div diff location -->

                <div class="site-nav">
                    <nav>				
                        <?php				
                        $args = array( 'theme_location' => 'header' ); 
                        wp_nav_menu(  $args );
                        ?>
                    </nav>
                </div>	<!-- site-nav end -->

            </div> <!-- header-content end -->

        </header>
        <main>
            <section>