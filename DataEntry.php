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
		<form class="datafield" method="post">
		
			<h2>Basic Data</h2>
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
			
			<h2>Autonomous</h2>
			<table class="blue">
				<td>Autonomous stuff will go here one day!!!</td>
			</table>
			
			<br>
			
			<h2>Teleop</h2>
			<table class="green">
				<td>Teleop stuff will go here one day!!!</td>
			</table>
			
			<h2>Robot Issues</h2>
			<table class="red">
				<tr>
					<td>No Show</td>
					<td><input type="checkbox" name="no_show"></input></td>
				</tr>
					<td>Tipped Over</td>
					<td><input type="checkbox" name="tipped"></input></td>
				</tr>
					<td>Lost Comms</td>
					<td><input type="checkbox" name="lost_comm"></input></td>
				</tr>
					<td>Mechanical Failure</td>
					<td><input type="checkbox" name="mech_fail"></input></td>
				</tr>
			</table>
			
			<br>
			
			<h2>Driver Data</h2>
			<table class="green">
				<tr>
					<td>Driving/Maneuverability</td>
				</tr>
				<tr>
					<td><input type="number" name="drive_man" class="small_num"></input></td>
				</tr>
			</table>
			
			<br>
			
			<h2>Comments</h2>
			<table class="blue">
				<tr>
					<td>Notes:</td>
				</tr>
				<tr>
					<td><textarea rows=5 cols=30 name="notes"></textarea></td>
				</tr>
			</table>
			<br>
			<input type="submit" class="subButton"></input>
		</form>
	</div>
</div>