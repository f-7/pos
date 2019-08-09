	
	 <link href="<?= $this->template->Css()?>seaching_select_box.css"" rel="stylesheet">
	  <script src="<?= $this->template->Js()?>seaching_select_box.js"></script> 
 
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
<form action="" id="society_info" enctype="multipart/form-data"  method="post" onsubmit="return checkFromSubmition()" accept-charset="utf-8">
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
	
<select class="form-control product_id chosen"   name="product_id[]" tabindex="1">
<option value="">Select Product</option>
	<?php 
	if(!empty($data_list)){
	foreach($data_list as $key)
	{?>								
	<option rel="<?=$key->category_id?>" value="<?=$key->id?>"><?=$key->category_name." &#x27A1;  ".$key->brand_name." &#x27A1;  <b>".$key->product_name."</b> &#x27AF;  &#x276A;  ".OOP::getColor($key->color)." &#x2759; ".$key->size?> &#x276B; </option>																		
	<?php	}

	} 					
	?>	
</select>
	
	<input type="hidden" class="product_name" name="product_name[]" style="width: 100%;height: 35px;border: 0px;" readonly>
	<input type="hidden" class="category_id" name="category_id[]" value="">
	<input type="hidden" class="product_id_list" name="product_id_list[]" value="">
	</td>
	<td class="small_inputbox">
	<input type="text" name="quantity[]" class="form-control quantity" placeholder="Quantity" tabindex="2">
	
	</td>
	<td class="small_inputbox">
		<input type="text" name="unit_price[]" class="form-control unit_price" placeholder="Unit Price" tabindex="3">
	</td>
	<td class="small_inputbox">
	<input type="text" name="total_price[]" class="form-control total_price" placeholder="Total Price" tabindex="4">
	
	</td>
	<td class="small_inputbox">
		<input type="text" name="buy_unit_price[]" class="form-control buy_unit_price" placeholder="Buy Price" tabindex="5">
	</td>
	 
	 <td class="small_inputbox">
		<input type="text" name="warranty[]" class="form-control warranty" placeholder="warranty" tabindex="6">
	</td>
	<td class="product_name_td_seond" > 
		<a class="action_button action_button_edit add_more extra_cls" tabindex="6">Add</a>
	</td>
</tr>

</tbody>

</table>
<table class="listOfTable" style="display:none">
<thead>
	<th>Product Name </th>
	<th> Qty </th>
	<th> Unit Price </th>
	<th>Price </th>
	<th> Buy Unit Price </th>	
	<th>Warranty </th>
	
</thead>
	<tbody>
		 
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

<div class="micro-pos-group">
<button type="submit" class="btn btn-primary datasubmitButton">Submit</button>
</div>

			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 



  
<script>

function checkFromSubmition()
{
	if($(".listOfTable").find('tbody tr').length>0)
		{
			$(".stock_info_table").remove();
			$(".show-message-titile-box").html("Please wait, while your request being processed ...");
			return true;
		}else{
			alert("Please add product");
			return false;			
		}
	 
}



$(".chosen").chosen();


