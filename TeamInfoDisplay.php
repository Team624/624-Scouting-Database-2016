<?php
	//Team Display
	//Search for Teams and Matches
	include("HeadTemplate.php");
	include("UserVerification.php");
	include("kick_intruders.php");
	include("navbar.php");
	include("db_connect.php");
	include("api_connect.php");
?>

<head>
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css">
	<link rel="stylesheet" type="text/css" href="css/SearchStyle.css"> 
</head>

<?php
	$team = $_GET['team'];
?>
<div class="page_container">
<br>
<br>
<br>
<br>
<form class="Searchforsearch" method="get" action="TeamInfoDisplay.php">
	<input type="number" name="team">
	<input type="submit" value="Search" class="subButton">
</form>

<br>

	
	<h1><?php echo "Team " . $team; ?></h1>
	<?php
	include("db_connect.php");
	mysqli_select_db($mysqli,$dbname);
	$result=mysqli_query($mysqli,"SELECT match_number FROM match_data WHERE team_number='$team'");
	$match_numbers=array();
	
	$result1=mysqli_query($mysqli,"SELECT auto_high_Scored FROM match_data WHERE team_number='$team'");
	$auto_High_Scored=array();
	
	$result2=mysqli_query($mysqli,"SELECT auto_low_Scored FROM match_data WHERE team_number='$team'");
	$auto_Low_Scored=array();
	
	$result3=mysqli_query($mysqli,"SELECT auto_High_Miss FROM match_data WHERE team_number='$team'");
	$auto_High_Miss=array();
	
	$result4=mysqli_query($mysqli,"SELECT auto_Low_Miss FROM match_data WHERE team_number='$team'");
	$auto_Low_Miss=array();
	
	$result5=mysqli_query($mysqli,"SELECT auto_Defenses_Reached_Sucess FROM match_data WHERE team_number='$team'");
	$auto_Defenses_Reached_Sucess=array();
	
	$result6=mysqli_query($mysqli,"SELECT auto_Defenses_Crossed_Sucess FROM match_data WHERE team_number='$team'");
	$auto_Defenses_Crossed_Sucess=array();
	
	$result7=mysqli_query($mysqli,"SELECT auto_Defenses_Reached_Failed FROM match_data WHERE team_number='$team'");
	$auto_Defenses_Reached_Failed=array();
	
	$result8=mysqli_query($mysqli,"SELECT auto_Defenses_Crossed_Failed FROM match_data WHERE team_number='$team'");
	$auto_Defenses_Crossed_Failed=array();
	
	$result9=mysqli_query($mysqli,"SELECT auto_Start_Location FROM match_data WHERE team_number='$team'");
	$auto_Start_Location=array();
	
	$result10=mysqli_query($mysqli,"SELECT Auto_Boulder_Grab FROM match_data WHERE team_number='$team'");
	$Auto_Boulder_Grab=array();
	
	$result11=mysqli_query($mysqli,"SELECT Auto_StartWithBoulder FROM match_data WHERE team_number='$team'");
	$Auto_StartWithBoulder=array();
	
	
	while($row = mysqli_fetch_assoc($result)) //match number
	{
		//echo "match NUmber :{$row['match_number']}  <br> ";
		array_push($match_numbers,$row['match_number']);
	}
	while($row = mysqli_fetch_assoc($result1)) //auto high scored
	{
		array_push($auto_High_Scored,$row['auto_high_Scored']);
	}
	while($row = mysqli_fetch_assoc($result2))  //auto low scored
	{
		array_push($auto_Low_Scored,$row['auto_low_Scored']);
	}
	while($row = mysqli_fetch_assoc($result3))  //auto high miss
	{
		array_push($auto_High_Miss,$row['auto_High_Miss']);
	}
	while($row = mysqli_fetch_assoc($result4))  //auto low miss
	{
		array_push($auto_Low_Miss,$row['auto_Low_Miss']);
	}
	while($row = mysqli_fetch_assoc($result5))  //auto_Defenses_Reached_Sucess
	{
		array_push($auto_Defenses_Reached_Sucess,$row['auto_Defenses_Reached_Sucess']);
	}
	while($row = mysqli_fetch_assoc($result6))  //auto_Defenses_Crossed_Sucess
	{
		array_push($auto_Defenses_Crossed_Sucess,$row['auto_Defenses_Crossed_Sucess']);
	}
	while($row = mysqli_fetch_assoc($result7))  //auto_Defenses_Reached_Failed
	{
		array_push($auto_Defenses_Reached_Failed,$row['auto_Defenses_Reached_Failed']);
	}
	while($row = mysqli_fetch_assoc($result8))  //auto_Defenses_Crossed_Failed
	{
		array_push($auto_Defenses_Crossed_Failed,$row['auto_Defenses_Crossed_Failed']);
	}
	while($row = mysqli_fetch_assoc($result9))  //auto_Start_Location
	{
		array_push($auto_Start_Location,$row['auto_Start_Location']);
	}
	while($row = mysqli_fetch_assoc($result10))  //Auto_Boulder_Grab
	{
		array_push($Auto_Boulder_Grab,$row['Auto_Boulder_Grab']);
	}
	while($row = mysqli_fetch_assoc($result11))  //Auto_StartWithBoulder
	{
		array_push($Auto_StartWithBoulder,$row['Auto_StartWithBoulder']);
	}
    /***************************************************************************************************************************************************************************
	TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP TELEOP 
	GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES GOES
	UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER UNDER 
	HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE HERE 
	****************************************************************************************************************************************************************************/
	$result12=mysqli_query($mysqli,"SELECT def_1_crossed FROM match_data WHERE team_number='$team'");
	$def_1_crossed=array();
	
	$result13=mysqli_query($mysqli,"SELECT def_2_crossed FROM match_data WHERE team_number='$team'");
	$def_2_crossed=array();
	
	$result14=mysqli_query($mysqli,"SELECT def_3_crossed FROM match_data WHERE team_number='$team'");
	$def_3_crossed=array();
	
	$result15=mysqli_query($mysqli,"SELECT def_4_crossed FROM match_data WHERE team_number='$team'");
	$def_4_crossed=array();
	
	$result16=mysqli_query($mysqli,"SELECT def_5_crossed FROM match_data WHERE team_number='$team'");
	$def_5_crossed=array();
	
	$result17=mysqli_query($mysqli,"SELECT def_1_weakened FROM match_data WHERE team_number='$team'");
	$def_1_weakened=array();
	
	$result18=mysqli_query($mysqli,"SELECT def_2_weakened FROM match_data WHERE team_number='$team'");
	$def_2_weakened=array();
	
	$result19=mysqli_query($mysqli,"SELECT def_3_weakened FROM match_data WHERE team_number='$team'");
	$def_3_weakened=array();
	
	$result20=mysqli_query($mysqli,"SELECT def_4_weakened FROM match_data WHERE team_number='$team'");
	$def_4_weakened=array();
	
	$result21=mysqli_query($mysqli,"SELECT def_5_weakened FROM match_data WHERE team_number='$team'");
	$def_5_weakened=array();
	
	$result22=mysqli_query($mysqli,"SELECT def_1_speed FROM match_data WHERE team_number='$team'");
	$def_1_speed=array();
	
	$result23=mysqli_query($mysqli,"SELECT def_2_speed FROM match_data WHERE team_number='$team'");
	$def_2_speed=array();
			
	$result24=mysqli_query($mysqli,"SELECT def_3_speed FROM match_data WHERE team_number='$team'");
	$def_3_speed=array();
			
	$result25=mysqli_query($mysqli,"SELECT def_4_speed FROM match_data WHERE team_number='$team'");
	$def_4_speed=array();
			
	$result26=mysqli_query($mysqli,"SELECT def_5_speed FROM match_data WHERE team_number='$team'");
	$def_5_speed=array();	
	
	$result27=mysqli_query($mysqli,"SELECT def_1_ball FROM match_data WHERE team_number='$team'");
	$def_1_ball=array();
	
	$result28=mysqli_query($mysqli,"SELECT def_2_ball FROM match_data WHERE team_number='$team'");
	$def_2_ball=array();
	
	$result29=mysqli_query($mysqli,"SELECT def_3_ball FROM match_data WHERE team_number='$team'");
	$def_3_ball=array();
	
	$result30=mysqli_query($mysqli,"SELECT def_4_ball FROM match_data WHERE team_number='$team'");
	$def_4_ball=array();
	
	$result31=mysqli_query($mysqli,"SELECT def_5_ball FROM match_data WHERE team_number='$team'");
	$def_5_ball=array();
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			?>
		<table class="matchTable">
			<thead class="THead">
				<tr>
					<td><strong>Matches:</strong></td>
					<?php foreach($match_numbers as $r){echo "<td>".$r."</td>";}?>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Auto High Scored</td>
					<?php foreach($auto_High_Scored as $s){echo "<td>".$s."</td>";}?>
				</tr>
				<tr>
					<td>Auto High Miss</td>
					<?php foreach($auto_High_Miss as $m){echo "<td>".$m."</td>";}?>
				</tr>
				<tr>
					<td>Auto Low Scored</td>
					<?php foreach($auto_Low_Scored as $s){echo "<td>".$s."</td>";}?>
				</tr>
				<tr>
					<td>Auto Low Miss</td>
					<?php foreach($auto_Low_Miss as $m){echo "<td>".$m."</td>";}?>
				</tr>
				<tr>
					<td>Auto Defenses Reached Sucess</td>
					<?php foreach($auto_Defenses_Reached_Sucess as $s){echo "<td>".$s."</td>";}?>
				</tr>
				<tr>
					<td>Auto Defenses Crossed Sucess</td>
					<?php foreach($auto_Defenses_Crossed_Sucess as $s){echo "<td>".$s."</td>";}?>
				</tr>
				<tr>
					<td>Auto Defenses Reached Failed</td>
					<?php foreach($auto_Defenses_Reached_Failed as $f){echo "<td>".$f."</td>";}?>
				</tr>
				<tr>
					<td>Auto Defenses Crossed Failed</td>
					<?php foreach($auto_Defenses_Crossed_Failed as $f){echo "<td>".$f."</td>";}?>
				</tr>
				<tr>
					<td>Auto Start Location</td>
					<?php foreach($auto_Start_Location as $l){echo "<td>".$l."</td>";}?>
				</tr>
				<tr>
					<td>Auto Boulder Grab?</td>
					<?php foreach($Auto_Boulder_Grab as $g){echo "<td>".$g."</td>";}?>
				</tr>
				<tr>
					<td>Auto Start With Boulder?</td>
					<?php foreach($Auto_StartWithBoulder as $g){echo "<td>".$g."</td>";}?>
				</tr>
			</tbody>
		</table>
		<table class="matchTable">
			<!--- INFO FOR ANALYSIS-->
			<?php
					//total balls shot
					$balls_shot=array_sum($auto_High_Scored)+array_sum($auto_Low_Scored)+array_sum($auto_High_Miss)+array_sum($auto_Low_Miss);
			
					//total percent
					$total_made=array_sum($auto_High_Scored)+array_sum($auto_Low_Scored);
					$total_attempts=array_sum($auto_High_Scored)+array_sum($auto_High_Miss)+array_sum($auto_Low_Scored)+array_sum($auto_Low_Miss);
					$percentin=($total_made/$total_attempts) *100;
					
					//High Goals
					$h_total_made=array_sum($auto_High_Scored);
					$h_total_attempts=array_sum($auto_High_Scored)+array_sum($auto_High_Miss);
					$h_percentin=($h_total_made/$h_total_attempts) *100;
					
					//Low Goals
					$l_total_made=array_sum($auto_Low_Scored);
					$l_total_attempts=array_sum($auto_Low_Scored)+array_sum($auto_Low_Miss);
					$l_percentin=($l_total_made/$l_total_attempts) *100;
					
					
					
					//total percent
					$d_total_made=array_sum($auto_Defenses_Crossed_Sucess)+array_sum($auto_Defenses_Reached_Sucess);
					$d_total_attempts=array_sum($auto_Defenses_Crossed_Sucess)+array_sum($auto_Defenses_Reached_Sucess)+array_sum($auto_Defenses_Crossed_Failed)+array_sum($auto_Defenses_Reached_Failed);
					$d_percentin=($d_total_made/$d_total_attempts) *100;
					
					
					//Defenses Reached
					$r_total_defenses=array_sum($auto_Defenses_Reached_Sucess);
					$r_total_attempts=array_sum($auto_Defenses_Reached_Failed)+array_sum($auto_Defenses_Reached_Sucess);
					$r_percentin=($r_total_defenses/$r_total_attempts)*100;
					
					//Defenses Crossed
					$c_total_defenses=array_sum($auto_Defenses_Crossed_Sucess);
					$c_total_attempts=array_sum($auto_Defenses_Crossed_Failed)+array_sum($auto_Defenses_Crossed_Sucess);
					//$c_percentin=(c_total_defenses/c_total_attempts)*100;
					?>
					<tr>
						Autonomous
					</tr>
					<tr>
						<td>Total Balls Shot:</td><td><?php echo $balls_shot; ?></td>
					</tr>
					<tr>
						<td>Percent of All Balls In:</td><td><?php echo (ceil($percentin)."%"); ?></td>
					</tr>
					<tr>
						<td>Percent of All High Goal Shots Made:</td><td><?php echo (ceil($h_percentin)."%"); ?></td>
					</tr>
					<tr>
						<td>Percent of All Low Goal Shots Made:</td><td><?php echo (ceil($l_percentin)."%"); ?></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td>Percent of All Defenses Crossed and Reached:</td><td><?php echo (ceil($d_percentin)."%"); ?></td>
					</tr>
					<tr>
						<td>Percent of All Defenses Reached:</td><td><?php echo (ceil($r_percentin)."%"); ?></td>
					</tr>
					<tr>
						<td>Percent of All Defenses Crossed:</td><td><?php echo (ceil($c_percentin)."%"); ?></td>
					</tr>
		</table>
		
	
			
			
	
	

	
    
    <td><?php printf ("%d %d\n",$match_numbers[0],$match_numbers[1]);?></td>
			<td><?php printf ("%d %d\n",$auto_high_Scored[0],$auto_high_Scored[1]);?></td>
       

 

</div>