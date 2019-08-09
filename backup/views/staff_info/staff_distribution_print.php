<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>

  <div style="width:100%; height:100px; padding-top:10px">
	<div style="width:20%; height:100px;border:1px solid #ccc; float:left">
	<img src="<?=base_url('documents/photo/'.$staff['data_list']->member_photo)?>" style="width:130px; height:100px" >
	</div>		
	<div style="width:70%; height:100px; float:left; padding-left:20px">
		Name: <?=strtoupper($staff['data_list']->name)?> <br>
		  Designation: <?=($staff['data_list']->designation)?OOP::getDesignation($staff['data_list']->designation):""?> <br>
		  Mobile: <?=$staff['data_list']->mob?><br>
		Address: <?=$staff['present_address']->village_name.", ".$staff['present_address']->post_office_name?>	
	</div>									 

 </div>
 
 
 

<div class="data_body border_padding_top"> 
  
<table class="main_table_clas" cellpadding="0" cellspacing="0" >
<thead>
	<tr>
		<th  style="width:15% ;text-align: center;">
		  <div class="avoid">
			Working Day
		  </div>
		</th>
		<th  style="width:20%;text-align: center;">
		  <div class="avoid">
			Area Name
		  </div>
		</th>
		<th style="width:60%;">
		  <div class="avoid">
			Society Name's 
		  </div>
		</th>
	<tr>
</thead>

<tbody>
							<?php 
							 
							
							foreach($staff['staff_work_list']  as $key=>$val){
								
								
						 	?>
									
									
								<tr>
									<td  style="text-align: center; border:1px solid #000"><div class="avoid"><?=OOP::getDay($key)?></div></td>
								    
									<td style="text-align: center; border:1px solid #000">
										<table class="table">
										<tbody>
										<?php foreach($val as $ukey){?>	
											<tr>
											<td style="border: solid 1px #FFF;"><div class="avoid"><?=$ukey['area_name']?></div></td>
											
											</tr>
										<?php } ?>	
										</tbody>
										</table>
									</div></td>
									
									<td style="text-align: center; border:1px solid #000">
										<table class="table">
										<tbody>
										<?php foreach($val as $ukey){?>	
											<tr>
											<td style="border: solid 1px #FFF;"><div class="avoid"><?=$ukey['society_name']?></div></td>
											
											</tr>
										<?php } ?>	
										</tbody>
										</table>
									</div></td>
									 
									
								</tr>
							<?php 
							
								
							
							} ?>	
							</tbody>

	
</table>

 

</div>

<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>

 
 
 
 
 
 
 