<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<!-- Top content -->

<div class="top-content" style="background:#fff;">
    <div class="container-fluid">
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
<form role="form" action="<?php echo base_url('donor/updateDonor'); ?>" method="post" class="f1" id="updateDonor">
	<fieldset>
		<div class="form-group">
			<label class="" for="f1-first-name">Name</label>
			<input type="text" name="f1-first-name" placeholder="Name..." class="f1-first-name form-control required" id="f1-first-name" value="<?php echo $donor->name; ?>">
		</div>
		<div class="form-group">
			<label class="" for="f1-gender">Gender</label>
			<select name="f1-gender" class="f1-gender form-control required" id="f1-gender">
				<option value="" disabled="disabled" <?php echo  ?>>Gender...</option>
				<option value="male" <?php echo $donor->gender == 'male' ? "selected" :''; ?>>Male</option>
				<!--option value="female" <?php echo $donor->gender == 'female' ? "selected" :''; ?>>Female</option-->
			</select>
		</div>
		<div class="form-group">
			<label class="" for="f1-last-time-donated">Last Time Donated</label>
			<input type="date" name="f1-last-time-donated" placeholder="Last Time Donated..." class="f1-last-time-donated form-control required" id="f1-last-time-donated" value="<?php echo $donor->last_time_donated; ?>">
		</div>
		<div class="form-group">
			<label class="" for="f1-blood-group">Blood Group</label>
			<select name="f1-blood-group" class="f1-blood-group form-control" id="blood-group">
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
	</fieldset>

	<fieldset>
		<div class="form-group">
			<label class="" for="f1-country">Country</label>
			<select name="f1-country" class="f1-country form-control required" id="f1-country">
				  <option value="" disabled="disabled" selected>Country...</option>
				  <?php foreach($country_list as $i => $v){ ?>
					  <option value="<?php echo $v->id; ?>"><?php echo $v->country; ?></option>
				  <?php } ?>
			</select>                                    
		</div>
		<div class="form-group">
			<label class="" for="f1-state">State</label>
			<select name="f1-state" class="f1-state form-control required" id="f1-state">
				  <option value="" disabled="disabled" selected>State...</option>
			</select>                                    
		</div>                                
		<div class="form-group">
			<label class="" for="f1-city">City</label>
			<select name="f1-city" class="f1-city form-control required" id="f1-city">
				  <option value="" disabled="disabled" selected>City...</option>
			</select>                                    
		</div>
		<div class="form-group">
			<label class="" for="f1-address">Lane Address</label>
			<input type="text" name="f1-address" placeholder="Lane Address..." class="f1-address form-control" id="f1-address"  value="<?php echo $donor->address; ?>">
		</div>
		<div class="form-group">
			<label class="" for="f1-contact-number">Contact Number</label>
			<input type="text" name="f1-contact-number" placeholder="Contact Number..." class="f1-contact-number form-control required" id="f1-contact-number"  value="<?php echo $donor->contact; ?>"">
		</div>
		<div class="form-group">
			<label class="" for="f1-alternate-number">Alternate Number</label>
			<input type="text" name="f1-alternate-number" placeholder="Alternate Number..." class="f1-alternate-number form-control" id="f1-alternate-number"  value="<?php echo $donor->alternate_contact; ?>">
		</div>                                
		<div class="form-group">
			<label class="" for="f1-email">Email</label>
			<input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control" id="f1-email"  value="<?php echo $donor->email; ?>">
		</div>
		<div class="form-group">
			<label class="" for="f1-hospital-nearby">Hospital Nearby</label>nearby_hospital
			<select name="f1-hospital-nearby" class="f1-hospital-nearby form-control required" id="hospital-nearby">
				  <option value="" disabled="disabled" selected>Hospital Nearby...</option>
				  <?php foreach($hospital_list as $i => $v){ ?>
					  <option value="<?php echo $v->id; ?>"><?php echo $v->nearby_hospital; ?></option>
				  <?php } ?>
			</select>                                    
		</div>                                
		<div class="form-group">
			<label class="" for="f1-password">Password</label>
			<input type="password" name="f1-password" placeholder="Password..." class="f1-password form-control required" id="f1-password" value="<?php echo $donor->; ?>">
		</div>
		<div class="form-group">
			<label class="" for="f1-repeat-password">Repeat password</label>
			<input type="password" name="f1-repeat-password" placeholder="Repeat password..." 
								class="f1-repeat-password form-control required" id="f1-repeat-password" value="<?php echo $donor->; ?>">
		</div>
	</fieldset>

	<fieldset>
		<h4>How did you got us?:</h4>
		<div class="form-group">
			<label class="" for="f1-how-know">How you came to know about this form.</label>
			<input type="text" name="f1-how-know" placeholder="How you came to know about this form...." class="f1-how-know form-control required" id="f1-how-know" value="<?php echo $donor->how_you_know_us; ?>">
		</div>
		<div class="form-group">
			<?php echo $reCaptcha_html; ?>
			<?php echo $reCaptcha_script_tag; ?>
		</div>
		<div class="f1-buttons">
			<button type="submit" class="btn btn-submit">Submit</button>
		</div>
	</fieldset>
</form>

			
			
			</div>
		</div>



	
  


		
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>		
    </div>
</div>    
