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
				 
 <table id="salary_withdraw_list_table" class="table_of_pdf" cellspacing="0" width="100%">
 		 	
                 
  <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Staff Name</th> 
							  <th>Total Salary</th>    
							  <th>Total Profit</th>   
							  <th>Total Amount (salary+profit)</th>   							  
							  <th>Withdraw Salary </th> 
							  <th>available Salary </th>   
							   <th>Total invested</th>                           
							  <th> Withdraw Invested</th> 
							  <th>available Invested </th>  
							      
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$i=1;
						$basic_salary=0; 
						$salary_withdraw_amount=0;
						$salary_available_balance=0;
						$invested_amount=0;
						$invested_withdraw_amount=0;
						$invested_avilable_balance=0;
						$total_profit=0;
						 
						
						foreach($data as $key){
							
								$basic_salary+=$key['basic_salary'];
								$salary_withdraw_amount+=$key['salary_withdraw_amount'];
								$salary_available_balance+=$key['salary_available_balance'];
								$invested_amount+=$key['invested_amount'];
								$invested_withdraw_amount+=$key['invested_withdraw_amount'];
								$invested_avilable_balance+=$key['invested_avilable_balance'];
								
								$total_profit+= (float)$key['total_profit'];
								 
								 $total_salary=($key['basic_salary'])?$key['basic_salary']:0;
								 $total_profit_salary=($key['total_profit'])?$key['total_profit']:0;

 
								
						?>
					
							<tr>
								<td><?=$i++?></td> 
								<td><?=$key['name']?></td> 
								<td><?=$key['basic_salary']?></td> 
								<td><?=$key['total_profit']?></td> 
								<td><?=($total_salary+$total_profit_salary)?></td> 
								<td><?=$key['salary_withdraw_amount']?></td> 
								<td><?=$key['salary_available_balance']?></td> 
								<td><?=$key['invested_amount']?></td> 
								<td><?=$key['invested_withdraw_amount']?></td> 
								<td><?=$key['invested_avilable_balance']?></td> 
								
							 
							</tr>
							
							<?php } ?>	
					</tbody>
					 
					<tfoot class="footer_reuslt">
						<tr>
							<td colspan="2" style='text-align: right;'> Total  Amount: </td> 
							<td><?=($basic_salary)?$basic_salary:'0.00'?>/-</td>
							<td><?=($total_profit)?$total_profit:'0.00'?>/-</td>
							<td><?=($basic_salary)?($total_profit+$basic_salary):'0.00'?>/-</td>							
							<td><?=($salary_withdraw_amount)?$salary_withdraw_amount:'0.00'?>/-</td>
							<td><?=($salary_available_balance)?$salary_available_balance:'0.00'?>/-</td>
							<td><?=($invested_amount)?$invested_amount:'0.00'?>/-</td>
							<td><?=($invested_withdraw_amount)?$invested_withdraw_amount:'0.00'?>/-</td>
							<td><?=($invested_avilable_balance)?$invested_avilable_balance:'0.00'?>/-</td>
							
							 
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


 <style>
 .footer_reuslt td{    font-weight: bold;}
 
 </style>





<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>
