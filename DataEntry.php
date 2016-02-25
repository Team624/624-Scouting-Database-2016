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
			<!--<table><tr>
			<strong><h1 style="color:green">IN HONOR OF VIRAJ JOSHI</h1></strong>
					<td>Fouls(This dropdown isn't actually going to get entered into the database)</td>
				</tr>
				<tr>	
					<td>  you can suck it
					
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
				</tr></table>-->	
			
			<table class="green">
			<h2 class="DataTitle">Basic Data</h2>
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
					<td>Lowbar</td>
					<!--<td>
						<select name="def_category_2">
							<option name="def_category_A1"value="1">Portcullis</option>
							<option name="def_category_A2"value="2">Cheval de Frise</option>
							<option name="def_category_B1"value="3">Moat</option>
							<option name="def_category_B2"value="4">Ramparts</option>
							<option name="def_category_C1"value="5">Drawbridge</option>
							<option name="def_category_C2"value="6">Sally Port</option>
							<option name="def_category_D1"value="7">Rock Wall</option>
							<option name="def_category_D2"value="8">Rough Terrain</option>
						</select>
					</td>-->
					<td><input type="number" name="def_category_2" class="small_num"></td>
					<td><input type="number" name="def_category_3" class="small_num"></td>
					<td><input type="number" name="def_category_4" class="small_num"></td>
					<td><input type="number" name="def_category_5" class="small_num"></td>
					
				</tr>
			</table>
			
			<br>
			
			
			<table class="green">
			<h2 class="DataTitle">Autonomous</h2>
			<tr>
				<td></td>
				<td>Auto High</td>
				<td>Auto Low</td>
			</tr>
			<tr>
				<td>Scored</td>
				<td><input type="number" name="auto_High_Scored" class="small_num"></td>
				<td><input type="number" name="auto_Low_Scored" class="small_num"></td>
			</tr>
			<tr>
				<td>Miss</td>
				<td><input type="number" name="auto_High_Miss" class="small_num"></td>
				<td><input type="number" name="auto_Low_Miss"class="small_num"></td>
			</tr>
			<tr>
				<td></td>
				<td>Auto Defenses Reached</td>
				<td>Auto Defenses Crossed</td>
			</tr>
			<tr>
				<td>Sucess</td>
				<td><input type="number" name="auto_Defenses_Reached_Sucess" class="small_num"></td>
				<td><input type="number" name="auto_Defenses_Crossed_Sucess" class="small_num"></td>
			</tr>
			<tr>
				<td>Failed</td>
				<td><input type="number" name="auto_Defenses_Reached_Failed" class="small_num"></td>
				<td><input type="number" name="auto_Defenses_Crossed_Failed"class="small_num"></td>
			</tr>
			<tr>
				<td></td>
				<td>Start Location</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="number" name="auto_Start_Location" class="small_num"></td>
				
			</tr>
			<tr>
				<td></td>
				<td>Boulder Grab Sucess?</td>
				<td>Start With Boulder?</td>
			</tr>
			<tr>
				<td></td> 
				<td><input type="checkbox" name="Auto_Boulder_Grab" class="small_num"></td>
				<td><input type="checkbox" name="Auto_StartWithBoulder" class="small_num"></td>
			</tr>
			</table>
			
			<br>
			
			<table class="green">
			<h2 class="DataTitle">Teleop</h2>
				<tr>
					<td></td>
					<td>Defense 1</td>
					<td>Defense 2</td>
					<td>Defense 3</td>
					<td>Defense 4</td>
					<td>Defense 5</td>
				</tr>
				<tr>
					<td>Crossed</td>
					<td><input type="number" name="def_1_crossed" class="small_num"></td>
					<td><input type="number" name="def_2_crossed" class="small_num"></td>
					<td><input type="number" name="def_3_crossed" class="small_num"></td>
					<td><input type="number" name="def_4_crossed" class="small_num"></td>
					<td><input type="number" name="def_5_crossed" class="small_num"></td>
				</tr>
				<tr>
					<td>Weakened</td>
					<td><input type="number" name="def_1_weakened" class="small_num"></td>
					<td><input type="number" name="def_2_weakened" class="small_num"></td>
					<td><input type="number" name="def_3_weakened" class="small_num"></td>
					<td><input type="number" name="def_4_weakened" class="small_num"></td>
					<td><input type="number" name="def_5_weakened" class="small_num"></td>
				</tr>
				<tr>
					<td>Speed</td>
					<td><input type="number" name="def_1_speed" class="small_num"></td>
					<td><input type="number" name="def_2_speed" class="small_num"></td>
					<td><input type="number" name="def_3_speed" class="small_num"></td>
					<td><input type="number" name="def_4_speed" class="small_num"></td>
					<td><input type="number" name="def_5_speed" class="small_num"></td>
				</tr>
				<tr>
					<td>Stuck</td>
					<td><input type="number" name="def_1_stuck" class="small_num"></td>
					<td><input type="number" name="def_2_stuck" class="small_num"></td>
					<td><input type="number" name="def_3_stuck" class="small_num"></td>
					<td><input type="number" name="def_4_stuck" class="small_num"></td>
					<td><input type="number" name="def_5_stuck" class="small_num"></td>
				</tr>
				<tr>
					<td>Ball? (Y/N)</td>
					<td><input type="checkbox" name="def_1_ball" class="small_num"></td>
					<td><input type="checkbox" name="def_2_ball" class="small_num"></td>
					<td><input type="checkbox" name="def_3_ball" class="small_num"></td>
					<td><input type="checkbox" name="def_4_ball" class="small_num"></td>
					<td><input type="checkbox" name="def_5_ball" class="small_num"></td>
				</tr>
					
			</table>
			<br>
			</table>
			
			<table class="green">
			<h2 class="DataTitle">Shooting</h2>
				<tr>
					<td>
						<table>
								<td></td>
								<td>Batter High Goal</td>
								<td>Batter Low Goal</td>
							</tr>
							<tr>
								<td>Scored</td>
								<td><input type="number" name="batter_high_Scored" class="small_num"></td>
								<td><input type="number" name="batter_low_Scored" class="small_num"></td>
							</tr>
							<tr>
								<td>Miss</td>
								<td><input type="number" name="batter_high_Miss" class="small_num"></td>
								<td><input type="number" name="batter_low_Miss" class="small_num"></td>
							</tr>
							<tr>
								<td></td>
								<td>Courtyard High Goal</td>
								<td>Courtyard Low Goal</td>
							</tr>
							<tr>
								<td>Scored</td>
								<td><input type="number" name="courtyard_high_Scored" class="small_num"></td>
								<td><input type="number" name="courtyard_low_Scored" class="small_num"></td>
							</tr>
							<tr>
								<td>Miss</td>
								<td><input type="number" name="courtyard_high_Miss" class="small_num"></td>
								<td><input type="number" name="courtyard_low_Miss" class="small_num"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<table  class="green">
			<h2 class="DataTitle">Climbing</h2>
				<tr>
					<td>
						<table>
							<tr>
								<td>Challenge Sucess?</td><td>Scaled Sucess?</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="challenge_Sucess" class="small_num"></td>
								<td><input type="checkbox" name="Scaled_Sucess" class="small_num"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<table class="green">
			<h2 class="DataTitle">Defense Rating</h2>
				<tr>
					<td>Defense Rating</td>
				</tr>
				<tr>
					<td>
						<select name="defense">
							<option name="defending_0" value="0">0% Defense</option>
							<option name="defending_25"value="25"><25% Defense</option>
							<option name="defending_50"value="50">50% Defense</option>
							<option name="defending_>75"value="75">>75% Defense</option>
						</select>
					</td>
				</tr>
			</table>
			
			
			<table class="green">
			<h2 class="DataTitle">Robot Issues</h2>
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
			
			<table class="green">
			<h2 class="DataTitle">Driver Data</h2>
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
			
			
			<table class="green">
			<h2 class="DataTitle">Comments</h2>
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
	//Basic Data	
	$matchNum=(int)$_POST['match_num'];
	$teamNum=(int)$_POST['team_num'];
	$scoutID=(int)$_POST['scoutID'];
	
	$def_category_2=(int)$_POST['def_category_2'];
	$def_category_3=(int)$_POST['def_category_3'];
	$def_category_4=(int)$_POST['def_category_4'];
	$def_category_5=(int)$_POST['def_category_5'];
	//Auton
	$auto_High_Scored=(int)$_POST['auto_High_Scored'];
	$auto_Low_Scored=(int)$_POST['auto_Low_Scored'];
	
	$auto_High_Miss=(int)$_POST['auto_High_Miss'];
	$auto_Low_Miss=(int)$_POST['auto_Low_Miss'];
	
	
	$auto_Defenses_Reached_Sucess=(int)$_POST['auto_Defenses_Reached_Sucess'];
	$auto_Defenses_Crossed_Sucess=(int)$_POST['auto_Defenses_Crossed_Sucess'];
	
	$auto_Defenses_Reached_Failed=(int)$_POST['auto_Defenses_Reached_Failed'];
	$auto_Defenses_Crossed_Failed=(int)$_POST['auto_Defenses_Crossed_Failed'];
	
	$auto_Start_Location=(int)$_POST['auto_Start_Location'];

	if((int)$_POST['Auto_Boulder_Grab']=="on"){$Auto_Boulder_Grab=1;}
	if((int)$_POST['Auto_StartWithBoulder']=="on"){$Auto_StartWithBoulder=1;}
	//Teleop
	$def_crossed_1=(int)$_POST['def_1_crossed'];
	$def_crossed_2=(int)$_POST['def_2_crossed'];
	$def_crossed_3=(int)$_POST['def_3_crossed'];
	$def_crossed_4=(int)$_POST['def_4_crossed'];
	$def_crossed_5=(int)$_POST['def_5_crossed'];
	
	$def_1_weakened=(int)$_POST['def_1_weakened'];
	$def_2_weakened=(int)$_POST['def_2_weakened'];
	$def_3_weakened=(int)$_POST['def_3_weakened'];
	$def_4_weakened=(int)$_POST['def_4_weakened'];
	$def_5_weakened=(int)$_POST['def_5_weakened'];

	$def_1_speed=(int)$_POST['def_1_speed'];
	$def_2_speed=(int)$_POST['def_2_speed'];
	$def_3_speed=(int)$_POST['def_3_speed'];
	$def_4_speed=(int)$_POST['def_4_speed'];
	$def_5_speed=(int)$_POST['def_5_speed'];
	
	$def_1_stuck=(int)$_POST['def_1_stuck'];
	$def_2_stuck=(int)$_POST['def_2_stuck'];
	$def_3_stuck=(int)$_POST['def_3_stuck'];
	$def_4_stuck=(int)$_POST['def_4_stuck'];
	$def_5_stuck=(int)$_POST['def_5_stuck'];
	
	if($_POST['def_1_ball']== "on"){$def_1_ball=1;}
	if($_POST['def_2_ball']== "on"){$def_2_ball=1;}
	if($_POST['def_3_ball']== "on"){$def_3_ball=1;}
	if($_POST['def_4_ball']== "on"){$def_4_ball=1;}
	if($_POST['def_5_ball']== "on"){$def_5_ball=1;}
	
	//Shooting variables
	$batter_high_Scored=(int)$_POST['batter_high_Scored'];
	$batter_low_Scored=(int)$_POST['batter_low_Scored'];
	$batter_high_Miss=(int)$_POST['batter_high_Miss'];
	$batter_low_Miss=(int)$_POST['batter_low_Miss'];
	$courtyard_high_Scored=(int)$_POST['courtyard_high_Scored'];
	$courtyard_low_Scored=(int)$_POST['courtyard_low_Scored'];
	$courtyard_high_Miss=(int)$_POST['courtyard_high_Miss'];
	$courtyard_low_Miss=(int)$_POST['courtyard_low_Miss'];
	//Climbing variables
	if((int)$_POST['challenge_Sucess']== "on"){$challenge_Sucess=1;}
	if((int)$_POST['Scaled_Sucess']== "on"){$Scaled_Sucess=1;}
	//Defense Rating
	if(($_POST['defense'] =='0')){$defense="0";}
	elseif(($_POST['defense'] =='25')){$defense="<25";}
	elseif(($_POST['defense'] =='50')){$defense="50";}
	elseif(($_POST['defense'] =='75')){$defense=">75";}
	//Robot Issues
	if((int)$_POST['no_show']== "on"){$no_show=1;}
	if((int)$_POST['mech_fail']== "on"){$mech_fail=1;}
	if((int)$_POST['lost_comm']== "on"){$lost_comms=1;}
	
	if((int)$_POST['tipped']== "on"){$tipped=1;}
	$fouls=(int)$_POST['fouls'];
	$tech_fouls=(int)$_POST['tech_fouls'];
	//Driver Data
	$drive_manuverability=(int)$_POST['drive_manuverability'];
	$pushing=(int)$_POST['pushing'];
	$Defense_Pushing=(int)$_POST['Defense_Pushing'];
	$Ball_Control=(int)$_POST['Ball_Control'];
	//Comments
	$notes=$_POST['notes'];
	//$fields = array($matchNum,$teamNum,$def_type_1,$def_type_2,$def_type_3,$def_type_4,$def_type_5,$drive_man,$notes);
	//foreach($fields as $fieldname){
	//if(!empty($fieldname)){
	$query = "INSERT INTO match_data (match_number,team_number,scout_id,def_category_1,def_category_2,def_category_3,def_category_4,def_category_5,auto_High_Scored,auto_Low_Scored,auto_High_Miss,auto_Low_Miss,auto_Defenses_Reached_Sucess,auto_Defenses_Crossed_Sucess,auto_Defenses_Reached_Failed,auto_Defenses_Crossed_Failed,auto_Start_Location,Auto_Boulder_Grab,Auto_StartWithBoulder,def_1_crossed,def_2_crossed,def_3_crossed,def_4_crossed,def_5_crossed,def_1_weakened,def_2_weakened,def_3_weakened,def_4_weakened,def_5_weakened,def_1_speed,def_2_speed,def_3_speed,def_4_speed,def_5_speed,def_1_stuck,def_2_stuck,def_3_stuck,def_4_stuck,def_5_stuck,def_1_ball,def_2_ball,def_3_ball,def_4_ball,def_5_ball,batter_high_Scored,batter_low_Scored,batter_high_Miss,batter_low_Miss,courtyard_high_Scored,courtyard_low_Scored,courtyard_high_Miss,courtyard_low_Miss,challenge_Sucess,Scaled_Sucess,defense,no_show,mech_fail,lost_comms,tipped,fouls,tech_fouls,drive_manuverability,pushing,Defense_Pushing,Ball_Control,notes) 
	                          VALUES ('$matchNum','$teamNum','$scoutID',0,'$def_category_2','$def_category_3','$def_category_4','$def_category_5','$auto_High_Scored','$auto_Low_Scored','$auto_High_Miss','$auto_Low_Miss','$auto_Defenses_Reached_Sucess','$auto_Defenses_Crossed_Sucess','$auto_Defenses_Reached_Failed','$auto_Defenses_Crossed_Failed','$auto_Start_Location','$Auto_Boulder_Grab','$Auto_StartWithBoulder','$def_crossed_1','$def_crossed_2','$def_crossed_3','$def_crossed_4','$def_crossed_5','$def_1_weakened','$def_2_weakened','$def_3_weakened','$def_4_weakened','$def_5_weakened','$def_1_speed','$def_2_speed','$def_3_speed','$def_4_speed','$def_5_speed','$def_1_stuck','$def_2_stuck','$def_3_stuck','$def_4_stuck','$def_5_stuck','$def_1_ball','$def_2_ball','$def_3_ball','$def_4_ball','$def_5_ball','$batter_high_Scored','$batter_low_Scored','$batter_high_Miss','$batter_low_Miss','$courtyard_high_Scored','$courtyard_low_Scored','$courtyard_high_Miss','$courtyard_low_Miss','$challenge_Sucess','$Scaled_Sucess','$defense','$no_show','$mech_fail','$lost_comms','$tipped','$fouls','$tech_fouls','$drive_manuverability','$pushing','$Defense_Pushing','$Ball_Control','$notes')";
	$result = $mysqli->query($query);
	//$query = "INSERT INTO note_entry (selectteam,notes) VALUES ('$teamNum','$notes')";
	//$result = $mysqli->query($query);
	//$query = "INSERT INTO match_data (match_number,team_number,scout_id,no_show,mech_fail,lost_comms,fouls,tech_fouls,drive_rating) VALUES ('$matchNum','$teamNum','$scoutID','$no_show','$mech_fail','$lost_comm','$ball_shot','$balls_scored','$drive_man')";
	//$result = $mysqli->query($query);
	if($result) {
	echo"Successfully added info";	
	}
	else {
	printf("Errormessage: %s\n", $mysqli->error);
	}
	//}	
	//}	
	}
	?>
</div>
</div>
