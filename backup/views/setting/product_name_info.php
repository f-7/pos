   
 
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
				 <div class="col-md-6 product_category_info_info_col_1" style="border-right: 1px solid #ccc;">                  
				  				  
				      
					  
					  <div class="micro-pos-group">
                      <label for="category name" class="col-sm-4 control-label">Category Name <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					   <select class="form-control category_name" required="required" name="category_name">
					    <option value=""> Select Category</option>
                          <?php 
							   foreach($product_category as $key)
							   {
							   ?>
								 <option   value="<?=$key->id?>" <?=((set_value('category_name')?set_value('category_name'):"")==$key->category_name)?'selected':''?>> <?=$key->category_name?></option>                         
								 
							   <?php } ?>					 
                      </select>
					 <errormessage> <?=(form_error('category_name'))?form_error('category_name'):""?> </errormessage>
                      </div>
                    </div>
					  <div class="micro-pos-group">
                      <label for="brand name" class="col-sm-4 control-label">Brand Name <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					   <select class="form-control brand_name" required="required" name="brand_name">
					    <option value=""> Select Brand</option>
                         <?php 
							   foreach($brand as $key)
								{
							   ?>
								 <option class="cat_band_<?=$key->category_id?> option_hide"  value="<?=$key->id?>" <?=((set_value('brand_name')?set_value('brand_name'):"")==$key->brand_name)?'selected':''?>> <?=$key->brand_name?></option>                         
								 
							   <?php } ?>						 
                      </select>
					 <errormessage> <?=(form_error('brand_name'))?form_error('brand_name'):""?> </errormessage>
                      </div>
                    </div>
					
					
					  <div class="micro-pos-group">
                      <label for="product name" class="col-sm-4 control-label">Product Name <frz>*</frz></label>
                      <div class="col-sm-8">
                     
					  	<input type="text" name="product_name" class="form-control product_name" required="required" placeholder="Product Name">
					 <errormessage> <?=(form_error('product_name'))?form_error('product_name'):""?> </errormessage>
                      </div>
                    </div>
					
					 
					 <div class="micro-pos-group">
                      <button type="submit" class="btn btn-primary datasubmitButton">Submit</button>
                    </div>
					 
					  
					 
                   
                </div>
				
				
				 <div class="col-md-6">  
				 		
						<table style=" width: 100%;">
							<thead>
								<tr>
									<th> Product color <frz>*</frz> </th>
									<th style="padding-left: 10px;"> Product size <frz>*</frz> </th>
								</tr>
							</thead>
							
								<tbody class="product_name_list">
									<tr>
										<td class="product_size_td">
											 <select class="form-control color" required="required" name="color[]">
											 
												 <?=OOP::selectOptionList(OOP::getColor(),1)?>		
											</select>
											
										</td>
										<td class="product_name_td">
										<input type="text" name="size[]" class="form-control size" placeholder="Product size" required="required">
										</td>
										<td class="product_name_td_seond"> 
											<a class="action_button action_button_edit add_more extra_cls">Add More</a>
										</td>
									</tr>
								</tbody>
						</table>						
				   
                </div>
					 
				 
				
			 
				
			   </form>
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div> 

 

 


<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> All Product Name list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="product_name_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
								<th>Category Name</th>
								<th>Brand Name</th>
								<th>Product Name</th>
								<th>Color</th>
							  <th>Size</th>                           
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
 
  $(document).on("change",".category_name",function(){
	  
	  var category_id=$(this).val();
	 
  $('select.brand_name').find('option').addClass('option_hide');
	 $('select.brand_name').find('option.cat_band_'+category_id).removeClass('option_hide'); 
	 
	  
  });
 
 				  			  
 
 
 //product_name_list
 $(document).on("click",".add_more",function(){
	 
	 var td_info=$(this).parents('tr').html();
	$(this).html("Delete");	 
	$(this).addClass("delete_more");
	$(this).addClass("red_bg_color");	
	$(this).removeClass("extra_cls");	
	$(this).removeClass("add_more");	 
	 $(this).parents('tbody').append("<tr>"+td_info+"</tr>");
	 
 });
 
  $(document).on("click",".delete_more",function(){
	  
	  $(this).parents('tr').remove();
  });
 
