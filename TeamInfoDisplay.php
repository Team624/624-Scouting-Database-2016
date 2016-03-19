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
	<link rel="stylesheet" type="text/css" href="css/info-bar.css"> 
	<!--<link rel="stylesheet" type="text/css" href="css/MatchScheduleStyle.css">-->
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
<?php
	$dat = getTeamData($mysqli, $team);
	
	$team_query = "SELECT `match_number`, `team_number` FROM `match_data` WHERE team_number = '$team'";
	$result = $mysqli->query($team_query);
?>
<div class="page_container">
<br>
<br>
<div class="info-bar-holder">
    <div class="bar-group">
      <div class="info-bar" id="auto-bar">
        <div class="left section">
          <div class="left info-content">
            <div class="info-title">Autonomous</div>
            <div class="row">
              Auto High: <b><?=$dat['auto_high']?></b> out of <b><?=$dat['auto_high_total']?></b>
            </div>
            <div class="row">
              Auto Low: <b><?=$dat['auto_low']?></b> out of <b><?=$dat['auto_low_total']?></b>
            </div>
            <!--<div class="row">
              Cans Moved: <b><?=$d['auto_cans_moved']?></b> 
            </div>
            <div class="row">
              Cans Knocked: <b  class = "<?=($d['auto_cans_knocked']>=$d['matches_played']/2)?"bad-number":"normal-number" ?>"><?=$d['auto_cans_knocked']?></b> 
            </div>
            <br>
            <div class="row">
              Step: (<b><?=$d['auto_can_grab_attempt']?></b> Attempts, <b><?=$d['auto_cans_grabed']?></b> grabbed)
            </div>
            <br>
            <div class="row">
              Autozone: <b><?=$d['auto_zone']?></b>
            </div>-->
          </div>
          <div class="grippy-circles" id="auto-gippies">
            <p>                              </p>
          </div>
        </div>
        <div class="right section">
          <div class="right info-content">
            <div class="table-holder">
              <table class="matchByMatch">
                <thead>
                <th>Matches</th>
                <?php foreach($match['matches'] as $m) { ?>
                  <th><?=$m['match_number']?></th>
                <?php } ?>
                </thead>
                <tr>
                <th class="vertical" >Start Pos.</td>
                <?php foreach($match['matches'] as $m) { 
                  if($m['no_show']>0){ ?>
                  <td class = "bad-cell">Nshow</td>
                  <?php }
                  else if(true) { ?>
                  <td class = "<?=($m['start_location']==4)?"minor-caution-cell":"normal-cell" ?>" ><?=$m['start_location']?></td>
                  <?php } 
                  else { ?>
                  
                  <?php } ?>
                <?php } ?>
                </tr>
                <!--<th class="vertical" >Totes Moved</td>
                <?php foreach($d['matches'] as $m) {  ?>
                  <td class = "normal-cell"><?=$m['auto_totes_moved']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >3 Stack</td>
                <?php foreach($d['matches'] as $m) {  
                  if($m['auto_three_stack_attempt']>0){ 
                    if($m['auto_three_stack_score']>0){ ?>
                      <td><div class="icon-checkmark-2"></div></td>
                    <?php }
                    else{?>
                      <td class="bad-cell">X</td>
                    <?php }
                  } 
                  else { ?>
                  <td class = "didNotDo"></td>
                  <?php } ?>
                <?php } ?>
                </tr>
                <th class="vertical" >Cans Knocked</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['auto_cans_knocked']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Attempt Step</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['auto_can_grab_attempt']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Cans Knocked</td>
                <?php foreach($d['matches'] as $m) { //make fancy ?>
                  <td class = "normal-cell"><?=$m['auto_cans_grabed']?></td>
                  <?php } ?>
                </tr>
                <th class="vertical" >Auto Zone</td>
                <?php foreach($d['matches'] as $m) { 
                  if($m['auto_zone']>0){ ?>
                  <td><div class="icon-checkmark-2"></div></td>
                  <?php }
                  else { ?>
                  <td class="didNotDo">X</td>
                  <?php } ?>
                <?php } ?>
                </tr>-->
               
              </table>
            </div>
          </div>
        
        </div>
      </div>
    </div>
</div>
<br>
<br>
<form class="Searchforsearch" method="get" action="TeamInfoDisplay.php">
	<input type="number" name="team">
	<input type="submit" value="Search" class="subButton">
</form>
<br>
<br>
	<img src="/team_pics/<?=$team?>.png" width=400 height=400 class="image"></img>
<br>

	<h1><?php echo "Team " . $team. " - ".$teamname; ?></h1>
	<?php
		}
	}
	?>

