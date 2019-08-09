 
  
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"><span style="float:left"> <b class="green_color">Available </b> Product list  </span>
					
  
					</h3>
				 

					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
			<table id="product_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							<th>SL</th>
							<th  class="reshide">Entry Date</th>
							<th>Invoice Number </th>							
						   <th class="reshide">Category Name</th>                           
							<th class="reshide">Brand Name </th> 
							<th>Product Name</th>
							<th  class="reshide" >Color</th>							
							<th  class="reshide">Size</th>	 	
							<th >Unit Pricce</th> 
							<th >Buy Unit Price</th> 
							<!-- <th class="reshide">Status</th>	 						-->
                            <th  class="reshide">Action</th>
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
    $('#product_list_table').DataTable( {
        "processing": true,
        "serverSide": true,
		
        "ajax": {
			 scriptCharset: "utf-8",
            "url": base_url+"stock/get-product-list",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },
				{"data":"created_date"},
					{"data":"invoice_number"},
            { "data": "category_name" },          
            { "data": "brand_name" }, 
            { "data": "product_name" },
			{ "data": "color" },
			{ "data": "size" },
			{ "data": "unit_price" },
			{ "data": "buy_unit_price" },
		 //	{ "data": "status" },
			{ data: null, render: function ( data, type, row ) { 
			
			var user_update_link=base_url+"stock/edit-stock-product?id="+data.DT_RowId;
			
			var view_button='<a rel="'+data.DT_RowId+'" data="'+data.product_name+'" class="action_button action_button_view">View</a>';
			var edit_button='<a href="'+user_update_link+'"   target="_blank"   class="action_button action_button_edit">Edit</a>';
			var deelte_button=(data.delete_oparation=='true')?'<a rel="'+data.DT_RowId+'" class="action_button action_button_delete">Delete</a>':"";
			var button_list=view_button+edit_button+deelte_button;
				
                return (data.product_name)?button_list:"";
            } },
			 
        ]
    } );
} );
	
 
	
 

	
$(document).on("click",".action_button_delete",function(){
	  var stock_id=$(this).attr('rel');	 
	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Product Delete Confirmation',
			'message'	: 'You are about to delete this product. <br />  <b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#product_list_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"stock/delete-product-list",{id:stock_id,status:0},function(view){
							 		if(view=="done")
									{
										table.row('.selected').remove().draw( false );
									}										
						 });
						 
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	 
 }); 
  


$(document).on("click",".action_button_view",function(){
	  var stock_id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	   var product_name=$(this).attr('data');	
	  
$('#loader_modal_box').modal('show');
var url=base_url+"stock/view-stock-product-list";	

$.post(url,{id:stock_id},function(view){
	$('#loader_modal_box').modal('hide');
	if(view)
	{
		$("#large_view_modal_title").html("<b> "+product_name+" </b> details information ");
		
		$("#large_view_modal").find("#large_view_modal_body").html(view);
		$('#large_view_modal').modal('show');
		
	}else{
		setTimeout(function(){ alert("This product details is not available!"); }, 3000);
		 
	}
	
});

	  
  
	  
	  
	  
	  
	  
	  
	  
	  
	  
});	  

	  /*
{

  
  $('#loader_modal_box').modal('show');
  
  $.ajax({ 
    type: 'POST', 
    url: base_url+"user-information/show-user-info",
    data: { id:id }, 
    dataType: 'json',
    success: function (data) { 
        $.each(data, function(index, element) {
 
			if(index=="member_photo"){
				$("#user_view_modal_body").find('.'+index).attr("src",base_url+'documents/photo/'+element);		
			}
			else if(index=="member_signature"){
				$("#user_view_modal_body").find('.'+index).attr("src",base_url+'documents/signature/'+element);
			}			 
			else{
				$("#user_view_modal_body").find('.'+index).html(element);
			}
        });
		
		//current_date
		 $('#loader_modal_box').modal('hide');
		$('#user_view_modal').modal('show');
    }
});
  
  
 
  
	
}
*/

</script>
 