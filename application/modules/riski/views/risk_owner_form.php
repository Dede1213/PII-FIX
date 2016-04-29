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
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						Form Risiko
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" class="form-horizontal">
						<div class="form-body">
							<div class="row">
							<div class="col-md-5">	
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
									<label class="col-md-3 control-label smaller cl-compact">Sebab </label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_cause" placeholder=""><?=$risk['risk_cause']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Dampak </label>
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

								<h4>Objektif</h4>
								<table class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><small>ID Objektif</small></th>
										<th><small>Objektif</small></th>
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
										<th><small>ID Kontrol Eksisting</small></th>
										<th><small>Evaluasi atas Eksisting Kontrol</small></th>
										<th><small>Kontrol Eksisting</small></th>
										
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
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pengklasifikasian seperti yang dideskripsikan pada “Kategori Dampak” (misalnya tidak signifikan, minor, sedang, major dan berbahaya) setelah mempertimbangkan efektivitas kontrol eksisting">Level Dampak</label>
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
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian seperti yang dideskripsikan dalam tabel “Kemungkinan Terjadinya Risiko” (misalnya sangat rendah, rendah, sedang, tinggi, dan sangat tinggi) setelah mepertimbangkan efektivitas kontrol eksisting">Kemungkinan Keterjadian</label>
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
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian yang dideskripsikan dalam matriks “Level Risiko” (misalkan tidak signifikan, minor, sedang, major dan berbahaya) bedasarkan nilai yang sudah ditentukan dalam ‘Kemungkinan Keterjadian’ dan ‘Level Dampak’">Level Risiko</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="" value="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko">Sebab</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview popovers"  rows="3" name="risk_cause" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content="isilah kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko"></textarea>
									
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang dapat IIGF alami dari peristiwa risiko">Dampak</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview popovers"  rows="3" name="risk_impact" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content="isilah kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang ditanggung IIGF dari peristiwa risiko"></textarea>
									
									</div>
								</div>
								
							</div>
							<div class="col-md-7">
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" title="isikan kolom ini dengan kategori penanganan yang dideskripsikan dalam “Panduan Penanganan Risiko” bedasarkan level risiko itu sendiri">Penanganan Risiko yang disepakati</label>
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
											<th><small>ID Kontrol Eksisting</small></th>
											<th><small>Evaluasi atas Eksisting Kontrol</small></th>
											<th><small>Kontrol Eksisting</small></th>
											
											<th><small>Pemilik Kontrol</small></th>
											<th width="66px">&nbsp;</th>
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
											<th><small>Batas Waktu</small></th>
											<th><small>Pemilik Action Plan</small></th>
											<th width="66px">&nbsp;</th>
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
							<button id="risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan sebagai draft</button>
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
				<h4 class="block">Informasi</h4>
				<p>
					 Tidak diperbolehkan untuk melihat risiko.
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

<!-- CONTROL -->
<div id="form-control" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Kontrol</h4>
	</div>
	<div class="modal-body">
			
			<input type = "hidden" id = "tr_idnya">
			<form id="input-form-control" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">ID Kontrol Eksisting</label>
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
						<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan tingkat efektivitas dari kontrol eksisting (mengacu pada kontrol kriteria penilaian)">Evaluasi atas Eksisting Kontrol </label>
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
						<label class="col-md-3 control-label smaller cl-compact" >Existing Control </label>
						<div class="col-md-9">
						<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder="">NONE</textarea>
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
						</div>
					</div>
					-->
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari action apapun (misalnya kebijakan, prosedur, atau aktivitas) yang diambil oleh personil yang bersangkutan (pemilik control), dirancang untuk memastikan bahwa risiko terdapat dalam minat risiko / toleransi" >Kontrol Eksisting </label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="risk_evaluation_control" id = "risk_evaluation_control" placeholder="" value="NONE">
						</div>
					</div>
					<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan orang yang ditugaskan yang mana bertanggungjawab untuk unit bisnis, yang memiliki kontrol yang berhubungan dengan peristiwa risiko">Pemilik Kontrol </label>
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
		<h4 class="modal-title">Tambah Usulan Penanganan Risiko</h4>
	</div>
	<div class="modal-body">
			<input type = "hidden" id = "tr_idnya2">
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
				<input type = "hidden" id = "form-data-revid">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari penanganan risiko action yang harus dilakukan dalam menangani risiko">Usulan Action Plan</label>
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
						<label class="col-md-3 control-label" title="isikan kolom ini dengan target tanggal penyelesaian dari rencana penanganan risiko">Batas Waktu</label>
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
						<label class="col-md-3 control-label" title="isikan kolom ini dengan orang yang ditugaskan yang mana bertanggungjawab atas aktivitas penanganan risiko yang ditetapkan dalam ‘Action Plan’">Pemilik Action Plan</label>
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
		<h4 class="modal-title">Library Usulan Action Plan</h4>
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
					<th>Deksripsi</th>
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
					<th>Evaluasi atas Eksisting Kontrol</th>
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