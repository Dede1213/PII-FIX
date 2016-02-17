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
					<a target="_self" href="<?=$site_url?>/main">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="<?=$site_url?>/risk/RiskRegister">Tab Permintaan Perubahan</a>
				</li>
			</ul>
		</div>
		<?php 
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$status = $_GET['status'];
		if ($status != 'false'){ ?>


		<?php if ($valid_mode) { ?>
		<script type="text/javascript">
			var g_p_name = '<?=$periode['periode_name']?>';
			var username =  <?php echo "'".$username."'"?>
		</script>

	

		<div class="col-md-12">
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					Risiko dari Periode Sebelumnya
				</div>
				
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter dengan :</label>
						<select class="form-control input-medium input-sm" id="filterFormBy">
							<option value="-">Pilih</option>
							<option value="risk_event">Risiko</option>
							<option value="risk_level">Level Risiko</option>
							<option value="risk_impact_level">Level Dampak</option>
							<option value="risk_likelihood_key">Kemungkinan Keterjadian</option>
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
					Risiko yang Teridentifikasi di Periode ini ( <?=$periode['periode_name']?> ) 
				</div>
				
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm2" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy2">Filter dengan :</label>
						<select class="form-control input-medium input-sm" id="filterFormBy2">
							<option value="-">Pilih</option>
							<option value="risk_event">Risiko</option>
							<option value="risk_level">Level Risiko</option>
							<option value="risk_impact_level">Level Dampak</option>
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
						<th width="10%">Level Dampak</th>
						<th width="10%">Kemungkinan Keterjadian</th>
						<th width="10%">Pemilik Risiko</th>
					</tr>
					</thead>
					<tbody>
					</tbody>



					</table>

				</div>
				<div class="row">
	

		<?php
			error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
			$status = $_GET['status'];
			$this->load->database();
			$sql = "select cr_status from t_cr_risk where created_by = '$username' order by id desc limit 1 ";
			$query = $this->db->query($sql);
			$hasil = $query->row();
			$user = $hasil->cr_status;
			if ($status=='change'){
				
		if ($user != 1){
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
		<?php }
				}
			?>



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
					<img src="<?=$base_url?>assets/images/legend/confirm.png"/> &nbsp; 
					 Terkonfirmasi
				</li>
				<li class="list-group-item">
					<img src="<?=$base_url?>assets/images/legend/submit.png"/> &nbsp; 
					 Menunggu Verifikasi RAC
				</li>
			</ul>

		</div>
		
		</div>
		<div class="clearfix">
		</div>
		
	</div>				
	</div>
	<?php } else { ?>
	<!-- Warning RISK REGISTER MODE -->
	<div class="row">
	<div class="col-md-12">
		<div class="note note-warning">
			<?php if (isset($submit_mode) && $submit_mode == 'adhoc') { ?>
			<h4 class="block">Informasi</h4>
			<p>
				 Tidak bisa menginput Risk Register Adhoc karena periode telah di setting oleh RAC.
				 Silahkan hubungi RAC untuk keterangan lebih lanjut.
				 <p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Kembali ke Beranda </a>
				</p>
			</p>
			<?php } else { ?>
			<h4 class="block">Informasi</h4>
			<p>
				 Tidak bis menginput Risk Register Berkala karena periode belum di setting oleh RAC.
				 Silahkan hubungi RAC untuk keterangan lebih lanjut.
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
	
	<?php }else{ ?>
		
			<!-- Warning RISK REGISTER MODE -->
	<div class="row">
	<div class="col-md-12">
		<div class="note note-warning">
			
			<h4 class="block">Informasi</h4>
			<p>
				Informasi !
				Tidak bisa mengajukan Risk Register Berkala karena masih ada risiko yang belum di review.
				Silahkan review risiko tersebut dan ajukan ulang.
				 <p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Kembali ke Beranda </a>
				</p>
			</p>
			
			
		</div>
	</div>
	</div>

	<?php } ?>
</div>