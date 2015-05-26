<?php 
try{
	$suburbs = $pdo->query('SELECT DISTINCT suburb from hotspots');
}
catch (PDOException $e){
	echo $e->getMessage();
} 

$sub_list = Array();

foreach ($suburbs as $suburb){
	$clean_suburb = trim(preg_replace('/[0-9,]+/', '', $suburb['suburb']));
	array_push($sub_list, $clean_suburb);
}
$sub_list = array_unique($sub_list);

?>