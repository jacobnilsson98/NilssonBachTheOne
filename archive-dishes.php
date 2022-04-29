<?php
/**
 * Template Name: Template: archive
 *
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
get_header(); ?>
<div class="container-dishes">           
    <?php
        if(have_posts()) : 
        while(have_posts()) : the_post();?>
            <div class="single-dishes-archive">

            
            <div class="dishes-img">
            <?php 
            $image = get_field('featured_image');
            if( !empty( $image ) ): ?>
            <img width="370" height="493" img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            </div>
            
            

            <div class="dishes-title">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            </div>
</div>

<?php endwhile; endif;
?>



<?
get_footer();

?>


