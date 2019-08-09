<style type="text/css">
	table tr td { text-align: center; }
</style>

<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>
<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;"> Monthly overall report of <?php echo date('F-Y',strtotime($collection_date));?></h3>
				 
				 <?php if(count($society_wise_list)>0){

				 				$starting_members = 0;
		                    	$total_new_members = 0;
		                    	$total_paid_members = 0;
		                    	$total_closing_members = 0;
		                    	$total_loan_amount = 0;
		                    	$total_starting_loan_balance = 0;
		                    	$total_loan_collection = 0;
		                    	$total_closing_loan_balance = 0;
		                    	$total_starting_deposit_balance = 0;
		                    	$total_deposit_collection = 0;
		                    	$total_deposit_withdrawn = 0;
		                    	$total_closing_deposit_balance = 0;
		                    	$total_loan_distribution = 0;

				 		foreach ($society_wise_list as $key => $list) {
				 			
				 	?>
				 	

				 	<table  width="100%">
				 		<tr>				 		
				 			<th>Area :  <?php echo $list[0]->area_name;?></th>	
				 			<th> Society :  <?php echo $list[0]->society_name;?></th>			 			
				 			<th> Staff :  <?php echo $list[0]->staff_name;?></th>				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>

								   <th>Starting memebers</th>                           
									<th>New members</th> 
									<th>Paid members</th> 
									<th>Closing members</th> 
									
									<th>Loan amount</th>
									<th>Starting loan balance</th>
									<th>Loan distribution</th>
									<th>loan collection</th>
									<th>Closing loan balance</th>
									<th>Starting Deposit balance</th>	
									<th>Deposit collection</th>
									<th>Deposit withdrawn</th>
									<th>Closing Deposit balance</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1;

		                    	

		                    foreach ($list as $key => $value) {		                    		
		                    	
		                    	?>

		                    	
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo ($value->starting_memebers + $value->paid_members); 
		                    				$starting_members+= ($value->starting_memebers + $value->paid_members);?>
		                    			
		                    		</td>
		                    		<td> <?php echo $value->new_members;
		                    				$total_new_members+=$value->new_members;
		                    		?></td>
		                    		<td> <?php echo $value->paid_members  ;  $total_paid_members+= $value->paid_members;?></td>
		                    		<td> <?php echo $clm = ($value->starting_memebers - $value->paid_members + $value->new_members); $total_closing_members+= $clm;?></td>


		                    		<td class="txt-left"> <?php echo $t_loan = ($value->starting_loan_balance + $value->loan_distribution); 
		                    		$total_loan_amount+= $t_loan;?></td>			                    			                    		
		                    		<td> <?php echo $value->starting_loan_balance;
		                    				$total_starting_loan_balance+= $value->starting_loan_balance;
		                    		?></td>	

		                    		<td> <?php echo $value->loan_distribution;
		                    				$total_loan_distribution+= $value->loan_distribution;
		                    		?></td>	


		                    		<td> <?php echo $loan_collection = $value->loan_collection;
		                    			$total_loan_collection+= $loan_collection;
		                    		?></td>	                    		
		                    		<td> <?php echo $closing_loan_balance = ($t_loan -  $value->loan_collection );
		                    			$total_closing_loan_balance+= $closing_loan_balance;
		                    		?></td>

		                    		<td> <?php echo $value->starting_deposit_balance; $total_starting_deposit_balance+=$value->starting_deposit_balance; ?></td>
		                    		<td> <?php echo $value->deposit_collection;
		                    				$total_deposit_collection+= $value->deposit_collection;
		                    		?></td>
		                    		<td> <?php echo $value->deposit_withdrawn; $total_deposit_withdrawn+= $value->deposit_withdrawn;?></td>
		                    		<td> <?php echo $closing_deposit_balance = ($value->starting_deposit_balance + $value->deposit_collection - $value->deposit_withdrawn);
		                    			$total_closing_deposit_balance+= $closing_deposit_balance;
		                    		?></td>

		                    	</tr>






		                    <?php } }?>
		                    
		                </table>


		                <?php }


		              

		                 }?>

		                
		                 <h3 style="text-align: center;text-decoration: underline;"> Monthly overall summery report of <?php echo date('F-Y',strtotime($collection_date));?></h3>
				 
				<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>

								   <th>Starting memebers</th>                           
									<th>New members</th> 
									<th>Paid members</th> 
									<th>Closing members</th> 
									
									<th>Loan amount</th>
									<th>Starting loan balance</th>
									<th>Loan distribution</th>
									<th>loan collection</th>
									<th>Closing loan balance</th>
									<th>Starting Deposit balance</th>	
									<th>Deposit collection</th>
									<th>Deposit withdrawn</th>
									<th>Closing Deposit balance</th>
		                        </tr>
		                    </thead>

		                    	<tr>
									
									<th></th>

								   <th><?php echo $starting_members; ?></th>                           
									<th><?php echo $total_new_members; ?></th>
									<th><?php echo $total_paid_members; ?></th>
									<th><?php echo $total_closing_members; ?></th>
									<th><?php echo $total_loan_amount; ?></th>
									<th><?php echo $total_starting_loan_balance; ?></th>

									<th><?php echo $total_loan_distribution; ?></th>

									<th><?php echo $total_loan_collection; ?></th>
									<th><?php echo $total_closing_loan_balance; ?></th>
									<th><?php echo $total_starting_deposit_balance; ?></th>
									<th><?php echo $total_deposit_collection; ?></th>
									<th><?php echo $total_deposit_withdrawn; ?></th>
									<th><?php echo $total_closing_deposit_balance; ?></th>
		                        </tr>
		               </table>         
		                    
				 
				 
				 </div>

	</div>			 