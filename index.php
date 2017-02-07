<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="" type="image/x-icon" />
    <meta name="author" content="Amir Samad Hanga">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="title" content="">

    <title>ehsas ek zindagi bachane ka</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery-1.11.1.min.js"></script>
  </head>
  <body>
    <div class="container mainbody">
      <div class="page-header">
        <h1>ehsas ek zindagi bachane ka</h1>
      </div>
      <div class="clearfix"></div>
      <style>
        ul#stepForm, ul#stepForm li {
          margin: 0;
          padding: 0;
        }
        ul#stepForm li {
          list-style: none outside none;
        } 
        label{margin-top: 10px;}
        .help-inline-error{color:red;}
      </style>

      <div class="container" style="padding-left: 0px; padding-right: 15px;">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Complete this form in quick 3 steps!</h3>
          </div>
          <div class="panel-body">
            <form name="basicform" id="basicform" method="post" action="yourpage.html">
              
              <div id="sf1" class="frm">
                <fieldset>
                  <legend>Step 1 of 3</legend>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="lastTimeDonated">Last time Donated: </label>
                      <div class="">
                        <input type="date" placeholder="Last time Donated" id="lastTimeDonated" name="lastTimeDonated" class="form-control" autocomplete="off">
                      </div>
                    </div>
                   </div> 
                  <div class="clearfix" style="height: 10px;clear: both;"></div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button> 
                    </div>
                  </div>
                </fieldset>
              </div>
              <div id="sf2" class="frm" style="display: none;">
                <fieldset>
                  <legend>Step 2 of 3</legend>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="uname">Name: </label>
                      <div class="">
                        <input type="text" placeholder="Your Name" id="uname" name="uname" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="uaddress">Address: </label>
                      <div class="">
                        <input type="text" placeholder="Your Address" id="uaddress" name="uaddress" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="uphone">Contact Number: </label>
                      <div class="">
                        <input type="text" placeholder="Your Number" id="uphone" name="uphone" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="alternate_uphone">Alternate Number: </label>
                      <div class="">
                        <input type="text" placeholder="Alternate Number" id="alternate_uphone" name="alternate_uphone" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="ubloodGroup">Blood Group: </label>
                      <div class="">
                        <select class="form-control" id="ubloodGroup" name="ubloodGroup">
                          <option value="">Blood Group</option>
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
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="udistrict">Your District: </label>
                      <div class="">
                        <select class="form-control" id="udistrict" name="udistrict">
                          <option value="">Your District</option> 
                          <option value="Anantnag">Anantnag</option> 
                          <option value="Anantnag">Anantnag</option> 
                          <option value="Badgam">Badgam</option> 
                          <option value="Bandipora">Bandipora</option> 
                          <option value="Baramula">Baramula</option> 
                          <option value="Doda">Doda</option> 
                          <option value="Ganderbal">Ganderbal</option> 
                          <option value="Ganderbal">Ganderbal</option> 
                          <option value="Jammu">Jammu</option> 
                          <option value="Jammu">Jammu</option> 
                          <option value="Kargil">Kargil</option> 
                          <option value="Kargil">Kargil</option> 
                          <option value="Kathua">Kathua</option> 
                          <option value="Kathua">Kathua</option> 
                          <option value="Kishtwar">Kishtwar</option> 
                          <option value="Kulgam">Kulgam</option> 
                          <option value="Kupwara">Kupwara</option> 
                          <option value="Kupwara">Kupwara</option> 
                          <option value="Leh">Leh</option> 
                          <option value="Leh">Leh</option> 
                          <option value="Pulwama">Pulwama</option> 
                          <option value="Punch">Punch</option> 
                          <option value="Rajouri">Rajouri</option> 
                          <option value="Rajouri">Rajouri</option> 
                          <option value="Ramban">Ramban</option> 
                          <option value="Ramban">Ramban</option> 
                          <option value="Reasi">Reasi</option> 
                          <option value="Samba">Samba</option> 
                          <option value="Samba">Samba</option> 
                          <option value="Shupiyan">Shupiyan</option> 
                          <option value="Srinagar">Srinagar</option> 
                          <option value="Udhampur">Udhampur</option>
                        </select>  
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="unearbyhospital">Hospitals Nearby: </label>
                      <div class="">
                        <select class="form-control" id="unearbyhospital" name="unearbyhospital">
                          <option value="">Hospitals Nearby</option> 
                          <option value="S.M.S.H Hospital">S.M.S.H Hospital</option> 
                        </select>  
                      </div>
                    </div>
                  </div>

                  <div class="clearfix" style="height: 10px;clear: both;"></div>



                  <div class="clearfix" style="height: 10px;clear: both;"></div>

                  <div class="form-group">
                    <center>
                      <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                      <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button> 
                    </center>
                  </div>

                </fieldset>
              </div>

              <div id="sf3" class="frm" style="display: none;">
                <fieldset>
                  <legend>Step 3 of 3</legend>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label" for="uhowuknow">How you came to know about this form: </label>
                      <div class="">
                        <input type="text" placeholder="How you came to know about this form" id="uhowuknow" name="uhowuknow" class="form-control" autocomplete="off">
                      </div>
                    </div>
                  </div>  
                  <div class="clearfix" style="height: 10px;clear: both;"></div>

                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button> 
                      <button class="btn btn-primary open3" type="button">Submit </button> 
                      <img src="spinner.gif" alt="" id="loader" style="display: none">
                    </div>
                  </div>
                </fieldset>
              </div>
            </form>
          </div>
        </div>
      </div>
      <script type="text/javascript" src="js/jquery.validate.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
      <div class="margin10"></div>
    </div>

    <footer>
      <div class="navbar navbar-inverse footer">
        <div class="container-fluid">
          <div class="copyright">
            <a href="" target="_blank">&copy; <?php echo date("Y"); ?> ehsas.in | All rights reserved</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>