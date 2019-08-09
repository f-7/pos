 




<!------------------------------------ dynamic modal-------------------------------------------------------------------------->



<div class="modal fade" id="webcamera_photo" role="dialog" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" style="width: 20%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please take your photo</h4>
        </div>
        <div class="modal-body">
          <div class="webcamera_box_css" id="camera_box_photo">
		  Please wait.....
		  </div>
		  
		  
        </div>
        <div class="modal-footer" style="text-align: left;">
		<a  class="btn btn-default" href="javascript:void(webcam.snap())">Take photo</a> 
		<a  class="btn btn-default" onclick="openCamera('camera_box_photo')">Re Take </a>
		 
		  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="camera_done()" >Done</button> 
        </div>
      </div>
      
    </div>
  </div>
  
  
  <div class="modal fade" id="webcamera_signature" role="dialog" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog" style="width: 20%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Please take your signature</h4>
        </div>
        <div class="modal-body">
          <div class="webcamera_box_css" id="camera_box_signature">
		  Please wait.....
		  </div>
		  
		  
        </div>
        <div class="modal-footer" style="text-align: left;">
		<a  class="btn btn-default" href="javascript:void(webcam.snap())">Take photo</a> 
		<a  class="btn btn-default" onclick="openCamera('camera_box_signature')">Re Take </a>
		 
		  <button type="button" class="btn btn-default" data-dismiss="modal" onclick="camera_done()" >Done</button> 
        </div>
      </div>
      
    </div>
  </div>
  
  
  
  <!------------------------------------------------------------------------------------------------------------------------>
  
<div class="modal fade" id="medium_editor_modal" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title" id="medium_editor_modal_title">Please take your signature</h4>
	</div>
	<div class="modal-body" id="medium_editor_modal_body">
	  Please wait.............
	  
	  
	</div>
	<div class="modal-footer" style="text-align: left;">
	<button type="button" class="btn btn-default" id="medium_editor_modal_submit" >Update</button> 
	 
	  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button> 
	  <span class="modal_red_message"></span>
	</div>

  </div>
  
</div>
</div>
  
  <!------------------------------------------------large_modal_view------------------------------------------------------------------------>
<div class="modal fade" id="large_view_modal" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content" > 
	  <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title" id="large_view_modal_title">Please take your signature</h4>
	</div>
	<div class="modal-body" id="large_view_modal_body"  >
	  Please wait.............
	  
	  
	</div>
	<div class="modal-footer" style="text-align: left;">
	 <button type="button" class="btn btn-default" id="large_view_modal_submit" >Print</button> 	 
	  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>  
	</div>

  </div>
  
</div>
</div>



  
  <!------------------------------------------------loader model------------------------------------------------------------------------>
<div class="modal fade" id="loader_modal_box" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog loader_modal_css_position">

  
<img src="<?= $this->template->Images()?>/modal_loader.gif">
  
</div>
</div>


  
  
  
  
  <!------------------------------------------------user viwe------------------------------------------------------------------------>
<div class="modal fade" id="user_view_modal" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
	  <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  
	   <button type="button" class="btn btn-default" id="large_view_modal_submit" >Print</button> 	 
	  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>  
	</div>
	<div class="modal-body" id="user_view_modal_body">
	 <div class="row borderbox">


						<span class="title_gap">Basic Information</span>
						<div class="col-md-6">                  

						<div class="micro-pos-group">
						<label for="Date" class="col-sm-4 control-label">Entry Date</label>
						<div class="col-sm-8 created_date"> 				  
						</div>

						</div>	



						<div class="micro-pos-group">
						<label for="bangla name" class="col-sm-4 control-label"> Name (Bangla)</label>
						<div class="col-sm-8 bangla_name">
 
						</div>

						</div>


						<div class="micro-pos-group">
						<label for="Name" class="col-sm-4 control-label"> Name (English) </label>
						<div class="col-sm-8 name">
						 
						</div>

						</div>



						<div class="micro-pos-group">
						<label for="Date Of Birth" class="col-sm-4 control-label">Date Of Birth</label>
						<div class="col-sm-8 dob" > 
						</div>

						</div>


						<div class="micro-pos-group">
						<label for="NID NO" class="col-sm-4 control-label">NID No </label>
						<div class="col-sm-8 nid"> 
						</div>

						</div>

 

						<div class="micro-pos-group">
						<label for="Mobile No-1" class="col-sm-4 control-label">Mobile No-1 </label>
						<div class="col-sm-8 mob">

					 
						</div>

						</div>

						<div class="micro-pos-group">
						<label for="Mobile No-2" class="col-sm-4 control-label">Mobile No-2</label>
						<div class="col-sm-8 mob_2"> 
						</div>

						</div>


						</div>


						<div class="col-md-6">                  

				 

						<div class="micro-pos-group">
						<label for="Spouse Name" class="col-sm-4 control-label">Spouse Name</label>
						<div class="col-sm-8 spouse_name">
 
						</div>

						</div>

						<div class="micro-pos-group">
						<label for="Father's Name" class="col-sm-4 control-label">Father's Name </label>
						<div class="col-sm-8 fathers_name">
 
						</div>

						</div>


						<div class="micro-pos-group">
						<label for="Mother's Name" class="col-sm-4 control-label">Mother's Name  </label>
						<div class="col-sm-8 mothers_name"> 
						</div>

						</div>


						<div class="micro-pos-group">
						<div class="col-sm-6">
						<div class="col-sm-12">
						<img src="" class="img-responsive img-thumbnail imagebox member_photo" alt="User Photo">
						</div>
						  
						</div>

						<div class="col-sm-6">
						<div class="col-sm-12">
						<img src="" class="img-responsive img-thumbnail imagebox member_signature" alt="User Signature">
						</div>
					 
						</div>


						</div>
 

						</div>

