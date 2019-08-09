<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_report extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		
		 $this->load->library('pdf');
		 $this->load->library('Barcode');
		$this->load->model("report_model");
		$this->load->model("loan_distribution_model");
	
	}
	
	
public function account_information()
{
	$data = array(
		'title' => " Account List",
		'treeview' => 'All Report',
		'treeview_menu' => 'Account Report',
		 'message_show'=>'',
		 'retun_message_show'=>'',
		);
	
	
	 $data['area_list']=$this->report_model->getUsableAreaList();
	 $data['society_list']=$this->general_model->getResult('society','*');
 

	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Account Report")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('all_report/account_info_report', $data);

	
}	 

public function account_information_print()
{
	
$area_no=$this->input->get('area_code');
$society_code=$this->input->get('society_code');	

$where_data=array("account.`status`"=>1);
if($area_no){$where_data['upro.area_no']=$area_no;}
if($society_code){$where_data['upro.society_code']=$society_code;}

$result=$this->report_model->getAccountsList($where_data);
//echo $this->db->last_query();exit;
$new_data=array();
foreach($result as $key)
{
	$new_data[$key->society_code][]=$key;
	
}

if(!$result){OOP::window_close();}
$data['data_list']=$new_data;

	
 //$this->load->view('all_report/account_info_report_print',$data);

 
 
$html=$this->load->view('all_report/account_info_report_print',$data,true);	
$pdf = $this->pdf->load();
$pdf->WriteHTML($html);
$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
$pdf->Output($output, 'I');
 		
}


public function staff_distribution()
{
	$data = array(
		'title' => "Staff Distribution",
		'treeview' => 'All Report',
		'treeview_menu' => 'Staff Distribution',
		 'message_show'=>'',
		 'retun_message_show'=>'',
		);
	
	
	 $data['area_list']=$this->report_model->getUsableAreaList(); 

	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Distribution Report")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('all_report/staff_distribution', $data);

	
}


public function staff_distribution_print()
{
	
$area_no=$this->input->get('area_code');
 

$where_data=array("sws.`status`"=>1,"left(sws.society_code,3)"=>$area_no); 

$result=$this->report_model->getDistributionList($where_data);
//echo $this->db->last_query();exit;
$new_data=array();
foreach($result as $key)
{
	$new_data[$key->society_code][]=$key;
	
}

if(!$result){OOP::window_close();}
$data['data_list']=$new_data;

	
$this->load->view('all_report/staff_distribution_print',$data);

 
$html=$this->load->view('all_report/staff_distribution_print',$data,true);	
$pdf = $this->pdf->load();
$pdf->WriteHTML($html);
$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
$pdf->Output($output, 'I');
 	
}


public function stock_information()
{
	$data = array(
		'title' => "Stock Information",
		'treeview' => 'All Report',
		'treeview_menu' => 'Stock Status',
		 'message_show'=>'',
		 'retun_message_show'=>'',
		);
	
	
	 $data['category_list']=$this->general_model->getResult("product_category"); 

	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Stock Report")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('all_report/stock_info', $data);

	
}

 
public function stock_information_print()
{
	 
$category_id=$this->input->get('category_id');
 
 
$result=$this->report_model->getStockStatus($category_id);
 if(!$result){OOP::window_close();}
$new_data=array();
foreach($result as $key)
{
	$new_data[$key->brand_id][]=$key;
	
}
 
$data['data_list']=$new_data;
//$this->load->view('all_report/stock_info_print',$data);

 
$html=$this->load->view('all_report/stock_info_print',$data,true);	
$pdf = $this->pdf->load();
$pdf->WriteHTML($html);
$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
$pdf->Output($output, 'I');
 
}



public function product_check()
{
	$data = array(
		'title' => "Stock Information",
		'treeview' => 'All Report',
		'treeview_menu' => 'Product Check',
		 'message_show'=>'',
		 'data_list'=>'',
		);
		
		
		$this->form_validation->set_rules('serial_no','Serial No', 'required'); 

		

				if($this->form_validation->run()) 
				{ 
					$serial_no=$this->input->post('serial_no');
					$result=$this->report_model->getproductSerialNumberCheck(array('std.serial_no'=>$serial_no));
					//echo $this->db->last_query();exit;
					if($result)
					{
						//echo "<pre>";print_r($result[0]);exit;
						
						$data['data_list']=$result;						
					}else{
						$data['message_show']="<b style='color:red'> Product Not Found !</b>";
					}	
				}
				
				
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Stock Report")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('all_report/product_check', $data);

	
}

  


