<?php

try{
	$pdo = new PDO('mysql:host=localhost;dbname=n9196722', 'n9196722', 'password1');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
	die("Could not connect to database:".$error->getMessage());
}

//$pdo = new PDO('mysql:host=localhost;dbname=n9196722', 'n9196722', 'password1');
//if(!$pdo){
//	die("Could not connect to database:".mysql_error());
//}
?>