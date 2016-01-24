<?php
//Setup
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
	//$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXHO&state=state";
	//$url="https://frc-api.firstinspires.org/v2.0/2016/schedule/TXHO?tournamentLevel=qual";
	$url="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";
	$response = file_get_contents($url,false,$context);
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
	Update:Already can put teams into the database, need to add code for inserting match data into da database
	<table class = "rankingsTable" >
		<tbody>
		<pre>
<?php
$json = json_decode($response, true);
//var_dump($response);
//echo json_encode($json, JSON_PRETTY_PRINT);
		foreach ($json as $somevariable)
		{	if(isset($somevariable)){
			foreach ($somevariable as $team)
			{ 
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
				include("db_connect.php");
				
				$query = "INSERT INTO teams (teamNumber,teamName) VALUES ('$teamNumber','$teamName')";
				$result = $mysqli->query($query);
				
?>
			<tr>
				<td><?php echo $teamName; ?></td> 
				<td><?php echo $teamNumber; ?></td>
				
			</tr>
			<?php
				}
			}
		}
	?>
	</pre>
	</tbody>
	</table>
		</div>
	</div>
	<div>
		<div class="setupdiv">
			Put Delete Data (Password Confirm) DIV Here
		</div>
	</div>
</div>
