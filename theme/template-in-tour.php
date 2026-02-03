<?php

/**
 * Template Name: In Tour
 * Description: Template for printing tour details.
 */

// Get tour slug from query string
$tour_slug = '';
$query_string = $_SERVER['QUERY_STRING'];

if (strpos($query_string, '=') === 0) {
    $tour_slug = substr($query_string, 1);
} elseif (!empty($_GET)) {
    $keys = array_keys($_GET);
    if (!empty($keys)) {
        $tour_slug = $_GET[$keys[0]];
    }
}

if (empty($tour_slug)) {
    wp_die(__('Không tìm thấy chương trình tour.', 'gnws'));
}

// Query the tour
$args = array(
    'name'           => $tour_slug,
    'post_type'      => 'travel_service',
    'post_status'    => 'publish',
    'posts_per_page' => 1
);
$tour_query = new WP_Query($args);

if (!$tour_query->have_posts()) {
    wp_die(__('Chương trình tour không tồn tại hoặc đã bị xóa.', 'gnws'));
}

$tour_query->the_post();
$tour_id = get_the_ID();

// Get ACF fields
$tour_time = get_field('tour_time', $tour_id);
$tour_departure = get_field('tour_departure_schedule', $tour_id);
$tour_price = get_field('tour_price', $tour_id);
$trip = get_field('trip', $tour_id);
$destination = get_field('destination_trip', $tour_id);
$overview = get_field('content_overview', $tour_id);
$itinerary = get_field('list_schedule', $tour_id);
$move_plain = get_field('move_plain', $tour_id);
$list_img = get_field('list_img', $tour_id);

// Get thumbnail
$thumbnail_url = get_the_post_thumbnail_url($tour_id, 'full');
if (!$thumbnail_url && !empty($list_img)) {
    $thumbnail_url = wp_get_attachment_image_url($list_img[0]['img'], 'full');
}
if (!$thumbnail_url) {
    $thumbnail_url = get_template_directory_uri() . '/assets/images/placeholder.jpg';
}

// Theme options for contact info
$site_logo = get_field('logo', 'option');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title><?php printf(__('In chương trình tour: %s', 'gnws'), get_the_title()); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-size: 14px;
            line-height: 21px;
            color: black;
            font-weight: normal;
            background-color: rgba(0, 0, 0, 0.85);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        img {
            width: 100%;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            background: #fff;
            padding: 0;
        }

        .image-header {
            max-height: 400px;
            overflow: hidden;
            position: relative;
            object-fit: cover;
        }

        .image-header img {
            max-width: 100%;
            height: auto;
            width: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .image-header h1.tour-title {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 350px;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 15px;
            font-size: 1.5em;
        }

        @media(max-width: 767px) {
            .image-header h1.tour-title {
                width: auto;
                top: 10px;
                right: 10px;
                left: 10px;
                padding: 10px;
                margin-top: 0;
                font-size: 18px;
            }
        }

        .image-header .tour-description {
            position: absolute;
            bottom: 30px;
            left: 30px;
            width: 300px;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 5px 7px;
        }

        .image-header .tour-description p {
            margin: 5px;
            line-height: 13px;
            font-weight: 500;
        }

        .tour-content {
            padding: 15px;
        }

        .tour-content img {
            max-width: 800px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        @media(max-width: 767px) {
            .tour-content {
                padding: 10px;
            }
        }

        h2.tour-title {
            text-decoration: underline;
        }

        h6 {
            font-size: 14px;
            margin: 10px 0;
        }

        p {
            margin: 10px 0;
        }

        #admin_bar_iframe {
            display: none;
        }

        @media print {
            body {
                background: #fff;
            }

            .print-btn-fixed {
                display: none !important;
            }
        }

        .print-btn-fixed {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #ed1c21;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(237, 28, 33, 0.4);
            z-index: 9999;
        }

        .print-btn-fixed:hover {
            background: #c4161a;
        }
    </style>
</head>

<body>
    <button onclick="window.print()" class="print-btn-fixed"><?php _e('In chương trình', 'gnws'); ?></button>

    <div class="container evo-success-in">
        <div class="image-header">
            <img class="page-image-tour-tag" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <h1 class="tour-title"><?php the_title(); ?></h1>
            <div class="tour-description">
                <?php if ($tour_time): ?>
                    <p><?php _e('Thời gian:', 'gnws'); ?> <strong><?php echo esc_html($tour_time); ?></strong></p>
                <?php endif; ?>
                <?php if ($tour_departure): ?>
                    <p><?php _e('Lịch khởi hành:', 'gnws'); ?> <strong><?php echo esc_html($tour_departure); ?></strong></p>
                <?php endif; ?>
                <?php if ($move_plain && is_array($move_plain)): ?>
                    <?php foreach ($move_plain as $transport): ?>
                        <p><?php _e('Di chuyển:', 'gnws'); ?> <strong><?php echo esc_html($transport['content']); ?></strong></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="tour-content">
            <?php if ($overview): ?>
                <?php echo $overview; ?>
            <?php endif; ?>

            <?php if ($itinerary && is_array($itinerary)): ?>
                <?php foreach ($itinerary as $day): ?>
                    <h6><?php echo esc_html($day['title']); ?></h6>
                    <?php echo $day['content_schedule']; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 1500);
        };
    </script>
</body>

</html>
<?php
wp_reset_postdata();
?>