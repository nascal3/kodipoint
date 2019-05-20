<?php
    session_start();
    include '../_database/database.php';
    if(isset($_REQUEST['register'])){
        $user_email=$_REQUEST['user_email'];
        $user_firstname=$_REQUEST['user_firstname'];
        $user_lastname=$_REQUEST['user_lastname'];
        $user_tel=$_REQUEST['user_tel'];
        $user_password=$_REQUEST['user_password'];
		$user_password= base64_encode(hash('sha256',$user_password));
        $sql="INSERT INTO re_landlords(firstname,lastname,email,telephone) VALUES('$user_firstname','$user_lastname','$user_email','$user_tel')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$sql2="SELECT id FROM re_landlords WHERE email = '$user_email'";
		$result= mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		$landlordid = $row[0];
		
		$sql3="INSERT INTO re_users(user_id,user_email,user_password,user_type) VALUES('$landlordid','$user_email','$user_password','landlord')";
		mysqli_query($conn,$sql3) or die(mysqli_error($conn));
		
        $_SESSION['userid'] = $landlordid;
        $_SESSION['usertype'] = "landlord";
        header('Location: ../bank_details.php');
    }
?>