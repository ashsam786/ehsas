<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Author" content="amir samad hanga">
        <title><?php echo isset($title)? $title : PAGE_TITLE; ?></title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
		<!--link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>"-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/form-elements.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/ico/apple-touch-icon-144-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/ico/apple-touch-icon-114-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/ico/apple-touch-icon-72-precomposed.png'); ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/ico/apple-touch-icon-57-precomposed.png'); ?>">

    </head>

    <body>
		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url('home'); ?>"><?php echo MAIN_TITLE ?></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-social">
								<a href="<?php echo base_url('home'); ?>" title="Home"><i class="fa fa-home"></i><span>Home</span></a> 
								<?php if($this->session->has_userdata('donor_name')){ ?>
									<a href="<?php echo base_url("donor/edit/{$this->session->userid}"); ?>" title="Edit Profile">
										<i class="fa fa-pencil-square-o"></i>
										<span>Edit</span>
									</a> 
									<a href="<?php echo base_url('donor/logout'); ?>" title="logout"><i class="fa fa-sign-out"></i><span>Logout</span></a>
								<?php } else{ ?>
									<a href="<?php echo base_url('donor/login'); ?>" title="Login"><i class="fa fa-sign-in" aria-hidden="true"></i><span>Login</span></a> 
									<a href="<?php echo base_url('donor/register'); ?>" title="Register"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Register</span></a>
								<?php } ?>
							</span>
						</li>
						<li>
							<span class="li-social">
								<a href="<?php echo FB_LINK; ?>" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a> 
								<a href="<?php echo TWITTER_LINK; ?>" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a> 
								<a href="<?php echo GOOGLEPLUS_LINK; ?>" target="_blank"><i class="fa fa-google-plus"></i><span>Google Plus</span></a> 
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>	

<!--nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav-->