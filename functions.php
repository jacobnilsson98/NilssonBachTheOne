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


// Custom Taxonomy
function picostrap5_custom_post_taxonomy(){
	register_taxonomy(
        'bs_recipie_cat', // Services taxonomy name
        'bs_recipie', // Custom post name
            array(
            'hierarchical'      => true,
            'label'             => esc_html__('Services Category', 'text-domain' ),
            'query_var'         => true,
            'show_admin_column' => true,
                'rewrite'       => array(
        'bs_recipie', // Custom post name
        'bs_recipie', // Custom post name
                'slug'          => 'bs_recipie-category',
                'with_front'    => true
            )
        )
    );
}
add_action('init', 'picostrap5_custom_post_taxonomy');



function cptui_register_my_cpts() {

	/**
	 * Post Type: dishes.
	 */

	$labels = [
		"name" => __( "dishes", "picostrap5" ),
		"singular_name" => __( "dish", "picostrap5" ),
	];

	$args = [
		"label" => __( "dishes", "picostrap5" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "bs_recipie", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 6,
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "revisions", "author", "post-formats" ],
		"taxonomies" => [ "category", "bs_recipie_category" ],
		"show_in_graphql" => false,
	];

	register_post_type( "bs_recipie", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );





function cptui_register_my_taxes() {

	/**
	 * Taxonomy: type.
	 */

	$labels = [
		"name" => __( "type", "picostrap5" ),
		"singular_name" => __( "types", "picostrap5" ),
	];

	
	$args = [
		"label" => __( "type", "picostrap5" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'bs_recipie_category', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "bs_recipie_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "bs_recipie_category", [ "post", "dishes" ], $args );

	/**
	 * Taxonomy: tags.
	 */

	$labels = [
		"name" => __( "tags", "picostrap5" ),
		"singular_name" => __( "tag", "picostrap5" ),
	];

	
	$args = [
		"label" => __( "tags", "picostrap5" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'bs_recipie_tag', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "bs_recipie_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "bs_recipie_tag", [ "bs_recipie" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

