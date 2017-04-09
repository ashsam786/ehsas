<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<div class="header header-filter" style="background-image: url('<?php echo base_url('assets/img/bg.jpg'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="brand">
                    <h1 class="title text-center topheaderTitle">BLOOD REQUIREMENT DETAILS</h1>
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
                <?php if(isset($blood_requirement) && !empty($blood_requirement)){ ?>
                <div class="row bloodRequirementTable">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header header-primary text-center">
                                <h4>Contact Details</h4>
                            </div>
                            <div class="content">
                                <table class="table">
                                    <tbody>
                                    <tr><td>Name:</td><td><?php echo $blood_requirement['name']; ?></td></tr>
                                    <?php if($this->session->has_userdata('donor_id') && in_array($this->session->donor_id, $blood_requirement['donor_id'])){   ?>
                                        <tr><td>Phone:</td><td><?php echo $blood_requirement['phone'] ? $blood_requirement['phone'] : 'NA'; ?></td></tr>
                                        <tr><td>Mobile:</td><td><?php echo $blood_requirement['mobile'] ? $blood_requirement['mobile'] : 'NA'; ?></td></tr>
                                        <tr><td>Alternate Mobile:</td><td> <?php echo $blood_requirement['alternateMobile'] ? $blood_requirement['alternateMobile'] : 'NA'; ?></td> </tr>
                                        <tr><td>Email:</td><td> <?php echo $blood_requirement['email'] ? $blood_requirement['email'] : 'NA'; ?></td> </tr>
                                    <?php } else { ?>
                                        <tr><td>Phone:</td><td> <span disabled="disabled">XXXXXXXXXX</span></td> </tr>
                                        <tr><td>Mobile:</td><td><span disabled="disabled">XXXXXXXXXX</span></td> </tr>
                                        <tr><td>Alternate Mobile:</td><td> <span disabled="disabled">XXXXXXXXXX</span></td> </tr>
                                        <tr><td>Email:</td><td> <span disabled="disabled">XXXXXXXXXX</span></td> </tr>
                                    <?php } ?>
                                        <tr><td>Address:</td><td><?php echo $blood_requirement['address'] ? $blood_requirement['address'] : 'NA'; ?></td> </tr>
                                        <tr><td>City:</td><td><?php echo $blood_requirement['city_name'] ? $blood_requirement['city_name'] : 'NA'; ?></td> </tr>
                                        <tr><td>State:</td><td><?php echo $blood_requirement['state_name'] ? $blood_requirement['state_name'] : 'NA'; ?></td> </tr>
                                        <tr><td>Hospital Name:</td><td><?php echo $blood_requirement['hospital_name'] ? $blood_requirement['hospital_name'] : 'NA'; ?></td> </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header header-primary text-center">
                                <h4>Patient Details</h4>
                            </div>
                            <div class="content">
                                <table class="table">
                                    <tbody>
                                        <tr><td>Name:</td><td><?php echo $blood_requirement['patient_name'] ? $blood_requirement['patient_name'] : 'NA'; ?></td></tr>
                                        <tr><td>Age:</td><td><?php echo $blood_requirement['patient_age'] ? $blood_requirement['patient_age'] : 'NA'; ?></td></tr>
                                        <tr><td>Gender:</td><td><?php echo $blood_requirement['patient_gender'] ? $blood_requirement['patient_gender'] : 'NA'; ?></td></tr>
                                        <tr><td>Blood Group:</td><td><?php echo $blood_requirement['blood_group'] ? $blood_requirement['blood_group'] : 'NA'; ?></td></tr>
                                        <tr><td>Units Required:</td><td><?php echo $blood_requirement['number_of_units'] ? $blood_requirement['number_of_units'] : 'NA'; ?></td></tr>
                                        <tr><td>Required Before:</td><td><?php echo $blood_requirement['required_before'] ? $blood_requirement['required_before'] : 'NA'; ?></td></tr>
                                        <tr><td>Reason:</td><td><?php echo $blood_requirement['reason'] ? $blood_requirement['reason'] : 'NA'; ?></td> </tr>
                                        <tr><td>Hospital Name:</td><td><?php echo $blood_requirement['hospital_name'] ? $blood_requirement['hospital_name'] : 'NA'; ?></td> </tr>                    
                                        <tr><td>Interested Donors:</td><td class="btn-<?php echo sizeof($blood_requirement['donor_id']) > 0 ? 'success' : 'danger'; ?>"><?php echo sizeof($blood_requirement['donor_id']); ?></td></tr>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tim-row">
                <?php if($this->session->has_userdata('donor_id') && in_array($this->session->donor_id, $blood_requirement['donor_id'])){   ?>
                    <p class="text-center text-success">You have shown your interest to donate</p>
                    <div class="footer text-center">
                        <a href="<?php echo base_url('blood/cancelDonation/'.$blood_requirement['id']); ?>" class="btn btn-simple btn-danger btn-lg">Cancel Donation</a>
                    </div>        
                <?php } else{ ?>
                    <p class="text-center text-danger">Contact information is available only to interested donors</p>
                    <div class="footer text-center">
                        <a href="<?php echo base_url('blood/donate/'.$blood_requirement['id']); ?>" class="btn btn-simple btn-success btn-lg">Donate Blood</a>
                    </div>
                <?php } ?>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger">
                     <div class="container-fluid">
                         <div class="alert-icon">
                            <i class="material-icons">error_outline</i>
                        </div>
                          No data found.
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
                    <span class="btn btn-twitter">
                        <a class="twitter-share-button"
                          href="https://twitter.com/share"
                          data-text="<?php echo $ogTitle; ?>"
                          data-url="<?php echo $ogUrl; ?>"
                          data-via="<?php echo EHSAS_TWITTER_HANDLE; ?>"
                        >Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </span>

                    <div class="btn btn-facebook fb-share-button" data-href="http://demo.ehsas.in/blood/details/9" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdemo.ehsas.in%2Fblood%2Fdetails%2F9&amp;src=sdkpreparse">Share</a></div>

                    <span class="btn btn-google-plus">
                        <div class="g-plus" data-action="share" data-annotation="none" data-height="24" data-href="<?php echo $ogUrl; ?>"></div>
                    </span>
<!--                     <a href="#" class="">
    <i class="fa fa-google-plus"></i>
    Share
</a> -->
            </div>
        </div>
    </div>
</div>


<script>
window.onload = function(){
    $("#bloodDonorList").DataTable();
}
</script>





