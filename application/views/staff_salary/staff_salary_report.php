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
                      <label for="Staff Name" class="col-sm-4 control-label">Staff / Partner Name   </label>
                      <div class="col-sm-8">
                       
					   
					   <select name="user_id"   class="form-control user_id"    >
					   <option value="all">All Staff /Partner </option>
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
                      <label for="Month Name" class="col-sm-4 control-label">Month Name <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   
					   <select name="month_name"   class="form-control month_name" required="required">
					   
					   <?= OOP::selectOptionList(OOP::getMonth(),($month_no-1));?> 
					   </select>
					  <errormessage> <?=(form_error('month_name'))?form_error('month_name'):""?> </errormessage>
                      </div>
					  
                    </div>  
					  
				 	 
					
                   
                </div>
				
				
				 <div class="col-md-6">  
<?php 
						
$month_no=date('m');
$year_no=date('Y');
?>				 
				 
				  <div class="micro-pos-group">
                      <label for="Year" class="col-sm-5 control-label">Year <frz>*</frz></label>
                      <div class="col-sm-7">
                      
					   
					   <select name="year"   class="form-control year" required="required">
					   
						<option value="<?=$year_no?>"><?=$year_no?></option>
						<option value="<?=$year_no-1?>"><?=$year_no-1?></option>
						<option value="<?=$year_no-2?>"><?=$year_no-2?></option> 
						<option value="<?=$year_no-3?>"><?=$year_no-3?></option> 
						<option value="<?=$year_no-4?>"><?=$year_no-4?></option> 
					   <option value="<?=$year_no-5?>"><?=$year_no-5?></option> 
					    
					   </select>
					  <errormessage> <?=(form_error('year'))?form_error('year'):""?> </errormessage>
                      </div>
					  
                    </div>  

				    <div class="micro-pos-group">
                      <button type="button" class="btn btn-primary genarate_salary">Genarate salary </button>
					  
					  <button type="button" class="btn btn-primary searchListOfPartnerPrint" style="margin-left:20px; background:red">Genarate and Print salary Sheet</button>
                    </div>
                </div>
					  
			  
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 




<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> Staff salary sheet</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12" id="show_salary_list">  
				 
					
				 
				 
				 
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 
  

  <script>
 $(document).on("click",".searchListOfPartnerPrint",function(){
	
	var user_id=$(".user_id").val();
	var month_name=$(".month_name").val();
	var year=$(".year").val();
//alert(user_id+"="+month_name+"="+year);
	if(user_id !="" &&  month_name !="" && year !="")	
	{
		 var urlx=base_url+"Staff-salary-management/staff-salary-sheet-print/?user_id="+user_id+" && month_name="+month_name+" && year="+year;
		 
		    var redirectWindow = window.open(urlx, '_blank');
			redirectWindow.location;
		  
	}
	else{
		
		alert("All filed is required");
	}
	
});
 
 
$(document).on("click",".genarate_salary",function(){
	
	var user_id=$(".user_id").val();
	var month_name=$(".month_name").val();
	var year=$(".year").val();
//alert(user_id+"="+month_name+"="+year);
	if(user_id !="" &&  month_name !="" && year !="")	
	{
		var urlx=base_url+"Staff-salary-management/ajax-staff-salary-generate";
		$.post(urlx,{user_id:user_id,month_name:month_name,year:year},function(view){
			
			 $("#show_salary_list").html(view);
			
		});
		
	}
	else{
		
		alert("All filed is required");
	}
	
});




$(document).on("click",".action_button_view",function(){
	
 var pay_date=$(this).parents("tr").find("input.pay_date").val();
 

	var obj=$(this);
	var month_name=$(this).attr("month");
	var year=$(this).attr("year");
	var user_id=$(this).attr("userid");
	var salary=$(this).attr("salary");
	var bonus=$(this).attr("bonus");
	var invested_profit=$(this).attr("profit");
	 // alert(pay_date +"__"+ month_name+"__"+  user_id+"__"+ year+"_"+salary +"__"+ bonus+"__"+  invested_profit);


	 if(pay_date !="" &&  user_id !="" && month_name !="" && year!="" && pay_date!="")	
	{



	$.confirm({
			'title'		: 'This staff salary is paid',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 
									 var urlx=base_url+"Staff-salary-management/monthly-salary-update";
									$.post(urlx,{pay_date:pay_date,user_id:user_id,month_name:month_name,year:year,salary:salary,bonus:bonus,invested_profit:invested_profit},function(view){
										if(view)
										{

												obj.parents("tr").find("td.pay_date_td").html(pay_date);
											
											  obj.parents("td").html("<b style='color:green'>  Paid</b>");
												 
										}else{
											alert("Failed !");
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

		

		
	}
	else{
		
		alert("Something is wrong !");
	}


	
});


  </script>
				


