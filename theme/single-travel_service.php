<?php
get_header();
?>
<?php get_template_part('template-parts/breadcrumb'); ?>


<section class="product product-margin" itemscope itemtype="http://schema.org/Product">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Product",
            "@id": "https://elitetour.com.vn/tour-mu-cang-chai-tram-tau-ban-cu-vai-mua-lua-chin-3n2d#product",
            "name": "Tour M&#249; Cang Chải - Trạm Tấu - Bản Cu Vai M&#249;a L&#250;a Ch&#237;n 3N2Đ",
            "image": [
                "https://bizweb.dktcdn.net/thumb/grande/100/562/154/products/tour-mu-cang-chai-jpg.jpg?v=1757487886753",

                "https://bizweb.dktcdn.net/thumb/grande/100/562/154/products/tour-mu-cang-chai-jpg.jpg?v=1757487886753",

                "https://bizweb.dktcdn.net/thumb/grande/100/562/154/products/deo-khau-pha-jpg.jpg?v=1757487886753",

                "https://bizweb.dktcdn.net/thumb/grande/100/562/154/products/doi-che-thanh-son-1-1-jpg.jpg?v=1757487886753",

                "https://bizweb.dktcdn.net/thumb/grande/100/562/154/products/du-lich-mu-cang-chai-1-jpg-226c4eec-356c-4721-9fdd-142089b5d2e8.jpg?v=1757487886753"

            ],
            "description": "Cứ v&#224;o khoảng cuối th&#225;ng 9, đầu th&#225;ng 10 h&#224;ng năm, du kh&#225;ch khắp mọi miền tổ quốc đều đổ về M&#249; Cang Chải để chi&#234;m ngưỡng khung cảnh đẹp tuyệt vời của mảnh đất v&#249;ng cao n&#224;y. Đến với nơi đ&#226;y, du kh&#225;ch kh&#244;ng chỉ được thưởng ngoạn vẻ đẹp của những thửa ruộng bậc thang, những biển m&#226;y trắng tr&#234;n đỉnh đ&#232;o Cao Phạ m&#224; c&#24...",
            "offers": {
                "@type": "Offer",
                "url": "https://elitetour.com.vn/tour-mu-cang-chai-tram-tau-ban-cu-vai-mua-lua-chin-3n2d",
                "priceCurrency": "VND",

                "price": "2290000",

                "priceValidUntil": "2026-12-31",
                "availability": "https://schema.org/InStock",
                "itemCondition": "https://schema.org/NewCondition",
                "seller": {
                    "@type": "Organization",
                    "name": "Elite Tour",
                    "url": "https://elitetour.com.vn",
                    "logo": {
                        "@type": "ImageObject",
                        "url": "https://bizweb.dktcdn.net/100/562/154/themes/1004558/assets/logo.png"
                    }
                }
            }
        }
    </script>
    <div class="container">
        <div class="row details-product">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 no-padding-right order-lg-first order-last ">
                <?php
                // Get tour images from ACF field list_img
                $list_img = get_field('list_img');
                $post_title = get_the_title();
                ?>
                <div class="relative product-image-block">
                    <div class="slider-big-video clearfix">
                        <div class="slider slider-for">
                            <?php if ($list_img) : foreach ($list_img as $item) :
                                    $img_id = $item['img'];
                                    $img_url = wp_get_attachment_image_url($img_id, 'large');
                                    $img_full = wp_get_attachment_image_url($img_id, 'full');
                                    if ($img_url) :
                            ?>
                                        <a href="<?php echo esc_url($img_full); ?>" title="<?php _e('Click để xem', 'gnws'); ?>">
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($post_title); ?>" data-image="<?php echo esc_url($img_full); ?>" class="img-responsive mx-auto d-block">
                                        </a>
                                    <?php endif;
                                endforeach;
                            else :
                                // Fallback to featured image if no list_img
                                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                $thumbnail_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                if ($thumbnail) :
                                    ?>
                                    <a href="<?php echo esc_url($thumbnail_full); ?>" title="<?php _e('Click để xem', 'gnws'); ?>">
                                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($post_title); ?>" data-image="<?php echo esc_url($thumbnail_full); ?>" class="img-responsive mx-auto d-block">
                                    </a>
                            <?php endif;
                            endif; ?>
                        </div>
                    </div>
                    <div class="slider-has-video clearfix d-none">
                        <div class="slider slider-nav">
                            <?php if ($list_img) : foreach ($list_img as $item) :
                                    $img_id = $item['img'];
                                    $img_url = wp_get_attachment_image_url($img_id, 'thumbnail');
                                    $img_full = wp_get_attachment_image_url($img_id, 'full');
                                    if ($img_url) :
                            ?>
                                        <div class="fixs">
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($post_title); ?>" data-image="<?php echo esc_url($img_full); ?>" />
                                        </div>
                                    <?php endif;
                                endforeach;
                            else :
                                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                                $thumbnail_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                if ($thumbnail) :
                                    ?>
                                    <div class="fixs">
                                        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($post_title); ?>" data-image="<?php echo esc_url($thumbnail_full); ?>" />
                                    </div>
                            <?php endif;
                            endif; ?>
                        </div>
                    </div>
                </div>
                <div class=' product-image-block-2'>
                    <div class="product-bg-white  evo-tour-program">
                        <ul class="tour-program">
                            <li><a href="#tour-1" class="scroll-content"><img src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/product_tab1_icon.png?1768795562299" alt="Tổng quan" /> <span>Tổng quan</span></a></li>
                            <li><a href="#tour-2" class="scroll-content"><img src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/product_tab2_icon.png?1768795562299" alt="Lịch trình" /> <span>Lịch trình</span></a></li>
                            <li><a href="#book-tour-now" class="scroll-content"><img src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/product_tab3_icon.png?1768795562299" alt="Đặt tour" /> <span>Đặt tour</span></a></li>
                        </ul>
                    </div>
                    <div class='product-bg-white mt_15'>
                        <ul class="ct_course_list">
                            <?php
                            $move_plain = get_field('move_plain');
                            $tour_departure_schedule = get_field('tour_departure_schedule');
                            $tour_time = get_field('tour_time');

                            if ($move_plain) :
                                foreach ($move_plain as $transport) :
                                    $icon_id = $transport['icon'];
                                    $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'thumbnail') : '';
                                    $content = $transport['content'];
                            ?>
                                    <li>
                                        <?php if ($icon_url) : ?>
                                            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($content); ?>" />
                                        <?php endif; ?>
                                        <?php _e('Di chuyển:', 'gnws'); ?> <span class="tag-color"><?php echo esc_html($content); ?></span>
                                    </li>
                            <?php
                                endforeach;
                            endif;
                            ?>
                            <?php if ($tour_departure_schedule) : ?>
                                <li>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_4.svg" alt="<?php echo esc_attr($tour_departure_schedule); ?>" />
                                    <?php _e('Lịch khởi hành:', 'gnws'); ?> <span class="tag-color"><span id="date-khoi-hanh"><?php echo esc_html($tour_departure_schedule); ?></span></span>
                                </li>
                            <?php endif; ?>
                            <?php if ($tour_time) : ?>
                                <li>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($tour_time); ?>" />
                                    <?php _e('Thời gian:', 'gnws'); ?> <span class="tag-color"><?php echo esc_html($tour_time); ?></span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>


                </div>

                <section class='prd_content  mt_15'>
                    <?php
                    $content_overview = get_field('content_overview');
                    $list_schedule = get_field('list_schedule');
                    ?>
                    <h3 class="prd_content_title" id="tour-1">
                        <a href="javascript:void(0);" title="<?php _e('Tổng quan', 'gnws'); ?>">
                            <?php _e('Tổng quan', 'gnws'); ?>
                        </a>
                    </h3>
                    <div class="rte product-bg-white">
                        <?php if ($content_overview) : ?>
                            <?php echo $content_overview; ?>
                        <?php else : ?>
                            <p><?php _e('Chưa có nội dung tổng quan.', 'gnws'); ?></p>
                        <?php endif; ?>
                    </div>

                    <h3 class="prd_content_title" id="tour-2">
                        <a href="javascript:void(0);" title="<?php _e('Lịch trình', 'gnws'); ?>">
                            <?php _e('Lịch trình', 'gnws'); ?>
                        </a>
                    </h3>
                    <div class="product-bg-white">
                        <div id="accordion" class="page_appear_list">
                            <?php if ($list_schedule) :
                                $first = true;
                                foreach ($list_schedule as $schedule) :
                                    $title = $schedule['title'];
                                    $content = $schedule['content_schedule'];
                            ?>
                                    <div class="page_appear_listitem <?php echo $first ? 'active' : ''; ?>">
                                        <h3 class="title">
                                            <?php echo esc_html($title); ?>
                                        </h3>
                                        <div class="pane rte" <?php echo !$first ? 'style="display: none;"' : ''; ?>>
                                            <?php echo $content; ?>
                                        </div>
                                    </div>
                                <?php
                                    $first = false;
                                endforeach;
                            else : ?>
                                <div class="page_appear_listitem">
                                    <h3 class="title">
                                        <?php _e('Chưa có lịch trình', 'gnws'); ?>
                                    </h3>
                                    <div class="pane rte">
                                        <p><?php _e('Lịch trình đang được cập nhật.', 'gnws'); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                </section>


                <script>
                    jQuery(document).ready(function($) {
                        $('.page_appear_listitem').click(function() {
                            if ($(this).hasClass('active')) {
                                $(this).removeClass('active');
                                $(this).find('.pane').slideUp(100);
                            } else {

                                $('.page_appear_listitem .pane').slideUp();
                                $('.page_appear_listitem h3 i').removeClass('fa-minus').addClass('fa-plus');
                                $('.page_appear_listitem .pane')
                                $('.page_appear_listitem').removeClass('active');
                                $(this).addClass('active');
                                $(this).find('.pane').slideDown(100);
                            }
                        });
                    });
                </script>
                <?php
                // Get tour price for booking section - display exactly as entered in ACF
                $booking_tour_price = isset($tour_price) ? $tour_price : get_field('tour_price');
                $booking_tour_title = get_the_title();
                $booking_tour_id = get_the_ID();
                ?>
                <div class="product-bg-white evo-tour-booking " id="book-tour-now">
                    <div class="tour-schedule-title"><?php _e('Đặt Tour', 'gnws'); ?></div>
                    <form>
                        <div class="pd_tour_variants clearfix">
                            <ul class="pd_variants_title clearfix row">
                                <li class="col-sm-4 col-4">
                                    <?php _e('Loại', 'gnws'); ?>
                                </li>
                                <li class="col-sm-2 col-4 noleftpadding norightpadding">
                                    <?php _e('Số người', 'gnws'); ?>
                                </li>
                                <li class="col-sm-3 col-4 text-right">
                                    <?php _e('Đơn giá', 'gnws'); ?>
                                </li>
                                <li class="col-sm-3 hidden-xss text-right">
                                    <?php _e('Tổng giá', 'gnws'); ?>
                                </li>
                            </ul>
                            <div class="pd_variants_content clearfix">
                                <?php if ($booking_tour_price) : ?>
                                    <ul class="variant_list clearfix row" id="tour-<?php echo esc_attr($booking_tour_id); ?>">
                                        <li class="col-sm-4 col-4 variant_title">
                                            <div class="variant_mutiple" title="<?php echo esc_attr($booking_tour_title); ?>"><?php echo esc_html($booking_tour_title); ?></div>
                                        </li>
                                        <li class="col-sm-2 col-4">
                                            <div class="quantity product-quantity clearfix">
                                                <input type="hidden" value="<?php echo esc_attr($booking_tour_id); ?>" name="variantId" id="variant-0">
                                                <button type="button" class="minus">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/evo-down-arrow.svg" alt="<?php _e('Decrease', 'gnws'); ?>" />
                                                </button>
                                                <input type="number" step="1" min="1" name="quantity" value="1" title="<?php _e('Quantity', 'gnws'); ?>" class="qty" id="quantity-0" disabled>
                                                <button type="button" value="+" class="plus">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/evo-up-arrow.svg" alt="<?php _e('Increase', 'gnws'); ?>" />
                                                </button>
                                            </div>
                                        </li>
                                        <li class="col-sm-3 col-4 text-right variant_price">
                                            <?php echo esc_html($booking_tour_price); ?>
                                            <input type="hidden" name="variant_price" value="<?php echo esc_attr($booking_tour_price); ?>">
                                        </li>
                                        <li class="col-sm-3 subtotal text-right hidden-xss"><?php echo esc_html($booking_tour_price); ?></li>
                                    </ul>
                                <?php endif; ?>
                                <div class="totalPrice text-right clearfix row">
                                    <span class="col-md-8 col-sm-9 col-6"><?php _e('Tổng giá', 'gnws'); ?></span>
                                    <strong class="col-md-4 col-sm-3 col-6"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row contact_btn_group">
                            <div class="col-md-6 col-sm-7 col-12">
                                <div class="line-item-property__field d-none">
                                    <div class="input-group flex-nowrap">
                                        <div class="input-group-prepend"><span class="input-group-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($booking_tour_title); ?>" /></span></div>
                                        <input required class="required tourmaster-datepicker" id="datesss" name="properties[<?php _e('Departure Date', 'gnws'); ?>]" type="text" placeholder="<?php _e('Select Departure Date', 'gnws'); ?>" data-date-format="dd MM yyyy" readonly="readonly" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5 add-to-cart col-12">
                                <button type="submit" id="submit-table" class="d-none pull-right btn btn-default buynow add-to-cart button nomargin"><?php _e('Đặt Tour', 'gnws'); ?></button>
                                <div class="call-me-back">
                                    <button class="btn-callmeback" type="button" data-toggle="modal" data-target="#myCallBack" title="<?php _e('Đặt Tour', 'gnws'); ?>"><?php _e('Đặt Tour', 'gnws'); ?></button>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-warning alert-dismissible margin-top-20" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="<?php _e('Đóng', 'gnws'); ?>"><span aria-hidden="true">×</span></button>
                            <?php printf(__('Vui lòng liên hệ %s để đặt Tour.', 'gnws'), '<strong><a href="tel:02435642888">024 3564 2888</a></strong>'); ?>
                        </div>
                        <script>
                            jQuery(function($) {
                                if ($('.pd_tour_variants .pd_variants_content ul.variant_list').length == 0) {
                                    $('.pd_tour_variants').addClass('d-none');
                                    $('.contact_btn_group').addClass('d-none');
                                    $('.alert-warning').removeClass('d-none');
                                } else {
                                    $('.alert-warning').addClass('d-none');
                                    $.each($('.quantity'), function() {
                                        var $qty = $(this).find('input.qty');
                                        var quantity = parseInt($qty.val());
                                        var $minus = $(this).find('.minus');
                                        var $plus = $(this).find('.plus');
                                        $minus.on('click', function() {
                                            if (quantity > 0) {
                                                if (quantity == 1) {}
                                                quantity -= 1;
                                            } else {
                                                quantity = 0;
                                            }
                                            $qty.val(quantity);
                                            updatePrice()
                                        });
                                        $plus.on('click', function() {
                                            if (quantity < 100) {
                                                quantity += 1;
                                            } else {
                                                quantity = 100;
                                            };
                                            $qty.val(quantity);
                                            var max = parseInt(jQuery($qty).attr('max'), 10) || 10000;
                                            var value = parseInt(jQuery($qty).val(), 10) || 0;
                                            if (value > max) {
                                                alert('<?php echo esc_js(__('We only have', 'gnws')); ?> ' + max + ' <?php echo esc_js(__('slots available', 'gnws')); ?>');
                                                jQuery($qty).val(max);
                                            };
                                            updatePrice();
                                        });
                                    });
                                    var formatMoney = function(amount) {
                                        return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + '₫';
                                    };
                                    var parseMoney = function(value) {
                                        // Remove dots (thousand separators) and ₫ symbol before parsing
                                        return parseInt(String(value).replace(/\./g, '').replace('₫', '')) || 0;
                                    };
                                    var updatePrice = function() {
                                        var totalPrice = 0;
                                        $.each($('.pd_variants_content ul.variant_list'), function() {
                                            var unitPrice = parseMoney($(this).find('.variant_price [name="variant_price"]').val());
                                            var qty = parseInt($(this).find('.product-quantity .qty').val()) || 0;
                                            var subTotalPrice = unitPrice * qty;
                                            $(this).find('.subtotal').html(formatMoney(subTotalPrice));
                                            totalPrice += subTotalPrice;
                                        });
                                        $('.totalPrice strong').html(formatMoney(totalPrice));
                                        $('.totalPrice strong').attr("data-price", totalPrice);
                                        if ($(".totalPrice strong").attr("data-price") > 0) {
                                            $("#submit-table").removeAttr('disabled');
                                        } else {
                                            $("#submit-table").attr('disabled', 'disabled');
                                        }
                                    };
                                    updatePrice();
                                }
                            });
                        </script>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 details-pro order-lg-last">
                <div class="sticky-top">
                    <div class="product-bg-white">
                        <?php
                        // Get ACF fields
                        $tour_price = get_field('tour_price');
                        $tour_price_original = get_field('tour_price_original');
                        $destination_trip = get_field('destination_trip');
                        $trip = get_field('trip');

                        // Calculate discount percentage
                        $discount_percent = 0;
                        if ($tour_price_original && $tour_price && (float)$tour_price_original > (float)$tour_price) {
                            $tour_price_num = (float) str_replace(['.', ','], ['', '.'], $tour_price);
                            $tour_price_original_num = (float) str_replace(['.', ','], ['', '.'], $tour_price_original);
                            if ($tour_price_original_num > 0) {
                                $discount_percent = round((($tour_price_original_num - $tour_price_num) / $tour_price_original_num) * 100);
                            }
                        }
                        ?>
                        <div class="product-with-wish-list">
                            <h1 class="title-head"><?php the_title(); ?></h1>
                        </div>

                        <?php if ($destination_trip) : ?>
                            <div class='product_vitri mb_15'>
                                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/map2.webp' alt='<?php _e('Vị trí', 'gnws'); ?>' width='16' height='16'>
                                <span> <?php echo esc_html($destination_trip); ?></span>
                            </div>
                        <?php endif; ?>

                        <div>
                            <div class="inventory_quantity d-none">
                                <span class="stock-brand-title"><?php _e('Tình trạng:', 'gnws'); ?></span>
                                <span class="a-stock a1"><?php _e('Còn hàng', 'gnws'); ?></span>
                            </div>
                            <div class="price-box clearfix">
                                <?php if ($tour_price) : ?>
                                    <span class="special-price">
                                        <span class="price product-price"><?php echo is_numeric($tour_price) ? number_format((float)$tour_price, 0, ',', '.') . '₫' : esc_html($tour_price); ?></span>
                                    </span> <!-- Giá Khuyến mại -->
                                <?php endif; ?>
                                <?php if ($tour_price_original && $tour_price_original != $tour_price) : ?>
                                    <span class="old-price">
                                        <?php _e('Giá mới:', 'gnws'); ?>
                                        <del class="price product-price-old">
                                            <?php echo is_numeric($tour_price_original) ? number_format((float)$tour_price_original, 0, ',', '.') . '₫' : esc_html($tour_price_original); ?>
                                        </del>
                                    </span> <!-- Giá gốc -->
                                <?php endif; ?>
                                <?php if ($discount_percent > 0) : ?>
                                    <span class="save-price"><?php _e('Tiết kiệm', 'gnws'); ?>
                                        <span class="price product-price-save">-<?php echo esc_html($discount_percent); ?>%</span>
                                    </span> <!-- Tiết kiệm -->
                                <?php endif; ?>
                            </div>
                        </div>
                        <a target="_blank" class="orange-btn" href="<?php echo esc_url(home_url('/in-tour?=' . get_post_field('post_name', get_the_ID()))); ?>" title="<?php _e('In chương trình tour', 'gnws'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/printer.svg" alt="<?php _e('In chương trình tour', 'gnws'); ?>" /> <?php _e('In chương trình tour', 'gnws'); ?></a>
                        <?php if ($trip) : ?>
                            <div class="journey">
                                <span><?php _e('Hành trình:', 'gnws'); ?></span> <?php echo esc_html($trip); ?>
                            </div>
                        <?php endif; ?>
                        <div class="call-me-back">
                            <button class="btn-callmeback" type="button" data-toggle="modal" data-target="#myCallBack" title="Đặt giữ chỗ ngay">Đặt giữ chỗ ngay</button>
                        </div>
                    </div>

                    <div class="product-bg-white mt_15 d-none d-lg-block mt_15">
                        <aside class="product_relate_blog ">
                            <div class="product_relate_blog_title">
                                <h3 class="">
                                    <?php _e('Tin tức du lịch', 'gnws'); ?>
                                    <span class='head-tit-down'></span>
                                </h3>
                            </div>

                            <?php
                            $latest_news = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 7,
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));

                            if ($latest_news->have_posts()) :
                                while ($latest_news->have_posts()) : $latest_news->the_post();
                                    $post_title = get_the_title();
                                    $post_link = get_permalink();
                                    $post_date = get_the_date('d/m/Y');
                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                    if (!$thumbnail_url) {
                                        $thumbnail_url = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                                    }
                            ?>
                                    <div class="item">
                                        <a class="thumb effect_img" href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>">
                                            <img src="<?php echo $thumbnail_url; ?>" data-src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post_title); ?>" class="lazy img-responsive center-block" />
                                        </a>
                                        <div class="info">
                                            <h4 class="">
                                                <a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_html($post_title); ?></a>
                                            </h4>
                                            <div class='timepost'>
                                                <?php echo esc_html($post_date); ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>

                        </aside>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class='container'>
        <div class="product-bg-white d-block d-lg-none mt_15 ">
            <aside class="product_relate_blog ">
                <div class="product_relate_blog_title">
                    <h3 class="">
                        <?php _e('Tin tức du lịch', 'gnws'); ?>
                        <span class='head-tit-down'></span>
                    </h3>
                </div>

                <?php
                $mobile_news = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 7,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                if ($mobile_news->have_posts()) :
                    while ($mobile_news->have_posts()) : $mobile_news->the_post();
                        $post_title = get_the_title();
                        $post_link = get_permalink();
                        $post_date = get_the_date('d/m/Y');
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        if (!$thumbnail_url) {
                            $thumbnail_url = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                        }
                ?>
                        <div class="item">
                            <a class="thumb effect_img" href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>">
                                <img src="<?php echo $thumbnail_url; ?>" data-src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post_title); ?>" class="lazy img-responsive center-block" />
                            </a>
                            <div class="info">
                                <h4 class="">
                                    <a href="<?php echo esc_url($post_link); ?>" title="<?php echo esc_attr($post_title); ?>"><?php echo esc_html($post_title); ?></a>
                                </h4>
                                <div class='timepost'>
                                    <?php echo esc_html($post_date); ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </aside>
        </div>
    </div>



    <?php
    // Get current post's taxonomy terms
    $current_post_id = get_the_ID();
    $taxonomy_terms = get_the_terms($current_post_id, 'taxonomy_travel');
    $term_ids = array();
    $first_term_link = get_post_type_archive_link('travel_service');

    if ($taxonomy_terms && !is_wp_error($taxonomy_terms)) {
        foreach ($taxonomy_terms as $term) {
            $term_ids[] = $term->term_id;
        }
        $first_term_link = get_term_link($taxonomy_terms[0]);
    }

    $related_tours = new WP_Query(array(
        'post_type' => 'travel_service',
        'posts_per_page' => 12,
        'post_status' => 'publish',
        'post__not_in' => array($current_post_id),
        'tax_query' => !empty($term_ids) ? array(
            array(
                'taxonomy' => 'taxonomy_travel',
                'field' => 'term_id',
                'terms' => $term_ids
            )
        ) : array(),
        'orderby' => 'date',
        'order' => 'DESC'
    ));

    if ($related_tours->have_posts()) :
    ?>
        <div class="container product-gray product_recent">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-bg-white">
                        <div class="related-product">
                            <div class="home-title text-center">
                                <h2><a href="<?php echo esc_url($first_term_link); ?>" title="<?php _e('Các Tour tương tự', 'gnws'); ?>"><?php _e('Các Tour tương tự', 'gnws'); ?></a></h2>
                            </div>
                            <div class="evo-owl-product clearfix">
                                <?php
                                while ($related_tours->have_posts()) : $related_tours->the_post();
                                    $tour_id = get_the_ID();
                                    $tour_title = get_the_title();
                                    $tour_link = get_permalink();
                                    $tour_thumbnail = get_the_post_thumbnail_url($tour_id, 'large');
                                    if (!$tour_thumbnail) {
                                        $tour_thumbnail = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                                    }

                                    // Get ACF fields
                                    $tour_price_raw = get_field('tour_price', $tour_id);
                                    $tour_price_original_raw = get_field('tour_price_original', $tour_id);

                                    // Clean and convert
                                    $tour_price = $tour_price_raw ? (float) str_replace(['.', ','], ['', '.'], $tour_price_raw) : 0;
                                    $tour_price_original = $tour_price_original_raw ? (float) str_replace(['.', ','], ['', '.'], $tour_price_original_raw) : 0;

                                    $tour_time = get_field('tour_time', $tour_id);
                                    $tour_departure = get_field('tour_departure_schedule', $tour_id);
                                    $move_plain = get_field('move_plain', $tour_id);

                                    // Calculate discount percentage
                                    $discount_percent = 0;
                                    if ($tour_price_original && $tour_price && $tour_price_original > $tour_price) {
                                        $discount_percent = round((($tour_price_original - $tour_price) / $tour_price_original) * 100);
                                    }
                                ?>
                                    <div class="evo-slick">
                                        <div class="evo-product-block-item">
                                            <div class="img-tour">
                                                <a class="imgWrap pt_67 img--cover" href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>">
                                                    <span class="imgWrap-item">
                                                        <img style="opacity: 1;" class="lazy" src="<?php echo $tour_thumbnail; ?>" data-src="<?php echo esc_url($tour_thumbnail); ?>" alt="<?php echo esc_attr($tour_title); ?>" />
                                                    </span>
                                                </a>
                                                <?php if ($discount_percent > 0) : ?>
                                                    <span class="smart">- <?php echo esc_html($discount_percent); ?>% </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="info-tour clearfix">
                                                <h3><a href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>"><?php echo esc_html($tour_title); ?></a></h3>
                                                <div class="vote-box">
                                                    <div class="meta-vote">
                                                        <ul class="ct_course_list">
                                                            <?php if ($move_plain) : foreach ($move_plain as $transport) :
                                                                    $icon_id = $transport['icon'];
                                                                    $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'thumbnail') : '';
                                                                    $content = $transport['content'];
                                                            ?>
                                                                    <li data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($content); ?>">
                                                                        <?php if ($icon_url) : ?>
                                                                            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($content); ?>" />
                                                                        <?php endif; ?>
                                                                    </li>
                                                            <?php endforeach;
                                                            endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="date-go">
                                                    <ul class="ct_course_list">
                                                        <?php if ($tour_departure) : ?>
                                                            <li class="clearfix">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_4.svg" alt="<?php echo esc_attr($tour_departure); ?>" /> <?php _e('Lịch khởi hành:', 'gnws'); ?> <span><?php echo esc_html($tour_departure); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if ($tour_time) : ?>
                                                            <li class="clearfix">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($tour_time); ?>" /> <?php _e('Thời gian:', 'gnws'); ?> <span><?php echo esc_html($tour_time); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>

                                                <div class="action-box">
                                                    <?php if ($tour_price > 0) : ?>
                                                        <div class="price-box">
                                                            <?php echo esc_html(number_format($tour_price, 0, ',', '.')); ?>₫
                                                            <?php if ($tour_price_original && $tour_price_original > $tour_price) : ?>
                                                                <span class="compare-price"><?php echo esc_html(number_format($tour_price_original, 0, ',', '.')); ?>₫</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="booking-box d-none">
                                                        <a href="<?php echo esc_url($tour_link); ?>" title="<?php _e('Đặt Tour', 'gnws'); ?>" class="btn btn-sm"><?php _e('ĐẶT TOUR', 'gnws'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php
    // Random tours section
    $random_tours = new WP_Query(array(
        'post_type' => 'travel_service',
        'posts_per_page' => 12,
        'post_status' => 'publish',
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand'
    ));

    if ($random_tours->have_posts()) :
    ?>
        <div class="container product-gray product_recent">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-bg-white">
                        <div class="related-product">
                            <div class="home-title text-center">
                                <h2><a href="<?php echo get_post_type_archive_link('travel_service'); ?>" title="<?php _e('Tour giờ chót giá tốt', 'gnws'); ?>"><span><?php _e('Tour giờ chót', 'gnws'); ?></span> <?php _e('giá tốt', 'gnws'); ?></a></h2>
                            </div>
                            <div class="evo-owl-product clearfix">
                                <?php
                                while ($random_tours->have_posts()) : $random_tours->the_post();
                                    $tour_id = get_the_ID();
                                    $tour_title = get_the_title();
                                    $tour_link = get_permalink();
                                    $tour_thumbnail = get_the_post_thumbnail_url($tour_id, 'large');
                                    if (!$tour_thumbnail) {
                                        $tour_thumbnail = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                                    }

                                    // Get ACF fields
                                    $tour_price_raw = get_field('tour_price', $tour_id);
                                    $tour_price_original_raw = get_field('tour_price_original', $tour_id);

                                    // Clean and convert
                                    $tour_price = $tour_price_raw ? (float) str_replace(['.', ','], ['', '.'], $tour_price_raw) : 0;
                                    $tour_price_original = $tour_price_original_raw ? (float) str_replace(['.', ','], ['', '.'], $tour_price_original_raw) : 0;

                                    $tour_time = get_field('tour_time', $tour_id);
                                    $tour_departure = get_field('tour_departure_schedule', $tour_id);
                                    $move_plain = get_field('move_plain', $tour_id);

                                    // Calculate discount percentage
                                    $discount_percent = 0;
                                    if ($tour_price_original && $tour_price && $tour_price_original > $tour_price) {
                                        $discount_percent = round((($tour_price_original - $tour_price) / $tour_price_original) * 100);
                                    }
                                ?>
                                    <div class="evo-slick">
                                        <div class="evo-product-block-item">
                                            <div class="img-tour">
                                                <a class="imgWrap pt_67 img--cover" href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>">
                                                    <span class="imgWrap-item">
                                                        <img style="opacity: 1;" class="lazy" src="<?php echo $tour_thumbnail; ?>" data-src="<?php echo esc_url($tour_thumbnail); ?>" alt="<?php echo esc_attr($tour_title); ?>" />
                                                    </span>
                                                </a>
                                                <?php if ($discount_percent > 0) : ?>
                                                    <span class="smart">- <?php echo esc_html($discount_percent); ?>% </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="info-tour clearfix">
                                                <h3><a href="<?php echo esc_url($tour_link); ?>" title="<?php echo esc_attr($tour_title); ?>"><?php echo esc_html($tour_title); ?></a></h3>
                                                <div class="vote-box">
                                                    <div class="meta-vote">
                                                        <ul class="ct_course_list">
                                                            <?php if ($move_plain) : foreach ($move_plain as $transport) :
                                                                    $icon_id = $transport['icon'];
                                                                    $icon_url = $icon_id ? wp_get_attachment_image_url($icon_id, 'thumbnail') : '';
                                                                    $content = $transport['content'];
                                                            ?>
                                                                    <li data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($content); ?>">
                                                                        <?php if ($icon_url) : ?>
                                                                            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($content); ?>" />
                                                                        <?php endif; ?>
                                                                    </li>
                                                            <?php endforeach;
                                                            endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="date-go">
                                                    <ul class="ct_course_list">
                                                        <?php if ($tour_departure) : ?>
                                                            <li class="clearfix">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_4.svg" alt="<?php echo esc_attr($tour_departure); ?>" /> <?php _e('Lịch khởi hành:', 'gnws'); ?> <span><?php echo esc_html($tour_departure); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if ($tour_time) : ?>
                                                            <li class="clearfix">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tag_icon_5.svg" alt="<?php echo esc_attr($tour_time); ?>" /> <?php _e('Thời gian:', 'gnws'); ?> <span><?php echo esc_html($tour_time); ?></span>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <div class="action-box">
                                                    <?php if ($tour_price > 0) : ?>
                                                        <div class="price-box">
                                                            <?php echo esc_html(number_format($tour_price, 0, ',', '.')); ?>₫
                                                            <?php if ($tour_price_original && $tour_price_original > $tour_price) : ?>
                                                                <span class="compare-price"><?php echo esc_html(number_format($tour_price_original, 0, ',', '.')); ?>₫</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="booking-box d-none">
                                                        <a href="<?php echo esc_url($tour_link); ?>" title="<?php _e('Đặt Tour', 'gnws'); ?>" class="btn btn-sm"><?php _e('ĐẶT TOUR', 'gnws'); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
<script>
    var length = 1;
</script>
<div class="modal fade" id="myCallBack" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php _e('Yêu cầu đặt Tour', 'gnws'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php _e('Đóng', 'gnws'); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <?php
                        $modal_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        if (!$modal_thumb) $modal_thumb = get_template_directory_uri() . '/assets/images/placeholder.jpg';
                        ?>
                        <img src="<?php echo esc_url($modal_thumb); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive mx-auto d-block" />
                        <h3 class="cta-name-pro"><?php the_title(); ?></h3>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <?php echo do_shortcode('[contact-form-7 id="898b7f2" title="Form Đăng ký dịch vụ du lịch"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        // Manual modal trigger if Bootstrap JS is not loaded or failing
        $(document).on('click', '.btn-callmeback, [data-target="#myCallBack"]', function(e) {
            e.preventDefault();
            $('#myCallBack').addClass('show').css('display', 'block');
            $('body').addClass('modal-open');
            if ($('.modal-backdrop').length == 0) {
                $('body').append('<div class="modal-backdrop fade show"></div>');
            }
        });

        $(document).on('click', '#myCallBack .close, .modal-backdrop', function() {
            $('#myCallBack').removeClass('show').css('display', 'none');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    });
</script>
<script>
    jQuery(function($) {
        $('.page_appear_listitem').click(function() {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(this).find('.pane').slideUp(100);
            } else {

                $('.page_appear_listitem .pane').slideUp();
                $('.page_appear_listitem h3 i').removeClass('fa-minus').addClass('fa-plus');
                $('.page_appear_listitem').removeClass('active');
                $(this).addClass('active');
                $(this).find('.pane').slideDown(100);
            }
        });
    });
</script>

<?php
get_footer();
?>