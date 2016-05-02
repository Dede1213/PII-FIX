<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Form Permintaan Perubahan
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Form Permintaan Perubahan</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_entry) { ?>
		<h4>Perubahan Pada : <?=$change_type?></h4>
		<div class="row">
		<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption" id="primary-div-portlet-page-caption">
						Primary
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="primary-input-form" role="form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<input type="hidden" name="risk_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact" >ID Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_code" readonly="true" placeholder="">
							
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""></textarea>
									</div>
								</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-sm input-readview" readonly="true" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Delete Risk') { ?>
							
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Sebab <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_cause" placeholder=""></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Dampak <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_impact" placeholder=""></textarea>
									</div>
								</div>
							<?php } ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak<span class="required">* </span></label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" readonly="true" name="impact_level_v" placeholder="">
									
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian <span class="required">* </span></label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="likelihood_v"  placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko<span class="required">* </span></label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Usulan Penanganan Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="treatment_v" placeholder="">
								</div>
							</div>
							<hr/>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Delete Risk') { ?>
							<h4>Objektif</h4>
							<div class="table-scrollable">
								<table id="primary_objective_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th width="15%"><span class="small">ID Objektif</span></th>
										<th><span class="small">Objektif</span></th>
										
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<hr/>
							<h4>Kontrol</h4>
							<div class="table-scrollable">
								<table id="primary_control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">ID Kontrol Eksisting</span></th>
										<th><span class="small">Kontrol Eksisting</span></th>
										<th><span class="small">Evaluasi atas Eksisting Kontrol</span></th>
										<th><span class="small">Pemilik Kontrol</span></th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<hr/>
							<?php } ?>
							<h4>Action Plan</h4>
							<div class="table-scrollable">
								<table id="primary_action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">Usulan Action Plan</span></th>
										<th><span class="small">Batas Waktu</span></th>
										<th><span class="small">Pemilik Action Plan</span></th>
										<th><span class="small">Status Action Plan</span></th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption" id="div-portlet-page-caption">
						Perubahan
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="input-form" role="form" class="form-horizontal">
						<input type="hidden" name="change_type" value="<?=$change_type?>" />
						
						<div class="form-body">
							<div class="form-group">
								<input type="hidden" name="risk_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact" >ID Risiko</label>
								<div class="col-md-9">

								<input type="text" class="form-control input-sm" readonly="true" name="risk_code" placeholder="">
								</div>
							</div>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Delete Risk') { ?>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview"  rows="3" name="risk_event" placeholder=""></textarea>
									</div>
								</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-sm input-readview"  rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<div class="clearfix">
								<a href="#form-control-objective" id="button-form-control-open-objective" data-toggle="modal" class="btn default green pull-right btn-sm">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Tambah Objektif </span>
								</a>
								<h4>Objektif</h4>
							</div>
							<div class="table-scrollable">
								<table id="objective_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th width="15%"><span class="small">ID Objektif</span></th>
										<th><span class="small">Objektif</span></th>
										<th width="66px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							
							<?php }else{ ?>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview"  readonly="true" rows="3" name="risk_event" placeholder=""></textarea>
									</div>
								</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-sm input-readview"  readonly="true" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<?php } ?>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Delete Risk') { ?>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Sebab <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" rows="3" name="risk_cause" placeholder=""></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Dampak <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview"  rows="3" name="risk_impact" placeholder=""></textarea>
									</div>
								</div>

							<?php } ?>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Risk Owner Form' || $change_type == 'Delete Risk') { ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak <span class="required">* </span></label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="hidden" name="risk_impact_level_id" value=""/>
										<input type="text" class="form-control input-sm" readonly="true" name="risk_impact_level_value" placeholder="">
										<span class="input-group-btn">
										<button class="btn btn-primary btn-sm" type="button" id="btn_impact_list"><i class="fa fa-search fa-fw"/></i></button>
										</span>
										
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian <span class="required">* </span></label>
								<div class="col-md-9">
									<div class="input-group">
										<input type="hidden" name="risk_likelihood_id" value=""/>
										<input type="text" class="form-control input-sm" readonly="true" name="risk_likelihood_value" placeholder="">
										<span class="input-group-btn">
										<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-likelihood"><i class="fa fa-search fa-fw"/></i></button>
										</span>
										
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" name="risk_level_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko<span class="required">* </span></label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Usulan Penanganan Risiko</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="suggested_risk_treatment">
									<?php foreach($treatment_list as $row) { ?>
									<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							<?php } else { ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="impact_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="likelihood_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Usulan Penanganan Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="treatment_v" placeholder="">
								</div>
							</div>
							<?php } ?>
							<hr/>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Delete Risk') { ?>
							<!--
							<div class="clearfix">
								<a href="#form-control-objective" id="button-form-control-open-objective" data-toggle="modal" class="btn default green pull-right btn-sm">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Tambah Objektif </span>
								</a>
								<h4>Objektif</h4>
							</div>
							<div class="table-scrollable">
								<table id="objective_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th width="15%"><span class="small">ID Objektif</span></th>
										<th><span class="small">Objektif</span></th>
										<th width="66px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<hr/>
							-->
							<div class="clearfix">
								<a href="#form-control" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Tambah Kontrol </span>
								</a>
								<h4>Kontrol</h4>
							</div>
							<div class="table-scrollable">
								<table id="control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">ID Kontrol Eksisting</span></th>
										<th><span class="small">Kontrol Eksisting</span></th>
										<th><span class="small">Evaluasi atas Eksisting Kontrol</span></th>
										<th><span class="small">Pemilik Kontrol</span></th>
										<th><span class="small">Status Action Plan</span></th>
										<th width="66px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<hr/>
							<?php } ?>
							<?php if ($change_type == 'Risk Form' || $change_type == 'Risk Owner Form' || $change_type == 'Delete Risk') { ?>
							<div class="clearfix">
								<a href="#form-data" id="button-form-data-open" data-toggle="modal" class="btn default green pull-right btn-sm">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Tambah Usulan Action Plan </span>
								</a>
								<h4>Action Plan</h4>
							</div>
							<?php } else { ?>
							<h4>Action Plan</h4>
							<?php } ?>
							<div class="table-scrollable">
								<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">Usulan Action Plan</span></th>
										<th width="80px"><span class="small">Batas Waktu</span></th>
										<th><span class="small">Pemilik Action Plan</span></th>
										<th><span class="small">Status Action Plan</span></th>
										<th width="70px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-actions right">
							<button id="risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Ajukan</button>
							<button type="button" class="btn yellow" id="verify-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		</div>
		<?php } else { ?>
		<div class="row">
		<div class="col-md-12">
			<div class="note note-warning">
			<h4 class="block">Informasi</h4>
			<p>
				 Tidak bisa menginput Permintaan Perubahan pada Risiko ini, karena Risiko ini masih mempunyai Permintaan Perubahan dalam status pending. 
			</p>
			<p>
				<a class="btn red" target="_self" href="<?=$site_url?>/main">
				Kembali ke Beranda </a>
			</p>
			</div>
		</div>
		</div>
		<?php } ?>
	</div>
