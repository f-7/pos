<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sell_model extends CI_Model
{	
	function __construct(){
		parent::__construct();

	}
    
    
   

    public function getProductInfo($search=null){

            $this->db->select('stock_details.id,stock_details.serial_no,stock_details.status,stock_info.product_id,stock_info.warranty,stock_info.unit_price,brand.brand_name,product_category.category_name,product_name_list.product_name,product_info.size,product_info.color');

            $this->db->from('stock_info');
            $this->db->join('stock_details','stock_info.id=stock_details.stock_id','inner');
            $this->db->join('product_info','product_info.id=stock_info.product_id','inner');
             $this->db->join('product_name_list','product_name_list.id=product_info.product_name_id','inner');
            $this->db->join('product_category','product_category.id = product_info.category_id','inner');
            $this->db->join('brand','brand.id= product_info.brand_id','inner');
            $this->db->where('stock_details.serial_no');           

            if(!is_null($account_number)){
                $this->db->where('account.account_number',$account_number);

                $query = $this->db->get();
                if($query->num_rows() > 0) {
                    return $query->row();
                }else{
                    return false;
                }
            }


            $query = $this->db->get();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }




        public function getProductInfoBySearch($search=null){

            

            $sql = "call sp_product_search(?)";

           $query =  $this->db->query($sql, array($search))  ;


         //  echo $this->db->last_query();
           
          
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }

        /* from loan_distribution 
inner join loan_transaction on loan_transaction.loan_distribution_id=loan_distribution.id
inner join account on loan_distribution.account_number=account.account_number
inner join users_profiles on users_profiles.user_id=account.user_id 
inner join society on society.society_code=users_profiles.society_code 
inner join `area` on area.area_code=society.area_code
where  loan_transaction.collection_date='2017-12-13';*/


        public function getProductSerialNumber($sl_no){

            $this->db->select('stock_info.unit_price, stock_details.serial_no,stock_info.discount');
            $this->db->from('stock_info');
            $this->db->join('stock_details','stock_info.id=stock_details.stock_id','inner');           
            $this->db->where('stock_details.serial_no',$sl_no);  
            $this->db->where('stock_details.status',1);  
           


            $query = $this->db->get();
          //  echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->row();
            }else{
                return false;
            }



        }



        /* 
        select sell_info.invoice_id,sell_info.sell_date,sell_info.total_amount,sell_info.paid_amount,sell_info.due_amount,sell_info.discount_amount,sell_details.serial_no,sell_details.unit_price,
sell_details.discount,sell_details.total_amount,product_name_list.product_name 
from sell_info
 inner join sell_details on sell_info.invoice_id=sell_details.invoice_id
inner join stock_details on stock_details.serial_no= sell_details.serial_no
inner join stock_info on stock_info.id = stock_details.stock_id
inner join product_info on product_info.id = stock_info.product_id
inner join product_name_list on product_info.product_name_id = product_name_list.id

where sell_info.invoice_id =  201712161

        */ 

        public function getInvoiceInfo($invoice_number){

            $this->db->select('sell_info.invoice_id,sell_info.sell_date,sell_info.total_amount total_amt,sell_info.paid_amount,sell_info.due_amount,sell_info.discount_amount,sell_details.serial_no,sell_details.unit_price,
sell_details.discount,sell_details.total_amount,product_name_list.product_name');
            $this->db->from('sell_info');
            $this->db->join('sell_details','sell_info.invoice_id=sell_details.invoice_id','inner');    
            $this->db->join('stock_details','stock_details.serial_no= sell_details.serial_no','inner');    
            $this->db->join('stock_info','stock_info.id = stock_details.stock_id','inner');    
            $this->db->join('product_info','product_info.id = stock_info.product_id','inner');  
            $this->db->join('product_name_list','product_info.product_name_id = product_name_list.id','inner');           
            $this->db->where('sell_info.invoice_id',$invoice_number);  
          
           


            $query = $this->db->get();
          //  echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }



       

        public function getInvoiceNumber(){

             $this->db->select('(invoice_id+1) as num');
            $this->db->from('sell_info');
            $this->db->where("date(sell_date) =  date('".date('Y-m-d')."')"); 
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $query = $this->db->get();

          //  echo $this->db->last_query(); exit();
          
            if($query->num_rows() > 0) {
               return  $count =  $query->row()->num;
            }else{
                 return date('ymd')."001";
            }

           
        }


        public function getInvoiceList($sell_type = 'cash',$report_type="daily",$from=null,$to=null,$invoice_number=null){

            $this->db->select('sell_info.id,sell_info.invoice_id,sell_info.sell_date,sell_info.total_amount,sell_info.paid_amount,sell_info.discount_amount,sell_info.status,
loan_details.ref_id,customer_info.customer_name,customer_info.mobile');
            $this->db->from('sell_info');

            
                $this->db->join('loan_details','sell_info.invoice_id=loan_details.invoice_id','left');  
                 $this->db->join('customer_info','customer_info.invoice_id=sell_info.invoice_id','left');    
          

            if($sell_type == 'loan'){
                    $this->db->where("loan_details.ref_id>1"); 
            }
            if($sell_type == 'cash'){
                    $this->db->where("customer_info.invoice_id>1"); 
            }
            
            

           
           if(!is_null($invoice_number)){
                 $this->db->where("sell_info.invoice_id",$invoice_number);                 
                  $this->db->or_like('customer_info.customer_name',$invoice_number);
           }else{


                if($report_type == "weekly"){
                 $this->db->where("week(sell_date) = week(now())");
                }elseif($report_type == "monthly"){
                    $this->db->where("week(sell_date) = week(now())");
                }elseif($report_type == "custom"){
                     if(!is_null($from)){
                         $this->db->where("sell_date >=",$from);
                    }

                 if(!is_null($to)){
                         $this->db->where("sell_date <=",$to);
                    }   
                }else{
                    $this->db->where("date(sell_date) = date(now())");
                }
           }

            

            $this->db->order_by('sell_info.id','desc');

            $query = $this->db->get();
          // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }




        

    


	

}