<table class="table table-condensed table-bordered table-hover " id="datatable_ajax" border="1">
						  
	<thead>
		<tr role="row" class="heading">
			<?php if(isset($dataget['risk_status'])):?><th width="30px">Status</th><?php endif;?> 
			<?php if(isset($dataget['risk_code'])):?><th>Risk ID  </th><?php endif;?> 
			<?php if(isset($dataget['risk_event'])):?><th>Risk Event  </th><?php endif;?>  
			<?php if(isset($dataget['risk_owner_v'])):?><th>Risk Owner  </th><?php endif;?>
			<?php if(isset($dataget['suggested_risk_treatment_v'])):?><th>Risk Treatment  </th><?php endif;?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($datatable as $key):?>
		 
		<?php 
		if ($key['risk_status'] == '5') {
			$stat = "Submited To RAC";
		}	 
		else{
			$stat = "Verified By RAC";
		}	
		?>
		
	 	<tr>
			<?php if(isset($dataget['risk_status'])):?><td><?=$stat ;?></td><?php endif;?> 
			<?php if(isset($dataget['risk_code'])):?><td><?=$key['risk_code'] ;?></td><?php endif;?> 
			<?php if(isset($dataget['risk_event'])):?><td><?=$key['risk_event'] ;?></td><?php endif;?>  
			<?php if(isset($dataget['risk_owner_v'])):?><td><?=$key['risk_owner_v'] ;?></td><?php endif;?>  
			<?php if(isset($dataget['suggested_risk_treatment_v'])):?><td><?=$key['suggested_risk_treatment_v'] ;?></td><?php endif;?> 
		</tr>
		<?php endforeach;?>
	</tbody>
	</table>