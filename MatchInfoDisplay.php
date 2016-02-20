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
	<link rel="stylesheet" type="text/css" href="css/DataCoverageStyle.css"> 
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
	
	<h1> Qualification Match <?php echo $match; ?> </h1>
	<?php
	mysqli_select_db($mysqli,$dbname);
	$result1=mysqli_query($mysqli,"SELECT * FROM schedule WHERE match_number='$match'");
	if ($result1->num_rows > 0) {
		?>
    <table class="matchTable">
		<tr class="topRow">
			<th class="topTime">startTime</th>
			<th id="oneline" class="topMatch">matchNumber</th>
			<th class="TopRed">Red1</th>
			<th class="TopRed">Red2</th>
			<th class="TopRed">Red3</th>
			<th class="TopBlue">Blue1</th>
			<th class="TopBlue">Blue2</th>
			<th class="TopBlue">Blue3</th>
		</tr>
	<?php
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        echo "<tr><td class='tim'>".$row1["time"]."</td><td class='match'>".$row1["match_number"]."</td><td class='red'>".$row1["red_1"]."</td><td class='red'>".$row1["red_2"]."</td><td class='red'>".$row1["red_3"]."</td><td class='blue'>".$row1["blue_1"]."</td><td class='blue'>".$row1["blue_2"]."</td><td class='blue'>".$row1["blue_3"]."</td></tr>";
    }
    echo "</table>";
}
	$result2=mysqli_query($mysqli,"SELECT * from match_data WHERE match_number='$match'");
	if ($result2->num_rows > 0) {
		?>
    <table class="Schedule-table" ><tr><th>Match Number</th><th>Team Number</th><th>Scout ID</th><th>No Show</th><th>Mech Fail</th><th>Lost Comms</th><th>Fouls</th><th>Tech Fouls</th><th>Drive Rating</th></tr>
	<?php
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        echo "<tr><td>".$row1["match_number"]."</td><td>".$row1["team_number"]."</td><td>".$row1["scout_id"]."</td><td>".$row1["no_show"]."</td><td>".$row1["mech_fail"]."</td><td>".$row1["lost_comms"]."</td><td>".$row1["fouls"]."</td><td>".$row1["tech_fouls"]."</td><td>".$row1["drive_rating"]."</td></tr>";
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