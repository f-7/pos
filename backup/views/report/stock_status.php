<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>

<h5>
Stock Status................
</h5>
 

 <div class="borderbox">
<table  cellspacing="0" width="100%">
<thead>
	<th >SL</th>
	<th >Product Name </th>  
	<th >Total  </th>	
	<th > Sell</th> 
	<th >Available </th> 
	
</thead>
	 
		  <tbody id="stock_status_list">
						<?php 
						
					
						$i=1;
						foreach($data_list as $key)
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
	 
 
	
	
<style>
table th{background: #ccc;}
table th,td{border:1px solid black; text-align: center;}
.status_td{font-width:bold;font-size:18px}
</style>
	
	
	
	
	

<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>

 
 
 
 
 
 
 