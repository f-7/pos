<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px; text-align: center;}
	th{font-size: 10px; text-align: center;}
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
				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>
								   <th>AC Number</th>                           
									<th>Name<br>Father/husband's</th> 									
									
									<th>Issue date<br>Installment type</th>							
									<th>Loan amount<br>Deposit amount</th>
									<th>Col.Loan Amt<br>Col Deposit Amt.</th>									
									<th>Installment amount<br>Num of Installment </th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1;
		                    foreach ($list as $key => $value) {
		                    		$number_of_istallment_paid = ($value->collection_loan_amount / $value->installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		
		                    		
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount."<br>".$value->deposit_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". ceil($number_of_istallment_paid) .")<br>".$value->collection_deposit_amount;?></td>
		                    		

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->number_of_istallment;?></td>

		                    	</tr>






		                    <?php } }?>
		                    
		                </table>


		                <?php } }?>
				 
				 
				 
				 
				 </div>

	</div>			 