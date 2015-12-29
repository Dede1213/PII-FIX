<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Lihat Permintaan Perubahan
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Lihat Permintaan Perubahan</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<h4>Changes In : <?=$change_type?> -  <?=$change_code?></h4>
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
								<label class="col-md-3 control-label smaller cl-compact" >Kode Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_code" placeholder="">
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
								<label class="col-md-3 control-label small cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-sm input-readview" readonly="true" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<?php if ($change_type == 'Risk Form') { ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Penyebab</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_cause" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Dampak</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_impact" placeholder="">
								</div>
							</div>
							<?php } ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Dampak Level</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="impact_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadiaan</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="likelihood_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Usulan Penanganan Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="treatment_v" placeholder="">
								</div>
							</div>
							<hr/>
							<?php if ($change_type == 'Risk Form') { ?>
							<h4>Control</h4>
							<div class="table-scrollable">
								<table id="primary_control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">ID Kontrol Eksisting</span></th>
										<th><span class="small">Eksisting Kontrol</span></th>
										<th><span class="small">Evaluasi Atas Kontrol Eksisting</span></th>
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
						<div class="form-body">
							<div class="form-group">
								<input type="hidden" name="risk_id" value=""/>
								<label class="col-md-3 control-label smaller cl-compact" >Kode Risiko</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_code" placeholder="">
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
								<label class="col-md-3 control-label small cl-compact">Deskripsi Peristiwa Risiko</label>
								<div class="col-md-9">
								<textarea class="form-control input-sm input-readview" readonly="true" rows="3" name="risk_description" placeholder=""></textarea>
								</div>
							</div>
							<?php if ($change_type == 'Risk Form') { ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Penyebab</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_cause" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Dampak</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_impact" placeholder="">
								</div>
							</div>
							<?php } ?>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Dampak</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="impact_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadiaan</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="likelihood_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Level Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_level_v" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact" >Usulan Penanganan Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" name="treatment_v" placeholder="">
								</div>
							</div>
							<hr/>
							<?php if ($change_type == 'Risk Form') { ?>
							<h4>Control</h4>
							<div class="table-scrollable">
								<table id="control_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">ID Kontrol Eksisting</span></th>
										<th><span class="small">Kontrol Eksisting</span></th>
										<th><span class="small">Evaluasi Atas Eksisting Kontrol</span></th>
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
								<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
									<thead>
									<tr role="row" class="heading">
										<th><span class="small">Usulan Action Plan</span></th>
										<th><span class="small">Batas Waktu</span></th>
										<th><span class="small">Pemilik Action Plan </span></th>
										<th><span class="small">&nbsp;</span></th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="form-actions right">
							<button type="button" class="btn yellow" id="verify-risk-button-cancel"><i class="fa fa-times"></i> Kembali</button>
						</div>

					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var g_change_id = <?=$change_id?>;
var g_status = <?=$change_status?>;
var g_change_type = '<?=$change_type?>';
</script>