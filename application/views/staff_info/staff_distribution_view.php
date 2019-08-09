 <link href="<?= $this->template->Css()?>bootstrap.css" rel="stylesheet">
 <link href="<?= $this->template->Css()?>micro_pos_system.css" rel="stylesheet">

  
<div class="box box-default">
<div class="box-header with-border">

	<h3 class="box-title show-message-titile-box"><?=($message_show)?$message_show:" Members Account Opening Form"?> </h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div> 




<div class="box-body">

  

<div class="row borderbox" style="padding-bottom:0px">

 
		<div class="col-md-12" style="border-right:1px solid black"> 
				<div class="row borderbox_no_border" >
						<div class="col-md-3 no_padding"> 
						 
							<img src="<?=base_url('documents/photo/'.$staff['data_list']->member_photo)?>" class="img-responsive img-thumbnail  member_photo" alt="User Photo" style="min-width:120px; max-width:90%; max-height: 120px;min-height: 120px;">
							  
						</div>
						
						<div class="col-md-9" style=" min-height:120px">
							<input type="hidden" value="<?=$staff['data_list']->user_id?>" id="staff_id"/>
								<table >
									<tr>
										<td class="td_label_filed">Full Name</td>
										<td class="td_label_blank"> : </td>
										<td> <?=$staff['data_list']->name?></td>
									</tr>
									<tr>
									<td class="td_label_filed">Designation</td>
										<td class="td_label_blank"> : </td>
										<td><?=OOP::getDesignation($staff['data_list']->designation)?></td>
									</tr>
									<tr>
										<td class="td_label_filed">Mobile</td>
										<td class="td_label_blank"> : </td>
										<td><?=$staff['data_list']->mob?> </td>
									</tr>
									
									<tr>
										<td class="td_label_filed">Present Address: </td>
										<td class="td_label_blank"> : </td>
										<td><?= "Vilalge : ".$staff['present_address']->village_name."<br> Post office : ".$staff['present_address']->post_office_name."<br>"; 
										?> </td>
									</tr>
									
									
								</table>
						</div>
					<div>
					<hr style="width:100%; border:1px solid #ccc">
						<table class="table table-bordered">
							<thead>
								<th style="width:120px">Working Day</th>
								<th style="width:220px">Area Name</th>
								<th>Society Name's </th> 
							</thead>
							<tbody>
							<?php 
							 
							
							foreach($staff['staff_work_list']  as $key=>$val){
								
								
						 	?>
									
									
								
									<td><?=OOP::getDay($key)?></td>
								    
									<td>
										<table class="table">
										<tbody>
										<?php foreach($val as $ukey){?>	
											<tr>
											<td><?=$ukey['area_name']?></td>
											
											</tr>
										<?php } ?>	
										</tbody>
										</table>
									</td>
									
									<td>
										<table class="table">
										<tbody>
										<?php foreach($val as $ukey){?>	
											<tr>
											<td><?=$ukey['society_name']?></td>
											
											</tr>
										<?php } ?>	
										</tbody>
										</table>
									</td>
									 
									
								</tr>
							<?php 
							
								
							
							} ?>	
							</tbody>
						</table>
					
					</div>
					
				</div>		
			 
		</div>
		 
 </div>
 

</div> 



   
    





</div> 


<div class="box-footer"> <!---box footer ---> </div>
</div> 


 