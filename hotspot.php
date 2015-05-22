<?php
include 'dbconnect.inc';
include('login.php');
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
		        <div class="yellow_bg 100wrap">
			        <div class="page center padding30">
			        	<div id="map-canvas" class="map-canvas-short"></div>
			        	<div id="hotspot_title">
			        		<div class="left">
					        	<h2><?php echo $hotspot_data['name']; ?></h2>
					        	<h3><?php echo $hotspot_data['address']; ?></h3>
				        	</div>
				        	<div id="rating_overview" class="right">
				        		<h2>4.5/5</h2>
				        		<h3>23 Reviews</h3>
				        	</div>
				        </div>
			        </div>
		    	</div>

		        <div class="page center padding30">
		        	<h2>User Reviews</h2>
		        	
		        	<?php
		        		foreach($review_data as $review){
		        			echo "<div class='user-review'>
		        					<div class='user-rating center-text'>
		        					<h2>",$review['rating'],"/5</h2>
		        					</div>
		        					<h3>",$review['name'],"</h3>
		        					<p>",$review['review_text'],"</p>
		        					<div class='timestamp'>",$review['date'],"</div>
		        					</div>";
		        		}    
		        	?>
					<!--<div class="user-review">
		        		<div class="user-rating center-text">
		        			<h2>4.5/5</h2>
		        		</div>
		        		<h3>Asad Parvez</h3>
		        		<p>You are expected to complete Part 2 - Server side design and implementation using PHP and MySQL in the second half of the semester.  The whole project is expected to be completed at the end of week12 and you will demo your website to your tutor in Week12 Practical class.
		        		</p>
		        		<div class="timestamp">10 May 2015</div>
		        	</div>
		        	<div class="user-review">
		        		<div class="user-rating center-text">
		        			<h2>4.5/5</h2>
		        		</div>
		        		<h3>Asad Parvez</h3>
		        		<p>You are expected to complete Part 2 - Server side design and implementation using PHP and MySQL in the second half of the semester.  The whole project is expected to be completed at the end of week12 and you will demo your website to your tutor in Week12 Practical class.
		        		</p>
		        		<div class="timestamp">10 May 2015</div>
		        	</div>-->
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