<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php

$post_gride = "abl2";
$bloglayout = "albl3";

if (defined('FW')) {

	$post_gride    = fw_get_db_settings_option( 'archive_blog_layout_post');
	$bloglayout    = fw_get_db_settings_option( 'blog_archive_a');
}

?>

	<div class="wrap container-fulid">
   
		 <div class="container">
             <?php
              $queried_object = get_queried_object();
             $paged = get_query_var('paged') ? get_query_var('paged') : 1;
             $post_rev = array(
	             'post_type' => array('post'),
                 'category_name' => $queried_object->slug,
	             'post_status' => array('publish'),
	             'meta_key'  => 'post_views_count',
	             'paged' => $paged


             );

             $review = new WP_Query($post_rev);
             ?>
			 <?php if ($review->have_posts() ) : ?>
                 <div class="section">
                     <div style="min-height: 75px"></div>
                     <div class="clearfix"></div>
                     <div class="container">
                         <div class="page-ttile-name">
                            <?php  //the_archive_title( '<h2>', '</h2>' ); ?>
                            
                             <h2> <?php single_cat_title(); ?> </h2>
                         </div>
                     </div>
                 </div>
			 <?php endif; ?>
		 </div>

		<div id="primary" class="content-area container">
			<main id="main" class="site-main" >
                <div class="row">
	                <?php if($bloglayout == "albl1") :  ?>
                        <div class="col-xs-12 col-sm-3">
			                <?php get_sidebar();  ?>
                        </div>
	                <?php endif; ?>
	                <?php if(($bloglayout == "albl1") || ($bloglayout == "albl2")) :  ?>
                    <div class="col-xs-12 col-sm-9">
		                <?php endif;  ?>
				<?php


				if ( $review->have_posts() ) : ?>
					<?php
					/* Start the Loop */
					 $i = 1;
					while ( $review->have_posts() ) : $review->the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						if($post_gride == 'abl2') :

							get_template_part("/template-parts/post/content");
							if($i%4 == 0) echo '<div class="clearfix"></div>';

						endif;
						if($post_gride == 'abl1') :
							get_template_part("/template-parts/post/content","onebyone");
						endif;

						if($post_gride == 'abl3') :
							get_template_part("/template-parts/post/content","tips");
						endif;

				$i++;	endwhile;
					if (  $wp_query->max_num_pages > 1 ) :
					?>
					<div class="col-lg-12 text-center">
						<?php
						if (function_exists('review_product_load_more_pagination')) {
							$argument = base64_encode(serialize($post_rev));
							echo review_product_load_more_pagination($argument, $review->max_num_pages, $paged + 1);

						}
						?>
					</div>
					<?php

					endif;
				else :

					get_template_part( 'template-parts/post/content', 'none' );

				endif; ?>

                  <?php if(($bloglayout == "albl1") || ($bloglayout == "albl2")) :  ?>
                    </div>
                <?php endif;  ?>
	                <?php if($bloglayout == "albl2") :  ?>
                        <div class="col-xs-12 col-sm-3">
			                <?php get_sidebar();  ?>
                        </div>
	                <?php endif; ?>
                </div>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();
