
<?php
//Check to make sure the drive team is logged in
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");

if(isset($valid_user) && isset($user_type))
{
	if($valid_user && $user_type=="driver")
	{
		include("navbar.php");
		include("api_connect.php");
		include("db_connect.php");
		/*
		$url = "https://frc-api.firstinspires.org/v2.0/2015/schedule/txho?tournamentLevel=Qualification&teamNumber=624";
		$response = file_get_contents($url,false,$context);
		*/
		$teamsList = [];
		
		$matches_query = "SELECT * FROM `schedule` WHERE (`red_1`=624 OR `red_2`=624 OR `red_3`=624 OR `blue_1`=624 OR `blue_2`=624 OR `blue_3`=624)";
		$result = $mysqli->query($matches_query);
?>	
<?php
	function getTeamData($mysqli,$team_num)
	{
		$team_query = "SELECT * FROM `match_data` WHERE team_number = '$team_num'";//(`red1`='$team_num' OR `red2`='$team_num' OR `red3`='$team_num' OR `blue1`='$team_num' OR `blue2`='$team_num' OR `blue3`='$team_num')";
		$result = $mysqli->query($team_query);
		
		$data = [];
		
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data["auto_high"] += $row['auto_High_Scored']; 
			$data["auto_high_total"] += $row['auto_High_Miss'] + $row['auto_High_Scored']; 
			$data["auto_low"] += $row['auto_Low_Scored']; 
			$data["auto_low_total"] += $row['auto_Low_Miss'] + $row['auto_Low_Scored']; 
			
			$data["auto_def_cross"] += $row['auto_Defenses_Crossed_Sucess'];
			$data["auto_def_cross_total"] += $row['auto_Defenses_Crossed_Sucess'] + $row['auto_Defenses_Crossed_Failed'];
			
			$data["auto_def_reach"] += $row['auto_Defenses_Crossed_Sucess'];
			$data["auto_def_reach_total"] += $row['auto_Defenses_Crossed_Sucess'] + $row['auto_Defenses_Crossed_Failed'];
			
			$defenseList = [];
			$defenseList[] = $row['def_category_1'];
			$defenseList[] = $row['def_category_2'];
			$defenseList[] = $row['def_category_3'];
			$defenseList[] = $row['def_category_4'];
			$defenseList[] = $row['def_category_5'];
			
			$def = 1;
			
			$data['lowbar_pos'] = [];
			$data['portcullis_pos'] = [];
			$data['chili_fries_pos'] = [];
			$data['moat_pos'] = [];
			$data['ramparts_pos'] = [];
			$data['drawbridge_pos'] = [];
			$data['sally_port_pos'] = [];
			$data['rockwall_pos'] = [];
			$data['rough_terrain_pos'] = [];
			
			foreach($defenseList as $d)
			{
				//sort things based on which type it is
				/*
				0 - Low bar
				1 - Portcullis
				2 - Cheval de Frise
				3 - Moat
				4 - Ramparts
				5 - Drawbridge
				6 - Sally Port
				7 - Rock Wall
				8 - Rough Terrain
				*/
				if($t==0)
				{
					$data['lowbar_cross'] += $row['def_'.$def.'_crossed'];
					$data['lowbar_stuck'] += $row['def_'.$def.'_stuck'];
					$data['lowbar_weak'] += $row['def_'.$def.'_weakened'];
					$data['lowbar_speed'] += $row['def_'.$def.'_speed'];
					$data['lowbar_ball'] += $row['def_'.$def.'_ball'];
					$data['lowbar_pos'][] = $def;
				}
				else if($t==1)
				{
					$data['portcullis_cross'] += $row['def_'.$def.'_crossed'];
					$data['portcullis_stuck'] += $row['def_'.$def.'_stuck'];
					$data['portcullis_weak'] += $row['def_'.$def.'_weakened'];
					$data['portcullis_speed'] += $row['def_'.$def.'_speed'];
					$data['portcullis_ball'] += $row['def_'.$def.'_ball'];
					$data['portcullis_pos'][] = $def;
				}
				else if($t==2)
				{
					$data['chili_fries_cross'] += $row['def_'.$def.'_crossed'];
					$data['chili_fries_stuck'] += $row['def_'.$def.'_stuck'];
					$data['chili_fries_weak'] += $row['def_'.$def.'_weakened'];
					$data['chili_fries_speed'] += $row['def_'.$def.'_speed'];
					$data['chili_fries_ball'] += $row['def_'.$def.'_ball'];
					$data['chili_fries_pos'][] = $def;
				}
				else if($t==3)
				{
					$data['moat_cross'] += $row['def_'.$def.'_crossed'];
					$data['moat_stuck'] += $row['def_'.$def.'_stuck'];
					$data['moat_weak'] += $row['def_'.$def.'_weakened'];
					$data['moat_speed'] += $row['def_'.$def.'_speed'];
					$data['moat_ball'] += $row['def_'.$def.'_ball'];
					$data['moat_pos'][] = $def;
				}
				else if($t==4)
				{
					$data['ramparts_cross'] += $row['def_'.$def.'_crossed'];
					$data['ramparts_stuck'] += $row['def_'.$def.'_stuck'];
					$data['ramparts_weak'] += $row['def_'.$def.'_weakened'];
					$data['ramparts_speed'] += $row['def_'.$def.'_speed'];
					$data['ramparts_ball'] += $row['def_'.$def.'_ball'];
					$data['ramparts_pos'][] = $def;
				}
				else if($t==5)
				{
					$data['drawbridge_cross'] += $row['def_'.$def.'_crossed'];
					$data['drawbridge_stuck'] += $row['def_'.$def.'_stuck'];
					$data['drawbridge_weak'] += $row['def_'.$def.'_weakened'];
					$data['drawbridge_speed'] += $row['def_'.$def.'_speed'];
					$data['drawbridge_ball'] += $row['def_'.$def.'_ball'];
					$data['drawbridge_pos'][] = $def;
				}
				else if($t==6)
				{
					$data['sally_port_cross'] += $row['def_'.$def.'_crossed'];
					$data['sally_port_stuck'] += $row['def_'.$def.'_stuck'];
					$data['sally_port_weak'] += $row['def_'.$def.'_weakened'];
					$data['sally_port_speed'] += $row['def_'.$def.'_speed'];
					$data['sally_port_ball'] += $row['def_'.$def.'_ball'];
					$data['sally_port_pos'][] = $def;
				}
				else if($t==7)
				{
					$data['rockwall_cross'] += $row['def_'.$def.'_crossed'];
					$data['rockwall_stuck'] += $row['def_'.$def.'_stuck'];
					$data['rockwall_weak'] += $row['def_'.$def.'_weakened'];
					$data['rockwall_speed'] += $row['def_'.$def.'_speed'];
					$data['rockwall_ball'] += $row['def_'.$def.'_ball'];
					$data['rockwall_pos'][] = $def;
				}
				else if($t==8)
				{
					$data['rough_terrain_cross'] += $row['def_'.$def.'_crossed'];
					$data['rough_terrain_stuck'] += $row['def_'.$def.'_stuck'];
					$data['rough_terrain_weak'] += $row['def_'.$def.'_weakened'];
					$data['rough_terrain_speed'] += $row['def_'.$def.'_speed'];
					$data['rough_terrain_ball'] += $row['def_'.$def.'_ball'];
					$data['rough_terrain_pos'][] = $def;
				}
				$def++;
			}
		}

		return $data;		
	}
?>


<!-- Make this page Tablet Friendly -->
<body onload="load()">
<head>
	<link rel="stylesheet" type="text/css" href="css/DankDriverPageStyle.css">
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css"> 
	<link rel="stylesheet" type="text/css" href="css/dataform.css">
</head>

<script src="./scripts/dropdown.js"></script>

<div class="page_container">
	<div class="form_container">
		<form class="datafield" method="post">
<div class="container">
<br>
<br><br>
	<h2 class=drivers><span>Drive Team Page</span></h2>
	
	<h2 class=drivers>Upcoming Matches</h2>

	<ul id="match_list">
	<?php 
		/*
		$json = json_decode($response, true);
		//echo json_encode($json, JSON_PRETTY_PRINT);
		
		
		foreach($json as $schedule)
		{
			foreach($schedule as $match)
			{
				*/
		$it = 0;
		
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
				
				$description = "Qualification " . $row['match_number'];
				?>
				<li class="slideli" id="slide_li_<?= $it ?>">
					<span class="collapseView" id="slide_span_<?= $it ?>">
						<button class="slidebutton" id="slide_button_<?= $it ?>" onclick="expand('<?= $it ?>')" type="button">-</button>
						<?php echo $description; ?>
					</span>
				</li>
				<div id="slide_<?= $it ?>" class="slidediv">
				
				<?php
					$iter = 1;
					$red = true;
					$teamsList = [];
					$teamsList[] = $row['red_1'];
					$teamsList[] = $row['red_2'];
					$teamsList[] = $row['red_3'];
					$teamsList[] = $row['blue_1'];
					$teamsList[] = $row['blue_2'];
					$teamsList[] = $row['blue_3'];
					/*
					foreach($match["Teams"] as $teams)
					{*/
					foreach($teamsList as $teams)
					{
						//$teamsList[] = $teams["teamNumber"];
						
						if($teams == 624)
						{
							if($iter > 3)
							{
								$red=false;
							}
						}
						
						$iter++;
					}
					//}
					
					//var_dump($teamsList);
				?>
				<h3 style="color:#000"> Our Alliance </h3>
				<?php
					if($red == true)
					{
						?>
						<table>
							<tr>		
								<td></td>
								<td class="red_text">Red 1</td>
								<td class="red_text">Red 2</td>
								<td class="red_text">Red 3</td>
							</tr>
						<?php
						$iter=0;
						$limit=2;
					}
					else
					{
						?>
						
						<table>
							<tr>
								<td></td>
								<td class="blue_text">Blue 1</td>
								<td class="blue_text">Blue 2</td>
								<td class="blue_text">Blue 3</td>
							</tr>
						<?php
						$iter=3;
						$limit=5;
					}
					?>
					<tr>
					<td></td>
					<?php
					
					$data = [];
					
					for(;$iter<=$limit;$iter++)
					{
						$data[] = getTeamData($mysqli,$teamsList[$iter]);
						?>
						<td><a href="TeamInfoDisplay.php?team=<?=$teamsList[$iter]?>"><?=$teamsList[$iter]?></td>
						<?php
					}
					
				?>
				
				
					</tr>
					<tr>
						<td>Favorite Defense</td>
						
					</tr>
					<tr>
						<td>Least Favorite Defense</td>
					</tr>
					<tr>
						<td>Preferred Starting Position</td>
					</tr>
					<tr>
						<td>Auto Reach</td>
						<td><?=$data[0]['auto_def_reach']?> / <?=$data[0]['auto_def_reach_total']?></td>
						<td><?=$data[1]['auto_def_reach']?> / <?=$data[1]['auto_def_reach_total']?></td>
						<td><?=$data[2]['auto_def_reach']?> / <?=$data[2]['auto_def_reach_total']?></td>
					</tr>
					<tr>
						<td>Auto Cross</td>
						<td><?=$data[0]['auto_def_cross']?> / <?=$data[0]['auto_def_cross_total']?></td>
						<td><?=$data[1]['auto_def_cross']?> / <?=$data[1]['auto_def_cross_total']?></td>
						<td><?=$data[2]['auto_def_cross']?> / <?=$data[2]['auto_def_cross_total']?></td>
					</tr>
					<tr>
						<td>Auto Low Goal</td>
					</tr>
					<tr>
						<td>Auto High Goal</td>
						<td><?=$data[0]['auto_high']?> / <?=$data[0]['auto_high_total']?></td>
						<td><?=$data[1]['auto_high']?> / <?=$data[1]['auto_high_total']?></td>
						<td><?=$data[2]['auto_high']?> / <?=$data[2]['auto_high_total']?></td>
					</tr>
					<tr>
						<td>Teleop Low Goal</td>
					</tr>
					<tr>
						<td>Teleop High Goal</td>
					</tr>
					<tr>
						<td>Climb?</td>
					</tr>
					<tr>
					<td>Fouls</td>
					</tr>
					<tr>
						<td>Tech Fouls</td>
					</tr>
				</table>
				<h3 style="color:#000"> Our Opposition </h3>
				<?php
					if($red == false)
					{
						?>
						<table>
							<tr>	
								<td></td>
								<td class="red_text">Red 1</td>
								<td class="red_text">Red 2</td>
								<td class="red_text">Red 3</td>
							</tr>
						<?php
						$iter=0;
						$limit=2;
					}
					else
					{
						?>
						
						<table>
							<tr>
								<td></td>
								<td class="blue_text">Blue 1</td>
								<td class="blue_text">Blue 2</td>
								<td class="blue_text">Blue 3</td>
							</tr>
						<?php
						$iter=3;
						$limit=5;
					}
					?>
					<tr>
						<td></td>
					<?php
					for(;$iter<=$limit;$iter++)
					{
						?>
						<td><?=$teamsList[$iter]?></td>
						
						<?php
					}
				?>
				</tr>
				<tr>
					<td>Favorite Defense</td>
				</tr>
				<tr>
					<td>Least Favorite Defense</td>
				</tr>
				<tr>
					<td>Center Boulder Grab</td>
				</tr>
				<tr>
					<td>Teleop Low Goal %</td>
				</tr>
				<tr>
					<td>Teleop High Goal %</td>
				</tr>
				<tr>
					<td>Fouls</td>
				</tr>
				<tr>
					<td>Tech Fouls</td>
				</tr>
				</table>	
					
					
				</div>
				<br>
				<?php
				$it++;
		}
//			}
//		}
		
		
		//echo json_encode($match, JSON_PRETTY_PRINT);
				
				//echo $item['description'];
	?>
	</ul>
	
</div>

<?php
	}
}
?>