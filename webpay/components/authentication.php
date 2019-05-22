<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
    require '../_database/database.php';
    $current_user = $_SESSION['userid'];
?>