<?php 	
$tenantid=$_REQUEST['ten'];

$sql2 = "SELECT * FROM re_tenant WHERE id = '$tenantid'";
$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
if(!$result2==""){			

$rws = mysqli_fetch_array($result2); 

$sql3 = "SELECT * FROM re_propertytenant WHERE tenant_id = '$tenantid'";
$result3 =  mysqli_query($conn,$sql3) or die(mysqli_errno()); 

$rws3 = mysqli_fetch_array($result3); 
 
?>
<form class="contactForm" action="components/landlord_update_tenant.php" method="post" autocomplete="off">

	<div class="row">
		<div class="col-md-6">
			<input type="email" name="tenantemail"  placeholder="Email Address" value="<?php echo $rws['email']; ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="tenantname"  placeholder="Enter Tenant's name" value="<?php echo $rws['name']; ?>" />
		</div>
		<div class="col-md-6">
			<input type="hidden" name="tentid" value="<?php echo $rws['id']; ?>" />
			<input type="text" name="tenantid"  placeholder="Tenant Identification Number" value="<?php echo $rws['tenantid']; ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="apartment">Select the Property/Apartment:</label><br />
			<select name="tenantapartment">
			<?php 
				$sql4 = "SELECT property_id FROM re_propertytenant WHERE tenant_id = '$tenantid'";
				$result4 =  mysqli_query($conn,$sql4) or die(mysqli_errno());
				$rws4 = mysqli_fetch_array($result4); 
				
				$sql5 = "SELECT id, property_name FROM re_properties WHERE id = '$rws4[0]'";
				$result5 =  mysqli_query($conn,$sql5) or die(mysqli_errno());
				$rws5 = mysqli_fetch_array($result5); 
				
				echo "<option value='". $rws5[0] ."'>" . $rws5[1] . "</option>";
				echo "<option>...</option>"
			?>
			<?php
					$sql6 = "SELECT * FROM re_properties WHERE landlord = '$current_user'";
					$result6 =  mysqli_query($conn,$sql6) or die(mysqli_errno());
					while($rws6 = mysqli_fetch_array($result6)){
					echo "<option value='". $rws6['id'] ."'>" . $rws6['property_name'] . "</option>";	
					};
			?>
			</select>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="unitno"  placeholder="House/Unit number" value="<?php echo $rws3['unit_no'] ?>" />
		</div>
		<div class="col-md-6">
			<input type="text" name="dateenter" id="dateenter"  placeholder="Start date of occupation" value="<?php echo $rws3['date_moved_in'] ?>" />
		</div>
	</div>
	<button type="submit" class="submit" name="save">Save</button>&nbsp; &nbsp;<button type="button" id="delete" class="submit" name="deletetent">Delete</button>
</form>
<?php
}else{
	
	echo "Please enter a property!";
}

?>

