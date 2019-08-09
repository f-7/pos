<style type="text/css">
	.row{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>


<div class="row">
				 <div class="col-md-12">  

				 	<h3 style="text-align: center;text-decoration: underline;"> <?php echo $report_type; ?> deposit withdrawal report </h3>


<table border="1" id="list" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
								   <th>Account Number</th>                           
									<th>Name<br>Father Name</th> 									
									<th>Area Name<br>Society Name</th>
									<th>Withdrawl date</th>																
									<th> Withdrawl amount</th>
									<th> Previous deposit amount</th>									
		                           
		                        </tr>
		                    </thead>

		                    <?php if($list){ $total_amt = 0; 
		                    foreach ($list as $key => $value) {
		                    		
		                    		$total_amt+= $value->withdrawal_amount;

		                    	?>
		                    	<tr id="<?php echo $value->id;?>">
		                    		
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>".$value->fathers_name;?></td>
		                    		
		                    		<td> <?php echo $value->area_name."<br>".$value->society_name;?></td>
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->withdrawal_date));?></td>
		                    		
		                    		<td> <?php echo $value->withdrawal_amount;?></td>
		                    		<td> <?php echo $value->prv_amount;?></td>
		                    		
		                    	</tr>






		                    <?php }} ?>

		                    <tr>
		                    	<td colspan="4"> Total</td>
		                    	<td><?php echo $total_amt; ?></td>
		                    	<td></td>
		                    </tr>
		                    
		                </table>

		       </div>
		       
		</div>         