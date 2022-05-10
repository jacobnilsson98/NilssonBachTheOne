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

?>

<div class="py-6 bg-light">
    <div class="container text-center">
        <h1 class="display-4">	
<h1><?php _e( 'Dish', 'picostrap5' ); ?></h1>

    </div>
</div>

<?php

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    
    if (get_the_post_thumbnail_url()){ 
        ?>
        
        <div class="d-flex container-fluid" style="height:60vh;background:url(<?php echo get_the_post_thumbnail_url(); ?>)  center / cover no-repeat;"></div>
    <?php } else {
        
        ?>
  
        
        


    <?php } ?>
    
    

    	




        <!-- servings -->

        
        <div class="row">
        <div class="col-lg-12">
            <div class="detail text-center text-muted mb-5 mt-5">
		<?php if( $servings ): ?>
            <h3><?php _e( 'Servings', 'picostrap5' ); ?></h3>
		<?php echo print_r($servings);?>
        
		<?php endif; ?>
        </div>
        </div>
        </div>


            



        <!-- instructions -->


        <section class="section"> 
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h3 class="text-dark"><?php _e( 'Instructions', 'picostrap5' ); ?></h3>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="detail mt-2 p-4">
                <div class="detail-desc">
                <?php if( $instructions ): ?>
           
		<?php echo print_r($instructions);?>
        
		<?php endif; ?>
		        
                </div>
            </div>
        </div>
    </div>


        <!-- ingredients -->

        <section class="section"> 
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h3 class="text-dark"><?php _e( 'Ingredients', 'picostrap5' ); ?></h3>
        </div>
    </div>
        
        <div class="row">
        <div class="col-lg-12">
            <div class="detail text-center text-muted mb-5 mt-5">
                <div class="detail-ingredient">
		<?php if( $ingredients ): ?>
                
		        <?php echo print_r($ingredients);?>
		        <?php endif; ?>
        </div>
        </div>
        </div>
        </div>
       

        
        </section>
        
        
        



         <!-- Show the tag/s on the specific recipe-->
 
         <?php 
        $taxonomy = 'bs_recipie_tag';
        $terms = get_object_term_cache( $post->ID, $taxonomy );
        if( ! empty( $terms)){
            echo "<h3>Category/Tag</h3>";
            $output = '';

        foreach($terms as $term) {
            if(!empty($output))
            $output .= ' | ';
            $output .= '<span class="cat"><a href="'. esc_url( get_term_link( $term)). '">'.$term->name.'</a></span>';
        }
        echo $output;
        }
        ?>

<!-- category -->

<?php foreach ( $cats as $cat ): ?>

<a href="<?php echo get_category_link($cat->cat_ID); ?>">
<?php echo $cat->name; ?>
</a>

<?php endforeach; ?>
            


<?php
    endwhile;
 else :
     _e( 'Sorry, no posts matched your criteria.', 'picostrap' );
 endif;
 ?>


 

<?php get_footer();
