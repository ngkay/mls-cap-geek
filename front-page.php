<?php get_header();  ?>

<div class="main">
	<div class="container">
	<form>
		<select name='teamSelect' id='teamSelect'>
			<option value="Select Team">Select Team</option>
			<!-- populated in JS -->
		</select>
	</form>
	<h2>Players Information</h2>
		<table id='playersTable'>
		</table>
	<h2>Team Information</h2>
		<table id='teamsTable'>
		</table>
	<h2>Team Standing</h2>
		<table id='teamsStandingTable'>
		</table>
	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>