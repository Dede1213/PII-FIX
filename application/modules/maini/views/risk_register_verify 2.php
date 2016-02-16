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
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php if (isset($submit_mode) && $submit_mode == 'adhoc') { ?>
				<?php } else { ?>
				<li>
					<a target="_self" href="javascript:;">Transaksi</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Risk Register Bekala</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php } ?>
				<li>
					<a target="_self" href="<?=$site_url?>/risk/RiskRegister/RiskRegisterInput">Form Risiko</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_risk_id = <?=$risk_id?>;
			var g_username = null;
		</script>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						Form Risiko
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="input-form" role="form" class="form-horizontal">
					<input type="hidden" name="risk_id" value="<?=$risk_id?>">
						<div class="form-body">
							<div class="row">
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Diajukan oleh</label>
									<div class="col-md-9">
										<input type="text" id="risk_submitted_by" class="form-control input-sm" readonly="true" placeholder="">											
									</div>
								</div>
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Divisi</label>
									<div class="col-md-9">
										<input type="text" id="risk_submitted_division" class="form-control input-sm" readonly="true" placeholder="">
									</div>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">ID Risiko</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="text" class="form-control input-sm" readonly="true" name="risk_library_id" placeholder="">
											<span class="input-group-btn">
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-library"><i class="fa fa-search fa-fw"/></i></button>
											</span>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_event" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko</label>
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
									<label class="col-md-3 control-label smaller cl-compact" >Sub Kategori Risiko Level 2</label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_2nd_sub_category" id="sel_risk_2nd_sub_category">
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Sebab</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_cause" placeholder="">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Dampak</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_impact" placeholder="">
									</div>
								</div>
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
									<label class="col-md-3 control-label smaller cl-compact" >Kontrol Eksisting</label>
									<div class="col-md-9">
									<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder=""></textarea>
									<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Hapus Kontrol Eksisting</button>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Evaluasi atas Eksisting Kontrol</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_evaluation_control" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Pemilik Kontrol</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_control_owner" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_level_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" >Level Risiko</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Level Dampak</label>
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
									<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian</label>
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
							</div>
							</div>
							<div class="clearfix">
							</div>
							<hr/>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label class="col-md-3 control-label smaller cl-compact" >Usulan Penanganan Risiko</label>
										<div class="col-md-6">
										<select class="form-control input-sm" name="suggested_risk_treatment">
											<?php foreach($treatment_list as $row) { ?>
											<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
											<?php } ?>
										</select>
										</div>
									</div>
								</div>
								<div class="col-md-4 clearfix">
									<a href="#form-data" data-toggle="modal" class="btn default green pull-right btn-sm">
									<i class="fa fa-plus"></i>
									<span class="hidden-480">
									Tambah Usulan Action Plan</span>
									</a>
								</div>
							</div>
							<div class="row">	
								<div class="col-md-12">	
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
							<button id="risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
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
				<h4 class="block">Informasi</h4>
				<p>
					 Tidak bisa menginput Risk Register Berkala Adhoc karena periode telah di setting oleh RAC.
				 	 Silahkan hubungi RAC untuk penjelasan lebih lanjut.
					 <p>
						<a class="btn red" target="_self" href="<?=$site_url?>/main">
						Kembali ke Beranda </a>
					</p>
				</p>
				<?php } else { ?>
				<h4 class="block">Informasi</h4>
				<p>
					 Tidak bisa menginput Risk Register Berkala karena periode belum di setting oleh RAC.
				 	 Silahkan hubungi RAC untuk penjelasan lebih lanjut.
				</p>
				<p>
					<a class="btn red" target="_self" href="<?=$site_url?>/risk/RiskRegister">
					Kembali ke Risk Register Berkala </a>
				</p>
				<?php } ?>
			</div>
		</div>
		</div>
		<?php } ?>
	</div>
</div>

<?php if ($valid_mode) { ?>
<!-- ACTION PLAN -->
<div id="form-data" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Usulan Penanganan Risiko</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">Usulan Penanganan Risiko</label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="action_plan" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Batas Waktu</label>
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
						<label class="col-md-3 control-label">Pemilik Action Plan</label>
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

<!-- LIBRARY -->
<div id="modal-library" class="modal fade" tabindex="-1" data-width="760" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Library Risiko</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Go!</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th width="30px">&nbsp;</th>
				<th>ID Risiko</th>
				<th>Peristiwa Risiko</th>
				<th>Deskripsi</th>
				
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-xs"><i class="fa fa-check-circle font-blue"></i></button>
				</div>
				</td>
				<td>A.1.1-01</td>
				<td>Peristiwa Risiko</td>
				<td>Deksripsi</td>
			</tr>
			</tbody>
		</table>
	</div>
</div>

<!-- CONTROL -->
<div id="modal-control" class="modal fade" tabindex="-1" data-width="760" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Kontrol Eksisting</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Go!</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th width="30px">&nbsp;</th>
				<th>ID Kontrol</th>
				<th>Kontrol Eksisting</th>
			</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<!--
<tr>
	<td>
	<div class="btn-group">
		<button type="button" class="btn btn-default btn-xs"><i class="fa fa-check-circle font-blue"></i></button>
	</div>
	</td>
	<td>CID-01</td>
	<td>Existing ControlDescription</td>
</tr>
-->

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
			<?php  $cnt = 0;
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
			<?php  $cnt = 0;
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