<?php if (!defined('BASEPATH'))    exit('No direct sabcript access allowed'); ?>

<div class="header header-filter" style="background-image: url('<?php echo base_url('assets/img/bg.jpg'); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="brand">
					<h1 class="title text-center topheaderTitle">OTHER INITIATIVES - <?php echo strtoupper($initiatives_list['category']) ?></h1>
					<h3></h3>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="main main-raised">
	<div class="section section-basic">
		<div class="container">
			<?php foreach($initiatives_list['data'] as $i => $v){ ?>
				<div class="row paragraph">
					<div class="title pageSectionTitle text-left darkLabelFont">
						<h3><?php echo $v['name']; ?></h3>
					</div>	

					<?php if(@getimagesize(base_url('assets/img/initiatives/initiaters/'.$v['image']))){ ?>
						<div class="col-md-4 col-sm-4 col-xs-4">
							<img src="<?php echo base_url('assets/img/initiatives/initiaters/'.$v['image']) ?>" class="img-responsive">
						</div>
					<?php } ?>
	
					<div class="col-md-8 col-sm-8 col-xs-8">
						<p><?php echo $v['description']; ?></p>	
						<address>
							<p>Email: <?php echo $v['email']? $v['email'] : 'NA'; ?></p>
							<p>Address: <?php echo $v['address']? $v['address'] : 'NA'; ?></p>
							<?php if(isset($v['url']) && !empty($v['url'])){ ?>
								<p>Website: <?php echo $v['url']? $v['url'] : 'NA'; ?></p>
							<?php } ?>
						</address>
					</div>
	
				</div>
			<?php } ?>
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

