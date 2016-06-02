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
					<a target="_self" href="<?=$site_url?>/main/mainrac">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Library Management</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Risk</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li class="bread_tab">
					<a id="bread_tab_title" target="_self" href="javascript:;">Risk List Properties</a>
				</li>
			</ul>
			
			 
			
			 
			
			
		</div>
<!-- END PAGE HEADER-->
<!-- BEGIN CONTENT-->
		   
<?php
if($edit_form == false){
?>
		<div class="tabbable-custom ">
			 
			<div class="tab-content">
				<div class="tab-pane active" id="tab_risk_list">
				 
					<div ><!--class="table-scrollable"-->
						<table class="table table-condensed table-bordered table-hover " id="properties">
						<thead>
						<tr role="row" class="heading">
							 
							<th>No</th>
							<th>Name</th>
							<th>Status</th>
							<th>Changed Date</th> 
							
							<th> Action</th>
							
						</tr>

						<?php
						$no = 1;
						foreach ($properties as $row) {
						?>
						<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $row['username']; ?></td>
						<td>
						<?php 
							if($no == 1){
								echo "Created";
							}else{
								echo "Update";
							}
						?>
						</td>
						<td><?php echo $row['date_changed']; ?></td>
						<td>
							<div class="btn-group">
                   <!--
                    <button type="button" class="btn blue btn-xs button-grid-edit" id='button-grid-edit'> <i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-default btn-xs button-grid-delete" ><i class="fa fa-trash-o font-red"></i></button>
                    -->

					<a href="index.php/library/edit_risk_properties/<?=$row['risk_id']?>/<?=$row['username']?>/<?=$row['date_changed']?>" class="btn blue btn-xs button-grid-edit"  ><i class="fa fa-pencil"></i></a>
					<a href="index.php/library/delete_properties/<?=$row['risk_id']?>/<?=$row['username']?>" onclick="return confirm('Are You sure you want to delete this data?')" class="btn btn-default btn-xs button-grid-delete"  ><i class="fa fa-trash-o font-red"></i></a>
					
					
                    </div>
						</td>
						</tr>
						<?php
						$no++;
						}
						?>
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
		<?php
	}
	?>
	<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.button-grid-delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
<?php
if($edit_form == true){
?>

				<form method="post" action="index.php/library/edit_properties"  class="form-horizontal">
					<div class="form-body">
						<div class="form-group">
						<label class="col-md-1 control-label smaller cl-compact">Username</label>
							<div class="col-md-5">
							<input type="hidden" class="form-control input-sm" name="username_asli" value="<?=$username?>">
							<input type="hidden" class="form-control input-sm" name="date_asli" value="<?=$date_change?>">

							<select name="username" class = "form-control">
						<option><?=$username?></option>
						<?php
						$no = 1;
						foreach ($all_username as $row) {
						?>
						<option><?php echo $row['username']; ?></option>
						<?php
						}
						?>
							</select> 
							</div>
						</div>
						 
						<div class="form-group">
						<label class="col-md-1 control-label smaller cl-compact">Changed Date</label>
							<div class="col-md-9">
							<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
							<input type="text" class="form-control input-sm" name="date_change"  readonly  value="<?=$date_change?>">
							<span class="input-group-btn">
							<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
						</div>
						</div>
						</div>
						<br>
						<div style="margin-left:94px;"><button id="#" type="submit" class="btn blue" >Save</button>
						<button id="#" type="submit" class="btn btn-default" >Cancel</button></div>
				</form>			
			
	
<?php
}
?>
		<!-- END CONTENT-->
	</div>
</div>


<!-- FORM BIASA -->


<!-- LIBRARY -->
<div id="modal_listrisk" class="modal fade" tabindex="-1" data-width="860" data-keyboard="false">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Library of Risk</h4>		 
	</div>
	<div class="modal-body">
				<form id="modal-listrisk-form" action="library/edit_properties" role="form" class="form-horizontal">
					<div class="form-body">
				
						<div class="form-group">
						<label class="col-md-2 control-label smaller cl-compact">Username</label>
							<div class="col-md-5">
							<input type="hidden" class="form-control input-sm" name="username_asli" value="">
							<input type="hidden" class="form-control input-sm" name="id_asli" value="">
							<select name="username" class = "form-control">

						<?php
						$no = 1;
						foreach ($all_username as $row) {
						?>
						<option><?php echo $row['username']; ?></option>
						<?php
						}
						?>
							</select> 
							</div>
						</div>
						 
						<div class="form-group">
						<label class="col-md-2 control-label smaller cl-compact">Changed Date</label>
							<div class="col-md-9">
							<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
							<input type="text" class="form-control input-sm" name="date_change"  readonly>
							<span class="input-group-btn">
							<button class="btn default btn-sm" type="button"><i class="fa fa-calendar"></i></button>
							</span>
						</div>
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
			>Save</button>
		<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
	</div>
</div>



