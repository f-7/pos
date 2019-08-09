
<form action="" method="post">
  


<div class="row">

  <div class="form-group has-success">
                        <?php  echo validation_errors(); ?>
                          <?=  $this->session->flashdata('msg') ;?> 
        </div>
  

    <div class="col-md-10">

        <?php $this->load->view('sell/_product_sell');?>
     
       

    </div>


</div> 
<div class="row">

 <div class="col-md-10">
  <!-- Horizontal Form -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Customer information</h3>                      
                    </div><!-- /.box-header -->
                   
                      <div class="box-body">


                          <div class="col-sm-12">
                    
                            <div class="form-horizontal">  

                              <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Mobile</label>
                                <div class="col-sm-8">
                                   <input type="text" class="form-control" id="mobile" name="mobile" required="true" value="<?php echo isset($info['customer_info']->mobile)?$info['customer_info']->mobile:'';?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="account_number" class="col-sm-4 control-label">Customer name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="customer_name" name="customer_name" required="true" value="<?php echo isset($info['customer_info']->customer_name)?$info['customer_info']->customer_name:'';?>">
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


                          </div>    
                          

                        </div>   


                    <div class="box-footer">
                   
                      <button id="cash_sell" type="submit" class="btn btn-info pull-right">Save invoice</button>
                    </div>



                  </div>  

           </div>       


</div>


</form>
    


   

  
		
	