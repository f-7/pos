	
	 <link href="<?= $this->template->Css()?>seaching_select_box.css"" rel="stylesheet">
	  <script src="<?= $this->template->Js()?>seaching_select_box.js"></script> 
 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
			<a href="<?=base_url('stock/product-list')?>" style="margin-right:100px">Back to Stock List</a>
					<h3 class="box-title show-message-titile-box"> <?=($message_show)?$message_show:""?> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
<form action=""   enctype="multipart/form-data"  method="post" onsubmit="return checkFromSubmition()" accept-charset="utf-8">
<table class="stock_info_table">
<thead>
	<th>Product Name </th>
	<th> Qty </th>
	<th> Unit Price </th>
	<th>Price </th>
		<th> Buy Unit Price </th>
	<th>Warranty </th>
	
</thead>

<tbody>


		<tr>
			<td class="small_inputbox_large">
			
			<select class="form-control product_id chosen"   name="product_id" tabindex="1">
			<option value="">Select Product</option>
				<?php 
				if(!empty($data_list)){
				foreach($data_list as $key)
				{?>								
				<option rel="<?=$key->category_id?>" value="<?=$key->id?>" <?=($stock_details_list[0]->product_id==$key->id)?'Selected':''?> ><?=$key->category_name." &#x27A1;  ".$key->brand_name." &#x27A1;  <b>".$key->product_name."</b> &#x27AF;  &#x276A;  ".OOP::getColor($key->color)." &#x2759; ".$key->size?> &#x276B; </option>																		
				<?php	}

				} 					
				?>	
			</select>
			
			 <input type="hidden" class="stock_id" name="stock_id" value="<?=$stock_details_list[0]->id?>">
			</td>
			<td class="small_inputbox">
			<input type="text" name="quantity" value="<?=$stock_details_list[0]->quantity?>" class="form-control quantity" placeholder="Quantity" tabindex="2">
			
			</td>
			<td class="small_inputbox">
				<input type="text" name="unit_price" value="<?=$stock_details_list[0]->unit_price?>" class="form-control unit_price" placeholder="Unit Price" tabindex="3">
			</td>
			<td class="small_inputbox">
			<input type="text" name="total_price" value="<?=$stock_details_list[0]->total_price?>" class="form-control total_price" placeholder="Total Price" tabindex="4">
			
			</td>
			<td class="small_inputbox">
		<input type="text" name="buy_unit_price" value="<?=$stock_details_list[0]->buy_unit_price?>" class="form-control buy_unit_price" placeholder="Buy Price" tabindex="5">
	</td>
			 
			 <td class="small_inputbox">
				<input type="text" name="warranty" value="<?=$stock_details_list[0]->warranty?>" class="form-control warranty" placeholder="warranty" tabindex="6">
			</td>
			<td class="product_name_td_seond"> 
			<button type="submit" class="btn btn-primary datasubmitButton" tabindex="6">Update</button>
			</td>
			
		</tr>

 
		
</tbody>

</table> 

<table class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
<thead>
	<th>SL</th>
	<th>Serial No</th>  
	<th>Price</th>	
	<th> Buy Unit Price </th>	
	 <th>Warranty</th>	
   <th>Stock Status </th> 
	
</thead>
	<tbody>
		  <tbody>
						<?php 
						$i=1;
						foreach($stock_details_list as $key)
						{?>
					<tr>
						<td><?=$i++?></td>
						<td><?=$key->serial_no?> </td>
						 
						<td><?=$key->unit_price?> </td>
						<td><?=$key->buy_unit_price?> </td>
						<td><?=($key->warranty)?$key->warranty:"N/A"?> </td>
						<td><?=OOP::getStockStatusHtml($key->product_status)?> </td>
						 
					</tr>
							
							
					<?php }
						?>
					  
					</tbody>
	</tbody>
	
	<tfoot style="border-top:1px solid #ccc">
    <tr>
		 <th>  </th>
		 
		<th id="f_qunatity"> </th>
		<th id="f_unit_price"> </th>
		<th id="f_total_price"> </th>
		<th id="f_total_unit_buy_price"> </th>
		<th> </th>
    </tr>
  </tfoot>
	
</table>



			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 



  
<script>

function checkFromSubmition()
{
	 if($(".product_id").val());
	 {
		 
			$(".show-message-titile-box").html("Please wait, while your request being processed ...");
			return true;
	 }else{
		 
		 alert("Please select product");
		 return false;
	 } 
	 
}



$(".chosen").chosen();


 






  $(document).on("keydown",".unit_price,.total_price,.quantity",function(e){	  
	onlyNumeric(e); 
	  
  });
  

 $(document).on("change",".product_id",function(){
	 
	 var category_id = $(this).find('option:selected').attr('rel');
 $(this).parents('tr').find('.category_id').val(category_id);
 var product_name = $(this).find('option:selected').text(); 
 $(this).parents('tr').find('.product_name').val(product_name);
 
 $(this).parents('tr').find('.product_id_list').val($(this).val());
 
 
 });

/*
 $(document).on("keypress",".datasubmitButton",function(e){
 
        if(e.which == 13){//Enter key pressed
            $('.datasubmitButton').click(); 
		//	$('select').attr('tabindex', 1).focus();
        }
		
		
		
    });
 */
  
 
 
 
 
 
 

  
  $(document).on("keyup , blur",".unit_price",function(){
	 var quantity=  $(this).parents('tr').find('input.quantity').val();
	quantity.trim(); 
	var unit_price=  $(this).val();
	unit_price.trim(); 
	
	quantity=(quantity>0)?quantity:1;	
	
	var up_total_price=(quantity*unit_price);
	up_total_price=isNaN(parseFloat(up_total_price))?0:up_total_price;
	
	 $(this).parents('tr').find('input.total_price').val(up_total_price.toFixed(2));
 
  });
	  
  $(document).on("keyup , blur",".total_price",function(){
	 var quantity=  $(this).parents('tr').find('input.quantity').val();
	quantity.trim(); 
	var total_price=  $(this).val();
	total_price.trim(); 
	
	quantity=(quantity>0)?quantity:1;	
	var up_unit_price=(total_price/quantity);
	up_unit_price=isNaN(parseFloat(up_unit_price))?0:up_unit_price;
	
	 $(this).parents('tr').find('input.unit_price').val(up_unit_price.toFixed(2));
	
 
	
  }); 

    $(document).on("keyup , blur",".quantity",function(){
		
	 var unit_price=  $(this).parents('tr').find('input.unit_price').val();
	 var total_price=  $(this).parents('tr').find('input.total_price').val();	 
	 unit_price.trim(); 	total_price.trim(); 
		
	var quantity=  $(this).val(); quantity.trim();	quantity=(quantity>0)?quantity:1;	
	
	var unit_amount=unit_price;
	var total_amount=total_price;
	
	if((unit_price>0) && (total_price>0))
	{
		total_amount=unit_price*quantity;		
	}
	
	if((unit_price>0) && (total_price<=0))
	{
		total_amount=unit_price*quantity;		
	}
	
	if((unit_price<=0) && (total_price>0))
	{
		unit_amount=(total_price/quantity);	
		total_amount=(unit_amount*quantity);	
	}
 
total_amount=isNaN(parseFloat(total_amount))?0:total_amount;
unit_amount=isNaN(parseFloat(unit_amount))?0:unit_amount;
	
	 $(this).parents('tr').find('input.total_price').val(total_amount.toFixed(2));
	 $(this).parents('tr').find('input.unit_price').val(unit_amount.toFixed(2));
	

 
  }); 
 
//total_price
  
  
</script>

