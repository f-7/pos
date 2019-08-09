 <meta charset="UTF-8">
<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>
 <div class="borderbox">
 
  <div class="col-md-12">  
<?php 
if($data_list)
{?>
 <br>
 <span style="padding:10px; width:100%;"><b> Staff Name : </b><?=strtoupper($area_list[0]->name)?> </span> <br>
 <span style="padding:10px;width:100%;"><b> Designation : </b> <?=($area_list[0]->designation)?OOP::getDesignation($area_list[0]->designation):""?></span><br>
 <span style="padding:10px;width:100%;"><b> Joining Date :</b> <?=$area_list[0]->joing_date?></span>
 
 
<?php 
foreach($area_list as $val)
{	
	
?>				 
				 
			<table id="account_list_table" class="table_of_pdf" cellspacing="0" width="100%" style="padding-top:20px">
			 	
                    <thead>
						<tr>
							 
							<th colspan="5">Area name : <?=$val->area_name  ?></th>
						</tr>
					
                        <tr>
							<th>SL</th>
							<th>Society_name </th>  
							<th>Working Day</th>  
						    <th>Start Day</th>						 						   
							<th>Leave Date</th>	 
							
                    </thead>
					<tbody>
						<?php 
						$inc=1;					
						foreach($data_list as $key){
						if($val->area_code==$key->area_code)	
						{
 		
						?>
						
						<tr>
							<td><?=$inc++?></td>
							<td><?=$key->society_name?></td>							
							<td><?=OOP::getDay($key->working_day)?></td>
							<td><?=date_format(date_create($key->created_date),"d-m-Y")?></td>
							<td><?=($key->leaving_date)?"<b style='color:red'>".(date_format(date_create($key->leaving_date),"d-m-Y"))."</b>":$key->leaving_date?></td> 
							
							 
						</tr>
						
						
						
						<?php 
						}
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
