<?php 
// Strip speicial characters from id
$h_id = htmlspecialchars($_GET['id']);

// Get all data for hotspot
try{
	$hotspot_data = $pdo->prepare('SELECT * FROM hotspots WHERE id=:id');
}
catch (PDOException $e){
	echo $e->getMessage();
} 

$hotspot_data->bindValue(':id', $h_id);
$hotspot_data->execute();
$hotspot_data = $hotspot_data -> fetch();

// Get all reviews for hotspot
try{
	$review_data = $pdo->prepare('SELECT * FROM reviews WHERE hotspot_id=:id ORDER BY date desc');
	$review_data->bindValue(':id', $h_id);
}
catch (PDOException $e){
	echo $e->getMessage();
} 
$review_data->execute();

// Get all ratings for hotspot, number of ratings and average rating.
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