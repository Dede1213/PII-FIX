<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Form Action Plan
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Lihat Action Plan</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
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
					<input type="hidden" name="risk_id" value="<?=$risk['risk_id']?>" />
					<input type="hidden" id="form-action-id" name="action_id" value="<?=$action_plan['id']?>" />
						<div class="form-body">
							<div class="row">
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">ID Risiko</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_code']?>" name="risk_code" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pemilik risiko yang bertanggung jawab mengelola aktivitas yang berhubungan langsung dengan risiko">Pemilik Risiko</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_owner_v']?>" name="risk_owner_v" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$risk['risk_event']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari identifikasi risiko yang menjelaskan sifat risiko">Deskripsi Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_description" placeholder=""><?=$risk['risk_description']?></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pengklasifikasian seperti yang dideskripsikan pada “Kategori Dampak” (misalnya tidak signifikan, minor, sedang, major dan berbahaya) setelah mempertimbangkan efektivitas kontrol eksisting">Level Dampak</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['impact_level_v']?>" name="risk_impact_level_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian seperti yang dideskripsikan dalam tabel “Kemungkinan Terjadinya Risiko” (misalnya sangat rendah, rendah, sedang, tinggi, dan sangat tinggi) setelah mepertimbangkan efektivitas kontrol eksisting">Kemungkinan Keterjadian</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['likelihood_v']?>" name="risk_likelihood_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_level_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian yang dideskripsikan dalam matriks “Level Risiko” (misalkan tidak signifikan, minor, sedang, major dan berbahaya) bedasarkan nilai yang sudah ditentukan dalam ‘Kemungkinan Keterjadian’ dan ‘Level Dampak’">Level Risiko</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_level_v']?>" name="risk_level" placeholder="">
									</div>
								</div>
							</div>
							</div>
						
							<h4>Action Plan yang ditugaskan</h4>
							<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th>AP ID</th>
									<th>Action Plan yang ditugaskan</th>
									<th>Batas Waktu</th>
									<th>Pemilik Action Plan</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td><?=$action_plan['act_code']?></td>
										<td><?=$action_plan['action_plan']?></td>
										<td><?=$action_plan['due_date_v']?></td>
										<td><?=$action_plan['division_v']?></td>
									</tr>
								</tbody>
							</table>
							
							<hr/>
							
							<h4>Perubahan Action Plan</h4>
							<div class="row">
							<div class="col-md-8">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan_change['act_code']?>" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari penanganan risiko action yang harus dilakukan dalam menangani risiko">Action Plan yang ditugaskan</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" value="<?=$action_plan_change['action_plan']?>" name="action_plan" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" title="isikan kolom ini dengan target tanggal penyelesaian dari rencana penanganan risiko">Batas Waktu</label>
									<div class="col-md-9">
									<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
										<input type="text" class="form-control input-sm" name="due_date" readonly value="<?=$action_plan_change['due_date_v']?>">
										<span class="input-group-btn">
										<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
										</span>
									</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" title="isikan kolom ini dengan orang yang ditugaskan yang mana bertanggungjawab atas aktivitas penanganan risiko yang ditetapkan dalam ‘Action Plan’">Pemilik Action Plan </label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="division">
										<?php foreach($division_list as $row) { ?>
										<option value="<?=$row['ref_key']?>" <?=$row['ref_key'] == $action_plan_change['division'] ? 'SELECTED' : '' ?>><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
									</div>
								</div>
								
							</div>
							
							</div>
						</div>
						<div class="form-actions right">
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