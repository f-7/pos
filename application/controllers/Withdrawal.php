<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdrawal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');

		}

		$this->load->model('loan_distribution_model');
		$this->load->model('withdrawal_model');
		$this->load->model('account_information_model');
		 $this->load->library('pdf');
		  $this->load->library('MC');
		
	}

	


	


	public function index()
	{
		
			$user_id =  OOP::currrent_user_id();


	            $this->form_validation->set_rules('account_number', 'Account Number', 'trim|required|xss_clean');
		        $this->form_validation->set_rules('withdrawal_amount', 'Withdrawal amount', 'trim|required|xss_clean');
		         $this->form_validation->set_rules('deposit_amount', 'Deposit amount', 'trim|required|xss_clean');
		        
		        if ($this->form_validation->run()) {
		        		$post_data = OOP::input($_POST);

		        		 
		        		

		        		if($row =	$this->withdrawal_model->getAccountDepositBalance($post_data['account_number'],$post_data['loan_distribution_id'])){

		        			$withdrawal_data = array(
			        			'account_number'=> $row->account_number,
								'withdrawal_date'=> date('Y-m-d h:i:s',strtotime($post_data['issue_date'])),
								'withdrawal_amount'=> $post_data['withdrawal_amount'],
								'loan_distribution_id' =>$post_data['loan_distribution_id'],
								'prv_amount'=>$row->balance,
								'create_date'=> date('Y-m-d h:i:s'),
								'created_id'=> $user_id,
								'updated_id'=> $user_id,
								'IP'=>$this->input->ip_address(),
								'status'=>1
			        		);


								//$allowable_amt =  (($row->loan_amount - $row->collection_loan_amount)*10)/100;

								if( $row->balance >= $post_data['withdrawal_amount']){

									$this->db->trans_start();


						        	$this->general_model->insert('withdrawal_transaction',$withdrawal_data);

						        		if ($this->db->trans_status() === FALSE){
										        $this->db->trans_rollback();						        
										           $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">Withdrawal fail!</div>');
										            redirect('Withdrawal');
										}else{
										        $this->db->trans_commit();

										        $this->session->set_flashdata('msg', '<div class="alert alert-success col-sm-12 txt-center">Withdrawal successfully done. Amount is '.$post_data['withdrawal_amount'].'    </div>');
										        redirect('Withdrawal');
										}
								}else{

									 $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">You allowable withdrawal amount is low. allowable amount is '.$row->balance .'   </div>');
										        redirect('Withdrawal');
								}

		        			
		        		}else{

		        			 $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">Account number information not found!   </div>');
										        redirect('Withdrawal');
		        		}

				        	


							

					}

				

					$js = $this->template->Js();
					$data = array(
							'title' => "Withdrawal depost amount",
							'treeview' => 'withdrawal',
							'treeview_menu' => 'withdrawal amount'
						);



					

			            $this->template->title("MC | Withdrawal")
			                ->set_layout('internal/layout2')
			                ->prepend_metadata("
			                        
			                            ")
			                ->build('withdrawal/withdrawal', $data);
		
		
		
	}


	public function withdrawal_list(){
		
		/* header config */
		 $data = array(
		'title' => " Deposit withdrawal list",
		'treeview' => 'withdrawal',
		'treeview_menu' => 'withdrawal list',
		 'message_show'=>'',
		);	

		$data['report_type'] = "daily";
		$data['from'] = "";
		$data['to'] = "";		


			 $this->form_validation->set_rules('report_type', 'Report type', 'trim|required|xss_clean');
		        if ($this->form_validation->run()) {

		        		$post_data = OOP::input($_POST);


		        		$data['report_type'] = $post_data['report_type'];
						
					
						$from = null;
						$to = null;

						if(isset($post_data['from']) && strlen($post_data['from'])>0){
							$from = date('Y-m-d',strtotime($post_data['from']));
							$data['from'] = $post_data['from'];
						}

						if( isset($post_data['to']) && strlen($post_data['to'])>0){
							$to = date('Y-m-d',strtotime($post_data['to']));
								$data['to'] = $post_data['to'];	

						}
						
						if(strlen($post_data['account_number'])>0){
							$data['list'] = $this->withdrawal_model->getWithdrawalTransaction($data['report_type'],$from,$to,$post_data['account_number']);	

						}else{
							$data['list'] = $this->withdrawal_model->getWithdrawalTransaction($data['report_type'],$from,$to);	
						}
						


		        	}else{

		        		$data['list'] = $this->withdrawal_model->getWithdrawalTransaction();
		        	}


		
		

		$data['list_type'] = $data['report_type'] ;




 		
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Withdrawal")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('withdrawal/withdrawal_list', $data);
	}

	public function withdrawal_report(){
		
		/* header config */
		 $data = array(
		'title' => " Deposit withdrawal report",
		'treeview' => 'withdrawal',
		'treeview_menu' => 'withdrawal report',
		 'message_show'=>'',
		);	

		$data['report_type'] = "daily";
		$data['from'] = "";
		$data['to'] = "";		


			 $this->form_validation->set_rules('report_type', 'Report type', 'trim|required|xss_clean');
		        if ($this->form_validation->run()) {

		        		$post_data = OOP::input($_POST);


		        		$data['report_type'] = $post_data['report_type'];
						
					
						$from = null;
						$to = null;

						if(isset($post_data['from']) && strlen($post_data['from'])>0){
							$from = date('Y-m-d 00:00:00',strtotime($post_data['from']));
							$data['from'] = $post_data['from'];
						}

						if( isset($post_data['to']) && strlen($post_data['to'])>0){
							$to = date('Y-m-d 23:59:59',strtotime($post_data['to']));
								$data['to'] = $post_data['to'];	

						}
						
						if(strlen($post_data['account_number'])>0){
							$data['list'] = $this->withdrawal_model->getWithdrawalTransaction($data['report_type'],$from,$to,$post_data['account_number']);	

						}else{
							$data['list'] = $this->withdrawal_model->getWithdrawalTransaction($data['report_type'],$from,$to);	
						}
					
						$data['list_type'] = $data['report_type'] ;

						$html = $this->load->view('withdrawal/withdrawal_list_report',$data,true);

							$pdf = $this->pdf->load();
							//$pdf->AddPage('L');
							$pdf->WriteHTML($html);
							$output = 'account_list' . date('Y_m_d_H_i_s') . '_.pdf';
							$pdf->Output($output, 'I');
						


		        	}else{

		        		$data['list'] = $this->withdrawal_model->getWithdrawalTransaction();
		        	}


		
		

		$data['list_type'] = $data['report_type'] ;




 		
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Withdrawal")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('withdrawal/withdrawal_list_report_view', $data);
	}

	public function withdrawal_balance_list(){
		
		/* header config */
		 $data = array(
		'title' => " Deposit withdrawal list",
		'treeview' => 'withdrawal',
		'treeview_menu' => 'withdrawal balance list',
		 'message_show'=>'',
		);	

		$data['report_type'] = "daily";
		$data['from'] = "";
		$data['to'] = "";		


			 $this->form_validation->set_rules('report_type', 'Report type', 'trim|required|xss_clean');
		        if ($this->form_validation->run()) {

		        		$post_data = OOP::input($_POST);			        	
			        	$area = $post_data['area'];
			        	$society = $post_data['society'];
			        	$area_code = $post_data['area'];
			        	$society_code = $post_data['society'];


			        	if($post_data['area'] == 'all'){
			        		$area_code = null;
			        	}

			        	if($post_data['society'] == 'all'){
			        		$society_code = null;
			        	}


			        	$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date,$area_code,$society_code);
					 	$data['collection_date']= date('d-m-Y',strtotime($collection_date)) ;
					 	$data['area'] = $area;
					 	$data['society'] = $society;
						


		        	}else{

		        		$data['list'] = $this->withdrawal_model->getWithdrawalBalance();
		        	}


		
		

		$data['list_type'] = $data['report_type'] ;




 		
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Withdrawal")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('withdrawal/withdrawal_balance_list', $data);
	}


	public function withdrawal_delete(){

						
			 if ($this->input->is_ajax_request() && OOP::isAdmin() ) {
			       $id = $this->input->post("id");
							 $this->db->trans_start();

							 $update_data = array(
							 	'updated_id'=> OOP::currrent_user_id(),
							 	'status'=>0,
							 	
							 );

							 $this->general_model->update("withdrawal_transaction", $update_data,array('id'=>$id,'status'=>1));
							
								if ($this->db->trans_status() === FALSE){
								        $this->db->trans_rollback();						        
								           
								}else{
								        $this->db->trans_commit();
								        echo "ok";

								        
								}

			    } else {
			        show_error("No direct access allowed");
			       
			    }
						
	}


	
	
	
	 


	
	
	
}
