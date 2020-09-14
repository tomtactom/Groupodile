<?php
	$statement = $pdo->prepare("SELECT * FROM `group` WHERE `id` = ".intval($_GET['id']));
	$result = $statement->execute();
	$data = $statement->fetch();
	
	if($data['category'] == "1") {
		$data['category'] = "Allgemein";
	} elseif($data['category'] == "2") {
		$data['category'] = "Unterhaltung";
	} elseif($data['category'] == "3") {
		$data['category'] = "Teenager";
	} elseif($data['category'] == "4") {
		$data['category'] = "Witzig";
	} elseif($data['category'] == "5") {
		$data['category'] = "Beruf";
	} elseif($data['category'] == "6") {
		$data['category'] = "Nützlich";
	} elseif($data['category'] == "7") {
		$data['category'] = "Örtlich";
	} elseif($data['category'] == "8") {
		$data['category'] = "Gaming";
	} elseif($data['category'] == "9") {
		$data['category'] = "Schule";
	} elseif($data['category'] == "10") {
		$data['category'] = "Technik";
	} elseif($data['category'] == "11") {
		$data['category'] = "Selbsthilfe";
	} elseif($data['category'] == "12") {
		$data['category'] = "Serien";
	} elseif($data['category'] == "13") {
		$data['category'] = "Kreativ";
	} elseif($data['category'] == "14") {
		$data['category'] = "Politik";
	} else {
		$data['category'] = "Unsortiert";
	}
	if(!$data['vote']) {
		$data['vote'] = 0;
	}
	
	if(isset($_POST['groupid']) && !empty($_POST['groupid'])) {
		$json = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LfWXm0UAAAAAK1XQRM5IlnnhNQdbX3z7wc-zj7l&response='.$_POST['g-recaptcha-response']), true);
		if(intval($json['success']) !== 1) {
			$error_msg = 'Bitte bestätige dass du kein Roboter bist';	
			$error = true;
		}
		if(!empty($_POST['rechnen'])) {
			$error_msg = 'Bitte bestätige dass du kein Roboter bist';	
			$error = true;
		}
		
		if(!$error) {
			// speichern
			$upd_join = intval($data['join']) + 1;
			$update = $db->prepare("UPDATE `group` SET `join`=?, `joindate`=NOW() WHERE id=? LIMIT 1");	
			$update->bind_param('ii', intval($upd_join), intval($_POST['groupid']));
			if ($update->execute()) {
				$showlink = true;
			}
		}
	}
	if(isset($_POST['voteup'])) {
		if(!$_COOKIE['vote'.$data['id']]) {
		// speichern
		$upd_vote = intval($data['vote']) + 1;
		$update = $db->prepare("UPDATE `group` SET `vote`=? WHERE id=? LIMIT 1");	
		$update->bind_param('ii', intval($upd_vote), intval($data['id']));
		if ($update->execute()) {
			setcookie("vote".$data['id'], true, time()+(3600*24*360));
			$msg = "Du hast erfolgreich eine positive Bewertung da gelassen";
			echo '<meta http-equiv="refresh" content=0; URL='.$options['siteurl'].'/group'.$_GET['id'].'">';
		}
		} else {
			$error = "Du hast diese Gruppe schonmal bewertet";	
		}
	}
	if(isset($_POST['votedown'])) {
		if(!$_COOKIE['vote'.$data['id']] && isset($_COOKIE['allowCookies'])) {
			// speichern
			$upd_vote = intval($data['vote']) - 1;
			$update = $db->prepare("UPDATE `group` SET `vote`=? WHERE id=? LIMIT 1");	
			$update->bind_param('ii', intval($upd_vote), intval($data['id']));
			if ($update->execute()) {
				setcookie("vote".$data['id'], true, time()+(3600*24*360));
				$msg = "Du hast eine schlechte Bewertung da gelassen";
				echo '<meta http-equiv="refresh" content=0; URL='.$options['siteurl'].'/group'.$_GET['id'].'">';
			}
		} else {
			$error = "Du hast diese Gruppe schonmal bewertet";	
		}
	}
?>
