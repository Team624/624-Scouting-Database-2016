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
	<link rel="stylesheet" type="text/css" href="css/NoteEntryStyle.css">w
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
	
	$query = "SELECT * FROM match_data";
	$result = $mysqli->query($query);
	
	if ($result1->num_rows > 0) {
		?>
		<?php 
		// output data of each row
    while($row = $result1->fetch_assoc()) {
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
			<th class="topTime" rowspan = "1" colspan = "28">Defense</th>
			<th class="topTime" rowspan = "1" colspan = "2">Climbing</th>
			<th class="topTime" rowspan = "1" colspan = "7">Robot Issues</th>
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
			<th class='topTime'rowspan = "1" colspan = "3">Lowbar</th>
			<th class='topTime'rowspan = "1" colspan = "3">Portcullis</th>
			<th class='topTime'rowspan = "1" colspan = "3">Cheval de Frise</th>
			<th class='topTime'rowspan = "1" colspan = "3">Moat</th>
			<th class='topTime'rowspan = "1" colspan = "3">Ramparts</th>
			<th class='topTime'rowspan = "1" colspan = "3">Drawbridge</th>
			<th class='topTime'rowspan = "1" colspan = "3">Sally Port</th>
			<th class='topTime'rowspan = "1" colspan = "3">Rock Wall</th>
			<th class='topTime'rowspan = "1" colspan = "3">Rough Terrain</th>
			<th class='topTime'rowspan = "2" colspan = "1">Defense Rating</th>
			<!--Climbing-->
			<th class='topTime'rowspan = "2" colspan = "1">Challenge Sucess?</th>
			<th class='topTime'rowspan = "2" colspan = "1">Scaled Sucess?</th>
			<!--Robot Issues-->
			<th class='topTime'rowspan = "2" colspan = "1">No Show</th>
			<th class='topTime'rowspan = "2" colspan = "1">Mech Fail</th>
			<th class='topTime'rowspan = "2" colspan = "1">Lost Comms</th>
			<th class='topTime'rowspan = "2" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "2" colspan = "1">Tipped</th>
			<th class='topTime'rowspan = "2" colspan = "1">Fouls</th>
			<th class='topTime'rowspan = "2" colspan = "1">Tech Fouls</th>
	</tr>
	<tr>
		<!--Lowbar-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Portcullis-->	
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Cheval de Frise-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Moat-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Ramparts-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Drawbridge-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Sally Port-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Rock Wall-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
		<!--Rough Terrain-->
		<th class='topTime'>Crossed</th>
		<th class='topTime'>Speed</th>
		<th class='topTime'>Ball?</th>
	</tr>
		</thead>
			<tr class="topRow">
			<th class="TopRed">Red1</th>
			<th class='red'><?php echo $red1=$row["red_1"];?></td>
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
			<th class='red'><?php echo $row1["name"];?></td>
			<th class='red'><?php //echo $row2["name"];?></td>
		<?php
				}
			}		
		}
	}
		?>
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red2</th>
			<th class='red'><?php echo $red2=$row["red_2"];?></td>
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
			<th class='red'><?php echo $row3["name"];?></td>
			<th class='red'><?php //echo $row4["name"];?></td>
		<?php
				}
			}		
		}
	}
		?>
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red3</th>
			<th class='red'><?php echo $red3=$row["red_3"];?></td>
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
			<th class='red'><?php echo $row5["name"];?></td>
			<th class='red'><?php //echo $row6["name"];?></td>
		<?php
				}
			}		
		}
	}
		?>
			</tr> 
			<tr class="topRow">
			<th class="TopBlue">Blue1</th>
			<th class='blue'><?php echo $blue1=$row["blue_1"];?></td>
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
			<th class='red'><?php echo $row7["name"];?></td>
			<th class='red'><?php //echo $row8["name"];?></td>
		<?php
				}
			}		
		}
	}
		?>
			</tr>
			<tr class="topRow">
			<th class="TopBlue">Blue2</th>
			<th class='blue'><?php echo $blue2=$row["blue_2"];?></td>
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
			<th class='red'><?php echo $row9["name"];?></td>
			<th class='red'><?php //echo $row10["name"];?></td>
		<?php
				}
			}		
		}
	}
		?>
			</tr>
			<tr class="topRow">
			<th class="TopBlue">Blue3</th>
			<th class='blue'><?php echo $blue3=$row["blue_3"];?></td>
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
			<th class='red'><?php echo $row11["name"];?></td>
			<th class='red'><?php //echo $row12["name"];?></td>
		<?php
				}
			}		
		}
	}
		?>
			</tr>
	</table>
</div>	
	<?php
    }
	
}
	$result2=mysqli_query($mysqli,"SELECT * FROM match_data WHERE match_number='$match'");
	if ($result2->num_rows > 0) {
		?>
    <table class="Schedule-table" >
		<tr>
			<th>Match Number</th>
			<th>Team Number</th>
			<th>Scout ID</th>
			<th>No Show</th>
			<th>Mech Fail</th>
			<th>Lost Comms</th>
			<th>Fouls</th>
			<th>Tech Fouls</th>
			<th>Drive Rating</th>
		</tr>
	<?php
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        echo "<tr>
		<td>".$row1["match_number"]."</td>
		<td>".$row1["team_number"]."</td>
		<td>".$row1["scout_id"]."</td>
		<td>".$row1["no_show"]."</td>
		<td>".$row1["mech_fail"]."</td>
		<td>".$row1["lost_comms"]."</td>
		<td>".$row1["fouls"]."</td>
		<td>".$row1["tech_fouls"]."</td>
		<td>".$row1["drive_rating"]."</td>
		</tr>";
    }
    echo "</table>";
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