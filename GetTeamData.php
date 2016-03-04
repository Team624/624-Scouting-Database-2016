<?php

	function getDefenseName($index)
	{
		if($index==0)
		{
			return "Low Bar";
		}
		if($index==1)
		{
			return "Portcullis";
		}
		if($index==2)
		{
			return "Chili Fries";
		}
		if($index==3)
		{
			return "Moat";
		}
		if($index==4)
		{
			return "Ramparts";
		}
		if($index==5)
		{
			return "Drawbridge";
		}
		if($index==6)
		{
			return "Sally Port";
		}
		if($index==7)
		{
			return "Rock Wall";
		}
		if($index==8)
		{
			return "Rough Terrain";
		}
	}
	function scoreOuterWork($ball,$cross,$speed,$stuck,$faced)
	{
		$score = 0;
		
		$score += ($ball * 5);
		$score += ($cross * 10);
		$score += ($speed * 7.5);
		$score -= ($stuck * 10);
		
		if($faced > 0)
		{
			$score = $score / $faced;
			return $score;
		}
		
		return 0;
		
	}
	
	function getTeamData($mysqli,$team_num)
	{
		$team_query = "SELECT * FROM `match_data` WHERE team_number = '$team_num'";//(`red1`='$team_num' OR `red2`='$team_num' OR `red3`='$team_num' OR `blue1`='$team_num' OR `blue2`='$team_num' OR `blue3`='$team_num')";
		$result = $mysqli->query($team_query);
		
		$data = [];
		
		$match = 1;
		$data['lowbar_faced'] = 0;
		$data['portcullis_faced'] = 0;
		$data['chili_fries_faced'] = 0;
		$data['moat_faced'] = 0;
		$data['ramparts_faced'] = 0;
		$data['drawbridge_faced'] = 0;
		$data['sally_port_faced'] = 0;
		$data['rockwall_faced'] = 0;
		$data['rough_terrain_faced'] = 0;
		
		
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data["auto_high"] += $row['auto_High_Scored']; 
			$data["auto_High_Miss"] += $row['auto_High_Miss']; 
			$data["auto_high_total"] += $row['auto_High_Miss'] + $row['auto_High_Scored']; 
			$data["auto_low"] += $row['auto_Low_Scored']; 
			$data["auto_Low_Miss"] += $row['auto_Low_Miss']; 
			$data["auto_low_total"] += $row['auto_Low_Miss'] + $row['auto_Low_Scored']; 
			
			$data["auto_def_cross"] += $row['auto_Defenses_Crossed_Sucess'];
			$data["auto_Defenses_Crossed_Failed"] += $row['auto_Defenses_Crossed_Failed'];
			$data["auto_def_cross_total"] += $row['auto_Defenses_Crossed_Sucess'] + $row['auto_Defenses_Crossed_Failed'];
			
			$data["auto_Defenses_Reached_Failed"] += $row['auto_Defenses_Reached_Failed'];
			$data["auto_def_reach"] += $row['auto_Defenses_Reached_Sucess'];
			$data["auto_def_reach_total"] += $row['auto_Defenses_Reached_Sucess'] + $row['auto_Defenses_Reached_Failed'];
			
			$data["batter_high"] += $row['batter_high_Scored'];
			$data["batter_high_miss"] += $row['batter_high_Miss'];
			$data["courtyard_high"] += $row['courtyard_high_Scored'];
			$data["courtyard_high_miss"] += $row['courtyard_high_Miss'];
			
			$data["batter_low"] += $row['batter_low_Scored'];
			$data["batter_low_miss"] += $row['batter_low_Miss'];
			$data["courtyard_low"] += $row['courtyard_low_Scored'];
			$data["courtyard_low_miss"] += $row['courtyard_low_Miss'];
			
			$data["teleop_high"] += $row['courtyard_high_Scored'] +  $row['batter_high_Scored'];
			$data["teleop_low"] += $row['courtyard_low_Scored'] +  $row['batter_low_Scored'];
			
			$data["teleop_high_miss"] += $row['courtyard_high_Miss'] +  $row['batter_high_Miss'];
			$data["teleop_low_miss"] += $row['courtyard_low_Miss'] +  $row['batter_low_Miss'];
			
			$data["teleop_high_total"] += $row['courtyard_high_Scored'] +  $row['batter_high_Scored'] + $row['batter_high_Miss'] + $row['courtyard_high_Miss'];
			$data["teleop_low_total"] += $row['courtyard_low_Scored'] +  $row['batter_low_Scored'] + $row['batter_low_Miss'] + $row['courtyard_low_Miss'];
			
			$data["challenge"] += $row['challenge_Sucess'];
			$data["climbs"] += $row['scaled_Sucess'];
			
			
			$data["no_show"] += $row['no_show'];
			$data["mech_fail"] += $row['mech_fail'];
			$data["lost_comms"] += $row['lost_comms'];
			$data["tipped"] += $row['tipped'];
			$data["fouls"] += $row['fouls'];
			$data["tech_fouls"] += $row['tech_fouls'];
			
			$data['boulder_grabs'] += $row['Auto_Boulder_Grab'];
			$data['Auto_StartWithBoulder'] += $row['Auto_StartWithBoulder'];
			
			$data['drive_manuverability'] += $row['drive_manuverability'];
			$data['Defense_Pushing'] += $row['Defense_Pushing'];
			$data['Ball_Control'] += $row['Ball_Control'];
			$data['pushing'] += $row['pushing'];
			
			$data['defense'] = $row['defense'];
			
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
			
			foreach($defenseList as $t)
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
					$data['lowbar_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['lowbar_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['lowbar_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['lowbar_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['lowbar_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['lowbar_pos'][] = $def;
					$data['lowbar_faced']++;
				}
				else if($t==1)
				{
					$data['portcullis_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['portcullis_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['portcullis_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['portcullis_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['portcullis_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['portcullis_pos'][] = $def;
					$data['portcullis_faced']++;
				}
				else if($t==2)
				{
					$data['chili_fries_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['chili_fries_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['chili_fries_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['chili_fries_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['chili_fries_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['chili_fries_pos'][] = $def;
					$data['chili_fries_faced']++;
				}
				else if($t==3)
				{
					$data['moat_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['moat_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['moat_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['moat_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['moat_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['moat_pos'][] = $def;
					$data['moat_faced']++;
				}
				else if($t==4)
				{
					$data['ramparts_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['ramparts_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['ramparts_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['ramparts_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['ramparts_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['ramparts_pos'][] = $def;
					$data['ramparts_faced']++;
				}
				else if($t==5)
				{
					$data['drawbridge_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['drawbridge_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['drawbridge_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['drawbridge_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['drawbridge_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['drawbridge_pos'][] = $def;
					$data['drawbridge_faced']++;
				}
				else if($t==6)
				{
					$data['sally_port_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['sally_port_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['sally_port_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['sally_port_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['sally_port_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['sally_port_pos'][] = $def;
					$data['sally_port_faced']++;
				}
				else if($t==7)
				{
					$data['rockwall_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['rockwall_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['rockwall_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['rockwall_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['rockwall_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['rockwall_pos'][] = $def;
					$data['rockwall_faced']++;
				}
				else if($t==8)
				{
					$data['rough_terrain_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['rough_terrain_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['rough_terrain_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['rough_terrain_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['rough_terrain_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['rough_terrain_pos'][] = $def;
					$data['rough_terrain_faced']++;
				}
				$def++;
			}
			
			if(count($data['lowbar_pos']) != $match)
			{
				$data['lowbar_pos'][] = -1;
			}
			if(count($data['portcullis_pos']) != $match)
			{
				$data['portcullis_pos'][] = -1;
			}
			if(count($data['chili_fries_pos']) != $match)
			{
				$data['chili_fries_pos'][] = -1;
			}
			if(count($data['ramparts_pos']) != $match)
			{
				$data['ramparts_pos'][] = -1;
			}
			if(count($data['moat_pos']) != $match)
			{
				$data['moat_pos'][] = -1;
			}
			if(count($data['sally_port_pos']) != $match)
			{
				$data['sally_port_pos'][] = -1;
			}
			if(count($data['drawbridge_pos']) != $match)
			{
				$data['drawbridge_pos'][] = -1;
			}
			if(count($data['rockwall_pos']) != $match)
			{
				$data['rockwall_pos'][] = -1;
			}
			if(count($data['rough_terrain_pos']) != $match)
			{
				$data['rough_terrain_pos'][] = -1;
			}
			
			$match++;
		}
		
		$data["played"] = $match - 1;
		
		$favoritism = [];
		
		$favoritism[] = (int)scoreOuterWork($data['lowbar_ball'],$data['lowbar_cross'],$data['lowbar_speed'],$data['lowbar_stuck'],$data['lowbar_faced']);
		$favoritism[] = (int)scoreOuterWork($data['portcullis_ball'],$data['portcullis_cross'],$data['portcullis_speed'],$data['portcullis_stuck'],$data['portcullis_faced']);
		$favoritism[] = (int)scoreOuterWork($data['chili_fries_ball'],$data['chili_fries_cross'],$data['chili_fries_speed'],$data['chili_fries_stuck'],$data['chili_fries_faced']);
		$favoritism[] = (int)scoreOuterWork($data['moat_ball'],$data['moat_cross'],$data['moat_speed'],$data['moat_stuck'],$data['moat_faced']);
		$favoritism[] = (int)scoreOuterWork($data['ramparts_ball'],$data['ramparts_cross'],$data['ramparts_speed'],$data['ramparts_stuck'],$data['ramparts_faced']);
		$favoritism[] = (int)scoreOuterWork($data['drawbridge_ball'],$data['drawbridge_cross'],$data['drawbridge_speed'],$data['drawbridge_stuck'],$data['drawbridge_faced']);
		$favoritism[] = (int)scoreOuterWork($data['sally_port_ball'],$data['sally_port_cross'],$data['sally_port_speed'],$data['sally_port_stuck'],$data['sally_port_faced']);
		$favoritism[] = (int)scoreOuterWork($data['rockwall_ball'],$data['rockwall_cross'],$data['rockwall_speed'],$data['rockwall_stuck'],$data['rockwall_faced']);
		$favoritism[] = (int)scoreOuterWork($data['rough_terrain_ball'],$data['rough_terrain_cross'],$data['rough_terrain_speed'],$data['rough_terrain_stuck'],$data['rough_terrain_faced']);

		$data['def_prefs'] = $favoritism;
		
		arsort($favoritism);
		
		$def_iter = 0;
		foreach ($favoritism as $key => $val) {
			if($def_iter==8)
			{
				$data['hated_def_id'] = $key;
			}
			if($def_iter==0)
			{
				$data['favorite_def_id'] = $key;
			}
			$def_iter++;
		}
		
		$data['favorite_defense_name'] = getDefenseName($data['favorite_def_id']);
		$data['hated_defense_name'] = getDefenseName($data['hated_def_id']);
		
		return $data;		
	}
	
	
	
	//Single Match Team Data
	
	
	
	function getTeamMatchData($mysqli,$team_num,$match)
	{
		$team_query = "SELECT * FROM `match_data` WHERE team_number = '$team_num' AND `match_number`= '$match' LIMIT 1";//(`red1`='$team_num' OR `red2`='$team_num' OR `red3`='$team_num' OR `blue1`='$team_num' OR `blue2`='$team_num' OR `blue3`='$team_num')";
		$result = $mysqli->query($team_query);
		
		$data = [];
		
		$match = 1;
		$data['lowbar_faced'] = 0;
		$data['portcullis_faced'] = 0;
		$data['chili_fries_faced'] = 0;
		$data['moat_faced'] = 0;
		$data['ramparts_faced'] = 0;
		$data['drawbridge_faced'] = 0;
		$data['sally_port_faced'] = 0;
		$data['rockwall_faced'] = 0;
		$data['rough_terrain_faced'] = 0;
		
		
		while($row = $result->fetch_array(MYSQLI_ASSOC))
		{
			$data["auto_high"] += $row['auto_High_Scored']; 
			$data["auto_high_total"] += $row['auto_High_Miss'] + $row['auto_High_Scored']; 
			$data["auto_low"] += $row['auto_Low_Scored']; 
			$data["auto_low_total"] += $row['auto_Low_Miss'] + $row['auto_Low_Scored']; 
			
			$data["auto_def_cross"] += $row['auto_Defenses_Crossed_Sucess'];
			$data["auto_def_cross_total"] += $row['auto_Defenses_Crossed_Sucess'] + $row['auto_Defenses_Crossed_Failed'];
			
			$data["auto_def_reach"] += $row['auto_Defenses_Reached_Sucess'];
			$data["auto_def_reach_total"] += $row['auto_Defenses_Reached_Sucess'] + $row['auto_Defenses_Reached_Failed'];
			
			$data["batter_high"] += $row['batter_high_Scored'];
			$data["batter_high_miss"] += $row['batter_high_Miss'];
			$data["courtyard_high"] += $row['courtyard_high_Scored'];
			$data["courtyard_high_miss"] += $row['courtyard_high_Miss'];
			
			$data["batter_low"] += $row['batter_low_Scored'];
			$data["batter_low_miss"] += $row['batter_low_Miss'];
			$data["courtyard_low"] += $row['courtyard_low_Scored'];
			$data["courtyard_low_miss"] += $row['courtyard_low_Miss'];
			
			$data["teleop_high"] += $row['courtyard_high_Scored'] +  $row['batter_high_Scored'];
			$data["teleop_low"] += $row['courtyard_low_Scored'] +  $row['batter_low_Scored'];
			
			$data["teleop_high_miss"] += $row['courtyard_high_Missed'] +  $row['batter_high_Missed'];
			$data["teleop_low_miss"] += $row['courtyard_low_Missed'] +  $row['batter_low_Missed'];
			
			$data["teleop_high_total"] += $row['courtyard_high_Scored'] +  $row['batter_high_Scored'] + $row['batter_high_Miss'] + $row['courtyard_high_Miss'];
			$data["teleop_low_total"] += $row['courtyard_low_Scored'] +  $row['batter_low_Scored'] + $row['batter_low_Miss'] + $row['courtyard_low_Miss'];
			
			$data["challenge"] += $row['challenge_Sucess'];
			$data["climbs"] += $row['scaled_Sucess'];
			
			$data["fouls"] += $row['fouls'];
			$data["tech_fouls"] += $row['tech_fouls'];
			$data["no_show"] += $row['no_show'];
			$data["mech_fail"] += $row['mech_fail'];
			$data["lost_comms"] += $row['lost_comms'];
			$data["tipped"] += $row['tipped'];
			
			$data['boulder_grabs'] += $row['Auto_Boulder_Grab'];
			
			$data['defense'] += $row['defense'];
			
			$defenseList = [];
			$defenseList[] = $row['def_category_1'];
			$defenseList[] = $row['def_category_2'];
			$defenseList[] = $row['def_category_3'];
			$defenseList[] = $row['def_category_4'];
			$defenseList[] = $row['def_category_5'];
			
			$data["def_pos_types"] = $defenseList;
			
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
			
			foreach($defenseList as $t)
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
					$data['low_bar_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['low_bar_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['low_bar_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['low_bar_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['low_bar_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['low_bar_pos'][] = $def;
					$data['low_bar_faced']++;
				}
				else if($t==1)
				{
					$data['portcullis_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['portcullis_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['portcullis_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['portcullis_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['portcullis_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['portcullis_pos'][] = $def;
					$data['portcullis_faced']++;
				}
				else if($t==2)
				{
					$data['chili_fries_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['chili_fries_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['chili_fries_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['chili_fries_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['chili_fries_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['chili_fries_pos'][] = $def;
					$data['chili_fries_faced']++;
				}
				else if($t==3)
				{
					$data['moat_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['moat_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['moat_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['moat_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['moat_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['moat_pos'][] = $def;
					$data['moat_faced']++;
				}
				else if($t==4)
				{
					$data['ramparts_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['ramparts_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['ramparts_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['ramparts_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['ramparts_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['ramparts_pos'][] = $def;
					$data['ramparts_faced']++;
				}
				else if($t==5)
				{
					$data['drawbridge_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['drawbridge_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['drawbridge_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['drawbridge_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['drawbridge_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['drawbridge_pos'][] = $def;
					$data['drawbridge_faced']++;
				}
				else if($t==6)
				{
					$data['sally_port_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['sally_port_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['sally_port_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['sally_port_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['sally_port_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['sally_port_pos'][] = $def;
					$data['sally_port_faced']++;
				}
				else if($t==7)
				{
					$data['rock_wall_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['rock_wall_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['rock_wall_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['rock_wall_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['rock_wall_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['rock_wall_pos'][] = $def;
					$data['rock_wall_faced']++;
				}
				else if($t==8)
				{
					$data['rough_terrain_cross'] += (int)$row['def_'.$def.'_crossed'];
					$data['rough_terrain_stuck'] += (int)$row['def_'.$def.'_stuck'];
					$data['rough_terrain_weak'] += (int)$row['def_'.$def.'_weakened'];
					$data['rough_terrain_speed'] += (int)$row['def_'.$def.'_speed'];
					$data['rough_terrain_ball'] += (int)$row['def_'.$def.'_ball'];
					$data['rough_terrain_pos'][] = $def;
					$data['rough_terrain_faced']++;
				}
				$def++;
			}
			
			if(count($data['lowbar_pos']) != $match)
			{
				$data['lowbar_pos'][] = -1;
			}
			if(count($data['portcullis_pos']) != $match)
			{
				$data['portcullis_pos'][] = -1;
			}
			if(count($data['chili_fries_pos']) != $match)
			{
				$data['chili_fries_pos'][] = -1;
			}
			if(count($data['ramparts_pos']) != $match)
			{
				$data['ramparts_pos'][] = -1;
			}
			if(count($data['moat_pos']) != $match)
			{
				$data['moat_pos'][] = -1;
			}
			if(count($data['sally_port_pos']) != $match)
			{
				$data['sally_port_pos'][] = -1;
			}
			if(count($data['drawbridge_pos']) != $match)
			{
				$data['drawbridge_pos'][] = -1;
			}
			if(count($data['rockwall_pos']) != $match)
			{
				$data['rockwall_pos'][] = -1;
			}
			if(count($data['rough_terrain_pos']) != $match)
			{
				$data['rough_terrain_pos'][] = -1;
			}
			
			$match++;
		}
		
		$favoritism = [];
		
		$favoritism[] = (int)scoreOuterWork($data['lowbar_ball'],$data['lowbar_cross'],$data['lowbar_speed'],$data['lowbar_stuck'],$data['lowbar_faced']);
		$favoritism[] = (int)scoreOuterWork($data['portcullis_ball'],$data['portcullis_cross'],$data['portcullis_speed'],$data['portcullis_stuck'],$data['portcullis_faced']);
		$favoritism[] = (int)scoreOuterWork($data['chili_fries_ball'],$data['chili_fries_cross'],$data['chili_fries_speed'],$data['chili_fries_stuck'],$data['chili_fries_faced']);
		$favoritism[] = (int)scoreOuterWork($data['moat_ball'],$data['moat_cross'],$data['moat_speed'],$data['moat_stuck'],$data['moat_faced']);
		$favoritism[] = (int)scoreOuterWork($data['ramparts_ball'],$data['ramparts_cross'],$data['ramparts_speed'],$data['ramparts_stuck'],$data['ramparts_faced']);
		$favoritism[] = (int)scoreOuterWork($data['drawbridge_ball'],$data['drawbridge_cross'],$data['drawbridge_speed'],$data['drawbridge_stuck'],$data['drawbridge_faced']);
		$favoritism[] = (int)scoreOuterWork($data['sally_port_ball'],$data['sally_port_cross'],$data['sally_port_speed'],$data['sally_port_stuck'],$data['sally_port_faced']);
		$favoritism[] = (int)scoreOuterWork($data['rockwall_ball'],$data['rockwall_cross'],$data['rockwall_speed'],$data['rockwall_stuck'],$data['rockwall_faced']);
		$favoritism[] = (int)scoreOuterWork($data['rough_terrain_ball'],$data['rough_terrain_cross'],$data['rough_terrain_speed'],$data['rough_terrain_stuck'],$data['rough_terrain_faced']);

		$data['def_prefs'] = $favoritism;
		
		arsort($favoritism);
		
		$def_iter = 0;
		foreach ($favoritism as $key => $val) {
			if($def_iter==8)
			{
				$data['hated_def_id'] = $key;
			}
			if($def_iter==0)
			{
				$data['favorite_def_id'] = $key;
			}
			$def_iter++;
		}
		
		$data['favorite_defense_name'] = getDefenseName($data['favorite_def_id']);
		$data['hated_defense_name'] = getDefenseName($data['hated_def_id']);
		
		return $data;		
	}
?>