<?php
$hide_block = get_sub_field('hide_block');
if ($hide_block) return;

$content = get_sub_field('content');
$component_name = get_row_layout();
$section_id = get_sub_field('section_id');
$section_attr = $section_id ? ' id="' . esc_attr($section_id) . '"' : '';
?>
<section<?php echo $section_attr; ?> data-component="<?php echo esc_attr($component_name); ?>" class="page margin-top-20 margin-bottom-20">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="page-title category-title">
                    <h1 class="title-head"><a href="#" title="Giới thiệu công ty du lịch Elite Tour">Giới thiệu công ty du lịch Elite Tour</a></h1>
                </div>
                <div class="content-page rte">

                    <p><br></p>
                    <style>
                        /* Ẩn theo thiết bị */
                        .pdf-desktop {
                            display: block;
                        }

                        .pdf-mobile {
                            display: none;
                        }

                        @media screen and (max-width: 768px) {
                            .pdf-desktop {
                                display: none;
                            }

                            .pdf-mobile {
                                display: block;
                            }
                        }
                    </style>
                    <!-- PC: Nhúng trực tiếp PDF -->
                    <div class="pdf-desktop"><embed src="https://bizweb.dktcdn.net/100/562/154/files/profile-cong-ty-du-lich-elite-tour.pdf?v=1765533655447" type="application/pdf" width="100%" height="600px"><br></div>
                    <!-- Mobile: Xem bằng Google Docs Viewer -->
                    <div class="pdf-mobile"><iframe style="width: 100%; height: 700px; border: none;" src="https://docs.google.com/gview?embedded=true&amp;url=https://bizweb.dktcdn.net/100/562/154/files/profile-cong-ty-du-lich-elite-tour.pdf?v=1765533655447"></iframe></div>

                    <?php if ($content) : ?>
                        <?php echo wp_kses_post($content); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>