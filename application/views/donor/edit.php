<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<!-- Top content -->

<div class="top-content" style="background:#fff;">
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text">
				<div class="description">
					<h3>
						Update Your Profile.
						<button class="btn btn-orange pull-right pull-right"><a href="<?php echo base_url("donor/view/{$this->session->userid}"); ?>">Profile</i></a></button>
					</h3>
				</div>
			</div>
		</div>
		<?php if($this->session->flashdata('alert-message')){ ?>
			<div class="row"><?php echo $this->session->flashdata('alert-message'); ?></div>
		<?php } ?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 form-box">
				<form role="form" action="<?php echo base_url('donor/updateDonor'); ?>" method="post" class="f1" id="updateDonor">
					<fieldset>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label class="" for="f1-first-name">Name</label>
							<input type="text" name="f1-first-name" placeholder="Name..." class="f1-first-name form-control required" id="f1-first-name" value="<?php echo $donor->name; ?>">
						</div>
						<div class="form-group">
							<label class="" for="f1-last-time-donated">Last Time Donated</label>
							<input type="date" name="f1-last-time-donated" placeholder="Last Time Donated..." class="f1-last-time-donated form-control required" id="f1-last-time-donated" value="<?php echo $donor->last_time_donated; ?>">
						</div>
						<div class="form-group">
							<label class="" for="f1-country">Country</label>
							<select name="f1-country" class="f1-country form-control required" id="f1-country">
								  <option value="" disabled="disabled" selected>Country...</option>
								  <?php foreach($country_list as $i => $v){ ?>
									  <option value="<?php echo $v->id; ?>" <?php echo $donor->country == $v->id ? "selected" :''; ?>><?php echo $v->country; ?></option>
								  <?php } ?>
							</select>                                    
						</div>
						<div class="form-group">
							<label class="" for="f1-state">State</label>
							<select name="f1-state" class="f1-state form-control required" id="f1-state">
								  <option value="" disabled="disabled" selected>State...</option>
								  <?php foreach($stateList as $i => $v){ ?>
									  <option value="<?php echo $v->id; ?>" <?php echo $donor->state == $v->id ? "selected" :''; ?>><?php echo $v->state; ?></option>
								  <?php } ?>
							</select>                                    
						</div>
						<div class="form-group">
							<label class="" for="f1-contact-number">Contact Number</label>
							<input type="text" name="f1-contact-number" placeholder="Contact Number..." class="f1-contact-number form-control required" id="f1-contact-number"  value="<?php echo $donor->contact; ?>"">
						</div>
						<div class="form-group">
							<label class="" for="f1-email">Email</label>
							<input type="text" name="f1-email" placeholder="Email..." class="f1-email form-control" id="f1-email"  value="<?php echo $donor->email; ?>">
						</div>												 
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label class="" for="f1-gender">Gender</label>
							<select name="f1-gender" class="f1-gender form-control required" id="f1-gender">
								<option value="" disabled="disabled" <?php echo $donor->gender == ''? "seleccted" : ''; ?>>Gender...</option>
								<option value="male" <?php echo $donor->gender == 'male' ? "selected" :''; ?>>Male</option>
								<!--option value="female" <?php echo $donor->gender == 'female' ? "selected" :''; ?>>Female</option-->
							</select>
						</div>						
						<div class="form-group">
							<label class="" for="f1-blood-group">Blood Group</label>
							<select name="f1-blood-group" class="f1-blood-group form-control" id="blood-group">
								  <option value="" disabled="disabled" selected>Blood Group...</option>
								  <option value="A Positive" <?php echo $donor->blood_group == 'A Positive' ? "selected" :''; ?>>A Positive</option>
								  <option value="A Negative" <?php echo $donor->blood_group == 'A Negative' ? "selected" :''; ?>>A Negative</option>
								  <option value="B Positive" <?php echo $donor->blood_group == 'B Positive' ? "selected" :''; ?>>B Positive</option>
								  <option value="B Negative" <?php echo $donor->blood_group == 'B Negative' ? "selected" :''; ?>>B Negative</option>
								  <option value="O Positive" <?php echo $donor->blood_group == 'O Positive' ? "selected" :''; ?>>O Positive</option>
								  <option value="O Negative" <?php echo $donor->blood_group == 'O Negative' ? "selected" :''; ?>>O Negative</option>
								  <option value="AB Positive" <?php echo $donor->blood_group == 'AB Positive' ? "selected" :''; ?>>AB Positive</option>
								  <option value="AB Negative" <?php echo $donor->blood_group == 'AB Negative' ? "selected" :''; ?>>AB Negative</option>
								  <option value="NA">NA</option>
							</select>
						</div>					
						<div class="form-group">
							<label class="" for="f1-city">City</label>
							<select name="f1-city" class="f1-city form-control required" id="f1-city">
								  <option value="" disabled="disabled" selected>City...</option>
								  <?php foreach($cityList as $i => $v){ ?>
									  <option value="<?php echo $v->id; ?>" <?php echo $donor->city == $v->id ? "selected" :''; ?>><?php echo $v->city; ?></option>
								  <?php } ?>								  
							</select>                                    
						</div>
						<div class="form-group">
							<label class="" for="f1-address">Lane Address</label>
							<input type="text" name="f1-address" placeholder="Lane Address..." class="f1-address form-control" id="f1-address"  value="<?php echo $donor->address; ?>">
						</div>
						<div class="form-group">
							<label class="" for="f1-alternate-number">Alternate Number</label>
							<input type="text" name="f1-alternate-number" placeholder="Alternate Number..." class="f1-alternate-number form-control" id="f1-alternate-number"  value="<?php echo $donor->alternate_contact; ?>">
						</div>
						<div class="form-group">
							<label class="" for="f1-hospital-nearby">Hospital Nearby</label>
							<input type="text" name="f1-hospital-nearby" placeholder="Hospital Nearby..." class="f1-hospital-nearby form-control required" id="hospital-nearby" value="<?php echo $donor->nearby_hospital; ?>">
						</div>
					</div>
					<div class="col-md-12 col-sm-12">	
						<div class="form-group">
							<label class="" for="f1-how-know">How you came to know about this form.</label>
							<input type="text" name="f1-how-know" placeholder="How you came to know about this form...." class="f1-how-know form-control required" id="f1-how-know" value="<?php echo $donor->how_you_know_us; ?>">
							<input type="hidden" name="donor" value="<?php echo base64_encode($donor->id); ?>">
						</div>
						<div class="f1-buttons">
							<button type="submit" class="btn btn-submit">Update</button>
						</div>
					</div>	
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>    
<script>
window.onload = function(){
	//var availableHospitals = ['aa', 'bb', 'ff']
	var availableHospitals = <?php echo json_encode($hospital_list); ?>;
	$( "#hospital-nearby" ).autocomplete({
		  source: availableHospitals
    });	
}
</script>