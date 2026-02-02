<?php

/**
 * Block Tour Last Hour template.
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
$list_title = get_field('list_title');
$description = get_field('description');
$choose_tour = get_field('choose_tour');
$title_btn = get_field('title_btn');
$link_btn = get_field('link_btn');
?>

<?php
if (!empty($block['data']['preview_image_help']) && !empty($is_preview)): ?>
    <img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%;height:auto;" />
    <?php return; ?>
<?php endif; ?>

<section <?php echo esc_attr($anchor); ?> class="awe-section-3<?php echo esc_attr($class_name); ?>" data-component="<?php echo $component_name; ?>">
    <div class="section_tour_last_hour evo-index-tour">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tour_last_hour_title">
                        <h2>
                            <?php if ($link_btn): ?>
                                <a href="<?php echo esc_url($link_btn); ?>" title="<?php echo esc_attr(strip_tags(implode(' ', array_column($list_title ?: [], 'title_highlight')))); ?>">
                                <?php else: ?>
                                    <a href="tour" title="Tour ưu đãi Giá tốt">
                                    <?php endif; ?>

                                    <?php if ($list_title): ?>
                                        <?php foreach ($list_title as $title_item): ?>
                                            <?php if (!empty($title_item['is_highlight'])): ?>
                                                <span><?php echo esc_html($title_item['title_highlight']); ?></span>
                                            <?php else: ?>
                                                <?php echo esc_html($title_item['title_highlight']); ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </a>
                        </h2>
                        <p><?php echo $description ? esc_html($description) : 'Cùng Elite Tour điểm qua các địa điểm du lịch trong nước và ngoài nước thu hút du khách nhất nhé!'; ?></p>
                    </div>
                    <div class="row evo-tour-scroll">
                        <?php if ($choose_tour && is_array($choose_tour)): ?>
                            <?php foreach ($choose_tour as $tour_post): ?>
                                <?php
                                // Get tour data
                                $tour_id = $tour_post->ID;
                                $tour_title = get_the_title($tour_id);
                                $tour_link = get_permalink($tour_id);
                                $tour_thumbnail = get_the_post_thumbnail_url($tour_id, 'large') ?: 'https://via.placeholder.com/400x300';

                                // Get tour meta from ACF fields
                                $tour_price_original_raw = get_field('tour_price_original', $tour_id); // Giá gốc
                                $tour_price_raw = get_field('tour_price', $tour_id); // Giá hiện tại
                                $tour_time = get_field('tour_time', $tour_id); // Thời gian
                                $tour_departure_schedule = get_field('tour_departure_schedule', $tour_id); // Lịch khởi hành
                                $move_plain = get_field('move_plain', $tour_id); // Phương tiện di chuyển (repeater)

                                // Convert price strings to numeric (remove dots and convert to float)
                                $tour_price_original = $tour_price_original_raw ? (float) str_replace('.', '', $tour_price_original_raw) : 0;
                                $tour_price = $tour_price_raw ? (float) str_replace('.', '', $tour_price_raw) : 0;

                                // Calculate discount
                                $discount_percent = 0;
                                if ($tour_price_original > 0 && $tour_price > 0 && $tour_price < $tour_price_original) {
                                    $discount_percent = round((($tour_price_original - $tour_price) / $tour_price_original) * 100);
                                }
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="evo-product-block-item">
                                        <div class="img-tour">
                                            <a class="imgWrap pt_67 img--cover"
                                                href="<?php echo esc_url($tour_link); ?>"
                                                title="<?php echo esc_attr($tour_title); ?>">
                                                <span class="imgWrap-item">
                                                    <img class="lazy" style="opacity: 1;"
                                                        src="<?php echo $tour_thumbnail; ?>"
                                                        alt="<?php echo esc_attr($tour_title); ?>">
                                                </span>
                                            </a>
                                            <?php if ($discount_percent > 0): ?>
                                                <span class="smart">- <?php echo esc_html($discount_percent); ?>% </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="info-tour clearfix">
                                            <h3><a href="<?php echo esc_url($tour_link); ?>"
                                                    title="<?php echo esc_attr($tour_title); ?>"><?php echo esc_html($tour_title); ?></a></h3>
                                            <div class="vote-box">
                                                <div class="meta-vote">
                                                    <?php if ($move_plain && is_array($move_plain)): ?>
                                                        <ul class="ct_course_list">
                                                            <?php foreach ($move_plain as $transport): ?>
                                                                <?php
                                                                $icon = $transport['icon'] ?? '';
                                                                $content = $transport['content'] ?? '';
                                                                $icon_url = $icon ? wp_get_attachment_image_url($icon, 'full') : '';
                                                                ?>
                                                                <?php if ($icon_url && $content): ?>
                                                                    <li data-toggle="tooltip" data-placement="top"
                                                                        title="<?php echo esc_attr($content); ?>">
                                                                        <img src="<?php echo esc_url($icon_url); ?>"
                                                                            alt="<?php echo esc_attr($content); ?>">
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="date-go">
                                                <ul class="ct_course_list">
                                                    <?php if ($tour_departure_schedule): ?>
                                                        <li class="clearfix">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_4.svg" alt="<?php echo esc_attr($tour_departure_schedule); ?>"><?php _e('Lịch khởi hành:', 'gnws'); ?>
                                                            <span><?php echo esc_html($tour_departure_schedule); ?></span>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if ($tour_time): ?>
                                                        <li class="clearfix">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($tour_time); ?>"> Thời gian:
                                                            <span><?php echo esc_html($tour_time); ?></span>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="action-box">
                                                <div class="price-box">
                                                    <?php if ($tour_price > 0): ?>
                                                        <?php echo number_format($tour_price, 0, ',', '.'); ?>₫
                                                        <?php if ($tour_price_original > 0 && $tour_price_original > $tour_price): ?>
                                                            <span class="compare-price"><?php echo number_format($tour_price_original, 0, ',', '.'); ?>₫</span>
                                                        <?php endif; ?>
                                                    <?php elseif ($tour_price_original > 0): ?>
                                                        <?php echo number_format($tour_price_original, 0, ',', '.'); ?>₫
                                                    <?php endif; ?>

                                                </div>
                                                <div class="booking-box d-none">
                                                    <a href="<?php echo esc_url($tour_link); ?>"
                                                        title="Đặt Tour" class="btn btn-sm"><?php _e('Đặt Tour', 'gnws'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                    <?php if(get_field("title_btn") && get_field("link_btn")): ?>
                    <div class="evo-index-tour-more">
					<a href="<?php echo get_field("link_btn"); ?>" title="<?php echo get_field("title_btn"); ?>"><?php echo get_field("title_btn"); ?></a>
				</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>