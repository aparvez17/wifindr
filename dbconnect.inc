<?php

try{
	$pdo = new PDO('mysql:host=localhost;dbname=wifindr', 'root', '');
}
catch(PDOException $error){
	die("Could not connect to database:".$error->getMessage());
}

//$pdo = new PDO('mysql:host=localhost;dbname=wifindr', 'root', '');
//if(!$pdo){
//	die("Could not connect to database:".mysql_error());
//}
?>