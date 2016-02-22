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
	if ($result1->num_rows > 0) {
		?>
		<?php 
		// output data of each row
    while($row1 = $result1->fetch_assoc()) {
		?>
	<h1> Qualification Match <?php echo $match; ?> </h1>
    <table class="matchTable">
			<tr class="topRow">
			<th class="topTime">startTime</th>
			<td class='tim'><?php echo $row1["time"];?></td>
			<th class="topTime" rowspan = "1" colspan = "4">Auto</th>
			<th class="topTime" rowspan = "1" colspan = "31">Teleop Shooting</th>
			<th class="topTime" rowspan = "1" colspan = "1">Defense</th>
			<th class="topTime" rowspan = "1" colspan = "2">Climbing</th>
			<th class="topTime" rowspan = "1" colspan = "7">Robot Issues</th>
			</tr>
			<tr class="topRow">
			<th id="oneline" class="topMatch"rowspan = "1" colspan = "1">Alliance</th>
			<th class='topTime'rowspan = "1" colspan = "1">Team Number</th>
			<th class='topTime'rowspan = "1" colspan = "1">High%</th>
			<th class='topTime'rowspan = "1" colspan = "1">Low%</th>
			<th class='topTime'rowspan = "1" colspan = "1">Reached</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "3">Lowbar</th>
			<th class='topTime'rowspan = "1" colspan = "3">Portcullis</th>
			<th class='topTime'rowspan = "1" colspan = "3">Cheval de Frise</th>
			<th class='topTime'rowspan = "1" colspan = "3">Moat</th>
			<th class='topTime'rowspan = "1" colspan = "3">Ramparts</th>
			<th class='topTime'rowspan = "1" colspan = "3">Drawbridge</th>
			<th class='topTime'rowspan = "1" colspan = "3">Sally Port</th>
			<th class='topTime'rowspan = "1" colspan = "3">Rock Wall</th>
			<th class='topTime'rowspan = "1" colspan = "3">Rough Terrain</th>
			<th class='topTime'>Batter High%</th>
			<th class='topTime'>Batter Low%</th>
			<th class='topTime'>Courtyard High%</th>
			<th class='topTime'>Courtyard Low%</th>
			<th class='topTime'>Defense</th>
			<th class='topTime'>Challenge Sucess?</th>
			<th class='topTime'>Scaled Sucess?</th>
			<th class='topTime'>No Show</th>
			<th class='topTime'>Mech Fail</th>
			<th class='topTime'>Lost Comms</th>
			<th class='topTime'>Stuck</th>
			<th class='topTime'>Tipped</th>
			<th class='topTime'>Fouls</th>
			<th class='topTime'>Tech Fouls</th>
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red1</th>
			<td class='red'><?php echo $row1["red_1"];?></td>
		
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red2</th>
			<td class='red'><?php echo $row1["red_2"];?></td>
			</tr>
			<tr class="topRow">
			<th class="TopRed">Red3</th>
			<td class='red'><?php echo $row1["red_3"];?></td>
			</tr> 
			<tr class="topRow">
			<th class="TopBlue">Blue1</th>
			<td class='blue'><?php echo $row1["blue_1"];?></td>
			</tr>
			<tr class="topRow">
			<th class="TopBlue">Blue2</th>
			<td class='blue'><?php echo $row1["blue_2"];?></td>
			</tr>
			<tr class="topRow">
			<th class="TopBlue">Blue3</th>
			<td class='blue'><?php echo $row1["blue_3"];?></td>
			</tr>
	</table>
	
	<?php
    }
}
	$result2=mysqli_query($mysqli,"SELECT * FROM match_data WHERE match_number='$match'");
	if ($result2->num_rows > 0) {
		?>
    <table class="Schedule-table" ><tr><th>Match Number</th><th>Team Number</th><th>Scout ID</th><th>No Show</th><th>Mech Fail</th><th>Lost Comms</th><th>Fouls</th><th>Tech Fouls</th><th>Drive Rating</th></tr>
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