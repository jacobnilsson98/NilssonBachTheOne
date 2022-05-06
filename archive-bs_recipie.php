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
defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="py-6 bg-light">
    <div class="container text-center">
        <h1 class="display-4"><?php the_title(); ?></h1>
        
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9 py-5 order-2">
            <?php 
$image = get_field('featured_image');
if( !empty( $image ) ): ?>
<img style="height:500px; width:400px;" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>

<h4><?php the_title(); ?></h4>
<?php
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            else :
                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
            endif;
            ?>
        </div>

        <div class="col-md-3 pt-5 order-1">
            <?php 
            get_sidebar();
            ?>
        </div>

    </div>
</div>


<?php get_footer();




            