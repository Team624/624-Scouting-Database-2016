<?php
	function getTeamData($team_num)
	{
		$team_query = "SELECT * FROM `match_data` WHERE team_number = '$team_num'";//(`red1`='$team_num' OR `red2`='$team_num' OR `red3`='$team_num' OR `blue1`='$team_num' OR `blue2`='$team_num' OR `blue3`='$team_num')";
		$result = $mysqli->query($team_query);
		
		$data = [];
		
		while($row = $result->fetch_array())
		{
			$data["high_made"] += 0; 
		}		
	}
?>
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
		
		$matches_query = "SELECT * FROM `schedule` WHERE (`red1`=624 OR `red2`=624 OR `red3`=624 OR `blue1`=624 OR `blue2`=624 OR `blue3`=624)";
		$result = $mysqli->query($matches_query);
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
		
		while($row = $result->fetch_array())
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
					$teamsList[] = $row['red1'];
					$teamsList[] = $row['red2'];
					$teamsList[] = $row['red3'];
					$teamsList[] = $row['blue1'];
					$teamsList[] = $row['blue2'];
					$teamsList[] = $row['blue3'];
					/*
					foreach($match["Teams"] as $teams)
					{*/
					foreach($teamsList as $teams)
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
						<td>Preferred Starting Position</td>
					</tr>
					<tr>
						<td>Auto Reach %</td>
					</tr>
					<tr>
						<td>Auto Cross %</td>
					</tr>
					<tr>
						<td>Auto Low Goal %</td>
					</tr>
					<tr>
						<td>Auto High Goal %</td>
					</tr>
					<tr>
						<td>Teleop Low Goal %</td>
					</tr>
					<tr>
						<td>Teleop High Goal %</td>
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