
			<div class="table-header">
				<center><div class="table-caption"><font = "3"><b> Library Of Objective    </div>
			</div>	

<table class="table table-condensed table-bordered table-hover " id="datatable_ajax" border="1">
						  
	<thead>
		<tr role="row" class="heading">
			<th  >Objective ID</th>  
			<th  >Objective</th>  
		</tr>
	</thead>
	<tbody>
		<?php foreach($datanya as $key):?> 
	 	<tr>  
			<td><?=$key['id'];?></td>
			<td><?=$key['objective'];?></td>
		</tr>
		<?php endforeach;?> 
	</tbody>
</table>