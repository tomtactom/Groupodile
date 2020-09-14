<?php
	$db_host = 'localhost';
	$db_name = 'groupodile';
	$db_user = '';
	$db_password = '';

	//Datenbank einfügen
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name);
	$pdo = new PDO("mysql:host=$db_host;port=3306;dbname=$db_name", $db_user, $db_password);
?>