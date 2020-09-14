<?php
	$show_only_user = false;
	$title = 'Gruppe Beitreten';
	$keywords = 'beitreten';
	include($_SERVER['DOCUMENT_ROOT'].'/include/website/head.inc.php'); 
  ?><article>
		<section>
<?php require($options['pluginpath'].'groupstar/singlegroup.inc.php'); ?>
			<section>
				<h2>Bitte bestätige dass du kein Roboter bist</h2>
				<p>Diese Methode müssen wir verwenden um sicher zu gehen, dass du kein Spambot bist.</p>
				<br>
				<hr>
				<br>
				<?php get('error'); ?>
			</section>
<?php require($options['pluginpath'].'groupstar/singlegroup.html.inc.php'); ?>
		</section>
    </article>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/website/footer.inc.php"); ?>
