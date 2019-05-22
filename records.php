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
    <title>KodiPoint-Records</title>
	
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
				<h3>Records</h3>
			</div>
		</div>
	</article>
</div><p>&nbsp;</p>

<?php include 'controllers/base/footer.php' ?> 

</body>
</html>