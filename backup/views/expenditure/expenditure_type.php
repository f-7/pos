   
 
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
		<form action="" id="category_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 product_category_info_info_col_1">                  
				  				  
				      
				 			  
				    <div class="micro-pos-group">
                      <label for="Area" class="col-sm-4 control-label">Expenditure Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="expenditure_name" class="form-control expenditure_name" required="required"  placeholder="Expenditure Name">
					  <errormessage> <?=(form_error('expenditure_name'))?form_error('expenditure_name'):""?> </errormessage>
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
					<h3 class="box-title"> All Expenditure Type </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="expenditure_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
								<th>Expenditure Name</th> 
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
  
   $('#expenditure_info_table').DataTable( {
       ajax: base_url+"Expenditure/ajax-expenditure-type",
        columns: [
            { data: "SL" },			 			   
            { data: "expenditure_name" },   
			{ data: "status" },  
			{ data: null, render: function ( data, type, row ) {   
				
                return (data.DT_RowId)?"<a onclick='eidtCategory("+data.DT_RowId+",this)' class='action_button action_button_edit'>Edit</a>":"";
            } },
        ],
    } );

 
} );
 
 
  
 function eidtCategory(id,obj)
{
	 var selected_row=$(obj).closest('tr');
     var expenditure_name = selected_row.find('td:nth-child(2)').html();  
 
	 var status = selected_row.find('td:nth-child(3)').html(); 
     status=(status=="Active")?1:0;
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
       
	$("#medium_editor_modal_title").html("Edit Expenditure  Type ");
	$("#medium_editor_modal_submit").attr('onClick','updateCategory('+id+',2,3)');
	$("#medium_editor_modal_body").html($(".product_category_info_info_col_1").html()); 
	$("#medium_editor_modal_body").find(".expenditure_name").val(expenditure_name);  
	$("#medium_editor_modal_body").find('select.status option[value="'+status+'"]').prop("selected", true);
 
  
  $('#medium_editor_modal').modal('show');
  
  $(".modal_red_message").html("");
	
}

function updateCategory(id,td_1,td_3)
{
	
	 var table = $('#expenditure_info_table').DataTable();
	$(".modal_red_message").html("");
	var expenditure_name=$("#medium_editor_modal_body").find(".expenditure_name").val();  
	var status=$("#medium_editor_modal_body").find(".status").val(); 
	//category_name=category_name.replace(/ /g,'');
	if(expenditure_name=="")
	{
		$(".modal_red_message").html("Expenditure name is required !");
	return false;	
	}
	
	$.post(
	base_url+"Expenditure/ajax-update-expenditure-type",
	{
	id:id,
	expenditure_name:expenditure_name, 
	status:status,
	},
	function(result){
		if(result=="done")
		{
		 $("#medium_editor_modal_body").html("<h4 style='color:green;text-align: center;'>Succefully update this data.</h4>");
			
			table.$('tr.selected').find('td:nth-child('+td_1+')').html(expenditure_name); 
				table.$('tr.selected').find('td:nth-child('+td_3+')').html((status=="1")?'Active':'Inactive');
			table.$('tr.selected').removeClass('selected');				
			dealyModal('medium_editor_modal','hide');
		}else{
			$(".modal_red_message").html("Expenditure information update failed !");
		}
		
	});
	
	
	
	
}
 
 
 
  
    </script>

			


