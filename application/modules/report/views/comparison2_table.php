 
			<div class="table-header">
				<div class="table-caption">Total Data : <span class="label label-info"><?php echo $total_data;?></span></div>
			</div>	 
			<table class="responsive table table-striped table-bordered table-hover"  border = "1">
				<thead>
					  <tr>
							 <th> No </th>
							<th>  Category Code </th>   
							<th>  Category Name </th>
							<th>  Current Impact </th>							 
							<th>  Current Likelihood </th>
							<th> Current Risk Level </th>
							 <th> Previous Impact</th>
							  <th> Previous Impact</th>
							   <th> Previous Impact</th>
					  </tr>
				</thead> 
				<tbody>
				 <?php $i=1;?>
						<?php if($datanya):?>
						 <?php foreach($datanya as $key):?>
							<tr>												  
								<td> <?=$i;?> </td>
								<td> <?=$key['cat_code'];?> </td>
								<td> <?=$key['cat_name'];?> </td> 
								<td> <?=$key['current impact'];?> </td> 
								<td> <?=$key['current likelihood'];?> </td>
								<td> <?=$key['current risk level'];?> </td> 
								<td> <?=$key['previous impact'];?> </td> 
								<td> <?=$key['previous impact'];?> </td>
								<td> <?=$key['previous impact'];?> </td> 
													
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
			 
	 

					
						
		