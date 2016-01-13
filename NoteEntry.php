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
<p>Search For Da Team</p>
<input type="number" name="selectteam">
<br>
<br>
<br>
<textarea rows="5" cols="30">
Type notes in here!
</textarea>
<br>
<br>
<input type="submit" value="Enter!">
</form>
</div>
