<?php

/**
 * Block Tour Policy template.
 *
 * @param array $block The block settings and attributes.
 */
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
$is_preview = defined('DOING_AJAX') && DOING_AJAX;
$list_policy = get_field('list_policy');
?>

<?php
if (!empty($block['data']['preview_image_help']) && !empty($is_preview)): ?>
    <img src="<?php echo esc_url($block['data']['preview_image_help']); ?>" style="width:100%;height:auto;" />
    <?php return; ?>
<?php endif; ?>

<section <?php echo esc_attr($anchor); ?> class="awe-section-2<?php echo esc_attr($class_name); ?>" data-component="<?php echo $component_name; ?>">
    <div class="section_tour_policy">
        <div class="container">
            <div class="row">
                <?php if ($list_policy && is_array($list_policy) && count($list_policy) > 0): ?>
                    <?php foreach ($list_policy as $policy_item): ?>
                        <?php
                        // Skip if hidden
                        if (!empty($policy_item['hide_block'])) {
                            continue;
                        }

                        $icon_id = $policy_item['icon'];
                        $title = $policy_item['title'];
                        $description = $policy_item['description'];

                        // Get icon URL
                        $icon_url = '';
                        if ($icon_id) {
                            $icon_url = wp_get_attachment_image_url($icon_id, 'medium');
                        }
                        ?>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="evo-tour-policy-item">
                                <a href="#" title="<?php echo esc_attr($title); ?>">
                                    <div class="icon">
                                        <img src="<?php echo $icon_url;?>"
                                            data-src="<?php echo esc_url($icon_url); ?>"
                                            alt="<?php echo esc_attr($title); ?>" class="lazy img-responsive mx-auto d-block">
                                    </div>
                                    <div class="caption">
                                        <h3><?php echo esc_html($title); ?></h3>
                                        <div><?php echo esc_html($description); ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Fallback: default 3 policies -->
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="evo-tour-policy-item">
                            <a href="#" title="Đảm bảo giá tốt nhất">
                                <div class="icon">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/feature_search_image_1.png?1768795562299"
                                        alt="Đảm bảo giá tốt nhất" class="lazy img-responsive mx-auto d-block">
                                </div>
                                <div class="caption">
                                    <h3>Đảm bảo giá tốt nhất</h3>
                                    <div>Chúng tôi đảm bảo khách hàng sẽ đặt được dịch vụ với giá tốt nhất, những chương
                                        trình khuyến mãi hấp dẫn nhất</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="evo-tour-policy-item">
                            <a href="#" title="Dịch vụ tin cậy - Giá trị đích thực">
                                <div class="icon">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/feature_search_image_2.png?1768795562299"
                                        alt="Dịch vụ tin cậy - Giá trị đích thực"
                                        class="lazy img-responsive mx-auto d-block">
                                </div>
                                <div class="caption">
                                    <h3>Dịch vụ tin cậy - Giá trị đích thực</h3>
                                    <div>Đặt lợi ích khách hàng lên trên hết, chúng tôi hỗ trợ khách hàng nhanh và chính
                                        xác nhất với dịch vụ tin cậy, giá trị đích thực.</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="evo-tour-policy-item">
                            <a href="#" title="Đảm bảo chất lượng">
                                <div class="icon">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/feature_search_image_3.png?1768795562299"
                                        alt="Đảm bảo chất lượng" class="lazy img-responsive mx-auto d-block">
                                </div>
                                <div class="caption">
                                    <h3>Đảm bảo chất lượng</h3>
                                    <div>Chúng tôi liên kết chặt chẽ với các đối tác, khảo sát định kỳ để đảm bảo chất
                                        lượng tốt nhất của dịch vụ</div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>