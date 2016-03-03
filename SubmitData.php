<?php
//Submits data
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

<div class="page_container">
<br>
<br>

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
	/*
	if(($_POST['defense'] =='0')){$defense="0";}
	elseif(($_POST['defense'] =='25')){$defense="<25";}
	elseif(($_POST['defense'] =='50')){$defense="50";}
	elseif(($_POST['defense'] =='75')){$defense=">75";}*/
	$defense = $_POST['defense'];
	
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
?>
	<a href="DataEntry.php">Go back to Entering Data</a>
	<br>
	<br>
	<br>
	<br>
	<br>
	<a href="index.php">Go back to the main site</a>
<?php	
	}
	else {
	printf("Errormessage: %s\n", $mysqli->error);
	}
	//}	
	//}	
	}
	?>