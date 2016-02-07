<?php
//Setup
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
include("db_connect.php");
$eventcode="2015";
	//these are team list urls, might add conditional statements for them later
	$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXHO&state=state";
	$url2 = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXSA&state=state";
	$url3 = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=ALHU&state=state";
	//these are match schedule urls, might add conditional statements for them later
	$url4="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";
	$url5="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXSA?tournamentLevel=qual";
	$url6="https://frc-api.firstinspires.org/v2.0/2016/schedule/ALHU?tournamentLevel=qual";
	//responses for team list urls, might add conditional statements for them later
	$response = file_get_contents($url,false,$context);
	$response2 = file_get_contents($url2,false,$context);
	$response3 = file_get_contents($url3,false,$context);
	//responses for match schedule urls, might add conditional statements for them later
	$response4 = file_get_contents($url4,false,$context);
	$response5 = file_get_contents($url5,false,$context);
	$response6 = file_get_contents($url6,false,$context);
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
//echo json_encode($json[teams], JSON_PRETTY_PRINT);
		foreach ($json[teams] as $team)
		{	
			//var_dump($team);
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (number,name) VALUES ('$teamNumber','$teamName')";
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
 $json2 = json_decode($response2, true);
//var_dump($json[teams]);
		foreach ($json2[teams] as $team)
		{	
			
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (number,name) VALUES ('$teamNumber','$teamName')";
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
 $json3 = json_decode($response3, true);
//var_dump($json[teams]);
		foreach ($json3[teams] as $team)
		{	
			
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query = "INSERT INTO teams (number,name) VALUES ('$teamNumber','$teamName')";
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
	
	<table class = "rankingsTable" >
		<tbody>
		<pre>
<?php
 $json4 = json_decode($response4, true);

 //var_dump($json4);
//echo json_encode($json4, JSON_PRETTY_PRINT);
		foreach ($json4 as $schedule)
		{	
		//var_dump($schedule);
		//5 arrays=5 variables!I think? Needs to be narrowed down into one array 
		foreach ($schedule as $match)
		{ $alliances = $match["Teams"];
		//var_dump($alliances);
		$red1Teams=  $alliances[0];
		$red2Teams=  $alliances[1];
		$red3Teams=  $alliances[2];
		$blue1Teams= $alliances[3];
		$blue2Teams= $alliances[4];
		$blue3Teams= $alliances[5];
		
						
						$matchNumba = $match["matchNumber"];
						$time = $match["startTime"];
						
						$Red1 = $red1Teams["teamNumber"];
						$Red2 = $red2Teams["teamNumber"];
						$Red3 = $red3Teams["teamNumber"];
						$Blue1 = $blue1Teams["teamNumber"];
						$Blue2 = $blue2Teams["teamNumber"];
						$Blue3 = $blue3Teams["teamNumber"];
						//needs to still be able to update database info, just a few MySQL command tweaks will work.
						$query = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
						$result = $mysqli->query($query);
						
?>		
					<tr>
						<td><?php echo $matchNumba; ?></td>
						<td><?php echo $time; ?></td>
						<td><?php echo $Red1; ?></td> 
						<td><?php echo $Red2; ?></td>
						<td><?php echo $Red3; ?></td> 
						<td><?php echo $Blue1; ?></td>
						<td><?php echo $Blue2; ?></td> 
						<td><?php echo $Blue3; ?></td>
					</tr>
					
					<?php
				
		}
	}
				
				?>
				
	</pre>
	</tbody>
	</table>
	
	<table class = "rankingsTable" >
		<tbody>
		<pre>
<?php
 $json5 = json_decode($response5, true);
//var_dump($json[teams]);
foreach ($json5 as $schedule)
		{	
		//var_dump($schedule);
		//5 arrays=5 variables!I think? Needs to be narrowed down into one array 
		foreach ($schedule as $match)
		{ $alliances = $match["Teams"];
		//var_dump($alliances);
		$red1Teams=  $alliances[0];
		$red2Teams=  $alliances[1];
		$red3Teams=  $alliances[2];
		$blue1Teams= $alliances[3];
		$blue2Teams= $alliances[4];
		$blue3Teams= $alliances[5];
		
						
						$matchNumba = $match["matchNumber"];
						$time = $match["startTime"];
						
						$Red1 = $red1Teams["teamNumber"];
						$Red2 = $red2Teams["teamNumber"];
						$Red3 = $red3Teams["teamNumber"];
						$Blue1 = $blue1Teams["teamNumber"];
						$Blue2 = $blue2Teams["teamNumber"];
						$Blue3 = $blue3Teams["teamNumber"];
						
						$query = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
						$result = $mysqli->query($query);
						
?>		
					<tr>
						<td><?php echo $matchNumba; ?></td>
						<td><?php echo $time; ?></td>
						<td><?php echo $Red1; ?></td> 
						<td><?php echo $Red2; ?></td>
						<td><?php echo $Red3; ?></td> 
						<td><?php echo $Blue1; ?></td>
						<td><?php echo $Blue2; ?></td> 
						<td><?php echo $Blue3; ?></td>
					</tr>
					
					<?php
				
		}
	}
				
				?>
					
	</pre>
	</tbody>
	</table>
	
	<!--<table class = "rankingsTable" >
		<tbody>
		<pre>-->
<?php
 $json6 = json_decode($response6, true);
//var_dump($json[teams]);
		foreach ($json6 as $schedule)
		{	
		//var_dump($schedule);
		//5 arrays=5 variables!I think? Needs to be narrowed down into one array 
		foreach ($schedule as $match)
		{ $alliances = $match["Teams"];
		//var_dump($alliances);
		$red1Teams=  $alliances[0];
		$red2Teams=  $alliances[1];
		$red3Teams=  $alliances[2];
		$blue1Teams= $alliances[3];
		$blue2Teams= $alliances[4];
		$blue3Teams= $alliances[5];
		
						
						$matchNumba = $match["matchNumber"];
						$time = $match["startTime"];
						
						$Red1 = $red1Teams["teamNumber"];
						$Red2 = $red2Teams["teamNumber"];
						$Red3 = $red3Teams["teamNumber"];
						$Blue1 = $blue1Teams["teamNumber"];
						$Blue2 = $blue2Teams["teamNumber"];
						$Blue3 = $blue3Teams["teamNumber"];
						
						$query = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
						$result = $mysqli->query($query);
						
?>		
					<!--<tr>
						<td><?php echo $matchNumba; ?></td>
						<td><?php echo $time; ?></td>
						<td><?php echo $Red1; ?></td> 
						<td><?php echo $Red2; ?></td>
						<td><?php echo $Red3; ?></td> 
						<td><?php echo $Blue1; ?></td>
						<td><?php echo $Blue2; ?></td> 
						<td><?php echo $Blue3; ?></td>
					</tr>-->
					
					<?php
				
		}
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
