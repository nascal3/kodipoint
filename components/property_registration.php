<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
    include '../_database/database.php';
    if(isset($_REQUEST['save'])){
		
		$Destination = '../userfiles/avatars/';
        if(!isset($_FILES['profile_pic']) || !is_uploaded_file($_FILES['profile_pic']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['profile_pic']['name']));
            $ImageType = $_FILES['profile_pic']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], "$Destination/$NewImageName");
        }
		
        $propertytype=$_REQUEST['propertytype'];
        $propertyname=$_REQUEST['propertyname'];
        $location=$_REQUEST['location'];
        $country=$_REQUEST['country'];
        $desc=$_REQUEST['desc'];
        $contact=$_REQUEST['contact'];
        $phone=$_REQUEST['phone'];
        $number_units=$_REQUEST['number_units'];
        $lrno=$_REQUEST['lrno'];
		
		$current_user = $_SESSION['userid'];

        
		$sql2="INSERT INTO re_properties(Property_name,country,property_type,location,contact_person,telephone,number_units,landlord,lr_no,property_img,description) VALUES('$propertyname','$country','$propertytype','$location','$contact','$phone','$number_units','$current_user','$lrno','$NewImageName','$desc')";
		echo $sql2;
        mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		
		
		header('Location: ../property.php?status=success');
    }
?>