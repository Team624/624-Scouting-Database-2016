<?php
 session_start();
 $_SESSION['valid']=false;
 $_SESSION['type']="intruder";
 //unset($_SESSION['valid']);
 //unset($_SESSION['type']);
 session_destroy();
	?>
		<script>location.href = "index.php?login=loggedOut"</script>
	<?php
?>