<?php
session_start();
    include '../_database/database.php';
    if(isset($_REQUEST['submit'])){
		$propertyid=$_REQUEST['property'];
		$tenantid=$_REQUEST['tenant'];
        $rent=$_REQUEST['rentamount'];
        $otherfees=$_REQUEST['otherfees'];
        $description=$_REQUEST['desc'];
        $taxrate=$_REQUEST['taxrate'];
        $landlordid=$_REQUEST['landlordid'];
        $frequency=$_REQUEST['frequency'];
        $unitno=$_REQUEST['unitno'];
		
		function generateRandomString($length) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		};

		function rentmath($amoutrent,$otherfeesx,$taxratex){
		    if (empty($otherfeesx)) { $otherfeesx = 0 ;}
		    if (empty($taxratex)) { $taxratex = 0 ;}
		    if (empty($amoutrent)) { $amoutrent = 0 ;}

			if(!$taxratex==""){
				$ratemath = ($taxratex + 100)/100;
				$total_rent= $amoutrent + $otherfeesx;
				$total_rent = $total_rent * $ratemath;
			}else{
				$total_rent= $amoutrent + $otherfeesx;
			}
			return $total_rent;
		};
		
		$totalamt = rentmath( $rent,$otherfees,$taxrate);
		$invoice_code = generateRandomString(6);
		
		$sql2 = "SELECT unit_no FROM re_invoicing WHERE landlord_id = '$landlordid' AND property_id = '$propertyid' AND unit_no = '$unitno'";
		$result=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		$row = mysqli_num_rows($result);
		if(!$row==1){
		
			$sql="INSERT INTO re_invoicing(property_id,tenant_id,landlord_id,unit_no,invoice_code,frequency,last_pay_date,tax_rate,rent,other_charges,desciption,total_amount) VALUES ('$propertyid','$tenantid','$landlordid','$unitno','$invoice_code','$frequency','','$taxrate','$rent','$otherfees','$description','$totalamt')";
			mysqli_query($conn,$sql) or die(mysqli_error($conn));
			header('Location: ../invoicing.php');
		}else{
			header('Location: ../invoicing.php?error=change_unitx');
		}
		mysqli_close($conn);
	}
?>
