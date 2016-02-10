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
$json1 = json_decode($response1,true);

	foreach($json1 as $match){
		foreach($match as $move){
		$matchNumber=$move["matchNumber"];
		
		
?>	
		<tr>
			<td class="side-bar"><b><?=$matchNumber; ?></b></td>
			<?php
				foreach($move[Teams] as $t){
					$teamNumber1=$t['teamNumber'];
			?>
			<td><?=$teamNumber1?></td>
			<?php
				}
			?>
		</tr>
<?php	
		
		}

	}
			
?>
	</table>
</div>