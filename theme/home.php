<?php

/**
 * Template Name: Giao diện
 */

get_header(); ?>

<main tune="elittour">


	<?php
	if (have_rows('template_components')) :
		while (have_rows('template_components')) :
			the_row();
			get_template_part('components/' . get_row_layout());
		endwhile;
	endif;
	?>
	<h1 class="hidden" style="display: none;">
		<?php echo wp_title() ?>
	</h1>
</main>

<?php get_footer(); ?>