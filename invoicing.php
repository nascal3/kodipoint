<?php include 'components/authentication.php' ?> 
<?php include 'components/landlord_check.php' ?> 
<?php include 'controllers/base/head.php' ?>

<?php 
  
	$sql1="SELECT * FROM re_properties WHERE landlord='$current_user'";
	$result1 = mysqli_query($conn,$sql1) or die(mysqli_error()); 
    
?>
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KodiPoints - Ease of rent payment">
    <meta name="author" content="Danne Consult">
    <title>KodiPoint-Tenant View</title>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,600" rel="stylesheet">
	<link rel="icon" type="image/png" href="../ico.png"/>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/realestate/flaticon.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery.min.js"></script>
<body class="inside">
<header>
	<article>
		<div class="logo"><img src="assets/images/logo.png" /></div>
		<?php include 'controllers/navigation/first-navigation.php' ?> 
	</article>
</header>
<?php include 'controllers/navigation/landlord_icons.php' ?> 

<div class="container12 pagetitle">
	<article>
		<div class="row">
			<div class="col-md-12">
				<h3>Invoicing</h3>
			</div>
		</div>
	</article>
</div><p>&nbsp;</p>
<div class="container12">
	<article>
	<form class="contactForm" action="components/invoice_get.php" method="post" autocomplete="off">
	<div class="row" style="margin-bottom:3em;">
		<div class="col-md-8">
		<h5>Select the apartment and tenant:</h5>
		<div class="row">
				<div class="col-md-4">
					<p>Select Apartment:</p>
					<select name="property" id="prop">
						<option>...</option>
						<?php
						while($row = mysqli_fetch_array($result1)){
							
							echo "<option value='" . $row['id'] ."'>". $row['property_name'] ."</option>";
							}?>
					</select>
				</div>
				<div class="col-md-4">
					<p>Select Tenant:</p>
					<select name="tenant" id="tena" disabled="disabled">
						<option>...</option>
					</select>
				</div>
				<div class="col-md-4">
					<p>Select Unit:</p>
					<select name="unitno" id="unitno" disabled="disabled">
						<option>...</option>
					</select>
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12" id="desc" style="display:none;">
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
			<h5>Enter the rent amount and extra charges:</h5>
				<div class="row">	
					<div class="col-md-3"><input type="text" name="rentamount" id="rentamount"  placeholder="Rent Amount"/></div>	
					<div class="col-md-3"><input type="text" name="otherfees"  id="otherfees" placeholder="Other Fees"/></div>
					<div class="col-md-3"><input type="text" name="desc" id="ofdesc"  placeholder="description"/></div>	
					<div class="col-md-3"><input type="text" name="taxrate" id="taxrate"  placeholder="Tax Rate - %"/> %</div>
					<input type="text" name="landlordid" id="landlordid" value="<?php echo $current_user ?>"  hidden />
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			<h5>Select the frequency of invoicing:</h5>
			<div class="row">
				<div class="col-md-3">
				<select name="frequency">
					<option>...</option>
					<option value="monthly">Monthly</option>
					<option value="quarterly">Quarterly</option>
					<option value="annually">Annually</option>
				</select><p>&nbsp;</p>
				</div>
			</div>
			<div class="row">	
				<div class="col-md-6"><button class="submit" type="submit" name="submit" >Save</button></div>
			</div>
			</div>
		</div>
		</form>
	</article>
</div>
<div class="container12" style="margin-top:3em;">
	<article>
		<div class="row">
			<div class="col-md-12">
			<?php 
				$sql2 = "SELECT * FROM re_invoicing LEFT JOIN (re_properties,re_tenant) ON re_properties.id = re_invoicing.property_id AND re_tenant.id = re_invoicing.tenant_id  WHERE re_invoicing.landlord_id='$current_user'";
				$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
				if(!$result2==""){
			?>
				<table>
					<tr>
						<th>Apartment Name</th>
						<th>Apartment Name</th>
						<th>Tenant Name</th>
						<th>Tenant email</th>
						<th>Rent</th>
						<th>Other Fees</th>
						<th>Tax Rate</th>
						<th>Invoice Frequency</th>
						<th><b>Total Amount</b></th>
						<th></th>
					</tr>
					<?php
					while($row = mysqli_fetch_array($result2)){
					echo "<tr>
						<td>" . $row[14] . "</td>
						<td>" . $row[4] . "</td>
						<td>" . $row[26] . "</td>
						<td>" . $row[27] . "</td>
						<td>" . $row[9] . "</td>
						<td>" . $row[10] . "</td>
						<td>" . $row[8] . "</td>
						<td>" . $row[6] . "</td>
						<td>" . $row[12] . "</td>
						<td><a href='view_tenant.php?ten=". $row[2] ."'><i class='fa fa-eye' aria-hidden='true'></i></a> &nbsp; <a href='docs/invoice.php?invoiceref=". $row['invoice_code'] ."' target='_new'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></td>
					</tr>";
					}?>	
				</table>
				<?php 
				}else{
					echo 'No records found';
				} ?>
			</div>
		</div>
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 

<script>
	$(document).ready(function(){
		$('#prop').on('change', function() {
			var prop = this.value;
			var url = "components/getprop.php";
		
			if(!prop==''){
			$.post(url,{propx:prop},function(data){
				if (data =='fail'){
					alert('no records found')
					$('#tena').find('option').remove().end().append('<option>...</option>')
					$('#tena').prop('disabled', 'disabled');
					$('#desc').empty()
				}else{
					$('#tena').removeAttr("disabled");
					$('#tena').find('option').remove().end().append('<option>...</option>' + data);
				}
			})
			};
	});
	$('#prop').on('change', function() {
			var tena = this.value;
			var url = "components/getpropdetail.php";
			if(!tena==''){
			$.post(url,{tenax:tena},function(data){
				if (data =='fail'){
					alert('no records found')
					$('#desc').hide()
					$('#desc').empty()
					$('#tena').prop('disabled', 'disabled');
				}else{
					$('#tena').removeAttr("disabled");
					$('#desc').empty()
					$('#desc').append(data);
					$('#desc').show();
				}
			})
			};
	});
	$('#tena').on('change', function() {
			var ten = this.value;
			var url = "components/getunit.php";

			if(!ten==''){
			$.post(url,{tenx:ten},function(data){
				
				if (data =='fail'){
					alert('no records found')
					$('#unitno').find('option').remove().end().append('<option>...</option>')
					$('#unitno').prop('disabled', 'disabled');
				}else{
					$('#unitno').removeAttr("disabled");
					$('#unitno').find('option').remove().end().append('<option>...</option>' + data);
				}
			})
			};
	
	
	});
});
</script>
</body>
</html>