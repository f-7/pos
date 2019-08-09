<?php // echo "<pre>";print_r($info['account_info']); exit();;?>

<form method="post" action="" >


<?php 
// Only loan distributon will be work
if(!isset($loan)){
	$this->load->view('sell/_product_sell');	
}else{
 ?>

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

<?php } ?>


<div class="row">
	
	<div class="col-md-12">
		

		<!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Loan distribution Form</h3>
                  <a style="display: none" class="pull-right btn btn-primary" href="javascript:;" id="prv_history">View previous loan history</a>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="form-horizontal">
                  <div class="box-body">

                  	<div class="col-md-12">


     <!-- Horizontal Form -->
                  


	
			    		
			    		  <h3 class="box-title"> Loan distribution information</h3>

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
	                      <input readonly="true" type="text" class="form-control" id="account_number1" name="account_number" required="true" value="<?php echo isset($info['account_info']->account_number)?$info['account_info']->account_number: ''?>"> 
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
	                      <label for="fname" class="col-sm-4 control-label">Address</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" readonly="true" id="address" value="<?php echo isset($info['account_info']->upazila_name)?$info['account_info']->upazila_name .", ". $info['account_info']->post_office_name.", ". $info['account_info']->village_name: ''?>">
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
	                    <div class="form-group">
	                      <label for="ref_id" class="col-sm-4 control-label">Loan Collection day</label>
	                       <div class="col-sm-8">		                      	
		                        <input type="text" class="form-control" readonly="true" id="collection_day" value="<?php echo isset($info['account_info']->working_day)?OOP::getDay($info['account_info']->working_day): ''?>" >
	                    	</div>
	                    </div>	

	                    <div class="form-group">
                                <label for="account_number" class="col-sm-4 control-label">Reference name</label>
                                <div class="col-sm-8">
                                 <select class="form-control reference_pin_number" required="true" name="reference_id"  >
                                       <option value=""> Select Reference</option>
                                       <?php echo $reference_list;      ?>  
                                      
                                      </select>
                                </div>
                              </div>	


                  	</div>
                  	
                  	<div class="col-sm-6">
                  		
                  		<div class="form-group">
	                      <label for="issue_date" class="col-sm-4 control-label">Loan Issue date</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="issue_date" name="issue_date" value="<?php echo  isset($info['loan_info']->issue_date)?date('d-m-Y',strtotime($info['loan_info']->issue_date)): date('d-m-Y');?>"  required="true">
	                      </div>
	                    </div>	

	                     <div class="form-group">
	                      <label for="loan_amount" class="col-sm-4 control-label">Total amount of Loan</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="loan_amount" name="loan_amount" required="true" value=" <?php echo isset($info['loan_info']->loan_amount)?$info['loan_info']->loan_amount:"" ;?>">
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
	                      <label for="installment_day" class="col-sm-4 control-label">Number of Installment </label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" name='num_of_installment' id="num_of_installment" required="true" value=" <?php echo isset($info['loan_info']->number_of_istallment)?$info['loan_info']->number_of_istallment:"" ;?>">
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="installment_day" class="col-sm-4 control-label">Amount of Installment </label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" name='installment_amount' id="installment_amount" required="true" value=" <?php echo isset($info['loan_info']->installment_amount)?$info['loan_info']->installment_amount:"" ;?>" >
	                      </div>
	                    </div>


	                    <div class="form-group">
	                      <label for="deposit_amount" class="col-sm-4 control-label">Amount of Deposit</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="deposit_amount" name="deposit_amount" value=" <?php echo isset($info['loan_info']->deposit_amount)?$info['loan_info']->deposit_amount:"" ;?>" >
	                      </div>
	                    </div>

	                    <div class="form-group">
	                      <label for="deposit_amount" class="col-sm-4 control-label">Primary Deposit Amount</label>
	                      <div class="col-sm-8">
	                        <input type="text" class="form-control" id="primery_deposit_amount" name="primery_deposit_amount" >
	                      </div>
	                    </div>

	                    <?php 	if(isset($loan)){   ?>

	                    		<div class="form-group">
			                      <label for="deposit_amount" class="col-sm-4 control-label">Collection of loan</label>
			                      <div class="col-sm-8">
			                        <input type="text" class="form-control" id="deposit_amount" name="loan_collection" value=" <?php echo isset($info['loan_info']->deposit_amount)?$info['loan_info']->deposit_amount:"" ;?>" >
			                      </div>
			                    </div>

			                    <div class="form-group">
			                      <label for="deposit_amount" class="col-sm-4 control-label">Collection of Deposit</label>
			                      <div class="col-sm-8">
			                        <input type="text" class="form-control" id="primery_deposit_amount" name="deposit_collection" >
			                      </div>
			                    </div>
	                    <?php } ?>

	                   

	                   

	                    


                  	</div>

                    



                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   
                    <button type="submit" class="btn btn-info pull-right">Request Loan distribution</button>
                  </div><!-- /.box-footer -->
                </div>
              </div><!-- /.box -->


	</div>
</div>

</form>




<script type="text/javascript">
	
	$("#issue_date").datepicker({ dateFormat: 'dd-mm-yy' });


	
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

		   getAccountInfo(repo.id);
		    return "<div> <p>" + repo.name + "( "+repo.id+") </p> </div>";  
		  }else{

		    return "<div> <p> account number / name</p> </div>";
		  }
		  
		}




	$(document).on("blur","#account_number",function(){

		

				getAccountInfo($("#account_number").val());
			
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
			$("#collection_day").val(getDay[data.working_day]);
			$("#prv_history").show();
			$("#prv_history").attr("onclick","showPreviousLoanInfo("+data.account_number+")");

		},"json")

	}


	function installmentAmount(){

		var totalAmountOfLoan = $("#loan_amount").val();
		var numberOfInstallment = $("#num_of_installment").val();
		$("#installment_amount").val(totalAmountOfLoan/numberOfInstallment);

		$("#primery_deposit_amount").val((totalAmountOfLoan*10)/100);

	}


	function numberOfInstallment(){

		var totalAmountOfLoan = $("#loan_amount").val();
		var installmentAmount = $("#installment_amount").val();		
		$("#num_of_installment").val(Math.ceil(totalAmountOfLoan/installmentAmount));
		$("#primery_deposit_amount").val((totalAmountOfLoan*10)/100);

	}


	function showPreviousLoanInfo(account_number){

		$.post(base_url+"loan-distribution/previous-loan-history",{account_number:account_number},function(data){

				$("#body").html(data);
				$("#modal-title").html("Previous loan distribution list");
				$("#modal").modal('show');

		});
	}

	/* 
		'1' => "Saturday",
	'2' => "Sunday",
	'3' => "Monday",
	'4' => "Tuesday",
	'5' => "Wednesday",
	'6' => "Thursday",
	'7' => "Friday"
	*/

	var getDay = {'1': "Saturday", "2": "Sunday", "3": "Monday","4":"Tuesday","5":"Wednesday","6":"Thursday","7":"Friday"};


	
</script>