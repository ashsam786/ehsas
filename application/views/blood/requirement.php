<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<div class="header header-filter" style="background-image: url('<?php echo base_url('assets/img/bg.jpg'); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="brand">
					<h1 class="title text-center topheaderTitle">POST YOUR BLOOD REQUIREMENTS</h1>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="main main-raised">
	<div class="section section-basic">
	<?php if($this->session->flashdata('alert-message')){ ?>
		<div class="alert alert-danger">
			 <div class="container-fluid">
				 <div class="alert-icon">
					<i class="material-icons">error_outline</i>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"><i class="material-icons">clear</i></span>
				</button>
				 <b>Error Alert:</b> <?php echo $this->session->flashdata('alert-message'); ?>
			</div>
		</div>		
	<?php } else if($this->session->flashdata('success-message')){ ?>
		<div class="alert alert-success">
			<div class="container-fluid">
			  <div class="alert-icon">
				<i class="material-icons">check</i>
			  </div>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
			  </button>
			  <b>Success Alert:</b> <?php echo $this->session->flashdata('success-message'); ?>
			</div>
		</div>		
	<?php } ?>
		<div class="container">
			<div class="tim-row" id="currentRequimentsTable">
				<form class="form" method="post" action="<?php echo base_url('blood/process_requirement'); ?>" novalidate>
					<div class="content">
						<div class="row">
							<div class="header header-danger">
								<h4>Requirement</h4>
							</div>
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="localAddress">Local address</label>
									<input type="text" class="form-control required" name="localAddress" id="localAddress"  required >
									<span class="material-input"></span>
								</div>
							</div>								
							<div class="col-md-4">
								<div class="form-group is-empty">
									<label class="sr-only" for="f1-country">Country</label>
									<select name="f1-country" class="f1-country form-control required" id="f1-country" required>
										  <option value="" disabled="disabled" selected>Country...</option>
										  <?php foreach($country_list as $i => $v){ ?>
											  <option value="<?php echo $v->id; ?>"><?php echo $v->country; ?></option>
										  <?php } ?>
									</select>
									<span class="material-input"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group is-empty">
									<label class="sr-only" for="f1-state">State</label>
									<select name="f1-state" class="f1-state form-control required" id="f1-state" required>
										  <option value="" disabled="disabled" selected>State...</option>
									</select>
									<span class="material-input"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group is-empty">
									<label class="sr-only" for="f1-city">City</label>
									<select name="f1-city" class="f1-city form-control required" id="f1-city" required>
										  <option value="" disabled="disabled" selected>City...</option>
									</select>						
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group is-empty">
									<label class="sr-only" for="f1-blood-group">Blood Group</label>
									<select name="f1-blood-group" class="f1-blood-group form-control required" id="f1-blood-group" required>
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
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="numberOfUnitsRequired">Number of units required</label>
									<input type="number" class="form-control required" name="numberOfUnitsRequired" id="numberOfUnitsRequired" required>
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="reason">Reason for requirement</label>
									<input type="text" class="form-control" name="reason" id="reason">
									<span class="material-input"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="hospital">Hospital name</label>
									<input type="text" class="form-control required" name="hospital" id="hospital" required>
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="requiredOn">Required on/before</label>
									<input type="text" class="datepicker form-control required" name="requiredOn" id="requiredOn" value="mm/dd/yyyy" required>
									<span class="material-input"></span>
								</div>
							</div>	
						</div>
						<div class="row section">
							<div class="header header-danger">
								<h4>Patient Details</h4>
							</div>					
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="pName">Patient name</label>
									<input type="text" class="form-control required" name="pName" id="pName" required>
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="pAge">Patient age</label>
									<input type="number" class="form-control required" name="pAge" id="pAge" required>
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="radio">
									<label>
										<input type="radio" name="dGender" required>
										Male
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="dGender" required>
										Female
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="header header-danger">
								<h4>Contact Details</h4>
							</div>					
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="name">Your name</label>
									<input type="text" class="form-control required" name="name" id="name" required>
									<span class="material-input"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="phone">Phone</label>
									<input type="text" class="form-control" name="phone" id="phone" minlength="10" maxlength="10">
									<span class="material-input"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="mobile">Mobile</label>
									<input type="text" class="form-control required" name="mobile" id="mobile" maxlength="10" required>
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="alternateMobile">Alternate mobile</label>
									<input type="text" class="form-control" name="alternateMobile" id="alternateMobile" maxlength="10">
									<span class="material-input"></span>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group label-floating">
									<label class="control-label" for="email">Email</label>
									<input type="email" class="form-control required" name="email" id="email" required>
									<span class="material-input"></span>
								</div>
							</div>	
						</div>
						<div class="row">
						<div class="text-center">
							<div class="form-group is-empty">
								<button type="submit" class="btn btn-danger btn-just-icon">
									Submit
								</button>
							</div>
						</div>	
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="section section-download">
		<div class="container">
			<div class="row sharing-area text-center noMargin">
					<h3>Support us!</h3>
					<a href="#" class="btn btn-twitter">
						<i class="fa fa-twitter"></i>
						Tweet
					</a>
					<a href="#" class="btn btn-facebook">
						<i class="fa fa-facebook-square"></i>
						Share
					</a>
					<a href="#" class="btn btn-google-plus">
						<i class="fa fa-google-plus"></i>
						Share
					</a>
			</div>
		</div>
	</div>
</div>
<script>
window.onload = function(){
	var availableHospitals = <?php echo json_encode($hospital_list); ?>;
	$( "#hospital" ).autocomplete({
		  source: availableHospitals
    });	
	
	var missingData = <?php echo json_encode($this->session->flashdata('required_data_missing')); ?>;
	if(missingData != null){
		$.each(missingData, function(i,v){
			$('#'+v).closest('.form-group').addClass('has-error');
		})
	}
}
</script>
