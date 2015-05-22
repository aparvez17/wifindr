<?php
	require('dbconnect.inc');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = md5($_POST['password']);
 
        try{
			$userdata = $pdo->prepare("INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')");
		}
		catch (PDOException $e){
			echo $e->getMessage();
		} 
		$userdata->execute();
		header("Location: index.php");
		die();
    }
	else
	if (isset($_POST['username']) and isset($_POST['password'])){
		//3.1.1 Assigning posted values to variables.
		$username = $_POST['username'];
		$password = md5($_POST['password']);
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
		$username = $_SESSION['username'];
		header("Location: index.php");
		die();
		}

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>WiFindr - Join the Free Wi-Fi Revolution</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/animation.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/map.js"></script>
    </head>
    <body class="yellow_bg">
        <div id="wrapper">
            <nav id="menu_wrap" class="menu-closed" active="0">
                <a href="javascript:void(0);" id="close_menu" class="left" onclick="menu()"><img src="images/icons/arrow.png"/></a>
                <h3 class="center-text padding30">MENU</h3>
                <ul>
                    <li onclick="login()">Log in</li>
                    <div id="login" open="0">
                        <form method = "POST">
                            <input name = "username" type="text" placeholder="Email" />
                            <input name = "password" type="password" placeholder="Password" />
                            <input type="submit" value="Login" />
                        </form>
                    </div>
                    <a href="register.html"><li>Create an account</li></a>
                    <li>Learn More</li>
                    <li>Privacy</li>
                    <li>Terms</li>
                </ul>
            </nav>
            <div id="header_wrap" class="yellow_bg">
                <div id="header" class="center">
                     <a href="index.php"><img src="images/logo/logo_white.png" class="left header-logo"></a>
                    <a href="javascript:void(0);" id="menu_icon" class="right" onclick="menu()"><img src="images/icons/menu_icon.png"/></a>
                </div>
            </div>
            <div id="content">
                <h1 class="center-text register-heading">Join the Free Wi-Fi Revolution</h1>
                <div class="register-wrap center padding30">
                    <form id="registration" method="POST">
                        <input id = "username" type="text" name = "username" placeholder="Name"/>
                        <input id = "email" name = "email" type="text" placeholder="Email">
                        <input id = "password" name="password" type="password" placeholder="Password"/>
                        <input type="password" placeholder="Re-Type Password"/>
                        <input type="submit" value="Sign Up!" />
                    </form>
                </div>
            </div>
            <div id="footer_wrap">
                <div id="footer" class="page center">
                    <img class="left" src="images/logo/footer_icon.png" alt="wiFindr" />
                    <p id="copyright" class="right">&copy; wiFindr 2015</p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/menu.js"></script>
    </body>
</html>