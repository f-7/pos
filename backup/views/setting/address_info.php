
 
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
<form action="" id="address_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6">                  
				  				  
				     <div class="micro-pos-group">
                      <label for="Division" class="col-sm-4 control-label">Division <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					   <select class="form-control division_name" required="required" name="division_name" >
					   <?= OOP::selectOptionList(OOP::getArray($division_list, 'id','division_name'),(set_value('division_name')?set_value('division_name'):2));?>
                         				
                      </select>
					     <errormessage> <?=(form_error('division_name'))?form_error('division_name'):""?> </errormessage>
                      </div>
                    </div>
					
                    <div class="micro-pos-group">
                      <label for="District" class="col-sm-4 control-label">District <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					   <select class="form-control district_name" required="required" name="district_name">
					   <?php 
					   foreach($district_list as $key)
					   {
					   ?>
                         <option class="div_<?=$key->divsion_id?>" value="<?=$key->id?>" <?=((set_value('district_name')?set_value('district_name'):1)==$key->id)?'selected':''?>> <?=$key->district_name?></option>                         
						 
					   <?php } ?>
                      </select>
					   <errormessage> <?=(form_error('district_name'))?form_error('district_name'):""?> </errormessage>
                      </div>
                    </div>
				 			  
				    <div class="micro-pos-group">
                      <label for="village" class="col-sm-4 control-label">Village Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="village_name" class="form-control village_name" required="required"  placeholder="Village Name">
					  <errormessage> <?=(form_error('village_name'))?form_error('village_name'):""?> </errormessage>
                      </div>
					  
                    </div>
                </div>
				
				
				 <div class="col-md-6">                  
				  				  
				     <div class="micro-pos-group">
                      <label for="Upazila" class="col-sm-4 control-label">Upazila <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					   <select class="form-control upazila_name" required="required" name="upazila_name">
                         
						 <?php 
					   foreach($upazila_list as $key)
					   {
					   ?>
                         <option class="dist_<?=$key->district_id?>" value="<?=$key->id?>" <?=((set_value('upazila_name')?set_value('upazila_name'):1)==$key->id)?'selected':''?>> <?=$key->upazila_name?></option>                         
						 
					   <?php } ?>
						   
                      </select>
					    <errormessage> <?=(form_error('upazila_name'))?form_error('upazila_name'):""?> </errormessage>
                      </div>
                    </div>
					
                    <div class="micro-pos-group">
                      <label for="Post Office" class="col-sm-4 control-label">Post Office <frz>*</frz></label>
                      <div class="col-sm-8">
						
					   <select class="form-control post_office_name" required="required" name="post_office_name">
                       
						 <?php 
						   foreach($post_office_list as $key)
						   {
						   ?>
							 <option class="upazila_<?=$key->upazila_id?>" value="<?=$key->id?>" <?=((set_value('post_office_name')?set_value('post_office_name'):1)==$key->id)?'selected':''?>> <?=$key->post_office_name?></option>                         
							 
						   <?php } ?>
						 
                      </select>
					 <errormessage> <?=(form_error('post_office_name'))?form_error('post_office_name'):""?> </errormessage>
                      </div>
                    </div>
				 			  
				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary datasubmitButton">Submit</button>
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
					<h3 class="box-title"> All address list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
			<table id="example" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th>
						   <th>Village Name</th>
                            <th>Post Office</th>
                            <th class="reshide">Upazila Name</th>
                            <th class="reshide" >District Name</th>
                            <th class="reshide">Division Name </th>                            
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

 $(document).ready(function() {
  
   $('#example').DataTable( {
       ajax: base_url+"Setting/get-village-info",
        columns: [
			 { data: "SL" },
			 { data: "village_name" },           
            { data: "post_office_name" },
            { data: "upazila_name" },
            { data: "district_name" },
            { data: "division_name" }, 
			{ data: null, render: function ( data, type, row ) {   

				 
 			 // return (data.village_name)?"<a onclick='eidtAddress("+data.village_id+","+data.post_office_id+","+data.upazila_id+","+data.district_id+","+data.divsion_id+",this)' class='action_button action_button_edit'>Edit</a><a rel='"+data.village_id+"' class='action_button action_button_delete'>Delete</a>":"";
                return (data.village_name)?"<a onclick='eidtAddress("+data.village_id+","+data.post_office_id+","+data.upazila_id+","+data.district_id+","+data.divsion_id+",this)' class='action_button action_button_edit'>Edit</a>":"";
            } },			
          
        ]
    } );

 
} );

