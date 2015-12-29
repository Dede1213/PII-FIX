<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Laporan <small>Laporan Risiko</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main/mainrac">Laporan</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Daftar Top Ten Risiko</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN CONTENT-->
		<div class="row">
		<div class="col-md-12">
			<div class="form">
				<form class="form-horizontal">		
					<div class="form-group">
						<label class="col-md-3 control-label">Tipe Laporan</label>
							<div class="col-md-6">
								<select class="form-control input-sm" id="typereport">
									<option value="-">Pilih</option>
									<option value="excel">MS. Excel</option>
									<option value="pdf">PDF</option>
		<!-- 							<option value="word">MS. Word</option> -->
								</select>
							</div>
					</div>
				</form>
			</div>
			<div class="form" id="forexcel">
				<form target="_self" action="<?=$site_url?>/report/risk/toptenrisk" method="post" id="input-form" role="form" class="form-horizontal">
					<div class="form-body">


						<div class="form-actions right">
							<button id="input-form-submit-button" type="submit" 
								class="btn blue ladda-button"
								 data-style="expand-right"
								>Submit</button>
						</div>
					</div>
				</form>
			</div>

			<div class="form" id="forpdf">
				<form target="_self" action="<?=$site_url?>/report/risk/toptenpdf" method="post" id="input-form" role="form" class="form-horizontal">
					<div class="form-body">


						<div class="form-actions right">
							<button id="input-form-submit-button" type="submit" 
								class="btn blue ladda-button"
								 data-style="expand-right"
								>Submit</button>
						</div>
					</div>
				</form>
			</div>

			<div class="form" id="forword">
				<form target="_self" action="<?=$site_url?>/report/risk/toptenpdf" method="post" id="input-form" role="form" class="form-horizontal">
					<div class="form-body">


						<div class="form-actions right">
							<button id="input-form-submit-button" type="submit" 
								class="btn blue ladda-button"
								 data-style="expand-right"
								>Submit</button>
						</div>
					</div>
				</form>
			</div>						
		</div>	
		</div>		
		<!-- END CONTENT-->
	</div>
</div>
