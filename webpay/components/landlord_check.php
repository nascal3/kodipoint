<?php 
	$current_user_type = $_SESSION['usertype'];
	if($_SESSION['usertype']==""){
		header("location:login.php?session=notset");
	}
	if($current_user_type == 'tenant'){
		header("location:login.php?session=notset");
	}
?>