 
			<div class="table-header">
				<div class="table-caption">Total Data : <span class="label label-info"><?php echo $total_data;?></span></div>
			</div>	 
			<table class="responsive table table-striped table-bordered table-hover"  border = "1">
				<thead>
					  <tr>
							 <th> No </th>
							<th>  Category Code </th>   
							<th>  Risk Level </th>   
							<th>  Jumlah Risk Periode 1 </th>
							<th>  Jumlah Risk Periode 2 </th> 
					  </tr>
				</thead> 
				<tbody>
				 <?php $i=1;?>
						<?php if($datanya):?>
						 <?php foreach($datanya as $key):?>
							<tr>												  
								<td> <?=$i;?> </td>
								<td> <?=$key['cat_code'];?> </td>
								<td> <?=$key['risk_level'];?> </td>
								<td> <?=$key['jumlah risk periode 1'];?> </td> 
								<td> <?=$key['jumlah risk periode 2'];?> </td>
							 
													
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
			 
	 

					
						
		