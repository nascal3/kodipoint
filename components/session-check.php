<?php
    if($_SESSION['userid']==""){
        header("location:login.php?session=notset");
    }
	$current_user_type = $_SESSION['usertype'];
	if($current_user_type == ""){
		header("location:login.php?session=notset");
	}
?>