$(document).on("click",".updateAddress",function(){
	
	$(".show-message-titile-box").html("");
	var villageName= $(".village_name").val();
	var post_office_name= $(".post_office_name").val();
	var upazila_name= $(".upazila_name").val();
	var district_name= $(".district_name").val();
	var division_name= $(".division_name").val();
  
var village_id=$(".datasubmitButton").attr("rel");
	
 
if(villageName=="")
{
	$(".show-message-titile-box").html("<b style='color:red'>Please village name is required ! </b>");
return false;	
}



	 var table = $('#example').DataTable();
	
	$.post(base_url+"setting/update-village-info",{
		post_office_id:post_office_name,
		village_name:villageName,
		id:village_id		
	},function(result){
	//	alert(result);
		if(result=="done"){
			
			table.$('tr.selected').find('td:nth-child(2)').html(villageName);
			table.$('tr.selected').find('td:nth-child(3)').html($(".post_office_name option:selected").text());
			table.$('tr.selected').find('td:nth-child(4)').html($(".upazila_name option:selected").text());
			table.$('tr.selected').find('td:nth-child(5)').html($(".district_name option:selected").text());
			table.$('tr.selected').find('td:nth-child(6)').html($(".division_name option:selected").text());
			table.$('tr.selected').removeClass('selected');				
			$(".village_name").val("");
			$(".datasubmitButton").attr("type","submit");
			$(".datasubmitButton").html("submit");
			$(".datasubmitButton").removeClass("updateAddress");
			  $('form').removeAttr('onsubmit');
		
			$(".show-message-titile-box").html("<b style='color:green'>Succefully update this data </b>");
			setTimeout(function(){ $(".show-message-titile-box").html(""); }, 3000);
			
		}else{
			$(".show-message-titile-box").html("<b style='color:red'>Updated Failed ! </b>");
			
		}
		
		
	})
	
	
	
	
});



function eidtAddress(id,post_of,upazila,district,divition,obj)
{

	$(obj).parents('tbody').find('tr').removeClass('selected');
	var selected_row=$(obj).closest('tr');
     var villageName = selected_row.find('td:nth-child(2)').html(); 
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
	
	$(".village_name").val(villageName);
	$('.post_office_name option[value='+post_of+']').attr('selected','selected');
	$('.upazila_name option[value='+upazila+']').attr('selected','selected');
	$('.district_name option[value='+district+']').attr('selected','selected');
	$('.division_name option[value='+divition+']').attr('selected','selected');
	$(".datasubmitButton").html("Update");
	$(".datasubmitButton").attr("type","button");
	$(".datasubmitButton").addClass("updateAddress");
	$(".datasubmitButton").attr("rel",id);
	$('html, body').animate({scrollTop: '0px'}, 500);
  $('form').attr('onsubmit', 'return false');
 
  
	
}













 
 $(document).on("click",".action_button_delete",function(){
	  var id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this village. <br />It\'s cannot be restored at a later time! <br> <b style="color:red"> Continue ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#example').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"setting/delete-village-info",{id:id,status:0},function(view){
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

 
 
 

 

$(document).on('change', '.division_name', function() {	
	 var divi_id= $(this).val(); 
	 $('.district_name').find('option').addClass('option_hide');
	 $('.district_name').find('option.div_'+divi_id).removeClass('option_hide'); 
});

$(document).on('change', '.district_name', function() {	
	 var divi_id= $(this).val(); 
	 $('.upazila_name').find('option').addClass('option_hide');
	 $('.upazila_name').find('option.dist_'+divi_id).removeClass('option_hide'); 
});
	 
$(document).on('change', '.upazila_name', function() {	
	 var divi_id= $(this).val(); 
	 $('.post_office_name').find('option').addClass('option_hide');
	 $('.post_office_name').find('option.upazila_'+divi_id).removeClass('option_hide'); 
});	 
    
	
    </script>

			


