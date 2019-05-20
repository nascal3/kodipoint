<form class="contactForm" action="components/property_registration.php" method="post" autocomplete="off" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-6"><label for="propertytype">Select the property type</label>
			<select name="propertytype">
				<option>...</option>
				<option value="Land">Land</option>
				<option value="Apartment">Apartment</option>
				<option value="Office Space">Office Space</option>
				<option value="Shop">Shop</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<input type="text" name="propertyname"  placeholder="Enter Property or Apartment Name" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="lrno"  placeholder="LR Number" />
		</div>
		<div class="col-md-6">
			<input type="text" name="location"  placeholder="Location" />
		</div>
		<div class="col-md-6">
			<input type="text" name="country"  placeholder="Country" />
		</div>
		<div class="col-md-12">
			<p>Description</p>
			<textarea name="desc" rowspan="3"></textarea>
			<p>&nbsp;</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="contact"  placeholder="Contact Person" />
		</div>
		<div class="col-md-6">
			<input type="text" name="phone"  placeholder="Telephone Number" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<input type="text" name="number_units"  placeholder="Number of units in the property" />
		</div>
	</div>
	
	<script type="text/javascript">
	$( document ).ready(function() {
        function readURL(input) {
             if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('.imgpreview').css('background-image','url('+e.target.result+')');
                    $('.imgpreview').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        };
		$("#profileimg").change(function () {
			readURL(this);
		});
	});
    </script>
	<h3>Property Images</h3>
		Profile Image: <input type="file" name="profile_pic" placeholder="Choose file" id="profileimg" class="" />
		<div class="imgpreview" style="display:none; width: 200px; height: 200px; background-size: cover; background-position: center; margin-botoom:20px;    background-size: 100%; background-repeat: no-repeat;"></div>
	<button type="submit" class="submit" name="save">Save</button>
</form>

