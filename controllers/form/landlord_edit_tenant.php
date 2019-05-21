<?php 	
$rec_id=$_REQUEST['ten'];

$sql2 = "SELECT * FROM re_tenant WHERE id='$rec_id'";
$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
if(!$result2==""){			

$rws = mysqli_fetch_array($result2);
$landlord_id = $rws['landlord_id'];
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
			<input type="hidden" name="rec_id" value="<?php echo $rws['id']; ?>" />
			<input type="text" name="tenantid"  placeholder="Tenant Identification Number" value="<?php echo $rws['tenantid']; ?>" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<label for="apartment">Select the Property/Apartment:</label><br />
			<select name="tenantapartment">
            <?php echo "<option value='". $rws['property_id'] ."'>" . $rws['property_name'] . "</option>"; ?>
			<?php 
				$sql5 = "SELECT * FROM re_properties WHERE landlord = $landlord_id";
				$result5 =  mysqli_query($conn,$sql5) or die(mysqli_errno());
			?>
            <?php
                while($row5 = mysqli_fetch_array($result5)){
                    echo "<option value='". $row5['id'] ."'>" . $row5['property_name'] . "</option>";
                };
            ?>
			</select>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="unitno"  placeholder="House/Unit number" value="<?php echo $rws['unit_no'] ?>" />
		</div>
		<div class="col-md-6">
			<input type="text" name="dateenter" id="dateenter"  placeholder="Start date of occupation" value="<?php echo $rws['move_in_date'] ?>" />
		</div>
	</div>
	<button type="submit" class="submit" name="save">Save</button>&nbsp; &nbsp;<button type="button" id="delete" class="submit" name="deletetent">Delete</button>
</form>
<?php
}else{
	
	echo "Please enter a property!";
}

?>

