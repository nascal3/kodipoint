<?php 
	$current_user_type = $_SESSION['usertype'];
	if($current_user_type != 1){
		header("location:login.php?session=notset");
	}
?>