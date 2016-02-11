<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Modifikasi User
		</h3>
		<!-- END PAGE HEADER-->
		<div class="row">
		<div class="col-md-12">
		<div class="portlet">
		<div class="portlet-title">
			<form class="form-inline" role="form" id="filterForm">
				<div class="form-group">
					<label for="filterFormBy">Filter Dengan</label>
					<select class="form-control input-medium input-sm" id="filterFormBy">
						<option value="username">Username</option>
						<option value="display_name">Nama Lengkap</option>
						<option value="role_name">Role</option>
						<option value="division_name">Division</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control input-sm" id="filterFormValue" placeholder="Masukkan Nilai Filter">
				</div>
				<button type="button" id="filterFormSubmit" class="btn green btn-sm">Ajukan</button>
			</form>	
			
		</div>
		</div>
		
		<div class="portlet-body">
			<div class="table-container">
				<div class="table-actions-wrapper">
				</div>
				<table class="table table-striped table-bordered " id="datatable_ajax">
				<thead>
				<tr role="row" class="heading">
					<th width="5%">
						 No
					</th>
					<th width="20%"> Username </th>
					<th width="25%"> Nama Lengkap </th>
					<th width="20%"> Role </th>
					<th width="20%"> Role Status</th>
					<th width="20%"> Email</th>
					<th width="20%"> Divisi </th>
					<th width="8%">
					</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
				</table>
			</div>
		</div>
		</div>
		</div>
		<!-- FORM MODAL -->
		<div id="form-data" class="modal fade" tabindex="-1" data-width="760" data-keyboard="false">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Tambah User</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="input-form" class="form-horizontal" role="form">
						<input type="hidden" name="user_id" value="">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label">User Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="User Name" name="username">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Nama Lengkap</label>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Nama Lengkap" name="display_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Role</label>
								<div class="col-md-6">
									<select class="form-control" name="role_id">
										<?php foreach($role_list as $v) { ?>
										<option value="<?=$v['key']?>"><?=$v['value']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Role Status</label>
								<div class="col-md-6">
									<select class="form-control" name="role_status">
										<?php foreach($role_status as $v) { ?>
										<option value="<?=$v['key']?>"><?=$v['value']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
								<div class="col-md-6">
									<input type = "text" name = "email" id = "email" class = "form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Division</label>
								<div class="col-md-6">
									<select class="form-control" name="division_id">
										<?php foreach($division_list as $v) { ?>
										<option value="<?=$v['key']?>"><?=$v['value']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
				<button id="input-form-submit-button" type="button" 
					class="btn blue ladda-button"
					 data-style="expand-right"
					>Ajukan</button>
			</div>
		</div>
	</div>
</div>