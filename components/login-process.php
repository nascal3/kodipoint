<?php
    session_start();
    if(isset($_REQUEST['login_button'])||$_REQUEST['auto']==1){
        require '../_database/database.php';
        $errmsg_arr = array();
        $errflag = false;
        $username=  mysqli_real_escape_string($conn,$_REQUEST['username']);
        $password=  mysqli_real_escape_string($conn,$_REQUEST['password']);
        if($username == '') {
            $errmsg_arr[] = 'Username missing';
            $errflag = true;
        }
        if($password == '') {
            $errmsg_arr[] = 'Password missing';
            $errflag = true;
        }
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: authentication-check.php");
            exit();
        }
		
		$password= base64_encode(hash('sha256',$password));
        $sql="SELECT * FROM re_users WHERE user_email='$username' AND user_password='$password'";
        $result =  mysqli_query($conn,$sql) or die(mysqli_errno());
        $trws = mysqli_num_rows($result);
        if($trws==1){
            $rws =  mysqli_fetch_array($result);
            $_SESSION['userid']=$rws['id'];
            $_SESSION['usertype']=$rws['role'];
		
				if( $_SESSION['usertype'] == 2){
				header("location:../landlord_profile.php?profile=$username&request=login&status=success");    
				}
				if( $_SESSION['usertype'] == 1){
				header("location:../tenant_profile.php?profile=$username&request=login&status=success");    
				}
			}
			else {
            $errmsg_arr[] = 'user name and password not found';
            $errflag = true;
            if($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: ../components/authentication-check.php");
                exit();
            }
        }
    }
?>