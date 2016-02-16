<?php
//Data Coverage
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("read_ini.php");
include("db_connect.php");
?>
<head>	<link rel="stylesheet" type="text/css" href="css/DataCoverageStyle.css"> </head>
<br>
<br>
<br>
<br>
<div class = "title" >
	<h1> Data Coverage </h1>
</div>
<div class="page-container">
	<table class="Schedule-table">
		<tr class="top-bar">
			<th class="table-top"><b>Match</b></th>
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
		<tr class="zebra">
			<td class="side-bar"><b><?=$row["match_number"];?></b></td>
			<td class="<?=$row['has_red_1']?'found':'not-found'?>"><?=$row['red_1'];?></td>
			<td class="<?=$row['has_red_2']?'found':'not-found'?>"><?=$row['red_2'];?></td>
			<td class="<?=$row['has_red_3']?'found':'not-found'?>"><?=$row['red_3'];?></td>
			<td class="<?=$row['has_blue_1']?'found':'not-found'?>"><?=$row['blue_1'];?></td>
			<td class="<?=$row['has_blue_2']?'found':'not-found'?>"><?=$row['blue_2']?></td>
			<td class="<?=$row['has_blue_3']?'found':'not-found'?>"><?=$row['blue_3']?></td>
		</tr>
<?php	
	}
?>

	</table>
	<br>
</div>