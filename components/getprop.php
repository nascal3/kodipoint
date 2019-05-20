<?php 
	include '../_database/database.php'; 
	$propx = mysqli_real_escape_string($conn,$_REQUEST['propx']);
	if(!$propx ==""){
		
		
		$sql="SELECT tenant_id FROM re_propertytenant WHERE property_id='$propx'";
		$result =  mysqli_query($conn,$sql) or die(mysqli_errno());
		$rws = mysqli_fetch_array($result);
		if(!$rws==""){	
			$sql2="SELECT * FROM re_tenant LEFT JOIN (re_propertytenant,re_properties) ON re_propertytenant.tenant_id = re_tenant.id AND re_propertytenant.property_id = re_properties.id WHERE re_tenant.id='$rws[0]'";

			if(!$sql2==""){
			$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
			
			while($rws2 = mysqli_fetch_array($result2)){	
				$report =  "<option value='" . $rws2[0] ."'>". $rws2[1] ."</option>";
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