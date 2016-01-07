<?php
//Make the Data Entry Form
include("HeadTemplate.php");
include("UserVerification.php");
include("navbar.php");
?>
<head>	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css"> 
		<link rel="stylesheet" type="text/css" href="css/dataform.css">
</head>
<br>
<br>
<br>
<br>
<br>
<div class="page_container">
	<form class="datafield">
		Name:<br>
		<input type = "text" name = "username">
		<br>
		Team #:<br>
		<input type="text" name="teamName">
		<br>
	</form>
</div>