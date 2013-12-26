<?php
$dir = '../';
displayStructure($dir);
function displayStructure($dir) {
	$files = scandir($dir);
	foreach($files as $file) {
		echo "<a href='".$dir.$file."'>".$file."</a><br>";
	}
}
?>
