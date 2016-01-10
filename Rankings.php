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
	<table class = "fixedHead">
		<thead>
			<th><span>Rank</span></th>
			<th>Team Number</th>
			<th>Qual Average</th>
			<th>Auto Points</th>
			<th>Container Points</th>
			<th>Coopertition Points</th>
			<th>Litter Points</th>
			<th>Tote Points</th>
			<th>Wins</th>
			<th>Losses</th>
			<th>Ties</th>
			<th>DQ</th>
			<th>Matches Played</th>
		</thead>
	</table>
	<div id = "invisible">
	<table class = "rankingsTable">
		<tbody>

	<?php
		$json = json_decode($response, true);

		foreach ($json as $rank)
		{
			foreach ($rank as $team)
			{
				$roast = $team["rank"];
				$teamNumber = $team["teamNumber"];
				$qualAverage = $team["qualAverage"];
				$autoPoints = $team["autoPoints"];
				$containerPoints = $team["containerPoints"];
				$coopertitionPoints = ["oopertitionPoints"];
				$litterPoints = ["litterPoints"];
				$totePoints = ["totePoints"];
				$wins = ["wins"];
				$losses = ["losses"];
				$ties = ["ties"];
				$dq = ["dq"];
				$matchesPlayed = ["matchesPlayed"];
	?>
					<tr>
						<td><?php echo $roast; ?></td> 
						<td><?php echo $teamNumber; ?></td>
						<td><?php echo $qualAverage; ?></td> 
						<td><?php echo $autoPoints; ?></td> 
						<td><?php echo $containerPoints; ?></td> 
						<td><?php echo $coopertitionPoints; ?></td>
						<td><?php echo $litterPoints; ?></td> 
						<td><?php echo $totePoints; ?></td> 
						<td><?php echo $wins; ?></td> 
						<td><?php echo $losses; ?></td> 
						<td><?php echo $ties; ?></td> 
						<td><?php echo $dq; ?></td>
						<td><?php echo $matchesPlayed; ?></td> 
					</tr>


					<?php
			}
		}
	?>
	</tbody>
	</table>
	</div>




<div class="page_container">

</div>