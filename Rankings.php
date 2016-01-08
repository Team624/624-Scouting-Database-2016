<?php
//Rankings
include("HeadTemplate.php");
include("UserVerification.php");
include("navbar.php");
echo "<br><br><br><br><br><br><br>";
include("read_ini.php");

include("api_connect.php");


	$url = "https://frc-api.usfirst.org/api/v1.0/rankings/2016/TXHO";
	$response=file_get_contents($url,false,$context);
	
var_dump($response);
?>
<head>	<link rel="stylesheet" type="text/css" href="css/RankingsStyle.css"> </head>
<br>
<br>
<br>
<br>
<div class = "title" >
	<h1> Rankings </h1>
</div>