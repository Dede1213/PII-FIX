<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		List Risiko 
		</h3>
		<!-- END PAGE HEADER-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Transaction</a>
					<i class="fa fa-angle-right"></i>
				</li>
				
				<li>
					<a target="_self" href="<?=$site_url?>/risk/RiskRegister">Undermaintenance</a>
				</li>
			</ul>
		</div>
		<?php 
		
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$status = $_GET['status'];
		if ($status != 'ap'){ ?>
		<script type="text/javascript">
			var g_p_name = '<?=$periode['periode_name']?>';
		</script>
		<div class="col-md-12">
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					List Risiko 
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter By</label>
						<select class="form-control input-medium input-sm" id="filterFormBy">
							<option value="-">Choose</option>
							<option value="risk_event">Risk</option>
							<option value="risk_level">Risk Level</option>
							<option value="risk_impact_level">Impact Level</option>
							<option value="risk_likelihood_key">Likelihood</option>
						</select>
					</div>
					<div class="form-group" id="re">
						<input type="text" class="hash form-control input-sm" id="fe" placeholder="Insert Filter Value">
					</div>

					<div class="form-group" id="rl">
						<select class="hesh form-control input-sm" id="fl">
							<option value="low">Rendah</option>	
							<option value="moderate">Sedang</option>
							<option value="high">Tinggi</option>
						</select>
						
					</div>

					<div class="form-group" id="il">
						<select class="hish form-control input-sm" id="fi">
							<option value="insignificant">Tidak significant</option>	
							<option value="minor">Minor</option>
							<option value="major">Major</option>
							<option value="moderate">Moderate</option>
							<option value="catasthropic">Catasthropic</option>
						</select>
						
					</div>

					<div class="form-group" id="li">
						<select class="hosh form-control input-sm" id="fk">
							<option value="very low">Sangat Rendah</option>	
							<option value="low">Rendah</option>
							<option value="medium">Sedang</option>
							<option value="high">Tinggi</option>
							<option value="very high">Sangat Tinggi</option>
						</select>
						
					</div>											

					<button type="button" id="filterFormSubmit" class="btn blue btn-sm">Search</button>
				</form>
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">ID Risiko</th>
						<th width="20%">AP ID</th>
						<th width="40%">Peristiwa Risiko</th>
						<th width="10%">Risiko Level</th>
						<th width="10%">Pemilik risiko</th>
						<th width="10%">&nbsp;</th>
						
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
					List Risiko Undermaintenance RAC
				</div>
				
				
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm2" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy2">Filter By</label>
						<select class="form-control input-medium input-sm" id="filterFormBy2">
							<option value="-">Pilih</option>
							<option value="risk_event">Risiko</option>
							<option value="risk_level">Risiko Level</option>
							<option value="risk_impact_level">Dampak Level</option>
							<option value="risk_likelihood_key">Kemungkinan Keterjadian</option>
						</select>
					</div>

					<div class="form-group" id="tr">
						<input type="text" class="pash form-control input-sm" id="pe" placeholder="Insert Filter Value">
					</div>

					<div class="form-group" id="tl">
						<select class="pesh form-control input-sm" id="pl">
							<option value="low">Rendah</option>	
							<option value="moderate">Sedang</option>
							<option value="high">Tinggi</option>
						</select>
						
					</div>

					<div class="form-group" id="ti">
						<select class="pish form-control input-sm" id="pi">
							<option value="insignificant">Tidak significant</option>	
							<option value="minor">Minor</option>
							<option value="major">Major</option>
							<option value="moderate">Moderate</option>
							<option value="catasthropic">Catasthropic</option>
						</select>
						
					</div>

					<div class="form-group" id="tk">
						<select class="posh form-control input-sm" id="pk">
							<option value="very low">Sangat Rendah</option>	
							<option value="low">Rendah</option>
							<option value="medium">Sedang</option>
							<option value="high">Tinggi</option>
							<option value="very high">Sangat Tinggi</option>
						</select>
						
					</div>						
					<button type="button" id="filterFormSubmit2" class="btn blue btn-sm">Search</button>
				</form>	
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax2">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">ID Risiko</th>
						<th width="20%">AP ID</th>
						<th width="40%">Peristiwa Risiko</th>
						<th width="10%">Risiko Level</th>
						<th width="10%">Pemilik Risiko </th>
						<th width="10%">&nbsp;</th>
					</tr>
					</thead>
					<tbody>
					</tbody>



					</table>

				</div>
				<div class="row">
				<div class="col-md-12 clearfix">


	
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
								<img src="<?=$base_url?>assets/images/legend/draft.png"/> &nbsp; 
								 Draft
							</li>
							<li class="list-group-item">
								<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
								 Submited To RAC
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
								<img src="<?=$base_url?>assets/images/legend/executed.png"/> &nbsp; 
								 Action Plan Has Been Executed and Verified
							</li>
						</ul>
		</div>
		</div>
		<div class="row">
		
<?php }else{ 

$username = $this->session->credential['username'];
	$this->load->database();
	$risk_id = $_GET['id'];
	$sql="select concat('AP.', LPAD(id, 6, '0')) as id_plan,id , action_plan, division, execution_status
	from t_risk_action_plan where risk_id = '$risk_id' ";
	$query = $this->db->query($sql);

	?>

<!-- LIBRARY -->
<div id="modal-library" class="" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Action Plan</h4>
		
	</div>
	<div class="modal-body">
		<div>
			<table id="/library_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					
					<th>AP ID</th>
					<th>Action Plan</th>
					<th>Action Plan Owner</th>
					<th>Execution</th>
				</tr>
				</thead>
				<tbody>
<?php

if ($query->num_rows() > 0)
{
   foreach ($query->result_array() as $row)
   {
      ?>
      <tr><td><a href="<?php echo $site_url ?>/main/mainrac/actionPlanForm/<?php echo$row['id'] ?>?status=under"> <?php echo $row['id_plan']; ?> </a></td><td><?php echo $row['action_plan']; ?></td><td><?php echo $row['division']; ?></td><td><a href="<?php echo $site_url ?>/main/mainrac/actionPlanExecForm/<?php echo$row['id'] ?>?status=under"><?php echo $row['execution_status']; ?></a></td></tr>
<?php
   }
} 
					?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>
</div>
<?php } ?>
		</div>
		<div class="clearfix">
		</div>
		
	</div>				
	</div>
</div>

