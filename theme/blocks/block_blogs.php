<?php

/**
 * Block Blogs template.
 *
 * @param array $block The block settings and attributes.
 */
$is_preview = defined('DOING_AJAX') && DOING_AJAX;
$component_name = basename(__FILE__, '.php');
$anchor = '';
$class_name = '';
if (!empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . '';
}

if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get ACF fields
$hide_block = get_field('hide_block');
$title = get_field('title');
$description = get_field('description');
$choose_post = get_field('choose_post'); // Relationship field - returns array of post objects

// Don't render if block is hidden
if ($hide_block) {
    return;
}
?>

<?php
if (!empty($block['data']['preview_image_help']) && !empty($is_preview)): ?>
    <img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%;height:auto;" />
    <?php return; ?>
<?php endif; ?>

<section <?php echo esc_attr($anchor); ?> class="awe-section-10<?php echo esc_attr($class_name); ?>" data-component="<?php echo $component_name; ?>">
    <div class="section_blogs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tour_last_hour_title">
                        <?php if ($title): ?>
                            <h2><a href="<?php echo esc_url(get_post_type_archive_link('post')); ?>" title="<?php echo esc_attr($title); ?>"><?php echo esc_html($title); ?></a></h2>
                        <?php endif; ?>
                        <?php if ($description): ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if ($choose_post && is_array($choose_post)): ?>
                        <div class="row">
                            <?php foreach ($choose_post as $post_item): ?>
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
                                <div class="evo-item-blogs col-lg-4 col-md-4 col-12">
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
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (get_field('title_btn') && get_field('link_btn')): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="evo-index-tour-more">
                                    <a href="<?php echo esc_url(get_field('link_btn')); ?>" title="<?php echo esc_attr(get_field('title_btn')); ?>"><?php echo esc_html(get_field('title_btn')); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>