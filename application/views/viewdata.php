<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

        <!-- Top content -->
<script>
window.onload = function(){
    $('#cd-grid').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo base_url('admin/donor_list'); ?>"
    });    
}
</script>
<div class="top-content" style="background:#fff;">
    <div class="container">
        <table id="cd-grid" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <td>Last Time Donated</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Address</td>
                    <td>Contact</td>
                    <td>Alternate Contact</td>
                    <td>Email</td>
                    <td>Blood Group</td>
                    <td>District</td>
                    <td>Nearby Hospital</td>
                    <td>Refered By</td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td>Last Time Donated</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>Address</td>
                    <td>Contact</td>
                    <td>Alternate Contact</td>
                    <td>Email</td>
                    <td>Blood Group</td>
                    <td>District</td>
                    <td>Nearby Hospital</td>
                    <td>Refered By</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>    
