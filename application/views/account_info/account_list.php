 
  
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"><span style="float:left"> <b class="green_color">Activated </b> Account's list  </span>
 
					
					</h3>
				 

					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
			<table id="account_list_table" class="table table-striped table-bordered responsive nowrap responsive_table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
							<th>SL</th>
						   <th>Account Number</th>                           
							<th class="reshide">English Name</th> 
							<th>Area Name</th>
							<th>Society Name</th>							
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
    $('#account_list_table').DataTable( {
        "processing": true,
        "serverSide": true,
		
        "ajax": {
			 scriptCharset: "utf-8",
            "url": base_url+"account-information/account-list-get?area_code='<?=$area_code?>'",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },
            { "data": "account_number" },          
            { "data": "name" }, 
            { "data": "area_name" },
			{ "data": "society_name" },
			{ "data": "village_name" },
			{ "data": "mob" },
		//	{ "data": "status" },
			{ data: null, render: function ( data, type, row ) {   
				var account_number=(data.account_number)?data.account_number:0;
				//var acc_update_link=base_url+"account-information/update-account?id="+account_number;
				//<a href="'+acc_update_link+'" target="_blank" rel="'+account_number+'" class="action_button action_button_edit">Edit</a>
					var acc_view_link=base_url+"account-information/account-view?id="+account_number;
				var button_list='<a href="'+acc_view_link+'" target="_blank" rel="'+account_number+'" class="action_button action_button_view">View</a> <a  rel="'+account_number+'" class="action_button action_button_delete " style="width:80px">Deactivate</a>';
				 
				
                return (data.account_number)?button_list:"";
            } },
        ]
    } );
} );
	
 
	
 

	
$(document).on("click",".action_button_delete",function(){
	  var user_id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Account Inactive Confirmation',
			'message'	: 'You are about to inActive this account. <br />  <b style="color:red"> Are you sure  ?</b>',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){
						
						 var table = $('#account_list_table').DataTable();
							if (rows.hasClass('selected')) {
								rows.removeClass('selected');
							}
							else {
								table.$('tr.selected').removeClass('selected');
								rows.addClass('selected');
							}
												
						
						 $.post(base_url+"account-information/update-account-status",{id:user_id,status:0},function(view){
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
 