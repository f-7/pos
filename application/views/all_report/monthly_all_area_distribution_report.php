
<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px; padding-left: 5px}
	th{font-size: 10px;}
</style>
<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;"><?php echo $report_title; ?></h3>
				 
				 <?php if(count($society_wise_list)>0){ 

				 	$total_area_loan = 0;
				 	$total_area_deposit= 0;
				 	$all_total_loan = 0;

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
								   <th width="300">Socity name</th>                           
									
									<th>Loan amount</th>>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1; 

		                    	$total_loan =0;
		                    	$total_deposit = 0; 
		                    foreach ($list as $key => $value) {
		                    		
		                    		
		                    		$total_loan+=$value->loan_amount;
		                    		$all_total_loan+=$value->loan_amount;

		                    		

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->society_name; ?></td>		                    		
		                    	
		                    		<td> <?php echo $value->loan_amount;?></td>
		                    	</tr>






		                    <?php }

		                    		echo '<tr><td colspan="2">Total </td> <td>'.$total_loan.'</td> </tr>';
		                     }?>
		                    
		                </table>


		                <?php } }?>


		                <table border="1" width="100%">

		                	<tr>
		                		<td>All Total Loan amount</td>
		                		<td><?php echo $all_total_loan?></td>

		                	</tr>
		                	
		                	
		                </table>
				 
				 
				 
				 
				 </div>

	</div>			 