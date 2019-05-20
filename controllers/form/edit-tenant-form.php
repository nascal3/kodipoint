<?php  
 $sql2= "SELECT * FROM re_tenant WHERE id='$current_user'";
	$resultz = mysqli_query($conn,$sql2);


while($rowz = mysqli_fetch_array($resultz)){ ?>
<form action="components/update-tenant.php" method="post" class="contactForm" enctype="multipart/form-data" id="UploadForm">
    <div class="row">
		<div class="col-md-4 aligncenter">
			<?php if($rowz['avatar_id']==""){ 
				echo '<div class="tenprof" style="background:url(userfiles/avatars/default.jpg) no-repeat center"></div>';
			}else{
				echo '<div class="tenprof" style="background:url('. $rowz['avatar_id'] .')no-repeat center"></div>';	
			}?>
			<br />
			<br />
			<input type="file" name="avatar" />
		</div>
		<div class="col-md-8">
		<div class="row">
			<div class="col-md-4">
				<p>Name: <b><?php echo $rowz['name']; ?></b></p>
				<p>Email: <b><?php echo $rowz['email']; ?></b></p>	
				<p>Personal ID: <b><?php echo $rowz['tenantid']; ?></b></p>
			</div>
		</div>
		<br /></br />
		<div class="row">
			<div class="col-md-6">
				<label for="telephone">Telephone</label><br />
				<input type="text" name="telephone" value="<?php echo $rowz['telephone'];?>" /></p>
				
			</div>
			<div class="col-md-6">
				<label for="address">Postal Address</label><br />
				<input type="text" name="address" value="<?php echo $rowz['postal_address'];?>" /></p>
			</div>
		</div>
		
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-8 alignright">
			<button type="submit" name="submit" class="submit" >Save</button>	
		</div>	
	</div>
</form>
<?php } ?>