function calculationTotalStock()
{
	var total_qty=0;
	var total_unit_price=0;
	var total_price_amount=0;
	var f_total_unit_buy_price=0;
	$(".listOfTable").find('tbody tr').each(function(){
		
		var quantity=parseFloat($(this).find('.quantity').val());
		var unit_price= parseFloat($(this).find('.unit_price').val());
		var total_price= parseFloat($(this).find('.total_price').val());
		var buy_unit_price= parseFloat($(this).find('.buy_unit_price').val());
		
		total_qty=total_qty+parseFloat((quantity)?quantity:0);
		total_unit_price=total_unit_price+parseFloat((unit_price)?unit_price:0);
		total_price_amount=total_price_amount+parseFloat((total_price)?total_price:0);
		f_total_unit_buy_price=f_total_unit_buy_price+parseFloat((buy_unit_price)?buy_unit_price:0);
		
	});
	
	$("#f_qunatity").html("Total : "+total_qty);
	$("#f_unit_price").html("Total : "+total_unit_price);
	$("#f_total_price").html("Total : "+total_price_amount);
	$("#f_total_unit_buy_price").html("Total : "+f_total_unit_buy_price);
	
	
}







  $(document).on("keydown",".unit_price,.total_price,.quantity,.buy_unit_price",function(e){	  
	onlyNumeric(e); 
	  
  });
  

 $(document).on("change",".product_id",function(){
	 
	 var category_id = $(this).find('option:selected').attr('rel');
 $(this).parents('tr').find('.category_id').val(category_id);
 var product_name = $(this).find('option:selected').text(); 
 $(this).parents('tr').find('.product_name').val(product_name);
 
 $(this).parents('tr').find('.product_id_list').val($(this).val());
 
 
 });


 $(document).on("keypress",".add_more",function(e){
 
        if(e.which == 13){//Enter key pressed
            $('.add_more').click(); 
			$('select').attr('tabindex', 1).focus();
        }
		
		
		
    });
 
 

 $(document).on("click",".add_more",function(){
	 
	 var productName_select=$(this).parents('tr').find('td:first').find('.product_name').val();
	 
if(productName_select!="" && productName_select!="Select Product" )
{

		var td_info=$(this).parents('tr').html();
		$(".listOfTable").find('tbody').append("<tr>"+td_info+"</tr>");
		$(".listOfTable").find('tbody tr:last').find('td:first').find('div.chosen-container').remove();
		$(".listOfTable").find('tbody tr:last').find('td:first').find('select').remove();
		$(".listOfTable").find('tbody tr:last').find('td:first').find('.product_name').attr('type','text');

		
		
		$(".listOfTable").find('tbody tr:last').find('.quantity').val($(this).parents('tr').find('.quantity').val());
		$(".listOfTable").find('tbody tr:last').find('.unit_price').val($(this).parents('tr').find('.unit_price').val());
		$(".listOfTable").find('tbody tr:last').find('.total_price').val($(this).parents('tr').find('.total_price').val());
		$(".listOfTable").find('tbody tr:last').find('.buy_unit_price').val($(this).parents('tr').find('.buy_unit_price').val());
		$(".listOfTable").find('tbody tr:last').find('.warranty').val($(this).parents('tr').find('.warranty').val());
		

		 $(".listOfTable").find('tbody tr:last').find('.quantity').attr("required","required");
		 $(".listOfTable").find('tbody tr:last').find('.unit_price').attr("required","required");
		 $(".listOfTable").find('tbody tr:last').find('.total_price').attr("required","required");
		
		

		$(".listOfTable").find('tbody tr:last').find('td:last').find('a').html("Delete");
		$(".listOfTable").find('tbody tr:last').find('td:last').find('a').addClass('delete_more red_bg_color');
		$(".listOfTable").find('tbody tr:last').find('td:last').find('a').removeClass('add_more extra_cls'); 

		$(".listOfTable").find('tbody tr:last').find('input').removeAttr("tabindex");
		
		if($(".listOfTable").find('tbody tr').length>0)
		{
			$(".listOfTable").css("display","block");
			$(this).parents('tr').find('td:first').find('.product_name').val("");
			 $(this).parents('tr').find('input').val("") ;
			 
				$('select').chosen('destroy');  
				$('select').prop("selectedIndex", -1);   
				$('select').chosen();

		}	
		
calculationTotalStock();	
admore_total_buy_pirce();	
}else{
	
	alert("Please select products");
}

		 
 });
 
 
 
 
 
 
 
 
 
  $(document).on("click",".delete_more",function(){
	  	  
	  $(this).parents('tr').remove();
	  
	  if($(".listOfTable").find('tbody tr').length<1)
		{
			$(".listOfTable").css("display","none");
		}	
	  
	  calculationTotalStock();
  });

  
  $(document).on("keyup , blur",".unit_price",function(){
	 var quantity=  $(this).parents('tr').find('input.quantity').val();
	quantity.trim(); 
	var unit_price=  $(this).val();
	unit_price.trim(); 
	
	quantity=(quantity>0)?quantity:1;	
	
	var up_total_price=(quantity*unit_price);
	up_total_price=isNaN(parseFloat(up_total_price))?0:up_total_price;
	
	 $(this).parents('tr').find('input.total_price').val(up_total_price.toFixed(2));
	
calculationTotalStock();	
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
	

calculationTotalStock();
	
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
	

calculationTotalStock();
	
  }); 
 
//total_price
  
  
  
    $(document).on("keyup , blur",".buy_unit_price",function(){
		
 	if($(this).parents("table").hasClass("listOfTable"))
		{
			
			admore_total_buy_pirce();
			 
			
		}	
 
	
  }); 
  
 
 function admore_total_buy_pirce()
 {
	 
	       var total_buy_unit_price=0;
					
			$(".listOfTable").find("tbody").find("tr").each(function(){
				
				var quantity_unit_t=$(this).find('input.quantity').val();
				quantity_unit_t.trim(); 
				
				var buy_unit_price_t=$(this).find('input.buy_unit_price').val();
				buy_unit_price_t.trim(); 
				
				var total_u_b_p=quantity_unit_t*buy_unit_price_t;
				total_buy_unit_price=total_buy_unit_price+total_u_b_p;
				
			});
			
			$(".listOfTable").find("tfoot").find("#f_total_unit_buy_price").html("Total:"+total_buy_unit_price);
	 
 }
 
 
 
 
 
</script>

