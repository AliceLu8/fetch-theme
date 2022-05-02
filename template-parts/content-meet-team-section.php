<?php

/**
 * Template part for displaying sections of Staff on the Meet the Team page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fetch
 */

?>

<!-- $args passed in by get_template_part -->

<?php
$queryArgs = array(
	'post_type'              => array('fetch-staff'), // use any for any kind of post type, custom post type slug for custom post type
	'post_status'            => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
	'posts_per_page'         => '-1', // use -1 for all post
	'order'                  => 'DESC', // Also support: ASC
	'orderby'                => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
	'tax_query'              => array(
		array(
			'taxonomy'         => 'fetch-staff-type', // taxonomy slug
			'terms'            => $args['slug'], // term ids
			'field'            => 'slug', // Also support: slug, name, term_taxonomy_id
			'operator'         => 'IN', // Also support: AND, NOT IN, EXISTS, NOT EXISTS
			'include_children' => true,
		),
	),
);
$query = new WP_Query($queryArgs);

?>

<?php if ($query->have_posts()) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ($query->have_posts()) : $query->the_post(); ?>
		<article class="meet-team-container">
			<?php if (function_exists('get_field')) : ?>
				<?php if (get_field('photo_field')) :
					echo wp_get_attachment_image(get_field('photo_field'), ('portrait'));
				endif; ?>
				<div class="staff-intro">
					<h3><?php the_title(); ?></h3>
					<?php if (get_field('role_field')) : ?>
						<h4><?php echo the_field('role_field'); ?></h4>
					<?php endif; ?>
					<?php if (get_field('description_field')) : ?>
						<p><?php echo the_field('description_field'); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="ctas-wrapper">
				<div class="profile-container">
					<!-- Need to output a a tag that links to this users individual page -->
					<a class="view-profile" href="<?php the_permalink(); ?>">View Profile</a>
				</div>
				<div class="booking-container">
					<!-- Link to Woocommerce-shop-single walk booking -->
					<?php
					$firstName = explode(" ", get_the_title())[0]
					?>
					<?php if ($args['slug'] === "walker") : ?>
						<a class="book-a-walk" href="<?php echo get_permalink(116); ?>"><?php echo "Book " . $firstName; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>