<?php
	include '../../_database/database.php';
	
	if(!empty($_POST)){
	
	$cnumber=$_REQUEST['customerName'];
	$mnumber=$_REQUEST['mobileNumber'];
	$amount=$_REQUEST['amount'];
	$transref=$_REQUEST['transactionRefNo'];
	$datetime=$_REQUEST['timeStamp'];

        $sqlx = "SELECT name FROM re_tenant WHERE id = '$cnumber'";
        $resultx = mysqli_query($conn,$sqlx) or die(mysqli_error());
        $rowx = mysqli_fetch_array($resultx);
        $cname = $rowx['name'];
	
	    $sql="INSERT INTO re_payment(trans_identify,trans_time,trans_amount,trans_tel,tenant_id,trans_status,trans_customername) VALUES('$transref','$datetime','$amount','$mnumber','$cnumber', '1','$cname')";
	
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header('Location: ../index.php?status=success');
	
	}else{
		echo "error#1245"; 
	}
?>