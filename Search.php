<?php
//Search for Teams and Matches
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("db_connect.php");
?>
<head>
	<link rel="stylesheet" type="text/css" href="css/NoteEntryStyle.css">
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css">
	<link rel="stylesheet" type="text/css" href="css/SearchStyle.css"> 
</head>
<br>
<br>
<br>
<br>
<div class = "title">
	<h1> Search for Teams and Matches </h1>
</div>
<div class="page_container">
<form class="Searchforsearch" method="post">
<br>
<span class="teamsearch">Search Fo:</span><select name="dropdown">
  <option value="teams" name="choseteam">Teams</option>
  <option value="matches" name="chosematch">Matches</option>
 </select>&nbsp;&nbsp;&nbsp;<input type="number" name="number">
<br>
<br>
<br>
<input type="submit" value="Enter!" class="subButton" name="searchsubmit">
</form>
</div>
<?php
if(isset($_POST['searchsubmit'])){
if(($_POST['dropdown'] =='teams') && !empty($_POST['number'])) {
	echo"BLAZE IT!";
	$teamnumber=$_POST['number'];
	$query = //"INSERT INTO note_entry (selectteam,notes) VALUES ('$teamselect','$notes')";
	$result = $mysqli->query($query);
	if($result) {
	echo"Successfully blazed it";	
	}
	else {
	echo"NyyyOPE!";	
	}
}elseif(($_POST['dropdown'] == 'matches') && !empty($_POST['number'])) {
	echo"@ mo blae";
	$matchnumber=$_POST['number'];
	$query = //"INSERT INTO note_entry (selectteam,notes) VALUES ('$teamselect','$notes')";
	$result = $mysqli->query($query);
	if($result) {
	echo"Successfully blazed it";	
	}
	else {
	echo"NOPE!";	
	}
	
} else{
	echo"Nothin";
}
}
?>
