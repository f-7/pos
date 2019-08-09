<div class="row">

	<div class="col-md-12">

	<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> Daily collection list</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			<div class="box-body">
 			 <form target="_blank" class="form-horizontal" method="post" action="">

 			 	<div class="col-sm-3">
	             	<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Report type</label>
	                      <div class="col-sm-8">
	                        <select class="form-control" name="report_type"  id="report_type" required="true">		                        	
		                        	<option value="daily"> Daily Collection Schedule </option>
		                        	<option value="monthly"> Monthly Collection Schedule </option>
		                        	<option value="yearly"> Yearly Collection Schedule </option>
		                        	<option value="overdue"> Overdue Collection Schedule </option>
		                        	 
		                        </select>
	                      </div>
	                    </div>
	             </div> 
	
				<div class="col-sm-2">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Collection date</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="collection_date" name="collection_date" required="true" value="<?php echo $collection_date;?>">
	                      </div>
	                    </div>
	             </div>      

	             <div class="col-sm-2">
	             	<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Area</label>
	                      <div class="col-sm-8">
	                       <select class="form-control" name="area"  id="area" required="true">

	                       		<option value="all"> All area </option>
		                        	 <?php  foreach($area_list as $d){?>

		                        	 	<option <?php echo $d->area_code==$area? "selected":"" ?> value="<?php echo $d->area_code;?>"><?php echo $d->area_name;?> </option>
		                        	 <?php } ?>
		                        </select>
	                      </div>
	                    </div>
	             </div> 

	             <div class="col-sm-3">
	             	<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Society</label>
	                      <div class="col-sm-8">
	                        <select class="form-control" name="society"  id="society" required="true">
		                        	<option value="all"> All society </option>
		                        	 <?php  foreach($society_list as $d){?>

		                        	 	<option <?php echo $d->society_code==$society? "selected":"" ?> class="all <?php echo $d->area_code;?>" value="<?php echo $d->society_code;?>"><?php echo $d->society_name;?> </option>
		                        	 <?php } ?>
		                        </select>
	                      </div>
	                    </div>
	             </div> 


	             <div class="col-sm-2">
	             	<input class="primari btn" type="submit" name="Search" value="Print report">
	             </div> 
	          </form>   

	         </div>
	</div>    

	</div>         

</div>


<script type="text/javascript">
	
	$("#collection_date").datepicker({ dateFormat: 'dd-mm-yy' });

	$(document).on('change',"#area",function(){

		$(".all").hide();
		var area = $(this).val();

		$("."+area).show();
	})


</script>