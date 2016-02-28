<?php
	//Match Display
	//Search for Teams and Matches
	include("HeadTemplate.php");
	include("UserVerification.php");
	include("kick_intruders.php");
	include("navbar.php");
	include("db_connect.php");
	include("api_connect.php");
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
	
	$query3 = "SELECT * FROM match_data WHERE match_number = '$match' AND team_number = '$red1'";
	$result3 = $mysqli->query($query3);
	
	if ($result3->num_rows > 0){
			?>
			<?php 
			// output data of each row
    while($row1 = $result2->fetch_assoc()) {
		
		while($row2 = $result3->fetch_assoc()) {
			?>
		<?php 
	$query4 = "SELECT * FROM teams WHERE number='$red2'";
	$result4 = $mysqli->query($query4);
	
	if ($result2->num_rows > 0){
	
	$query5 = "SELECT * FROM match_data WHERE match_number = '$match' AND team_number = '$red2'";
	$result5 = $mysqli->query($query5);
	
	if ($result5->num_rows > 0){
			?>
			<?php 
			// output data of each row
    while($row3 = $result4->fetch_assoc()) {
		
		while($row4 = $result5->fetch_assoc()) {
			?>
			<?php 
	$query6 = "SELECT * FROM teams WHERE number='$red3'";
	$result6 = $mysqli->query($query6);
	
	if ($result6->num_rows > 0){
	
	$query7 = "SELECT * FROM match_data WHERE match_number = '$match' AND team_number = '$red3'";
	$result7 = $mysqli->query($query7);
	
	if ($result7->num_rows > 0){
			?>
			<?php 
			// output data of each row
    while($row5 = $result6->fetch_assoc()) {
		
		while($row6 = $result7->fetch_assoc()) {
			?>
			<?php 
	$query8 = "SELECT * FROM teams WHERE number='$blue1'";
	$result8 = $mysqli->query($query8);
	
	if ($result8->num_rows > 0){
	
	$query9 = "SELECT * FROM match_data WHERE match_number = '$match' AND team_number = '$blue1'";
	$result9 = $mysqli->query($query9);
	
	if ($result9->num_rows > 0){
			?>
			<?php 
			// output data of each row
    while($row7 = $result8->fetch_assoc()) {
		
		while($row8 = $result9->fetch_assoc()) {
			?>
			<?php 
	$query10 = "SELECT * FROM teams WHERE number='$blue2'";
	$result10 = $mysqli->query($query10);
	
	if ($result10->num_rows > 0){
	
	$query11 = "SELECT * FROM match_data WHERE match_number = '$match' AND team_number = '$blue2'";
	$result11 = $mysqli->query($query11);
	
	if ($result11->num_rows > 0){
			?>
			<?php 
			// output data of each row
    while($row9 = $result10->fetch_assoc()) {
		
		while($row10 = $result11->fetch_assoc()) {
			?>
			<?php 
	$query12 = "SELECT * FROM teams WHERE number='$blue3'";
	$result12 = $mysqli->query($query12);
	
	if ($result12->num_rows > 0){
	
	$query13 = "SELECT * FROM match_data WHERE match_number = '$match' AND team_number = '$blue3'";
	$result13 = $mysqli->query($query13);
	
	if ($result13->num_rows > 0){
			?>
			<?php 
			// output data of each row
    while($row11 = $result12->fetch_assoc()) {
		
		while($row12 = $result13->fetch_assoc()) {
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
			<th class="topTime" rowspan = "1" colspan = "21">Defense</th>
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
			<th class='topTime'rowspan = "1" colspan = "4">
			<?php 
			$def_category_2=$row2["def_category_2"]; 
			if($def_category_2==1){echo "Portcullis";}
			elseif($def_category_2==2){echo "Cheval de Frise";}
			elseif($def_category_2==3){echo "Moat";}
			elseif($def_category_2==4){echo "Ramparts";}
			elseif($def_category_2==5){echo "Drawbridge";}
			elseif($def_category_2==6){echo "Sally Port";}
			elseif($def_category_2==7){echo "Rock Wall";}
			elseif($def_category_2==8){echo "Rough Terrain";}
			else{echo "Defense 2";}
			?>
			</th>
			<th class='topTime'rowspan = "1" colspan = "4">
			<?php 
			$def_category_3=$row2["def_category_3"]; 
			if($def_category_3==1){echo "Portcullis";}
			elseif($def_category_3==2){echo "Cheval de Frise";}
			elseif($def_category_3==3){echo "Moat";}
			elseif($def_category_3==4){echo "Ramparts";}
			elseif($def_category_3==5){echo "Drawbridge";}
			elseif($def_category_3==6){echo "Sally Port";}
			elseif($def_category_3==7){echo "Rock Wall";}
			elseif($def_category_3==8){echo "Rough Terrain";}
			else{echo "Defense 3";}
			?>
			</th>
			<th class='topTime'rowspan = "1" colspan = "4">
			<?php 
			$def_category_4=$row2["def_category_4"]; 
			if($def_category_4==1){echo "Portcullis";}
			elseif($def_category_4==2){echo "Cheval de Frise";}
			elseif($def_category_4==3){echo "Moat";}
			elseif($def_category_4==4){echo "Ramparts";}
			elseif($def_category_4==5){echo "Drawbridge";}
			elseif($def_category_4==6){echo "Sally Port";}
			elseif($def_category_4==7){echo "Rock Wall";}
			elseif($def_category_4==8){echo "Rough Terrain";}
			else{echo "Defense 4";}
			?>
			</th>
			<th class='topTime'rowspan = "1" colspan = "4">
			<?php 
			$def_category_5=$row2["def_category_5"]; 
			if($def_category_5==1){echo "Portcullis";}
			elseif($def_category_5==2){echo "Cheval de Frise";}
			elseif($def_category_5==3){echo "Moat";}
			elseif($def_category_5==4){echo "Ramparts";}
			elseif($def_category_5==5){echo "Drawbridge";}
			elseif($def_category_5==6){echo "Sally Port";}
			elseif($def_category_5==7){echo "Rock Wall";}
			elseif($def_category_5==8){echo "Rough Terrain";}
			else{echo "Defense 5";}
			?>
			</th>
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
		<!--Defense 1-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 2-->	
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 3-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 4-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 5-->
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
			<thead>
			<tr class="topRow">
			<!--Basic Data-->
			<th class="topTime"rowspan = "2" colspan = "1">Alliance</th>
			<th class='topTime'rowspan = "2" colspan = "1">Team Number</th>
			<th class="topTime"rowspan = "2" colspan = "1">Name</th>
			<!--Auto-->
			<th class="topTime" rowspan = "2" colspan = "1">High Goal%</th>
			<th class="topTime" rowspan = "2" colspan = "1">Low Goal%</th>
			<th class="topTime" rowspan = "2" colspan = "1">Reached</th>
			<th class="topTime" rowspan = "2" colspan = "1">Crossed</th>
			<!--Teleop Shooting-->
			<th class="topTime" rowspan = "2" colspan = "1">High Goal%</th>
			<th class="topTime" rowspan = "2" colspan = "1">Low Goal%</th>
			<!--Defense-->
			<th class='topTime'rowspan = "1" colspan = "4">Lowbar</th>
			<th class='topTime'rowspan = "1" colspan = "4">
			<?php 
			$def_category_2_2=$row8["def_category_2"]; 
			if($def_category_2_2==1){echo "Portcullis";}
			elseif($def_category_2_2==2){echo "Cheval de Frise";}
			elseif($def_category_2_2==3){echo "Moat";}
			elseif($def_category_2_2==4){echo "Ramparts";}
			elseif($def_category_2_2==5){echo "Drawbridge";}
			elseif($def_category_2_2==6){echo "Sally Port";}
			elseif($def_category_2_2==7){echo "Rock Wall";}
			elseif($def_category_2_2==8){echo "Rough Terrain";}
			else{echo "Defense 2";}
			?>
			</th>
			<th class='topTime'rowspan = "1" colspan = "4">Defense 3</th>
			<th class='topTime'rowspan = "1" colspan = "4">Defense 4</th>
			<th class='topTime'rowspan = "1" colspan = "4">Defense 5</th>
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
		<!--Defense 1-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 2-->	
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 3-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 4-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		<!--Defense 5-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Stuck</th>
		<th class='topTime'>Ball?</th>
		</tr>
			</thead>
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
		}
	}
		?>
<?php
				}
			}		
		}
	}
		?>
<?php
				}
			}		
		}
	}
		?>
<?php
				}
			}		
		}
	}
		?>
<?php
				}
			}		
		}
	}
		?>
<?php
				}
			}		
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