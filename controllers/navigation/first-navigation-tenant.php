<?php
	$sqlnav = "SELECT * FROM re_tenant WHERE id='$current_user'";
    $result = mysqli_query($conn,$sqlnav);
    while($row = mysqli_fetch_array($result)) {
?>
    <!-- Navbar1 -->
	<nav>
		<ul>
			<li><a href="#"><i class="fa fa-user"></i> <?php echo $row['name'];?></a></li>
			<li><a href="edit_tenant.php"><i class="fa fa-edit"></i> Edit Profile</a></li>
			<li><a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a></li>
		</ul>
	</nav>
      <!-- ./Navbar1 -->
<?php
    }
?>