<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>  
<?php include 'components/tenant_check.php' ?>  
<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$ref = mysqli_real_escape_string($conn,$_REQUEST['i']);
	if(!$ref==''){
	$sqls="SELECT invoice_ref, costs, tenant_id FROM re_invoices WHERE invoice_ref ='$ref'";
	$results =  mysqli_query($conn,$sqls) or die(mysqli_errno());
	$rows = mysqli_fetch_array($results);
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
				<form class="contactForm">
					<h3>Pay Now</h3>
					<p>Go to Mpesa,<br />
					click on Lipa na M-PESA<br />
					Select <b>Pay Bill</b> option<br />
					Enter the Business Number <b>979620</b><br />
					Account, enter - <b><?php echo $rows['invoice_ref']; ?></b><br /><input type="hidden" id="transactionaccount" name="transactionaccount" value="<?php echo $rows['invoice_ref']; ?>" />
					Enter the amount -  <b>ksh. <span id="showamont"><?php echo $rows['costs']; ?></span><input type="hidden" id="amount" name="amount" value="<?php echo $rows['costs']; ?>" /><input type="hidden" id="tentid" name="tentid" value="<?php echo $rows['tenant_id']; ?>" /></b><br />
					Enter your Mpesa PIN</p><br />
					
					<p>When the transaction is complete, confirm payment by entering the Mpesa Transaction ID here and click the <span style="font-size:16px;"></span><b>VALIDATE</b></span> button. <i>note: this may take 1-5min.</i></p><br />
					<div class="row">
						<div class="col-md-8 validateinput"><input class="required paycode" id="transid" type="text" name="transactionid" placeholder="eg. LZ23..." data-validation="alphanumeric" data-validation-allowing="-_" /><button id="validate" class="validatebtn" type="button">Validate</button><div id="tick"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>
						<div id="validity"></div>
						</div>
					</div>
					<br />
				</form>
			</div>
		</div>
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
<script>
$(document).ready(function(){
	$("#validity").hide();
	
	$("#validate").click(function(){
		$("#validate").html('Validating');
		$("#validity").html("");
		$("#validity").hide();
		
		var url = "components/verify.php";
		var transidx = $("#transid").val();
		var accountx = $("#transactionaccount").val();
		var amountx = $("#amount").val();
		var tenantidx = $("#tentid").val();
		

		if(!transidx==''){
		$.post(url,{transid:transidx,account:accountx,amount:amountx,tenant:tenantidx},function(data){ 
		   alert(data);
		  
			  if (data=="Success"){
				$("#tick").show();
				window.location.replace("view_invoices.php?s=success");
			  }
			  if (data[0]=="less"){
				$("#validity").show();
				$("#validity").html('The amount paid is less than the charges by - kes.' + data[1]) + ". Check your email to complete your Transaction or contact our offices to complete your transaction through <a href='#'>#</a>";
			
			  }
			  if (data[0]=="more"){
				$("#validity").show();
				$("#validity").addClass("morepay");
				$("#validity").html('The amount paid is more than the charges by - kes.' + data[1]);
			  }
			  if (data=="Fail"){
				  alert("fail");
				  $("#validity").show();
				$("#validity").html('Please re-enter the M-pesa transaction ID and validate!');
				$(".submit").attr("disabled", "disabled");
				
			  }
			  if (data=="transerror"){
				  $("#validity").show();
				$("#validity").html('Error in your entry! You might have entered the code twice or the wrong code. Please check your email to confirm the payment receipt');
				$(".submit").attr("disabled", "disabled");
			  }
			}, "json");
			
			
			
		}else{alert("Enter a transaction ID!"); $("#validate").html('Validate');}
		})
});
</script>
</html>
<?php
	}else{
		echo "error! No record selected!";	
	}
?>