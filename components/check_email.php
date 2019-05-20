<?php
    session_start();
    require '../_database/database.php';

    $email = mysqli_real_escape_string($conn,$_REQUEST['email']);
    $sql1 = "SELECT * FROM re_tenant WHERE email='$email'";
	$resultx = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	$rowcount = mysqli_num_rows($resultx);
	$rws = mysqli_fetch_array($resultx);
	
	if($rowcount==1){
		$name=$rws['name'];
		$tenant_id=$rws['tenantid'];
		$report = array('1',$name,$tenant_id);

		print_r(json_encode($report));
	}
	if($rowcount==0){
		print_r('0');
	}

?>