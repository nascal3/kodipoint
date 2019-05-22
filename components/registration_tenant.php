<?php
    session_start();
    include '../_database/database.php';
    if(isset($_REQUEST['register'])){
        $user_email=$_REQUEST['user_email'];
        $user_tel=$_REQUEST['user_tel'];
        $user_password=$_REQUEST['user_password'];
		$user_password= base64_encode(hash('sha256',$user_password));

        $sql3="INSERT INTO re_users(user_email,user_password,role) VALUES('$user_email','$user_password',1)";
        mysqli_query($conn,$sql3) or die(mysqli_error($conn));
		
		$sql2="SELECT id FROM re_users WHERE user_email = '$user_email'";
		$result= mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		$user_id = $row[0];

        $sql="UPDATE re_tenant SET telephone='$user_tel', user_id='$user_id' WHERE email='$user_email'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        
        $_SESSION['userid'] = $user_id;
        $_SESSION['usertype'] = 1;
        header('Location: ../tenant_profile.php');
    }
?>