<?php
	//Team Display
	//Search for Teams and Matches
	include("HeadTemplate.php");
	include("UserVerification.php");
	include("kick_intruders.php");
	include("navbar.php");
	include("db_connect.php");
	
	include("api_connect.php");
?>

<head>
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css">
	<link rel="stylesheet" type="text/css" href="css/SearchStyle.css"> 
</head>

<?php
	$team = $_GET['team'];
?>
<div class="page_container">
<br>
<br>
<br>
<br>
<form class="Searchforsearch" method="get" action="TeamInfoDisplay.php">
	<input type="number" name="team">
	<input type="submit" value="Search" class="subButton">
</form>

<br>

	<h1><?php echo "Team " . $team; ?></h1>
	
	<?php
	include("db_connect.php");
	mysqli_select_db($mysqli,$dbname);

	$result=mysqli_query($mysqli,"SELECT * from teams WHERE number='$team'");
	
	if ($result->num_rows > 0) {
		?>
    <table id="TeamRankings" ><tr><th>Team Number</th><th>Name</th><th>Qualification Average</th><th>Auto Points</th><th>Container Points</th><th>Coopertition Points</th><th>Litter Points</th><th>Tote Points</th><th>Wins</th><th>Losses</th><th>Ties</th></tr>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["number"]."</td><td>".$row["name"]."</td></tr>";
    }
    echo "</table>";
} $result2=mysqli_query($mysqli,"SELECT * from match_data WHERE number='$team'");
if ($result2->num_rows > 0) {
		?>
    <table id="TeamRankings" ><tr><th>Match Number</th>th>Team Number</th><th>Scout ID</th><th>No Show</th><th>Mech Fail</th><th>Lost Comms</th><th>Fouls</th><th>Tech Fouls</th><th>Drive Rating</th></</tr>
	<?php
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        echo "<tr><td>".$row1["match_number"]."</td><td>".$row1["team_number"]."</td><td>".$row1["scout_id"]."</td><td>".$row1["no_show"]."</td><td>".$row1["mech_fail"]."</td><td>".$row1["lost_comms"]."</td><td>".$row1["fouls"]."</td><td>".$row1["tech_fouls"]."</td><td>".$row1["drive_rating"]."</td></tr>";
    }
    echo "</table>";
}

 

?>	
</div>