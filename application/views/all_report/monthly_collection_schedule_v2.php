<style type="text/css">
	.sub td{text-align: center;}
	td{text-align: center; height: 30px;}
	
   .responsive_table1{ page-break-after:always }
   .all_total_loan{text-align: left; padding-left: 10px;}
</style>

<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
	.responsive_table_bottom th{text-align: left;padding-left: 5px;font-size:16px;padding-top: 5px;padding-bottom: 5px;}
	.responsive_table_bottom td{text-align: left;padding-left: 5px;font-size:16px;padding-top: 5px;padding-bottom: 5px;}
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
				 			<th> Month :  <?php echo date('F-Y',strtotime($collection_date));?></th>		 							 			
				 			<th> staff :  <?php echo $list[0]->staff_name;?></th>	
				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table1" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>
								   <th>AC</th>                           
									<th>Name<br>Father/husband's</th> 
									<th>Mobile</th> 									
									
									<th>Issue date<br>Ins type</th>							
									<th>Loan</th>
									<th>Col.Loan<br>Col Deposit</th>									
									<th>Inst amount<br>Inst deposit </th>
									<th>loan stay</th>
									<th>Loan schedule</th>
									<th>Total Col.</th>
									<th>Loan Closing Balance</th>
									<th>Deposit stay</th>
									<th>Deposit schedule</th>
									<th>Total WDL</th>
									<th>Deposit Closing Balance</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $sl = 1;  
		                    	$collection_loan = 0; 
		                    	$deposit_amount = 0 ; 

		                    	$total_loan_amt = 0; 
		                    	$total_loan_stay = 0; 
		                    	$total_deposit_stay = 0; 

		                    foreach ($list as $key => $value) {

		                    	$total_loan_amt = $total_loan_amt + $value->loan_amount; 

		                    	/* Loan issue date can not less then the current date.  */
		                    		if(!OOP::isValidStartScheduleDate($value->issue_date,$value->exsiting_issue_date,$collection_date)){
		                    			//continue;
		                    		}

									$installment_amount = $value->installment_amount>0?$value->installment_amount:1;
		                    		$number_of_istallment_paid = @($value->collection_loan_amount / $installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;

		                    	?>
		                    	<tr>
		                    		<td><?php echo $sl++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo strtoupper($value->name)."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td> <?php echo $value->mob;?></td>
		                    		
		                    		
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". ceil($number_of_istallment_paid) .")<br>".$value->collection_deposit_amount;?></td>
		                    		

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->deposit_amount;?></td>

		                    		<td> <?php echo $stay = ($value->loan_amount - $value->collection_loan_amount);
		                    			$total_loan_stay = $total_loan_stay + $stay; 

		                    		?></td>
		                    		<td>
		                    			<?php //echo $stay>0?  ((($number_of_istallment_paid + 1) * $value->installment_amount) - $value->collection_loan_amount) : "Done" ;?>


		                    			<?php 


		                    			// If any existing loan distribution is happen
		                    			if($number_of_istallment_paid == 0){
		                    				$col_amt = $value->installment_amount;
		                    			}else{
		                    				
		                    				$col_amt = (((ceil($number_of_istallment_paid) * $value->installment_amount) + $value->installment_amount) - $value->collection_loan_amount );
		                    				//$col_amt = $value->installment_amount;
		                    			}

		                    			
		                    	
		                    		


		                    			 $schedule = OOP::monthlySchedule($collection_date,$value->working_day);


		                    			 $number_of_week = ceil( date('d',strtotime($value->exsiting_issue_date))/7); 
							             if($number_of_week==5){
							                $number_of_week = 4;
							             }


		                    			 if(is_array($schedule)){ 

		                    			 	
		                    			 	$loan_amt = $stay;
		                    			 	$i = 1; 

		                    					echo '<table class="sub" cellspacing="0" cellpadding="0" width="100%"  border="1"><tr>';
		                    					foreach ($schedule as $key => $val) {
		                    						
		                    							
		                    							if( $value->installment_type == 1){  // for monthly schedule

		                    								$schedule_start_date = strtotime('+1 month', strtotime($value->exsiting_issue_date));

		                    									if($i == $number_of_week){

		                    										if($loan_amt>0){

		                    											


		                    												if($value->installment_amount*2 <= $col_amt){
		                    													echo "<td>".date('d-M',strtotime($val))."<br>PAID</td>	";	
		                    												}else{
		                    													echo "<td>".date('d-M',strtotime($val))."<br>".$col_amt."</td>	";		
		                    												}
		                    												
					                    									$loan_amt = ($loan_amt - $col_amt);
					                    									

		                    											

						                    							}else{
						                    								echo "<td>".date('d-M',strtotime($val))."<br>PAID</td>	";		
						                    							}

		                    									}else{
		                    										echo '<td width="40" height="100%"></td>	';	
		                    									}

		                    								$i++;

		                    							}else{
		                    								
		                    								$schedule_start_date = strtotime('+1 week', strtotime($value->exsiting_issue_date));

			                    								if($loan_amt>0){

			                    									if(strtotime($val)> $schedule_start_date){

			                    										//echo "<td>".date('d-M',strtotime($val))."<br>".$col_amt."</td>	";	

			                    										if($value->installment_amount*(1+$i) <= $col_amt){
		                    													echo "<td>".date('d-M',strtotime($val))."<br>PAID</td>	";	
		                    												}else{
		                    													echo "<td>".date('d-M',strtotime($val))."<br>".$col_amt."</td>	";		
		                    												}

					                    								$loan_amt = ($loan_amt - $col_amt);
					                    								//$col_amt = (($col_amt + $value->installment_amount) - $value->installment_amount);
					                    								$col_amt = $value->installment_amount;

			                    									}else{
			                    										echo "<td>".date('d-M',strtotime($val))."<br> </td>	";	
			                    									}

					                    								

				                    							}else{
				                    								echo "<td>".date('d-M',strtotime($val))."<br>PAID</td>	";		
				                    							}

				                    							$i++;
		                    							}
		                    							
		                    								
		                    							
		                    						
		                    						}
		                    						
		                    					
		                    					echo "</tr></table>";
		                    				}


		                    			
		                    			?>
		                    		</td>
		                    		<td></td>
		                    		<td></td>

		                    			<td> <?php  echo $stay_deposit = ($value->collection_deposit_amount - $value->withdrawal_amount); 
		                    				$total_deposit_stay = $total_deposit_stay + $stay_deposit; 
		                    			?></td>
		                    		<td>
		                    				<?php

		                    					if(is_array($schedule)){ 

		                    			 	$j = 1; 
		                    			 	

		                    					echo '<table class="sub" cellpadding="0" cellspacing="0" width="100%"  border="1"><tr>';
		                    					foreach ($schedule as $key => $val) {
		                    						
		                    							
		                    							if( $value->installment_type == 1){

		                    									if($j == $number_of_week){
		                    										
		                    												echo "<td>".date('d-M',strtotime($val))."<br>".$value->deposit_amount."</td>	";	
		                    											
		                    									}else{
		                    										echo '<td width="40" height="100%"></td>	';	
		                    									}

		                    								$j++;

		                    							}else{
		                    									echo "<td>".date('d-M',strtotime($val))."<br>".$value->deposit_amount."</td>	";	
		                    								
		                    							}
		                    							
		                    						
		                    						}
		                    						
		                    					
		                    					echo "</tr></table>";
		                    				}
		                    				  
		                    					$deposit_amount+= $value->deposit_amount; 
		                    				?>
		                    		 </td>
		                    		 <td></td>
		                    		 <td></td>

		                    	</tr>






		                    <?php }


		                    	echo '<tr><td colspan="5"></td> <td>'.$total_loan_amt.'</td><td colspan="2"></td> <td>'.$total_loan_stay.'</td><td></td><td colspan="2"></td><td>'.$total_deposit_stay.'</td><td></td></tr>';
		                    	//echo '<tr> <td colspan="9"></td><td>All Total</td><td class="all_total_loan" colspan="4"> '. ($collection_loan + $deposit_amount).'</td></tr>';
		                     }?>
		                    
		                </table>

		               


		                <?php } }?>
				 
				
				 
				 </div>

	</div>			 