<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Dashboard <small>reports &amp; statistics</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">My Risk Register</a>
				</li>
			</ul>
<!-- 			<div class="page-toolbar">
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
					Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a href="#">Export to XLS</a>
						</li>
					</ul>
				</div>
			</div> -->
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN CONTENT-->
		<div class="panel panel-success">
			<div class="panel-body">
				<div class="col-md-3">
					<span>My Risk Register</span>
					<div id="chart_user" class="chart" style="width: 200px; height: 120px;"></div>
				</div>
				<div class="col-md-3">
					<span>Risk Owned By Me</span>
					<div id="chart_owned" class="chart" style="width: 200px; height: 120px;"></div>
				</div>
				<div class="col-md-3">
					<span>My Action Plan</span>
					<div id="chart_action_plan" class="chart" style="width: 200px; height: 120px;"></div>
				</div>
				<div class="col-md-3">
					<span>My KRI</span>
					<div id="chart_kri" class="chart" style="width: 200px; height: 120px;"></div>
				</div>
			</div>
		</div>

		<div class="tabbable-custom ">
			<ul class="nav nav-tabs ">
				<li class="active">
					<a href="#tab_my_risk_register" data-toggle="tab">
					My Risk Register </a>
				</li>
				<li>
					<a href="#tab_owned" data-toggle="tab">
					Risk Owned By Me </a>
				</li>
				<li>
					<a href="#tab_action_plan" data-toggle="tab">
					My Action Plan </a>
				</li>
				<li>
					<a href="#tab_action_exec" data-toggle="tab">
					My Action Plan Execution</a>
				</li>
				<li>
					<a href="#tab_kri" data-toggle="tab">
					My KRI</a>
				</li>
				<li>
					<a href="#tab_change_request_list" data-toggle="tab">
					Daftar Permintaan Perubahan </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_my_risk_register">
					<div class="row">
						<div class="col-md-4">
						<form role="form form-horizontal">
							<div class="form-body">
								<div class="form-group">
									<select class="form-control input-sm" name="risk_category" id="sel_risk_category"></select>
								</div>
								<div class="form-group">
									<select class="form-control input-sm" name="risk_sub_category" id="sel_risk_sub_category"></select>
								</div>
								<div class="form-group">
									<select class="form-control input-sm" name="risk_2nd_sub_category" id="sel_risk_2nd_sub_category"></select>
								</div>
								<div class="form-group">
									<button type="button" id="button-filter-category" class="btn blue btn-sm">Filter Risiko</button>
									<button type="button" id="button-filter-clear" class="btn blue btn-sm">Hapus Filter</button>
								</div>
							</div>
						</form>
						</div>
						<?php
							if($adhoc_button !=''){
								?>
						<div class="col-md-8 clearfix" style="margin-top: 130px;">
							<a href="javascript: location.href='<?=$site_url?>/risk/RiskRegister/RiskRegisterInput/adhoc';" 
							   class="btn default green pull-right <?=$adhoc_button ? '' : 'disabled'?>">
							<i class="fa fa-plus"></i>
							<span class="hidden-480">
							Tambah Resiko Baru </span>
							</a>
						</div>
						<?php
					}
					?>
						
					</div>
					<hr/>
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_ajax">
						<thead>
						<tr role="row" class="heading">
							<th width="30px">Status</th>
							<th>ID Risiko</th>
							<th>Peristiwa Risiko</th>
							<th>Level Dampak</th>
							<th>Kemungkinan Kejadian</th>
							<th>Level Risiko</th>
							<th>Pemilik Risiko</th>
							<th width="50px">Status Permintaan Perubahan</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					<div class="col-md-6">
						<h4>Legend</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 Menunggu Verifikasi RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
								 Terverifikasi RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/treatment.png"/> &nbsp; 
								 Dalam Proses Penanganan Risiko
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/actplan.png"/> &nbsp; 
								 Dalam Proses Action Plan
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/executed.png"/> &nbsp; 
								 Action Plan Telah Dilaksanakan dan Diverifikasi
							</li>
						</ul>
		
					</div>
					</div>
				</div>
				
				<div class="tab-pane" id="tab_owned">
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_grid_owned">
						<thead>
						<tr role="row" class="heading">
							<th width="30px">Status</th>
							<th>ID Risiko</th>
							<th>Peristiwa Risiko</th>
							<th>Level Risiko</th>
							<th>Ditugaskan Kepada</th>
							<th>Penanganan Risiko</th>
							<th width="50px">Permintaan Perubahan</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					<div class="col-md-6">
						<h4>Legend</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified_head.png"/> &nbsp; 
								 Menunggu Verifikasi Kepala Divisi
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 Menunggu Verifikasi RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
								 Terverifikasi RAC
							</li>
						</ul>
					</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_action_plan">
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_action_plan">
						<thead>
						<tr role="row" class="heading">
							<th width="30px">Status</th>
							<th>AP ID</th>
							<th>Action Plan</th>
							<th>Batas Waktu</th>
							<th>Ditugaskan Kepada</th>
							<th>ID Risiko</th>
							<th width="50px">Permintaan perubahan</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					<div class="col-md-6">
						<h4>Legend</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified_head.png"/> &nbsp; 
								 Menunggu Verifikasi Kepala Divisi
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 Menunggu Verifikasi RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
								 Terverifikasi RAC
							</li>
						</ul>
					</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_action_exec">
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_action_exec">
						<thead>
						<tr role="row" class="heading">
							<th width="30px">Status</th>
							<th>AP ID</th>
							<th>Action Plan</th>
							<th>Batas Waktu</th>
							<th>Ditugaskan Kepada</th>
							<th>Eksekusi</th>
							<th>ID Risiko</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					<div class="col-md-6">
						<h4>Legend</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified_head.png"/> &nbsp; 
								 Menunggu Verifikasi Kepala Divisi
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 Menunggu Verifikasi RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
								 Terverifikasi RAC
							</li>
						</ul>
					</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_kri">
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_kri">
						<thead>
						<tr role="row" class="heading">
							<th width="30px">Status</th>
							<th>KRI ID</th>
							<th>KRI</th>
							<th>Treshold</th>
							<th>Waktu Pelaporan</th>
							<th>Ditugaskan kepada</th>
							<th>ID Risiko</th>
							<th width="50px">Permintaan Perubahan</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					<div class="col-md-6">
						<h4>Legend</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified_head.png"/> &nbsp; 
								 Menunggu Verifikasi Kepala Divisi
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 Menunggu Verifikasi RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
								 Terverifikasi RAC
							</li>
						</ul>
					</div>
					</div>
				</div>			
				<div class="tab-pane" id="tab_change_request_list">
					<div class="table-scrollable">
						<table class="table table-condensed table-bordered table-hover" id="datatable_ajax_change">
							<thead>
							<tr role="row" class="heading">
								<th>No</th>
								<th>ID CH</th>
								<th>ID Risiko</th>
								<th>Peristiwa Risiko</th>
								<th>Status Permintaan Perubahan</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
		</div>
		<!-- END CONTENT-->
	</div>
