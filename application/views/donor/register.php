<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <div class="description">
                       	    <p>
                                Already registered? <a href="<?php echo base_url('donor/login'); ?>">Click</a> here to login.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="<?php echo base_url('donor/registerProcess'); ?>" method="post" class="f1" id="donorRegister">
                    		<h3>Volunteer Blood Donors</h3>
                    		<p>Donate blood, stay healthy and save life!</p>
                            <div id="form-errors"></div>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>About</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-phone"></i></div>
                    				<p>Contact</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-binoculars"></i></div>
                    				<p>How did you got us?</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4>Tell us who you are:</h4>                              
                                <div class="form-group">
                                    <label class="sr-only" for="f1-first-name">Name</label>
                                    <input type="text" name="f1-first-name" placeholder="Name..." class="f1-first-name form-control required" id="f1-first-name" data-toggle="popover" data-placement="top" data-content="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-gender">Gender</label>
                                    <select name="f1-gender" class="f1-gender form-control required" id="f1-gender"  data-toggle="popover" data-placement="top" data-content="Select your gender">
                                        <option value="" disabled="disabled" selected>Gender...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-time-donated">Last Time Donated</label>
                                    <input type="date" name="f1-last-time-donated" placeholder="Last Time Donated..." class="f1-last-time-donated form-control required" id="f1-last-time-donated" data-toggle="popover" data-placement="top" data-content="Last time you donated">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-blood-group">Blood Group</label>
                                    <select name="f1-blood-group" class="f1-blood-group form-control" id="blood-group" data-toggle="popover" data-placement="top" data-content="Enter your blood group">
                                          <option value="" disabled="disabled" selected>Blood Group...</option>
                                          <option value="A Positive">A Positive</option>
                                          <option value="A Negative">A Negative</option>
                                          <option value="B Positive">B Positive</option>
                                          <option value="B Negative">B Negative</option>
                                          <option value="O Positive">O Positive</option>
                                          <option value="O Negative">O Negative</option>
                                          <option value="AB Positive">AB Positive</option>
                                          <option value="AB Negative">AB Negative</option>
                                          <option value="NA">NA</option>
                                    </select>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>Contact Information:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-country">Country</label>
                                    <select name="f1-country" class="f1-country form-control required" id="f1-country" data-toggle="popover" data-placement="top" data-content="Your country">
                                          <option value="" disabled="disabled" selected>Country...</option>
                                          <?php foreach($country_list as $i => $v){ ?>
                                              <option value="<?php echo $v->id; ?>"><?php echo $v->country; ?></option>
                                          <?php } ?>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-state">State</label>
                                    <select name="f1-state" class="f1-state form-control required" id="f1-state" data-toggle="popover" data-placement="top" data-content="Your state" disabled="disabled">
                                          <option value="" disabled="disabled" selected>State...</option>
                                    </select>                                    
                                </div>                                
                                <div class="form-group">
                                    <label class="sr-only" for="f1-city">City</label>
                                    <select name="f1-city" class="f1-city form-control required" id="f1-city" data-toggle="popover" data-placement="top" data-content="Your city" disabled="disabled">
                                          <option value="" disabled="disabled" selected>City...</option>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-address">Lane Address</label>
                                    <input type="text" name="f1-address" placeholder="Lane Address..." class="f1-address form-control" id="f1-address" data-toggle="popover" data-placement="top" data-content="Your address">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-contact-number">Contact Number</label>
                                    <input type="text" name="f1-contact-number" placeholder="Contact Number (10 digits)..." class="f1-contact-number form-control required" id="f1-contact-number" data-toggle="popover" data-placement="top" data-content="Your valid 10 digit contact number" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-alternate-number">Alternate Number</label>
                                    <input type="text" name="f1-alternate-number" placeholder="Alternate Number (10 digits)..." class="f1-alternate-number form-control" id="f1-alternate-number" data-toggle="popover" data-placement="top" data-content="Your valid 10 contact number" maxlength="10">
                                </div>                                
                                <div class="form-group">
                                    <label class="sr-only" for="f1-email">Email</label>
                                    <input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control required" id="f1-email" data-toggle="popover" data-placement="top" data-content="Your email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-hospital-nearby">Hospital Nearby</label>
									<input type="text" name="f1-hospital-nearby" placeholder="Hospital Nearby..." class="f1-hospital-nearby form-control required" id="hospital-nearby" data-toggle="popover" data-placement="top" data-content="Select nearby hospital">                      
                                </div>                                
                                <div class="form-group">
                                    <label class="sr-only" for="f1-password">Password</label>
                                    <input type="password" name="f1-password" placeholder="Password..." class="f1-password form-control required" id="f1-password" data-toggle="popover" data-placement="top" data-content="Set password (for future use)">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Repeat password</label>
                                    <input type="password" name="f1-repeat-password" placeholder="Repeat password..." 
                                                        class="f1-repeat-password form-control required" id="f1-repeat-password" data-toggle="popover" data-placement="top" data-content="Confirm password">
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <h4>How did you got us?:</h4>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-how-know">How you came to know about this form.</label>
                                    <input type="text" name="f1-how-know" placeholder="How you came to know about this form...." class="f1-how-know form-control required" id="f1-how-know">
                                </div>
                                <div class="form-group">
                                    <?php //echo $reCaptcha_html; ?>
                                    <?php //echo $reCaptcha_script_tag; ?>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="alertMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel"><?php echo FEMALE_ALERT_MESSAGE_TITLE; ?></h2>
      </div>
      <div class="modal-body">
        <?php echo FEMALE_ALERT_MESSAGE; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-orange" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
window.onload = function(){
	var availableHospitals = <?php echo json_encode($hospital_list); ?>;
	$( "#hospital-nearby" ).autocomplete({
		  source: availableHospitals
    });	
}
</script>
