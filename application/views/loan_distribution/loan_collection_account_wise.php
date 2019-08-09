<div class="row">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> Account wise collection list</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			<div class="box-body">
 			 <form class="form-horizontal" method="post" action="">
	
				<div class="col-sm-8">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Account number</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="account_number" name="account_number" required="true" value="">
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
						<div class="col-md-8"> Account wise collection list </div> 
						 <div class="text-red col-md-4 "> Collection date <span class="collection_date_text"><?php echo date('d-m-Y');?></span></div> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="col-sm-8">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-2 control-label">Distributed loan list</label>
	                      <div class="col-sm-10">
	                       <select class="form-control" id="table-filter"></select>
	                      </div>
	                    </div>
	             </div> 

						
					</div>

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
									<th>loan amount</th>
									<th>Issue Date</th>
									<th>Schedule Date</th>
									<th>Loan</th>
									<th>Loan collection</th>
									<th>Deposit</th>	
									<th>Deposit collection</th>
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
		                    		<td class="txt-left"> <?php echo $value->loan_amount;?></td>
		                    		<td class="txt-left"> <?php echo $value->issue_date;?></td>
		                    		<td class="txt-left"> <?php echo date('d-m-Y',strtotime($value->collection_date));?></td>
		                    		<td><?php echo "(".$value->installment_amount .")";?></td>
		                    		<td>  <span class="label label-success open"><i class="fa fa-fw fa-check"></i>OPEN</span>
		                    			<?php


		                    				// If any existing loan distribution is happen
		                    			
		                    		
		                    			 $col_amt = $value->installment_amount;


		                    			 if( $value->collection_loan_amount>0){ 

		                    					if(OOP::isAdmin()){
		                    				?>

		                    				<input disabled="true" schedule_date="<?php echo $value->collection_date;?>" ins_amt="<?php  echo $col_amt;?>" txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt inst_amt <?php echo $value->collection_loan_amount>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_loan_amount>0? $value->collection_loan_amount : '';?>">


		                    				<?php }else{ echo $value->collection_loan_amount;}?>



		                    			<?php }else{ ?>


		                    				<input disabled="true" schedule_date="<?php echo $value->collection_date;?>" ins_amt="<?php  echo $col_amt;?>" txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt inst_amt <?php echo $value->collection_loan_amount>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_loan_amount>0? $value->collection_loan_amount : '';?>">


		                    			<?php } ?>
		                    			
		                    		
		                    			
		                    			
		                    		</input>








		                    		 </td>
		                    		<td><?php echo "(".$value->deposit_amount .")";?></td>
		                    		<td> 


		                    			<?php if( $value->collection_deposit_amount>0){ 

		                    					if(OOP::isAdmin()){
		                    				?>

		                    				<input disabled="true" schedule_date="<?php echo $value->collection_date;?>" dep_amt="<?php echo $value->deposit_amount;?>"  txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt deposit_amt <?php echo $value->collection_deposit_amount>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_deposit_amount>0 ? $value->collection_deposit_amount : '' ;?>">


		                    				<?php }else{ echo $value->collection_deposit_amount;}?>



		                    			<?php }else{ ?>


		                    				<input disabled="true" schedule_date="<?php echo $value->collection_date;?>" dep_amt="<?php echo $value->deposit_amount;?>"  txn_id="<?php echo $value->loan_transaction_id;?>" dist_id="<?php echo $value->loan_distribution_id;?>" class="amt deposit_amt <?php echo  $value->collection_deposit_amount>0? "green":"red";  ?>" type="text" name="" value="<?php echo $value->collection_deposit_amount>0 ? $value->collection_deposit_amount : '' ;?>">


		                    			<?php } ?>



		                    			
		                    			
		                    				
		                    			</input>
		                    			</td>
		                    	</tr>






		                    <?php }

		                    		//echo '<tr> <td colspan="6"></td><td>Total</td><td class="total_loan"> '. $collection_loan.'</td><td>Total</td><td class="total_deposit">'.$deposit_amount.'</td></tr>';
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
		var pay_date = "<?php echo date('d-m-Y',strtotime($collection_date));?>";
		var schedule_date = $(this).attr('schedule_date');


		if((ins_amt == inst_amt)){
			loanCollection(txn_id,dist_id,inst_amt,0,pay_date,schedule_date,'loan');	
			$(this).addClass("green");
			
			
		}else{
			
			
			

			$.confirm({
						'title'		: 'Loan collection notification',
						'message'	: 'Collection amount and installment amount does not equal !<br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 loanCollection(txn_id,dist_id,inst_amt,0,pay_date,schedule_date,'loan');
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
		var pay_date = "<?php echo date('d-m-Y',strtotime($collection_date));?>";
		var schedule_date = $(this).attr('schedule_date');

		if((dep_amt == deposit_amt)){
			loanCollection(txn_id,dist_id,0,deposit_amt,pay_date,schedule_date,'deposit');
			$(this).addClass("green");
			
			
		}else{
			
			
			

			$.confirm({
						'title'		: 'Deposit collection notification',
						'message'	: 'Deposit amount and deposit installment amount does not equal ! <br />  <b style="color:green"> Are you sure  ?</b>',
						'buttons'	: {
							'Yes'	: {
								'class'	: 'blue',
								'action': function(){
									
									 loanCollection(txn_id,dist_id,0,deposit_amt,pay_date,schedule_date,'deposit');
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

		


	})



	function loanCollection(txn_id,dist_id,inst_amt,deposit_amt,pay_date,schedule_date,type){

			$("#loader-holder").show();
		$.post(base_url+'loan-distribution/loan-transaction',{txn_id:txn_id,dist_id:dist_id,inst_amt:inst_amt,deposit_amt:deposit_amt,pay_date:pay_date,schedule_date:schedule_date,type:type},function(data){
				$("#loader-holder").hide();

		})

	}
	$(document).on("click",".open",function(){

			$(this).closest('tr').find('input').attr("disabled",false);
	});


	


	$(document).ready(function (){
	    var table = $('#inactive_account_list_table').DataTable({
	       dom: 'lrtip'
	    });
	    
	    $('#table-filter').on('change', function(){
	       table.search(this.value).draw();   
	    });
	});


	$('#inactive_account_list_table tr').each(function() {
	  // need this to skip the first row
	  if ($(this).find("td:first").length > 0) {
	    var loan_amount = $(this).find("td:nth-child(6)").html();
	     var Issue_date = $(this).find("td:nth-child(7)").html();

	     combobox = $('#table-filter');

		if (!combobox.find('option[value="' + Issue_date + '"]').length) {
		    combobox.append('<option value="' + Issue_date + '">Loan amount: ' + loan_amount+"  Issue date: "+ Issue_date + '</option>');
		}
	  }
	});

	 $('#table-filter').change();

</script>