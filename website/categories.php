<?php
	$show_only_user = false;
	$title = 'Kategorien';
	$keywords = 'Kategorie';
	include($_SERVER['DOCUMENT_ROOT'].'/include/website/head.inc.php'); 
  ?><article>
		<section>
			<?php get('error'); ?>
			<section>
				<h1>Wähle aus verschiedenen Kategorien das Thema der WhatsApp Gruppe die du suchst!</h1>
				<h3 style="padding-bottom:10px">Wähle eine Kategorie die zu dir passt!</h3>
			</section>
			<main>
<?php require($options['pluginpath'].'groupstar/categories.inc.php'); ?>
			</main>
        </section>
		<section style="clear:both">
			<a href="./faq#groupfaq3" hreflang="<?php echo $options['short_language']; ?>" rel="help">
				<div>Wie du deine Gruppe veröffentlichst &rarr;</div>
			</a>
		</section>
    </article>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/website/footer.inc.php"); ?>
