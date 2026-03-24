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
                                    foreach ($terms as $t) {
                                        echo '<option value="' . esc_attr($t->term_id) . '">' . esc_html($t->name) . '</option>';
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
                            echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3">';
                            set_query_var('tour_post', get_post());
                            get_template_part('template-parts/content', 'travel_service');
                            echo '</div>';
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
