<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Entri KRI
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
					<a target="_self" href="javascript:;">Entri KRI</a>
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<div class="row">
		<div class="col-md-12">
			<form id="input-form" role="form" class="form-horizontal">
				<div class="form-body">
					<div class="form-group">
						<input type="hidden" name="risk_library_id" id="risk_library_id" value=""/>
						<label class="col-md-2 control-label">ID Risiko</label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" class="form-control input-sm" readonly="true" name="risk_library_code" placeholder="">
								<span class="input-group-btn">
								<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-library"><i class="fa fa-search fa-fw"/></i></button>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Peristiwa Risiko</label>
						<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_event" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Level Resiko</label>
						<div class="col-md-6">
						<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_level" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Penanganan Risiko</label>
						<div class="col-md-6">
							<input type="text" class="form-control input-sm input-readview" readonly="true" name="risk_treatment" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Action Plan</label>
						<div class="col-md-8">
							<table id="action_plan_table" class="table table-condensed table-bordered table-hover">
								<thead>
								<tr role="row" class="heading">
									<th>Action Plan</th>
									<th>Batas Waktu</th>
									<th>Pemilik Action Plan</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
			<hr/>
			<div class="form">
			<form id="kri-form" role="form" class="form-horizontal">
			<input type="hidden" name="kri_id" value=""/>
			<input type="hidden" name="risk_id" id="kri-risk-id" value=""/>
			<div class="form-body">
				<div class="form-group">
					<input type="hidden" name="kri_library_id" value=""/>
					<label class="col-md-2 control-label">ID KRI</label>
					<div class="col-md-6">
						<div class="input-group">
							<input type="text" class="form-control input-sm" readonly="true" name="kri_library_code" placeholder="">
							<span class="input-group-btn">
							<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" href="#modal-kri"><i class="fa fa-search fa-fw"/></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Indikator Key Risk</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm" name="key_risk_indicator" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Threshold</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm" name="treshold" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Tipe Treshold</label>
					<div class="col-md-6">
					<select class="form-control input-sm" id="select-treshold-type" name="treshold_type">
						<option value="SELECTION">Selection</option>
						<option value="VALUE">Value</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">&nbsp;</label>
					<div class="col-md-8">
						<button class="btn green btn-sm" style="margin-bottom: 10px;" type="button" id="button-kri-open-treshold">Tambah Treshold</button>
						<table id="treshold_table" class="table table-condensed table-bordered table-hover">
							<thead>
							<tr role="row" class="heading">
								<th>Operator</th>
								<th>Nilai 1</th>
								<th>Nilai 2</th>
								<th>Tipe Nilai</th>
								<th>Hasil</th>
								<th> &nbsp; </th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label">Timing Pelaporan</label>
					<div class="col-md-8">
					<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
						<input type="text" class="form-control input-sm" name="timing_pelaporan" readonly>
						<span class="input-group-btn">
						<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
						</span>
					</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Pemilik KRI</label>
					<div class="col-md-8">
					<select class="form-control input-sm" name="kri_owner">
						<?php foreach($division_list as $row) { ?>
						<option value="<?=$row['ref_key']?>"><?=$row['ref_value']?></option>
						<?php } ?>
					</select>
					</div>
				</div>
			</div>
			<div class="form-actions right">
				<button id="kri-button-save" type="button" class="btn blue"><i class="fa fa-circle-o"></i> Simpan</button>
				<button type="button" class="btn yellow" id="kri-button-cancel"><i class="fa fa-times"></i> Batal</button>
			</div>
			</form>
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
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="cari...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-library-filter-submit">Cari</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="library_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>ID Risiko</th>
					<th>Perisitiwa Risiko</th>
					<th>Deskripsi</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<!-- KRI LIBRARY -->
<div id="modal-kri" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Library KRI</h4>
		<div class="inputs">
			<div class="portlet-input input-inline">
				<div class="input-group">
					<input type="text" class="form-control" name="filter_search" placeholder="cari...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="button" id="modal-kri-filter-submit">Cari</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-body">
		<div>
			<table id="kri_library_table" class="table table-condensed table-bordered table-hover">
				<thead>
				<tr role="row" class="heading">
					<th width="66px">&nbsp;</th>
					<th>ID KRI</th>
					<th>Indikator Key Risk </th>
					<th>Threshold</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<!-- KRI Treshold BY SELECTION -->
<div id="modal-treshold-selection" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Treshold</h4>
	</div>
	<div class="modal-body">
		<form id="kri-form-selection" role="form" class="form-horizontal">
			<input type="hidden" name="operator" value="EQUAL" />
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Nilai</label>
					<div class="col-md-6">
					<input type="text" class="form-control input-sm input-readview" name="value-equal" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Hasil</label>
					<div class="col-md-6">
					<select class="form-control input-sm" name="result">
						<option value="GREEN">Green</option>
						<option value="YELLOW">Yellow</option>
						<option value="RED">Red</option>
					</select>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button id="button-treshold-selection-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
	</div>
</div>

