 
			<div class="table-header">
				<div class="table-caption">Total Data : <span class="label label-info"><?php echo $total_data;?></span></div>
			</div>	 
			<table class="responsive table table-striped table-bordered table-hover"  border = "1">
				<thead>
					  <tr>
							 
							<th>  Risk Code </th>   
							<th>  Risk Event </th> 
							<th>  Risk Owner </th> 
							<th>  Risk Impact Level </th>
							<th>  Risk Likelihood Key </th>
							<th> Risk Level </th>
							<th> Suggested Risk Treatment</th>
							<th> Action Plan </th>
							<th> Action Plan Owner</th>
							<th> Due Date</th>
					  </tr>
				</thead> 
				<tbody>
						<?php if($datanya):?>
						 <?php foreach($datanya as $key):?>
							<tr>												  
								 
								<td> <?=$key['risk_code'];?> </td>
								<td> <?=$key['risk_event'];?> </td>  
								<td> <?=$key['risk_owner'];?> </td>  
								<td> <?=$key['risk_impact_level'];?> </td> 
								<td> <?=$key['risk_likelihood_key'];?> </td>
								<td> <?=$key['risk_level'];?> </td> 
								<td> <?=$key['suggested_risk_treatment'];?> </td>
								<td> <?=$key['Action Plan'];?> </td> 
								<td> <?=$key['Action Plan Owner'];?> </td>			
								<td> <?=$key['Due Date'];?> </td>								
							</tr>
					 <?php endforeach;?> 
					<?php else:?>
						<tr>
							<td colspan = "17"><center>No Data</center></td>
						</tr>
					<?php endif;?> 
				</tbody>
				
			</table>
			 
	 

					
						
		