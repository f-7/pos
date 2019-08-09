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
				 
			<table id="account_list_table" class="table_of_pdf" cellspacing="0" width="100%" style="padding-top:20px">
			 	
                    <thead>
						<tr>
							 
							<th colspan="5">Area name : <?=$val[0]->area_name .", &nbsp;&nbsp;&nbsp;  Society Name : ".$val[0]->society_name ?></th>
						</tr>
					
                        <tr>
							<th>SL</th>
							<th>Working Day</th>  
						    <th>Name</th>						 						   
							<th>Father's Name</th>	
							<th>Mobile</th> 
							
                    </thead>
					<tbody>
						<?php 
						$inc=1;					
						foreach($val as $key){
						?>
						
						<tr>
							<td><?=$inc++?></td>							 						 
							<td><?=OOP::getDay($key->working_day)?></td>
							<td><?=strtoupper($key->name)?></td>
							<td><?=$key->fathers_name?></td>
							<td><?=$key->mob?></td> 
							
							 
						</tr>
						
						
						
						<?php 

						} ?>
						
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
