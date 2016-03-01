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
	$dat = getTeamData($mysqli, $team);
	
?>
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
			<th class='topTime' rowspan = "1" colspan = "1">Mechanical Failues</th>
			<th class='topTime' rowspan = "1" colspan = "1">Lost Communication</th>
			<th class='topTime' rowspan = "1" colspan = "1">Tipped</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['fouls']?></td>
			<td><?=$dat['tech_fouls']?></td>
			<td><?=$dat['no_show'] ?></td>
			<td><?=$dat['mech_fail']?></td>
			<td><?=$dat['lost_comms']?></td>
			<td><?=$dat['tipped'] ?></td>
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
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['lowbar_faced']?></td>
			<td><?=$dat['lowbar_cross']?></td>
			<td><?=$dat['lowbar_speed']?></td>
			<td><?=$dat['lowbar_stuck']?></td>
			<td><?=$dat['lowbar_ball']?></td>
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
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['portcullis_faced']?></td>
			<td><?=$dat['portcullis_cross']?></td>
			<td><?=$dat['portcullis_speed']?></td>
			<td><?=$dat['portcullis_stuck']?></td>
			<td><?=$dat['portcullis_ball']?></td>
			
			<td><?=$dat['chili_fries_faced']?></td>
			<td><?=$dat['chili_fries_cross']?></td>
			<td><?=$dat['chili_fries_speed']?></td>
			<td><?=$dat['chili_fries_stuck']?></td>
			<td><?=$dat['chili_fries_ball']?></td>
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
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['moat_faced']?></td>
			<td><?=$dat['moat_cross']?></td>
			<td><?=$dat['moat_speed']?></td>
			<td><?=$dat['moat_stuck']?></td>
			<td><?=$dat['moat_ball']?></td>
			
			<td><?=$dat['ramparts_faced']?></td>
			<td><?=$dat['ramparts_cross']?></td>
			<td><?=$dat['ramparts_speed']?></td>
			<td><?=$dat['ramparts_stuck']?></td>
			<td><?=$dat['ramparts_ball']?></td>
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
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['drawbridge_faced']?></td>
			<td><?=$dat['drawbridge_cross']?></td>
			<td><?=$dat['drawbridge_speed']?></td>
			<td><?=$dat['drawbridge_stuck']?></td>
			<td><?=$dat['drawbridge_ball']?></td>
			
			<td><?=$dat['sally_port_faced']?></td>
			<td><?=$dat['sally_port_cross']?></td>
			<td><?=$dat['sally_port_speed']?></td>
			<td><?=$dat['sally_port_stuck']?></td>
			<td><?=$dat['sally_port_ball']?></td>
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
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Speed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Stuck?</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball?</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$dat['rough_terrain_faced']?></td>
			<td><?=$dat['rough_terrain_cross']?></td>
			<td><?=$dat['rough_terrain_speed']?></td>
			<td><?=$dat['rough_terrain_stuck']?></td>
			<td><?=$dat['rough_terrain_ball']?></td>
			
			<td><?=$dat['rockwall_faced']?></td>
			<td><?=$dat['rockwall_cross']?></td>
			<td><?=$dat['rockwall_speed']?></td>
			<td><?=$dat['rockwall_stuck']?></td>
			<td><?=$dat['rockwall_ball']?></td>
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
<?php
	//var_dump($dat);
?>
</div>