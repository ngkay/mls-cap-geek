<?php get_header(); ?>

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