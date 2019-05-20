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
    <title>KodiPoint-Payments</title>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,600" rel="stylesheet">
	<link rel="icon" type="image/png" href="../ico.png"/>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/realestate/flaticon.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery.min.js"></script>
</head>
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
				<h3>Payments</h2>
			</div>
		</div>
	</article>
</div><p>&nbsp;</p>
<div class="container12">
	<article>
		<table>
			<tr>
				<th>Invoice Ref:</th>
				<th>Tenant Name</th>
				<th>Property/Unit No</th>
				<th>Amount</th>
				<th>Date of Invoice</th>
				<th>Date of Payment</th>
				<th>Status</th>
			</tr>
			<?php 
						$sqlx = "SELECT re_invoices.invoice_ref, re_invoices.date_issued,re_invoices.date_paid, re_invoices.costs, re_invoices.pay_status, re_properties.property_name, re_propertytenant.unit_no, re_tenant.name, re_tenant.id FROM re_invoices LEFT JOIN (re_properties,re_propertytenant, re_invoicing, re_tenant) ON re_properties.id = re_invoices.property_id AND re_invoices.tenant_id = re_propertytenant.tenant_id AND re_invoices.tenant_id = re_tenant.id AND re_invoicing.tenant_id = re_invoices.tenant_id WHERE re_properties.landlord = '$current_user' AND re_invoices.pay_status= 1";
						$resultx = mysqli_query($conn,$sqlx) or die(mysqli_error()); 
						
						if(!$rowx = mysqli_num_rows($resultx) == 0){
						while($rowx = mysqli_fetch_array($resultx)){
							echo "<tr>
									<td>" .$rowx['invoice_ref']. "</td>
									<td>" .$rowx['name']. "</td>
									<td>" .$rowx['property_name']. "</td>
									<td>" .$rowx['costs']. "</td>
									<td>" .$rowx['date_issued']. "</td>
									<td>" .$rowx['date_paid']. "</td>";
									if($rowx['pay_status']==1){echo "<td><span class='greenfont'>paid</span></td>"; }if($rowx['pay_status']==0){ echo "<td><span class='redfont'>not paid</span></td>";}if($rowx['pay_status']==3){ echo "<td><span class='redfont'>Payed Less</span></td>";};
									
							echo "</tr>";
								
						}
						}else{ echo "<p>No Payments Made!</p>";}
					?>
		</table>
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 

</body>
</html>