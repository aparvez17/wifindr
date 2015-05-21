<?php

$pdo = new PDO('mysql:host=localhost;dbname=n9196722', 'n9196722', 'password1');
if(!$pdo){
	die("Could not connect to database:".mysql_error());
}
?>