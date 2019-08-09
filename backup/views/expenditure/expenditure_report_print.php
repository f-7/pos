 <meta charset="UTF-8">
<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>
 <div class="borderbox">
 
  <div class="col-md-12">  
<?php 
if($data_list)
{
 
?>				 
				 
			<table id="account_list_table" class="table_of_pdf" cellspacing="0" width="100%">
			 	
                    <thead>
						<tr>
							 
							<th colspan="6"> Daily Eexpenditure</th>
						</tr>
					
                        <tr>
							<th>SL</th>
						    <th>Buy Date</th>						 						   
							 <th>Expenditure Type</th>	
							<th>Amount</th> 
							<th>Purchaser</th> 
							<th>Status</th> 
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$inc=1;		
						$total_amount=0;	
						foreach($data_list as $val){
							$total_amount=$total_amount+$val->amount;
						?>
						
						<tr>
							<td><?=$inc++?></td>
							<td><?=date_format((date_create($val->buy_date)),"d-m-Y")?></td>							 
							<td><?=$val->expenditure_name?></td>
							<td><?=$val->amount?>/-</td>
							<td><?= $val->name?></td>
							 <td><?=($val->status==0)?"<b style='color:red'>Pending</b>":"<b style='color:green'>Approved</b>"?></td>
						</tr>
						
						
						
						<?php 

						} ?>
						
					</tbody>
                    
					<tfoot>
						<tr>
							<td colspan="3"> Total Amount: </td> <td><?=$total_amount?>/-</td>
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
