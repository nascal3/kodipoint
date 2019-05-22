<?php 
	include '../_database/database.php'; 
	$tenax = mysqli_real_escape_string($conn,$_REQUEST['tenax']);
	if(!$tenax ==""){
			$sql2="SELECT * FROM re_properties WHERE id='$tenax'";

			if(!$sql2==""){
			$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
			while($rws2 = mysqli_fetch_array($result2)){

				$report = "<div class='row' style='margin-bottom:4em'><div class='col-md-4'><p>
				Location: <b>" .$rws2['location']. "</b><br />
				LR Number: <b>" .$rws2['lr_no']. "</b><br /></div>
				<div class='col-md-8'>Description: 
				 <b>" .$rws2['description']. "</b>
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