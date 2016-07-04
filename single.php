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
      <div class="posts singlepost">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <div class="featured-img" style="background:url(<?php echo $image['sizes']['square'] ?>); background-size:cover; background-position:center;">';
          <div class="triangle"></div><figcaption id="featured-img"></figcaption></div>';
          <div class='post-information'>
            <i class="fa fa-calendar" aria-hidden="true"></i><h6><?php the_time('F j, Y');?></h6>
            <i class="fa fa-user" aria-hidden="true"></i><h6><?php the_author()?></h6>
          </div>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-meta">
            <?php hackeryou_posted_on(); ?>
          </div><!-- .entry-meta -->

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <?php hackeryou_posted_in(); ?>
            <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
          </div><!-- .entry-utility -->
        </div><!-- #post-## -->

        <div id="nav-below" class="navigation">
          <p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
          <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
        </div><!-- #nav-below -->

        <?php comments_template( '', true ); ?>

      <?php endwhile; // end of the loop. ?>
      </div>
    <?php get_sidebar(); ?>
    </div> <!-- /.content -->


  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>