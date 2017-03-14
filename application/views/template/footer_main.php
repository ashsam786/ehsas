    <?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>  
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
<a href="http://info.flagcounter.com/fgoU"><img src="http://s10.flagcounter.com/mini/fgoU/bg_FFFFFF/txt_000000/border_CCCCCC/flags_0/" alt="Free counters!" border="0"></a>
	 
	 
		<!--   Core JS Files   -->
<!--script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script-->
		
		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js'); ?>"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></scrip>
        <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/material.min.js'); ?>"></script>
		<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="<?php echo base_url('assets/js/nouislider.min.js'); ?>"></script>
		<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
		<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
		<script src="<?php echo base_url('assets/js/material-kit.js'); ?>"></script>
		<!--[if lt IE 10]>
            <script src="<?php echo base_url('assets/js/placeholder.js'); ?>"></script>
        <![endif]-->		
		<script type="text/javascript">

			$().ready(function(){
				// the body of this function is in assets/material-kit.js
				//materialKit.initSliders();
				window_width = $(window).width();

				if (window_width >= 992){
					big_image = $('.wrapper > .header');

					$(window).on('scroll', materialKitDemo.checkScrollForParallax);
				}

			});
		</script>
		<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
	</body>	
</html>