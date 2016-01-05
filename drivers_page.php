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
<div class="container">
	<h2>Drive Team Page</h2>
	
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