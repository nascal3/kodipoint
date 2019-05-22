<?php 
	include '../_database/database.php'; 
	$propx = mysqli_real_escape_string($conn,$_REQUEST['propx']);
	if(!$propx ==""){
		
		$sql="SELECT id,name FROM re_tenant WHERE property_id='$propx'";
		$result =  mysqli_query($conn,$sql) or die(mysqli_errno());
			
        while($rws = mysqli_fetch_array($result)){
            $report =  "<option value='" . $rws['id'] ."'>". $rws['name'] ."</option>";
            print_r($report);
        }

	}else{
		$report = "fail";
		print_r($report);
	}
?>