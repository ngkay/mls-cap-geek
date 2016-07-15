<?php get_header(); ?>

<div class="main">
  <div class="wrapper">
      <h3 class='pageTag'>Author Archives:
        <a class="name" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
          <?php the_author(); ?>
        </a>
      </h3>
    <div class="blog-content">
      <div class="posts">
      <?php
        /* Queue the first post, that way we know who
         * the author is when we try to get their name,
         * URL, description, avatar, etc.
         */
        if ( have_posts() )
          the_post();
      ?>

      	<?php
      		rewind_posts();
      		get_template_part('loop', 'author');
      	?>
    </div> <!-- /.content -->

    <?php get_sidebar(); ?>
    </div>
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>