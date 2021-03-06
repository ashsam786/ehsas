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
			<?php if($link){ ?>
				<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2 form-box">
					<form role="form" action="<?php echo base_url('donor/updatepassword_process'); ?>" method="post" class="f1" id="updatepassword">
						<fieldset>
							<div class="form-group">
								<label class="" for="f1-password">Password</label>
								<input type="password" name="f1-password" placeholder="Enter password..." class="f1-password form-control required" id="f1-password">
							</div>
							<div class="form-group">
								<label class="" for="f1-cpassword">Confirm Password</label>
								<input type="password" name="f1-cpassword" placeholder="Confirm password..." class="f1-password form-control required" id="f1-password">
							</div>
							<div class="f1-buttons">
								<button type="submit" class="btn btn-submit">Update</button>
							</div>
						</fieldset>
					</form>
				</div>
			<?php } else{ ?>
					<div class="alert alert-danger">You seem to have entered expired url. Please <a href="<?php echo base_url('donor/passwordreset'); ?>">click</a> here to generate new url</div>
			<?php } ?>
		</div>
    </div>
</div>    
