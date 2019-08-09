
 
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
<form action="" id="society_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">
				 <div class="col-md-6 society_info_col_1">                  
				  				  
				     <div class="micro-pos-group">
                      <label for="Division" class="col-sm-4 control-label">Area Name <frz>*</frz></label>
                      <div class="col-sm-8">
                      
					   <select class="form-control area_code" required="required" name="area_code" >
					    <option value="">Select </option>
					   <?= OOP::selectOptionList(OOP::getArray($area_list, 'area_code','area_name'));?>
                         				
                      </select>
					     <errormessage> <?=(form_error('area_code'))?form_error('area_code'):""?> </errormessage>
                      </div>
                    </div>				
                
				 			  
				    <div class="micro-pos-group">
                      <label for="society code" class="col-sm-4 control-label">Society Code <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="society_code" class="form-control society_code" required="required"  placeholder="society code" readonly>
					  <errormessage> <?=(form_error('society_code'))?form_error('society_code'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					 <div class="micro-pos-group society_name_div">
                      <label for="Society Name" class="col-sm-4 control-label">Society Name <frz>*</frz></label>
                      <div class="col-sm-8">
                       
					  <input type="text" name="society_name" class="form-control society_name" required="required"  placeholder="Society Name">
					  <errormessage> <?=(form_error('society_name'))?form_error('society_name'):""?> </errormessage>
                      </div>
					  
                    </div>
					
					<div class="micro-pos-group">
						  <label for="Submit" class="col-sm-4 control-label"></label>
						   <div class="col-sm-8">
						  <button type="submit" class="btn btn-primary datasubmitButton">Submit</button>
						</div>
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
					<h3 class="box-title"> All Society list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
			<table id="society_info_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							<th>SL</th>
						    <th> Area Code</th>
                            <th>Society Code</th>
							<th>Society Name</th>    
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
  
  $('#society_info_table').DataTable( {
       ajax: base_url+"Setting/ajax-society-info",
	   columns: [
			 { data: "SL" },
			 { data: "area_code" },           
            { data: "society_code" },
			{ data: "society_name" },
			{ data: null, render: function ( data, type, row ) {                
                return (data.status==0)?'Inactive':"Active";
            } },
          
			{ data: null, render: function ( data, type, row ) {     
			 	return (data.society_code)?"<a onclick='eidtSociety("+data.society_id+",this)' class='action_button action_button_edit'>Edit</a>":"";
     
            } },			
          
        ]
       
    } );

 
} );
 
 
 //society_info_col_1
 
 
  
 function eidtSociety(id,obj)
{
	$(obj).parents('tbody').find('tr').removeClass('selected');
	 var selected_row=$(obj).closest('tr'); 
	 var society_name = selected_row.find('td:nth-child(4)').html();  
	 var area_code=selected_row.find('td:nth-child(2)').html(); 
	 var society_code=selected_row.find('td:nth-child(3)').html(); 
	 
	 selected_row.removeClass('selected');
     selected_row.addClass('selected');
	 
   area_code=area_code.replace(/ /g,'');   
   area_code= area_code.replace(/^0+(?!\.|$)/, '');
  area_code=formate_three_digit(area_code);
 
 
	$("select.area_code").val(area_code);
 
	$(".society_code").val(society_code);
	$(".society_name").val(society_name);
	 
	$(".datasubmitButton").html("Update");
	$(".datasubmitButton").attr("type","button");
	$(".datasubmitButton").addClass("updateSociety");
	$(".datasubmitButton").attr("rel",id);
   $('html, body').animate({scrollTop: '0px'}, 500);
   $('form').attr('onsubmit', 'return false');
 
 
	
}


$(document).on("click",".updateSociety",function(){
	
	$(".show-message-titile-box").html("");
	
	var area_code= formate_three_digit($(".area_code").val());
	var society_code= formate_five_digit($(".society_code").val()); 
	var society_name= $(".society_name").val(); 
  
var id=$(".datasubmitButton").attr("rel");
	 
if(society_name=="")
{
	$(".show-message-titile-box").html("<b style='color:red'>Please society name is required ! </b>");
return false;	
}



	 var table = $('#society_info_table').DataTable();
	
	$.post(base_url+"setting/update-society-info",{
		id:id,
		area_code:area_code,
		society_code:society_code,
		society_name:society_name
	},function(result){
	//	alert(result);
		if(result=="done"){
			
			table.$('tr.selected').find('td:nth-child(2)').html(area_code);
			table.$('tr.selected').find('td:nth-child(3)').html(society_code);
			table.$('tr.selected').find('td:nth-child(4)').html(society_name); 
			table.$('tr.selected').removeClass('selected');		
		
			 $('.area_code').prop('selectedIndex',0);
		 
			 $(".society_code").val("");
			 
			$(".society_name").val("");
			$(".datasubmitButton").attr("type","submit");
			$(".datasubmitButton").html("submit");
			$(".datasubmitButton").removeClass("updateSociety");
			  $('form').removeAttr('onsubmit');
		
			$(".show-message-titile-box").html("<b style='color:green'>Succefully update this data </b>");
			setTimeout(function(){ $(".show-message-titile-box").html(""); }, 8000);
			
		}else{
			$(".show-message-titile-box").html("<b style='color:red'>Updated Failed ! </b>");
			
		}
		
		
	})
	
	
	
	
});


 
 
 
 
  
 /*
$(document).ready(function(){
	  var area_code= $(".area_code").val(); 
	  setGetSocietyCode(area_code);
});
*/
$(document).on('change', '.area_code', function() {		
	  var area_code= $(this).val(); 
	  setGetSocietyCode(area_code);
});

 function setGetSocietyCode(area_code)
 {	 
	 $.post(base_url+"setting/get_society_code",{area_code:area_code},function(view){
		 if(view)
		 {
			  $('.society_code').val(view); 
		 }else{
			 alert("Society code not found !.");
		 }
	 });
	 
 
 }
	 
    </script>

			


