   
 
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
                      <label for="Area" class="col-sm-4 control-label">Category Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="category_name" class="form-control category_name" required="required"  placeholder="Category Name">
					  <errormessage> <?=(form_error('category_name'))?form_error('category_name'):""?> </errormessage>
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
					
					 <div class="micro-pos-group">
                      <label for="note" class="col-sm-4 control-label">Note</label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="note" class="form-control note"    placeholder="note">
					  <errormessage> <?=(form_error('note'))?form_error('note'):""?> </errormessage>
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
					<h3 class="box-title"> All Product Category list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="product_category_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
								<th>Category Name</th>
								<th>Note</th>
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
  
   $('#product_category_info_table').DataTable( {
       ajax: base_url+"Setting/ajax-product-category-info",
        columns: [
            { data: "SL" },			 			   
            { data: "category_name" },            
			{ data: "note" },  
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
     var category_name = selected_row.find('td:nth-child(2)').html(); 
	 var note = selected_row.find('td:nth-child(3)').html(); 
	 var status = selected_row.find('td:nth-child(4)').html(); 
     status=(status=="Active")?1:0;
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
       
	$("#medium_editor_modal_title").html("Edit Product Category information ");
	$("#medium_editor_modal_submit").attr('onClick','updateCategory('+id+',2,3,4)');
	$("#medium_editor_modal_body").html($(".product_category_info_info_col_1").html()); 
	$("#medium_editor_modal_body").find(".category_name").val(category_name); 
	$("#medium_editor_modal_body").find(".note").val(note); 
	$("#medium_editor_modal_body").find('select.status option[value="'+status+'"]').prop("selected", true);
 
  
  $('#medium_editor_modal').modal('show');
  
  $(".modal_red_message").html("");
	
}

function updateCategory(id,td_1,td_2,td_3)
{
	
	 var table = $('#product_category_info_table').DataTable();
	$(".modal_red_message").html("");
	var category_name=$("#medium_editor_modal_body").find(".category_name").val(); 
	var note=$("#medium_editor_modal_body").find(".note").val(); 
	var status=$("#medium_editor_modal_body").find(".status").val(); 
	//category_name=category_name.replace(/ /g,'');
	if(category_name=="")
	{
		$(".modal_red_message").html("Category name is required !");
	return false;	
	}
	
	$.post(
	base_url+"Setting/ajax-update-product-category-info",
	{
	id:id,
	category_name:category_name,
	note:note,
	status:status,
	},
	function(result){
		if(result=="done")
		{
		 $("#medium_editor_modal_body").html("<h4 style='color:green;text-align: center;'>Succefully update this data.</h4>");
			
			table.$('tr.selected').find('td:nth-child('+td_1+')').html(category_name);
			table.$('tr.selected').find('td:nth-child('+td_2+')').html(note);
				table.$('tr.selected').find('td:nth-child('+td_3+')').html((status=="1")?'Active':'Inactive');
			table.$('tr.selected').removeClass('selected');				
			dealyModal('medium_editor_modal','hide');
		}else{
			$(".modal_red_message").html("Category information update failed !");
		}
		
	});
	
	
	
	
}
 
 
 
  
    </script>

			


