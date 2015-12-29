<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Banner Setting
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Setting</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Banner Setting</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		
		<div class="row">
		<div class="col-md-12">
			<?php if($update_success) { ?>
			<div class="alert alert-success">
				<strong>Success!</strong> Banner Data Updated.
			</div>
			<?php } ?>
			<div class="form">
				<form target="_self" action="<?=$site_url?>/admin/banner/updateBanner" method="post" id="input-form" role="form" class="form-horizontal">
					<div class="form-body">
					<!--
						<div class="form-group">
							<label class="col-md-3 control-label">Banner Text</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Banner Text" name="banner_text" id="banner-text" value="<?//=$banner['banner_text']?>">
							</div>
						</div>
						-->
						<div class="form-group">
									<label class="col-md-3 control-label">Banner Text</label>
									<div class="col-md-6">
									<textarea class="form-control" rows="3" name="banner_text" placeholder="Banner Text" id="banner-text"> <?=$banner['banner_text']?> </textarea>
									</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
								<select class="form-control input-sm" name="banner_status">
									<option value="1" <?=$banner['banner_status'] == '1' ? 'SELECTED' : ''?>>Published</option>
									<option value="0" <?=$banner['banner_status'] == '0' ? 'SELECTED' : ''?>>Unpublished</option>
								</select>
							</div>
						</div>
						<div class="form-actions right">
							<button id="input-form-submit-button" type="submit" 
								class="btn blue ladda-button"
								 data-style="expand-right"
								>Save Banner</button>
								<a href='index.php/main/mainrac'><button type="button" class="btn yellow" id="kri-button-cancel"><i class="fa fa-times"></i> Cancel</button></a>
						</div>
					</div>
				</form>
			</div>
		</div>	
		</div>
	</div>
</div>