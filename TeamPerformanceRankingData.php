<?php
include("GetTeamData.php");
function teamPerformance($mysqli)
	{
	$team_query = "SELECT * FROM teams";
	$result = $mysqli->query($team_query);
	
	foreach($result as $row)
	{	
			$teams=$row['number'];
			//$teamData=getTeamData($mysqli,$row['number']);
	
	
			
			return $teams;
	}
		
		
		
	}
?>