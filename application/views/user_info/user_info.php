 
 
  <script>
 
  
  $( function() {
  datePicker(".dob");
    datePicker(".joing_date");
  if(getBrowser()!="Chrome")
  {
	  $(".cameraButton").hide()
	  
  }
   
   
  });
  
  $(document).on("keydown",".nid,.mob,.mob_2,.nominee_nid,.nominee_mobile,.nominee_nid_2,.nominee_mobile_2,.percentage_2,.percentage",function(e){	  
	onlyNumeric(e); 
	  
  });
  
$(document).on("change",".marital_status",function(){
	
	var marital=$(this).val();
	if(marital==2){
		$(".spouse_name").removeAttr('readonly');
	}else{
		$(".spouse_name").attr('readonly','readonly');
		$(".spouse_name").val("");
	}
})  ;
  
  
  
 /* Present address information on change control-------------------------------------*/ 
 
$(document).on('change', '.present_upazila_id', function() {	
	 var divi_id= $(this).val(); 
	 $('.present_post_office_id').find('option').addClass('option_hide');
	 $('.present_post_office_id').find('option.upazila_'+divi_id).removeClass('option_hide'); 
});	 
 
$(document).on('change', '.present_post_office_id', function() {	
	 var divi_id= $(this).val(); 
	 $('.present_village_id').find('option').addClass('option_hide');
	 $('.present_village_id').find('option.upazila_'+divi_id).removeClass('option_hide'); 
});	 
    
  /* parmanent address information on change control-------------------------------------*/ 
 
	 
$(document).on('change', '.parmanent_upazila_id', function() {	
	 var divi_id= $(this).val(); 
	 $('.parmanent_post_office_id').find('option').addClass('option_hide');
	 $('.parmanent_post_office_id').find('option.upazila_'+divi_id).removeClass('option_hide'); 
});	 
 
$(document).on('change', '.parmanent_post_office_id', function() {	
	 var divi_id= $(this).val(); 
	 $('.parmanent_village_id').find('option').addClass('option_hide');
	 $('.parmanent_village_id').find('option.upazila_'+divi_id).removeClass('option_hide'); 
});	 

/* present and parmanent is same -----------------------------*/

$(document).on("change",".present_parmanent_same",function(){
	
	
	if($(this).prop('checked')) {   
	 
 
		$('.parmanent_upazila_id option[value="' + $(".present_upazila_id").val() + '"]').prop('selected', true);  
		$('.parmanent_post_office_id option[value="' + $(".present_post_office_id").val() + '"]').prop('selected', true);  
		$('.parmanent_village_id option[value="' + $(".present_village_id").val() + '"]').prop('selected', true);  
	} else {
		$('. parmanentcls').prop('selectedIndex',0);
	}
		
});
 
 
  </script>

<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
<div class="box-header with-border">

	<h3 class="box-title show-message-titile-box"><?=($message_show)?$message_show:" New User Form"?> </h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div> 




<div class="box-body">

 


<form action="" id="address_info" enctype="multipart/form-data"  method="post" accept-charset="utf-8">


<div class="row borderbox">


<span class="title_gap">Basic Information</span>
<div class="col-md-6">                  

<div class="micro-pos-group">
<label for="Date" class="col-sm-4 control-label">Date</label>
<div class="col-sm-8">

<input type="text"  class="form-control" value="<?=date("d-m-Y")?>" disabled >					  
</div>

</div>	



