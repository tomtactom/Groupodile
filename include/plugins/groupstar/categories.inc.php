<?php
	foreach(range(0, 14) as $categoryid) {
		if($categoryid == 1) {
			$categoryname = "Allgemein";
		} elseif($categoryid == 2) {
			$categoryname = "Unterhaltung";
		} elseif($categoryid == 3) {
			$categoryname = "Teenager";
		} elseif($categoryid == 4) {
			$categoryname = "Witzig";
		} elseif($categoryid == 5) {
			$categoryname = "Beruf";
		} elseif($categoryid == 6) {
			$categoryname = "Nützlich";
		} elseif($categoryid == 7) {
			$categoryname = "Örtlich";
		} elseif($categoryid == 8) {
			$categoryname = "Gaming";
		} elseif($categoryid == 9) {
			$categoryname = "Schule";
		} elseif($categoryid == 10) {
			$categoryname = "Technik";
		} elseif($categoryid == 11) {
			$categoryname = "Selbsthilfe";
		} elseif($categoryid == 12) {
			$categoryname = "Serien";
		} elseif($categoryid == 13) {
			$categoryname = "Kreativ";
		} elseif($categoryid == 14) {
			$categoryname = "Politik";
		}
		if(isset($categoryname)) {
		?>
		<a href="./?category=<?php echo $categoryname; ?>" hreflang="<?php echo $options['short_language']; ?>" title="Kategorie - <?php echo $categoryname; ?>">
			<div id="groupcategory<?php echo $categoryname; ?>" style="position: relative; overflow: hidden;">
				<h1 style="text-align: center;"><?php echo $categoryname; ?></h1>
				<hr>
				<img style="position: absolute; top: -9999px; bottom: -9999px; left: -9999px; right: -9999px; margin: auto;" src="<?php echo $options['siteurl'].'/design/groupstar/icon/category/'.strtolower($categoryname).'.svg'; ?>" height="120px" width="120px;">
			</div>
		</a>
		<?php
		}
	}
?>
