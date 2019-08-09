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

	             <div style="display: none;" class="col-sm-3">
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
						 <div class="text-red col-md-4 "> Collection date <span class="collection_date_text"><?php echo date('d-m-Y');?></span></div> </h3>
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
				 	<div class="col-md-12"> 
				 		<h4 class="box-title"><div class="col-sm-4"> Area :  <?php echo $list[0]->area_name;?></div> <div class="col-sm-4"> Society :  <?php echo $list[0]->society_name;?></div></h4>
				 			
				 	</div>
				 
					<table id="inactive_account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
		                    <thead>
		                        <tr>
									
									<th>Sl.No.</th>
								   <th>Account Number</th>                           
									<th>Name</th> 
									<th>Father/Husband</th> 
									<th>Phone No</th>
									<th colspan="2">Loan collection</th>	
									<th colspan="2">Deposit collection</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){ $i = 1; 
		                    	$collection_loan = 0; 
		                    	$deposit_amount = 0 ; 
		                    foreach ($list as $key => $value) {
		                    		
		                    		$collection_loan += $value->collection_loan_amount;  
		                    		$deposit_amount += $value->collection_deposit_amount;
		                    	?>
		                    	<tr>
		                    		<td><?php echo $i++;?></td>
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td class="txt-left"> <?php echo $value->name;?></td>
		                    		<td class="txt-left"> <?php echo OOP::getGuardian($value->fathers_name,$value->spouse_name);?></td>
		                    		<td class="txt-left"> <?php echo $value->mob;?></td>
		                    		<td><?php echo $value->installment_amount ."/=";?></td>
		                    		<td>
		                    			<?php if( $value->collection_loan_amount>0){ 

		                    					if(OOP::isAdmin()){
		                    				?>

		                    				<input ins_amt="<?php  echo $value->installment_amount;?>" txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt inst_amt <?php echo $value->installment_amount == $value->collection_loan_amount? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_loan_amount>0? $value->collection_loan_amount : $value->installment_amount;?>">


		                    				<?php }else{ echo $value->collection_loan_amount;}?>



		                    			<?php }else{ ?>


		                    				<input ins_amt="<?php  echo $value->installment_amount;?>" txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt inst_amt <?php echo $value->installment_amount == $value->collection_loan_amount? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_loan_amount>0? $value->collection_loan_amount : $value->installment_amount;?>">


		                    			<?php } ?>
		                    			
		                    		
		                    			
		                    			
		                    		</input> </td>
		                    		<td><?php echo $value->deposit_amount ."/=";?></td>
		                    		<td> 


		                    			<?php if( $value->collection_deposit_amount>0){ 

		                    					if(OOP::isAdmin()){
		                    				?>

		                    				<input dep_amt="<?php echo $value->deposit_amount;?>"  txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt deposit_amt <?php echo $value->deposit_amount == $value->collection_deposit_amount? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_deposit_amount>0 ? $value->collection_deposit_amount : $value->deposit_amount ;?>">


		                    				<?php }else{ echo $value->collection_deposit_amount;}?>



		                    			<?php }else{ ?>


		                    				<input dep_amt="<?php echo $value->deposit_amount;?>"  txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt deposit_amt <?php echo $value->deposit_amount == $value->collection_deposit_amount? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_deposit_amount>0 ? $value->collection_deposit_amount : $value->deposit_amount ;?>">


		                    			<?php } ?>



		                    			
		                    			
		                    				
		                    			</input>
		                    			</td>
		                    	</tr>






		                    <?php }

		                    		echo '<tr> <td colspan="5"></td><td>Total</td><td class="total_loan"> '. $collection_loan.'</td><td>Total</td><td class="total_deposit">'.$deposit_amount.'</td></tr>';
		                     }?>
		                    
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
	})


	$(document).on("blur",'.inst_amt',function(){

		var txn_id = $(this).attr('txn_id');
		var dist_id = $(this).attr('dist_id');
		var ins_amt = $(this).attr('ins_amt');
		var inst_amt = $(this).val();
		var pay_date = $("#pay_date").val();


		if((ins_amt == inst_amt)){
			loanCollection(txn_id,dist_id,inst_amt,0,pay_date);	
			$(this).addClass("green");
			
			
		}else{
			
			
			

			$.confirm({
						'title'		: 'Loan collection notification',
						'message'	: 'Collection amount and installment amount does not equal !<br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 loanCollection(txn_id,dist_id,inst_amt,0,pay_date);
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

		


	});

	$(document).on("blur",'.deposit_amt',function(){

		var txn_id = $(this).attr('txn_id');
		var dist_id = $(this).attr('dist_id');
		var dep_amt = $(this).attr('dep_amt');
		var deposit_amt = $(this).val();
		var pay_date = $("#pay_date").val();

		if((dep_amt == deposit_amt)){
			loanCollection(txn_id,dist_id,0,deposit_amt,pay_date);
			$(this).addClass("green");
			
			
		}else{
			
			
			

			$.confirm({
						'title'		: 'Deposit collection notification',
						'message'	: 'Deposit amount and deposit installment amount does not equal ! <br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 loanCollection(txn_id,dist_id,0,deposit_amt,pay_date);
									 $(this).addClass("red");
								}
							},
							'No'	: {
								'class'	: 'gray',
								'action': function(){ $(this).addClass("red");}	// Nothing to do in this case. You can as well omit the action property.
							}
						}
					});
		}

		


	})



	function loanCollection(txn_id,dist_id,inst_amt,deposit_amt,pay_date){

			
		$.post(base_url+'loan-distribution/loan-transaction',{txn_id:txn_id,dist_id:dist_id,inst_amt:inst_amt,deposit_amt:deposit_amt,pay_date:pay_date},function(data){


		})

	}

</script>