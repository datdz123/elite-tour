<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package gnws
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gnws_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (! is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (! is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'gnws_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function gnws_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'gnws_pingback_header');

if (! function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;

/**
 * Function help call file SVG from assets/svg
 */
function svg($name, $width = false, $height = false, $class = '')
{
	$dir = TEMPLATEPATH . '/assets/svg/';
	$path = $dir . $name . '.svg';

	if ($name && file_exists($path)) {
		$svg = file_get_contents($path);
		if ($width || $height || $class) {
			$size = '<svg';
			$new_size = '<svg';
			if ($width) {
				$new_size .= ' width="' . $width . 'px"';
			}
			if ($height) {
				$new_size .= ' height="' . $height . 'px"';
			}
			if ($class) {
				$new_size .= ' class="' . esc_attr($class) . '"';
			}
			$svg = str_replace($size, $new_size, $svg);
		}
		return $svg;
	}
	return '';
}
/**
 * Function help call file SVG from url
 */
// function svg_dir( $path, $width = false, $height = false ) {
// 	if ( $path ) {
// 		$svg = file_get_contents( $path );
// 		if ( $width ) {
// 			$size = '<svg';
// 			$new_size = '<svg width="' . $width . 'px"';
// 			$svg = str_replace( $size, $new_size, $svg );
// 		}
// 		if ( $height ) {
// 			$size = '<svg';
// 			$new_size = '<svg height="' . $height . 'px"';
// 			$svg = str_replace( $size, $new_size, $svg );
// 		}
// 		return $svg;
// 	}
// 	return '';
// }

if (! function_exists('gnws_post_thumbnail')) :
	/**
	 * Returns the post thumbnail URL or a placeholder URL if not available.
	 */
	function gnws_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
			return get_stylesheet_directory_uri() . '/assets/svg/placeholder.svg';
		} else {
			return get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
		}
	}
endif;


if (! function_exists('gnws_post_thumbnail_full')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function gnws_post_thumbnail_full()
	{
		if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
			return get_stylesheet_directory_uri() . '/assets/svg/placeholder.svg';
		} else {
			return get_the_post_thumbnail_url(get_the_ID(), 'full');
		}
	}
endif;

/**
 * Displays pagination style by number page
 */
function gnws_pagination()
{

	if (is_singular())
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ($wp_query->max_num_pages <= 1)
		return;

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max = intval($wp_query->max_num_pages);

	/** Add current page to the array */
	if ($paged >= 1)
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="gnws-pagination"><ul>' . "\n";

	/** Previous Post Link */
	if (get_previous_posts_link())
		printf('<li>%s</li>' . "\n", get_previous_posts_link(svg('angle-left')));

	/** Link to first page, plus ellipses if necessary */
	if (! in_array(1, $links)) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

		if (! in_array(2, $links))
			echo '<li>…</li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort($links);
	foreach ((array) $links as $link) {
		$class = $paged == $link ? ' class="active"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
	}

	/** Link to last page, plus ellipses if necessary */
	if (! in_array($max, $links)) {
		if (! in_array($max - 1, $links))
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
	}

	/** Next Post Link */
	if (get_next_posts_link())
		printf('<li>%s</li>' . "\n", get_next_posts_link(svg('angle-right')));

	echo '</ul></div>' . "\n";
}


/**
 * Displays exceprt by number string
 * How to use: echo excerpt(x) width x is number length
 */
function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return strip_tags($excerpt);
}

/**
 * Check Link
 * If not return javascript:void(0)
 */

function check_link($value)
{
	if ($value) {
		return $value;
	} else {
		return 'javascript:void(0)';
	}
}

/**
 * Modify main query for taxonomy_travel archive pages
 * This fixes 404 issue on pagination and handles sorting
 */
function gnws_travel_taxonomy_query($query)
{
	if (! is_admin() && $query->is_main_query() && is_tax('taxonomy_travel')) {
		$query->set('post_type', 'travel_service');
		$query->set('posts_per_page', 12);

		// Handle sorting
		$orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : '';

		switch ($orderby) {
			case 'alpha-asc':
				$query->set('orderby', 'title');
				$query->set('order', 'ASC');
				break;
			case 'alpha-desc':
				$query->set('orderby', 'title');
				$query->set('order', 'DESC');
				break;
			case 'price-asc':
				$query->set('meta_key', 'tour_price');
				$query->set('orderby', 'meta_value_num');
				$query->set('order', 'ASC');
				break;
			case 'price-desc':
				$query->set('meta_key', 'tour_price');
				$query->set('orderby', 'meta_value_num');
				$query->set('order', 'DESC');
				break;
			default:
				// Default: newest first
				$query->set('orderby', 'date');
				$query->set('order', 'DESC');
				break;
		}
	}
}
add_action('pre_get_posts', 'gnws_travel_taxonomy_query');

/**
 * Displays pagination for taxonomy archives with Bootstrap style
 * Uses same logic as gnws_pagination but with different styling
 */
function gnws_taxonomy_pagination()
{
	if (is_singular())
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ($wp_query->max_num_pages <= 1)
		return;

	$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
	$max = intval($wp_query->max_num_pages);
	$links = array();

	/** Add current page to the array */
	if ($paged >= 1)
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

?>
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-12 margin-top-20 fix-pag">
			<nav class="text-center">
				<ul class="pagination clearfix">
					<?php
					// Previous page link
					if ($paged > 1) :
					?>
						<li class="page-item"><a class="page-link" href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>" title="«">«</a></li>
					<?php else : ?>
						<li class="page-item disabled"><a class="page-link" href="#" title="«">«</a></li>
					<?php endif; ?>

					<?php
					// Link to first page, plus ellipses if necessary
					if (! in_array(1, $links)) :
						$class = 1 == $paged ? 'active page-item disabled' : 'page-item';
					?>
						<li class="<?php echo $class; ?>"><a class="page-link" href="<?php echo esc_url(get_pagenum_link(1)); ?>" title="1">1</a></li>
						<?php
						if (! in_array(2, $links)) :
						?>
							<li class="page-item disabled"><a class="page-link" href="javascript:;" title="...">...</a></li>
						<?php
						endif;
					endif;

					// Link to current page, plus 2 pages in either direction if necessary
					sort($links);
					foreach ((array) $links as $link) :
						$class = $paged == $link ? 'active page-item disabled' : 'page-item';
						?>
						<li class="<?php echo $class; ?>"><a class="page-link" href="<?php echo esc_url(get_pagenum_link($link)); ?>" title="<?php echo $link; ?>"><?php echo $link; ?></a></li>
					<?php endforeach; ?>

					<?php
					// Link to last page, plus ellipses if necessary
					if (! in_array($max, $links)) :
						if (! in_array($max - 1, $links)) :
					?>
							<li class="page-item disabled"><a class="page-link" href="javascript:;" title="...">...</a></li>
						<?php
						endif;
						$class = $paged == $max ? 'active page-item disabled' : 'page-item';
						?>
						<li class="<?php echo $class; ?>"><a class="page-link" href="<?php echo esc_url(get_pagenum_link($max)); ?>" title="<?php echo $max; ?>"><?php echo $max; ?></a></li>
					<?php endif; ?>

					<?php
					// Next page link
					if ($paged < $max) :
					?>
						<li class="page-item"><a class="page-link" href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>" title="»">»</a></li>
					<?php else : ?>
						<li class="page-item disabled"><a class="page-link" href="#" title="»">»</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
	</div>
<?php
}
