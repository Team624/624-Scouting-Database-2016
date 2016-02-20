<?php
//Setup
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("api_connect.php");
include("db_connect.php");

?>
<br><br>
<br><br>
<div class="title">
	<h1>Website setup</h1>
</div>
<div class="page_container">
	<div>
		<div class="setupdiv">
		
			Put Some way of editing scouts here(or not supposedly)
			
		</div>
	</div>
	<div>
		<div class="setupdiv">
	Put in event code:
	<form class="loadData" method="post">
	<input type="text" name="eventCode"><br><br>
	<input type="submit" value="Load Team List!" class="subButton" name="loadTeam"><br><br>
	<input type="submit" value="Load Match Schedule!" class="subButton" name="loadSchedule">
	</form>
<?php

if(isset($_POST['loadTeam'])){
	if(!empty($_POST['eventCode'])){
$eventCode = $_POST['eventCode'];
if(strcasecmp($eventCode,"TXHO")==0){
	$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXHO&state=state";
	$response = file_get_contents($url,false,$context);
	$json = json_decode($response, true);
//var_dump($json[teams]);
//echo json_encode($json[teams], JSON_PRETTY_PRINT);
$query = "TRUNCATE TABLE teams";
$result = $mysqli->query($query);
		foreach ($json[teams] as $team)
		{	
			//var_dump($team);
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query2 = "INSERT INTO teams (number,name) VALUES ('$teamNumber','$teamName')";
				$result2 = $mysqli->query($query2);
		}

}
else if(strcasecmp($eventCode,"TXSA")==0){
	$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=TXSA&state=state";
	$response = file_get_contents($url,false,$context);
	$json = json_decode($response, true);
//var_dump($json[teams]);
//echo json_encode($json[teams], JSON_PRETTY_PRINT);
$query = "TRUNCATE TABLE teams";
$result = $mysqli->query($query);
		foreach ($json[teams] as $team)
		{	
			//var_dump($team);
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query2 = "INSERT INTO teams (number,name) VALUES ('$teamNumber','$teamName')";
				$result2 = $mysqli->query($query2);
		}
}
else if(strcasecmp($eventCode,"ALHU")==0){
	$url = "https://frc-api.firstinspires.org/v2.0/2016/teams?eventCode=ALHU&state=state";
	$response = file_get_contents($url,false,$context);
	$json = json_decode($response, true);
//var_dump($json[teams]);
//echo json_encode($json[teams], JSON_PRETTY_PRINT);
$query = "TRUNCATE TABLE teams";
$result = $mysqli->query($query);
		foreach ($json[teams] as $team)
		{	
			//var_dump($team);
				$teamName = $team["nameShort"];
				$teamNumber = $team["teamNumber"];
			
				
				$query2 = "INSERT INTO teams (number,name) VALUES ('$teamNumber','$teamName')";
				$result2 = $mysqli->query($query2);
		}
}
else {
	echo "Sorry";
}


	}
}
?>
			
	
<?php
if(isset($_POST['loadSchedule'])){
	if(!empty($_POST['eventCode'])){
$eventCode = $_POST['eventCode'];
if(strcasecmp($eventCode,"TXHO")==0){
	$url = "https://frc-api.firstinspires.org/v2.0/2015/schedule/TXHO?tournamentLevel=qual";
	$response = file_get_contents($url,false,$context);
	$json = json_decode($response, true);
$query = "TRUNCATE TABLE schedule";
$result = $mysqli->query($query);
 //var_dump($json);
//echo json_encode($json, JSON_PRETTY_PRINT);
		foreach ($json as $schedule)
		{	
		//var_dump($schedule);
		
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
						
						$query2 = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
						$result2 = $mysqli->query($query2);
						//$query3 = "SET FOREIGN_KEY_CHECKS=1";
						//$result3 = $mysqli->query($query3);
			}
		}
}
else if(strcasecmp($eventCode,"TXSA")==0){
	$url = "https://frc-api.firstinspires.org/v2.0/2015/schedule/TXSA?tournamentLevel=qual";
	$response = file_get_contents($url,false,$context);
	$json = json_decode($response, true);
$query = "TRUNCATE TABLE schedule";
$result = $mysqli->query($query);
//$query = "SET FOREIGN_KEY_CHECKS=1";
//$result = $mysqli->query($query);
 //var_dump($json);
//echo json_encode($json, JSON_PRETTY_PRINT);
		foreach ($json as $schedule)
		{	
		//var_dump($schedule);
		
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
						
						$query2 = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
						$result2 = $mysqli->query($query2);
						//$query3 = "SET FOREIGN_KEY_CHECKS=1";
						//$result3 = $mysqli->query($query3);
			}
		} 
}
else if(strcasecmp($eventCode,"ALHU")==0){
$url = "https://frc-api.firstinspires.org/v2.0/2016/schedule/ALHU?tournamentLevel=qual";
$response = file_get_contents($url,false,$context);
$json = json_decode($response, true);
$query = "TRUNCATE TABLE schedule";
$result = $mysqli->query($query);
//$query = "SET FOREIGN_KEY_CHECKS=1";
//$result = $mysqli->query($query);
 //var_dump($json);
//echo json_encode($json, JSON_PRETTY_PRINT);
		foreach ($json as $schedule)
		{	
		//var_dump($schedule);
		
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
						
						$query2 = "INSERT INTO schedule (match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3) VALUES ('$matchNumba','$time','$Red1','$Red2','$Red3','$Blue1','$Blue2','$Blue3')";
						$result2 = $mysqli->query($query2);
						//$query3 = "SET FOREIGN_KEY_CHECKS=1";
						//$result3 = $mysqli->query($query3);
					}
				} 
			}
else{
	echo"Sorry Snoop";
		}
	}
}					
						
?>		
				
</div>
	</div>
	<div>
		<div class="setupdiv">
			Type in Obliteration Password:
			
	<form class="obliterate" method="post">
	<input type="password" name="obliteratePassword"><br><br>
	<input type="submit" value="Obliterate Data!" class="ObliterateButton" name="obliterateData">
    </form>
		<?php 
	if(isset($_POST['obliterateData'])){
		if(!empty($_POST['obliteratePassword'])){
			$obliterationPassword = $_POST['obliteratePassword'];
			if(strcmp($obliterationPassword,"ALLIDOISWIN!")==0){
				
				//$query4 = "SET FOREIGN_KEY_CHECKS=0";
				//$result4 = $mysqli->query($query4);
				$query5 = "TRUNCATE TABLE teams";
				$result5 = $mysqli->query($query5);
				$query6 = "TRUNCATE TABLE schedule";
				$result6 = $mysqli->query($query6);
				//$query7 = "SET FOREIGN_KEY_CHECKS=1";
				//$result7 = $mysqli->query($query7);
			}
			else{
				echo "Nope!";
				
			}
		}
	}
	?>
		</div>
	</div>
</div>
