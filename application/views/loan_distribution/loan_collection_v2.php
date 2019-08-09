<div class="row">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> Daily collection list</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			<div class="box-body">
 			 <form class="form-horizontal" method="post" action="">
	
				<div class="col-sm-3">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Schedule date</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="collection_date" name="collection_date" required="true" value="<?php echo $collection_date;?>">
	                      </div>
	                    </div>
	             </div>  


				<div style="display: none" class="col-sm-3">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Collection date</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="pay_date" name="pay_date" required="true" value="<?php echo date('d-m-Y');?>">
	                      </div>
	                    </div>
	             </div>      

	             <div class="col-sm-3">
	             	<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Area</label>
	                      <div class="col-sm-8">
	                       <select class="form-control" name="area"  id="area" required="true">

	                       		<!-- <option value="all"> All area </option> -->
		                        	 <?php  foreach($area_list as $d){?>

		                        	 	<option <?php echo $d->area_code==$area? "selected":"" ?> value="<?php echo $d->area_code;?>"><?php echo $d->area_name;?> </option>
		                        	 <?php } ?>
		                        </select>
	                      </div>
	                    </div>
	             </div> 

	             <div style="display: none" class="col-sm-3">
	             	<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Society</label>
	                      <div class="col-sm-8">
	                        <select class="form-control" name="society"  id="society" required="true">
		                        	<option value="all"> All society </option>
		                        	 <?php  foreach($society_list as $d){?>

		                        	 	<option <?php echo $d->society_code==$society? "selected":"" ?> class="all <?php echo $d->area_code;?>" value="<?php echo $d->society_code;?>"><?php echo $d->society_name;?> </option>
		                        	 <?php } ?>
		                        </select>
	                      </div>
	                    </div>
	             </div> 

	            


	             <div class="col-sm-2">
	             	<input type="submit" name="Search" value="Search">
	             </div> 
	          </form>   

	         </div>
	</div>             

</div>




<div class="row">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title col-md-12"> 
							 <div class="col-md-4"> Daily collection list </div> 
						 	 <div class="text-red col-md-4 "> Schedule date <span class="collection_date_text"><?php echo date('d-m-Y',strtotime($collection_date));?></span></div> 
							 <div class="text-red col-md-4 "> Collection date <span class="collection_date_text"><?php echo date('d-m-Y');?></span></div> 
					</h3>

					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 <?php if(count($society_wise_list)>0){

				 		foreach ($society_wise_list as $key => $list) {
				 			
				 	?>
				 	

				 	<table  width="100%">
				 		<tr>
				 			
				 			<th>Area :  <?php echo $list[0]->area_name;?></th>	
				 			<th> Society :  <?php echo $list[0]->society_name;?></th>		 							 			
				 			<th> staff :  <?php echo $list[0]->staff_name;?></th>	
				 			
				 		</tr>
				 	</table>
				 
					<table border="1" id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.</th>
								   <th>AC</th>                           
									<th>Name<br>Father/husband's</th> 
									<th>Mobile</th> 									
									
									<th>Issue date<br>Ins type</th>							
									<th>Loan<br>Deposit</th>
									<th>Col.Loan<br>Col Deposit</th>									
									<th>Installment amount<br>Num of Installment </th>
									<th>loan stay</th>
									<th>Loan amount</th>
									<th>Deposit stay</th>
									<th>Deposit amount</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1;
		                    foreach ($list as $key => $value) {

		                    	/* Loan issue date can not less then the current date.  */
		                    		if(!OOP::isValidStartScheduleDate($value->issue_date,$value->exsiting_issue_date,$collection_date)){
		                    			continue;
		                    		}

		                    		$installment_amount = $value->installment_amount>0?$value->installment_amount:1;
		                    		$number_of_istallment_paid = @($value->collection_loan_amount / $installment_amount);
		                    		$complated = $value->collection_loan_amount >= $value->loan_amount ? true:false;

		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>";?> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td> <?php echo $value->mob;?></td>
		                    		
		                    		
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->issue_date))."<br>".OOP::getInstallmentType($value->installment_type);?></td>
		                    		
		                    		<td> <?php echo $value->loan_amount."<br>".$value->deposit_amount;?></td>
		                    		<td> <?php echo $value->collection_loan_amount."(". ceil($number_of_istallment_paid) .")<br>".$value->collection_deposit_amount;?></td>
		                    		

		                    		
		                    		<td> <?php echo $value->installment_amount."<br>".$value->number_of_istallment;?></td>

		                    		<td> <?php echo $stay = ($value->loan_amount - $value->collection_loan_amount);?></td>
		                    		<td> <span class="label label-success open"><i class="fa fa-fw fa-check"></i>OPEN</span>
		                    			<?php 



		                    			// If any existing loan distribution is happen
		                    		$collection_loan_amount_without_exsit_collection = ($value->collection_loan_amount - $value->loan_paid_amt);
		                    		$number_of_istallment_paid = @($collection_loan_amount_without_exsit_collection / $installment_amount);
		                    		
		                    			 $col_amt = (((floor($number_of_istallment_paid) + 1) * $value->installment_amount) - $collection_loan_amount_without_exsit_collection);

		                    			if($stay>0){
		                    			?>

		                    			


		                    			<?php if( $value->txn_coll_loan>0){ 

		                    					if(OOP::isAdmin()){
		                    				?>

		                    				<input disabled="true" ins_amt="<?php  echo $value->txn_coll_loan;?>" txn_id="<?php echo $value->txn_id;?>" dist_id="<?php echo $value->id;?>" class="amt inst_amt <?php echo $value->txn_coll_loan>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->txn_coll_loan>0? $value->txn_coll_loan :$col_amt;?>"></input>


		                    				<?php }else{  echo $value->txn_coll_loan>0? $value->txn_coll_loan :$col_amt;}?>



		                    			<?php }else{ ?>


		                    				<input disabled="true" ins_amt="<?php  echo $value->installment_amount;?>" txn_id="<?php echo $value->txn_id;?>" dist_id="<?php echo $value->id;?>" class="amt inst_amt <?php echo  $value->txn_coll_loan>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->txn_coll_loan>0? $value->txn_coll_loan : $col_amt;?>">


		                    			<?php } 

		                    			}
		                    			?>
		                    			
		                    		
		                    			
		                    			
		                    		


		                    		</td>

		                    			<td> <?php //echo $value->deposit_balance;
		                    			echo ($value->collection_deposit_amount- $value->withdrawal_amount);?></td>
		                    		<td>
		                    				<?php //echo $value->deposit_amount;?>
		                    				

		                    				<?php if( $value->txn_coll_loan>0){ 

		                    					if(OOP::isAdmin()){
		                    				?>

		                    				<input disabled="true" dep_amt="<?php echo $value->deposit_amount;?>"  txn_id="<?php echo $value->txn_id;?>" dist_id="<?php echo $value->id;?>" class="amt deposit_amt <?php echo  $value->txn_coll_deposit>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->txn_coll_deposit>0 ? $value->txn_coll_deposit : $value->deposit_amount ;?>"></input>


		                    				<?php }else{ 
		                    						echo $value->txn_coll_deposit>0 ? $value->txn_coll_deposit : $value->deposit_amount ;
		                    				}?>



		                    			<?php }else{ ?>


		                    				<input disabled="true" dep_amt="<?php echo $value->deposit_amount;?>"  txn_id="<?php echo $value->txn_id;?>" dist_id="<?php echo $value->id;?>" class="amt deposit_amt <?php echo $value->txn_coll_deposit>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->txn_coll_deposit>0 ? $value->txn_coll_deposit : $value->deposit_amount ;?>"></input>


		                    			<?php } ?>



		                    			
		                    			
		                    				
		                    			
		                    		 </td>

		                    	</tr>






		                    <?php } }?>
		                    
		                </table>


		                <?php } }?>
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 

	</div>		
