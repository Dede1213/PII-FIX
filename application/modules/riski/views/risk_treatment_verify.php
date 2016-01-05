<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Form Pemilik Risiko
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Form Pemilik Risiko</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_risk_id = <?=$risk['risk_id']?>;
			var g_username = null;
		</script>
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
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_event']?>" name="risk_event" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_description" placeholder=""><?=$risk['risk_description']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['impact_level_v']?>" name="risk_impact_level_value" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadiaan</label>
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
								<label class="col-md-3 control-label smaller cl-compact" >Pemilik Risiko </label>
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
							<div class="col-md-6"><h4>Control</h4></div>
							</div>
							<table class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th><small>ID Kontrol Eksisting</small></th>
									<th><small>Kontrol Eksisting</small></th>
									<th><small>Evaluasi Atas Kontrol Eksisting</small></th>
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
									<th><small>Pemilik Action Plan</small></th>
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
							<button id="primary-risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verify</button>
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
								<input type="text" class="form-control input-sm input-readview" name="risk_event" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_description" placeholder=""></textarea>
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
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadiaan </label>
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
									<h4>Control</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-control" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Add Control </span>
									</a>
								</div>
							</div>
							
							<div class="table-scrollable">
								<table id="control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>ID Kontrol Eksisting</small></th>
										<th><small>Kontrol Eksisting</small></th>
										<th><small>Evaluasi Atas Kontrol Eksisting</small></th>
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
									Add Plan Action Suggestion </span>
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
							<button id="changes-risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Save</button>
							<button type="button" class="btn yellow" id="changes-risk-button-cancel"><i class="fa fa-times"></i> Cancel</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
		
		</div>
		<?php } else { ?>
		<!-- ERROR RISK REGISTER MODE -->
		<div class="row">
		<div class="col-md-12">
			<div class="note note-danger">
				<h4 class="block">Error</h4>
				<p>
					 You are not allowed to view this Risk
				</p>
				<p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Back to Home </a>
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
		<h4 class="modal-title">Add Control</h4>
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
						<label class="col-md-3 control-label smaller cl-compact" >Kontrol Eksisting <span class="required">* </span></label>
						<div class="col-md-9">
						<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder=""></textarea>
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Evaluasi Atas Kontrol Eksisting <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_evaluation_control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Pemilik Kontrol <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_control_owner" placeholder="">
						</div>
					</div>
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button id="input-control-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Add</button>
	</div>
</div>

<!-- ACTION PLAN -->
<div id="form-data" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Add Suggested Action Plan</h4>
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
						<label class="col-md-3 control-label">Batas Waktu <span class="required">* </span></label>
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
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button id="input-actionplan-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Add</button>
	</div>
</div>

<!-- CONTROL -->
<div id="modal-control" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Existing Control</h4>
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
					<th><small>Kontrol Eksisting</small></th>
					<th><small>Evaluasi Atas Kontrol Eksisting</small></th>
					<th><small>Pemilik Kontrol</small></th>
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
		<h4 class="modal-title">Evaluation on Risk Impact</h4>
		<span class="font-red">* Dapat diisi lebih dari satu(1) kategori, namun dalam Satu(1)
		Kategori hanya boleh diisi satu(1) parameter</span>
	</div>
	<div class="modal-body" style="height: 400px; max-height: 400px; overflow: none; overflow-y: auto;">
		<form id="form-impact">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th>Category</th>
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
		<h4 class="modal-title">Evaluation on Risk Likelihood</h4>
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
			>Save</button>
	</div>
</div>