<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Form Risiko
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/maini">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Transaksi</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Regular Exercise</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Risk Register Berkala</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Form Risiko</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption" id="div-portlet-page-caption">
						Informasi Risiko
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="input-form" role="form" class="form-horizontal">
						<div class="form-body">
							<div class="row">
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Diajukan Oleh</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" id="risk_submitted_by" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" >Kode Risiko</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_code" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_library_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact">ID risiko dari Library</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="text" class="form-control input-sm" readonly="true" name="risk_library_code" placeholder="">
											<span class="input-group-btn">
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-library"><i class="fa fa-search fa-fw"/></i></button>
											</span>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact">Deskripsi Peristiwa Risiko<span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control" rows="3" name="risk_description" placeholder=""></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Kategori Risiko</label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_category" id="sel_risk_category">
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Sub Kategori Risiko</label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_sub_category" id="sel_risk_sub_category">
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" >Sub Kategori Level 2 Risiko</label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_2nd_sub_category" id="sel_risk_2nd_sub_category">
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Pemilik Risiko</label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_division">
										<?php foreach($division_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
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
								<!--
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Existing Control ID</label>
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
									<label class="col-md-3 control-label smaller cl-compact" >Existing Control</label>
									<div class="col-md-9">
									<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder=""></textarea>
									<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Evaluation on Existing Control</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_evaluation_control" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Control Owner</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_control_owner" placeholder="">
									</div>
								</div>
								-->
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Dampak Level <span class="required">* </span></label>
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
									<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan <span class="required">* </span></label>
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
									<label class="col-md-3 control-label smaller cl-compact" >Risiko Level <span class="required">* </span></label>
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
							</div>
							</div>
							<div class="clearfix">
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Objective</h3>
								</div>
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-control-objective" id="button-form-control-open-objective" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Tambah Objektif </span>
									 	</a>
									 </div>
									 
									 <div class="table-scrollable">
									 	<table id="objective_table" class="table table-condensed table-bordered table-hover">
									 		<thead>
									 		<tr role="row" class="heading">
									 			<th width="20%">ID Objektif</th>
									 			<th>Objektif</th>
									 			<th width="30px">&nbsp;</th>
									 		</tr>
									 		</thead>
									 		<tbody>
									 		</tbody>
									 	</table>
									 </div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Kontrol</h3>
								</div>
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-control" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Tambah Kontrol </span>
									 	</a>
									 </div>
									 
									 <div class="table-scrollable">
									 	<table id="control_table" class="table table-condensed table-bordered table-hover">
									 		<thead>
									 		<tr role="row" class="heading">
									 			<th>ID Kontrol Yang Ada Saat Ini</th>
									 			<th>Kontrol Yang Ada Saat Ini</th>
									 			<th>Evaluasi dari Kontrol Yang Ada Saat Ini</th>
									 			<th>Pemilik Kontrol</th>
									 			<th width="30px">&nbsp;</th>
									 		</tr>
									 		</thead>
									 		<tbody>
									 		</tbody>
									 	</table>
									 </div>
								</div>
							</div>


							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Action Plan</h3>
								</div>
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-data" id="button-form-data-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Tambah Usulan Action Plan </span>
									 	</a>
									 </div>
									 
									<div class="table-scrollable">
										<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
											<thead>
											<tr role="row" class="heading">
												<th>Usulan Action Plan</th>
												<th>Batas Waktu</th>
												<th>Pemilik Action Plan</th>
												<th width="30px">&nbsp;</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
										<!--
										<tr>
											<td>Action</td>
											<td>Date</td>
											<td>PIC</td>
											<td>
											<div class="btn-group">
												<button type="button" class="btn btn-default btn-xs"><i class="fa fa-minus-circle font-red"></i></button>
											</div>
											</td>
										</tr>
										-->
									</div>
								</div>
							</div>

						</div>
						<div class="form-actions right">
							<input type="hidden" name="submit_mode" value="verifyRisk" />
							<button id="risk-button-draft" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button id="risk-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verifikasi</button>
							<button id="risk-button-delete" type="button" class="btn red"><i class="fa  fa-trash-o"></i> Hapus</button>
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
				<?php if (isset($submit_mode) && $submit_mode == 'adhoc') { ?>
				<h4 class="block">Error</h4>
				<p>
					 Cannot Input Adhoc Risk Register Exercise because Risk Period is already set, please contact RAC team for further information
					 <p>
						<a class="btn red" target="_self" href="<?=$site_url?>/main">
						Back to Home </a>
					</p>
				</p>
				<?php } else { ?>
				<h4 class="block">Error</h4>
				<p>
					 Cannot Input Risk Register Exercise because Risk Period is not set, please contact RAC team for further information
				</p>
				<p>
					<a class="btn red" target="_self" href="<?=$site_url?>/risk/RiskRegister">
					Back to Risk Register List </a>
				</p>
				<?php } ?>
			</div>
		</div>
		</div>
		<?php } ?>
	</div>
</div>

<?php if ($valid_mode) { ?>
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
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
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
			<input type = "hidden" id = "tr_idnya" >
			<form id="input-form-control" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">ID Kontrol Yang ada saat ini</label>
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
						<label class="col-md-3 control-label smaller cl-compact">Kontrol Yang ada saat ini <span class="required">* </span></label>
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
						<label class="col-md-3 control-label smaller cl-compact" >Evaluasi dari Kontrol Yang ada saat ini<span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_evaluation_control" placeholder="" value="NONE">
						</div>
					</div>
		
					<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Pemilik Kontrol<span class="required">* </span></label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_control_owner">
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
		
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
					
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Usulan Action Plan<span class="required">* </span></label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" name="action_plan" placeholder=""> 
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-libraryaction"><i class="fa fa-search fa-fw"/></i></button>
								</span> 
							</div>
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
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
		<button id="input-actionplan-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
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

<!-- LIBRARY -->
<div id="modal-library" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Risk Library</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-library-filter-submit">Search</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="30px">&nbsp;</th>
					<th>Risk ID</th>
					<th>Risk Event</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
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
					<button class="btn btn-default" type="button" id="modal-control-filter-submit-objective">Search</button>
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
					<th width="30px">&nbsp;</th>
					<th>Objektif</th>
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
		<h4 class="modal-title">Kontrol Yang Ada Saat Ini</h4>
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
					<th>Kontrol Yang Ada Saat Ini</th>
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
		<h4 class="modal-title">Kontrol Yang Ada Saat Ini</h4>
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
					<th>Kontrol Yang Ada Saat Ini</th>
					<th>Evaluasi dari Kontrol Yang Ada Saat Ini</th>
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
			>Save</button>
	</div>
</div>
<?php if(isset($modifyRisk)) { ?>
<script type="text/javascript">
	var g_risk_id = <?=$risk_id?>;
	var g_username = null;
</script>
<?php } ?>

<?php } ?>