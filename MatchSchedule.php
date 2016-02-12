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
<table class = "rankingsTable" >
		<thead>
			<th>Start Time</th>
			<th>Match Number</th>
			<th><span>Team Number</span></th>
			<th>station</th>
		</thead>
	
		<tbody>

<?php

mysqli_select_db($mysqli,"mynewdatabase3");
$json1 = json_decode($response1,true);
//echo json_encode($json1, JSON_PRETTY_PRINT);

foreach($json1 as $match){
	foreach($match as $move){
		$startTime=$move["startTime"];
		$matchNumber=$move["matchNumber"];
		 foreach($move[Teams] as $t){
			 $teamNumber1=$t['teamNumber'];
			 $station=$t['station'];
		
		
		?>
		<tr>
						<td><?php echo $startTime; ?></td> 
						<td><?php echo $matchNumber; ?></td> 
						<td><?php echo $teamNumber1; ?></td> 
						<td><?php echo $station; ?></td> 
		</tr>
		<?php	
		$sql1="INSERT INTO matchschedule(TeamNumber,station)
		VALUES('$teamNumber1','$station')";
		mysqli_query($mysqli,$sql1);
		}
		$sql2="INSERT INTO matchschedule(startTime,matchNumber)
		VALUES('$startTime','$matchNumber')";
		mysqli_query($mysqli,$sql2);
	}

}
			
	?>
</tbody>
	</table>

