<?php

$pdo = new PDO('mysql:host=localhost;dbname=wifindr', 'root', '');
if(!$pdo){
	die("Could not connect to database:".mysql_error());
}
?>