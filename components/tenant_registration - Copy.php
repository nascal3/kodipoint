<?php
	ob_start();
    session_start();
    session_regenerate_id();
	$new_sessionid = session_id();
	
    include '../_database/database.php';

		$peoperty=$_REQUEST['peopertyx'];
        $tenant=$_REQUEST['tenantx'];
        $rentamount=$_REQUEST['rentamountx'];
        $otherfees=$_REQUEST['otherfeesx'];
        $ofdesc=$_REQUEST['ofdescx'];
        $taxrate=$_REQUEST['taxratex'];
        $landlordid=$_REQUEST['landlordidx'];
        $taxrate=$_REQUEST['taxratex'];
        $ofdesc=$_REQUEST['ofdescx'];
		
		$total_amount = ($rentamount + $otherfees) * (100 + $taxrate) / 100;
        
		$sql2="INSERT INTO re_invoicing(property_id,tenant_id,landlord_id,rent,tax_rate,other_charges,desc,total_amount) VALUES('$peoperty','$tenant','$landlordid','$rentamount','$taxrate','$otherfees','$ofdesc','$total_amount')";
		mysqli_query($conn,$sql2) or die(mysqli_error($conn));

		mysqli_close($conn);

?>