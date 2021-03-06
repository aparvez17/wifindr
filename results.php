<?php
session_start();
include 'dbconnect.inc';
include 'includes/results.inc';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Social Media Meta Data -->
		<meta name="description" content="Browse hotspots for your specified location.">
		<meta property="og:title" content="wiFindr - Join the Free Wi-Fi Revolution">
        <meta property="og:image" content="images/logo/logo_black.png">
        <meta property="og:description" content="wiFindr lets you discover and rate free wi-fi hotspots.">
		<title>wiFindr - Results 
			<?php if($selected_suburb != ""){
				echo "for",$selected_suburb;
				}
				else{
					echo "for your location";
				}
			?>
		</title>

		<!-- Mobile Meta Data  -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        	<!-- iOS  -->
        <link rel="apple-touch-icon-precomposed" href="images/icons/icon_mobile.png"/>
        <link rel="apple-touch-startup-image" href="images/splash.png" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />

        	<!-- Android  -->
        <link rel="manifest" href="manifest.json">
        <meta name="mobile-web-app-capable" content="yes" />
        <link rel="icon" sizes="192x192" href="images/icons/icon_mobile.png">

        <!-- Stylesheets  -->
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link rel="stylesheet" href="css/mobile.css" type="text/css">
		
		<!-- Online Fonts  -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

		<!-- External Javascript Files  -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
		<script type="text/javascript" src="js/map.js"></script>
		<script type="text/javascript" src="js/menu.js"></script>
	</head>

	<body onload="loadMap(<?php echo $latitude ?>, <?php echo $longitude?>)">
		<div id="wrapper">

			<!-- Navigation Menu -->
			<nav id="menu_wrap" class="menu-closed" active="0">
				<a href="javascript:void(0);" id="close_menu" class="left" onclick="menu()"><img src="images/icons/arrow.png" alt="Close Menu"/></a>
				<h3 class="center-text padding30">MENU</h3>
				<ul>
					
					<?php 
		        	if (isset($_SESSION['username'])){
						$username = $_SESSION['username'];
		        		echo "<li><h3><b>Hi! ".$username."</b></h3></li>";
		        	}
		        	else{
		        		echo '<li onclick="login()">Log in</li>';
		        	}	 
		        	?>
					<div id="login" open="0">
						<form action="login.php" method="POST">
							<input type="text" placeholder="Email" name="username"/>
							<input type="password" placeholder="Password" name="password" />
							<input type="submit" value="Login" />
						</form>
					</div>
					<a href="register.php"><li>Create an account</li></a>
					<a href="hotspot.php?id=7"><li>Example Hotspot Page</li></a>
					<?php
					if (isset($_SESSION['username'])){
						echo '<a href="logout.php"><li>logout</li></a>';
					}
					?>
				</ul>
			</nav>


			<!-- Header -->
			<div id="header_wrap" class="yellow_bg">
	            <div id="header" class="center">
	                <a href="index.php"><img src="images/logo/logo_white.png" class="left header-logo" alt="wiFindr"></a>
	                <a href="javascript:void(0);" id="menu_icon" class="right" onclick="menu()"><img src="images/icons/menu_icon.png" alt="Open Menu"/></a>
	            </div>
	        </div>

	        <!-- Main Content -->
	        <div id="content">
		        <div id="map-canvas" class="map-canvas-short"></div>
		        <div class="page center padding30">
		        	<h2>
		        		<?php 
			        	include "search_messages.php";
			        	echo $search_message;
		        		?>
		        	</h2>

		        	<!-- Dynamically Display Hotspots Results -->
		        	<div id="results-wrap">
		        		<?php
		        			foreach($hotspots as $hotspot){
		        				if($hotspot['hotspot_rating'] != 0){
		        					$rating = $hotspot['hotspot_rating'];
		        				}
		        				else{
		        					$rating = "-";
		        				}
		        				
			        			$clean_suburb = preg_replace('/[0-9,]+/', '', $hotspot['suburb']);

			        			echo '<a href="hotspot.php?id=',$hotspot['id'],'" class="result">',
			        			'<p class="result-name">',$hotspot['name'],'</p>',
			        			'<p class="result-address">',$hotspot['address'],',',$clean_suburb,'</p>',
			        			'<div class="result-rating">',$rating,'/5</div></a>';
			        		}
		        		?>
		        	</div>
		        </div>
		    </div>

		    <!-- Footer -->
	       	<div id="footer_scroll_wrap">
				<div id="footer" class="page center">
					<img class="left" src="images/logo/footer_icon.png" alt="wiFindr" />
					<p id="copyright" class="right">&copy; wiFindr 2015</p>
				</div>
			</div>
	    </div>
	</body>
</html>