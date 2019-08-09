   
 
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
		<form target="_blank" action="<?=base_url('Expenditure/report-print')?>" id="category_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				      
					  <div class="micro-pos-group">
                      <label for="date" class="col-sm-4 control-label"> From Date <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					    <input type="text" name="form_date" value="<?=date('Y-m-d')?>"  class="form-control date_filed form_date" required="required"  placeholder="Form Date">
					 <errormessage> <?=(form_error('form_date'))?form_error('form_date'):""?> </errormessage>
                      </div>
                    </div>
					  
				 			  
				     
					<div class="micro-pos-group">
                      <label for="date" class="col-sm-4 control-label"> End Date <frz>*</frz> </label>
                      <div class="col-sm-8">
                     
					    <input type="text" name="end_date" value="<?=date('Y-m-d')?>"  class="form-control date_filed end_date " required="required"  placeholder="End Date">
					 <errormessage> <?=(form_error('end_date'))?form_error('end_date'):""?> </errormessage>
                      </div>
                    </div>
					
                   
                </div>
				
				
				 <div class="col-md-6">  
				 			
				 

							
				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary">Search and Print</button>
                    </div>
                </div>
					 
				 
				
			 
				
			   </form>
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 
 
  <script>
  $( function() {
  datePicker(".date_filed");
  
  
  } );
  </script>
			


