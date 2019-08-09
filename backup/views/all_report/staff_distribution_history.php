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
                      <label for="Division" class="col-sm-4 control-label">Staff Name <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   <select class="form-control staff_id" required="required" name="staff_id" >
					    <option value="">Select </option>
						<?php foreach($staff_list as $key){?>
                         		<option value="<?=$key->id?>"><?=$key->name?> </option>		
						<?php } ?>				
                      </select>
					     <errormessage> <?=(form_error('staff_id'))?form_error('staff_id'):""?> </errormessage>
                      </div>
                    </div>		
					 
				
				</div>
				<div class="col-md-4"> 
				
				     <div class="micro-pos-group">
						 
						   <div class="col-sm-12">
						<a class="report_search_button action_button action_button_edit" > Print History Data</a>
						</div>
					</div>
				
				</div>
				
				
				
				
				
				</div>
				
 			
			</div>

</div>			
 
 



<script>

$(document).on("click",".report_search_button",function(){
var staff_id=$(".staff_id").val(); 
 
if(staff_id.length!="")
{
	 
	var method_url=base_url+"all-report/staff-distribution-history-print?";
	var paramitter="staff_id="+staff_id;
	var get_url=method_url+paramitter;
 window.open(get_url, '_blank');
  window.focus();
	
}else{
	alert("Please select staff name!");
	
}

});
 
 
function request_sending_on_process()
{
	$(".report_result_box").removeClass('result_success_box');
	
	$(".report_result_box").addClass('result_request_box');
	$(".report_result_box").html("Please wait, while your request being processed ...");
	 setTimeout(function(){$(".report_result_box").removeClass('result_request_box');}, 2000);
}

 
 

</script>

<style>
select{cursor: pointer;}

</style>
