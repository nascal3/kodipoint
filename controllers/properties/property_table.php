<h3>Properties</h3>
<?php 
	$sql="SELECT * FROM re_properties WHERE landlord='$current_user'";
		$result=  mysqli_query($conn,$sql) or die(mysqli_errno());
		if ($result==""){
		echo "No records added...";
		}else{
	?>
	<table>
		<tr>
			<th>Property Name</th>
			<th>Location</th>
			<th>Property Type</th>
			<th>View</th>
		</tr>
		
		<?php
		
		while($row = mysqli_fetch_array($result)){
		
		echo "<tr>";
			echo "<td>" . $row['property_name'] ."</td>";
			echo "<td>" . $row['location'] ."</td>";
			echo "<td>" . $row['property_type'] ."</td>";
			echo "<td><a href='view_property.php?prop=" . $row['id'] ."'><i class='fa fa-eye' aria-hidden='true'></i></a></td>";
		echo "</tr>";
		
		};
		?>
	</table>
<?php }; ?>