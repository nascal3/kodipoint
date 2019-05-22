<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>  
<?php include 'components/tenant_check.php' ?>  

<?php
    if (isset($_REQUEST['profile'])) {
        $user_email = mysqli_real_escape_string($conn,$_REQUEST['profile']);
    }
//    $profile_username=$rws['username'];
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
    <title>KodiPoint - Tenant Profile</title>
	
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
				<h3>Properties Leased</h3>
				<?php 
					$sql = "SELECT * FROM re_properties LEFT JOIN (re_tenant) ON re_properties.id = re_tenant.property_id WHERE re_tenant.user_id = '$current_user'";
					$result=  mysqli_query($conn,$sql) or die(mysqli_errno());
					if ($result==""){
					echo "No records added...";
					}else{
				?>
				
				<table>
					<tr>
						<th>Property Name</th>
						<th>Country</th>
						<th>Location</th>
						<th>Property Type</th>
						<th>Unit No.</th>
						<th>View</th>
					</tr>
					
					<?php
					while($row = mysqli_fetch_array($result)){
					
					echo "<tr>";
						echo "<td>" . $row['property_name'] ."</td>";
						echo "<td>" . $row['country'] ."</td>";
						echo "<td>" . $row['location'] ."</td>";
						echo "<td>" . $row['property_type'] ."</td>";
						echo "<td>" . $row['unit_no'] ."</td>";
						echo "<td><a href='tenant_view_property.php?prop=". $row['property_id'] ."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>";
					echo "</tr>";
					
					};
					?>
				</table>
			<?php }; ?>
			</div>
		</div>
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
</html>