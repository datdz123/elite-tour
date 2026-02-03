<?php
get_header();

// Get current term
$term = get_queried_object();
$term_id = $term->term_id;

// Get ACF banner image
$banner_image_id = get_field('img_banner', 'taxonomy_travel_' . $term_id);
$banner_image_url = $banner_image_id ? wp_get_attachment_image_url($banner_image_id, 'full') : '';
?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<?php if ($banner_image_url) : ?>
    <div class="banner-cate">
        <div class="category-gallery">
            <div class="slide-collection slick-initialized slick-slider">
                <div aria-live="polite" class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 100%;" role="listbox">
                        <div class="item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="-1" role="option" aria-describedby="slick-slide00">
                            <a href="<?php echo esc_url(get_term_link($term)); ?>" title="<?php echo esc_attr($term->name); ?>" tabindex="0"><img alt="<?php echo esc_attr($term->name); ?>" src="<?php echo esc_url($banner_image_url); ?>" class="img-responsive center-block" style="opacity: 1; width:100%;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="evo-tour-search-all">
    <div class="container">
        <form id="taxonomy-tour-search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
            <input type="hidden" name="post_type" value="travel_service">
            <div class="row no-margin">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="input_group group_a">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/place-localizer.svg" alt="Địa điểm">
                        <input type="text" aria-label="Bạn muốn đi đâu?" autocomplete="off" placeholder="Bạn muốn đi đâu?" name="s" id="taxonomy-search-keyword" class="form-control form-hai form-control-lg">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-5 col-12 fix-ipad1">
                    <div class="group-search abs">
                        <div class="group-search-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/date.svg" alt="Tìm kiếm">
                        </div>
                        <div class="group-search-content">
                            <p>Ngày khởi hành</p>
                            <input class="tourmaster-datepicker" id="taxonomy-dates" type="text" placeholder="Chọn Ngày khởi hành" data-date-format="dd MM yyyy" readonly="readonly">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-5 col-12 fix-ipad2">
                    <div class="group-search ab">
                        <div class="group-search-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/paper-plane.svg" alt="Tìm kiếm">
                        </div>
                        <div class="group-search-content">
                            <p><?php _e('Khởi hành từ', 'gnws'); ?></p>
                            <select name="departure_from" class="tag-select">
                                <option value=""><?php _e('Tất cả', 'gnws'); ?></option>
                                <?php
                                $field_object = acf_get_field('departure_from');
                                $taxonomy_name = 'taxonomy_khoi_hanh'; // Default taxonomy

                                if ($field_object && !empty($field_object['taxonomy'])) {
                                    $taxonomy_name = $field_object['taxonomy'];
                                }

                                $terms = get_terms(array(
                                    'taxonomy' => $taxonomy_name,
                                    'hide_empty' => false,
                                ));

                                if (!is_wp_error($terms) && !empty($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-12 fix-ipad">
                    <button type="submit" class="hs-submit btn-style btn btn-default btn-blues" aria-label="Tìm">Tìm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="container margin-bottom-15 padding-top-15">
    <div class="row">

        <section class="main_container collection col-md-12 col-lg-12">
            <h1 class="col-title d-none"><?php echo esc_html($term->name); ?></h1>
            <div class="category-products products category-products-grids clearfix">

                <?php
                // Get current orderby parameter
                $current_orderby = isset($_GET['orderby']) ? sanitize_text_field($_GET['orderby']) : '';
                $term_link = get_term_link($term);
                ?>
                <div class="sort-cate clearfix">
                    <div class="sort-cate-left">
                        <h3>Xếp theo:</h3>
                        <ul>
                            <li class="btn-quick-sort alpha-asc d-none d-lg-block d-md-block<?php echo $current_orderby === 'alpha-asc' ? ' active' : ''; ?>">
                                <a href="<?php echo esc_url(add_query_arg('orderby', 'alpha-asc', $term_link)); ?>" title="Tên A-Z"><i></i>Tên A-Z</a>
                            </li>
                            <li class="btn-quick-sort alpha-desc d-none d-lg-block d-md-block<?php echo $current_orderby === 'alpha-desc' ? ' active' : ''; ?>">
                                <a href="<?php echo esc_url(add_query_arg('orderby', 'alpha-desc', $term_link)); ?>" title="Tên Z-A"><i></i>Tên Z-A</a>
                            </li>
                            <li class="btn-quick-sort price-asc<?php echo $current_orderby === 'price-asc' ? ' active' : ''; ?>">
                                <a href="<?php echo esc_url(add_query_arg('orderby', 'price-asc', $term_link)); ?>" title="Giá tăng dần"><i></i>Giá tăng dần</a>
                            </li>
                            <li class="btn-quick-sort price-desc<?php echo $current_orderby === 'price-desc' ? ' active' : ''; ?>">
                                <a href="<?php echo esc_url(add_query_arg('orderby', 'price-desc', $term_link)); ?>" title="Giá giảm dần"><i></i>Giá giảm dần</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <section class="products-view products-view-grid row">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            $post_id = get_the_ID();
                            $tour_link = get_permalink();
                            $tour_title = get_the_title();
                            $tour_thumbnail = get_the_post_thumbnail_url($post_id, 'large');
                            if (!$tour_thumbnail) {
                                $tour_thumbnail = get_stylesheet_directory_uri() . '/assets/svg/placeholder.svg';
                            }

                            // Get ACF fields
                            $move_plain = get_field('move_plain', $post_id);
                            $tour_departure_schedule = get_field('tour_departure_schedule', $post_id);
                            $tour_time = get_field('tour_time', $post_id);
                            $tour_price = get_field('tour_price', $post_id);
                            $tour_price_original = get_field('tour_price_original', $post_id);

                            // Calculate discount percentage
                            $discount_percent = 0;
                            if ($tour_price && $tour_price_original && $tour_price_original > $tour_price) {
                                $price_current = floatval(preg_replace('/[^0-9]/', '', $tour_price));
                                $price_original = floatval(preg_replace('/[^0-9]/', '', $tour_price_original));
                                if ($price_original > 0) {
                                    $discount_percent = round((($price_original - $price_current) / $price_original) * 100);
                                }
                            }
                    ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="evo-product-block-item">
                                    <div class="img-tour">
                                        <a class="imgWrap pt_67 img--cover" href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>">
                                            <span class="imgWrap-item">
                                                <img class="lazy loaded" src="<?php echo esc_url($tour_thumbnail); ?>" data-src="<?php echo esc_url($tour_thumbnail); ?>" alt="<?php echo esc_attr($tour_title); ?>" data-was-processed="true">
                                            </span>
                                        </a>
                                        <?php if ($discount_percent > 0) : ?>
                                            <span class="smart">- <?php echo $discount_percent; ?>% </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info-tour clearfix">
                                        <h3><a href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>"><?php echo esc_html($tour_title); ?></a></h3>
                                        <?php if ($move_plain && is_array($move_plain) && count($move_plain) > 0) : ?>
                                            <div class="vote-box">
                                                <div class="meta-vote">
                                                    <ul class="ct_course_list">
                                                        <?php foreach ($move_plain as $transport) :
                                                            $icon_id = isset($transport['icon']) ? $transport['icon'] : '';
                                                            $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'thumbnail') : '';
                                                            $content = isset($transport['content']) ? $transport['content'] : '';
                                                            if ($icon_url) :
                                                        ?>
                                                                <li data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($content); ?>">
                                                                    <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($content); ?>">
                                                                </li>
                                                        <?php endif;
                                                        endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="date-go">
                                            <ul class="ct_course_list">
                                                <?php if ($tour_departure_schedule) : ?>
                                                    <li class="clearfix">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tag_icon_4.svg" alt="<?php echo esc_attr($tour_departure_schedule); ?>"> Lịch khởi hành: <span><?php echo esc_html($tour_departure_schedule); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($tour_time) : ?>
                                                    <li class="clearfix">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($tour_time); ?>"> Thời gian: <span><?php echo esc_html($tour_time); ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="action-box">
                                            <div class="price-box">
                                                <?php if ($tour_price) : ?>
                                                    <?php echo esc_html($tour_price); ?>
                                                <?php endif; ?>
                                                <?php if ($tour_price_original && $tour_price_original != $tour_price) : ?>
                                                    <span class="compare-price"><?php echo esc_html($tour_price_original); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="booking-box d-none">
                                                <a href="<?php echo esc_url($tour_link); ?>" title="Đặt Tour" class="btn btn-sm">ĐẶT TOUR</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                    else :
                        ?>
                        <div class="col-12">
                            <p>Không có tour nào trong danh mục này.</p>
                        </div>
                    <?php endif; ?>
                </section>

                <?php gnws_taxonomy_pagination(); ?>

            </div>
            <div>

            </div>
        </section>
    </div>
</div>


<?php
get_footer();
