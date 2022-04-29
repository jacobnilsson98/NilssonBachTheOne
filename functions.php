<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$picostrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/clean-head.php',							// Eliminates useless meta tags, emojis, etc            
	'/enqueues.php', 							// Enqueue scripts and styles.     
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	//'/hooks.php',                           // Custom hooks.
	//'/extras.php',                          // Custom functions that act independently of the theme templates.
	//'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	//'/jetpack.php',                         // Load Jetpack compatibility file.
	'/bootstrap-navwalker.php',    			// Load custom WordPress nav walker. 
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions. 
	'/customizer-assets/customizer.php',	//Defines Customizer options
	'/customizer-assets/scss-compiler.php', //To interface the Customizer with the SCSS php compiler	 
	'/customizer-assets/livereload.php', //To automatically trigger SCSS compiling when source sass changes	 
	'/options-page.php',                  // Load theme options page. 

);

foreach ( $picostrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

//PURELY OPT-IN FEATURES
//OPTIONAL: DISABLE WORDPRESS COMMENTS
if (get_theme_mod("singlepost_disable_comments") ) require_once locate_template('/inc/disable-comments.php'); 

//OPTIONAL: BACK TO TOP
if (get_theme_mod("enable_back_to_top") ) require_once locate_template('/inc/back-to-top.php');

//OPTIONAL: LIGHTBOX  
if (get_theme_mod("enable_lightbox") ) require_once locate_template('/inc/lightbox.php');
	
//OPTIONAL: DETECT PAGE SCROLL
if (get_theme_mod("enable_detect_page_scroll") ) require_once locate_template('/inc/detect-page-scroll.php');



function my_cptui_add_post_types_to_archives( $query ) {
	// We do not want unintended consequences.
	if ( is_admin() || ! $query->is_main_query() ) {
		return;    
	}

	if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		$cptui_post_types = cptui_get_post_type_slugs();

		$query->set(
			'post_type',
			array_merge(
				array( 'post' ),
				$cptui_post_types
			)
		);
	}
}
add_filter( 'pre_get_posts', 'my_cptui_add_post_types_to_archives' );


function crunchify_add_cpt_to_archive_page( $query ) {
	if( (is_category() || is_tag()) && $query->is_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
	  $query->set( 'post_type', array(
	   'post', 'guides'
		  ));
	  }
	  return $query;
  }
  add_filter( 'pre_get_posts', 'crunchify_add_cpt_to_archive_page' );


  function add_custom_types_to_tax( $query ) {
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
	 
	// Get all your post types
	$post_types = get_post_types();
	 
	$query->set( 'post_type', $post_types );
	return $query;
	}
	}
	add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );