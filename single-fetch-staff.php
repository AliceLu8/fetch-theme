<?php

/**
 * The template for displaying all single staff posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fetch
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php while (have_posts()) :
		the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php fetch_theme_post_thumbnail(); ?>

			<div class="entry-content">

				<!-- Here I need the ACF field description -->
				<article class="single-staff-container">
					<?php if (function_exists('get_field')) : ?>
						<?php if (get_field('photo_field')) :
							echo wp_get_attachment_image(get_field('photo_field'), 'portrait');
						endif; ?>
						<div class="single-staff-intro">
							<h3><?php the_title(); ?></h3>
							<?php if (get_field('role_field')) : ?>
								<h4><?php the_field('role_field'); ?></h4>
							<?php endif; ?>
							<?php
							$firstName = explode(" ", get_the_title())[0];
							if (get_field('role_field')) :
								if (get_field('role_field') === 'Walker') :
							?>
							<?php
								endif;
							endif;
							?>
							<?php if (get_field('description_field')) : ?>
								<p><?php the_field('description_field'); ?></p>
							<?php endif; ?>

							<div class="book-btn">
								<a class="book-a-walk single-btn" href="<?php echo get_permalink(116); ?>"><?php echo "Book " . $firstName; ?></a>
							</div>
						</div>
					<?php endif; ?>
				</article>

				<!-- Shortcode for random testimonial for each walker -->
				<?php echo do_shortcode('[fetch_testimonial featuredorstaff="staff"]'); ?>


			</div>
		</article>

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
