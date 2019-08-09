   
 
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
						  <option value="<?=$skey->id?>"><?=$skey->name?></option>
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
						 <?=OOP::selectOptionList(OOP::getDesignation())?>
                      </select>
					 <errormessage> <?=(form_error('designation'))?form_error('designation'):""?> </errormessage>
                      </div>
                    </div> 
					  
					 
				 			  
				    <div class="micro-pos-group">
                      <label for=" Basic Salary" class="col-sm-5 control-label"> Basic Salary <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="joining_basic_salary" class="form-control joining_basic_salary" required="required"  placeholder="Basic Salary">
					  <errormessage> <?=(form_error('joining_basic_salary'))?form_error('joining_basic_salary'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					 
					
					
				
					
					
					
                   
                </div>
				
				
				 <div class="col-md-5">  
				 
					 
					
					 <div class="micro-pos-group">
                      <label for="Joing Date" class="col-sm-5 control-label">Joing Date <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					    <input type="text" name="joing_date" class="form-control joing_date" required="required"  placeholder="Joing Date">
					 <errormessage> <?=(form_error('joing_date'))?form_error('joing_date'):""?> </errormessage>
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
			{ data: "amount" },  
			{ data: "status" },  
			 
        ],
    } );

 
} );
 
  
 
 
  
    </script>

			


