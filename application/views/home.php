<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<div class="header header-filter" style="background-image: url('<?php echo base_url('assets/img/bg.jpg'); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="brand">
					<h1>BRIDGING THE GAP BETWEEN NEEDY AND VOLUNTEER</h1>
					<h3>Donate Blood</h3>
					<button class="btn btn-danger anchor" data-target="<?php echo base_url('donor/register'); ?>"><?php echo $this->lang->line('top_register_today_button_title'); ?></button>
					<button class="btn btn-danger anchor" data-target="<?php echo base_url('blood/requirement'); ?>"><?php echo $this->lang->line('post_your_requirements_heading'); ?></button>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="main main-raised">
	<div class="section section-basic">
		<div class="bloodRequirementTicker">
			<div id="text-carousel1" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="row">
					<div class="col-xs-offset-1 col-xs-10">
						<div class="carousel-inner">

							<?php foreach($current_blood_requirement as $i => $v){ ?>
								<div class="item <?php echo array_values($current_blood_requirement)[0] == $v ? 'active' : '' ?>">
									<center class="carousel-content" style="display:block">
										<h4 class="whiteText">
											<?php echo ($v['required_before'])."{$v['blood_group']} blood required {$v['hospital_name']}, {$v['city_name']}" ?> <a href="<?php echo base_url("blood/details/{$v['id']}"); ?>" class="whiteText"><u>Click here</u></a> to know more
										</h4>
									</center>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- Controls --> <a class="left carousel-control" href="#text-carousel1" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			  </a>
			 <a class="right carousel-control" href="#text-carousel1" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
			</div>
		</div>
		<div class="container">
			<?php if($this->session->flashdata('error-message')){ ?>
				<div class="alert alert-danger">
				    <div class="container-fluid">
					  <div class="alert-icon">
					    <i class="material-icons">error_outline</i>
					  </div>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="material-icons">clear</i></span>
					  </button>
				      <b>Error Alert:</b> <?php echo $this->session->flashdata('error-message'); ?>
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
			<div class="row">
				<form class="form" method="get" action="<?php echo base_url('donor/donorlist'); ?>">
					<div class="title pageSectionTitle text-center">
						<h3>Search For Dononrs</h3>
					</div>










 <!--style>
    .progress {
        height: 200px;
    }
    .progress > svg {
        height: 100%;
        display: block;
    }
</style>

<div class="content">
	 <div class="progress" id="progress"></div>
</div>
					
<script>
window.onload = function(){
  var circle = new ProgressBar.Circle('#progress', {
        color: '#f44336',
        duration: 3000,
        easing: 'easeInOut',
        trailColor: '#f4f4f4',
 style: {
            // Text color.
            // Default: same as stroke color (options.color)
            color: '#f00',
            position: 'absolute',
            left: '50%',
            top: '50%',
            padding: 0,
            margin: 0,
            // You can specify styles which will be browser prefixed
            transform: {
                prefix: true,
                value: 'translate(-50%, -50%)'
            }
        },        
    });

    circle.animate(1);
}
</script-->






					<div class="content">
						<div class="col-md-3">
							<div class="form-group is-empty">
								<label class="sr-only" for="f1-country">Country</label>
								<select name="f1-country" class="f1-country form-control required" id="f1-country">
									  <option value="" disabled="disabled" selected>Country...</option>
									  <?php foreach($country_list as $i => $v){ ?>
										  <option value="<?php echo $v->id; ?>"><?php echo $v->country; ?></option>
									  <?php } ?>
								</select>
								<span class="material-input"></span>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group is-empty">
								<label class="sr-only" for="f1-state">State</label>
								<select name="f1-state" class="f1-state form-control" id="f1-state">
									  <option value="" disabled="disabled" selected>State...</option>
								</select>
								<span class="material-input"></span>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group is-empty">
								<label class="sr-only" for="f1-city">City</label>
								<select name="f1-city" class="f1-city form-control" id="f1-city">
									  <option value="" disabled="disabled" selected>City...</option>
								</select>						
								<span class="material-input"></span>
							</div>
						</div>	
						<div class="col-md-3">
							<div class="form-group is-empty col-xs-10">
								<label class="sr-only" for="f1-blood-group">Blood Group</label>
								<select name="f1-blood-group" class="f1-blood-group form-control" id="f1-blood-group">
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
							<div class="form-group is-empty col-xs-2">
								<button type="submit" class="btn btn-danger btn-just-icon">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
						</div>	
					</div>
				</form>
			</div>
			<?php if(count($current_blood_requirement) > 0){ ?>
			<div class="tim-row" id="currentRequimentsTable">
				<div class="title pageSectionTitle text-center">
					<h3>Current Blood Requirements</h3>
				</div>
				<div class="row bloodRequirementTable scrollx">
                	<table id="bloodDonorList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Blood Group</th>
                                <th>Patient Age</th>
                                <th>Hospital</th>
                                <th>Posted On</th>
                                <th class="text-center">Interested Donors</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">#</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Blood Group</th>
                                <th>Patient Age</th>
                                <th>Hospital</th>
                                <th>Posted On</th>
                                <th class="text-center">Interested Donors</th>                                
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($current_blood_requirement as  $i => $v){ ?>
                            <tr>
                                <td class="text-center"><?php echo $i+1; ?></td>
                                <td><?php echo $v['state_name']; ?></td>
                                <td><?php echo $v['city_name']; ?></td>
                                <td><?php echo $v['blood_group']; ?></td>
                                <td><?php echo $v['patient_age']; ?></td>
                                <td><?php echo $v['hospital_name']; ?></td>
                                <td><?php echo date('d-M-Y', strtotime($v['added_at'])); ?></td>
                                <td class="text-center">
									<button class="btn btn-<?php echo sizeof($v['donor_id']) > 0 ? 'success' : 'danger'; ?> btn-fab btn-fab-mini btn-round defaultCursor"><?php echo sizeof($v['donor_id']); ?></button>
                                </td>
                                <td>
									<a class="text-success" href="<?php echo base_url('blood/details/'.$v['id']); ?>">
										Donate Blood
									</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>                
                </div>		
				<div class="row text-center">
					<button class="btn btn-danger anchor text-center" data-target="<?php echo base_url('blood/requirement_list'); ?>">
						Show more
					<div class="ripple-container"></div></button>					
				</div>
			</div>
			<?php } ?>
			<div class="tim-row" id="testimonail">
				<div class="title pageSectionTitle text-center">
					<h3>What People Say About Us?</h3>
				</div>
				<div class="testimonailBox bgFixedBacground">
					<div id="text-carousel" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="row">
							<div class="col-xs-offset-2 col-xs-8">
								<div class="carousel-inner">
									<div class="item active">
										<div class="carousel-content">
											<div>
												<p class="whiteText">Noble mission means noble...this state needs a target mission like Late Abdul Satar Eidhi did for Islamic Republic of Pakistan...Like for others what U like for urself...Alhadith.....Survival for self is not any bravery or achievement but survival for others is a brave n satisfaction step...Live n let live n Charity has a permanent taste of real life....</p>
												<p class="text-right whiteText"><cite>Er Malik Manzoor Ul-Haq</cite><br>Project Manager Civil</p>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="carousel-content">
											<div>
												<p class="whiteText">Sadqah is best form of ibadah it's erase your sins give you the hasnah and better jazah khair from Almighty Allah and make men of taqwah
May Allah give hidayah to yaseer bhai and friends to uplift the society and wellfare of ummah May Allah give barakah afiyah to members of ehsas zindagi and others people who think for betterment of everybody</p>
												<p class="text-right whiteText"><cite>Hammad Akhtar</cite></p>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="carousel-content">
											<div>
												<p class="whiteText">Kudos to team Ehsas.in for initiating such a great campaign aimed to save the precious lives. This is called the humanitarianism which can only be done by great humans. Please remember me for any assistence.</p>
												<p class="text-right whiteText"><cite>Bilal Bashir Bhat</cite></p>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="carousel-content">
											<div>
												<p class="whiteText">Great initiative, donate your blood to spread love for the sake of humanity</p>
												<p class="text-right whiteText"><cite>Skiekh Mubashir</cite></p>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="carousel-content">
											<div>
												<p class="whiteText">Charity can aid you to get heaven and above all, charity doers are near to Allah! Donate your replenishable blood to do humanity a service and please your Lord and soul.
AN initiative which need our full support. Let's do our little bit to propagate the cause.</p>
												<p class="text-right whiteText"><cite>Wani Nusrat</cite></p>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<!-- Controls --> <a class="left carousel-control" href="#text-carousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					  </a>
					 <a class="right carousel-control" href="#text-carousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					  </a>
					</div>
				</div>	            
			</div>	
			<?php if($recent_donors['result']){ ?>
				<div class="tim-row" id="recentDonorsTable">
					<div class="title pageSectionTitle text-center">
						<h3><?php echo $this->lang->line('recent_donors_list'); ?></h3>
					</div>
					<div class="row bloodRequirementTable scrollx">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Name</th>
									<th>Blood Group</th>
									<th>State</th>
									<th>City</th>
									<th>Donated On</th>
									<th>Joined On</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($recent_donors['data'] as  $i=>$v){ ?>
									<tr>
										<td class="text-center"><?php echo $i+1; ?></td>
										<td><?php echo $v->name; ?></td>
										<td><?php echo $v->blood_group; ?></td>
										<td><?php echo $v->state_name; ?></td>
										<td><?php echo $v->city_name; ?></td>
										<td><?php echo $v->donated_with_ehsas; ?></td>
										<td><?php echo $v->joined_on; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>	            
					<div class="row text-center">
						<button class="btn btn-danger anchor text-center" data-value="<?php echo base_url('recentdonors'); ?>">
							Show more
						<div class="ripple-container"></div></button>					
					</div>					
				</div>
			<?php } ?>
	
			<!--div class="tim-row sliderImgBg" id="otherInitiatives">
				<div class="title pageSectionTitle text-center">
					<h3 class="whiteText">Other Initiatives</h3>
				</div>
				<div class="row otherInitiativesList">
					<div class="col-sm-6 text-center">
						<h5><a class="whiteText" href="#">Cancer sociaty of kashmir</a></h5>
						<h5><a class="whiteText" href="#">Humanvalues.in</a></h5>
						<h5><a class="whiteText" href="#">Cancer sociaty of kashmir</a></h5>
						<h5><a class="whiteText" href="#">Humanvalues.in</a></h5>
					</div>
					<div class="col-sm-6 text-center">
						<h5><a class="whiteText" href="#">Cancer sociaty of kashmir</a></h5>
						<h5><a class="whiteText" href="#">Humanvalues.in</a></h5>
						<h5><a class="whiteText" href="#">Cancer sociaty of kashmir</a></h5>
						<h5><a class="whiteText" href="#">Humanvalues.in</a></h5>
					</div>
				</div>	            
			</div-->

			<!--div class="row sliderImgBg" id="otherInitiatives">
				<div class="title pageSectionTitle text-center">
					<h3 class="whiteText">Other Initiatives</h3>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img class="fullWidthImage" src="<?php echo base_url('assets/img/initiative.jpg'); ?>" alt="">
						<div class="caption">
							<h3>Cancer sociaty of kashmir</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<a href="#">more</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img class="fullWidthImage" src="<?php echo base_url('assets/img/initiative.jpg'); ?>" alt="">
						<div class="caption">
							<h3>Cancer sociaty of kashmir</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<a href="#">more</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img class="fullWidthImage" src="<?php echo base_url('assets/img/initiative.jpg'); ?>" alt="">
						<div class="caption">
							<h3>Cancer sociaty of kashmir</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<a href="#">more</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img class="fullWidthImage" src="<?php echo base_url('assets/img/initiative.jpg'); ?>" alt="">
						<div class="caption">
							<h3>Cancer sociaty of kashmir</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<a href="#">more</a></p>
						</div>
					</div>
				</div>
			</div-->
			<?php if(sizeOf($other_initiatives) > 0){ ?>
			<div class="row sliderImgBg" id="otherInitiatives">
				<div class="title pageSectionTitle text-center">
					<h3 class="whiteText">Initiatives Around The Globe - Revival of humanity</h3>
				</div>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<?php foreach($other_initiatives as $i => $v){ ?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active' : ''; ?>"></li>
					<?php } ?>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
					<?php foreach($other_initiatives as $ind => $val){ ?>
						<div class="item <?php echo $ind == 0 ? 'active' : ''; ?>">
						<?php foreach($val as $i => $v) { ?>
							<div class="col-sm-6 col-md-3">
								<div class="thumbnail">
									<?php $img = $v->image == '' ? 'initiative.jpg' : $v->image; ?>
									<img class="fullWidthImage" src='<?php echo base_url("assets/img/initiatives/{$img}"); ?>' alt="">
									<div class="caption">
										<center class="caption">
										<a href="<?php echo base_url('otherinitiatives/'.$v->slug); ?>">
											<button class="btn btn-danger btn-round">
												<?php echo $v->name ?>
												<div class="ripple-container"></div>
											</button>
											<p style="text-align: justify;"></p>
										</a>	
										</center>										
										<p style="text-align: justify;"><?php echo hide_large_description($v->description, 100, '#'); ?></p>
									</div>
								</div>
							</div>	
						<?php } ?>
						</div>
					<?php } ?>	
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>	
			<?php } ?>	
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
					<a id = "shareFbBtn" href="#" class="btn btn-facebook">
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
document.getElementById('shareFbBtn').onclick = function(e) {
	e.preventDefault();
	FB.ui({
		method: 'share',
		display: 'popup',
		href: 'https://developers.facebook.com/docs/',
	}, function(response){});
}
</script>