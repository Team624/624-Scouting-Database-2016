<?php
//Raw Data
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("db_connect.php");

	$query = "SELECT * FROM `scout2016`.`match_data`";
	
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
		<table>
			<thead>
				<!-- Put Column Headers Here -->
				<th>ID</th>
				<th>Match #</th>
				<th>Team #</th>
				<th>Scout ID</th>
				<th>No Show?</th>
				<th>Mechanical Failure?</th>
				<th>Lost Comms?</th>
				<th>Fouls?</th>
				<th>Tech Fouls?</th>
				<th>Driver Rating</th>
			</thead>
			<tbody>
			<?php
				$result = $mysqli->query($query);
				
				while($row = $result->fetch_array(MYSQLI_ASSOC))
				{
					?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['match_number'];?></td>
						<td><?php echo $row['team_number'];?></td>
						<td><?php echo $row['scout_id'];?></td>
						<td><?php echo $row['no_show'];?></td>
						<td><?php echo $row['mech_fail'];?></td>
						<td><?php echo $row['lost_comms'];?></td>
						<td><?php echo $row['fouls'];?></td>
						<td><?php echo $row['tech_fouls'];?></td>
						<td><?php echo $row['drive_rating'];?></td>
						
						
					</tr>
					<?php
				}
			?>
			</tbody>
		</table>
	</div>
</div>