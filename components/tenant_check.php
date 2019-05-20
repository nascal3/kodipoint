<?php 
	$current_user_type = $_SESSION['usertype'];
	if($current_user_type == 'landlord'){
		header("location:login.php?session=notset");
	}
?>