<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Risk Register Berkala
		</h3>
		<!-- END PAGE HEADER-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main/mainrac">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="<?=$site_url?>/main/mainrac/riskRegister/<?=$filled_by_id?>">Risk Register Berkala</a>
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
					Daftar Resiko 
				</div>
				<div style="float:right;font-size:18px;padding:4px;">
					<?=$filled_by_id?> 
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter dengan :</label>
						<select class="form-control input-medium input-sm" id="filterFormBy">
							<option value="risk_event">Risiko</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-sm" id="filterFormValue" placeholder="Masukkan Nilai Filter">
					</div>
					<button type="button" id="filterFormSubmit" class="btn blue btn-sm">Cari</button>
				</form>
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">ID Risiko</th>
						<th width="20%">Risiko</th>
						<th width="10%">Level Risiko</th>
						<th width="10%">Level Dampak</th>
						<th width="10%">Kemungkinan Keterjadian</th>
						<th width="10%">Pemilik Risiko</th>
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
					Daftar Resiko Dari Library
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm2" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter dengan :</label>
						<select class="form-control input-medium input-sm" id="filterFormBy2">
							<option value="risk_event">Risiko</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-sm" id="filterFormValue2" placeholder="Masukkan Nilai Filter">
					</div>
					<button type="button" id="filterFormSubmit2" class="btn blue btn-sm">Cari</button>
				</form>	
				
				<div class="table-container">
					<table class="table table-striped table-bordered " id="datatable_ajax2">
					<thead>
					<tr role="row" class="heading">
						<th width="10%">Status</th>
						<th width="10%">ID Risiko</th>
						<th width="40%">Risiko</th>
						<th width="10%">Level Risiko</th>
						<th width="10%">Dampak Risiko</th>
						<th width="10%">Kemungkinan Keterjadian</th>
						<th width="10%">Pemilik Risiko</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
					</table>
				</div>

				<div class="row">
				<div class="col-md-12 clearfix">

		<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			$status = $_GET['status'];
			if ($status=='change'){
				?>
			
	
		

		<a href="javascript: ;" id="button-change-ignore" class="btn default red pull-right" style="margin-right: 10px;">
					<i class="fa  fa-circle-o"></i>
					<span class="hidden-480">
					Tolak </span>
					</a>
		<a href="javascript: ;" id="button-change-verify" class="btn default green pull-right" style="margin-right: 10px;">
					<i class="fa  fa-circle-o"></i>
					<span class="hidden-480">
					Verifikasi </span>
					</a>

					<?php } ?>
	
				</div>
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
					 Menunggu Verifikasi RAC
				</li>
				<li class="list-group-item">
					<img src="<?=$base_url?>assets/images/legend/verified.png"/> &nbsp; 
					 Terverifikasi RAC
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
			<h4 class="block">Informasi</h4>
			<p>
				 Tidak bisa menginput Risk Register Berkala Adhoc karena periode telah di setting oleh RAC.
				 Silahkan hubungi RAC untuk penjelasan lebih lanjut.
				 <p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Kembali ke Beranda </a>
				</p>
			</p>
			<?php } else { ?>
			<h4 class="block">Error</h4>
			<p>
				 Tidak bisa menginput Risk Register Berkala karena periode belum di setting oleh RAC.
				 Silahkan hubungi RAC untuk penjelasan lebih lanjut.
			</p>
			<p>
				<a class="btn red" target="_self" href="<?=$site_url?>/main">
				Kembali ke Beranda </a>
			</p>
			<?php } ?>
		</div>
	</div>
	</div>
	<?php } ?>
</div>