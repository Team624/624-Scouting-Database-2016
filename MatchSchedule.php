<?php

//Put Match Schedule Stuff Below. This requires the Events API
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("db_connect.php");

?>
<head>	<link rel="stylesheet" type="text/css" href="css/MatchScheduleStyle.css"> </head>
<br>
<br>
<br>
<br>
<div class = "title" >
	<h1> Match Schedule </h1>	
</div>
<div class="page-container">
	<table class="matchTable">
		<tr class="top">
			<th class="table-top"><b>Match</b></th>
			<th class="table-top"><b>Timed</b></th>
			<th class="table-top"><b>Red 1</b></th>
			<th class="table-top"><b>Red 2</b></th>
			<th class="table-top"><b>Red 3</b></th>
			<th class="table-top"><b>Blue 1</b></th>
			<th class="table-top"><b>Blue 2</b></th>
			<th class="table-top"><b>Blue 3</b></th>
		</tr>
<?php

	$query2 = "SELECT match_number,time,red_1,red_2,red_3,blue_1,blue_2,blue_3 FROM schedule";
	$result2 = $mysqli->query($query2);
	
	foreach($result2 as $row)
	{
?>	
		<tr class="scheduleZenbra">
			<td class="side-bar"><b><?=$row["match_number"];?></b></td>
			<td class="time"><b><?=$row['time'];?></b></td>
			<td class="<?=$row['red_1']=="624"?'green':'red'?>"><?=$row['red_1'];?></td>
			<td class="<?=$row['red_2']=="624"?'green':'red'?>"><?=$row['red_2'];?></td>
			<td class="<?=$row['red_3']=="624"?'green':'red'?>"><?=$row['red_3'];?></td>
			<td class="<?=$row['blue_1']=="624"?'green':'blue'?>"><?=$row['blue_1'];?></td>
			<td class="<?=$row['blue_2']=="624"?'green':'blue'?>"><?=$row['blue_2']?></td>
			<td class="<?=$row['blue_3']=="624"?'green':'blue'?>"><?=$row['blue_3']?></td>
		</tr>
<?php	
	}
?>
	</table>
	<br>
</div>