<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>


<?php 
foreach($prodcut_list as $key)
{
	

?>
<h5 style=" text-align:center;border-bottom:1px solid #ccc;margin: 5px;"> <?=$key->category_name." &#x27A1;  ".$key->brand_name." &#x27A1;  <b>".$key->product_name."</b> &#x27AF;  &#x276A;  ".OOP::getColor($key->color)." &#x2759; ".$key->size?> &#x276B; </h5>
 

 <div class="borderbox">
 <table>
	<thead>
	<?php foreach($data_list as $val){?>
		
		<th style="margin: 10px;float: left;">
			 <?=Barcode::create($val->serial_no);?><br>
			<?=$val->serial_no?>
		</th> 
	
	<?php } ?>
	</thead>
 </table>
 

</div>   
	 
 
		
	
	
<?php
 //echo "<pagebreak />";

 } ?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>

 
 
 
 
 
 
 