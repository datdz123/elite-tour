<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gnws
 */

get_header();

// Get current post data
$post_id = get_the_ID();
$post_title = get_the_title();
$post_categories = get_the_category($post_id);
$first_category = $post_categories ? $post_categories[0] : null;

// Get previous and next posts
$prev_post = get_previous_post();
$next_post = get_next_post();

// Get post tags
$post_tags = get_the_tags($post_id);
?>

<?php get_template_part('template-parts/breadcrumb'); ?>
<div class="container article-wraper margin-top-20 margin-bottom-20">
	<div class="row">
		<section class="right-content col-md-12 col-lg-9">
			<article class="article-main">
				<div class="row">
					<div class="col-md-12 evo-article margin-bottom-10">
						<h1 class="title-head"><?php echo esc_html($post_title); ?></h1>

						<div class="article-details evo-toc-content">
							<?php the_content(); ?>

							<?php
							// Random tours slider section
							$random_tours = new WP_Query(array(
								'post_type' => 'travel_service',
								'posts_per_page' => 12,
								'post_status' => 'publish',
								'orderby' => 'rand'
							));

							if ($random_tours->have_posts()) :
							?>
								<div id="evoproduct1">
									<div class="evo-relative-product-article">
										<div class="evo-owl-product clearfix">
											<?php
											while ($random_tours->have_posts()) : $random_tours->the_post();
												$tour_id = get_the_ID();
												$tour_title = get_the_title();
												$tour_link = get_permalink();
												$tour_thumbnail = gnws_post_thumbnail_full($tour_id, 'large');

												// Get ACF fields
												$tour_price_raw = get_field('tour_price', $tour_id);
												$tour_price_original_raw = get_field('tour_price_original', $tour_id);

												// Clean and convert
												$tour_price = $tour_price_raw ? (float) str_replace(['.', ','], ['', '.'], $tour_price_raw) : 0;
												$tour_price_original = $tour_price_original_raw ? (float) str_replace(['.', ','], ['', '.'], $tour_price_original_raw) : 0;

												$tour_time = get_field('tour_time', $tour_id);
												$tour_departure = get_field('tour_departure_schedule', $tour_id);
												$move_plain = get_field('move_plain', $tour_id);
												$move_bus = get_field('move_bus', $tour_id);

												// Calculate discount percentage
												$discount_percent = 0;
												if ($tour_price_original > 0 && $tour_price > 0 && $tour_price_original > $tour_price) {
													$discount_percent = round((($tour_price_original - $tour_price) / $tour_price_original) * 100);
												}
											?>
												<div class="evo-slick">
													<div class="evo-product-block-item">
														<div class="img-tour">
															<a class="imgWrap pt_67 img--cover" href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>">
																<span class="imgWrap-item">
																	<img style="opacity: 1" class="lazy" src="<?php echo $tour_thumbnail; ?>" alt="<?php echo esc_attr($tour_title); ?>">
																</span>
															</a>
															<?php if ($discount_percent > 0) : ?>
																<span class="smart">- <?php echo $discount_percent; ?>% </span>
															<?php endif; ?>
														</div>
														<div class="info-tour clearfix">
															<h3><a href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>"><?php echo esc_html($tour_title); ?></a></h3>
															<div class="vote-box">
																<div class="meta-vote">
																	<ul class="ct_course_list">
																		<?php if ($move_bus) : ?>
																			<li data-toggle="tooltip" data-placement="top" title="Xe máy lạnh sử dụng theo chương trình">
																				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_1.svg" alt="Xe máy lạnh">
																			</li>
																		<?php endif; ?>
																		<?php if ($move_plain) : ?>
																			<li data-toggle="tooltip" data-placement="top" title="Di chuyển bằng Máy bay">
																				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_3.svg" alt="Máy bay">
																			</li>
																		<?php endif; ?>
																	</ul>
																</div>
															</div>
															<div class="date-go">
																<ul class="ct_course_list">
																	<?php if ($tour_departure) : ?>
																		<li class="clearfix">
																			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_4.svg" alt="<?php echo esc_attr($tour_departure); ?>"> Lịch khởi hành: <span><?php echo esc_html($tour_departure); ?></span>
																		</li>
																	<?php endif; ?>
																	<?php if ($tour_time) : ?>
																		<li class="clearfix">
																			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($tour_time); ?>"> Thời gian: <span><?php echo esc_html($tour_time); ?></span>
																		</li>
																	<?php endif; ?>
																</ul>
															</div>
															<div class="action-box">
																<div class="price-box">
																	<?php echo number_format($tour_price, 0, ',', '.'); ?>₫
																	<?php if ($tour_price_original > $tour_price) : ?>
																		<span class="compare-price"><?php echo number_format($tour_price_original, 0, ',', '.'); ?>₫</span>
																	<?php endif; ?>
																</div>
																<div class="booking-box d-none">
																	<a href="<?php echo esc_url($tour_link); ?>" title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											<?php
											endwhile;
											wp_reset_postdata();
											?>
										</div>
									</div>
								</div>
								<script>
									jQuery(document).ready(function($) {
										$('.evo-owl-product').slick({
											dots: false,
											arrows: true,
											infinite: false,
											speed: 300,
											slidesToShow: 3,
											slidesToScroll: 3,
											responsive: [{
													breakpoint: 1024,
													settings: {
														slidesToShow: 3,
														slidesToScroll: 3
													}
												},
												{
													breakpoint: 991,
													settings: {
														slidesToShow: 3,
														slidesToScroll: 3
													}
												},
												{
													breakpoint: 767,
													settings: {
														slidesToShow: 2,
														slidesToScroll: 2
													}
												},
												{
													breakpoint: 480,
													settings: {
														slidesToShow: 1,
														slidesToScroll: 1
													}
												}
											]
										});
									});
								</script>
							<?php endif; ?>
						</div>
					</div>

					<?php if ($post_tags && !empty($post_tags)) : ?>
						<div class="col-md-12 margin-bottom-10">
							<div class="tag_article">
								<span class="inline">Tags: </span>
								<?php foreach ($post_tags as $tag) : ?>
									<a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" title="<?php echo esc_attr($tag->name); ?>"><?php echo esc_html($tag->name); ?></a>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="col-md-12">
						<div class="evo-article-toolbar">
							<div class="evo-article-toolbar-left clearfix">
								<span class="evo-article-toolbar-head">Bạn đang xem: </span>
								<span class="evo-article-toolbar-title" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_html($post_title); ?></span>
							</div>
							<div class="evo-article-toolbar-right">
								<?php if ($prev_post) : ?>
									<a href="<?php echo esc_url(get_permalink($prev_post)); ?>" title="Bài trước">
										<svg class="Icon Icon--select-arrow-left" role="presentation" viewBox="0 0 11 18">
											<path d="M9.5 1.5L1.5 9l8 7.5" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
										</svg>Bài trước
									</a>
								<?php endif; ?>

								<?php if ($next_post) : ?>
									<a href="<?php echo esc_url(get_permalink($next_post)); ?>" title="Bài sau">
										Bài sau<svg class="Icon Icon--select-arrow-right" role="presentation" viewBox="0 0 11 18">
											<path d="M1.5 1.5l8 7.5-8 7.5" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
										</svg>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>

				</div>
			</article>

			<script type="application/ld+json">
				{
					"@context": "https://schema.org",
					"@type": "Article",
					"mainEntityOfPage": {
						"@type": "WebPage",
						"@id": "<?php echo esc_url(get_permalink()); ?>"
					},
					"headline": "<?php echo esc_js($post_title); ?>",
					"description": "<?php echo esc_js(get_the_excerpt()); ?>",
					"image": "<?php echo esc_url(gnws_post_thumbnail_full($post_id, 'full')); ?>",
					"author": {
						"@type": "Person",
						"name": "<?php echo esc_js(get_the_author()); ?>",
						"url": "<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
					},
					"publisher": {
						"@type": "Organization",
						"name": "<?php echo esc_js(get_bloginfo('name')); ?>",
						"logo": {
							"@type": "ImageObject",
							"url": "<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.png'); ?>"
						}
					},
					"datePublished": "<?php echo get_the_date('Y-m-d'); ?>",
					"dateModified": "<?php echo get_the_modified_date('Y-m-d'); ?>",
					"inLanguage": "vi",
					"isAccessibleForFree": true
					<?php if ($first_category) : ?>,
						"articleSection": "<?php echo esc_js($first_category->name); ?>"
					<?php endif; ?>
					<?php if ($post_tags && !empty($post_tags)) : ?>,
						"keywords": [<?php echo implode(', ', array_map(function ($tag) {
											return '"' . esc_js($tag->name) . '"';
										}, $post_tags)); ?>]
					<?php endif; ?>
				}
			</script>

		</section>

		<aside class="evo-toc-sidebar evo-sidebar sidebar left-content col-md-12 col-lg-3">
			<?php
			// Sidebar Category Menu - using helper function
			gnws_render_sidebar_menu();

			// Featured Posts - using helper function
			gnws_render_featured_posts();
			?>

			<aside class="aside-item blog-banner margin-top-30">
				<?php
				// Get banner from category if available
				$blog_banner = null;
				$banner_link = '#';

				if ($first_category) {
					$blog_banner = get_field('img_sidebar', 'category_' . $first_category->term_id);
					$banner_link = get_field('link', 'category_' . $first_category->term_id) ?: get_category_link($first_category->term_id);
				}

				// Fallback to theme option
				if (!$blog_banner) {
					$blog_banner = get_field('blog_banner', 'option');
					$banner_link = get_field('blog_banner_link', 'option') ?: '#';
				}

				if ($blog_banner) :
					$banner_url = is_array($blog_banner) ? $blog_banner['url'] : wp_get_attachment_image_url($blog_banner, 'full');
				?>
					<a href="<?php echo esc_url($banner_link); ?>" title="" class="single_image_effect">
						<img src="<?php echo esc_url($banner_url); ?>" data-src="<?php echo esc_url($banner_url); ?>" alt="" class="lazy img-responsive mx-auto d-block loaded" data-was-processed="true">
					</a>
				<?php endif; ?>
			</aside>

		</aside>
	</div>
</div>

<?php
get_footer();
