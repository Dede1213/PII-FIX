 
			<div class="table-header">
				<div class="table-caption">Total Data : <span class="label label-info"><?php echo $total_data;?></span></div>
			</div>	 
			<table class="responsive table table-striped table-bordered table-hover"  border = "1">
				<thead>
					  <tr>
						<th> No </th>
						<th>  Risk Code </th>   
						<th>  Risk Event </th>
						<th> Risk Level </th>
						<th>  Suggested Risk Treatment</th>
						<th>  KRI Code </th>  
						<th>  Key Risk Indicator </th>
						<th>  KRI  Owner </th>
						<th> Treshold </th>
						<th> Treshold Value</th>
						<th> Timing  Pelaporan</th>
						<th> Owner Report </th>
						<th> KRI Warning</th>
					  </tr>
				</thead> 
				<tbody>
				 <?php $i=1;?>
						<?php if($datanya):?>
						 <?php foreach($datanya as $key):?>
							<tr>												  
								<td> <?=$i;?> </td>
								<td> <?=$key['risk_code'];?> </td>
								<td> <?=$key['risk_event'];?> </td>
								<td> <?=$key['risk_level'];?> </td> 								
								<td> <?=$key['suggested_risk_treatment'];?> </td>
								<td> <?=$key['kri_code'];?> </td>   
								<td> <?=$key['key_risk_indicator'];?> </td> 
								<td> <?=$key['kri_owner'];?> </td>
								<td> <?=$key['treshold'];?> </td>
								<td> <?=$key['threshold value'];?> </td>
								<td> <?=$key['timing_pelaporan'];?> </td>
								<td> <?=$key['owner_report'];?> </td>
								<td> <?=$key['kri_warning'];?> </td>
							</tr>
							 <?php $i++;?>
					 <?php endforeach;?> 
					<?php else:?>
						<tr>
							<td colspan = "17"><center>No Data</center></td>
						</tr>
					<?php endif;?> 
				</tbody>
				
			</table>
			 
	 

					
						
		