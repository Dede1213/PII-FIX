<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Form Permintaan Perubahan
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Change Request Form</a>
				</li>
			</ul>
		</div>

				<?php
					$this->load->database();
					$kri_code =$kri['kri_code'];
					$sql = "select t_cr_risk.cr_status from t_cr_risk join t_kri on t_cr_risk.risk_cause = t_kri.id where t_kri.kri_code = '$kri_code' and t_cr_risk.cr_status= 0 ";
					//$sql = "select id from t_kri where kri_code = '$kri_code' ";
					$rs = $this->db->query($sql);
					if ($rs->num_rows() > 0) {
								
							?>
								<div class="row">
								<div class="col-md-12">
								<div class="note note-warning">
								<h4 class="block">Warning</h4>
								<p>
								 Cannot Input Change Request for this KRI, This KRI already have a Pending Change Request 
								</p>
								<p>
								<a class="btn red" target="_self" href="<?=$base_url?>index.php/main/mainpic">
								Back to Home </a>
								</p>
								</div>
								</div>
								</div>
					<?php
						}else{
					?>



		<!-- END PAGE HEADER-->
		<div class="row">
		<div class="col-md-12">
			<form id="input-form" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-2 control-label">ID Risiko</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_library_code" placeholder="" value="<?=$risk['risk_code']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Peristiwa Risiko</label>
						<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_event" placeholder="" value="<?=$risk['risk_event']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Level Risiko</label>
						<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_level" placeholder="" value="<?=$risk['risk_level_v']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Penanganan Risiko</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_treatment" placeholder="" value="<?=$risk['treatment_v']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Action Plan</label>
						<div class="col-md-8">
							<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th>Action Plan</th>
									<th>Due Date</th>
									<th>Action Plan Owner</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($risk['action_plan_list'] as $key => $value) { ?>
									<tr>
										<td><?=$value['action_plan']?></td>
										<td><?=$value['due_date_v']?></td>
										<td><?=$value['division_v']?></td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
			<hr/>
			<div class="form">
			<form id="kri-form" role="form" class="form-horizontal">
			<input type="hidden" name="kri_id" value="<?=$kri['id']?>"/>
			<input type="hidden" name="risk_id" id="kri-risk-id" value="<?=$risk['risk_id']?>"/>
			<div class="form-body">
				<div class="form-group">
					<input type="hidden" name="kri_library_id" value=""/>
					<label class="col-md-2 control-label">KRI ID</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="kri_library_code" placeholder="" value="<?=$kri['kri_code']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Indikator Risiko</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="key_risk_indicator" placeholder="" value="<?=$kri['key_risk_indicator']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kemungkinan Keterjadian</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="treshold" placeholder="" value="<?=$kri['treshold']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Waktu Pelaporan</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="timing_pelaporan" placeholder="" value="<?=$kri['timing_pelaporan_v']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Pemilik KRI</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="kri_owner" placeholder="" value="<?=$kri['kri_owner_v']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Laporan</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="report" placeholder="" value="<?=$kri['owner_report']?>">
					</div>
				</div>
				<?php if ( (isset($verify) && $verify) || (isset($input) && $input) ) { ?>
				<hr/>
				<?php if (isset($verify) && $verify) { ?>
				<div class="form-group">
					<label class="col-md-2 control-label" >Kemungkinan Keterjadian</label>
					<div class="col-md-8">
						<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
							<thead>
							<tr role="row" class="heading">
								<th>Operator</th>
								<th>Value 1</th>
								<th>Value 2</th>
								<th>Type Value</th>
								<th>Result</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($kri['treshold_list'] as $key => $value) { ?>
								<tr>
									<td><?=$value['operator']?></td>
									<td><?=$value['value_1']?></td>
									<td><?=$value['value_2']?></td>
									<td><?=$value['value_type']?></td>
									<td><?=$value['result']?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
				<?php if ($kri['treshold_type'] == 'SELECTION') { ?>
					<div class="form-group">
						<label class="col-md-2 control-label">Change Report</label>
						<div class="col-md-6">
						<select class="form-control input-sm" id="owner_report" name="owner_report">
							<?php foreach ($kri['treshold_list'] as $key => $value) { ?>
							<option value="<?=$value['value_1']?>" <?//$value['value_1'] == $change['risk_impact'] ? 'SELECTED' : ''?><?=$value['value_1']?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				<?php } else { ?> 
				
					<div class="form-group">
						<label class="col-md-2 control-label">Change Report</label>
						<div class="col-md-6">
							<input type="number" class="form-control input-sm" id="owner_report" name="owner_report" placeholder="" value="<?=$kri['owner_report'] == '' ? '0' : $kri['owner_report'] ?>">
						</div>
					</div>
				<?php } ?> 
				
				<?php } else { ?>
				<hr/>
				<div class="form-group">
					<label class="col-md-2 control-label">Perubahan Laporan</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="owner_report" placeholder="" value="<?=$change['risk_impact']?>">
					</div>
				</div>
				<?php } ?> 
			</div>
			<?php if (isset($verify) && $verify) { ?>
			<input type="hidden" name="change_id" value="<?=$change['id']?>">
			<div class="form-actions right">
				<button id="risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verifikasi</button>
				<button type="button" class="btn yellow" id="verify-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
			</div>
			<?php } else if (isset($input) && $input) { ?>
			<div class="form-actions right">
				<button id="risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Ajukan</button>
				<button type="button" class="btn yellow" id="verify-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
			</div>
			<?php } else { ?>
			<div class="form-actions right">
				<button onclick="javascript: location.href=site_url+'/main#tab_change_request_list'" type="button" class="btn yellow" id="verify-risk-button-cancel"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<?php } ?>
			</form>
			</div>
		</div>
		</div>

<?php
}
?>

	</div>
</div>

