<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
    include '../_database/database.php';
    if(isset($_REQUEST['save'])){
		$tenantemail=$_REQUEST['tenantemail'];
        $tenantname=$_REQUEST['tenantname'];
        $tenantemail=$_REQUEST['tenantemail'];
        $id=$_REQUEST['rec_id'];
        $tenantid=$_REQUEST['tenantid'];
        $apartmentid=$_REQUEST['tenantapartment'];
        $unitno=$_REQUEST['unitno'];
        $dateenter=$_REQUEST['dateenter'];

        $sql5 = "SELECT property_name FROM re_properties WHERE id = $apartmentid";
        $result =  mysqli_query($conn,$sql5) or die(mysqli_errno());
        $rws = mysqli_fetch_array($result);
        $prop_name = $rws['property_name'];

        $sql="UPDATE re_tenant SET name='$tenantname', email='$tenantemail', tenantid='$tenantid', property_id='$apartmentid', property_name='$prop_name',
              unit_no='$unitno', move_in_date='$dateenter'  WHERE id='$id'";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));

			
        header('Location: ../tenants.php?status=success');

		mysqli_close($conn);
		
    }
?>