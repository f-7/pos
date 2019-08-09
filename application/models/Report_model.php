<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model
{	
	function __construct(){
		parent::__construct();

	}
    
	
	 public function getUsableAreaList(){
 
 
 
            $this->db->select('area.*');
			$this->db->from('users_profiles upro');
          
            $this->db->join('area','upro.area_no=area.area_code','inner');    
            $this->db->join('account','upro.user_id=account.user_id','inner'); 
            $this->db->where(array('account.`status`'=>1)); 
			$this->db->group_by('area.area_code'); 
			$this->db->order_by("area.area_code", "ASC");
              $query = $this->db->get();
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        } 
	
	
	
      public function getAccountsList($where_data){
 

            $this->db->select('account.account_number,account.account_type,area.area_name,society.society_name,village.village_name,upro.*');
			$this->db->from('users_profiles upro');
          
            $this->db->join('area','upro.area_no=area.area_code','inner');
            $this->db->join('society','upro.society_code=society.society_code','inner');        
            $this->db->join('account','upro.user_id=account.user_id','inner');
            $this->db->join('village','upro.present_address=village.id','inner');

             $this->db->where($where_data); 
              $query = $this->db->get();
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        } 
		
	 public function getDistributionList($where_data){


		$this->db->select('upr.name,upr.fathers_name,upr.mob,area.area_name,society.society_name,left(sws.society_code,3) area_code ,sws.* ');
		$this->db->from('staff_working_schedule sws');
	  
		$this->db->join('users_profiles upr','sws.user_id=upr.user_id','inner');
		$this->db->join('area','left(sws.society_code,3)=area.area_code','inner');        
		$this->db->join('society','sws.society_code=society.society_code','inner'); 

		 $this->db->where($where_data); 
		  $query = $this->db->get();
	   // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	} 
	
	 
  public function get_brand_category_list($where_data){


		$this->db->select('pcat.id, pcat.category_name,brand.brand_name');
		$this->db->from('brand');
	  
		$this->db->join('product_category pcat','brand.category_id=pcat.id','inner'); 

		 $this->db->where($where_data); 
		  $query = $this->db->get();
	   // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	} 
	
	
	 public function get_cat_brand_prodcut_list($where_data){


		$this->db->select('pcat.id, pcat.category_name,brand.brand_name,pnl.product_name, proi.color,proi.size');
		$this->db->from('brand');
	  
		$this->db->join('product_category pcat','brand.category_id=pcat.id','inner');
		$this->db->join('product_info proi','pcat.id=proi.category_id  and  brand.id=proi.brand_id','inner');        
		$this->db->join('product_name_list pnl','proi.product_name_id = pnl.id','inner'); 

		 $this->db->where($where_data); 
		  $query = $this->db->get();
	   // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	} 	
	
		 public function getStaffList(){


		$this->db->select('users.id,users.username,users.type, users_profiles.name,users_profiles.gender');
		$this->db->from('users');	  
		$this->db->join('users_profiles','users.id=users_profiles.user_id','inner'); 
		 $this->db->where(array('users.type'=>2)); 
		  $query = $this->db->get();
	   // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}
 
 
	 public function getStockStatus($search=null){

		
		$sql = "call sp_stock_report(?)";

	   $query =  $this->db->query($sql, array($search))  ;


	 //  echo $this->db->last_query();	   
	  
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}



	}

 public function getStaffDistributionHistory_group_area($whare_data){


		$this->db->select('users_profiles.`name`,staff_info.joing_date, staff_info.designation, area.area_name,area.area_code, society.society_name ,sws.*');
		$this->db->from('staff_working_schedule sws');	  
		$this->db->join('society','sws.society_code=society.society_code','inner'); 
		$this->db->join('area','society.area_code=area.area_code','inner');
		$this->db->join('users_profiles','sws.user_id=users_profiles.user_id','inner');	 
	 	$this->db->join('staff_info','sws.user_id=staff_info.user_id','left');	 
		$this->db->where($whare_data); 
		$this->db->group_by('area.area_code'); 
		$this->db->order_by("area.area_code", "ASC"); 
		$this->db->order_by("sws.society_code", "ASC");
		  $query = $this->db->get();
	  // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}
	
 public function getStaffDistributionHistory($whare_data){


		$this->db->select('area.area_name,area.area_code, society.society_name ,sws.*');
		$this->db->from('staff_working_schedule sws');	  
		$this->db->join('society','sws.society_code=society.society_code','inner'); 
		$this->db->join('area','society.area_code=area.area_code','inner');
		$this->db->where($whare_data); 
		$this->db->order_by("area.area_code", "ASC"); 
		$this->db->order_by("sws.society_code", "ASC");
		  $query = $this->db->get();
	   // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}	



	public function getMonthlyCollectionReport($date,$area_code){

		
		$sql = "call sp_monthly_collection_report(?,?)";

	   $query =  $this->db->query($sql, array($date,$area_code))  ;


	 //  echo $this->db->last_query();	   
	  
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}



	}


	public function getMonthlyOveralReport($date,$area_code){

		
		$sql = "call sp_monthly_overal_report(?,?)";
	   $query =  $this->db->query($sql, array($date,$area_code))  ;
	 //  echo $this->db->last_query();	   	  
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}



	}

	public function getMonthlyOveralReportAllArea($date){

		
		$sql = "call sp_monthly_overal_report_all_area(?)";
	   $query =  $this->db->query($sql, array($date))  ;
	 //  echo $this->db->last_query();	   	  
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}



	}

 public function getproductSerialNumberCheck($whare_data){


		$this->db->select(' sell_info.sell_date, sell_info.paid_amount,pcat.category_name,brand.brand_name,pnl.product_name,pro.color,pro.size,std.`status`,std.serial_no,std.created_date,sti.warranty,sti.invoice_number,sti.unit_price,sti.discount');
		$this->db->from('stock_details std');	  
		$this->db->join('stock_info sti','std.stock_id=sti.id','inner'); 
		$this->db->join('product_info pro','sti.product_id=pro.id','inner');
		$this->db->join('product_name_list pnl','pro.product_name_id=pnl.id','inner');	 
	 	$this->db->join('brand','pro.brand_id=brand.id','inner');	 
		$this->db->join('product_category pcat','pro.category_id=pcat.id','inner');
		$this->db->join('sell_details','sell_details.serial_no=std.serial_no','left');
		$this->db->join('sell_info','sell_details.invoice_id=sell_details.invoice_id','left');
		$this->db->where($whare_data); 
		$this->db->limit(1, 0); 
		  $query = $this->db->get();
	  // echo $this->db->last_query(); exit();
		if($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}

	}


	

}