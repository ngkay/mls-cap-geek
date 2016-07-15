
<?php get_header(); ?>

<div class="main">
  <div class="wrapper">
    <div class="blog-content">
      <div class="posts individual-post">
          <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          <?php $image = get_field('featured_img');?>
          <div class="featured-img" style="background:url(<?php echo $image['sizes']['large'] ?>); background-size:cover; background-position:center;">
            <div class="triangle"></div>
            <figcaption id="featured-img"></figcaption>
            <div class="copyright"><h6><?php the_field('image_copyright')?></h6></div>
          </div>
          <div class='post-information'>
            <i class="fa fa-calendar" aria-hidden="true"></i><h6><?php the_time('F j, Y');?></h6>
            <i class="fa fa-user" aria-hidden="true"></i><h6><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></h6>
          </div>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2 class="entry-title"><?php the_title(); ?></h2>

          <div class="entry-content">
            <h4><?php the_field('abstract')?></h4>
            <?php the_content(); ?>
            <?php wp_link_pages(array(
              'before' => '<div class="page-link"> Pages: ',
              'after' => '</div>'
            )); ?>
          </div><!-- .entry-content -->

          <div class="entry-utility">
            <h6><?php hackeryou_posted_in(); ?></h6>
            <h6><?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></h6>
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