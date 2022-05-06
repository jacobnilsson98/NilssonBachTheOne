<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


//vars 
$featured_image = get_field('featured_image');
$servings = get_field('servings');
$ingredients = get_field('ingredients');
$instructions = get_field('instructions');

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    
    if (get_the_post_thumbnail_url()){ 
        ?><div class="d-flex container-fluid" style="height:50vh;background:url(<?php echo get_the_post_thumbnail_url(); ?>)  center / cover no-repeat;"></div>
    <?php } else {
        ?><div class="d-flex container-fluid" style="height:20vh;"></div>
    <?php } ?>
    
    

    	</div><!-- #content -->
	<?php if( $featured_image ): ?>
			<img class="featured_image" src="<?php echo $featured_image['url']; ?>" alt="<?php echo $featured_image['alt']; ?>" />
		<?php endif; ?>

		<?php if( $servings ): ?>
		<pre><?php echo print_r($servings);?></pre>
		<?php endif; ?>

		<?php if( $ingredients ): ?>
		<pre><?php echo print_r($ingredients);?></pre>
		<?php endif; ?>

		<?php if( $instructions ): ?>
		<?php echo print_r($instructions);?>
		<?php endif; ?>



<?php
    endwhile;
 else :
     _e( 'Sorry, no posts matched your criteria.', 'picostrap' );
 endif;
 ?>


 

<?php get_footer();
