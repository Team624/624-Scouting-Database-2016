<?php 
function databaseVerification($mysqli,$matchNum,$teamNum,$scoutID,$def_category_2,$def_category_3,$def_category_4,$def_category_5)
	{
	//$teamMatchCheck_query = "SELECT * FROM schedule WHERE match_number='$matchNum' AND red_1='$teamNum' OR red_2='$teamNum' OR red_3='$teamNum' OR blue_1='$teamNum' OR blue_2='$teamNum' OR blue_3='$teamNum' ";
	//$teamMatchCheck_result = $mysqli->query($teamMatchCheck_query); 
	
	$scoutCheck_query = "SELECT * FROM scouts WHERE id='$scoutID'";
	$scoutCheck_result = $mysqli->query($scoutCheck_query); 
	    
		$a = array($def_category_2,$def_category_3,$def_category_4,$def_category_5);
		if(count(array_unique($a))==count($a)){
			$defVerify=true;
		}
		if(/*$teamMatchCheck_result->num_rows > 0&&*/$scoutCheck_result->num_rows > 0&&$defVerify)
		{
			$verificationResult = true;
			return $verificationResult;
		}
		
		
	}
?>