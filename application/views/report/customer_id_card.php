 <link href="<?= $this->template->Css()?>pdf_print.css" rel="stylesheet">

<div class="icard_main_div">
<div class="icard_header_div">
	<div class="icard_header_image">
	<img src="<?=base_url()."assets/images/utc-logo.png"?>" class="icard_header_logo">
	</div>
	<div class="icard_header_company_title">
	<b class="icard_header_company_name">United trade and commerce ( UTC ) </b>
	<span class="icard_span">Berhowliya Bazar,Faridpur, Pabna</span>
	</div>

</div >










 <div class="icard_body_main_div">
	<div class="icard_body_photo_main_div">
		<div class="icard_body_photo">
		
		<img src="<?=base_url()."documents/photo/".$data_list->member_photo?>" class="icard_body_photo_img">
		
		</div>
		
		<div class="icard_body_sig">
		<img src="<?=base_url()."documents/signature/".$data_list->member_signature?>" class="icard_body_sig_img">
		</div>
	
	</div>
	<div class="icard_body_table_div">
	
		<table style="width:100%">
			<thead>
				<tr>
					<td colspan="3" style="font-weight:bold"> <?=strtoupper(OOP::getFixedLenght($data_list->name,30))?></td>
				<tr>
				
			</thead>
			<tbody>
				<tr>
					<th class="icard_body_th_label">AC Number </th> 
					<td class="icard_body_th_label_short">:</td>
					<td style="text-align: left;"> AC<?=OOP::removeLeadingZero(OOP::formate_teen_digit($data_list->account_number))?></td>
				</tr>
				<tr>
					<th class="icard_body_th_label">Father </th> 
					<td class="icard_body_th_label_short">:</td>
					<td style="text-align: left;"> <?=OOP::getFixedLenght($data_list->fathers_name,30)?>  </td>
				</tr>				
				<tr>
					<th class="icard_body_th_label">Village</th> 
					<td class="icard_body_th_label_short">:</td>
					<td style="text-align: left;"> <?=OOP::getFixedLenght($data_list->village_name,30)?>  </td>
				</tr>
				<tr>
					<th class="icard_body_th_label">Upazila</th> 
					<td class="icard_body_th_label_short">:</td>
					<td style="text-align: left;"> <?=$data_list->upazila_name?>  </td>
				</tr>
				<tr>
					<th class="icard_body_th_label">Society </th> 
					<td class="icard_body_th_label_short">:</td>
					<td style="text-align: left;"> S<?=OOP::formate_five_digit($data_list->society_code)?></td>
				</tr>
			</tbody>
		</table>
	
	</div>
 
 </div>
 
 
 
 
 
 
 
 
 
 
 
 
 <div class="icard_footer_main_div">
	<p class="icard_footer_text_div">
	<!-- যে কোন পন্য ক্রয় করতে বা আপনার লেনদেন সর্ম্পকে জানতে অনুগ্রহপূর্বক কার্ডটি সঙ্গে আনবেন। -->
	<img src="<?=base_url()."assets/images/footer_img.png"?>" >
	</p>
	<p class="icard_footer_text_phone">Help Line : 01719 20 01 14</p>
 
</div>
 
</div>