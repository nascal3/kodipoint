<?php include 'components/authentication.php' ?> 
<?php include 'components/session-check.php' ?> 
<?php include 'components/landlord_check.php' ?> 
<?php include 'controllers/base/head.php' ?>

<?php 
  
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
    <title>KodiPoint-Tenant View</title>
	
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
<div class="container12 pagetitle">
	<article>
		<div class="row">
			<div class="col-md-12">
				<h3>Edit Profile</h3>
			</div>
		</div>
	</article>
</div>
<div class="container12">
<?php while($row = mysqli_fetch_array($result1)){ ?>
	<article>				
	<h4>Update Information</h4>
		<form class="contactForm" action="components/update_landlord.php" method="post" autocomplete="off" enctype="multipart/form-data">
		<input type="email" name="email" value="<?php echo $row['email'] ?>"  hidden/>
			<div class="row">
				<div class="col-md-4"><p><b>Personal Information</b></p><p>*Email cannot be changed</p><br /></div>
			</div>
			
		<div class="row">
			<div class="col-md-4">
				<div class="prop_img" style="background:url(userfiles/avatars/<?php echo $row['avatar'] ?>) no-repeat center"></div>
				<center><input type="file" name="avatarx" id="uploadimage" /></center>
			</div>
		
			<div class="col-md-8">
			<div class="row">
			
				<div class="col-md-6">
				<label>First Name</label><br />
				<input type="text" name="fname" value="<?php echo $row['firstname'] ?>" placeholder="First Name" />
				</div>
				<div class="col-md-6">
				<label>Last Name</label><br />
				<input type="text" name="lname" value="<?php echo $row['lastname'] ?>" placeholder="Last Name"  />
				</div>
				<div class="col-md-6">
				<label>KRA PIN - Cannot be changed</label><br />
				<input type="text" name="pin" value="<?php echo $row['kra_pin'] ?>"  disabled/>
				</div>
				<div class="col-md-6">
				<label>Email - Cannot be changed</label><br />
				<input type="email" name="emailx" value="<?php echo $row['email'] ?>"  disabled/>
				
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<label>Telephone</label><br />
				<input type="text" name="tel" value="<?php echo $row['telephone'] ?>" placeholder="Telephone"  />
				</div>
				<div class="col-md-6">
				<label>Address</label><br />
				<input type="text" name="address" value="<?php echo $row['address_box'] ?>" placeholder="Address"  />
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-6"><p><b>Change Password</b></p></div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<label>New Password</label><br />
				<input type="password" name="password1" id="pass1" placeholder="New Password"  />
				</div>
			</div>
			<div class="row">
			
				<div class="col-md-6">
				<label>Confirm Password</label><br />
				<input type="password" name="password2" id="pass2" placeholder="Repeat Password" />
				<div id="mess"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<input type="submit"class="submit" name="submit" value="Update information" /><br /><a style="text-decoration:underline;" href="edit_bank_details.php">Edit Bank Details</a>
				</div>
			</div>
		</div>
				
			<?php   } ?>
			</div>
		</div>
	</article>
</div>
<div class="container12">
	<article>
		<div class="row">
		</div>
	</article>
</div>
<?php include 'controllers/base/footer.php' ;
mysqli_close($conn);
?> 
</body>
<script>
$(document).ready(function(){
	
	$("#pass2").keyup(function(){
		$valpass1= $("#pass1").val();
		$valpass2= $("#pass2").val();
		
		$("#mess").empty();
		
		if($valpass1==$valpass2){
			$("#mess").append("<p class='greenfont'>Password Match &nbsp;<i class='fa fa-check' aria-hidden='true'></i></p><br />");
		}else{
			$("#mess").append("<p class='redfont'>Password Mismatch &nbsp;<i class='fa fa-times' aria-hidden='true'></i></p><br />");
		}
		
	})
	 function readURL(input) {
             if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.prop_img').css('background-image','url('+e.target.result+')');
                }

                reader.readAsDataURL(input.files[0]);
            }
        };
		$("#uploadimage").change(function () {
			readURL(this);
		});
	
})
</script>
</html>