                    <form class="form col-md-12 center-block" action="components/tenant_registration.php" method="post" autocomplete="off">
                        <div class="row">     
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="First Name" name="tfirstname" required>
                                </div>
                            </div>
                            <div class="col-lg-6" style="z-index: 9;">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="Last Name" name="tlastname" required>
                                </div>
                            </div>
                        </div>
                     <div class="row">     
                         <div class="col-lg-12">
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" placeholder="Email Address" name="temail" required>
                            </div>
                         </div>
                     </div>
                        <div class="row">     
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="form-control input-lg" placeholder="pasword" name="tpassword" required>
                                </div>
                            </div>
                        </div>
						<div class="row">     
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <select name="tappartment">
										<option>...</option>
										<option>Flat 1</option>
										<option>Flat 2</option>
										<option>Flat 2</option>
									</select>
                                </div>
                            </div>
                        </div>
						<div class="row">     
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" placeholder="House Number" name="thousenumber" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" style="float:left;" name="signup_button"/>Register</button>
                                </div>
                            </div>
                        </div>
                    </form>