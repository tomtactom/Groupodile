<?php
	$page = (empty($_POST['page'])) ? 1 : intval($_POST['page']);
	$per_page = 27;
	$offset = ($per_page * ($page - 1)) + 0;
	if(isset($_GET['s']) && !empty($_GET['s'])) {
		if (isset($_GET['popular'])) {
			$statement = $pdo->prepare("SELECT DISTINCT * FROM `group` WHERE LOWER(`title`) LIKE ? OR LOWER(`description`) LIKE ? ORDER BY `vote` DESC LIMIT ".$offset.", ".$per_page);
		} else {
			$statement = $pdo->prepare("SELECT DISTINCT * FROM `group` WHERE LOWER(`title`) LIKE ? OR LOWER(`description`) LIKE ? ORDER BY `id` DESC LIMIT ".$offset.", ".$per_page);
		}
		$result = $statement->execute(array("%".strtolower($_GET['s'])."%","%".strtolower($_GET['s'])."%"));
	} else {
		if (isset($_GET['popular'])) {
			$statement = $pdo->prepare("SELECT * FROM `group` ORDER BY `vote` DESC LIMIT ".$offset.", ".$per_page);
		} else {
			$statement = $pdo->prepare("SELECT * FROM `group` ORDER BY `id` DESC LIMIT ".$offset.", ".$per_page);
		}
		$result = $statement->execute();
	}
?>
