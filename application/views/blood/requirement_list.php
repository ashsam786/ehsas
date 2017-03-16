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
		<div class="container">
			<div class="tim-row" id="currentRequimentsTable">
<?php ddd($requirement_list); ?>
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
