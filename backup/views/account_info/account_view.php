 
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
<div class="box-header with-border">

	<h3 class="box-title show-message-titile-box"><?=($message_show)?$message_show:" Members View Account"?> </h3>
	<br>
	<a target="_blank" href="<?=base_url("report/account-opening-form?id=".$acc_data['data_list']->account_number)?>" class="gray_bg_color action_button_big" style="width:100px">Print</a>
	<a target="_blank" href="<?=base_url("report/customer-id-card?id=".$acc_data['data_list']->account_number)?>" class="gray_bg_color action_button_big" style="width:120px; margin-left: 20px;">ID Card Print</a>
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
<input type="hidden" name="account_inumber" value="<?=OOP::formate_teen_digit($acc_data['data_list']->account_number)?>">
<?=date_format(date_create($acc_data['data_list']->register_date),"d-m-Y");?>				  
</div>

</div>	

<div class="micro-pos-group">
<label for="Name" class="col-sm-4 control-label">Members Name (English) </label>
<div class="col-sm-8">
<?=strtoupper($acc_data['data_list']->name)?>
</div>

</div>

<div class="micro-pos-group">
<label for="bangla name" class="col-sm-4 control-label">Member's Name (Bangla) </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->bangla_name?>
</div>

</div>






<div class="micro-pos-group">
<label for="Date Of Birth" class="col-sm-4 control-label">Date Of Birth</label>
<div class="col-sm-8">
<?=$acc_data['data_list']->dob?>
</div>

</div>


<div class="micro-pos-group">
<label for="NID NO" class="col-sm-4 control-label">NID No</label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nid?>
</div>

</div>


<div class="micro-pos-group">
<label for="Gender" class="col-sm-4 control-label">Gender </label>
<div class="col-sm-8">
<?=OOP::getGender($acc_data['data_list']->gender)?>
 
</div>					  
</div>	

<div class="micro-pos-group">
<label for="Mobile No-1" class="col-sm-4 control-label">Mobile No-1 </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->mob?> 
</div>

</div>

<div class="micro-pos-group">
<label for="Mobile No-2" class="col-sm-4 control-label">Mobile No-2</label>
<div class="col-sm-8">
<?=$acc_data['data_list']->mob_2?>
</div>

</div>


</div>


<div class="col-md-6">                  

<div class="micro-pos-group">
<label for="Marital status" class="col-sm-4 control-label">Marital status </label>
<div class="col-sm-8">
<?=OOP::getMaritalStatus($acc_data['data_list']->marital_status)?> 
</div>

</div>	


<div class="micro-pos-group">
<label for="Spouse Name" class="col-sm-4 control-label">Spouse Name</label>
<div class="col-sm-8">
<?=$acc_data['data_list']->spouse_name?>
</div>

</div>

<div class="micro-pos-group">
<label for="Father's Name" class="col-sm-4 control-label">Father's Name </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->fathers_name?>
</div>

</div>


<div class="micro-pos-group">
<label for="Mother's Name" class="col-sm-4 control-label">Mother's Name  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->mothers_name?>
</div>

</div>


<div class="micro-pos-group">
<div class="col-sm-6">
<div class="col-sm-12">
<?php 
$mem_photo=($acc_data['data_list']->member_photo)?$acc_data['data_list']->member_photo:"default.png";
$mem_sig=($acc_data['data_list']->member_signature)?$acc_data['data_list']->member_signature:"default_sig.png";

?>

<img src="<?=base_url()."documents/photo/".$mem_photo?>" class="img-responsive img-thumbnail imagebox member_photo" alt="Member Photo">
</div>
<div class="col-sm-12">
 

</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/signature/".$mem_sig?>" class="img-responsive img-thumbnail imagebox member_signature" alt="Member Signature">
</div>
<div class="col-sm-12">
 

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
<?=$acc_data['data_list']->nominee_name?> 
</div>

</div>
<div class="micro-pos-group">
<label for="Nominee Gender" class="col-sm-4 control-label">Nominee Gender </label>
<div class="col-sm-8">
<?=isset($acc_data['data_list']->nominee_gender)?OOP::getGender($acc_data['data_list']->nominee_gender):""?> 
</div>					  
</div>			

