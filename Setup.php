<?php
//Setup
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
include("db_connect.php");
$eventcode=$_POST['eventCode'];
	//these are team list urls, might add conditional statements for them later
	if(isset($_POST['loadteams'])&&($eventCode='TXHO')){
		
		$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXHO&state=state";
		$response = file_get_contents($url,false,$context);
	}
	elseif(isset($_POST['loadteams'])&&($eventCode='ALHU')){
		$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=ALHU&state=state";
		$response = file_get_contents($url,false,$context);
	}
	elseif(isset($_POST['loadteams'])&&($eventCode='TXSA')){
		$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXSA&state=state";
		$response = file_get_contents($url,false,$context);
	}
	
	
	if(isset($_POST['loadmatches'])&&($eventCode='TXHO')){
			$url4="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";
			$response4 = file_get_contents($url4,false,$context);
	
	}
	elseif(isset($_POST['loadmatches'])&&($eventCode='ALHU')){
		$url4="https://frc-api.firstinspires.org/v2.0/2015/schedule/ALHU?tournamentLevel=qual";
			$response4 = file_get_contents($url4,false,$context);
	}
	elseif(isset($_POST['loadmatches'])&&($eventCode='TXSA')){
		$url4="https://frc-api.firstinspires.org/v2.0/2015/schedule/TXSA?tournamentLevel=qual";
		$response4 = file_get_contents($url4,false,$context);
	}

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
			<input type="submit" name='eventCode'>Type the eventCode(TXHO,ALHU,TXSA)</input>
			<br>
			<button type="Button" name ='loadteams'>Load Teams from <?php echo $eventcode?></button>
			<button type="Button" name ='loadmatches'>Load Matches<?php echo $eventcode?></button>
	<br><br>Update:Can now load and update the teams list from all the regionals we are going to.
		</div>
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

	
	<table class = "rankingsTable" >
		<tbody>
		<pre>
<?php
 $json4 = json_decode($response4, true);
$query="TRUNCATE TABLE schedule";
$result=$mysqli->query($query);
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
		
						
						$matchNumber = $match["matchNumber"];
						$time = $match["startTime"];
						
						$Red1 = $red1Teams["teamNumber"];
						$Red2 = $red2Teams["teamNumber"];
						$Red3 = $red3Teams["teamNumber"];
						$Blue1 = $blue1Teams["teamNumber"];
						$Blue2 = $blue2Teams["teamNumber"];
						$Blue3 = $blue3Teams["teamNumber"];
						
						$query = "INSERT INTO matchschedule (matchNumber,startTime,Red1,Red2,Red3,Blue1,Blue2,Blue3) VALUES ('$matchNumber','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
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
