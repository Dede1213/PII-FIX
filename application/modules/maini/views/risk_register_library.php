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
				<li>
					<a target="_self" href="javascript:;">Transaksi</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Pelaksanaan Berkala</a>
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
								<label class="col-md-3 control-label smaller cl-compact" >Diajukan Oleh</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" id="primary-risk_submitted_by" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" name="risk_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact" >Kode Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" name="risk_library_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact">ID risiko dari Library</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_library_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pemilik risiko yang bertanggung jawab mengelola aktivitas yang berhubungan langsung dengan risiko">Pemilik Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="division_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko
								</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_event" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" title="isikan kolom ini dengan deskripsi dari identifikasi risiko yang menjelaskan sifat risiko">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-sm input-readview" readonly="true" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>

							<h4>Objektif</h4>
							<div class="table-scrollable">
								<table id="primary_objective_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">ID Objektif</span></th>
										<th><span class="small">Objektif</span></th>
										
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kategori risiko yang berhubungan dengan identifikasi risk seperti yang dijelaskan pada ‘Deskripsi Risiko’">Kategori Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_category_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Sub Kategori Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_sub_category_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" >Sub Kategori Risiko Level 2</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_2nd_sub_category_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko">Sebab</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_cause" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang dapat IIGF alami dari peristiwa risiko">Dampak</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_impact" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pengklasifikasian seperti yang dideskripsikan pada “Kategori Dampak” (misalnya tidak signifikan, minor, sedang, major dan berbahaya) setelah mempertimbangkan efektivitas kontrol eksisting">Impact Level</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="impact_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian seperti yang dideskripsikan dalam tabel “Kemungkinan Terjadinya Risiko” (misalnya sangat rendah, rendah, sedang, tinggi, dan sangat tinggi) setelah mepertimbangkan efektivitas kontrol eksisting">Kemungkinan Keterjadian</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="likelihood_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian yang dideskripsikan dalam matriks “Level Risiko” (misalkan tidak signifikan, minor, sedang, major dan berbahaya) bedasarkan nilai yang sudah ditentukan dalam ‘Kemungkinan Keterjadian’ dan ‘Level Dampak’" >Risiko Level</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kategori penanganan yang dideskripsikan dalam “Panduan Penanganan Risiko” bedasarkan level risiko itu sendiri">Usulan Penanganan Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="treatment_v" placeholder="">
								</div>
							</div>
							
							<hr/>
							<h4>Kontrol</h4>
							<div class="table-scrollable">
								<table id="primary_control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">ID Kontrol Eksisting</span></th>
										
										<th><span class="small">Evaluasi dari Eksisting Kontrol</span></th>
										<th><span class="small">Kontrol Eksisting</span></th>
										<th><span class="small">Pemilik Kontrol</span></th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<hr/>
							<h4>Action Plan</h4>
							<div class="table-scrollable">
								<table id="primary_action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">Usulan Action Plan</span></th>
										<th><span class="small">Batas Waktu</span></th>
										<th><span class="small">Pemilik Action Plan</span></th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-actions right">
							<input type="hidden" name="submit_mode" value="verifyRisk" />
							<button id="primary-risk-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verifikasi</button>
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
						<input type="hidden" name="add_user_flag" value="" />
						<input type="hidden" name="add_user_username" value="" />
						<input type="hidden" name="add_user_date_changed" value="" />
						
						<div class="form-body">
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
								<label class="col-md-3 control-label smaller cl-compact">ID Risiko dari Library</label>
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
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pemilik risiko yang bertanggung jawab mengelola aktivitas yang berhubungan langsung dengan risiko">Pemilik Risiko</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="risk_division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" tit>Peristiwa Risiko 
								</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" name="risk_event" data-required="1" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" title="isikan kolom ini dengan deskripsi dari identifikasi risiko yang menjelaskan sifat risiko">Deskripsi Peristiwa Risiko </label>
								<div class="col-md-9">
								<textarea class="form-control popovers" rows="3" name="risk_description" placeholder="" data-container="body" data-placement="bottom" placeholder="" data-content=""></textarea>
								</div>
							</div>

						
								<div class="panel-heading">
									<h3 class="panel-title">Objektif</h3>
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

							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kategori risiko yang berhubungan dengan identifikasi risk seperti yang dijelaskan pada ‘Deskripsi Risiko’" >Kategori Risiko</label>
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
								<label class="col-md-3 control-label small cl-compact" >Sub Kategori Risiko Level 2</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="risk_2nd_sub_category" id="sel_risk_2nd_sub_category">
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko">Sebab </label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm popovers" name="risk_cause" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang dapat IIGF alami dari peristiwa risiko">Dampak </label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm popovers" name="risk_impact" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pengklasifikasian seperti yang dideskripsikan pada “Kategori Dampak” (misalnya tidak signifikan, minor, sedang, major dan berbahaya) setelah mempertimbangkan efektivitas kontrol eksisting">Dampak Level </label>
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
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian seperti yang dideskripsikan dalam tabel “Kemungkinan Terjadinya Risiko” (misalnya sangat rendah, rendah, sedang, tinggi, dan sangat tinggi) setelah mepertimbangkan efektivitas kontrol eksisting">Kemungkinan Keterjadian</label>
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
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian yang dideskripsikan dalam matriks “Level Risiko” (misalkan tidak signifikan, minor, sedang, major dan berbahaya) bedasarkan nilai yang sudah ditentukan dalam ‘Kemungkinan Keterjadian’ dan ‘Level Dampak’">Level Risiko </label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kategori penanganan yang dideskripsikan dalam “Panduan Penanganan Risiko” bedasarkan level risiko itu sendiri">Usulan Penanganan Risiko</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="suggested_risk_treatment">
									<?php foreach($treatment_list as $row) { ?>
									<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							
							
							<hr/>
							<div class="clearfix">
								<a href="#form-control-2" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
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
										<th><span class="small">Evaluasi dari Eksisting Kontrol</span></th>
										<th><span class="small">Kontrol Eksisting</span></th>
										<th><span class="small">Pemilik Kontrol</span></th>
										<th width="30px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<hr/>
							<div class="clearfix">
								<a href="#form-data" id="button-form-data-open" data-toggle="modal" class="btn default green pull-right btn-sm">
								<i class="fa fa-plus"></i>
								<span class="hidden-480">
								Tambah Usulan Action Plan </span>
								</a>
								<h4>Action Plan</h4>
							</div>
							
							<div class="table-scrollable">
								<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">Usulan Action Plan</span></th>
										<th><span class="small">Batas Waktu</span></th>
										<th><span class="small">Pemilik Action Plan</span></th>
										<th width="30px">&nbsp;</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-actions right">
							<button id="risk-set-as-primary" type="button" class="btn blue"><i class="fa fa-arrows-h"></i> Set as Primary</button>
							<!-- <button id="risk-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verify</button> -->
							<button id="risk-button-draft" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button type="button" class="btn yellow" id="verify-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
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
					 Tidak bisa menginput Risk Register Adhoc karena periode telah di setting oleh RAC.
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
						<label class="col-md-3 control-label smaller cl-compact" >Objektif </label>
						<div class="col-md-9">
						<textarea class="form-control input-sm " rows="3"  name="objective" id = "objective" placeholder="NONE"></textarea>
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
<!-- CONTROL Option  -->
<div id="form-control-2" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Kontrol</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control2" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
								<label class="col-md-3 control-label">Tambah Kontrol</label>
								<div class="col-md-6">
									<select class="form-control" name="control_id" id="control_id">
										
										<option value="-">Pilih Satu</option>
										<option value="1">Available</option>
										<option value="2">Not Available</option>
										
									</select>
								</div>
							</div>
				</div>
			</form>
	</div>
</div>

<!-- CONTROL Available -->
<div id="form-control" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Kontrol</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
					<input type = "hidden" id = "form-control-revid">
						<label class="col-md-3 control-label smaller cl-compact">Eksisting ID Kontrol</label>
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
						<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the effectiveness level of existing control (refers to control assessment criteria)">Evaluasi Atas Eksisting Kontrol <span class="required">* </span></label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_existing_control" id = "risk_existing_control" placeholder="" value="">
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-control-existing"><i class="fa fa-search fa-fw"/></i></button>
								</span>
								
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" >Existing Control <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" value="" name="risk_evaluation_control" id = "risk_evaluation_control" placeholder="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the assigned person who is responsible for the business unit, which owns the controls associated with the risk event">Pemilik Kontrol <span class="required">* </span></label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="risk_control_owner" id = "risk_control_owner">
										<option value="">Pilih Satu</option>
										<?php foreach($division_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
						</select>
					<!-- <input type="text" class="form-control input-sm" name="risk_control_owner" placeholder=""> -->
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

<!-- CONTROL Not Available -->
<div id="form-control-3" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Add Control</h4>
	</div>
	<div class="modal-body">
			<form id="input-form-control-3" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
								<div class="form-group">
								<label class="col-md-3 control-label">Add Control</label>
								<div class="col-md-6">
									<select class="form-control" name="control_id" id="control_id">
										
										<option value="-">Not Available</option>
										
									</select>
								</div>
							</div>
								<input type="hidden" class="form-control input-sm" readonly="true" name="existing_control_id" id = "existing_control_id" placeholder="">
								<input type = "hidden" id = "form-control-revid-3">
								<input type="hidden" class="form-control input-sm" readonly="true" name="risk_existing_control" id = "risk_existing_control" placeholder="" value="Not Available">
								<input type="hidden" class="form-control input-sm" value="Not Available" name="risk_evaluation_control" id = "risk_evaluation_control" placeholder="">
								<select style="display:none;" name="risk_control_owner" id = "risk_control_owner">
								<option value="Not Available">NONE</option>
								</select>
					</div>
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button id="input-control-add-3" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Add</button>
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
					<input type = "hidden" id = "form-data-revid">
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
						<label class="col-md-3 control-label" title="isikan kolom ini dengan orang yang ditugaskan yang mana bertanggungjawab atas aktivitas penanganan risiko yang ditetapkan dalam ‘Action Plan’">Pemilik Action Plan </label>
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
			>Tambah</button>
	</div>
</div>

<!-- LIBRARY -->
<div id="modal-library" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Risiko dari Library</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-library-filter-submit">Cari</button>
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
					<th>ID Risiko</th>
					<th>Peristiwa Risiko</th>
					<th>Deskripsi Peristiwa Risiko</th>
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
		<p style="color:red;">*Pilih salah satu</p>
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
					<th width="30px">&nbsp;</th>
					<th>Evaluasi atas Eksisting Kontrol </th>
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
		<h4 class="modal-title">Kontrol Ekisting</h4>
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
					<th width="30px">&nbsp;</th>
					<th>Kontrol Eksisting</th>
					<th>Evaluasi dari Eksisting Kontrol</th>
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
		<h4 class="modal-title">Evaluasi dari Dampak Risiko</h4>
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
		<h4 class="modal-title">Evaluasi dari Kemungkinan Keterjadian</h4>
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

<!-- ADD USER -->
<div id="modal-add-user" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Apakah anda ingin menambahkan informasi berikut di risk properties ?</h4>
	</div>
	<div class="modal-body">
		<form id="input-adduser" role="form" class="form-horizontal">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label">Diajukan oleh</label>
					<div class="col-md-9">
					<input type = "text" name = "username" value = "<?=$library_risk['risk_input_by_v']?>" id = "username" class = "form-control" >
					<!--<select class="form-control input-sm" name="username">
						<option value="<?=$library_risk['risk_input_by']?>"><?=$library_risk['risk_input_by_v']?></option>
					</select>-->
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Tanggal Perubahan</label>
					<div class="col-md-9">
					<input type="text" class="form-control input-sm" readonly="true" name="date_changed" placeholder="" value="<?=date('d-m-Y')?>">
					</div>
				</div>
				
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button id="input-form-adduser-yes" type="button" 
			class="btn blue ladda-button button-form-adduser"
			 data-style="expand-right"
			>Ya</button>
		<button id="input-form-adduser-no" type="button" 
			class="btn blue ladda-button button-form-adduser"
			 data-style="expand-right"
			>Tidak</button>
	</div>
</div>
<?php if(isset($modifyRisk)) { ?>
<script type="text/javascript">
	var g_risk_id = <?=$risk_id?>; 
	var risk_input_by = <?php echo "'".$risk_input_by."'"?> ;
</script>
<?php } ?>

<?php } ?>