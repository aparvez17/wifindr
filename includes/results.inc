<?php
// Assign Posted Variables 
$selected_suburb = $_POST['select_suburb'];
$sent_rating = $_POST['sort_rating'];
$usr_latitude = $_POST['latitude'];
$usr_longitude = $_POST['longitude'];


$search_message = ""; // Message displayed to used depending on search criteria.
$case = 0; // Variable is unique for different combinations of user input.


/* Case 1 - The user searched using geolocation
			Get all hotspots from database and determine which are under a specific
			distance from the user's location.
*/
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
/* The user did not choose geolocation */
else{
	if($selected_suburb != ""){
		/* Case 2 - The user selected suburb and minimum rating */
		if($sent_rating != ""){
			$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE suburb LIKE :searched AND hotspot_rating > :sent_rating');
			$hotspots->bindValue(':searched', "%".$selected_suburb."%");
			$hotspots->bindValue(':sent_rating', $sent_rating);
			$case = 2;		
		}
		/* Case 3 - The user only selected suburb */
		else{
			$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE suburb LIKE :searched');
			$hotspots->bindValue(':searched', "%".$selected_suburb."%");
			
			$case = 3;	
		}
	}
	else{
		/* Case 4 - The user did not select suburb, only minimum rating */
		if($sent_rating != ""){
			$hotspots = $pdo->prepare('SELECT * FROM hotspots WHERE hotspot_rating > :sent_rating');
			$hotspots->bindValue(':sent_rating', $sent_rating);
			$case = 4;
		}
		/* Case 5 - The user selected nothing; show all results */
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