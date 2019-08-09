
 
  <script>
  $( function() {
	  
	change_url_paramater('id',$(".pre_account_inumber").val());  
	 
	  
  datePicker(".dob");
  //genarateAccountNumber();
  } );
  
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
$(document).on("change",".area_code",function(){
	var area_code=$(this).val();
	 $('.society_code').find('option').addClass('option_hide');	 	  
	 $('.society_code').find('option.area_'+area_code).removeClass('option_hide'); 
	 $('.society_code').prop('selectedIndex', 0);
});
 $(document).on("change",".society_code",function(){
	genarateAccountNumber();
});
		 
function genarateAccountNumber()
{
	var society_code=$(".society_code").val();	
	var number=$(".account_number").attr("rel");	 
	number=formate_five_digit(number);	 
	$(".account_number").val(removeLeadingZero(society_code+number));
}
		 
function ShowLoading(){
   $('#loader_modal_box').modal('show');
};


$(document).on("change","#member_photo",function(){
	
	$("#camera_user_photo_name").val("");
})	;	 
	
	
$(document).on("keyup",".percentage_2",function(){
	
	var percentage=$(".percentage").val();
	percentage=percentage.replace(/ /g,'');
	
	var percentage_2=$(this).val();
	percentage_2=percentage_2.replace(/ /g,'');
 if((parseInt(percentage)+parseInt(percentage_2))>100)
 {
	 alert("Wrong distribution of percentange");
	 $(this).val(0);
 }	

});	

$(document).on("keyup",".percentage",function(){
	
	var percentage_2=$(".percentage_2").val();
	percentage_2=percentage_2.replace(/ /g,'');	
	percentage_2=(percentage_2=="")?0:percentage_2; 
 	percentage_2=parseInt(percentage_2);

	var percentage=$(this).val();
	percentage=percentage.replace(/ /g,'');	
	percentage=parseInt(percentage);
	  
 if((percentage+percentage_2)>100)
 {
	 alert("Wrong distribution of percentange");
	 $(this).val(0);
 }	

});	
	
  </script>
 
 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
<div class="box-header with-border">

	<h3 class="box-title show-message-titile-box"><?=($message_show)?$message_show:" Members Edit Account"?> </h3>
<span class="<?=( $retun_message_show!="")?"result_specail_message_box":""?>"><?=($retun_message_show!="")?$retun_message_show:''?> </span>	
	
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
</div>
</div> 




<div class="box-body">

<form action="" id="address_info"  onsubmit="ShowLoading()" enctype="multipart/form-data"  method="post" accept-charset="utf-8">


<div class="row borderbox">


<span class="title_gap">Basic Information</span>
<div class="col-md-6">                  

<div class="micro-pos-group">
<label for="Account Number" class="col-sm-4 control-label">Date</label>
<div class="col-sm-8">
<input type="hidden" class="pre_account_inumber" name="pre_account_inumber" value="<?=OOP::formate_teen_digit($acc_data['data_list']->account_number);?>">
<input type="text"  class="form-control" value="<?=date_format(date_create($acc_data['data_list']->register_date),"d-m-Y");?>" disabled >					  
</div>

</div>	

<div class="micro-pos-group">
<label for="Name" class="col-sm-4 control-label">Members Name (English) <frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=strtoupper($acc_data['data_list']->name)?>" name="name" class="form-control" required="required"  placeholder="English Name" style="text-transform:uppercase">
<errormessage> <?=(form_error('name'))?form_error('name'):""?> </errormessage>
</div>

</div>

<div class="micro-pos-group">
<label for="bangla name" class="col-sm-4 control-label">Member's Name (Bangla) </label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->bangla_name?>"  name="bangla_name" class="form-control"    placeholder="বাংলায় নাম">
<errormessage> <?=(form_error('bangla_name'))?form_error('bangla_name'):""?> </errormessage>
</div>

</div>






