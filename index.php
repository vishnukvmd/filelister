<?php
$dir = '../';
init();
authenticate();
wrapUp();

function init() {
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	echo <<<'HTML'
	<html>
		<head>
			<title>Directory Lister</title>
		</head>
		<body>
			<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
			<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
			<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
HTML;
}

function wrapUp() {
	echo <<<'HTML'
		</body>
	</html>
HTML;
}

function authenticate() {
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		global $dir;
		if($username=="vishnu" && $password=="password") {
			displayDirectoryStructure($dir);
		}
		else {
			displayLoginBox();
		}
	}
	else {
		displayLoginBox();
	}
}

function displayLoginBox() {
	echo <<<'HTML'
	<form class="form-horizontal" action="index.php" method="post">
		<div class="form-group">
			<label for="inputUsername" class="col-sm-2 control-label">Username</label>
			<div class="col-sm-4">
				<input id="inputUsername" type="text" class="form-control" name="username" placeholder="Username">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-4">
				<input id="inputPassword" type="password" class="form-control" name="password" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">			
				<button type="submit" class="btn btn-default">Sign In</button>
			</div>
		</div>
	</form>
HTML;
}

function displayDirectoryStructure($dir) {
	$files = scandir($dir);
	foreach($files as $file) {
		echo "<a href='".$dir.$file."'>".$file."</a><br>";
	}
}
?>