</div>


<?php
$time_compare_format = str_replace(' ', '_', $time_compare);
?>

<?php if ($valid_entry) { ?>
<script type="text/javascript">
	var g_risk_id = <?=$risk_id?>;
	var g_act_id = false;
	<?php if (isset($act_id)) { ?> var g_act_id = <?=$act_id?>;<?php } ?>
	var g_username = null;
	var g_change_type = '<?=$change_type?>';
	var g_time_compare = '<?=$time_compare_format?>';
</script>

<!-- OBJECTIVE -->
<div id="form-control-objective" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Objektif</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control-objective" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
					<input type = "hidden" id = "form-control-revid-objective">
						<label class="col-md-3 control-label smaller cl-compact">ID Objektif</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" readonly="true" name="objective_id" id = "objective_id" placeholder="">
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-objective"><i class="fa fa-search fa-fw"/></i></button>
								</span>
								
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Objektif <span class="required">* </span></label>
						<div class="col-md-9">
						<textarea class="form-control input-sm " rows="3"  name="objective" id = "objective" placeholder="">NONE</textarea>
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Hapus Kontrol Eksisting</button>
						</div>
					</div>
					
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
		<button id="input-control-add-objective" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
	</div>
</div>
<!-- CONTROL -->
<div id="form-control" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Kontrol</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control" role="form" class="form-horizontal">
			<input type = "hidden" id = "tr_idnya" >
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">ID Kontrol Eksisting</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" readonly="true" name="existing_control_id" placeholder="">
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-control"><i class="fa fa-search fa-fw"/></i></button>
								</span>
								
							</div>
						</div>
					</div>
					<div class="form-group">
					<input type = "hidden" id = "form-control-revid">
						<label class="col-md-3 control-label smaller cl-compact">Evaluasi atas Eksisting Kontrol <span class="required">* </span></label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_existing_control" id = "risk_existing_control" placeholder="" value="NONE">
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-control-existing"><i class="fa fa-search fa-fw"/></i></button>
								</span>
								
							</div>
						</div>
					</div>
					<!--
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Existing Control <span class="required">* </span></label>
						<div class="col-md-9">
						<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder="">NONE</textarea>
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
						</div>
					</div>
					-->
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Kontrol Eksisting <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_evaluation_control" id = "risk_evaluation_control" placeholder="" value="NONE">
						</div>
					</div>
					
					<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Pemilik Kontrol<span class="required">* </span></label>
									<div class="col-md-9">
									
									<select class="form-control input-sm" name="risk_control_owner" id = "risk_control_owner">
										<option value="NONE">NONE</option>
										<?php foreach($division_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
									</div>
								</div>
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
		<button id="input-control-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
	</div>
</div>

<!-- ACTION PLAN -->
<div id="form-data" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Usulan Action Plan</h4>
	</div>
	<div class="modal-body">
		<input type = "hidden" id = "tr_idnya2" >
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Status Action Plan <span class="required">* </span></label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="status_act" id = "status_act">
							
							<option value="">Choose one...</option>
							<option value="berkala">Berkala</option>
							<option value="tidak berkala">Tidak Berkala</option>
							
						</select>
						</div>
					</div>
					<div class="form-group">
					<input type = "hidden" id = "form-data-revid">
						<label class="col-md-3 control-label smaller cl-compact">Usulan Action Plan<span class="required">* </span></label>
						<div class="col-md-9">
							<div class="input-group">
								<textarea class="form-control input-sm " rows="3"  name="action_plan" id = "action_plan" placeholder=""> </textarea>
								<!--
								<input type="text" class="form-control input-sm" name="action_plan" id = "action_plan" placeholder=""> 
								--> 
								<span class="input-group-btn">
								<button style="margin-top:-60px; margin-left:5px;" class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-libraryaction"><i class="fa fa-search fa-fw"/></i></button>
								</span> 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Batas Waktu <span class="required">* </span></label>
						<div class="col-md-9">
						<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
							<input type="text" class="form-control input-sm" name="due_date" id = "due_date" readonly>
							<span class="input-group-btn">
							<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pemilik Action Plan <span class="required">* </span></label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="division" id ="division">
							<?php foreach($division_list as $row) { ?>
							<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
		<button id="input-actionplan-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Simpan</button>
	</div>
</div>
<!-- OBJECTIVE search Library -->
<div id="modal-objective" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Objektif</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-control-filter-submit-objective">Cari</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_objective_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>Objektif</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<!-- LIBRARY ACTION-->
<div id="modal-libraryaction" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Usulan Action Plan dari Library</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-libraryaction-filter-submit">Cari</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_tableaction" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>Action Plan</th> 
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- Existing CONTROL -->
<div id="modal-control-existing" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Evaluasi atas Eksisting Kontrol</h4>
		<p style="color:red;">* Pilih salah satu</p>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-control-filter-submit">Cari</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_control_table_existing" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>Evaluasi atas Eksisting Kontrol</th>
					<th>Deskripsi</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- CONTROL -->
<div id="modal-control" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Kontrol Eksisting</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-control-filter-submit">Cari</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_control_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>Kontrol Eksisting</th>
					<th>Evaluasi Atas Eksisting Kontrol</th>
					<th>Pemilik Kontrol</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<!-- IMPACT LEVEL -->
<div id="modal-impact" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Evaluasi atas Dampak Risiko</h4>
		<span class="font-red">* Dapat diisi lebih dari satu(1) kategori, namun dalam Satu(1)
		Kategori hanya boleh diisi satu(1) parameter</span>
	</div>
	<div class="modal-body" style="height: 400px; max-height: 400px; overflow: none; overflow-y: auto;">
		<form id="form-impact">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th>Kategori</th>
				<th>Parameter</th>
			</tr>
			</thead>
			<tbody>
			<?php $cnt = 0;
				foreach($impact_list['impact'] as $k=>$v) { ?>
				<tr>
					<td><?=$v?></td>
					<td>
						<div class="radio-list">
							<label>
							<input type="radio" name="impactlevel_<?=$k?>" value="NA" checked> N/A</label>
							<?php foreach($impact_list['impact_list'][$k] as $key=>$row) { ?>
							<label>
							<input type="radio" name="impactlevel_<?=$k?>" value="<?=$key?>"> <?=$row?></label>
							<?php } ?>
						</div>
					</td>
				</tr>
			<?php $cnt++; } ?>
			</tbody>
		</table>
		</form>
	</div>
	<div class="modal-footer">
		<button id="input-form-impact-button" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Simpan</button>
	</div>
</div>

<!-- LIKELIHOOD -->
<div id="modal-likelihood" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Evaluasi atas Kemungkinan Keterjadian</h4>
		<span class="font-red">* Pilih Salah Satu</span>
	</div>
	<div class="modal-body">
		<form id="form-likelihood">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th>&nbsp;</th>
				<th width="250px">Kemungkinan terjadinya resiko</th>
				<th>Deskripsi</th>
			</tr>
			</thead>
			<tbody>
			<?php $cnt = 0;
				foreach($likelihood as $row) { ?>
				<tr>
					<td><label><input type="radio" name="risk_likelihood" id="likelihood_<?=$row['l_id']?>" value="<?=$row['l_key']?>|<?=$row['l_title']?>" <?=$cnt == 0 ? 'checked' : ''?>></label></td>
					<td><?=$row['l_title']?></td>
					<td><?=$row['l_desc']?></td>
				</tr>
			<?php $cnt++; } ?>
			</tbody>
		</table>
		</form>
	</div>
	<div class="modal-footer">
		<button id="input-form-likelihood-button" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Simpan</button>
	</div>
</div>
<?php } ?>