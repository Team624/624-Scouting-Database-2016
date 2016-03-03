<?php
	//Team Display
	//Search for Teams and Matches
	include("HeadTemplate.php");
	include("UserVerification.php");
	include("kick_intruders.php");
	include("navbar.php");
	include("db_connect.php");
	include("api_connect.php");
	include("GetTeamData.php");
?>
<br>
<br>
<br>
<br>
<head>
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css">
	<link rel="stylesheet" type="text/css" href="css/SearchStyle.css"> 
</head>

<?php
	$team = $_GET['team'];
	
	$query2 = "SELECT * FROM teams WHERE number='$team'";
	$result2 = $mysqli->query($query2);
	
	if ($result2->num_rows > 0){
	// output data of each row
    while($row1 = $result2->fetch_assoc()) {
		$teamname=$row1["name"];
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

	<h1><?php echo "Team " . $team. "-".$teamname; ?></h1>
	<?php
		}
	}
	?>
<?php
	$dat = getTeamData($mysqli, $team);
	
	$team_query = "SELECT `match_number`, `team_number` FROM `match_data` WHERE team_number = '$team'";
	$result = $mysqli->query($team_query);
?>

<table class="matchTable">
	<thead>
		<tr>
			<th class="topTime" rowspan = "1" colspan = "6"></th>
			<th class="topTime" rowspan = "1" colspan = "5">Defense Stats<br>,,,</th>
		</tr>
		<tr>
			<th class="topTime"rowspan = "1" colspan = "1">Match #</th>
			<th class="topTime"rowspan = "1" colspan = "1">Position 1</th>
			<th class="topTime"rowspan = "1" colspan = "1">Position 2</th>
			<th class="topTime"rowspan = "1" colspan = "1">Position 3</th>
			<th class="topTime"rowspan = "1" colspan = "1">Position 4</th>
			<th class="topTime"rowspan = "1" colspan = "1">Position 5</th>
			<th class="topTime"rowspan = "1" colspan = "1">1 Stats</th>
			<th class="topTime"rowspan = "1" colspan = "1">2 Stats</th>
			<th class="topTime"rowspan = "1" colspan = "1">3 Stats</th>
			<th class="topTime"rowspan = "1" colspan = "1">4 Stats</th>
			<th class="topTime"rowspan = "1" colspan = "1">5 Stats</th>
		</tr>
	</tbody>
	<tbody>
		<?php
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
				$playerMatch = $row["match_number"];
				$match = getTeamMatchData($mysqli, $team, $playerMatch);
		?>
		<tr>
		<td><?=$playerMatch?></td>
		<td><?=getDefenseName($match['def_pos_types'][0])?></td>
		<td><?=getDefenseName($match['def_pos_types'][1])?></td>
		<td><?=getDefenseName($match['def_pos_types'][2])?></td>
		<td><?=getDefenseName($match['def_pos_types'][3])?></td>
		<td><?=getDefenseName($match['def_pos_types'][4])?></td>
		<td><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_ball']?></td>
		</tr>
		<?php
		echo strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_ball';
			}
		?>
	</tbody>
