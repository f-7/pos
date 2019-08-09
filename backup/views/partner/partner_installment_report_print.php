 <meta charset="UTF-8">
<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>
 <div class="borderbox">
 
  <div class="col-md-12">  
<?php 

 

if($data)
{
 
?>				 
				 
			<table id="installment_list_table" class="table_of_pdf" cellspacing="0" width="100%">
			 	
                    <thead>
						<tr>
							 
							<th colspan="9"> Installment list</th>
						</tr>
					
                         <tr>
							 <th>SL</th> 
							  <th>Partner Name</th> 
							  <th>Last Calculation Date </th>                           
							  <th>Invested Amount </th> 
							  <th>Withdrawl Amount </th> 
							  <th>Percentage</th> 
							  <th>Profit Amount</th> 
							  <th>Pay Date</th> 
							  <th>Status</th>  
                        </tr>
                    </thead>
					
					
					 
					
					<tbody>
						<?php 
						$inc=1;		
						$total_amount=0;	
						foreach($data as $key){
							if($key['profit_amount']>0){
							
							$total_amount=$total_amount+$key['profit_amount'];
						?>
						
						<tr>
							<td><?=$inc++?></td>
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
										echo "<b style='color:gray'>  Pending</b>";
										
									}	
								?></td>
							
						</tr>
						
						
						
						<?php 
							
							}
						} ?>
						
					</tbody>
                    
					<tfoot>
						<tr>
							<td colspan="6" style='text-align: right;'> Total Amount: </td> <td><?=$total_amount?>/-</td>
						</tr>
					</tfoot>
                </table>
				 
<?php 
 }else{
	
	echo "<b style='text-align: center;width: 100%;float: right;'>No data found !</b>";
	
}
?>				 
				 
				 
  </div>
 
 
 
 
 
 
 
 
 </div>


 





<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>
