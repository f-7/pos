<?php 

//echo "<pre>";print_r($data['society_list'][0]);exit;

if(empty($data['society_list']))
{
	echo "<b> NO Society </b>";
}
else{
foreach($data['society_list'] as $key){
	
 	
if (!in_array($key->society_code,$data['staff_society_list']))
{	
 ?>
	<tr>
		<td rel="<?=OOP::formate_three_digit($key->area_code)?>"><?=$key->society_code?></td>
	    <td class="society_info" rel="<?=OOP::formate_five_digit($key->society_code)?>"><?=$key->society_name?></td>
	</tr>
 

<?php } } }?>