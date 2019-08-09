<style type="text/css">
	h3{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>
<div class="row">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> <b class=""><?php echo $title;?> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
					<table id="list" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
								   <th>Account Number</th>                           
									<th>Name<br>Father Name</th> 									
									<th>Area Name<br>Society Name</th>
									<th>Issue date<br>Installment type</th>							
									<th>Loan amount<br>Deposit amount</th>
									<th>Collection Loan amount<br>Collection Deposit amount</th>
									<th>Installment amount<br>Num of Installment </th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){
		                    foreach ($list as $key => $value) {
		                    		

		                    	?>
		                    	<tr id="<?php echo $value->id;?>">
		                    		
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		
		                    		<td> <?php echo $value->area_name."<br>".$value->society_name;?></td>
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount."<br>".$value->deposit_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."<br>".$value->collection_deposit_amount;?></td>

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->number_of_istallment;?></td>
		                    		<td> <a class="btn" target="_blank" href="<?php echo site_url('loan-distribution/loan-distribution-report-pdf').'/'.$value->id ; ?>"> View</a>

		                    			<?php if( $list_type == "pending"){?>
		                    			<a class="btn" href="javascript:;" onclick="loanApprove(<?php echo $value->id;?>)">Approve</a>
		                    			<a class="btn" href="<?php echo site_url('loan-distribution/edit').'/'.$value->id ; ?>" >Edit</a>
		                    			<a class="btn" href="javascript:;" onclick="loanDelate(<?php echo $value->id;?>)">Delate</a>
		                    			<?php }elseif ($list_type == "approved") {
		                    				?>
		                    			<a class="btn" href="javascript:;" onclick="loanDecline(<?php echo $value->id;?>)">Decline</a>

		                    			<?php } else{?>
										<a class="btn" href="javascript:;" >Complated</a>
		                    			<?php } ?>
		                    		</td>
		                    	</tr>






		                    <?php }} ?>
		                    
		                </table>
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 

	</div>		
</div>

<script type="text/javascript">
	

	$('#list').DataTable();


	function loanDelate(dist_id){

		


		$.confirm({
			'title'		: 'Loan distribution approve confirmation',
			'message'	: 'You are about to active this loan. <br />  <b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"loan-distribution/loan-approve",{dist_id:dist_id},function(){

							$("#"+dist_id).remove();

						});
						 
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});



	}


	function loanApprove(dist_id){

		


		$.confirm({
			'title'		: 'Loan distribution approve confirmation',
			'message'	: 'You are about to active this loan. <br />  <b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"loan-distribution/loan-approve",{dist_id:dist_id},function(){

							$("#"+dist_id).remove();

						});
						 
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});



	}


	function loanDecline(dist_id){

		


		$.confirm({
			'title'		: 'Loan distribution decline confirmation',
			'message'	: 'You are about to decline this loan. <br />  <b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"loan-distribution/loan-decline",{dist_id:dist_id},function(){

							$("#"+dist_id).remove();

						});
						 
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});



	}


	



	

</script>