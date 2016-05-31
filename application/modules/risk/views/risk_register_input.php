<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Risk Form
		</h3>
	
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php if (isset($submit_mode) && $submit_mode == 'adhoc') { ?>
				<?php } else { ?>
				<li>
					<a target="_self" href="javascript:;">Transaction</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Regular Exercise</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="<?=$site_url?>/risk/RiskRegister">Risk Register Exercise</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<?php } ?>
				<li>
					<a target="_self" href="<?=$site_url?>/risk/RiskRegister/RiskRegisterInput/<?=$submit_mode?>">Risk Form</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption" id="div-portlet-page-caption">
						Risk Form
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="input-form" role="form" class="form-horizontal">
						<div class="form-body">
							<div class="row">
							<div class="col-md-6">	
								<?php if(isset($modifyRisk)) { ?>
								
								<div class="form-group">
									<input type="hidden" name="risk_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" >Risk ID</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_code" placeholder="">
									</div>
								</div>

								<div class="form-group">
									<input type="hidden" name="risk_library_id" value=""/>
								</div>

								<?php }else{ ?>
								<div class="form-group">
									<input type="hidden" name="risk_library_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact">Risk ID</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="text" class="form-control input-sm" readonly="true" name="risk_library_code" placeholder="">
											<span class="input-group-btn">
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-library"><i class="fa fa-search fa-fw"/></i></button>
											</span>
										</div>
									</div>
								</div>
								<?php
								}
								?>
								
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" title="">Risk Event <span class="required">* </span>
									</label>
									<div class="col-md-9">
									
									<textarea class="form-control input-sm popovers"  data-container="body" data-placement="bottom" rows="3" name="risk_event" data-required="1" placeholder="" data-content="" ></textarea>
									
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" title="fill this field with decription of identified risk which explains nature of the risk">Risk Event Description <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea class="form-control input-sm popovers" data-container="body" data-placement="bottom" rows="3" name="risk_description" placeholder="" data-content=""></textarea>
									</div>
								</div>



								
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-control-objective" id="button-form-control-open-objective" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Add Objective </span>
									 	</a>
									 </div>
									 
									 <div class="table-scrollable">
									 	<table id="objective_table" class="table table-condensed table-bordered table-hover">
									 		<thead>
									 		<tr role="row" class="heading">
									 			<th width="15%">Obj.ID</th>
									 			<th>Objective</th>
									 			<th width="66px">&nbsp;</th>
									 		</tr>
									 		</thead>
									 		<tbody>
									 		</tbody>
									 	</table>
									 </div>
								</div>
							

								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with risk category that related to identified risk as decribed in ‘Risk Description’ ">Risk Category<span class="required">* </span></label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_category" id="sel_risk_category" ></select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Risk Sub Category<span class="required">* </span></label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_sub_category" id="sel_risk_sub_category">
									</select>
									</div>
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-md-3 control-label small cl-compact" >Risk 2nd Sub Category<span class="required">* </span></label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_2nd_sub_category" id="sel_risk_2nd_sub_category">
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with risk owner who is responsible in managing the activities that direcly related to the risk">Risk Owner <span class="required">* </span></label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="risk_division">
										<?php foreach($division_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the description of set of factors that may affects or lead to the occurrence of risk event">Cause <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea rows="3" class="form-control input-sm popovers" 
									data-container="body" data-trigger="focus" data-placement="bottom" data-content=""
									name="risk_cause" placeholder=""></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the description of potential direct or indirect loss or cost to IIGF that could have been suffered from a risk event" >Impact <span class="required">* </span></label>
									<div class="col-md-9">
									<textarea rows="3" class="form-control input-sm popovers" 
									data-container="body" data-trigger="focus" data-placement="bottom" data-content=""
									name="risk_impact" placeholder=""></textarea>
									</div>
								</div>
								<!--
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Existing Control ID</label>
									<div class="col-md-9">
										<div class="input-group">
											<input type="text" class="form-control input-sm" readonly="true" name="existing_control_id" placeholder="">
											<span class="input-group-btn">
											<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-control"><i class="fa fa-search fa-fw"/></i></button>
											</span>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Existing Control</label>
									<div class="col-md-9">
									<textarea class="form-control input-sm" rows="3" name="risk_existing_control" placeholder=""></textarea>
									<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Evaluation on Existing Control</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_evaluation_control" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Control Owner</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" name="risk_control_owner" placeholder="">
									</div>
								</div>
								-->
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with grading as describe in “Impact Category” (e.g. insignificant, minor, moderate, major, and catastrophic) after consideration to existing control effectiveness">Impact Level <span class="required">* </span></label>
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
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field withthe grading criteria as described in “Likelihood of Risk Occurrence” table (e.g. very low, low, medium, high, and very high) after consideration to existing control effectiveness" >Likelihood <span class="required">* </span></label>
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
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the grading criteria as described in “Risk Level” matrix (e.g. insignificant, minor, moderate, major, and catastrophic) based on defined value in ‘Likelihood’ and ‘Impact Level’">Risk Level</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm" readonly="true" name="risk_level" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" title="fill this field with treatment category as described in “Risk Treatment Guideline” based on its risk level - accept :risk treatment is not define, mitigate : rik treatment is defined to reduce risk level, transfer : risk treatment is defined by transferring to other party">Suggested Risk Treatment <span class="required">* </span></label>
									<div class="col-md-9">
									<select class="form-control input-sm" name="suggested_risk_treatment">
										<option value="">Choose One...</option>
										<?php foreach($treatment_list as $row) { ?>
										<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
										<?php } ?>
									</select>
									</div>
								</div>
							</div>
							</div>
							<div class="clearfix">
							</div>
							<!--   OBJECTIVE 
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><font style="color:red;">*</font>Objective</h3>
								</div>
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-control-objective" id="button-form-control-open-objective" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Add Objective </span>
									 	</a>
									 </div>
									 
									 <div class="table-scrollable">
									 	<table id="objective_table" class="table table-condensed table-bordered table-hover">
									 		<thead>
									 		<tr role="row" class="heading">
									 			<th width="15%">Obj.ID</th>
									 			<th>Objective</th>
									 			<th width="66px">&nbsp;</th>
									 		</tr>
									 		</thead>
									 		<tbody>
									 		</tbody>
									 	</table>
									 </div>
								</div>
							</div>
							-->

							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Control<font style="color:red;">*</font></h3>
								</div>
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-control-2" id="button-form-control-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Add Control </span>
									 	</a>
									 </div>
									 
									 <div class="table-scrollable">
									 	<table id="control_table" class="table table-condensed table-bordered table-hover">
									 		<thead>
									 		<tr role="row" class="heading">
									 			<th>Existing Control ID</th>
									 			<th>Evaluation on Existing Control</th>
									 			<th>Existing Control</th>
									 			<th>Control Owner</th>
									 			<th width="66px">&nbsp;</th>
									 		</tr>
									 		</thead>
									 		<tbody>
									 		</tbody>
									 	</table>
									 </div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Action Plan<font style="color:red;">*</font></h3>
								</div>
								<div class="panel-body">
									 <div class="clearfix">
									 	<a href="#form-data" id="button-form-data-open" data-toggle="modal" class="btn default green pull-right btn-sm">
									 	<i class="fa fa-plus"></i>
									 	<span class="hidden-480">
									 	Add Plan Action Suggestion </span>
									 	</a>
									 </div>
									 
									<div class="table-scrollable">
										<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
											<thead>
											<tr role="row" class="heading">
												<th>Suggested Action Plan</th>
												<th>Due Date</th>
												<th>Action Plan Owner</th>
												
												<th width="66px">&nbsp;</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
										<!--
										<tr>
											<td>Action</td>
											<td>Date</td>
											<td>PIC</td>
											<td>
											<div class="btn-group">
												<button type="button" class="btn btn-default btn-xs"><i class="fa fa-minus-circle font-red"></i></button>
											</div>
											</td>
										</tr>
										-->
									</div>
								</div>
							</div>

						</div>
						<div class="form-actions right">
						<?php if(isset($modifyRisk)) { ?>
							<button id="risk-button-modify" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Save</button>
							<button id="risk-button-delete" type="button" class="btn red"><i class="fa  fa-trash-o"></i> Delete</button>
						<?php } else { ?>
							<?php if (isset($submit_mode) && $submit_mode == 'adhoc') { ?>
								<input type="hidden" name="submit_mode" value="adhoc" />
								<button id="risk-button-submit" type="button" class="btn blue"><i class="fa fa-check-circle"></i> Submit</button>
							<?php } else { ?>
								<input type="hidden" name="submit_mode" value="periodic" />
								<button id="risk-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Save</button>
							<?php } ?>
						<?php } ?>
							<button type="button" class="btn yellow" id="risk-button-cancel"><i class="fa fa-times"></i> Cancel</button>
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
				<h4 class="block">Error</h4>
				<p>
					 Cannot Input Adhoc Risk Register Exercise because Risk Period is already set, please contact RAC team for further information
					 <p>
						<a class="btn red" target="_self" href="<?=$site_url?>/main">
						Back to Home </a>
					</p>
				</p>
				<?php } else { ?>
				<h4 class="block">Error</h4>
				<p>
					 Cannot Input Risk Register Exercise because Risk Period is not set, please contact RAC team for further information
				</p>
				<p>
					<a class="btn red" target="_self" href="<?=$site_url?>/risk/RiskRegister">
					Back to Risk Register List </a>
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
		<h4 class="modal-title">Add Objective</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control-objective" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
					<input type = "hidden" id = "form-control-revid-objective">
						<label class="col-md-3 control-label smaller cl-compact">Obj. ID</label>
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
						<label class="col-md-3 control-label smaller cl-compact" >Objective <span class="required">* </span></label>
						<div class="col-md-9">
						<textarea class="form-control input-sm " rows="3"  name="objective" id = "objective" placeholder="NONE"></textarea>
						<button id="button_clear_control" type="button" class="hide btn red btn-xs" style="margin-top: 5px;"><i class="fa fa-minus-circle font-white"></i> Clear Existing Control</button>
						</div>
					</div>
					
				</div>
			</form>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button id="input-control-add-objective" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Add</button>
	</div>
</div>



<!-- CONTROL Option  -->
<div id="form-control-2" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Add Control</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control2" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
								<label class="col-md-3 control-label">Add Control</label>
								<div class="col-md-6">
									<select class="form-control" name="control_id" id="control_id">
										
										<option value="-">Choose One</option>
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
		<h4 class="modal-title">Add Control</h4>
	</div>
	<div class="modal-body">
		
			<form id="input-form-control" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
					<input type = "hidden" id = "form-control-revid">
						<label class="col-md-3 control-label smaller cl-compact">Existing Control ID</label>
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
						<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the effectiveness level of existing control (refers to control assessment criteria)">Evaluation on Existing Control <span class="required">* </span></label>
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
						<label class="col-md-3 control-label smaller cl-compact" title="fill this field with the assigned person who is responsible for the business unit, which owns the controls associated with the risk event">Control Owner <span class="required">* </span></label>
						<div class="col-md-9">
						<select class="form-control input-sm" name="risk_control_owner" id = "risk_control_owner">
										<option value="">Choose One</option>
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
		<h4 class="modal-title">Add Suggested Action Plan</h4>
	</div>
	<div class="modal-body">
			<input type="hidden"   id = "form-data-revid"  > 
			<form id="input-form-action-plan" role="form" class="form-horizontal">
				<div class="form-body">
					<!--<div class="form-group">
						<label class="col-md-3 control-label">Suggested Action Plan <span class="required">* </span></label>
						<div class="col-md-9">
						<input type="text" class="form-control input-sm" name="action_plan" placeholder="">
						</div>
					</div>-->
					
					<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact" title="fill this field with description of risk treatment action to be done in addressing the risk">Suggested Action Plan</label>
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
						<label class="col-md-3 control-label" title="fill this field with the target completion date of risk treatment plan.">Due Date <span class="required">* </span></label>
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
						<label class="col-md-3 control-label">Action Plan Owner <span class="required">* </span></label>
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
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button id="input-actionplan-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Add</button>
	</div>
</div>


<!-- LIBRARY ACTION-->
<div id="modal-libraryaction" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Suggested Action Plan Library</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-libraryaction-filter-submit">Search</button>
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

<!-- LIBRARY -->
<div id="modal-library" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Risk Library</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-library-filter-submit">Search</button>
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
					<th width="66px">&nbsp;</th>
					<th>Risk ID</th>
					<th>Risk Event</th>
					<th>Description</th>
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
		<h4 class="modal-title">Evaluation on Existing Control</h4>
		<p style="color:red;">*Choose One</p>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_control_table_existing" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>Evaluation on Existing Control</th>
					<th>Description</th>
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
		<h4 class="modal-title">Existing Control</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-control-filter-submit">Search</button>
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
					
					<th>Evaluation on Existing Control</th>
					<th>Existing Control</th>
					<th>Control Owner</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<!-- OBJECTIVE search Library -->
<div id="modal-objective" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Objective</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="search...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-control-filter-submit-objective">Search</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_objective_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>Objective</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!--
<tr>
	<td>
	<div class="btn-group">
		<button type="button" class="btn btn-default btn-xs"><i class="fa fa-check-circle font-blue"></i></button>
	</div>
	</td>
	<td>CID-01</td>
	<td>Existing ControlDescription</td>
</tr>
-->

<!-- IMPACT LEVEL -->
<div id="modal-impact" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Evaluation on Risk Impact</h4>
		<span class="font-red">* Choose one(1) or more from category, but one(1) category only have one(1) parameter</span>
	</div>
	<div class="modal-body" style="height: 400px; max-height: 400px; overflow: none; overflow-y: auto;">
		<form id="form-impact">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th>Category</th>
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
			>Save</button>
	</div>
</div>

<!-- LIKELIHOOD -->
<div id="modal-likelihood" class="modal fade" tabindex="-1" data-width="760" data-backdrop="static" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Evaluation on Risk Likelihood</h4>
		<span class="font-red">* Choose One</span>
	</div>
	<div class="modal-body">
		<form id="form-likelihood">
		<table class="table table-condensed table-bordered table-hover">
			<thead>
			<tr role="row" class="heading">
				<th>&nbsp;</th>
				<th width="250px">Likelihood of risk occurrence</th>
				<th>Description</th>
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
			>Save</button>
	</div>
</div>
<script type="text/javascript">
	var g_submit_mode = '<?php echo "$submit_mode";?>';
</script>


<?php
if ($submit_mode == 'periodic'){
?>
<script type="text/javascript">
	var g_username_user = '<?php echo "$username_user";?>';
	//var g_submit_mode = <?php echo "$submit_mode";?>
</script>
<?php
}
?>

<?php if(isset($modifyRisk)) { ?>
<script type="text/javascript">
	var g_risk_id = <?=$risk_id?>;
</script>
<?php } ?>

<?php
if ($submit_mode == 'adhoc'){
?>
<script type="text/javascript">
	//var g_submit_mode = <?php echo "$submit_mode";?>;
</script>
<?php
}
?>

<?php 
}
?>