<?php

//Put Match Schedule Stuff Below. This requires the Events API
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
<head>	<link rel="stylesheet" type="text/css" href="css/MatchScheduleStyle.css"> </head>
<br>
<br>
<br>
<br>
<div class = "title" >
	<h1> Match Schedule </h1>
	
</div>
	<table class = "fixedHead">
		<thead>
			<th><span>TeamNumber</span></th>
			<th>startTime</th>
			<th>matchNumber</th>
			<th>station</th>
		</thead>
	</table>
	<table class = "rankingsTable" >
		<tbody>

<?php

mysqli_select_db($mysqli,"mynewdatabase3");
$json1 = json_decode($response1, true);

foreach($json1 as $match){
	
	foreach($match as $garbage){
		
		$matchNumber=$garbage["matchNumber"];
		$teamNumber1=$garbage["teamNumber"];
		$startTime=$garbage["startTime"];
		$station=$garbage["station"];
		
	
		$sql1="INSERT INTO matchschedule(TeamNumber,startTime,matchNumber,station)
		VALUES('$teamNumber1','$startTime','$matchNumber','$station')";
		
		mysqli_query($mysqli,$sql1);
		?>
		<tr>
						<td><?php echo $matchNumber; ?></td> 
						<td><?php echo $teamNumber1; ?></td>
						<td><?php echo $startTime; ?></td> 
						<td><?php echo $station; ?></td> 
		</tr>
		<?php	
	}
}
?>
</tbody>
	</table>

