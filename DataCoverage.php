<?php
//Data Coverage
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
include("read_ini.php");
include("db_connect.php");
$url1="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";

$response1 = file_get_contents($url1,false,$context);
?>
<head>	<link rel="stylesheet" type="text/css" href="css/DataCoverageStyle.css"> </head>
<br>
<br>
<br>
<br>
<div class = "title" >
	<h1> Data Coverage </h1>
</div>
<div class="page-container">
	<table class="Schedule-table">
		<tr class="top-bar">
			<th class="table-top"><b>Match</b></th>
			<th class="table-top"><b>Red 1</b></th>
			<th class="table-top"><b>Red 2</b></th>
			<th class="table-top"><b>Red 3</b></th>
			<th class="table-top"><b>Blue 1</b></th>
			<th class="table-top"><b>Blue 2</b></th>
			<th class="table-top"><b>Blue 3</b></th>
		</tr>
<?php

	$query2 = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
	$result2 = $mysqli->query($query2);

	foreach($json1 as $match){	
?>	
		<tr>
			<td class="side-bar"><b><?=$matchNumba?></b></td>
			<td><?=$Red1?></td>
			<td><?=$Red2?></td>
			<td><?=$Red3?></td>
			<td><?=$Blue1?></td>
			<td><?=$Blue2?></td>
			<td><?=$Blue3?></td>
		</tr>
<?php
	}		
?>
	</table>
</div>