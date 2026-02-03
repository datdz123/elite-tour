<?php

/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gnws
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>
	<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div class="topbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-12">
					<?php
					$icon_location = get_field('icon_location', 'option');
					$title_location = get_field('title_location', 'option');
					?>
					<div class="topbar_add" style="display: flex; align-items: center; gap:2px;">
						<?php if ($icon_location): ?>
							<?php echo wp_get_attachment_image($icon_location, 'full', false, array('alt' => 'Địa chỉ')); ?>

						<?php endif; ?>
						<?php if ($title_location): ?>
							<?php echo esc_html($title_location); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="topbar_list">
						<?php
						if (function_exists('pll_the_languages')) :
							$languages = pll_the_languages(array('raw' => 1, 'hide_if_no_translation' => 0));
							if ($languages) :
								$current_lang = array_filter($languages, function ($l) {
									return $l['current_lang'];
								});
								$current_lang = reset($current_lang);
						?>
								<div class="evo-lang-dropdown" style="position: relative; margin-right: 15px; display: inline-block;">
									<div class="lang-show" style="cursor: pointer; display: flex; align-items: center; gap: 8px; color: #fff; font-size: 14px; padding: 5px 0;">
										<?php if ($current_lang) : ?>
											<img src="<?php echo esc_url($current_lang['flag']); ?>" alt="<?php echo esc_attr($current_lang['name']); ?>" style="width: 20px; height: auto; border-radius: 2px;">
											<span><?php echo esc_html($current_lang['name']); ?></span>
										<?php endif; ?>
										<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										</svg>
									</div>
									<ul class="lang-list" style="position: absolute; top: 100%; left: 0; background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.2); border-radius: 4px; padding: 5px 0; margin: 0; list-style: none; display: none; z-index: 10001; min-width: 140px;">
										<?php foreach ($languages as $lang) : ?>
											<li style="margin: 0;">
												<a href="<?php echo esc_url($lang['url']); ?>" style="display: flex; align-items: center; gap: 10px; padding: 10px 15px; color: #333; text-decoration: none; font-size: 14px; transition: all 0.2s ease;">
													<img src="<?php echo esc_url($lang['flag']); ?>" alt="<?php echo esc_attr($lang['name']); ?>" style="width: 20px; height: auto; border-radius: 2px;">
													<span style="<?php echo $lang['current_lang'] ? 'font-weight: bold; color: #007bff;' : ''; ?>"><?php echo esc_html($lang['name']); ?></span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
								<style>
									.evo-lang-dropdown:hover .lang-list {
										display: block !important;
									}

									.evo-lang-dropdown .lang-list a:hover {
										background: #f8f9fa;
										color: #007bff !important;
									}

									@media (max-width: 991px) {
										.evo-header-mobile {
											display: flex !important;
											align-items: center;
											justify-content: space-between;
										}

										.evo-lang-mobile {
											margin-left: auto;
											margin-right: 15px;
										}

										.evo-lang-mobile .lang-list {
											right: -10px;
											left: auto;
										}
									}
								</style>
						<?php endif;
						endif; ?>
						<?php
						$list_info = get_field('list_info', 'option');
						if ($list_info):
						?>
							<div class="group_phone" style="display: flex; align-items: center; gap:2px;">
								<?php
								$count = count($list_info);
								foreach ($list_info as $index => $info):
								?>
									<a style="display: flex; align-items: center; gap:2px;" href="<?php echo esc_url($info['link_info']); ?>" title="<?php echo esc_attr($info['title_info']); ?>">
										<?php if (!empty($info['icon_info'])): ?>
											<?php echo wp_get_attachment_image($info['icon_info'], 'full', false, array('alt' => 'Hotline')); ?>
										<?php endif; ?>
										<?php echo esc_html($info['title_info']); ?>
									</a>
									<?php if ($index < $count - 1): ?>
										-
									<?php endif; ?>
								<?php endforeach; ?>
							</div>

						<?php endif; ?>

						<?php
						$list_link_info = get_field('list_link_info', 'option');
						if ($list_link_info):
							foreach ($list_link_info as $link_info):
						?>
								<a href="<?php echo esc_url($link_info['link']); ?>" title="<?php echo esc_attr($link_info['title_link']); ?>">
									<?php echo esc_html($link_info['title_link']); ?>
								</a>
						<?php
							endforeach;

						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header class="header">
		<div class="evo-main-nav">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-2 col-12 logo evo-header-mobile">
						<?php
						$site_name = get_bloginfo('name');
						$custom_logo_id = get_theme_mod('custom_logo');
						$logo_url = $custom_logo_id ? wp_get_attachment_image_url($custom_logo_id, 'full') : '';
						?>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="logo-wrapper header_logo" title="<?php echo esc_attr($site_name); ?>">
							<?php if ($logo_url): ?>
								<img src="<?php echo esc_url($logo_url); ?>"
									alt="<?php bloginfo('name'); ?>">

							<?php endif; ?>
						</a>
						<div class="evo-lang-mobile d-lg-none">
							<?php
							if (function_exists('pll_the_languages')) :
								$languages = pll_the_languages(array('raw' => 1, 'hide_if_no_translation' => 0));
								if ($languages) :
									$current_lang = array_filter($languages, function ($l) {
										return $l['current_lang'];
									});
									$current_lang = reset($current_lang);
							?>
									<div class="evo-lang-dropdown" style="position: relative; display: inline-block;">
										<div class="lang-show" style="cursor: pointer; display: flex; align-items: center; gap: 5px; color: #333; font-size: 13px; padding: 5px;">
											<?php if ($current_lang) : ?>
												<img src="<?php echo esc_url($current_lang['flag']); ?>" alt="<?php echo esc_attr($current_lang['name']); ?>" style="width: 18px; height: auto;">
											<?php endif; ?>
											<svg width="8" height="5" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M1 1L5 5L9 1" stroke="#333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</div>
										<ul class="lang-list" style="position: absolute; top: 100%; right: 0; background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.1); border-radius: 4px; padding: 5px 0; margin: 0; list-style: none; display: none; z-index: 10001; min-width: 120px;">
											<?php foreach ($languages as $lang) : ?>
												<li>
													<a href="<?php echo esc_url($lang['url']); ?>" style="display: flex; align-items: center; gap: 10px; padding: 8px 12px; color: #333; text-decoration: none; font-size: 13px;">
														<img src="<?php echo esc_url($lang['flag']); ?>" alt="<?php echo esc_attr($lang['name']); ?>" style="width: 18px; height: auto;">
														<span><?php echo esc_html($lang['name']); ?></span>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
							<?php endif;
							endif; ?>
						</div>

						<button type="button" class="evo-flexitem evo-flexitem-fill d-sm-inline-block d-lg-none"
							id="trigger-mobile" aria-label="Menu Mobile">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="col-lg-9 col-12 ">
						<div class="evo-main-menu d-lg-block d-none">
							<ul id="nav" class="nav">
								<?php
								// Lấy menu theo theme location - Polylang sẽ tự động xử lý theo ngôn ngữ
								$menu_location = 'primary';
								$menu_locations = get_nav_menu_locations();
								$menu_id = isset($menu_locations[$menu_location]) ? $menu_locations[$menu_location] : 0;
								$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : array();

								if ($menu_items) {
									// Tổ chức menu items theo cấp bậc
									$menu_tree = array();
									$menu_items_by_id = array();

									// Đầu tiên, index tất cả items theo ID
									foreach ($menu_items as $item) {
										$menu_items_by_id[$item->ID] = $item;
										$item->children = array();
									}

									// Xây dựng cây menu
									foreach ($menu_items as $item) {
										if ($item->menu_item_parent == 0) {
											$menu_tree[] = $item;
										} else {
											if (isset($menu_items_by_id[$item->menu_item_parent])) {
												$menu_items_by_id[$item->menu_item_parent]->children[] = $item;
											}
										}
									}

									// SVG Arrow cho dropdown
									$arrow_svg = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px"><path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#141414"></path></svg>';

									// Placeholder image

									// Current URL để check active
									$current_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request));

									// Render Level 1 items
									foreach ($menu_tree as $index => $item) {
										$has_children = !empty($item->children);
										$is_active = ($item->url == $current_url || $item->url == home_url('/') && is_front_page()) ? 'active' : '';

										// Get ACF fields cho menu item này
										$choose_style = get_field('choose_style', $item->ID); // true = dropdown đơn giản, false = mega menu
										$icon_menu = get_field('icon_menu', $item->ID);
										$img_menu = get_field('img_menu', 'menu_item_' . $item->ID);

										// Xác định class cho li
										$li_classes = array('nav-item');
										if ($is_active) $li_classes[] = 'active';
										if ($has_children) {
											$li_classes[] = 'has-childs';
											if (!$choose_style) {
												$li_classes[] = 'has-mega';
											}
										}

										// Check nếu là menu cuối thì thêm class evo-hover-left
										if ($index >= count($menu_tree) - 2 && $has_children) {
											$li_classes[] = 'evo-hover-left';
										}

										echo '<li class="' . esc_attr(implode(' ', $li_classes)) . '">';

										// Render link Level 1
										echo '<a href="' . esc_url($item->url) . '" class="nav-link" title="' . esc_attr($item->title) . '">';

										// Icon menu
										if ($icon_menu) {
											echo wp_get_attachment_image($icon_menu, 'thumbnail', false, array('class' => 'icon_nav', 'alt' => esc_attr($item->title)));
										}

										echo esc_html($item->title);

										// Arrow nếu có con
										if ($has_children) {
											echo $arrow_svg;
										}

										echo '</a>';

										// Render children
										if ($has_children) {
											if ($choose_style) {
												// Style 2: Dropdown đơn giản (giống Blog)
												echo '<ul class="dropdown-menu">';
												foreach ($item->children as $child) {
													echo '<li class="nav-item-lv2">';
													echo '<a class="nav-link" href="' . esc_url($child->url) . '" title="' . esc_attr($child->title) . '">' . esc_html($child->title) . '</a>';
													echo '</li>';
												}
												echo '</ul>';
											} else {
												// Style 1: Mega Menu (giống Tour)
												echo '<div class="mega-content">';
												echo '<div class="col-lg-3 no-padding">';
												echo '<ul class="level0">';

												$first_level2 = true;
												foreach ($item->children as $child_index => $child) {
													// Level 2
													$has_grandchildren = !empty($child->children);
													$level2_classes = array('level1', 'item');
													if ($first_level2) {
														$level2_classes[] = 'active';
														$first_level2 = false;
													}
													if ($has_grandchildren) {
														$level2_classes[] = 'parent';
														$level2_classes[] = 'fix-navs';
													}

													echo '<li class="' . esc_attr(implode(' ', $level2_classes)) . '">';
													echo '<a class="hmega" href="' . esc_url($child->url) . '" title="' . esc_attr($child->title) . '"><span>' . esc_html($child->title) . '</span></a>';

													// Level 3 & 4
													if ($has_grandchildren) {
														echo '<div class="evo-sub-cate-1">';
														echo '<div class="row fix-padding">';
														echo '<div class="col-lg-9">';
														echo '<ul class="level1 row">';

														foreach ($child->children as $grandchild) {
															// Level 3
															$has_great_grandchildren = !empty($grandchild->children);

															echo '<li class="level2 col-lg-4">';
															echo '<a href="' . esc_url($grandchild->url) . '" title="' . esc_attr($grandchild->title) . '">' . esc_html($grandchild->title) . '</a>';

															// Level 4
															if ($has_great_grandchildren) {
																echo '<ul class="level3">';
																foreach ($grandchild->children as $great_grandchild) {
																	echo '<li><a href="' . esc_url($great_grandchild->url) . '" title="' . esc_attr($great_grandchild->title) . '">' . esc_html($great_grandchild->title) . '</a></li>';
																}
																echo '</ul>';
															}

															echo '</li>';
														}

														echo '</ul>';
														echo '</div>';

														// Image column - chỉ lấy ảnh của menu cấp 1 (img_menu)
														// Ảnh này hiển thị giống nhau cho tất cả các tab con
														echo '<div class="col-lg-3">';
														echo '<a href="' . esc_url($item->url) . '" title="' . esc_attr($item->title) . '">'; // Link về menu cha
														if ($img_menu) {
															$img_url_src = wp_get_attachment_image_url($img_menu, 'full');
															if ($img_url_src) {
																echo '<img src="' . $img_url_src . '" data-src="' . esc_url($img_url_src) . '" alt="' . esc_attr($item->title) . '" class="lazy img-responsive mx-auto d-block">';
															}
														}
														echo '</a>';
														echo '</div>';

														echo '</div>';
														echo '</div>';
													}

													echo '</li>';
												}

												echo '</ul>';
												echo '</div>';
												echo '</div>';
											}
										}

										echo '</li>';
									}
								}
								?>
							</ul>
						</div>


					</div>
					<div class="col-lg-1 col-12">
						<div class="header_search">
							<img class="header_search_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/search2.png"
								alt="Tìm kiếm">
							<div class="evo-search search-smart ">
								<form action="<?php echo esc_url(home_url('/')); ?>" method="get"
									class="evo-search-form header-search-form input-group search-bar" role="search">
									<div class="input-group">
										<input type="text" aria-label="Nhập tên Tour" name="s"
											class="input-group-field auto-search search-auto form-control"
											placeholder="Nhập từ khóa ..." autocomplete="off">
										<span class="input-group-append">
											<button class="btn btn-default" type="submit" aria-label="Tìm kiếm">
												<svg viewBox="0 0 451 451" style="width:20px;">
													<g fill="#000">
														<path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3
															 s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4
															 C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3
															 s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"></path>
													</g>
												</svg>
											</button>
										</span>
									</div>

								</form>

							</div>
						</div>
					</div>
					<div class="col-lg-4 evo-account-and-cart d-none">
						<div class="evo-cart mini-cart">
							<a href="/cart" title="Giỏ hàng" aria-label="Giỏ hàng" rel="nofollow">
								<svg viewBox="0 0 100 100" data-radium="true" style="width: 25px;">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g transform="translate(-286.000000, -515.000000)" fill="#fff">
											<path
												d="M374.302082,541.184324 C374.044039,539.461671 372.581799,538.255814 370.861517,538.255814 L351.078273,538.255814 L351.078273,530.159345 C351.078273,521.804479 344.283158,515 335.93979,515 C327.596422,515 320.801307,521.804479 320.801307,530.159345 L320.801307,538.255814 L301.018063,538.255814 C299.297781,538.255814 297.835541,539.461671 297.577499,541.184324 L286.051608,610.951766 C285.87958,611.985357 286.137623,613.018949 286.825735,613.794143 C287.513848,614.569337 288.460003,615 289.492173,615 L382.387408,615 L382.473422,615 C384.451746,615 386,613.449612 386,611.468562 C386,611.037898 385.913986,610.693368 385.827972,610.348837 L374.302082,541.184324 L374.302082,541.184324 Z M327.854464,530.159345 C327.854464,525.680448 331.467057,522.062877 335.93979,522.062877 C340.412524,522.062877 344.025116,525.680448 344.025116,530.159345 L344.025116,538.255814 L327.854464,538.255814 L327.854464,530.159345 L327.854464,530.159345 Z M293.62085,608.023256 L304.028557,545.318691 L320.801307,545.318691 L320.801307,565.043066 C320.801307,567.024117 322.349561,568.574505 324.327886,568.574505 C326.30621,568.574505 327.854464,567.024117 327.854464,565.043066 L327.854464,545.318691 L344.025116,545.318691 L344.025116,565.043066 C344.025116,567.024117 345.57337,568.574505 347.551694,568.574505 C349.530019,568.574505 351.078273,567.024117 351.078273,565.043066 L351.078273,545.318691 L367.851024,545.318691 L378.25873,608.023256 L293.62085,608.023256 L293.62085,608.023256 Z">
											</path>
										</g>
									</g>
								</svg>
								<span class="count_item_pr">0</span>
							</a>

						</div>


					</div>
				</div>
			</div>
		</div>
		<div class="backdrop__body-backdrop___1rvky"></div>
		<div class="mobile-main-menu">
			<div class="ul-first-menu clearfix d-none">
				<div><a rel="nofollow" href="/account/login" title="Đăng nhập">Đăng nhập</a></div>
				<div><a rel="nofollow" href="/account/register" title="Đăng ký">Đăng ký</a></div>
			</div>
			<div class="la-scroll-fix-infor-user">
				<ul class="la-nav-list-items">
					<?php
					// Get menu from primary location - same as desktop
					$menu_location = 'primary';
					$menu_locations = get_nav_menu_locations();
					$menu_id = isset($menu_locations[$menu_location]) ? $menu_locations[$menu_location] : 0;
					$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : array();

					if ($menu_items) {
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

						// Arrow SVG icons
						$arrow_svg1 = '<svg class="svg1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px"><path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838"></path></svg>';

						$arrow_svg2 = '<svg class="svg2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px"><path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838"></path></svg>';

						// Render menu items recursively
						function gnws_render_mobile_menu_item($item, $menu_items_by_id, $arrow_svg1, $arrow_svg2, $level = 1)
						{
							$has_children = !empty($item->children);
							$li_class = 'ng-scope';
							if ($has_children) {
								$li_class .= ' ng-has-child' . $level;
							}

							echo '<li class="' . esc_attr($li_class) . '">';
							echo '<a href="' . esc_url($item->url) . '" title="' . esc_attr($item->title) . '">';
							echo esc_html($item->title);
							if ($has_children) {
								echo ($level == 1) ? $arrow_svg1 : $arrow_svg2;
							}
							echo '</a>';

							if ($has_children) {
								$ul_class = ($level == 1) ? 'ul-has-child1' : 'ul-has-child2';
								echo '<ul class="' . esc_attr($ul_class) . '">';
								foreach ($item->children as $child) {
									gnws_render_mobile_menu_item($child, $menu_items_by_id, $arrow_svg1, $arrow_svg2, $level + 1);
								}
								echo '</ul>';
							}

							echo '</li>';
						}

						// Render all top-level items
						foreach ($menu_tree as $item) {
							gnws_render_mobile_menu_item($item, $menu_items_by_id, $arrow_svg1, $arrow_svg2, 1);
						}
					}
					?>
				</ul>
			</div>
			<div class="mobile-support">
				<?php
				// Get hotline from ACF options
				$list_info = get_field('list_info', 'option');
				if ($list_info && is_array($list_info)) {
					foreach ($list_info as $info) {
						if (isset($info['link_info']) && strpos($info['link_info'], 'tel:') !== false) {
							$hotline = $info['title_info'];
							$hotline_link = $info['link_info'];
							break;
						}
					}
				}
				?>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 473.806 473.806" style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve"
					width="20px" height="20px">
					<path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1C420.456,377.706,420.456,388.206,410.256,398.806z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
					<path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11S248.656,111.506,256.056,112.706z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
					<path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
				</svg> Hotline: <a href="<?php echo esc_url($hotline_link); ?>" title="<?php echo esc_attr($hotline); ?>"><?php echo esc_html($hotline); ?></a>
			</div>
		</div>
	</header>

	<style>

		header.header .evo-main-nav .evo-header-mobile #trigger-mobile{
			margin-top: 0 !important;
		}
	</style>