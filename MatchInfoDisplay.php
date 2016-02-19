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
	$isPlayoff = $_GET['level'] == "on";
	
	if(!$isPlayoff)
	{
		
?>
	
	<h1> Qualification Match <?php echo $match; ?> </h1>
	<?php
	mysqli_select_db($mysqli,$dbname);
	$result1=mysqli_query($mysqli,"SELECT * FROM schedule WHERE match_number='$match'");
	if ($result1->num_rows > 0) {
		?>
    <table id="TeamRankings" ><tr><th>startTime</th><th id="oneline">matchNumber</th><th>Red1</th><th>Red2</th><th>Red3</th><th>Blue1</th><th>Blue2</th><th>Blue3</th></tr>
	<?php
    // output data of each row
    while($row1 = $result1->fetch_assoc()) {
        echo "<tr><td>".$row1["time"]."</td><td>".$row1["match_number"]."</td><td>".$row1["red_1"]."</td><td>".$row1["red_2"]."</td><td>".$row1["red_3"]."</td><td>".$row1["blue_1"]."</td><td>".$row1["blue_2"]."</td><td>".$row1["blue_3"]."</td></tr>";
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