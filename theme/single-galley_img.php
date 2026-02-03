<?php

/**
 * Template for displaying single gallery image posts
 *
 * @package gnws
 */

get_header();

// Get current post data
$post_id = get_the_ID();
$post_title = get_the_title();

// Get the list_img gallery field (returns array of image IDs)
$gallery_images = get_field('list_img', $post_id);

// Get the associated taxonomy term for navigation
$gallery_terms = get_the_terms($post_id, 'thu-vien-anh');
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="page page_thuvienanh">
    <div class="page_thuvienanh_list">
        <div class="container">
            <div class="wrap">
                <?php
                // Get all galley_img posts from the same taxonomy term
                if ($gallery_terms && !empty($gallery_terms)) :
                    $current_term = $gallery_terms[0];

                    $all_gallery_posts = new WP_Query(array(
                        'post_type' => 'galley_img',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'thu-vien-anh',
                                'field' => 'term_id',
                                'terms' => $current_term->term_id,
                            ),
                        ),
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ));

                    if ($all_gallery_posts->have_posts()) :
                        while ($all_gallery_posts->have_posts()) : $all_gallery_posts->the_post();
                            $nav_post_id = get_the_ID();
                            $nav_post_title = get_the_title();
                            $nav_post_link = get_permalink();
                            $is_active = ($nav_post_id === $post_id);
                ?>
                            <a class="<?php echo $is_active ? 'active' : ''; ?>"
                                href="<?php echo esc_url($nav_post_link); ?>"
                                title="<?php echo esc_attr($nav_post_title); ?>">
                                <?php echo esc_html($nav_post_title); ?>
                            </a>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endif;
                ?>
            </div>
        </div>

        <div class="container">
            <div class="row flex-wrap">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title category-title margin-bottom-20 d-none">
                        <h1 class="title-head"><?php echo esc_html($post_title); ?></h1>
                    </div>

                    <div class="content-page page-gallery rte">
                        <?php if ($gallery_images && is_array($gallery_images)) : ?>
                            <p>
                                <?php
                                foreach ($gallery_images as $image_id) :
                                    // Get image URLs
                                    $full_image_url = wp_get_attachment_image_url($image_id, 'full');
                                    $medium_image_url = wp_get_attachment_image_url($image_id, 'medium');
                                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                                    if ($full_image_url) :
                                ?>
                                        <a href="<?php echo esc_url($full_image_url); ?>"
                                            data-rel="prettyPhoto[product-gallery]"
                                            class="item-gallery img-shine">
                                            <img src="<?php echo esc_url($medium_image_url ?: $full_image_url); ?>"
                                                alt="<?php echo esc_attr($image_alt ?: $post_title); ?>"
                                                loading="lazy">
                                        </a>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </p>
                        <?php else : ?>
                            <p class="no-images-message">Chưa có ảnh nào được thêm vào album này.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Optional: Display related galleries from the same taxonomy
        if ($gallery_terms && !empty($gallery_terms)) :
            $current_term = $gallery_terms[0];

            $related_galleries = new WP_Query(array(
                'post_type' => 'galley_img',
                'posts_per_page' => 6,
                'post__not_in' => array($post_id),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'thu-vien-anh',
                        'field' => 'term_id',
                        'terms' => $current_term->term_id,
                    ),
                ),
            ));

           
        endif;
        ?>
    </div>
</div>

<style>
   

    .page_thuvienanh .page-title {
        text-align: center;
    }

    .page_thuvienanh .title-head {
        font-size: 24px;
        font-weight: 600;
        color: #333;
    }

    .page_thuvienanh .no-images-message {
        text-align: center;
        padding: 40px 20px;
        color: #666;
        font-size: 16px;
    }

    .related-galleries {
        padding: 20px 0;
    }

    .related-galleries .section-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .related-gallery-item {
        display: block;
        text-decoration: none;
    }

    .related-gallery-thumb {
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .related-gallery-thumb img {
        width: 100%;
        height: 120px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .related-gallery-item:hover .related-gallery-thumb img {
        transform: scale(1.05);
    }

    .related-gallery-title {
        font-size: 13px;
        color: #333;
        text-align: center;
        line-height: 1.3;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

<?php
get_footer();
?>