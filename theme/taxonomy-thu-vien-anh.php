<?php
get_header();

// Get current taxonomy term
$current_term = get_queried_object();
$term_id = $current_term->term_id;
$term_name = $current_term->name;

// Query all galley_img posts in this taxonomy
$gallery_posts = new WP_Query(array(
    'post_type' => 'galley_img',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'tax_query' => array(
        array(
            'taxonomy' => 'thu-vien-anh',
            'field' => 'term_id',
            'terms' => $term_id,
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC',
));
?>
<?php get_template_part("template-parts/breadcrumb"); ?>

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
                    <div class="page-title category-title d-none">
                        <h1 class="title-head"><a href="<?php echo esc_url(get_term_link($current_term)); ?>"><?php echo esc_html($term_name); ?></a></h1>
                    </div>
                    <div class="content-page page-gallery rte">
                        <?php
                        // Loop through all posts again to get their images
                        if ($gallery_posts->have_posts()) :
                            // Rewind posts
                            $gallery_posts->rewind_posts();

                            while ($gallery_posts->have_posts()) : $gallery_posts->the_post();
                                $post_id = get_the_ID();
                                $gallery_images = get_field('list_img', $post_id);

                                if ($gallery_images && is_array($gallery_images) && !empty($gallery_images)) :
                        ?>
                                    <p>
                                        <?php
                                        foreach ($gallery_images as $image_id) :
                                            $full_image_url = wp_get_attachment_image_url($image_id, 'full');
                                            $medium_image_url = wp_get_attachment_image_url($image_id, 'medium');

                                            if ($full_image_url) :
                                        ?>
                                                <a href="<?php echo esc_url($full_image_url); ?>"
                                                    data-rel="prettyPhoto[product-gallery]"
                                                    class="item-gallery img-shine">
                                                    <img src="<?php echo esc_url($medium_image_url ?: $full_image_url); ?>"
                                                        alt="<?php echo esc_attr(get_the_title()); ?>"
                                                        loading="lazy">
                                                </a>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </p>
                            <?php
                                endif;
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                            <p class="no-images-message">Chưa có ảnh nào trong danh mục này.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
get_footer();
?>