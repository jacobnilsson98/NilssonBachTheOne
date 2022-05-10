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
defined('ABSPATH') || exit;

get_header();


$the_post_id   = get_the_ID();
$article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'bs_recipie_tag' ] );








if ( empty( $article_terms ) || ! is_array( $article_terms ) ) {
	return;
}
?>

<div class="py-6 bg-light">
    <div class="container text-center">
        <h1 class="display-4">Recepie</h1>

    </div>
</div>

<div class="d-flex justify-content-center">
    <div style="padding-inline: 16px; "class="row" >
       




            <?php
            $args = array(
                'post_type' => 'bs_recipie',
                'post_status' => 'publish',
                'posts_per_page' => 8,
                'order' => 'ASC',
            );

            $loop = new WP_Query($args);

            while ($loop->have_posts()) : $loop->the_post();
            ?><div class="col-md-4 py-5 order-2"> <?php
                $image = get_field('featured_image');
                if (!empty($image)) : ?>
                    <img class="recipe_img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                    <h4><?php the_title(); ?></h4>










    <div class="entry-footer mt-4">
	<?php
	foreach ( $article_terms as $key => $article_term ) {
		?>
		<a class="entry-footer-link text-black-50 btn border border-secondary mb-2 mr-2" href="<?php echo esc_url( get_term_link( $article_term ) ); ?>">
				<?php echo esc_html( $article_term->name ); ?>
		</a>
		<?php
	}
	?>
</div>
<?php
the_excerpt();?>
</div>
<?php endif;

               
endwhile;
?>
        </div>

       

    </div>
</div>




<?php get_footer();
