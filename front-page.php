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
<header class="landing">
	<h1>Major Soccer Geeks</h1>
</header>
<header class="hero-header" style="background: linear-gradient(rgba(0,0,0,.35),rgba(0,0,0,.35)), url(<?php $heroBg = get_field('hero_bg'); echo $heroBg['url']; ?>) no-repeat center center; background-size: cover;">
	<div class="wrapper">
		<!-- <nav class="hero-nav">
			<div class="logo">
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a></h1>
			</div>
		</nav> -->
		<form>
			<fieldset id="hero-team-select">
				<div class="hero-team-select">
				<?php if(have_rows('logos')): ?>
					<?php while(have_rows('logos')):the_row(); 
						$teamLogo = get_sub_field('logo_img');
						$teamName = get_sub_field('team_name');
					?>
					<div class="hero-team">
						<input type="radio" name="team" id="<?php echo $teamName; ?>" value="<?php echo $teamName; ?>">
						<label for="<?php echo $teamName; ?>">
							<img src="<?php echo $teamLogo['url']; ?>" alt="<?php echo $teamName; ?>">
						</label>
						<h3><?php echo $teamName; ?></h3>
					</div>
					<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</fieldset>
		</form>
	</div>
</header><!--/.header-->
<div class="team-info-screen">
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
	<header class="team-info-hero" style="background: linear-gradient(rgba(0,0,0,.35),rgba(0,0,0,.35)), url(<?php $teamBg = get_field('team_bg'); echo $teamBg['url']; ?>); background-size: cover;">
		<div class="wrapper">
			<div class="team-info">
				<div class="team-name">
					<div class="team-emblem">
					</div>
					<h1>Toronto FC</h1>
				</div>
				<div class="team-total-salary">
					<h4>Total Team Salary</h4>
					<h2>$1,234,567</h2>
				</div>
			</div>
			<div class="main-team-stats">
				<div class="team-cap-hit">
					<h4>Salary Cap Hit<sup><i class="fa fa-info-circle team-cap-hit-info" aria-hidden="true"></i></sup></h4>
					<h2>$1,234,567</h2>
				</div>
				<div class="team-cap-space">
					<h4>Salary Cap Space<sup><i class="fa fa-info-circle team-cap-space-info" aria-hidden="true"></i></sup></h4>
					<h2>$123,456</h2>
				</div>
				<div class="team-dps">
					<h4>Designated Players<sup><i class="fa fa-info-circle team-dps-info" aria-hidden="true"></i></sup></h4>
					<h2>3</h2>
				</div>
			</div>
		</div>
	</header>
	<div class="wrapper">
		<div class="main">
			<div id='left' class="left">
				<h2>Players Information</h2>
				<table id='playersTable' class="tablesorter">
					<thead class='tableHead'>
						<tr>
							<th>Player</th>
							<th>Position</th>
							<th>Base Salary</th>
							<th>Compensation</th>
							<th>Salary Cap Hit</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="right">
				<div class="latestPosts">
					<h3>Latest Blog Posts</h3>
					<?php 
					query_posts('posts_per_page=2');
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="post" id="post">
							<article class="featured-blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="content-featured-post">
									<?php $image = get_field('featured_img');?>
									<!-- <pre><?php //print_r($image);?></pre> -->
									<img src="<?php echo $image['sizes']['full'] ?>">
									<!-- function that only echos the post's first sentence -->
									<div class="blog-post-info">
										<?php the_date('F j, Y', '<h5>', '</h5>'); ?>
										<h4 class="entry-title">
											<a href="<?php the_permalink(); ?>" title="Permalink to: <?php esc_attr(the_title_attribute()); ?>" rel="bookmark">
												<?php the_title(); ?>
											</a>
										</h4>
									</div>
								</div>
							</article><!-- #post-## -->
						</div>
					<?php endwhile; ?><?php wp_reset_query(); /*4*/ ?>
					<?php endif; ?>
				</div>
				<!-- <div class="tagCloud">
					<h3>Tags</h3>
					<div class="tags">
						<?php wp_tag_cloud('smallest=12&largest=12') ?>
					</div>
				</div> -->
				<div class="teamStandingSidebar">
					<h3>Team Standings</h3>
					<table id='teamsStandingTable'>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>