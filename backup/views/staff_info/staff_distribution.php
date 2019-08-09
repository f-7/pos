 


 <script>
    

  $( function() {

	
$(".societyTable").find('tbody').sortable({
//  items: "> tr:not(:first)",
appendTo: "parent",
helper: "clone"
}).disableSelection();
	
 
	

$(".topminiBox").droppable({
hoverClass: "drophover",
tolerance: "pointer",
drop: function(e, ui) { 


 
//var obj=$(this).find("table tr:last");
var obj=$(this).find("table");
$(this).find("table tr:last").after("<tr>" + ui.draggable.html() + "</tr>");
 
		var working_day=$(this).find("table").attr('id');
		var society_code=$(this).find("table tr:last").find('td.society_info:last').attr('rel');
		var area_code=$(this).find("table tr:last").find('td:first').attr('rel');
		var user_id=$("#staff_id").val();
		 
	 	var url=base_url+"staff-information/set-staff-distribution";
		
		$.post(url,{working_day:working_day,society_code:society_code,user_id:user_id},function(view){
				if(view) 
				{
					
					 ui.draggable.remove();	
					 var button ='<a id="'+view+'" area_code="'+area_code+'" society_code="'+society_code+'"  class="cross_button">X</a>';
					 obj.find("tbody tr:last").find('td:first').prepend(button); 
					
				}
				else
				{
					obj.find("tbody tr:last").remove();
				}	
			
		});
 
 

}
});	
	
 
	
} );
 
 $(document).on("click",".cross_button",function()
 {
	 
	 
	 
	var obj=$(this);
	var tbl_obj=$(this).parents('tbody');	
	var id= $(this).attr('id');
	var area_code= $(this).attr('area_code');
	var society_code= $(this).attr('society_code');
	var list_area_code= $("#list_of_staff_society").find("tr:first").find("td:first").attr('rel');
	
var url=base_url+"staff-information/set-staff-distribution-update";
$.post(url,{id:id,area_code:area_code,society_code:society_code},function(result){
	
	
if(result)
{	
	
			if(list_area_code!="undefined")
			 {
				 if(list_area_code==area_code)
				 {
					 var new_obj=obj.parents('tr');			 
					 obj.parents('tr').find("td:first").find('a').remove();			 
					 var td_data=new_obj.find("td:first").html();
					 
					 new_obj.find("td:first").html(td_data.replace(/ /g,''));

					 $("#list_of_staff_society").append("<tr>" + new_obj.html() + "</tr>");
					 new_obj.remove();
					  
					 
				 }	 
			 }
			 

		 obj.parents('tr').remove();	 
		if(tbl_obj.find('tr').length<1){tbl_obj.html("<tr></tr>");}
}else{
	alert("Failed. Please try again");
	
}
			 
})	;
 

	
 });
 
 
 
 
 
 
  </script>



<div class="box box-default">
<div class="box-header with-border">

	<h3 class="box-title show-message-titile-box"><?php //($message_show)?$message_show:" Staff distribution area"?> </h3>
	<a target="_blank" href="<?=base_url("staff-information/staff-distribution-pdf-print?id=".$staff['data_list']->user_id)?>" class="gray_bg_color action_button_big" style="width:100px">Print</a>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div> 




<div class="box-body">

  

