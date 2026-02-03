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
	 * 
	 * @param int|null $post_id Optional. Post ID. Defaults to current post.
	 * @param string $size Optional. Image size. Defaults to 'thumbnail'.
	 * @return string Thumbnail URL or placeholder.
	 */
	function gnws_post_thumbnail($post_id = null, $size = 'thumbnail')
	{
		if (!$post_id) {
			$post_id = get_the_ID();
		}

		if (post_password_required($post_id) || !has_post_thumbnail($post_id)) {
			return get_template_directory_uri() . '/assets/images/placeholder.jpg';
		}

		return get_the_post_thumbnail_url($post_id, $size);
	}
endif;


if (! function_exists('gnws_post_thumbnail_full')) :
	/**
	 * Returns the post thumbnail URL (full size) or a placeholder URL if not available.
	 *
	 * @param int|null $post_id Optional. Post ID. Defaults to current post.
	 * @param string $size Optional. Image size. Defaults to 'full'.
	 * @return string Thumbnail URL or placeholder.
	 */
	function gnws_post_thumbnail_full($post_id = null, $size = 'full')
	{
		if (!$post_id) {
			$post_id = get_the_ID();
		}

		if (post_password_required($post_id) || !has_post_thumbnail($post_id)) {
			return get_template_directory_uri() . '/assets/images/placeholder.jpg';
		}

		return get_the_post_thumbnail_url($post_id, $size);
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
 * Include travel_service custom post type in search results
 */
function gnws_include_travel_service_in_search($query)
{
	if (!is_admin() && $query->is_main_query() && $query->is_search()) {
		$query->set('post_type', array('post', 'travel_service'));
	}
}
add_action('pre_get_posts', 'gnws_include_travel_service_in_search');

/**
 * Filter travel_service archive by departure_from and search keyword
 */
function gnws_filter_travel_service_archive($query)
{
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('travel_service')) {
		// Handle search keyword
		$search = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
		if (!empty($search)) {
			$query->set('s', $search);
		}

		// Handle departure_from filter
		$departure_from = isset($_GET['departure_from']) ? sanitize_text_field($_GET['departure_from']) : '';
		if (!empty($departure_from)) {
			$meta_query = $query->get('meta_query') ?: array();
			$meta_query[] = array(
				'key' => 'departure_from',
				'value' => $departure_from,
				'compare' => '='
			);
			$query->set('meta_query', $meta_query);
		}
	}
}
add_action('pre_get_posts', 'gnws_filter_travel_service_archive');

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

/**
 * Render blog pagination with custom styling (for archive pages)
 */
function gnws_blog_pagination($paged, $max)
{
	$links = array();

	// Add current page to the array
	if ($paged >= 1)
		$links[] = $paged;

	// Add the pages around the current page to the array
	if ($paged >= 3) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if (($paged + 2) <= $max) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	// SVG arrows
	$prev_svg = '<svg viewBox="0 0 100 100" data-radium="true" style="width: 14px;"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-645.000000, -879.000000)" fill="#000"><path d="M743.998989,926.504303 L697.512507,880.032702 C696.909905,879.430293 695.962958,879 695.016011,879 C694.069064,879 693.122117,879.430293 692.519515,880.032702 L646.033033,926.504303 C644.655656,927.881239 644.655656,930.118761 646.033033,931.495697 C646.721722,932.184165 647.582582,932.528399 648.529529,932.528399 C649.476476,932.528399 650.337337,932.184165 651.026025,931.495697 L691.486482,891.048193 L691.486482,975.471601 C691.486482,977.450947 693.036031,979 695.016011,979 C696.995991,979 698.54554,977.450947 698.54554,975.471601 L698.54554,891.048193 L739.005997,931.495697 C740.383374,932.872633 742.621612,932.872633 743.998989,931.495697 C745.376366,930.118761 745.29028,927.881239 743.998989,926.504303 L743.998989,926.504303 Z" transform="translate(695.000000, 929.000000) rotate(-90.000000) translate(-695.000000, -929.000000) "></path></g></g></svg>';

	$next_svg = '<svg viewBox="0 0 100 100" data-radium="true" style="width: 14px;"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-463.000000, -879.000000)" fill="#000"><path d="M561.998989,926.504303 L515.512507,880.032702 C514.909905,879.430293 513.962958,879 513.016011,879 C512.069064,879 511.122117,879.430293 510.519515,880.032702 L464.033033,926.504303 C462.655656,927.881239 462.655656,930.118761 464.033033,931.495697 C464.721722,932.184165 465.582582,932.528399 466.529529,932.528399 C467.476476,932.528399 468.337337,932.184165 469.026025,931.495697 L509.486482,891.048193 L509.486482,975.471601 C509.486482,977.450947 511.036031,979 513.016011,979 C514.995991,979 516.54554,977.450947 516.54554,975.471601 L516.54554,891.048193 L557.005997,931.495697 C558.383374,932.872633 560.621612,932.872633 561.998989,931.495697 C563.376366,930.118761 563.29028,927.881239 561.998989,926.504303 L561.998989,926.504303 Z" id="up-arrow-copy-2" transform="translate(513.000000, 929.000000) rotate(-270.000000) translate(-513.000000, -929.000000) "></path></g></g></svg>';

	echo '<nav class="text-center">';
	echo '<ul class="pagination clearfix">';

	// Previous page link
	if ($paged > 1) {
		echo '<li class="page-item"><a class="page-link" href="' . esc_url(get_pagenum_link($paged - 1)) . '">' . $prev_svg . '</a></li>';
	} else {
		echo '<li class="page-item disabled"><a class="page-link" href="#">' . $prev_svg . '</a></li>';
	}

	// Link to first page, plus ellipses if necessary
	if (!in_array(1, $links)) {
		$class = 1 == $paged ? 'active page-item disabled' : 'page-item';
		echo '<li class="' . $class . '"><a class="page-link" href="' . esc_url(get_pagenum_link(1)) . '" title="1">1</a></li>';

		if (!in_array(2, $links)) {
			echo '<li class="page-item"><a class="page-link" href="" title="...">...</a></li>';
		}
	}

	// Link to current page, plus 2 pages in either direction if necessary
	sort($links);
	foreach ($links as $link) {
		$class = $paged == $link ? 'active page-item disabled' : 'page-item';
		echo '<li class="' . $class . '"><a class="page-link" href="' . esc_url(get_pagenum_link($link)) . '" title="' . $link . '">' . $link . '</a></li>';
	}

	// Link to last page, plus ellipses if necessary
	if (!in_array($max, $links)) {
		if (!in_array($max - 1, $links)) {
			echo '<li class="page-item"><a class="page-link" href="" title="...">...</a></li>';
		}

		$class = $paged == $max ? 'active page-item disabled' : 'page-item';
		echo '<li class="' . $class . '"><a class="page-link" href="' . esc_url(get_pagenum_link($max)) . '" title="' . $max . '">' . $max . '</a></li>';
	}

	// Next page link
	if ($paged < $max) {
		echo '<li class="page-item"><a class="page-link" href="' . esc_url(get_pagenum_link($paged + 1)) . '">' . $next_svg . '</a></li>';
	} else {
		echo '<li class="page-item disabled"><a class="page-link" href="#">' . $next_svg . '</a></li>';
	}

	echo '</ul>';
	echo '</nav>';
}

