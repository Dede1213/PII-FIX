<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		User Manual
		</h3>
		<!-- END PAGE HEADER-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="<?=$site_url?>/main/usermanual">User Manual</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">View User Manual</a>
				</li>
			</ul>
		</div>
		
		<h4><?=$news['title']?></h4>
		<div class="row">
			<div class="col-md-12">
				<div class="news-item-page">
					<iframe id="blockrandom" name="iframe" src="<?=$base_url?>/uploadedFile/usermanual/<?=$news['filename']?>" 
					width="100%" height="500" scrolling="auto" align="top" frameborder="0" class="wrapper">
					This option will not work correctly. Unfortunately, your browser does not support
					inline frames.</iframe>

				</div>
			</div>
		</div>		
	</div>
</div>