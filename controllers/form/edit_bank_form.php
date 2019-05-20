					<form class="contactForm" action="components/update_landlord_bank_details.php" method="post" autocomplete="off">
						<input type="hidden" name="userid" value="<?php echo $current_user; ?>" >
                        <div class="row">     
                            <div class="col-md-12">
								<label for="bname">Bank Name</label><br />
                                <input type="text" class="" name="bname" Placeholder="Bank Name" required>
                            </div>
						</div>
						<div class="row">  
                            <div class="col-md-6">
							<label for="bbranch">Bank Branch</label><br />
                                <input type="text" class="" placeholder="Bank Branch" name="bbranch" required>
                            </div>    
							 <div class="col-md-6">
							 <label for="baccount">Account Number</label><br />
								<input type="text" class="" placeholder="Account Number" name="baccount" required>
							 </div>
                     </div>
                     <div class="row">     
						<div class="col-md-6">
							<label for="bswift">Swift Code</label><br />
						   <input type="text" class="" placeholder="Swift Code" name="bswift" required>
						</div>  
						<div class="col-md-6">
							<label for="bcurrency">Preferred Currency</label><br />
						   <select name="bcurrency" required>
							<option value="Ksh">Kenya Shillings</option>
							<option value="USD">Us Dollar</option>
							</select>
						</div>
					</div>
					<div class="row">    
						<div class="col-md-12">
							<div class="form-group">
								<button class="submit" type="submit" name="register"/>Save Bank Details</button>
							</div>
						</div>
					</div>
                    </form>