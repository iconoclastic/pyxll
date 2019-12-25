<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<?php if (get_query_var('paged') == 0) : ?>
				<main class="site-featured" id="featured">
					<?php
						$args = array(
							'posts_per_page'	=> 2,
							'post_type'		=> 'post',
							'meta_key'		=> 'is_featured',
							'meta_value'	=> 1
						);
						$the_query = new WP_Query( $args );
					?>

					<?php if ( $the_query->have_posts() ) : ?>

						<small class="type-headline">Featured</small>
						<?php /* Start the Loop */ ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<?php

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/excerpt', 'featured' );
							?>

						<?php endwhile; ?>

						<?php wp_reset_query(); ?>

					<?php else : ?>

						<?php //get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #featured -->

				<main class="site-trending" id="trending">
					<?php
						$args = array(
							'posts_per_page'	=> 2,
							'post_type'		=> 'post',
							'meta_key'		=> 'is_trending',
							'meta_value'	=> 1
						);
						$the_query = new WP_Query( $args );
					?>

					<?php if ( $the_query->have_posts() ) : ?>

						<small class="type-headline">Trending</small>
						<?php /* Start the Loop */ ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<?php

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/excerpt', 'featured' );
							?>

						<?php endwhile; ?>

						<?php wp_reset_query(); ?>

					<?php else : ?>

						<?php //get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

				</main><!-- #trending -->
			<?php endif; ?>

			<main class="site-main" id="main">
				<?php

					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$args_posts = array(
						'post_type'			=> 'post',
						'posts_pre_page'	=> -1,
						'meta_query'		=> array(
							'relation' 			=> 'AND',
							array(
								'key'			=> 'is_featured',
								'value'			=> 0,
								'compare'		=> '='
							),
							array(
								'key'			=> 'is_trending',
								'value'			=> 0,
								'compare'		=> '='
							)
						),
						'paged'				=> $paged
					);
					$the_query_posts = new WP_Query( $args_posts );
				?>

				<?php if ( $the_query_posts->have_posts() ) : ?>

					<small class="type-headline">Latest</small>
					<?php /* Start the Loop */ ?>
					<?php while ( $the_query_posts->have_posts() ) : $the_query_posts->the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/excerpt', 'featured' );
						?>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(array(
				'total' 	=> $the_query_posts->max_num_pages
			)); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer();
