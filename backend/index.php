<?php
	$show_only_user = 'min_supporter';
	$title = 'Interner Bereich';
	$description = 'Verwalte und bearbeite als Supporter.';
	$keywords = 'startseite';
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/backend/head.inc.php');
    include($_SERVER['DOCUMENT_ROOT'].'/include/backend/header.inc.php');
?>
<article>
    <section>
		<h1>Dashboard</h1>
		Hallo <?php echo htmlentities($user['vorname']); ?>,<br>
		Du bist: <font style="text-transform:capitalize;"><?php echo htmlentities($user['role']); ?></font>,<br>
		<?php
			get('error');
			require($options['pluginpath'].'/groupstar/groupdata.html.inc.php');
			showStatistics();
		?>
	</section>
</article>
<?php 
	include($_SERVER['DOCUMENT_ROOT']."/include/backend/footer.inc.php")
?>
