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
                      <label for="Partner Name" class="col-sm-5 control-label">Partner Name <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					   
					   <select name="partner_id"   class="form-control partner_id" required="required">
					   <option value="">Select</option>
					<?php 
 						foreach($data_list as $skey){ ?>
						  <option value="<?=$skey->id?>"<?=($investment_data->partner_id==$skey->id)?"selected":""?> ><?=$skey->name?></option>
						<?php
 						}
						?>
					   
					   </select>
					  <errormessage> <?=(form_error('partner_id'))?form_error('partner_id'):""?> </errormessage>
                      </div>
					  
                    </div>  
					  
				 			  
				    <div class="micro-pos-group">
                      <label for="Invested Amount" class="col-sm-5 control-label">Invested Amount <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="invested_amount" value="<?=$investment_data->invested_amount?>" class="form-control invested_amount" required="required"  placeholder="Invested  Amount">
					  <errormessage> <?=(form_error('invested_amount'))?form_error('invested_amount'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					 <div class="micro-pos-group">
                      <label for="Profit percentage" class="col-sm-5 control-label">Profit percentage (%) <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="profit_percentage" value="<?=$investment_data->profit_percentage?>" class="form-control profit_percentage" required="required"  placeholder="Profit percentage">
					  <errormessage> <?=(form_error('profit_percentage'))?form_error('profit_percentage'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					<div class="micro-pos-group">
                      <label for="Invested date" class="col-sm-5 control-label">Invested date   <frz>*</frz></label>
                      <div class="col-sm-7">
                       
					  <input type="text" name="invested_date" value="<?=date_format(date_create($investment_data->invested_date),"Y-m-d")?>" class="form-control invested_date" required="required"  placeholder="Invested date">
					  <errormessage> <?=(form_error('invested_date'))?form_error('invested_date'):""?> </errormessage>
                      </div>
					  
                    </div>
					
				 
					
					
                   
                </div>
				
				
				 <div class="col-md-5">  
				 
				 
			
					
			 
					
					
					 <div class="micro-pos-group">
                      <label for="status" class="col-sm-5 control-label">Status <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					   <select class="form-control status" required="required" name="status">
                         <?=OOP::selectOptionList(OOP::status(),$investment_data->status)?>						 
                      </select>
					 <errormessage> <?=(form_error('status'))?form_error('status'):""?> </errormessage>
                      </div>
                    </div> 
					
					
					
					 <div class="micro-pos-group">
                      <label for="Installment" class="col-sm-5 control-label">Profit Installment <frz>*</frz></label>
                      <div class="col-sm-7">
                     
					   <select class="form-control profit_installment" required="required" name="profit_installment">
                         <?=OOP::selectOptionList(OOP::getProfitInstallment(),$investment_data->profit_installment)?>						 
                      </select>
					 <errormessage> <?=(form_error('profit_installment'))?form_error('profit_installment'):""?> </errormessage>
                      </div>
                    </div> 
				 
				 
				  
				 
				 
				 
				 
				 <input type="hidden" name="investment_id" value="<?=$investment_data->id?>" />
				 
				 			  
				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
					 
				 
				
			 
				
			   </form>
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 

 
 
 
 <script>
 $( function() {
  datePicker(".invested_date");
  
  
  } );
 
   $(document).on("keydown",".invested_amount,.profit_percentage,.invested_date",function(e){	  
	onlyNumeric(e); 
	  
  });
   
   </script>


