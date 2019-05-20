<?php 
$sqlotice = "SELECT * FROM re_notices WHERE owner_id='$current_user'";
$result = mysqli_query($conn,$sqlotice);
?>
<div class="row">
	<div class="col-md-9">
		<h3>Notices To Tenants</h3>
	</div>
	<div class="col-md-3 alignright paddingbtn"><a href="#" class="noticebtn">New notice</a></div>
</div>
<div class="row">
	<div class="col-md-12">
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
		<div class="noticecont">
			<div class="iconscont"></div>
			<div class="datecont"><?php echo "<span>" .$row['notice_date']. "</span>" ; ?> for 
				<?php 
					$tentid = $row['notice_tenant'];
					$sqlz = "SELECT name, email FROM re_tenant WHERE id = '$tentid'";
					$resultz = mysqli_query($conn,$sqlz);
					while($rowz = mysqli_fetch_array($resultz)){
						echo "<span>" .$rowz['name'] . "</span> email: <span>" . $rowz['email']. "</span>";
					}
				 ?>
			</div>
			<div class="noticebody"><h5><?php echo $row['notice_title']; ?></h5><p><?php echo $row['notice']; ?></p></div>
		</div>
	<?php 
		}
	?>
	</div>
</div>