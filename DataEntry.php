<?php
//Make the Data Entry Form
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
?>
<head>	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css"> 
		<link rel="stylesheet" type="text/css" href="css/dataform.css">
</head>
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
			<table class="green">
				<tr>
					<td></td>
					<td>Match #</td>
					<td>Team #</td>
					<td>Scout ID</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="number" name="match_num" class="small_num"></td>
					<td><input type="number" name="team_num" class="small_num"></td>
					<td><input type="number" name="scoutID" class="small_num"></td>
				</tr>
				<tr>
					<td>Defense 1</td>
					<td>Defense 2</td>
					<td>Defense 3</td>
					<td>Defense 4</td>
					<td>Defense 5</td>
				</tr>
				<tr>
					<td><input type="text" name="def_type_1" class="small_num"></td>
					<td><input type="text" name="def_type_2" class="small_num"></td>
					<td><input type="text" name="def_type_3" class="small_num"></td>
					<td><input type="text" name="def_type_4" class="small_num"></td>
					<td><input type="text" name="def_type_5" class="small_num"></td>
				</tr>
			</table>
			
			<br>
			
			<h2>Autonomous</h2>
			<table class="green">
				<td>Autonomous stuff will go here one day!!!</td>
			</table>
			
			<br>
			
			<h2>Teleop</h2>
			<div class="green">
			<table class="green">
				<tr>
					<td>
						<table class="">
							<tr>
								<td></td>
								<td>Defense 1</td>
								<td>Defense 2</td>
								<td>Defense 3</td>
								<td>Defense 4</td>
								<td>Defense 5</td>
							</tr>
							<tr>
								<td>Category</td>
								<td><input type="number" name="def_1" class="small_num"></td>
								<td><input type="number" name="def_2" class="small_num"></td>
								<td><input type="number" name="def_3" class="small_num"></td>
								<td><input type="number" name="def_4" class="small_num"></td>
								<td><input type="number" name="def_5" class="small_num"></td>
							</tr>
							<tr>
								<td>Crossed</td>
								<td><input type="number" name="def_1" class="small_num"></td>
								<td><input type="number" name="def_2" class="small_num"></td>
								<td><input type="number" name="def_3" class="small_num"></td>
								<td><input type="number" name="def_4" class="small_num"></td>
								<td><input type="number" name="def_5" class="small_num"></td>
							</tr>
							<tr>
								<td>Weakened</td>
								<td><input type="number" name="def_1" class="small_num"></td>
								<td><input type="number" name="def_2" class="small_num"></td>
								<td><input type="number" name="def_3" class="small_num"></td>
								<td><input type="number" name="def_4" class="small_num"></td>
								<td><input type="number" name="def_5" class="small_num"></td>
							</tr>
							<tr>
								<td>Speed</td>
								<td><input type="number" name="def_1" class="small_num"></td>
								<td><input type="number" name="def_2" class="small_num"></td>
								<td><input type="number" name="def_3" class="small_num"></td>
								<td><input type="number" name="def_4" class="small_num"></td>
								<td><input type="number" name="def_5" class="small_num"></td>
							</tr>
							<tr>
								<td>Ball (Y/N)</td>
								<td><input type="checkbox" name="def_1" class="small_num"></td>
								<td><input type="checkbox" name="def_2" class="small_num"></td>
								<td><input type="checkbox" name="def_3" class="small_num"></td>
								<td><input type="checkbox" name="def_4" class="small_num"></td>
								<td><input type="checkbox" name="def_5" class="small_num"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td>Balls Shot:</td><td><input type="number" name="ball_shot" class="small_num"></td>
							</tr>
							<tr>
								<td>Balls Scored</td><td><input type="number" name="balls_scored" class="small_num"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</div>
			
			<h2>Robot Issues</h2>
			<table class="green">
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
			<table class="green">
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