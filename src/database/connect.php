<?php
	
	// Connect to db
	define('DB_SERVER', 'server');
	define('DB_USERNAME', 'username');
	define('DB_PASSWORD', 'password');
	define('DB_DATABASE', 'db');
	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	session_start();
?>