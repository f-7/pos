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
		 		 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				           
				  <div class="micro-pos-group">
                      <label for="Staff Name" class="col-sm-4 control-label">Partner Name   </label>
                      <div class="col-sm-8">
                       
					   
					   <select name="user_id"   class="form-control user_id"    >
					   <option value="">Select </option>
					   <option value="all">All Partner </option>
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
					  
					 
					  
				 	 
					
                   
                </div>
				
				
				 <div class="col-md-6">  
 		 
				  
				    <div class="micro-pos-group">
                       
					  <button type="button" class="btn btn-primary searchListOfPartnerProfitWithdrawPrint" style="margin-left:20px; background:red">Print profit withdraw sheet</button>
                    </div>
                </div>
					  
			  
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 


 
  <script>
 $(document).on("click",".searchListOfPartnerProfitWithdrawPrint",function(){
	
	var user_id=$(".user_id").val();
 
	if(user_id !="")	
	{
		 var urlx=base_url+"Salary-bonus-withdraw/staff-profit-withdraw_report-print/?user_id="+user_id;
		 
		    var redirectWindow = window.open(urlx, '_blank');
			redirectWindow.location;
		  
	}
	else{
		
		alert("Partner  filed is required");
	}
	
});
 
  

  </script>
				


