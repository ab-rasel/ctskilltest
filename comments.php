<!--FOOTER START-->

<?php

$logo_img = array('url' => '');
$copy_right = "";
$add_title = "Top Drill Press Of The Month";
$ad_img = array('url' => '');
$ad_link = "";

if (defined('FW')) {
	$logo_img = fw_get_db_settings_option('flogo_img', array('url' => ''));
	$copy_right = fw_get_db_settings_option( 'copyright' );
	$add_title = fw_get_db_settings_option( 'as_title' );
	$ad_link = fw_get_db_settings_option( 'ad_product_link' );
	$ad_img = fw_get_db_settings_option('ad_img', array('url' => ''));
}

?>

<?php

if(is_front_page()){
 ?>
	<?php
	global $post;
	$related =  array(
		'category__in'   => wp_get_post_categories( $post->ID ),
		'posts_per_page' => -1,
		'post__not_in'   => array( $post->ID )
	);
	$q = new WP_Query($related);
	if($q->have_posts()) :
		?>



        <section class="comment-section bg-white related-product-section">
        <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <div class="section-title">
                    <h2><?php _e("Recent Products", TD); ?></h2>
                </div>
            </div>
            <div class="col-xs-4">
                <div class="recent-product-controll">
                    <a class="rp-prev" href="#"><i class="fa fa-angle-left"></i></a>
                    <a class="rp-next" href="#"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row" id="related_single_blog">
		<?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-lg-12">
            <div class="single-related-post">
				<?php if(has_post_thumbnail()) : ?>
                    <div class="product-img">
					<a href="<?php echo the_permalink(); ?>">	<?php the_post_thumbnail('recent_post');  ?></a>
                    </div>
				<?php endif; ?>
                <div class="single-related-post-dec">
                    <div class="single-related-btn">
                        <a class="drill-btn text-capitalize" href="<?php echo esc_url((fw_get_db_post_option(get_the_ID(),'az_link'))); ?>">Check Latest Price</a>
                    </div>

					<?php the_title('<h2 class="related2-title"><a href="'.get_the_permalink().'">','</a></h2>');  ?>
                    <div class="related-meta clearfix">
                        <a class="pull-left" href="<?php echo get_post_type_archive_link('post'); ?>"><i class="fa fa-clock-o"></i><?php echo get_the_time('d F'); ?></a>
                        <a class="pull-right" href="#"><i class="fa fa-comments"></i> <?php comments_number( 'no responses', '1 Comment', '% Comments' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
	<?php endwhile; endif; ?>
    </div>
    </div>
    </section>


<?php
}


?>


<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

             <?php if(isset($logo_img['url']) && $logo_img['url'] != "") :  ?>
				<div class="f-logo">
					<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php  echo esc_url($logo_img['url']); ?>" alt="Logo"></a>
				</div>
             <?php endif; ?>
				<div class="footer-top-wrap hidden-lg hidden-md hidden-sm">
					<div class="footer-top text-center">
						<?php
						if(has_nav_menu('top')) {


							$arrs = array('theme_location' => 'top');
							wp_nav_menu($arrs);
						}
						?>
					</div>
					<?php if(is_active_sidebar('single-sidebar-2')) : ?>

						<?php dynamic_sidebar('single-sidebar-2'); ?>

					<?php endif; ?>
				</div>
				<?php

				/**
				 * if footer menu set show it
				 */
				  if(has_nav_menu('footer')){
				      get_template_part("template-parts/footer/content", "footernav");
                  }

                 ?>
                   <p class="copytext">
                    <?php
                      if($copy_right != "") :
                    echo wp_kses($copy_right, array(
                        'a' => array(
                            'href' => array(),
                            'title' => array(),
                        ),
                        'b'=>array(),
                        'i'=>array(),
                        'br'=>array(),
                        'span'=>array(),
                    ));

                      endif;
                    ?>
                   </p>
			</div>
		</div>
	</div>
</footer>
<div class="product-ad">
	<?php

	$page = get_page_by_title('What is Lorem Ipsum?', OBJECT, 'post');


	?>
    <a id="close" href="#"><i class="fa fa-times"></i></a>
    <h2 class="title"><a href="<?php echo esc_url($ad_link); ?>"><?php echo $add_title;   ?></a></h2>
    <?php if(!empty($ad_img['url'])){ ?>
    <div class="product-img">
        <a href="<?php echo esc_url($ad_link); ?>"><img src="<?php  echo esc_url($ad_img['url']); ?>" alt=""></a>
    </div>
    <?php }?>
    <h2 class="price"><?php _e("Price : $$$", TD); ?></h2>
</div>
<!--FOOTER END-->

<a id="backto-top" href="#"><i class="fa fa-angle-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>