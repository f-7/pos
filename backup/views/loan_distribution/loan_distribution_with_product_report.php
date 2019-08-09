<style type="text/css">
	
	#inactive_account_list_table tr td{border: 1px solid;}
	#inactive_account_list_table tr th{border: 1px solid;}
	.sub-table tr td{border: 0px solid; padding:5px; bottom: 1px solid}
	.sub-table tr{border: 1px solid;}
	
</style>
<style type="text/css">
	h3{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>

<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;"><?php echo ucfirst($report_type);?> loan dsitribution and Profit report</h3>
				 
				 <?php if(count($society_wise_list)>0){

				 		foreach ($society_wise_list as $key => $list) {
				 			
				 			foreach ($list as $key => $value) {
				 				$account_number_wise[$value->account_number][] = $value;
				 			}
				 	?>
				 	

				 	<table style="width: 100%" >
				 		<tr>
				 		<!-- 	<th>Date: <?php //echo date('d-F-Y',strtotime($list[0]->issue_date));?></th> -->
				 			<th>Area :  <?php echo $list[0]->area_name;?></th>
				 			<th> Society :  <?php echo $list[0]->society_name;?></th>
				 			<th> Staff :  <?php echo $list[0]->staff;?></th>
				 			
				 		</tr>
				 	</table>
				 
					<table  id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>
									<th>Date</th>
								   <th>Account Number</th>                           
									<th>Customer Name<br>Father/Husband</th> 									
									<th>Product S.no</th>									
									<th>Product details</th>	
									<th>Amount of loan</th>
									<th>Capital</th>
									<th>Profit</th>
		                        </tr>
		                    </thead>

		                    <?php if($account_number_wise){ $i = 1;
		                    foreach ($account_number_wise as $key => $value) {
		                    		

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td class="txt-left"> <?php echo date('d-M-Y',strtotime($value[0]->issue_date));?></td>
		                    		<td> <?php echo $value[0]->account_number;?></td>
		                    		<td class="txt-left"> <?php echo $value[0]->name;?><br> <?php echo OOP::getGuardian($value[0]->fathers_name,$value[0]->spouse_name);?></td>
		                    		<td colspan="2">
		                    			<table  class="sub-table" cellspacing="0" cellpadding="0" width="100%">
		                    				
		                    			
		                    				<?php 

		                    					if(is_array($value)){
		                    						foreach ($value as $key => $val) {
		                    							echo "<tr> <td>".$val->serial_no."</td><td>".$val->product_name."</td></tr>"	;
		                    						}
		                    					}
		                    				?>
		                    				</table>
		                    		</td>
		                    		
		                    				                    		                    			                    		
		                    		<td> <?php echo $value[0]->loan_amount;?></td>		
		                    		<td></td>	
		                    		<td></td>	                    		
		                    		
		                    	</tr>






		                    <?php unset($account_number_wise); } }?>
		                    
		                </table>


		                <?php } }?>
				 
				 
				 
				 
				 </div>

	</div>			 