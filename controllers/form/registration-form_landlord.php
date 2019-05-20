                    <form class="contactForm" action="components/registration_landlord.php" method="post" autocomplete="off">
                        <div class="row">     
                            <div class="col-md-6">
                                <input type="text" class="" placeholder="First Name" name="user_firstname" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="" placeholder="Last Name" name="user_lastname" required>
                            </div>
                        </div>
                     <div class="row">     
                         <div class="col-md-6">
                            <input type="email" class="" placeholder="Email Address" name="user_email" required>
                         </div>
						 <div class="col-md-6">
                            <input type="text" class="" placeholder="Telephone" name="user_tel" required>
                         </div>
                     </div>
                     <div class="row">     
						<div class="col-md-12">
							<p>Enter your password</p>
						   <input type="password" class="" placeholder="password" name="user_password" required>
						</div>
					</div>
					 <div class="row">     
						<div class="col-md-12">
							<p>Re-enter your password</p>
						   <input type="password" class="" placeholder="Re-enter password" name="user_password_check" required>
						</div>
					</div>
					<div class="row">    
						<div class="col-lg-6">
							<div class="form-group">
								<button class="submit" type="submit" name="register"/>Register</button>
							</div>
						</div>
					</div>
                    </form>