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
<div class="title">
	<h1>Data Entry</h1>
</div>
<div class="page_container">
	<div class="form_container">
		<form class="datafield">
			<table class="red">
				<tr>
					<td>Match #</td>
					<td>Team #</td>
					<td>Scout ID</td>
				</tr>
				<tr>
					<td><input type="number" name="match_num" class="small_num"></td>
					<td><input type="number" name="team_num" class="small_num"></td>
					<td><input type="number" name="scoutID" class="small_num"></td>
				</tr>
			</table>
			<br>
			<table class="blue">
				<tr>
					<td>Notes:</td>
				</tr>
				<tr>
					<td><textarea rows=5 cols=20></textarea></td>
				</tr>
			</table>
			<br>
			<input type="submit" class="subButton"></input>
		</form>
	</div>
</div>