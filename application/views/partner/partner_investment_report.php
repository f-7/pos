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
		<form target="_blank" action="<?=base_url('Partner/investment-report-print')?>" id="category_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				           
				  <div class="micro-pos-group">
                      <label for="Partner Name" class="col-sm-4 control-label">Partner Name  <frz>*</frz> </label>
                      <div class="col-sm-8">
                       
					   
					   <select name="partner_id"   class="form-control partner_id"  required="required"  >
					   <option value="frz">All Partner</option>
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

 
			


