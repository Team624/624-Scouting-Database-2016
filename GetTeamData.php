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