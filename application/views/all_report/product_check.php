<div class="box box-default" style="    margin-bottom:0px">
			<div class="box-header with-border">
			
		 		<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
			<form action="" id="serial_info"  enctype="multipart/form-data"  method="post" accept-charset="utf-8">

 	
				<div class="row borderbox" style="margin-bottom:4px">
				
				<div class="col-md-6">   
				
				 <div class="micro-pos-group">
                      <label for="Division" class="col-sm-4 control-label">Product Serial No <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   <input type="text" class="form-control serial_no" required="required" name="serial_no" >
					     
					     <errormessage> <?=(form_error('serial_no'))?form_error('serial_no'):""?> </errormessage>
                      </div>
                    </div>	
				
				 	
					 
				
				</div>
				<div class="col-md-4"> 
				
				     <div class="micro-pos-group">
						 
						   <div class="col-sm-12">
						<button type="submit" class="action_button action_button_edit" >Find</button>
						</div>
					</div>
				
				</div>
				
				
				
				
				
				</div>
			
</form>			
			<?php 
			 if($data_list){	
			 
			?>	
				<div class="row borderbox" >
				
					<table id="product_check_tbl">
						<thead>
							<tr>
								<th> Serial No </th>
								<th> Invoice No </th>
								<th> Product Info </th>								 
								<th> Warranty </th>
								<th> Unic Price </th>
								<th> Discount </th>
								<th> Sell type </th>
								<th> Sell date </th>
								<th> Status </th>
							</tr>
						</thead>
						<tbody>
							
								<tr>
									<td><?=$data_list[0]->serial_no?></td> 
									<td><?=$data_list[0]->invoice_number?></td> 
									<td><?php 
									echo " <b>Category :  </b> ".$data_list[0]->category_name." <br>";
									echo " <b> Brand :  </b> ".$data_list[0]->brand_name." <br>";
									echo " <b>Product Name :  </b> ".$data_list[0]->product_name." <br>";
									echo " <b> Color :  </b> ".OOP::getColor($data_list[0]->color)." <br>";
									echo " <b> Size :  </b>".$data_list[0]->size
									?></td> 
									<td><?=$data_list[0]->warranty?></td> 
									<td> ৳<?=$data_list[0]->unit_price?></td> 
									<td><?=$data_list[0]->discount?></td> 
									<td><?php echo ($data_list[0]->status==0)?(($data_list[0]->paid_amount>0)?"Cash":"Loan"):"" ;?></td> 
									<td><?php echo ($data_list[0]->status==0)?$data_list[0]->sell_date:"";?></td> 
									<td><?=($data_list[0]->status==1)?"<b style='color:green'>Available</b>":"<b style='color:red'>Stock-out</b>"?></td>  
								</tr>
								
							
						</tbody>
					</table>
				
				</div>
				 <?php }else if($data_list=="" and $message_show!=""){
					 
					 echo $message_show;
					 
				 } ?>	
				
				
				
				
				
				
				
 			
			</div>

</div>			
 
 

 
<style>
#product_check_tbl{ width:100%;}
#product_check_tbl th{background:#3c8dbc; color:white;font-width:bold;padding:2px}
#product_check_tbl td{padding:10px;}
</style>
