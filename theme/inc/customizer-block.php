<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
	if (function_exists('acf_register_block_type')) {
		

		acf_register_block_type(array(
			'name' => 'block_banner',
			'title' => ('[Block] Banner'),
			'description' => ('block_banner'),
			'render_template' => 'blocks/block_banner.php',
			'keywords' => array('block_banner'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_banner.png',
					)
				)
			)
		));

		acf_register_block_type(array(
			'name' => 'block_blogs',
			'title' => ('[Block] Blogs'),
			'description' => ('block_blogs'),
			'render_template' => 'blocks/block_blogs.php',
			'keywords' => array('block_blogs'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_blogs.png',
					)
				)
			)
		));

		acf_register_block_type(array(
			'name' => 'block_tour_destination',
			'title' => ('[Block] Tour Destination'),
			'description' => ('block_tour_destination'),
			'render_template' => 'blocks/block_tour_destination.php',
			'keywords' => array('block_tour_destination'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_tour_destination.png',
					)
				)
			)
		));

		

		acf_register_block_type(array(
			'name' => 'block_tour_last_hour',
			'title' => ('[Block] Tour Last Hour'),
			'description' => ('block_tour_last_hour'),
			'render_template' => 'blocks/block_tour_last_hour.php',
			'keywords' => array('block_tour_last_hour'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_tour_last_hour.png',
					)
				)
			)
		));

		acf_register_block_type(array(
			'name' => 'block_tour_policy',
			'title' => ('[Block] Tour Policy'),
			'description' => ('block_tour_policy'),
			'render_template' => 'blocks/block_tour_policy.php',
			'keywords' => array('block_tour_policy'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_policy.png',
					)
				)
			)
		));

		acf_register_block_type(array(
			'name' => 'block_tour_slider',
			'title' => ('[Block] Tour Slider'),
			'description' => ('block_tour_slider'),
			'render_template' => 'blocks/block_tour_slider.php',
			'keywords' => array('block_tour_slider'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_tour_slider.png',
					)
				)
			)
		));


		acf_register_block_type(array(
			'name' => 'block_faq',
			'title' => ('[Block] FAQ'),
			'description' => ('block_faq'),
			'render_template' => 'blocks/block_faq.php',
			'keywords' => array('block_faq'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_faq.png',
					)
				)
			)
		));
		acf_register_block_type(array(
			'name' => 'block_intro',
			'title' => ('[Block] Intro'),
			'description' => ('block_intro'),
			'render_template' => 'blocks/block_intro.php',
			'keywords' => array('block_intro'),
			'supports' => array(
				'anchor' => true,
			),
			'api_version' => 3,
			'acf_block_version' => 3,
			'example' => array(
				'attributes' => array(
					'mode' => 'preview',
					'data' => array(
						'preview_image_help' => get_stylesheet_directory_uri() . '/assets/preview/block_intro.png',
					)
				)
			)
		));
		acf_register_block_type(array(
			'name' => 'block_breadcrumb',
			'title' => ('[Block] Breadcrumb'),
			'description' => ('block_breadcrumb'),
			'render_template' => 'blocks/block_breadcrumb.php',
			'keywords' => array('block_breadcrumb'),
			'supports' => array(
				'anchor' => true,
			)
			
		));
	}
}
