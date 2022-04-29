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
    <h1>CREATE RECIPES</h1>
    <p>Explore, discover and be inspired</p>
  </div>
    
</div>

<div class="home-recipes">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="recipe"></div>
            </div>
            <div class="col-lg-4">
                <div class="recipe"></div>
            </div>
            <div class="col-lg-4">
                <div class="recipe"></div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