public function staff_distribution_history()
{
	$data = array(
		'title' => "Staff Distribution History",
		'treeview' => 'All Report',
		'treeview_menu' => 'Staff Distribution History',
		 'message_show'=>'',
		 'retun_message_show'=>'',
		);
	
	
	 $data['staff_list']=$this->report_model->getStaffList(); 

	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("ERP | Distribution History Report")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('all_report/staff_distribution_history', $data);

	
}


public function staff_distribution_history_print()
{
	
$staff_id=$this->input->get('staff_id');
 

$where_data=array("sws.user_id"=>$staff_id); 

$result=$this->report_model->getStaffDistributionHistory($where_data);
 if(!$result){OOP::window_close();}
$data['data_list']=$result;
$data['area_list']=$this->report_model->getStaffDistributionHistory_group_area($where_data);
	
$this->load->view('all_report/staff_distribution_history_print',$data);

 
$html=$this->load->view('all_report/staff_distribution_history_print',$data,true);	
$pdf = $this->pdf->load();
$pdf->WriteHTML($html);
$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
$pdf->Output($output, 'I');
 	 
}



public function monthly_report()
{
	$data = array(
		'title' => "Monthly report",
		'treeview' => 'All Report',
		'treeview_menu' => 'Monthly report',
		 'message_show'=>'',
		 'retun_message_show'=>'',
		);

 	$data['list'] = false;
		
		$area = 'all';
		$report_type = 'all';

		 $this->form_validation->set_rules('collection_date', 'Collection date', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('area', 'Area', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('report_type', 'Report type', 'trim|required|xss_clean');

		    $society_wise = array();
		        if ($this->form_validation->run()) {

		        	$post_data = OOP::input($_POST);
		        	$collection_date =  date('Y-m-d',strtotime($post_data['collection_date']));
		        	$area = $post_data['area'];

		        	$data['collection_date'] = $collection_date;

		        	if($post_data['report_type'] =="collection"){
		        		 $result = $this->report_model->getMonthlyCollectionReport($collection_date,$area); 
		        	}

		        	if($post_data['report_type'] =="overall"){
		        		 $result = $this->report_model->getMonthlyOveralReport($collection_date,$area); 
		        	}

		        	if($post_data['report_type'] =="collection_schedule"){
		        		// $result = $this->loan_distribution_model->loan_collection_schdule($collection_date,$area); 
		        		  $result = $this->loan_distribution_model->loan_collection_schdule_txn_monthly($collection_date,$area_code); 
		        	}

		        	if($post_data['report_type'] =="collection_schedule_daily"){
		        		// $result = $this->loan_distribution_model->loan_collection_schdule_daily($collection_date,OOP::getDayIndex(date('l',strtotime($collection_date))),$area); 
		        		 $result = $this->loan_distribution_model->loan_collection_schdule_txn_daily_v2($collection_date,OOP::getDayIndex(date('l',strtotime($collection_date))),$area); 

		        		 
		        	}

		        	if($post_data['report_type'] =="loan_collection"){
		        		 $result = $this->loan_distribution_model->getLoanCollection($collection_date,$area); 
		        	}


		        	if($post_data['report_type'] == "daily_loan_collection"){
		        		 $result = $this->loan_distribution_model->getLoanCollection($collection_date,$area,'daily'); 

		        	}

		        	if($result){

		        		foreach ($result as $key => $value) {
		        		   
		        			$society_wise[$value->society_code][] = $value; 
		        		}	

		        		$data['society_wise_list'] = $society_wise;
		        		$data['report_type'] = $post_data['report_type'];


		        		if($post_data['report_type'] =="collection"){
		        		 	$html = $this->load->view('all_report/monthly_collection_report',$data,true);
							$pdf = $this->pdf->load();
							$pdf->AddPage('L');
							$pdf->WriteHTML($html);
							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I');
		        		}

		        		if($post_data['report_type'] =="overall"){
		        			$html = $this->load->view('all_report/monthly_overall_report',$data,true);
							$pdf = $this->pdf->load();
							$pdf->AddPage('L');
							$pdf->WriteHTML($html);
							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I');
						}



						if($post_data['report_type'] =="collection_schedule"){
							//$html = $this->load->view('all_report/monthly_collection_schedule',$data);
							$data['report_title'] = "Monthly collection schedule of ".date('F-Y',strtotime($collection_date));
		        			$html = $this->load->view('all_report/monthly_collection_schedule_v2',$data,true);
							$pdf = $this->pdf->load();
							$pdf->AddPage('L');
							$pdf->WriteHTML($html);

							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I'); 
		        		}
		        		if($post_data['report_type'] =="collection_schedule_daily"){
							//$html = $this->load->view('all_report/monthly_collection_schedule',$data);
							$data['report_title'] = "Daily collection schedule of ".date('d-F-Y(l)',strtotime($collection_date));
		        			$html = $this->load->view('all_report/daily_collection_schedule',$data,true);
		        			//echo $this->db->last_query(); exit();
							$pdf = $this->pdf->load();
							$pdf->AddPage('L');
							$pdf->WriteHTML($html);

							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I'); 
		        		}

		        		if($post_data['report_type'] =="loan_collection"){

		        			$data['report_title'] = "Monthly loan and deposit collection report of ".date('F-Y');
		        			//$html = $this->load->view('all_report/monthly_loan_collection_report',$data,false);
		        			
		        			$html = $this->load->view('all_report/monthly_loan_collection_report',$data,true);
							$pdf = $this->pdf->load();
							
							$pdf->WriteHTML($html);

							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I'); 	 
		        		}

		        		if($post_data['report_type'] =="daily_loan_collection"){

		        			$data['report_title'] = "Daily loan and deposit collection report of ".date('d F Y',strtotime($collection_date));
		        			//$html = $this->load->view('all_report/monthly_loan_collection_report',$data,false);
		        			
		        			$html = $this->load->view('all_report/monthly_loan_collection_report',$data,true);
							$pdf = $this->pdf->load();
							
							$pdf->WriteHTML($html);

							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I'); 	 
		        		}
		        		
		        		

		        		
		        	}


		        	

		        }else{



		        	/* baseic  and default configaration */
		        	$data['area'] = $area;
					
					$data['area_list']=$this->general_model->getResult('area','*');	

					$this->template->title("MC | Monthly report")
					->set_layout('internal/layout2')
					->prepend_metadata(" ")
					->build('all_report/monthly_report', $data);

		        }
	
	
	

	

	
}



public function loan_distribution_report()
{
	$data = array(
		'title' => "Area wise loan distribution report",
		'treeview' => 'All Report',
		'treeview_menu' => 'Area wise loan distribution',
		 'message_show'=>'',
		 'retun_message_show'=>'',
		);

 	$data['list'] = false;
		
		$area = 'all';
		$report_type = 'all';

		$type_array = array(0=>"Pending loan distribution",
							1 => "Approved loan distribution",
							2 => "Completed loan distribution",
							3 => "Archived loan distribution"
							);

		 
		  $this->form_validation->set_rules('report_type', 'Report type', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('area', 'Area', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('society', 'Society', 'trim|required|xss_clean');

		    $society_wise = array();
		        if ($this->form_validation->run()) {

		        	$post_data = OOP::input($_POST);
		        	$area = $post_data['area'];
		        	$society = $post_data['society'];
		        	$form = null;
		        	$to = null;

		        	$data['report_title'] = $type_array[$post_data['report_type']];

		        	if($post_data['area'] == "all"){
		        		$area = null;
		        	}
		        	if($post_data['society'] == "all"){
		        		$society = null;
		        	}

		        	if(strlen($post_data['from'])>1){
		        		$form = date('Y-m-d',strtotime($post_data['from']));

		        		$data['report_title']= $data['report_title']." from ".$post_data['from'];
		        	}

		        	if(strlen($post_data['to'])>1){
		        		$to = date('Y-m-d',strtotime($post_data['to']));;
		        		$data['report_title']= $data['report_title']." to ".$post_data['to'];
		        	}

		        	$society_wise_list = array();

		        	$result = $this->loan_distribution_model->getAccountLoanBalanceAreaWise($post_data['report_type'],$area,$society,$form,$to);
		        	if($result){
		        		foreach ($result as $key => $value) {

		        		$society_wise_list[$value->society_code][] = $value;
		        		
		        	}	

		        	$data['society_wise_list'] = $society_wise_list; 

		        	//$html = $this->load->view('all_report/area_wise_loan_distribution_print',$data,false);
		        	 $html = $this->load->view('all_report/area_wise_loan_distribution_print',$data,true);
							$pdf = $this->pdf->load();
							$pdf->WriteHTML($html);
							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I'); 
		        		
		        	}else{
		        		echo "No data are available";
		        	}
		        	
		        	

		        }else{



		        	/* baseic  and default configaration */
		        	$data['area_list']=$this->general_model->getResult('area','*');
					$data['society_list']=$this->general_model->getResult('society','*');	

					$this->template->title("MC | Monthly report")
					->set_layout('internal/layout2')
					->prepend_metadata(" ")
					->build('all_report/area_wise_loan_distribution', $data);

		        }
	
	
	

	

	
}





	

}