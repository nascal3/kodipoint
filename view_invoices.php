<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>  
<?php include 'components/tenant_check.php' ?>  
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
    <title>KodiPoint - View Invoices</title>
	
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
		<?php include 'controllers/navigation/first-navigation-tenant.php' ?> 
	</article>
</header>
<?php include 'controllers/navigation/tenant_icons.php' ?> 
<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-3">
				<h3>Quick Links</h3>
					<ul>
						<li><a href="#">My Rentals</a></li>
						<li><a href="#">Receipts</a></li>
						<li><a href="#">Notices</a></li>
					<ul>
			</div>
			<div class="col-md-9">
				<h3>View Invoices</h3>
				
				<table id="invoicetb">
					<tr>
						<th>Invoice Ref</th>
						<th>Date Issued</th>
						<th>Property Name</th>
						<th>Unit No.</th>
						<th>Invoice Amount</th>
						<th>Status</th>
						<th>View</th>
						<th>Pay Now</th>
					</tr>
					<?php 
						$sqlx = "SELECT re_invoices.invoice_ref,re_invoices.date_issued,re_properties.property_name,re_invoices.costs,re_invoices.pay_status, re_tenant.unit_no FROM re_invoices LEFT JOIN (re_properties,re_tenant) ON re_properties.id = re_invoices.property_id AND re_invoices.tenant_id = re_tenant.id WHERE re_invoices.tenant_id = '$current_user' AND re_invoices.pay_status = 0";
						$resultx = mysqli_query($conn,$sqlx) or die(mysqli_error()); 
						
						if(!$rowx = mysqli_num_rows($resultx) == 0){
						while($rowx = mysqli_fetch_array($resultx)){
							echo "<tr>
									<td>" .$rowx['invoice_ref']. "</td>
									<td>" .$rowx['date_issued']. "</td>
									<td>" .$rowx['property_name']. "</td>
									<td>" .$rowx['unit_no']. "</td>
									<td>" .$rowx['costs']. "</td>";
									if($rowx['pay_status']==1){echo "<td><span class='greenfont'>paid</span></td>"; }if($rowx['pay_status']==0){ echo "<td><span class='redfont'>not paid</span></td>";}if($rowx['pay_status']==3){ echo "<td><span class='redfont'>Payed Less</span></td>";};
									
							echo "<td class='aligncenter'><a href='docs/invoice.php?invoiceref=". $rowx['invoice_ref'] ."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
									<td class='aligncenter'><a href='paynow.php?i=".$rowx['invoice_ref']. "' class='paynowbtn'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a></td>
								</tr>";
								
						}
						}else{ echo "<p>Yay, no invoices!</p>";}
					?>
				</table>
				<div class="row">
					<div class="col-md-4 col-md-offset-8">
						<div class="totalamount alignright">Total Invoices:<br /> Ksh. <span id="total"></span></div>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 

<script>
$(document).ready(function(){

	var totalSUM = 0;
	
	$("#invoicetb tr").each(function () {
		var getValue = $(this).find("td:eq(4)").html();
		
		if (typeof getValue !== 'undefined') {

		var filteresValue=getValue.replace(/\,/g, '');
		
		totalSUM += Number(filteresValue);
		}
		$('#total').html(totalSUM);
	});
	
});
</script>
</body>
</html>