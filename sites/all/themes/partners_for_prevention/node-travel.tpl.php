<?php
$people = array();
$taxonomy = $node->taxonomy;

foreach ($taxonomy as $key => $value) {
	if ($taxonomy[$key]->vid != 5) {
		unset($taxonomy[$key]);	
	} else {
	$people[] = $taxonomy[$key]->name;
	}
}

?>

<div><?php  print($body) ?></div>
<div id="participants"><strong>Participants: </strong><ul><?php foreach ($people as $key => $value) { print ("<li />"."$people[$key]"); } ?></ul></div>