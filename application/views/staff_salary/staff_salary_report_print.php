 <meta charset="UTF-8">
<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>
 <div class="borderbox">
 
  <div class="col-md-12">  
<?php 


if($data)
{
 
?>				 
				 
			<table id="installment_list_table" class="table_of_pdf" cellspacing="0" width="100%">
			 	
                 
  <thead>
                        <tr>
							 <th>SL</th> 
							  <th>Staff Name</th> 
							  <th>Name of Month</th>                           
							  <th>Basic Salary </th> 
							  <th>Bonus Amount </th>  
							  <th>Total Amount</th> 
							  <th>Generate Date</th>  
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$i=1;
						$total_amount=0;
						foreach($data as $key){
							
								$total_amount+=($key['basic_salary']+$key['bonus']);

						?>
					
							<tr>
								<td><?=$i++?></td> 
								<td><?=($key['basic_salary']<1)?"<b style='color:red'>".$key['name']."</b>":$key['name']?></td> 
								<td><?=$key['month_name'].",".$key['year']?></td> 
								<td><?=($key['basic_salary'])?$key['basic_salary']:'0.00'?>/-</td> 
								<td><?=($key['bonus'])?$key['bonus']:'0.00'?>/-</td> 
								  
								<td><?=($key['basic_salary']+$key['bonus'])?>/-</td> 
								<td><?=$key['ganerate_date']?></td> 
							</tr>
							
							<?php } ?>	
					</tbody>
					 
					<tfoot>
						<tr>
							<td colspan="5" style='text-align: right;'> Total Amount: </td> <td><?=($total_amount)?$total_amount:'0.00'?>/-</td>
						</tr>
					</tfoot>
                    
                </table>	 
				 
<?php 
 }else{
	
	echo "<b>No data found !</b>";
	
}
?>				 
				 
				 
  </div>
 
 
 
 
 
 
 
 
 </div>


 





<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>
