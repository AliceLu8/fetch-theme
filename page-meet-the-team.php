<?php

/**
 * The template for displaying the staff page (Meet Our Team) 
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

	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				<?php fetch_theme_post_thumbnail(); ?>
			</header><!-- .entry-header -->


			<div class="entry-content">
				<!-- Here I need the ACF field description -->
				<?php if (function_exists('get_field')) : ?>
					<?php if (get_field('description_field')) : ?>
						<p><?php the_field('description_field'); ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<!-- Owner Team Section -->
				<div class="owner">
					<?php
					get_template_part('template-parts/content', 'meet-team-section', array('slug' => 'owner'));
					?>
					<!-- END Owner Team Section -->
				</div>

				<!-- Office Team Section -->
				<div class="office-staff-wrapper">
					<h2>Meet our lovely office staff</h2>
					<section class="staff-item">
						<?php
						get_template_part('template-parts/content', 'meet-team-section', array('slug' => 'office'));
						?>
					</section>
					<!-- END Office Team Section -->
				</div>

				<div class="walker-wrapper">
					<h2>Meet our local dog walkers</h2>
					<section class="walker-item">
						<?php
						get_template_part('template-parts/content', 'meet-team-section', array('slug' => 'walker'));
						?>
					</section>
					<!-- END Walker Team Section -->
				</div>
				<!-- Walker Team Section -->
			</div><!-- .entry-content -->

			<?php if (get_edit_post_link()) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Edit <span class="screen-reader-text">%s</span>', 'fetch-theme'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</article><!-- #post-<?php the_ID(); ?> -->





	<?php endwhile; ?>
</main><!-- #main -->

<?php
get_footer();
