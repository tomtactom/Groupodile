<?php
	$show_only_user = 'min_supporter';
	$title = 'Gruppen bearbeiten';
	$description = 'Bearbeite, verwalte und lösche veröffentlichte Gruppen';
	$keywords = 'Gruppen bearbeiten, Gruppen löschen';
    require_once($_SERVER['DOCUMENT_ROOT'].'/include/backend/head.inc.php');
    include($_SERVER['DOCUMENT_ROOT'].'/include/backend/header.inc.php');

?>
<article>
    <section>
		<h1>Gruppen verwalten</h1>
		<?php
			require($options['pluginpath'].'groupstar/groupcontrol.inc.php');
			get('error');
			require($options['pluginpath'].'groupstar/groupcontrol.html.inc.php');
		?>
	</section>
</article>
<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/include/backend/footer.inc.php'); 
?>
