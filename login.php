<?php
session_start();
include 'dbconnect.inc';
if (isset($_POST['username']) and isset($_POST['password'])){
		//3.1.1 Assigning posted values to variables.
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		//3.1.2 Checking the values are existing in the database or not
		
		try{
			$userdata = $pdo->prepare("SELECT * FROM `user` WHERE email='$username' and password='$password'");
		}
		catch (PDOException $e){
			echo $e->getMessage();
		} 
		$userdata->execute();
		
		$count = $userdata->rowCount();
		//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
	if ($count == 1){
	$_SESSION['username'] = $username;
	}else{
	//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
	echo "Invalid Login Credentials.";
	}
	}
	//3.1.4 if the user is logged in Greets the user with message
	if (isset($_SESSION['username'])){
		echo "Yes it worked";
		header("Location: index.php");
}
		
?>