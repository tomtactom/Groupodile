			<section>
				<nav>
					<span>Sortiern nach: </span> 
					<form method="get" style="background-color:transparent;padding:0;border-radius:0;display: -webkit-inline-box;">
<?php if(!empty($_GET['s'])) { ?>
						<input type="hidden" name="s" value="<?php echo $_GET['s']; ?>">
<?php } if(!empty($_GET['category'])) { ?>
						<input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
<?php } ?>
						<button type="submit" id="input0" style="visibility:hidden"></button>
						<label for="input0">
<?php if(!isset($_GET['popular'])) { ?>
								<span title="Die neusten Gruppen" style="background-color:var(--maincolor);color:#fff;">Neu</span>
<?php } else { ?>
								<span title="Die neusten Gruppen">Neu</span>
<?php } ?>
						</label>
					</form>
					<form method="get" style="background-color:transparent;padding:0;border-radius:0;display: -webkit-inline-box;">
<?php if(!empty($_GET['s'])) { ?>
						<input type="hidden" name="s" value="<?php echo $_GET['s']; ?>">
<?php } if(!empty($_GET['category'])) { ?>
						<input type="hidden" name="category" value="<?php echo $_GET['category']; ?>">
<?php } ?>
						<button type="submit" name="popular" id="inputPopular" style="visibility:hidden"></button>
						<label for="inputPopular">
<?php if(isset($_GET['popular'])) { ?>
							<span title="Die beliebtesten Gruppen" style="background-color:var(--maincolor);color:#fff;">Beliebt</span>
<?php } else { ?>
							<span title="Die beliebtesten Gruppen">Beliebt</span>
<?php } ?>
						</label>
					</form>
<?php if(isset($_GET['s']) || isset($_GET['popular']) || isset($_GET['category'])) { ?>
					<span onclick="location.href='<?php echo $options['siteurl']; ?>'" style="cursor:pointer;">Alle Filter löschen</span>
<?php } ?>
				</nav>
				<main>
<?php
	while($row = $statement->fetch()) {
		if($row['category'] == "1") {
			$row['category'] = "Allgemein";
		} elseif($row['category'] == "2") {
			$row['category'] = "Unterhaltung";
		} elseif($row['category'] == "3") {
			$row['category'] = "Teenager";
		} elseif($row['category'] == "4") {
			$row['category'] = "Witzig";
		} elseif($row['category'] == "5") {
			$row['category'] = "Beruf";
		} elseif($row['category'] == "6") {
			$row['category'] = "Nützlich";
		} elseif($row['category'] == "7") {
			$row['category'] = "Örtlich";
		} elseif($row['category'] == "8") {
			$row['category'] = "Gaming";
		} elseif($row['category'] == "9") {
			$row['category'] = "Schule";
		} elseif($row['category'] == "10") {
			$row['category'] = "Technik";
		} elseif($row['category'] == "11") {
			$row['category'] = "Selbsthilfe";
		} elseif($row['category'] == "12") {
			$row['category'] = "Serien";
		} elseif($row['category'] == "13") {
			$row['category'] = "Kreativ";
		} elseif($row['category'] == "14") {
			$row['category'] = "Politik";
		} else {
			$row['category'] = "Unsortiert";
		}
		if($row['vote'] == false) {
			$row['vote'] = "0";	
		}
		if($row['category'] == $_GET['category']) {
?>
					<div id="group<?php echo $row['id']; ?>" class="all_groups">
						<a href="./group-<?php echo $row['id']; ?>" hreflang="<?php echo $options['short_language']; ?>" target="_blank" title="WhatsApp-Gruppe - <?php echo $row['title']; ?>"><h3><?php echo $row['title']; ?></h3></a>
						<hr>
						<p><?php echo substr($row['description'], 0, 120); if(strlen($row['description']) > 120) { ?><a href="./group-<?php echo $row['id']; ?>" hreflang="<?php echo $options['short_language']; ?>" target="_blank" title="WhatsApp-Gruppe - <?php echo $row['title']; ?>">...</a><?php } ?></p>
						<aside>
							<span onclick="location.href='?category=<?php echo $row['category']; ?>'"><?php echo $row['category']; ?></span>
							<span>Alter: ab <?php echo $row['age']; ?></span>
							<span>Vote: <?php echo $row['vote']; ?></span>
							<span>Erstellt: <?php echo $row['date']; ?> Uhr</span>
						</aside>
						<a title="Jetzt der Gruppe &quot;<?php echo $row['title']; ?>&quot; beitreten." target="_blank" href="./group-<?php echo $row['id']; ?>" hreflang="<?php echo $options['short_language']; ?>">
							<div>Gruppe beitreten</div>
						</a>
					</div>
<?php
	$group = true;
		} elseif(!isset($_GET['category'])) {
?>
					<div id="group<?php echo $row['id']; ?>" class="all_groups">
						<a href="./group-<?php echo $row['id']; ?>" hreflang="<?php echo $options['short_language']; ?>" target="_blank" title="WhatsApp-Gruppe - <?php echo $row['title']; ?>"><h3><?php echo $row['title']; ?></h3></a>
						<hr>
						<p><?php echo substr($row['description'], 0, 120); if(strlen($row['description']) > 120) { ?><a href="./group-<?php echo $row['id']; ?>" hreflang="<?php echo $options['short_language']; ?>" target="_blank" title="WhatsApp-Gruppe - <?php echo $row['title']; ?>">...</a><?php } ?></p>
						<aside>
							<span onclick="location.href='?category=<?php echo $row['category']; ?>'"><?php echo $row['category']; ?></span>
							<span>Alter: ab <?php echo $row['age']; ?></span>
							<span>Vote: <?php echo $row['vote']; ?></span>
							<span>Erstellt: <?php echo $row['date']; ?> Uhr</span>
						</aside>
						<a title="Jetzt der Gruppe &quot;<?php echo $row['title']; ?>&quot; beitreten." target="_blank" href="./group-<?php echo $row['id']; ?>" hreflang="<?php echo $options['short_language']; ?>">
							<div>Gruppe beitreten</div>
						</a>
					</div>
<?php
	$group = true;
		}
	}
	if($group == false) {
?>
					<div id="grouperror">
						<hr>
						<h2 style="padding-top: 50px;">Es sind keine weiteren Gruppen veröffentlicht</h2>
						<hr>
					</div>
<?php } ?>
				</main>
			</section>
			<form method="post" style="background-color:transparent;padding:0;border-radius:0;clear:both">
				<section>
						<a title="Noch mehr WhatsApp Gruppen..." href="" hreflang="<?php echo $options['short_language']; ?>" rel="next">
							<label for="inputNextpage"><div><?php if($group == true) { echo "Nächste Seite &rarr;"; } else { echo "Zurück zur Startseite"; } ?></div></label>
						</a>
						<a href="./faq#groupfaq3" title="FAQ - Gruppe veröffentlichen" hreflang="<?php echo $options['short_language']; ?>" rel="help">
							<div>Wie du deine Gruppe veröffentlichst</div>
						</a>
<?php if($group == true) { ?>
						<input type="hidden" name="page" value="<?= $page + 1 ?>">
						<button type="submit" id="inputNextpage" style="visibility:hidden;"></button>
<?php } else { ?>
						<button type="submit" id="inputNextpage" name="startpage" style="visibility:hidden;"></button>
<?php } ?>
				</section>
			</form>
