<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Author" content="amir samad hanga">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

        <meta property="og:url" content="<?php echo isset($ogUrl) ? $ogUrl: BASE_URL; ?>" />
        <meta property="og:type"               content="<?php echo isset($ogType) ? $ogType: 'article'; ?>" />
        <meta property="og:title"              content="<?php echo isset($ogTitle) ? $ogTitle: PAGE_TITLE; ?>" />
        <meta property="og:description"        content="<?php echo isset($ogDescription) ? $ogDescription: PAGE_TITLE; ?>" />
        <meta property="og:image"              content="<?php echo isset($ogImage) ? $ogImage: LOGO_IMAGE_URL; ?>" />

        <title><?php echo isset($title)? $title : PAGE_TITLE; ?></title>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/material-kit.css'); ?>">
        <!--link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>"-->
		<!--link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>"-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>">
		<!--link rel="stylesheet" href="<?php echo base_url('assets/css/form-elements.css'); ?>"-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css'); ?>">
        <!--link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"-->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style_main.css'); ?>">

        <link rel="canonical" href="<?php isset($pageCanonicalUrl) ? $pageCanonicalUrl : BASE_URL; ?>" />
    <script src="https://apis.google.com/js/platform.js" async defer></script>

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
	<body class="<?php echo isset($pageHeaderType) ? $pageHeaderType : 'components-page' ?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>  
<!-- Navbar -->
<nav class="navbar navbar-danger navbar-transparent navbar-fixed-top navbar-color-on-scroll">
	<div class="container">
        <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
	        	<span class="sr-only">Toggle navigation</span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	    	</button>
	    	<a href="<?php echo base_url('home'); ?>">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="<?php echo base_url('assets/img/logo_header.png'); ?>" alt="<?php echo MAIN_TITLE; ?>">
	                </div>
	                <div class="brand">
	                    <p class="logoName"><?php echo strtoupper(PROJECT_NAME); ?></p>
	                    <p class="logoTagName"><?php echo strtoupper(MAIN_TAGLINE); ?></p>
	                </div>
				</div>
	      	</a>
	    </div>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				<?php if(isset($admin_logout)){ ?>
				  <li>
					<a href="<?php echo base_url('admin/logout'); ?>">Admin Logout</a>
				  </li>
				<?php  } ?>
				<li>
					<a href="<?php echo base_url('home'); ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url('/aboutus'); ?>">About Us</a>
				</li>
				<li>
					<a href="<?php echo base_url('/contact'); ?>">Contact Us</a>
				</li>
				<?php if($this->session->has_userdata('donor_name')){ ?>
				  <li> 
					<a href="<?php echo base_url("donor/edit/{$this->session->userid}"); ?>" title="Edit Profile">Edit</a>
				  </li> 
				  <li>
					<a href="<?php echo base_url('donor/logout'); ?>">Logout</a>
				  </li>  
				<?php } else{ ?>
				  <li>
					<a href="<?php echo base_url('donor/login'); ?>">Login</a> 
				  </li>
				  <li>
					<a href="<?php echo base_url('donor/register'); ?>">Register</a>
				  </li>
				<?php } ?>        
				<li>
					<a href="http://blog.ehsas.in/">Blog</a>
				</li>		
				<li class="topMenuSocial">
					<a rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-twitter"></i>
					</a>
					<a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-facebook-square"></i>
					</a>					
					<a rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="#" target="_blank" class="btn btn-white btn-simple btn-just-icon">
						<i class="fa fa-instagram"></i>
					</a>					
				</li>
	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->
<div class="wrapper">	