<div class="row borderbox">

 
		<div class="col-md-8" style="border-right:1px solid black"> 
				<div class="row borderbox_no_border">
						<div class="col-md-3 no_padding"> 
						 
							<img src="<?=base_url('documents/photo/'.$staff['data_list']->member_photo)?>" class="img-responsive img-thumbnail  member_photo" alt="User Photo" style="min-width:120px; max-width:90%; max-height: 120px;min-height: 120px;">
							  
						</div>
						
						<div class="col-md-9" style=" min-height:120px">
							<input type="hidden" value="<?=$staff['data_list']->user_id?>" id="staff_id"/>
								<table >
									<tr>
										<td class="td_label_filed">Name</td>
										<td class="td_label_blank"> : </td>
										<td> <?=$staff['data_list']->name?></td>
									</tr>
									<tr>
									<td class="td_label_filed">Designation</td>
										<td class="td_label_blank"> : </td>
										<td><?=($staff['data_list']->designation)?OOP::getDesignation($staff['data_list']->designation):""?></td>
									</tr>
									<tr>
										<td class="td_label_filed">Mobile</td>
										<td class="td_label_blank"> : </td>
										<td><?=$staff['data_list']->mob?> </td>
									</tr>
								</table>
						</div>
					
					
				</div>		
				<div class="row borderbox">
					<span class="title_gap_fillup">Staff Distribution</span>	 
					<div class="col-md-12 parentOfDaybox">
						<div class="col-md-5 borderbox_distibu " >
							
							<div class="topminiBox">
							 
									<table class="table table-bordered" id="1">
										 
										<tbody> 
										<?php 
											if(isset($staff['staff_work_list'][1]))
											{
												foreach($staff['staff_work_list'][1] as $key)
												{?>
													<tr>
														<td rel="<?=$key['area_code']?>">
														<a id="<?=$key['id']?>" area_code="<?=OOP::formate_three_digit($key['area_code'])?>" society_code="<?=OOP::formate_five_digit($key['society_code'])?>" class="cross_button" >X</a>
														<?=$key['society_code']?>
														</td>
														<td class="society_info" rel="<?=$key['society_code']?>"><?=$key['society_name']?></td>
													</tr>
																									
												<?php }
											}else{
												
												echo "<tr></tr>";
											}	
										?>
										
										</tbody>
									</table>
								 
							 
							</div>
							
							
							<div class="bottom_name_box">
							Saturday
							</div>
						
						</div>
						
					 <div class="col-md-5 borderbox_distibu">
							<div class="topminiBox">
							
							
									<table class="table table-bordered" id="2">
										 
										<tbody>
										<?php 
											if(isset($staff['staff_work_list'][2]))
											{
												foreach($staff['staff_work_list'][2] as $key)
												{?>
													<tr>
														<td rel="<?=$key['area_code']?>">
														<a id="<?=$key['id']?>" area_code="<?=$key['area_code']?>" society_code="<?=$key['society_code']?>" class="cross_button" >X</a>
														<?=$key['society_code']?>
														</td>
														<td class="society_info" rel="<?=$key['society_code']?>"><?=$key['society_name']?></td>
													</tr>
																									
												<?php }
											}else{
												
												echo "<tr></tr>";
											}	
										?>
										</tbody>
									</table>
							
							
							
							
							</div>
							
							
							<div class="bottom_name_box">
							Sunday 
							</div>
						
						</div>
						
						<div class="col-md-5 borderbox_distibu">
							<div class="topminiBox">
									
									<table class="table table-bordered" id="3">
										 
										<tbody>
										<?php 
											if(isset($staff['staff_work_list'][3]))
											{
												foreach($staff['staff_work_list'][3] as $key)
												{?>
													<tr>
														<td rel="<?=$key['area_code']?>">
														<a id="<?=$key['id']?>" area_code="<?=$key['area_code']?>" society_code="<?=$key['society_code']?>" class="cross_button" >X</a>
														<?=$key['society_code']?>
														</td>
														<td class="society_info" rel="<?=$key['society_code']?>"><?=$key['society_name']?></td>
													</tr>
																									
												<?php }
											}else{
												
												echo "<tr></tr>";
											}	
										?> 
										</tbody>
									</table>
							
							
							
							</div>
							
							
							<div class="bottom_name_box">
							Monday
							</div>
						
						</div>
						
						 <div class="col-md-5 borderbox_distibu">
							<div class="topminiBox">
							 
									<table class="table table-bordered" id="4">
										 
										<tbody> 
										<?php 
											if(isset($staff['staff_work_list'][4]))
											{
												foreach($staff['staff_work_list'][4] as $key)
												{?>
													<tr>
														<td rel="<?=$key['area_code']?>">
														<a id="<?=$key['id']?>" area_code="<?=OOP::formate_three_digit($key['area_code'])?>" society_code="<?=OOP::formate_five_digit($key['society_code'])?>" class="cross_button" >X</a>
														<?=$key['society_code']?>
														</td>
														<td class="society_info" rel="<?=$key['society_code']?>"><?=$key['society_name']?></td>
													</tr>
																									
												<?php }
											}else{
												
												echo "<tr></tr>";
											}	
										?>
										
										</tbody>
									</table>
							 
							</div>
							
							
							<div class="bottom_name_box">
							Tuesday
							</div>
						
						</div>
						
						 <div class="col-md-5 borderbox_distibu">
							<div class="topminiBox">
									<table class="table table-bordered" id="5">
										 
										<tbody> 
										<?php 
											if(isset($staff['staff_work_list'][5]))
											{
												foreach($staff['staff_work_list'][5] as $key)
												{?>
													<tr>
														<td rel="<?=$key['area_code']?>">
														<a id="<?=$key['id']?>" area_code="<?=OOP::formate_three_digit($key['area_code'])?>" society_code="<?=OOP::formate_five_digit($key['society_code'])?>" class="cross_button" >X</a>
														<?=$key['society_code']?>
														</td>
														<td class="society_info" rel="<?=$key['society_code']?>"><?=$key['society_name']?></td>
													</tr>
																									
												<?php }
											}else{
												
												echo "<tr></tr>";
											}	
										?>
										
										</tbody>
									</table>
							</div>
							
							
							<div class="bottom_name_box">
							Wednesday
							</div>
						
						</div>
						
						
						 <div class="col-md-5 borderbox_distibu">
							<div class="topminiBox">
									<table class="table table-bordered" id="6">
										 
										<tbody> 
										<?php 
											if(isset($staff['staff_work_list'][6]))
											{
												foreach($staff['staff_work_list'][6] as $key)
												{?>
													<tr>
														<td rel="<?=$key['area_code']?>">
														<a id="<?=$key['id']?>" area_code="<?=OOP::formate_three_digit($key['area_code'])?>" society_code="<?=OOP::formate_five_digit($key['society_code'])?>" class="cross_button" >X</a>
														<?=$key['society_code']?>
														</td>
														<td class="society_info" rel="<?=$key['society_code']?>"><?=$key['society_name']?></td>
													</tr>
																									
												<?php }
											}else{
												
												echo "<tr></tr>";
											}	
										?>
										
										</tbody>
									</table>
							</div>
							
							
							<div class="bottom_name_box">
							Thursday 
							</div>
						
						</div>
						
						 
					 
					</div>
					
				</div> 

		</div>
		<div class="col-md-4"> 
			
		<div style="position: fixed;">	 
			
			<div class="col-md-12" style="padding:5px;"> 
					<select class="form-control area_list" name="area_list">
					<option value="">Select Area</option>
					<?php 
					
					foreach($staff['area_list'] as $key){
					?>
						<option value="<?=$key->area_code?>"><?=$key->area_name?></option>
					<?php } ?>	
					</select>
			</div>
		
		
			<div class="col-md-12 societyTable"> 
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Code</th> 
								<th>Society Name </th>
							</tr>
						</thead>
						<tbody id="list_of_staff_society">
							 
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


<script>

$(document).on("change",".area_list",function(){
var areaVal=$(this).val();	
var user_id=$("#staff_id").val();
	if(areaVal!="")
	{
		var url=base_url+"staff-information/get-area-society";
		$.post(url,{area_code:areaVal,user_id:user_id},function(view){
				$("#list_of_staff_society").html(view);
			
		});
		
	}
});

</script>