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

    </div>
</div>
<div class="main main-raised">
    <div class="section section-basic">   
        <div class="container">
            <div class="row">
                <form class="form" method="get" action="<?php echo base_url('donor/donorlist'); ?>">
                    <div class="content">
                        <div class="col-md-3">
                            <div class="form-group is-empty">
                                <label class="sr-only" for="f1-country">Country</label>
                                <select name="f1-country" class="f1-country form-control required" id="f1-country">
                                      <option value="" disabled="disabled" selected>Country...</option>
                                      <?php foreach($country_list as $i => $v){ ?>
                                          <option value="<?php echo $v->id; ?>"><?php echo $v->country; ?></option>
                                      <?php } ?>
                                </select>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group is-empty">
                                <label class="sr-only" for="f1-state">State</label>
                                <select name="f1-state" class="f1-state form-control" id="f1-state">
                                      <option value="" disabled="disabled" selected>State...</option>
                                </select>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group is-empty">
                                <label class="sr-only" for="f1-city">City</label>
                                <select name="f1-city" class="f1-city form-control" id="f1-city">
                                      <option value="" disabled="disabled" selected>City...</option>
                                </select>                       
                                <span class="material-input"></span>
                            </div>
                        </div>  
                        <div class="col-md-3">
                            <div class="form-group is-empty col-xs-10">
                                <label class="sr-only" for="f1-blood-group">Blood Group</label>
                                <select name="f1-blood-group" class="f1-blood-group form-control" id="f1-blood-group">
                                      <option value="" disabled="disabled" selected>Blood Group...</option>
                                      <option value="A Positive">A Positive</option>
                                      <option value="A Negative">A Negative</option>
                                      <option value="B Positive">B Positive</option>
                                      <option value="B Negative">B Negative</option>
                                      <option value="O Positive">O Positive</option>
                                      <option value="O Negative">O Negative</option>
                                      <option value="AB Positive">AB Positive</option>
                                      <option value="AB Negative">AB Negative</option>
                                      <option value="NA">NA</option>                                          
                                </select>                       
                                <span class="material-input"></span>
                            </div>
                            <div class="form-group is-empty col-xs-2">
                                <button type="submit" class="btn btn-danger btn-just-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>  
                    </div>
                </form>
            </div>        
            <div class="tim-row" id="recentDonorsTable">
                <?php if($donor_list['result']){ ?>
                <div class="bloodRequirementTable">
                <table id="bloodDonorList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Blood Group</th>
                                <th>State</th>
                                <th>City</th>
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





