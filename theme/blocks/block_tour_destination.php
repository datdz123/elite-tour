<?php

/**
 * Block Tour Destination template.
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
$list_destination = get_field('list_destination');

// Don't render if block is hidden
if ($hide_block) {
    return;
}

// Arrow icon SVG for row 2
$arrow_icon = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve"><path d="M150,0C67.157,0,0,67.157,0,150c0,82.841,67.157,150,150,150s150-67.159,150-150C300,67.157,232.843,0,150,0zM195.708,160.159c-0.731,0.731-1.533,1.349-2.368,1.886l-56.295,56.295c-2.734,2.736-6.318,4.103-9.902,4.103s-7.166-1.367-9.902-4.103c-5.47-5.47-5.47-14.34,0-19.808l48.509-48.516l-48.265-48.265c-5.47-5.473-5.47-14.34,0-19.808c5.47-5.47,14.338-5.467,19.808-0.003l56.046,56.043c0.835,0.537,1.637,1.154,2.365,1.886c2.796,2.796,4.145,6.479,4.082,10.146C199.852,153.68,198.506,157.361,195.708,160.159z"></path></svg>';
?>

<?php
if (!empty($block['data']['preview_image_help']) && !empty($is_preview)): ?>
    <img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%;height:auto;" />
    <?php return; ?>
<?php endif; ?>

<section <?php echo esc_attr($anchor); ?> class="awe-section-9<?php echo esc_attr($class_name); ?>" data-component="<?php echo $component_name; ?>">
    <div class="section_tour_destination">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tour_last_hour_title">
                        <?php if ($title): ?>
                            <h2><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>
                        <?php if ($description): ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ($list_destination && is_array($list_destination)): ?>
                <?php
                $total_items = count($list_destination);
                $group_size = 9; // 4 items + 5 items per group
                $groups = ceil($total_items / $group_size);

                for ($g = 0; $g < $groups; $g++):
                    $group_start = $g * $group_size;

                    // Row 1: items 1-4 of each group (indices 0-3)
                    $row1_start = $group_start;
                    $row1_end = min($group_start + 4, $total_items);
                    $row1_items = array_slice($list_destination, $row1_start, 4);

                    // Row 2: items 5-9 of each group (indices 4-8)
                    $row2_start = $group_start + 4;
                    $row2_items = [];
                    if ($row2_start < $total_items) {
                        $row2_items = array_slice($list_destination, $row2_start, 5);
                    }
                ?>

                    <?php if (!empty($row1_items)): ?>
                        <!-- Row 1: 4 items (group <?php echo $g + 1; ?>) -->
                        <div class="row">
                            <?php foreach ($row1_items as $item): ?>
                                <?php
                                $img_id = $item['img'] ?? '';
                                $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'large') : '';
                                $title_name = $item['title_name'] ?? '';
                                $destination_visitors = $item['destination_visitors'] ?? '';
                                $title_link = $item['title_link'] ?? $title_name;
                                $link = $item['link'] ?? '#';
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                                    <div class="pos-relative">
                                        <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($title_link); ?>">
                                            <div class="destination-image">
                                                <img style="opacity: 1;" src="<?php echo esc_url($img_url); ?>"
                                                    data-src="<?php echo esc_url($img_url); ?>"
                                                    alt="<?php echo esc_attr($title_name); ?>" class="lazy img-responsive mx-auto d-block">
                                            </div>
                                            <div class="frame-destination">
                                                <div class="destination-name"><?php echo esc_html($title_name); ?></div>
                                                <?php if ($destination_visitors): ?>
                                                    <div class="destination-like"><?php _e('Đã có', 'gnws'); ?> <span><?php echo esc_html($destination_visitors); ?></span> <?php _e('lượt khách', 'gnws'); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($row2_items)): ?>
                        <!-- Row 2: 5 items - outbound (group <?php echo $g + 1; ?>) -->
                        <div class="row out-bound">
                            <?php
                            $row2_count = count($row2_items);
                            ?>
                            <?php foreach ($row2_items as $index => $item): ?>
                                <?php
                                $img_id = $item['img'] ?? '';
                                $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'large') : '';
                                $title_name = $item['title_name'] ?? '';
                                $title_link = $item['title_link'] ?? $title_name;
                                $link = $item['link'] ?? '#';

                                // Item thứ 5 trong row 2 (index 4) hoặc item cuối cùng sẽ là col-12 trên mobile
                                $is_last_in_row = ($index === 4) || ($index === $row2_count - 1 && $row2_count === 5);
                                $col_class = $is_last_in_row ? 'col-lg-15 col-md-15 col-sm-3 col-12' : 'col-lg-15 col-md-15 col-sm-3 col-6';
                                ?>
                                <div class="<?php echo esc_attr($col_class); ?>">
                                    <div class="pos-relative">
                                        <a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($title_link); ?>">
                                            <div class="destination-image">
                                                <img style="opacity: 1;" src="<?php echo esc_url($img_url); ?>"
                                                    data-src="<?php echo esc_url($img_url); ?>"
                                                    alt="<?php echo esc_attr($title_name); ?>" class="lazy img-responsive mx-auto d-block">
                                            </div>
                                            <div class="frame-destination">
                                                <div class="destination-name"><?php echo esc_html($title_name); ?></div>
                                                <div class="destination-like"><?php _e('Khám phá ngay', 'gnws'); ?> <?php echo $arrow_icon; ?></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
</section>