</div>

<style type="text/css">
	.amt{width: 50px;}
	.txt-left{text-align: left !important;}
	.red{border: 2px solid red; padding-left: 5px;}
	.green{border: 2px solid green; padding-left: 5px;}
</style>

<script type="text/javascript">
	
	$("#collection_date").datepicker({ dateFormat: 'dd-mm-yy' });
	$("#pay_date").datepicker({ dateFormat: 'dd-mm-yy' });


	$(document).on('change',"#area",function(){

		$(".all").hide();
		var area = $(this).val();

		$("."+area).show();
	});

	$(document).on("change","#pay_date",function(){

			
		$(".collection_date_text").text( $(this).val());
	});


	$(document).on("click",".open",function(){

			$(this).closest('tr').find('input').attr("disabled",false);
	});


	$(document).on("blur",'.inst_amt',function(){

		var txn_id = $(this).attr('txn_id');
		var dist_id = $(this).attr('dist_id');
		var ins_amt = $(this).attr('ins_amt');
		var inst_amt = $(this).val();
		var pay_date = $("#pay_date").val();
		var schedule_date = "<?php echo date('d-m-Y',strtotime($collection_date));?>";


		if((ins_amt == inst_amt)){
			loanCollection(txn_id,dist_id,inst_amt,0,pay_date,schedule_date);	
			$(this).addClass("green");
			
			
		}else{
			
			
			

			$.confirm({
						'title'		: 'Loan collection notification',
						'message'	: 'Collection amount and installment amount does not equal !<br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 loanCollection(txn_id,dist_id,inst_amt,0,pay_date,schedule_date);
									 $(this).addClass("red");
								}
							},
							'No'	: {
								'class'	: 'gray',
								'action': function(){ $(this).addClass("red"); }	// Nothing to do in this case. You can as well omit the action property.
							}
						}
					});

		}

		$(this).attr("disabled",true);

		


	});

	$(document).on("blur",'.deposit_amt',function(){

		var txn_id = $(this).attr('txn_id');
		var dist_id = $(this).attr('dist_id');
		var dep_amt = $(this).attr('dep_amt');
		var deposit_amt = $(this).val();
		var pay_date = $("#pay_date").val();
		var schedule_date = "<?php echo date('d-m-Y',strtotime($collection_date));?>";

		if((dep_amt == deposit_amt)){
			loanCollection(txn_id,dist_id,0,deposit_amt,pay_date,schedule_date);
			$(this).addClass("green");
			
			
		}else{
			
			
			

			$.confirm({
						'title'		: 'Deposit collection notification',
						'message'	: 'Deposit amount and deposit installment amount does not equal ! <br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 loanCollection(txn_id,dist_id,0,deposit_amt,pay_date,schedule_date);
									// $(this).addClass("red");
									$(this).addClass("green");
								}
							},
							'No'	: {
								'class'	: 'gray',
								'action': function(){ $(this).addClass("red");}	// Nothing to do in this case. You can as well omit the action property.
							}
						}
					});
		}

		
	$(this).attr("disabled",true);

	})



	function loanCollection(txn_id,dist_id,inst_amt,deposit_amt,pay_date,schedule_date){

			$("#loader-holder").show();
		$.post(base_url+'loan-distribution/loan-transaction',{txn_id:txn_id,dist_id:dist_id,inst_amt:inst_amt,deposit_amt:deposit_amt,pay_date:pay_date,schedule_date:schedule_date},function(data){
				$("#loader-holder").hide();

		})

	}

</script>