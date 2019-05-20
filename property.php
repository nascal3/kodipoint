<?php include 'components/authentication.php' ?> 
<?php include 'components/landlord_check.php' ?> 
<?php include 'controllers/base/head.php' ?>

<?php
    if (isset($_REQUEST['profile'])) {
        $username = mysqli_real_escape_string($conn,$_REQUEST['profile']);
    }
    $sql = "SELECT * FROM re_landlords where id='$current_user'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error()); 
    $rws = mysqli_fetch_array($result);   
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
    <title>KodiPoint-property</title>
	
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
				<h3>Properties/Apartments</h2>
			</div>
		</div>
	</article>
</div>
<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-8">
				<h4>Add Property/Apartment</h4>
				<?php include 'controllers/form/property.php' ?> 
			</div>
			<div class="col-md-4">
			<h4>Added Property</h4>
			<?php 

				$sql2 = "SELECT * FROM re_properties WHERE landlord = '$current_user'";
				$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
				if(!$result2==""){
					?>
				<table>
					<tr>
						<th>Property Name</th>
						<th>Location</th>
						<th>View</th>
					</tr>
					<?php
					while($row = mysqli_fetch_array($result2)){
					echo "<tr>
						<td>" . $row['property_name'] . "</td>
						<td>" . $row['location'] . "</td>
						<td><a href='view_property.php?prop=".  $row['id'] ."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
					</tr>";
					};
					?>
				</table>
				<?php
				}else{
					echo 'No Records Found!';
				}; 
				?>
			</div>
		</div>
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
</html>