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
					<a target="_self" href="javascript:;">View Action Plan</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<div class="row">
		<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						Action Plan Form
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="input-form" role="form" class="form-horizontal">
					<input type="hidden" name="risk_id" value="<?=$risk['risk_id']?>" />
					<input type="hidden" id="form-action-id" name="action_id" value="<?=$action_plan['id']?>" />
						<div class="form-body">
							<div class="row">
							<div class="col-md-12">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Risk ID</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_code']?>" name="risk_code" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with risk owner who is responsible in managing the activities that direcly related to the risk">Risk Owner</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_owner_v']?>" name="risk_owner_v" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Risk Event</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$risk['risk_event']?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with decription of identified risk which explains nature of the risk">Risk Event Description</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_description" placeholder=""><?=$risk['risk_description']?></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-12">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with grading as describe in “Impact Category” (e.g. insignificant, minor, moderate, major, and catastrophic) after consideration to existing control effectiveness">Impact Level</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['impact_level_v']?>" name="risk_impact_level_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field withthe grading criteria as described in “Likelihood of Risk Occurrence” table (e.g. very low, low, medium, high, and very high) after consideration to existing control effectiveness">Likelihood</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['likelihood_v']?>" name="risk_likelihood_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_level_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the grading criteria as described in “Risk Level” matrix (e.g. insignificant, minor, moderate, major, and catastrophic) based on defined value in ‘Likelihood’ and ‘Impact Level’">Risk Level</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_level_v']?>" name="risk_level" placeholder="">
									</div>
								</div>
							</div>
							</div>
						
							<h4>Assigned Action Plan</h4>
							<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th>AP ID</th>
									<th>Assigned Action Plan</th>
									<th>Due Date</th>
									<th>Action Plan Owner</th>
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
							
						</div>
						
					
				</div>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						Changed Action Plan
					</div>
				</div>
				
				<div class="portlet-body form">
					<div class="form-horizontal">
						<div class="form-body">
							<div class="row">
							<div class="col-md-12">	
							
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">AP ID</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$action_plan_change['act_code']?>" placeholder="">
									</div>
								</div>
							
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with description of risk treatment action to be done in addressing the risk">Assigned Action Plan</label>
									<div class="col-md-9">
										<textarea class="form-control input-sm input-readview" value="" name="action_plan"><?=$action_plan_change['action_plan']?></textarea>
										<!--
										<input type="text" class="form-control input-sm input-readview" value="<?//=$action_plan_change['action_plan']?>" name="action_plan" placeholder="">
										-->
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" title="fill this field with the target completion date of risk treatment plan.">Due Date</label>
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
									<label class="col-md-3 control-label" title="fill this field with the assigned person who is responsible for defined risk treatment activities in ‘Action Plan’">Action Plan Owner </label>
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
						<?php
							if ($role == 2){
						?>
							<button id="risk-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Submit</button>
						<?php	
							}else{
						?>
							<button id="risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Save as Draft</button>
							<button id="risk-button-verify" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Submit</button>
							<button type="button" class="btn yellow" id="risk-button-cancel"><i class="fa fa-times"></i> Cancel</button>
						
						<?php } ?>

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