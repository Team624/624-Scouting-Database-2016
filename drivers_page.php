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
		
		$url = "https://frc-api.firstinspires.org/v2.0/2015/schedule/txho?tournamentLevel=Qualification&teamNumber=624";
		$response = file_get_contents($url,false,$context);
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
		
		$json = json_decode($response, true);
		//echo json_encode($json, JSON_PRETTY_PRINT);
		$it = 0;
		
		foreach($json as $schedule)
		{
			foreach($schedule as $match)
			{
				$description = $match["description"];
				?>
				<li class="slideli" id="slide_li_<?= $it ?>">
					<span class="collapseView">
						<button class="slidebutton" id="slide_button_<?= $it ?>" onclick="expand('<?= $it ?>')" type="button">-</button>
						<?php echo $description; ?>
					</span>
				</li>
				<div id="slide_<?= $it ?>" class="slidediv">
				<table>
					<tr>				
						<td>Red 1</td>
						<td>Red 2</td>
						<td>Red 3</td>
						<td> </td>
						<td>Blue 1</td>
						<td>Blue 2</td>
						<td>Blue 3</td>
					</tr>
					<tr>
					<?php
					$iter = 1;
						foreach($match["Teams"] as $teams)
						{
							if($teams["teamNumber"] == 624)
							{
								
							}
							?>
							<td><?=$teams["teamNumber"]?></td>
							
							<?php
							if($iter==3)
							{
								?>
								<td></td>
								<?php
							}
							
							$iter++;
						}
					?>
				</table>	
				</div>
				<br>
				<?php
				$it++;
			}
		}
		
		
		//echo json_encode($match, JSON_PRETTY_PRINT);
				
				//echo $item['description'];
	?>
	</ul>
	
</div>

<?php
	}
}
?>