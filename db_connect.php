<?php
	error_reporting(E_ALL ^ E_NOTICE);
	
	$ini = parse_ini_file("./config.ini");
	
	$dbhost = $ini['dbhost'];
	$dbname = $ini['dbname'];
	$dbuser = $ini['dbuser'];
	$dbpass = $ini['dbpass'];
	
	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
?>