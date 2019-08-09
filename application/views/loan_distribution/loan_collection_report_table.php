<style type="text/css">
	h3{font-size: 10px;}
	td{font-size: 10px; text-align: center;}
	th{font-size: 10px; text-align: center;}
</style>

<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;"><?php echo ucfirst($report_type);?> Collection Schedule of <?php echo $date ;?> </h3>
				 
				 <?php if(count($society_wise_list)>0){

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
								   <th>Account Number</th>                           
									<th>Name</th> 
									<th>Father/Husband</th> 
									<th>Phone No</th>
									<th>Schedule date</th>
									
									<th>Loan collection</th>	
									<th>Deposit collection</th>
									<th>Remark</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1;
		                    foreach ($list as $key => $value) {
		                    		

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td class="txt-left"> <?php echo $value->name;?></td>
		                    		<td class="txt-left"> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td class="txt-left"> <?php echo $value->mob;?></td>	
		                    		<td class="txt-left"> <?php echo date('d-M-Y',strtotime($value->collection_date));?></td>	
		                    		                    		
		                    		<td> <?php echo $value->installment_amount;

		                    				
		                    		?>
		                    			
		                    		</td>		                    		
		                    		<td> <?php echo $value->deposit_amount;?></td>
		                    		<td> </td>
		                    	</tr>






		                    <?php } }?>
		                    
		                </table>


		                <?php } }?>
				 
				 
				 
				 
				 </div>

	</div>			 