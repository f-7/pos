   
 
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
		<form action="" id="brand_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 brand_info_col_1">                  
				  		<div class="micro-pos-group">
                      <label for="Area" class="col-sm-4 control-label">Category Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					   <select class="form-control category_id" required="required" name="category_id">
					   <option value=""> Select Category</option>
                          <?php 
							   foreach($product_category as $key)
							   {
							   ?>
								 <option   value="<?=$key->id?>" <?=((set_value('category_name')?set_value('category_name'):"")==$key->category_name)?'selected':''?>> <?=$key->category_name?></option>                         
								 
							   <?php } ?>					 
                      </select>
					  <errormessage> <?=(form_error('category_id'))?form_error('category_id'):""?> </errormessage>
                      </div>
					  
                    </div>		  
				      
				 			  
				    <div class="micro-pos-group">
                      <label for="Area" class="col-sm-4 control-label">Brand Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="brand_name" class="form-control brand_name" required="required"  placeholder="Brand Name">
					  <errormessage> <?=(form_error('brand_name'))?form_error('brand_name'):""?> </errormessage>
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
                      <button type="submit" class="btn btn-primary datasubmitButton">Submit</button>
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
					<h3 class="box-title"> All Brand list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		 
			<table id="brand_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							 <th>SL</th> 
							 	<th>Category Name</th>
								<th>Brand Name</th>
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
  
   $('#brand_info_table').DataTable( {
       ajax: base_url+"Setting/ajax-brand-info",
        columns: [
            { data: "SL" },
			{ data: "category_name" },     			
            { data: "brand_name" },            
			{ data: "note" },  
			{ data: "status" },  
			{ data: null, render: function ( data, type, row ) {   
				
                return (data.DT_RowId)?"<a onclick='eidtBrand("+data.DT_RowId+","+data.category_id+","+data.status_id+",this)' class='action_button action_button_edit'>Edit</a>":"";
            } },
        ],
    } );

 
} );
 
 
  
 function eidtBrand(id,category_id,status_id,obj)
{
	
    $(obj).parents('tbody').find('tr').removeClass('selected');
	var selected_row=$(obj).closest('tr');    
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
 
     var brand_name = selected_row.find('td:nth-child(3)').html(); 
	 var note = selected_row.find('td:nth-child(4)').html(); 
	 
  
    $(".brand_name").val(brand_name);
	$(".note").val(note);	
	$('.category_id option[value='+category_id+']').attr('selected','selected');
	$('.status option[value='+status_id+']').attr('selected','selected');
	 
	$(".datasubmitButton").html("Update");
	$(".datasubmitButton").attr("type","button");
	$(".datasubmitButton").addClass("updateBrand");
	$(".datasubmitButton").attr("rel",id);
	$('html, body').animate({scrollTop: '0px'}, 500);
  $('form').attr('onsubmit', 'return false');
 
}


$(document).on("click",".updateBrand",function(){
	
	$(".show-message-titile-box").html("");
	var category_id= $(".category_id").val();
	var brand_name= $(".brand_name").val();
	var note= $(".note").val();
	var status= $(".status").val();
  
var id=$(".datasubmitButton").attr("rel");
	
//brand_name=brand_name.replace(/ /g,'');
if(brand_name=="")
{
	$(".show-message-titile-box").html("<b style='color:red'>Please brand name is required ! </b>");
return false;	
}



	 var table = $('#brand_info_table').DataTable();
	
	$.post(base_url+"setting/ajax-update-brand-info",{
		category_id:category_id,
		brand_name:brand_name,
		note:note,
		status:status, 
		id:id	
	},function(result){
	//	alert(result);
		if(result=="done"){
			
			table.$('tr.selected').find('td:nth-child(2)').html($(".category_id option:selected").text());
			table.$('tr.selected').find('td:nth-child(3)').html(brand_name);
			table.$('tr.selected').find('td:nth-child(4)').html(note);
			table.$('tr.selected').find('td:nth-child(5)').html($(".status option:selected").text());
			 
			table.$('tr.selected').removeClass('selected');				
			$(".category_id").val("");
			$(".brand_name").val("");
			$(".note").val("");
			$(".status").val("");
			$(".datasubmitButton").attr("type","submit");
			$(".datasubmitButton").html("submit");
			$(".datasubmitButton").removeClass("updateBrand");
			$('form').removeAttr('onsubmit');
			$(".extra_cls").css("display","block");
  
		
			$(".show-message-titile-box").html("<b style='color:green'>Succefully update this data </b>");
			setTimeout(function(){ $(".show-message-titile-box").html(""); }, 3000);
			
		}else{
			$(".show-message-titile-box").html("<b style='color:red'>Updated Failed ! </b>");
			
		}
		
		
	})
	
	
	
	
});
 



 
 
 
  
    </script>

			


