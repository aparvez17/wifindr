<?php
session_start();
include 'dbconnect.inc';
include 'includes/hotspot.inc';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Social Media Meta Data -->
		<meta name="description" content="View and review a hotspot.">
		<meta property="og:title" content="Wifindr - Join the Free Wi-Fi Revolution">
        <meta property="og:image" content="images/logo/logo_black.png">
        <meta property="og:description" content="Wifindr lets you discover and rate free wi-fi hotspots.">

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
        
		<title>wiFindr - Search Results</title>

		<!-- Stylesheets  -->
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link rel="stylesheet" href="css/mobile.css" type="text/css">

		<!-- Online Fonts  -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

		<!-- External Javascript Files  -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    	<script type="text/javascript" src="js/map.js"></script>
    	<script type="text/javascript" src="js/menu.js"></script>

	</head>
	<body onload="loadMap(<?php echo $hotspot_data['latitude'] ?>, <?php echo $hotspot_data['longitude']?>)">
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

	        <!-- Hotspot Overview-->
			<div id="content">
		        <div class="yellow_bg wrap100">
			        <div class="page center padding30">
			        	<div id="map-canvas" class="map-canvas-short"></div>
			        	<div id="hotspot_title">
			        		<div class="left">
					        	<h2><?php echo $hotspot_data['name']; ?></h2>
					        	<h3 id="hotspot_address"><?php echo $hotspot_data['address']; ?></h3>
				        	</div>
				        	<div id="rating_overview" class="right">
				        		<h2><?php echo $avg_rating; ?>/5</h2>
				        		<h3><?php 
					        			if ($num_ratings == 1){
					        				echo $num_ratings," Review";
					        			}
					        			else{
					        				echo $num_ratings," Reviews";
					        			}
				        			?>
				        		 </h3>
				        	</div>
				        </div>
			        </div>
		    	</div>

		    	<!-- Add A Review-->
		    	
		        <div class="page center padding30">
		        	<?php if (isset($_SESSION["username"])){ ?>
		        	<h3>Add a review</h3>
		        		<form method='POST' action='review.php' id='review'>
		        			<textarea placeholder='Write a review...'' id='review_text' name='review_text'
		        							oninvalid='setCustomValidity('Please write a review here.')' 
		        							onchange='try{setCustomValidity('')}catch(e){}' 
		        							required></textarea>
		        			<select id='rating' name='rating' 
		        							oninvalid='setCustomValidity('Don't forget to rate.')'
		        							onchange='try{setCustomValidity('')}catch(e){}'
		        							required>
									<option value=''>Rating</option>
									<option value='1'>1</option>
									<option value='2'>2</option>
									<option value='3'>3</option>
									<option value='4'>4</option>
									<option value='5'>5</option>
								</select>
							<input name='hotspot_id' type='hidden' value='<?php echo $h_id; ?>'>
		        			<input id='send_review' type='submit' value='Send' class='right' />
		        		</form>
		        	<?php } else {}; ?>

		        	<h2>User Reviews</h2>
		        	<?php
		        		if($num_ratings == 0){
		        			echo "<br/><h3>This hotspot has no ratings... yet.</h3>";
		        		}
		        		foreach($review_data as $review){
		        			$format_date = date("jS M Y", strtotime($review['date']));
		        			echo "<div class='user-review'>
		        					<h3>",$review['person_name'],"</h3>
		        					<p>",$review['review_text'],"</p>
		        					<div class='user-rating'>
		        					<h2>",$review['rating'],"/5</h2>
		        					</div>
		        					<div class='timestamp'>",$format_date,"</div>
		        					</div>";
		        		}    
		        	?>
		        </div>
		    </div>
		    
		    <!-- Footer -->
		    <div id="footer_wrap">
				<div id="footer" class="page center">
					<img class="left" src="images/logo/footer_icon.png" alt="wiFindr" />
					<p id="copyright" class="right">&copy; wiFindr 2015</p>
				</div>
			</div>
		</div>
	</body>
</html>