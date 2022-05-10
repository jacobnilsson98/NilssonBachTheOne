<?php
/**
 * Template Name: Template: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="home-hero">
<div class="hero-text">
<h1><?php _e( 'Create Recipes', 'picostrap5' ); ?></h1>
<p><?php _e( 'Explore, discover and be inspired', 'picostrap5' ); ?></p>
  </div>
    
</div>

<div class="break">
    <div class="break-latest">
    <p><?php _e( 'latest recipes', 'picostrap5' ); ?></p>
    </div>
</div>

<div class="home-recipes">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="recipe-action">
                <div class="recipe-image1"></div>
                <div class="title">
                <h3><?php _e( 'SHOYU RAMEN', 'picostrap5' ); ?></h3>
                    
                    <p><?php _e( 'Looking for ways to use all the fresh produce springing up? Weve got over....', 'picostrap5' ); ?></p>
                    <a href="/bs_recipie"><p><?php _e( 'READ MORE', 'picostrap5' ); ?></p></a>
                </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="recipe-action">
                <div class="recipe-image2"></div>
                <div class="title">
                <h3><?php _e( 'HONEYDEW TEA', 'picostrap5' ); ?></h3>
                <p><?php _e( 'Parmesan cheese adds a salty, savory component to sweet, tender asparagus....', 'picostrap5' ); ?></p>
                <a href="/bs_recipie"><p><?php _e( 'READ MORE', 'picostrap5' ); ?></p></a>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="recipe-action">
                <div class="recipe-image3"></div>
                <div class="title">
                <h3><?php _e( 'CREMEAT', 'picostrap5' ); ?></h3>
                <p><?php _e( 'Get your chips ready for the best guacamole recipes including the classic....', 'picostrap5' ); ?></p>
                <a href="/bs_recipie"><p><?php _e( 'READ MORE', 'picostrap5' ); ?></p></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
