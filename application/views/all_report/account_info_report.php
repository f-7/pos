<div class="box box-default" style="    margin-bottom:0px">
			<div class="box-header with-border">
			
		 <span class="report_result_box <?=($retun_message_show)?"result_success_box":""?>"><?=($retun_message_show!="")?$retun_message_show:''?> </span>
				 
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
			
 	
				<div class="row borderbox">
				
				<div class="col-md-6">   
				
				 <div class="micro-pos-group">
                      <label for="Division" class="col-sm-4 control-label">Area Name <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   <select class="form-control area_code" required="required" name="area_code" >
					    <option value="">Select </option>
					   <?= OOP::selectOptionList(OOP::getArray($area_list, 'area_code','area_name'));?>
                         				
                      </select>
					     <errormessage> <?=(form_error('area_code'))?form_error('area_code'):""?> </errormessage>
                      </div>
                    </div>		
				
					<div class="micro-pos-group">
						<label for="Society Name" class="col-sm-4 control-label">Society Name  <frz>*</frz></label>
						<div class="col-sm-8">
						<select class="form-control society_code" name="society_code" >
					 <option value="">Select </option>
						 <?php 
						   foreach($society_list as $key)
						   {
						   ?>
							 <option class="option_hide area_<?=$key->area_code?>" value="<?=$key->society_code?>" <?=((set_value('society_code')?set_value('society_code'):"")==$key->society_code)?'selected':''?>> <?=$key->society_name?></option>                         
							 
						   <?php } ?>  
						
						</select>  

						<errormessage> <?=(form_error('society_code'))?form_error('society_code'):""?> </errormessage>
						</div>

					</div>	

				
				
				</div>
				<div class="col-md-4"> 
				
				     <div class="micro-pos-group">
						 
						   <div class="col-sm-12">
						<a class="report_search_button action_button action_button_edit" > Print Accounts List</a>
						</div>
					</div>
				
				</div>
				
				
				
				
				
				</div>
				
 			
			</div>

</div>			
 
 



<script>

$(document).on("click",".report_search_button",function(){
var area_code=$(".area_code").val();
var society_code=$(".society_code").val();
if(area_code.length>2)
{
	 
	var method_url=base_url+"all-report/account-information-print?";
	var paramitter="area_code="+area_code+"&society_code="+society_code;
	var get_url=method_url+paramitter;
 window.open(get_url, '_blank');
  window.focus();
	
}else{
	alert("Please select Area name!");
	
}

});
 
 
function request_sending_on_process()
{
	$(".report_result_box").removeClass('result_success_box');
	
	$(".report_result_box").addClass('result_request_box');
	$(".report_result_box").html("Please wait, while your request being processed ...");
	 setTimeout(function(){$(".report_result_box").removeClass('result_request_box');}, 2000);
}

$(document).on("change",".area_code",function(){
	var area_code=$(this).val();
	 $('.society_code').find('option').addClass('option_hide');	 	  
	 $('.society_code').find('option.area_'+area_code).removeClass('option_hide'); 
	
	 
});
 

</script>

<style>
select{cursor: pointer;}

</style>
