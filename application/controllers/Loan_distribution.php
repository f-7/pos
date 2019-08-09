<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_distribution extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			redirect('/auth/login/');

		}

		$this->load->model('loan_distribution_model');
		$this->load->model('sell_model');
		$this->load->model('account_information_model');
		 $this->load->library('pdf');
		  $this->load->library('MC');
		
	}

	


	


	public function index()
	{
		



				$this->form_validation->set_rules('account_number', 'Account Number', 'trim|required|xss_clean');
		        $this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|xss_clean');
		         $this->form_validation->set_rules('installment_type', 'Installment type', 'trim|required|xss_clean');
		         // $this->form_validation->set_rules('installment_duration', 'Installment duration', 'trim|required|xss_clean');
		           $this->form_validation->set_rules('loan_amount', 'Loan amount', 'trim|required|xss_clean');
		            $this->form_validation->set_rules('num_of_installment', 'Number of installment', 'trim|required|xss_clean');
		             $this->form_validation->set_rules('deposit_amount', 'Depost amount', 'trim|required|xss_clean');
		        if ($this->form_validation->run()) {

		        		$post_data = OOP::input($_POST);

		        			
		        			
		        		$num_of_installment =  $post_data['loan_amount'] / $post_data['installment_amount'] ; 

		        		

		        		 
		        		 if($row = $this->loan_distribution_model->getCollectionScheduleDay($post_data['account_number'])){



				        		$this->db->trans_start();


				        	if($invoice_number = MC::createInvoice($post_data['sl'],$post_data['paid_amount'],$post_data['discount'])){

				        				MC::insertLoanDistribution($post_data,$row->working_day,$invoice_number);

				        		}
				        	

				        		if ($this->db->trans_status() === FALSE){
								        $this->db->trans_rollback();						        
								           $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">loan distribution is fail!</div>');
								            redirect('loan_distribution');
								}else{
								        $this->db->trans_commit();

								        $this->session->set_flashdata('msg', '<div class="alert alert-success col-sm-12 txt-center">Loan distribution successfully saved for '.$post_data['account_number'].'</div>');
								        OOP::log($post_data);
								        redirect('loan_distribution');
								}


							}else{

								  $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">loan distribution working day not found!</div>');
								        redirect('loan_distribution');
							}


		        		



					}

				

					$js = $this->template->Js();
					$data = array(
							'title' => " Loan distribution",
							'treeview' => 'Loan distribution',
							'treeview_menu' => 'Loan distribution'
						);


				$data['installment_type']= OOP::selectOptionList(OOP::getInstallmentType());	
				$data['installment_duration']= OOP::selectOptionList(OOP::getInstallmentDuration());	
				$data['working_day'] = OOP::selectOptionList(OOP::getDay());
				$data['temp_invoice'] = $this->general_model->getResult('temp_invoice','*',array('user_id'=> OOP::currrent_user_id()));
				 $data['reference_list'] = OOP::selectOptionList($this->account_information_model->ref_name()); 

			            $this->template->title("MC | Loan distribution")
			                ->set_layout('internal/layout2')
			                ->prepend_metadata("
			                        
			                            ")
			                ->build('loan_distribution/loan_with_sell', $data);
		
		
		
	}

	public function edit($loan_distribution_id=null)
	{
		
		
		$user_id = OOP::currrent_user_id();
		$loan_distribution_info = $this->general_model->getRow('loan_distribution','*',array('id'=>$loan_distribution_id));
		$loan_details = $this->general_model->getRow('loan_details','*',array('ref_id'=>$loan_distribution_id));
		if($loan_distribution_info->status >0){
			 $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">You not able to edit this loan This loan already approved.</div>');
								       redirect('loan_distribution');
		}


/* 
	Array ( [sl] => Array ( [0] => 0100000001 ) [discount] => 6000 [paid_amount] => 5000 [account_number] => 20600008 [issue_date] => 16-12-2017 [loan_amount] => 5000 [installment_type] => 0 [num_of_installment] => 5 [installment_amount] => 1000 [deposit_amount] => 200 [primery_deposit_amount] => )
*/

				$this->form_validation->set_rules('account_number', 'Account Number', 'trim|required|xss_clean');
		        $this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|xss_clean');
		         $this->form_validation->set_rules('installment_type', 'Installment type', 'trim|required|xss_clean');
		         // $this->form_validation->set_rules('installment_duration', 'Installment duration', 'trim|required|xss_clean');
		           $this->form_validation->set_rules('loan_amount', 'Loan amount', 'trim|required|xss_clean');
		            $this->form_validation->set_rules('num_of_installment', 'Number of installment', 'trim|required|xss_clean');
		             $this->form_validation->set_rules('deposit_amount', 'Depost amount', 'trim|required|xss_clean');
		        if ($this->form_validation->run()) {

		        		
		        		$post_data = OOP::input($_POST);
		        		

		        			
		        			
		        		$num_of_installment =  $post_data['loan_amount'] / $post_data['installment_amount'] ; 

		        		

		        		 
		        		 if($row = $this->loan_distribution_model->getCollectionScheduleDay($post_data['account_number'])){



				        		$this->db->trans_start();


				        	$invoice_number = MC::editInvoice($loan_details->invoice_id,$post_data['sl'],$post_data['paid_amount'],$post_data['discount']);


				        	MC::editLoanDistritution($loan_distribution_id,$post_data,$row->working_day);
				        	

				        		if ($this->db->trans_status() === FALSE){
								        $this->db->trans_rollback();						        
								           $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">loan distribution is fail!</div>');
								            redirect('loan_distribution/edit/'.$loan_distribution_id);
								}else{
								        $this->db->trans_commit();
								        OOP::log($post_data);

								        $this->session->set_flashdata('msg', '<div class="alert alert-success col-sm-12 txt-center">loan distribution successfully saved</div>');
								       redirect('loan_distribution/edit/'.$loan_distribution_id);
								}


							}else{

								  $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">loan distribution working day not found!</div>');
								       redirect('loan_distribution/edit/'.$loan_distribution_id);
							}


		        		



					}

				

					$js = $this->template->Js();
					$data = array(
							'title' => " Edit Loan distribution",
							'treeview' => 'Loan distribution',
							'treeview_menu' => 'Loan distribution'
						);


				
				$data['installment_duration']= OOP::selectOptionList(OOP::getInstallmentDuration());	
				$data['working_day'] = OOP::selectOptionList(OOP::getDay());
				
				

				$data['installment_type']= OOP::selectOptionList(OOP::getInstallmentType(),$loan_distribution_info->installment_type);	

				$data['info']['account_info'] = $this->loan_distribution_model->getAccountInfo($loan_distribution_info->account_number);
				$data['info']['loan_info'] = $loan_distribution_info;
			
				if($loan_details){
					
					$data['temp_invoice'] = $this->sell_model->getInvoiceInfo($loan_details->invoice_id);	
				}else{
					$data['loan'] = true;
				}

				 $data['reference_list'] = OOP::selectOptionList($this->account_information_model->ref_name(),$loan_details->user_id); 


				

				$this->general_model->getDelete('temp_invoice',array('user_id'=>$user_id));

			            $this->template->title("MC | Loan distribution")
			                ->set_layout('internal/layout2')
			                ->prepend_metadata("
			                        
			                            ")
			                ->build('loan_distribution/loan_with_sell', $data);
		
		
		
	}



	public function loan()
	{
		



				$this->form_validation->set_rules('account_number', 'Account Number', 'trim|required|xss_clean');
		        $this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|xss_clean');
		         $this->form_validation->set_rules('installment_type', 'Installment type', 'trim|required|xss_clean');
		         // $this->form_validation->set_rules('installment_duration', 'Installment duration', 'trim|required|xss_clean');
		           $this->form_validation->set_rules('loan_amount', 'Loan amount', 'trim|required|xss_clean');
		            $this->form_validation->set_rules('num_of_installment', 'Number of installment', 'trim|required|xss_clean');
		             $this->form_validation->set_rules('deposit_amount', 'Depost amount', 'trim|required|xss_clean');
		        if ($this->form_validation->run()) {

		        		$post_data = OOP::input($_POST);
		        		
		        		
		        		 
		        		 if($row = $this->loan_distribution_model->getCollectionScheduleDay($post_data['account_number'])){



				        		$this->db->trans_start();
				        		
				        		$id = MC::insertExistingLoanDistribution($post_data,$row->working_day);


				        		if ($this->db->trans_status() === FALSE){
								        $this->db->trans_rollback();						        
								           $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">loan distribution is fail!</div>');
								            redirect('loan_distribution/loan');
								}else{
								        $this->db->trans_commit();

								        $this->session->set_flashdata('msg', '<div class="alert alert-success col-sm-12 txt-center">loan distribution successfully saved</div>');
								        redirect('loan_distribution/loan');
								}


							}else{

								  $this->session->set_flashdata('msg', '<div class="alert alert-danger col-sm-12 txt-center">loan distribution working day not found!</div>');
								        redirect('loan_distribution/loan');
							}


		        		



					}

				

					$js = $this->template->Js();
					$data = array(
							'title' => " Loan distribution",
							'treeview' => 'Loan distribution',
							'treeview_menu' => 'Exsisting Loan distribution'
						);


				$data['installment_type']= OOP::selectOptionList(OOP::getInstallmentType());	
				$data['installment_duration']= OOP::selectOptionList(OOP::getInstallmentDuration());	
				$data['working_day'] = OOP::selectOptionList(OOP::getDay());
				$data['loan'] = true;
				$data['reference_list'] = OOP::selectOptionList($this->account_information_model->ref_name()); 

			            $this->template->title("MC | Loan distribution")
			                ->set_layout('internal/layout2')
			                ->prepend_metadata("
			                        
			                            ")
			                ->build('loan_distribution/loan_distribution_existing', $data);
		
		
		
	}



	public function approved_loan_list(){

			/* header config */
		$data = array(
		'title' => " Approved loan distribution list",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Approved loan distribution list',
		 'message_show'=>'',
		);	 


		
 	//$data['list'] = $this->loan_distribution_model->getLoanDitributionList(1);
 	$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(1);

 	//echo $this->db->last_query(); exit();
 	

 	$data['list_type'] = "approved";
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list', $data);


	}

	public function Pending_loan_list(){
		
		/* header config */
		$data = array(
		'title' => " Pending loan distribution list",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Pending loan distribution list',
		 'message_show'=>'',
		);	 


		//$data['list'] = $this->loan_distribution_model->getLoanDitributionList(0);
		$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(0);
		$data['list_type'] = "pending";
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list', $data);
	}

	public function completed_loan_list(){
		
		/* header config */
		$data = array(
		'title' => " Complated loan distribution list",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Completed loan distribution list',
		 'message_show'=>'',
		);	 


		//$data['list'] = $this->loan_distribution_model->getLoanDitributionList(2);
		$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(2);
	//	echo $this->db->last_query(); exit();
		$data['list_type'] = "completed";
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list', $data);
	}

	

	public function depositor_list(){
		
		/* header config */
		$data = array(
		'title' => " Only depositor list",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Only depositor list',
		 'message_show'=>'',
		);	 


		//$data['list'] = $this->loan_distribution_model->getLoanDitributionList(2);
		$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(2);
		//echo $this->db->last_query(); exit();
		$data['list_type'] = "depositor";
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list', $data);
	}

	

	public function archive_loan_list(){
		
		/* header config */
		$data = array(
		'title' => "Archive of Loan",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Archive of Loan distribution',
		 'message_show'=>'',
		);	 


		//$data['list'] = $this->loan_distribution_model->getLoanDitributionList(2);
		$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(3);
		$data['list_type'] = "archive";
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list', $data);
	}


	public function recover_loan_list(){
		
		/* header config */
		$data = array(
		'title' => " Recover loan distribution list",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'recover loan distribution list',
		 'message_show'=>'',
		);	 


		//$data['list'] = $this->loan_distribution_model->getLoanDitributionList(2);
		$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(5);
	//	echo $this->db->last_query(); exit();
		$data['list_type'] = "recover";
 
 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list', $data);
	}




	public function loan_collection(){

			/* header config */
		$data = array(
		'title' => " Loan collection",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Loan collection list',
		 'message_show'=>'',
		);	 

		$collection_date = date('Y-m-d');
		//$collection_date ='2017-12-13';
		$area = 'all';
		$society = 'all';


				 $this->form_validation->set_rules('collection_date', 'Collection date', 'trim|required|xss_clean');
		            
		        if ($this->form_validation->run()) {

		        	$post_data = OOP::input($_POST);
		        	$collection_date =  date('Y-m-d',strtotime($post_data['collection_date']));
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


		        	//$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date,$area_code,$society_code);
		        	$data['lists'] = $this->loan_distribution_model->loan_collection_schdule_txn_daily_v2($collection_date,OOP::getDayIndex(date('l',strtotime($collection_date))),$area); 

		        	//echo $this->db->last_query(); exit();

				 	$data['collection_date']= date('d-m-Y',strtotime($collection_date)) ;
				 	$data['area'] = $area;
				 	$data['society'] = $society;




		        }else{

		        	//$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date);
		        	$data['lists'] = $this->loan_distribution_model->loan_collection_schdule_daily($collection_date,OOP::getDayIndex(date('l',strtotime($collection_date))),$area); 
				 	$data['collection_date']= date('d-m-Y',strtotime($collection_date));
				 	$data['area'] = $area;
				 	$data['society'] = $society;


		        }

		        $society_wise_list = array();
		        if($data['lists']){

		        	foreach ($data['lists'] as $key => $value) {

		        		$society_wise_list[$value->society_code][] = $value;
		        		
		        	}	
		        }

		        $data['society_wise_list'] = $society_wise_list;

		       

		        


		
 	


 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

	$data['area_list']=$this->general_model->getResult('area','*');
	$data['society_list']=$this->general_model->getResult('society','*');	

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_collection_v2', $data);


	}

	public function loan_collection_edit(){

			/* header config */
		$data = array(
		'title' => " Loan collection",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Loan collection list',
		 'message_show'=>'',
		);	 

		$collection_date = date('Y-m-d');
		//$collection_date ='2017-12-13';
		$area = 'all';
		$society = 'all';


				 $this->form_validation->set_rules('collection_date', 'Collection date', 'trim|required|xss_clean');
		            
		        if ($this->form_validation->run()) {

		        	$post_data = OOP::input($_POST);
		        	$collection_date =  date('Y-m-d',strtotime($post_data['collection_date']));
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

		        	$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date);
				 	$data['collection_date']= date('d-m-Y',strtotime($collection_date));
				 	$data['area'] = $area;
				 	$data['society'] = $society;


		        }

		        $society_wise_list = array();
		        if($data['lists']){

		        	foreach ($data['lists'] as $key => $value) {

		        		$society_wise_list[$value->society_code][] = $value;
		        		
		        	}	
		        }

		        $data['society_wise_list'] = $society_wise_list;

		       

		        


		
 	


 
	/* baseic  and default configaration */
		$js = $this->template->Js();		

	$data['area_list']=$this->general_model->getResult('area','*');
	$data['society_list']=$this->general_model->getResult('society','*');	

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_collection', $data);


	}

	public function loan_collection_account_wise_v1(){

			/* header config */
		$data = array(
		'title' => " Loan collection",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Account wise collection list',
		 'message_show'=>'',
		);	 

		$data['collection_date'] = date('Y-m-d');
		
 		$society_wise_list = array();
				 $this->form_validation->set_rules('account_number', 'Account number', 'trim|required|xss_clean');
		            
		        if ($this->form_validation->run()) {
		        	$post_data = OOP::input($_POST);

		        $account_number = $post_data['account_number'];		        	
		        $data['lists'] = $this->loan_distribution_model->getLoanTransactionWithAccountWise($account_number);

		       // echo $this->db->last_query(); exit();

		       
		        if($data['lists']){

		        	foreach ($data['lists'] as $key => $value) {

		        		$society_wise_list[$value->society_code][] = $value;
		        		
		        	}	
		        }


		    }

		      
 		$data['society_wise_list'] = $society_wise_list;
	/* baseic  and default configaration */
		$js = $this->template->Js();		

	$data['area_list']=$this->general_model->getResult('area','*');
	$data['society_list']=$this->general_model->getResult('society','*');	

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_collection_account_wise', $data);


	}

	public function loan_collection_account_wise(){

			/* header config */
		$data = array(
		'title' => " Loan collection",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'Account wise collection list',
		 'message_show'=>'',
		);	 

		$data['collection_date'] = date('Y-m-d');
		
 		
				 $this->form_validation->set_rules('account_number', 'Account number', 'trim|required|xss_clean');
				 $this->form_validation->set_rules('loan_distribution_id', 'Loan distribution ', 'trim|required|xss_clean');
				 $this->form_validation->set_rules('loan_amount', 'loan amount', 'trim|required|xss_clean');
				 $this->form_validation->set_rules('confirm_loan_amount', 'confirm loan amount', 'trim|required|xss_clean|matches[loan_amount]');
				 $this->form_validation->set_rules('deposit_amount', 'Deposit amount', 'trim|required|xss_clean');
				 $this->form_validation->set_rules('confirm_deposit_amount', 'Confirm deposit amount', 'trim|required|xss_clean|matches[deposit_amount]');
		            
		        if ($this->form_validation->run()) {
		        	$post_data = OOP::input($_POST);

		        	$loan_transaction = array(
						        				'loan_distribution_id' => $post_data['loan_distribution_id'] ,
							        			 'collection_loan_amount' => $post_data['loan_amount'],
							        			  'collection_deposit_amount' => $post_data['deposit_amount'],
							        			   'collection_date' => date('Y-m-d h:i:s'),  
							        			    'pay_date' => date('Y-m-d h:i:s'),  
							        			     'collection_user_id' => OOP::currrent_user_id(),
							        			      'overdue' => 1,
							        			       'created_id' =>OOP::currrent_user_id(),
							        			       'modify_id' => OOP::currrent_user_id(),
							        			        'created_date' => date('Y-m-d h:i:s'),
							        			         'last_ip' => $this->input->ip_address(),
							        			            'status' => 1
						        			);

		        			if($this->isEixistLoanAmt($post_data['loan_distribution_id'],$post_data['loan_amount'])){
		        				 $this->session->set_flashdata('msg', '<div class="alert alert-success col-sm-12 txt-center">Collection amount is over from loan amount. Please check collection amount.  </div>');

						 		   redirect('loan-distribution/loan-collection-account-wise');
		        			}
						

						   

						   if($txn_id =  $this->general_model->insert('loan_transaction',$loan_transaction)){
						
								if($this->isLoanComplete($post_data['loan_distribution_id'])){

									$this->general_model->update('loan_distribution',array('status'=>2),array('id'=>$post_data['loan_distribution_id'],'status'=>1));	
								}
							}

						    $this->session->set_flashdata('msg', '<div class="alert alert-success col-sm-12 txt-center">Account number is '.$post_data['account_number'].'. Transaction successfully saved   </div>');

						    redirect('loan-distribution/loan-collection-account-wise');
										        

		        


		    	}

		      
 		

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_collection_account_wise_v2', $data);


	}

	public function loan_transaction(){

			if ($this->input->is_ajax_request()) {
			   
					$txn_id = (int)$this->input->post('txn_id',true);
					$dist_id = (int)$this->input->post('dist_id',true);
					$inst_amt = (int)$this->input->post('inst_amt',true);
					$deposit_amt = (int)$this->input->post('deposit_amt',true);
					$pay_date = date('Y-m-d', strtotime($this->input->post('pay_date'))).date(' h:i:s');
					$schedule_date = date('Y-m-d', strtotime($this->input->post('schedule_date')));
					$type = $this->input->post('type',true);					

					// if 

					if($txn_id == 0){
						echo "no"; exit();
					}
						$wheredata = array(
							'id' => $txn_id,
							'loan_distribution_id' => $dist_id
						);
						$data = array();

						if($inst_amt>0){
								unset($data);
							$data = array(
						        			
								   'collection_loan_amount' => $inst_amt,							      
							      // 'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => '',
							       'status' => 1
						        	
						        			);	
						}

						if($inst_amt==0 && $type == 'loan'){
							unset($data);
							$data = array(
						        			
								   'collection_loan_amount' => 0,							      
							      // 'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => 'Loan Revert',
							       'status' => 0
						        	
						        			);	
						}

						
						

						if($deposit_amt>0){

							unset($data);
							$data = array(
						        			
								  
							       'collection_deposit_amount' => $deposit_amt,
							    //   'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => '',
							       'status' => 1
						        	
						        			);	
						}

						if($deposit_amt == 0 && $type == 'deposit'){
							unset($data);
							$data = array(
						        			
								  
							       'collection_deposit_amount' => 0,
							    //   'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => 'Deposit revart',
							       'status' => 0
						        	
						        			);	
						}

					if($this->general_model->update('loan_transaction',$data,$wheredata)){
						
								if($this->isLoanComplete($dist_id)){

									$this->general_model->update('loan_distribution',array('status'=>2),array('id'=>$dist_id,'status'=>1));	
								}

						echo "ok";
					}else{
						echo "no";
					}


			}else{
				exit('No direct script access allowed');
			}
	}



	 /* public function loan_transaction(){

			if ($this->input->is_ajax_request()) {
			   
					$txn_id = (int)$this->input->post('txn_id',true);
					$dist_id = (int)$this->input->post('dist_id',true);
					$inst_amt = (int)$this->input->post('inst_amt',true);
					$deposit_amt = (int)$this->input->post('deposit_amt',true);
					$pay_date = date('Y-m-d', strtotime($this->input->post('pay_date'))).date(' h:i:s');
					$schedule_date = date('Y-m-d', strtotime($this->input->post('schedule_date')));
					$type = $this->input->post('type',true);

					// if schedule is not avilable the create a schedule for loan collection
					if(!$this->general_model->getRow('loan_transaction','id',array('loan_distribution_id'=>$dist_id,'collection_date'=>$schedule_date ))){
						//echo $this->db->last_query();

						$loan_transaction = array(
						        				'loan_distribution_id' => $dist_id ,
							        			 'collection_loan_amount' => 0,
							        			  'collection_deposit_amount' => 0,
							        			   'collection_date' => $schedule_date,    
							        			     'collection_user_id' => OOP::currrent_user_id(),
							        			      'overdue' => 0,
							        			       'created_id' =>OOP::currrent_user_id(),
							        			       'modify_id' => OOP::currrent_user_id(),
							        			        'created_date' => date('Y-m-d h:i:s'),
							        			         'last_ip' => $this->input->ip_address(),
							        			            'status' => 0
						        			);
						

						   $txn_id =  $this->general_model->insert('loan_transaction',$loan_transaction);

					}

					// if 

					if($txn_id == 0){
						echo "no"; exit();
					}
						$wheredata = array(
							'id' => $txn_id,
							'loan_distribution_id' => $dist_id
						);
						$data = array();

						if($inst_amt>0){

							$data = array(
						        			
								   'collection_loan_amount' => $inst_amt,							      
							       'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => '',
							       'status' => 1
						        	
						        			);	
						}

						if($inst_amt==0 && $type == 'loan'){

							$data = array(
						        			
								   'collection_loan_amount' => 0,							      
							       'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => 'Loan Revert',
							       'status' => 0
						        	
						        			);	
						}

						
						

						if($deposit_amt>0){

							$data = array(
						        			
								  
							       'collection_deposit_amount' => $deposit_amt,
							       'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => '',
							       'status' => 1
						        	
						        			);	
						}

						if($deposit_amt == 0 && $type == 'deposit'){

							$data = array(
						        			
								  
							       'collection_deposit_amount' => 0,
							       'pay_date' => $pay_date,
							       'collection_user_id' => OOP::currrent_user_id(),
							       //'overdue' => 0,
							       'created_id' =>OOP::currrent_user_id(),
							       'modify_id' => OOP::currrent_user_id(),
							       'created_date' => date('Y-m-d h:i:s'),
							       'last_ip' => $this->input->ip_address(),
							       'user_agent' => OOP::getUserAgent(),
							       'remark' => 'Deposit revart',
							       'status' => 0
						        	
						        			);	
						}

					if($this->general_model->update('loan_transaction',$data,$wheredata)){
						
								if($this->isLoanComplete($dist_id)){

									$this->general_model->update('loan_distribution',array('status'=>2),array('id'=>$dist_id,'status'=>1));	
								}

						echo "ok";
					}else{
						echo "no";
					}


			}else{
				exit('No direct script access allowed');
			}
	} */


	private function isLoanComplete($distribution_id){

		if($row = $this->loan_distribution_model->getLoanAndCollection($distribution_id)){

			if($row->loan_amount <= $row->collection_loan_amount){
				return true;
			}
		}
		return false;
	}

	private function isEixistLoanAmt($distribution_id,$collection_amt){

		if($row = $this->loan_distribution_model->getLoanAndCollection($distribution_id)){

			if($row->loan_amount < ($row->collection_loan_amount+$collection_amt)){
				return true;
			}
		}
		return false;
	}


	public function daily_collection_schedule(){


		/* $html =  $this->load->view('staff_info/staff_distribution_print',$data,true); 
		 $pdf = $this->pdf->load();

		$pdf->WriteHTML($html);
		$output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
		$pdf->Output("$output", 'I');

		}else{
			echo "Please First Distribution.";
			
		}  */
	}



	public function loan_collection_report(){

			/* header config */
		$data = array(
		'title' => " Loan collection",
		'treeview' => 'All Report',
		'treeview_menu' => 'Loan collection report',
		 'message_show'=>'',
		);	 

		$collection_date = date('Y-m-d');		
		$area = 'all';
		$society = 'all';


				 $this->form_validation->set_rules('collection_date', 'Collection date', 'trim|required|xss_clean');
		            
		        if ($this->form_validation->run()) {

		        	$post_data = OOP::input($_POST);
		        	$collection_date =  date('Y-m-d',strtotime($post_data['collection_date']));
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

		        	if($post_data['report_type'] == 'overdue'){

		        		$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date,$area_code,$society_code,'overdue');
		        		$data['date'] = date('d-m-Y',strtotime($collection_date));

		        	}else if($post_data['report_type'] == 'monthly'){

		        		$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date,$area_code,$society_code,'monthly');
		        		$data['date'] = date('F-Y',strtotime($collection_date));

		        	}else if($post_data['report_type'] == 'yearly'){

		        		$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date,$area_code,$society_code,'yearly');
		        		$data['date'] = date('Y',strtotime($collection_date));

		        	}else{

		        		$data['lists'] = $this->loan_distribution_model->getLoanTransaction($collection_date,$area_code,$society_code,'daily');
		        		$data['date'] = date('d-m-Y',strtotime($collection_date));
		        	}
  		//	echo $this->db->last_query(); exit();
		        	
				 	$data['collection_date']= date('d-m-Y',strtotime($collection_date)) ;
				 	$data['area'] = $area;
				 	$data['society'] = $society;
				 	$data['report_type'] = $post_data['report_type'];


				 	 $society_wise_list = array();
			        if($data['lists']){

			        	foreach ($data['lists'] as $key => $value) {

			        	//	$society_wise_list[$value->collection_date][] = $value;
			        	$society_wise_list[$value->society_code][] = $value;
			        		
			        	}	
			        }

			        $data['society_wise_list'] = $society_wise_list;




				 	 $html =  $this->load->view('loan_distribution/loan_collection_report_table',$data,true); 
					 $pdf = $this->pdf->load();

					$pdf->WriteHTML($html);
					$output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
					$pdf->Output("$output", 'I');

					




		        }

		        $data['area'] = $area;
				 	$data['society'] = $society;

 
	/* baseic  and default configaration */
	$data['collection_date']= date('d-m-Y',strtotime($collection_date)) ;
	$data['area_list']=$this->general_model->getResult('area','*');
	$data['society_list']=$this->general_model->getResult('society','*');	

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_collection_report', $data);


	}

	public function loan_distribution_report_pdf($loan_distribution_id){


			$data['account_info'] = $this->loan_distribution_model->getLoanDitributionInfo($loan_distribution_id);
			$data['loan_transaction'] = $this->loan_distribution_model->getLoanTransactionList($loan_distribution_id);
			$data['invoice'] = $this->loan_distribution_model->getProductSellInfo($loan_distribution_id);
			$data['withdrawl'] = $this->general_model->getResult("withdrawal_transaction", '*',array('account_number' => $data['account_info']->account_number,'status'=>1,'loan_distribution_id'=>$loan_distribution_id ));

			$data['ref'] = $this->loan_distribution_model->getReferenceInfo($loan_distribution_id);
			//echo $this->db->last_query(); exit();
			 //  $this->load->view('loan_distribution/loan_distribution_report_account_wise',$data); 



			 $html =  $this->load->view('loan_distribution/loan_distribution_report_account_wise',$data,true); 
					 $pdf = $this->pdf->load();

					$pdf->WriteHTML($html);
					$output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
					$pdf->Output("$output", 'I');
	}


	public function loan_approve(){
		if ($this->input->is_ajax_request()  && OOP::isAdmin()) {

				$dist_id = (int)$this->input->post('dist_id');

				$wheredata = array(
					'id'=>$dist_id
				);


				$data = array(
					'status'=>1,
					'modify_id'=>OOP::currrent_user_id(),
					'approval_date'=>date('Y-m-d h:i:s'),
					'approved_by'=>OOP::currrent_user_id()
				);


				if($this->general_model->update('loan_distribution',$data,$wheredata)){
						
							if($row = $this->general_model->getRow('loan_distribution','loan_amount',$wheredata)){
								if($row->loan_amount <1 ){

									$data['status'] = 2; // If loan amount is 0 then we consider as a depositor client.
									$this->general_model->update('loan_distribution',$data,$wheredata);			
								}
							}

						echo "ok";
					}else{
						echo "no";
					}


		}

	}

	public function loan_decline(){
		if ($this->input->is_ajax_request() && OOP::isAdmin()) {

				$dist_id = (int)$this->input->post('dist_id');

				$wheredata = array(
					'id'=>$dist_id
				);


				$data = array(
					'status'=>0,
					'modify_id'=>OOP::currrent_user_id(),
					
				);


				if($this->general_model->update('loan_distribution',$data,$wheredata)){
						echo "ok";
					}else{
						echo "no";
					}


		}

	}

	public function loan_recover_team(){
		if ($this->input->is_ajax_request() && OOP::isAdmin()) {

				$dist_id = (int)$this->input->post('dist_id');

				$account_info = $this->loan_distribution_model->getUserIdFromDistributionID($dist_id);

				$wheredata = array(
					'user_id'=>$account_info->user_id
				);


				$data = array(
					'area_no'=>'009',
					'society_code'=>'00901',
					
				);


				if($this->general_model->update('users_profiles',$data,$wheredata)){
						echo "ok";
					}else{
						echo "no";
					}


		}

	}

	public function loan_delete(){

						
			 if ($this->input->is_ajax_request() && OOP::isAdmin() ) {
			       $distribution_id = $this->input->post("distribution_id");
							 $this->db->trans_start();

							$invoice = $this->general_model->getRow("loan_details","*", array('ref_id'=>$distribution_id));

							 $this->general_model->getDelete('loan_details', array('ref_id'=>$distribution_id));
							 $this->general_model->getDelete('loan_transaction', array('loan_distribution_id'=>$distribution_id));
							$log_data['loan_distribution'] = $this->general_model->getDelete('loan_distribution', array('id'=>$distribution_id));
							
							$this->general_model->getDelete('sell_details', array('invoice_id'=>$invoice->invoice_id));
							$this->general_model->getDelete('sell_info', array('invoice_id'=>$invoice->invoice_id));

							

								if ($this->db->trans_status() === FALSE){
								        $this->db->trans_rollback();						        
								           
								}else{
								        $this->db->trans_commit();
								        echo "ok";
								        OOP::log($log_data);

								        
								}

			    } else {
			        show_error("No direct access allowed");
			       
			    }
						
	}

	public function previous_loan_history(){

		if ($this->input->is_ajax_request()) {

				$account_number = (int)$this->input->post('account_number');


			$whare_data = array(
				'account_number'=>$account_number
			);
			$data['previous_loan'] = $this->general_model->getResult('loan_distribution',$star="*",$whare_data);

			$this->load->view('loan_distribution/previous_loan_info',$data);
		}


	}

	public function loan_history(){

		if ($this->input->is_ajax_request()) {

				$account_number = (int)$this->input->post('account_number');


			$whare_data = array(
				'account_number'=>$account_number
			);
			$data['previous_loan'] = $this->general_model->getResult('loan_distribution',$star="*",$whare_data);

			$this->load->view('loan_distribution/previous_loan_info',$data);
		}


	}


	public function report_view(){



		$this->sell_model->loanDistributionReport();
	}




	public function loan_distribution_report(){

			/* header config */
		$data = array(
		'title' => " Loan distribution report",
		'treeview' => 'All Report',
		'treeview_menu' => 'Loan distribution report',
		 'message_show'=>'',
		);	 

		//$collection_date = date('Y-m-d');

		$collection_date = date('Y-m-d');
		$area = 'all';
		$society = 'all';


				 $this->form_validation->set_rules('collection_date', 'Collection date', 'trim|required|xss_clean');
		            
		        if ($this->form_validation->run()) {

		        	$post_data = OOP::input($_POST);
		        	$collection_date =  date('Y-m-d',strtotime($post_data['collection_date']));
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

		        	if($post_data['report_type'] == 'overdue'){

		        		$data['lists'] = $this->loan_distribution_model->loanDistributionReport($collection_date,$area_code,$society_code,'overdue');

		        	}else if($post_data['report_type'] == 'monthly'){

		        		$data['lists'] = $this->loan_distribution_model->loanDistributionReport($collection_date,$area_code,$society_code,'monthly');

		        	}else if($post_data['report_type'] == 'yearly'){

		        		$data['lists'] = $this->loan_distribution_model->loanDistributionReport($collection_date,$area_code,$society_code,'yearly');

		        	}else{

		        		$data['lists'] = $this->loan_distribution_model->loanDistributionReport($collection_date,$area_code,$society_code,'daily');
		        	}
  					//	echo $this->db->last_query(); exit();
		        	
				 	$data['collection_date']= date('d-m-Y',strtotime($collection_date)) ;
				 	$data['area'] = $area;
				 	$data['society'] = $society;
				 	$data['report_type'] = $post_data['report_type'];


				 	 $society_wise_list = array();
			        if($data['lists']){

			        	foreach ($data['lists'] as $key => $value) {
			        		if(isset($value->society_code)){
			        			$society_wise_list[$value->society_code][] = $value;	
			        		}
			        		
			        		
			        	}	
			        }

			        $data['society_wise_list'] = $society_wise_list;




				 	 $html =  $this->load->view('loan_distribution/loan_distribution_with_product_report',$data,true); 
					 $pdf = $this->pdf->load();

					$pdf->WriteHTML($html);
					$output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
					$pdf->Output("$output", 'I');

					




		        }

		        $data['area'] = $area;
				 	$data['society'] = $society;

 
	/* baseic  and default configaration */
	$data['collection_date']= date('d-m-Y',strtotime($collection_date)) ;
	$data['area_list']=$this->general_model->getResult('area','*');
	$data['society_list']=$this->general_model->getResult('society','*');	

		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_report_view', $data);


	}




	

	public function loan_collection_complated(){

		 if ($this->input->is_ajax_request()) {
			       $distribution_id = $this->input->post("dist_id");
			        $remark_txt = $this->input->post("remark_txt");

							 $this->db->trans_start();
							 $update_data = array(
							 	'remark'=>$remark_txt,
							 	'status'=>3,
							 	'modify_id'=>OOP::currrent_user_id()
							 );

							$invoice = $this->general_model->update("loan_distribution", $update_data,array('id'=>$distribution_id,'status'=>2));
							

								if ($this->db->trans_status() === FALSE){
								        $this->db->trans_rollback();						        
								           
								}else{
								        $this->db->trans_commit();
								        echo 'ok';

								        
								}

			    } else {
			        show_error("No direct access allowed");
			       
			    }
	}

	

	public function loan_distribution_balance(){
		
		/* header config */
		$data = array(
		'title' => " loan distribution list",
		'treeview' => 'Loan distribution',
		'treeview_menu' => 'loan distribution balance',
		 'message_show'=>'',
		);	 


		$data['list'] = $this->loan_distribution_model->getAccountLoanBalance(1);
		$data['list_type'] = "completed";
 
 
	/* baseic  and default configaration */
		$this->template->title("MC | Loan distribution")
		->set_layout('internal/layout2')
		->prepend_metadata(" ")
		->build('loan_distribution/loan_distribution_list_with_balance', $data);
	}
	


	
	public function get_account_balance(){

		if ($this->input->is_ajax_request()) {

				$account_number = (int)$this->input->post('account_number');


			$whare_data = array(
				'account_number'=>$account_number
			);
			$data['previous_loan'] = $this->general_model->getAccountBalance('loan_distribution',$star="*",$whare_data);

			$this->load->view('loan_distribution/previous_loan_info',$data);
		}


	}
	 


	
	
	
}
