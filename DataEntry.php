<?php
//Make the Data Entry Form
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("db_connect.php");
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
					<td><input type="number" name="def_type_1" class="small_num"></td>
					<td><input type="number" name="def_type_2" class="small_num"></td>
					<td><input type="number" name="def_type_3" class="small_num"></td>
					<td><input type="number" name="def_type_4" class="small_num"></td>
					<td><input type="number" name="def_type_5" class="small_num"></td>
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
						<table>
							<tr>
								<td>Defense 1 Crosses</td>
								<td>Defense 2 Crosses</td>
								<td>Defense 3 Crosses</td>
								<td>Defense 4 Crosses</td>
								<td>Defense 5 Crosses</td>
							</tr>
							<tr>
								<td><input type="number" name="def_1" class="small_num"></td>
								<td><input type="number" name="def_2" class="small_num"></td>
								<td><input type="number" name="def_3" class="small_num"></td>
								<td><input type="number" name="def_4" class="small_num"></td>
								<td><input type="number" name="def_5" class="small_num"></td>
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
			<input type="submit" class="subButton" name="dataSubmit"></input>
		</form>
	</div>
	<?php
	if(isset($_POST['dataSubmit'])){
	$matchNum=$_POST['match_num'];
	$teamNum=$_POST['team_num'];
	$scoutID=$_POST['scoutID'];
	$def_type_1=$_POST['def_type_1'];
	$def_type_2=$_POST['def_type_2'];
	$def_type_3=$_POST['def_type_3'];
	$def_type_4=$_POST['def_type_4'];
	$def_type_5=$_POST['def_type_5'];
	$def_1=$_POST['def_1'];
	$def_2=$_POST['def_2'];
	$def_3=$_POST['def_3'];
	$def_4=$_POST['def_4'];
	$def_5=$_POST['def_5'];
	$ball_shot=$_POST['ball_shot'];
	$balls_scored=$_POST['balls_scored'];
	if($_POST['no_show']== "on"){$no_show=1;}
	if($_POST['tipped']== "on"){$tipped=1;}
	if($_POST['lost_comm']== "on"){$lost_comm=1;}
	if($_POST['mech_fail']== "on"){$mech_fail=1;}
	$drive_man=$_POST['drive_man'];
	$notes=$_POST['notes'];
	//$fields = array($matchNum,$teamNum,$def_type_1,$def_type_2,$def_type_3,$def_type_4,$def_type_5,$drive_man,$notes);
	//foreach($fields as $fieldname){
	//if(!empty($fieldname)){
	//$query = "INSERT INTO match_data (match_number,team_number,scout_id,def_type_1,def_type_2,def_type_3,def_type_4,def_type_5,def_1,def_2,def_3,def_4,def_5,ball_shot,balls_scored,no_show,tipped,lost_comm,mech_fail,drive_rating,notes) VALUES ('$matchNum','$teamNum','$scoutID','$def_type_1','$def_type_2','$def_type_3','$def_type_4','$def_type_5','$def_1','$def_2','$def_3','$def_4','$def_5','$ball_shot','$balls_scored','$no_show','$tipped','$lost_comm','$mech_fail','$drive_man','$notes')";
	//$result = $mysqli->query($query);
	//$query = "INSERT INTO note_entry (selectteam,notes) VALUES ('$teamNum','$notes')";
	//$result = $mysqli->query($query);
	$query = "INSERT INTO match_data (match_number,team_number,scout_id,no_show,mech_fail,lost_comms,fouls,tech_fouls,drive_rating) VALUES ('$matchNum','$teamNum','$scoutID','$no_show','$mech_fail','$lost_comm','$ball_shot','$balls_scored','$drive_man')";
	$result = $mysqli->query($query);
	if($result) {
	echo"Successfully added info";	
	}
	else {
	echo"NOPE!";	
	}
	//}	
	//}	
	}
	?>
</div>