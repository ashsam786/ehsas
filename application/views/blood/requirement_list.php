<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<div class="header header-filter" style="background-image: url('<?php echo base_url('assets/img/bg.jpg'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="brand">
                    <h1 class="title text-center topheaderTitle">CURRENT BLOOD REQUIREMENT</h1>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="main main-raised">
    <div class="section section-basic">   
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
            <div class="tim-row" id="recentDonorsTable">
                <?php if(isset($requirement_list) && sizeof($requirement_list > 0)){ ?>
                <div class="row bloodRequirementTable">
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
                        <?php foreach($requirement_list as  $i => $v){ ?>
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

                <?php } else { ?>
                <div class="alert alert-danger">
                     <div class="container-fluid">
                         <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                          No active blood requirement found.
                    </div>
                </div>
                <?php }?>
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
    $("#bloodDonorList").DataTable();
}
</script>





