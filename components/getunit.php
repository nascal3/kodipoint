<?php 
	include '../_database/database.php'; 
	$tenx = mysqli_real_escape_string($conn,$_REQUEST['tenx']);
	
	if(!$tenx==""){

		
		$sql="SELECT tenant_id FROM re_propertytenant WHERE tenant_id='$tenx'";
		$result =  mysqli_query($conn,$sql) or die(mysqli_errno());
		$rws = mysqli_fetch_array($result);
		
		if(!$rws==""){	
			$sql2="SELECT unit_no FROM re_tenant LEFT JOIN (re_propertytenant,re_properties) ON re_propertytenant.tenant_id = re_tenant.id AND re_propertytenant.property_id = re_properties.id WHERE re_tenant.id='$tenx'";

			if(!$sql2==""){
			$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
			
			while($rws2 = mysqli_fetch_array($result2)){	
				$report =  "<option value='" . $rws2[0]."'>". $rws2[0] ."</option>";
				print_r($report);
			}
			}else{
				$report = "fail";
				print_r($report);
			}
		}else{
			$report = "fail";
			print_r($report);	
		}
	}else{
		$report = "fail";
		print_r($report);
	}

?>