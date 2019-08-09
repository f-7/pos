   
 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title show-message-titile-box"> <?=($message_show)?$message_show:""?> </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 
			
			<div class="box-body">
				<div class="row">
		<form action="" id="area_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 area_info_col_1">                  
				  				  
				      
				 			  
				    <div class="micro-pos-group">
                      <label for="Area" class="col-sm-4 control-label">Area Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="area_name" class="form-control area_name" required="required"  placeholder="Area Name">
					  <errormessage> <?=(form_error('area_name'))?form_error('area_name'):""?> </errormessage>
                      </div>
					  
                    </div>
					
                    <div class="micro-pos-group">
                      <label for="status" class="col-sm-4 control-label">Status <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					   <select class="form-control status" required="required" name="status">
                         <?=OOP::selectOptionList(OOP::status(),1)?>						 
                      </select>
					 <errormessage> <?=(form_error('status'))?form_error('status'):""?> </errormessage>
                      </div>
                    </div>
                </div>
				
				
				 <div class="col-md-6">  
				 			  
				    <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
					 
				 
				
			 
				
			   </form>
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 

 


<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> All Area list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="area_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th>
						   <th>Area Code </th>
                            <th>Area Name</th>
							  <th>Status</th>                           
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>	 
				 
				 
				 
				 
				 
				 
				 
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 
 
 <script>
 
 $(document).ready(function() {
  
   $('#area_info_table').DataTable( {
       ajax: base_url+"Setting/ajax-area-info",
        columns: [
            { data: "SL" },
			 
		 	{ data: null, render: function ( data, type, row ) {                
                return formate_three_digit(data.area_code);
            } }, 
			   
            { data: "area_name" },            
			{ data: null, render: function ( data, type, row ) {                
                return (data.status==0)?'Inactive':"Active";
            } },
			{ data: null, render: function ( data, type, row ) {   
				
                return (data.DT_RowId)?"<a onclick='eidtArea("+data.DT_RowId+",this)' class='action_button action_button_edit'>Edit</a>":"";
            } },
        ],
    } );

 
} );
 
 
  
 function eidtArea(id,obj)
{
	 var selected_row=$(obj).closest('tr');
     var area_name = selected_row.find('td:nth-child(3)').html(); 
	 var status = selected_row.find('td:nth-child(4)').html(); 
     status=(status=="Active")?1:0;
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
       
	$("#medium_editor_modal_title").html("Edit Area information ");
	$("#medium_editor_modal_submit").attr('onClick','updateArea('+id+',3,4)');
	$("#medium_editor_modal_body").html($(".area_info_col_1").html()); 
	$("#medium_editor_modal_body").find(".area_name").val(area_name); 
	$("#medium_editor_modal_body").find('select.status option[value="'+status+'"]').prop("selected", true);
 
  
  $('#medium_editor_modal').modal('show');
  
  
	
}

function updateArea(id,td_1,td_2)
{
	 var table = $('#area_info_table').DataTable();
	$(".modal_red_message").html();
	var area_name=$("#medium_editor_modal_body").find(".area_name").val(); 
	var status=$("#medium_editor_modal_body").find(".status").val(); 
	//area_name=area_name.replace(/ /g,'');
	if(area_name=="")
	{
		$(".modal_red_message").html("Area name is required !");
	return false;	
	}
	
	$.post(
	base_url+"Setting/ajax-update-area-info",
	{
	id:id,
	area_name:area_name,
	status:status,
	},
	function(result){
		if(result=="done")
		{
		 $("#medium_editor_modal_body").html("<h4 style='color:green;text-align: center;'>Succefully update this data.</h4>");
			
			table.$('tr.selected').find('td:nth-child('+td_1+')').html(area_name);
				table.$('tr.selected').find('td:nth-child('+td_2+')').html((status=="1")?'Active':'Inactive');
			table.$('tr.selected').removeClass('selected');				
			dealyModal('medium_editor_modal','hide');
		}else{
			$(".modal_red_message").html("Area information update failed !");
		}
		
	});
	
	
	
	
}
 
 
 
  
    </script>

			


