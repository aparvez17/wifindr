<?php
include 'dbconnect.inc';
$selected_suburb = $_POST['select_suburb'];
$search_word = $_POST['search_bar'];

if ($search_word == ""){
$searched = $selected_suburb;
$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE suburb LIKE :searched');
$hotspots->bindValue(':searched', "%".$searched."%");
}
else{
$searched = $search_word;
$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE suburb LIKE :searched');
$hotspots->bindValue(':searched', "%".$searched."%");
}

$hotspots->execute();

$hot_count = $hotspots->rowCount();

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
		<title>wiFindr - Search Results</title>
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link href='http://fonts.googl  eapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    	<script type="text/javascript" src="js/map.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<nav id="menu_wrap" class="menu-closed" active="0">
				<a href="javascript:void(0);" id="close_menu" class="left" onclick="menu()"><img src="images/icons/arrow.png"/></a>
				<h3 class="center-text padding30">MENU</h3>
				<ul>
					<li onclick="login()">Log in</li>
					<div id="login" open="0">
						<form>
							<input type="text" placeholder="Email" />
							<input type="password" placeholder="Password" />
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
		        <div id="map-canvas" class="map-canvas-short"></div>
		        <div class="page center padding30">
		        	<h2><?php 
		        	if($hot_count > 1){
		        		echo "We found ",$hot_count," hotspots in ", $searched,"</h2>";
		        	}
		        	else if($hot_count == 1){
		        		echo "We found 1 hotspot in ", $searched,"</h2>";
		        	}
		        	else{
		        		echo "We couldn't find any hotspots in ", $searched,"</h2>";
		        	}
		        	?>
		        	
		        	<div id="results-wrap">
		        		<?php
		        		foreach($hotspots as $hotspot){
		        			$clean_suburb = preg_replace('/[0-9,]+/', '', $hotspot['suburb']);
		        			echo '<a href="hotspot.php?id=',$hotspot['id'],'" class="result">',$hotspot['name'],
		        			'<br/><br/>',$hotspot['address'],
		        			'<br/>',$clean_suburb,'</a>';
		        		}

		        		?>
		        	</div>
		        </div>
		    </div>
	       	<div id="footer_scroll_wrap">
				<div id="footer" class="page center">
					<img class="left" src="images/logo/footer_icon.png" alt="wiFindr" />
					<p id="copyright" class="right">&copy; wiFindr 2015</p>
				</div>
			</div>
	    </div>

        <script type="text/javascript" src="js/menu.js"></script>
	</body>
</html>