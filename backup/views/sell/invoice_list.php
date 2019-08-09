<div class="row">

	<div class="col-md-12">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title">Invoice list</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			<div class="box-body">
 			 <form class="form-horizontal" method="post" action="">

 			 	<div class="col-sm-3">
	             	<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">View type</label>
	                      <div class="col-sm-8">
	                        <select class="form-control" name="report_type"  id="report_type" required="true">		                        	
		                        	<option <?php echo $report_type=='daily'?"selected":"";?> value="daily"> Daily Invoice list </option>
		                        	<option <?php echo $report_type=='weekly'?"selected":"";?> value="weekly"> Weekly invoice list </option>
		                        	<option <?php echo $report_type=='monthly'?"selected":"";?> value="monthly"> Monthly invoice list </option>
		                        	<option <?php echo $report_type=='custom'?"selected":"";?> value="custom"> Custom invoice list </option>		                        	 
		                        </select>
	                      </div>
	                    </div>
	             </div> 
	
				<div class="col-sm-2">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">From</label>
	                      <div class="col-sm-8">
	                        <input  <?php echo $report_type=='custom'?'':'disabled="true"';?>  type="text" class="form-control" id="from" name="from" required="true" value="<?php echo $from;?>">
	                      </div>
	                    </div>
	             </div>   

	             <div class="col-sm-2">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">To</label>
	                      <div class="col-sm-8">
	                        <input <?php echo $report_type=='custom'?'':'disabled="true"';?> type="text" class="form-control" id="to" name="to" required="true" value="<?php echo $to;?>">
	                      </div>
	                    </div>
	             </div>  

	             <div class="col-sm-3">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Invoice/name</label>
	                      <div class="col-sm-8">
	                        <input  type="text" class="form-control" id="invoice_number" name="invoice_number"  value="<?php echo set_value('invoice_number')?>">
	                      </div>
	                    </div>
	             </div>      


	             <div class="col-sm-2">
	             	<input class="primari btn" type="submit" name="Search" value="View report">
	             </div> 
	          </form>   

	         </div>
	</div>    

	</div>         

</div>


<script type="text/javascript">
	
	$("#from").datepicker({ dateFormat: 'dd-mm-yy' });
	$("#to").datepicker({ dateFormat: 'dd-mm-yy' });

	$(document).on("change","#report_type",function(){

		var type = $(this).val();
		
		if(type == 'custom'){
			$("#from").removeAttr('disabled');
			$("#to").removeAttr('disabled');
		}else{

			$("#from").attr('disabled','true');
			$("#to").attr('disabled','true');
		}
	})



	

</script>



<div class="row">

<div class="col-md-12">
	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> <b class=""><?php echo ucfirst($list_type)." ".$title;?> </h3>
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
									
								   <th>Invoice numebr</th>
								   <th>Customer name</th>                           
									<th>Sell date</th> 									
									<th>Total amount</th>
									<th>Discount amount</th>							
									<th>Paid amount</th>
									
		                            <th>Action</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){  //invoice_id,sell_date,total_amount,paid_amount,discount_amount,status
		                    foreach ($list as $key => $value) {
		                    		

		                    	?>
		                    	<tr id="<?php echo $value->invoice_id;?>">
		                    		
		                    		<td> <?php echo $value->invoice_id;?></td>
		                    		<td> <?php echo strlen($value->customer_name)>0?$value->customer_name:"Loan distribution";?></td>
		                    		<td> <?php echo date('d-m-Y',strtotime($value->sell_date)); ?></td>
		                    		<td> <?php echo $value->total_amount;?></td>
		                    		<td>  <?php echo $value->discount_amount;?></td>
		                    		
		                    		<td> <?php echo $value->paid_amount ; ?></td>
		                    		<td> 

		                    			<?php if($value->ref_id>0){ ?>

		                    			<a class="btn" target="_blank" href="<?php echo site_url('loan-distribution/loan-distribution-report-pdf/').$value->ref_id ; ?>"> View</a>
		                    			<a class="btn"  href="<?php echo site_url('loan-distribution/edit').'/'.$value->ref_id ; ?>"> Edit</a>		                    		
		                    			

		                    			<?php }else{?>

		                    			<a class="btn" target="_blank" href="<?php echo site_url('sell/invoice-print').'/'.$value->invoice_id ; ?>"> View</a>
		                    			<a class="btn"  href="<?php echo site_url('sell/invoice-edit').'/'.$value->invoice_id ; ?>"> Edit</a>	                    		
		                    			<a class="btn" href="javascript:;" onclick="invoiceDelete(<?php echo $value->invoice_id;?>)">Delete</a>

		                    			<?php } ; ?>

		                    			

		                    			
		                    		</td>
		                    	</tr>






		                    <?php }} ?>
		                    
		                </table>
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 

	</div>	
	</div>	
</div>

<script type="text/javascript">
	

	

	$('#list').dataTable( {
		  "ordering": false
		} );


	function invoiceDelete(invoice_id){

		


		$.confirm({
			'title'		: 'Invoice delete confirmation',
			'message'	: '<b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"sell/invoice-delete",{invoice_id:invoice_id},function(){

							$("#"+invoice_id).remove();

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