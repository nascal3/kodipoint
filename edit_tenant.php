<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>  
<?php include 'components/landlord_check.php' ?>  

<?php
    if (isset($_REQUEST['profile'])) {
        $user_id = mysqli_real_escape_string($conn,$_REQUEST['profile']);
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
    <title>KodiPoint-login</title>
	
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
<div class="container12">
	<article>
		<div class="row">
			<div class="col-md-7">
				<h3>Edit Tenant</h3>
				<?php include 'controllers/form/landlord_edit_tenant.php'; ?>
			</div>
			<div class="col-md-5">
			<h4>Tenants List</h4>
			<?php
                $rec_id = mysqli_real_escape_string($conn,$_REQUEST['ten']);
				$sql2 = "SELECT * FROM re_tenant WHERE landlord_id='$current_user'";
				$result2 =  mysqli_query($conn,$sql2) or die(mysqli_errno());
				if(!$result2==""){
					?>
				<table>
					<tr>
						<th>Tenant Name</th>
						<th>Property Name</th>
						<th>Unit Number</th>
						<th>View</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
					<?php
					while($row = mysqli_fetch_array($result2)){
					echo "<tr>
						<td>" . $row['name'] . "</td>
						<td>" . $row['property_name'] . "</td>
						<td>" . $row['unit_no'] . "</td>
						<td class='aligncenter'><a href='view_tenant.php?ten=". $row[0] ."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>
						<td class='aligncenter'><a href='edit_tenant.php?ten=". $row[0] ."'><i class='fa fa-edit' aria-hidden='true'></i></a></td>
						<td class='aligncenter'><a href='del_tenant.php?ten=". $row[0] ."'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
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
	</article>
</div>
<?php include 'controllers/base/footer.php' ?> 
</body>
</html>