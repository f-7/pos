	
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
<input type="hidden" name="test_action" value="1">
<table class="stock_info_table">
<thead>
	<th>Product Name </th>
	<th> Invoice Number </th>
	<th> From Date </th>
	<th> End Date </th>
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
			<input type="text" name="invoice_number"  class="form-control invoice_number" placeholder="Invoice Number" tabindex="2">
			
			</td>
			 <td class="small_inputbox">
			<input type="text" name="from_date"  class="form-control from_date" placeholder="From Date" tabindex="3">
			
			</td>
			 <td class="small_inputbox">
			<input type="text" name="end_date"  class="form-control end_date" placeholder="End Date" tabindex="4">
			
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
if(empty($post_datea))
{
  	echo "<input type='hidden' class='all_data' value='all_data'/>"	;
}
 else{
	 	
	echo "<input type='hidden' class='all_data' value=''/>"	;
	 foreach($post_datea as $key=>$val)
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
	<th style="width:20% !important">Invoice Number </th>	
	 <th style="width:20% !important">Serial Number </th> 
	
</thead>
	<tbody>
		  <tbody>
						<?php 
						
					
						$i=1;
						foreach($printed_data as $key)
						{?>
					  <tr>
						<td><?=$i++?></td>
						<td><?=$key->category_name." &#x27A1;  ".$key->brand_name." &#x27A1;  <b>".$key->product_name."</b> &#x27AF;  &#x276A;  ".OOP::getColor($key->color)." &#x2759; ".$key->size?> &#x276B; </td>
						 
						<td><?=$key->invoice_number?> </td>
						<td><?=$key->serial_no?> </td> 
						 
					</tr>
							
							
					<?php }
				 
						?>
					  
					</tbody>
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

 



  
<script>

$(document).on("click","#print_all_serial_number",function(e){
var all_data=$(".all_data").val();
if(all_data)	
{	
var url=base_url+"report/print_product_serial_number?status=all";
}else{
	var x_product_id=$(".x_product_id").val();
	var x_invoice_number=$(".x_invoice_number").val();
	var x_from_date=$(".x_from_date").val();
	var x_end_date=$(".x_end_date").val();
	
	var url=base_url+"report/print-product-serial-number?status=none&product_id="+x_product_id+"&invoice_number="+x_invoice_number+"&from_date="+x_from_date+"&end_date="+x_end_date;
	
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


 
  $( function() {
  datePicker(".from_date");
   datePicker(".end_date");
   
  
  } );





  $(document).on("keydown",".invoice_number",function(e){	  
	onlyNumeric(e); 
	  
  });
  
 
 
//total_price
  
  
</script>

