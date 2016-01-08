<?php
//Rankings
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("read_ini.php");

include("api_connect.php");


	//NEW API CALL FOR 2.0
	$url = "https://frc-api.firstinspires.org/v2.0/2015/rankings/TXHO";
	$response = file_get_contents($url,false,$context);
	
	//hint: use json_decode to decode $response. Look it up.

?>
<head>	<link rel="stylesheet" type="text/css" href="css/RankingsStyle.css"> </head>
<br>
<br>
<br>
<br>
<div class = "title" >
	<h1> Rankings </h1>
</div>

<div class="page_container">
	<?php 	
		var_dump($response); //This prints a nice red string
	?>
</div>