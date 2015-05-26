<?php
include 'dbconnect.inc';
include 'login.php';

$h_id = htmlspecialchars($_GET['id']);

try{
	$hotspot_data = $pdo->prepare('SELECT * FROM hotspots WHERE id=:id');
}
catch (PDOException $e){
	echo $e->getMessage();
} 

$hotspot_data->bindValue(':id', $h_id);
$hotspot_data->execute();
$hotspot_data = $hotspot_data -> fetch();

try{
	$review_data = $pdo->prepare('SELECT * FROM reviews WHERE hotspot_id=:id ORDER BY date desc');
	$review_data->bindValue(':id', $h_id);
}
catch (PDOException $e){
	echo $e->getMessage();
} 
$review_data->execute();

$ratings = $review_data->fetchAll(PDO::FETCH_COLUMN, 5);

$num_ratings = count($ratings); 
if($num_ratings == 0){
	$avg_rating = "-";
}
else{
	$avg_rating = number_format(array_sum($ratings) / $num_ratings, 2);
}
$review_data->execute();

	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="View and review a hotspot.">
		<meta property="og:title" content="Wifindr - Join the Free Wi-Fi Revolution">
        <meta property="og:image" content="images/logo/logo_black.png">
        <meta property="og:description" content="Wifindr lets you discover and rate free wi-fi hotspots.">
		<title>wiFindr - Search Results</title>
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/animation.css" type="text/css">
		<link rel="stylesheet" href="css/mobile.css" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,400' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    	<script type="text/javascript" src="js/map.js"></script>
	</head>
	<body onload="loadMap(<?php echo $hotspot_data['latitude'] ?>, <?php echo $hotspot_data['longitude']?>)">
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

		        <div class="page center padding30">
		        	<h3>Add a review</h3>
		        		<form method='POST' action='review.php' id="review">
		        			<textarea placeholder="Write a review..." id="review_text" name="review_text" 
		        							oninvalid="setCustomValidity('Please write a review here.')" 
		        							onchange="try{setCustomValidity('')}catch(e){}" 
		        							required></textarea>
		        			<select id="rating" name='rating' 
		        							oninvalid="setCustomValidity('Don't forget to rate.')" 
		        							onchange="try{setCustomValidity('')}catch(e){}"  
		        							required>
									<option value=''>Rating</option>
									<option value='1'>1</option>
									<option value='2'>2</option>
									<option value='3'>3</option>
									<option value='4'>4</option>
									<option value='5'>5</option>
								</select>
							<input name="hotspot_id" type="hidden" value="<?php echo $h_id ?>">
		        			<input id="send_review" type='submit' value="Send" class="right" />
		        		</form>
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
		    <br class="clear">
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