<?php
include("HeadTemplate.php");
include("UserVerification.php");
include("kick_intruders.php");
include("navbar.php");
//Check to make sure the user is logged in
?>
<head>	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css"> </head>
<br>
<br>
<br>
<br>
<div class="page_container">
	<h1> 624 Scouting Main Page</h1>
	
	<div class="quickLinks">
		Greetings, 
		<?php
			if($user_type == "driver")
			{
				echo "Drive Team Member. The fact that you have gotten here is surprising. I congratulate thee, but please go back to your"; 
				?>
					<a href="drivers_page.php" class="classy">designated page.</a>
				<?php
			}
			else if($user_type == "admin")
			{
				echo "Admin. These pages might be of interest to you:<br><br>"; 
				?>
					<a href="DataCoverage.php">Data Coverage</a>
					<br>
					<a href="Setup.php">Setup</a>
				<?php
			}
			else if($user_type == "data")
			{
				echo "Data Entry. These pages might be of interest to you:<br><br>"; 
				?>
					<a href="DataEntry.php" class="classy">Data Entry</a><br>
				<?php
			}
			else if($user_type == "scout")
			{
				echo "Scout. These pages might be of interest to you:<br><br>"; 
				?>
					<a href="Search.php" class="classy">Search For Teams/Matches</a>
					<br>
				<?php
			}
		?>
	</div>
</div>