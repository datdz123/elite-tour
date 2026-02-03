<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gnws
 */

?>
<footer class="footer">
	<div class="subscribe-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3 col-md-12">
					<?php if (have_rows('list_icon', 'option')): ?>
						<ul class="social">
							<?php while (have_rows('list_icon', 'option')): the_row();
								$icon_id = get_sub_field('icon');
								$link_icon = get_sub_field('link_icon');
							?>
								<li>
									<a href="<?php echo esc_url($link_icon); ?>" target="_blank" rel="nofollow">
										<?php echo wp_get_attachment_image($icon_id, 'full'); ?>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="subscribe-content">
						<?php
						$title_newletter = get_field('title_newletter', 'option');
						$description_newletter = get_field('description_newletter', 'option');
						?>
						<?php if ($title_newletter): ?>
							<h2><?php echo esc_html($title_newletter); ?></h2>
						<?php endif; ?>
						<?php if ($description_newletter): ?>
							<p><?php echo esc_html($description_newletter); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-5 col-md-12">
					<div class="subscribe-form">
						<?php
						$shortcode_form = get_field('shortcode_form', 'option');
						if ($shortcode_form):
							echo do_shortcode($shortcode_form);
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 gray-footer">
					<?php
					$footer_logo = get_field('logo', 'option');
					$footer_description = get_field('description', 'option');
					$footer_content = get_field('content', 'option');
					?>
					<a href="/" class="logo-wrapper"
						title="<?php echo get_bloginfo('name'); ?>">
						<?php if ($footer_logo): ?>
							<?php echo wp_get_attachment_image($footer_logo, 'full', false, array('class' => 'img-responsive mx-auto d-block', 'alt' => get_bloginfo('name'))); ?>
						<?php endif; ?>
					</a>
					<?php if ($footer_description): ?>
						<p class="footer_des">
							<?php echo esc_html($footer_description); ?>
						</p>
					<?php endif; ?>
					<?php if ($footer_description): ?>
						<p class="footer_des">
							<?php echo esc_html($footer_description); ?>
						</p>
					<?php endif; ?>
					<?php if ($footer_content): ?>
						<?php echo $footer_content; ?>
					
					
					<?php endif; ?>

					<?php
					$bo_cong_thuong = get_field('bo_cong_thuong', 'option');
					if ($bo_cong_thuong):
					?>
						<div class="footer_bct">
							<a href="http://online.gov.vn/(X(1)S(nech1sltpcohyuwdphhc4tzp))/Home/WebDetails/40161#"
								target="_blank" rel="nofollow">
								<?php echo wp_get_attachment_image($bo_cong_thuong, 'full', false, array('alt' => 'Logo bộ công thương')); ?>
							</a>
						</div>
					
					<?php endif; ?>

				</div>
				<div class="col-lg-8 col-md-12 not-gray-footer">
					<div class="row">
						<?php
						$footer_navigation_blocks = get_field('footer_navigation_blocks', 'option');
						if ($footer_navigation_blocks):
							foreach ($footer_navigation_blocks as $block):
						?>
								<div class="col">
									<div class="single-footer-widget">
										<h3><?php echo esc_html($block['title']); ?></h3>
										<?php if (!empty($block['content'])): ?>
											<ul class="footer-quick-links">
												<?php foreach ($block['content'] as $link): ?>
													<li><a href="<?php echo esc_url($link['link']); ?>" title="<?php echo esc_attr($link['title_link']); ?>" rel="nofollow"><?php echo esc_html($link['title_link']); ?></a></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							<?php
							endforeach;
						?>
						<?php endif; ?>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<?php
							$title_coppy = get_field('title_coppy', 'option');
							$logo_dmca = get_field('logo_dmca', 'option');
							?>
							<div class="copyright clearfix text-center">
								<span>
									<?php if ($title_coppy): ?>
										<?php echo esc_html($title_coppy); ?>
									
									<?php endif; ?>
								</span>
							</div>
							<?php if ($logo_dmca): ?>
								<a target="_blank" rel="noopener"
									href="//www.dmca.com/Protection/Status.aspx?ID=65a647f8-8a1d-4c6b-98e5-fe094ee74ab4"
									title="DMCA.com Protection Status" class="dmca-badge">
									<?php echo wp_get_attachment_image($logo_dmca, 'full', false, array('alt' => 'DMCA.com Protection Status')); ?>
								</a>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>


<?php wp_footer(); ?>

</body>

</html>