</div>
	  
	 
<div class="row borderbox">


<span class="title_gap">Address Information</span>
<div class="col-md-6">                  
<span class="headerOfTitile"> Present Address </span>		  

 
<div class="micro-pos-group">
<label for="Upazila Name" class="col-sm-4 control-label"> Upazila Name  </label>
<div class="col-sm-8 present_upazila_name">
 
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  </label>
<div class="col-sm-8 present_post_office">
 
</div>
</div>	
 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name </label>
<div class="col-sm-8 present_village">
 
</div>
</div>						  

</div>
 


<div class="col-md-6">                  
<span class="headerOfTitile">   Parmanent Address </span>		  

  

<div class="micro-pos-group">
<label for="Upazila Name" class="col-sm-4 control-label">Upazila Name  </label>
<div class="col-sm-8 permanent_upazila_name">
 
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  </label>
<div class="col-sm-8 permanent_post_office">
 
</div>
</div>	

 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name </label>
<div class="col-sm-8 permanent_village">
 
</div>
</div>						  

</div>

 

</div>
	 
	 
	 
	 
<div class="row borderbox">


<span class="title_gap">Official Information</span>
		
		<div class="col-md-6">                  
 
 

 	<div class="micro-pos-group">
		<label for="email" class="col-sm-4 control-label">Email  </label>
		<div class="col-sm-8 email">
		 
		</div>

		</div>
 
 
 
 
 

</div> 	 
	 
	 
 
	 
	 
	</div>
 

  </div>
  
</div>
</div>



</div>



  <!---/*===============================address modal===================================*/-->
  
  <div class="modal fade" id="address_large_view_modal" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	  <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title" id="address_large_view_modal_title">Update address information</h4>
	</div>
	<div class="modal-body" id="address_large_view_modal_body">
	  
	  Please wait data is loaded......
	  
	  
 </div>
	<div class="modal-footer" style="text-align: left;">
	 <button type="button" class="btn btn-default" id="address_large_view_modal_submit" >Update</button> 	 
	  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>  
	</div>

  </div>
  
</div>
</div>


  <!------------------------------------------------online payment verified modal ----------------------------------------------------------------------->
<div class="modal fade" id="online_payment_modal" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content" > 
	  <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title" id="online_payment_modal_title">On line payment Verification</h4>
	</div>
	<div class="modal-body" id="online_payment_modal_body"  >
	  Please wait.............
	  
	  
	</div>
	<div class="modal-footer" style="text-align: right;">
	 <button type="button" class="btn btn-primary" id="online_payment_modal_submit" >Confirmed</button> 	 
	 <button type="button" class="btn btn-danger" id="online_payment_modal_submit" >False Payment</button> 	 	
	<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>  
	</div>

  </div>
  
</div>
</div>


<!------------------------------------------------expnediture information modal--------------------------------------------------->

<div class="modal fade" id="expenditure_modal" role="dialog" data-keyboard="false" data-backdrop="static" >
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title" id="expenditure_modal_title">Expenditure details</h4>
	</div>
	<div class="modal-body" id="expenditure_modal_body">
	   
	   
	   
	  
	  
	</div>
	<div class="modal-footer" style="text-align: left;">
	<button type="button" class="btn btn-default" id="expenditure_modal_print" >Print</button> 
	 
	  <button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button> 
	  <span class="modal_red_message"></span>
	</div>

  </div>
  
</div>
</div>

