<?php
    ini_set("display_errors",1);
    session_start();
    $temp=$_SESSION['user_username'];
    if(isset($_POST)){
    require '../_database/database.php';
        /*$Destination = '../userfiles/background-images';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default-background.jpg';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql1="UPDATE user SET user_backgroundpicture='$BackgroundNewImageName' WHERE user_username = '$temp'";
        $sql2="INSERT INTO user (user_backgroundpicture) VALUES ('$BackgroundNewImageName') WHERE user_username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM user WHERE user_username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                mysqli_query($database,$sql1)or die(mysqli_error($database));
                header("location:../edit-profile.php?user_username=$temp");
            }
        } 
        else {
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            header("location:../edit-profile.php?user_username=$temp");
        }*/
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE re_tenant SET avatar='$NewImageName' WHERE id = '$current_user'";
        $sql6="INSERT INTO re_tenant (avatar) VALUES ('$NewImageName') WHERE id = '$current_user'";
        $result = mysqli_query($conn,"SELECT * FROM re_tenant WHERE id = '$current_user'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($conn,$sql5)or die(mysqli_error($conn));
               
            }
        } 
        else {
            mysqli_query($conn,$sql6)or die(mysqli_error($conn));
            
        }  
        $telephone=$_REQUEST['telephone'];
        $address=$_REQUEST['address'];
        
        $sql3="UPDATE re_tenant SET telephone='$telephone',postal_address='$address' WHERE id = '$current_user'";
            mysqli_query($conn,$sql3)or die(mysqli_error($conn));
            header("location:../edit-tenant.php?update&status=success");
    }    
?>