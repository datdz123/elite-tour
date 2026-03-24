<?php
$component_name = get_row_layout();
$hide_block = get_sub_field('hide_block');
$section_id = get_sub_field('section_id');
$section_attr = $section_id ? ' id="' . esc_attr($section_id) . '"' : '';

$list_title = get_sub_field('list_title');
$description = get_sub_field('description');
$choose_tour = get_sub_field('choose_tour');
$number_post = get_sub_field('number_post') ?: 8;
$title_btn = get_sub_field('title_btn');

$link_btn = '';
if ($choose_tour) {
    $term_id = is_array($choose_tour) ? $choose_tour[0] : $choose_tour;
    $link_btn = get_term_link((int)$term_id, 'taxonomy_travel');
}

// Get tours based on selected taxonomy
$args = array(
    'post_type'      => 'travel_service',
    'posts_per_page' => $number_post,
    'post_status'    => 'publish',
);

if ($choose_tour) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'taxonomy_travel',
            'field'    => 'term_id',
            'terms'    => $choose_tour,
        ),
    );
}

$query = new WP_Query($args);
?>

<section<?php echo $section_attr; ?> class="awe-section-3" data-component="<?php echo esc_attr($component_name); ?>">
    <div class="section_tour_last_hour evo-index-tour">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tour_last_hour_title">
                         <?php if ($link_btn && !is_wp_error($link_btn)): ?>
                        <h2>
                
                                <a href="<?php echo esc_url($link_btn); ?>" title="<?php echo esc_attr(strip_tags(implode(' ', array_column($list_title ?: [], 'title_highlight')))); ?>">
                        

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
                        <?php endif; ?>
                        <?php if($description): ?>
                            <p><?php echo esc_html($description); ?></p>
                        <?php endif; ?>

                    </div>
                    <div class="row evo-tour-scroll">
                        <?php if ($query->have_posts()): ?>
                            <?php while ($query->have_posts()): $query->the_post(); ?>
                                <?php
                                $tour_id = get_the_ID();
                                $tour_title = get_the_title();
                                $tour_link = get_permalink();
                                $tour_thumbnail = get_the_post_thumbnail_url($tour_id, 'large') ?: 'https://via.placeholder.com/400x300';

                                $tour_price_original_raw = get_field('tour_price_original', $tour_id); // Giá gốc
                                $tour_price_raw = get_field('tour_price', $tour_id); // Giá hiện tại
                                $tour_time = get_field('tour_time', $tour_id); // Thời gian
                                $tour_departure_schedule = get_field('tour_departure_schedule', $tour_id); // Lịch khởi hành
                                $move_plain = get_field('move_plain', $tour_id); // Phương tiện di chuyển (repeater)

                                $tour_price_original = $tour_price_original_raw ? (float) str_replace('.', '', $tour_price_original_raw) : 0;
                                $tour_price = $tour_price_raw ? (float) str_replace('.', '', $tour_price_raw) : 0;

                                $discount_percent = 0;
                                if ($tour_price_original > 0 && $tour_price > 0 && $tour_price < $tour_price_original) {
                                    $discount_percent = round((($tour_price_original - $tour_price) / $tour_price_original) * 100);
                                }
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <?php
                                    set_query_var('tour_post', get_post());
                                    get_template_part('template-parts/content', 'travel_service');
                                    ?>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                    <?php if ($title_btn && $link_btn && !is_wp_error($link_btn)): ?>
                        <div class="evo-index-tour-more">
                            <a href="<?php echo esc_url($link_btn); ?>" title="<?php echo esc_attr($title_btn); ?>"><?php echo esc_html($title_btn); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>