
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"><span style="float:left"> <b class="green_color">Expenditure </b> pending  list  </span>
 
					
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
							<th >Date</th> 
							<th>Expenditure Name</th>   							
							<th>Amount</th>
							<th>Seller</th>	 
							<th>Purchaser</th>  						
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
    $('#account_list_table').DataTable( {
        "processing": true,
        "serverSide": true,
		
        "ajax": {
			 scriptCharset: "utf-8",
            "url": base_url+"expenditure/expenditure-pending-list-get",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },                 
            { "data": "buy_date" },  
			{ "data": "expenditure_name" },    
			{ "data": "amount" }, 
			{ "data": "seller" },
			{ "data": "purchaser" },
		 	{ data: null, render: function ( data, type, row ) {   
				var id=data.DT_RowId;
			      var acc_update_link=base_url+"expenditure/expenditure-update?id="+id;
				
					var acc_view_link=base_url+"expenditure/expenditure-view?id="+id;
				var button_list='<a target="_blank" rel="'+id+'" class="action_button action_button_view">View</a> <a  target="_blank" rel="'+id+'" style="width:80px; background:#337ab7;color:white" class="action_button  action_button_approve">Approve</a> <a  rel="'+id+'" class="action_button action_button_delete " style="width:80px">Cancel</a>';
				 
				
                return (id)?button_list:"";
            } },
		    ]
    } );
} );
	
 $(document).on("click",".action_button_view",function(){
	  var id=$(this).attr('rel');
		$.post(base_url+'expenditure/ajax-expenditure-details',{id:id},function(view){
			 $('#expenditure_modal').find(".modal-dialog").css('width','80%');
			$("#expenditure_modal_body").html(view);
			 $('#expenditure_modal').modal('show');
		});
	  
	    
	  
 });	  
	
 
 
 

	
$(document).on("click",".action_button_delete",function(){
	  var id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Expenditure cancel confirmation',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
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
												
						
						 $.post(base_url+"expenditure/expenditure-cancel",{id:id},function(view){
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
 
 

$(document).on("click",".action_button_approve",function(){
	  var id=$(this).attr('rel');	  
	  var  rows = $(this).closest("tr");
	  
	 	$.confirm({
			'title'		: 'Expenditure approve confirmation',
			'message'	: '<b style="color:red"> Are you sure  ?</b>',
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
												
						
						 $.post(base_url+"expenditure/expenditure-approve",{id:id},function(view){
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
 