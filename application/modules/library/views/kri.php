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
					<a id="bread_tab_title" target="_self" href="javascript:;">KRI</a>
				</li>
			</ul>
			  
		</div>
<!-- END PAGE HEADER-->
<!-- BEGIN CONTENT-->
		    
		<div class="tabbable-custom ">
			 
			<div class="tab-content">
				<div class="tab-pane active" id="tab_risk_list">
				    
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatablekri_ajax">
						<thead>
						<tr role="row" class="heading">
							 
							<th>KRI ID</th>
							<th>Key Risk Indicator</th> 
							<th>Threshold</th> 
							<th>Threshold Type</th> 
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
		<h4 class="modal-title">Existing Control</h4>		 
	</div>
	<div class="modal-body">
				<form id="modal-listrisk-form" role="form" class="form-horizontal">
					<div class="form-body">
				
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact"> KRI ID  :</label>
							<div class="col-md-9">
							<input class="form-control input-sm input-readview" type="text" placeholder="" name="kri_code" id = "kri_code" readonly="true"  >
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Key Risk Indicator :</label>
							<div class="col-md-9">
							<input type = "text" name = "key_risk_indicator" id = "key_risk_indicator" class = "form-control">  
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Threshold :</label>
							<div class="col-md-9">
							<input type = "text" name = "treshold" id = "treshold" class = "form-control">  
							</div>
						</div>
						 
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Threshold Type :</label>
							<div class="col-md-9">
							<select name="treshold_type"  class="form-control" id = "treshold_type">
							
							</select>							 
							</div>
						</div>
						 
						 
					</div>
				</form>			
		<br>			
	</div>
	<div class="modal-footer">
		<button id="library-modal-listriskkri-update" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
	</div>
</div>


