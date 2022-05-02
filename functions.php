<?php

/**
 * Fetch functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fetch
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fetch_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Fetch, use a find and replace
		* to change 'fetch-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('fetch-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header' => esc_html__('Header Menu Location', 'fetch-theme'),
			'footer' => esc_html__('Footer Menu Location', 'fetch-theme'),
			'footer-extended' => esc_html__('Footer Ext. Menu Location', 'fetch-theme'),
			'social' => esc_html__('Social Menu Location', 'fetch-theme'),
			'legal' => esc_html__('Legal Menu Location', 'fetch-theme')

		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fetch_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// For custom photo size
	add_theme_support('post-thumbnails');

	// Custom Crop sizes for meet the team page
	add_image_size('portrait', 300, 350, true);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Registers an editor stylesheet for the theme.
	 */
	function fetch_theme_add_editor_styles()
	{
		add_editor_style('custom-editor-style.css');
	}
	add_action('admin_init', 'fetch_theme_add_editor_styles');
}
add_action('after_setup_theme', 'fetch_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fetch_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('fetch_theme_content_width', 640);
}
add_action('after_setup_theme', 'fetch_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fetch_theme_widgets_init()
{

	register_sidebar(
		array(
			'name'          => esc_html__('woo search', 'fetch-theme'),
			'id'            => 'woo-search',
			'description'   => esc_html__('Add widgets here.', 'fetch-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Best Sellers', 'fetch-theme'),
			'id'            => 'woo-best-sellers',
			'description'   => esc_html__('Add widgets here.', 'fetch-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'fetch_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function fetch_theme_scripts()
{
	wp_enqueue_style('fetch-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('fetch-theme-style', 'rtl', 'replace');

	wp_enqueue_script('fetch-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,300&display=swap', false);
}
add_action('wp_enqueue_scripts', 'fetch_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * Load CPT and Taxonomies file
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

function fetch_shortcode_init()
{
	add_shortcode('fetch_testimonial', 'fetch_render_testimonial');
	add_shortcode('fetch_business_info', 'fetch_render_business_info');
}
add_action("init", "fetch_shortcode_init");

function fetch_render_testimonial($atts)
{
	$a = shortcode_atts(array(
		'featuredorstaff' => 'featured',
	), $atts);
	ob_start();
	get_template_part('template-parts/content', 'testimonial', array('featuredOrStaff' => $a['featuredorstaff']));
	return ob_get_clean();
}

function fetch_render_business_info()
{
	ob_start();
	get_template_part('template-parts/content', 'business-info');
	return ob_get_clean();
}

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

// Move Yoast to bottom
function wpcover_move_yoast()
{
	return 'low';
}
add_filter('wpseo_metabox_prio', 'wpcover_move_yoast');

//Wordpress Dashboard Orgnizing
function custom_menu_order($menu_order)
{
	if (!$menu_order) return true;
	return array(
		'index.php',						//Dashboard	
		'edit.php?post_type=fetch-staff',	//Staff
		'edit.php?post_type=fetch-testimonial', //Testimonials
		'edit.php?post_type=fetch-faq', 	//FAQ
		'upload.php',						//Media
		'admin.php?page=acf-options',		//Options
		'admin.php?page=wc-admin',			//Woocommerce
		'edit.php?post_type=product',		//Products
		'edit.php?post_type=wc_booking',	//Bookinngs
		'admin.php?page=jetpack#/dashboard', //Jetpack
		'admin.php?page=wc-admin&path=/analytics/overview',	//Analytics
		'admin.php?page=wc-admin&path=/marketing',	//Marketing
		'options-general.php',				//Settings		
		'plugins.php',						//Plugins
		'tools.php',						//Tools
		'admin.php?page=login-customizer-settings', //Login Customeizer
		'users.php',						//Users
		'admin.php?page=sg-security',		//SG Security
		'admin.php?page=sbi-feed-builder',	//Instagram Feed				
		'admin.php?page=wp-google-maps-menu', 	//Maps
		'edit.php', 						//Posts
		'edit.php?post_type=page',			//Pages
		'edit-comments.php', 				//Comeents
		'edit.php?post_type=product',		//Feedback
		'themes.php',						//Apperence
		'admin.php?page=sg-cachepress',		//SG Optimizer
		'admin.php?page=wpforms-overview',	//WPForms
		'edit.php?post_type=acf-field-group',	//Custom Fields	
		'admin.php?page=wpseo_dashboard',	//SEO	
		'admin.php?page=smart-slider3',		//Smart Slider							
	);
}

add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'custom_menu_order');

//Wordpress Dashboard remove menu for non admin user
function fetch_remove_menus()
{
	if (!current_user_can('manage_options')) {
		remove_menu_page('edit-comments.php');					 // Comments
		remove_menu_page('edit.php');							 // Posts
		remove_menu_page('edit.php?post_type=page');             // Pages
		remove_menu_page('admin.php?page=wpforms-overview');     // WP Forms
		remove_menu_page('themes.php');                          // Appearance
		remove_menu_page('edit.php?post_type=acf-field-group');  // Custom Fields
		remove_menu_page('admin.php?page=wpseo_dashboard');      // SEO
		remove_menu_page('admin.php?page=smart-slider3');        // Smart Slider
		remove_menu_page('admin.php?page=sg-cachepress');        // SG Optimizer
	}
}
add_action('admin_menu', 'fetch_remove_menus');


/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function new_widget_function_video()
{
	echo '<video controls width="100%" height="600px" src="' . wp_get_attachment_url(577) . '" title="Fetch Tutorial Video" ></video>';
	echo '<a href='.wp_get_attachment_url(577).'>Download Video</a>';
}

function new_widget_function_doc()
{
	echo '<a href='.wp_get_attachment_url(575).'>Download PDF</a>';
}

function wporg_add_dashboard_widgets()
{
	// Add widgets to the left side
	wp_add_dashboard_widget(
		'widget_tutorial_video1',
		'Fetch Handbook Video',
		'new_widget_function_video',
	);

	wp_add_dashboard_widget(
		'widget_tutorial_doc',
		'Fetch Operation Manual',
		'new_widget_function_doc',
	);
}
add_action('wp_dashboard_setup', 'wporg_add_dashboard_widgets');



/**
 * Remove a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function wporg_remove_all_dashboard_metaboxes()
{
	// Remove Welcome panel
	remove_action('welcome_panel', 'wp_welcome_panel');
	// Remove the rest of the dashboard widgets
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('health_check_status', 'dashboard', 'normal');
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
	remove_meta_box('dashboard_activity', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes');
