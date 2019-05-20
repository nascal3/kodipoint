<?php
    session_start();
    include '../_database/database.php';
    if(isset($_REQUEST['submit'])){
        
        $fname=$_REQUEST['fname'];
        $lname=$_REQUEST['lname'];
		$email=$_REQUEST['email'];
        $tel=$_REQUEST['tel'];
        $address=$_REQUEST['address'];
		
        $password2=$_REQUEST['password2'];
		
		$user_password= base64_encode(hash('sha256',$password2));
		
		$Destination = '../userfiles/avatars';
		
        if(!isset($_FILES['avatarx']) || !is_uploaded_file($_FILES['avatarx']['tmp_name'])){
            $NewImageName= 'default_person.jpg';
            move_uploaded_file($_FILES['avatarx']['tmp_name'], "$Destination/$NewImageName");
			
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['avatarx']['name']));
            $ImageType = $_FILES['avatarx']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['avatarx']['tmp_name'], "$Destination/$NewImageName");
        }
		
        $sql="UPDATE re_landlords SET firstname='$fname', lastname='$lname', telephone='$tel', address_box='$address', avatar='$NewImageName' WHERE email = '$email'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		if(!$password2==""){
			$sql2="UPDATE re_users SET user_password='$user_password' WHERE user_email = '$email'";
		}
		
        header('Location: ../edit_landlord.php?status=success');
    }
?>
