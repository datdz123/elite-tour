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
$list_img = get_field('list_img', $post_id);
$title_banner = get_field('title_banner', $post_id) ?: (isset($block['data']['title_banner']) ? $block['data']['title_banner'] : null);
?>

<?php
if (!empty($block['data']['preview_image_help']) && !empty($is_preview)): ?>
	<img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%;height:auto;" />
	<?php return; ?>
<?php endif; ?>




<section <?php echo esc_attr($anchor); ?> class="awe-section-1<?php echo esc_attr($class_name); ?>" data-component="<?php echo $component_name; ?>">
	<div class="home-slider">
		<?php if ($list_img): ?>
			<?php foreach ($list_img as $item):
				$img = $item['img'];
				if (!$img) continue;
				$img_url = wp_get_attachment_image_url($img, 'full');
				$img_alt = get_post_meta($img, '_wp_attachment_image_alt', true) ?: ($title_banner ?: 'Banner');
			?>
				<div class="item">
					<a href="<?php echo home_url('/'); ?>" class="clearfix" title="<?php echo esc_attr($title_banner ?: 'Elite Tour'); ?>">
						<picture>
							<source media="(min-width: 1200px)" srcset="<?php echo esc_url($img_url); ?>">
							<source media="(min-width: 992px)" srcset="<?php echo esc_url($img_url); ?>">
							<source media="(min-width: 569px)" srcset="<?php echo esc_url($img_url); ?>">
							<source media="(min-width: 480px)" srcset="<?php echo esc_url($img_url); ?>">
							<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>"
								class="lazy img-responsive d-block mx-auto">
						</picture>
					</a>
				</div>
			<?php endforeach; ?>
		
		<?php endif; ?>
	</div>

	<div class="evo-tour-search-index">
		<div class="container m-0">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12 evo-tour-search-title">
					<?php if ($title_banner): ?>
						<h2><?php echo esc_html($title_banner); ?></h2>
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