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
			var risk_input_by = '<?php echo $user; ?>';
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
and t_risk.risk_owner = t_risk_change.risk_owner
and t_risk.risk_division = t_risk_change.risk_division

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
								<label class="col-md-1 control-label smaller cl-compact">ID Risiko</label>
								<div class="col-md-5">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_code" placeholder="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-1 control-label smaller cl-compact">Peristiwa Risiko</label>
								<div class="col-md-6">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari identifikasi risiko yang menjelaskan sifat risiko">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-7">
								<textarea class="form-control input-readview" rows="3" readonly="true" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko">Sebab</label>
								<div class="col-md-7">
								<textarea class="form-control input-readview popovers" rows="3" name="risk_cause" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang dapat IIGF alami dari peristiwa risiko">Dampak</label>
								<div class="col-md-7">
								<textarea class="form-control input-readview popovers" rows="3" name="risk_impact" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan pengklasifikasian seperti yang dideskripsikan pada “Kategori Dampak” (misalnya tidak signifikan, minor, sedang, major dan berbahaya) setelah mempertimbangkan efektivitas kontrol eksisting" >Level Dampak </label>
								<div class="col-md-5">
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
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian seperti yang dideskripsikan dalam tabel “Kemungkinan Terjadinya Risiko” (misalnya sangat rendah, rendah, sedang, tinggi, dan sangat tinggi) setelah mepertimbangkan efektivitas kontrol eksisting">Kemungkinan Keterjadian </label>
								<div class="col-md-5">
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
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian yang dideskripsikan dalam matriks “Level Risiko” (misalkan tidak signifikan, minor, sedang, major dan berbahaya) bedasarkan nilai yang sudah ditentukan dalam ‘Kemungkinan Keterjadian’ dan ‘Level Dampak’">Level Risiko </label>
								<div class="col-md-5">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-1 control-label smaller cl-compact" title="isikan kolom ini dengan pemilik risiko yang bertanggung jawab mengelola aktivitas yang berhubungan langsung dengan risiko">Pemilik Risiko</label>
								<div class="col-md-5">
								<select class="form-control input-sm" name="risk_division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-1 control-label small cl-compact" title="isikan kolom ini dengan kategori penanganan yang dideskripsikan dalam “Panduan Penanganan Risiko” bedasarkan level risiko itu sendiri">Penanganan Risiko</label>
								<div class="col-md-5">
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
									<a href="#form-control-2" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
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
							
							<hr/>
							<div class="row">
								<div class="col-md-6">
									<h4>Usulan Action Plan</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-data" id="button-form-data-open" data-toggle="modal" class="btn default green pull-right btn-sm">
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
						<div class="form-actions right">
							<button id="primary-risk-button-submit2" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verifikasi</button>
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
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari identifikasi risiko yang menjelaskan sifat risiko">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_description" placeholder=""><?=$risk['risk_description']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko">Sebab</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_cause2" placeholder=""><?=$risk['risk_cause']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang dapat IIGF alami dari peristiwa risiko">Dampak</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_impact2" placeholder=""><?=$risk['risk_impact']?></textarea>
								</div>
							</div>
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
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pemilik risiko yang bertanggung jawab mengelola aktivitas yang berhubungan langsung dengan risiko">Pemilik Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_owner_v']?>" name="risk_owner_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label small cl-compact" title="isikan kolom ini dengan kategori penanganan yang dideskripsikan dalam “Panduan Penanganan Risiko” bedasarkan level risiko itu sendiri" >Penanganan Risiko</label>
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
							<button id="primary-risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verifikasi</button>
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
						Perubahan
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
								<textarea class="form-control input-readview"  rows="3" name="risk_event" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari identifikasi risiko yang menjelaskan sifat risiko">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kumpulan faktor yang dapat mempengaruhi atau mengakibatkan terjadinya peristiwa risiko">Sebab</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview popovers" rows="3" name="risk_cause" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan deskripsi dari kemungkinan kehilangan atau kerugian biaya langsung atau tidak langsung yang dapat IIGF alami dari peristiwa risiko">Dampak</label>
								<div class="col-md-9">
								<textarea class="form-control input-readview popovers" rows="3" name="risk_impact" placeholder="" data-container="body" data-trigger="focus" data-placement="bottom" data-content=""></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan pengklasifikasian seperti yang dideskripsikan pada “Kategori Dampak” (misalnya tidak signifikan, minor, sedang, major dan berbahaya) setelah mempertimbangkan efektivitas kontrol eksisting">Level Dampak</label>
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
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian seperti yang dideskripsikan dalam tabel “Kemungkinan Terjadinya Risiko” (misalnya sangat rendah, rendah, sedang, tinggi, dan sangat tinggi) setelah mepertimbangkan efektivitas kontrol eksisting">Kemungkinan Keterjadian </label>
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
								<label class="col-md-3 control-label smaller cl-compact" title="isikan kolom ini dengan kriteria pengklasifikasian yang dideskripsikan dalam matriks “Level Risiko” (misalkan tidak signifikan, minor, sedang, major dan berbahaya) bedasarkan nilai yang sudah ditentukan dalam ‘Kemungkinan Keterjadian’ dan ‘Level Dampak’">Risiko Level</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
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
								<label class="col-md-3 control-label small cl-compact" title="isikan kolom ini dengan kategori penanganan yang dideskripsikan dalam “Panduan Penanganan Risiko” bedasarkan level risiko itu sendiri">Penanganan Risiko</label>
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
									<a href="#form-control-2" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
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
							
							<hr/>
							<div class="row">
								<div class="col-md-6">
									<h4>Usulan Action Plan</h4>
								</div>
								<div class="col-md-6 clearfix">
									<a href="#form-data" id="button-form-data-open"  data-toggle="modal" class="btn default green pull-right btn-sm">
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
						<div class="form-actions right">
							<button id="changes-risk-set-as-primary" type="button" class="btn blue"><i class="fa fa-arrows-h"></i> Set as Primary</button>
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
						<label class="col-md-3 control-label" title="isikan kolom ini dengan target tanggal penyelesaian dari rencana penanganan risiko">Batas Waktu </label>
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
						<label class="col-md-3 control-label" title="isikan kolom ini dengan orang yang ditugaskan yang mana bertanggungjawab atas aktivitas penanganan risiko yang ditetapkan dalam ‘Action Plan’">Pemilik Action Plan  </label>
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