   
 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title show-message-titile-box"> <?=($message_show)?$message_show:""?> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 
			
			<div class="box-body">
				<div class="row">
		<form action="" id="category_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				      <div class="micro-pos-group">
                      <label for="Partner Name" class="col-sm-4 control-label">Partner Name  <frz>*</frz> </label>
                      <div class="col-sm-8">
                       
					   
					   <select name="partner_id"   class="form-control partner_id" id="partner_id" required="required" >
					   <option value="">Select  </option>
					<?php 
 						foreach($data_list as $skey){ ?>
						  <option value="<?=$skey->partner_id?>"><?=$skey->name?></option>
						<?php
 						}
						?>
					   
					   </select>
					  <errormessage> <?=(form_error('partner_id'))?form_error('partner_id'):""?> </errormessage>
                      </div>
					  
                    </div> 
				 			
					<div class="micro-pos-group">
                      <label   class="col-sm-4 control-label">Availabel balance  </label>
                      <div class="col-sm-8">
                      
					   <input type="text" disabled  class="form-control current_balance" name="balance"/> 
                      </div>
					  
                    </div> 
							
				    <div class="micro-pos-group">
                      <label for="Amount" class="col-sm-4 control-label">Amount <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="withdraw_amount" class="form-control withdraw_amount" required="required"  placeholder="Amount">
					  <errormessage> <?=(form_error('withdraw_amount'))?form_error('withdraw_amount'):""?> </errormessage>
                      </div>
					  
                    </div>
					<div class="micro-pos-group">
                      <label for="date" class="col-sm-4 control-label"> Pay Date <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					    <input type="text" name="pay_date" value="<?=date('Y-m-d')?>"  class="form-control date_filed pay_date" required="required"  placeholder=" Date">
					 <errormessage> <?=(form_error('pay_date'))?form_error('pay_date'):""?> </errormessage>
                      </div>
                    </div>
					  
					
					
                   
                </div>
				
				
				 <div class="col-md-6">  
				 			  
				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
					 
				 
				
			 
				
			   </form>
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 

 


<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> All Partner Withdrawal </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="partner_widhtdral_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
							    <th>Pay Date</th> 
								<th>Partner Name</th> 
							  <th>Amount</th>
								<th>Action</th>
                        </tr>
                    </thead>
                    
                </table>	 
				 
				 
				 
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 
 
 <script>
 
 
 
 
 $(document).on("change",".partner_id",function(){
	
	var user_id=$(this).val();
	 
	if(user_id !="")	
	{
		var urlx=base_url+"partner/getPartnerAvailabelBalance";
		$.post(urlx,{user_id:user_id},function(view){
			
			if(view>0)
			{	
			 $(".current_balance").val(view);
			}else{
				alert("No available balance");
				$(".withdraw_amount").val("");
			}
		});
		
	}
	else{
		
		alert("  filed is required");
	}
	
});
 
 
 
 
 
$(document).on("keyup",".withdraw_amount",function(){
	var current_balance=parseFloat($(".current_balance").val());
	 
	 current_balance=(current_balance)?current_balance:0;
	var withdraw_amount=parseFloat($(this).val()); 
	
	if(withdraw_amount>current_balance)
	{
		alert("Insufficient balance");
		var textVal= $(this).val();
		 $(this).val(textVal.substring(0,textVal.length - 1));
	}	
	
});
 
 
 
 
 
 
  $( function() {
  datePicker(".pay_date");
  
  
  } );
 
			
 
 $(document).ready(function() {
  
   $('#partner_widhtdral_info_table').DataTable( {
       ajax: base_url+"partner/ajax-partner-withdraw",
        columns: [
            { data: "SL" },			 			   
            { data: "pay_date" },   
			{ data: "name" },  
			{ data: "amount" },   
		//	{ data: "status" }, 
		 { data: null, render: function ( data, type, row ) {   
				
		 	var edit_url=base_url+"Partner/partner-withdrawal-update?id="+data.DT_RowId; 
				
				var buttonbox="<a href='"+edit_url+"' target='_blank'  rel='"+data.DT_RowId+"' class='action_button action_button_edit'>Edit</a>";
				
                return (data.DT_RowId)?buttonbox:"---";
            } }, 		
        ],
    } );

 
} );
 
 
  
 
$(document).on("click",".action_button_view",function(){
	  var id=$(this).attr('rel');	  
	  var my_click=$(this);
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'This partner withdraw is closed',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#partner_widhtdral_info_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"Partner/ajax-withdrawl-status-update",{id:id},function(view){
							 		if(view=="done")
									{
										rows.find("td:nth-child(5)").html('<b style="color:green">Closed</b>');
										table.$('tr.selected').removeClass('selected');
										my_click.remove();
									}										
						 });
						 
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
 });  
 
  
    </script>

			


