<?php 
	$current_user_type = $_SESSION['usertype'];
	if($current_user_type == 2){
		header("location:login.php?session=notset");
	}
?>