<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<div class="wrap">
		<div id="primary" class="content-area">
			<main id="main" class="container site-main commom-padding-404" role="main">

				<section class="error-404 not-found text-center">
				     <p><img src="https://drillly.com/wp-content/uploads/2017/12/4041.png" alt"404"></p>
					<header class="page-header-dill">
						<h2 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', TD); ?></h2>
					</header><!-- .page-header -->
					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', TD ); ?></p>

						<?php get_search_form(); ?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .wrap -->

<?php get_footer();