</div>

<!-- PIC -->
<div id="modal-pic" class="modal fade" tabindex="-1" data-width="760" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Ditugaskan Kepada</h4>
	</div>
	<div class="modal-body">
		<table id="pic_list_table" class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th width="30px">&nbsp;</th>
				<th>Nama</th>
				<th>Divisi</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($pic_list as $k=>$row) { ?>
			<tr id="modal-pic-tr-<?=$k?>">
				<td>
				<div class="btn-group">
					<button value_idx="<?=$k?>" value="<?=$row['username']?>" type="button" class="btn btn-default btn-xs button-assign-pic"><i class="fa fa-check-circle font-blue"></i></button>
				</div>
				</td>
				<td class="col_display_name"><?=$row['display_name']?></td>
				<td><?=$row['division_name']?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Execution Form -->
<div id="modal-exec" class="modal fade" tabindex="-1" data-width="760" data-keyboard="false" role="dialog" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Pelaksanaan Action Plan</h4>
	</div>
	<div class="modal-body form">
		<form id="exec-form" role="form" class="form-horizontal">
		<input type="hidden" id="form-action-id" name="action_id" value="" />
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 smaller control-label">Status </label>
					<div class="col-md-9">
					<select class="form-control input-sm" name="execution_status" id="exec-select-status">
						<option value="COMPLETE" selected>Complete</option>
						<option value="EXTEND">Extend</option>
					</select>
					</div>
				</div>
				<div class="form-group" id="fgroup-explain">
					<label class="col-md-3 control-label smaller cl-compact">Penjelasan<span class="required">* </span></label>
					<div class="col-md-9">
					<textarea class="form-control" rows="3" name="execution_explain" placeholder=""></textarea>
					</div>
				</div>
				<div class="form-group" id="fgroup-evidence">
					<label class="col-md-3 control-label smaller cl-compact">Bukti</label>
					<div class="col-md-9">
					<textarea class="form-control" rows="3" name="execution_evidence" placeholder=""></textarea>
					</div>
				</div>
				<div class="form-group" id="fgroup-reason">
					<label class="col-md-3 control-label smaller cl-compact">Alasan<span class="required">* </span></label>
					<div class="col-md-9">
					<textarea class="form-control" rows="3" name="execution_reason" placeholder=""></textarea>
					</div>
				</div>
				<div class="form-group" id="fgroup-date">
					<label class="col-md-3 smaller control-label">Revisi Batas Waktu<span class="required">* </span></label>
					<div class="col-md-9">
					<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
						<input type="text" class="form-control input-sm" name="revised_date" readonly value="<?=date('d-m-Y')?>">
						<span class="input-group-btn">
						<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
						</span>
					</div>
					</div>
				</div>
			</div>
			
			<div class="form-actions right">
				<button id="exec-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan </button>
				<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
			</div>
		</form>
	</div>
</div>