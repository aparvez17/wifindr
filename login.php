<?php
session_start();
require("dbconnect.inc");

if (isset($_POST["username"]) and isset($_POST["password"])){
		//Assign Variables
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		//Query Database and get a counter of how many results, in theory 0 or 1 is the only result
		$userdata = $pdo->prepare("SELECT count(*) FROM `user` WHERE email='$username' and password='$password'");
		$userdata->execute();
		$foundRows = $userdata->fetchColumn();
		//If there is 1 you then set the session 
	if ($foundRows == 1){
		$userdata2 = $pdo->prepare("SELECT * FROM `user` WHERE email='$username' and password='$password'");
		$userdata2->execute();
		$result = $userdata2->fetch(PDO::FETCH_OBJ);
		$_SESSION["id"] = $result->ID;
		$_SESSION["name"] = $result->USERNAME;
		$_SESSION["username"] = $username;
	
	}else{
	//If the login credentials doesn't match
	echo 'Invalid Login Credentials';
	}
	}
	//Sets the header if there is a user
	if (isset($_SESSION["username"])){
		header("Location: index.php");
	}
		
?>