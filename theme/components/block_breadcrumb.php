<?php
$hide_block = get_sub_field('hide_block');
if ($hide_block) {
    return;
}

$component_name = get_row_layout();
$section_id = get_sub_field('section_id');
$section_attr = $section_id ? ' id="' . esc_attr($section_id) . '"' : '';
?>

<section<?php echo $section_attr; ?> class="bread-crumb margin-bottom-10" data-component="<?php echo esc_attr($component_name); ?>">
    <div class="container">
        <div class="breadcrumb">
            <?php if (function_exists("rank_math_the_breadcrumbs")) : ?>
                <?php rank_math_the_breadcrumbs(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>