	<header>
		<section>
			<a href="/" hreflang="<?php echo $options['short_language']; ?>" title="Startseite"><h2><?php echo $options['sitename']; ?></h2></a>
			<span>Beta<!-- v0.1 --></span>
			<nav>
<?php
	require('../website/menu.inc.php');
?>
			</nav>
		</section>
	</header>
<?php 
	//gebe Cookie Hinweis aus
	askQuestion(); 
?>
