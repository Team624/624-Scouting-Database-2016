<?php
//Setup
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
include("db_connect.php");
	$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXHO&state=state";
	$url2 = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXSA&state=state";
	$url3 = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=ALHU&state=state";
	//$url="https://frc-api.firstinspires.org/v2.0/2016/schedule/TXHO?tournamentLevel=qual";
	//$url="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";
	$response = file_get_contents($url,false,$context);
	$response2 = file_get_contents($url2,false,$context);
	$response3 = file_get_contents($url3,false,$context);
?>
<br><br>
<br><br>
<div class="title">
	<h1>Website setup</h1>
</div>
<div class="page_container">
	<div>
		<div class="setupdiv">
		
			Put Some way of editing scouts here
			
		</div>
	</div>
	<div>
		<div class="setupdiv">
			Put Data Loading DIV Here
	<br><br>Update:Can now load and update the teams list from all the regionals we are going to.
	<!--<table class = "rankingsTable" >
		<tbody>
		<pre>-->
<?php
 $json = json_decode($response, true);
//var_dump($json[teams]);
		foreach ($json[teams] as $team)
		{	
			
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (teamNumber,teamName) VALUES ('$teamNumber','$teamName')";
				$result = $mysqli->query($query);
				
?>
			<!--<tr>
				<td><?php echo $teamName; ?></td> 
				<td><?php echo $teamNumber; ?></td>
				
			</tr>-->
			<?php
				
			
		}
	?>
	<!--</pre>
	</tbody>
	</table>-->
	
	<!--<table class = "rankingsTable" >
		<tbody>
		<pre>-->
<?php
 $json2 = json_decode($response2, true);
//var_dump($json[teams]);
		foreach ($json2[teams] as $team)
		{	
			
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (teamNumber,teamName) VALUES ('$teamNumber','$teamName')";
				$result = $mysqli->query($query);
				
?>
			<!--<tr>
				<td><?php echo $teamName; ?></td> 
				<td><?php echo $teamNumber; ?></td>
				
			</tr>-->
			<?php
				
			
		}
	?>
	<!--</pre>
	</tbody>
	</table>
	
	<table class = "rankingsTable" >
		<tbody>
		<pre>-->
<?php
 $json3 = json_decode($response3, true);
//var_dump($json[teams]);
		foreach ($json3[teams] as $team)
		{	
			
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (teamNumber,teamName) VALUES ('$teamNumber','$teamName')";
				$result = $mysqli->query($query);
				
?>
			<!--<tr>
				<td><?php echo $teamName; ?></td> 
				<td><?php echo $teamNumber; ?></td>
				
			</tr>-->
			<?php
				
			
		}
	?>
	<!--</pre>
	</tbody>
	</table>-->
		</div>
	</div>
	<div>
		<div class="setupdiv">
			Put Delete Data (Password Confirm) DIV Here
		</div>
	</div>
</div>
