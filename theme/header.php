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
							<img class="header_search_img" src="images/search2.png" alt="Tìm kiếm">
							<div class="evo-search search-smart ">
								<form action="/search" method="get"
									class="evo-search-form header-search-form input-group search-bar" role="search">
									<div class="input-group">
										<input type="text" aria-label="Nhập tên Tour" name="query"
											class="input-group-field auto-search search-auto form-control"
											placeholder="Nhập từ khóa ..." autocomplete="off">
										<input type="hidden" name="type" value="product,article">
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
					<li class="ng-scope">
						<a href="/" title="TRANG CHỦ">TRANG CHỦ</a>
					</li>
					<li class="ng-scope ng-has-child1">
						<a href="/tour" title="Tour">Tour <svg class="svg1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656"
								style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px"
								height="25px">
								<path
									d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
									data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838">
								</path>
							</svg></a>
						<ul class="ul-has-child1">
							<li class="ng-scope ng-has-child2">
								<a href="/tour-trong-nuoc" title="Tour Trong Nước">Tour Trong Nước <svg class="svg2"
										xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										x="0px" y="0px" viewBox="0 0 490.656 490.656"
										style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px"
										height="25px">
										<path
											d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
											data-original="#000000" class="active-path" data-old_color="#000000"
											fill="#383838"></path>
									</svg></a>
								<ul class="ul-has-child2">
									<li class="ng-scope">
										<a href="/tour-mien-bac" title="Tour Miền Bắc">Tour Miền Bắc</a>
									</li>
									<li class="ng-scope">
										<a href="/tour-mien-trung" title="Tour Miền Trung">Tour Miền Trung</a>
									</li>
									<li class="ng-scope">
										<a href="/tour-mien-nam" title="Tour Miền Nam">Tour Miền Nam</a>
									</li>
								</ul>
							</li>
							<li class="ng-scope ng-has-child2">
								<a href="/tour-nuoc-ngoai" title="Tour Nước Ngoài">Tour Nước Ngoài <svg class="svg2"
										xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										x="0px" y="0px" viewBox="0 0 490.656 490.656"
										style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px"
										height="25px">
										<path
											d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
											data-original="#000000" class="active-path" data-old_color="#000000"
											fill="#383838"></path>
									</svg></a>
								<ul class="ul-has-child2">
									<li class="ng-scope">
										<a href="/dong-nam-a" title="Đông Nam Á">Đông Nam Á</a>
									</li>
									<li class="ng-scope">
										<a href="/dong-a" title="Đông Á">Đông Á</a>
									</li>
									<li class="ng-scope">
										<a href="/nam-a" title="Nam Á">Nam Á</a>
									</li>
									<li class="ng-scope">
										<a href="/tay-a" title="Tây Á">Tây Á</a>
									</li>
									<li class="ng-scope">
										<a href="/chau-uc" title="Châu Úc">Châu Úc</a>
									</li>
									<li class="ng-scope">
										<a href="/chau-phi" title="Châu Phi">Châu Phi</a>
									</li>
									<li class="ng-scope">
										<a href="/chau-my" title="Châu Mỹ">Châu Mỹ</a>
									</li>
									<li class="ng-scope">
										<a href="/chau-au" title="Châu Âu">Châu Âu</a>
									</li>
								</ul>
							</li>
							<li class="ng-scope">
								<a href="/tour-xuyen-viet" title="Tour Xuyên Việt">Tour Xuyên Việt</a>
							</li>
						</ul>
					</li>
					<li class="ng-scope ng-has-child1">
						<a href="/combo-du-lich" title="COMBO">COMBO <svg class="svg1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656"
								style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px"
								height="25px">
								<path
									d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
									data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838">
								</path>
							</svg></a>
						<ul class="ul-has-child1">
							<li class="ng-scope">
								<a href="/combo-du-lich-da-lat" title="Combo du lịch Đà Lạt">Combo du lịch Đà Lạt</a>
							</li>
							<li class="ng-scope">
								<a href="/combo-du-lich-phu-quoc" title="Combo du lịch Phú Quốc">Combo du lịch Phú Quốc</a>
							</li>
							<li class="ng-scope">
								<a href="/combo-du-lich-quy-nhon" title="Combo du lịch Quy Nhơn">Combo du lịch Quy Nhơn</a>
							</li>
							<li class="ng-scope">
								<a href="/combo-du-lich-nha-trang" title="Combo du lịch Nha Trang">Combo du lịch Nha
									Trang</a>
							</li>
							<li class="ng-scope">
								<a href="/combo-du-lich-sapa" title="Combo du lịch Sapa">Combo du lịch Sapa</a>
							</li>
							<li class="ng-scope">
								<a href="/combo-du-lich-ha-long" title="Combo du lịch Hạ Long">Combo du lịch Hạ Long</a>
							</li>
						</ul>
					</li>
					<li class="ng-scope ng-has-child1">
						<a href="/khach-san" title="KHÁCH SẠN">KHÁCH SẠN <svg class="svg1"
								xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
								y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
								xml:space="preserve" width="25px" height="25px">
								<path
									d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
									data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838">
								</path>
							</svg></a>
						<ul class="ul-has-child1">
							<li class="ng-scope ng-has-child2">
								<a href="/khach-san-mien-bac" title="Khách sạn Miền Bắc">Khách sạn Miền Bắc <svg
										class="svg2" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
										xml:space="preserve" width="25px" height="25px">
										<path
											d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
											data-original="#000000" class="active-path" data-old_color="#000000"
											fill="#383838"></path>
									</svg></a>
								<ul class="ul-has-child2">
									<li class="ng-scope">
										<a href="/khach-san-ha-noi" title="Khách sạn Hà Nội">Khách sạn Hà Nội</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-hai-phong" title="Khách sạn Hải Phòng">Khách sạn Hải Phòng</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-sapa" title="Khách sạn Sapa">Khách sạn Sapa</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-ha-long" title="Khách sạn Hạ Long">Khách sạn Hạ Long</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-ninh-binh" title="Khách sạn Ninh Bình">Khách sạn Ninh Bình</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-moc-chau" title="Khách sạn Mộc Châu">Khách sạn Mộc Châu</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-ha-giang" title="Khách sạn Hà Giang">Khách sạn Hà Giang</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-lao-cai" title="Khách sạn Lào Cai">Khách sạn Lào Cai</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-phu-tho" title="Khách sạn Phú Thọ">Khách sạn Phú Thọ</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-cao-bang" title="Khách sạn Cao Bằng">Khách sạn Cao Bằng</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-dien-bien" title="Khách sạn Điện Biên">Khách sạn Điện Biên</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-quang-ninh" title="Khách sạn Quảng Ninh">Khách sạn Quảng
											Ninh</a>
									</li>
								</ul>
							</li>
							<li class="ng-scope ng-has-child2">
								<a href="/khach-san-mien-trung" title="Khách sạn Miền Trung">Khách sạn Miền Trung <svg
										class="svg2" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
										xml:space="preserve" width="25px" height="25px">
										<path
											d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
											data-original="#000000" class="active-path" data-old_color="#000000"
											fill="#383838"></path>
									</svg></a>
								<ul class="ul-has-child2">
									<li class="ng-scope">
										<a href="/khach-san-nha-trang" title="Khách sạn Nha Trang">Khách sạn Nha Trang</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-da-nang" title="Khách sạn Đà Nẵng">Khách sạn Đà Nẵng</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-quy-nhon" title="Khách sạn Quy Nhơn">Khách sạn Quy Nhơn</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-thanh-hoa" title="Khách sạn Thanh Hóa">Khách sạn Thanh Hóa</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-phu-yen" title="Khách sạn Phú Yên">Khách sạn Phú Yên</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-hue" title="Khách sạn Huế">Khách sạn Huế</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-quang-tri" title="Khách sạn Quảng Trị">Khách sạn Quảng Trị</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-ninh-thuan" title="Khách sạn Ninh Thuận">Khách sạn Ninh
											Thuận</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-hoi-an" title="Khách sạn Hội An">Khách sạn Hội An</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-da-lat" title="Khách sạn Đà Lạt">Khách sạn Đà Lạt</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-binh-thuan" title="Khách sạn Bình Thuận">Khách sạn Bình
											Thuận</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-tay-nguyen" title="Khách sạn Tây Nguyên">Khách sạn Tây
											Nguyên</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-quang-ngai" title="Khách sạn Quảng Ngãi">Khách sạn Quảng
											Ngãi</a>
									</li>
								</ul>
							</li>
							<li class="ng-scope ng-has-child2">
								<a href="/khach-san-mien-nam" title="Khách sạn Miền Nam">Khách sạn Miền Nam <svg
										class="svg2" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
										xml:space="preserve" width="25px" height="25px">
										<path
											d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
											data-original="#000000" class="active-path" data-old_color="#000000"
											fill="#383838"></path>
									</svg></a>
								<ul class="ul-has-child2">
									<li class="ng-scope">
										<a href="/khach-san-phu-quoc" title="Khách sạn Phú Quốc">Khách sạn Phú Quốc</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-con-dao" title="Khách sạn Côn Đảo">Khách sạn Côn Đảo</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-can-tho" title="Khách sạn Cần Thơ">Khách sạn Cần Thơ</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-sai-gon" title="Khách sạn Sài Gòn">Khách sạn Sài Gòn</a>
									</li>
									<li class="ng-scope">
										<a href="/khach-san-mien-tay" title="Khách sạn Miền Tây">Khách sạn Miền Tây</a>
									</li>
								</ul>
							</li>
							<li class="ng-scope">
								<a href="/khach-san-vinpearl" title="Khách sạn Vinpearl">Khách sạn Vinpearl</a>
							</li>
							<li class="ng-scope">
								<a href="/khach-san-flc" title="Khách sạn FLC">Khách sạn FLC</a>
							</li>
						</ul>
					</li>
					<li class="ng-scope ng-has-child1">
						<a href="/du-thuyen" title="DU THUYỀN">DU THUYỀN <svg class="svg1"
								xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
								y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;"
								xml:space="preserve" width="25px" height="25px">
								<path
									d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
									data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838">
								</path>
							</svg></a>
						<ul class="ul-has-child1">
							<li class="ng-scope">
								<a href="/du-thuyen-vinh-ha-long" title="Du thuyền Vịnh Hạ Long">Du thuyền Vịnh Hạ Long</a>
							</li>
							<li class="ng-scope">
								<a href="/du-thuyen-vinh-lan-ha" title="Du thuyền Vịnh Lan Hạ">Du thuyền Vịnh Lan Hạ</a>
							</li>
						</ul>
					</li>
					<li class="ng-scope ng-has-child1">
						<a href="/blogs/all" title="BLOGS">BLOGS <svg class="svg1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656"
								style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px"
								height="25px">
								<path
									d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
									data-original="#000000" class="active-path" data-old_color="#000000" fill="#383838">
								</path>
							</svg></a>
						<ul class="ul-has-child1">
							<li class="ng-scope">
								<a href="/thien-duong-nghi-duong" title="Thiên đường nghỉ dưỡng">Thiên đường nghỉ dưỡng</a>
							</li>
							<li class="ng-scope">
								<a href="/lich-trinh-hap-dan" title="Lịch trình hấp dẫn">Lịch trình hấp dẫn</a>
							</li>
							<li class="ng-scope">
								<a href="/chuong-trinh-khuyen-mai" title="Chương trình khuyến mại">Chương trình khuyến
									mại</a>
							</li>
							<li class="ng-scope">
								<a href="/kinh-nghiem-du-lich" title="Kinh nghiệm du lịch">Kinh nghiệm du lịch</a>
							</li>
							<li class="ng-scope">
								<a href="/tin-tuc-noi-bo" title="Tin tức Nội bộ">Tin tức Nội bộ</a>
							</li>
						</ul>
					</li>
					<li class="ng-scope">
						<a href="/thu-vien-anh" title="THƯ VIỆN ẢNH">THƯ VIỆN ẢNH</a>
					</li>
				</ul>
			</div>
			<div class="mobile-support">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 473.806 473.806" style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve"
					width="20px" height="20px">
					<path
						d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1    C420.456,377.706,420.456,388.206,410.256,398.806z"
						data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
					<path
						d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11    S248.656,111.506,256.056,112.706z"
						data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
					<path
						d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"
						data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"></path>
				</svg> Hotline: <a href="tel:02435642888" title="02435642888">024 3564 2888</a>
			</div>
		</div>
	</header>