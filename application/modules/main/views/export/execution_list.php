<table class="table table-condensed table-bordered table-hover " id="datatable_ajax" border="1">
						  
	<thead>
		<tr role="row" class="heading">
			<?php if(isset($dataget['action_plan_status'])):?><th width="30px">Status</th><?php endif;?> 
			<?php if(isset($dataget['act_code'])):?><th>AP ID  </th><?php endif;?> 
			<?php if(isset($dataget['action_plan'])):?><th>Action Plan  </th><?php endif;?>  
			<?php if(isset($dataget['due_date_v'])):?><th>Due Date  </th><?php endif;?>  
			<?php if(isset($dataget['division_name'])):?><th>Action Plan Owner </th><?php endif;?>  
			<?php if(isset($dataget['execution_status'])):?><th>Execution  </th><?php endif;?>  
		</tr>
	</thead>
	<tbody>
		<?php foreach($datatable as $key):?>
		 
			<?php 
			if ($key['action_plan_status'] == '4') {
				$stat = "Draft";
			}
			if($key['action_plan_status']=="5"){
				$stat = "Verified By Head";
			}	
			if($key['action_plan_status']=="6"){
				$stat = "Submited To RAC";
			}	
			if($key['action_plan_status'] > "6"){
				$stat = "Verified By RAC";
			}	 
			?>
		
	 	<tr>
			<?php if(isset($dataget['action_plan_status'])):?><td><?=$stat;?></td><?php endif;?> 
			<?php if(isset($dataget['act_code'])):?><td><?=$key['act_code'] ;?></td><?php endif;?> 
			<?php if(isset($dataget['action_plan'])):?><td><?=$key['action_plan'] ;?></td><?php endif;?>  
			<?php if(isset($dataget['due_date_v'])):?><td><?=$key['due_date_v'] ;?></td><?php endif;?>  
			<?php if(isset($dataget['division_name'])):?><td><?=$key['division_name'] ;?></td><?php endif;?>  
			<?php if(isset($dataget['execution_status'])):?><td><?=$key['execution_status'] ;?></td><?php endif;?>   
		</tr>
		<?php endforeach;?>
	</tbody>
	</table>