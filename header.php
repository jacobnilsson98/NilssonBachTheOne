<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- wp_head begin -->
    <?php wp_head(); ?>
    <!-- wp_head end -->
  </head>
  <body <?php body_class(); ?> >
    <?php wp_body_open(); ?>  
    
    <?php if(function_exists('lc_custom_header')) lc_custom_header(); else {
      
      //STANDARD NAV
      
      if (get_theme_mod("enable_topbar") ) : ?>
        <!-- ******************* The Topbar Area ******************* -->
        <div id="wrapper-topbar" class="py-2 <?php echo get_theme_mod('topbar_bg_color_choice','bg-light') ?> <?php echo get_theme_mod('topbar_text_color_choice','text-dark') ?>">
          <div class="container">
            <div class="row">
              <div id="topbar-content" class="col-md-12 text-left text-center text-md-left small"> <?php echo do_shortcode(get_theme_mod('topbar_content')) ?>	</div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        

        <!-- ******************* The Navbar Area ******************* -->
        <div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

      <div class="top-header-holder">
        <div class="container">
          <div class="row align-items-center">
            <div class="col col-lg-2">
              <div class="logo-holder">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" width="200px">
              </div>
            </div>
            <div class="col-sm">
              <div class="search-holder">
                <div class="search">Search</div>
              </div>
            </div>
            <div class="col col-lg-2">
              <div class="upload-holder">
                <div class="upload">
                  <a href="#">Upload your recipe</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

          <a class="skip-link visually-hidden-focusable" href="#theme-main"><?php esc_html_e( 'Skip to content', 'picostrap' ); ?></a>

          
          <nav class="navbar <?php echo get_theme_mod('picostrap_header_navbar_expand','navbar-expand-lg'); ?> <?php echo get_theme_mod('picostrap_header_navbar_position')." ". get_theme_mod('picostrap_header_navbar_color_scheme','navbar-dark').' '. get_theme_mod('picostrap_header_navbar_color_choice','bg-dark'); ?>" aria-label="Main Navigation" >
            <div class="container">
              <div id="logo-tagline-wrap">
                  

                
                  <?php if (!get_theme_mod('header_disable_tagline')): ?>
                    <small id="top-description" class="text-muted d-none d-md-block mt-n2">
                      <?php bloginfo("description") ?>
                    </small>
                  <?php endif ?>
              
              
                  </div> <!-- /logo-tagline-wrap -->



              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <?php 
                  wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => '',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                ));
                ?>
                
                <?php if (get_theme_mod('enable_search_form')): ?>
                  <form action="<?php echo bloginfo('url') ?>" method="get" id="header-search-form">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search" name="s" value="<?php the_search_query(); ?>">
                  </form> 
                <?php endif ?>

              </div> <!-- .collapse -->
            </div> <!-- .container -->
          </nav> <!-- .site-navigation -->
          <?php

          //AS A TEST / DEMO for a mock-up megamenu
          //include("nav-static-mega.php");
          ?>
        </div><!-- #wrapper-navbar end -->

      
    <?php 
    } // END ELSE CASE 
    ?>

<main id='theme-main'>