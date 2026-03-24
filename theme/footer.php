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
					<?php if ($footer_content): ?>
						<?php echo $footer_content; ?>


					<?php endif; ?>

					<?php
					$bo_cong_thuong = get_field('bo_cong_thuong', 'option');
					if ($bo_cong_thuong):
					?>
						<div class="footer_bct">
							<a href="<?php echo get_field('link_bo_cong_thuong', 'option'); ?>"
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
								$size_col = !empty($block['size_column']) ? $block['size_column'] : 'col';
								$class_col = $size_col === 'col' ? 'col' : 'col-lg-' . $size_col;
						?>
								<div class="<?php echo esc_attr($class_col); ?> col-md-6 col">
									<div class="single-footer-widget">
										<h3><?php echo esc_html($block['title']); ?></h3>
										<?php if (!empty($block['content'])): ?>
											<div class="footer-widget-content">
												<?php echo $block['content']; ?>
											</div>
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

<?php
$link_messenger = get_field('link_right', 'option');
$list_chat = get_field('list_chat', 'option');
$list_social = get_field('list_social', 'option');
?>
<?php if ($list_chat): ?>
	<div class="popup-sapo">
		<div class="icon">
			<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
				<path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"></path>
			</svg>
		</div>
		<div class="content">
			<ul>

				<?php if ($list_chat): foreach ($list_chat as $chat): ?>
						<li><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
								<path d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"></path>
							</svg>
							<a rel="nofollow" href="<?php echo $chat['link_chat']; ?>" target="_blank" title="<?php echo $chat['title_chat']; ?>"><?php echo $chat['title_chat']; ?></a>
						</li>
				<?php endforeach;
				endif; ?>
			</ul>
			<a rel="nofollow" href="javascript:;" title="Đóng" class="close-popup-sapo">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
					<g>
						<g>
							<path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285    L284.286,256.002z"></path>
						</g>
					</g>
				</svg>
			</a>
		</div>
	</div>
<?php endif; ?>

<?php if ($link_messenger): ?>
	<a rel="nofollow" class="wolf-chat-plugin" href="<?php echo $link_messenger; ?>" target="_blank">
		<div style="margin-left: -2px; margin-right: 6px;">
			<div style="display: flex; align-items: center;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.75 11.9125C0.75 5.6422 5.66254 1 12 1C18.3375 1 23.25 5.6422 23.25 11.9125C23.25 18.1828 18.3375 22.825 12 22.825C10.8617 22.825 9.76958 22.6746 8.74346 22.3925C8.544 22.3376 8.33188 22.3532 8.1426 22.4368L5.90964 23.4224C5.32554 23.6803 4.66618 23.2648 4.64661 22.6267L4.58535 20.6253C4.57781 20.3789 4.46689 20.1483 4.28312 19.9839C2.09415 18.0264 0.75 15.1923 0.75 11.9125ZM8.54913 9.86084L5.24444 15.1038C4.92731 15.6069 5.54578 16.1739 6.01957 15.8144L9.56934 13.1204C9.80947 12.9381 10.1413 12.9371 10.3824 13.118L13.0109 15.0893C13.7996 15.6809 14.9252 15.4732 15.451 14.6392L18.7556 9.39616C19.0727 8.893 18.4543 8.326 17.9805 8.68555L14.4307 11.3796C14.1906 11.5618 13.8587 11.5628 13.6176 11.3819L10.9892 9.41061C10.2005 8.81909 9.07479 9.02676 8.54913 9.86084Z" fill="white"></path>
				</svg></div>
		</div>
		<div style="color: white; display: flex; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 17px; font-style: normal; font-weight: 600; line-height: 22px; user-select: none; white-space: nowrap;">Chat</div>
	</a>
<?php endif; ?>

<?php if ($list_social): ?>
	<div class="main-widget">
		<div class="def-content unsee element">
			<?php foreach ($list_social as $social): ?>
				<div class="item <?php echo sanitize_title($social['title_icon']); ?>">
					<a rel="nofollow" target="_blank" href="<?php echo $social['link_icon']; ?>">
						<span class="img">
							<?php
							$social_icon = $social['icon'];
							if ($social_icon) {
								echo wp_get_attachment_image($social_icon, 'full');
							}
							?>
						</span>
						<div class="detail"><?php echo $social['title_icon']; ?></div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="out-circle">
			<div class="pregan element"></div>
			<div class="pregan element"></div>
			<div class="main-icon">
				<svg id="svg_icon_main" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="612px" height="612px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
					<path d="M401.625,325.125h-191.25c-10.557,0-19.125,8.568-19.125,19.125s8.568,19.125,19.125,19.125h191.25     c10.557,0,19.125-8.568,19.125-19.125S412.182,325.125,401.625,325.125z M439.875,210.375h-267.75     c-10.557,0-19.125,8.568-19.125,19.125s8.568,19.125,19.125,19.125h267.75c10.557,0,19.125-8.568,19.125-19.125     S450.432,210.375,439.875,210.375z M306,0C137.012,0,0,119.875,0,267.75c0,84.514,44.848,159.751,114.75,208.826V612     l134.047-81.339c18.552,3.061,37.638,4.839,57.203,4.839c169.008,0,306-119.875,306-267.75C612,119.875,475.008,0,306,0z      M306,497.25c-22.338,0-43.911-2.601-64.643-7.019l-90.041,54.123l1.205-88.701C83.5,414.133,38.25,345.513,38.25,267.75     c0-126.741,119.875-229.5,267.75-229.5c147.875,0,267.75,102.759,267.75,229.5S453.875,497.25,306,497.25z"></path>
				</svg>
			</div>
			<div class="ser-icon element">
				<div class="process" style="transform: translateX(0px);">
					<?php if ($list_social): foreach ($list_social as $social): ?>
							<span class="img <?php echo sanitize_title($social['title_icon']); ?> item">
								<?php
								$social_icon = $social['icon'];
								if ($social_icon) {
									echo wp_get_attachment_image($social_icon, 'full');
								}
								?>
							</span>
					<?php endforeach;
					endif; ?>
				</div>
			</div>
			<div class="close-icon unsee element">x</div>
		</div>
	</div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>

