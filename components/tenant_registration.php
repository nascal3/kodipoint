<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();

    $current_user = $_SESSION['userid'];
	
    include '../_database/database.php';
    if(isset($_REQUEST['save'])){
		$tenantemail=$_REQUEST['tenantemail'];
        $tenantname=$_REQUEST['tenantname'];
        $tenantid=$_REQUEST['tenantid'];
        $apartmentid=$_REQUEST['tenantapartment'];
        $unitno=$_REQUEST['unitno'];
        $dateenter=$_REQUEST['dateenter'];
	
		$sqlx="SELECT property_name FROM re_properties WHERE id='$apartmentid'";
        $prop_result =  mysqli_query($conn,$sqlx) or die(mysqli_errno());
        $row = mysqli_fetch_array($prop_result);
        $property_name = $row['property_name'];

		$sql1="SELECT id FROM re_tenant WHERE landlord_id='$current_user' AND property_id = '$apartmentid' AND unit_no = '$unitno'";

		$result =  mysqli_query($conn,$sql1) or die(mysqli_errno());
		$row = mysqli_num_rows($result);
		if($row==1){	
			header('Location: ../tenants.php?status=error-tenant-exists');
		}else{
			$sql2="INSERT INTO re_tenant(name,email,property_id,property_name,unit_no,landlord_id,tenantid) VALUES('$tenantname','$tenantemail','$apartmentid','$property_name','$unitno','$current_user','$tenantid')";
			mysqli_query($conn,$sql2) or die(mysqli_error($conn));
			header('Location: ../tenants.php?status=success');
		}
		mysqli_close($conn);
		
    }
?>