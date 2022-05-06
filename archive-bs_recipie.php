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
?>
<div class="py-6 bg-light">
    <div class="container text-center">
        <h1 class="display-4">Recepie</h1>

    </div>
</div>

<div class="container">
    <div class="row">
       




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
                    <img style="height:500px; width:400px;" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                    <h4><?php the_title(); ?></h4><?php
                                                the_excerpt();?>
              </div>
                <?php endif;

               
                                            endwhile;
                                                ?>
        </div>

        <div class="col-md-1 pt-5 order-1">
            <?php
            // get_sidebar();
            ?>
        </div>

    </div>
</div>
<?php $categories = get_terms(['taxonomy' => 'bs_recipie_cat']); ?>

<ul>
    <?php foreach ($categories as $key => $category) { ?>
        <li>
            <a href="<?php echo esc_url(get_term_link($category)); ?>">
                <?php echo esc_html($category->name); ?>
            </a>
        </li>
    <?php } ?>
</ul>

<?php get_footer();
