 <?php  error_reporting(0);?>      
 
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
                      <label for="Staff Name" class="col-sm-5 control-label">Staff Name <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					   
					   <select name="user_id"   class="form-control user_id" required="required">
					   <option value="">Select</option>
					<?php 
 						foreach($data_list as $skey){ ?>
						  <option value="<?=$skey->id?>" <?=($staff_info_data->user_id==$skey->id)?"selected":""?>><?=$skey->name?></option>
						<?php
 						}
						?>
					   
					   </select>
					  <errormessage> <?=(form_error('user_id'))?form_error('user_id'):""?> </errormessage>
                      </div>
					  
                    </div>  
					 
					 <div class="micro-pos-group">
                      <label for="Pay Month" class="col-sm-5 control-label">Designation <frz>*</frz></label>
                      <div class="col-sm-7"> 
					   <select class="form-control designation" required="required" name="designation">
                         <option value="">Select</option>
						 <?=OOP::selectOptionList(OOP::getDesignation(),$staff_info_data->designation)?>
                      </select>
					 <errormessage> <?=(form_error('designation'))?form_error('designation'):""?> </errormessage>
                      </div>
                    </div> 
					  
					 
				 			  
				    <div class="micro-pos-group">
                      <label for=" Basic Salary" class="col-sm-5 control-label"> Basic Salary <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="joining_basic_salary" value="<?=$staff_info_data->joining_basic_salary?>" class="form-control joining_basic_salary" required="required"  placeholder="Basic Salary">
					  <errormessage> <?=(form_error('joining_basic_salary'))?form_error('joining_basic_salary'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					 
					
					
				
					
					
					
                   
                </div>
				
				
				 <div class="col-md-5">  
				 
					 
					
					 <div class="micro-pos-group">
                      <label for="Joing Date" class="col-sm-5 control-label">Joing Date <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					    <input type="text" name="joing_date" value="<?=date_format(date_create($staff_info_data->joing_date),"Y-m-d")?>"  class="form-control joing_date" required="required"  placeholder="Joing Date">
					 <errormessage> <?=(form_error('joing_date'))?form_error('joing_date'):""?> </errormessage>
                      </div>
                    </div> 
					
					
					
				 
				 
				  <input type="hidden" name="staff_info_id" value="<?=$staff_info_data->id?>" />
				 
				 
				 
				 			  
				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary">Update</button>
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
					<h3 class="box-title"> All Staff  list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="staff_salary_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Staff Name</th> 
							  <th>Joing Date </th>   
							  <th>Designation</th> 
							  <th>Basic salary </th> 
							  <th>Status</th>   
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
  datePicker(".joing_date");
  
  
  } );
 
   $(document).on("keydown",".joining_basic_salary,.joing_date",function(e){	  
	onlyNumeric(e); 
	  
  });
  
 
 
 
 $(document).ready(function() {
  
   $('#staff_salary_info_table').DataTable( {
       ajax: base_url+"Staff-salary-management/ajax-staff-salary-list",
        columns: [
            { data: "SL" },			 			   
            { data: "name" },   
			{ data: "joing_date" },  
			{ data: "designation" },  
			{ data: null, render: function ( data, type, row ) {   
				 	var button_list="<input type='text' class='staff_basic_salary'/>";
				
                return (data.basic_amount)?data.amount:button_list;
            } },  
			{ data: "status" },  
			 { data: null, render: function ( data, type, row ) {   
				 	var button_list="<a rel='"+data.DT_RowId+"' user='"+data.user_type+"' class='action_button action_button_view' style='width:100px;color:white;background:red'><i class='fa fa-check'></i> Update</a>";
				
               
					var edit_url=base_url+"Staff-salary-management/update?id="+data.DT_RowId; 				
				var buttonbox="<a href='"+edit_url+"' rel='"+data.DT_RowId+"' class='action_button action_button_edit'>Edit</a>";
				
				
                return (data.basic_amount)?buttonbox:button_list+" "+buttonbox;
            } },
        ],
    } );

 
} );
 
  
  
  
  
  

$(document).on("click",".action_button_view",function(){
	var obj=$(this);
 var basic_salary=$(this).parents("tr").find("input.staff_basic_salary").val(); 
	var id=$(this).attr("rel");
	var user=$(this).attr("user");
	  
	 if(basic_salary !="" &&  id !="")	
	{



	$.confirm({
			'title'		: 'This staff basic salary is update ',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 
									 var urlx=base_url+"Staff-salary-management/staff-basic-salary-and-updated";
									$.post(urlx,{ basic_salary:basic_salary,id:id},function(view){
										if(view)
										{

												obj.parents("tr").find("input.staff_basic_salary").parents('td').html(basic_salary);
											
											  obj.parents("td").html("---");
												 
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

			


