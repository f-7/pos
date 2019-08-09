

<table id="product_detials_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							<th>SL</th>
							<th>Serial No</th>  
						    <th>Price</th>	
							<th> Buy Price </th>	
							 <th>Warranty</th>	
						   <th>Stock Status </th>	
                        </tr>
                    </thead>
                    <tbody>
						<?php 
						$i=1;
						foreach($data_list as $key)
						{?>
					<tr>
						<td><?=$i++?></td>
						<td><?=$key->serial_no?> </td>
						 
						<td><?=$key->unit_price?> </td>
						<td><?=($key->buy_unit_price)?$key->buy_unit_price:0?> </td>
						<td><?=($key->warranty)?$key->warranty:"N/A"?> </td>
						<td><?=OOP::getStockStatusHtml($key->product_status)?> </td>
					</tr>
							
							
					<?php }
						?>
					  
					</tbody>
					
                </table>
			 