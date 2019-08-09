<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Controller {

		function __construct()
	{
		parent::__construct();
		 
		
	}
	
	
	 

	public function stock_info()
	{
		if(!OOP::isAdmin()){ redirect(''); }
		/* header config */
		$data = array(
		'title' => " Stock Information",
		'treeview' => 'Stock',
		'treeview_menu' => 'Stock Information',
		 'message_show'=>'',
		);	 
		
	 
 
		$this->form_validation->set_rules('product_id_list[]','Product name', 'required');
		$this->form_validation->set_rules('quantity[]','quantity', 'required'); 
		$this->form_validation->set_rules('unit_price[]','Unit price', 'required'); 
		$this->form_validation->set_rules('total_price[]','Total price', 'required'); 
	
				if($this->form_validation->run()) 
				{ 
					$product_list= $this->input->post('product_id_list[]');
					$quantity= $this->input->post('quantity[]');
					$unit_price= $this->input->post('unit_price[]');					
					$total_price= $this->input->post('total_price[]');
					$buy_unit_price= $this->input->post('buy_unit_price[]');
					$warranty= $this->input->post('warranty[]');
					$category_id= $this->input->post('category_id[]');
					 $insert_result=true;
					 
 
					 
					    $last_invoice_number=$this->general_model->get_last_invoice_number();
						$number_of_invoice=($last_invoice_number)?(OOP::get_explode_last_string($last_invoice_number,5)):0;
						$number_of_invoice=($number_of_invoice>0)?(intval($number_of_invoice)+1):1;
						$number_of_invoice=OOP::formate_five_digit($number_of_invoice);	
						$cur_date_sl=date('Ymd');
						$invoide_id=$cur_date_sl.$number_of_invoice;
					 
					 
					foreach($product_list as $key=>$val)
					{
						
						
						$insert_data=array(
						'product_id'=>$val,
						'quantity'=>$quantity[$key],
						'total_price'=>$total_price[$key],
						'buy_unit_price'=>$buy_unit_price[$key],
						'warranty'=>$warranty[$key],
						'unit_price'=>$unit_price[$key],
						'created_id'=>OOP::currrent_user_id(),
						'created_date'=>OOP::currrent_date_time(),
						'invoice_number'=>$invoide_id,
						);
						$stock_info_id=$this->general_model->insert('stock_info',$insert_data);
						
						
						
						for($i=0;$i<$quantity[$key];$i++){
					 
					       
						$last_serial_number=$this->general_model->get_last_serial_number();
						$number_of_serial=($last_serial_number)?(OOP::get_explode_last_string($last_serial_number,8)):0;
						$number_of_serial=($number_of_serial>0)?(intval($number_of_serial)+1):1;
						$number_of_serial=OOP::formate_eight_digit($number_of_serial);							
						$serial_id=OOP::formate_two_digit($category_id[$key]).$number_of_serial;	
							 
							 
													
							$serial_data=array(
							'stock_id'=>$stock_info_id,
							'serial_no'=>$serial_id,
							'created_id'=>OOP::currrent_user_id(),
							'created_date'=>OOP::currrent_date_time(),
							);						
							$serial_no_id=$this->general_model->insert('stock_details',$serial_data);
							
							if(!($serial_no_id) and !($stock_info_id))
							{
								$insert_result=false;
							}
						}	
					}
					 
					 
					 
				 
					if($insert_result==true)
					{
						
												
						
						$data['message_show']=OOP::success_save()." . <a style='green'>Your invoice number  is </a>  <b style='color:red'>".$invoide_id ."</b>";	
						
					}
					else{
							$data['message_show']=OOP::failed_save();	
						
						}
					
					
				}	
			
 
 
 $strlist="pcat.category_name,brand.brand_name, pnlist.product_name,pinf.* ";
 $join_list=array(
'product_category pcat'=>array('pinf.category_id=pcat.id','inner'),
'brand'=>array('pinf.brand_id=brand.id','inner'),
'product_name_list pnlist'=>array('pinf.product_name_id=pnlist.id','inner'), 
);
 
 $data['data_list']=$this->general_model->getResult('product_info pinf ',$strlist,array('pinf.status'=>1),$join_list);
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Stock Information")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('product/stock_info', $data);
            
}

 
	 

public function product_list()
{
		
	if(!OOP::isAdmin()){ redirect(''); }
		/* header config */
	$data = array(
		'title' => " Stock Information",
		'treeview' => 'Stock',
		'treeview_menu' => 'Product List',
		 'message_show'=>'',
		);	 
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Product List")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('product/product_list', $data);
            
} 		
	

 public function get_product_list()
 {
	 
 

$column_array=array('stinf.id','stinf.invoice_number','pdtcat.category_name','brand.brand_name','pdtname.product_name','stinf.quantity','stinf.unit_price','stinf.buy_unit_price','prdinf.color','prdinf.size','stinf.warranty');
$draw=intval($this->db->escape_str($this->input->post('draw')));
$limit = $this->db->escape_str($this->input->post('length'));
$start = $this->db->escape_str($this->input->post('start')); 
$order_column = $column_array[$this->db->escape_str($this->input->post('order')[0]['column'])];
$order_value = $this->db->escape_str($this->input->post('order')[0]['dir']);	
$search =$this->db->escape_str(isset($this->input->post('search')['value'])?$this->input->post('search')['value']:"");
 
	  
$str_list="stinf.*,prdinf.color,prdinf.size,prdinf.product_name_id,pdtcat.category_name,brand.brand_name,pdtname.product_name";  
$join_list=array(
'product_info prdinf'=>array('stinf.product_id=prdinf.id','inner'),
'product_category pdtcat'=>array('prdinf.category_id=pdtcat.id','inner'),
'brand'=>array('prdinf.brand_id=brand.id','inner'),
'product_name_list  pdtname'=>array('prdinf.product_name_id=pdtname.id','inner'), 
);
$where_condition="stinf.status = 1 "; 
if($search)
{	
$where_condition=$where_condition." and (";
	$i=0;
	foreach($column_array as $ukey)
	{
		
		if($i++==0){ $where_condition=$where_condition." ".$ukey." like '%".$search."%'";}
		else{ $where_condition=$where_condition." or ".$ukey." like '%".$search."%'"; }		 
	}	
$where_condition=$where_condition." )";
	
}

if($order_column==""){ $order_column='stinf.id';$order_value='DESC';}
 
$data_list=$this->general_model->getResult('stock_info stinf',$str_list,$where_condition,$join_list,"",array($order_column=>$order_value),array($limit,$start));
// echo $this->db->last_query();exit;
//$number_of_list=$this->general_model->getRow('stock_info stinf',"count(*) total_row",array('stinf.status'=>1),$join_list);
$number_of_list=$this->general_model->getRow('stock_info stinf',"count(*) total_row",$where_condition,$join_list,"",array($order_column=>$order_value));
// echo $this->db->last_query();exit;

$data_table = array();
$totalFiltered=0;		
	if($data_list)	
	{	
		
	 
		$inc_id=1;		
		foreach($data_list as $index=>$val)		
			{
				 
				$date_fix= date('d/m/Y', strtotime($val->created_date));

				
				 
				 $nestedData=array(
				  "SL"=>$inc_id++,
				  "DT_RowId"=>$val->id,
				  "delete_oparation"=>(OOP::currrent_user_type()==1)?'true':'false',
				  "category_name"=>$val->category_name,		
				   "invoice_number"=>$val->invoice_number,	
				  "brand_name"=> $val->brand_name,
				   "product_name"=> $val->product_name,
				   "color"=> OOP::getColor($val->color),
				   "size"=> $val->size,
				   "quantity"=>$val->quantity,
				   "buy_unit_price"=>($val->buy_unit_price)?$val->buy_unit_price:0.00,
				   "unit_price"=>$val->unit_price,
				   "warranty"=> $val->warranty,
				   "created_date"=>$date_fix,
				   "status"=>OOP::getStockStatusHtml($val->status),  
				 );
				  
				 $totalFiltered++;
                $data_table[] = $nestedData;
				
			}
	}
	 
	//echo "<pre>"; print_r($data_table);exit;
	
$json_data = array(
"draw"            => $draw,  
"recordsTotal"    => intval(($number_of_list)?$number_of_list->total_row:0),  
"recordsFiltered" => intval(($number_of_list)?$number_of_list->total_row:0),//intval($totalFiltered), 
"data"            => $data_table  
);
            
        echo json_encode($json_data); 
	
	 
 }

 	
 
 public function delete_product_list()
{
	$id=$this->input->post('id');
	$status=$this->input->post('status');
	

$stock_details_data=$this->general_model->getRow('stock_details','*',array('stock_id'=>$id,"status"=>0));	
if(!$stock_details_data)
{	
	$result=$this->general_model->getDelete("stock_details",array('stock_id'=>$id));
	$result=$this->general_model->getDelete("stock_info",array('id'=>$id));
}else{
	$result=false;
}	 
	 
	 if($result){
		 
		echo "done";
	 }else{
		  echo false;
	 }
 
}	

 public function view_stock_product_list()
{
	$id=$this->input->post('id');
 


 $strlist="stok.*,stockd.modify_date stock_out_date,stockd.serial_no,stockd.`status` product_status";
 $join_list=array(
'stock_details stockd'=>array('stok.id=stockd.stock_id','inner'), 
);
	 
	 
	 $result=$this->general_model->getResult("stock_info stok",$strlist,array('stok.id'=>$id),$join_list);
//echo $this->db->last_query();exit;	
	if($result){
		 $data['data_list']= $result;
		 
		 $this->load->view('ajax_file/stock_product_details',$data);
		 
		 
		 
	 }else{
		  echo false;
	 }
 
}

public function edit_stock_product()
{
		/* header config */
	$data = array(
		'title' => " Edit stock information",
		'treeview' => 'Stock',
		'treeview_menu' => 'Product List',
		 'message_show'=>'',
		);	 
 	$id=$this->input->get('id');
 

$strlist="stok.*,stockd.serial_no,stockd.`status` product_status,stockd.id stock_details_id";
 $join_list=array(
'stock_details stockd'=>array('stok.id=stockd.stock_id','inner'), 
);
 $result=$this->general_model->getResult("stock_info stok",$strlist,array('stok.id'=>$id),$join_list);
if(!$result) {echo "Sorry, your request could not be processed. Please try again";exit;}
 
 
 
 
		$this->form_validation->set_rules('product_id','Product name', 'required');
		$this->form_validation->set_rules('quantity','quantity', 'required'); 
		$this->form_validation->set_rules('unit_price','Unit price', 'required'); 
		$this->form_validation->set_rules('total_price','Total price', 'required'); 
	
				if($this->form_validation->run()) 
				{ 
					$product_id= $this->input->post('product_id');
					$quantity= $this->input->post('quantity');
					$unit_price= $this->input->post('unit_price');					
					$total_price= $this->input->post('total_price');
					$warranty= $this->input->post('warranty');
					$category_id= $this->input->post('category_id');
					$urlx=base_url("stock/edit-stock-product?id=");
					$buy_unit_price= $this->input->post('buy_unit_price');		
					
					if($quantity<1)
					{
						echo "Please set minimum quantity 1";
						echo ' <br> <a href="'.$urlx.$id.'">Back to edit page</a>';
						exit;
					}
					
					
					  $update_data=array(
						'product_id'=>$product_id,
						'quantity'=>$quantity,
						'total_price'=>$total_price,
						'warranty'=>$warranty,
						'unit_price'=>$unit_price,
						'buy_unit_price'=>$buy_unit_price,
						'modify_id'=>OOP::currrent_user_id(), 
						);
					
					//echo ":::::::::::".$quantity."==".$result[0]->quantity;exit;
					
					  $this->general_model->update('stock_info',$update_data,array('id'=>$id));
					 	
					if($quantity<$result[0]->quantity)
					{
						$quntity_lenght=$result[0]->quantity-$quantity;						
						  
						$result_detial_array=$this->general_model->getResult("stock_details","*",array('stock_id'=>$id,"status"=>1),"","",array('id'=>'DESC'),array($quntity_lenght,0));
						if($result_detial_array)
						{	
							foreach($result_detial_array as $keyd)
							{
								$this->general_model->getDelete("stock_details",array('id'=>$keyd->id));
								
							}
						}	
					}
					else if($quantity>$result[0]->quantity) 	
					{
						$quntity_lenght=$quantity-$result[0]->quantity;
						$product_id_data=$this->general_model->getRow("product_info","*",array('id'=>$product_id));
						//echo $quntity_lenght;
						for($i=0;$i<$quntity_lenght;$i++){
					 
					 
						$last_serial_number=$this->general_model->get_last_serial_number();
						$number_of_serial=($last_serial_number)?(OOP::get_explode_last_string($last_serial_number,8)):0;
						$number_of_serial=($number_of_serial>0)?(intval($number_of_serial)+1):1;
						$number_of_serial=OOP::formate_eight_digit($number_of_serial);							
						$serial_id=OOP::formate_two_digit($product_id_data->category_id).$number_of_serial;
					  
													
							$serial_data=array(
							'stock_id'=>$id,
							'serial_no'=>$serial_id,
							'created_id'=>OOP::currrent_user_id(),
							'created_date'=>OOP::currrent_date_time(),
							);						
							$serial_no_id=$this->general_model->insert('stock_details',$serial_data);
							
							 
						}
						
					}
					
					  
				  
						$result=$this->general_model->getResult("stock_info stok",$strlist,array('stok.id'=>$id),$join_list);
						$data['message_show']=OOP::success_save();	
						
					 
					
					
				}
 
 
 
 
 
 
 
 
$data['stock_details_list']= $result;
 
 
  $strlist="pcat.category_name,brand.brand_name, pnlist.product_name,pinf.* ";
 $join_list=array(
'product_category pcat'=>array('pinf.category_id=pcat.id','inner'),
'brand'=>array('pinf.brand_id=brand.id','inner'),
'product_name_list pnlist'=>array('pinf.product_name_id=pnlist.id','inner'), 
);
 
 $data['data_list']=$this->general_model->getResult('product_info pinf ',$strlist,array('pinf.status'=>1),$join_list);
 
 
 
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Stock Information")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('product/stock_info_edit', $data);
            
} 




public function get_product_serial_number()
{
		/* header config */
	$data = array(
		'title' => "Stock information",
		'treeview' => 'Stock',
		'treeview_menu' => 'Product Serial Number',
		 'message_show'=>'',
		);	 
  $data['printed_data']="";
  $data['data_requst']=false;
  $data['post_datea']=array();
 
  
		      $this->form_validation->set_rules('test_action','', 'required'); 
	
				if($this->form_validation->run()) 
				{ 
					$product_id= $this->input->post('product_id');
					$invoice_number= $this->input->post('invoice_number');
					$from_date= $this->input->post('from_date');					
					$end_date= $this->input->post('end_date'); 
					 $wheredata=array();
					 
					 if($product_id){$wheredata['stc.product_id']=$product_id;}
					 if($invoice_number){$wheredata['stc.invoice_number']=$invoice_number;}
					 
					 if($from_date !="" or  $end_date!="")
					 {
						 $from_date =($from_date)?$from_date :$end_date;
						 $end_date =($end_date)?$end_date :$from_date;
						 
						 $wheredata['date(stc.created_date)>=']=$from_date;
					    $wheredata['date(stc.created_date)<=']=$end_date;
						 
					 } 
					 
					 
					 if(!empty($wheredata))
					 {
						 $data['post_datea']=array(
						 'x_product_id'=>$product_id,
						 'x_invoice_number'=>$invoice_number,
						 'x_from_date'=>$from_date,
						 'x_end_date'=>$from_date,
						 
						 )	;
						 
					 }	 
					 				 
					 
					 $return_data=$this->general_model->get_serial_number_of_product($wheredata,empty($wheredata)?'all':'');
					// echo $this->db->last_query();exit;
					 
					 $data['printed_data']=($return_data)?$return_data:"";
					 $data['data_requst']=true;
					
				}
 
 
 
 
 
 
   $strlist="pcat.category_name,brand.brand_name, pnlist.product_name,pinf.* ";
 $join_list=array(
'product_category pcat'=>array('pinf.category_id=pcat.id','inner'),
'brand'=>array('pinf.brand_id=brand.id','inner'),
'product_name_list pnlist'=>array('pinf.product_name_id=pnlist.id','inner'), 
);
 
 $data['data_list']=$this->general_model->getResult('product_info pinf ',$strlist,array('pinf.status'=>1),$join_list);
 
 
 
 
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Product Serial Number")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('product/product_serial_number', $data);
            
} 
 

public function get_stock_status()
{
		/* header config */
	$data = array(
		'title' => "Stock information",
		'treeview' => 'Stock',
		'treeview_menu' => 'Stock status',
		 'message_show'=>'',
		);	 
  
  $data['printed_data']="";
  $data['data_requst']=false;
  $data['post_data']=array();
 
  
		      $this->form_validation->set_rules('test_action','', 'required'); 
	
				if($this->form_validation->run()) 
				{ 
					$product_id= $this->input->post('product_id');
					$invoice_number= $this->input->post('invoice_number');
					$stock_status= $this->input->post('stock_status');	 
					 $wheredata=array();
					  $having_data="";
					 if($product_id){$wheredata['sti.product_id']=$product_id;}
					 if($invoice_number){$wheredata['sti.invoice_number']=$invoice_number;}
					 if($stock_status){$wheredata['stds.`status`']=$stock_status;}
					 if($stock_status==0 and $stock_status!=""){						 
						 $having_data='sum(if(stds.`status` = 0,0,1))=0';	
					 }
					 
					// echo $stock_status;exit;
					 
					 
					 if(!empty($wheredata) or ($having_data!=""))
					 {
						 $data['post_data']=array(
						 'x_product_id'=>$product_id,
						 'x_invoice_number'=>$invoice_number,
						 'x_status'=>$stock_status, 					 
						 )	;
						 
					 }	 
								 
					 
					 $return_data=$this->general_model->get_stock_status($wheredata,$having_data);
				  //echo $this->db->last_query();exit;
					 
					 $data['printed_data']=($return_data)?$return_data:"";
					 $data['data_requst']=true;
					
				}
 
 
 
 
 
 
   $strlist="pcat.category_name,brand.brand_name, pnlist.product_name,pinf.* ";
 $join_list=array(
'product_category pcat'=>array('pinf.category_id=pcat.id','inner'),
'brand'=>array('pinf.brand_id=brand.id','inner'),
'product_name_list pnlist'=>array('pinf.product_name_id=pnlist.id','inner'), 
);
 
 $data['data_list']=$this->general_model->getResult('product_info pinf ',$strlist,array('pinf.status'=>1),$join_list);
 
 
 
 
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Stock status")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('product/get_stock_status', $data);
            
} 

	
}
