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

<nav class="teams-nav navOther" style="background: linear-gradient(rgba(0,0,0,.35),rgba(0,0,0,.35)), url(<?php $image = get_field('header_img', 'option'); echo $image['url']; ?>) no-repeat center center; background-size: cover;">
  <div class="wrapper">
    <div class="site-name">
      <h2 class='headerOther'><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
      </a></h2>
    </div>
      <div class="nav-main-nav navBarOther">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </div>
    </div>
  </div>
</nav>