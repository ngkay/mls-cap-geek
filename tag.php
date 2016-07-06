<?php get_header(); ?>

<div class="main">
  <div class="wrapper">
    <h3 class='pageTag'>Tag Archives: <?php single_tag_title(); ?></h3>
    <div class="blog-content">
      <div class="posts">
      
      <?php get_template_part( 'loop', 'tag' ); ?>
    </div> <!-- /.content -->

    <?php get_sidebar(); ?>
	</div>
  </div><!-- /.container -->
</div><!-- /.main -->

<?php get_footer(); ?>