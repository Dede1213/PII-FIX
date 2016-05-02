<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Form Action Plan
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Lihat Action Plan</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<?php if ($valid_mode) { ?>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						Form Risiko
					</div>
				</div>
				
				<div class="portlet-body form">
					<form id="input-form" role="form" class="form-horizontal">
						<div class="form-body">
							<div class="row">
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">ID Risiko</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_code']?>" name="risk_id" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Pemilik Risiko</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_owner_v']?>" name="risk_id" placeholder="">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_event" placeholder=""><?=$risk['risk_event']?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact">Deskripsi Perisitwa Risiko</label>
									<div class="col-md-9">
									<textarea class="form-control input-readview" readonly="true" rows="3" name="risk_description" placeholder=""><?=$risk['risk_description']?></textarea>
									</div>
								</div>
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Level Dampak</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['impact_level_v']?>" name="risk_impact_level_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label smaller cl-compact" >Kemungkinan Keterjadian</label>
									<div class="col-md-9">
										<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['likelihood_v']?>" name="risk_likelihood_value" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<input type="hidden" name="risk_level_id" value=""/>
									<label class="col-md-3 control-label smaller cl-compact" >Level Risiko</label>
									<div class="col-md-9">
									<input type="text" class="form-control input-sm input-readview" readonly="true" value="<?=$risk['risk_level_v']?>" name="risk_level" placeholder="">
									</div>
								</div>
							</div>
							</div>
						
							<h4>Action Plan yang ditugaskan</h4>
							<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th>AP ID</th>
									<th>Action Plan yang ditugaskan</th>
									<th>Batas Waktu</th>
									<th>Pemilik Action Plan</th>
									<th>Status Action Plan</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td><?=$action_plan['act_code']?></td>
										<td><?=$action_plan['action_plan']?></td>
										<td><?=$action_plan['due_date_v']?></td>
										<td><?=$action_plan['division_v']?></td>
										<td><?=$row['status_act']?></td>
									</tr>
								</tbody>
							</table>
							
							<hr/>
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
				<h4 class="block">Informasi</h4>
				<p>
					 Tidak diperbolehkan untuk melihat risiko.
				</p>
				<p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Kembali ke Beranda </a>
				</p>
			</div>
		</div>
		</div>
		<?php } ?>
	</div>
</div>