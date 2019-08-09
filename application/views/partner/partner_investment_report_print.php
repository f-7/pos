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
				 
			<table id="installment_list_table" class="table_of_pdf" cellspacing="0" width="100%">
			 	
                    <thead>
						<tr>
							 
							<th colspan="8"> Investment list</th>
						</tr>
					
                        <tr>
							<th>SL</th>
						    <th>Partner Name</th>						 						   
							 <th>Investment Date</th>	
							<th>Amount</th> 
							<th>Profit Percentage</th> 
							<th>Profit Installment</th>  
							<th>Entered by</th> 
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$inc=1;		
						$total_amount=0;	
						foreach($data_list as $val){
							$total_amount=$total_amount+$val->invested_amount;
							
							
							if($val->status=="null" or $val->status==0){$status="<b style='color:gray'>Not start</b>";}
					else if($val->status==1 and ($val->status!="null" or $val->status!=0)){$status="<b style='color:red'>Running</b>";}
					else{$status="<b style='color:green'>Closed</b>";}
							
						?>
						
						<tr>
							<td><?=$inc++?></td>
							<td><?=$val->partner_name?></td>
							<td><?=date_format((date_create($val->invested_date)),"d-m-Y")?></td>							 
							<td><?=$val->invested_amount?> /-</td> 
							<td><?= $val->profit_percentage?>%</td>
							<td><?= OOP::getProfitInstallment($val->profit_installment)?></td> 
							 <td><?=$val->name?></td>
						</tr>
						
						
						
						<?php 

						} ?>
						
					</tbody>
                    
					<tfoot>
						<tr>
							<td colspan="3" style='text-align: right;'> Total Amount: </td> <td><?=$total_amount?>/-</td>
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
