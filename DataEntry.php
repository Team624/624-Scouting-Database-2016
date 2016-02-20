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
			<table><tr>
			<strong><h1 style="color:green">IN HONOR OF VIRAJ JOSHI</h1></strong>
					<td>Fouls</td>
				</tr>
				<tr>	
					<td>  <!--you can suck it-->
						<select>
							<option name="Tech Foul" value="0">Tech Foul</option>
							<option name="G4"value="G4">G4(RED+YELLOW CARD)</option>
							<option name="G11"value="G11">G11(YELLOW CARD)</option>
							<option name="G12"value="G12">G12(MAYBE DISABLED)</option>
							<option name="G12-1"value="G12-1">G12-1</option>
							<option name="G13"value="G13">G13</option>
							<option name="G14"value="G12-1">G14(FOUL+YELLOW CARD)</option>
							<option name="G15"value="G15">G15</option>
							<option name="G15"value="G15">G15</option>
							<option name="G16"value="G16">G16</option>
							<option name="G17"value="G17">G17(MAYBE DISABLED)</option>
							<option name="G18"value="G18">G18(MAYBE DISABLED)</option>
							<option name="G20"value="G20">G20(Tech if repeated)</option>
							<option name="G21"value="G21">G21 Tech Foul</option>
							<option name="G22"value="G22">G22(RED CARD)</option>
							<option name="G23"value="G23">G23(YELLOW CARD)</option>
							<option name="G24"value="G24">G24(YELLOW CARD,RED CARD)</option>
							<option name="G26"value="G26">G26(TECH FOUL)</option>
							<option name="G27"value="G27">G27(TECH FOUL PER BOULDER)</option>
							<option name="G33"value="G33">G33(FOUL PER BOULDER)</option>
							<option name="G34"value="G34">G34(FOUL per excess BOULDER)</option>
							<option name="G36"value="G36">G36</option>
							<option name="G37"value="G37">G37(RED CARD)</option>
							<option name="G38"value="G38">G38(FOUL PER EXTRA BOULDER)</option>
							<option name="G39"value="G39">G39(TECH FOUL per BOULDER)</option>
							<option name="G40"value="G40">G40(TECH FOUL per BOULDER)</option>
							<option name="G40-1"value="G40-1">G40-1(TECH FOUL per additonal BOULDER)</option>
							<option name="G43"value="G43">G43</option>
							<option name="G44"value="G44">G44(FOUL+YELLOW CARD)</option>
							<option name="G45"value="G45">G45(TECH FOUL per BOULDER)</option>
							<option name="T10"value="T10">T10</option>
						</select>				
					</td> 
				</tr></table>
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
			<tr><td>Auto High Scored</td><td>Auto Low Scored</td><td>Auto High Miss</td><td>Auto Low Miss</td></tr>
			
			<tr>
			<td><input type="number" name="auto_High_Scored" class="small_num"></td>
			<td><input type="number" name="auto_Low_Scored" class="small_num"></td>
			<td><input type="number" name="auto_High_Miss" class="small_num"></td>
			<td><input type="number" name="auto_Low_Miss"class="small_num"></td>
			
			
			
			</tr>
			<tr>
				<td>Auto Defenses Reached Sucess</td><td>Auto Defenses Crossed Sucess</td><td>Auto Defenses Reached Failed</td><td>Auto Defenses Crossed Failed</td>
			</tr>
			<tr>
				<td><input type="number" name="auto_Defenses_Reached_Sucess" class="small_num"></td>
				<td><input type="number" name="auto_Defenses_Crossed_Sucess" class="small_num"></td>
				<td><input type="number" name="auto_Defenses_Reached_Failed" class="small_num"></td>
				<td><input type="number" name="auto_Defenses_Crossed_Failed"class="small_num"></td>
			</tr>
			<tr>
				<td>Start Location</td><td>Start With Boulder?</td>
			</tr>
			<tr>
				<td><input type="number" name="auto_Start_Location" class="small_num"></td>
				<td><input type="checkbox" name="Auto_StartWithBoulder" class="small_num"></td>
			</tr>
			<tr>
				<td>Boulder Grab Sucess</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="Auto_Boulder_Grab?" class="small_num"></td>
			</tr>
			</table>
			
			<br>
			
			<h2>Teleop</h2>
			
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
								<td><input type="number" name="def_1_crossed" class="small_num"></td>
								<td><input type="number" name="def_2_crossed" class="small_num"></td>
								<td><input type="number" name="def_3_crossed" class="small_num"></td>
								<td><input type="number" name="def_4_crossed" class="small_num"></td>
								<td><input type="number" name="def_5_crossed" class="small_num"></td>
							</tr>
							<tr>
								<td>Defense 1 Weakened</td>
								<td>Defense 2 Weakened</td>
								<td>Defense 3 Weakened</td>
								<td>Defense 4 Weakened</td>
								<td>Defense 5 Weakened</td>
							</tr>
							<tr>
								<td><input type="number" name="def_1_weakened" class="small_num"></td>
								<td><input type="number" name="def_2_weakened" class="small_num"></td>
								<td><input type="number" name="def_3_weakened" class="small_num"></td>
								<td><input type="number" name="def_4_weakened" class="small_num"></td>
								<td><input type="number" name="def_5_weakened" class="small_num"></td>
							</tr>
							<tr>
								<td>Defense 1 Speed</td>
								<td>Defense 2 Speed</td>
								<td>Defense 3 Speed</td>
								<td>Defense 4 Speed</td>
								<td>Defense 5 Speed</td>
							</tr>
							<tr>
								<td><input type="number" name="def_1_speed" class="small_num"></td>
								<td><input type="number" name="def_2_speed" class="small_num"></td>
								<td><input type="number" name="def_3_speed" class="small_num"></td>
								<td><input type="number" name="def_4_speed" class="small_num"></td>
								<td><input type="number" name="def_5_speed" class="small_num"></td>
							</tr>
							<tr>
								<td>Defense 1 Ball?</td>
								<td>Defense 2 Ball?</td>
								<td>Defense 3 Ball?</td>
								<td>Defense 4 Ball?</td>
								<td>Defense 5 Ball?</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="def_1_ball" class="small_num"></td>
								<td><input type="checkbox" name="def_2_ball" class="small_num"></td>
								<td><input type="checkbox" name="def_3_ball" class="small_num"></td>
								<td><input type="checkbox" name="def_4_ball" class="small_num"></td>
								<td><input type="checkbox" name="def_5_ball" class="small_num"></td>
							</tr>
					
						</table>
					</td>
				</tr>
			</table>
			<h2>Shooting</h2>
			<table class="green">
				<tr>
					<td>
						<table>
							<tr>
								<td>High Goal Scored</td><td>Low Goal Scored</td><td>High Goal Missed</td><td>Low Goal Missed</td>
							</tr>
							<tr>
								<td><input type="number" name="high_Scored" class="small_num"></td><td><input type="number" name="low_Scored" class="small_num"></td><td><input type="number" name="high_Miss" class="small_num"></td><td><input type="number" name="low_Miss" class="small_num"></td>
							</tr>
							<tr>
								<td>Batter High Goal Scored</td><td>Batter Low Goal Scored</td><td>Batter High Goal Miss</td><td>Batter Low Goal Miss</td>
							</tr>
							<tr>
								<td><input type="number" name="batter_high_Scored" class="small_num"></td><td><input type="number" name="batter_low_Scored" class="small_num"></td><td><input type="number" name="batter_high_Miss" class="small_num"></td><td><input type="number" name="batter_low_Miss" class="small_num"></td>
							</tr>
							<tr>
								<td>Courtyard High Goal Scored</td><td>Courtyard Low Goal Scored</td><td>Courtyard High Goal Miss</td><td>Courtyard Low Goal Miss</td>
							</tr>
							<tr>
								<td><input type="number" name="courtyard_high_Scored" class="small_num"></td><td><input type="number" name="courtyard_low_Scored" class="small_num"></td><td><input type="number" name="courtyard_high_Miss" class="small_num"></td><td><input type="number" name="courtyard_low_Miss" class="small_num"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<h2>Climbing</h2>
			
			<table  class="green">
				<tr>
					<td>
						<table>
							<tr>
								<td>Challenge Sucess?</td><td>Scaled Sucess?</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="challenge_Sucess" class="small_num"></td><td><input type="checkbox" name="Scaled_Sucess" class="small_num"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<h2>Defense Rating</h2>
			
			<table class="green">
				<tr>
					<td>Defense Rating</td>
				</tr>
				<tr>
					<td>
						<select>
							<option name="defending_0" value="0">0% Defense</option>
							<option name="defending_25"value="25">25% Defense</option>
							<option name="defending_50"value="50">50% Defense</option>
							<option name="defending_>75"value=">75">>75% Defense</option>
						</select>
					</td>
				</tr>
			</table>
			
			<h2>Robot Issues</h2>
			<table class="green">
				<tr>
					<td>No Show</td>
					<td><input type="checkbox" name="no_show"></input></td>
				</tr>
				<tr>
					<td>Mech Fail?</td>
					<td><input type="checkbox" name="mech_fail"></input></td>
				</tr>
				<tr>
					<td>Lost Comms</td>
					<td><input type="checkbox" name="lost_comms"></input></td>
				</tr>
				<tr>
					<td>Stuck</td>
					<td><input type="checkbox" name="stuck"></input></td>
				</tr>
				<tr>
					<td>Tipped</td>
					<td><input type="checkbox" name="tipped"></input></td>
				</tr>
				<tr>
					<td>Fouls</td><td>Tech Fouls</td>
					<!--<td><input type="checkbox" name="fouls"></input></td> -->
				</tr>
				<tr>
				
					<td><input type="number" name="fouls"></input></td>
					<td><input type="number" name="tech_fouls"></input></td>
				</tr>
				
			</table>
			
			<br>
			
			<h2>Driver Data</h2>
			
			<table class="green">
				<tr>
					<td>Driving/Maneuverability</td><td>Defense/Pushing</td><td>Ball Control</td><td>Pushing</td>
				</tr>
				<tr>
					<td><input type="number" name="drive_manuverability" class="small_num"></input></td>
					<td><input type="number" name="pushing" class="small_num"></input></td>
					<td><input type="number" name="Defense_Pushing" class="small_num"></input></td>
					<td><input type="number" name="Ball_Control" class="small_num"></input></td>
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
	$query = "INSERT INTO match_data (match_number,team_number,scout_id,def_type_1,def_type_2,def_type_3,def_type_4,def_type_5,def_1,def_2,def_3,def_4,def_5,ball_shot,balls_scored,no_show,tipped,lost_comms,mech_fail,drive_rating,notes) VALUES ('$matchNum','$teamNum','$scoutID','$def_type_1','$def_type_2','$def_type_3','$def_type_4','$def_type_5','$def_1','$def_2','$def_3','$def_4','$def_5','$ball_shot','$balls_scored','$no_show','$tipped','$lost_comm','$mech_fail','$drive_man','$notes')";
	$result = $mysqli->query($query);
	//$query = "INSERT INTO note_entry (selectteam,notes) VALUES ('$teamNum','$notes')";
	//$result = $mysqli->query($query);
	//$query = "INSERT INTO match_data (match_number,team_number,scout_id,no_show,mech_fail,lost_comms,fouls,tech_fouls,drive_rating) VALUES ('$matchNum','$teamNum','$scoutID','$no_show','$mech_fail','$lost_comm','$ball_shot','$balls_scored','$drive_man')";
	//$result = $mysqli->query($query);
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
</div>
