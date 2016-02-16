
			<div class="table-header">
				<center><div class="table-caption"><font = "3"><b> Risk List    </div></center>
			</div>	

<table class="table table-condensed table-bordered table-hover " id="datatable_ajax" border="1">
						  
	<thead>
		<tr role="row" class="heading">
			<th  >AP ID</th>  
			<th  >Action Plan</th>  
			<th  >Action Plan Owner</th>  
		</tr>
	</thead>
	<tbody>
		<?php foreach($datanya as $key):?> 
	 	<tr>  
			<td>AP.<?=$key['id'];?></td>
			<td><?=$key['action_plan'];?></td>
			<td><?=$key['division'];?></td> 
		</tr>
		<?php endforeach;?> 
	</tbody>
</table>