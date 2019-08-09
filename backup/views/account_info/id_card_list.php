<div class="box box-default">
			<div class="box-header with-border">
		 
					<h3 class="box-title show-message-titile-box"> <?=($message_show)?$message_show:""?> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row borderbox">
				
				<div class="col-md-12">   
				
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
						<select class="form-control society_code" name="society_code"  required="required">
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

				
				     <div class="micro-pos-group">
						  <label for="button" class="col-sm-4 control-label"></label>
						   <div class="col-sm-8">
						<a class="action_button action_button_edit " style="width: 130px; margin-left: 10px; cursor: pointer;   line-height: 20px;"> Card Print</a>
						</div>
					</div>
				
				</div>
				
				
				
				
				
				
				</div>
			</div>

</div>			


<script>
$(document).on("change",".area_code",function(){
	var area_code=$(this).val();
	 $('.society_code').find('option').addClass('option_hide');	 	  
	 $('.society_code').find('option.area_'+area_code).removeClass('option_hide'); 
});
 
 $(document).on("click",".action_button_edit",function(){
	 
	 var society_code=$(".society_code").val();
	 if(society_code.length>4)
	 {
		 var url=base_url+"report/all-id-card-print?society_code="+society_code;
		    window.open(url, '_blank');
			window.focus();
	 }else{
		 
		 alert("Must be select society");
	 }
 });
 


</script>

<style>
select{cursor: pointer;}

</style>
