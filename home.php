<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php  wp_title('|', true, 'right'); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- stylesheets should be enqueued in functions.php -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="teams-nav">
	<div class="wrapper">
		<div class="site-name">
			<h2><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a></h2>
		</div>
		<div class="home-nav-right">
			<div class="nav-main-nav">
				<?php wp_nav_menu( array(
					'container' => false,
					'theme_location' => 'primary'
				)); ?>
			</div>
		</div>
	</div>
</nav>
<div class="main">
	<div class="wrapper">
		<div class="blog-content">
			<div class="posts">
				<?php get_template_part( 'loop', 'index' );	?>
			</div>
			<?php get_sidebar(); ?>
		</div> <!--/.content -->
	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>