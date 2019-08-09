<style>
.action_button{ width:95px !important}
</style> 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> All Slider list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
			<table id="slider_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							<th>SL</th>
						    <th> Title</th>
                            <th>Slider</th> 
							<th>Status</th> 
                            <th style="text-align: center;    width: 250px;">Action</th>
                        </tr>
                    </thead>
					<tbody>
							<?php 
							if($data_list)
							{
							 
								$i=1;
								foreach($data_list as $key){
							?>
								<tr>
									<td><?=$i++?></td>
									<td><?=$key->title?></td>
									<td><img style="width:270px; height:60px;" src="<?=base_url('website_file/slider/'.$key->image)?>"/></td>
									<td class="status_<?=$key->id?>"> <?=($key->status==1)?'<b style="color:green">Active</b>':'<b style="color:red"> Not Active</b>'?></td>
									<td>
									<a rel="<?=$key->id?>" img="<?=$key->image?>" class="action_button action_button_delete"  style="float:right; margin-left:5px">Delete</a>
										<a  rel="<?=$key->id?>" name="<?=$key->status?>"  class="action_button action_button_edit" style="float:right"><?=($key->status==1)?"Deactivated":"Activated"?></a>
										
									</td>
								</tr>
							<?php 
								}
							
							} else{?>
								
								<tr>
								<td calspan="3"> No data found</td>
								</tr>
							<?php }?>
					</tbody>
                    
                </table>
				  
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

<script>

$(document).ready(function() {
    $('#slider_info_table').DataTable();
} );


$(document).on("click",".action_button_edit",function(){
	
	var id_number=$(this).attr("rel");
	var status=$(this).attr("name");
	var save_link=base_url+"Web-application/slider_update/";
	var obj=$(this);
var result = confirm("Are you sure change this status");
if (result) {
 
	
	 $.post(save_link,{id:id_number,status:status},function(view){
		 
	 if(view=="done")
	 {
		 var status_code='<b style="color:green">Activated</b>';
		 var current_button="Deactivated";
		 var newStatus=1; 
		 if(status==1){status_code='<b style="color:red"> Not Activated</b>';current_button="Activated";newStatus=0}
		 
		 $(".status_"+id_number).html(status_code);
		 obj.html(current_button);
		 obj.attr("name",newStatus);
		 var alertAcDemgs=(current_button=="Activated")?"Deactivated":"Activated";
		 alert("Slider is "+alertAcDemgs+".");
		 
	 }else{
		 alert("Failed please try again !");		 
	 }
		 
	 });
}

});


$(document).on("click",".action_button_delete",function(){
	
	var id_number=$(this).attr("rel");
	var id_img=$(this).attr("img");
	 
	var save_link=base_url+"Web-application/slider_delete/";
	  var  rows = $(this).closest("tr");
	   var table = $('#slider_info_table').DataTable(); 
	    if (rows.hasClass('selected')){ rows.removeClass('selected');}else { table.$('tr.selected').removeClass('selected');rows.addClass('selected');}
	  
	  
var result = confirm("Are you sure delete this slider");
if (result) {
 
	
	 $.post(save_link,{id:id_number,id_img:id_img},function(view){
		 
	 if(view=="done")
	 {
		 alert("Successfully delete this slider!");	
		 
		  table.row('.selected').remove().draw( false );
		 
	 }else{
		 alert("Failed please try again !");		 
	 }
		 
	 });
}

});



</script>
