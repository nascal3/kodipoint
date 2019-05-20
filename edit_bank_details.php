<?php include 'components/authentication.php' ?> 
<?php include 'components/session-check.php' ?> 
<?php include 'components/landlord_check.php' ?> 

<?php 
    $user_id = mysqli_real_escape_string($conn,$_REQUEST['profile']);
    $profile_username=$rws['username'];
	
	$sql1="SELECT * FROM re_landlords WHERE id='$current_user'";
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
    <title>KodiPoint-Profile</title>
	
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
<div class="container12 pagetitle">
	<article>
		<div class="row">
			<div class="col-md-12">
				<h3>Edit Bank Details</h3>
			</div>
		</div>
	</article>
</div>
	<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-4" >
			<h3>Current Details</h3>
			<?php while($row = mysqli_fetch_array($result1)){ ?>
				<p>Bank Name: <b><?php echo $row['bank_name'] ?></b><br />
				Branch: <b><?php echo $row['bank_branch'] ?></b><br />
				Account No: <b><?php echo $row['bank_account'] ?></b><br />
				Swift Code: <b><?php echo $row['bank_swift'] ?></b><br />
				Currency: <b><?php echo $row['bank_currency'] ?></b><br />
				</p>
			<?php } ?>
			</div>
			<div class="col-md-8" ><h3>Update Details</h3><?php include 'controllers/form/edit_bank_form.php' ?></div>
		</div>
	</article>
	</div>
	<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-6" ></div>
			<div class="col-md-6" ></div>
		</div>
	</article>
	</div>
	<?php include 'controllers/base/footer.php' ?>
	</body>  
</html>  