/**
 * Render sidebar menu from primary navigation
 */
function gnws_render_sidebar_menu()
{
	// Get menu from primary location
	$menu_location = 'primary';
	$menu_locations = get_nav_menu_locations();
	$menu_id = isset($menu_locations[$menu_location]) ? $menu_locations[$menu_location] : 0;
	$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : array();

	if (!$menu_items) return;

	// Build menu tree
	$menu_tree = array();
	$menu_items_by_id = array();

	foreach ($menu_items as $item) {
		$menu_items_by_id[$item->ID] = $item;
		$item->children = array();
	}

	foreach ($menu_items as $item) {
		if ($item->menu_item_parent == 0) {
			$menu_tree[] = $item;
		} else {
			if (isset($menu_items_by_id[$item->menu_item_parent])) {
				$menu_items_by_id[$item->menu_item_parent]->children[] = $item;
			}
		}
	}

	// Current URL for active state
	$current_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request));
?>
	<aside class="aside-item collection-category">
		<div class="aside-title">
			<h3 class="title-head margin-top-0">Danh mục</h3>
		</div>
		<div class="aside-content">
			<ul class="navbar-pills nav-category">
				<?php gnws_render_sidebar_menu_items($menu_tree, $current_url, $menu_items_by_id); ?>
			</ul>
		</div>
	</aside>
	<?php
}

/**
 * Recursively render sidebar menu items
 */
function gnws_render_sidebar_menu_items($items, $current_url, &$menu_items_by_id, $depth = 0)
{
	foreach ($items as $item) {
		$has_children = !empty($item->children);
		$is_active = ($item->url == $current_url) ? 'active' : '';

		$li_classes = array('nav-item');
		if ($is_active) $li_classes[] = 'active';
		if ($has_children && $depth > 0) $li_classes[] = 'dropdown-submenu';
	?>
		<li class="<?php echo esc_attr(implode(' ', $li_classes)); ?>">
			<a class="nav-link" href="<?php echo esc_url($item->url); ?>" title="<?php echo esc_attr($item->title); ?>"><?php echo esc_html($item->title); ?></a>
			<?php if ($has_children) : ?>
				<span class="Collapsible__Plus"></span>
				<ul class="dropdown-menu">
					<?php gnws_render_sidebar_menu_items($item->children, $current_url, $menu_items_by_id, $depth + 1); ?>
				</ul>
			<?php endif; ?>
		</li>
	<?php
	}
}

/**
 * Render featured posts section
 */
function gnws_render_featured_posts()
{
	// Query featured posts
	$featured_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 6,
		'meta_query' => array(
			array(
				'key' => 'feature_post',
				'value' => '1',
				'compare' => '='
			)
		),
		'orderby' => 'date',
		'order' => 'DESC'
	);

	$featured_query = new WP_Query($featured_args);

	if (!$featured_query->have_posts()) return;
	?>
	<aside class="aside-item top-news margin-top-20">
		<div class="aside-title">
			<h3 class="title-head margin-top-0"><a href="<?php echo esc_url(home_url('/kinh-nghiem-du-lich')); ?>" title="Bài viết nổi bật">Bài viết nổi bật</a></h3>
		</div>

		<?php
		while ($featured_query->have_posts()) : $featured_query->the_post();



			$thumbnail = gnws_post_thumbnail(get_the_ID(), 'thumbnail');

		?>
			<article class="item clearfix">
				<div class="thumb">
					<a class="imgWrap pt_67 mb_10 img--cover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<span class="imgWrap-item">
							<img src="<?php echo esc_url($thumbnail); ?>" data-src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive center-block loaded" data-was-processed="true">
						</span>
					</a>
				</div>
				<div class="info">
					<h4 class="title usmall"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
				</div>
			</article>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
	</aside>
<?php
}
