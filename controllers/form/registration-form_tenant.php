                    <form class="contactForm center-block" action="components/registration_tenant.php" method="post" autocomplete="off">
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								<input type="email" class="" id="email" placeholder="Enter your email address" name="user_email" required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-3 aligncenter"><button id="checkemail" type="button" class="verifybtn submit">Check</button></div>
						</div>
						<div class="validate aligncenter" id="validity"></div>
						<div id="moreinfo" style="display:none;">
                        <div class="row">     
                            <div class="col-md-6">
                                <input type="text" class="" id="tenantname" placeholder="First Name" name="user_name" disabled />
                            </div>                
							 <div class="col-md-6">
								<input type="text" class="" id="tenantid" placeholder="Identification/Passport Number" name="user_id" disabled>
                            </div>
						</div>
						<div class="row">     
                            <div class="col-md-6">
                                <input type="text" class="" placeholder="Phone Number" name="user_tel" />
                            </div>
                        </div>
                     
                        <div class="row">     
                            <div class="col-md-12">
								<p>Enter your password</p>
                               <input type="password" class="" placeholder="pasword" name="user_password" required>
                            </div>
                        </div>
						 <div class="row">     
                            <div class="col-md-12">
								<p>Re-enter your password</p>
                               <input type="password" class="" placeholder="Re-enter password" name="user_password_check" required>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-md-6">
                                    <button class="submit" type="submit" name="register"/>Register</button>
                            </div>
                        </div>
						</div>
                    </form>