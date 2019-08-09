
<div class="borderbox">

<p class="title_text">Nominee's Information <?=($checkNominee=="all")?" - 2":""?></p>

<div >
<table class="basic_table nominee_tbl">

<body>
	<tr>
		<th >Nominee's Name    </th>
		<td  > <?=$acc_data['data_list']->nominee_two_name?>  </td>
		<th></th>
		<td rowspan="6" style="text-align: right;" >  
		
		 
		<img src="<?=base_url()."documents/photo/".$acc_data['data_list']->nominee_two_photo?>"  style="border: 1px solid #000;width: 140px;height: 140px;float: right;">
		 <br>
		 <div style="flot:right">
		 <img src="<?=base_url()."documents/signature/".$acc_data['data_list']->nominee_two_signature?>" class="nominee_sig">
		 </div>
		</td>		 
	
	</tr>
	
	<tr>
		<th >Father/Husband  Name  </th>
		<td colspan="2"> <?=$acc_data['data_list']->nominee_two_father_husband_name?>	 </td>
		  
	
	</tr>
	<tr>
		<th >Nominee Gender   </th>
		<td colspan="2"> <?=isset($acc_data['data_list']->nominee_two_gender)?OOP::getGender($acc_data['data_list']->nominee_two_gender):""?>  </td>
		 
	
	</tr>
	<tr>
		<th >Age </th>
		<td colspan="2"> <?=$acc_data['data_list']->nominee_two_age?> Years</td>
		
		
	</tr>
	<tr>
		<th> Relationship </th>
		<td colspan="2"><?=isset($acc_data['data_list']->nominee_tow_relation)?OOP::relationShip($acc_data['data_list']->nominee_tow_relation):""?>  </td>
	
	</tr>
	
	<tr>
		<th >Percentage (%)  </th>
		<td colspan="2"> <?=$acc_data['data_list']->nominee_two_percentage?> 	 </td>
		 
	</tr> 
	

</tbody>

</table>

</div>

 


</div>   	
		
	