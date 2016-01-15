<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Risk Owner Form
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Risk Owner Form</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_risk_id = <?=$risk['risk_id']?>;
			var g_username = null;
		</script>

<?php
	$id = $risk['risk_id'];
	//$username = $this->session->credential['username'];
	$this->load->database();
	$sql="SELECT
(CASE WHEN 
t_risk.risk_cause = t_risk_change.risk_cause 
and t_risk.risk_impact = t_risk_change.risk_impact
and t_risk.risk_impact_level = t_risk_change.risk_impact_level 
and t_risk.risk_likelihood_key = t_risk_change.risk_likelihood_key
and t_risk.risk_level = t_risk_change.risk_level
and t_risk.suggested_risk_treatment = t_risk_change.suggested_risk_treatment
and 
(CASE WHEN count(t_risk_control.risk_id) = count(t_risk_control_change.risk_id) and count(t_risk_action_plan.risk_id) = count(t_risk_action_plan_change.risk_id) 
THEN
t_risk_control.risk_id = t_risk_control_change.risk_id
and t_risk_control.risk_existing_control = t_risk_control_change.risk_existing_control
and t_risk_control.risk_evaluation_control = t_risk_control_change.risk_evaluation_control
and t_risk_control.risk_control_owner = t_risk_control_change.risk_control_owner
and t_risk_action_plan.action_plan = t_risk_action_plan_change.action_plan
and t_risk_action_plan.due_date = t_risk_action_plan_change.due_date
and t_risk_action_plan.division = t_risk_action_plan_change.division
END)
THEN 1
ELSE 0 
END) as 'status'
from t_risk
join t_risk_change on t_risk.risk_id = t_risk_change.risk_id
join t_risk_control on t_risk.risk_id = t_risk_control.risk_id
join t_risk_control_change on t_risk.risk_id = t_risk_control_change.risk_id
join t_risk_action_plan on t_risk.risk_id = t_risk_action_plan.risk_id
join t_risk_action_plan_change on t_risk.risk_id = t_risk_action_plan_change.risk_id
WHERE t_risk.risk_id ='$id'";

	$query = $this->db->query($sql);
	$row = $query->row(); 
	$hasil = $row->status;
	if ($hasil == 1){
?>

<!--     Start risk owner form -->
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						PRIMARY 
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" id="input-form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<input type="hidden" name="risk_id" value="">
								<label class="col-md-3 control-label smaller cl-compact">ID Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_code" placeholder="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Penyebab</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_cause" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Dampak</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_impact" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak </label>
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
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian </label>
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
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko </label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Pemilik Risiko</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="risk_division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" >Penanganan Risiko</label>
								<div class="col-md-6">
									<select class="form-control input-sm" name="suggested_risk_treatment">
										<?php foreach($treatment_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-6">
									<h4>Kontrol</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-control" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Tambah Kontrol </span>
									</a>
								</div>
							</div>
							
							<div class="table-scrollable">
								<table id="control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>ID Kontrol Eksisting</small></th>
										<th><small>Kontrol Eksisting</small></th>
										<th><small>Evaluasi atas Kontrol Eksisting</small></th>
										<th><small>Pemilik Kontrol</small></th>
										<th width="30px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							
							<hr/>
							<div class="row">
								<div class="col-md-6">
									<h4>Ususlan Action Plan</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-data" data-toggle="modal" class="btn default green pull-right btn-sm">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Tambah Usulan Action Plan </span>
									</a>
								</div>
							</div>
							
							<div class="table-scrollable">
								<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>Usulan Action Plan</small></th>
										<th><small>Batas Waktu </small></th>
										<th><small>Pemilik Action Plan</small></th>
										<th width="30px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-actions right">
							<button id="primary-risk-button-submit2" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Ajukan</button>
							<button id="changes-risk-button-save-primary" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button type="button" class="btn yellow" id="changes-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
							
					
						</div>
					</form>
				</div>	
			</div>
		</div>

		</div>

		<!--     end risk owner form -->



		

<?php }else{ ?>

		<!--     Start risk owner form -->
		<div class="row">
		<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						PRIMARY
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">ID Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_code']?>" name="risk_id" placeholder="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$risk['risk_event']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_description" placeholder=""><?=$risk['risk_description']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Penyebab</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_cause2" placeholder=""><?=$risk['risk_cause']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Dampak</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_impact2" placeholder=""><?=$risk['risk_impact']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['impact_level_v']?>" name="risk_impact_level_value" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['likelihood_v']?>" name="risk_likelihood_value" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" name="risk_level_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_level_v']?>" name="risk_level" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Pemilik Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_owner_v']?>" name="risk_owner_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" >Penanganan Risiko</label>
								<div class="col-md-6">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['treatment_v']?>" name="treatment_v" placeholder="">
								</div>
							</div>
							
							<hr/>
							<div class="row">
							<div class="col-md-6"><h4>Kontrol</h4></div>
							</div>
							<table class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th><small>ID Kontrol Eksisting</small></th>
									<th><small>Kontrol Eksisting</small></th>
									<th><small>Evaluasi atas Kontrol Eksisting</small></th>
									<th><small>Pemilik Kontrol</small></th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($risk['control_list'] as $k => $row) { ?>
									<tr>
										<td><?=$row['existing_control_id']?></td>
										<td><?=$row['risk_existing_control']?></td>
										<td><?=$row['risk_evaluation_control']?></td>
										<td><?=$row['risk_control_owner']?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							
							<hr/>
							<div class="row">
							<div class="col-md-6"><h4>Usulan Action Plan</h4></div>
							</div>
							
							<table class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th nowrap><small>Usulan Action Plan</small></th>
									<th><small>Batas Waktu</small></th>
									<th><small>Pemilik Action PLan</small></th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($risk['action_plan_list'] as $k => $row) { ?>
									<tr>
										<td><?=$row['action_plan']?></td>
										<td nowrap><?=$row['due_date_v']?></td>
										<td><?=$row['division_v']?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="form-actions right">
							<button id="primary-risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Ajukan</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
		<!-- CHANGES FORM -->
		<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						PERUBAHAN
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" id="input-form" class="form-horizontal">
						<div class="form-body">
							<div class="form-group">
								<input type="hidden" name="risk_id" value="">
								<label class="col-md-3 control-label smaller cl-compact">ID Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_code" placeholder="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Penyebab</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_cause" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Dampak</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_impact" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak </label>
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
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian </label>
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
								<label class="col-md-3 control-label smaller cl-compact" >Level Risk</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Pemilik Risiko</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="risk_division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" >Penanganan Risiko</label>
								<div class="col-md-6">
									<select class="form-control input-sm" name="suggested_risk_treatment">
										<?php foreach($treatment_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-6">
									<h4>Kontrol</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-control" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Tambah Kontrol </span>
									</a>
								</div>
							</div>
							
							<div class="table-scrollable">
								<table id="control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>ID Kontrol Eksisting</small></th>
										<th><small>Kontrol Eksisting</small></th>
										<th><small>Evaluasi atas Kontrol Eksisting</small></th>
										<th><small>Pemilik Kontrol</small></th>
										<th width="30px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							
							<hr/>
							<div class="row">
								<div class="col-md-6">
									<h4>Usulan Action Plan</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-data" data-toggle="modal" class="btn default green pull-right btn-sm">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Tambah Usulan Action Plan </span>
									</a>
								</div>
							</div>
							
							<div class="table-scrollable">
								<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>Usulan Action Plan</small></th>
										<th><small>Batas Waktu</small></th>
										<th><small>Pemilik Action Plan</small></th>
										<th width="30px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-actions right">
							<button id="changes-risk-set-as-primary" type="button" class="btn blue"><i class="fa fa-arrows-h"></i> Set As Primary</button>
						<!-- <button id="changes-risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verify</button> -->
							<button id="changes-risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button type="button" class="btn yellow" id="changes-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
		
		</div>

		<!--     end risk owner form -->

		<?php } ?>

		<?php } else { ?>
		<!-- ERROR RISK REGISTER MODE -->
		<div class="row">
		<div class="col-md-12">
			<div class="note note-danger">
				<h4 class="block">Error</h4>
				<p>
					 Maaf, Anda tidak diperbolehkan melihat risiko tersebut.
				</p>
				<p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Kembali ke Dashboard </a>
				</p>
			</div>
		</div>
		</div>
		<?php } ?>
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
						<label class="col-md-3 control-label smaller cl-compact" >Kontrol Eksisting<span class="required">* </span></label>
						<div class="col-md-9">
						<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder=""></textarea>
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Evaluasi atas Kontrol Eksisting<span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_evaluation_control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Pemilik Kontrol<span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_control_owner" placeholder="">
						</div>
					</div>
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
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
		
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Usulan Action Plan <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="action_plan" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Batas Waktu<span class="required">* </span></label>
						<div class="col-md-9">
						<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
							<input type="text" class="form-control input-sm" name="due_date" readonly>
							<span class="input-group-btn">
							<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Pemilik Action Plan <span class="required">* </span></label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="division">
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
		<button type="button" data-dismiss="modal" class="btn btn-default">Tutup</button>
		<button id="input-actionplan-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
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
					<button class="btn btn-default" type="button" id="modal-control-filter-submit">Search</button>
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
					<th width="30px">&nbsp;</th>
					<th>Kontrol Eksisting</th>
					<th>Evaluasi atas Kontrol Eksisting</th>
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
		<h4 class="modal-title">Evaluasi atas Penyebab Risiko</h4>
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
			>Save</button>
	</div>
</div>

<!-- LIKELIHOOD -->
<div id="modal-likelihood" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Evauasi atas Kemungkinan Keterjadian</h4>
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