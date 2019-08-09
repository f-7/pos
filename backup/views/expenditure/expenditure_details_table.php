
 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
		 
			<div class="box-body">
				<div class="row">
		 
				 <div class="col-md-6 product_category_info_info_col_1">                  
				  		 
					
					 <div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label"> Buy Date  : </label>
						  <div class="col-sm-8"> <?=date_format((date_create($data_list->buy_date)),"d-m-Y")?>     </div> 
                    </div>
					
					<div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label"> Expenditure  type :  </label>
						  <div class="col-sm-8"> <?=$data_list->expenditure_name?>     </div> 
                    </div>
					
					<div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label">Seller  <a style='font-size:8px'>(who sell this)</a> : </label>
						  <div class="col-sm-8"> <?=$data_list->seller?>     </div> 
                    </div>  
					
                   <div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label">Comments : </label>
						  <div class="col-sm-8"> <?=$data_list->comments?>     </div> 
                    </div> 
                </div>
				
				
				 <div class="col-md-6">  
				 			  
				    <div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label">Period : </label>
						  <div class="col-sm-8"> <?=OOP::period($data_list->period)?>     </div> 
                    </div>  
					
					<div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label">Purchaser   <a style='font-size:8px'>(who buy this)</a> : </label>
						  <div class="col-sm-8"> <?=$data_list->name?>     </div> 
                    </div>  
					
					 <div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label">Status  :</label>
						  <div class="col-sm-8"> <?=($data_list->status==0)?"<b style='color:red'>Pending</b>":"<b style='color:green'>Approved</b>"?>     </div> 
                    </div> 
					
					<div class="micro-pos-group">
						  <label for="" class="col-sm-4 control-label">Entry by  : </label>
						  <div class="col-sm-8"> <?=$data_list->name?>     </div> 
                    </div> 
					
                </div>
					  
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 