<?php
include 'dbconnect.inc';
try{
	$suburbs = $pdo->query('SELECT DISTINCT suburb from hotspots');
}
catch (PDOException $e){
	echo $e->getMessage();
} 

$sub_list = [];
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
		<title>wiFindr - Find free wi-fi near you</title>
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link href='http://fonts.googl  eapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    	<script type="text/javascript" src="js/map.js"></script>
	</head>
	<body>
		<div class="wrapper">
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
			<div id="content">
				<div class="page_wrap">		
					<div class="page center">

						<a href="javascript:void(0);" id="menu_icon" class="right" onclick="menu()"><img src="images/icons/menu_icon.png"/></a>

						<br class="clear">

						<div id="promo_headline" class="center">
							<h1 class="center-text">We know you're only here for the free Wi-Fi</h1>
						</div>

						<div id="searchbox" class="page">
							<img class="left" src="images/logo/logo_black.png" alt="wiFindr - Find free wi-fi near you" />
							<form action="results.php" method="POST">
								<input type="text" id="search-bar" name="search_bar" class="left" placeholder="Enter a location to find free Wi-Fi">
								<select id="select_suburb" name="select_suburb" class="right" >
									<option value="">or Select a Suburb</option>
									<?php
									foreach($sub_list as $sub){
										echo '<option value="',$sub,'">',$sub,'</option>';
									}
									?>
								</select>
								
								<input type="image" src="images/icons/location_icon.png" />
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


		<script type="text/javascript" src="js/menu.js"></script>
	</body>
</html>