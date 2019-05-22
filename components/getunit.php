<?php 
	include '../_database/database.php'; 
	$tenx = mysqli_real_escape_string($conn,$_REQUEST['tenx']);
	
	if(!$tenx==""){

			$sql2="SELECT unit_no FROM re_tenant WHERE id='$tenx'";

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

?>