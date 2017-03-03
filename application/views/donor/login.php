<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <div class="description">
                       	    <p>
                                Not registered? <a href="<?php echo base_url('home'); ?>">Click</a> here to register.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="<?php echo base_url('donor/loginProcess'); ?>" method="post" class="f1" id="loginForm">
                    		<h3>Volunteer Blood Donors</h3>
                    		<p>Login with your registered mobile number</p>
                            <div id="form-errors"></div>                    		
                    		<fieldset>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-userId">Mobile Number</label>
                                    <input type="text" name="f1-userId" placeholder="Mobile Number" class="f1-userId form-control required" id="f1-userId" data-toggle="popover" data-placement="top" data-content="Login with registered mobile number" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="f1-password" placeholder="Password" class="f1-password form-control required" id="f1-password" data-toggle="popover" data-placement="top" data-content="Password">
                                </div>
                                <div class="f1-buttons">
                                    <button type="submit" class="btn btn-next">Login</button>
                                </div>
                                <a href="<?php echo base_url('donor/passwordreset'); ?>">Forgot password</a>                                
                            </fieldset>
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>
