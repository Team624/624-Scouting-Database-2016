<?php
//Raw Data
include("HeadTemplate.php");
include("UserVerification.php");
include("navbar.php");
include("db_connect.php");

	$query = "SELECT * FROM `scout2016`.`match_data`";
	
?>

<div class="page_container">
	<table>
		<thead>
			<!-- Put Column Headers Here -->
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
				</tr>
				<?php
			}
		?>
		</tbody>
	</table>
</div>