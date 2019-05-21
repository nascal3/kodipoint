<?php 	
    $sql2 = "SELECT * FROM re_properties WHERE landlord = '$current_user'";
    $result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
    if(!$result2==""){
?>
<form class="contactForm" action="components/tenant_registration.php" method="post" autocomplete="off">

	<div class="row">
		<div class="col-md-6">
			<input type="email" name="tenantemail"  placeholder="Email Address" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="tenantname"  placeholder="Enter Tenant's name" />
		</div>
		<div class="col-md-6">
			<input type="text" name="tenantid"  placeholder="Tenant Identification Number" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="apartment">Select the Property/Apartment:</label><br />
			<select name="tenantapartment">
			<option>...</option>
			<?php
					while($row = mysqli_fetch_array($result2)){
					echo "<option value='". $row['id'] ."'>" . $row['property_name'] . "</option>";	
					};
			?>
			</select>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="unitno"  placeholder="House/Unit number" />
		</div>
		<div class="col-md-6">
			<input type="text" name="dateenter" id="dateenter"  placeholder="Start date of occupation" />
		</div>
	</div>
	<button type="submit" class="submit" name="save">Save</button>
</form>
<?php
}else{
	
	echo "Please enter a property!";
}

?>

