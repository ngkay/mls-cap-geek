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
		<div class="teams-nav-right">
			<div class="nav-team-select">
				<?php if(have_rows('logos')): ?>
					<?php while(have_rows('logos')):the_row(); 
						$teamLogo = get_sub_field('logo_img');
						$teamName = get_sub_field('team_name');
					?>
					<div class="nav-team">
						<input type="radio" name="team" id="<?php echo $teamName; ?>" value="<?php echo $teamName; ?>">
						<label for="<?php echo $teamName; ?>">
							<img src="<?php echo $teamLogo['url']; ?>" alt="<?php echo $teamName; ?>">
						</label>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
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