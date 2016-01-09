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
<br>
<br>
<br>
<div class = "title" >
	<h1> Rankings </h1>
</div>

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
				<table class = "rankingsTable">
					<tr> 
						<th>Rank</th>
						<td><?php echo $roast; ?></td> 
					</tr>
					<tr> 
						<td><?php echo $teamNumber; ?></td>
					</tr>
					<tr>
						<td><?php echo $qualAverage; ?></td> 
					</tr>
					<tr> 
						<td><?php echo $autoPoints; ?></td> 
					</tr>
					<tr> <td><?php echo $containerPoints; ?></td> </tr>
					<tr> <td><?php echo $coopertitionPoints; ?></td> </tr>
					<tr> <td><?php echo $litterPoints; ?></td> </tr>
					<tr> <td><?php echo $totePoints; ?></td> </tr>
					<tr> <td><?php echo $wins; ?></td> </tr>
					<tr> <td><?php echo $losses; ?></td> </tr>
					<tr> <td><?php echo $ties; ?></td> </tr>
					<tr> <td><?php echo $dq; ?></td> </tr>
					<tr> <td><?php echo $matchesPlayed; ?></td> </tr>
					</table>
					<?php
			}
		}
	?>




<div class="page_container">
	<?php 	
		var_dump($response); //This prints a nice red string
	?>
</div>