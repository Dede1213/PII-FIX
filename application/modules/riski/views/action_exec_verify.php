<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Action Plan Execution
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Action Plan Execution</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_risk_id = <?=$risk['id']?>;
			var g_username = null;
		</script>
		<div class="row">
		<!-- CHANGES FORM -->
		<div class="col-md-12 form">
			<form role="form" id="input-form" class="form-horizontal">
			<input type="hidden" id="action-plan-id" value="<?=$action_plan['id']?>" name="id" placeholder="">
			<input type="hidden" value="<?=$action_plan['risk_id']?>" name="risk_id" placeholder="">
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['act_code']?>" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Assigned Action Plan</label>
						<div class="col-md-9">
							<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['action_plan']?>" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Due Date</label>
						<div class="col-md-9">
							<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['due_date_v']?>" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Action Plan Owner</label>
						<div class="col-md-9">
							<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan['division_v']?>" placeholder="">
						</div>
					</div>
					<hr/>
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Status </label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="execution_status" id="exec-select-status">
							<option value="COMPLETE" <?=$action_plan['execution_status'] == 'COMPLETE' ? 'selected' : ''?>>Complete</option>
							<option value="EXTEND" <?=$action_plan['execution_status'] == 'EXTEND' ? 'selected' : ''?>>Extend</option>
						</select>
						</div>
					</div>
					<?php 
						$g1 = $g2 = '';
						if ($action_plan['execution_status'] == 'COMPLETE') { 
							$g2 = 'style="display: none"';
						} else {
							$g1 = 'style="display: none"';
						}
					?>
					<div class="form-group" id="fgroup-explain" <?=$g1?>>
						<label class="col-md-3 control-label smaller cl-compact">Explanation</label>
						<div class="col-md-9">
						<textarea class="form-control" rows="3" name="execution_explain" placeholder=""><?=$action_plan['execution_explain']?></textarea>
						</div>
					</div>
					<div class="form-group" id="fgroup-evidence" <?=$g1?>>
						<label class="col-md-3 control-label smaller cl-compact">Evidence</label>
						<div class="col-md-9">
						<textarea class="form-control" rows="3" name="execution_evidence" placeholder=""><?=$action_plan['execution_evidence']?></textarea>
						</div>
					</div>
					<div class="form-group" id="fgroup-reason" <?=$g2?>>
						<label class="col-md-3 control-label smaller cl-compact">Reason</label>
						<div class="col-md-9">
						<textarea class="form-control" rows="3" name="execution_reason" placeholder=""><?=$action_plan['execution_reason']?></textarea>
						</div>
					</div>
					<div class="form-group" id="fgroup-date" <?=$g2?>>
						<label class="col-md-3 control-label smaller cl-compact">Revised Date</label>
						<div class="col-md-9">
						<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
							<input type="text" class="form-control input-sm" name="revised_date" readonly value="<?=$action_plan['revised_date_v']?>">
							<span class="input-group-btn">
							<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
						</div>
					</div>	
				</div>
				<div class="form-actions right">
					<button id="exec-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Verify</button>
					<button type="button" class="btn yellow" id="exec-button-cancel"><i class="fa fa-times"></i> Cancel</button>
				</div>
			</form>
		</div>
		
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
