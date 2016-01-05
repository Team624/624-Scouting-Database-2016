<?php
//Scout List
include("HeadTemplate.php");
include("UserVerification.php");
include("navbar.php");
include("db_connect.php");
?>
<br>
<br>
<br>
<br>

<div class="page_container">

	<!-- Make this table look good -->

	<table id="scoutTable">
		<thead>
			<th>id</th>
			<th>Name</th>
		</thead>
		<?php
			$query = "SELECT `id`,`name` FROM `scout2016`.`scouts`";
			$result = $mysqli->query($query);
			
			while($row = $result->fetch_array(MYSQLI_ASSOC))
			{
		?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name']; ?></td>
			</tr>
		<?php
			}
		?>
	</table>
</div>