<div class="micro-pos-group">
<label for="Father or Husband  Name" class="col-sm-4 control-label">Father/Husband  Name </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nominee_father_husband_name?>
</div>

</div>


<div class="micro-pos-group">
<label for="Age" class="col-sm-4 control-label">Age</label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nominee_age?>
</div>

</div>
 


<div class="micro-pos-group">
<label for="Relationship" class="col-sm-4 control-label">Relationship </label>
<div class="col-sm-8">
<?=isset($acc_data['data_list']->nominee_relation)?OOP::relationShip($acc_data['data_list']->nominee_relation):""?> 
</div>					  
</div>	


<div class="micro-pos-group">
<label for="Percentage" class="col-sm-4 control-label">Percentage (%) </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nominee_percentage?> 
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
 

</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/signature/".$nomi_1_sig?>" class="img-responsive img-thumbnail imagebox nominee_signature" alt="Nominee Signature">
</div>
<div class="col-sm-12">

 


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
<?=$acc_data['data_list']->nominee_two_name?> 
</div>

</div>
<div class="micro-pos-group">
<label for="Nominee Gender" class="col-sm-4 control-label">Nominee Gender </label>
<div class="col-sm-8">
<?=isset($acc_data['data_list']->nominee_two_gender)?OOP::getGender($acc_data['data_list']->nominee_two_gender):""?> 
</div>					  
</div>			

<div class="micro-pos-group">
<label for="Father or Husband  Name" class="col-sm-4 control-label">Father/Husband Name </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nominee_two_father_husband_name?>
 
</div>

</div>


<div class="micro-pos-group">
<label for="Age" class="col-sm-4 control-label">Age</label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nominee_two_age?> 
</div>

</div>
 


<div class="micro-pos-group">
<label for="Relationship" class="col-sm-4 control-label">Relationship </label>
<div class="col-sm-8">
<?=isset($acc_data['data_list']->nominee_two_relation)?OOP::relationShip($acc_data['data_list']->nominee_two_relation):""?> 
</div>					  
</div>	


<div class="micro-pos-group">
<label for="Percentage_2" class="col-sm-4 control-label">Percentage (%) </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->nominee_two_percentage?>
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
 

</div>
</div>

<div class="col-sm-6">
<div class="col-sm-12">
<img src="<?=base_url()."documents/signature/".$nomi_2_sig?>" class="img-responsive img-thumbnail imagebox nominee_signature_2" alt="Nominee 2 Signature">
</div>
<div class="col-sm-12">
 


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
<label for="Division Name" class="col-sm-4 control-label">Division Name  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->division_name?> 
</div>

</div>	

<div class="micro-pos-group">
<label for="District Name" class="col-sm-4 control-label">District Name  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->district_name?> 
</div>

</div>	

<div class="micro-pos-group">
<label for="Upazila Name" class="col-sm-4 control-label">Upazila Name  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->upazila_name?> 
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->post_office_name?>
 	
</div>
</div>	
 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->village_name?>
 	
</div>
</div>						  

</div>
 


<div class="col-md-6">                  
<span class="headerOfTitile"> Parmanent Address </span>		  


<div class="micro-pos-group">
<label for="Division Name" class="col-sm-4 control-label">Division Name  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->division_tow_name?> 
</div>

</div>	

<div class="micro-pos-group">
<label for="District Name" class="col-sm-4 control-label">District Name  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->district_two_name?> 
</div>

</div>  

<div class="micro-pos-group">
<label for="Upazila Name" class="col-sm-4 control-label">Upazila Name  </label>
<div class="col-sm-8">
<div class="col-sm-8">
<?=$acc_data['data_list']->upazila_two_name?> 
</div>

</div>	


<div class="micro-pos-group">
<label for="Post Office" class="col-sm-4 control-label">Post Office  </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->post_office_two_name?> 
</div>
</div>	

 

