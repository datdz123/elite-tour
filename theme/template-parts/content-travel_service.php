 <?php
    $tour_id = $tour_post->ID;
    $tour_title = get_the_title($tour_id);
    $tour_link = get_permalink($tour_id);
    $tour_thumbnail = get_the_post_thumbnail_url($tour_id, 'large');

    $tour_price_original_raw = get_field('tour_price_original', $tour_id);
    $tour_price_raw = get_field('tour_price', $tour_id);
    $tour_time = get_field('tour_time', $tour_id);
    $tour_departure_schedule = get_field('tour_departure_schedule', $tour_id);
    $move_plain = get_field('move_plain', $tour_id);

    $tour_price_original = $tour_price_original_raw ? (float) str_replace('.', '', $tour_price_original_raw) : 0;
    $tour_price = $tour_price_raw ? (float) str_replace('.', '', $tour_price_raw) : 0;
    $discount_percent = 0;
    if ($tour_price_original > 0 && $tour_price > 0 && $tour_price < $tour_price_original) {
        $discount_percent = round((($tour_price_original - $tour_price) / $tour_price_original) * 100);
    }
    ?>

 <div class="evo-product-block-item">
     <div class="img-tour">
         <a class="imgWrap pt_67 img--cover"
             href="<?php echo esc_url($tour_link); ?>"
             title="<?php echo esc_attr($tour_title); ?>">
             <span class="imgWrap-item">

                 <img class="lazy" style="opacity: 1;"
                     src="<?php echo gnws_post_thumbnail_full(); ?>"
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
                 <?php else: ?>
                     <?php _e('Liên hệ', 'gnws'); ?>
                 <?php endif; ?>

             </div>
             <div class="booking-box d-none">
                 <a href="<?php echo esc_url($tour_link); ?>"
                     title="Đặt Tour" class="btn btn-sm"><?php _e('Đặt Tour', 'gnws'); ?></a>
             </div>
         </div>
     </div>
 </div>