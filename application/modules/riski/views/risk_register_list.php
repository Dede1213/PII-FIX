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
					<a target="_self" href="javascript:;">Transaksi</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Pelaksaan Berkala</a>
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

	$sql_baru="select 
					a.created_by,
					a.created_date,
					a.existing_control_id,
					a.periode_id,
					a.risk_2nd_sub_category,
					a.risk_category,
					a.risk_cause,
					a.risk_code,
					a.risk_control_owner,
					a.risk_date,
					a.risk_description,
					a.risk_division,
					a.risk_evaluation_control,
					a.risk_event,
					a.risk_existing_control,
					a.risk_id,
					a.risk_impact,
					a.risk_impact_level,
					a.risk_input_by,
					a.risk_input_division,
					a.risk_level,
					a.risk_library_id,
					a.risk_likelihood_key,
					a.risk_owner,
					a.risk_sub_category,
					a.risk_treatment_owner,
					a.suggested_risk_treatment,
					a.switch_flag,
					b.ref_value as risk_status_v,
					c.ref_value as risk_level_v,
					d.ref_value as impact_level_v,
					e.l_title as likelihood_v,
					m_periode.periode_end,
					f.division_name as risk_owner_v,
					IF(m_periode.periode_end <= '".$date."', '0', a.risk_status) AS risk_status 
					from t_risk a
					left join m_reference b on a.risk_status = b.ref_key and b.ref_context = 'risk.status.user'
					left join m_reference c on a.risk_level = c.ref_key and c.ref_context = 'risklevel.display'
					left join m_reference d on a.risk_impact_level = d.ref_key and d.ref_context = 'impact.display'
					left join m_likelihood e on a.risk_likelihood_key = e.l_key
					left join m_division f on a.risk_owner = f.division_id
					join m_periode on m_periode.periode_id = a.periode_id
					where 
					a.periode_id NOT IN (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end)
					and a.risk_id NOT IN(select t2.risk_library_id from t_risk t2 where t2.periode_id = (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and t2.risk_input_by = '$username' and t2.risk_library_id is not null)
					and a.existing_control_id is null
					and a.risk_input_by = '$username' ";

	$sql1="select a.risk_id from t_risk a where  a.periode_id NOT IN (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and a.risk_input_by = '$username'
					and a.risk_id NOT IN(select t2.risk_library_id from t_risk t2 where t2.periode_id = (select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) and t2.risk_input_by = '$username')
					and a.risk_status >= 0 and existing_control_id != 1 ";
	
	$sql="select a.risk_id from t_risk a 
	where  a.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) 
	and a.risk_input_by = '$username'
	and a.risk_status >= 2
	UNION
	select b.risk_id from t_risk_change b
	where b.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) 
	and b.risk_input_by = '$username'
	and b.risk_status >= 2 
	and b.risk_id NOT IN (select z.risk_id from t_risk z where z.risk_id = b.risk_id and z.risk_input_by = '$username' and z.risk_status >= 2)";

	$sql2="select a.risk_id from t_risk a 
	where  a.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) 
	and a.risk_input_by = '$username'
	and a.risk_status >= 0
	UNION
	select b.risk_id from t_risk_change b
	where b.periode_id IN(select periode_id from m_periode where DATE(NOW()) between periode_start and periode_end) 
	and b.risk_input_by = '$username'
	and b.risk_status >= 0 
	and b.risk_id NOT IN (select z.risk_id from t_risk z where z.risk_id = b.risk_id and z.risk_input_by = '$username' and z.risk_status >= 0)";

	

	$query = $this->db->query($sql);
	$query1 = $this->db->query($sql1);
	$query2 = $this->db->query($sql2);

	$query_baru = $this->db->query($sql_baru);
	

 if ($query1->num_rows() == 0 && $query2->num_rows() == 0 ){
    $status_submit = "DRAFT";
    $status_spesial = "DRAFSUB1";
 }else if ($query_baru->num_rows() == 1){
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
					Risk dari periode sebelumnya.
				</div>
				<div style="float:right;font-size:18px;padding:5px;">
					<?php echo $status_submit ; ?>
				</div>
			</div>
			
			<div class="portlet-body">
				<form class="form-inline" role="form" id="filterForm" style="margin-bottom: 10px;">
					<div class="form-group">
						<label for="filterFormBy">Filter dengan : </label>
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
							<option value="insignificant">Tidak Significant</option>	
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
						<th width="10%">Kemungkinan terjadinya</th>
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
				<?php if($status_submit == 'SUBMIT'){ ?>
 				<div class="actions">
					<a target="_self" class="btn default gray">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					Tambah Risiko Baru </span>
					</a>
				</div>
			 <?php }else{  ?>

			   <div class="actions">
					<a target="_self" href="<?=$site_url?>/riski/RiskRegister/RiskRegisterInput/periodic" class="btn default green">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					Tambah Risiko Baru </span>
					</a>
				</div>

			 	<?php } ?>
				
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
						<th width="10%">Risiko ID</th>
						<th width="40%">Risiko</th>
						<th width="10%">Level Risiko</th>
						<th width="10%">Level Dampak</th>
						<th width="10%">Kemungkinan terjadinya</th>
						<th width="10%">Pemilik Risiko</th>
					</tr>
					</thead>
					<tbody>
					</tbody>



					</table>

				</div>
				<div class="row">
	<?php
	$sql="select id from t_cr_risk where created_by='$username' and cr_type='Risk Register' and cr_status = 0 ";
	$sql_cek = $this->db->query($sql);
	if ($sql_cek->num_rows() > 0 ){

	}else{
	?>
	 
				<div class="col-md-12 clearfix">
	<?php if ($status_spesial == "DRAFSUB" ){ ?>

					<a href="javascript: ;" id="button-save-submit" class="btn default green pull-right" style="margin-right: 20px;">
					<i class="fa fa-check-circle-o"></i>
					<span class="hidden-480">
					Ajukan </span>
					</a>

	<?php }else if ($status_spesial == "DRAFSUB1" ){ ?>
					<a href="javascript: ;" id="" class="btn default red pull-right" style="margin-right: 20px;">
					<i class="fa fa-check-circle-o"></i>
					<span class="hidden-480">
					Ajukan </span>
					</a>

					<?php }?>

	<?php if ($status_submit == 'DRAFT'){ ?>
		<a href="javascript: ;" id="button-save-draft" class="btn default green pull-right" style="margin-right: 10px;">
					<i class="fa  fa-circle-o"></i>
					<span class="hidden-480">
					Simpan sebagai draft </span>
					</a>
		
	<?php }else{ ?>
		<a href="<?=$site_url?>/risk/RiskRegister?status=false" id="" class="btn default red pull-right" style="margin-right: 20px;">
					<i class="fa fa-check-circle-o"></i>
					<span class="hidden-480">
					Ajukan </span>
					</a>
		<a href="javascript: ;" id="button-change-request" class="btn default green pull-right" style="margin-right: 10px;">
					<i class="fa  fa-circle-o"></i>
					<span class="hidden-480">
					Permintaan Perubahan </span>
					</a>
	<?php
	}	
	?>
	</div>
	<?php
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
				 Tidak bisa menginput Risk Register Berkala Adhoc karena periode telah di setting oleh RAC.
				 Silahkan hubungi RAC untuk keterangan lebih lanjut.
				 <p>
					<a class="btn red" target="_self" href="<?=$site_url?>/main">
					Kembali ke Beranda </a>
				</p>
			</p>
			<?php } else { ?>
			<h4 class="block">Informasi</h4>
			<p>
				 Tidak bisa menginput Risk Register Berkala karena periode belum disetting oleh RAC.
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
				Tidak bisa mengajukan Risk Register Berkala karena masih ada risiko yang belum direview.
				Silahkan di cek dan review risiko lalu ajukan kembali.
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