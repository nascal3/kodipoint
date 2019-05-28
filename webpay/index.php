<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'components/landlord_check.php' ?>

<?php
    $sql1="SELECT * FROM re_tenant WHERE landlord_id='$current_user'";
    $result1 = mysqli_query($conn,$sql1) or die(mysqli_error());

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KodiPoints - Ease of rent payment">
    <meta name="author" content="Danne Consult">
    <title>KodiPoint-Webpay</title>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,600" rel="stylesheet">
	<link rel="icon" type="image/png" href="../ico.png"/>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/jquery.datetimepicker.css">
	<link rel="stylesheet" href="../assets/css/style.css">
		<link rel="stylesheet" href="../assets/css/jquery.datetimepicker.css">
	<script src="../assets/js/jquery.min.js"></script>
<body class="login">
<header>
		<article>
			<div class="topnav">
				
			</div>
			<div class="logo" style="width: 111px;"><img src="../assets/images/logo.png" /></div>
			
		</article>
	</header>
<div class="container12 webpayform">
<article>
<div class="row">
<div class="col-md-7">
<h3>Payment Form</h3>	
	<p>Fill in the form with the required information.</p>
	<form action="components/getpay.php" class="contactForm" method="post" >
		<div class="row">
			<div class="col-md-6">
                <select name="customerName" id="prop" >
                    <option>Select Customer...</option>
                    <?php
                    while($row = mysqli_fetch_array($result1)){

                        echo "<option value='" . $row['id'] ."'>". $row['name'] ."</option>";
                    }?>
                </select>
			</div>
			<div class="col-md-6">
				<input type="text" name="mobileNumber" placeholder="Mobile Number" />
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<input type="text" name="amount" placeholder="Amount" />
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<input type="text" name="transactionRefNo" placeholder="TransactionRef No" />
			</div>
			<div class="col-md-6">
				<input type="text" id="datetime" name="timeStamp" placeholder="Date Time" />
				<input type="text" value="<?php echo $current_user ?>" name="landlord_id" hidden />
			</div>

		</div>
		<div class="row">
			<div class="col-md-6">
			<input type="submit" name="submit" class="submit" value="Save Payment" />
			</div>
		</div>
	</form>
</div>
<div class="col-md-5">
	<h3>Recent Payments</h3>
<?php 
	$sql="SELECT * FROM re_payment WHERE landlord_id = '$current_user'";
		$result=  mysqli_query($conn,$sql) or die(mysqli_errno());
		if ($result==""){
		echo "No records added...";
		}else{
	?>
	<table>
		<tr>
			<th>Payer Name</th>
			<th>Amount</th>
			<th>Date Paid</th>
			<th>View</th>
		</tr>
		
		<?php
		
		while($row = mysqli_fetch_array($result)){
		
		echo "<tr>";
			echo "<td>" . $row['trans_customername'] ."</td>";
			echo "<td>" . $row['trans_amount'] ."</td>";
			echo "<td>" . $row['trans_time'] ."</td>";
			echo "<td><a href='../payments.php'><i class='fa fa-eye' aria-hidden='true'></i></a></td>";
		echo "</tr>";
		
		};
		?>
	</table>
<?php }; ?>
</div>
</div>
</article>
</div>
<footer>
		<article>
			<div class="row">
				
				<div class="col-md-2 col-md-offset-10">
					<img class="footlogo" src="../assets/images/footlogo.png" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 copy">&copy;2018 KodiPoint | <a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">info@kodipoint.com</a></div>
			</div>
		</article>
	</footer>
</body>
<script src="../assets/js/jquery.datetimepicker.full.js"></script>
<script>
	$(document).ready(function(){
		$('#datetime').datetimepicker();
	});
</script>
</html>