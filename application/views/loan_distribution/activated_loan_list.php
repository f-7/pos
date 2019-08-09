<div class="row">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> <b class="red_color">Deactivated </b> Account's list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
					<table id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
								   <th>Account Number</th>                           
									<th>Name</th> 
									<th>Father Name</th> 
									<th>Area Name</th>
									<th>Society Name</th>	
									<th>Installment day</th>							
									<th>Issue date</th>							
									<th>Installment type</th>							
									<th>Amount of Loan</th>
									<th>Amount of deposit</th>
									<th>Amount of installment </th>
									<th>Total number of installment </th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){
		                    foreach ($list as $key => $value) {
		                    		

		                    	?>
		                    	<tr>
		                    		
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name;?></td>
		                    		<td> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td> <?php echo $value->society_name;?></td>
		                    		<td> <?php echo $value->area_name;?></td>
		                    		<td> <?php echo $value->issue_date;?></td>
		                    		<td> <?php echo $value->installment_type;?></td>
		                    		<td> <?php echo $value->loan_amount;?></td>

		                    		<td> <?php echo $value->deposit_amount;?></td>
		                    		<td> <?php echo $value->installment_amount;?></td>
		                    		<td> <?php echo $value->number_of_istallment;?></td>
		                    		<td> </td>
		                    	</tr>






		                    <?php } ?>
		                    
		                </table>
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 

	</div>		
</div>