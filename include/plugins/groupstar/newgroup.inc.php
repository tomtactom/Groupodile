<?php
	if(isset($_POST['groupname']) || isset($_POST['invitelink']) || isset($_POST['description']) || isset($_POST['category']) || isset($_POST['age'])) {
		if ((isset($_POST['groupname']) && isset($_POST['invitelink']) && isset($_POST['category']) && isset($_POST['age'])) && (!empty($_POST['groupname']) && !empty($_POST['invitelink']) && !empty($_POST['category']) && !empty($_POST['age']))) {
			if(strlen($_POST['groupname']) > 40) {
				$error_msg = 'Bitte wähle einen Gruppennamen mit maximal 40 Zeichen';
				$error = true;
			}
			if(!preg_match('/^[a-zA-Z0-9ÄäËëÏïÖöÜüŸÿẞßÀÁÂÃÅÆÇÈÉÊÌÍÎÐÑÒÓÔÕØŒÙÚÛÝÞàáâãåæçèéêìíîðñòóôõøœùúûýþŠšČč ]+$/', $_POST['groupname'])) {
				$error_msg = 'Bitte verwende nur Buchstaben und Zahlen für den Gruppennamen';
				$error = true;
			}
			if(!preg_match("/^https:\/\/chat\.whatsapp\.com\/invite\/[A-Za-z0-9]{22}$/", $_POST['invitelink']) && !preg_match("/^https:\/\/chat\.whatsapp\.com\/[A-Za-z0-9]{22}$/", $_POST['invitelink'])) {
				$error_msg = 'Bitte nutze einen gültigen WhatsApp Gruppen Einladungslink';
				$error = true;
			}
			if(!empty($_POST['description'])) {
				if(strlen($_POST['description']) > 1000) {
					$error_msg = 'Die Beschreibung darf maximal 1000 Zeichen lang sein';
					$error = true;
				}
				$_POST['description'] = preg_replace('/\s+/', ' ', $_POST['description']);
				$arr = explode(" ", $_POST['description']);
				$datei = fopen("../include/plugins/groupstar/blacklist.txt","r+");
				while (!feof($datei)) {
					$zeile = fgets($datei,1000);
					foreach ($arr as $word) {
						if (preg_match('/\b' . $word . '\b/i', $zeile)) {
							$grou_error = true;
						}
					}
				}
				fclose($datei);
			}
			if($_POST['category'] != "1" && $_POST['category'] != "2" && $_POST['category'] != "3" && $_POST['category'] != "4" && $_POST['category'] != "5" && $_POST['category'] != "6" && $_POST['category'] != "7" && $_POST['category'] != "8" && $_POST['category'] != "9" && $_POST['category'] != "10" && $_POST['category'] != "11" && $_POST['category'] != "12" && $_POST['category'] != "13" && $_POST['category'] != "14") {
				$error_msg = 'Bitte wähle eine Kategorie aus';
				$error = true;
			}
			if($_POST['age'] != "16" && $_POST['age'] != "17" && $_POST['age'] != "18" && $_POST['age'] != "19" && $_POST['age'] != "20" && $_POST['age'] != "21" && $_POST['age'] != "22" && $_POST['age'] != "23" && $_POST['age'] != "24" && $_POST['age'] != "25" && $_POST['age'] != "26" && $_POST['age'] != "27" && $_POST['age'] != "28" && $_POST['age'] != "29" && $_POST['age'] != "30" && $_POST['age'] != "35" && $_POST['age'] != "40") {
				$error_msg = 'Bitte wähle ein Mindestalter aus';
				$error = true;
			}

			if($_POST['accept'] != true) {
				$error_msg = 'Bitte akzeptiere unsere Datenschutzerklärung und unsere AGBs';
				$error = true;
			}
			$_POST['groupname'] = preg_replace('/\s+/', ' ', $_POST['groupname']);
			echo $_POST['groupname'];
			$arr = explode(" ", $_POST['groupname']);
			$datei = fopen("../include/plugins/groupstar/blacklist.txt","r+");
			while (!feof($datei)) {
				$zeile = fgets($datei,1000);
				foreach ($arr as $word) {
					if (preg_match('/\b' . $word . '\b/i', $zeile)) {
						$desc_error = true;
					}
				}
			}
			fclose($datei);
			if($desc_error == true || $grou_error == true) {
				$error_msg = "Bitte wähle einen Gruppennamen und eine Gruppenbeschreibung, die unseren Richtlinien entspricht";
				$error = true;
			}

			$json = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$options['recaptcha_secretkey'].'&response='.$_POST['g-recaptcha-response']), true);
			if(intval($json['success']) !== 1) {
				$error_msg = 'Bitte bestätige dass du kein Roboter bist';
				$error = true;
			}

			if(!isset($error)) {
				$title = htmlspecialchars($_POST['groupname']);
				$description = htmlspecialchars($_POST['description']);
				$invite = str_replace("https://chat.whatsapp.com/", "", str_replace("https://chat.whatsapp.com/invite/", "", $_POST['invitelink']));
				$category = intval($_POST['category']);
				$age = intval($_POST['age']);
				$date = date('d.m.Y - G:i');

				$statement = $db->prepare("INSERT INTO `group` (title, description, invite, category, age, date) VALUES (?, ?, ?, ?, ?, ?)");
				$statement->bind_param('sssiis', $title, $description, $invite, $category, $age, $date);
				if ($statement->execute()) {
					$success_msg = "Die Gruppe wurde erfolgreich veröffentlicht";
					echo '<meta http-equiv="refresh" content=2; URL='.$options['siteurl'].'">';
				} else {
					$error = "Es ist ein Fehler aufgetreten! Bitte versuche es erneut oder kontaktiere uns";
				}
			}
		} else {
			$error_msg = "Bitte fülle alle Felder aus";
		}
	}
?>
