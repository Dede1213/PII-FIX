<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Daftar Risiko
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
					<a target="_self" href="javascript:;">Transaksi</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Pelaksanaan Berkala</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="<?=$site_url?>/risk/RiskRegister">Risk Register Berkala</a>
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
		</script>

	<?php
	
	$username = $this->session->credential['username'];
	$this->load->database();
	$sql1="select a.risk_id from t_risk a where  a.periode_id NOT IN (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and a.risk_input_by = '$username'
					and a.risk_id NOT IN(select t2.risk_library_id from t_risk t2 where t2.periode_id = (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and t2.risk_input_by = '$username')
					and a.risk_status >= 0 ";
	
	$sql="select a.risk_id from t_risk a where  a.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and a.risk_input_by = '$username'
					and a.risk_status = 2";

	$sql2="select a.risk_id from t_risk a where  a.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and a.risk_input_by = '$username'
					and a.risk_status >= 0 ";

	$query1 = $this->db->query($sql1);
	$query = $this->db->query($sql);
	$query2 = $this->db->query($sql2);

 if ($query1->num_rows() == 0 && $query2->num_rows() == 0 ){
    $status_submit = "DRAFT";
    $status_spesial = "DRAFSUB1";
 }else if ($query1->num_rows() == 0 && $query->num_rows() >= 1 ){
 	$status_submit = "SUBMIT";
 }else if ($query1->num_rows() >= 1 && $query2->num_rows() == 0 ){
 	$status_submit = "DRAFT"; 
 	$status_spesial = "DRAFSUB1";
 }else if ($query1->num_rows() >= 1 && $query2->num_rows() >= 1 ){
 	$status_submit = "DRAFT"; 
 	$status_spesial = "DRAFSUB1";
 }else if ($query1->num_rows() >= 0 && $query2->num_rows() >= 1 ){
 	$status_submit = "DRAFT"; 
 	$status_spesial = "DRAFSUB";
 }
		?>
		<div class="col-md-12">
			<div class="portlet box grey-silver">
			<div class="portlet-title">
				<div class="caption">
					Risiko dari Periode Sebelumnya
				</div>
				<div style="float:right;font-size:18px;padding:5px;">
					<?php echo $status_submit ; ?>
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter Dengan</label>
						<select class="form-control input-medium input-sm" id="filterFormBy">
							<option value="-">Pilih</option>
							<option value="risk_event">Resiko</option>
							<option value="risk_level">Level Resiko</option>
							<option value="risk_impact_level">Level Dampak</option>
							<option value="risk_likelihood_key">Kemungkinan Keterjadiaan</option>
						</select>
					</div>
					<div class="form-group" id="re">
						<input type="text" class="hash form-control input-sm" id="fe" placeholder="Masukkan Nilai Filter">
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
						<th width="20%">Risiko</th>
						<th width="10%">Level Risiko </th>
						<th width="10%">Level Dampak </th>
						<th width="10%">Kemungkinan Keterjadiaan </th>
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
					Risk Identified in This Periode ( <?=$periode['periode_name']?> )
				</div>

				<?php if($status_submit == 'SUBMIT'){ ?>
 				<div class="actions">
					<a target="_self" class="btn default gray">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					Add New Risk </span>
					</a>
				</div>
			 <?php }else{  ?>

			   <div class="actions">
					<a target="_self" href="<?=$site_url?>/riski/RiskRegister/RiskRegisterInput/periodic" class="btn default green">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					Tambah Risiko</span>
					</a>
				</div>

			 	<?php } ?>

			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm2" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy2">Filter Dengan</label>
						<select class="form-control input-medium input-sm" id="filterFormBy2">
							<option value="-">Pilih</option>
							<option value="risk_event">Resiko</option>
							<option value="risk_level">Level Resiko</option>
							<option value="risk_impact_level">Level Dampak</option>
							<option value="risk_likelihood_key">Kemungkinan Keterjadiaan</option>
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
						<th width="10%">ID Resiko</th>
						<th width="40%">Resiko</th>
						<th width="10%">Level Risiko</th>
						<th width="10%">Level Dampak</th>
						<th width="10%">Kemungkinan Keterjadiaan</th>
						<th width="10%">Pemilik Risiko</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
					</table>
				</div>
				<div class="row">
				<div class="col-md-12 clearfix">
					<?php if ($status_spesial == "DRAFSUB" ){ ?>

					<a href="javascript: ;" id="button-save-submit" class="btn default green pull-right" style="margin-right: 20px;">
					<i class="fa fa-check-circle-o"></i>
					<span class="hidden-480">
					Ajukan </span>
					</a>

	<?php }else if ($status_spesial == "DRAFSUB1" ){ ?>
					<a href="javascript: ;" id="button-save-submit" class="btn default red pull-right" style="margin-right: 20px;">
					<i class="fa fa-check-circle-o"></i>
					<span class="hidden-480">
					Ajukan </span>
					</a>

					<?php }?>

	<?php if ($status_submit == 'DRAFT'){ ?>
		<a href="javascript: ;" id="button-save-draft" class="btn default green pull-right" style="margin-right: 10px;">
					<i class="fa  fa-circle-o"></i>
					<span class="hidden-480">
					Simpan Sebagai Draft </span>
					</a>
		
	<?php }else{ ?>
		<a href="<?=$site_url?>/risk/RiskRegister?status=false" id="" class="btn default red pull-right" style="margin-right: 20px;">
					<i class="fa fa-check-circle-o"></i>
					<span class="hidden-480">
					Ajukan </span>
					</a>
		<a href="javascript: ;" id="button-save-draft" class="btn default green pull-right" style="margin-right: 10px;">
					<i class="fa  fa-circle-o"></i>
					<span class="hidden-480">
					Permintaan Perubahan </span>
					</a>
	<?php
	}	
	?>
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
	<!-- ERROR RISK REGISTER MODE -->
	<div class="row">
	<div class="col-md-12">
		<div class="note note-danger">
			<?php if (isset($submit_mode) && $submit_mode == 'adhoc') { ?>
			<h4 class="block">Error</h4>
			<p>
				 Tidak bisa menginput adhoc risiko karena periode risiko Sudah di input oleh rac. mohon hubungi rac untuk keterangan lebih lanjut.
				 <p>
					<a class="btn red" target="_self" href="<?=$site_url?>/maini">
					Kembali Ke Beranda </a>
				</p>
			</p>
			<?php } else { ?>
			<h4 class="block">Error</h4>
			<p>
				Tidak bisa menginput risiko karena periode risiko belum di input oleh rac. mohon hubungi rac untuk keterangan lebih lanjut.
			</p>
			<p>
				<a class="btn red" target="_self" href="<?=$site_url?>/maini">
				Kembali Ke Beranda </a>
			</p>
			<?php } ?>
		</div>
	</div>
	</div>
	<?php } ?>
	<?php }else{ ?>
		/////////////////////////////////////////////////////////////////////////
			<!-- Warning RISK REGISTER MODE -->
	<div class="row">
	<div class="col-md-12">
		<div class="note note-warning">
			
			<h4 class="block">Warning</h4>
			<p>
				Ro
				 <p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Back to Home </a>
				</p>
			</p>
			
			
		</div>
	</div>
	</div>

	<?php } ?>
	
</div>