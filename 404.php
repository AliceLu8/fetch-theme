<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fetch
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e("Aw, heck! That page doesn't exist!", 'fetch-theme'); ?></h1>
			<p>Sorry, the page you were looking for could not be found.</p>
			<?php echo wp_get_attachment_image(540, 'full'); ?>
		</header><!-- .page-header -->

		<div class="page-content">
			<p class="user-options">Maybe the <a href="<?php home_url(); ?>">home page</a> has what you're looking for. If not, <a href="<?php the_permalink(19); ?>">give us a shout!</a></p>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
