<?php
//Raw Data
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("read_ini.php");
include("db_connect.php");

?>
<head>	<link rel="stylesheet" type="text/css" href="css/raw_data.css"> </head>
<br>
<br>
<br>
<br>
<div class="title">
	<h1>Raw Data</h1>
</div>
<div class="page_container">
	<div class="raw_data">
		<table class="rawTable">
			<tr class="rawTopRow">
				<!-- Put Column Headers Here -->
				<td class="rawTop"><p class="rawP">ID</P></td>
				<td class="rawTop"><p class="rawP">Match #</P></td>
				<td class="rawTop"><p class="rawP">Team #</P></td>
				<td class="rawTop"><p class="rawP">Scout ID</P></td>
				<td class="rawTop"><p class="rawP">No Show?</P></td>
				<td class="rawTop"><p class="rawP">Mechanical Failure?</P></td>
				<td class="rawTop"><p class="rawP">Lost Comms?</P></td>
				<td class="rawTop"><p class="rawP">Fouls?</P></td>
				<td class="rawTop"><p class="rawP">Tech Fouls?</P></td>
				<td class="rawTop"><p class="rawP">Auto High Scored</P></td>
				<td class="rawTop"><p class="rawP">Auto Low Scored</P></td>
				<td class="rawTop"><p class="rawP">Auto High Missed</P></td>
				<td class="rawTop"><p class="rawP">Auto Low Missed</P></td>
				<td class="rawTop"><p class="rawP">Auto defensed Reached</P></td>
				<td class="rawTop"><p class="rawP">Auto Defensed Crossed</P></td>
				<td class="rawTop"><p class="rawP">Auto Defensed Reached Failed</P></td>
				<td class="rawTop"><p class="rawP">Auto Defensed Crossed Failed</P></td>
				<td class="rawTop"><p class="rawP">Auto Starting Location</P></td>
				<td class="rawTop"><p class="rawP">Auto Start With Boulder</P></td>
				<td class="rawTop"><p class="rawP">Auto Boulder Grabbed</P></td>
				<td class="rawTop"><p class="rawP">Defense Category 1</P></td>
				<td class="rawTop"><p class="rawP">Defense Category 2</P></td>
				<td class="rawTop"><p class="rawP">Defense Category 3</P></td>
				<td class="rawTop"><p class="rawP">Defense Category 4</P></td>
				<td class="rawTop"><p class="rawP">Defense Category 5</P></td>
				<td class="rawTop"><p class="rawP">Defense Crossed 1</P></td>
				<td class="rawTop"><p class="rawP">Defense Crossed 2</P></td>
				<td class="rawTop"><p class="rawP">Defense Crossed 3</P></td>
				<td class="rawTop"><p class="rawP">Defense Crossed 4</P></td>
				<td class="rawTop"><p class="rawP">Defense Crossed 5</P></td>
				<td class="rawTop"><p class="rawP">Defense Damaged 1</P></td>
				<td class="rawTop"><p class="rawP">Defense Damaged 2</P></td>
				<td class="rawTop"><p class="rawP">Defense Damaged 3</P></td>
				<td class="rawTop"><p class="rawP">Defense Damaged 4</P></td>
				<td class="rawTop"><p class="rawP">Defense Damaged 5</P></td>
				<td class="rawTop"><p class="rawP">Defense Speed 1</P></td>
				<td class="rawTop"><p class="rawP">Defense Speed 2</P></td>
				<td class="rawTop"><p class="rawP">Defense Speed 3</P></td>
				<td class="rawTop"><p class="rawP">Defense Speed 4</P></td>
				<td class="rawTop"><p class="rawP">Defense Speed 5</P></td>
				<td class="rawTop"><p class="rawP">Defense With Ball 1</P></td>
				<td class="rawTop"><p class="rawP">Defense With Ball 2</P></td>
				<td class="rawTop"><p class="rawP">Defense With Ball 3</P></td>
				<td class="rawTop"><p class="rawP">Defense With Ball 4</P></td>
				<td class="rawTop"><p class="rawP">Defense With Ball 5</P></td>
				<td class="rawTop"><p class="rawP">Scored In High</P></td>
				<td class="rawTop"><p class="rawP">Scored In Low</P></td>
				<td class="rawTop"><p class="rawP">Scored In High missed</P></td>
				<td class="rawTop"><p class="rawP">Scored In Low missed</P></td>
				<td class="rawTop"><p class="rawP">Batter High Goal</P></td>
				<td class="rawTop"><p class="rawP">Batter Low Goal</P></td>
				<td class="rawTop"><p class="rawP">Courtyard High Goal</P></td>
				<td class="rawTop"><p class="rawP">Courtyard Low Goal</P></td>
				<td class="rawTop"><p class="rawP">Challenged Suceed</P></td>
				<td class="rawTop"><p class="rawP">Challenged Failed</P></td>
				<td class="rawTop"><p class="rawP">Scaled Suceed</P></td>
				<td class="rawTop"><p class="rawP">Scaled Failed</P></td>
				<td class="rawTop"><p class="rawP">Driving Manuverability</P></td>
				<td class="rawTop"><p class="rawP">Defense Bullying</P></td>
				<td class="rawTop"><p class="rawP">Ball Control</P></td>
			</tr>
			<?php
			
				$query = "SELECT * FROM match_data";
				$result = $mysqli->query($query);
				
				foreach($result as $row)
				{
					?>
					<tr class="rawZebra">
						<td class="rawBody"><?=$row["id"];?></td>
						<td class="rawBody"><?=$row['match_number'];?></td>
						<td class="rawBody"><?=$row['team_number'];?></td>
						<td class="rawBody"><?=$row['scout_id'];?></td>
						<td class="rawBody"><?=$row['no_show'];?></td>
						<td class="rawBody"><?=$row['mech_fail'];?></td>
						<td class="rawBody"><?=$row['lost_comms'];?></td>
						<td class="rawBody"><?=$row['fouls'];?></td>
						<td class="rawBody"><?=$row['tech_fouls'];?></td>
						<td class="rawBody"><?=$row['auto_High_Scored'];?></td>
						<td class="rawBody"><?=$row['auto_Low_Scored'];?></td>
						<td class="rawBody"><?=$row['auto_High_Miss'];?></td>
						<td class="rawBody"><?=$row['auto_Low_Miss'];?></td>
						<td class="rawBody"><?=$row['auto_Defenses_Reached_Sucess'];?></td>
						<td class="rawBody"><?=$row['auto_Defenses_Crossed_Sucess'];?></td>
						<td class="rawBody"><?=$row['auto_Defenses_Reached_Failed'];?></td>
						<td class="rawBody"><?=$row['auto_Defenses_Crossed_Failed'];?></td>
						<td class="rawBody"><?=$row['auto_Start_Location'];?></td>
						<td class="rawBody"><?=$row['auto_StartWithBoulder'];?></td>
						<td class="rawBody"><?=$row['Auto_Boulder_Grab'];?></td>
						<td class="rawBody"><?=$row['def_category_1'];?></td>
						<td class="rawBody"><?=$row['def_category_2'];?></td>
						<td class="rawBody"><?=$row['def_category_3'];?></td>
						<td class="rawBody"><?=$row['def_category_4'];?></td>
						<td class="rawBody"><?=$row['def_category_5'];?></td>
						<td class="rawBody"><?=$row['def_1_crossed'];?></td>
						<td class="rawBody"><?=$row['def_2_crossed'];?></td>
						<td class="rawBody"><?=$row['def_3_crossed'];?></td>
						<td class="rawBody"><?=$row['def_4_crossed'];?></td>
						<td class="rawBody"><?=$row['def_5_crossed'];?></td>
						<td class="rawBody"><?=$row['def_1_damaged'];?></td>
						<td class="rawBody"><?=$row['def_2_damaged'];?></td>
						<td class="rawBody"><?=$row['def_3_damaged'];?></td>
						<td class="rawBody"><?=$row['def_4_damaged'];?></td>
						<td class="rawBody"><?=$row['def_5_damaged'];?></td>
						<td class="rawBody"><?=$row['def_1_speed'];?></td>
						<td class="rawBody"><?=$row['def_2_speed'];?></td>
						<td class="rawBody"><?=$row['def_3_speed'];?></td>
						<td class="rawBody"><?=$row['def_4_speed'];?></td>
						<td class="rawBody"><?=$row['def_5_speed'];?></td>
						<td class="rawBody"><?=$row['def_1_ball'];?></td>
						<td class="rawBody"><?=$row['def_2_ball'];?></td>
						<td class="rawBody"><?=$row['def_3_ball'];?></td>
						<td class="rawBody"><?=$row['def_4_ball'];?></td>
						<td class="rawBody"><?=$row['def_5_ball'];?></td>
						<td class="rawBody"><?=$row['high_Scored'];?></td>
						<td class="rawBody"><?=$row['low_Scored'];?></td>
						<td class="rawBody"><?=$row['high_Miss'];?></td>
						<td class="rawBody"><?=$row['low_Miss'];?></td>
						<td class="rawBody"><?=$row['batter_high_goal'];?></td>
						<td class="rawBody"><?=$row['courtyard_high_goal'];?></td>
						<td class="rawBody"><?=$row['batter_low_goal'];?></td>
						<td class="rawBody"><?=$row['courtyard_low_goal'];?></td>
						<td class="rawBody"><?=$row['challenge_Sucess'];?></td>
						<td class="rawBody"><?=$row['challenge_Failed'];?></td>
						<td class="rawBody"><?=$row['scaled_Sucess'];?></td>
						<td class="rawBody"><?=$row['scaled_Fail'];?></td>
						<td class="rawBody"><?=$row['drive_manuverability'];?></td>
						<td class="rawBody"><?=$row['Defense_Bullying'];?></td>
						<td class="rawBody"><?=$row['Ball Control'];?></td>
					</tr>
					<?php
				}
			?>
		</table>
	</div>
</div>