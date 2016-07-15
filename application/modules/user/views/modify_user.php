<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Modify User
		</h3>
		<!-- END PAGE HEADER-->
		<a href="#form-user" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
		<span class="hidden-480">
		User Hide </span>
		</a>
		
		<div class="row">
		<div class="col-md-12">
		<div class="portlet">
		<div class="portlet-title">
			<form class="form-inline" role="form" id="filterForm">
				<div class="form-group">
					<label for="filterFormBy">Filter By</label>
					<select class="form-control input-medium input-sm" id="filterFormBy">
						<option value="username">Username</option>
						<option value="display_name">Full Name</option>
						<option value="role_name">Role</option>
						<option value="division_name">Division</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control input-sm" id="filterFormValue" placeholder="Insert Filter Value">
				</div>
				<button type="button" id="filterFormSubmit" class="btn green btn-sm">Search</button>
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
					<th width="3%">
						 No
					</th>
					<th width="13%"> Username </th>
					<th width="16%"> Full Name </th>
					<th width="12%"> Role </th>
					<th width="16%"> Role Status</th>
					<th width="12%"> Email </th>
					<th width="18%"> Division </th>
					<th width="20%">
						 Action
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
				<h4 class="modal-title">Add User</h4>
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
								<label class="col-md-3 control-label">Full Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Full Name" name="display_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Role</label>
								<div class="col-md-6">
									<select class="form-control" name="role_id" id="role_id">
										<?php foreach($role_list as $v) { ?>
										<option value="<?=$v['key']?>"><?=$v['value']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Role Status</label>
								<div class="col-md-6">
									<select class="form-control" name="role_status" id="role_status">
										
										<?php// foreach($role_status as $v) { ?>
										<!--
										<option value="<?//=$v['key']?>"><?//=$v['value']?></option>
										-->
										<?php// } ?>
									</select>
								</div>
							</div>
							<!--<div class="form-group">
								<label class="col-md-3 control-label">Role Status</label>
								<div class="col-md-6">
									<input type = "text" name = "role_status" id = "role_status" class = "form-control">
								</div>
							</div>-->
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
				<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
				<button id="input-form-submit-button" type="button" 
					class="btn blue ladda-button"
					 data-style="expand-right"
					>Submit</button>
			</div>
		</div>

		<!-- FORM MODAL MOVE -->
		<div id="form-data-move" class="modal fade" tabindex="-1" data-width="760" data-keyboard="false">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Add User</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="input-form-move" class="form-horizontal" role="form">
						<input type="hidden" name="user_id" value="">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label">Old User</label>
								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="User Name" name="username_id">
									<input type="text" class="form-control" placeholder="User Name" name="username_old">
								</div>
							</div>
							
							
							
							<div class="form-group">
								<label class="col-md-3 control-label">New User</label>
								<div class="col-md-6">
									<select class="form-control" name="username_new">
										<?php foreach($username_list as $v) { ?>
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
				<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
				<button id="input-form-submit-button-move" type="button" 
					class="btn blue ladda-button"
					 data-style="expand-right"
					>Submit</button>
			</div>
		</div>


		<!-- modal hide user -->
<div id="form-user" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">User Hide</h4>
			</div>
	<div class="modal-body">
		<div class="table-container">
				<div class="table-actions-wrapper">
				</div>
				<table class="table table-striped table-bordered " id="">
				<thead>
				<tr role="row" class="heading">
					<th width="3%">
						 No
					</th>
					<th width="13%"> Username </th>
					<th width="16%"> Full Name </th>
					<th width="12%"> Role </th>
					<th width="16%"> Role Status</th>
					<th width="12%"> Email </th>
					<th width="18%"> Division </th>
				</tr>
				<?php
				$no = 1;
				foreach ($userhide as $row) {
				?>
				<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row['username'];?></td>
				<td><?php echo $row['display_name'];?></td>
				<td><?php echo $row['role_id'];?></td>
				<td><?php echo $row['role_status'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['division_id'];?></td>
				</tr>
				<?php
				$no++;
				}
				?>
				</thead>
				<tbody>
				</tbody>
				</table>
			</div>
	</div>
	
</div>

	</div>
</div>