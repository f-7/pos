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
									<th>Name<br>Father/husband's</th> 									
									<th>Area Name<br>Society Name</th>
									<th>Issue date<br>Installment type</th>							
									<th>Loan amount<br>Deposit amount</th>
									<th>Col.Loan Amt<br>Col Deposit Amt.</th>
									
									<th>Installment amount<br>Num of Installment </th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){
		                    foreach ($list as $key => $value) {
		                    		
		                    		$number_of_istallment_paid = ceil($value->collection_loan_amount / $value->installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;



		                    	?>
		                    	<tr id="<?php echo $value->id;?>" class="<?php echo $complated ? "info":""  ?>"  >
		                    		
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		
		                    		<td> <?php echo $value->area_name."<br>".$value->society_name;?></td>
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount."<br>".$value->deposit_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". $number_of_istallment_paid .")<br>".$value->collection_deposit_amount;?></td>
		                    		

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->number_of_istallment;?></td>
		                    		<td> <a class="btn" target="_blank" href="<?php echo site_url('loan-distribution/loan-distribution-report-pdf').'/'.$value->id ; ?>"> View</a>

		                    			<?php if( $list_type == "pending"){?>
		                    			
		                    			<a class="btn" href="<?php echo site_url('loan-distribution/edit').'/'.$value->id ; ?>" >Edit</a>

		                    			<?php if(OOP::isAdmin()) {?>
		                    			<a class="btn" href="javascript:;" onclick="loanApprove(<?php echo $value->id;?>)">Approve</a>
		                    			<a class="btn" href="javascript:;" onclick="loanDelate(<?php echo $value->id;?>)">Delete</a>
		                    			<?php } }elseif ($list_type == "approved" && OOP::isAdmin()) {
		                    				?>
		                    			<a class="btn" href="javascript:;" onclick="loanDecline(<?php echo $value->id;?>)">Decline</a>

		                    			

		                    			<?php }  ?>

		                    			<?php if($list_type == "completed" && OOP::isAdmin()){?>
		                    			<a class="btn" href="javascript:;" onclick="remark(<?php echo $value->id;?>)">Remark</a>
		                    			<?php }; ?>
		                    		</td>
		                    	</tr>






		                    <?php }} ?>
		                    
		                </table>
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 

	</div>		
</div>

<style type="text/css">
	
		#remark th{text-align: right;}
		#remark td{text-align: left;}
		#remark textarea{width: 100%; height: 80px;}

</style>

<!-- Modal -->
<div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Account information</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	         <table id="remark" class="table table-striped table-bordered responsive nowrap responsive_table dataTable no-footer">
	         	<tr >
	         		<th>Account number</th>
	         		<td class="account_number"></td>
	         	</tr>
	         	<tr>
	         		<th>Name<br>Father Name</th> 
	         		<td class="name"></td>
	         	</tr>
	         	<tr>
	         		<th>Area Name<br>Society Name</th>
	         		<td class="area"></td>	

	         	</tr>
	         	
	         	<tr>
	         		<th>Remark</th> 
	         		<td><textarea id="remark-txt"></textarea>

	         		</td>
	         	</tr>
	         </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button id="remark-btn" onclick="#" type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>


<script type="text/javascript">


	function remark(dist_id){

		var account_number = $('#'+dist_id+' td:nth-child(1)').html();
		var name = $('#'+dist_id+' td:nth-child(2)').html();		
		var area = $('#'+dist_id+' td:nth-child(3)').html();

		$(".account_number").html(account_number);
		$(".name").html(name);
		$(".area").html(area);
		$("#remark-txt").val('');

		$("#remark-btn").attr("onclick","complated("+dist_id+")");

		$("#remark").modal('show');
	}

	function complated(dist_id){

			var remark_txt = $("#remark-txt").val();

			if(remark_txt.length>5){

					$.confirm({
						'title'		: 'Loan distribution archived confirmation',
						'message'	: 'This loan distribution is going to Archive list . <br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 			
									
									$.post(base_url+"loan-distribution/loan-collection-complated",{dist_id:dist_id,remark_txt:remark_txt},function(){

										$("#"+dist_id).remove();
										$("#remark").modal('hide');

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


			


	}
	

	$('#list').DataTable();


	function loanDelate(dist_id){

		


		$.confirm({
			'title'		: 'Loan distribution approve confirmation',
			'message'	: 'You are about to active this loan. <br />  <b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"loan-distribution/loan-delete",{distribution_id:dist_id},function(){

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