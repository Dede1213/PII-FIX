<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pengaturan KRI
		</h3>
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
					<a target="_self" href="javascript:;">Penetapan KRI</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a target="_self" href="javascript:;">Pengaturan KRI</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<h4>Daftar Risiko KRI</h4>
				</div>
				<div class="col-md-6 clearfix">
					<a id="add-risk-button" class="btn default green pull-right btn-sm">
					<i class="fa fa-plus"></i>
					<span class="hidden-480">
					Tambah Risiko </span>
					</a>
				</div>
			</div>
			<div>
				<table id="datatable_ajax" class="table table-condensed table-bordered table-hover">
					<thead>
					<tr role="row" class="heading">
						<th><small>ID Risiko</small></th>
						<th><small>Peristiwa Risiko</small></th>
						<th><small>Level Risiko</small></th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
</div>

<!-- LIBRARY -->
<div id="modal-library" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Library Risiko</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="col-md-6 input-group">
					<select class="form-control input-sm" name="filter_search">
						<option value="HIGH">Tinggi</option>
						<option value="MODERATE">Sedang</option>
						<option value="LOW">Rendah</option>
					</select>
					<span class="input-group-btn">
					<button class="btn btn-default btn-sm" type="button" id="modal-library-filter-submit">Cari</button>
					</span>
				</div>
				<!--
				<div class="checkbox-list">
					<label class="checkbox-inline">
					<input type="checkbox" id="checkbox_high" class="checkbox_selectClass" value="HIGH"> Tinggi </label>
					<label class="checkbox-inline">
					<input type="checkbox" id="checkbox_moderate" class="checkbox_selectClass" value="MODERATE"> Sedang </label>
					<label class="checkbox-inline">
					<input type="checkbox" id="checkbox_low" class="checkbox_selectClass" value="LOW"> Rendah </label>
				</div>
				-->
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="2%">
						<input type="checkbox" class="group-checkable">
					</th>
					<th>No</th>
					<th>ID Risiko</th>
					<th>Perisitiwa Risiko</th>
					<th>Level Risiko</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	<div class="modal-footer">
		<button id="library-modal-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
	</div>
</div>
