<?php

/**
 * Template Name: recipie archive
 *
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.



get_header(); ?>

<div class="py-6 bg-light">
    <div class="container text-center">
        <h1 class="display-4">	
<h1><?php _e( 'Recipe', 'picostrap5' ); ?></h1>

    </div>
</div>

  <?php if (have_posts()) : ?>
   <?php while (have_posts()) : the_post(); ?>
   <div class="container">
    <div class="col-md-12 col-lg-12">
        <article class="post vt-post">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
                    <div class="post-type post-img">
  <!-- img -->
  <div class="img-container">
   <?php the_post_thumbnail(); ?>
  </div>
   </div>
   <!-- Category + date -->
   <div class="author-info author-info-2">
                        <ul class="list-inline">
                            <li>


     <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
     <p class="postmetadata">
Category: <?php the_category(', ') ?> 



    <!-- tags -->
<?php 
        $taxonomy = 'bs_recipie_tag';
        $terms = get_object_term_cache( $post->ID, $taxonomy );
        if( ! empty( $terms)){
            echo "<p>Tags:</p>", $output = '';

        foreach($terms as $term) {
            if(!empty($output))
            $output .= ' | ';
            $output .= '<span class="cat"><a href="'. esc_url( get_term_link( $term)). '">'.$term->name.'</a></span>';
        }
        echo $output;
        }
        ?>   
 </li>
                        </ul>
                    </div>
                </div>

 <!-- title -->
 <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                    <div class="caption">
                <h2 id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


<!-- content -->

<div class="p-content">
<?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>
</div>
</div>
    </article>
    </div>




</div>
      
    <?php endwhile; ?>
    
<?php else : ?>
  <h2 class="center">Not Found</h2>
 <p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>

