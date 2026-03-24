<?php
$component_name = get_row_layout();
$hide_block = get_sub_field('hide_block');
$section_id = get_sub_field('section_id');
$section_attr = $section_id ? ' id="' . esc_attr($section_id) . '"' : '';

$title = get_sub_field('title');
$description = get_sub_field('description');
$list_img = get_sub_field('list_img');

// Don't render if block is hidden
if ($hide_block) {
    return;
}
?>

<section<?php echo $section_attr; ?> class="awe-section-4" data-component="<?php echo esc_attr($component_name); ?>">
    <!-- Swiper CSS -->
    <!-- <link rel="stylesheet" href="css/swiper-bundle.min.css"> -->

    <style>
        /* =========================
     SECTION BANNER – CHUẨN TOUR
     ========================= */

        .section_banner {
            width: 100%;
        }

        /* Khoảng cách giữa tiêu đề và slider giống tour */
        .section_banner .swiper {
            width: 100%;
            position: relative;
            margin-top: 20px;
        }

        .section_banner .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .section_banner .swiper-slide img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .section_banner .swiper-slide img:hover {
            transform: scale(1.02);
        }

        /* Navigation */
        .section_banner .swiper-button-next,
        .section_banner .swiper-button-prev {
            color: #fff;
            width: 40px;
            height: 40px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
        }

        .section_banner .swiper-button-next:after,
        .section_banner .swiper-button-prev:after {
            font-size: 18px;
        }

        .section_banner .swiper-button-next {
            right: 10px;
        }

        .section_banner .swiper-button-prev {
            left: 10px;
        }

        @media (max-width: 768px) {

            .section_banner .swiper-button-next,
            .section_banner .swiper-button-prev {
                width: 30px;
                height: 30px;
            }
        }
    </style>

    <div class="section_tour_inbound evo-index-tour">
        <div class="section_banner">
            <div class="container">
                <div class="section_tour_last_hour_title">
                    <?php if ($title): ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>
                </div>


                <!-- SLIDER BANNER -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php if ($list_img && is_array($list_img)): ?>
                            <?php foreach ($list_img as $item): ?>
                                <?php
                                $img_id = $item['img'] ?? '';
                                $img_url = $img_id ? wp_get_attachment_image_url($img_id, 'large') : '';
                                $img_alt = $img_id ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';
                                ?>
                                <?php if ($img_url): ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo esc_url($img_url); ?>" title="<?php echo esc_attr($img_alt); ?>">
                                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Swiper JS -->

    <!-- <script src="js/swiper-bundle.min.js"></script> -->

  
</section>