   
 
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
		<form  action="" id="category_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-7 product_category_info_info_col_1">                  
				  				  
				      
					  
					 <div class="micro-pos-group">
                      <label for="Partner Name" class="col-sm-5 control-label">Partner Name <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					   
					   <select name="partner_id"   class="form-control partner_id" required="required">
					   <option value="">All Partner</option>
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
                      <label for="Profit percentage" class="col-sm-5 control-label">Profit percentage (%) </label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="profit_percentage" class="form-control profit_percentage"  disabled="disabled" required="required" placeholder="Profit percentage">
					  <errormessage> <?=(form_error('profit_percentage'))?form_error('profit_percentage'):""?> </errormessage>
                      </div>
					  
                    </div>		  
							  
				    <div class="micro-pos-group">
                      <label for="Profit Amount" class="col-sm-5 control-label">Profit Amount <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="installment_amount" class="form-control installment_amount" required="required"  placeholder="Profit  Amount">
					  <errormessage> <?=(form_error('installment_amount'))?form_error('installment_amount'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					  
					
				
					
					
					
                   
                </div>
				
				
				 <div class="col-md-5">  
				 
				 
			 <div class="micro-pos-group">
                      <label for="Installment date" class="col-sm-5 control-label">Installment date   <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="installment_date" class="form-control installment_date" required="required"  placeholder="Installment date">
					  <errormessage> <?=(form_error('installment_date'))?form_error('installment_date'):""?> </errormessage>
                      </div>
					  
                    </div>
					 
				 <div class="micro-pos-group">
                      <label for="Comments" class="col-sm-5 control-label">Comments   </label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="comments" class="form-control comments"    placeholder="Comments">
					  <errormessage> <?=(form_error('comments'))?form_error('comments'):""?> </errormessage>
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
					<h3 class="box-title"> Last one month profit installment record </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="installment_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Partner Name</th> 
							  <th>Date </th>                           
							  <th>Amount </th> 
							  <th>Comments </th> 
							  <th>Entry by</th> 
                        </tr>
                    </thead>
                    
                </table>	 
				 
				 
				 
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 
 
 <script>
 
 $(document).on("change",".partner_id",function(){
	 
var partner_id=$(this).val();	
if(partner_id !="")
{	
var urlx=base_url+"Partner/getPartnerPersentangeOfInstallment";
	$.post(urlx,{partner_id:partner_id},function(view){
		if(view)
		{  
			var datax=view.split("__");
			
			$(".profit_percentage").val(datax[1]+"%");
			$(".installment_amount").val(datax[0]);
		}
		
	})
}	     
 });
 
 
 
 
 
 
 
 
 
 $( function() {
  datePicker(".installment_date");
  
  
  } );
 
   $(document).on("keydown",".installment_amount,.installment_date",function(e){	  
	onlyNumeric(e); 
	  
  });
  
 
 
 
 $(document).ready(function() {
  
   $('#installment_info_table').DataTable( {
       ajax: base_url+"Partner/ajax-installment-last-month",
        columns: [
            { data: "SL" },			 			   
            { data: "partner_id" },   
			{ data: "installment_date" },  
			{ data: "installment_amount" },  
			{ data: "comments" },  
			{ data: "created_id" },  
			 
        ],
    } );

 
} );
 
 
     
 
  
    </script>

			


