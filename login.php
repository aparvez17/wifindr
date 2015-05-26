<?php
session_start();
require("dbconnect.inc");

if (isset($_POST["username"]) and isset($_POST["password"])){
		//3.1.1 Assigning posted values to variables.
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		//3.1.2 Checking the values are existing in the database or not
		$userdata = $pdo->prepare("SELECT count(*) FROM `user` WHERE email='$username' and password='$password'");
		$userdata->execute();
		$foundRows = $userdata->fetchColumn();
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
	if ($foundRows == 1){
	$_SESSION["username"] = $username;
	
	}else{
	//3.1.3 If the login credentials doesn"t match, he will be shown with an error message.
	echo 'Invalid Login Credentials';
	}
	}
	//3.1.4 if the user is logged in Greets the user with message
	if (isset($_SESSION["username"])){
		header("Location: index.php");
	}
		
?>