<style type="text/css">
	.sub td{text-align: center;}
	td{text-align: center;}
	
   .responsive_table{ page-break-after:always }
</style>

<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>

		<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;"> <?php echo $report_title;?></h3>
				 
				 <?php if(count($society_wise_list)>0){

				 		foreach ($society_wise_list as $key => $list) {
				 			
				 	?>
				 	

				 	<table  width="100%">
				 		<tr>
				 			
				 			<th>Area :  <?php echo $list[0]->area_name;?></th>	
				 			<th> Society :  <?php echo $list[0]->society_name;?></th>		 							 			
				 			<th> staff :  <?php echo $list[0]->staff_name;?></th>	
				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th >Sl.</th>
								   <th>AC</th>                           
									<th>Name<br>Father/husband's</th> 
									<th>Mobile</th> 									
									
									<th>Issue date<br>Ins type</th>							
									<th>Loan<br>Amount</th>
									<th>Col.Loan<br>Col Deposit</th>									
									<th>Inst loan amt<br>Inst Deposit amt </th>
									<th>loan stay</th>
									<th>Loan schedule</th>
									<th>Deposit stay</th>
									<th>Deposit schedule</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1;

		                    	$total_loan_amt = 0; 
		                    	$total_loan_stay = 0; 
		                    	$total_deposit_stay = 0; 

		                    foreach ($list as $key => $value) {
		                    		$number_of_istallment_paid = @($value->collection_loan_amount / $value->installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;
		                    		$total_loan_amt = $total_loan_amt + $value->loan_amount; 
			                    	
			                    	
			                    	
		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td> <?php echo $value->mob;?></td>
		                    		
		                    		
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". ceil($number_of_istallment_paid) .")<br>".$value->collection_deposit_amount;?></td>
		                    		

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->deposit_amount;?></td>

		                    		<td> <?php echo $stay = ($value->loan_amount - $value->collection_loan_amount);
		                    					$total_loan_stay = $total_loan_amt + $stay; 
		                    		?></td>
		                    		<td> <?php 

		                    				$primary_deposit_date = date('Y-m-d',strtotime($value->issue_date));

		                    				
		                    			// If any existing loan distribution is happen
		                    		$collection_loan_amount_without_exsit_collection = ($value->collection_loan_amount - $value->loan_paid_amt);
		                    		$number_of_istallment_paid = @($collection_loan_amount_without_exsit_collection / $value->installment_amount);
		                    				 $col_amt = (((floor($number_of_istallment_paid) + 1) * $value->installment_amount) - $collection_loan_amount_without_exsit_collection);

		                    				$schedule =  explode(',', $value->schedule_date);
		                    				if(is_array($schedule)){ $loan_amt = 0;
		                    					echo '<table class="sub" cellspacing="0" width="100%"  border="1"><tr>';
		                    					foreach ($schedule as $key => $val) {
		                    						
		                    						if(($primary_deposit_date != $val) && ($stay > $loan_amt) ){
		                    							echo "<td>".date('d-M',strtotime($val))."<br>(".$col_amt.")</td>	";	
		                    							$loan_amt +=$value->installment_amount;
		                    							$col_amt = $value->installment_amount;
		                    						}
		                    						
		                    					}
		                    					echo "</tr></table>";
		                    				}
		                    		?>
		                    			
		                    		</td>

		                    			<td> <?php echo ($value->deposit_balance);
		                    				$total_deposit_stay = $total_deposit_stay + $value->deposit_balance; 
		                    			?></td>
		                    		<td> <?php 

		                    				
		                    				if(is_array($schedule)){
		                    					echo '<table class="sub" cellspacing="0" width="100%"  border="1"><tr>';
		                    					foreach ($schedule as $key => $val) {
		                    						if(($primary_deposit_date != $val) && ($stay > $loan_amt)){

		                    						echo "<td>".date('d-M',strtotime($val))."<br>(".$value->deposit_amount.")</td>	";
		                    					}
		                    					}
		                    					echo "</tr></table>";
		                    				}
		                    		?></td>

		                    	</tr>






		                    <?php }

		                    echo '<tr><td colspan="5"></td> <td>'.$total_loan_amt.'</td><td colspan="2"></td> <td>'.$total_loan_stay.'</td><td></td><td>'.$total_deposit_stay.'</td><td></td></tr>';
		                     }?>
		                    
		                </table>


		                <?php } }?>
				 
				 
				 
				 
				 </div>

	</div>			 