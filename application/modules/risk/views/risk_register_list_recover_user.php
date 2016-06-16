<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Recover Risk
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
					<a target="_self" href="javascript:;">Setting</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Recover Risk</a>
					
				</li>
				
			</ul>
		</div>
		<?php 
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$username = $this->session->credential['username'];
	$this->load->database();
	$sql="select a.risk_id from t_risk a where  a.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and a.risk_input_by = '$username'
					and a.risk_status = 1";
	$query = $this->db->query($sql);
		?>

		<div class="col-md-12">
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					Recover Roll Forward Risk 
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
							<option value="low">Low</option>	
							<option value="moderate">Moderate</option>
							<option value="high">High</option>
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
							<option value="very low">Very Low</option>	
							<option value="low">Low</option>
							<option value="medium">Medium</option>
							<option value="high">High</option>
							<option value="very high">Very High</option>
						</select>
						
					</div>											

					<button type="button" id="filterFormSubmit" class="btn blue btn-sm">Search</button>
				</form>
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">Risk ID</th>
						<th width="20%">Risk</th>
						<th width="10%">Risk Level</th>
						<th width="10%">Impact Level</th>
						<th width="10%">Likelihood</th>
						<th width="10%">Risk Owner</th>
						
						<th width="10%">&nbsp;</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
		
		<div class="col-md-12">
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					Recover Risk
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm2" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy2">Filter By</label>
						<select class="form-control input-medium input-sm" id="filterFormBy2">
							<option value="-">Choose</option>
							<option value="risk_event">Risk</option>
							<option value="risk_level">Risk Level</option>
							<option value="risk_impact_level">Impact Level</option>
							<option value="risk_likelihood_key">Likelihood</option>
						</select>
					</div>

					<div class="form-group" id="tr">
						<input type="text" class="pash form-control input-sm" id="pe" placeholder="Insert Filter Value">
					</div>

					<div class="form-group" id="tl">
						<select class="pesh form-control input-sm" id="pl">
							<option value="low">Low</option>	
							<option value="moderate">Moderate</option>
							<option value="high">High</option>
						</select>
						
					</div>

					<div class="form-group" id="ti">
						<select class="pish form-control input-sm" id="pi">
							<option value="insignificant">Insignificant</option>	
							<option value="minor">Minor</option>
							<option value="major">Major</option>
							<option value="moderate">Moderate</option>
							<option value="catasthropic">Catasthropic</option>
						</select>
						
					</div>

					<div class="form-group" id="tk">
						<select class="posh form-control input-sm" id="pk">
							<option value="very low">Very Low</option>	
							<option value="low">Low</option>
							<option value="medium">Medium</option>
							<option value="high">High</option>
							<option value="very high">Very High</option>
						</select>
						
					</div>						
					<button type="button" id="filterFormSubmit2" class="btn blue btn-sm">Search</button>
				</form>	
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax2">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">Risk ID</th>
						<th width="20%">Risk</th>
						<th width="10%">Risk Level</th>
						<th width="10%">Impact Level</th>
						<th width="10%">Likelihood</th>
						<th width="10%">Risk Owner</th>
						
						<th width="10%">&nbsp;</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
					</table>
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
		<div class="clearfix">
		</div>
		
	</div>				
	</div>
	
</div>
<?php
$periode_id = $periode['periode_id'];
$sql_cek_status = "select * from t_risk where periode_id ='$periode_id' and risk_status > 1 and risk_input_by = '$uid' UNION select * from t_risk_change where periode_id ='$periode_id' and risk_status > 1 and risk_input_by = '$uid' ";
$res_cek = $this->db->query($sql_cek_status);

if($res_cek->num_rows() > 0){
	$status_submit = 1 ;
}else{
	$status_submit = 0 ;
}
?>
		<script type="text/javascript">
			var g_status_submit = <?=$status_submit?>;
		</script>