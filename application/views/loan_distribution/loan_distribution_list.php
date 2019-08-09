<style type="text/css">
	.table-danger{
		background-color:#dc3545!important;
		color: white;
	}

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
									<th>Name<br>Father/husband's</th> 									
									<th>Area Name<br>Society Name</th>
									<th>Issue date<br>Installment type</th>							
									<th>Loan amount<br>Num of Installment</th>
									<th>Col.Loan Amt<br>Col Deposit Amt.</th>
									<th>Stay Loan<br>Stay Deposit</th>
									
									<th>Inst. Loan amt<br> Deposit amt</th>
		                            <th>Action</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){
		                    foreach ($list as $key => $value) {

		                    			$stay_deposit = ($value->collection_deposit_amount - $value->withdrawal_amount);

		                    			
		                    			/* over due loan will be diffrent color */
										if($value->installment_type == 0){
											$overDeu = date("Y-m-d", strtotime("+ ".$value->number_of_istallment." week", strtotime($value->issue_date)));
										}else if($value->installment_type == 1){
											$overDeu = date("Y-m-d", strtotime("+ ".$value->number_of_istallment." month", strtotime($value->issue_date)));
										}else{
											$overDeu = date("Y-m-d", strtotime("+ ".$value->number_of_istallment." year", strtotime($value->issue_date)));
										}

										$deu = "";
										if($overDeu < date('Y-m-d')){
											$deu = "table-danger";
										}
										/* =====End========== */

		                    		
		                    		if($list_type == "completed"){

		                    			if($stay_deposit > 1){
		                    				//echo $value->deposit_balance;
		                    				continue;
		                    			}
		                    		}
		                    		if($list_type == "depositor"){

		                    			if($stay_deposit < 1){
		                    				//echo $value->deposit_balance;
		                    				continue;
		                    			}
		                    		}

		                    		$number_of_istallment_paid = @ceil($value->collection_loan_amount / $value->installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;



		                    	?>
		                    	<tr data-id="<?php echo $value->user_id; ?>" id="<?php echo $value->id;?>" class="<?php echo $complated ? "info":"" ; echo $deu; ?>"  >
		                    		
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		
		                    		<td> <?php echo $value->area_name."<br>".$value->society_name;?></td>
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type); ?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount."<br>".$value->number_of_istallment;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". $number_of_istallment_paid .")<br>".$value->collection_deposit_amount;?></td>
		                    		<td> <?php echo ($value->loan_amount - $value->collection_loan_amount)."<br>".$stay_deposit;?></td>

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->deposit_amount;?></td>
		                    		<td> <a class="btn" target="_blank" href="<?php echo site_url('loan-distribution/loan-distribution-report-pdf').'/'.$value->id ; ?>"> View</a>

		                    			<?php if( $list_type == "pending"){?>
		                    			
		                    			<a class="btn" href="<?php echo site_url('loan-distribution/edit').'/'.$value->id ; ?>" >Edit</a>

		                    			<?php if(OOP::isAdmin()) {?>
		                    			<a class="btn" href="javascript:;" onclick="loanApprove(<?php echo $value->id;?>)">Approve</a>
		                    			<a class="btn" href="javascript:;" onclick="loanDelate(<?php echo $value->id;?>)">Delete</a>

		                    			<?php } }elseif ($list_type == "approved" && OOP::isAdmin()) {
		                    				?>
		                    			<a class="btn" href="javascript:;" onclick="loanDecline(<?php echo $value->id;?>)">Decline</a>

		                    			<?php if($deu == "table-danger"){?>
		                    			<a class="btn" href="javascript:;" onclick="loanRecoverTeam(<?php echo $value->id;?>)">Recover</a>

		                    			

		                    			<?php } } ?>

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
	         		<td>
	         			<label class="radio-inline"><input class="remark" type="radio" name="optradio" value="Transaction was very good.">Transaction was very good.</label>
						<label class="radio-inline"><input class="remark" type="radio" name="optradio" value="Transaction was satisfying.">Transaction was satisfying. </label>
						<label class="radio-inline"><input  class="remark" type="radio" name="optradio" value="Transaction was irregular.">Transaction was irregular.</label>
						<label class="radio-inline"><input class="remark" type="radio" name="optradio" value="Transaction was bad">Transaction was bad</label>


	         			<textarea id="remark-txt"></textarea>

	         		</td>
	         	</tr>

	         	<tr>
	         		<th>Account Block</th>
	         		<td> <button id="account-block" onclick="#"  type="button" class="btn btn-danger">Account Block</button></td>	

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

	function accountBlock(user_id){  
	  
	  
	 	$.confirm({
			'title'		: 'Account block Confirmation',
			'message'	: 'You are about to block this account. <br />  <b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
									
						
						 $.post(base_url+"account-information/update-account-status",{id:user_id,status:0},function(view){
							 											
						 });
						 
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
 }; 


	$(document).on("click",".remark",function(){
		$("#remark-txt").val($(this).val());

	})

	function remark(dist_id){

		var account_number = $('#'+dist_id+' td:nth-child(1)').html();
		var name = $('#'+dist_id+' td:nth-child(2)').html();		
		var area = $('#'+dist_id+' td:nth-child(3)').html();
		var id = $('#'+dist_id).attr('data-id');

		$(".account_number").html(account_number);
		$(".name").html(name);
		$(".area").html(area);
		$("#remark-txt").val('');

		$("#remark-btn").attr("onclick","complated("+dist_id+")");
		$("#account-block").attr("onclick","accountBlock("+id+")");

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



	function loanRecoverTeam(dist_id){

		


		$.confirm({
			'title'		: 'Loan distribution recover confirmation',
			'message'	: 'You are about to active this loan for recover team. <br />  <b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"loan-distribution/loan-recover-team",{dist_id:dist_id},function(){

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