
<style type="text/css">
  
  .discount{width: 60px;}
  .txt-rigth{ text-align: right!important;}
  .sl{border: 0px;}
  tr{background: #fff;}

  .select2-container{width: 100%!important;}
  .delete{cursor: pointer;}
</style>
<script src="<?php echo $this->template->Js()?>select2.min.js"></script>
  <link href="<?php echo $this->template->Css();?>select2.min.css" rel="stylesheet">

<form action="" method="post" >
<div class="row">
	
	<div class="col-md-12">
		

		<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Loan collection Form</h3>
                  <a style="display: none" class="pull-right btn btn-primary" href="javascript:;" id="prv_history">View previous loan history</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
                  <div class="box-body">

                  	<div class="col-md-12">


     <!-- Horizontal Form -->
                  


	
			    		
			    		  <h3 class="box-title"> Loan collection account wise</h3>

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

	                      	<?php if(isset($info['account_info']->account_number)){?>
	                      <input readonly="true" type="text" class="form-control" id="account_number" name="account_number" required="true" value="<?php echo isset($info['account_info']->account_number)?$info['account_info']->account_number: ''?>"> 
	                      	<?php } else{ ?>
	                        <select  class="form-control" id="account_number" name="account_number" required="true"></select>
	                        <?php } ?>
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="name" class="col-sm-4 control-label">Name</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="name" required="true" value="<?php echo isset($info['account_info']->name)?$info['account_info']->name: ''?>">
	                      </div>
	                    </div>
	                    <div class="form-group">
	                      <label for="fname" class="col-sm-4 control-label">Father's / Husband</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="fname" required="true" value="<?php echo isset($info['account_info']->fathers_name)?$info['account_info']->fathers_name: ''?>">
	                      </div>
	                    </div>	                   

	                    <div class="form-group">
	                      <label for="area_name" class="col-sm-4 control-label">Area Name</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="area_name" value="<?php echo isset($info['account_info']->area_name)?$info['account_info']->area_name: ''?>" >
	                      </div>
	                    </div>	
	                    <div class="form-group">
	                      <label for="society_name" class="col-sm-4 control-label">Society Name</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="society_name" value="<?php echo isset($info['account_info']->society_name)?$info['account_info']->society_name: ''?>" >
	                      </div>
	                    </div>

                  	</div>
                  	
                  	<div class="col-sm-6">
                  		
                  		<div class="form-group">
	                      <label for="issue_date" class="col-sm-4 control-label">Collection date</label>
	                      <div class="col-sm-8">
	                        <input readonly="true"  type="text" class="form-control" id="issue_date" name="issue_date" value="<?php echo   date('d-m-Y');?>"  required="true">
	                      </div>
	                    </div>	

	                    <div class="form-group">
	                      <label for="loan_distribution_id" class="col-sm-4 control-label">Distributd loan list:</label>
	                      <div class="col-sm-8">
	                        
	                        <select  class="form-control" id="loan_distribution_id" name="loan_distribution_id" required="true" >
	                        	<option value="">Select loan amount</option>
	                        </select>
	                      </div>
	                    </div>

	                    
		                
	                     <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Loan Collection Amount </label>
	                      <div class="col-sm-8">
	                        <input  type="number" class="form-control" name='loan_amount' id="loan_amount"  required="true" value="">
	                      </div>
	                    </div>

	                     <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Confirm Amount </label>
	                      <div class="col-sm-8">
	                      	<input  type="number" class="form-control" name='confirm_loan_amount' id="confirm_loan_amount"  required="true" value="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Deposit Collection Amount </label>
	                      <div class="col-sm-8">
	                        <input  type="number" class="form-control" name='deposit_amount' id="deposit_amount"  required="true" value="">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Confirm Amount </label>
	                      <div class="col-sm-8">
	                       <input  type="number" class="form-control" name='confirm_deposit_amount' id="confirm_deposit_amount"   value="">
	                      </div>
	                    </div>


                  	</div>

                    



                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </div>
              </div><!-- /.box -->


	</div>
</div>

</form>

<script type="text/javascript">
	

	$("#issue_date").datepicker({ dateFormat: 'dd-mm-yy' });

	//setTimeout(function(){ $(".alert").hide(); }, 3000);


	
	$("#account_number").select2({
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

		  var markup = "<div> <p>" + repo.name + "( "+repo.id+") </p>  <p>Father/spouse: "+ repo.fname+"/"+repo.spouse_name+"</p> </div>";

		 
		  return markup;
		}

		function formatAccountSelection (repo) {
		  if(repo.name){
		   // $(".add_product").focus();

		   getAccountDepositBalance(repo.id);
		    return "<div> <p>" + repo.name + "( "+repo.id+") </p> </div>";  
		  }else{

		    return "<div> <p> account number / name</p> </div>";
		  }
		  
		}




	$(document).on("blur","#account_number",function(){

		

				getAccountDepositBalance($("#account_number").val());
			
	}); 


	


	function getAccountDepositBalance( account_number){


		$.post(base_url+"ajax-query/getAccountLoanDistribution",{account_number:account_number},function(data){


			$("#name").val(data[0].name);
			$("#fname").val(data[0].fathers_name);			
			$("#area_name").val(data[0].area_name);
			$("#society_name").val(data[0].society_name);	
			

			/*var allowable_amt = (((data[0].loan_amount - data[0].collection_loan_amount)*10)/100);

			if(allowable_amt < data[0].collection_deposit_amount && data[0].collection_deposit_amount >= data[0].withdrawal_amount){ 
				$("#withdrawal_amount").removeAttr('readonly');
			}
			$("#allowable_withdrawal_amt").val(data[0].collection_deposit_amount - allowable_amt - data[0].withdrawal_amount);	*/

 				$('#loan_distribution_id').find('option').remove();
 				$('#loan_distribution_id').append($("<option></option>")
                    .attr("value","")                    
                    .text("Select loan amount")); 
			$.each(data, function (i, item) {
			   /* $('#loan_distribution_id').append($('<option>', { 
			        value: item.id,
			        text : item.issue_date+' - Loan='+ item.loan_amount+' Deposit='+ (item.collection_deposit_amount - item.withdrawal_amount)
			    }));*/


			     $('#loan_distribution_id').append($("<option></option>")
                    .attr("value",item.id)                    
                    .text(item.issue_date+' - Loan='+ item.loan_amount)); 


			});
			

		},"json")

	}




</script>