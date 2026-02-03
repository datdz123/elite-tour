<?php

/**
 * Block Banner template.
 *
 * @param array $block The block settings and attributes.
 */
$component_name = basename(__FILE__, '.php');
$anchor = '';
$class_name = '';
if (!empty($block['anchor'])) {
	$anchor = 'id=' . esc_attr($block['anchor']) . '';
}

if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}
$post_id = $block['id'] ?? get_the_ID();

// Get ACF fields - ensure compatibility with block editor
$img = get_field('img', $post_id) ?: (isset($block['data']['img']) ? $block['data']['img'] : null);
$title_banner = get_field('title_banner', $post_id) ?: (isset($block['data']['title_banner']) ? $block['data']['title_banner'] : null);
?>

<?php
if (!empty($block['data']['preview_image_help']) && !empty($is_preview)): ?>
	<img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%;height:auto;" />
	<?php return; ?>
<?php endif; ?>

<?php
// Check if both fields are empty - show placeholder
if (empty($img) && empty($title_banner)): ?>
	<div style="background: #f9f9f9; padding: 80px 20px; text-align: center; border: 3px dashed #ddd; border-radius: 8px; margin: 20px 0;">
		<svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2" style="margin: 0 auto 20px;">
			<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
			<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
		</svg>
		<h3 style="color: #666; margin: 10px 0 20px; font-size: 20px;">✏️ Block Banner chưa có nội dung</h3>
		<p style="color: #999; margin: 0; font-size: 16px;">
			Nhấn vào biểu tượng <strong style="color: #666;">✏️ (Edit Block)</strong> ở thanh công cụ phía trên<br>
			để thêm <strong>hình ảnh banner</strong> và <strong>tiêu đề</strong>
		</p>
	</div>
	<?php return; ?>
<?php endif; ?>


<section <?php echo esc_attr($anchor); ?> class="awe-section-1<?php echo esc_attr($class_name); ?>" data-component="<?php echo $component_name; ?>">
	<div class="home-slider">
		<div class="item">
			<?php if ($img):
				$img_url = wp_get_attachment_image_url($img, 'full');
				$img_alt = get_post_meta($img, '_wp_attachment_image_alt', true) ?: ($title_banner ?: 'Banner');
			?>
				<a href="<?php echo home_url('/'); ?>" class="clearfix" title="<?php echo esc_attr($title_banner ?: 'Elite Tour'); ?>">
					<picture>
						<source media="(min-width: 1200px)" srcset="<?php echo esc_url($img_url); ?>">
						<source media="(min-width: 992px)" srcset="<?php echo esc_url($img_url); ?>">
						<source media="(min-width: 569px)" srcset="<?php echo esc_url($img_url); ?>">
						<source media="(min-width: 480px)" srcset="<?php echo esc_url($img_url); ?>">
						<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>"
							class="lazy img-responsive  d-block mx-auto">
					</picture>
				</a>
			<?php else: ?>
				<!-- Placeholder -->
				<div style="background: #f0f0f0; padding: 60px 20px; text-align: center; border: 2px dashed #ccc;">
					<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2" style="margin: 0 auto 10px;">
						<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
						<polyline points="17 8 12 3 7 8"></polyline>
						<line x1="12" y1="3" x2="12" y2="15"></line>
					</svg>
					<p style="color: #666; margin: 10px 0;">📝 Nhấn <strong>Edit Block</strong> để thêm banner</p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="evo-tour-search-index">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12 evo-tour-search-title">
					<?php if ($title_banner): ?>
						<h2><?php echo esc_html($title_banner); ?></h2>
					<?php else: ?>
						<div style="text-align: center; padding: 20px; border: 1px dashed #ddd; background: #fafafa;">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2" style="vertical-align: middle; margin-right: 8px;">
								<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
								<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
							</svg>
							<span style="color: #999;">Nhấn <strong>Edit Block</strong> để thêm tiêu đề</span>
						</div>
					<?php endif; ?>
					<p></p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="evo-main-search">
						<form id="banner-tour-search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
							<input type="hidden" name="post_type" value="travel_service">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="input_group group_a">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/place-localizer.svg" alt="Địa điểm">
										<input type="text" aria-label="Bạn muốn đi đâu?" autocomplete="off"
											placeholder="Bạn muốn đi đâu?" name="s" id="banner-search-keyword"
											class="form-control form-hai form-control-lg">
									</div>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-12 fix-ipad1">
									<div class="group-search abs">
										<div class="group-search-icon">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/date.svg" alt="Tìm kiếm">
										</div>
										<div class="group-search-content">
											<p>Ngày khởi hành</p>
											<input class="tourmaster-datepicker" id="dates" type="text"
												placeholder="Chọn Ngày khởi hành" data-date-format="dd MM yyyy"
												readonly="readonly">
										</div>
									</div>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-12 fix-ipad2">
									<div class="group-search ab">
										<div class="group-search-icon">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/images/paper-plane.svg" alt="Tìm kiếm">
										</div>
										<div class="group-search-content">
											<p>Khởi hành từ</p>
											<select name="departure_from" class="tag-select">
												<option value=""><?php _e('Tất cả', 'gnws'); ?></option>
												<?php
												$field_object = acf_get_field('departure_from');
												$taxonomy_name = 'taxonomy_khoi_hanh'; // Fallback taxonomy

												if ($field_object && !empty($field_object['taxonomy'])) {
													$taxonomy_name = $field_object['taxonomy'];
												}

												$terms = get_terms(array(
													'taxonomy' => $taxonomy_name,
													'hide_empty' => false,
												));

												if (!is_wp_error($terms) && !empty($terms)) {
													foreach ($terms as $term) {
														echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
													}
												}
												?>

											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-12 fix-ipad">
									<button type="submit" class="hs-submit btn-style btn btn-default btn-blues"
										aria-label="Tìm">Tìm</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>