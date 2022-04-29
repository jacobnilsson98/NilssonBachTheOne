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

<div class="break">
    <div class="break-latest">
        latest recipes
    </div>
</div>

<div class="home-recipes">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="recipe-action">
                <div class="recipe-image1"></div>
                <div class="title">
                    <h3>SHOYU RAMEN</h3>
                    <p>Den här drinken är utan tvekan den perfekta pricken över i:et av esmorzaret, samtidigt som den är en...</p>
                    <a href="#">READ MORE</a>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="recipe-action">
                <div class="recipe-image2"></div>
                <div class="title">
                    <h3>HONEYDEW TEA</h3>
                    <p>Den här drinken är utan tvekan den perfekta pricken över i:et av esmorzaret, samtidigt som den är en...</p>
                    <a href="#">READ MORE</a>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="recipe-action">
                <div class="recipe-image3"></div>
                <div class="title">
                    <h3>CREMAET</h3>
                    <p>Den här drinken är utan tvekan den perfekta pricken över i:et av esmorzaret, samtidigt som den är en...</p>
                    <a href="#">READ MORE</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
