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
	<link rel="stylesheet" type="text/css" href="css/mainpagestyle.css"> 
	<link rel="stylesheet" type="text/css" href="css/dataform.css">
</head>

<div class="page_container">
	<div class="form_container">
		<form class="datafield" method="post">
<div class="container">
<br>
<br>
	<h2><span>Drive Team Page</span></h2>
	
	
</div>

<?php
	}
}
?>