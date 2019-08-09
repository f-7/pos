   
 
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
                      <label for="Staff Name" class="col-sm-5 control-label">Staff/Partner Name <frz>*</frz></label>
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
                      <label for="Pay Month" class="col-sm-5 control-label">Pay Month <frz>*</frz></label>
                      <div class="col-sm-7"> 
					   <select class="form-control month_name" required="required" name="month_name">
                         <option value="">Select</option>
						  <?=OOP::selectOptionList(OOP::getMonth())?>
                      </select>
					 <errormessage> <?=(form_error('month_name'))?form_error('month_name'):""?> </errormessage>
                      </div>
                    </div> 
					
					
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
					
					
					  
					
				 			  
				  
 
					
					
				
					
					
					
                   
                </div>
				
				
				 <div class="col-md-5">  
				 
					 <div class="micro-pos-group">
                      <label for="type" class="col-sm-5 control-label"> Type <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					   <select class="form-control type" required="required" name="type">
                         <option value="">Select</option>
						  <?=OOP::selectOptionList(OOP::getSalaryType())?>
                      </select>
					 <errormessage> <?=(form_error('type'))?form_error('type'):""?> </errormessage>
                      </div>
                    </div> 
					  
					  <div class="micro-pos-group">
                      <label for=" Amount" class="col-sm-5 control-label"> Amount <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="amount" class="form-control amount" required="required"  placeholder="Amount">
					  <errormessage> <?=(form_error('amount'))?form_error('amount'):""?> </errormessage>
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
					<h3 class="box-title"> All staff and partner  list </h3>
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
							  <th>Month Name </th> 
							   <th>Year </th> 
							  <th>Type </th> 
							  <th>Amount</th>  
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
  datePicker(".pay_date");
  
  
  } );
 
   $(document).on("keydown",".amount,.pay_date",function(e){	  
	onlyNumeric(e); 
	  
  });
  
 
 
 
 $(document).ready(function() {
  
   $('#staff_salary_info_table').DataTable( {
       ajax: base_url+"Staff-salary-management/ajax-staff-bonus-list",
        columns: [
            { data: "SL" },			 			   
            { data: "name" },    
			{ data: "month_name" },  
			{ data: "year" },  
			{ data: "type" },  
			{ data: "amount" },  
			 { data: null, render: function ( data, type, row ) {   
				
		 	var edit_url=base_url+"Staff-salary-management/bonus-increment-update?id="+data.DT_RowId; 
				
				var buttonbox="<a href='"+edit_url+"' target='_blank'  rel='"+data.DT_RowId+"' class='action_button action_button_edit'>Edit</a>";
				
                return (data.DT_RowId)?buttonbox:"---";
            } },
			 
        ],
    } );

 
} );
 
  
 
 
  
    </script>

			


