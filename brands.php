<?php
// template name: brands home

get_header();
?>


<!--MAIN CONTENT START-->
<section class="common-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-ttile-name">
                    <h2><?php _e("Brand Home", TD) ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-sm-8">
                <div class="row">


                    <div class="clearfix"></div>


                    <div class="clearfix"></div>

	                <?php

	                $arg = array(
		                'post_type' => 'post',
		                'posts_per_page' => 4,
		                'tax_query' => array(
			                array(
				                'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
				                'field'    => 'slug',
				                'terms'    => 'brands', // brands category
			                ),
		                )
	                );

	                $loop = new WP_Query($arg);  $i = 1;
	                 while ($loop->have_posts()) : $loop->the_post();
		                get_template_part("/template-parts/post/content","band");
                     if($i == 2) echo "<div class=\"clearfix\"></div>";
	                $i++; endwhile;
	                ?>


                </div>
            </div>
            <div class="col-lg-3 col-sm-4">
                <div class="blog-sidebar">
	                <?php dynamic_sidebar('single-sidebar-3')  ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();  ?>