</html>



<style>
	.popup-sapo {
		position: fixed;
		bottom: 80px;
		left: 17px;
		margin: 0;
		z-index: 30;
		top: auto !important
	}

	.popup-sapo .icon {
		position: relative;
		z-index: 4;
		height: 48px;
		width: 48px;
		text-align: center;
		border-radius: 50%;
		border: 1px solid #ffffff;
		cursor: pointer;
		background: var(--primary-color);
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		animation: pulse 2s infinite;
		animation: pulse 2s infinite;
		cursor: pointer
	}

	.popup-sapo .icon svg {
		fill: #ffffff;
		width: 20px;
		height: 20px;
		transition: opacity 0.35s ease-in-out, -webkit-transform 0.35s ease-in-out;
		transition: opacity 0.35s ease-in-out, transform 0.35s ease-in-out;
		transition: opacity 0.35s ease-in-out, transform 0.35s ease-in-out, -webkit-transform 0.35s ease-in-out;
		animation: iconSkew 1s infinite ease-out;
		min-height: -webkit-fill-available
	}

	.popup-sapo .content {
		background: var(--primary-color);
		color: #fff;
		padding: 20px 10px 40px;
		border-radius: 10px;
		width: 300px;
		position: absolute;
		bottom: 27px;
		left: 20px;
		box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
		-webkit-transform-origin: 100% bottom;
		transform-origin: 0 bottom;
		transform: scale(0);
		-webkit-transform: scale(0);
		-moz-transform: scale(0);
		-ms-transform: scale(0);
		-o-transform: scale(0);
		transition: -webkit-transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
		transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
		transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
		-webkit-transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1)
	}

	@media (max-width: 500px) {
		.popup-sapo .content {
			width: 250px
		}
	}

	.popup-sapo .content .title {
		font-size: 14px;
		font-weight: 500;
		margin-bottom: 12px;
		margin-top: 8px;
		color: #fff;
	}

	.popup-sapo .content .close-popup-sapo {
		position: absolute;
		right: 10px;
		top: 5px;
		cursor: pointer
	}

	.popup-sapo .content .close-popup-sapo svg {
		width: 15px;
		height: 15px
	}

	.popup-sapo .content .close-popup-sapo svg path {
		fill: #fff
	}

	.popup-sapo .content ul {
		margin-bottom: 20px
	}

	.popup-sapo .content ul li {
		margin-bottom: 10px
	}

	.popup-sapo .content ul li svg {
		margin-right: 10px
	}

	.popup-sapo .content ul li svg path {
		fill: #fff
	}

	.popup-sapo .content ul li a {
		color: #fff
	}

	.popup-sapo .content ul li a:hover {
		color: #fff;
		text-decoration: underline;
	}

	.popup-sapo .content .ghichu {
		font-style: italic;
		font-size: 14px
	}

	.popup-sapo.active .content {
		-ms-transition-delay: 0.1s;
		-webkit-transition-delay: 0.15s;
		transition-delay: 0.1s;
		transform: scale(1);
		-webkit-transform: scale(1);
		-moz-transform: scale(1);
		-ms-transform: scale(1);
		-o-transform: scale(1)
	}

	.wolf-chat-plugin {
		bottom: 30px;
		z-index: 99;
		background-color: rgb(10, 124, 255);
		align-items: center;
		border-radius: 60px;
		display: flex;
		height: 44px;
		padding: 0px 16px;
		position: fixed;
		width: fit-content;
		right: 0px;
		top: auto !important;
	}
</style>

<script>
	jQuery(document).ready(function($) {
		var i = 1;
		var n = $('.ser-icon .process .item').length;
		if (n > 0) {
			var len = $('.ser-icon .process').width() / n;
			var pos = new WebKitCSSMatrix($('.ser-icon .process').css('transform'));
			$('.ser-icon').removeClass('unsee');

			function nextFrame() {
				if (i < n) {
					i++;
					var pos2 = new WebKitCSSMatrix($('.ser-icon .process').css('transform'));
					$('.ser-icon .process').css('transform', 'translateX(' + (pos2.m41 - len) + 'px)');
					setTimeout(nextFrame, 800);
				} else {
					$('.ser-icon').addClass('unsee');
					i = 1;
					$('.ser-icon .process').css('transform', 'translateX(' + (pos.m41) + 'px)');
					setTimeout(beginFrame, 2000);
				}
			}

			function beginFrame() {
				$('.ser-icon').removeClass('unsee');
				setTimeout(nextFrame, 900);
			}
			setTimeout(beginFrame, 2000);
		}
		$('.close-icon').click(function(event) {
			$('.element').toggleClass('unsee');
		});
	});
</script>

<script>
	jQuery(document).ready(function($) {
		$('.popup-sapo .icon').click(function() {
			$(".popup-sapo").toggleClass("active");
		});
		$('.close-popup-sapo').click(function() {
			$(".popup-sapo").toggleClass("active");
		});
	});
</script>