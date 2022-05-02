<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fetch
 */

?>

<footer id="colophon" class="site-footer">
	<nav id="mobile-navigation" class="mobile-navigation">
		<?php
		// so i need a ul
		// with 4 items:
		// 1. home
		// 2. search
		// 3. cart
		// 4. hamburger menu
		?>
		<ul>
			<li class="mobile-home">
				<a aria-label="View the home page" href="<?php echo home_url(); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
						<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
					</svg></a>
			</li>
			<li class="mobile-search">
				<button aria-label="Search for products">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
					</svg>
				</button>
			</li>
			<li class="mobile-cart">
				<a aria-label="View your shopping cart" href="<?php the_permalink(24); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-basket2" viewBox="0 0 24 24">
					<path d="M10 20.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.304-17l-3.431 14h-2.102l2.541-11h-16.812l4.615 13h13.239l3.474-14h2.178l.494-2h-4.196z"/></svg>
					</svg>
					<?php
					if (function_exists('fetch_theme_woocommerce_cart_items')) {
						fetch_theme_woocommerce_cart_items();
					}
					?>
				</a>
			</li>
			<li class="mobile-hamburger">
				<button aria-label="Open the mobile navigation menu">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
					</svg>
				</button>
			</li>
		</ul>
		<?php
		?>
	</nav><!-- #site-navigation -->
	<?php dynamic_sidebar('woo-search'); ?>
	<!-- Adding Extended Navigation -->
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'footer-extended',
			'footer-extended'        => 'footer-extended-menu',
		)
	);
	?>
	<!--------------------------------------- *BUSINESS INFO SECTION OF FOOTER* --------------------------------------------------------------->
	<section class="business-info">
		<article class="hours-operation-container">
			<h2>Hours of Operation:</h2>
			<?php if (function_exists('get_field')) : ?>
				<?php if (get_field("hours_of_operation", 'option')) : ?>
					<p><?php the_field("hours_of_operation", 'option'); ?></p>
				<?php endif; ?>
		</article>

		<article class="contact-us">
			<h2>Contact Us</h2>
			<div class="footer-icon-container footer-phone">
				<?php if (get_field('phone_field', 19)) : ?>
					<a href="tel:+16045551234" rel="noopener noreferrer" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
							<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
						</svg>
						<p class="phone-num"><?php the_field('phone_field', 'option'); ?></p>
					</a>
				<?php endif; ?>
			</div>
			<div class="footer-icon-container footer-email">
				<?php if (get_field('email_field', 19)) : ?>
					<a href="mailto:contact@fetch.ca" rel="noopener noreferrer" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
							<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
						</svg>
						<p class="email"><?php the_field('email_field', 'option'); ?></p>
					</a>
				<?php endif; ?>
			</div>
		</article>
		<article class="follow-us">
			<h2>Follow Us</h2>
			<div class="footer-icon-container footer-instagram">
				<a href="https://www.instagram.com/fetchpaw/" target="_blank" rel="noopener noreferrer">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
						<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
					</svg>
				</a>
			</div>
			<div class="footer-icon-container footer-facebook">
				<a href="https://www.facebook.com/" rel="noopener noreferrer" target="_blank">
					<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
						<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
					</svg>
				</a>
			</div>
		</article><!-- .footer-menus -->
	<?php endif; ?>
	</section><!-- Footer Contact -->
	<section class="site-info">
		<p>&copy
			<span class='site-info-year'> <?php echo date('Y'); ?></span>
			<span class='site-info-sitename'>Linus Luo, Randy Gulak, Ciaran McGuigan, Alice Lu</span>
		</p>
		<nav id="footer-navigation" class="footer-navigation">
			<?php wp_nav_menu(array('theme_location' => 'legal')); ?>
		</nav>
	</section><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>