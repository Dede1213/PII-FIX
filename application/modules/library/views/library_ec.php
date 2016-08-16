<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Dashboard <small>reports &amp; statistics</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main/mainrac">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Library Management</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Risk</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">List of Existing Control</a>
				</li>
			</ul>
			
			 <div class="page-toolbar">
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
					Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_ec_pdf");?>">PDF</a>
						</li>
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_ec_excel");?>">Excel</a>
						</li>
					 
					</ul>
				</div>
			</div>
			 
			
		</div>
<!-- END PAGE HEADER-->
<!-- BEGIN CONTENT-->
		    
		<div class="tabbable-custom ">
			 
			<div class="tab-content">
				<div class="tab-pane active" id="tab_risk_list">
				    <button id="button-add-ec" class="btn green btn-sm" type="button" style="margin-bottom: 10px;"  >Add Existing Control</button>
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatableec_ajax">
						<thead>
						<tr role="row" class="heading">
							 
							<th>Existing Control ID</th>
							<th>Existing Control</th>
							<th>Evaluation Control</th>
							<th>Control Owner</th>
							<th>Risk ID</th>  
							<th> Action</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					 
					</div>
				</div>
				  
			</div>
			
		</div>
		<!-- END CONTENT-->
	</div>
</div>


<!-- LIBRARY -->
<div id="modal_listrisk" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Library Of Existing Control</h4>		 
	</div>
	<div class="modal-body">
				<form id="modal-listrisk-form" role="form" class="form-horizontal">
					<div class="form-body">
				<!--
						<div class="form-group">
						<label class="col-md-3 control-label smaller cl-compact">Existing Control ID  :</label>
							<div class="col-md-9">
							<input class="form-control input-sm input-readview" type="text" placeholder="" name="id" id = "id" readonly="true"  >
							</div>
						</div>
				-->
						<div class="form-group">
					<input type = "hidden" id = "form-control-revid">
						<label class="col-md-3 control-label smaller cl-compact">Existing Control ID</label>
						<div class="col-md-9">
							<div class="input-group">
								<input class="form-control input-sm input-readview" type="text" placeholder="" name="id" id = "id" readonly="true"  >
								<span class="input-group-btn">
								<!--
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-control"><i class="fa fa-search fa-fw"/></i></button>
								-->
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
								<label class="col-md-3 control-label">Existing Control</label>
							 
									<div class="col-md-9">
										<textarea class="form-control" name="risk_evaluation_control" id = "risk_evaluation_control"></textarea>										 
									</div> 
							 
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Control Owner :</label>
							<div class="col-md-9">
							<select name="risk_control_owner"  class="form-control" id = "risk_control_owner"> 
							</select>							 
							</div>
						</div>
					
						 
					</div>
				</form>			
		<br>			
	</div>
	<div class="modal-footer">
		<button id="library-modal-listriskec-update" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
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