<?php
	$show_only_user = false;
	$title = 'Trete jetzt den besten WhatsApp Gruppen bei';
	$keywords = 'startseite, beitreten';
	include($_SERVER['DOCUMENT_ROOT'].'/include/website/head.inc.php'); 
	include($options['pluginpath'].'groupstar/init.inc.php');
	echo setup();
  ?><article>
		<section>
<?php require($options['pluginpath'].'groupstar/allgroups.inc.php'); ?>
			<?php get('error'); ?>
			<section>
				<h1>Lern neue Leute kennen und finde coole WhatsApp Gruppen.</h1>
				<h3>Trete öffentlichen WhatsApp Gruppe bei</h3>
				<p>
					Die beste und sicherste Möglichkeit deine Zielgruppe zu erreichen. Veröffentliche jetzt so einfach wie noch nie deine eigene Gruppe. Anders als bei anderen Seiten gibt es hier keine nervigen Spambots. Beiß Groupodile, befor es dich beißt!
				</p>
			</section>
<?php require($options['pluginpath'].'groupstar/search.html.inc.php'); ?>
<?php require($options['pluginpath'].'groupstar/allgroups.html.inc.php'); ?>
		</section>
    </article>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/website/footer.inc.php"); ?>
