<?php
	//Match Display
	//Search for Teams and Matches
	include("HeadTemplate.php");
	include("UserVerification.php");
	include("kick_intruders.php");
	include("navbar.php");
	include("db_connect.php");
	include("api_connect.php");
	include("GetTeamData.php");
?>

<head>
	<link rel="stylesheet" type="text/css" href="css/NoteEntryStyle.css">
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css">
	<link rel="stylesheet" type="text/css" href="css/SearchStyle.css"> 
</head>
<div class="page_container">
<br>
<br>
<form class="Searchforsearch" method="get" action="MatchInfoDisplay.php">
<br>
	<input type="number" name="match">
	<input type="checkbox" name="playoffs" style="width:30px;padding-top:10px"> <span style="color:#FFF">Playoffs?</span>
<br>
<br>
<input type="submit" value="Search" class="subButton">
</form>
<br>
<br>
<?php
	$match = $_GET['match'];
	$isPlayoff = $_GET['playoffs'] == "on";
	
	if(!$isPlayoff)
	{
		
?>
	<?php
	mysqli_select_db($mysqli,$dbname);
	$result1=mysqli_query($mysqli,"SELECT * FROM schedule WHERE match_number='$match'");
	
	if ($result1->num_rows > 0) {
		
		?>
		<?php 
		// output data of each row
    while($row = $result1->fetch_assoc()) {
		$red1=$row["red_1"];
		$red2=$row["red_2"];
		$red3=$row["red_3"];
		$blue1=$row["blue_1"];
		$blue2=$row["blue_2"];
		$blue3=$row["blue_3"];
		?>
		<?php 
	$query2 = "SELECT * FROM teams WHERE number='$red1'";
	$result2 = $mysqli->query($query2);
	
	if ($result2->num_rows > 0){
	// output data of each row
    while($row1 = $result2->fetch_assoc()) {
			?>
		<?php 
	$query4 = "SELECT * FROM teams WHERE number='$red2'";
	$result4 = $mysqli->query($query4);
	
	if ($result4->num_rows > 0){
	// output data of each row
    while($row3 = $result4->fetch_assoc()) {
			?>
			<?php 
	$query6 = "SELECT * FROM teams WHERE number='$red3'";
	$result6 = $mysqli->query($query6);
	
	if ($result6->num_rows > 0){
	// output data of each row
    while($row5 = $result6->fetch_assoc()) {
			?>
			<?php 
	$query8 = "SELECT * FROM teams WHERE number='$blue1'";
	$result8 = $mysqli->query($query8);
	
	if ($result8->num_rows > 0){
	// output data of each row
    while($row7 = $result8->fetch_assoc()) {
			?>
			<?php 
	$query10 = "SELECT * FROM teams WHERE number='$blue2'";
	$result10 = $mysqli->query($query10);
	
	if ($result10->num_rows > 0){
	// output data of each row
    while($row9 = $result10->fetch_assoc()) {
			?>
			<?php 
	$query12 = "SELECT * FROM teams WHERE number='$blue3'";
	$result12 = $mysqli->query($query12);
	
	if ($result12->num_rows > 0){
	// output data of each row
    while($row11 = $result12->fetch_assoc()) {
			?>
			<?php
			$red1Info[] = getTeamData($mysqli,$red1);
			var_dump($red1Info);
			?>
	<h1> Qualification Match <?php echo $match; ?> </h1>
	
<div class="matchDisplay">
    <table class="matchTable">
	<thead>
			<tr class="topRow">
			<th class="topTime">startTime</th>
			<td class='tim'><?php echo $row["time"];?></td>
			<th class="topTime" rowspan = "3" colspan = "1">Name</th>
			<th class="topTime" rowspan = "1" colspan = "4">Auto</th>
			<th class="topTime" rowspan = "1" colspan = "2">Teleop Shooting</th>
			<th class="topTime" rowspan = "1" colspan = "37">Defense</th>
			<th class="topTime" rowspan = "1" colspan = "2">Climbing</th>
			<th class="topTime" rowspan = "1" colspan = "6">Robot Issues</th>
			</tr>
			<tr class="topRow">
			<th id="oneline" class="topTime"rowspan = "2" colspan = "1">Alliance</th>
			<th class='topTime'rowspan = "2" colspan = "1">Team Number</th>
			<!--Auto-->
			<th class='topTime'rowspan = "2" colspan = "1">High Goal%</th>
			<th class='topTime'rowspan = "2" colspan = "1">Low Goal%</th>
			<th class='topTime'rowspan = "2" colspan = "1">Reached</th>
			<th class='topTime'rowspan = "2" colspan = "1">Crossed</th>
			<!--Teleop/Shooting-->
			<th class='topTime'rowspan = "2" colspan = "1">High Goal%</th>
			<th class='topTime'rowspan = "2" colspan = "1">Low Goal%</th>
			<!--Defense-->
			<th class='topTime'rowspan = "1" colspan = "4">Lowbar</th>
			<th class='topTime'rowspan = "1" colspan = "4">Portcullis</th>
			<th class='topTime'rowspan = "1" colspan = "4">Cheval de Frise</th>
			<th class='topTime'rowspan = "1" colspan = "4">Moat</th>
			<th class='topTime'rowspan = "1" colspan = "4">Ramparts</th>
			<th class='topTime'rowspan = "1" colspan = "4">Drawbridge</th>
			<th class='topTime'rowspan = "1" colspan = "4">Sally Port</th>
			<th class='topTime'rowspan = "1" colspan = "4">Rock Wall</th>
			<th class='topTime'rowspan = "1" colspan = "4">Rough Terrain</th>
			<th class='topTime'rowspan = "2" colspan = "1">Defense Rating</th>
			<!--Climbing-->
			<th class='topTime'rowspan = "2" colspan = "1">Challenge Sucess?</th>
			<th class='topTime'rowspan = "2" colspan = "1">Scaled Sucess?</th>
			<!--Robot Issues-->
			<th class='topTime'rowspan = "2" colspan = "1">No Show</th>
			<th class='topTime'rowspan = "2" colspan = "1">Mech Fail</th>
			<th class='topTime'rowspan = "2" colspan = "1">Lost Comms</th>
			<th class='topTime'rowspan = "2" colspan = "1">Tipped</th>
			<th class='topTime'rowspan = "2" colspan = "1">Fouls</th>
			<th class='topTime'rowspan = "2" colspan = "1">Tech Fouls</th>
	</tr>
	<tr>
		<!--Lowbar-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Portcullis-->	
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Cheval de Frise-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Moat-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Ramparts-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Drawbridge-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Sally Port-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Rock Wall-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Rough Terrain-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		
	</tr>
		</thead>
			<tr class="topRow">
			<th class="TopRed">Red1</th>
			<th class='red'><?php echo $red1;?></th>
			<th class='red'><?php echo $row1["name"];?></th>
			<th class='red'>
			<?php $auto_High_Scored=$row2["auto_High_Scored"];
				 $auto_High_Miss=$row2["auto_High_Miss"];
				 $totalattempts=$auto_High_Scored+$auto_High_Miss;
				  if($totalattempts==0){echo 0;}
				else{echo $auto_Low_Scored/$totalattempts*100;}	
			?>
			</th>
			<th class='red'>
			<?php $auto_Low_Scored=$row2["auto_Low_Scored"];
				 $auto_Low_Miss=$row2["auto_Low_Miss"];
				 $totalattempts1=$auto_Low_Scored+$auto_Low_Miss;
				 if($totalattempts1==0){echo 0;}
				else{echo $auto_Low_Scored/$totalattempts1*100;}
			?>
			</th>
			<th class='red'><?php echo $row2["auto_Defenses_Reached_Sucess"];?></th>
			<th class='red'><?php echo $row2["auto_Defenses_Crossed_Sucess"];?></th>
			<th class='red'>
			<?php 
				$batter_high_Scored=$row2["batter_high_Scored"];
				$courtyard_high_Scored=$row2["courtyard_high_Scored"];
				$batter_high_Miss=$row2["batter_high_Miss"];
				$courtyard_high_Miss=$row2["courtyard_high_Miss"];
				$scored=$batter_high_Scored+$courtyard_high_Scored;
				$totalattempts2=$batter_high_Scored+$courtyard_high_Scored+$batter_high_Miss+$courtyard_high_Miss;
				 if($totalattempts2==0){echo 0;}
				else{
				$highGoalPercent=$scored/$totalattempts2*100;
				echo round($highGoalPercent,0);
				}
			?>
			</th>
			<th class='red'>
			<?php 
				$batter_low_Scored=$row2["batter_low_Scored"];
				$courtyard_low_Scored=$row2["courtyard_low_Scored"];
				$batter_low_Miss=$row2["batter_low_Miss"];
				$courtyard_low_Miss=$row2["courtyard_low_Miss"];
				$scored1=$batter_low_Scored+$courtyard_low_Scored;
				$totalattempts3=$courtyard_low_Scored+$batter_low_Scored+$batter_low_Miss+$courtyard_low_Miss;
				if($totalattempts3==0){echo 0;}
				else{
				$highGoalPercent=$scored1/$totalattempts3*100;
				echo round($lowGoalPercent,0);
				}
				
			?>
			</th>
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red2</th>
			<th class='red'><?php echo $red2;?></th>
			<th class='red'><?php echo $row3["name"];?></th>
			<th class='red'><?php //echo $row4["name"];?></th>
		
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red3</th>
			<th class='red'><?php echo $red3;?></th>
			
			<th class='red'><?php echo $row5["name"];?></th>
			<th class='red'><?php //echo $row6["name"];?></th>
		
			</tr> 
			<tr class="topRow">
			<th class="TopBlue">Blue1</th>
			<th class='blue'><?php echo $blue1;?></th>
			
			<th class='blue'><?php echo $row7["name"];?></th>
			<th class='blue'><?php //echo $row8["name"];?></th>
		
			</tr>
			<tr class="topRow">
			<th class="TopBlue">Blue2</th>
			<th class='blue'><?php echo $blue2;?></th>
			
			<th class='blue'><?php echo $row9["name"];?></th>
			<th class='blue'><?php //echo $row10["name"];?></th>
		
			</tr>
			<tr class="topRow">
			<th class="TopBlue">Blue3</th>
			<th class='blue'><?php echo $blue3;?></th>
			
			<th class='blue'><?php echo $row11["name"];?></th>
			<th class='blue'><?php //echo $row12["name"];?></th>
		
			</tr>
	</table>
</div>	
<?php
				
					
		}
	}
		?>
<?php
				
					
		}
	}
		?>
<?php
				
					
		}
	}
		?>
<?php
				
					
		}
	}
		?>
<?php
				
					
		}
	}
		?>
<?php
				
					
		}
	}
		?>
	<?php
    }
	
}
	?>
    
<?php
	}
	else
	{
?>
	<h1> Elimination Match <?php echo $match; ?> </h1>
<?php
	}
?>
<div>