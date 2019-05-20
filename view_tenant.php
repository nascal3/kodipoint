<?php include 'components/authentication.php' ?> 
<?php include 'components/landlord_check.php' ?> 
<?php include 'controllers/base/head.php' ?>

<?php 
    $tenantid = mysqli_real_escape_string($conn,$_REQUEST['ten']);
	$sqlz = "SELECT re_tenant.name,re_tenant.email, re_tenant.tenantid, re_tenant.telephone, re_tenant.postal_address, re_tenant.avatar, re_properties.property_name, re_properties.location, re_properties.country, re_propertytenant.unit_no, re_propertytenant.date_moved_in FROM re_tenant LEFT JOIN (re_properties,re_propertytenant,re_landlords) ON re_properties.landlord = re_landlords.id AND re_propertytenant.tenant_id = re_tenant.id AND re_propertytenant.property_id = re_properties.id WHERE re_tenant.id='$tenantid'";
    $resultz = mysqli_query($conn,$sqlz) or die(mysqli_error()); 
	
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
				<h3>Tenants  - View Information</h2>
			</div>
		</div>
	</article>
</div>
<?php while($row = mysqli_fetch_array($resultz)){?>

<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-4 aligncenter">
				<div class="prop_img" style="background:url(userfiles/avatars/<?php echo $row['avatar'] ?>) no-repeat center"></div>
			</div>
			<div class="col-md-8">
				<h4 class="prop_tite">Tenant Name: <span><?php echo $row['name'] ?></span></h4>
				<p>Email: <b><?php echo $row['email'] ?></b><br />
				ID No: <b><?php echo $row['tenantid'] ?></b><br />
				Telephone No: <b><?php echo $row['telephone'] ?></b><br />
				Postal Address: <b><?php echo $row['postal_address'] ?></b><br /><br /></p>
				<p>Property Name: <b><?php echo $row['property_name'] ?></b><br />
				House Number:<b><?php echo $row['unit_no'] ?></b><br />
				Location:<b><?php echo $row['location'] ?></b><br />
				Country:<b><?php echo $row['country'] ?></b><br />
				Date moved in:<b><?php echo $row['date_moved_in'] ?></b></p>
				</p>
			</div>
		</div>
	</article>
<?php } ?>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
</html>