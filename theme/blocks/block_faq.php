<?php
$hide_block = get_field('hide_block');
if ($hide_block) return;

$title = get_field('title');
$list_faq = get_field('list_faq');

$is_preview = defined('DOING_AJAX') && DOING_AJAX;
$component_name = basename(__FILE__, '.php');
$anchor = '';
$class_name = '';
if (!empty($block['anchor'])) {
    $anchor = 'id=' . esc_attr($block['anchor']) . '';
}

if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>
<section class="page margin-top-20 margin-bottom-20 <?php echo esc_attr($class_name); ?>" <?php echo $anchor; ?> data-component="<?php echo esc_attr($component_name); ?>">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="page-title category-title">
                    <h1 class="title-head"><a href="#" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                </div>
                <div class="content-page rte">

                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <style>
                        :root {
                            --bg: #f7f7f8;
                            --card: #ffffff;
                            --text: #222;
                            --muted: #666;
                            --border: #eaeaea;
                            --brand: #0a7cff;
                        }

                        * {
                            box-sizing: border-box;
                        }

                        html,
                        body {
                            margin: 0;
                            padding: 0;
                        }

                        body {
                            font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
                            background: var(--bg);
                            color: var(--text);
                            line-height: 1.6;
                        }

                        .container {
                            max-width: 980px;
                            margin: 40px auto;
                            padding: 0 16px;
                        }

                        .card {
                            background: var(--card);
                            border-radius: 14px;
                            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
                            border: 1px solid var(--border);
                            overflow: hidden;
                        }

                        header.card-header {
                            padding: 22px 22px 0 22px;
                        }

                        h1 {
                            margin: 0 0 8px 0;
                            font-size: 26px;
                        }

                        .subtle {
                            color: var(--muted);
                            font-size: 14px;
                            margin: 0 0 16px 0;
                        }

                        .accordion {
                            border-top: 1px solid var(--border);
                        }

                        .faq-item {
                            border-bottom: 1px solid var(--border);
                        }

                        .faq-question {
                            width: 100%;
                            text-align: left;
                            background: transparent;
                            border: 0;
                            padding: 18px 56px 18px 18px;
                            font-size: 16px;
                            font-weight: 650;
                            cursor: pointer;
                            position: relative;
                        }

                        .faq-question:focus-visible {
                            outline: 2px solid var(--brand);
                            outline-offset: 2px;
                            border-radius: 10px;
                        }

                        /* chevron */
                        .faq-question::after {
                            content: '';
                            position: absolute;
                            right: 18px;
                            top: 50%;
                            transform: translateY(-50%) rotate(0deg);
                            width: 10px;
                            height: 10px;
                            border-right: 2px solid var(--muted);
                            border-bottom: 2px solid var(--muted);
                            transition: transform .25s ease;
                            transform-origin: 50% 50%;
                        }

                        .faq-question[aria-expanded="true"]::after {
                            transform: translateY(-50%) rotate(45deg);
                        }

                        .faq-question[aria-expanded="false"]::after {
                            transform: translateY(-50%) rotate(-45deg);
                        }

                        .faq-answer[hidden] {
                            display: none;
                        }

                        .faq-answer {
                            padding: 0 18px 18px 18px;
                            color: var(--text);
                        }

                        .faq-answer p {
                            margin: 10px 0;
                        }

                        .faq-answer ul {
                            margin: 8px 0 8px 18px;
                        }

                        .faq-answer li {
                            margin: 6px 0;
                        }

                        .note {
                            color: var(--muted);
                            font-size: 13px;
                        }

                        a {
                            color: var(--brand);
                            text-decoration: none;
                        }

                        a:hover {
                            text-decoration: underline;
                        }
                    </style>
                    <main class="container">
                        <div class="card" id="faq">
                            <header class="card-header">
                                <?php if(get_field("title")) : ?>
                                    <h1><?php echo get_field("title"); ?></h1>
                                <?php endif; ?>
                                <?php if(get_field("description")) : ?>
                                    <h2 class="subtle"><?php echo get_field("description"); ?>&nbsp;</h2>
                                <?php endif; ?>
                            </header>
                            <section class="accordion" role="tablist" aria-multiselectable="false">
                                <?php if ($list_faq) : ?>
                                    <?php foreach ($list_faq as $key => $item) :
                                        $q_id = 'q' . $key;
                                        $a_id = 'a' . $key;
                                    ?>
                                        <div class="faq-item">
                                            <button class="faq-question" id="<?php echo esc_attr($q_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($a_id); ?>">
                                                <?php echo esc_html($item['title_faq']); ?>
                                            </button>
                                            <div class="faq-answer" id="<?php echo esc_attr($a_id); ?>" role="region" aria-labelledby="<?php echo esc_attr($q_id); ?>" hidden="">
                                                <?php echo $item['content_faq']; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </section>
                        </div>
                    </main>
                 

                </div>
            </div>
        </div>
    </div>
</section>