   
 
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
		 	 <div class="col-md-7 product_category_info_info_col_1">                  
				  				  
						<?php 
						
						$month_no=date('m');
						$year_no=date('Y');
						?>
					  
					 <div class="micro-pos-group">
                      <label for="Partner Name" class="col-sm-5 control-label">Partner Name <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					   
					   <select name="partner_id"   class="form-control partner_id" required="required">
					   <option value="all">All Partner</option>
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
                      <label for="Month Name" class="col-sm-5 control-label">Month Name <frz>*</frz></label>
                      <div class="col-sm-7">
                      
					   
					   <select name="month_name"   class="form-control month_name" required="required">
					   
					   <?= OOP::selectOptionList(OOP::getMonth(),($month_no-1));?> 
					   </select>
					  <errormessage> <?=(form_error('month_name'))?form_error('month_name'):""?> </errormessage>
                      </div>
					  
                    </div>  
					
					
							
					 
                   
                </div>
				
				
				 <div class="col-md-5">  
				 <div class="micro-pos-group">
                      <label for="Year" class="col-sm-5 control-label">Year <frz>*</frz></label>
                      <div class="col-sm-7">
                      
					   
					   <select name="Year"   class="form-control Year" required="required">
						<option value="<?=$year_no?>"><?=$year_no?></option>
						<option value="<?=$year_no-1?>"><?=$year_no-1?></option>
						<option value="<?=$year_no-2?>"><?=$year_no-2?></option> 
					   
					    
					   </select>
					  <errormessage> <?=(form_error('Year'))?form_error('Year'):""?> </errormessage>
                      </div>
					  
                    </div>  
					  
		  
				 			  
				    <div class="micro-pos-group">
                      <button type="button" class="btn btn-primary searchListOfPartner">Search </button>
					  
					  <button type="button" class="btn btn-primary searchListOfPartnerPrint" style="margin-left:20px; background:red">Search and Print</button>
                    </div>
					
					 
                </div>
					 
				 
				
			 
				
			 
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 

 


<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> List of partner profit </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12" id="show_partner_profit">  
				 
					
				 
				 
				 
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 
  

<script>


$(document).on("click",".searchListOfPartnerPrint",function(){
	
	var partner_id=$(".partner_id").val();
	var month_name=$(".month_name").val();
	var Year=$(".Year").val();
	if(partner_id !="" &&  month_name !="" && Year !="")	
	{
		 var urlx=base_url+"Partner/investmentProfitCalculationPrint/?partner_id="+partner_id+" && month_name="+month_name+" && year="+Year;
		 
		    var redirectWindow = window.open(urlx, '_blank');
			redirectWindow.location;
		  
	}
	else{
		
		alert("All filed is required");
	}
	
});


$(document).on("click",".searchListOfPartner",function(){
	
	var partner_id=$(".partner_id").val();
	var month_name=$(".month_name").val();
	var Year=$(".Year").val();
	if(partner_id !="" &&  month_name !="" && Year !="")	
	{
		var urlx=base_url+"Partner/investmentProfitCalculation";
		$.post(urlx,{partner_id:partner_id,month_name:month_name,year:Year},function(view){
			
			 $("#show_partner_profit").html(view);
			
		});
		
	}
	else{
		
		alert("All filed is required");
	}
	
});



$(document).on("click",".action_button_view",function(){
	
	var partner_id=$(this).attr("rel");
	var percentage=$(this).attr("perc");
	var profit_amount=$(this).attr("profit");
	var date=$(this).attr("date");
	 var action_td=$(this).parents("td");

	var issue_date=$(this).attr("issue_date");	 
	 
	// alert(partner_id +"__"+ percentage+"__"+  profit_amount+"__"+ date);
	 if(partner_id !="" &&  percentage !="" && profit_amount !="" && date!="" && issue_date!="")	
	{
		
		var urlx=base_url+"Partner/ajax-investment-profit-update";
		$.post(urlx,{partner_id:partner_id,percentage:percentage,profit_amount:profit_amount,date:date,issue_date:issue_date},function(view){
			if(view)
			{
				 action_td.html("<b style='color:green'>  Paid</b>");
			}else{
				alert("Failed !");
			}	
			
			
		});
		
	}
	else{
		
		alert("Something is wrong !");
	}
	
});


</script>			

