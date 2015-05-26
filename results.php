<?php
include 'dbconnect.inc';
include 'login.php';
$selected_suburb = $_POST['select_suburb'];
$sent_rating = $_POST['sort_rating'];
$usr_latitude = $_POST['latitude'];
$usr_longitude = $_POST['longitude'];

$search_message = "";
$case = 0;

if($usr_latitude != ""){
	$hotspots = $pdo->prepare('SELECT * FROM hotspots');
	$hotspots->execute();
	$latitude = $usr_latitude;
	$longitude = $usr_longitude;

	$hot_count = $hotspots->rowCount();
	$id_array = Array();
	foreach($hotspots as $hotspot){
		$distance = sqrt(pow(($hotspot['latitude']-$usr_latitude), 2)+pow(($hotspot['longitude']-$usr_longitude), 2));
		if ($distance < 0.015){
			$hotspots = array_push($id_array, $hotspot['id']);
		}
	}

	$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE id IN ('.implode(',', array_map('intval', $id_array)).')');
	$hotspots->execute();
	$case = 1;
}
else{
	if($selected_suburb != ""){
		if($sent_rating != ""){
			$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE suburb LIKE :searched AND hotspot_rating > :sent_rating');
			$hotspots->bindValue(':searched', "%".$selected_suburb."%");
			$hotspots->bindValue(':sent_rating', $sent_rating);
			$case = 2;		
		}
		else{
			$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE suburb LIKE :searched');
			$hotspots->bindValue(':searched', "%".$selected_suburb."%");
			
			$case = 3;	
		}
	}
	else{
		if($sent_rating != ""){
			$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE hotspot_rating > :sent_rating');
			$hotspots->bindValue(':sent_rating', $sent_rating);
			$case = 4;
		}
		else{
			$hotspots = $pdo->prepare('SELECT * FROM hotspots');
			$case = 5;
		}
	}
	$hotspots->execute();

	$results = $hotspots->fetch(PDO::FETCH_ASSOC);
	$longitude = $results['longitude'];
	$latitude = $results['latitude'];
	$hotspots->execute();

}

$hotspots->execute();
$hot_count = $hotspots->rowCount();


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Browse hotspots for your specified location.">
		<meta property="og:title" content="wiFindr - Join the Free Wi-Fi Revolution">
        <meta property="og:image" content="images/logo/logo_black.png">
        <meta property="og:description" content="wiFindr lets you discover and rate free wi-fi hotspots.">
		<title>wiFindr - Results for 
			<?php if($selected_suburb != ""){
				echo $selected_suburb;
				}
				else{
					echo "your location";
				}
				 ?></title>
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link rel="stylesheet" href="css/mobile.css" type="text/css">
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/map.js"></script>
    
		
	</head>
	<body onload="loadMap(<?php echo $latitude ?>, <?php echo $longitude?>)">
		<div id="wrapper">
			<nav id="menu_wrap" class="menu-closed" active="0">
				<a href="javascript:void(0);" id="close_menu" class="left" onclick="menu()"><img src="images/icons/arrow.png" alt="Close Menu"/></a>
				<h3 class="center-text padding30">MENU</h3>
				<ul>
					<li onclick="login()">Log in</li>
					<div id="login" open="0">
						<form action="login.php" method="POST">
							<input type="text" placeholder="Email" name="username"/>
							<input type="password" placeholder="Password" name="password" />
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
	                <a href="index.php"><img src="images/logo/logo_white.png" class="left header-logo" alt="wiFindr"></a>
	                <a href="javascript:void(0);" id="menu_icon" class="right" onclick="menu()"><img src="images/icons/menu_icon.png" alt="Open Menu"/></a>
	            </div>
	        </div>
	        <div id="content">
		        <div id="map-canvas" class="map-canvas-short"></div>
		        <div class="page center padding30">
		        	<h2>
		        		<?php 
			        	include "search_messages.php";
			        	echo $search_message;
		        		?>
		        	</h2>
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