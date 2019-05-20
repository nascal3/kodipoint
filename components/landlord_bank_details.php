<?php
    session_start();
    include '../_database/database.php';
    if(isset($_REQUEST['register'])){
		
        $userid=$_REQUEST['userid'];
        $bankname=$_REQUEST['bname'];
        $bankbranch=$_REQUEST['bbranch'];
        $bankaccount=$_REQUEST['baccount'];
        $bankswift=$_REQUEST['bswift'];
        $bankcurrency=$_REQUEST['bcurrency'];
		
        $sql="UPDATE re_landlords SET bank_name = '$bankname',bank_branch = '$bankbranch', bank_account='$bankaccount',bank_swift= '$bankswift',bank_currency='$bankcurrency' WHERE id='$userid'";

        mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
        header('Location: ../landlord_profile.php');
    }
?>