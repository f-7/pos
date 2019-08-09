 <meta charset="UTF-8">
<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>
 <div class="borderbox">
 
  <div class="col-md-12">  
<?php 
if($data_list)
{
 
foreach($data_list as $val)
{	
	
?>				 
				 
			<table id="account_list_table" class="table_of_pdf" cellspacing="0" width="100%">
			 	
                    <thead>
						<tr>
							 
							<th colspan="7">Category : <?=$val[0]->category_name .", &nbsp;&nbsp;&nbsp;  Brand : ".$val[0]->brand_name ?></th>
						</tr>
					
                        <tr>
							<th>SL</th>
						    <th>Product Name</th>						 						   
							<th>Color</th> 
							<th>Size</th>
							<th>Total</th> 							
							<th>Sell</th> 
							<th>Stock</th> 
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$inc=1;					
						foreach($val as $key){
						?>
						
						<tr>
							<td><?=$inc++?></td>
							<td> <?=$key->product_name?></td>							 
							<td><?=OOP::getColor($key->color)?></td>
							<td><?=$key->size?></td>
							<td> <?=($key->sell+$key->stock)?></td>
							<td> <?=((int)($key->sell))>0?"<b style='color:green'>".$key->sell."</b>":"<b style='color:red'>".$key->sell."</b>"?></td>
							<td> <?=((int)($key->stock))>0?"<b style='color:green'>".$key->stock."</b>":"<b style='color:red'>".$key->stock."</b>"?></td>
							 
						</tr>
						
						
						
						<?php 

						} 
						
						?>
						
					</tbody>
                    
                </table>
				 
<?php 
} }else{
	
	echo "<b>No data found !</b>";
	
}
?>				 
				 
				 
  </div>
 
 
 
 
 
 
 
 
 </div>











<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>
