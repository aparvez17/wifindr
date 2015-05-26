<?php
	require('dbconnect.inc');
	include('login.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = md5($_POST['password']);
		$password2 = md5($_POST['passwordCheck']);
		$sex = $_POST['sex'];
		$date = $_POST['date'];
		
		
        try{
			$userdata = $pdo->prepare("INSERT INTO `user` (username, password, email, sex, birth) VALUES ('$username', '$password', '$email', '$sex', '$date')");
		}
		catch (PDOException $e){
			echo $e->getMessage();
		} 
		$userdata->execute();
		header("Location: index.php");
		die();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Join the Free Wi-Fi revolution. Joining Wifindr lets you add reviews to hotspots.">
        <meta property="og:title" content="Wifindr - Join the Free Wi-Fi Revolution">
        <meta property="og:image" content="images/logo/logo_black.png">
        <meta property="og:description" content="Wifindr lets you discover and rate free wi-fi hotspots.">
        <title>WiFindr - Join the Free Wi-Fi Revolution</title>
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/animation.css" type="text/css">
        <link rel="stylesheet" href="css/mobile.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/map.js"></script>
		 <script type="text/javascript" src="js/validate.js"></script>
    </head>
    <body class="yellow_bg">
        <div id="wrapper">
            <nav id="menu_wrap" class="menu-closed" active="0">
                <a href="javascript:void(0);" id="close_menu" class="left" onclick="menu()"><img src="images/icons/arrow.png" alt="Close Menu"/></a>
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
                    <a href="register.php"><li>Create an account</li></a>
                    <li>Learn More</li>
                    <li>Privacy</li>
                    <li>Terms</li>
                </ul>
            </nav>
            <div id="header_wrap" class="yellow_bg">
                <div id="header" class="center">
                     <a href="index.php"><img src="images/logo/logo_white.png" class="left header-logo" alt="wiFindr"></a>
                    <a href="javascript:void(0);" id="menu_icon" class="right" onclick="menu()"><img src="images/icons/menu_icon.png" alt="Open Menu"/></a>
                </div>
            </div>
            <div id="content">
                <h1 class="center-text register-heading">Join the Free Wi-Fi Revolution</h1>
                <div class="register-wrap center padding30">
                    <form id="registration" name="registration" onsubmit="return formValidation();" method="POST">
                        <input id = "username" type="text" name = "username" placeholder="Name"/>
                        <input id = "email" name = "email" type="text" placeholder="Email">
						<input type="radio" name="sex" value="male" checked><label>Male</label>
						<input type="radio" name="sex" value="female"><label>Female</label>
						</br>
						<input type="date" name="date">
                        <input id = "password" name="password" type="password" placeholder="Password"/>
                        <input id = "passwordCheck" name="passwordCheck" type="password" placeholder="Re-Type Password"/>
                        <input type="submit" name="submit" value="Submit" />
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