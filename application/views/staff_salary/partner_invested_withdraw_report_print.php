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
				 
			<table id="partner_invested_withdraw_report" class="table_of_pdf" cellspacing="0" width="100%">
			 	
                 
  <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Partner Name</th> 
							  <th>Withdraw Date</th>                           
							  <th>Withdraw Amount </th>     
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$i=1;
						$total_amount=0;
						foreach($data as $key){
							
								$total_amount+=$key->withdraw_amount;

 
								
						?>
					
							<tr>
								<td><?=$i++?></td> 
								<td><?=$key->name?></td> 
								<td><?=date_format(date_create($key->pay_date),"d-m-Y")?></td> 
								<td><?=$key->withdraw_amount?>/-</td>  
							</tr>
							
							<?php } ?>	
					</tbody>
					 
					<tfoot>
						<tr>
							<td colspan="3" style='text-align: right;'> Total Amount: </td> <td><?=($total_amount)?$total_amount:'0.00'?>/-</td>
						</tr>
					</tfoot>
                    
                </table>	 
				 
<?php 
 }else{
	
	echo "<b>No data found !</b>";
	
}
?>				 
				 
				 
  </div>
 
 
 
 
 
 
 
 
 </div>


 





<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>
