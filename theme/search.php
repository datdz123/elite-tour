<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gnws
 */

get_header();

// Get search query from WordPress standard parameter
$search_query = get_search_query();

// Get current page for pagination
$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
$posts_per_page = 12;

// Create query for both posts and travel_service
$search_args = array(
	'post_type' => array('post', 'travel_service'),
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,
	's' => $search_query,
	'orderby' => 'relevance',
	'order' => 'DESC'
);

$search_results = new WP_Query($search_args);
$total_results = $search_results->found_posts;
$max_pages = $search_results->max_num_pages;
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="signup search-main wrap_background background_white clearfix">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="title-head title_search"><a href="#" class="title-box">Nhập từ khóa để tìm kiếm</a></h1>
			</div>
			<div class="col-12">
				<div class="section margin-bottom-20">
					<form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="blog-search-form input-group search-bar has-validation-callback" role="search">
						<input type="hidden" name="post_type" value="travel_service">
						<input type="text" name="s" required value="<?php echo esc_attr($search_query); ?>" class="input-group-field auto-search search-auto form-control" placeholder="Tìm kiếm..." autocomplete="off">
						<button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm" title="Tìm kiếm">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
								<path fill="#ffffff" d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z"></path>
							</svg>
						</button>
					</form>
				</div>
			</div>

			<div class="col-12">
				<?php if ($search_query) : ?>
					<?php if ($total_results > 0) : ?>
						<p class="title-head margin-top-0">
							Có <strong><?php echo $total_results; ?></strong> kết quả tìm kiếm phù hợp cho "<?php echo esc_html($search_query); ?>"
						</p>
					<?php else : ?>
						<p class="title-head margin-top-0">
							Không tìm thấy kết quả nào cho "<?php echo esc_html($search_query); ?>"
						</p>
					<?php endif; ?>
				<?php else : ?>
					<p class="title-head margin-top-0">Vui lòng nhập từ khóa để tìm kiếm</p>
				<?php endif; ?>
			</div>

			<?php if ($search_results->have_posts()) : ?>
				<div class="col-12">
					<div class="products-view-grid products">
						<div class="row row-fix">
							<?php while ($search_results->have_posts()) : $search_results->the_post();
								$post_type = get_post_type();
								$thumbnail = gnws_post_thumbnail_full(get_the_ID(), 'large');
								$permalink = get_the_permalink();
								$title = get_the_title();
							?>

								<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-fix">
									<div class="evo-product-block-item">
										<div class="img-tour">
											<a class="imgWrap pt_67 img--cover" href="<?php echo esc_url($permalink); ?>"
												title="<?php echo esc_attr($title); ?>">
												<span class="imgWrap-item">
													<img class="lazy loaded"
														src="<?php echo esc_url($thumbnail); ?>"
														data-src="<?php echo esc_url($thumbnail); ?>"
														alt="<?php echo esc_attr($title); ?>" data-was-processed="true">
												</span>
											</a>
											<?php if ($post_type === 'travel_service') :
												$tour_price = get_field('tour_price', get_the_ID());
												$tour_price_old = get_field('tour_price_old', get_the_ID());
												if ($tour_price && $tour_price_old && $tour_price_old > $tour_price) :
													$discount = round((($tour_price_old - $tour_price) / $tour_price_old) * 100);
											?>
													<span class="smart">- <?php echo $discount; ?>% </span>
											<?php endif;
											endif; ?>
										</div>
										<div class="info-tour clearfix">
											<h3>
												<a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>">
													<?php echo esc_html($title); ?>
												</a>
											</h3>

											<?php if ($post_type === 'travel_service') :
												$tour_price = get_field('tour_price', get_the_ID());
												$tour_price_old = get_field('tour_price_old', get_the_ID());
											?>
												<div class="action-box">
													<div class="price-box">
														<?php if ($tour_price) : ?>
															<?php echo number_format($tour_price, 0, ',', '.'); ?>₫
															<?php if ($tour_price_old && $tour_price_old > $tour_price) : ?>
																<span class="compare-price"><?php echo number_format($tour_price_old, 0, ',', '.'); ?>₫</span>
															<?php endif; ?>
														<?php else : ?>
															Liên hệ
														<?php endif; ?>
													</div>
												</div>
											<?php else : ?>
												<p class="search-excerpt"><?php echo excerpt(15); ?></p>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>

				<?php if ($max_pages > 1) : ?>
					<div class="col-12 margin-top-20">
						<div class="text-xs-right text-center pagging-css">
							<?php gnws_blog_pagination($paged, $max_pages); ?>
						</div>
					</div>
				<?php endif; ?>

			<?php elseif ($search_query) : ?>
				<div class="col-12">
					<div class="no-results-found text-center padding-20">
						<p>Rất tiếc, không tìm thấy kết quả phù hợp với từ khóa "<strong><?php echo esc_html($search_query); ?></strong>".</p>
						<p>Gợi ý:</p>
						<ul class="list-unstyled">
							<li>• Kiểm tra chính tả từ khóa</li>
							<li>• Thử dùng từ khóa ngắn hơn hoặc chung hơn</li>
							<li>• Thử dùng các từ đồng nghĩa khác</li>
						</ul>
					</div>
				</div>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</div>
	</div>
</section>

<?php
get_footer();
