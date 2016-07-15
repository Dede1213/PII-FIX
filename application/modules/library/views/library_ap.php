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
					<a id="bread_tab_title" target="_self" href="javascript:;">List of Action Plan</a>
				</li>
			</ul>
			  <div class="page-toolbar">
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
					Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_ap_pdf");?>">PDF</a>
						</li>
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_ap_excel");?>">Excel</a>
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
				    <button id="button-add" class="btn green btn-sm" type="button" style="margin-bottom: 10px;"  >Add Action Plan</button>
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatableap_ajax">
						<thead>
						<tr role="row" class="heading">
							 
							<th>AP ID</th>
							<th>Action Plan</th>
							<th>Action Plan Owner</th>
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
		<h4 class="modal-title">Library of Action Plan</h4>		 
	</div>
	<div class="modal-body">
				<form id="modal-listrisk-form" role="form" class="form-horizontal">
					<div class="form-body">
				
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">AP. ID :</label>
							<div class="col-md-9">
							<input class="form-control input-sm input-readview" type="text" placeholder="" name="id" id = "id" readonly="true"  >
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Action Plan :</label>
							<div class="col-md-9">
							<input type = "text" name = "action_plan" id = "action_plan" class = "form-control">  
							<input type = "hidden" name = "action_plan_ex" id = "action_plan_ex" class = "form-control"> 
							</div>
						</div>
						
						<!--<div class="form-group">
								<label class="col-md-3 control-label">Tanggal</label>
								<div class="col-md-3">
									<div class="input-group   date-picker input-daterange" data-date="<?=date('d-m-Y')?>" data-date-format="dd-mm-yyyy">
										<input type="text" class="form-control" name="due_date" id = "due_date"> 
										<span class="input-group-addon">
										 <i class = "fa fa-calendar"></i></span>
									</div>
									<input type="hidden" class="form-control" name="due_date_ex" id = "due_date_ex"> 
									 
								</div>
							</div>-->
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Action Plan Owner :</label>
							<div class="col-md-9">
							<select name="division"  class="form-control" id = "division"> 
							</select>		
							<input type="hidden" class="form-control" name="division_ex" id = "division_ex"> 
							</div>
						</div>
					
						 
					</div>
				</form>			
		<br>			
	</div>
	<div class="modal-footer">
		<button id="library-modal-listriskap-update" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
	</div>
</div>


