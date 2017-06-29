<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

        <!-- Top content -->
<script>
window.onload = function(){
    $('#cd-grid').DataTable({
        "processing": true,
        "serverSide": true,
        "scrollX": true,
        "ajax": "<?php echo base_url('admin/donor_list'); ?>"
    });    
}
</script>
<div class="top-content" style="background:#fff;">
        <?php if($this->session->flashdata('alert-message')){ ?>
            <div class="row"><div class="alert alert-danger"><?php echo $this->session->flashdata('alert-message'); ?></div></div>
        <?php } elseif($this->session->flashdata('success-message')){ ?>
            <div class="row"><div class="alert alert-success"><?php echo $this->session->flashdata('success-message'); ?></div></div>
        <?php } ?>
    <div class="container-fluid">
        <table id="cd-grid" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Edit/Delete</td>
                    <td>Days Passed</td>
                    <td>Last Time Donated</td>
                    <td>Name</td>
                    <td>Blood Group</td>
                    <td>Gender</td>
                    <td>Contact</td>
                    <td>Alternate Contact</td>
                    <td>Email</td>
                    <td>Nearby Hospital</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Country</td>
                    <td>Address</td>
                    <td>Refered By</td>     
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>Edit/Delete</td>
                    <td>Days Passed</td>
                    <td>Last Time Donated</td>
                    <td>Name</td>
                    <td>Blood Group</td>
                    <td>Gender</td>
                    <td>Contact</td>
                    <td>Alternate Contact</td>
                    <td>Email</td>
                    <td>Nearby Hospital</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Country</td>
                    <td>Address</td>
                    <td>Refered By</td>     
                </tr>
            </tfoot>
        </table>
    </div>
</div>    
