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
					<a target="_self" href="javascript:;">View Risk</a>
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
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						Risk Form
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" class="form-horizontal">
						<div class="form-body">
							<div class="row">
							<div class="col-md-5">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Kode Risiko</label>
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
									<label class="col-md-3 control-label smaller cl-compact" >Dampak Level</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['impact_level_v']?>" name="risk_impact_level_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['likelihood_v']?>" name="risk_likelihood_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_level_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" >Risiko Level</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_level_v']?>" name="risk_level" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Sebab <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_cause" placeholder=""><?=$risk['risk_cause']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Dampak <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_impact" placeholder=""><?=$risk['risk_impact']?></textarea>
									</div>
								</div>
								
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" >Usulan Penanganan Risiko</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['treatment_v']?>" name="risk_likelihood_value" placeholder="">
									</div>
								</div>

								<h4>Objective</h4>
								<table class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>Obj. ID</small></th>
										<th><small>Objective</small></th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($risk['objective_list'] as $k => $row) { ?>
										<tr>
											<td width="15%"> </td>
											<td><?=$row['objective']?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								
								<h4>Kontrol</h4>
								<table class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>ID Kontrol yang ada saat ini</small></th>
										<th><small>Kontrol yang ada saat ini</small></th>
										<th><small>Evaluasi dari Kontrol yang ada saat ini</small></th>
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
								
								<h4>Usulan Action Plan</h4>
								<table class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th nowrap><small>Usulan Action Plan</small></th>
										<th><small>Batas Tanggal</small></th>
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
							</div>
						</div>
					</form>
					<hr/>
					<form id="input-form" role="form" class="form-horizontal">
						<input type="hidden" name="risk_id" value="<?=$risk['risk_id']?>" />
						<div class="form-body">
							<div class="row">
							<div class="col-md-5">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Dampak Level</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="hidden" name="risk_impact_level_id"  value=""/>
											<input type="text" class="form-control input-sm" readonly="true" name="risk_impact_level_value" placeholder="" value="">
											<span class="input-group-btn">
											<button class="btn btn-primary btn-sm" type="button" id="btn_impact_list"><i class="fa fa-search fa-fw"/></i></button>
											</span>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="hidden" name="risk_likelihood_id" value=""/>
											<input type="text" class="form-control input-sm" readonly="true" name="risk_likelihood_value" placeholder="" value="">
											<span class="input-group-btn">
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-likelihood"><i class="fa fa-search fa-fw"/></i></button>
											</span>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_level_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" >Risiko Level</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="" value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Sebab</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview"  rows="3" name="risk_cause" placeholder=""></textarea>
									
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Dampak</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview"  rows="3" name="risk_impact" placeholder=""></textarea>
									
									</div>
								</div>
								
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" >Penanganan Risiko Yang Disepakati</label>
									<div class="col-md-6">
										<select class="form-control input-sm" name="suggested_risk_treatment">
											<?php foreach($treatment_list as $row) { ?>
											<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								
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
											<th><small>ID Kontrol yang ada saat ini</small></th>
											<th><small>Kontrol yang ada saat ini</small></th>
											<th><small>Evaluasi dari Kontrol yang ada saat ini</small></th>
											<th><small>Pemilik Kontrol</small></th>
											<th width="30px">&nbsp;</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
										<h4>Usulan Action Plan</h4>
									</div>
									<div class="col-md-6 clearfix">
										<a href="#form-data" data-toggle="modal" class="btn default green pull-right btn-sm" id ="button-form-control-open-ap">
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
											<th><small>Batas Tanggal</small></th>
											<th><small>Pemilik Action Plan</small></th>
											<th width="30px">&nbsp;</th>
										</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							</div>
						</div>
						<div class="form-actions right">
							<input type="hidden" name="submit_mode" value="setOwnedRisk" />
							<button id="risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i>Simpan Sebagai Konsep</button>
							<button id="risk-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Ajukan</button>
							<button type="button" class="btn yellow" id="risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
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
		<h4 class="modal-title">Tambah Kontrol</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control" role="form" class="form-horizontal">
			<input type = "hidden" id = "tr_idnya">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">ID Kontrol Yang Ada Saat Ini</label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" readonly="true" name="existing_control_id" id = "existing_control_id" placeholder="">
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-control"><i class="fa fa-search fa-fw"/></i></button>
								</span>
								
							</div>
						</div>
					</div>
					<div class="form-group">
					<input type = "hidden" id = "form-control-revid">
						<label class="col-md-3 control-label smaller cl-compact">Kontrol Yang Ada Saat Ini <span class="required">* </span></label>
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
						<label class="col-md-3 control-label smaller cl-compact" >Evaluasi Dari Kontrol Yang Ada Saat Ini <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_evaluation_control" id = "risk_evaluation_control" placeholder="" value="NONE">
						</div>
					</div>
					<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Pemilik Kontrol <span class="required">* </span></label>
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
		<h4 class="modal-title">Add Suggested Treatment</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
					<input type = "hidden" id = "tr_idnya_ap">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Usulan Action Plan<span class="required">* </span></label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" name="action_plan" id = "action_plan" placeholder=""> 
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-libraryaction"><i class="fa fa-search fa-fw"/></i></button>
								</span> 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Due Date</label>
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
						<label class="col-md-3 control-label">Action Plan Owner</label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="division" id = "division">
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
<!-- LIBRARY ACTION-->
<div id="modal-libraryaction" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Usulan Action Plan Library</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-libraryaction-filter-submit">Search</button>
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
					<th width="30px">&nbsp;</th>
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
		<h4 class="modal-title">Existing Control</h4>
		<p style="color:red;">*Choose One</p>
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
			<table id="library_control_table_existing" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="30px">&nbsp;</th>
					<th>Existing Control</th>
					<th>Description</th>
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
					<th>Existing Control</th>
					<th>Evaluation on Existing Control</th>
					<th>Control Owner</th>
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
			>Simpan</button>
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
			>Simpan</button>
	</div>
</div>