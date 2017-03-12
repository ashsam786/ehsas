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
					<a href="<?php echo base_url('home'); ?>" target="_blank">
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
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>					
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-white btn-simple btn-just-icon">
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
						<h1>SOMEONE IS NEEDING BLOOD SOME WHERE</h1>
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
												<a href="">
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
												<a href="">
													<?php echo $this->lang->line('post_your_requirements'); ?>
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
						    	<?php for($i=1;$i<12;$i++){ ?>
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
	    		</div>





	
	    		<div class="tim-row" id="testimonail">
					<div class="title pageSectionTitle text-center">
		                <h3>What People Say About Us?</h3>
		            </div>
		            <div class="row testimonailBox bgFixedBacground">

						<div class="row">

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
	    		</div>	    		
	    	</div>
	    </div>


	    <div class="section section-download">
	        <div class="container">
	            <div class="row sharing-area text-center">
	                    <h3>Supporting us!</h3>
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
						<a href="http://www.creative-tim.com">
							Creative Tim
						</a>
					</li>
					<li>
						<a href="http://presentation.creative-tim.com">
						   About Us
						</a>
					</li>
					<li>
						<a href="http://blog.creative-tim.com">
						   Blog
						</a>
					</li>
					<li>
						<a href="http://www.creative-tim.com/license">
							Licenses
						</a>
					</li>
	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2016, made with <i class="material-icons">favorite</i> by Creative Tim for a better web.
	        </div>
	    </div>
	</footer>
</div>

<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-simple">Nice Button</button>
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->

<script>
window.onload = function(){
	$('body').on('click', 'button.anchor', function(){
		location.href = $(this).data('target');
	});

	setInterval(function(){ $('.carousel').find('.glyphicon-chevron-right').click(); }, 5000);
}
</script>