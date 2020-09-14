<?php
	function setup() {
		global $db;
		$query = '';
		$sqlScript = file('../include/plugins/groupstar/import.sql');
		foreach ($sqlScript as $line)	{

			$startWith = substr(trim($line), 0 ,2);
			$endWith = substr(trim($line), -1 ,1);

			if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
				continue;
			}

			$query = $query . $line;
			if ($endWith == ';') {
				mysqli_query($db,$query) or die('Problem beim Ausführen der SQL-Abfrage <b>' . $query. '</b>');
				$query= '';		
			}
		}
	}
?>