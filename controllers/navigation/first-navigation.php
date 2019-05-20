<?php
    $sqlnav = "SELECT * FROM re_landlords WHERE id='$current_user'";
    $result = mysqli_query($conn,$sqlnav);
    while($row = mysqli_fetch_array($result)) {
?>
    <!-- Navbar1 -->
	<nav>
		<ul>
			<li><a href="landlord_profile.php"><div class="navpic" style="background:url(userfiles/avatars/<?php echo $row['avatar'];?>) center no-repeat"></div> <?php echo $row['firstname'];?> <?php echo $row['lastname'];?></a></li>
			<li><a href="edit_landlord.php"><i class="fa fa-edit"></i> Edit Profile</a></li>
			<li><a href="components/logout.php"><i class="fa fa-mail-reply"></i> Logout</a></li>
		</ul>
	</nav>
      <!-- ./Navbar1 -->
<?php
    }
?>