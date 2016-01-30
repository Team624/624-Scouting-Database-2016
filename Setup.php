<?php
//Setup
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
include("db_connect.php");
	$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXHO&state=state";
	//$url="https://frc-api.firstinspires.org/v2.0/2016/schedule/TXHO?tournamentLevel=qual";
	//$url="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";
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
	<br><br>Update: Not broken anymore!
	<table class = "rankingsTable" >
		<tbody>
		<pre>
<?php
 $json = json_decode($response, true);
 //$teamlist= $json[teams];
 //$json = json_decode($response, false);
//var_dump($response);
//var_dump($json[teams]);
/*echo*/ //echo $complete_data=json_encode($teamlist, JSON_PRETTY_PRINT);
//$string_to_replace=",\"teamCountTotal\":64,\"teamCountPage\":64,\"pageCurrent\":1,\"pageTotal\":1";

//echo $jsonNew = str_replace( $string_to_replace,"",$complete_data);
//echo $jsonNew;
		//echo $string_to_replace="],\"teamCountTotal\":64,\"teamCountPage\":64,\"pageCurrent\":1,\"pageTotal\":1}";
		foreach ($json[teams] as $team)
		{	
			//foreach ($i as $team)
			//{ 
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (teamNumber,teamName) VALUES ('$teamNumber','$teamName')";
				$result = $mysqli->query($query);
				
?>
			<tr>
				<td><?php echo $teamName; ?></td> 
				<td><?php echo $teamNumber; ?></td>
				
			</tr>
			<?php
				//}
			
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
