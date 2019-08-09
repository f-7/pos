<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loan_distribution_model extends CI_Model
{	
	function __construct(){
		parent::__construct();

	}
    
     public function getLoanDitributionList($stauts) {
      

         $query = $this->db->query('call sp_loan_distribution(?)',array((int)$stauts));
        if($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

    public function getDailyCollectionSchedule(){



    }

    public function getCollectionScheduleDay($account_number=null){

            $this->db->select('account.account_number,account.loan_balance,account.deposit_balance,account.status,users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,users_profiles.mob,
society.society_code,society.society_name,area.area_code,area.area_name,staff_working_schedule.working_day');

            $this->db->from('account');
            $this->db->join('users_profiles','account.user_id=users_profiles.user_id ','inner');
            $this->db->join('staff_working_schedule','users_profiles.society_code = staff_working_schedule.society_code','inner');
             $this->db->join('users_profiles staff','staff_working_schedule.user_id=staff.user_id','inner');
            $this->db->join('society','society.society_code = staff_working_schedule.society_code ','inner');
            $this->db->join('area','area.area_code= society.area_code','inner');
            $this->db->where('staff_working_schedule.status=1');           

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




        public function getAccountInfo($account_number=null){

            $this->db->select('account.account_number,account.user_id,account.deposit_balance,account.loan_balance,users_profiles.name,users_profiles.fathers_name,users_profiles.mothers_name,users_profiles.spouse_name,users_profiles.marital_status,users_profiles.gender,users_profiles.dob,users_profiles.member_photo,
village.id village_id,village.village_name,village.post_office_id, post_office.post_office_name,post_office.upazila_id,upazila.upazila_name,upazila.district_id,district.district_name,district.divsion_id,division.division_name,society.society_code,society.society_name,area.area_code,area.area_name,staff_working_schedule.working_day,staff.name staff_name');


            $this->db->from('account');
            $this->db->join('users_profiles','account.user_id=users_profiles.user_id','inner');
            $this->db->join('village','users_profiles.present_address = village.id','inner');
            $this->db->join('post_office','village.post_office_id=post_office.id','inner');
            $this->db->join('upazila','post_office.upazila_id = upazila.id','inner');
            $this->db->join('district','upazila.district_id=district.id','inner');
            $this->db->join('division','division.id = district.divsion_id','inner');
            $this->db->join('society','users_profiles.society_code = society.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
            $this->db->join('staff_working_schedule','users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1','inner');
            $this->db->join('users_profiles staff','staff_working_schedule.user_id=staff.user_id','inner');

            $this->db->where('staff_working_schedule.status=1');           

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

        /* from loan_distribution 
inner join loan_transaction on loan_transaction.loan_distribution_id=loan_distribution.id
inner join account on loan_distribution.account_number=account.account_number
inner join users_profiles on users_profiles.user_id=account.user_id 
inner join society on society.society_code=users_profiles.society_code 
inner join `area` on area.area_code=society.area_code
where  loan_transaction.collection_date='2017-12-13';*/


        public function getLoanTransaction($collection_date=null, $area=null,$society=null,$report_type=null){

            $this->db->select('loan_transaction.loan_distribution_id,loan_transaction.collection_loan_amount,loan_transaction.collection_deposit_amount,loan_transaction.id loan_transaction_id,loan_transaction.collection_date,loan_transaction.pay_date,loan_transaction.status,loan_transaction.overdue,users_profiles.mob,users_profiles.user_id,users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,account.account_number,account.account_type,account.deposit_balance,account.loan_balance,account.status,society.society_code,society.society_name,area.area_code,area.area_name,
loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.issue_date,loan_distribution.installment_amount,staff.name staff_name');


            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_transaction.loan_distribution_id=loan_distribution.id','inner');
            $this->db->join('account','loan_distribution.account_number=account.account_number','inner');
            $this->db->join('users_profiles','users_profiles.user_id=account.user_id ','inner');        
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
            $this->db->join('staff_working_schedule','users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1','inner');
            $this->db->join('users_profiles staff','staff_working_schedule.user_id=staff.user_id','inner');
           
            $this->db->where('loan_distribution.status',1);  
             
           //  $this->db->where('loan_distribution.status',$status); 
             

             if(!is_null($collection_date) &&  $report_type == 'daily'){
                $this->db->where('loan_transaction.collection_date',$collection_date);  
             }

             if(!is_null($collection_date) &&  is_null($report_type)){
                $this->db->where('loan_transaction.collection_date',$collection_date);  
             }
             
             if(!is_null($area)){
                $this->db->where('area.area_code',$area); 
             }  

             if(!is_null($society)){
                $this->db->where('society.society_code',$society); 
             }  

             if(!is_null($report_type) && $report_type == 'monthly'){
                $this->db->where('month(loan_transaction.collection_date)',date('m',strtotime($collection_date)));  
             }

             if(!is_null($report_type) && $report_type == 'yearly'){
                $this->db->where('year(loan_transaction.collection_date)',date('Y',strtotime($collection_date)));  
             }

             if(!is_null($report_type) && $report_type == 'overdue'){
                $this->db->where('loan_transaction.status',0);  
                $this->db->where('loan_transaction.collection_date <=',$collection_date); 
             }       



            $query = $this->db->get();
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }




        public function getLoanTransactionWithAccountWise($account_number){

            $this->db->select('loan_distribution.loan_paid_amt,loan_transaction.loan_distribution_id,loan_transaction.collection_loan_amount,loan_transaction.collection_deposit_amount,loan_transaction.id loan_transaction_id,loan_transaction.collection_date,loan_transaction.pay_date,loan_transaction.status,loan_transaction.overdue,users_profiles.mob,users_profiles.user_id,users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,account.account_number,account.account_type,account.deposit_balance,account.loan_balance,account.status,society.society_code,society.society_name,area.area_code,area.area_name,
loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.issue_date,loan_distribution.installment_amount,staff.name staff_name');


            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_transaction.loan_distribution_id=loan_distribution.id','inner');
            $this->db->join('account','loan_distribution.account_number=account.account_number','inner');
            $this->db->join('users_profiles','users_profiles.user_id=account.user_id ','inner');        
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
            $this->db->join('staff_working_schedule','users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1','inner');
            $this->db->join('users_profiles staff','staff_working_schedule.user_id=staff.user_id','inner');
           
            $this->db->where('(loan_distribution.status=1 or loan_distribution.status=2) ');  
            //$this->db->or_where('loan_distribution.status',2);  
             $this->db->where('account.account_number',$account_number);

            $query = $this->db->get();      
           // echo $this->db->last_query(); exit();    
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }

        function getLoanTransactionWithAccountWiseV2($account_number){


            $sql = "SELECT account.deposit_balance, loan_distribution.loan_paid_amt,loan_distribution.exsiting_issue_date, staff_working_schedule.society_code staff_society_code,staff_working_schedule.working_day,`loan_distribution`.`id`, `loan_distribution`.`issue_date`,
 `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`, `loan_distribution`.`account_number`,
 `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, 
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, 
`area`.`area_code`, `area`.`area_name`, `society`.`society_code`, `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, 
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,loan_transaction.collection_loan_amount txn_coll_loan,loan_transaction.collection_deposit_amount txn_coll_deposit, loan_transaction.id txn_id,loan_transaction.collection_date 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1 
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id 
WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 ) and account.account_number=?
  GROUP BY `loan_transaction`.`id`";

         $query = $this->db->query($sql,array($date,$working_day,$area_code));

           // echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }



        public function getLoanCollection($collection_date=null, $area=null,$type='monthly'){

            $this->db->select('loan_transaction.loan_distribution_id,loan_transaction.collection_loan_amount,loan_transaction.collection_deposit_amount,loan_transaction.id loan_transaction_id,loan_transaction.collection_date,loan_transaction.pay_date,loan_transaction.status,loan_transaction.overdue,users_profiles.mob,users_profiles.user_id,users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,account.account_number,account.account_type,account.deposit_balance,account.loan_balance,account.status,society.society_code,society.society_name,area.area_code,area.area_name,
loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.issue_date,loan_distribution.installment_amount,staff.name staff_name');


            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_transaction.loan_distribution_id=loan_distribution.id','inner');
            $this->db->join('account','loan_distribution.account_number=account.account_number','inner');
            $this->db->join('users_profiles','users_profiles.user_id=account.user_id ','inner');        
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
            $this->db->join('staff_working_schedule','users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1','inner');
            $this->db->join('users_profiles staff','staff_working_schedule.user_id=staff.user_id','inner');
           
            $this->db->where('loan_distribution.status',1);  
            if($type == "monthly"){

                $this->db->where('month(loan_transaction.pay_date)',date('m',strtotime($collection_date))); 
              $this->db->where('year(loan_transaction.pay_date)',date('Y',strtotime($collection_date)));     
            }

            if($type == "daily"){

                $this->db->where('date(loan_transaction.pay_date)',date('Y-m-d',strtotime($collection_date))); 
                  
            }
             
           //  $this->db->where('loan_distribution.status',$status); 
             if(!is_null($area)){
                $this->db->where('area.area_code',$area); 
             }

             

            $query = $this->db->get();
          //  echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }



            /* 

            select loan_distribution.id,loan_distribution.account_number,loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.issue_date,loan_distribution.installment_type,loan_distribution.installment_amount,loan_distribution.number_of_istallment,loan_distribution.status,loan_distribution.approval,
sum(loan_transaction.collection_loan_amount) collection_loan_amount, sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,area.area_name,area.area_code,society.society_code,society.society_name,
up.name staff,users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,staff_working_schedule.working_day

 from loan_distribution 
inner join loan_transaction on loan_distribution.id=loan_transaction.loan_distribution_id 
inner join account on account.account_number = loan_distribution.account_number
inner join users_profiles on users_profiles.user_id=account.user_id
inner join society on society.society_code=users_profiles.society_code
inner join `area` on area.area_code=society.area_code
inner join staff_working_schedule on staff_working_schedule.society_code = society.society_code
inner join users_profiles up on up.user_id= staff_working_schedule.user_id 
group by loan_distribution.id

            */


        public function getLoanTransactionReport($collection_date=null, $area=null,$society=null,$report_type=null){

            $this->db->select('loan_distribution.id,loan_distribution.account_number,loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.issue_date,loan_distribution.installment_type,loan_distribution.installment_amount,loan_distribution.number_of_istallment,loan_distribution.status,loan_distribution.approval,
sum(loan_transaction.collection_loan_amount) collection_loan_amount, sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,area.area_name,area.area_code,society.society_code,society.society_name,
up.name staff,users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,staff_working_schedule.working_day');


            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_transaction.loan_distribution_id=loan_distribution.id','inner');
            $this->db->join('account','loan_distribution.account_number=account.account_number','inner');
            $this->db->join('users_profiles','users_profiles.user_id=account.user_id ','inner');        
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
            $this->db->join('staff_working_schedule','users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1','inner');
            $this->db->join('users_profiles staff','staff_working_schedule.user_id=staff.user_id','inner');
           
            $this->db->where('loan_distribution.status',1);  

            $this->db->group_by('loan_distribution.id');
           //  $this->db->where('loan_distribution.status',$status); 
             

             if(!is_null($collection_date) &&  $report_type == 'daily'){
              
                  $this->db->where('staff_working_schedule.working_day',$collection_date); 
             }

            $query = $this->db->get();
          //  echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }


       

        public function getLoanDitributionInfo($loan_distribution_id){


            $this->db->select('users_profiles.mob,users_profiles.user_id,users_profiles.name,users_profiles.fathers_name,account.account_number,account.account_type,account.deposit_balance,account.loan_balance,account.status,society.society_code,society.society_name,area.area_code,area.area_name,
loan_distribution.account_number,loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.issue_date,loan_distribution.installment_type,loan_distribution.installment_duration,loan_distribution.number_of_istallment,loan_distribution.status,loan_distribution.approved_by,loan_distribution.installment_amount');


            $this->db->from('loan_distribution');
          
            $this->db->join('account','loan_distribution.account_number=account.account_number','inner');
            $this->db->join('users_profiles','users_profiles.user_id=account.user_id ','inner');        
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');

             $this->db->where('loan_distribution.id',$loan_distribution_id);  

              $query = $this->db->get();
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->row();
            }else{
                return false;
            }

        }

        public function getLoanTransactionList($loan_distribution_id){


            $this->db->select('loan_transaction.loan_distribution_id,loan_transaction.collection_loan_amount,loan_transaction.collection_deposit_amount,loan_transaction.collection_date,loan_transaction.pay_date');


            $this->db->from('loan_transaction');
             $this->db->where('loan_transaction.loan_distribution_id',$loan_distribution_id);  

              $query = $this->db->get();
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }
        }



       

            public function getProductSellInfo($loan_distribution_id){


            $this->db->select('loan_details.invoice_id,sell_details.serial_no,sell_details.unit_price,sell_info.discount_amount,sell_info.paid_amount,sell_info.total_amount,sell_info.sell_date,product_name_list.product_name,brand.brand_name,product_info.color,product_info.size');


            $this->db->from('loan_details');
          
            $this->db->join('sell_details','loan_details.invoice_id=sell_details.invoice_id','inner');
            $this->db->join('stock_details','stock_details.serial_no=sell_details.serial_no','inner');        
            $this->db->join('sell_info','loan_details.invoice_id=sell_info.invoice_id','inner');
            $this->db->join('stock_info','stock_info.id=stock_details.stock_id','inner');
            $this->db->join('product_info','product_info.id=stock_info.product_id','inner');
            $this->db->join('product_name_list','product_name_list.id=product_info.product_name_id','inner');
            $this->db->join('brand','brand.id= product_info.brand_id','inner');

             $this->db->where('loan_details.ref_id',$loan_distribution_id);  

              $query = $this->db->get();
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        
        }



        public function loanDistributionReport($collection_date=null, $area=null,$society=null,$report_type=null){

       
            $this->db->select("users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,account.account_number,society.society_code,society.society_name,area.area_code,area.area_name,loan_distribution.issue_date,
loan_distribution.loan_amount,loan_distribution.deposit_amount,sell_details.serial_no,sell_details.invoice_id,up.name staff,product_name_list.product_name");
             $this->db->from('loan_distribution');
            $this->db->join('loan_details','loan_distribution.id= loan_details.ref_id','inner');    
            $this->db->join('sell_details','loan_details.invoice_id = sell_details.invoice_id','inner'); 

           
            $this->db->join('stock_details','stock_details.serial_no=sell_details.serial_no','inner');        
            $this->db->join('sell_info','loan_details.invoice_id=sell_info.invoice_id','inner');
            $this->db->join('stock_info','stock_info.id=stock_details.stock_id','inner');
            $this->db->join('product_info','product_info.id=stock_info.product_id','inner');
            $this->db->join('product_name_list','product_name_list.id=product_info.product_name_id','inner');

             $this->db->join('account','loan_distribution.account_number=account.account_number','inner');   
              $this->db->join('users_profiles','users_profiles.user_id=account.user_id','inner');   
               $this->db->join('society','society.society_code=users_profiles.society_code','inner');   
                $this->db->join('area','area.area_code=society.area_code','inner');   
                 $this->db->join('staff_working_schedule','staff_working_schedule.society_code = society.society_code and staff_working_schedule.status=1','inner');   
                  $this->db->join('users_profiles up','up.user_id = staff_working_schedule.user_id','inner');   

        $this->db->where("loan_distribution.status",1);
        $this->db->order_by('area.area_code',"asc");


             if(!is_null($collection_date) &&  $report_type == 'daily'){
                $this->db->where('loan_distribution.issue_date',$collection_date);  
             }

             if(!is_null($collection_date) &&  is_null($report_type)){
                $this->db->where('loan_transaction.collection_date',$collection_date);  
             }
             
             if(!is_null($area)){
                $this->db->where('area.area_code',$area); 
             }  

             if(!is_null($society)){
                $this->db->where('society.society_code',$society); 
             }  

             if(!is_null($report_type) && $report_type == 'monthly'){
                $this->db->where('month(loan_distribution.issue_date)',date('m',strtotime($collection_date)));  
             }

             if(!is_null($report_type) && $report_type == 'yearly'){
                $this->db->where('year(loan_distribution.issue_date)',date('Y',strtotime($collection_date)));  
             }

             



            $query = $this->db->get();

            echo $this->db->last_query(); exit();


           
          
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }




        public function getAccountBalance($account_number){

          
            $sql = "SELECT `loan_distribution`.`issue_date`, `loan_distribution`.`id`, `loan_distribution`.`account_number`, `users_profiles`.`name`, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, `area`.`area_code`, `area`.`area_name`,
 `society`.`society_code`, `society`.`society_name`, `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, 
sum(loan_transaction.collection_loan_amount) collection_loan_amount, sum(loan_transaction.collection_deposit_amount) collection_deposit_amount, 
withdrawal_txn.withdrawal_amount
FROM `loan_distribution`
INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id`
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number`
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id`
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code`
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code`
LEFT JOIN (select sum(withdrawal_amount) withdrawal_amount,loan_distribution_id from withdrawal_transaction where account_number=? and `status` = 1 group by loan_distribution_id) withdrawal_txn

 ON `withdrawal_txn`.`loan_distribution_id`=`loan_distribution`.`id`
WHERE `loan_transaction`.`status` = 1
AND `loan_distribution`.`status` >0
AND `account`.`account_number` = ?
GROUP BY `loan_distribution`.`id`";  

            $query = $this->db->query($sql,array($account_number,$account_number));
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }

        public function getAccountWithLoanDistribution($account_number){

          
            $sql = "SELECT `loan_distribution`.`issue_date`, `loan_distribution`.`id`, `loan_distribution`.`account_number`, `users_profiles`.`name`, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, `area`.`area_code`, `area`.`area_name`,
 `society`.`society_code`, `society`.`society_name`, `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`
FROM `loan_distribution`
INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id`
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number`
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id`
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code`
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code`
WHERE `loan_distribution`.`status` =1 AND `account`.`account_number` = ?
GROUP BY `loan_distribution`.`id` HAVING loan_distribution.loan_amount > sum(loan_transaction.collection_loan_amount)";  

            $query = $this->db->query($sql,array($account_number));
           // echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }

        public function getAccountBalance_backup($account_number=null){

            /* 
 select loan_distribution.account_number, users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,area.area_code,area.area_name,society.society_code,society.society_name ,loan_distribution.loan_amount,loan_distribution.deposit_amount,sum(loan_transaction.collection_loan_amount) collection_loan_amount,
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,sum(withdrawal_transaction.withdrawal_amount) withdrawal_amount
 from loan_distribution 
inner join loan_transaction on loan_distribution.id=loan_transaction.loan_distribution_id
inner join account on account.account_number=loan_distribution.account_number
inner join users_profiles on users_profiles.user_id=account.user_id
inner join society on society.society_code=users_profiles.society_code
inner join `area` on area.area_code=society.area_code
left join withdrawal_transaction on withdrawal_transaction.account_number=account.account_number
where loan_transaction.status=1 and loan_distribution.status=1
group by loan_distribution.account_number
            */ 

            $this->db->select('loan_distribution.issue_date,loan_distribution.id,loan_distribution.account_number, users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,area.area_code,area.area_name,society.society_code,society.society_name ,loan_distribution.loan_amount,loan_distribution.deposit_amount,sum(loan_transaction.collection_loan_amount) collection_loan_amount,
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,sum(withdrawal_transaction.withdrawal_amount) withdrawal_amount');

            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_distribution.id=loan_transaction.loan_distribution_id','inner');
            $this->db->join('account','account.account_number=loan_distribution.account_number','inner');
             $this->db->join('users_profiles','users_profiles.user_id=account.user_id','inner');
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
            $this->db->join('withdrawal_transaction','withdrawal_transaction.account_number=account.account_number','left');
          //  $this->db->where('withdrawal_transaction.status',1); 
            $this->db->where('loan_transaction.status',1); 
            $this->db->where('loan_distribution.status>0');    
            $this->db->group_by('loan_distribution.id');           
            
            

            if(!is_null($account_number)){
                $this->db->where('account.account_number',$account_number);

                $query = $this->db->get();
                echo $this->db->last_query();
                if($query->num_rows() > 0) {
                    return $query->result();
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


         public function getAccountLoanBalance($status= null,$account_number=null){


            $sql = "select t.*,sum(withdrawal_transaction.withdrawal_amount) withdrawal_amount from (

SELECT `account`.`deposit_balance`, `loan_distribution`.`id`, `loan_distribution`.`issue_date`, `loan_distribution`.`installment_type`, 
`loan_distribution`.`number_of_istallment`, `loan_distribution`.`account_number`, `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, 
`loan_distribution`.`installment_amount`, `users_profiles`.`name`, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, `area`.`area_code`, 
`area`.`area_name`, `society`.`society_code`, `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount,
 sum(loan_transaction.collection_deposit_amount) collection_deposit_amount 
FROM `loan_distribution` 
INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
WHERE `loan_distribution`.`status` = ? GROUP BY `loan_distribution`.`id` ) t

left join withdrawal_transaction on t.id = withdrawal_transaction.loan_distribution_id and withdrawal_transaction.status=1
group by t.id";


                $query = $this->db->query($sql,array($status));

                   // echo $this->db->last_query(); exit(); 
                    if($query->num_rows() > 0) {
                        return $query->result();
                    }else{
                        return false;
                    }
         }



        public function getAccountLoanBalance_old($status= null,$account_number=null){

          

            $this->db->select('account.deposit_balance,loan_distribution.id,loan_distribution.issue_date, loan_distribution.installment_type,loan_distribution.number_of_istallment,loan_distribution.account_number,
loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.installment_amount,
 users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,area.area_code,area.area_name,society.society_code,society.society_name ,
sum(loan_transaction.collection_loan_amount) collection_loan_amount,
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount');

            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_distribution.id=loan_transaction.loan_distribution_id','inner');
            $this->db->join('account','account.account_number=loan_distribution.account_number','inner');
             $this->db->join('users_profiles','users_profiles.user_id=account.user_id','inner');
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');
          //  $this->db->join('withdrawal_transaction','withdrawal_transaction.account_number=account.account_number','left');
          //  $this->db->where('loan_transaction.status',1); 
            $this->db->where('loan_distribution.status',$status);    
            $this->db->group_by('loan_distribution.id');   
            
            

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
           // echo $this->db->last_query(); exit();     
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }


        function getLoanAndCollection($dist_id){

            $this->db->select('loan_distribution.loan_amount,sum(loan_transaction.collection_loan_amount)collection_loan_amount');

            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_distribution.id=loan_transaction.loan_distribution_id','inner');
            $this->db->where('loan_transaction.status',1); 
            $this->db->where('loan_distribution.id',$dist_id); 
             $query = $this->db->get();
                if($query->num_rows() > 0) {
                    return $query->row();
                }else{
                    return false;
                }
        }



        public function getLoanChartData($date = null){

            $this->db->select('sum(loan_distribution.loan_amount) as loan_amount, area.area_name');
            $this->db->from('loan_distribution');
            $this->db->join('account','loan_distribution.account_number=account.account_number','inner');
            $this->db->join('users_profiles','users_profiles.user_id = account.user_id','inner');
            $this->db->join('society','society.society_code = users_profiles.society_code','inner');
            $this->db->join('area','area.area_code = society.area_code','inner');            
            $this->db->where('loan_distribution.status>0'); 
            $this->db->group_by('area.area_code');  

            if(!is_null($date)){
                $this->db->where('month(loan_distribution.issue_date)',date('m',strtotime($date)));
                $this->db->where('year(loan_distribution.issue_date)',date('Y',strtotime($date))); 
            }

            $query = $this->db->get();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }


         public function getLoanChartDateWise(){

            $this->db->select('count(*) as loan_count,UNIX_TIMESTAMP(loan_distribution.issue_date)*1000 issue_date');
            $this->db->from('loan_distribution');                     
            $this->db->where('loan_distribution.status>0'); 
            $this->db->group_by('date(issue_date)');  

            $query = $this->db->get();
            //echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }


         public function getCurrenMonthCollectionProgress($current_date){

            
            $sql = "select t.area_code,t.area_name,sum(installment_amount) installment_amount, sum(collection_loan_amount) collection_loan_amount,
            sum(deposit_amount) deposit_amount,sum(collection_deposit_amount) collection_deposit_amount  from (
select area.area_code,area.area_name,sum(loan_distribution.installment_amount) installment_amount, 0 collection_loan_amount,
            sum(loan_distribution.deposit_amount) deposit_amount,0 collection_deposit_amount
 from loan_distribution inner join loan_transaction on loan_distribution.id= loan_transaction.loan_distribution_id
inner join account on account.account_number = loan_distribution.account_number
inner join users_profiles on users_profiles.user_id = account.user_id
inner join `area` on area.area_code = users_profiles.area_no
where month(loan_transaction.collection_date) = month(?) and year(loan_transaction.collection_date) = year(?)
group by users_profiles.area_no

union all 
select area.area_code,area.area_name,0 installment_amount, sum(loan_transaction.collection_loan_amount) collection_loan_amount,
            0 deposit_amount,sum(loan_transaction.collection_deposit_amount) collection_deposit_amount
 from loan_distribution inner join loan_transaction on loan_distribution.id= loan_transaction.loan_distribution_id
inner join account on account.account_number = loan_distribution.account_number
inner join users_profiles on users_profiles.user_id = account.user_id
inner join `area` on area.area_code = users_profiles.area_no
where month(loan_transaction.pay_date) = month(?) and year(loan_transaction.pay_date) = year(?)
group by users_profiles.area_no) t group by t.area_code";  

            $query = $this->db->query($sql,array($current_date,$current_date,$current_date,$current_date));
            //echo $this->db->last_query(); exit();
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }



        public function getAccountLoanBalanceAreaWise($status= null,$area_code=null,$society_code=null,$form=null,$to=null){

            

            $this->db->select('loan_distribution.id,loan_distribution.issue_date, loan_distribution.installment_type,loan_distribution.number_of_istallment,loan_distribution.account_number,
loan_distribution.loan_amount,loan_distribution.deposit_amount,loan_distribution.installment_amount,loan_distribution.loan_paid_amt,
 users_profiles.name,users_profiles.fathers_name,users_profiles.spouse_name,area.area_code,area.area_name,society.society_code,society.society_name ,
sum(loan_transaction.collection_loan_amount) collection_loan_amount,
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount');

            $this->db->from('loan_distribution');
            $this->db->join('loan_transaction','loan_distribution.id=loan_transaction.loan_distribution_id','inner');
            $this->db->join('account','account.account_number=loan_distribution.account_number','inner');
             $this->db->join('users_profiles','users_profiles.user_id=account.user_id','inner');
            $this->db->join('society','society.society_code=users_profiles.society_code','inner');
            $this->db->join('area','area.area_code=society.area_code','inner');          
            $this->db->where('loan_distribution.status',$status);    

            if(!is_null($area_code)){
                $this->db->where('area.area_code',$area_code);    
            }

            if(!is_null($society_code)){
                $this->db->where('society.society_code',$society_code);    
            }

            if(!is_null($form)){
                $this->db->where('loan_distribution.issue_date >=',$form);    
            }

            if(!is_null($to)){
                $this->db->where('loan_distribution.issue_date <=',$to);    
            }


            $this->db->group_by('loan_distribution.id');           
            $query = $this->db->get();

           // echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }



        }


        function loan_collection_schdule($date,$area_code){


            $sql = " SELECT account.deposit_balance,schedule_date.schedule_date,`loan_distribution`.`id`, `loan_distribution`.`issue_date`, `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`,
 `loan_distribution`.`account_number`, `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, loan_distribution.loan_paid_amt,
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, `area`.`area_code`, `area`.`area_name`, `society`.`society_code`,
 `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, sum(loan_transaction.collection_deposit_amount) collection_deposit_amount
 FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
inner join (select * from (select loan_distribution.id,loan_distribution.account_number,GROUP_CONCAT(date(loan_transaction.collection_date)) schedule_date from loan_distribution 
inner join loan_transaction on loan_distribution.id=loan_transaction.loan_distribution_id where month(loan_transaction.collection_date) = month(?) and  year(loan_transaction.collection_date) = year(?)
group by loan_distribution.id ) t) schedule_date on loan_distribution.id = schedule_date.id
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id`
 INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code`
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id
 WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 ) and area.area_code=? GROUP BY `loan_distribution`.`id`";

         $query = $this->db->query($sql,array($date,$date,$area_code));

           // echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }


        function loan_collection_schdule_daily($date,$working_day,$area_code){


            $sql = "SELECT staff_working_schedule.society_code,staff_working_schedule.working_day,`loan_distribution`.`id`, `loan_distribution`.`issue_date`, `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`,loan_distribution.loan_paid_amt,
 `loan_distribution`.`account_number`, `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, 
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, `area`.`area_code`, `area`.`area_name`, `society`.`society_code`,
 `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, sum(loan_transaction.collection_deposit_amount) collection_deposit_amount
 FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id`
 INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code`
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id
 WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 ) and (loan_distribution.installment_type=0 or  (loan_distribution.installment_type=1 and  week_of_schedule(loan_distribution.issue_date) = week_of_month(?)))
 and staff_working_schedule.working_day = ?  and area.area_code = ?
GROUP BY `loan_distribution`.`id`";

         $query = $this->db->query($sql,array($date,$working_day,$area_code));

           // echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }

        function loan_collection_schdule_txn_daily_v2($date,$working_day,$area_code){


            $sql = "select t2.*,sum(withdrawal_transaction.withdrawal_amount) withdrawal_amount from (select t.deposit_balance, t.loan_paid_amt,t.exsiting_issue_date,t.staff_society_code,t.working_day,t.id,t.issue_date,
 t.installment_type, t.number_of_istallment, t.account_number,
 t.loan_amount, t.deposit_amount , t.installment_amount , 
t.name, t.staff_name, t.mob, t.fathers_name , t.spouse_name, 
t.area_code , t.area_name , t.society_code,  t.society_name , t.collection_loan_amount, 
t.collection_deposit_amount,sum(t.txn_coll_loan) txn_coll_loan,sum(t.txn_coll_deposit) txn_coll_deposit, sum( t.txn_id ) txn_id
from (

 SELECT account.deposit_balance, loan_distribution.loan_paid_amt,loan_distribution.exsiting_issue_date, staff_working_schedule.society_code staff_society_code,staff_working_schedule.working_day,`loan_distribution`.`id`, `loan_distribution`.`issue_date`,
 `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`, `loan_distribution`.`account_number`,
 `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, 
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, 
`area`.`area_code`, `area`.`area_name`, `society`.`society_code`, `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, 
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,0 txn_coll_loan,0 txn_coll_deposit,0 txn_id 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1 
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id 
WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 )  and (loan_distribution.installment_type=0 or (loan_distribution.installment_type=1 and 
if(DAYNAME(loan_distribution.exsiting_issue_date) is null,week_of_schedule(loan_distribution.issue_date) = week_of_schedule(?),week_of_schedule(loan_distribution.exsiting_issue_date) = week_of_schedule(?)))) 
and staff_working_schedule.working_day = ? and area.area_code = ? GROUP BY `loan_distribution`.`id`

union all 

select 0 deposit_balance, 0 loan_paid_amt, 0 exsiting_issue_date,0 staff_society_code,0 working_day,loan_distribution_id id, 0 issue_date,
 0 installment_type, 0 number_of_istallment, 0 account_number,
 0 loan_amount, 0 deposit_amount , 0 installment_amount , 
0 `name`, 0 staff_name, 0 mob, 0 fathers_name , 0 spouse_name, 
0 area_code , 0 area_name , 0 society_code,  0 society_name , 0 collection_loan_amount, 
0 collection_deposit_amount,loan_transaction.collection_loan_amount txn_coll_loan,loan_transaction.collection_deposit_amount txn_coll_deposit, loan_transaction.id txn_id 
 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
where loan_transaction.collection_date = ? 
and area.area_code = ?
 ) t group by t.id ) t2 left join withdrawal_transaction on t2.id = withdrawal_transaction.loan_distribution_id and withdrawal_transaction.status=1 group by t2.id";

         $query = $this->db->query($sql,array($date,$date,$working_day,$area_code,$date,$area_code));

          //  echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }


         function loan_collection_schdule_txn_monthly($date,$area_code){


            $sql = "select if(t2.installment_type=0, DATEDIFF(DATE_FORMAT('".$date."', "%Y-%m-%01"),t2.exsiting_issue_date)/7 ,DATEDIFF(DATE_FORMAT('".$date."', "%Y-%m-%01"),t2.exsiting_issue_date)/30) num , t2.*,sum(withdrawal_transaction.withdrawal_amount) withdrawal_amount from (select t.deposit_balance, t.loan_paid_amt,t.exsiting_issue_date,t.staff_society_code,t.working_day,t.id,t.issue_date,
 t.installment_type, t.number_of_istallment, t.account_number,
 t.loan_amount, t.deposit_amount , t.installment_amount , 
t.name, t.staff_name, t.mob, t.fathers_name , t.spouse_name, 
t.area_code , t.area_name , t.society_code,  t.society_name , t.collection_loan_amount, 
t.collection_deposit_amount,sum(t.txn_coll_loan) txn_coll_loan,sum(t.txn_coll_deposit) txn_coll_deposit, sum( t.txn_id ) txn_id
from (

 SELECT account.deposit_balance, loan_distribution.loan_paid_amt,loan_distribution.exsiting_issue_date, staff_working_schedule.society_code staff_society_code,staff_working_schedule.working_day,`loan_distribution`.`id`, `loan_distribution`.`issue_date`,
 `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`, `loan_distribution`.`account_number`,
 `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, 
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, 
`area`.`area_code`, `area`.`area_name`, `society`.`society_code`, `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, 
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,0 txn_coll_loan,0 txn_coll_deposit,0 txn_id 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1 
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id 
WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 )  
 and area.area_code = ? GROUP BY `loan_distribution`.`id`

union all 

select 0 deposit_balance, 0 loan_paid_amt, 0 exsiting_issue_date,0 staff_society_code,0 working_day,loan_distribution_id id, 0 issue_date,
 0 installment_type, 0 number_of_istallment, 0 account_number,
 0 loan_amount, 0 deposit_amount , 0 installment_amount , 
0 `name`, 0 staff_name, 0 mob, 0 fathers_name , 0 spouse_name, 
0 area_code , 0 area_name , 0 society_code,  0 society_name , 0 collection_loan_amount, 
0 collection_deposit_amount,loan_transaction.collection_loan_amount txn_coll_loan,loan_transaction.collection_deposit_amount txn_coll_deposit, loan_transaction.id txn_id 
 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code`
 WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 )  and area.area_code = ?
 ) t group by t.id ) t2 left join withdrawal_transaction on t2.id = withdrawal_transaction.loan_distribution_id and withdrawal_transaction.status=1 group by t2.id";

         $query = $this->db->query($sql,array($area_code,$area_code));

          //  echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }


        function loan_collection_schdule_txn_daily_v2_backup($date,$working_day,$area_code){


           $sql = "SELECT staff_working_schedule.society_code,staff_working_schedule.working_day,`loan_distribution`.`id`, `loan_distribution`.`issue_date`,
 `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`, `loan_distribution`.`account_number`,loan_distribution.loan_paid_amt,
 `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, 
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, 
`area`.`area_code`, `area`.`area_name`, `society`.`society_code`, `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, 
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,txn.collection_loan_amount txn_coll_loan,txn.collection_deposit_amount txn_coll_deposit,txn.id txn_id 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1 
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id 
left join  (select id,loan_distribution_id,collection_loan_amount,collection_deposit_amount,collection_date,pay_date from loan_transaction where collection_date = ?) txn on txn.loan_distribution_id = loan_distribution.id
WHERE  (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 )  and (loan_distribution.installment_type=0 or (loan_distribution.installment_type=1 and week_of_schedule(loan_distribution.issue_date) = week_of_month(?))) 
and staff_working_schedule.working_day = ? and area.area_code = ? GROUP BY `loan_distribution`.`id`";

         $query = $this->db->query($sql,array($date,$date,$working_day,$area_code)); 






/*
            $sql = "SELECT staff_working_schedule.society_code,staff_working_schedule.working_day,`loan_distribution`.`id`, `loan_distribution`.`issue_date`,
 `loan_distribution`.`installment_type`, `loan_distribution`.`number_of_istallment`, `loan_distribution`.`account_number`,loan_distribution.loan_paid_amt,
 `loan_distribution`.`loan_amount`, `loan_distribution`.`deposit_amount`, `loan_distribution`.`installment_amount`, 
`users_profiles`.`name`,staff.name staff_name,users_profiles.mob, `users_profiles`.`fathers_name`, `users_profiles`.`spouse_name`, 
`area`.`area_code`, `area`.`area_name`, `society`.`society_code`, `society`.`society_name`, sum(loan_transaction.collection_loan_amount) collection_loan_amount, 
sum(loan_transaction.collection_deposit_amount) collection_deposit_amount,txn.collection_loan_amount txn_coll_loan,txn.collection_deposit_amount txn_coll_deposit,txn.id txn_id 
FROM `loan_distribution` INNER JOIN `loan_transaction` ON `loan_distribution`.`id`=`loan_transaction`.`loan_distribution_id` 
INNER JOIN `account` ON `account`.`account_number`=`loan_distribution`.`account_number` 
INNER JOIN `users_profiles` ON `users_profiles`.`user_id`=`account`.`user_id` 
INNER JOIN `society` ON `society`.`society_code`=`users_profiles`.`society_code` 
INNER JOIN `area` ON `area`.`area_code`=`society`.`area_code` 
inner join staff_working_schedule on users_profiles.society_code=staff_working_schedule.society_code and staff_working_schedule.status=1 
INNER JOIN users_profiles staff on staff_working_schedule.user_id=staff.user_id 
left join  (select id,loan_distribution_id,collection_loan_amount,collection_deposit_amount,collection_date,pay_date from loan_transaction where collection_date = ?) txn on txn.loan_distribution_id = loan_distribution.id
WHERE (`loan_distribution`.`status` = 1 or `loan_distribution`.`status` = 2 )  and (loan_distribution.installment_type=0 or (loan_distribution.installment_type=1 and 
if(DAYNAME(loan_distribution.exsiting_issue_date) is null,week_of_schedule(loan_distribution.issue_date) = week_of_month(?),week_of_schedule(loan_distribution.exsiting_issue_date) = week_of_month(?)))) 
and staff_working_schedule.working_day = ? and area.area_code = ? GROUP BY `loan_distribution`.`id`";

         $query = $this->db->query($sql,array($date,$date,$date,$working_day,$area_code));*/

          //  echo $this->db->last_query(); exit(); 
            if($query->num_rows() > 0) {
                return $query->result();
            }else{
                return false;
            }

        }


       
    


	

}