<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
		if ( has_post_thumbnail() ) { ?>
			<?php
				$cetnered_image = "";
				if (get_field('centered_featured_image') == 1) {
					$cetnered_image = " cetnered-image";
				};
			?>
			<figure class="the-featured-image-wrapper<?php echo $cetnered_image; ?>">
				<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">
					<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
				</a>
			</figure>
		<?php }
	?>

	<header class="entry-header">

		<a href="<?php echo esc_url( get_permalink( get_the_ID() ) ); ?>">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</a>

		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php the_excerpt(); ?>

	<footer class="entry-footer">

		<?php //understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
