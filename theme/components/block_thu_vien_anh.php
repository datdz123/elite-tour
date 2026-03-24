<?php
$hide_block = get_sub_field('hide_block');
if ($hide_block) {
    return;
}

$component_name = get_row_layout();
$section_id = get_sub_field('section_id');
$section_attr = $section_id ? ' id="' . esc_attr($section_id) . '"' : '';

// Query all galley_img posts
$gallery_posts = new WP_Query(array(
    'post_type' => 'galley_img',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
));
?>
<section<?php echo $section_attr; ?> data-component="<?php echo esc_attr($component_name); ?>">
    <div class="page page_thuvienanh">
        <div class="page_thuvienanh_list">
            <div class="container">
                <div class="wrap">
                    <?php
                    // Display all galley_img posts as navigation links
                    if ($gallery_posts->have_posts()) :
                        while ($gallery_posts->have_posts()) : $gallery_posts->the_post();
                            $post_id = get_the_ID();
                            $post_title = get_the_title();
                            $post_link = get_permalink();
                    ?>
                            <a class="" href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>">
                                <?php echo esc_html($post_title); ?>
                            </a>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>

            </div>

            <div class="container">
                <div class="row flex-wrap">
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="content-page page-gallery rte">
                            <?php
                            // Loop through all posts again to get their images
                            if ($gallery_posts->have_posts()) :
                                // Rewind posts
                                $gallery_posts->rewind_posts();
                            ?>
                                <div class="gallery-grid">
                                    <?php
                                    while ($gallery_posts->have_posts()) : $gallery_posts->the_post();
                                        $post_id = get_the_ID();
                                        $gallery_images = get_field('list_img', $post_id);

                                        if ($gallery_images && is_array($gallery_images) && !empty($gallery_images)) :
                                            foreach ($gallery_images as $image_id) :
                                                $full_image_url = wp_get_attachment_image_url($image_id, 'full');
                                                $medium_image_url = wp_get_attachment_image_url($image_id, 'medium_large');

                                                if ($full_image_url) :
                                    ?>
                                                    <a href="<?php echo esc_url($full_image_url); ?>"
                                                        data-rel="prettyPhoto[product-gallery]"
                                                        class="item-gallery img-shine">
                                                        <img style="width:100%" src="<?php echo esc_url($medium_image_url ?: $full_image_url); ?>"
                                                            alt="<?php echo esc_attr(get_the_title()); ?>"
                                                            loading="lazy">
                                                    </a>
                                    <?php
                                                endif;
                                            endforeach;
                                        endif;
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php else : ?>
                                <p class="no-images-message">Chưa có ảnh nào trong thư viện.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>