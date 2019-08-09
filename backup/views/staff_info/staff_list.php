 
  
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> Staff's list </h3>
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
						   <th class="reshide" >Bangla Name</th>                           
							<th >English Name</th>  						
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
  var distribute_url= base_url+"staff-information/staff-distribution?id=";
  var print_url= base_url+"staff-information/staff-distribution-pdf-print?id=";
	
    $('#user_list_table').DataTable( {
        "processing": true,
        "serverSide": true,
		
        "ajax": {
			 scriptCharset: "utf-8",
            "url": base_url+"staff-information/staff-list-get",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },
			{ "data": "username" },
            { "data": "bangla_name" },          
            { "data": "name" },   
		//	{ "data": "fathers_name" },   			
			{ "data": "present_village" }, 
			{ "data": "mob" },
	 
			{ data: null, render: function ( data, type, row ) {   
				var id=(data.user_id)?data.user_id:0;
				var color_cls=(data.working_day)?"green_bg_color action_button_big":"gray_bg_color action_button_big";
				var action_get_url=distribute_url+id;
				
				var view_list=(data.working_day)?'<a href="'+print_url+id+'" target="_blank" rel="'+id+'"  class="gray_bg_color action_button_big">Print</a>':"";
				
				var button_list='<a href="'+action_get_url+'" target="_blank" rel="'+id+'"  class="'+color_cls+'">Distribution</a>'+view_list;
				
			
				
                return (data.user_id)?button_list:"";
            } },
        ]
    } );

 
} );
 
  
   

</script>
 