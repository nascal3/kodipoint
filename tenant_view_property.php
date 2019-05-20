<?php include 'components/authentication.php' ?> 
<?php include 'components/tenant_check.php' ?> 
<?php include 'controllers/base/head.php' ?>

<?php 
    $propertyid = mysqli_real_escape_string($conn,$_REQUEST['prop']);
    $sql = "SELECT * FROM re_properties where id='$propertyid'";
    $resultz = mysqli_query($conn,$sql) or die(mysqli_error()); 

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
    <title>KodiPoint-Property View</title>
	
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
<?php include 'controllers/navigation/tenant_icons.php' ?> 

<div class="container12 pagetitle">
	<article>
		<div class="row">
			<div class="col-md-12">
				<h3>Properties/Apartments View</h2>
			</div>
		</div>
	</article>
</div>
<?php while($row = mysqli_fetch_array($resultz)){?>

<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-4 aligncenter">
				<div class="prop_img" style="background:url(userfiles/avatars/<?php echo $row['property_img'] ?>) no-repeat center"></div>
			</div>
			<div class="col-md-8">
				<h4 class="prop_tite">Property Name: <span><?php echo $row['property_name'] ?></span></h4>
				<p>Type: <b><?php echo $row['property_type'] ?></b><br />
				LR Number: <b><?php echo $row['lr_no'] ?></b><br />
				Location: <b><?php echo $row['location'] ?></b><br />
				Country: <b><?php echo $row['country'] ?></b><br /><br /></p>
				
				<h5>Description</h5>
				<p><?php echo $row['description'] ?></p>
				<p>&nbsp;</p>
				<p>Contact Person: <b><?php echo $row['contact_person'] ?></b><br />
				Telephone: <b><?php echo $row['telephone'] ?></b><br />
				</p>
			</div>
		</div>
	</article>
<?php } ?>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
</html>