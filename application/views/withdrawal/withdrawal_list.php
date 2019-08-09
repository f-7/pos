<div class="row">

	<div class="col-md-12">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title">Deposit Withdrawal list</h3>
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
		                        	<option <?php echo $report_type=='daily'?"selected":"";?> value="daily"> Daily Withdrawal list </option>
		                        	<option <?php echo $report_type=='weekly'?"selected":"";?> value="weekly"> Weekly Withdrawal list </option>
		                        	<option <?php echo $report_type=='monthly'?"selected":"";?> value="monthly"> Monthly Withdrawal list </option>
		                        	<option <?php echo $report_type=='custom'?"selected":"";?> value="custom"> Custom Withdrawal list </option>		                        	 
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
	                      <label for="account_number" class="col-sm-4 control-label">Account Number</label>
	                      <div class="col-sm-8">
	                        <input  type="text" class="form-control" id="account_number" name="account_number"  value="<?php echo set_value('account_number')?>">
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
									
								   <th>Account Number</th>                           
									<th>Name<br>Father Name</th> 									
									<th>Area Name<br>Society Name</th>
									<th>Withdrawl date</th>																
									<th> Withdrawl amount</th>
									<th> Previous deposit amount</th>									
		                            <th>Action</th>
		                        </tr>
		                    </thead>

		                    <?php if($list){
		                    foreach ($list as $key => $value) {
		                    		
		                    		

		                    	?>
		                    	<tr id="<?php echo $value->id;?>">
		                    		
		                    		<td> <?php echo $value->account_number;?></td>
		                    		<td> <?php echo $value->name."<br>".$value->fathers_name;?></td>
		                    		
		                    		<td> <?php echo $value->area_name."<br>".$value->society_name;?></td>
		                    		
		                    		
		                    		<td> <?php echo date('d-m-Y',strtotime($value->withdrawal_date));?></td>
		                    		
		                    		<td> <?php echo $value->withdrawal_amount;?></td>
		                    		<td> <?php echo $value->prv_amount;?></td>
		                    		<td> 

		                    			
		                    			<a class="btn" href="javascript:;" onclick="withdrawalDelate(<?php echo $value->id;?>)">Delete</a>
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


	

	
function withdrawalDelate(id){
		


		$.confirm({
			'title'		: 'Withdrawal  delete confirmation',
			'message'	: 'You are about to delete this withdrawal . <br />  <b style="color:green"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 			
						
						$.post(base_url+"withdrawal/withdrawal-delete",{id:id},function(){

							$("#"+id).remove();

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