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
        ?>
        
        <div class="d-flex container-fluid" style="height:50vh;background:url(<?php echo get_the_post_thumbnail_url(); ?>)  center / cover no-repeat;"></div>
    <?php } else {
        
        ?>
        <div class="py-6 bg-light">
    <div class="container text-center">
        <h1 class="display-4"><?php the_title(); ?></h1>
        
  </div>
</div><div class="d-flex container-fluid" style="height:20vh;"></div>
        
        


    <?php } ?>
    
    

    	</div><!-- #content -->

        <div class="d-flex justify-content-center">
            <div class="image-container">
	<?php if( $featured_image ): ?>
			<img class="image" src="<?php echo $featured_image['url']; ?>" alt="<?php echo $featured_image['alt']; ?>" />
		<?php endif; ?>
            </div>
        </div>

        <div class="d-flex justify-content-center">
		<?php if( $servings ): ?>
            <div class="servings"><h3>Servings</h3>
		<div class="amount_servings"><pre><?php echo print_r($servings);?></pre></div>
        </div>
		<?php endif; ?>
        </div>

        <div class="d-flex justify-content-center">
		<?php if( $ingredients ): ?>
            <div class="ingredients"><h3>Ingredients</h3>
		<div class="amount_ingredients"></div><pre><?php echo print_r($ingredients);?></pre></div>
        </div>
		<?php endif; ?>
        </div>

        <div class="d-flex justify-content-center">
            <div class="instructions-container"
		<?php if( $instructions ): ?>
            <div class="instuctions"><h3>Instructions</h3>
		<div class="amount_instructions"></div><?php echo print_r($instructions);?></div>
        </div>
		<?php endif; ?>
        </div>
        </div>
            


<?php
    endwhile;
 else :
     _e( 'Sorry, no posts matched your criteria.', 'picostrap' );
 endif;
 ?>


 

<?php get_footer();
