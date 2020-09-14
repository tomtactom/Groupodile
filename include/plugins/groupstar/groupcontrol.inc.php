<?php
if(isset($_POST['spamword']) && !empty($_POST['spamword'])) {
	if(strlen($_POST['spamword']) > 64 || strlen($_POST['spamword']) < 3) {
		$error_msg = "Bitte wähle ein Wort zwischen 3 und 64 Zeichen";
		$error = true;
	}
	if(!$error) {
		$word = $_POST['spamword'].'
';
		file_put_contents("../include/plugins/groupstar/blacklist.txt", $word, FILE_APPEND);
		$success_msg = 'Das Wort wurde auf die Blacklist gesetzt';
	}
}

if (isset($_GET['aktion']) and $_GET['aktion'] == 'loeschen') {
    if (isset($_GET['id'])) {
        $id = (INT)$_GET['id'];
        if ($id > 0) {
            $loeschen = $db->prepare("DELETE FROM `group` WHERE id=(?) LIMIT 1");
            $loeschen->bind_param('i', $id);
            if ($loeschen->execute()) {
				
                $success_msg = 'Gruppe wurde gelöscht';
            }
        }
    }
}

if (isset($_POST['aktion']) and $_POST['aktion'] == 'korrigieren') {
    $msg = 'Es gab einen Fehler';
    $error = false;
    $upd_id = "";
    $category_filter = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14'];
    $age_filter = ['16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '35', '40'];

    if (isset($_POST['id'])) {
        $upd_id = (INT)trim($_POST['id']);
    }
	
    $upd_groupname = "";
    if (isset($_POST['groupname']) && strlen($_POST['groupname']) >= 3 && strlen($_POST["groupname"]) <= 40) {
            $upd_groupname = strval(htmlspecialchars($_POST['groupname']));
    } else {
        $error = true;
        $msg = 'Bitte gib einen gültigen Gruppennamen ein';
    }

    $upd_invitelink = "";
    if (isset($_POST['invitelink']) && !empty($_POST['invitelink'])) {
        if (!preg_match("/^[A-Za-z0-9]{22}$/", $_POST['invitelink'])) {
            $msg = 'Der Gruppeneinladungslink-Code ist ungültig';
            $error = true;
        } else {
            $upd_invitelink = strval($_POST['invitelink']);
        }
    } else {
        $error = true;
        $msg = "Bitte gib einen richtigen Gruppeneinladungslink-Code ein";
    }

    $upd_description = "";
    if (!empty($_POST["description"])) {
		if(strlen($_POST['description']) > 1000) {
			$error_msg = 'Die Beschreibung darf maximal 1000 Zeichen lang sein';
			$error = true;
		} else {
			$upd_description = strval(htmlspecialchars($_POST['description']));
		}
    }

    $upd_category = "";
    if (isset($_POST['category']) && in_array(trim($_POST['category']), $category_filter) == true) {
        $upd_category = intval($_POST['category']);
    } else {
        $error = true;
        $msg = "Bitte wähle eine gültige Kategorie aus";
    }

    $upd_join = "";
    if (isset($_POST['join']) && !empty($_POST['join'])) {
        if (!preg_match("/^[0-9]+$/", $_POST['join'])) {
            $msg = 'Die Anzahl der Beigetretenen ist ungültig';
            $error = true;
        } else {
            $upd_join = intval($_POST['join']);
        }
    } else {
        $upd_join = 0;
    }
	
	$upd_vote = "";
    if (isset($_POST['vote']) && !empty($_POST['vote'])) {
        if (!preg_match("/^-?[0-9]+$/", $_POST['vote'])) {
            $msg = 'Die Anzahl der Bewertungen ist ungültig';
            $error = true;
        } else {
            $upd_vote = intval($_POST['vote']);
        }
    } else {
        $upd_vote = 0;
    }

    $upd_age = "";
    if (isset($_POST['age']) && in_array(trim($_POST['age']), $age_filter) == true) {
        $upd_age = intval($_POST['age']);
    } else {
        $error = true;
        $msg = "Bitte wähle ein gültiges Mindestalter aus";
    }


    if ($error != true) {
        if ($upd_id != '' AND ($upd_groupname != '' or $upd_invitelink != '' or $upd_category != '' or $upd_age != '' or !isset($error))) {

            // speichern
            $update = $db->prepare("UPDATE `group` SET `title`=?, `invite`=?, `description`=?, `category`=?, `age`=?, `join`=?, `vote`=? WHERE id=? LIMIT 1");	
            $update->bind_param('sssiiiii', strval($upd_groupname), strval($upd_invitelink), strval($upd_description), intval($upd_category), intval($upd_age), intval($upd_join), intval($upd_vote), intval($upd_id));

            if ($update->execute()) {
                $msg = 'Gruppendaten wurden erfolgreich geändert';
				echo '<meta http-equiv="refresh" content="1; URL='.$options['siteurl'].'/backend/gruppen">';
                $modus_aendern = false;
            }
        }
    }
    if (isset($_POST['aktion']) and $_POST['aktion'] == 'speichern') {
        $groupname = "";
        if (isset($_POST['groupname'])) {
            $groupname = $_POST['groupname'];
        }
        $invite = "";
        if (isset($_POST['invitelink'])) {
            $invite = $_POST['invitelink'];
        }
        $description = "";
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
        }
		$category = "";
        if (isset($_POST['category'])) {
            $category = $_POST['category'];
        }
		$age = '';
        if (isset($_POST['age'])) {
            $age = $_POST['age'];
        }
        $join = 0;
        if (isset($_POST['join'])) {
            $join = $_POST['join'];
        }
        $vote = 0;
        if (isset($_POST['vote'])) {
            $vote = $_POST['vote'];
        }
		
        if ($groupname != '' or $invite != '' or $category != '' or $age != '') {
            // speichern
            $einfuegen = $db->prepare("INSERT INTO `group` (`groupname`, `invite`, `description`, `category`, `age`, `join`, `vote`, `id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $einfuegen->bind_param('sssiiiii', $groupname, $invite, $description, $category, $age, $join, $vote, $id);
	
            if ($einfuegen->execute()) {
                header('Location: gruppe?aktion=feedbackgespeichert');
                die();
                $msg = 'gespeichert';
            }
        }
    }
}
if (isset($_GET['aktion']) and $_GET['aktion'] == 'feedbackgespeichert') {
    $msg = 'Benutzer wurde aktualisiert';
}
$modus_aendern = false;
if (isset($_GET['aktion']) and $_GET['aktion'] == 'bearbeiten') {
    $modus_aendern = true;
}
if ($modus_aendern != true) {
    $daten = array();
    if ($erg = $db->query("SELECT * FROM `group`")) {
        if ($erg->num_rows) {
            while ($datensatz = $erg->fetch_object()) {
                $daten[] = $datensatz;
            }
            $erg->free();
        }
    }
    if (!count($daten)) {
        $msg = 'Es sind keine Gruppen erstellt';
    } else {
        echo '<table id="sort">
				<thead>
					<tr>
						<th>Aktion</th>
						<th>ID</th>
						<th>Gruppenname</th>
						<th>Link-Code</th>
						<th>Kategorie</th>
						<th>Alter ab</th>
						<th>Anzahl der beigetretenen</th>
						<th>Bewertung</th>
						<th>Beschreibung</th>
				</thead>
				<tbody>';
        foreach ($daten as $inhalt) {
            echo '
						<tr>
							<td>
								<a href="?aktion=bearbeiten&id=' . $inhalt->id . '"><img src="../include/plugins/groupstar/group_edit.svg" height="25px" style="float: left;" alt="bearbeiten"></a> 
								<a href="?aktion=loeschen&id=' . $inhalt->id . '"><img src="../include/plugins/groupstar/group_delete.svg" height="25px" style="float: right;" alt="löschen"></a>
							</td>
							<td>' . $inhalt->id . '</td>
							<td>' . bereinigen($inhalt->title) . '</td>
							<td><a href="https://chat.whatsapp.com/invite/' . bereinigen($inhalt->invite) . '" rel="external" target="_blank" title="Gruppe in neuem Tab öffnen">' . bereinigen($inhalt->invite) . '</a></td>
							<td>' . bereinigen($inhalt->category) . '</td>
							<td>' . bereinigen($inhalt->age) . '</td>
							<td>' . bereinigen($inhalt->join) . '</td>
							<td>' . bereinigen($inhalt->vote) . '</td>
							<td>' . bereinigen($inhalt->description) . '</td>
						</tr>
						';
        }
        echo '</tbody></table>';
    }
}

if ($modus_aendern == true and isset($_GET['id'])) {
    $id_einlesen = (INT)$_GET['id'];
    if ($id_einlesen > 0) {
        $dseinlesen = $db->prepare("SELECT `id`, `title`, `invite`, `description`, `category`, `age`, `join`, `vote` FROM `group` WHERE `id`=? ");
        $dseinlesen->bind_param('i', $id_einlesen);
        $dseinlesen->bind_result($id, $groupname, $invite, $description, $category, $age, $join, $vote);
        $dseinlesen->execute();
        while ($dseinlesen->fetch()) {
            // echo "<li>";
            // echo $id . ' / '. $groupname .' '. $invite.' '. $description.' '.$category.' '.$age;
        }
    }
}
function bereinigen($inhalt = '') {
    $inhalt = trim($inhalt);
    $inhalt = htmlentities($inhalt, ENT_QUOTES, "UTF-8");
    return ($inhalt);
}

//setzt angegebennen Wert der $category Variable auf selected, dass im <select name="category"> die richtige Kategorie anvisiert wird.
if ($category === 1) {
    $category_select_1 = 'selected';
}
if ($category === 2) {
    $category_select_2 = 'selected';
}
if ($category === 3) {
    $category_select_3 = 'selected';
}
if ($category === 4) {
    $category_select_4 = 'selected';
}
if ($category === 5) {
    $category_select_5 = 'selected';
}
if ($category === 6) {
    $category_select_6 = 'selected';
}
if ($category === 7) {
    $category_select_7 = 'selected';
}
if ($category === 8) {
    $category_select_8 = 'selected';
}
if ($category === 9) {
    $category_select_9 = 'selected';
}
if ($category === 10) {
    $category_select_10 = 'selected';
}
if ($category === 11) {
    $category_select_11 = 'selected';
}
if ($category === 12) {
    $category_select_12 = 'selected';
}
if ($category === 13) {
    $category_select_13 = 'selected';
}
if ($category === 14) {
    $category_select_14 = 'selected';
}

//setzt angegebennen Wert der $age Variable auf selected, dass im <select name="age"> das richtige Alter anvisiert wird.
if ($age === 16) {
    $age_select_16 = 'selected';
}
if ($age === 17) {
    $age_select_17 = 'selected';
}
if ($age === 18) {
    $age_select_18 = 'selected';
}
if ($age === 19) {
    $age_select_19 = 'selected';
}
if ($age === 20) {
    $age_select_20 = 'selected';
}
if ($age === 21) {
    $age_select_21 = 'selected';
}
if ($age === 22) {
    $age_select_22 = 'selected';
}
if ($age === 23) {
    $age_select_23 = 'selected';
}
if ($age === 24) {
    $age_select_24 = 'selected';
}
if ($age === 25) {
    $age_select_25 = 'selected';
}
if ($age === 26) {
    $age_select_26 = 'selected';
}
if ($age === 27) {
    $age_select_27 = 'selected';
}
if ($age === 28) {
    $age_select_28 = 'selected';
}
if ($age === 29) {
    $age_select_29 = 'selected';
}
if ($age === 30) {
    $age_select_30 = 'selected';
}
if ($age === 35) {
    $age_select_35 = 'selected';
}
if ($age === 40) {
    $age_select_40 = 'selected';
}


?>