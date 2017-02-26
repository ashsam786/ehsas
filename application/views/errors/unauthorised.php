<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

        <!-- Top content -->

<div class="top-content" style="background:#fff;">
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2 text">
            <div class="description alert alert-danger">
				<?php echo $this->lang->line('error_unauthorised_access'); ?>
				<a href="<?php echo base_url('home'); ?>">click</a> here to return to home page 
            </div>
        </div>    
    </div>
</div>    
