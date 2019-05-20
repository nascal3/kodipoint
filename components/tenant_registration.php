<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
    include '../_database/database.php';
    if(isset($_REQUEST['save'])){
		$tenantemail=$_REQUEST['tenantemail'];
        $tenantname=$_REQUEST['tenantname'];
        $tenantid=$_REQUEST['tenantid'];
        $apartmentid=$_REQUEST['tenantapartment'];
        $unitno=$_REQUEST['unitno'];
        $dateenter=$_REQUEST['dateenter'];
	
		$sql1="SELECT tenantid FROM re_tenant WHERE tenantid='$tenantid'";
		
		$result =  mysqli_query($conn,$sql1) or die(mysqli_errno());
		$row = mysqli_num_rows($result);
		if($row==1){	
			header('Location: ../tenants.php?status=error-tenant-exists');
		}
		
		$sql6="SELECT id FROM re_tenant WHERE tenantid='$tenantid'";
		$result6 = mysqli_query($conn,$sql6) or die(mysqli_error($conn));
		$row6 = mysqli_fetch_array($result6);
		
		$sql7="SELECT * FROM re_propertytenant WHERE tenant_id='$$row6[0]'";
		$result7 = mysqli_query($conn,$sql7) or die(mysqli_error($conn));
		$row7 = mysqli_fetch_array($result7);
		
		if($row7['property_id']== $apartmentid && $row7['unit_no']== $unitno){
			header('Location: ../tenants.php?status=error-tenant-exists');	
		
		}else{
			$sql2="INSERT INTO re_tenant(name,email,tenantid) VALUES('$tenantname','$tenantemail','$tenantid')";
			mysqli_query($conn,$sql2) or die(mysqli_error($conn));
			
			$sql3="SELECT * FROM re_properties WHERE id='$apartmentid'";
			$result = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
			$row = mysqli_fetch_array($result);
			
			$sql4="SELECT * FROM re_tenant WHERE tenantid='$tenantid'";
			$result1 = mysqli_query($conn,$sql4) or die(mysqli_error($conn));
			$row1 = mysqli_fetch_array($result1);
			
			$propertyid = $row['id'];
			$tid = $row1['id'];
			
			$sql5="INSERT INTO re_propertytenant(tenant_id,property_id,unit_no,date_moved_in) VALUES('$tid','$propertyid','$unitno','$dateenter')";
			mysqli_query($conn,$sql5) or die(mysqli_error($conn));
			
			header('Location: ../tenants.php?status=success');
		}
		mysqli_close($conn);
		
    }
?>