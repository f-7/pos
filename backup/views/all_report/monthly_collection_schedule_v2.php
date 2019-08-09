<style type="text/css">
	.sub td{text-align: center;}
	td{text-align: center;}
	
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
									<th>Loan<br>Deposit</th>
									<th>Col.Loan<br>Col Deposit</th>									
									<th>Installment amount<br>Num of Installment </th>
									<th>loan stay</th>
									<th>Loan amount</th>
									<th>Deposit stay</th>
									<th>Deposit amount</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1;  
		                    	$collection_loan = 0; 
		                    	$deposit_amount = 0 ; 

		                    foreach ($list as $key => $value) {

		                    	/* Loan issue date can not less then the current date.  */
		                    		if(!OOP::isValidStartScheduleDate($value->issue_date,$value->exsiting_issue_date,$collection_date)){
		                    			continue;
		                    		}

									$installment_amount = $value->installment_amount>0?$value->installment_amount:1;
		                    		$number_of_istallment_paid = @($value->collection_loan_amount / $installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo strtoupper($value->name)."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td> <?php echo $value->mob;?></td>
		                    		
		                    		
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount."<br>".$value->deposit_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". ceil($number_of_istallment_paid) .")<br>".$value->collection_deposit_amount;?></td>
		                    		

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->number_of_istallment;?></td>

		                    		<td> <?php echo $stay = ($value->loan_amount - $value->collection_loan_amount);?></td>
		                    		<td>
		                    			<?php //echo $stay>0?  ((($number_of_istallment_paid + 1) * $value->installment_amount) - $value->collection_loan_amount) : "Done" ;?>


		                    			<?php 

		                    			// If any existing loan distribution is happen
		                    		$collection_loan_amount_without_exsit_collection = ($value->collection_loan_amount - $value->loan_paid_amt);
		                    		$number_of_istallment_paid = @($collection_loan_amount_without_exsit_collection / $installment_amount);


		                    			 $col_amt = (((floor($number_of_istallment_paid) + 1) * $value->installment_amount) - $collection_loan_amount_without_exsit_collection);

		                    				if($stay>0){

			                    			 		if( $value->txn_coll_loan>0){ 

//			                    					echo ($value->txn_coll_loan) >= $value->installment_amount? "Paid": ($col_amt; $collection_loan += $col_amt)  ;

			                    					if(($value->txn_coll_loan) >= $value->installment_amount){
			                    						echo "Paid";
			                    					}else{
			                    						echo $col_amt; 
			                    						$collection_loan= ($collection_loan + $col_amt);
			                    					}
			                    					 }else{ 
			                    					 	
			                    					 	echo  $col_amt;
			                    					 	$collection_loan= ($collection_loan +  $col_amt);
													 } 

		                    				}else{
		                    					echo "Done";
		                    				}
		                    			?>
		                    		</td>

		                    			<td> <?php  echo ($value->collection_deposit_amount - $value->withdrawal_amount); ?></td>
		                    		<td>
		                    				<?php echo $value->deposit_amount; 
		                    					$deposit_amount+= $value->deposit_amount; 
		                    				?>
		                    		 </td>

		                    	</tr>






		                    <?php }


		                    	echo '<tr> <td colspan="8"></td><td>Total</td><td class="total_loan"> '. $collection_loan.'</td><td>Total</td><td class="total_deposit">'.$deposit_amount.'</td></tr>';
		                    	echo '<tr> <td colspan="8"></td><td>All Total</td><td class="all_total_loan" colspan="3"> '. ($collection_loan + $deposit_amount).'</td></tr>';
		                     }?>
		                    
		                </table>

		               


		                <?php } }?>
				 
				 <h3 style="text-align: center;text-decoration: underline;"> Advanced or due installment payment list</h3>
				 
				<table class="responsive_table_bottom" style="margin-top: 10px;" width="100%" border="1"  cellpadding="0" cellspacing="0">
					<tr>
						
						<th width="200">Account No</th>
						<th>Name</th>
						<th>Father/husband</th>
						<th>Issue date</th>
						<th>Collection</th>
						<th>Deposit</th>
					</tr>
					<?php for($i=0; $i<14;$i++){
							echo "<tr><td>AC</td><td></td><td></td><td></td><td></td><td></td></tr>";
					}?>
				 	
				 </table>

				 <table class="responsive_table_bottom" style="margin-top: 01px;" width="100%" >
					<tr>
						<th>Today's target collection</th>
						<th colspan="2"></th>
						<th>Today's target depost</th>
						<th></th>
					</tr>
					<tr>
						<th>Collection</th>
						<th colspan="2"></th>
						<th>Deposit</th>
						<th></th>
					</tr>
					<tr>
						<th>Total cash</th>
						<td></td>
						<td>In Words</td>
						<th colspan="2"></th>
						
					</tr>
					<tr>
						<th>Organizer</th>
						<th colspan="2"></th>
						<th>Cash Received by</th>
						<th></th>
					</tr>
					<tr>
						<th>Manager</th>
						<th colspan="2"></th>
						<th>Accountant</th>
						<th></th>
					</tr>
					
				 	
				 </table>
				 
				 </div>

	</div>			 