</table>
<br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "12">Auto</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">High Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">High Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">High Goal Percent</th>
			<th class='topTime'rowspan = "1" colspan = "1">Low Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Low Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Low Goals Percent</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Crossed Sucess</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Crossed Failed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Reached Sucess</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Reached Failed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Start With Boulder?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Boulder Grab Sucess?</th>
		</tr>
	</thead>
	<tbody>
	<!--We need Auto info round here I suppose-->
		<tr>
			<td><?=$dat['auto_high']?></td>
			<td><?=$dat['auto_High_Miss']?></td>
			<td><?php if($dat['auto_high_total'] > 0){ echo round($dat['auto_high']/$dat['auto_high_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td><?=$dat['auto_low']?></td>
			<td><?=$dat['auto_Low_Miss']?></td>
			<td><?php if($dat['auto_low_total'] > 0){ echo round($dat['auto_low']/$dat['auto_low_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td><?=$dat['auto_def_cross']?></td>
			<td><?=$dat['auto_Defenses_Crossed_Failed']?></td>
			<td><?=$dat['auto_def_reach']?></td>
			<td><?=$dat['auto_Defenses_Reached_Failed']?></td>
			<td><?php if($dat['Auto_StartWithBoulder']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['boulder_grabs']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "6">Shooting Statistics</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Teleop High Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop High Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop High Goal Percent</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop Low Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop Low Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop Low Goals Percent</th>
		</tr>
	</thead>
	<tbody>
	<!--We need Auto info round here I suppose-->
		<tr>
			<td><?=$dat['teleop_high']?></td>
			<td><?=$dat['teleop_high_miss']?></td>
			<td><?php if($dat['teleop_high_total'] > 0){ echo round($dat['teleop_high']/$dat['teleop_high_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td><?=$dat['teleop_low']?></td>
			<td><?=$dat['teleop_low_miss']?></td>
			<td><?php if($dat['teleop_low_total'] > 0){ echo round($dat['teleop_low']/$dat['teleop_low_total'] * 100,2); }else{ echo "0"; }?>%</td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "6">Alerts</th>
		</tr>
		<tr class="topRow">
			<th class='topTime' rowspan = "1" colspan = "1">Fouls</th>
			<th class='topTime' rowspan = "1" colspan = "1">Tech Fouls</th>
			<th class='topTime' rowspan = "1" colspan = "1">No Shows</th>
			<th class='topTime' rowspan = "1" colspan = "1">Mechanical Failures</th>
			<th class='topTime' rowspan = "1" colspan = "1">Lost Communication</th>
			<th class='topTime' rowspan = "1" colspan = "1">Tipped</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php if($dat['fouls']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['tech_fouls']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['no_show']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['mech_fail']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['lost_comms']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['tipped']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "5">Low Bar</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['lowbar_faced']?></td>
			<td><?=$dat['lowbar_cross']?></td>
			<td><?=$dat['lowbar_speed']?></td>
			<td><?=$dat['lowbar_stuck']?></td>
			<td><?php if($dat['lowbar_ball']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br>
<table class="matchTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category A</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "5">Portcullis</th>
			<th class='topTime'rowspan = "1" colspan = "5">Cheval De Frise</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['portcullis_faced']?></td>
			<td><?=$dat['portcullis_cross']?></td>
			<td><?=$dat['portcullis_speed']?></td>
			<td><?=$dat['portcullis_stuck']?></td>
			<td><?php if($dat['portcullis_ball']==1){echo "Yes";} else{echo "No";}?></td>
			
			<td><?=$dat['chili_fries_faced']?></td>
			<td><?=$dat['chili_fries_cross']?></td>
			<td><?=$dat['chili_fries_speed']?></td>
			<td><?=$dat['chili_fries_stuck']?></td>
			<td><?php if($dat['chili_fries_ball']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br>
<table class="matchTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category B</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "5">Moat</th>
			<th class='topTime'rowspan = "1" colspan = "5">Ramparts</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['moat_faced']?></td>
			<td><?=$dat['moat_cross']?></td>
			<td><?=$dat['moat_speed']?></td>
			<td><?=$dat['moat_stuck']?></td>
			<td><?php if($dat['moat_ball']==1){echo "Yes";} else{echo "No";}?></td>
			
			<td><?=$dat['ramparts_faced']?></td>
			<td><?=$dat['ramparts_cross']?></td>
			<td><?=$dat['ramparts_speed']?></td>
			<td><?=$dat['ramparts_stuck']?></td>
			<td><?php if($dat['ramparts_ball']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br>
<table class="matchTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category C</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "5">Drawbridge</th>
			<th class='topTime'rowspan = "1" colspan = "5">Sally Port</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['drawbridge_faced']?></td>
			<td><?=$dat['drawbridge_cross']?></td>
			<td><?=$dat['drawbridge_speed']?></td>
			<td><?=$dat['drawbridge_stuck']?></td>
			<td><?php if($dat['drawbridge_ball']==1){echo "Yes";} else{echo "No";}?></td>
			
			<td><?=$dat['sally_port_faced']?></td>
			<td><?=$dat['sally_port_cross']?></td>
			<td><?=$dat['sally_port_speed']?></td>
			<td><?=$dat['sally_port_stuck']?></td>
			<td><?php if($dat['sally_port_ball']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br>
<table class="matchTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category D</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "5">Rough Terrain</th>
			<th class='topTime'rowspan = "1" colspan = "5">Rock Wall</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['rough_terrain_faced']?></td>
			<td><?=$dat['rough_terrain_cross']?></td>
			<td><?=$dat['rough_terrain_speed']?></td>
			<td><?=$dat['rough_terrain_stuck']?></td>
			<td><?php if($dat['rough_terrain_ball']==1){echo "Yes";} else{echo "No";}?></td>
			
			<td><?=$dat['rockwall_faced']?></td>
			<td><?=$dat['rockwall_cross']?></td>
			<td><?=$dat['rockwall_speed']?></td>
			<td><?=$dat['rockwall_stuck']?></td>
			<td><?php if($dat['rockwall_ball']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "2">Climbing</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Challenge Sucess?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Scaled Sucess?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php if($dat['challenge']==1){echo "Yes";} else{echo "No";}?></td>
			<td><?php if($dat['climbs']==1){echo "Yes";} else{echo "No";}?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Driver Data</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Driving/Maneuverability</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defense/Pushing</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball Control</th>
			<th class='topTime'rowspan = "1" colspan = "1">Pushing</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['drive_manuverability']?></td>
			<td><?=$dat['Defense_Pushing']?></td>
			<td><?=$dat['Ball_Control']?></td>
			<td><?=$dat['pushing']?></td>
		</tr>
	</tbody>
	
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Defense Rating</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['defense']?>%</td>
		</tr>
	</tbody>
	
</table>
<br>
<table class="matchTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "2">Outer Works Scores</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Defense Name</th>
			<th class='topTime'rowspan = "1" colspan = "1">Score</th>
		</tr>
		
	</thead>
	<tbody>
		<tr>
			<td><?= getDefenseName(0); ?></td>
			<td><?=$dat['def_prefs'][0]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(1); ?></td>
			<td><?=$dat['def_prefs'][1]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(2); ?></td>
			<td><?=$dat['def_prefs'][2]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(3); ?></td>
			<td><?=$dat['def_prefs'][3]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(4); ?></td>
			<td><?=$dat['def_prefs'][4]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(5); ?></td>
			<td><?=$dat['def_prefs'][5]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(6); ?></td>
			<td><?=$dat['def_prefs'][6]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(7); ?></td>
			<td><?=$dat['def_prefs'][7]?></td>
		</tr>
		<tr>
			<td><?= getDefenseName(8); ?></td>
			<td><?=$dat['def_prefs'][8]?></td>
		</tr>
	</tbody>
		
</table>
<!--<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Notes</th>
		</tr>
	</thead>
	<tbody>
<?php

	//$query2 = "SELECT match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3 FROM schedule";
	//$result2 = $mysqli->query($query2);
	
	//foreach($result2 as $row)
	//{
?>
		<tr>
			<td><?//=$dat['defense']?>%</td>
		</tr>
	</tbody>
<?php	
	//}
?>
</table>-->
<?php
	//var_dump($dat);
?>
</div>