<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
    include '../_database/database.php';
    if(isset($_REQUEST['save'])){
		$tenantemail=$_REQUEST['tenantemail'];
        $tenantname=$_REQUEST['tenantname'];
        $originalid=$_REQUEST['tentid'];
        $tenantid=$_REQUEST['tenantid'];
        $apartmentid=$_REQUEST['tenantapartment'];
        $unitno=$_REQUEST['unitno'];
        $dateenter=$_REQUEST['dateenter'];

			$sql="UPDATE re_tenant SET name='tenantname', email='tenantemail', tenantid='$tenantid' WHERE id='$originalid'";
			mysqli_query($conn,$sql) or die(mysqli_error($conn));
			
			$sql1="UPDATE re_propertytenant SET property_id='$apartmentid', date_moved_in='$dateenter', unit_no='$unitno' WHERE tenant_id='$originalid'";
			$result = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$row = mysqli_fetch_array($result);
			
			
			header('Location: ../tenants.php?status=success');

		mysqli_close($conn);
		
    }
?>