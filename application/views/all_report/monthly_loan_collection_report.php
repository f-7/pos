<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>

<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;">  <?php echo $report_title ;?> </h3>
				 
				 <?php if(count($society_wise_list)>0){

				 				$total_loan = 0 ;
		                    	$total_deposit = 0 ;

		                    	$total_report = array();

				 		foreach ($society_wise_list as $key => $list) {
				 			
				 	?>
				 	

				 	<table width="100%" >
				 		<tr>
				 		<!--	<th>Date: <?php // echo date('d-F-Y',strtotime($list[0]->collection_date));?></th> -->
				 			<th>Area :  <?php echo $list[0]->area_name;?></th>
				 			<th> Society :  <?php echo $list[0]->society_name;?></th>
				 			<th> Staff :  <?php echo $list[0]->staff_name;?></th>
				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>
								   <th>Account</th>                           
									<th>Name</th> 
									<th>Father/Husband</th> 
									<th>Phone No</th>
									<th>Issue Date</th>
									<th>Collection Date</th>
									<th>Loan collection</th>	
									<th>Deposit collection</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1; 
		                    	$loan_collection_amount = 0 ;
		                    	$deposit_collection_amount = 0 ;

		                    foreach ($list as $key => $value) {
		                    		
		                    		$loan_collection_amount += $value->collection_loan_amount ;
		                    		$deposit_collection_amount += $value->collection_deposit_amount ;
		                    		
		                    		
		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td class="txt-left"> <?php echo $value->name;?></td>
		                    		<td class="txt-left"> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td class="txt-left"> <?php echo $value->mob;?></td>	
		                    		<td class="txt-left"> <?php echo date('d-M-Y',strtotime($value->issue_date));?></td>	
		                    		<td class="txt-left"> <?php echo date('d-M-Y',strtotime($value->pay_date));?></td>	                    		
		                    		<td> <?php echo $value->collection_loan_amount;?></td>		                    		
		                    		<td> <?php echo $value->collection_deposit_amount;?></td>
		                    	</tr>






		                    <?php }

		                    		$total_report[$list[0]->society_name] = array(
		                    			'sname' => $list[0]->society_name,
		                    			'loan' => $loan_collection_amount,
		                    			'deposit' => $deposit_collection_amount
		                    		); 


		                    		echo '<tr> <td colspan="6"></td> <td>Total</td> <td class="total_loan"> '. $loan_collection_amount.'</td><td class="total_deposit">'.$deposit_collection_amount.'</td></tr>';
		                     }?>
		                    
		                </table>


		                <?php } 

		                	//echo '<table width="100%"><tr> <td colspan="6"></td><td>Total</td><td class="total_loan"> '. $total_loan.'</td><td class="total_deposit">'.$total_deposit.'</td></tr></table>';
		            }?>
				 
				 
				 <?php if(count($total_report)>0){ 

				 			$loan = 0;
				 			$deposit = 0;
				 		
				 		echo '<h3 style="text-align: center;text-decoration: underline;"> Summery of society </h3>';
				 		echo '<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%"> <tr><th>Society</th><th>loan Collection</th><th>Deposit Collection</th></tr>';
				 		foreach ($total_report as $key => $value) {
				 			$loan +=$value['loan'];
				 			$deposit += $value['deposit'];
				 		
				 	?>
				 		<tr>
				 			<td><?php echo $value['sname'];?></td>
				 			<td><?php echo $value['loan'];?></td>
				 			<td><?php echo $value['deposit'];?></td>
				 		</tr>

				 <?php };

				 echo '<tr> </td><td>Total</td><td class="total_loan"> '. $loan.'</td><td class="total_deposit">'.$deposit.'</td></tr>';
				 	echo "</tr></table>";
				}; ?>
				 
				 
				 </div>

	</div>			 