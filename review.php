<?php
include 'dbconnect.inc';
session_start();
date_default_timezone_set('Australia/Brisbane');

$time = $date = date('Y-m-d h:i:s a', time());
$user_name = $_SESSION['username'];
$review_text = $_POST['review_text'];
$rating = $_POST['rating'];
$hotspot_id = $_POST['hotspot_id']; 


try{
	$submit_review = $pdo->prepare('INSERT INTO reviews (person_name,hotspot_id, review_text, rating, date) VALUES (:person_name, :hotspot_id, :review_text, :rating, :time)');
	$submit_review->bindValue(':person_name', $user_name);
	$submit_review->bindValue(':hotspot_id', $hotspot_id);
	$submit_review->bindValue(':review_text', $review_text);
	$submit_review->bindValue(':rating', $rating);
	$submit_review->bindValue(':time', $time);
	$submit_review->execute();

	
	$hotspot_rating = $pdo->prepare('SELECT hotspot_rating FROM hotspots WHERE id=:h_id');
	$hotspot_rating->bindValue(':h_id', $hotspot_id);
	$hotspot_rating->execute();

	$h_rating = $hotspot_rating->fetch(PDO::FETCH_ASSOC);
	if ($h_rating['hotspot_rating'] == 0.000){
		$new_rating = $rating;
	}
	else{
		$new_rating = ($h_rating['hotspot_rating']+$rating)/2;
	}
	

	$update_hotspots = $pdo->prepare('UPDATE hotspots SET hotspot_rating = :new_rating WHERE id = :hotspot_id');
	$update_hotspots->bindValue(':new_rating', $new_rating);
	$update_hotspots->bindValue(':hotspot_id', $hotspot_id);
	$update_hotspots->execute();

	
}
catch(PDOException $e){
	echo "Review has not been sent:", $e;
}
header('Location: hotspot.php?id='.$hotspot_id);


?>