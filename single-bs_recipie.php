<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();


//vars 
$featured_image = get_field('featured_image');
$servings = get_field('servings');
$ingredients = get_field('ingredients');
$instructions = get_field('instructions');
$instructions = get_field('instructions');
$cats = get_the_category($id);


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

 <!-- Show the tag/s on the specific recipe-->
 
        <?php 
        $taxonomy = 'bs_recipie_tag';
        $terms = get_object_term_cache( $post->ID, $taxonomy );
        if( ! empty( $terms)){
            echo "<h3>Recipe Categories</h3>";
            $output = '';

        foreach($terms as $term) {
            if(!empty($output))
            $output .= ' | ';
            $output .= '<span class="cat"><a href="'. esc_url( get_term_link( $term)). '">'.$term->name.'</a></span>';
        }
        echo $output;
        }
        ?>



        <div class="d-flex justify-content-center">
		<?php if( $servings ): ?>
            <div class="servings"><h3><?php _e( 'Servings', 'picostrap5' ); ?></h3>
		<div class="amount_servings"><?php echo print_r($servings);?></div>
        </div>
		<?php endif; ?>
        </div>

        <div class="d-flex justify-content-center">
		<?php if( $ingredients ): ?>
            <div class="ingredients"><h3><?php _e( 'Ingredients', 'picostrap5' ); ?></h3>
		<div class="amount_ingredients"></div><?php echo print_r($ingredients);?></div>
        </div>
		<?php endif; ?>
        </div>

        <div class="d-flex justify-content-center">
            <div class="instructions-container"
		<?php if( $instructions ): ?>
            <div class="instuctions"><h3><?php _e( 'Instructions', 'picostrap5' ); ?></h3>
		<div class="amount_instructions"></div><?php echo print_r($instructions);?></div>
        </div>
		<?php endif; ?>
        </div>

        <?php foreach ( $cats as $cat ): ?>

        <a href="<?php echo get_category_link($cat->cat_ID); ?>">
        <?php echo $cat->name; ?>
        </a>

        <?php endforeach; ?>

        

        
        
        </div>
            


<?php
    endwhile;
 else :
     _e( 'Sorry, no posts matched your criteria.', 'picostrap' );
 endif;
 ?>


 

<?php get_footer();
