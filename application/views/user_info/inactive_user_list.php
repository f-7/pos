 
  
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> User's list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
			<table id="user_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							<th>SL</th>
							<th>User Name</th>
						   <th>Bangla Name</th>                           
							<th class="reshide">English Name</th> 							
							<th class="reshide">Fathers Name</th>							
							<th class="reshide">Village Name</th>
							<th class="reshide">Mobile No</th>	 						
                            <th >Action</th>
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
  
	
    $('#user_list_table').DataTable( {
        "processing": true,
        "serverSide": true,
		
        "ajax": {
			 scriptCharset: "utf-8",
            "url": base_url+"user-information/inactive-user-list-get",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },
			{ "data": "username" },
            { "data": "bangla_name" },          
            { "data": "name" },   
			{ "data": "fathers_name" },   			
			{ "data": "present_village" }, 
			{ "data": "mob" },
	 
			{ data: null, render: function ( data, type, row ) {   
				var id=(data.user_id)?data.user_id:0;
				if(data.currrent_user_type==1){
				var button_list='<a  rel="'+id+'" onclick="viewUser('+data.user_id+',this)"  class="action_button action_button_view">View</a><a  rel="'+id+'" class="action_button action_button_edit">Active</a>';
				}else{
					var button_list='<a  rel="'+id+'" onclick="viewUser('+data.user_id+',this)" class="action_button action_button_view">View</a>';
				}
				
                return (data.user_id)?button_list:"";
            } },
        ]
    } );

 
} );
 
 
function viewUser(id,obj)
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
  
 
 $(document).on("click",".action_button_edit",function(){
	  var user_id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to Active this User.   <br> <b style="color:green"> Continue ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#user_list_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"user-information/update-user-status",{id:user_id,status:1},function(view){
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
 