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
	mysqli_select_db($mysqli,"mynewdatabase3");

	$result=mysqli_query($mysqli,"SELECT * from teamatevents2 WHERE teamNumber='$team'");
	
	if ($result->num_rows > 0) {
		?>
    <table id="TeamRankings" ><tr><th>Team Number</th><th>Rank</th><th id="oneline">Qualification Average</th><th>Auto Points</th><th>Container Points</th><th>Coopertition Points</th><th>Litter Points</th><th>Tote Points</th><th>Wins</th><th>Losses</th><th>Ties</th></tr>
	<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["teamNumber"]."</td><td>".$row["rank"]."</td><td>".$row["qualAverage"]."</td><td>".$row["autoPoints"]."</td><td>".$row["containerPoints"]."</td><td>".$row["coopertitionPoints"]."</td><td>".$row["litterPoints"]."</td>
		<td>".$row["totePoints"]."</td><td>".$row["wins"]."</td><td>".$row["losses"]."</td><td>".$row["ties"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

 

?>	
</div>