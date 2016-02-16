<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Dashboard <small>reports &amp; statistics</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a target="_self" href="<?=$site_url?>/main/mainrac">Beranda</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Pengaturan Library</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Risiko</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Daftar Kontrol Eksisting</a>
				</li>
			</ul>
			
			 <div class="page-toolbar">
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
					Export <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_ec_pdf");?>">PDF</a>
						</li>
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_ec_excel");?>">Excel</a>
						</li>
					 
					</ul>
				</div>
			</div>
			 
			
		</div>
<!-- END PAGE HEADER-->
<!-- BEGIN CONTENT-->
		    
		<div class="tabbable-custom ">
			 
			<div class="tab-content">
				<div class="tab-pane active" id="tab_risk_list">
				    <button id="button-add-ec" class="btn green btn-sm" type="button" style="margin-bottom: 10px;"  >Tambah Kontrol Eksisting</button>
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatableec_ajax">
						<thead>
						<tr role="row" class="heading">
							 
							<th>ID Kontrol Eksisting</th>
							<th>Kontrol Eksisting</th>
							<th>Evaluasi atas Eksisting Kontrol</th>
							<th>Pemilik Kontrol</th> 
							<th></th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						</table>
					</div>
					<hr/>
					<div class="row">
					 
					</div>
				</div>
				  
			</div>
			
		</div>
		<!-- END CONTENT-->
	</div>
</div>


<!-- LIBRARY -->
<div id="modal_listrisk" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Library Kontrol Eksisting</h4>		 
	</div>
	<div class="modal-body">
				<form id="modal-listrisk-form" role="form" class="form-horizontal">
					<div class="form-body">
				
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">ID Kontrol Eksisting  :</label>
							<div class="col-md-9">
							<input class="form-control input-sm input-readview" type="text" placeholder="" name="id" id = "id" readonly="true"  >
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Kontrol Eksisting   :</label>
							<div class="col-md-9">
							<input type = "text" name = "risk_existing_control" id = "risk_existing_control" class = "form-control">  
							</div>
						</div>
						
						<div class="form-group">
								<label class="col-md-3 control-label">Evaluasi atas Eksisting Kontrol :</label>
							 
									<div class="col-md-9">
										<textarea class="form-control" name="risk_evaluation_control" id = "risk_evaluation_control"></textarea>										 
									</div> 
							 
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Pemilik Kontrol :</label>
							<div class="col-md-9">
							<select name="risk_control_owner"  class="form-control" id = "risk_control_owner"> 
							</select>							 
							</div>
						</div>
					
						 
					</div>
				</form>			
		<br>			
	</div>
	<div class="modal-footer">
		<button id="library-modal-listriskec-update" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Simpan</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	</div>
</div>