<div class="micro-pos-group">
<label for="Name" class="col-sm-4 control-label">Members Name (English) <frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=($failed)?set_value('name'):""?>" name="name" class="form-control" required="required"  placeholder="English Name" style="text-transform:uppercase">
<errormessage> <?=(form_error('name'))?form_error('name'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="bangla name" class="col-sm-4 control-label">Member's Name (Bangla) </label>
<div class="col-sm-8">

<input type="text"value="<?=($failed)?set_value('bangla_name'):""?>"  name="bangla_name" class="form-control"    placeholder="বাংলায় নাম">
<errormessage> <?=(form_error('bangla_name'))?form_error('bangla_name'):""?> </errormessage>
</div>

</div>





<div class="micro-pos-group">
<label for="Date Of Birth" class="col-sm-4 control-label">Date Of Birth<frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=($failed)?set_value('dob'):""?>"  name="dob" class="form-control dob" required="required"  placeholder="Date Of Birth">
<errormessage> <?=(form_error('dob'))?form_error('dob'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="NID NO" class="col-sm-4 control-label">NID No<frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=($failed)?set_value('nid'):""?>"   name="nid" class="form-control nid" required="required" maxlength="17" placeholder="NID No">
<errormessage> <?=(form_error('nid'))?form_error('nid'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="Gender" class="col-sm-4 control-label">Gender <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control gender" name="gender">
<?=OOP::selectOptionList(OOP::getGender(),1)?>         
</select>  					 
<errormessage> <?=(form_error('gender'))?form_error('gender'):""?> </errormessage>
</div>					  
</div>	

<div class="micro-pos-group">
<label for="Mobile No-1" class="col-sm-4 control-label">Mobile No-1 <frz>*</frz></label>
<div class="col-sm-8">

<input type="text"  value="<?=($failed)?set_value('mob'):""?>"   name="mob" class="form-control mob"  placeholder="Mobile No-1" maxlength="11" required="required" >
<errormessage> <?=(form_error('mob'))?form_error('mob'):""?> </errormessage>
</div>

</div>

<div class="micro-pos-group">
<label for="Mobile No-2" class="col-sm-4 control-label">Mobile No-2</label>
<div class="col-sm-8">

<input type="text"  value="<?=($failed)?set_value('mob_2'):""?>"   name="mob_2" class="form-control mob_2" maxlength="11" placeholder="Mobile No-2" >
<errormessage> <?=(form_error('mob_2'))?form_error('mob_2'):""?> </errormessage>
</div>

</div>


</div>


<div class="col-md-6">                  

<div class="micro-pos-group">
<label for="Marital status" class="col-sm-4 control-label">Marital status </label>
<div class="col-sm-8">
<select class="form-control marital_status" name="marital_status">
<?=OOP::selectOptionList(OOP::getMaritalStatus(),1)?>                      
</select>  

<errormessage> <?=(form_error('marital_status'))?form_error('marital_status'):""?> </errormessage>
</div>

</div>	


<div class="micro-pos-group">
<label for="Spouse Name" class="col-sm-4 control-label">Spouse Name</label>
<div class="col-sm-8">

<input type="text"  value="<?=($failed)?set_value('spouse_name'):""?>"   name="spouse_name" class="form-control spouse_name"  placeholder="Spouse Name" readonly>
<errormessage> <?=(form_error('spouse_name'))?form_error('spouse_name'):""?> </errormessage>
</div>

</div>

<div class="micro-pos-group">
<label for="Father's Name" class="col-sm-4 control-label">Father's Name <frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=($failed)?set_value('fathers_name'):""?>"  name="fathers_name" class="form-control"  placeholder="Father's Name" required="required">
<errormessage> <?=(form_error('fathers_name'))?form_error('fathers_name'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="Mother's Name" class="col-sm-4 control-label">Mother's Name  <frz>*</frz></label>
<div class="col-sm-8">

<input type="text"  value="<?=($failed)?set_value('mothers_name'):""?>"   name="mothers_name" class="form-control"  placeholder="Mother's Name" required="required">
<errormessage> <?=(form_error('mothers_name'))?form_error('mothers_name'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<div class="col-sm-6">
<div class="col-sm-12">
<img src="" class="img-responsive img-thumbnail imagebox member_photo" alt="User Photo">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your computer</span>
<input type="file" class="browse_file" id="member_photo" accept="image/png, image/jpeg, image/gif" name="member_photo" > <!-- rename it -->
<input type="hidden" name="camera_user_photo_name" value="" class="camera_user_photo_name">
</div>




<button type="button" class="btn btn-default image-preview-input imageFilebox cameraButton"  onclick="openCamera('camera_box_photo','member_photo','camera_user_photo_name')" data-toggle="modal" data-target="#webcamera_photo">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>



</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="" class="img-responsive img-thumbnail imagebox member_signature" alt="User Signature">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your signature</span>
<input type="file" class="browse_file" id="member_signature"  accept="image/png, image/jpeg, image/gif" name="member_signature"> <!-- rename it -->
<input type="hidden" name="camera_user_signature_name" value="" class="camera_user_signature_name">
</div>


<button type="button" class="btn btn-default image-preview-input imageFilebox cameraButton"  onclick="openCamera('camera_box_signature','member_signature','camera_user_signature_name')" data-toggle="modal" data-target="#webcamera_signature">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>

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
<label for="Upazila Name" class="col-sm-4 control-label">Upazila Name  <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control present_upazila_id" name="present_upazila_id"  required="required">
	 <?php 
	   foreach($upazila_list as $key)
	   {
	   ?>
		 <option class="dist_<?=$key->district_id?>" value="<?=$key->id?>" <?=((set_value('present_upazila_id')?set_value('present_upazila_id'):1)==$key->id)?'selected':''?>> <?=$key->upazila_name?></option>                         
		 
	   <?php } ?>                    
</select>  					 
<errormessage> <?=(form_error('present_upazila_id'))?form_error('present_upazila_id'):""?> </errormessage>
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control present_post_office_id" name="present_post_office_id"  required="required">
 <?php 
	   foreach($post_office_list as $key)
	   {
	   ?>
		 <option class="upazila_<?=$key->upazila_id?>" value="<?=$key->id?>" <?=((set_value('present_post_office_id')?set_value('present_post_office_id'):1)==$key->id)?'selected':''?>> <?=$key->post_office_name?></option>                         
		 
	   <?php } ?>                    
</select>  					 
<errormessage> <?=(form_error('present_post_office_id'))?form_error('present_post_office_id'):""?> </errormessage>
</div>
</div>	
 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control present_village_id" name="present_village_id"  required="required">
 <?php 
   foreach($village_list as $key)
   {
   ?>
	 <option class="upazila_<?=$key->post_office_id?>" value="<?=$key->id?>" <?=((set_value('present_village_id')?set_value('present_village_id'):1)==$key->id)?'selected':''?>> <?=$key->village_name?></option>                         
	 
   <?php } ?>                          
</select>  					 
<errormessage> <?=(form_error('present_village_id'))?form_error('present_village_id'):""?> </errormessage>
</div>
</div>						  

</div>
 


<div class="col-md-6">                  
<span class="headerOfTitile"> <input type="checkbox" name="present_parmanent_same" class="same_data_box present_parmanent_same" alt="Both adress is same"> Parmanent Address </span>		  

  

<div class="micro-pos-group">
<label for="Upazila Name" class="col-sm-4 control-label">Upazila Name  <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control parmanentcls parmanent_upazila_id" name="parmanent_upazila_id"  required="required">
    
		 <?php 
	   foreach($upazila_list as $key)
	   {
	   ?>
		 <option class="dist_<?=$key->district_id?>" value="<?=$key->id?>" <?=((set_value('parmanent_upazila_id')?set_value('parmanent_upazila_id'):1)==$key->id)?'selected':''?>> <?=$key->upazila_name?></option>                         
		 
	   <?php } ?>                    
</select>  					 
<errormessage> <?=(form_error('parmanent_upazila_id'))?form_error('parmanent_upazila_id'):""?> </errormessage>
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control parmanentcls parmanent_post_office_id" name="parmanent_post_office_id"  required="required">
 <?php 
	   foreach($post_office_list as $key)
	   {
	   ?>
		 <option class="upazila_<?=$key->upazila_id?>" value="<?=$key->id?>" <?=((set_value('parmanent_post_office_id')?set_value('parmanent_post_office_id'):1)==$key->id)?'selected':''?>> <?=$key->post_office_name?></option>                         
		 
	   <?php } ?>                     
</select>  					 
<errormessage> <?=(form_error('parmanent_post_office_id'))?form_error('parmanent_post_office_id'):""?> </errormessage>
</div>
</div>	

 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control parmanentcls parmanent_village_id" name="parmanent_village_id"  required="required">
 <?php 
   foreach($village_list as $key)
   {
   ?>
	 <option class="upazila_<?=$key->post_office_id?>" value="<?=$key->id?>" <?=((set_value('parmanent_village_id')?set_value('parmanent_village_id'):1)==$key->id)?'selected':''?>> <?=$key->village_name?></option>                         
	 
   <?php } ?>                       
</select>  					 
<errormessage> <?=(form_error('parmanent_village_id'))?form_error('parmanent_village_id'):""?> </errormessage>
</div>
</div>						  

</div>

 

</div>





<div class="row borderbox">


<span class="title_gap">Official Information</span>
		
		<div class="col-md-6">                  
 
 
 
	 
 
 	<div class="micro-pos-group">
		<label for="email" class="col-sm-4 control-label">Email  </label>
		<div class="col-sm-8">
		<input type="email"  value="<?=($failed)?set_value('email'):""?>"   name="email" class="form-control email"  placeholder="email" >                		
		 
		<errormessage> <?=(form_error('email'))?form_error('email'):""?> </errormessage>
		</div>

		</div>
 
		<div class="micro-pos-group">
		<label for="user Type" class="col-sm-4 control-label">User Type  <frz>*</frz></label>
			<div class="col-sm-8">
				  
			 <select class="form-control" name="type"  required="required"> 
				 <option  value="2" <?=(set_value('type')==2)?"selected":''?>> Staff </option>  
				 <option  value="1" <?=(set_value('type')==1)?"selected":''?>> Admin </option> 
				 <option  value="4" <?=(set_value('type')==4)?"selected":''?>> Partner </option> 
			</select>  
				 
				<errormessage> <?=(form_error('type'))?form_error('type'):""?> </errormessage>
			</div>

		</div>	
 
 



		</div>
		
		
		 

 
  <div class="col-md-6">      
  
		 
		<div class="micro-pos-group">
		<label for="User Name" class="col-sm-4 control-label">User Name  <frz>*</frz></label>
		<div class="col-sm-8">
		<input type="text"  value="<?=($failed)?set_value('username'):""?>"  name="username" class="form-control"  placeholder="user name (max: 10 digit)" maxlength="10" minlength="6"/>                		
		 
		<errormessage> <?=(form_error('username'))?form_error('username'):""?> </errormessage>
		</div>

		</div>	
		
		<div class="micro-pos-group">
		<label for="Password" class="col-sm-4 control-label">Password  <frz>*</frz></label>
		<div class="col-sm-8">
		<input type="password"  value="<?=($failed)?set_value('password'):""?>"  name="password" class="form-control"  placeholder="password (min: 6 digit)"  minlength="6"/>                		
		 
		<errormessage> <?=(form_error('password'))?form_error('password'):""?> </errormessage>
		</div>

		</div>	
		 
		<button type="submit" class="btn btn-default btn-lg margin_top_60">Submit</button>
		 
  </div>

</div> 









 


 </form>   
    





</div> 


<div class="box-footer"> <!---box footer ---> </div>
</div> 








 
