<?php 
switch ($case) {
    case 1:
		if($hot_count == 1){
			$search_message = "We found 1 hotspot close by";
		}
		else if($hot_count > 1){
			$search_message = "We found ".$hot_count." hotspots close by";
		}
		else{
			$search_message = "We couldn't find any hotspots close by";
		}
        break;
    case 2:
        if($hot_count == 1){
			$search_message = "We found 1 hotspot in ".$selected_suburb." with a rating over ".$sent_rating;
		}
		else if($hot_count > 1){
			$search_message = "We found ".$hot_count." hotspots in ".$selected_suburb." with a rating over ".$sent_rating;
		}
		else{
			$search_message = "We couldn't find any hotspots in".$selected_suburb." with a rating over ".$sent_rating;
		}
        break;
    case 3:
       	if($hot_count == 1){
			$search_message = "We found 1 hotspot in ".$selected_suburb;
		}
		else if($hot_count > 1){
			$search_message = "We found ".$hot_count." hotspots in ".$selected_suburb;
		}
		else{
			$search_message = "We couldn't find any hotspots in ".$selected_suburb;
		}
        break;
    case 4:
		if($hot_count == 1){
			$search_message = "We found 1 hotspot with a rating over ".$sent_rating;
		}
		else if($hot_count > 1){
			$search_message = "We found ".$hot_count." hotspots with a rating over ".$sent_rating;
		}
		else{
			$search_message = "We couldn't find any hotspots with a rating over ".$sent_rating;
		}
		break;
	case 5:
		$search_message = "Showing all results";
		break;
}











/*if($usr_latitude != ""){
	$num = count($id_array);
	if($num > 1){
		echo "<h2>We found ", $num," hotspots close by.</h2>";
	}
	else if ($num == 1){
		echo "<h2>We found ", $num," hotspot close by.</h2>";
	}
	else{
		echo "<h2>We found no hotspots close by.</h2>";
		echo "<a href='index.php' id='search_again'>Search Again?</a>";
	}
}
else if($selected_suburb != ""){
	if($hot_count > 1){
	echo "<h2>We found ",$hot_count," hotspots in ", $selected_suburb,"</h2>";
	}
	else if($hot_count == 1){
		echo "<h2>We found 1 hotspot in ", $selected_suburb, "</h2>";
	}
	else{
		echo "<h2>We couldn't find any hotspots in ", $selected_suburb, "</h2>";
		echo "<a href='index.php' id='search_again'>Search Again?</a>";
	}
}
else if($sent_rating != "") {
	if($hot_count > 1){
		echo "<h2>We found ", $hot_count," hotspots with a rating over ", $sent_rating,"</h2>";
	}
	else if($hot_count == 1){
		echo "<h2>We found ", $hot_count," hotspot with a rating over ", $sent_rating,"</h2>";
	}
	else{
		echo "<h2>We couldn't find any hotspots with a rating over ", $sent_rating,"</h2>";
	}	
}
else if($selected_suburb == "" && $sent_rating == "" && $usr_latitude == ""){
	echo "<h2>Showing all results</h2>";
}
else{
	echo "<h2>Oops Something went wrong :S</h2>";
}*/
?>