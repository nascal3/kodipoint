<?php 
	include '../_database/database.php'; 
	$tenax = mysqli_real_escape_string($conn,$_REQUEST['tenax']);
	if(!$tenax ==""){
			$sql2="SELECT * FROM re_propertytenant LEFT JOIN (re_tenant,re_properties) ON re_propertytenant.tenant_id = re_tenant.id AND re_propertytenant.property_id = re_properties.id WHERE re_tenant.id='$tenax'";

			if(!$sql2==""){
			$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
			while($rws2 = mysqli_fetch_array($result2)){

				$report = "<div class='row' style='margin-bottom:4em'><div class='col-md-4'><p>
				Location <b>" .$rws2[16]. "</b><br />
				LR Number: <b>" .$rws2[21]. "</b><br /></div>
				<div class='col-md-8'><h5>Description</h5> 
				 <b>" .$rws2[23]. "</b>
				</p></div></div>";
				
				
				print_r($report);
			}
			}else{
				$report = "fail";
				print_r(json_encode($report));
			}
		}else{
			$report = "fail";
			print_r(json_encode($report));
		}


?>