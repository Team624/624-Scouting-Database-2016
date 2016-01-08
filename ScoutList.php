<?php
//Scout List
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
include("db_connect.php");
?>
<br>
<br>
<br>
<br>

<div class = "title" >
	<h1> Scout List </h1>
</div>

<div class="page_container">

	<!-- Make this table look good -->

	<table id="scoutTable">
		<thead>
			<th>ID</th>
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