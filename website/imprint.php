<?php
	$show_only_user = false;
	$title = 'Impressum';
	$description = 'Im Impressum findest du unsere Daten nach § 5 TMG';
	$keywords = 'impressum';
	include($_SERVER['DOCUMENT_ROOT'].'/include/website/head.inc.php');
?>
<article>
    <section>
		<h1>Impressum</h1>
		<?php get('error'); ?>
		<section>
			<h3>Angaben gemäß § 5 TMG: </h3>
			<blockquote>
				<?php echo $options['author']; ?><br>
				<address>
					<br>
					<br>
					<br>
				</address>
				<hr>
			</blockquote>
				<a href="./contact" hreflang="<?php echo $options['short_language']; ?>" title="Kontaktiere uns" rel="help"><h1>Kontaktiere uns hier</h1></a>
			<blockquote>
			<hr>
				📧: info[ät]<br>
				<?php /*☎: <small><abbr title="Für Supportanfragen bitte das Kontaktformular verwenden!"><i>+ 49 · 15 · 00 · 00 · 00 · 000</i></abbr></small><br>*/ ?>
				Telefonnummer und Adresse gibt es auf Anfrage
			</blockquote>
			<br>
			<blockquote>
				<h4>Bilder/Lizenzen (&copy;)</h4>
				<div>
					Icons from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
				<ul>
					<li><a href="https://lupusgui.de" hreflang="de" rel="external" title="Das System basiert auf das selbstentwickelte Webseitenverwaltungssystem 'LupusGUI'">LupusGUI - Das Webseitenverwaltungssystem</li>
					<li><a href="https://www.flaticon.com/free-icon/category_1077340" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Allgemein</a></li>
					<li><a href="https://www.flaticon.com/free-icon/theater_214351" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Unterhaltung</a></li>
					<li><a href="https://www.flaticon.com/free-icon/teenager-with-sun-glasses_11167" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Teenager</a></li>
					<li><a href="https://www.flaticon.com/free-icon/face-of-clown-with-hat_1515" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Witzig</a></li>
					<li><a href="https://www.flaticon.com/free-icon/manager_345736" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Beruf</a></li>
					<li><a href="https://www.flaticon.com/free-icon/social-care_921356" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Nützlich</a></li>
					<li><a href="https://www.flaticon.com/free-icon/map-location_32364" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Örtlich</a></li>
					<li><a href="https://www.flaticon.com/free-icon/console_686589" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Gaming</a></li>
					<li><a href="https://www.flaticon.com/free-icon/open-book_171322" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Schule</a></li>
					<li><a href="https://www.flaticon.com/free-icon/project-management_1087927" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Technik</a></li>
					<li><a href="https://www.flaticon.com/free-icon/charity_182480" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Selbsthilfe</a></li>
					<li><a href="https://www.flaticon.com/free-icon/video_118706" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Serien</a></li>
					<li><a href="https://www.flaticon.com/free-icon/brainstorm_181361" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Kreativ</a></li>
					<li><a href="https://www.flaticon.com/free-icon/debate_1147999" hreflang="en" rel="external" title="Rufe das Kategorie Icon auf www.flaticon.com auf">Kategorie Icon - Politik</a></li>
				</ul>
				<small><i>Die Bilder wurden farblich bearbeitet</i></small>
				</div>
			</blockquote>
			<br>
			<strong>Fals es rechtliche Probleme gibt, würden wir uns über eine persönliche Lösung freuen.</strong>
		</section>
	</section>
</article>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/website/footer.inc.php") ?>
