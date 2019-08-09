<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
 
			<div class="box-header with-border">
					<h3 class="box-title show-message-titile-box"> <?=($message_show)?$message_show:""?> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 
	<form action=""  enctype="multipart/form-data"  method="post" accept-charset="utf-8">		
			<div class="box-body">
				<div class="row">
		 		 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				           
				  <div class="micro-pos-group">
                      <label for="Staff Name" class="col-sm-4 control-label">Staff / Partner Name   </label>
                      <div class="col-sm-8">
                       
					   
					   <select name="user_id"   class="form-control stafff_partner_id"  required="required"   >
					   <option value="">Select </option>
					<?php 
 						foreach($data_list as $skey){ ?>
						  <option value="<?=$skey->id?>"><?=$skey->name?></option>
						<?php
 						}
						?>
					   
					   </select>
					  <errormessage> <?=(form_error('user_id'))?form_error('user_id'):""?> </errormessage>
                      </div>
					  
                    </div> 
					
					  <div class="micro-pos-group">
                      <label   class="col-sm-4 control-label">Availabel balance  </label>
                      <div class="col-sm-8">
                      
					   <input type="text" disabled  class="form-control current_balance" name="balance"/> 
                      </div>
					  
                    </div> 
					  
					 <div class="micro-pos-group">
                      <label   class="col-sm-4 control-label">Withdraw amount <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   <input type="text"  class="form-control withdraw_amount" name="withdraw_amount" required="required" />
					  <errormessage> <?=(form_error('withdraw_amount'))?form_error('withdraw_amount'):""?> </errormessage>
                      </div>
					  
                    </div>  
					  
				 	 <div class="micro-pos-group">
                      <label   class="col-sm-4 control-label">Withdraw Date <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   <input type="text"  class="form-control withdraw_date" name="withdraw_date" value="<?=date("Y-m-d")?>" required="required" />
					  <errormessage> <?=(form_error('withdraw_date'))?form_error('withdraw_date'):""?> </errormessage>
                      </div>
					  
                    </div>  
					
                   
                </div>
				
				
				 <div class="col-md-6">  
 			 
				 
				  <div class="micro-pos-group">
                      <label   class="col-sm-3 control-label">Comments  </label>
                      <div class="col-sm-7">
                      
					   <textarea class="form-control" name="comments" ></textarea> 
					    
					  <errormessage> <?=(form_error('comments'))?form_error(comments):""?> </errormessage>
                      </div>
					  
                    </div>  

				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary submit_withdraw">Submit Withdraw </button>  
 
                    </div>
                </div>
					  
			  
				</div> 
			</div> 
</form>

			<div class="box-footer"> <!---box footer ---> </div>
</div> 


 
  

  <script>
 
  $( function() {
  datePicker(".withdraw_date");
  });
 
$(document).on("change",".stafff_partner_id",function(){
	
	var user_id=$(this).val();
	 
	if(user_id !="")	
	{
		var urlx=base_url+"salary-bonus-withdraw/ajaxGetStaffProfitAvailableAmount";
		$.post(urlx,{user_id:user_id},function(view){
			
			if(view>0)
			{	
			 $(".current_balance").val(view);
			}else{
				alert("No profit amount");
			}
		});
		
	}
	else{
		
		alert("  filed is required");
	}
	
});


$(document).on("keyup",".withdraw_amount",function(){
	var current_balance=parseFloat($(".current_balance").val());
	 
	var withdraw_amount=parseFloat($(this).val()); 
	
	if(withdraw_amount>current_balance)
	{
		alert("Insufficient balance");
		var textVal= $(this).val();
		 $(this).val(textVal.substring(0,textVal.length - 1));
	}	
	
});
 

  </script>
				


