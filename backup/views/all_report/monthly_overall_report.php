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
		                    		
		                    		$new_members  = ($value->closing_members - $value->starting_members);
		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->starting_members;?></td>
		                    		<td> <?php echo ($new_members>0)? $new_members : 0  ;?></td>
		                    		<td> <?php echo ($new_members<0)? abs($new_members) : 0  ;?></td>
		                    		<td> <?php echo $value->closing_members;?></td>


		                    		<td class="txt-left"> <?php echo $value->loan_amount;?></td>			                    			                    		
		                    		<td> <?php echo ($value->loan_amount - $value->stating_loan);?></td>	
		                    		<td> <?php echo ($value->closing_loan - $value->stating_loan);?></td>	                    		
		                    		<td> <?php echo ($value->loan_amount -$value->closing_loan);?></td>

		                    		<td> <?php echo $value->stating_deposit;?></td>
		                    		<td> <?php echo ($value->closing_deposit - $value->stating_deposit) ;?></td>
		                    		<td> <?php echo $value->withdrawal_amount;?></td>
		                    		<td> <?php echo ($value->closing_deposit - $value->withdrawal_amount);?></td>

		                    	</tr>






		                    <?php } }?>
		                    
		                </table>


		                <?php } }?>
				 
				 
				 
				 
				 </div>

	</div>			 