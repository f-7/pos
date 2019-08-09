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
							 
							<th colspan="9"> Staff salary sheet <?=$data[0]['month_name']." ,".$data[0]['year']?> </th>
						</tr>
					
                         <tr>
							 <th>SL</th> 
							  <th>Staff Name</th>                            
							  <th>Basic Salary </th> 
							  <th>Bonus Amount </th> 
							  <th>Invested Profit</th> 
							  <th>Total Amount</th> 
							  <th>Pay Date</th> 
							  
							  <th>Action</th>  
                        </tr>
                    </thead>
					<tbody>
						<?php 
						$inc=1;		
						$total_amount=0;
						foreach($data as $key){
							if($key['salary']>0){
								$total_amount=$total_amount+$key['total_amount'];
							 
							
						?>
						
							<tr>
								<td><?=$inc++?></td> 
								<td><?=$key['name']?></td>  
								<td><?=($key['salary'])?$key['salary']:'0.00'?>/-</td> 
								<td><?php 
									if($key['bonus'])
									{	
										foreach($key['bonus'] as $tkey=>$tval)
										{
											echo "<p style='font-size:11px'> ".ucfirst(OOP::getSalaryType($tkey))." : ".$tval." /-</p>";
										}
									}else{
										echo "0.00/-";
									}	
								?></td> 
								<td><?=($key['invested_profit'])?$key['invested_profit']:'0.00'?>/-</td> 
								<td><?=($key['total_amount'])?$key['total_amount']:'0.00'?>/-</td> 
								<td ><?=($key['pay_date'])?$key['pay_date']:""?></td> 
								<td><?php 
									if($key['pay_date'])
									{
										echo "<b style='color:green'>  Paid</b>";
									}else{
										echo "<b style='color:gray'>  Pending</b>";
										
									}	
								?></td>
							</tr>
						
						
						
						<?php 
							}
						} ?>
						
					</tbody>
                    
					<tfoot>
						<tr>
							<td colspan="6" style='text-align: right;'> Total Amount: </td> <td><?=$total_amount?>/-</td>
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
