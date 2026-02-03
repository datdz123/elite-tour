 <?php

	$post_id = $post_item->ID;
	$post_title = get_the_title($post_id);
	$post_link = get_permalink($post_id);
	$post_excerpt = get_the_excerpt($post_id);
	$post_thumbnail = gnws_post_thumbnail_full($post_id, 'large');

	// Truncate excerpt if too long
	if (strlen($post_excerpt) > 100) {
		$post_excerpt = substr($post_excerpt, 0, 100) . '...';
	}
	?>

 <div class="evo-item-blogs">
 	<div class="evo-article-image">
 		<a class="imgWrap pt_67 img--cover" href="<?php echo esc_url($post_link); ?>"
 			title="<?php echo esc_attr($post_title); ?>">
 			<span class="imgWrap-item">
 				<img style="opacity: 1;" src="<?php echo esc_url($post_thumbnail); ?>"
 					alt="<?php echo esc_attr($post_title); ?>"
 					class="img-responsive center-block">
 			</span>
 		</a>
 	</div>
 	<h3><a class="line-clamp" href="<?php echo esc_url($post_link); ?>"
 			title="<?php echo esc_attr($post_title); ?>"><?php echo esc_html($post_title); ?></a></h3>
 	<?php if ($post_excerpt): ?>
 		<p><?php echo esc_html($post_excerpt); ?></p>
 	<?php endif; ?>
 </div>