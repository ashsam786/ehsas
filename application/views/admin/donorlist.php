<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

        <!-- Top content -->

<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<div class="header header-filter" style="background-image: url('<?php echo base_url('assets/img/bg.jpg'); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="brand">
                    <h1 class="title text-center topheaderTitle">REGISTERED DONOR LIST</h1>
                </div>
            </div>
        </div>
        <?php if($this->session->flashdata('alert-message')){ ?>
            <div class="row"><?php echo $this->session->flashdata('alert-message'); ?></div>
        <?php } elseif($this->session->flashdata('success-message')){ ?>
            <div class="row"><?php echo $this->session->flashdata('success-message'); ?></div>
        <?php } ?>
    </div>
</div>
<div class="main main-raised">
    <div class="section section-basic">   
        <div class="container">
            <div class="tim-row" id="recentDonorsTable">
                <?php if($donor_list['result']){ ?>
                <div class="row bloodRequirementTable">
                <table id="bloodDonorList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Last Time Donated</th>
                                <th>Donated With ehsas</th>                                
                                <th>Alternate Phone</th>
                                <th>Joined On</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Email</th>                                
                                <th>Phone</th>
                                <th>Last Time Donated</th>
                                <th>Donated With ehsas</th>
                                <th>Alternate Phone</th>
                                <th>Joined On</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($donor_list['data'] as  $i => $v){ ?>
                            <tr>
                                <td class="text-center"><?php echo $i+1; ?></td>
                                <td><?php echo $v->name; ?></td>
                                <td><?php echo $v->blood_group; ?></td>
                                <td><?php echo $v->state_name; ?></td>
                                <td><?php echo $v->city_name; ?></td>
                                <td><?php echo $v->email; ?></td>
                                <td><?php echo $v->contact; ?></td>
                                <td><?php echo $v->last_time_donated; ?></td>
                                <td><?php echo $v->donated_with_ehsas; ?></td>
                                <td><?php echo $v->alternate_contact; ?></td>
                                <td><?php echo $v->joined_on; ?></td>
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
                          <?php echo $donor_list['msg']; ?>
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





