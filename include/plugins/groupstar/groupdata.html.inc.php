	<table id="sort">
		<thead>
			<tr>
				<th>ID</th>
				<th>Gruppenname</th>
				<th>Gruppenlink</th>
				<th>Erstelldatum</th>
				<th>Beigetretene</th>
				<th>Zuletzt beigetreten</th>
				<th>Bewertung</th>
				<th>Kategorie</th>
				<th>Mindestalter</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$statement = $pdo->prepare("SELECT * FROM `group` ORDER BY `id` DESC");
				$result = $statement->execute();
				$count = 1;
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
			?>
				<tr>
					<td scope="row"><?php echo $row['id'] ?></td>
					<td><?php echo $row['title'] ?></td>
					<td><a target="_blank" href="<?php echo 'https://chat.whatsapp.com/invite/'.$row['invite'] ?>"><?php echo 'https://chat.whatsapp.com/invite/'.$row['invite'] ?></a></td>
					<td><?php echo $row['date'] ?></td>
					<td><?php echo $row['join'] ?></td>
					<td><?php echo $row['joindate'] ?></td>
					<td><?php echo $row['vote'] ?></td>
					<td><?php echo $row['category'] ?></td>
					<td>Ab <?php echo $row['age'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>