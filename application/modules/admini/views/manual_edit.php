<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Ubah Panduan Pengguna
		</h3>
		<!-- END PAGE HEADER-->
		
		<div class="row">
		<div class="col-md-12">
			<div class="portlet">
			<div class="portlet-title">
				<div class="actions">
					<a href="javascript: location.href='<?=$site_url?>/admini/usermanual'" class="btn default green-stripe">
					<i class="fa fa-plus font-green"></i>
					<span class="hidden-480">
					Kembali ke Daftar Panduan Pengguna </span>
					</a>
				</div>
			</div>
			
			<div class="portlet-body form">
				<?php if(isset($error)) { ?>
				<div class="alert alert-danger">
					<strong>Error!</strong><br/> <?=$error?>
				</div>
				<?php } ?>
				<form target="_self" action="<?=$site_url?>/admin/usermanual/manualEditData" enctype="multipart/form-data" method="post" id="input-form" role="form" class="form-horizontal">
					<input type="hidden" name="id" value="<?=$news['id']?>">
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Judul Panduan Pengguna</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="News Title" name="title" id="news-title" value="<?=$news['title']?>">
							</div>
						</div>
						
						<?php
						$var = 0;
						if ($var != 0){?>
						<div class="form-group">
							<label class="col-md-3 control-label">Uploaded Filename</label>
							<div class="col-md-6">
								<input type="text" class="form-control" readonly value="<?=$news['filename']?>">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Update Content</label>
							<div class="col-md-6">
								<input type="file" class="form-control" placeholder="Filename" name="filename" id="news-file">
								<span class="help-block">Don't fill this field if you dont want to update the news file</span>
							</div>
						</div>
						<?php } ?>


						<div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
								<select class="form-control input-sm" name="status">
									<option value="1" <?=$news['status'] == 1 ? 'SELECTED': ''?>>Published</option>
									<option value="0" <?=$news['status'] == 0 ? 'SELECTED': ''?>>Unpublished</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Role USer</label>
							<div class="col-md-6">
								<select class="form-control input-sm" name="role_user">
									<option value="3" >USER</option>
									<option value="5" >PIC</option>
									<option value="4" >HEAD</option>
									<option value="2" >RAC</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Content</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="3" name="content" data-required="1" placeholder=""> <?=$news['content']?> </textarea>
							</div>
						</div>
						<div class="form-actions right">
							<button id="input-form-submit-button" type="button" 
								class="btn blue ladda-button"
								 data-style="expand-right"
								>Ajukan</button>
						</div>
					</div>
				</form>
			</div>
			</div>
		</div>
		
	</div>
</div>