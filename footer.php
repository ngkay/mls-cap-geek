<footer class="main-footer">
	<div class="wrapper">
		<div class="footer-body">
			<div class="footer-left">
				<h2>Major Soccer Geeks</h2>
				<p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.</p>
			</div>
			<div class="footer-right">
				<div class="footer-tweet-title">
					<h3>Latest Tweets</h3>
					<h4>Follow us <a href="https://twitter.com/majorsoccergeek" target="_blank">@MajorSoccerGeek</a></h4>
				</div>
				<div class="footer-twitter">
					<a class="twitter-timeline" href="https://twitter.com/majorsoccergeek">Tweets by majorsoccergeek</a>
					<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>
<!-- 
				<a class="twitter-timeline" href="https://twitter.com/majorsoccergeek" data-widget-id="739571834107088897">Tweets de @majorsoccergeek</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> -->
			</div>
		</div>
	</div>
</footer>
<footer class="bottom-footer">
	<div class="wrapper">
		<div class="footer-nav">
			<?php wp_nav_menu( array(
				'container' => false,
				'theme_location' => 'primary'
			)); ?>
		</div>
		<p>© Copyright Maxime Leduc & Kevin Ng. All rights reserved.</p>
	</div>
</footer>
<script>
// scripts.js, plugins.js and jquery are enqueued in functions.php
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>