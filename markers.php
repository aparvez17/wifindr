<?php

require("dbconnect.inc");

$dom = new DOMDocument("1.0");	
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Select all the rows in the markers table

$query = $pdo->prepare('SELECT * FROM hotspots WHERE 1');
$query->execute();
if (!$query) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = $query->fetch(PDO::FETCH_ASSOC)){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['latitude']);
  $newnode->setAttribute("lng", $row['longitude']);
 
}

echo $dom->saveXML();
?>