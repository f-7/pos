<div class="row">
	
	<div class="col-md-12">
		

		<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Loan distribution Form</h3>
                  <a style="display: none" class="pull-right btn btn-primary" href="javascript:;" id="prv_history">View previous loan history</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="">
                  <div class="box-body">
                  	<div class="col-sm-12">
	                  	<div class="form-group has-success">
	                  		<?php  echo validation_errors(); ?>
	                        <?=  $this->session->flashdata('msg') ;?> 
	                 	</div>

	                 	
	                </div>

                  

<!-- issue_date account_number loan_amount deposit_amount installment_type installment_amount installment_duration status remark created_dateapproval -->
                  	<div class="col-sm-6">
                  	
                  		<div class="form-group">
	                      <label for="account_number" class="col-sm-4 control-label">Account No</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="account_number" name="account_number" required="true">
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="name" class="col-sm-4 control-label">Name</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="name" required="true">
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="fname" class="col-sm-4 control-label">Father's / Husband</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="fname" required="true">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="fname" class="col-sm-4 control-label">Address</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="address" >
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="area_name" class="col-sm-4 control-label">Area Name</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="area_name" >
	                      </div>
	                    </div>	
	                    <div class="form-group">
	                      <label for="society_name" class="col-sm-4 control-label">Society Name</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="society_name" >
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="ref_id" class="col-sm-4 control-label">Loan Collection day</label>
	                       <div class="col-sm-8">
		                      	<select class="form-control" name="collection_day" readonly="true" id="collection_day" required="true">
		                        	 <?php echo $working_day;?>
		                        </select>
	                    	</div>
	                    </div>		


                  	</div>
                  	
                  	<div class="col-sm-6">
                  		
                  		<div class="form-group">
	                      <label for="issue_date" class="col-sm-4 control-label">Loan Issue date</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="issue_date" name="issue_date" value="<?php echo date('d-m-Y');?>"  required="true">
	                      </div>
	                    </div>	

	                     <div class="form-group">
	                      <label for="loan_amount" class="col-sm-4 control-label">Total amount of Loan</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="loan_amount" name="loan_amount" required="true">
	                      </div>
	                    </div>	


	                     <div class="form-group">
	                      <label for="installment_type" class="col-sm-4 control-label">Installment type</label>
	                      <div class="col-sm-8">
	                        
	                        <select class="form-control" name="installment_type" id="installment_type" required="true">
	                        	<?php echo $installment_type;?>
	                        </select>
	                      </div>
	                    </div>

	              <!--      <div class="form-group">
	                      <label for="installment_duration" class="col-sm-4 control-label">Installment duration</label>
	                      <div class="col-sm-8">
	                        
	                        <select class="form-control" name="installment_duration" id="installment_duration">
	                        	<?php //echo $installment_duration;?>
	                        </select>
	                      </div>
	                    </div> -->


		                
	                     <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Number of Istallment </label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" name='num_of_installment' id="num_of_installment" required="true">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Amount of Istallment </label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" name='installment_amount' id="installment_amount" required="true">
	                      </div>
	                    </div>


	                    <div class="form-group">
	                      <label for="deposit_amount" class="col-sm-4 control-label">Amount of Deposit</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="deposit_amount" name="deposit_amount" >
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="deposit_amount" class="col-sm-4 control-label">Primery Deposit Amount</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="primery_deposit_amount" name="primery_deposit_amount" >
	                      </div>
	                    </div>

	                   

	                   

	                    


                  	</div>

                    



                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   
                    <button type="submit" class="btn btn-info pull-right">Save Loan distribution</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->


	</div>
</div>


<script type="text/javascript">
	
	$("#issue_date").datepicker({ dateFormat: 'dd-mm-yy' });




	$(".account_number").select2({
		  ajax: {
		    url: base_url+"ajax-query/getAccount",
		    dataType: 'json',
		    delay: 250,
		    data: function (params) {
		      var query = {
		        search: params.term,
		        type: 'public'
		      }

		      // Query parameters will be ?search=[term]&type=public
		      return query;
		    }  ,
		    processResults: function (data) {
		     
		      return {
		        results: data
		        
		      };
		    },
		    cache: true
		  },
		  placeholder: 'Search for a repository',
		 escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
		  minimumInputLength: 5,
		  templateResult: formatAccount,
		  templateSelection: formatAccountSelection
		});

		function formatAccount(repo) {
		  if (repo.loading) {
		    return "Searching.....";
		  }
		  //console.log(repo);

		  var markup = "<div> <p>" + repo.name + "( "+repo.id+") </p>  <p>Fother/spouse: "+ repo.fname+"/"+repo.spouse_name+"</p> </div>";

		 
		  return markup;
		}

		function formatAccountSelection (repo) {
		  if(repo.name){
		   // $(".add_product").focus();
		    return "<div> <p>" + repo.name + "( "+repo.id+") </p>  <p>Fother/spouse: "+ repo.fname+"/"+repo.spouse_name+"</p> </div>";  
		  }else{

		    return "<div> <p> Product name( color size )  unit_price</p> </div>";
		  }
		  
		}


	

	$(document).on("keyup","#account_number",function(){

		//console.log($("#account_number").val().length );
			

			if($("#account_number").val().length == 10){

				getAccountInfo($("#account_number").val());
			}
	});

	


	$(document).on("keyup","#num_of_installment",function(){

		installmentAmount();
	});


	$(document).on("keyup","#installment_amount",function(){

		numberOfInstallment();
	});


	function getAccountInfo( account_number){


		$.post(base_url+"ajax-query/getAccountInfo",{account_number:account_number},function(data){


			$("#name").val(data.name);
			$("#fname").val(data.fathers_name);
			$("#address").val(data.village_name+','+data.post_office_name+','+data.upazila_name+','+data.district_name);
			$("#area_name").val(data.area_name);
			$("#society_name").val(data.society_name);
			$("#collection_day").val(data.working_day);
			$("#prv_history").show();
			$("#prv_history").attr("onclick","showPreviousLoanInfo("+data.account_number+")");

		},"json")

	}


	function installmentAmount(){

		var totalAmountOfLoan = $("#loan_amount").val();
		var numberOfInstallment = $("#num_of_installment").val();
		$("#installment_amount").val(totalAmountOfLoan/numberOfInstallment);

	}


	function numberOfInstallment(){

		var totalAmountOfLoan = $("#loan_amount").val();
		var installmentAmount = $("#installment_amount").val();		
		$("#num_of_installment").val(Math.ceil(totalAmountOfLoan/installmentAmount));

	}


	function showPreviousLoanInfo(account_number){

		$.post(base_url+"loan-distribution/previous-loan-history",{account_number:account_number},function(data){

				$("#body").html(data);
				$("#modal-title").html("Previous loan distribution list");
				$("#modal").modal('show');

		});
	}


	
</script>