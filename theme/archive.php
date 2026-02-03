<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gnws
 */

get_header();

// Get current page for pagination
$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
$posts_per_page = 12;

// Query posts
$args = array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,
	'orderby' => 'date',
	'order' => 'DESC'
);

// If we're on a category or tag archive, add the taxonomy query
if (is_category()) {
	$args['cat'] = get_queried_object_id();
} elseif (is_tag()) {
	$args['tag_id'] = get_queried_object_id();
}

$blog_query = new WP_Query($args);
$max_pages = $blog_query->max_num_pages;

// Get archive title
$archive_title = 'Tất cả tin tức';
if (is_category()) {
	$archive_title = single_cat_title('', false);
} elseif (is_tag()) {
	$archive_title = single_tag_title('', false);
} elseif (is_author()) {
	$archive_title = get_the_author();
} elseif (is_date()) {
	$archive_title = get_the_date('F Y');
}

// Get archive description
$archive_description = get_the_archive_description();
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="container margin-top-10 margin-bottom-20" itemscope="" itemtype="http://schema.org/Blog">
	<meta itemprop="name" content="<?php echo esc_attr($archive_title); ?>">
	<meta itemprop="description" content="<?php echo esc_attr($archive_description ?: 'Chủ đề không có mô tả'); ?>">
	<div class="row">
		<div class="col-md-12 col-lg-9">
			<div class="evo-list-blog-page margin-top-15">
				<h1 class="title-head d-none"><?php echo esc_html($archive_title); ?></h1>

				<?php if ($blog_query->have_posts()) : ?>
					<section class="list-blogs blog-main">
						<?php
						// Get first 4 posts for the newslist section
						$first_posts = array();
						$remaining_posts = array();
						$counter = 0;

						while ($blog_query->have_posts()) : $blog_query->the_post();
							if ($paged == 1 && $counter < 4) {
								$first_posts[] = get_post();
							} else {
								$remaining_posts[] = get_post();
							}
							$counter++;
						endwhile;

						// Display newslist section (only on first page)
						if ($paged == 1 && !empty($first_posts)) :
						?>
							<div class="row newslist">
								<div class="col-lg-8 col-md-7 col-sm-7">
									<?php
									// First big post
									if (isset($first_posts[0])) :
										$post = $first_posts[0];
										setup_postdata($post);
										$thumbnail = gnws_post_thumbnail_full(get_the_ID(), 'large');
									?>
										<div class="later_news_big">
											<a class="imgWrap pt_67 mb_10 img--cover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<span class="imgWrap-item">
													<img src="<?php echo esc_url($thumbnail); ?>" data-src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive center-block loaded" data-was-processed="true">
												</span>
											</a>
											<h3>
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											</h3>
											<figure>
												<?php echo excerpt(25); ?>
											</figure>
										</div>
									<?php
										wp_reset_postdata();
									endif;
									?>
								</div>
								<div class="col-lg-4 col-md-5 col-sm-5">
									<ul class="col-later-news">
										<?php
										// Posts 2-4 in sidebar
										for ($i = 1; $i < count($first_posts); $i++) :
											$post = $first_posts[$i];
											setup_postdata($post);
											$thumbnail = gnws_post_thumbnail(get_the_ID(), 'medium');

											// First one has image visible on all screens
											if ($i == 1) :
										?>
												<li class="has-tempvideo clearfix">
													<a class="imgWrap pt_67 mb_10 img--cover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
														<span class="imgWrap-item">
															<img src="<?php echo esc_url($thumbnail); ?>" data-src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive center-block loaded" data-was-processed="true">
														</span>
													</a>
													<h3>
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
													</h3>
												</li>
											<?php else : ?>
												<li class="list-small clearfix">
													<div class="tempvideo d-block d-lg-none d-md-none d-sm-none">
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
															<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive center-block">
														</a>
													</div>
													<h3>
														<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="linkimg"><?php the_title(); ?></a>
													</h3>
												</li>
										<?php
											endif;
											wp_reset_postdata();
										endfor;
										?>
									</ul>
								</div>
							</div>
						<?php endif; ?>

						<div class="row">
							<?php
							// Display remaining posts in grid
							foreach ($remaining_posts as $post) :
								setup_postdata($post);
								$thumbnail = gnws_post_thumbnail(get_the_ID(), 'medium');
							?>
								<div class="col-md-4 col-sm-6 col-12 clearfix fix-blog-col-small">
									<article class="blog-item clearfix">
										<a class="imgWrap pt_67 mb_10 img--cover" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<span class="imgWrap-item">
												<img src="<?php echo esc_url($thumbnail); ?>" data-src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="lazy img-responsive center-block loaded" data-was-processed="true">
											</span>
										</a>
										<h3 class="entry-title title">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
										</h3>
										<p>
											<?php echo excerpt(20); ?>
										</p>
									</article>
								</div>
							<?php
							endforeach;
							wp_reset_postdata();
							?>

							<?php if ($max_pages > 1) : ?>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="text-xs-right text-center pagging-css">
										<?php gnws_blog_pagination($paged, $max_pages); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</section>
				<?php else : ?>
					<div class="no-posts-found">
						<p><?php esc_html_e('Không tìm thấy bài viết nào.', 'gnws'); ?></p>
					</div>
				<?php endif; ?>

			</div>
		</div>
		<aside class="evo-toc-sidebar evo-sidebar sidebar left-content col-md-12 col-lg-3 margin-top-15">
			<?php
			// Sidebar Category Menu
			gnws_render_sidebar_menu();
			?>

			<?php
			// Featured Posts
			gnws_render_featured_posts();
			?>

			<aside class="aside-item blog-banner margin-top-30">
				<?php
				$term=get_queried_object();
				$blog_banner = get_field('img_sidebar', $term->taxonomy . '_' . $term->term_id);
				if ($blog_banner) :
					$banner_url = wp_get_attachment_image_url($blog_banner, 'full');
					$banner_link = get_field('link', $term->taxonomy . '_' . $term->term_id) ?: '#';
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
