<?php
//Check to make sure the drive team is logged in
include("HeadTemplate.php");
include("UserVerification.php");
if(isset($valid_user) && isset($user_type))
{
	if($valid_user && $user_type=="driver")
	{
		include("navbar.php");
?>	

<!-- Make this page Tablet Friendly -->
<head>
<link rel="stylesheet" type="text/css" href="css/DankDriverPageStyle.css">
</head>

<div class="container">
<br>
<br>
<br>
<br>
<br>
	<h2><span>Drive Team Page</span></h2>
	
	<div>
	Put Zoomed in Ranking Here <!-- 5 teams above and below in rankings, if 0 above, put only 5 below -->
	</div>
	
	<div>
	Put Performance Charts Here
	</div>
	
	<div>
	Put Upcoming Matches Here
	</div>
</div>

<?php
	}
}
?>