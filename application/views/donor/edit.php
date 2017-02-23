<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

        <!-- Top content -->

<div class="top-content" style="background:#fff;">
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2 text">
            <div class="description">
                <h2>
                    <?php echo ucwords($donor->name); ?>
                    <button  class="btn btn-orange pull-right pull-right"><a href="<?php echo base_url("donor/edit/{$donor->contact}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 4rem;"></i></a></button>
                </h2>    
            </div>
        </div>    
        <table id="cd-grid" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Days Passed</td>
                    <td class="<?php echo ($donor->days_passed > UNFIT_DONOR_PERIOD) ? 'fitDonor' : 'unFitDonor' ?> daysPassed"><?php echo $donor->days_passed; ?></td>
                <tr>
                </tr>
                    <td>Last Time Donated</td>
                    <td><?php echo $donor->last_time_donated; ?></td>
                <tr>
                </tr>    
                    <td>Blood Group</td>
                    <td><?php echo $donor->blood_group; ?></td>
                <tr>
                </tr>    
                    <td>Gender</td>
                    <td><?php echo $donor->gender; ?></td>
                <tr>
                </tr>    
                    <td>Contact</td>
                    <td><?php echo $donor->contact; ?></td>
                <tr>
                </tr>    
                    <td>Alternate Contact</td>
                    <td><?php echo $donor->alternate_contact; ?></td>
                <tr>
                </tr>    
                    <td>Email</td>
                    <td><?php echo $donor->email; ?></td>
                <tr>
                </tr>    
                    <td>Nearby Hospital</td>
                    <td><?php echo $donor->nearby_hospital; ?></td>
                <tr>
                </tr>    
                    <td>City</td>
                    <td><?php echo $donor->city; ?></td>
                <tr>
                </tr>    
                    <td>State</td>
                    <td><?php echo $donor->state; ?></td>
                <tr>
                </tr>    
                    <td>Country</td>
                    <td><?php echo $donor->country; ?></td>
                <tr>
                </tr>    
                    <td>Address</td>
                    <td><?php echo $donor->address; ?></td>
                <tr>
                </tr>    
                    <td>Refered By</td>     
                    <td><?php echo $donor->how_you_know_us; ?></td>
                </tr>
            </thead>
        </table>
    </div>
</div>    