<div class="micro-pos-group">
<label for="Date Of Birth" class="col-sm-4 control-label">Date Of Birth<frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->dob?>"  name="dob" class="form-control dob" required="required"  placeholder="Date Of Birth">
<errormessage> <?=(form_error('dob'))?form_error('dob'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="NID NO" class="col-sm-4 control-label">NID No<frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nid?>" name="nid" class="form-control nid" required="required" maxlength="17" placeholder="NID No">
<errormessage> <?=(form_error('nid'))?form_error('nid'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="Gender" class="col-sm-4 control-label">Gender <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control gender" name="gender">
<?=OOP::selectOptionList(OOP::getGender(),$acc_data['data_list']->gender)?>         
</select>  					 
<errormessage> <?=(form_error('gender'))?form_error('gender'):""?> </errormessage>
</div>					  
</div>	

<div class="micro-pos-group">
<label for="Mobile No-1" class="col-sm-4 control-label">Mobile No-1 <frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->mob?>" name="mob" class="form-control mob"  placeholder="Mobile No-1" maxlength="11" required="required" >
<errormessage> <?=(form_error('mob'))?form_error('mob'):""?> </errormessage>
</div>

</div>

<div class="micro-pos-group">
<label for="Mobile No-2" class="col-sm-4 control-label">Mobile No-2</label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->mob_2?>" name="mob_2" class="form-control mob_2" maxlength="11" placeholder="Mobile No-2" >
<errormessage> <?=(form_error('mob_2'))?form_error('mob_2'):""?> </errormessage>
</div>

</div>


</div>


<div class="col-md-6">                  

<div class="micro-pos-group">
<label for="Marital status" class="col-sm-4 control-label"> Marital status </label>
<div class="col-sm-8">
<select class="form-control marital_status" name="marital_status">
<?=OOP::selectOptionList(OOP::getMaritalStatus(),$acc_data['data_list']->marital_status)?>                      
</select>  

<errormessage> <?=(form_error('marital_status'))?form_error('marital_status'):""?> </errormessage>
</div>

</div>	


<div class="micro-pos-group">
<label for="Spouse Name" class="col-sm-4 control-label">Spouse Name</label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->spouse_name?>" name="spouse_name" class="form-control spouse_name"  placeholder="Spouse Name" readonly>
<errormessage> <?=(form_error('spouse_name'))?form_error('spouse_name'):""?> </errormessage>
</div>

</div>

<div class="micro-pos-group">
<label for="Father's Name" class="col-sm-4 control-label">Father's Name <frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->fathers_name?>" name="fathers_name" class="form-control"  placeholder="Father's Name" required="required">
<errormessage> <?=(form_error('fathers_name'))?form_error('fathers_name'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="Mother's Name" class="col-sm-4 control-label">Mother's Name  <frz>*</frz></label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->mothers_name?>" name="mothers_name" class="form-control"  placeholder="Mother's Name" required="required">
<errormessage> <?=(form_error('mothers_name'))?form_error('mothers_name'):""?> </errormessage>
</div>

</div>
<?php 
$mem_photo=($acc_data['data_list']->member_photo)?$acc_data['data_list']->member_photo:"default.png";
$mem_sig=($acc_data['data_list']->member_signature)?$acc_data['data_list']->member_signature:"default_sig.png";

?>


<div class="micro-pos-group">
<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/photo/".$mem_photo?>" class="img-responsive img-thumbnail imagebox member_photo" alt="Member Photo">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your Photo</span>
<input type="file" class="browse_file" id="member_photo" accept="image/png, image/jpeg, image/gif" name="member_photo" > <!-- rename it -->
<input type="hidden" name="camera_user_photo_name" value="" class="camera_user_photo_name">
</div>


<button type="button" class="btn btn-default image-preview-input imageFilebox"  onclick="openCamera('camera_box_photo','member_photo','camera_user_photo_name')" data-toggle="modal" data-target="#webcamera_photo">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>


</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/signature/".$mem_sig?>" class="img-responsive img-thumbnail imagebox member_signature" alt="Member Signature">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your signature</span>
<input type="file" class="browse_file" id="member_signature"  accept="image/png, image/jpeg, image/gif" name="member_signature"> <!-- rename it -->
<input type="hidden" name="camera_user_signature_name" value="" class="camera_user_signature_name">
</div>



<button type="button" class="btn btn-default image-preview-input imageFilebox"  onclick="openCamera('camera_box_signature','member_signature','camera_user_signature_name')" data-toggle="modal" data-target="#webcamera_signature">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>



</div>
</div>


</div>







</div>

</div> 



<div class="row borderbox">


<span class="title_gap">Nominee's Information</span>
<div class="col-md-6">                  

<span class="headerOfTitile"> Nominee: 01 </span>


<div class="micro-pos-group">
<label for="Nominee's" class="col-sm-4 control-label">Nominee's Name  (English) </label>
<div class="col-sm-8">
<input type="hidden" name="nominee_id" value="<?=$acc_data['data_list']->nominee_id?>" >
<input type="text" value="<?=$acc_data['data_list']->nominee_name?>" name="nominee_name" class="form-control"  placeholder="Nominee's Name">
<errormessage> <?=(form_error('nominee_name'))?form_error('nominee_name'):""?> </errormessage>
</div>

</div>
<div class="micro-pos-group">
<label for="Nominee Gender" class="col-sm-4 control-label">Nominee Gender </label>
<div class="col-sm-8">
<select class="form-control" name="nominee_gender" >
<?=OOP::selectOptionList(OOP::getGender(),$acc_data['data_list']->nominee_gender)?>                     
</select>  

<errormessage> <?=(form_error('nominee_gender'))?form_error('nominee_gender'):""?> </errormessage>
</div>					  
</div>			

<div class="micro-pos-group">
<label for="Father or Husband  Name" class="col-sm-4 control-label">Father/Husband  Name </label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nominee_father_husband_name?>" name="nominee_father_husband_name" class="form-control"  placeholder="Father or Husband  Name">
<errormessage> <?=(form_error('nominee_father_husband_name'))?form_error('nominee_father_husband_name'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="Age" class="col-sm-4 control-label">Age</label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nominee_age?>" name="nominee_age" class="form-control nominee_age" maxlength="2"   placeholder="Age" >
<errormessage> <?=(form_error('nominee_age'))?form_error('nominee_age'):""?> </errormessage>
</div>

</div>
 


<div class="micro-pos-group">
<label for="Relationship" class="col-sm-4 control-label">Relationship </label>
<div class="col-sm-8">
<select class="form-control nominee_relation" name="nominee_relation" >
<?=OOP::selectOptionList(OOP::relationShip(),$acc_data['data_list']->nominee_relation)?>         
</select>  					 
<errormessage> <?=(form_error('nominee_relation'))?form_error('nominee_relation'):""?> </errormessage>
</div>					  
</div>	


<div class="micro-pos-group">
<label for="Percentage" class="col-sm-4 control-label">Percentage (%) </label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nominee_percentage?>" name="percentage" class="form-control percentage"  placeholder="Percentage (%)" maxlength="3" >
<errormessage> <?=(form_error('percentage'))?form_error('percentage'):""?> </errormessage>
</div>

</div>


<?php 
$nomi_1_photo=($acc_data['data_list']->nominee_photo)?$acc_data['data_list']->nominee_photo:"default.png";
$nomi_1_sig=($acc_data['data_list']->nominee_signature)?$acc_data['data_list']->nominee_signature:"default_sig.png";

?>


<div class="micro-pos-group">
<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/photo/".$nomi_1_photo?>" class="img-responsive img-thumbnail imagebox nominee_photo" alt="Nominee Photo">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your Photo</span>
<input type="file" class="browse_file" id="nominee_photo" accept="image/png, image/jpeg, image/gif" name="nominee_photo"> <!-- rename it -->
<input type="hidden" name="camera_nominee_photo_name" value="" class="camera_nominee_photo_name">
</div>


<button type="button" class="btn btn-default image-preview-input imageFilebox"  onclick="openCamera('camera_box_photo','nominee_photo','camera_nominee_photo_name')" data-toggle="modal" data-target="#webcamera_photo">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>



</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/signature/".$nomi_1_sig?>" class="img-responsive img-thumbnail imagebox nominee_signature" alt="Nominee Signature">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your signature</span>
<input type="file" class="browse_file" id="nominee_signature"  accept="image/png, image/jpeg, image/gif" name="nominee_signature"> <!-- rename it -->
<input type="hidden" name="camera_nominee_signature_name" value="" class="camera_nominee_signature_name">
</div>

<button type="button" class="btn btn-default image-preview-input imageFilebox"  onclick="openCamera('camera_box_signature','nominee_signature','camera_nominee_signature_name')" data-toggle="modal" data-target="#webcamera_signature">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>



</div>
</div>						 

</div>


</div>


<div class="col-md-6">                  

<span class="headerOfTitile"> Nominee: 02 </span>

<div class="micro-pos-group">
<label for="Nominee's" class="col-sm-4 control-label">Nominee's Name  (English) </label>
<div class="col-sm-8">
<input type="hidden" name="nominee_two_id" value="<?=$acc_data['data_list']->nominee_two_id?>" >
<input type="text" value="<?=$acc_data['data_list']->nominee_two_name?>" name="nominee_name_2" class="form-control"  placeholder="Nominee's Name">
<errormessage> <?=(form_error('nominee_name_2'))?form_error('nominee_name_2'):""?> </errormessage>
</div>

</div>
<div class="micro-pos-group">
<label for="Nominee Gender" class="col-sm-4 control-label">Nominee Gender </label>
<div class="col-sm-8">
<select class="form-control" name="nominee_gender_2" >
<?=OOP::selectOptionList(OOP::getGender(),$acc_data['data_list']->nominee_two_gender)?>                        
</select>  

<errormessage> <?=(form_error('nominee_gender_2'))?form_error('nominee_gender_2'):""?> </errormessage>
</div>					  
</div>			

<div class="micro-pos-group">
<label for="Father or Husband  Name" class="col-sm-4 control-label">Father/Husband Name </label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nominee_two_father_husband_name?>" name="nominee_father_husband_name_2" class="form-control"  placeholder="Father or Husband Name">
<errormessage> <?=(form_error('nominee_father_husband_name_2'))?form_error('nominee_father_husband_name_2'):""?> </errormessage>
</div>

</div>


<div class="micro-pos-group">
<label for="Age" class="col-sm-4 control-label">Age </label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nominee_two_age?>" name="nominee_age_2" class="form-control nominee_age_2" maxlength="2"   placeholder="Age" >
<errormessage> <?=(form_error('nominee_age_2'))?form_error('nominee_age_2'):""?> </errormessage>
</div>

</div>
 


<div class="micro-pos-group">
<label for="Relationship" class="col-sm-4 control-label">Relationship </label>
<div class="col-sm-8">
<select class="form-control nominee_relation_2" name="nominee_relation_2" >
<?=OOP::selectOptionList(OOP::relationShip(),$acc_data['data_list']->nominee_two_relation)?>         
</select>  					 
<errormessage> <?=(form_error('nominee_relation_2'))?form_error('nominee_relation_2'):""?> </errormessage>
</div>					  
</div>	


<div class="micro-pos-group">
<label for="Percentage_2" class="col-sm-4 control-label">Percentage (%) </label>
<div class="col-sm-8">

<input type="text" value="<?=$acc_data['data_list']->nominee_two_percentage?>"  name="percentage_2" class="form-control percentage_2"  placeholder="Percentage (%)" maxlength="3" >
<errormessage> <?=(form_error('percentage_2'))?form_error('percentage_2'):""?> </errormessage>
</div>

</div>


<?php 
$nomi_2_photo=($acc_data['data_list']->nominee_two_photo)?$acc_data['data_list']->nominee_two_photo:"default.png";
$nomi_2_sig=($acc_data['data_list']->nominee_two_signature)?$acc_data['data_list']->nominee_two_signature:"default_sig.png";

?>


<div class="micro-pos-group">
<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/photo/".$nomi_2_photo?>" class="img-responsive img-thumbnail imagebox nominee_photo_2" alt="Nominee 2 Photo">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your Photo</span>
<input type="file" class="browse_file" id="nominee_photo_2" accept="image/png, image/jpeg, image/gif" name="nominee_photo_2"> <!-- rename it -->
<input type="hidden" name="camera_nominee_photo_name_2" value="" class="camera_nominee_photo_name_2">
</div>


<button type="button" class="btn btn-default image-preview-input imageFilebox"  onclick="openCamera('camera_box_photo','nominee_photo_2','camera_nominee_photo_name_2')" data-toggle="modal" data-target="#webcamera_photo">
<span class="glyphicon glyphicon-camera"></span>
<span class="image-preview-input-title">Open Camera</span>
</button>

</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/signature/".$nomi_2_sig?>" class="img-responsive img-thumbnail imagebox nominee_signature_2" alt="Nominee 2 Signature">
</div>
<div class="col-sm-12">

<div class="btn btn-default image-preview-input imageFilebox">
<span class="glyphicon glyphicon-folder-open"></span>
<span class="image-preview-input-title">Browse your signature</span>
<input type="file" class="browse_file" id="nominee_signature_2"  accept="image/png, image/jpeg, image/gif" name="nominee_signature_2"> <!-- rename it -->
<input type="hidden" name="camera_nominee_signature_name_2" value="" class="camera_nominee_signature_name_2">
</div>



<button type="button" class="btn btn-default image-preview-input imageFilebox"  onclick="openCamera('camera_box_signature','nominee_signature_2','camera_nominee_signature_name_2')" data-toggle="modal" data-target="#webcamera_signature">
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
<option value="">Please select</option>
	 <?php 
	   foreach($upazila_list as $key)
	   {
	   ?>
		 <option class="dist_<?=$key->district_id?>" value="<?=$key->id?>" <?=($acc_data['data_list']->upazila_id==$key->id)?'selected':''?>> <?=$key->upazila_name?></option>                         
		 
	   <?php } ?>                    
</select>  					 
<errormessage> <?=(form_error('present_upazila_id'))?form_error('present_upazila_id'):""?> </errormessage>
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control present_post_office_id" name="present_post_office_id"  required="required">
<option value="">Please select</option>
 <?php 
	   foreach($post_office_list as $key)
	   {
	   ?>
		 <option class="upazila_<?=$key->upazila_id?>" value="<?=$key->id?>" <?=($acc_data['data_list']->post_office_id==$key->id)?'selected':''?>> <?=$key->post_office_name?></option>                         
		 
	   <?php } ?>                    
</select>  					 
<errormessage> <?=(form_error('present_post_office_id'))?form_error('present_post_office_id'):""?> </errormessage>
</div>
</div>	
 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control present_village_id" name="present_village_id"  required="required">
<option value="">Please select</option>
 <?php 
   foreach($village_list as $key)
   {
   ?>
	 <option class="upazila_<?=$key->post_office_id?>" value="<?=$key->id?>" <?=($acc_data['data_list']->present_address==$key->id)?'selected':''?>> <?=$key->village_name?></option>                         
	 
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
<option value="">Please select</option>
    
		 <?php 
	   foreach($upazila_list as $key)
	   {
	   ?>
		 <option class="dist_<?=$key->district_id?>" value="<?=$key->id?>" <?=($acc_data['data_list']->upazila_two_id==$key->id)?'selected':''?>> <?=$key->upazila_name?></option>                         
		 
	   <?php } ?>                    
</select>  					 
<errormessage> <?=(form_error('parmanent_upazila_id'))?form_error('parmanent_upazila_id'):""?> </errormessage>
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control parmanentcls parmanent_post_office_id" name="parmanent_post_office_id"  required="required">
<option value="">Please select</option>
 <?php 
	   foreach($post_office_list as $key)
	   {
	   ?>
		 <option class="upazila_<?=$key->upazila_id?>" value="<?=$key->id?>" <?=($acc_data['data_list']->post_office_two_id==$key->id)?'selected':''?>> <?=$key->post_office_name?></option>                         
		 
	   <?php } ?>                     
</select>  					 
<errormessage> <?=(form_error('parmanent_post_office_id'))?form_error('parmanent_post_office_id'):""?> </errormessage>
</div>
</div>	

 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name <frz>*</frz></label>
<div class="col-sm-8">
<select class="form-control parmanentcls parmanent_village_id" name="parmanent_village_id"  required="required">
<option value="">Please select</option>
 <?php 
   foreach($village_list as $key)
   {
   ?>
	 <option class="upazila_<?=$key->post_office_id?>" value="<?=$key->id?>" <?=($acc_data['data_list']->permanent_address==$key->id)?'selected':''?>> <?=$key->village_name?></option>                         
	 
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
		<label for="User Name" class="col-sm-4 control-label">User Name <frz>*</frz></label>
		<div class="col-sm-8">

		<input type="text" value="<?=$acc_data['data_list']->username?>" name="username" class="form-control username" required="required"  placeholder="User name" >
		<errormessage> <?=(form_error('username'))?form_error('username'):""?> </errormessage>
		</div>

		</div>	
		<div class="micro-pos-group">
		<label for="email" class="col-sm-4 control-label">Email Number </label>
		<div class="col-sm-8">

		<input type="text" value="<?=$acc_data['data_list']->email?>" name="email" class="form-control email"   placeholder="Email" >
		<errormessage> <?=(form_error('email'))?form_error('email'):""?> </errormessage>
		</div>

		</div>	

		<div class="micro-pos-group">
		<label for="Account Type" class="col-sm-4 control-label">Account Type  <frz>*</frz></label>
		<div class="col-sm-8">
		<select class="form-control account_type" name="account_type"  required="required">		     
		<?= OOP::selectOptionList(OOP::accountType(),$acc_data['data_list']->account_type);?>                   		
		</select>  
		<errormessage> <?=(form_error('account_type'))?form_error(account_type):""?> </errormessage>
		</div>

		</div>	

	<div class="micro-pos-group">
		<label for="Account Number" class="col-sm-4 control-label">Account Number <frz>*</frz></label>
		<div class="col-sm-8">

		<input type="text" value="<?=OOP::formate_teen_digit($acc_data['data_list']->account_number);?>" name="account_number" class="form-control account_number" rel="<?=$numbersOFaccount?>" required="required"  placeholder="Account Number" readonly>
		<errormessage> <?=(form_error('account_number'))?form_error('account_number'):""?> </errormessage>
		</div>

		</div>	
		 


		</div>
		
		
		
		<div class="col-md-6">     

	<div class="micro-pos-group">
		<label for="Area Name" class="col-sm-4 control-label">Area Name  <frz>*</frz></label>
		<div class="col-sm-8">
		<select class="form-control area_code" name="area_code"  required="required">
		   
 <?= OOP::selectOptionList(OOP::getArray($area_list, 'area_code','area_name'),$acc_data['data_list']->area_no);?>                   		
		</select>  

		<errormessage> <?=(form_error('area_code'))?form_error('area_code'):""?> </errormessage>
		</div>

		</div>	
		

		<div class="micro-pos-group">
		<label for="Society Name" class="col-sm-4 control-label">Society Name  <frz>*</frz></label>
		<div class="col-sm-8">
		<select class="form-control society_code" name="society_code"  required="required">
	<option value="">  Select </option>
		 <?php 
		   foreach($society_list as $key)
		   {
		   ?>
			 <option class="area_<?=$key->area_code?>" value="<?=$key->society_code?>" <?=($acc_data['data_list']->society_code==$key->society_code)?'selected':''?>> <?=$key->society_name?></option>                         
			 
		   <?php } ?>  
		
		</select>  

		<errormessage> <?=(form_error('society_code'))?form_error('society_code'):""?> </errormessage>
		</div>

		</div>	




		<div class="micro-pos-group">
		<label for="Reference PIN" class="col-sm-4 control-label">Reference  </label>
		<div class="col-sm-8">
<select class="form-control reference_pin_number" name="reference_pin_number"  >
		 <?php 
		 if(!empty($reference_list)){
		   foreach($reference_list as $key)
		   {
		   ?>
			 <option  value="<?=$key->id?>" <?=($acc_data['data_list']->reference_pin_number==$key->id)?'selected':''?>> <?=$key->name?></option>                         
			 
		 <?php } }else{
			 
			 echo "<option value=''>No reference</option>";
		 }?>  
		
		</select>
		<errormessage> <?=(form_error('reference_pin_number'))?form_error('reference_pin_number'):""?> </errormessage>
		</div>

		</div>

		 


		<div class="micro-pos-group">
		<label for="Short Note"" class="col-sm-4 control-label">Short Note </label>
		<div class="col-sm-8">


		<input type="text" value="<?=$acc_data['data_list']->short_note?>" name="short_note" class="form-control"  placeholder="Short Note" maxlength="180">
		<errormessage> <?=(form_error('short_note'))?form_error('short_note'):""?> </errormessage>
		</div>

		</div>

		 

		</div>
		
</div>
<div class="row borderbox">

		

 <div class="col-md-6">      
<span class="headerOfTitile"> Attachment : </span>		  
	 <span class="full_sapn">
	 <input type="checkbox" name="at_member_nid" <?=($acc_data['data_list']->at_member_nid!="")?"checked":""?> value="1" class="same_data_box" > NID Photocopy of Member.
	 </span>
	  <span class="full_sapn">
	 <input type="checkbox" name="at_nominee_nid" <?=($acc_data['data_list']->at_nominee_nid!="")?"checked":""?> value="2" class="same_data_box" > NID Photocopy of Nominee.
	 </span>
	 <span class="full_sapn">
	 <input type="checkbox" name="at_member_photo"<?=($acc_data['data_list']->at_member_photo!="")?"checked":""?> value="3"  class="same_data_box" > 1 copy Passport size photo of members.
	 </span>
	 <span class="full_sapn">
	 <input type="checkbox" name="at_nominee_photo" <?=($acc_data['data_list']->at_nominee_photo!="")?"checked":""?> value="4" class="same_data_box" > 1 copy passport size photo of Nominee.
	 </span>
	 <span class="full_sapn">
	 <input type="checkbox" name="others" <?=($acc_data['data_list']->others!="")?"checked":""?>value="5" class="same_data_box" > Others document's.
	 </span>
	 
 
 </div>
  <div class="col-md-6">      
  
		 
		<button type="submit" class="btn btn-default btn-lg margin_top_90">Update</button>
		 
  </div>

</div> 



 </form>   
    





</div> 


<div class="box-footer"> <!---box footer ---> </div>
</div> 










