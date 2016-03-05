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
<h3>Matches Played: <?=$dat["played"]?></h3>
<h1>Match-By-Match</h1>
<table class="matchTable">
	<thead>
		<tr>
			<th class="topTime" rowspan = "1" colspan = "6">Match Defence Statistics</th>
			<th class="topTime" rowspan = "1" colspan = "5">Defense Stats<br>Ball,Crossed,Speed,Stuck</th>
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
			<td class="TBody"><?=$playerMatch?></td>
			<td class="TBody"><?=getDefenseName($match['def_pos_types'][0])?></td>
			<td class="TBody"><?=getDefenseName($match['def_pos_types'][1])?></td>
			<td class="TBody"><?=getDefenseName($match['def_pos_types'][2])?></td>
			<td class="TBody"><?=getDefenseName($match['def_pos_types'][3])?></td>
			<td class="TBody"><?=getDefenseName($match['def_pos_types'][4])?></td>
			<td class="TBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_speed'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_stuck']?></td>
			<td class="TBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_speed'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_stuck']?></td>
			<td class="TBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_speed'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_stuck']?></td>
			<td class="TBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_speed'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_stuck']?></td>
			<td class="TBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_speed'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_stuck']?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<br>
<?php

	$result2 = $mysqli->query($team_query);

?>
<table class="matchTable">
	<thead>
		<tr>
			<th class="topTime" rowspan = "1" colspan = "9">Match Shooting Statistics</th>
		</tr>
		<tr>
			<th class="topTime"rowspan = "1" colspan = "1">Match #</th>
			<th class="topTime"rowspan = "1" colspan = "1">Auto high %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Auto Low %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Teleop High %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Teleop Low %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Batter High %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Batter Low %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Court High %</th>
			<th class="topTime"rowspan = "1" colspan = "1">Court Low %</th>
		</tr>
	</tbody>
	<tbody>
		<?php
			while($row = $result2->fetch_array(MYSQLI_ASSOC))
			{
				$playerMatch = $row["match_number"];
				$match = getTeamMatchData($mysqli, $team, $playerMatch);
		?>
		<tr>
			<td class="TBody"><?=$playerMatch?></td>
			<td class="TBody"><?php if($match['auto_high_total'] > 0){ echo round($match['auto_high']/$match['auto_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['auto_low_total'] > 0){ echo round($match['auto_low']/$match['auto_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['teleop_high_total'] > 0){ echo round($match['teleop_high']/$match['teleop_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['teleop_low_total'] > 0){ echo round($match['teleop_low']/$match['teleop_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['batter_high_total'] > 0){ echo round($match['batter_high']/$match['batter_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['batter_low_total'] > 0){ echo round($match['batter_low']/$match['batter_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['court_high_total'] > 0){ echo round($match['court_high']/$match['court_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="TBody"><?php if($match['court_low_total'] > 0){ echo round($match['court_low']/$match['court_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>


		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<br>
<?php

	$result3 = $mysqli->query($team_query);

?>
<table class="matchTable">
	<thead>
		<tr>
			<th class="topTime" rowspan = "1" colspan = "9">Match Foul Statistics</th>
		</tr>
		<tr>
			<th class="topTime"rowspan = "1" colspan = "1">Match #</th>
			<th class="topTime"rowspan = "1" colspan = "1">Fouls</th>
			<th class="topTime"rowspan = "1" colspan = "1">Tech Fouls</th>
			<th class="topTime"rowspan = "1" colspan = "1">No Show</th>
			<th class="topTime"rowspan = "1" colspan = "1">Mech Fail</th>
			<th class="topTime"rowspan = "1" colspan = "1">Lost Comm</th>
			<th class="topTime"rowspan = "1" colspan = "1">Tipped</th>
		</tr>
	</tbody>
	<tbody>
		<?php
			while($row = $result3->fetch_array(MYSQLI_ASSOC))
			{
				$playerMatch = $row["match_number"];
				$match = getTeamMatchData($mysqli, $team, $playerMatch);
		?>
		<tr>
			<td class="TBody"><?=$playerMatch?></td>
			<td class="TBody"><?=$match['fouls']?></td>
			<td class="TBody"><?=$match['tech_fouls']?></td>
			<td class="TBody"><?=$match['no_show']?></td>
			<td class="TBody"><?=$match['mech_fail']?></td>
			<td class="TBody"><?=$match['lost_comms']?></td>
			<td class="TBody"><?=$match['tipped']?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<br>
<h1>Scoring</h1>
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
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Crossed Success</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Crossed Failed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Reached Sucess</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defenses Reached Failed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Start With Boulder?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Boulder Grab Success?</th>
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
			<td><?=$dat['Auto_StartWithBoulder']?></td>
			<td><?=$dat['boulder_grabs']?></td>
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
			<th class='topTime'rowspan = "1" colspan = "2">Climbing Averages</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Challenge Success?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Scaled Success?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['challenge']?></td>
			<td><?=$dat['climbs']?></td>
		</tr>
	</tbody>
		
</table>
<br>
<h1>Outer Works Averages</h1>
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
			<?php
			if($dat['lowbar_faced']>0)
			{
			?>
			<td><?=$dat['lowbar_cross'] / $dat['lowbar_faced']?></td>
			<td><?=$dat['lowbar_speed'] / $dat['lowbar_faced']?></td>
			<td><?=$dat['lowbar_stuck'] / $dat['lowbar_faced']?></td>
			<td><?=$dat['lowbar_ball'] / $dat['lowbar_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
			
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
			<th class='topTime'rowspan = "1" colspan = "1">Balls</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>
			<th class='topTime'rowspan = "1" colspan = "1">Balls</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
			if($dat['portcullis_faced']>0)
			{
		?>
			<td><?=$dat['portcullis_faced']?></td>
			<td><?=$dat['portcullis_cross'] / $dat['portcullis_faced']?></td>
			<td><?=$dat['portcullis_speed'] / $dat['portcullis_faced']?></td>
			<td><?=$dat['portcullis_stuck'] / $dat['portcullis_faced']?></td>
			<td><?=$dat['portcullis_ball'] / $dat['portcullis_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['chili_fries_faced']>0)
				{
			?>
			<td><?=$dat['chili_fries_faced']?></td>
			<td><?=$dat['chili_fries_cross'] / $dat['chili_fries_faced']?></td>
			<td><?=$dat['chili_fries_speed'] / $dat['chili_fries_faced']?></td>
			<td><?=$dat['chili_fries_stuck'] / $dat['chili_fries_faced']?></td>
			<td><?=$dat['chili_fries_ball'] / $dat['chili_fries_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
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
			<?php
				if($dat['moat_faced']>0)
				{
			?>
			<td><?=$dat['moat_faced']?></td>
			<td><?=$dat['moat_cross'] / $dat['moat_faced']?></td>
			<td><?=$dat['moat_speed']/ $dat['moat_faced']?></td>
			<td><?=$dat['moat_stuck']/ $dat['moat_faced']?></td>
			<td><?=$dat['moat_ball']/ $dat['moat_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['ramparts_faced']>0)
				{
			?>
			<td><?=$dat['ramparts_faced']?></td>
			<td><?=$dat['ramparts_cross'] / $dat['ramparts_faced']?></td>
			<td><?=$dat['ramparts_speed'] / $dat['ramparts_faced']?></td>
			<td><?=$dat['ramparts_stuck'] / $dat['ramparts_faced']?></td>
			<td><?=$dat['ramparts_ball'] / $dat['ramparts_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
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
			<?php
				if($dat['drawbridge_faced']>0)
				{
			?>
			<td><?=$dat['drawbridge_faced']?></td>
			<td><?=$dat['drawbridge_cross'] / $dat['drawbridge_faced']?></td>
			<td><?=$dat['drawbridge_speed'] / $dat['drawbridge_faced']?></td>
			<td><?=$dat['drawbridge_stuck'] / $dat['drawbridge_faced']?></td>
			<td><?=$dat['drawbridge_ball'] / $dat['drawbridge_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['sally_port_faced']>0)
				{
			?>
			<td><?=$dat['sally_port_faced']?></td>
			<td><?=$dat['sally_port_cross'] / $dat['sally_port_faced']?></td>
			<td><?=$dat['sally_port_speed'] / $dat['sally_port_faced']?></td>
			<td><?=$dat['sally_port_stuck'] / $dat['sally_port_faced']?></td>
			<td><?=$dat['sally_port_ball'] / $dat['sally_port_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
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
			<?php
				if($dat['rough_terrain_faced']>0)
				{
			?>
			<td><?=$dat['rough_terrain_faced']?></td>
			<td><?=$dat['rough_terrain_cross'] / $dat['rough_terrain_faced']?></td>
			<td><?=$dat['rough_terrain_speed'] / $dat['rough_terrain_faced']?></td>
			<td><?=$dat['rough_terrain_stuck'] / $dat['rough_terrain_faced']?></td>
			<td><?=$dat['rough_terrain_ball'] / $dat['rough_terrain_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['rockwall_faced']>0)
				{
			?>
			<td><?=$dat['rockwall_faced']?></td>
			<td><?=$dat['rockwall_cross'] / $dat['rockwall_faced']?></td>
			<td><?=$dat['rockwall_speed'] / $dat['rockwall_faced']?></td>
			<td><?=$dat['rockwall_stuck'] / $dat['rockwall_faced']?></td>
			<td><?=$dat['rockwall_ball']  / $dat['rockwall_faced']?></td>
			<?php
				}
				else{
					?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
					<?php
				}
			?>
		</tr>
	</tbody>
		
</table>

<br><br>
<h1>Other</h1>
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
			<td><?=$dat['fouls']?></td>
			<td><?=$dat['tech_fouls']?></td>
			<td><?=$dat['no_show']?></td>
			<td><?=$dat['mech_fail']?></td>
			<td><?=$dat['lost_comms']?></td>
			<td><?=$dat['tipped']?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Driver Data Averages</th>
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
		<?php
		if($dat["played"] > 0)
		{
			?>
			<td><?=$dat['drive_manuverability'] / $dat["played"]?></td>
			<td><?=$dat['Defense_Pushing'] / $dat["played"]?></td>
			<td><?=$dat['Ball_Control'] / $dat["played"]?></td>
			<td><?=$dat['pushing'] / $dat["played"]?></td>
			<?php
		}
		else
		{
			?>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<td>0</td>
			<?php
		}
			?>
		</tr>
	</tbody>
	
</table>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4"> Average Defense Rating</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php
		if($dat["played"] > 0)
		{
			?>
		<?php
		}
		else
		{
			?>
			<td>Data Unavailable</td>
			<?php
		}
			?>
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
<br>
<h1>Match Notes</h1>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime' rowspan = "1" colspan = "1">Match #</th>
			<th class='topTime' rowspan = "1" colspan = "4">Notes</th>
		</tr>
	</thead>
	<tbody>	
		<?php
			$note_query = "SELECT * FROM `notes` WHERE team='$team' ORDER BY `match_number` ASC";
			$notes = $mysqli->query($note_query);
			
			while($row = $notes->fetch_array(MYSQLI_ASSOC))
			{
				?>
				<tr>
					<td><?=$row["match_number"]?></td>
					<td><?=$row["notes"]?></td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>
<br>
<br>

<h1>Other Notes</h1>
<br><br>
<table class="matchTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime' rowspan = "1" colspan = "4">Note</th>
		</tr>
	</thead>
	<tbody>	
		<?php
			$note_query = "SELECT * FROM `note_entry` WHERE selectteam='$team' ORDER BY `id` ASC";
			$notes = $mysqli->query($note_query);
			
			if($notes===FALSE)
			{
				//NOPE
			}
			else
			{
				while($row = $notes->fetch_array(MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><?=$row["notes"]?></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<?php
	//var_dump($dat);
?>
<br>
<br>
</div>