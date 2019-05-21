<?php include 'components/authentication.php' ?> 
<?php include 'components/landlord_check.php' ?> 
<?php include 'controllers/base/head.php' ?>

<?php 
    $rec_id = mysqli_real_escape_string($conn,$_REQUEST['ten']);
	$sqlz = "SELECT * FROM re_tenant WHERE id='$rec_id'";
    $resultz = mysqli_query($conn,$sqlz) or die(mysqli_error());

    function getValues($pro_id) {
        require './_database/database.php';
        $sqlx = "SELECT country, location FROM re_properties WHERE id='$pro_id'";
        $res = mysqli_query($conn,$sqlx) or die(mysqli_error());
        return $rowp = mysqli_fetch_array($res);
    }

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
				<h3>Tenants  - View Information</h3>
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
				House Number: <b><?php echo $row['unit_no'] ?></b><br />
				Location: <b><?php echo getValues($row['property_id'])['location'] ?></b><br />
				Country: <b><?php echo getValues($row['property_id'])['country'] ?></b><br />
				Date moved in: <b><?php echo $row['move_in_date'] ?></b></p>
				</p>
			</div>
		</div>
	</article>
<?php } ?>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
</html>