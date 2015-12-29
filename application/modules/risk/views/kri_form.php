<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Key Risk Indicator (KRI) Form
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Key Risk Indicator Form</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<div class="row">
		<div class="col-md-12">
			<form id="input-form" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-2 control-label">Risk ID</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_library_code" placeholder="" value="<?=$risk['risk_code']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Risk Event</label>
						<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_event" placeholder="" value="<?=$risk['risk_event']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Risk Level</label>
						<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_level" placeholder="" value="<?=$risk['risk_level_v']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Risk Treatment</label>
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
			<input type="hidden" name="kri_id" id="kri-id" value="<?=$kri['id']?>"/>
			<input type="hidden" name="risk_id" id="kri-risk-id" value=""/>
			<div class="form-body">
				<div class="form-group">
					<input type="hidden" name="kri_library_id" value=""/>
					<label class="col-md-2 control-label">KRI ID</label>
					<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="kri_library_code" placeholder="" value="<?=$kri['kri_code']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Key Risk Indicator</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="key_risk_indicator" placeholder="" value="<?=$kri['key_risk_indicator']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Treshold</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="treshold" placeholder="" value="<?=$kri['treshold']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Timing of Reporting</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="timing_pelaporan" placeholder="" value="<?=$kri['timing_pelaporan_v']?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">KRI Owner</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" readonly="true" name="kri_owner" placeholder="" value="<?=$kri['kri_owner_v']?>">
					</div>
				</div>
				
				<?php if (isset($verifyRac) && $verifyRac) { ?>
				<div class="form-group">
					<label class="col-md-2 control-label" >Action Plan</label>
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
						<label class="col-md-2 control-label">Report</label>
						<div class="col-md-6">
						<select class="form-control input-sm" id="owner_report" name="owner_report">
							<?php foreach ($kri['treshold_list'] as $key => $value) { ?>
							<option value="<?=$value['value_1']?>" <?=$value['value_1'] == $kri['owner_report'] ? 'SELECTED' : ''?>><?=$value['value_1']?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				<?php } else { ?> 
					<div class="form-group">
						<label class="col-md-2 control-label">Report</label>
						<div class="col-md-6">
							<input type="number" class="form-control input-sm" id="owner_report" name="owner_report" placeholder="" value="<?=$kri['owner_report'] == '' ? '0' : $kri['owner_report'] ?>">
						</div>
					</div>
				<?php } ?> 
				
				<?php if (isset($verifyRac) && $verifyRac) { ?>
				<div class="form-group">
					<label class="col-md-2 control-label">KRI Warning</label>
					<div class="col-md-6">
						<img id="warning_img" src="<?=$base_url?>assets/images/legend/kri_<?=strtolower($kri['kri_warning'])?>.png"/>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="form-actions right">
				<?php if (isset($verifyRac) && $verifyRac) { ?>
				<button id="kri-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verify</button>
				<button type="button" class="btn yellow" id="kri-button-cancel"><i class="fa fa-times"></i> Cancel</button>
				<?php } else { ?>
				<button id="kri-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Submit</button>
				<button type="button" class="btn yellow" id="kri-button-cancel"><i class="fa fa-times"></i> Cancel</button>
				<?php } ?>
			</div>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>
<?php if (isset($verifyRac) && $verifyRac) { ?>
<script type="text/javascript">
var t_treshold_type = '<?=$kri['treshold_type']?>';
var t_treshold_list = <?=json_encode($kri['treshold_list'])?>;
</script>
<?php } ?>