<h3>Matches Played: <?=$dat["played"]?></h3>
<h1>Scoring</h1>
<table class="teamTable">
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
		<tr class="Row">
			<td class="teamTBody"><?=$dat['auto_high']?></td>
			<td class="teamTBody"><?=$dat['auto_High_Miss']?></td>
			<td class="teamTBody"><?php if($dat['auto_high_total'] > 0){ echo round($dat['auto_high']/$dat['auto_high_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td class="teamTBody"><?=$dat['auto_low']?></td>
			<td class="teamTBody"><?=$dat['auto_Low_Miss']?></td>
			<td class="teamTBody"><?php if($dat['auto_low_total'] > 0){ echo round($dat['auto_low']/$dat['auto_low_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td class="teamTBody"><?=$dat['auto_def_cross']?></td>
			<td class="teamTBody"><?=$dat['auto_Defenses_Crossed_Failed']?></td>
			<td class="teamTBody"><?=$dat['auto_def_reach']?></td>
			<td class="teamTBody"><?=$dat['auto_Defenses_Reached_Failed']?></td>
			<td class="teamTBody"><?=$dat['Auto_StartWithBoulder']?></td>
			<td class="teamTBody"><?=$dat['boulder_grabs']?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "18">Shooting Statistics High</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Teleop High Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop High Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop High Goal %</th>
			<th class='topTime'rowspan = "1" colspan = "1">Batter High Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Batter High Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Batter High %</th>
			<th class='topTime'rowspan = "1" colspan = "1">Court High Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Court High Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Court High %</th>
		</tr>
	</thead>
	<tbody>
	
		<tr class="Row">
			<td class="teamTBody"><?=$dat['teleop_high']?></td>
			<td class="teamTBody"><?=$dat['teleop_high_miss']?></td>
			<td class="teamTBody"><?php if($dat['teleop_high_total'] > 0){echo round($dat['teleop_high']/$dat['teleop_high_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td class="teamTBody"><?=$dat['batter_high']?></td>
			<td class="teamTBody"><?=$dat['batter_high_miss']?></td>
			<td class="teamTBody"><?php if($dat['batter_high_total'] > 0){echo round($dat['batter_high']/$dat['batter_high_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td class="teamTBody"><?=$dat['courtyard_high']?></td>
			<td class="teamTBody"><?=$dat['courtyard_high_miss']?></td>
			<td class="teamTBody"><?php if($dat['court_high_total'] > 0){echo round($dat['courtyard_high']/$dat['court_high_total'] * 100,2); }else{ echo "0"; }?>%</td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "18">Shooting Statistics Low</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Teleop Low Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop Low Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Teleop Low Goals %</th>
			<th class='topTime'rowspan = "1" colspan = "1">Batter Low Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Batter Low Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Batter Low %</th>
			<th class='topTime'rowspan = "1" colspan = "1">Court Low Goals Made</th>
			<th class='topTime'rowspan = "1" colspan = "1">Court Low Goals Missed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Court Low %</th>
		</tr>
	</thead>
	<tbody>
	
		<tr class="Row">
			<td class="teamTBody"><?=$dat['teleop_low']?></td>
			<td class="teamTBody"><?=$dat['teleop_low_miss']?></td>
			<td class="teamTBody"><?php if($dat['teleop_low_total'] > 0){echo round($dat['teleop_low']/$dat['teleop_low_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td class="teamTBody"><?=$dat['batter_low']?></td>
			<td class="teamTBody"><?=$dat['batter_low_miss']?></td>
			<td class="teamTBody"><?php if($dat['batter_low_total'] > 0){echo round($dat['batter_low']/$dat['batter_low_total'] * 100,2); }else{ echo "0"; }?>%</td>
			<td class="teamTBody"><?=$dat['courtyard_low']?></td>
			<td class="teamTBody"><?=$dat['courtyard_low_miss']?></td>
			<td class="teamTBody"><?php if($dat['court_low_total'] > 0){echo round($dat['courtyard_low']/$dat['court_low_total'] * 100,2); }else{ echo "0"; }?>%</td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="teamTable">
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
		<tr class="Row">
			<td class="teamTBody"><?=$dat['challenge']?></td>
			<td class="teamTBody"><?=$dat['climbs']?></td>
		</tr>
	</tbody>
		
</table>
<br>
<h1>Outer Works Stats</h1>
<br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "5">Low Bar</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1"> Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
			<td class="teamTBody"><?=$dat['lowbar_faced']?></td>
			<?php
			if($dat['lowbar_faced']>0)
			{
			?>
			<td class="teamTBody"><?=$dat['lowbar_cross'] /*/ $dat['lowbar_faced']*/?></td>
			<td class="teamTBody"><?=$dat['lowbar_speed'] / $dat['lowbar_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['lowbar_stuck'] /*/ $dat['lowbar_faced']*/?></td>-->
			<td class="teamTBody"><?=$dat['lowbar_ball'] /*/ $dat['lowbar_faced']*/?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td>0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
			
		</tr>
	</tbody>
		
</table>
<br>
<table class="teamTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category A</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Portcullis</th>
			<th class='topTime'rowspan = "1" colspan = "4">Cheval De Frise</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
		<?php
			if($dat['portcullis_faced']>0)
			{
		?>
			<td class="teamTBody"><?=$dat['portcullis_faced']?></td>
			<td class="teamTBody"><?=$dat['portcullis_cross'] /*/ $dat['portcullis_faced']*/?></td>
			<td class="teamTBody"><?=$dat['portcullis_speed'] / $dat['portcullis_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['portcullis_stuck'] // $dat['portcullis_faced']?></td>-->
			<td class="teamTBody"><?=$dat['portcullis_ball'] /*/ $dat['portcullis_faced']*/?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['chili_fries_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['chili_fries_faced']?></td>
			<td class="teamTBody"><?=$dat['chili_fries_cross'] /*/ $dat['chili_fries_faced']*/?></td>
			<td class="teamTBody"><?=$dat['chili_fries_speed'] / $dat['chili_fries_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['chili_fries_stuck'] // $dat['chili_fries_faced']?></td>-->
			<td class="teamTBody"><?=$dat['chili_fries_ball'] /*/ $dat['chili_fries_faced']*/?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
		</tr>
	</tbody>
		
</table>
<br>
<table class="teamTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category B</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Moat</th>
			<th class='topTime'rowspan = "1" colspan = "4">Ramparts</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
			<?php
				if($dat['moat_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['moat_faced']?></td>
			<td class="teamTBody"><?=$dat['moat_cross'] /*/ $dat['moat_faced']*/?></td>
			<td class="teamTBody"><?=$dat['moat_speed'] / $dat['moat_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['moat_stuck']//$dat['moat_faced']?></td>-->
			<td class="teamTBody"><?=$dat['moat_ball'] /*/ $dat['moat_faced']*/?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['ramparts_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['ramparts_faced']?></td>
			<td class="teamTBody"><?=$dat['ramparts_cross'] /*/ $dat['ramparts_faced']*/?></td>
			<td class="teamTBody"><?=$dat['ramparts_speed'] / $dat['ramparts_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['ramparts_stuck'] // $dat['ramparts_faced']?></td>-->
			<td class="teamTBody"><?=$dat['ramparts_ball'] // $dat['ramparts_faced']?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
		</tr>
	</tbody>
		
</table>
<br>
<table class="teamTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category C</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Drawbridge</th>
			<th class='topTime'rowspan = "1" colspan = "4">Sally Port</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
			<?php
				if($dat['drawbridge_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['drawbridge_faced']?></td>
			<td class="teamTBody"><?=$dat['drawbridge_cross'] // $dat['drawbridge_faced']?></td>
			<td class="teamTBody"><?=$dat['drawbridge_speed'] / $dat['drawbridge_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['drawbridge_stuck'] // $dat['drawbridge_faced']?></td>-->
			<td class="teamTBody"><?=$dat['drawbridge_ball'] // $dat['drawbridge_faced']?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['sally_port_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['sally_port_faced']?></td>
			<td class="teamTBody"><?=$dat['sally_port_cross'] // $dat['sally_port_faced']?></td>
			<td class="teamTBody"><?=$dat['sally_port_speed'] / $dat['sally_port_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['sally_port_stuck'] // $dat['sally_port_faced']?></td>-->
			<td class="teamTBody"><?=$dat['sally_port_ball'] // $dat['sally_port_faced']?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
		</tr>
	</tbody>
		
</table>
<br>
<table class="teamTable">
	<thead>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "10">Category D</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4">Rough Terrain</th>
			<th class='topTime'rowspan = "1" colspan = "4">Rock Wall</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
			
			<th class='topTime'rowspan = "1" colspan = "1">Appearances</th>
			<th class='topTime'rowspan = "1" colspan = "1">Crossed</th>
			<th class='topTime'rowspan = "1" colspan = "1">Avg.Speed</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Stuck</th>-->
			<th class='topTime'rowspan = "1" colspan = "1">BALLS!!!</th>
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
			<?php
				if($dat['rough_terrain_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['rough_terrain_faced']?></td>
			<td class="teamTBody"><?=$dat['rough_terrain_cross'] // $dat['rough_terrain_faced']?></td>
			<td class="teamTBody"><?=$dat['rough_terrain_speed'] / $dat['rough_terrain_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['rough_terrain_stuck'] // $dat['rough_terrain_faced']?></td>-->
			<td class="teamTBody"><?=$dat['rough_terrain_ball'] // $dat['rough_terrain_faced']?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
			
			<?php
				if($dat['rockwall_faced']>0)
				{
			?>
			<td class="teamTBody"><?=$dat['rockwall_faced']?></td>
			<td class="teamTBody"><?=$dat['rockwall_cross'] // $dat['rockwall_faced']?></td>
			<td class="teamTBody"><?=$dat['rockwall_speed'] / $dat['rockwall_faced']?></td>
			<!--<td class="teamTBody"><?=$dat['rockwall_stuck'] // $dat['rockwall_faced']?></td>-->
			<td class="teamTBody"><?=$dat['rockwall_ball']  // $dat['rockwall_faced']?></td>
			<?php
				}
				else{
					?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<td class="teamTBody">0</td>
					<?php
				}
			?>
		</tr>
	</tbody>
		
</table>

<br>
<h1>Other</h1>
<br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "7">Alerts</th>
		</tr>
		<tr class="topRow">
			<th class='topTime' rowspan = "1" colspan = "1">Fouls</th>
			<th class='topTime' rowspan = "1" colspan = "1">Tech Fouls</th>
			<th class='topTime' rowspan = "1" colspan = "1">No Shows</th>
			<th class='topTime' rowspan = "1" colspan = "1">Mechanical Failures</th>
			<th class='topTime' rowspan = "1" colspan = "1">Lost Communication</th>
			<th class='topTime' rowspan = "1" colspan = "1">Tipped</th>
			<th class='topTime' rowspan = "1" colspan = "1">Stuck</th>
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
			<td class="teamTBody"><?=$dat['fouls']?></td>
			<td class="teamTBody"><?=$dat['tech_fouls']?></td>
			<td class="teamTBody"><?=$dat['no_show']?></td>
			<td class="teamTBody"><?=$dat['mech_fail']?></td>
			<td class="teamTBody"><?=$dat['lost_comms']?></td>
			<td class="teamTBody"><?=$dat['tipped']?></td>
			<td class="teamTBody"><?=$dat['stuck']?></td>
		</tr>
	</tbody>
		
</table>
<br><br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "3">Driver Data Averages</th>
		</tr>
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "1">Driving/Maneuverability</th>
			<th class='topTime'rowspan = "1" colspan = "1">Defense/Pushing</th>
			<th class='topTime'rowspan = "1" colspan = "1">Ball Control</th>
			<!--<th class='topTime'rowspan = "1" colspan = "1">Pushing</th>-->
		</tr>
	</thead>
	<tbody>
		<tr class="Row">
		<?php
		if($dat["played"] > 0)
		{
			?>
			<td class="teamTBody"><?=$dat['drive_manuverability'] / $dat["played"]?></td>
			<td class="teamTBody"><?=$dat['Defense_Pushing'] / $dat["played"]?></td>
			<td class="teamTBody"><?=$dat['Ball_Control'] / $dat["played"]?></td>
			<!--<td class="teamTBody"><?=$dat['pushing'] / $dat["played"]?></td>-->
			<?php
		}
		else
		{
			?>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<td class="teamTBody">0</td>
			<!--<td class="teamTBody">0</td>-->
			<?php
		}
			?>
		</tr>
	</tbody>
	
</table>
<br><br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime'rowspan = "1" colspan = "4"> Average Defense Time%</th>
		</tr>
	</thead>
	<tbody>
		<tr class="teamRow">
		<?php
		if($dat["played"] > 0)
		{
			?>
			<td class="teamTBody"><?=$dat['defense'] / $dat["played"];?>%</td>
		<?php
		}
		else
		{
			?>
			<td class="teamTBody">Data Unavailable</td>
			<?php
		}
			?>
		</tr>
	</tbody>
	
</table>
<br>
<table class="teamTable">
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
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(0); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][0]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(1); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][1]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(2); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][2]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(3); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][3]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(4); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][4]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(5); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][5]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(6); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][6]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(7); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][7]?></td>
		</tr>
		<tr class="teamRow">
			<td class="teamTBody"><?= getDefenseName(8); ?></td>
			<td class="teamTBody"><?=$dat['def_prefs'][8]?></td>
		</tr>
	</tbody>
		
</table>
<br>
<h1>Match Notes</h1>
<br><br>
<table class="teamTable">
	<thead>
		
		<tr class="topRow">
			<th class='topTime' rowspan = "1" colspan = "1">Match #</th>
			<th class='topTime' rowspan = "1" colspan = "4">Notes</th>
		</tr>
	</thead>
	<tbody>	
		<?php
			$note_query = "SELECT `match_number`,`notes`,`team` FROM `notes` WHERE team='$team' ORDER BY `match_number` ASC";
			$notes = $mysqli->query($note_query);
			
			while($row = $notes->fetch_array(MYSQLI_ASSOC))
			{
				?>
				<tr class="teamRow">
					<td class="teamTBody"><?=$row["match_number"]?></td>
					<td class="teamTBody"><?=$row["notes"]?></td>
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
<table class="teamTable">
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
					<tr class="teamRow">
						<td class="teamTBody"><?=$row["notes"]?></td>
					</tr>
					<?php
				}
			}
		?>
	</tbody>
</table>
<h1>Match-By-Match</h1>
<table class="teamTable">
	<thead>
		<tr>
			<th class="topTime" rowspan = "1" colspan = "6">Match Defense Statistics</th>
			<th class="topTime" rowspan = "1" colspan = "5">Defense Stats<br>Ball,Crossed,Speed</th>
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
		<tr class="teamRow">
			<td class="teamTBody"><?=$playerMatch?></td>
			<td class="teamTBody"><?=getDefenseName($match['def_pos_types'][0])?></td>
			<td class="teamTBody"><?=getDefenseName($match['def_pos_types'][1])?></td>
			<td class="teamTBody"><?=getDefenseName($match['def_pos_types'][2])?></td>
			<td class="teamTBody"><?=getDefenseName($match['def_pos_types'][3])?></td>
			<td class="teamTBody"><?=getDefenseName($match['def_pos_types'][4])?></td>
			<td class="teamTBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_speed']//.','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][0]))).'_stuck']?></td>
			<td class="teamTBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_speed']//.','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][1]))).'_stuck']?></td>
			<td class="teamTBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_speed']//.','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][2]))).'_stuck']?></td>
			<td class="teamTBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_speed']//.','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][3]))).'_stuck']?></td>
			<td class="teamTBody"><?=$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_ball'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_cross'].','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_speed']//.','.$match[strtolower(str_replace(' ','_',getDefenseName($match['def_pos_types'][4]))).'_stuck']?></td>
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
<table class="teamTable">
	<thead>
		<tr>
			<th class="topTime" rowspan = "1" colspan = "10">Match Shooting Statistics</th>
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
			<th class="topTime"rowspan = "1" colspan = "1">Shooting Location</th>
		</tr>
	</tbody>
	<tbody>
		<?php
			while($row = $result2->fetch_array(MYSQLI_ASSOC))
			{
				$playerMatch = $row["match_number"];
				$match = getTeamMatchData($mysqli, $team, $playerMatch);
		?>
		<tr class="teamRow">
			<td class="teamTBody"><?=$playerMatch;?></td>
			<td class="teamTBody"><?php if($match['auto_high_total'] > 0){ echo round($match['auto_high']/$match['auto_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['auto_low_total'] > 0){ echo round($match['auto_low']/$match['auto_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['teleop_high_total'] > 0){ echo round($match['teleop_high']/$match['teleop_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['teleop_low_total'] > 0){ echo round($match['teleop_low']/$match['teleop_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['batter_high_total'] > 0){ echo round($match['batter_high']/$match['batter_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['batter_low_total'] > 0){ echo round($match['batter_low']/$match['batter_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['court_high_total'] > 0){ echo round($match['courtyard_high']/$match['court_high_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?php if($match['court_low_total'] > 0){ echo round($match['courtyard_low']/$match['court_low_total'] * 100,2).'%'; }else{ echo "N/A"; }?></td>
			<td class="teamTBody"><?=$match['shooting_location']?></td>
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
<table class="teamTable">
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
			<th class="topTime"rowspan = "1" colspan = "1">Stuck</th>
		</tr>
	</tbody>
	<tbody>
		<?php
			while($row = $result3->fetch_array(MYSQLI_ASSOC))
			{
				$playerMatch = $row["match_number"];
				$match = getTeamMatchData($mysqli, $team, $playerMatch);
		?>
		<tr class="teamRow">
			<td class="teamTBody"><?=$playerMatch?></td>
			<td class="teamTBody"><?=$match['fouls']?></td>
			<td class="teamTBody"><?=$match['tech_fouls']?></td>
			<td class="teamTBody"><?=$match['no_show']?></td>
			<td class="teamTBody"><?=$match['mech_fail']?></td>
			<td class="teamTBody"><?=$match['lost_comms']?></td>
			<td class="teamTBody"><?=$match['tipped']?></td>
			<td class="teamTBody"><?=$match['stuck']?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<br>

<?php
	//var_dump($dat);
?>
<br>
<br>
</div>