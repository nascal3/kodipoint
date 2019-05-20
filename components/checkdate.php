<?php 
function checkinvoice(){
	include '../_database/database.php';
	$current_date= date("Y/m/d");
	$sql1 = "SELECT * FROM re_invoicing";
	$result1 = mysqli_query($conn,$sql1) or die(mysqli_error()); 
	
	function generateRandomString($length) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		};
		
	$invoice_code = generateRandomString(6);
	
	$sql2 = "SELECT * FROM re_invoicing";

	while($row1 = mysqli_fetch_array($result1)){
	if($row1['frequency']=='monthly' || date("d")== 26){
			
		$sql="INSERT INTO re_invoices(invoice_ref,tenant_id,property_id,date_issued,costs) VALUES ('$row1[invoice_code]','$row1[tenant_id]','$row1[property_id]','$current_date','$row1[total_amount]')";
		//echo $sql; 
		mysqli_query($conn,$sql) or die(mysqli_error($conn));	
		}
	}
	return;
}
	checkinvoice();

?>