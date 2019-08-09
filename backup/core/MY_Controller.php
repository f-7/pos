<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
   
   	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		$this->lang->load('tank_auth');
		 $this->checkPermitDomain();
		if (!$this->tank_auth->is_logged_in()) {									// logged in
			 setcookie("recent_load_url",$this->uri->uri_string(), time() + (30), "/");
			
			redirect('/auth/login/');
		}
		 
 
	}
   

 
  
   protected function genarateUnicKey($table,$column,$length)
  {
        $result=$this->newPasswordGenarate($length);
         $data=$this->Base_model->getQueryOneObject($table,"*",array($column=>$result));
         if(!empty($data))
         {
             $this->genarateUnicKey($table,$column,$length);
         }
         else
         {
             return $result;
         }
   }
  
   
 
  protected function checkPermitDomain()
  {  
		$domain=$_SERVER['HTTP_HOST'];
   
   // $zendArray=array('utcpabna.com','localhost','[::1]','::1:','127.0.0.1');
	  $zendArray=array('utcpabna.com','192.168.0.103','localhost','[::1]','::1:','127.0.0.1');
	 
	 if(!(in_array($domain, $zendArray)))
	  {
	    echo "You are not permitted access to this workstation at the moment<br> Please contuct your vendor . [01729-137434]";
		exit;
	  }
 
	return true;
		 
  }

   
  
}

