<?php include 'components/session-check-index.php' ?>
<?php require '_database/database.php'; ?>
<?php include 'controllers/base/head.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="KodiPoints - Ease of rent payment">
    <meta name="author" content="Danne Consult">
    <title>KodiPoint-login</title>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Oswald:400,600" rel="stylesheet">
	<link rel="icon" type="image/png" href="../ico.png"/>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="assets/js/jquery.min.js"></script>
<body class="login">
<header>
		<article>
			<div class="topnav">
				<?php include 'controllers/navigation/index-before-login-navigation.php' ?>
			</div>
			<div class="logo"><img src="assets/images/logo.png" /></div>
			<?php include 'controllers/navigation/homenav.php' ?>
		</article>
	</header>
	<div class="container12">
	<article>
	<h2 class="aligncenter">Landlord Register</h2>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" ><?php include 'controllers/form/registration-form_landlord.php' ?></div>
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