$(document).ready(function() {
    $('#product_name_info_table').DataTable( {
        "processing": true,
        "serverSide": true,
		
        "ajax": {
			 scriptCharset: "utf-8",
            "url": base_url+"setting/product-name-info-list",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },
            { "data": "category_name" },          
            { "data": "brand_name" }, 
            { "data": "product_name" },
			{ "data": "color" },
			{ "data": "size" },
			 
			{ data: null, render: function ( data, type, row ) {   
				var id=(data.DT_RowId)?data.DT_RowId:0;
			 	 
				 var editButton=(data.product_name)?"<a onclick='eidtProduct("+id+","+data.category_id+","+data.brand_id+","+data.product_name_id+","+data.color_id+","+data.size+",this)' class='action_button action_button_edit'>Edit</a>":"";
				  var deleteButton='<a   rel="'+id+'" class="action_button action_button_delete ">Delete</a>'; 
				var button_list=editButton+" "+deleteButton;
                return (data.product_name)?button_list:"";
            } },
        ]
    } );
} );
	
 
	
	
	
	
	
$(document).on("click",".updateProduct",function(){
	
	$(".show-message-titile-box").html("");
	var category_id= $(".category_name").val();
	var brand_id= $(".brand_name").val();
	var product_name= $(".product_name").val();
	var color= $(".color").val();
	var size= $(".size").val();
  
var id=$(".datasubmitButton").attr("rel");
	
//product_name=product_name.replace(/ /g,'');
if(product_name=="")
{
	$(".show-message-titile-box").html("<b style='color:red'>Please Product name is required ! </b>");
return false;	
}



	 var table = $('#product_name_info_table').DataTable();
	
	$.post(base_url+"setting/ajax-update-product-datails",{
		category_id:category_id,
		brand_id:brand_id,
		product_name:product_name,
		color:color,
		size:size,
		id:id	
	},function(result){
	//	alert(result);
		if(result=="done"){
			
			table.$('tr.selected').find('td:nth-child(2)').html($(".category_name option:selected").text());
			table.$('tr.selected').find('td:nth-child(3)').html($(".brand_name option:selected").text());
			table.$('tr.selected').find('td:nth-child(4)').html(product_name);
			table.$('tr.selected').find('td:nth-child(5)').html($(".color option:selected").text());
			table.$('tr.selected').find('td:nth-child(6)').html(size);
			table.$('tr.selected').removeClass('selected');				
			$(".product_name").val("");
			$(".size").val("");
			$(".datasubmitButton").attr("type","submit");
			$(".datasubmitButton").html("submit");
			$(".datasubmitButton").removeClass("updateProduct");
			  $('form').removeAttr('onsubmit');
			   $(".extra_cls").css("display","block");
  
		
			$(".show-message-titile-box").html("<b style='color:green'>Succefully update this data </b>");
			setTimeout(function(){ $(".show-message-titile-box").html(""); }, 3000);
			
		}else{
			$(".show-message-titile-box").html("<b style='color:red'>Updated Failed ! </b>");
			
		}
		
		
	})
	
	
	
	
});
 


function eidtProduct(id,category_id,brand_id,product_name_id,color_id,size,obj)
{

	$(obj).parents('tbody').find('tr').removeClass('selected');
	var selected_row=$(obj).closest('tr');    
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
	
	 var product_name = selected_row.find('td:nth-child(4)').html();  
	 
	$(".product_name").val(product_name);
	$(".size").val(size);
	
	$('.category_name option[value='+category_id+']').attr('selected','selected');
	$('.brand_name option[value='+brand_id+']').attr('selected','selected');
	$('.color option[value='+color_id+']').attr('selected','selected');  
	$(".datasubmitButton").html("Update");
	$(".datasubmitButton").attr("type","button");
	$(".datasubmitButton").addClass("updateProduct");
	$(".datasubmitButton").attr("rel",id);
	$('html, body').animate({scrollTop: '0px'}, 500);
  $('form').attr('onsubmit', 'return false');
 $(".extra_cls").css("display","none");
  
	
}

   
 
	
$(document).on("click",".action_button_delete",function(){
	  var id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Product Delete Confirmation',
			'message'	: 'If you buy or sell this product, please don\'t delete it. <br> You are about this product. <br />  <b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#product_name_info_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"setting/product-update-status",{id:id,status:0},function(view){
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
  
 
  
    </script>

			


