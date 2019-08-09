		<table id="profit_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Partner Name</th> 
							  <th>Last Calculation Date </th>                           
							  <th>Invested Amount </th> 
							  <th>Withdrawl Amount </th> 
							  <th>Percentage</th> 
							  <th>Profit Amount</th> 
							  <th>Pay Date</th> 
							  <th>Action</th>  
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$i=1;
						foreach($data as $key){
							if($key['profit_amount']>0){
						?>
					
							<tr>
								<td><?=$i++?></td> 
								<td><?=$key['name']?></td> 
								<td><?=date_format(date_create($key['last_calculation_date']),"d-m-Y")?></td> 
								<td><?=($key['invested_amount'])?$key['invested_amount']:'0.00'?>/-</td> 
								<td><?=($key['withdraw_amount'])?$key['withdraw_amount']:'0.00'?>/-</td> 
								<td><?=$key['Percentage']?> %</td> 
								<td><?=($key['profit_amount']>0)?$key['profit_amount']:'0.00'?>/-</td> 
								<td><?=$key['pay_date']?></td> 
								<td><?php 
									if($key['pay_date'])
									{
										echo "<b style='color:green'>  Paid</b>";
									}else{
										echo "<a issue_date='".$key['issue_date']."' rel='".$key['partner_id']."' perc='".$key['Percentage']."' profit='".$key['profit_amount']."' date='".$key['last_calculation_date']."' class='action_button action_button_view' style='width:100px;color:white;background:red'><i class='fa fa-check'></i> Now Pay</a>";
										
									}	
								?></td>
							</tr>
							
							<?php }} ?>	
					</tbody>
					
                    
                </table>	 
				 