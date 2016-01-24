<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Report <small> </small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main/mainrac">Report</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Risk Map</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN CONTENT-->
		<div class="row">
		<div class="col-md-12">
			<div class="form">
				<form class="form-horizontal" action = "<?php echo base_url('index.php/report/risk/riskmap_data_excel');?>" method = "post">		
					<div class="form-group">
						<label class="col-md-3 control-label">Periode</label>
							<div class="col-md-6">
								<select class="form-control input-sm" id="periode" name = "periode">
									<?php foreach($periodenya as $key):?>
									<option value = "<?php echo $key['periode_id'];?>"><?php echo $key['periode_name'];?></option> 
									<?php endforeach;?>
								</select>
							</div>
					</div>
					<div class="form-actions right">
						<button id="input-form-submit-button" type="submit" 
							class="btn blue ladda-button"
							 data-style="expand-right"
							>Submit</button>
					</div>
				</form>
			</div>
			 					
		</div>	
		
		</div>		
		<!-- END CONTENT-->
	</div>
</div>
