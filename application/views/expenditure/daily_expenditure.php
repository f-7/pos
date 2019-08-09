   
 
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
		<form action="" id="expenditure_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				      
					  
					 <div class="micro-pos-group">
                      <label for="expenditure name" class="col-sm-4 control-label">Expenditure Name <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					   <select class="form-control expenditure_name" required="required" name="expenditure_name">
							<option value="">Select</option>
                          <?php  foreach($data_list as $key){ ?>
							<option value="<?=$key->id?>"><?=$key->expenditure_name?></option>						  
						  <?php } ?>					 
                      </select>
					 <errormessage> <?=(form_error('expenditure_name'))?form_error('expenditure_name'):""?> </errormessage>
                      </div>
                    </div>
					  
				 	 <div class="micro-pos-group">
                      <label for="date" class="col-sm-4 control-label"> Date <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					    <input type="text" name="buy_date" value="<?=date('Y-m-d')?>"  class="form-control buy_date" required="required"  placeholder="Date">
					 <errormessage> <?=(form_error('buy_date'))?form_error('buy_date'):""?> </errormessage>
                      </div>
                    </div>
					  		 





							 
				  
					  <div class="micro-pos-group">
                      <label for="purchaser" class="col-sm-4 control-label">Purchaser <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					   <select name="purchaser" list="purchaser_list" class="form-control purchaser" required="required">
					   <option value="">Select</option>
						<?php 
						foreach($stuff_list as $skey){ ?>
						
						<option value="<?=$skey->user_id?>"><?=$skey->name?></option>
						<?php }
						?>
					   
					   </select>
					   <errormessage> <?=(form_error('purchaser'))?form_error('purchaser'):""?> </errormessage>
					   
                      </div>
					  
                    </div>
					
					
					
					
					
					 <div class="micro-pos-group">
                      <label for="comments" class="col-sm-4 control-label">Comments  </label>
                      <div class="col-sm-8">
                       
					 <textarea name="comments" class="comments form-control"></textarea>
					  <errormessage> <?=(form_error('comments'))?form_error('comments'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					
					
                   
                </div>
				
				
				 <div class="col-md-6">  
				 			  
				     <div class="micro-pos-group">
                      <label for="Amount" class="col-sm-4 control-label">Amount <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="amount" class="form-control amount" required="required"  placeholder="Amount">
					  <errormessage> <?=(form_error('amount'))?form_error('amount'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					
					<div class="micro-pos-group">
                      <label for="period" class="col-sm-4 control-label">Period <frz>*</frz></label>
                      <div class="col-sm-8">
                      <select class="form-control period" required="required" name="period">
                        <option value="1">Morning</option>
						<option value="2">Afternoon</option>						
						<option value="3">Evening</option>
						<option value="4">Night</option>
                      </select>
					   
					 <errormessage> <?=(form_error('period'))?form_error('period'):""?> </errormessage>
                      </div>
                    </div>
					  		 
					 
					 <div class="micro-pos-group">
                      <label for="seller" class="col-sm-4 control-label">Seller <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" list="seller_list" name="seller" class="form-control seller" required="required"  placeholder="seller">
					  <errormessage> <?=(form_error('seller'))?form_error('seller'):""?> </errormessage>
					  
					  <datalist id="seller_list">
						<?php if(!empty($expenditure_list)){foreach($expenditure_list as $skey){?>
						<option value="<?=$skey->seller?>"> 
						<?php } }?>
					  </datalist>
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

 
 

  <script>
  $( function() {
  datePicker(".buy_date");
  
  
  } );
  </script>