<div class="micro-pos-group">
<label for="Village Name" class="col-sm-4 control-label">Village Name </label>
<div class="col-sm-8">
<?=$acc_data['data_list']->village_two_name?> 
</div>
</div>						  

</div>





</div>














</div>

<div class="row borderbox">


<span class="title_gap">Official Information</span>
		<div class="col-md-6">                  

		<div class="micro-pos-group">
		<label for="Account Number" class="col-sm-4 control-label">Account Number </label>
		<div class="col-sm-8">
			<?=OOP::removeLeadingZero(OOP::formate_teen_digit($acc_data['data_list']->account_number))?>		 
		</div>
		</div>	
		
		
		<div class="micro-pos-group">
		<label for="User Name" class="col-sm-4 control-label">User Name </label>
		<div class="col-sm-8">
			<?=$acc_data['data_list']->username?>
		 
		</div>
		</div>	
		
		
		<div class="micro-pos-group">
		<label for="email" class="col-sm-4 control-label">Email Number </label>
		<div class="col-sm-8">
			<?=$acc_data['data_list']->email?>
		</div>

		</div>	

		<div class="micro-pos-group">
		<label for="Account Type" class="col-sm-4 control-label">Account Type  </label>
		<div class="col-sm-8">
			<?=OOP::accountType($acc_data['data_list']->account_type)?>		 
		</div>

		</div>	

		
		 


		</div>
		
		
		
		<div class="col-md-6">                 

		<div class="micro-pos-group">
		<label for="Area code" class="col-sm-4 control-label">Area Name  </label>
		<div class="col-sm-8">
		<?=OOP::getArray($area_list, 'area_code','area_name')[$acc_data['data_list']->area_no]?>
		 
		</div>

		</div>	
		
		<div class="micro-pos-group">
		<label for="Society Name" class="col-sm-4 control-label">Society Name  </label>
		<div class="col-sm-8">
		<?=OOP::getArray($society_list, 'society_code','society_name')[$acc_data['data_list']->society_code]?> 
		</div>

		</div>	




		<div class="micro-pos-group">
		<label for="Reference PIN" class="col-sm-4 control-label">Reference  </label>
		<div class="col-sm-8">
		<?php 
		$no_ref="<option value=''>No reference</option>";
		if($acc_data['data_list']->reference_pin_number)
		{
		
		?>
		
		
		<?=empty($reference_list)?$no_ref: isset(OOP::getArray($reference_list, 'id','name')[$acc_data['data_list']->reference_pin_number])?OOP::getArray($reference_list, 'id','name')[$acc_data['data_list']->reference_pin_number]:$no_ref?> 
 
		<?php }else{
			
			echo $no_ref;
			
		}?>
		</div>

		</div>

		 


		<div class="micro-pos-group">
		<label for="Short Note"" class="col-sm-4 control-label">Short Note </label>
		<div class="col-sm-8">
			<?=$acc_data['data_list']->short_note?>
		</div>

		</div>

		 

		</div>
		
</div>
<div class="row borderbox">

		

 <div class="col-md-6">      
<span class="headerOfTitile"> Attachment : </span>		  
	 <span class="full_sapn">
	 <?=($acc_data['data_list']->at_member_nid!="")?" NID Photocopy of Member.":""?> 
	 </span>
	  <span class="full_sapn">
	<?=($acc_data['data_list']->at_nominee_nid!="")?" NID Photocopy of Nominee.":""?>
	 </span>
	 <span class="full_sapn">
	 <?=($acc_data['data_list']->at_member_photo!="")?" 1 copy Passport size photo of members.":""?>
	 </span>
	 <span class="full_sapn">
	<?=($acc_data['data_list']->at_nominee_photo!="")?" 1 copy passport size photo of Nominee.":""?> 
	 </span>
	 <span class="full_sapn">
	<?=($acc_data['data_list']->others!="")?" Others document's.":""?>
	 </span>
	 
 
 </div>
  <div class="col-md-6">      
  
		 
  </div>

</div> 



 </form>   
    





</div> 


<div class="box-footer"> <!---box footer ---> </div>
</div> 










