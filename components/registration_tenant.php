<?php
    session_start();
    include '../_database/database.php';
    if(isset($_REQUEST['register'])){
        $user_email=$_REQUEST['user_email'];
        $user_tel=$_REQUEST['user_tel'];
        $user_password=$_REQUEST['user_password'];
		$user_password= base64_encode(hash('sha256',$user_password));

		$sql="UPDATE re_tenant SET telephone='$user_tel' WHERE email='$user_email'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		$sql2="SELECT id FROM re_tenant WHERE email = '$user_email'";
		$result= mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		$tenantid = $row[0];
		
		$sql3="INSERT INTO re_users(user_id,user_email,user_password,user_type) VALUES('$tenantid','$user_email','$user_password','tenant')";
		mysqli_query($conn,$sql3) or die(mysqli_error($conn));
        
        $_SESSION['userid'] = $tenantid;
        $_SESSION['usertype'] = "tenant";
        header('Location: ../tenant_profile.php');
    }
?>