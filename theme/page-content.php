<?php

/**
Template Name: Page Container
 */

get_header();
?>
<main>
	<?php get_template_part('template-parts/breadcrumb'); ?>
	 <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
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
                
                        <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</main>
<h1 class="hidden d-none">
	<?php echo wp_get_document_title(); ?>
</h1>
<?php
get_footer();