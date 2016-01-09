 
			<div class="table-header">
				<div class="table-caption">Comparison Risk Between Periode  <?=$cekperiode1[0]['periode_name'];?>  s/d <?=$cekperiode2[0]['periode_name'];?></div>
			</div>	
			<table class="responsive table table-striped table-bordered table-hover"  border = "1">
				<thead>
					  <tr>
							 <th> No </th>
							<th>  Risk ID </th>   
							<th>  Risk Event </th>
							<th>  Risk Description</th>
							<th>  Risk Owner </th>  
							<th>  Current Impact Level</th>
							<th>  Current Likelihood Level</th>
							<th> Current Risk Level </th>
							 <th> Previous Impact Level</th>
							  <th> Previous Likelihood Level</th>
							   <th> Previous Risk Level</th>
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
								<td> <?=$key['risk_description'];?> </td>
								<td> <?=$key['risk_owner'];?> </td>   
								<td> <?=$key['current impact'];?> </td> 
								<td> <?=$key['current likelihood'];?> </td>
								<td> <?=$key['current risk level'];?> </td> 
								<td> <?=$key['previous impact'];?> </td> 
								<td> <?=$key['previous likelihood'];?> </td>
								<td> <?=$key['previous risk Level'];?> </td> 
													
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
			<div class="table-header">
				<div class="table-caption">Total Data : <span class="label label-info"><?php echo $total_data;?></span></div>
			</div>	
			 
	 

					
						
		