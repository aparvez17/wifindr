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
				<h3 class="center-text padding30">MENU</h3>
				<ul>
					<li>Log in</li>
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
		        	if($hot_count == 0){
		        		echo "We couldn't find any hotspots in ", $searched,"</h2>";
		        	}
		        	else{
		        		echo "We found ",$hot_count," hotspot in ", $searched,"</h2>";
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