<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Risk Register Exercise
		</h3>
		<!-- END PAGE HEADER-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main/mainrac">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="<?=$site_url?>/main/mainrac/riskRegister/<?=$filled_by_id?>">Risk Register Exercise</a>
				</li>
			</ul>
		</div>
		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_p_name = '<?=$periode['periode_name']?>';
			var g_status_user_id = '<?=$filled_by_id?>';
		</script>
		<div class="row">
		<div class="col-md-12">
			
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					Roll Forward Risk
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter By</label>
						<select class="form-control input-medium input-sm" id="filterFormBy">
							<option value="risk_event">Resiko</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-sm" id="filterFormValue" placeholder="Insert Filter Value">
					</div>
					<button type="button" id="filterFormSubmit" class="btn blue btn-sm">Search</button>
				</form>
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">ID Resiko</th>
						<th width="20%">Resiko</th>
						<th width="10%">Risk Level</th>
						<th width="10%">Impact Level</th>
						<th width="10%">Likelihood</th>
						<th width="10%">Risk Owner</th>
						<th width="10%">Status</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					Risk Identified in This Periode ( <?=$periode['periode_name']?> )
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm2" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter By</label>
						<select class="form-control input-medium input-sm" id="filterFormBy2">
							<option value="risk_event">Resiko</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-sm" id="filterFormValue2" placeholder="Insert Filter Value">
					</div>
					<button type="button" id="filterFormSubmit2" class="btn blue btn-sm">Search</button>
				</form>	
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax2">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">ID Resiko</th>
						<th width="40%">Resiko</th>
						<th width="10%">Risk Level</th>
						<th width="10%">Impact Level</th>
						<th width="10%">Likelihood</th>
						<th width="10%">Risk Owner</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-6" style="padding-left: 40px;">
			<h4>Legend</h4>
			<ul class="list-group">
				<li class="list-group-item">
					<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
					 Submited To RAC
				</li>
				<li class="list-group-item">
					<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
					 Verified by RAC
				</li>
			</ul>

		</div>
		
		</div>
		<div class="clearfix">
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
				<a class="btn red" target="_self" href="<?=$site_url?>/main">
				Back to Home </a>
			</p>
			<?php } ?>
		</div>
	</div>
	</div>
	<?php } ?>
</div>