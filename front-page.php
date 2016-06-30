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
<header class="hero-header">
	<div class="wrapper">
		<nav class="hero-nav">
			<div class="logo">
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a></h1>
			</div>
		</nav>
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
				<p>MLS Cap Geek</p>
			</div>
			<div class="team-icons"></div>
		</div>
	</nav>
	<header class="team-info-hero">
		<div class="wrapper">
			<div class="team-info">
				<div class="team-name">
					<!-- <div class="team-emblem">
						<img src="2.gif" alt="">
					</div>
					<h1>Toronto FC</h1> -->
				</div>
				<div class="team-total-salary">
					<h3>Total Team Salary</h3>
					<!-- <h2>$1,234,567</h2> -->
				</div>
			</div>
			<div class="main-team-stats">
				<div class="team-cap-hit">
					<h3>Salary Cap Hit*</h3>
					<!-- <h2>$1,234,567</h2> -->
				</div>
				<div class="team-cap-space">
					<h3>Salary Cap Space*</h3>
					<!-- <h2>$123,456</h2> -->
				</div>
				<div class="team-dps">
					<h3>Designated Players</h3>
					<!-- <h2>3</h2> -->
				</div>
			</div>
		</div>
	</header>
	<div class="wrapper">
		<h2>Players Information</h2>
		<table id='playersTable'>
		</table>
		<!-- <h2>Team Information</h2>
		<table id='teamsTable'>
		</table> -->
		<!-- <h2>Team Standing</h2>
		<table id='teamsStandingTable'>
		</table> -->
	</div>
</div>

<?php get_footer(); ?>