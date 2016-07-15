<footer class="main-footer">
	<div class="wrapper">
		<div class="footer-body">
			<div class="footer-left">
				<h2>Major Soccer Geeks</h2>
				<p>Major Soccer Geeks is an app created by two dedicated soccer fans, <a href="http://maximeleduc.com" target="_blank">Maxime Leduc</a> (<a href="https://twitter.com/ledukeness" target="_blank">@ledukeness</a>) and <a href="http://kevinng.ca" target="_blank">Kevin Ng</a> (<a href="https://twitter.com/NGKayyy" target="_blank">@NGKayyy</a>), to help track <a href="http://www.mlssoccer.com/" target="_blank">Major Soccer League</a>’s players and their salaries. More information about Roster Rules and Regulations can be found <a href="http://pressbox.mlssoccer.com/content/roster-rules-and-regulations" target="_blank">here</a>. Follow us on Twitter at <a href="https://twitter.com/majorsoccergeek" target="_blank">@majorsoccergeeks</a> and make sure to check out our blog! </p>
			</div>
			<div class="footer-right">
				<div class="footer-tweet-title">
					<h3>Latest Tweets</h3>
					<h4>Follow us <a href="https://twitter.com/majorsoccergeek" target="_blank">@MajorSoccerGeek</a></h4>
				</div>
				<div class="footer-twitter">
					<a class="twitter-timeline" href="https://twitter.com/majorsoccergeek" height="400px">Tweets by majorsoccergeek</a>
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
		<p class='copyrights'>© Copyright Maxime Leduc & Kevin Ng. All rights reserved.</p>
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