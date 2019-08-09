		<table id="staff_salary_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                  
 
  <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Staff Name</th> 
							  <th>Name of Month</th>                           
							  <th>Basic Salary </th> 
							  <th>Bonus Amount </th> 
							  <th>Invested Profit</th> 
							  <th>Total Amount</th> 
							  <th>Pay Date</th> 
							  
							  <th>Action</th>  
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$i=1;
						$total_amount=0;
						foreach($data as $key){
							if($key['salary']>0){
								$total_amount=$total_amount+$key['total_amount'];

						?>
					
							<tr>
								<td><?=$i++?></td> 
								<td><?=$key['name']?></td> 
								<td><?=$key['month_name'].",".$key['year']?></td> 
								<td><?=($key['salary'])?$key['salary']:'0.00'?>/-</td> 
								<td><?php 
									if($key['bonus'])
									{	
										foreach($key['bonus'] as $tkey=>$tval)
										{
											echo "<p> ".ucfirst(OOP::getSalaryType($tkey))." : ".$tval." /-</p>";
										}
									}else{
										echo "0.00/-";
									}	
								?></td> 
								<td><?=($key['invested_profit'])?$key['invested_profit']:'0.00'?>/-</td> 
								<td><?=($key['total_amount'])?$key['total_amount']:'0.00'?>/-</td> 
								<td class="pay_date_td"><?=($key['pay_date'])?$key['pay_date']:"<input type='text'class='pay_date' value='".date('Y-m-d')."' />"?></td> 
								<td><?php 
									if($key['pay_date'])
									{
										echo "<b style='color:green'>  Paid</b>";
									}else{
										echo "<a  month='".$key['month']."'  year='".$key['year']."'  userId='".$key['user_id']."' salary='".$key['salary']."' bonus='".$key['total_bonus']."' profit='".$key['invested_profit']."' class='action_button action_button_view' style='width:100px;color:white;background:red'><i class='fa fa-check'></i> Now Pay</a>";
										
									}	
								?></td>
							</tr>
							
							<?php }} ?>	
					</tbody>
					 
					<tfoot>
						<tr>
							<td colspan="6" style='text-align: right;'> Total Amount: </td> <td><?=($total_amount)?$total_amount:'0.00'?>/-</td>
						</tr>
					</tfoot>
                    
                </table>	 
				 

  <script>
 
 $( function() {
  datePicker(".pay_date");
  
  
  } );

</script>