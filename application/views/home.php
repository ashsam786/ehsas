<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>
<!-- Navbar -->
<nav class="navbar navbar-danger navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="<?php echo base_url('home'); ?>">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="<?php echo base_url('assets/img/logo_header.png'); ?>" alt="<?php echo MAIN_TITLE; ?>">
	                </div>
	                <div class="brand">
	                    <p class="logoName"><?php echo strtoupper(PROJECT_NAME); ?></p>
	                    <p class="logoTagName"><?php echo strtoupper(MAIN_TAGLINE); ?></p>
	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="<?php echo base_url('home'); ?>">
						Home
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('/aboutus'); ?>">
						About Us
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('/contact'); ?>">
						Contact Us
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('donor/login'); ?>">
						Login
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('donor/register'); ?>">
						Register
					</a>
				</li>
				<li class="topMenuSocial">
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>					
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>					
				</li>
	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/img/bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="brand">
						<h1>SOMEONE IS NEEDING BLOOD SOMEWHERE</h1>
						<h3>Donate Blood</h3>
						<button class="btn btn-danger anchor" data-target="<?php echo base_url('donor/register'); ?>"><?php echo $this->lang->line('top_register_today_button_title'); ?></button>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="main main-raised">
		<div class="section section-basic">
	    	<div class="container">



			
			
			
				<div class="row">
					<form class="form" method="get" action="#">
						<div class="header header-danger text-center">
							<h4>Search For Dononrs</h4>
						</div>
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









			
	    		<div class="row">
					<div class="col-md-4">
						<!-- Tabs with icons on Card -->
						<div class="card card-nav-tabs">
							<div class="header header-danger">
								<!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a href="#aboutusTop" data-toggle="tab">
													About Us
												</a>
											</li>
											<li>
												<a href="#whatwedoTop" data-toggle="tab">
													Our Aim
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="aboutusTop">
										<p><?php echo $this->lang->line('short_aboutus_text'); ?></p>
									</div>
									<div class="tab-pane" id="whatwedoTop">
										<p><?php echo $this->lang->line('short_what_we_do_text'); ?></p>
									</div>
								</div>
							</div>
						</div>
						<!-- End Tabs with icons on Card -->

					</div>
					<div class="col-md-4">
						<!-- Tabs with icons on Card -->
						<div class="card card-nav-tabs">
							<div class="header header-danger">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a onclick="return false;">
													<?php echo $this->lang->line('register_as_donor'); ?>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="aboutusTop">
										<p><?php echo $this->lang->line('register_as_donor_text'); ?></p>
										<button class="btn btn-danger anchor" data-target="<?php echo base_url('donor/register'); ?>"><?php echo $this->lang->line('top_register_today_button_title'); ?></button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Tabs with icons on Card -->

					</div>
					<div class="col-md-4">
						<!-- Tabs with icons on Card -->
						<div class="card card-nav-tabs">
							<div class="header header-danger">
								<div class="nav-tabs-navigation">
									<div class="nav-tabs-wrapper">
										<ul class="nav nav-tabs" data-tabs="tabs">
											<li class="active">
												<a onclick="return false;">
													<?php echo $this->lang->line('post_your_requirements_heading'); ?>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content">
								<div class="tab-content text-center">
									<div class="tab-pane active" id="aboutusTop">
										<p><?php echo $this->lang->line('post_your_requirements'); ?></p>
										<button class="btn btn-danger anchor" data-target="<?php echo base_url('contact/blood'); ?>"><?php echo $this->lang->line('post_your_requirements_button_title'); ?></button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Tabs with icons on Card -->
					</div>
	    		</div>

				<div class="tim-row" id="currentRequimentsTable">
					<div class="title pageSectionTitle text-center">
		                <h3>Current Blood Requirements</h3>
		            </div>
		            <div class="row bloodRequirementTable">
						<table class="table">
						    <thead>
						        <tr>
						            <th class="text-center">#</th>
						            <th>State</th>
						            <th>City</th>
						            <th>Blood Group</th>
						            <th class="text-center">Patient Age</th>
						            <th>Hospital</th>
						            <th>Posted On</th>
						            <th>Details</th>
						        </tr>
						    </thead>
						    <tbody>
						    	<?php for($i=1;$i<6;$i++){ ?>
							        <tr>
							            <td class="text-center"><?php echo $i; ?></td>
							            <td>Jammu &amp; Kashmir</td>
							            <td>Srinagar</td>
							            <td>A Positive</td>
							            <td class="text-center">23</td>
							            <td>S.M.H.S Hospital</td>
							            <td>09/03/2017</td>
							            <td class="td-actions">
							                <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
							                    Click
							                </button>
							            </td>
							        </tr>
						    	<?php } ?>
						    </tbody>
						</table>
		            </div>
					<div class="row text-center">
						<button class="btn btn-danger anchor text-center" data-value="<?php echo base_url('blood/requirement'); ?>">
							Show more
	                    <div class="ripple-container"></div></button>					
					</div>
	    		</div>
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
													<p class="whiteText">Noble mission means noble...this state needs a target mission like Late Abdul Satar Eidhi did for Islamic Republic of Pakistan...Like for others what U like for urself...Alhadith.....Survival for self is not any bravery or achievement but survival for others is a brave n satisfaction step...Live n let live n Charity has a permanent taste of real life....</p>
													<p class="text-right whiteText"><cite>Er Malik Manzoor Ul-Haq</cite><br>Project Manager Civil</p>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="carousel-content">
												<div>
													<p class="whiteText">Noble mission means noble...this state needs a target mission like Late Abdul Satar Eidhi did for Islamic Republic of Pakistan...Like for others what U like for urself...Alhadith.....Survival for self is not any bravery or achievement but survival for others is a brave n satisfaction step...Live n let live n Charity has a permanent taste of real life....</p>
													<p class="text-right whiteText"><cite>Er Malik Manzoor Ul-Haq</cite><br>Project Manager Civil</p>
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
	    		<div class="tim-row" id="recentDonorsTable">
					<div class="title pageSectionTitle text-center">
		                <h3><?php echo $this->lang->line('recent_donors_list'); ?></h3>
		            </div>
		            <div class="row bloodRequirementTable">
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
						    	<?php for($i=1;$i<6;$i++){ ?>
							        <tr>
							            <td class="text-center"><?php echo $i; ?></td>
							            <td>Yasir Rasool</td>
							            <td>B POSITIVE</td>
							            <td>Jammu and Kashmir</td>
							            <td>Srinagar</td>
							            <td>09/03/2017</td>
							            <td>09/03/2017</td>
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
				<div class="tim-row sliderImgBg" id="otherInitiatives">
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
    <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<li>
						<a href="<?php echo base_url('contactus'); ?>">
							Contact Us
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('aboutus'); ?>">
						   About Us
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('blog'); ?>">
						   Blog
						</a>
					</li>
	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; <?php echo date('Y'); ?>, <a href="<?php echo base_url('home'); ?>"><?php echo MAIN_TITLE; ?></a> All rights reserved.
	        </div>
	    </div>
	</footer>
</div>

<script>
window.onload = function(){
	$('body').on('click', 'button.anchor', function(){
		location.href = $(this).data('target');
	});

	setInterval(function(){ $('.carousel').find('.glyphicon-chevron-right').click(); }, 5000);	
}
</script>