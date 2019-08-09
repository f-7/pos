<?php 
$this->load->view('layouts/internal/pdf_print_header');
 
?>

<h3 style=" text-align:center;border-bottom:1px solid #ccc">Members Account Opening Form</h3>
<div></div>


 <div class="borderbox">

<span class="title_gap">Basic Information</span>

<table class="basic_table">

<body>
	<tr>
		<th >Date  </th>
		<td colspan="2"> <?=date_format(date_create($acc_data['data_list']->register_date),"d-m-Y");?>	 </td>
		
		<td rowspan="3"  >  
		
		<img src="<?=base_url()."documents/photo/".$acc_data['data_list']->member_photo?>"  style="border: 1px solid #000;width: 140px;height: 140px;float: right;">
		
		</td>
		 
	
	</tr>
	<tr>
		<th >Members Name (English)  </th>
		<td colspan="2"> <?=$acc_data['data_list']->name?>	 </td>
		 
	
	</tr>
	<tr>
		<th >Member's Name (Bangla)  </th>
		<td colspan="2"> <?=$acc_data['data_list']->bangla_name?>	 </td>
		  
	
	</tr>
	<tr>
		<th >Father's Name  </th>
		<td> <?=$acc_data['data_list']->fathers_name?>	 </td>
		
		<th> Mother's Name  </th>
		<td><?=$acc_data['data_list']->mothers_name?> </td>
	
	</tr>
	<tr>
		<th >Date Of Birth  </th>
		<td> <?=date("d-m-Y", strtotime($acc_data['data_list']->dob));?>	 </td>
		<th >Gender</th>
		<td> <?=OOP::getGender($acc_data['data_list']->gender)?> </td>
		
	
	</tr>
	<tr>
		<th> NID No </th>
		<td><?=$acc_data['data_list']->nid?>  </td>
		
		<th> Mobile No </th>
		<td><?=$acc_data['data_list']->mob?>  </td>
	
	</tr>
	<tr>
		<th >Marital status  </th>
		<td> <?=OOP::getMaritalStatus($acc_data['data_list']->marital_status)?> 	 </td>
		
		<th> Spouse Name </th>
		<td><?=$acc_data['data_list']->spouse_name?></td>
	
	</tr>
	

</tbody>

</table>



</div>   
	

<?php 
$data=array();
 
if($acc_data['data_list']->nominee_name!="" and $acc_data['data_list']->nominee_two_name!="")
{	$data['checkNominee']="all";
 
}else if($acc_data['data_list']->nominee_name!="" or $acc_data['data_list']->nominee_two_name!=""){
	$data['checkNominee']=($acc_data['data_list']->nominee_name)?'one':'two';
}	
?>

<?php 
if(empty($data))
{?>
<div class="borderbox">
<span class="title_gap">Nominee's Information </span>
<h5 style="text-align:center">No nominee entry</h5>
</div>
 
<?php 
}
else if($data['checkNominee']=="all")	
{	

 $this->load->view('report/nominee_info/nominee_one',$data);
 $this->load->view('report/nominee_info/nominee_two',$data);
 
 }else if($data['checkNominee']=="one")
 {  
		
$this->load->view('report/nominee_info/nominee_one',$data);
 }else{ 
$this->load->view('report/nominee_info/nominee_two',$data);
 }
 ?>
	
	
 <div class="borderbox">

<span class="title_gap">Address Information</span>

	 
	<table class="basic_table">

	<body>
		 
		<tr>
			<th >Village Name  </th>
			<td> <?=$acc_data['data_list']->village_name?>	 </td>
			 <td style="border-left:1px solid black;padding-right:5px"></td>
			<th >Village Name  </th>
			<td> <?=$acc_data['data_list']->village_two_name?>	 </td>
			 
		</tr>
		<tr>
			<th >Post Office </th>
			<td> <?=$acc_data['data_list']->post_office_name?>	 </td>
			 <td style="border-left:1px solid black;padding-right:5px"></td>
			<th >Post Office </th>
			<td> <?=$acc_data['data_list']->post_office_two_name?>	 </td>
		
		</tr>
		<tr>
			<th> Upazila Name  </th>
			<td><?=$acc_data['data_list']->upazila_name?>   </td>
			 <td style="border-left:1px solid black;padding-right:5px"></td>
			<th> Upazila Name  </th>
			<td><?=$acc_data['data_list']->upazila_two_name?>   </td>
			 
		</tr>
		<tr>
			<th >District Name  </th>
			<td> <?=$acc_data['data_list']->district_name?> 	 </td>
			 <td style="border-left:1px solid black;padding-right:5px"></td>
			 <th >District Name  </th>
			<td> <?=$acc_data['data_list']->district_two_name?> 	 </td>
			 
			 
		</tr>
		

	</tbody>

	</table>

	 

</div>   
	
	
	
	
		
 <div class="borderbox">

<span class="title_gap">Official Information</span>

	 
	<table class="basic_table">

	<body>
		 
		<tr>
			<th >Account Number </th>
			<td> <?=$acc_data['data_list']->account_number?> </td> 
			<th >Reference   </th>
			<td>	<?php 
						$no_ref="<option value=''>No reference</option>";
						if($acc_data['data_list']->reference_pin_number)
						{
						
						?>
						
						
						<?=empty($reference_list)?$no_ref: isset(OOP::getArray($reference_list, 'id','name')[$acc_data['data_list']->reference_pin_number])?OOP::getArray($reference_list, 'id','name')[$acc_data['data_list']->reference_pin_number]:$no_ref?> 
				 
						<?php }else{
							
							echo $no_ref;
							
						}?>
			</td>
			 
		</tr>
		<tr>
			
			<th >Area Name   </th>
			<td>	<?=OOP::getArray($area_list, 'area_code','area_name')[$acc_data['data_list']->area_no]?>	 </td>
			 <th >Society Name </th>
			<td> <?=OOP::getArray($society_list, 'society_code','society_name')[$acc_data['data_list']->society_code]?>  </td> 
		</tr>
	 
			<tr>
			
			<th >Responsible Officers :   </th>
			<td>	 </td>
		    			
			<th >Managers Signature :   </th>
			<td>	 </td>
		   </tr>
		   
		    <tr>			
			<th >Managing Directors Signature :  </th>
			<td colspan="3">	 </td>
		   </tr>
		
		
		
	</tbody>

	</table>

	 

</div>   
	
	
	
	
 <div class="borderbox">

<span class="title_gap">Attachment:</span>

	 
	<table class="basic_table">

	<body>
 
			<tr>
				<td colspan="4">
					1. <?=($acc_data['data_list']->at_member_nid!="")?" NID Photocopy of Member.":""?> 
				</td>
			</tr>
			<tr>
				<td colspan="4">
					2. <?=($acc_data['data_list']->at_nominee_nid!="")?" NID Photocopy of Nominee.":""?>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					3. <?=($acc_data['data_list']->at_member_photo!="")?" 1 copy Passport size photo of members.":""?> 
				</td>
			</tr>
			<tr>
				<td colspan="4">
					4. <?=($acc_data['data_list']->at_nominee_photo!="")?" 1 copy passport size photo of Nominee.":""?> 
				</td>
			</tr>
			<tr>
				<td colspan="4">
					5. <?=($acc_data['data_list']->others!="")?" Others document's.":""?>
				</td>
			</tr>
			 
			 
			 
		
	</tbody>

	</table>

	 

</div>   
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<?php 
$this->load->view('layouts/internal/pdf_print_footer');
 
?>

 
 
 
 
 
 
 