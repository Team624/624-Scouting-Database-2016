<?php
//Note Entry
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
?>
<head>	
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css">
	<link rel="stylesheet" type="text/css" href="css/NoteEntryStyle.css"> 
</head>
<br>
<br>
<br>
<br>
<div class="title">
	<h1>Note Entry</h1>
</div>
<div class="page_container">
<form class="NoteEntry" method="post">

<span class="teamsearch">Search For Da Team:</span><input type="number" name="selectteam">
<br>
<br>
<br>
<textarea rows="7" cols="50" name="notes">
Type notes in here!
</textarea>
<br>
<br>
<input type="submit" value="Enter!" class="subButton" name="submitnotes">
</form>
</div>
<?php
if(isset($_POST['submitnotes'])){
if(!empty($_POST['selectteam']) && !empty($_POST['notes'])) {
	$teamselect=$_POST['selectteam'];
	$notes=$_POST['notes'];	
	$con=mysqli_connect('localhost','username','password','databasename','portnumba') or die(mysqli_error());
	
}
}
?>
