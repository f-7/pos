
<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>
<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;">Monthly area wise collection report of <?php echo date('F-Y',strtotime($collection_date));?></h3>
				 
				 <?php if(count($society_wise_list)>0){ 

				 	$total_area_loan = 0;
				 	$total_area_deposit= 0;

				 		foreach ($society_wise_list as $key => $list) {
				 			
				 	?>
				 	

				 	<table  width="100%">
				 		<tr>
				 			
				 			<th>Area :  <?php echo $list[0]->area_name;?></th>	
				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th width="10">Sl.</th>
								   <th width="100">Pay day</th>                           
									<th>Collection Loan amt</th> 
									<th>Collection Deposit amt</th>>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1; 

		                    	$total_loan =0;
		                    	$total_deposit = 0; 
		                    foreach ($list as $key => $value) {
		                    		
		                    		$total_loan+=$value->collection_loan_amount;
		                    		$total_deposit+=$value->collection_deposit_amount;

		                    		$total_area_loan+=$value->collection_loan_amount;
		                    		$total_area_deposit+=$value->collection_deposit_amount;

		                    		

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo date('d-M-Y',strtotime($value->pay_date));?></td>		                    		
		                    		<td> <?php echo $value->collection_loan_amount;?></td>
		                    		<td> <?php echo $value->collection_deposit_amount;?></td>
		                    	</tr>






		                    <?php }

		                    		echo '<tr><td colspan="2">All Total </td><td>'.$total_loan.'</td> <td>'.$total_deposit.'</td> </tr>';
		                     }?>
		                    
		                </table>


		                <?php } }?>


		                <table border="1" width="100%">

		                	<tr>
		                		<td>All Total Loan Collection</td>
		                		<td><?php echo $total_area_loan?></td>

		                	</tr>
		                	<tr>
		                		<td>All Total Deposit Collection</td>
		                		<td><?php echo $total_area_deposit?></td>

		                	</tr>
		                	
		                </table>
				 
				 
				 
				 
				 </div>

	</div>			 