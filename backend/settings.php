<?php
	$show_only_user = 'min_supporter';
	$title = 'Einstellungen';
    include($_SERVER['DOCUMENT_ROOT'].'/include/backend/head.inc.php');
    include($_SERVER['DOCUMENT_ROOT'].'/include/backend/header.inc.php');
?>
<article>
	<?php if($user['role'] === 'adminstrator' || $user['role'] === 'manager') { ?>
	<section>
		<h1>Benutzer</h1>
		<?php
			require($options['pluginpath'].'user.inc.php');
			require($options['pluginpath'].'websitesettings.inc.php');
			require($options['pluginpath'].'update.inc.php');
			require($options['pluginpath'].'register.inc.php');
			get('error');
			include($options['pluginhtmlpath'].'user.html.inc.php');
		?>
	</section>
	<section>
		<h1>Einstellungen</h1>
		<blockquote>
			<?php include($options['pluginhtmlpath'].'websitesettings.html.inc.php'); ?>
		</blockquote>
	</section>
	<section>
		<h1>Update</h1>
		<?php
			include($options['pluginhtmlpath'].'update.html.inc.php');
		?>
	</section>
	<section>
		<h1>Neuen Benutzer Hinzufügen</h1>
		<?php
			include($options['pluginhtmlpath'].'register.html.inc.php');
		?>
	</section>
	<center>
		<big><a href="../backend/profile">Dein Profil bearbeiten</a></big>
	</center>
	<?php } else { ?>
	<section>
		<?php
			require($options['pluginpath'].'settings.inc.php');
			get('error');
			include($options['pluginhtmlpath'].'settings.html.inc.php');
		?>
	</section>
	<?php } ?>
</article>
<?php
	include($_SERVER['DOCUMENT_ROOT']."/include/backend/footer.inc.php");
?>
