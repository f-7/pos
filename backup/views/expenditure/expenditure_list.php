 
  
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"><span style="float:left"> <b class="green_color">Expenditure </b>  list  </span>
 
					
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
							<th class="reshide">Period</th>	
							<th>Expenditure Name</th>   							
							<th>Amount</th>
							<th class="reshide">Seller</th>	 
							<th class="reshide">Purchaser</th>  						
                            <th >Status</th>
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
            "url": base_url+"expenditure/expenditure-list-get",
            "type": "POST",
			"dataType": "json",
        },
        "columns": [
            { "data": "SL" },                 
            { "data": "buy_date" }, 
            { "data": "period" },
			{ "data": "expenditure_name" },    
			{ "data": "amount" },
			{ "data": "seller" },
			{ "data": "purchaser" },
		 	{ "data": "status" },
		    ]
    } );
} );
	
 
	
 
 

</script>
 