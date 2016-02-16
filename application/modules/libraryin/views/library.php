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
					<a id="bread_tab_title" target="_self" href="javascript:;">Daftar Risiko</a>
				</li>
			</ul>
			 <div class="page-toolbar">
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
					Ekspor <i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_risk_pdf");?>">PDF</a>
						</li>
						<li>
							<a  target="_blank" href="<?php echo base_url("index.php/library/list_risk_excel");?>">Excel</a>
						</li>
					 
					</ul>
				</div>
			</div> 
			
			 
			
			
		</div>
<!-- END PAGE HEADER-->
<!-- BEGIN CONTENT-->
		   
 	<!-- Modal -->
		<div class="modal fade" id="modal-changereq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Daftar Permintaan Perubahan - Pilih kolom untuk di Ekspor</h4>
			  </div>
			  <div class="modal-body">
				<form id = "get_check_changereq">
					<tr role="row" class="heading">
						<th width="30px">Status <input type = "checkbox" checked="true"  name = "GenRowNum" ></th>
						<th>ID CH<input type = "checkbox" checked="true"  name = "cr_code"  > </th>
						<th>Perubahan pada<input type = "checkbox" checked="true"  name = "cr_type"  > </th> 
						<th>Pemohon<input type = "checkbox" checked="true"  name = "created_by_v"  > </th> 
						<th>Status Permintaan Perubahan<input type = "checkbox" checked="true"  name = "cr_status"  > </th>  						 
					</tr>
				</form>							 
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button class = "btn btn-success" id = "changereq_list_excel">Ekspor ke Excel</button>
				<button class = "btn btn-success" id = "changereq_list_pdf" >Ekspor ke PDF</button>
			  </div>
			</div>
		  </div>
		</div>
		

		<div class="tabbable-custom ">
			 
			<div class="tab-content">
				<div class="tab-pane active" id="tab_risk_list">
				 
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="datatable_ajax">
						<thead>
						<tr role="row" class="heading">
							 
							<th>ID Risiko</th>
							<th>Peristiwa Risiko</th>
							<th>Deskripsi Peristiwa Risiko</th>
							<th>Sebab</th> 
							<th>Dampak</th>
							<th>Kategori Risiko</th>
							<th>Sub Kategori Risiko</th>
							<th>Sub Kategori Risiko Level 2</th> 
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
		<h4 class="modal-title">Library Risiko</h4>		 
	</div>
	<div class="modal-body">
				<form id="modal-listrisk-form" role="form" class="form-horizontal">
					<div class="form-body">
				
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">ID Risiko :</label>
							<div class="col-md-9">
							<input class="form-control input-sm input-readview" type="text" placeholder="" name="risk_id" readonly="true">
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Peristiwa Risiko :</label>
							<div class="col-md-9">
							<textarea name="risk_event" class = "form-control"></textarea> 
							</div>
						</div>
						 
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Deskripsi Peristiwa Risiko :</label>
							<div class="col-md-9">
							<textarea name="risk_description" class = "form-control"></textarea>  
							</div>
						</div>
						
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Sebab :</label>
							<div class="col-md-9">
							<textarea name="risk_cause" class = "form-control"></textarea> 
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Dampak :</label>
							<div class="col-md-9">
							<textarea name="risk_impact" class = "form-control"></textarea> 
							</div>
						</div>
						
						<!--<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Risk category :</label>
							<div class="col-md-9">
							<select name="cat_name"  class="form-control" id = "cat_name"> 
							</select>							 
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Risk Sub category :</label>
							<div class="col-md-9">
							<select name="cat_name"  class="form-control" id = "cat_name"> 
							</select>							 
							</div>
						</div>
						
						<div class="form-group">
						 
						<label class="col-md-3 control-label smaller cl-compact">Risk 2nd Sub category :</label>
							<div class="col-md-9">
							<select name="cat_name"  class="form-control" id = "cat_name"> 
							</select>							 
							</div>
						</div>-->
						
						<div class="form-group">
							<label class="col-md-3 control-label smaller cl-compact" >Kategori Risiko<span class="required">* </span></label>
							<div class="col-md-9">
							<select class="form-control input-sm"  id="sel_risk_category" name = "risk_category" > 
							 
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label smaller cl-compact" >Sub Kategori Risiko<span class="required">* </span></label>
							<div class="col-md-9">
							<select class="form-control input-sm"  id="sel_risk_sub_category" name = "risk_sub_category">
							 
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label small cl-compact" >Sub Kategori Risiko Level 2<span class="required">* </span></label>
							<div class="col-md-9">
							<select class="form-control input-sm" name="cat_name" id="sel_risk_2nd_sub_category">
							 
							</select>
							</div>
						</div>
					
						 
					</div>
				</form>			
		<br>			
	</div>
	<div class="modal-footer">
		<button id="library-modal-listrisk-update" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Simpan</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	</div>
</div>


