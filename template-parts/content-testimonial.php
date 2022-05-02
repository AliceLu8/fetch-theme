<?php

/**
 * Template part for displaying a testimonial
 * 
 * Depending on parameters, a query is performed to find random testimonials that either:
 * Match the id of the current staff member page 
 * Have a taxonomy category of 'featured'
 * 
 * The first result is rendered to the page, and then an 'early return'
 * prevents the while loop from continuing.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fetch
 */

?>
<?php if ($args['featuredOrStaff'] === "featured") : ?>

    <?php
    $queryArgs = array(
        'post_type'              => array('fetch-testimonial'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status'            => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page'         => '-1', // use -1 for all post
        'order'                  => 'DESC', // Also support: ASC
        'orderby'                => 'rand', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
        'tax_query'              => array(
            array(
                'taxonomy'         => 'fetch-featured', // taxonomy slug
                'field'            => 'slug', // Also support: slug, name, term_taxonomy_id
                'terms'            => "featured", // term ids
            ),
        ),
    );
    $query = new WP_Query($queryArgs);
    ?>
<?php endif; ?>
<?php if ($args['featuredOrStaff'] === "staff") : ?>
    <?php
    $staffId = get_the_ID();
    $queryArgs = array(
        'post_type'              => array('fetch-testimonial'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status'            => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page'         => '-1', // use -1 for all post
        'order'                  => 'DESC', // Also support: ASC
        'orderby'                => 'rand', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
    );
    $query = new WP_Query($queryArgs);
    ?>
<?php endif; ?>
<?php while ($query->have_posts()) : $query->the_post();
    if (function_exists('get_field')) :
        if ($args['featuredOrStaff'] === "staff") :
            if (get_field('walker_field')) :
                if (get_field('walker_field')[0] === $staffId) : ?>
                    <div class="testimonial-container">
                        <article class="testimonial">
                            <!-- text -->
                            <?php if (get_field('text_field')) : ?>
                                <p class="testimonial-text"><?php the_field('text_field'); ?></p>
                            <?php endif; ?>
                            <!-- name -->
                            <?php if (get_field('name_field')) : ?>
                                <p class="testimonial-name"><?php the_field('name_field'); ?></p>
                            <?php endif; ?>
                        </article>
                    </div>
            <?php wp_reset_postdata();
                    return;
                endif;
            // <!-- Early return so only 1 is rendered -->
            endif;
        endif;
        if ($args['featuredOrStaff'] === "featured") : ?>
            <div class="testimonial-container">
                <h3>Testimonial</h3>
                <div class="testimonial">
                    <!-- text -->
                    <?php if (get_field('text_field')) : ?>
                        <p class="testimonial-text"><?php the_field('text_field'); ?></p>
                    <?php endif; ?>
                    <!-- name -->
                    <?php if (get_field('name_field')) : ?>
                        <p class="testimonial-name"><?php the_field('name_field'); ?></p>
                    <?php endif; ?>
                    <!-- photo -->
                </div>
            </div>
<?php wp_reset_postdata();
            return;
        // <!-- Early return so only 1 is rendered -->
        endif;
    endif;
    wp_reset_postdata();
endwhile; ?>