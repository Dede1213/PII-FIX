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
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li id="bread_tab_my_risk_register" class="bread_tab">
					<a target="_self" href="<?=$site_url?>/main">My Risk Register</a>
				</li>
				<li id="bread_tab_change_request_list" class="bread_tab" style="display: none;">
					<a target="_self" href="<?=$site_url?>/main">Change Request List</a>
				</li>
			</ul>
<!-- 			<div class="page-toolbar">
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
					Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a href="javascript:;">Export to XLS</a>
						</li>
					</ul>
				</div>
			</div> -->
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN CONTENT-->
		<div class="panel panel-success">
			<div class="panel-body">
				<div class="col-md-3">
					<span>My Risk Register</span>
					<div id="chart_user" class="chart" style="width: 250px; height: 120px;"></div>
				</div>
			</div>
		</div>

		<div class="tabbable-custom ">
			<ul class="nav nav-tabs ">
				<li class="active">
					<a href="#tab_my_risk_register" data-toggle="tab">
					My Risk Register </a>
				</li>
				<li>
					<a href="#tab_change_request_list" data-toggle="tab">
					Change Request List 
					<font style="color:red;">
					<?php 
					if($cekChangeRequest > 0){
					echo "($cekChangeRequest)";
					}
					?>
					</font>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_my_risk_register">
					<div class="row">
						<div class="col-md-4">
						<form role="form form-horizontal">
							<div class="form-body">
								<div class="form-group">
									<select class="form-control input-sm" name="risk_category" id="sel_risk_category"></select>
								</div>
								<div class="form-group">
									<select class="form-control input-sm" name="risk_sub_category" id="sel_risk_sub_category"></select>
								</div>
								<div class="form-group">
									<select class="form-control input-sm" name="risk_2nd_sub_category" id="sel_risk_2nd_sub_category"></select>
								</div>
								<div class="form-group">
									<button type="button" id="button-filter-category" class="btn blue btn-sm">Filter Risk</button>
									<button type="button" id="button-filter-clear" class="btn blue btn-sm">Remove Filter</button>
								</div>
							</div>
						</form>
						</div>

						<?php
							if($adhoc_button !=''){
								?>
						<div class="col-md-8 clearfix" style="margin-top: 130px;">
							<a href="javascript: location.href='<?=$site_url?>/risk/RiskRegister/RiskRegisterInput/adhoc';" 
							   class="btn default green pull-right <?=$adhoc_button ? '' : 'disabled'?>">
							<i class="fa fa-plus"></i>
							<span class="hidden-480">
							Add New Risk </span>
							</a>
						</div>
					<?php
					}
					?>
					</div>
					<hr/>
					<div class="table-container" ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_ajax">
						<thead>
						<tr role="row" class="heading">
							<th width="30px">Status</th>
							<th>Risk ID</th>
							<th>Risk Event</th>
							<th>Risk Level</th>
							<th>Impact Level</th>
							<th>Likelihood</th>
							<th>Risk Owner</th>
							<th width="50px">Change Request</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					<div class="col-md-6">
						<h4>Legend</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 submitted to rac
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
								 Verified By RAC
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/treatment.png"/> &nbsp; 
								 on Risk Treatment Process
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/actplan.png"/> &nbsp; 
								 on Action Plan Process
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/executed_2.png"/> &nbsp; 
								 On Action Plan Execution Process
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/executed.png"/> &nbsp; 
								 Action Plan Has Been Executed and Verified
							</li>
						</ul>
		
					</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_change_request_list">
					<div class="table-container" ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_ajax_change">
						<thead>
						<tr role="row" class="heading">
							<th>No</th>
							<th>ID CH</th>
							<th>Risk ID</th>
							<th>Risk Event</th>
							<th>Status Change Request</th>
							<th>Date</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
		</div>
		<!-- END CONTENT-->
	</div>
</div>

						<script type="text/javascript">
						var g_submit_mode = '<?php echo "$adhoc_button";?>';
						</script>
					