<!-- KRI Treshold BY VALUE -->
<div id="modal-treshold-value" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Tambah Treshold</h4>
	</div>
	<div class="modal-body">
		<form id="kri-form-value" role="form" class="form-horizontal">
			<div class="form-body row">
				<div class="col-md-6">
					<h4 style="margin-top: 0;">Numeric Treshold</h4>
					<div class="form-group">
						<input type="hidden" name="value-below-2" value='-'>
						<input type="hidden" name="value-below-oper_v" value='Below'>
						<input type="hidden" name="value-below-oper" value='BELOW'>
						<input type="hidden" name="value-below-value_type" value='NUMERIC'>
						
						<label class="col-md-2 control-label">Below</label>
						<div class="col-md-7" style="padding-right: 0px;">
						<input type="number" class="form-control input-sm input-readview" name="value-below-1" placeholder="">
						</div>
						<div class="col-md-3">
							<select class="form-control input-sm" name="value-below-result">
								<option value="GREEN">Green</option>
								<option value="YELLOW">Yellow</option>
								<option value="RED">Red</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="value-between-oper_v" value='Between'>
						<input type="hidden" name="value-between-oper" value='BETWEEN'>
						<input type="hidden" name="value-between-value_type" value='NUMERIC'>
						
						<label class="col-md-2 control-label">Between</label>
						<div class="col-md-7" style="padding-right: 0px;">
							<div class="input-group">
								<input type="number" class="form-control input-sm" name="value-between-1">
								<span class="input-group-addon" style="min-width: 10px; padding: 0;"></span>
								<input type="number" class="form-control input-sm" name="value-between-2">
							</div>
						</div>
						<div class="col-md-3">
							<select class="form-control input-sm" name="value-between-result">
								<option value="GREEN">Green</option>
								<option value="YELLOW">Yellow</option>
								<option value="RED">Red</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="value-above-2" value='-'>
						<input type="hidden" name="value-above-oper_v" value='Above'>
						<input type="hidden" name="value-above-oper" value='ABOVE'>
						<input type="hidden" name="value-above-value_type" value='NUMERIC'>
						
						<label class="col-md-2 control-label">Above</label>
						<div class="col-md-7" style="padding-right: 0px;">
						<input type="number" class="form-control input-sm input-readview" name="value-above-1" placeholder="">
						</div>
						<div class="col-md-3">
							<select class="form-control input-sm" name="value-above-result">
								<option value="GREEN">Green</option>
								<option value="YELLOW">Yellow</option>
								<option value="RED">Red</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6" id="t-col-right-treshold">
					<h4 style="margin-top: 0;"><input type="checkbox" id="is_percentage_treshold" value="1" /> Persentase Treshold</h4>
					<div class="form-group">
						<input type="hidden" name="perc-below-2" value='-'>
						<input type="hidden" name="perc-below-oper_v" value='Below'>
						<input type="hidden" name="perc-below-oper" value='BELOW'>
						<input type="hidden" name="perc-below-value_type" value='PERCENTAGE'>
						
						<label class="col-md-2 control-label">Below</label>
						<div class="col-md-7" style="padding-right: 0px;">
						<input type="number" class="form-control input-sm" name="perc-below-1" placeholder="" disabled="true">
						</div>
						<div class="col-md-3">
							<select class="form-control input-sm" name="perc-below-result" disabled="true">
								<option value="GREEN">Green</option>
								<option value="YELLOW">Yellow</option>
								<option value="RED">Red</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="perc-between-oper_v" value='Between'>
						<input type="hidden" name="perc-between-oper" value='BETWEEN'>
						<input type="hidden" name="perc-between-value_type" value='PERCENTAGE'>
						
						<label class="col-md-2 control-label">Between</label>
						<div class="col-md-7" style="padding-right: 0px;">
							<div class="input-group">
								<input type="number" class="form-control input-sm" name="perc-between-1" disabled="true">
								<span class="input-group-addon" style="min-width: 10px; padding: 0;"></span>
								<input type="number" class="form-control input-sm" name="perc-between-2" disabled="true">
							</div>
						</div>
						<div class="col-md-3">
							<select class="form-control input-sm" name="perc-between-result" disabled="true">
								<option value="GREEN">Green</option>
								<option value="YELLOW">Yellow</option>
								<option value="RED">Red</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="perc-above-2" value='-'>
						<input type="hidden" name="perc-above-oper_v" value='Above'>
						<input type="hidden" name="perc-above-oper" value='ABOVE'>
						<input type="hidden" name="perc-above-value_type" value='PERCENTAGE'>
						
						<label class="col-md-2 control-label">Above</label>
						<div class="col-md-7" style="padding-right: 0px;">
						<input type="number" class="form-control input-sm" name="perc-above-1" placeholder="" disabled="true">
						</div>
						<div class="col-md-3">
							<select class="form-control input-sm" name="perc-above-result" disabled="true">
								<option value="GREEN">Green</option>
								<option value="YELLOW">Yellow</option>
								<option value="RED">Red</option>
							</select>
						</div>
					</div>
				</div>
				
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button id="button-treshold-value-add" type="button" 
			class="btn blue ladda-button"
			 data-style="expand-right"
			>Tambah</button>
	</div>
</div>
