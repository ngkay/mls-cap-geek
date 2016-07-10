<div class="sidebar">
	<ul class="xoxo">
		<div class="latestPosts" id='latestPosts'>
			<h3>Latest Blog Posts</h3>
			<?php 
			query_posts('posts_per_page=2');
			if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="post" id="post">
					<article class="featured-blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="content-featured-post">
							<?php $image = get_field('featured_img');?>
							<!-- <pre><?php //print_r($image);?></pre> -->
							<img src="<?php echo $image['sizes']['square'] ?>">
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
		<?php  dynamic_sidebar( 'primary-widget-area' ); ?>
	</ul>
</div>
	
