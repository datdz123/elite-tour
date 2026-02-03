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

?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="page page_thuvienanh">
    <div class="page_thuvienanh_list">
        <div class="container">
            <div class="wrap">
                <?php
                // Get all galley_img posts
                $all_gallery_posts = new WP_Query(array(
                    'post_type' => 'galley_img',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
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
                            <div class="gallery-grid">
                                <?php
                                foreach ($gallery_images as $image_id) :
                                    // Get image URLs
                                    $full_image_url = wp_get_attachment_image_url($image_id, 'full');
                                    $medium_image_url = wp_get_attachment_image_url($image_id, 'medium_large');
                                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                                    if ($full_image_url) :
                                ?>
                                        <a href="<?php echo esc_url($full_image_url); ?>"
                                            data-rel="prettyPhoto[product-gallery]"
                                            class="item-gallery img-shine">
                                            <img style="width:100%;" src="<?php echo esc_url($medium_image_url ?: $full_image_url); ?>"
                                                alt="<?php echo esc_attr($image_alt ?: $post_title); ?>"
                                                loading="lazy">
                                        </a>
                                <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        <?php else : ?>
                            <p class="no-images-message">Chưa có ảnh nào được thêm vào album này.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .page_thuvienanh .gallery-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin: 20px 0;
    }

    .page_thuvienanh .item-gallery {
        display: block;
        width: calc(25% - 11.25px);
        aspect-ratio: 1/1;
        overflow: hidden;
        border-radius: 8px;
    }

    .page_thuvienanh .item-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .page_thuvienanh .item-gallery:hover img {
        transform: scale(1.05);
    }

    @media (max-width: 991px) {
        .page_thuvienanh .item-gallery {
            width: calc(33.333% - 10px);
        }
    }

    @media (max-width: 767px) {
        .page_thuvienanh .item-gallery {
            width: calc(50% - 7.5px);
        }
    }

    @media (max-width: 480px) {
        .page_thuvienanh .item-gallery {
            width: 100%;
        }
    }

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
</style>

<?php
get_footer();
?>