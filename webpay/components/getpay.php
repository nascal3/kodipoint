<?php
	include '../../_database/database.php';
	
	if(!empty($_POST)){
	
	$cname=$_REQUEST['customerName'];
	$mnumber=$_REQUEST['mobileNumber'];
	$amount=$_REQUEST['amount'];
	$transref=$_REQUEST['transactionRefNo'];
	$datetime=$_REQUEST['timeStamp'];
	
	$sql="INSERT INTO re_payment(trans_identify,trans_time,trans_amount,trans_tel,trans_customername,trans_status) VALUES('$transref','$datetime','$amount','$mnumber','$cname', '1')";
	
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header('Location: ../index.php?status=success');
	
	}else{
		echo "error#1245"; 
	}
?>