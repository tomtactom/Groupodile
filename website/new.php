<?php
	$show_only_user = false;
	$title = 'Neue WhatsApp Gruppe veröffentlichen';
	$keywords = 'WhatsApp Gruppe veröffentlichen';
	include($_SERVER['DOCUMENT_ROOT'].'/include/website/head.inc.php');
	require($options['pluginpath'].'groupstar/init.inc.php');
	require($options['pluginpath'].'groupstar/newgroup.inc.php'); 
?><article>
		<section>
			<h1>Veröffentliche deine WhatsApp Gruppe</h1>
			<?php get('error'); ?>
<?php require($options['pluginpath'].'groupstar/newgroup.html.inc.php'); ?>
		</section>
    </article>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/website/footer.inc.php"); ?>
