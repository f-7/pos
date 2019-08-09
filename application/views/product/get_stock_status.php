	
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
<form action=""   enctype="multipart/form-data"  method="post" onsubmit="return checkFromSubmition()" accept-charset="utf-8">
<input type="hidden" name="test_action" value="1">
<table class="stock_info_table">
<thead>
	<th>Product Name </th>
	<th> Stock Status </th>
	<th> Invoice Number </th>	 
	<th>  </th>
	
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
				<option rel="<?=$key->category_id?>" value="<?=$key->id?>"><?=$key->category_name." &#x27A1;  ".$key->brand_name." &#x27A1;  <b>".$key->product_name."</b> &#x27AF;  &#x276A;  ".OOP::getColor($key->color)." &#x2759; ".$key->size?> &#x276B; </option>																		
				<?php	}

				} 					
				?>	
			</select>
			 
			</td>
			
			 <td class="medium_inputbox_large">
			 
				<select class="form-control stock_status" name="stock_status">
				
					<option value=""> All</option>	
					<option value="1"> Available</option>	
					<option value="0"> Stock–outs</option>
					
				</select>
			 
			</td>
			
			<td class="medium_inputbox_large">
			<input type="text" name="invoice_number"  class="form-control invoice_number" placeholder="Invoice Number" tabindex="2">
			
			</td>
			
			  
			 
			<td class="small_inputbox"> 
			<button type="submit" class="btn btn-primary datasubmitButton" tabindex="5">Search</button>
			</td>
			
		</tr>

 
		
</tbody>

</table> 
</form>
<?php
 if(!empty($printed_data)){

?>

<div style="width:100%; height:400px;overflow:auto;" > 
<h4>
<button type="button" id="print_all_serial_number" class="btn btn-primary print_button max_widht_hand maring_left_tweenty" tabindex="5">Print</button>
<?php 
if(empty($post_data))
{
  	echo "<input type='hidden' class='all_data' value='all_data'/>"	;
}
 else{
	 	
	echo "<input type='hidden' class='all_data' value=''/>"	;
	 foreach($post_data as $key=>$val)
	 {
		echo "<input type='hidden' class='".$key."' value='".$val."'/>"	;	
			 
	 }
	 
 }	


?>

</h4>
<table class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
<thead>
	<th style="width:10% !important">SL</th>
	<th style="width:40% !important">Product Name </th>  
	<th style="width:15% !important">Total Product </th>	
	<th style="width:15% !important">Total Sell</th> 
	<th style="width:15% !important">Available Product</th> 
	
</thead>
	 
		  <tbody id="stock_status_list">
						<?php 
						
					
						$i=1;
						foreach($printed_data as $key)
						{?>
					  <tr>
						<td><?=$i++?></td>
						<td><?=$key->category_name." &#x27A1;  ".$key->brand_name." &#x27A1;  <b>".$key->product_name."</b> &#x27AF;  &#x276A;  ".OOP::getColor($key->color)." &#x2759; ".$key->size?> &#x276B; </td>
						 
						<td class="status_td"><?=$key->total_product?> </td>
						<td class="status_td"><?=$key->total_sell?> </td> 
						<td class="status_td">
							<?php $class_name=($key->available>0)?"green":"red"?>
						<b style='color:<?=$class_name?>'><?=$key->available?> </b></td> 
						 
					</tr>
							
							
					<?php }
				 
						?>
					  
					</tbody>
	 
	
	 
	
</table>



</div>
<?php }else {
	if($data_requst==true){
	echo " <h4 style='text-align: center;color:red;width:100%;'>Data not found . <h4>";
	}
}?>

 	</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 
<style>
.status_td{font-width:bold;font-size:18px}
</style>


  
<script>

$(document).on("click","#print_all_serial_number",function(e){
var all_data=$(".all_data").val();
if(all_data)	
{	
var url=base_url+"report/print-stock-status?status=all";
}else{
	var x_product_id=$(".x_product_id").val();
	//alert(x_product_id);
	var x_invoice_number=$(".x_invoice_number").val();
	var x_status=$(".x_status").val(); 
	
	var url=base_url+"report/print-stock-status?status=none&product_id="+x_product_id+"&invoice_number="+x_invoice_number+"&stock_status="+x_status;
	
}

var win = window.open(url, '_blank');
  win.focus();
	
});



function checkFromSubmition()
{
	 
		 
			$(".show-message-titile-box").html(" <b style='color:green'>Please wait, while your request being processed ... </b>");
			return true;
	 
}



$(".chosen").chosen();


 

  $(document).on("keydown",".invoice_number",function(e){	  
	onlyNumeric(e); 
	  
  });
  
 
 
//total_price
  
  
</script>

