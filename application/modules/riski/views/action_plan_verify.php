<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Action Plan Form
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Risk Owner Form</a>
				</li>
			</ul>
		</div>
		<div class="row">
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_risk_id = <?=$risk['id']?>;
			var g_username = null;
		</script>


	<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$status = $_GET['status'];
	$id = $action_plan['id'];
	//$username = $this->session->credential['username'];
	$this->load->database();
	$sql="select
(CASE WHEN 
t_risk_action_plan.action_plan = t_risk_action_plan_change.action_plan
and t_risk_action_plan.due_date = t_risk_action_plan_change.due_date
and t_risk_action_plan.division = t_risk_action_plan_change.division
THEN 1
ELSE 0 
END) as 'status'
from t_risk_action_plan JOIN t_risk_action_plan_change on t_risk_action_plan.id = t_risk_action_plan_change.id
WHERE t_risk_action_plan.id = '$id' ";

	$query = $this->db->query($sql);
	$row = $query->row(); 
	$hasil = $row->status;


if($status == 'under'){ ?>

	<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						PRIMARY
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" id="input-form" class="form-horizontal">
					<input type="hidden" id="action-plan-id" value="<?=$action_plan['id']?>" name="id" placeholder="">
					<input type="hidden" value="<?=$action_plan['risk_id']?>" name="risk_id" placeholder="">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Kode Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_code']?>" name="risk_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_owner_v']?>" name="risk_owner" placeholder="">
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$action_plan['risk_data']['risk_event']?></textarea>
									</div>
								</div>
								<!--
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Risk Event</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_event']?>" name="risk_event" placeholder="">
								</div>
							</div>
							-->
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Risiko Level</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_level_v']?>" name="risk_level" placeholder="">
								</div>
							</div>
							<hr/>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['act_code']?>" name="act_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Action Plan</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" value="<?=$action_plan['change_data']['action_plan']?>" name="action_plan" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Batas Waktu</label>
								<div class="col-md-9">
								<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
									<input type="text" class="form-control input-sm" name="due_date" readonly value="<?=$action_plan['change_data']['due_date_v']?>">
									<span class="input-group-btn">
									<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Action Plan</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>" <?=$row['ref_key'] == $action_plan['change_data']['division'] ? 'SELECTED' : '' ?>><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
						</div>
						<div class="form-actions right">
							
							<button id="changes-risk-button-save-primary2" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button type="button" class="btn yellow" id="changes-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
						</div>
					</form>
				</div>	
			</div>
		</div>

<?php


}else{

	//batas under
	if ($hasil == 1){
?>
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						PRIMARY
					</div>
				</div>
				
				<div class="portlet-body form">
					<form role="form" id="input-form" class="form-horizontal">
					<input type="hidden" id="action-plan-id" value="<?=$action_plan['id']?>" name="id" placeholder="">
					<input type="hidden" value="<?=$action_plan['risk_id']?>" name="risk_id" placeholder="">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Kode Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_code']?>" name="risk_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_owner_v']?>" name="risk_owner" placeholder="">
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$action_plan['risk_data']['risk_event']?></textarea>
									</div>
								</div>
							
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Risiko Level</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_level_v']?>" name="risk_level" placeholder="">
								</div>
							</div>
							<hr/>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['act_code']?>" name="act_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Action Plan</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" value="<?=$action_plan['change_data']['action_plan']?>" name="action_plan" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Batas Waktu</label>
								<div class="col-md-9">
								<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
									<input type="text" class="form-control input-sm" name="due_date" readonly value="<?=$action_plan['change_data']['due_date_v']?>">
									<span class="input-group-btn">
									<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Action Plan</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>" <?=$row['ref_key'] == $action_plan['change_data']['division'] ? 'SELECTED' : '' ?>><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
						</div>
						<div class="form-actions right">
							<button id="primary-risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verifikasi</button>
							<button id="changes-risk-button-save-primary" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button type="button" class="btn yellow" id="changes-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
						</div>
					</form>
				</div>	
			</div>
		</div>

		<?php }else{ ?>
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
								<label class="col-md-3 control-label smaller cl-compact">Kode Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_code']?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_owner_v']?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" placeholder=""><?=$action_plan['risk_data']['risk_event']?></textarea>
									</div>
								</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Risiko Level</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_level_v']?>" placeholder="">
								</div>
							</div>
							<hr/>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['act_code']?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Action Plan</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['action_plan']?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Batas Waktu</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['due_date_v']?>" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Action Plan</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['division_v']?>" placeholder="">
								</div>
							</div>
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
					<input type="hidden" id="action-plan-id" value="<?=$action_plan['id']?>" name="id" placeholder="">
					<input type="hidden" value="<?=$action_plan['risk_id']?>" name="risk_id" placeholder="">
						<div class="form-body">
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Kode Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_code']?>" name="risk_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Risiko</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_owner_v']?>" name="risk_owner" placeholder="">
								</div>
							</div>
							<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$action_plan['risk_data']['risk_event']?></textarea>
									</div>
								</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Risiko Level</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['risk_data']['risk_level_v']?>" name="risk_level" placeholder="">
								</div>
							</div>
							<hr/>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
								<div class="col-md-9">
								<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['act_code']?>" name="act_code" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Action Plan</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" value="<?=$action_plan['change_data']['action_plan']?>" name="action_plan" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Batas Waktu</label>
								<div class="col-md-9">
								<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
									<input type="text" class="form-control input-sm" name="due_date" readonly value="<?=$action_plan['change_data']['due_date_v']?>">
									<span class="input-group-btn">
									<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label smaller cl-compact">Pemilik Action Plan</label>
								<div class="col-md-9">
								<select class="form-control input-sm" name="division">
									<?php foreach($division_list as $row) { ?>
									<option value="<?=$row['ref_key']?>" <?=$row['ref_key'] == $action_plan['change_data']['division'] ? 'SELECTED' : '' ?>><?=$row['ref_value']?></option>
									<?php } ?>
								</select>
								</div>
							</div>
						</div>
						<div class="form-actions right">
							<button id="changes-risk-set-as-primary" type="button" class="btn blue"><i class="fa fa-arrows-h"></i> Simpan Sebagai Primary</button>
							<button id="changes-risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
							<button type="button" class="btn yellow" id="changes-risk-button-cancel"><i class="fa fa-times"></i> Batal</button>
						</div>
					</form>
				</div>	
			</div>
		</div>
		<?php } ?>
		<?php 
		//under 
		} 
		?>
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
