<?php
$dir = '../';
displayLoginBox();
displayStructure($dir);

function displayLoginBox() {
	echo <<<'HTML'
	<form>
		Username : <input type="text" name="username"><br>
		Password : <input type="password" name="password"><br>
		<input type="submit" value="Submit">
	</form>;
HTML;
}

function displayStructure($dir) {
	$files = scandir($dir);
	foreach($files as $file) {
		echo "<a href='".$dir.$file."'>".$file."</a><br>";
	}
}
?>
