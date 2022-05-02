<?php

/**
 ** The template for displaying the FAQ page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fetch
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				<?php fetch_theme_post_thumbnail(); ?>
			</header>

			<div class="entry-content">
				<?php
				the_content();

				$taxonomy = 'fetch-faq-type';
				$terms    = get_terms(
					array(
						'taxonomy' => $taxonomy,
						'order'    => 'ASC',
						'orderby'  => 'slug',
					)
				);
				?>
				<div class="faq-category-wrapper">
					<?php if ($terms && !is_wp_error($terms)) : ?>
						<?php foreach ($terms as $term) : ?>
							<?php
							$args = array(
								'post_type'      => 'fetch-faq',
								'posts_per_page' => -1,
								'order'          => 'ASC',
								'orderby'        => 'title',
								'tax_query'      => array(
									array(
										'taxonomy' => $taxonomy,
										'field'    => 'slug',
										'terms'    => $term->slug,
									)
								),
							);

							$query = new WP_Query($args);
							//Output FAQ Category List
							?>
							<?php if ($query->have_posts()) : ?>
								<section class='faq-category <?php echo $term->slug; ?>'>
									<h2><?php echo $term->name; ?></h2>
									<?php while ($query->have_posts()) :
										$query->the_post();
										if (function_exists('get_field')) :
											if (get_field('faq_answer')) : ?>
												<details class="faq-single-post">
													<summary><?php echo get_the_title(); ?></summary>
													<p class="faq-single-answer"><?php the_field('faq_answer'); ?></p>
												</details>
									<?php endif;
										endif;
									endwhile;
									wp_reset_postdata(); ?>
								</section>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<p class="question"><strong>Still have questions? </strong><a class="faq-contact-button" href="<?php the_permalink(19); ?>">Contact Us</a></p>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
