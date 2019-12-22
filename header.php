<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<style type="text/css">
		<?php
			$the_h1_family = get_field('h1_font_family', 'this_is_christopher');
			$the_h1_family = str_replace(' ', '+', $the_h1_family);
			$the_h2_family = get_field('h2_font_family', 'this_is_christopher');
			$the_h2_family = str_replace(' ', '+', $the_h2_family);
			$the_h3_family = get_field('h3_font_family', 'this_is_christopher');
			$the_h3_family = str_replace(' ', '+', $the_h3_family);
			$the_body_family = get_field('body_font_family', 'this_is_christopher');
			$the_body_family = str_replace(' ', '+', $the_body_family);
			$the_code_family = get_field('code_font_family', 'this_is_christopher');
			$the_code_family = str_replace(' ', '+', $the_code_family);
		?>
		@import url('https://fonts.googleapis.com/css?family=<?php echo $the_h1_family; ?>&display=swap');
		@import url('https://fonts.googleapis.com/css?family=<?php echo $the_h2_family; ?>&display=swap');
		@import url('https://fonts.googleapis.com/css?family=<?php echo $the_h3_family; ?>&display=swap');
		@import url('https://fonts.googleapis.com/css?family=<?php echo $the_body_family; ?>&display=swap');
		@import url('https://fonts.googleapis.com/css?family=<?php echo $the_code_family; ?>&display=swap');
		body h1 {
			font-size: <?php the_field('h1_font_size', 'this_is_christopher'); ?>px;
			font-family: "<?php the_field('h1_font_family', 'this_is_christopher'); ?>", sans-serif;
		}
		body h2 {
			font-size: <?php the_field('h2_font_size', 'this_is_christopher'); ?>px;
			font-family: "<?php the_field('h2_font_family', 'this_is_christopher'); ?>", sans-serif;
		}
		body h3, body small {
			font-size: <?php the_field('h3_font_size', 'this_is_christopher'); ?>px;
			font-family: "<?php the_field('h3_font_family', 'this_is_christopher'); ?>", sans-serif;
		}
		body, body p, body a {
			font-size: <?php the_field('body_font_size', 'this_is_christopher'); ?>px;
			font-family: "<?php the_field('body_font_family', 'this_is_christopher'); ?>", sans-serif;
		}
		body .syntaxhighlighter a, body .syntaxhighlighter div, body .syntaxhighlighter code, body .syntaxhighlighter table, body .syntaxhighlighter table td, body .syntaxhighlighter table tr, body .syntaxhighlighter table tbody, body .syntaxhighlighter table thead, body .syntaxhighlighter table caption, body .syntaxhighlighter textarea {
			font-family: "<?php the_field('code_font_family', 'this_is_christopher'); ?>", sans-serif !important;
			font-size: <?php the_field('code_font_size', 'this_is_christopher'); ?>px !important;
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-primary">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>"></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
