<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Pengelolaan Berita
		</h3>
		<!-- END PAGE HEADER-->
		
		<div class="row">
		<div class="col-md-12">
			<div class="portlet">
			<div class="portlet-title">
				<div class="actions">
					<a href="javascript: location.href='<?=$site_url?>/admini/news/newsInput'" class="btn default green-stripe">
					<i class="fa fa-plus font-green"></i>
					<span class="hidden-480">
					Record Baru</span>
					</a>
				</div>
			</div>
			
			<form class="form-inline" role="form" id="filterForm">
				<div class="form-group">
					<label for="filterFormBy">Filter Dengan</label>
					<select class="form-control input-medium input-sm" id="filterFormBy">
						<option value="title">Judul Berita</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control input-sm" id="filterFormValue" placeholder="Masukkan Nilai Filter">
				</div>
				<button type="button" id="filterFormSubmit" class="btn green btn-sm">Ajukan</button>
			</form>	
			</div>
			
			<div class="portlet-body">
				<?php if(isset($upload_success)) { ?>
				<div class="alert alert-success">
					<strong>Success!</strong> Success Insert dan Upload Berita.
				</div>
				<?php } ?>
				
				<div class="table-container">
					<div class="table-actions-wrapper">
					</div>
					<table class="table table-striped table-bordered" id="datatable_ajax">
					<thead>
					<tr role="row" class="heading">
						<th width="5%">
							 No
						</th>
						<th width="25%">Judul berita</th>
						<th width="25%">Nama File</th>
						<th width="10%">Dibuat Tanggal</th>
						<th width="15%">Dibuat Oleh</th>
						<th width="10%">Dipublish Tanggal</th>
						<th>Status</th>
						<th width="10%">
							 Action
						</th>
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
</div>