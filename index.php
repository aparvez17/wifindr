<?php
include 'dbconnect.inc';
include('login.php');
try{
	$suburbs = $pdo->query('SELECT DISTINCT suburb from hotspots');
}
catch (PDOException $e){
	echo $e->getMessage();
} 

$sub_list = Array();
foreach ($suburbs as $suburb){
	$clean_suburb = trim(preg_replace('/[0-9,]+/', '', $suburb['suburb']));
	array_push($sub_list, $clean_suburb);
}
$sub_list = array_unique($sub_list);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Welcome to wiFindr! wiFindr lets you discover and rate free wi-fi hotspots.">
		<meta property="og:title" content="wiFindr - Join the Free Wi-Fi Revolution">
        <meta property="og:image" content="images/logo/logo_black.png">
        <meta property="og:description" content="wiFindr lets you discover and rate free wi-fi hotspots.">
        <link rel="apple-touch-icon-precomposed" href="images/icons/icon_mobile.png"/>
		<title>wiFindr - Find free wi-fi near you</title>
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link rel="stylesheet" href="css/mobile.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" 
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfHOKpEYRngpFqOITq0YIIm_puZYbPEs4">
		</script>	
		<script type="text/javascript" src="js/geo.js"></script>
	</head>
	<body onload="loadMap(-27.471110, 153.022686)">
		<div class="wrapper">
			<nav id="menu_wrap" class="menu-closed" active="0">
				<a href="javascript:void(0);" id="close_menu" class="left" onclick="menu()"><img src="images/icons/arrow.png" alt="Close Menu"/></a>
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
					<a href="register.php"><li>Create an account</li></a>
					<li>Learn More</li>
					<li>Privacy</li>
					<li>Terms</li>
				</ul>
			</nav>
			<div id="header_wrap" class="yellow_bg90">
				<div id="header" class="center">
					<a href="javascript:void(0);" id="menu_icon" class="right" onclick="menu()"><img src="images/icons/menu_icon.png" alt="Open Menu"/></a>
				</div>
			</div>
			<div id="content">
				<div class="page_wrap">		
					<div class="page center">

						<div id="promo_headline" class="center">
							<h1 class="center-text">We know you're only here for the free Wi-Fi</h1>
						</div>

						<div id="searchbox" class="page">
							<img class="left" src="images/logo/logo_black.png" alt="wiFindr - Find free wi-fi near you" />
							<form action="results.php" method="POST" name="search">
								<select name="select_suburb" class="search_select left" >
									<option value="">Select a Suburb</option>
									<?php
									foreach($sub_list as $sub){
										echo '<option value="',$sub,'">',$sub,'</option>';
									}
									?>
								</select>
								<select name="sort_rating" class="search_select left" >
									<option value="">Sort by Rating</option>
									<option value="rank">Highest - Lowest</option>
									<option value="number">Most Number - Least Number</option>
								</select>
								<input type="hidden" id="latitude" name="latitude" value="">
								<input type="hidden" id="longitude" name="longitude" value="">
								<img id="geolocation" src="images/icons/location_icon.png" onclick="javascript:getLocation();" alt="Use Current Location"/>
								<input type="image" src="images/icons/search_icon.png" />
							</form>
						</div>
					</div>
				</div>
				
			</div>
			
			<div id="footer_wrap">
				<div id="footer" class="page center">
					<img class="left" src="images/logo/footer_icon.png" alt="wiFindr" />
					<p id="copyright" class="right">&copy; wiFindr 2015</p>
				</div>
			</div>
		</div>
		<div id="map-canvas" class="map-canvas"></div>

		<script type="text/javascript" src="js/map.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
	</body>
</html>