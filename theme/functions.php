<?php

/**
 * gnws functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gnws
 */
$random_ver = rand(1, 1000000000);
if (! defined('GNWS_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('GNWS_VERSION', $random_ver);
}

if (! defined('GNWS_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `gnws_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'GNWS_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (! function_exists('gnws_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gnws_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gnws, use a find and replace
		 * to change 'gnws' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('gnws', get_template_directory() . '/languages');

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

		// This theme uses wp_nav_menu() in multiple locations.
		register_nav_menus(
			array(
				'primary' => __('Menu Chính', 'gnws'),


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

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height' => 250,
				'width' => 250,
				'flex-width' => true,
				'flex-height' => true,
			)
		);

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'gnws_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gnws_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Footer', 'gnws'),
			'id' => 'sidebar-1',
			'description' => __('Add widgets here to appear in your footer.', 'gnws'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'gnws_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gnws_scripts()
{
	if (class_exists('WPCF7')) {
		wp_enqueue_style('gnws-alert', get_template_directory_uri() . '/assets/alert/css/cf7simplepopup-core.css', array(), GNWS_VERSION);
		wp_enqueue_script('gnws-jquery_alert', get_template_directory_uri() . '/assets/alert/js/cf7simplepopup-core.js', array(), GNWS_VERSION, true);
		wp_enqueue_script('gnws-jquery_alert_main', get_template_directory_uri() . '/assets/alert/js/sweetalert.js', array(), GNWS_VERSION, true);
	}

	// CSS Files
	// wp_enqueue_style('gnws-style', get_stylesheet_uri(), array(), GNWS_VERSION);
	wp_enqueue_style('gnws-bootstrap', get_template_directory_uri() . '/assets/css/bootstrapmin.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-slick', get_template_directory_uri() . '/assets/css/slick.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-index', get_template_directory_uri() . '/assets/css/evo-index.scss.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-main', get_template_directory_uri() . '/assets/css/evo-main.scss.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-ae-multilang', get_template_directory_uri() . '/assets/css/ae-multilang-custom.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-style-update', get_template_directory_uri() . '/assets/css/style_update.scss.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-css-font', get_template_directory_uri() . '/assets/fonts/font.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-collections', get_template_directory_uri() . '/assets/css/evo-collections.scss.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-products', get_template_directory_uri() . '/assets/css/evo-products.scss.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-blog', get_template_directory_uri() . '/assets/css/evo-blog.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-post', get_template_directory_uri() . '/assets/css/evo-post.css', array(), GNWS_VERSION);
	wp_enqueue_style('gnws-evo-lightbox', get_template_directory_uri() . '/assets/css/lightbox.css', array(), GNWS_VERSION);

	// JS Files
	wp_enqueue_script('jquery');
	wp_enqueue_script('gnws-swiper-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), GNWS_VERSION, true);
	// wp_enqueue_script('gnws-api-jquery', get_template_directory_uri() . '/assets/js/api.jquery.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-api-jquery', get_template_directory_uri() . '/assets/js/api.jquery.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-script', get_template_directory_uri() . '/js/script.min.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-datepicker', get_template_directory_uri() . '/assets/js/date.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-evo-index', get_template_directory_uri() . '/assets/js/evo-index-js.js', array('jquery', 'gnws-slick-js'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-evo-wishlist', get_template_directory_uri() . '/assets/js/evo-wishlist.js', array('jquery'), GNWS_VERSION, true);
	wp_localize_script('gnws-script', 'ajaxurl', array('ajaxurl' => admin_url('admin-ajax.php')));
	wp_enqueue_script('gnws-evo-product', get_template_directory_uri() . '/assets/js/evo-product.js', array('jquery', 'gnws-slick-js'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-evo-lightbox', get_template_directory_uri() . '/assets/js/jquery-prettyphoto.js', array('jquery'), GNWS_VERSION, true);
	wp_enqueue_script('gnws-evo-lightbox-init', get_template_directory_uri() . '/assets/js/jquery-prettyphoto-init.js', array('jquery'), GNWS_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'gnws_scripts');


/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function gnws_tinymce_add_class($settings)
{
	$settings['body_class'] = GNWS_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'gnws_tinymce_add_class');

/**
 * Custom Navigation Walker.
 */

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer Wordpress.
 */
require get_template_directory() . '/inc/customizer-wp.php';

/**
 * Customizer Widget.
 */
require get_template_directory() . '/inc/customizer-widget.php';


/**
 * Customizer Block.
 */
require get_template_directory() . '/inc/customizer-block.php';
/**
 * Hide Custom Theme
 */
// define('DISALLOW_FILE_EDIT', true);
// add_filter('acf/settings/show_admin', '__return_false');
// Ẩn "Theme File Editor" khỏi menu Appearance
// add_action('admin_menu', function () {
//     remove_submenu_page('themes.php', 'theme-editor.php');
// }, 999);

/**
 * Remove parent slug from taxonomy_travel (for travel_service post type)
 */
add_filter('term_link', 'gnws_no_term_parents_taxonomy_travel', 1000, 3);
function gnws_no_term_parents_taxonomy_travel($url, $term, $taxonomy)
{
	if ($taxonomy == 'taxonomy_travel') {
		$term_nicename = $term->slug;
		$url = trailingslashit(get_option('home')) . user_trailingslashit($term_nicename, 'category');
	}
	return $url;
}



// Add custom taxonomy_travel rewrite rules
function gnws_no_taxonomy_travel_parents_rewrite_rules($flash = false)
{
	$terms = get_terms(array(
		'taxonomy' => 'taxonomy_travel',
		'hide_empty' => false,
	));
	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$term_slug = $term->slug;
			add_rewrite_rule($term_slug . '/?$', 'index.php?taxonomy_travel=' . $term_slug, 'top');
			add_rewrite_rule($term_slug . '/page/([0-9]{1,})/?$', 'index.php?taxonomy_travel=' . $term_slug . '&paged=$matches[1]', 'top');
			add_rewrite_rule($term_slug . '/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?taxonomy_travel=' . $term_slug . '&feed=$matches[1]', 'top');
		}
	}
	if ($flash == true)
		flush_rewrite_rules(false);
}
add_action('init', 'gnws_no_taxonomy_travel_parents_rewrite_rules');

/**
 * Remove parent slug from taxonomy_khoi_hanh
 */
add_filter('term_link', 'gnws_no_term_parents_taxonomy_khoi_hanh', 1000, 3);
function gnws_no_term_parents_taxonomy_khoi_hanh($url, $term, $taxonomy)
{
	if ($taxonomy == 'taxonomy_khoi_hanh') {
		$term_nicename = $term->slug;
		$url = trailingslashit(get_option('home')) . user_trailingslashit($term_nicename, 'category');
	}
	return $url;
}

// Add custom taxonomy_khoi_hanh rewrite rules
function gnws_no_taxonomy_khoi_hanh_parents_rewrite_rules($flash = false)
{
	$terms = get_terms(array(
		'taxonomy' => 'taxonomy_khoi_hanh',
		'hide_empty' => false,
	));
	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$term_slug = $term->slug;
			add_rewrite_rule($term_slug . '/?$', 'index.php?taxonomy_khoi_hanh=' . $term_slug, 'top');
			add_rewrite_rule($term_slug . '/page/([0-9]{1,})/?$', 'index.php?taxonomy_khoi_hanh=' . $term_slug . '&paged=$matches[1]', 'top');
			add_rewrite_rule($term_slug . '/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?taxonomy_khoi_hanh=' . $term_slug . '&feed=$matches[1]', 'top');
		}
	}
	if ($flash == true)
		flush_rewrite_rules(false);
}
add_action('init', 'gnws_no_taxonomy_khoi_hanh_parents_rewrite_rules');

// Fix 404 when creating/editing/deleting taxonomy_khoi_hanh terms
add_action('create_term', 'gnws_taxonomy_khoi_hanh_term_edit_success', 10, 3);
add_action('edit_terms', 'gnws_taxonomy_khoi_hanh_term_edit_success', 10, 2);
add_action('delete_term', 'gnws_taxonomy_khoi_hanh_term_edit_success', 10, 3);
function gnws_taxonomy_khoi_hanh_term_edit_success($term_id, $tt_id_or_taxonomy = '', $taxonomy = '')
{
	$tax = is_string($tt_id_or_taxonomy) && !is_numeric($tt_id_or_taxonomy) ? $tt_id_or_taxonomy : $taxonomy;
	if ($tax == 'taxonomy_khoi_hanh' || empty($tax)) {
		gnws_no_taxonomy_khoi_hanh_parents_rewrite_rules(true);
	}
}




// Fix 404 when creating/editing/deleting taxonomy_travel terms
add_action('create_term', 'gnws_taxonomy_travel_term_edit_success', 10, 3);
add_action('edit_terms', 'gnws_taxonomy_travel_term_edit_success', 10, 2);
add_action('delete_term', 'gnws_taxonomy_travel_term_edit_success', 10, 3);
function gnws_taxonomy_travel_term_edit_success($term_id, $tt_id_or_taxonomy = '', $taxonomy = '')
{
	// Handle different hook signatures
	$tax = is_string($tt_id_or_taxonomy) && !is_numeric($tt_id_or_taxonomy) ? $tt_id_or_taxonomy : $taxonomy;
	if ($tax == 'taxonomy_travel' || empty($tax)) {
		gnws_no_taxonomy_travel_parents_rewrite_rules(true);
	}
}

/**
 * Remove parent slug from category (for post)
 */
add_filter('term_link', 'gnws_no_term_parents_category', 1000, 3);
function gnws_no_term_parents_category($url, $term, $taxonomy)
{
	if ($taxonomy == 'category') {
		$term_nicename = $term->slug;
		$url = trailingslashit(get_option('home')) . user_trailingslashit($term_nicename, 'category');
	}
	return $url;
}

// Add custom category rewrite rules
function gnws_no_category_parents_rewrite_rules($flash = false)
{
	$terms = get_terms(array(
		'taxonomy' => 'category',
		'hide_empty' => false,
	));
	if ($terms && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$term_slug = $term->slug;
			add_rewrite_rule($term_slug . '/?$', 'index.php?category_name=' . $term_slug, 'top');
			add_rewrite_rule($term_slug . '/page/([0-9]{1,})/?$', 'index.php?category_name=' . $term_slug . '&paged=$matches[1]', 'top');
			add_rewrite_rule($term_slug . '/(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?category_name=' . $term_slug . '&feed=$matches[1]', 'top');
		}
	}
	if ($flash == true)
		flush_rewrite_rules(false);
}
add_action('init', 'gnws_no_category_parents_rewrite_rules');

// Fix 404 when creating/editing/deleting category terms
add_action('create_term', 'gnws_category_term_edit_success', 10, 3);
add_action('edit_terms', 'gnws_category_term_edit_success', 10, 2);
add_action('delete_term', 'gnws_category_term_edit_success', 10, 3);
function gnws_category_term_edit_success($term_id, $tt_id_or_taxonomy = '', $taxonomy = '')
{
	// Handle different hook signatures
	$tax = is_string($tt_id_or_taxonomy) && !is_numeric($tt_id_or_taxonomy) ? $tt_id_or_taxonomy : $taxonomy;
	if ($tax == 'category' || empty($tax)) {
		gnws_no_category_parents_rewrite_rules(true);
	}
}

/**
 * Remove 'travel_service' slug from travel_service post type URLs
 */
add_filter('post_type_link', 'gnws_remove_travel_service_slug', 10, 2);
function gnws_remove_travel_service_slug($post_link, $post)
{
	if ($post->post_type === 'travel_service' && $post->post_status === 'publish') {
		$post_link = home_url('/' . $post->post_name . '/');
	}
	return $post_link;
}

// Add rewrite rules for travel_service posts
function gnws_travel_service_rewrite_rules($flash = false)
{
	$posts = get_posts(array(
		'post_type' => 'travel_service',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'fields' => 'ids',
	));

	if ($posts && !empty($posts)) {
		foreach ($posts as $post_id) {
			$post_slug = get_post_field('post_name', $post_id);
			if ($post_slug) {
				add_rewrite_rule(
					$post_slug . '/?$',
					'index.php?travel_service=' . $post_slug,
					'top'
				);
			}
		}
	}

	if ($flash == true) {
		flush_rewrite_rules(false);
	}
}
add_action('init', 'gnws_travel_service_rewrite_rules');

// Flush rewrite rules when travel_service post is saved/updated/deleted
add_action('save_post_travel_service', 'gnws_travel_service_flush_rules', 10, 1);
add_action('delete_post', 'gnws_travel_service_delete_flush_rules', 10, 1);

function gnws_travel_service_flush_rules($post_id)
{
	if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
		return;
	}
	gnws_travel_service_rewrite_rules(true);
}

function gnws_travel_service_delete_flush_rules($post_id)
{
	if (get_post_type($post_id) === 'travel_service') {
		gnws_travel_service_rewrite_rules(true);
	}
}

/**
 * Remove 'galley_img' slug from galley_img post type URLs
 */
add_filter('post_type_link', 'gnws_remove_galley_img_slug', 10, 2);
function gnws_remove_galley_img_slug($post_link, $post)
{
	if ($post->post_type === 'galley_img' && $post->post_status === 'publish') {
		$post_link = home_url('/' . $post->post_name . '/');
	}
	return $post_link;
}

// Add rewrite rules for galley_img posts
function gnws_galley_img_rewrite_rules($flash = false)
{
	$posts = get_posts(array(
		'post_type' => 'galley_img',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'fields' => 'ids',
	));

	if ($posts && !empty($posts)) {
		foreach ($posts as $post_id) {
			$post_slug = get_post_field('post_name', $post_id);
			if ($post_slug) {
				add_rewrite_rule(
					$post_slug . '/?$',
					'index.php?galley_img=' . $post_slug,
					'top'
				);
			}
		}
	}

	if ($flash == true) {
		flush_rewrite_rules(false);
	}
}
add_action('init', 'gnws_galley_img_rewrite_rules');

// Flush rewrite rules when galley_img post is saved/updated/deleted
add_action('save_post_galley_img', 'gnws_galley_img_flush_rules', 10, 1);

function gnws_galley_img_flush_rules($post_id)
{
	if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
		return;
	}
	gnws_galley_img_rewrite_rules(true);
}

// Extend delete flush to handle galley_img
add_action('delete_post', function ($post_id) {
	if (get_post_type($post_id) === 'galley_img') {
		gnws_galley_img_rewrite_rules(true);
	}
}, 10, 1);
