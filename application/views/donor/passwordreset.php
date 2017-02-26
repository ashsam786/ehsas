<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<!-- Top content -->

<div class="top-content" style="background:#fff;">
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text">
				<div class="description">
					<h3>
						Reset your password.
					</h3>
				</div>
			</div>
		</div>
		<?php if($this->session->flashdata('alert-message')){ ?>
			<div class="row"><?php echo $this->session->flashdata('alert-message'); ?></div>
		<?php } ?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 form-box">
				<form role="form" action="<?php echo base_url('donor/resetpassword_process'); ?>" method="post" class="f1" id="resetpassword">
					<fieldset>
						<div class="form-group">
							<label class="" for="f1-email">Registered Email</label>
							<input type="email" name="f1-email" placeholder="Enter your registered email..." class="f1-eail form-control required" id="f1-email">
						</div>
						<div class="f1-buttons">
							<button type="submit" class="btn btn-submit">Send</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
    </div>
</div>    
