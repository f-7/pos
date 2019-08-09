   
 
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
				 <div class="col-md-7 product_category_info_info_col_1">                  
				  				  
				      
					  
					 <div class="micro-pos-group">
                      <label for="Partner Name" class="col-sm-5 control-label">Partner Name <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					   
					   <select name="partner_id"   class="form-control partner_id" required="required">
					   <option value="">Select</option>
					<?php 
 						foreach($data_list as $skey){ ?>
						  <option value="<?=$skey->id?>"><?=$skey->name?></option>
						<?php
 						}
						?>
					   
					   </select>
					  <errormessage> <?=(form_error('partner_id'))?form_error('partner_id'):""?> </errormessage>
                      </div>
					  
                    </div>  
					  
				 			  
				    <div class="micro-pos-group">
                      <label for="Invested Amount" class="col-sm-5 control-label">Invested Amount <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="invested_amount" class="form-control invested_amount" required="required"  placeholder="Invested  Amount">
					  <errormessage> <?=(form_error('invested_amount'))?form_error('invested_amount'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					 <div class="micro-pos-group">
                      <label for="Profit percentage" class="col-sm-5 control-label">Profit percentage (%) <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="profit_percentage" class="form-control profit_percentage" required="required"  placeholder="Profit percentage">
					  <errormessage> <?=(form_error('profit_percentage'))?form_error('profit_percentage'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					<div class="micro-pos-group">
                      <label for="Invested date" class="col-sm-5 control-label">Invested date   <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="invested_date" class="form-control invested_date" required="required"  placeholder="Invested date">
					  <errormessage> <?=(form_error('invested_date'))?form_error('invested_date'):""?> </errormessage>
                      </div>
					  
                    </div>
					
				
					
					
					
                   
                </div>
				
				
				 <div class="col-md-5">  
				 
				 
			
					
					
					<div class="micro-pos-group">
                      <label for="Agreement paper" class="col-sm-5 control-label">Agreement Paper   </label>
                      <div class="col-sm-7">
                       
					  <input type="file" name="agreement_paper" class="form-control agreement_paper"   placeholder="Agreement paper">
					  <errormessage> <?=(form_error('agreement_paper'))?form_error('agreement_paper'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					
					
					 <div class="micro-pos-group">
                      <label for="status" class="col-sm-5 control-label">Status <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					   <select class="form-control status" required="required" name="status">
                         <?=OOP::selectOptionList(OOP::status(),1)?>						 
                      </select>
					 <errormessage> <?=(form_error('status'))?form_error('status'):""?> </errormessage>
                      </div>
                    </div> 
					
					
					
					 <div class="micro-pos-group">
                      <label for="Installment" class="col-sm-5 control-label">Profit Installment <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					   <select class="form-control profit_installment" required="required" name="profit_installment">
                         <?=OOP::selectOptionList(OOP::getProfitInstallment(),1)?>						 
                      </select>
					 <errormessage> <?=(form_error('profit_installment'))?form_error('profit_installment'):""?> </errormessage>
                      </div>
                    </div> 
				 
				 
				  
				 
				 
				 
				 
				 
				 
				 			  
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
					<h3 class="box-title"> All Partner List </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="investment_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Partner Name</th> 
							  <th>Date </th>                           
							  <th>Amount </th> 
							  <th>Percentage </th> 
							  <th>Profit installment</th> 
							  <th>Agreement paper </th> 
                            
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
 $( function() {
  datePicker(".invested_date");
  
  
  } );
 
   $(document).on("keydown",".invested_amount,.profit_percentage,.invested_date",function(e){	  
	onlyNumeric(e); 
	  
  });
  
 
 
 
 $(document).ready(function() {
  
   $('#investment_info_table').DataTable( {
       ajax: base_url+"Partner/ajax-invested-list",
        columns: [
            { data: "SL" },			 			   
            { data: "partner_id" },   
			{ data: "invested_date" },  
			{ data: "invested_amount" },  
			{ data: "profit_percentage" },  
			{ data: "profit_installment" },  
			//{ data: "status" },  
			{ data: "agreement_paper" },  
			{ data: null, render: function ( data, type, row ) {   
				
				//	var paid_button=(data.status_button=='1')?"<a  rel='"+data.DT_RowId+"' class='action_button action_button_view' style='width:100px;color:white;background:green'><i class='fa fa-check'></i> Full Paid</a> ":"";
				
				var delbutton= (data.delete_button)?"<a  rel='"+data.DT_RowId+"' class='action_button action_button_delete'>Delete</a>":"---";
				
                return (data.DT_RowId)?delbutton:"---";
            } },
			 
        ],
    } );

 
} );
 
 
 
$(document).on("click",".action_button_view",function(){
	  var id=$(this).attr('rel');	  
	  var my_click=$(this);
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'This partner reckoning is closed',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#investment_info_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"Partner/ajax-investment-status-update",{id:id},function(view){
							 		if(view=="done")
									{
										rows.find("td:nth-child(7)").html('<b style="color:green">Closed</b>');
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
 
    
	
$(document).on("click",".action_button_delete",function(){
	  var id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'This partner investment cancel confirmation',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#investment_info_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"Partner/ajax-investment-cancel",{id:id},function(view){
							 		if(view=="done")
									{
										table.row('.selected').remove().draw( false );
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

			


