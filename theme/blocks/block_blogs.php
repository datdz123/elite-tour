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
$category_post = get_field('category_post'); // Taxonomy field - returns term object or ID
$posts_count = get_field('choose_post'); // Number field - số lượng bài viết
$title_btn = get_field('title_btn');

// Don't render if block is hidden
if ($hide_block) {
    return;
}

// Get category link for button
$category_link = '';
if ($category_post) {
    // If category_post is an object (term object)
    if (is_object($category_post)) {
        $category_link = get_term_link($category_post);
    } elseif (is_numeric($category_post)) {
        // If it's a term ID
        $category_link = get_term_link((int)$category_post, 'category');
    }
}

// Query posts by category
$blog_posts = array();
$posts_per_page = $posts_count ? (int)$posts_count : 3;

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    'orderby' => 'date',
    'order' => 'DESC'
);

// Handle category_post - có thể là array (checkbox) hoặc single value
if ($category_post && !empty($category_post)) {
    // Nếu là mảng (checkbox field)
    if (is_array($category_post)) {
        $cat_ids = array();
        foreach ($category_post as $cat) {
            if (is_object($cat)) {
                $cat_ids[] = $cat->term_id;
            } elseif (is_numeric($cat)) {
                $cat_ids[] = (int)$cat;
            }
        }
        if (!empty($cat_ids)) {
            $args['category__in'] = $cat_ids;
        }
    }
    // Nếu là object (single select)
    elseif (is_object($category_post)) {
        $args['cat'] = $category_post->term_id;
    }
    // Nếu là số (term ID)
    elseif (is_numeric($category_post)) {
        $args['cat'] = (int)$category_post;
    }
}

$query = new WP_Query($args);
if ($query->have_posts()) {
    $blog_posts = $query->posts;
}
wp_reset_postdata();
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
                            <h2><a href="<?php echo esc_url($category_link ? $category_link : get_post_type_archive_link('post')); ?>" title="<?php echo esc_attr($title); ?>"><?php echo esc_html($title); ?></a></h2>
                        <?php endif; ?>
                        <?php if ($description): ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($blog_posts)): ?>
                        <div class="row">
                            <?php foreach ($blog_posts as $post_item): ?>
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

                    <?php if ($title_btn && $category_link): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="evo-index-tour-more">
                                    <a href="<?php echo esc_url($category_link); ?>" title="<?php echo esc_attr($title_btn); ?>"><?php echo esc_html($title_btn); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>