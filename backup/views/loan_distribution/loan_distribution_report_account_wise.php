<style type="text/css">
	h3{font-size: 10px;}
	td{font-size: 10px;}
	th{font-size: 10px;}
</style>

<html>

<body>
		<h3>Loan application form of <?php echo strtoupper($account_info->name); ?></h3>

		<table >
			<tr>
				<td>Loan Issue date</td>
				<td><?php echo date('d-M-Y',strtotime( $account_info->issue_date));?> </td>
				<td>Account no</td>
				<td>AC<?php echo $account_info->account_number;?></td>
			</tr>
			<tr>
				<td>Area name</td>
				<td><?php echo $account_info->area_name;?> </td>
				<td>Society name</td>
				<td><?php echo $account_info->society_name;?></td>
			</tr>
			
		</table>

		<?php if($invoice){ $i=1;  ?>

		<h3>Loan Informaion</h3>

		<table class="loan_transaction" cellpadding="0" cellspacing="0" >
			<tr>
				<th>Sl</th>
				<th>Serial no</th>
				<th>Details</th>
				<th>Price</th>
			</tr>
			
			<?php 
					foreach ($invoice as $key => $value) {   ?>


					<tr>
						<td><?php echo $i++;?></td>
						<td><?php echo $value->serial_no;?></td>
						<td class="txt-left"><?php echo $value->brand_name ." ".$value->product_name." ";?></td>
						<td class="txt-right"><?php echo $value->unit_price;?></td>
					</tr>

						
				<?php 	}
				?>
			<tr>
				<td></td>
				<td></td>
				<td class="txt-right">Discount </td>
				<td class="txt-right"><?php echo $invoice[0]->discount_amount?></td>				
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td class="txt-right">Cash paid </td>
				<td class="txt-right"><?php echo $invoice[0]->paid_amount?></td>				
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td class="txt-right">Due amount</td>
				<td class="txt-right"><?php echo $invoice[0]->total_amount - $invoice[0]->paid_amount - $invoice[0]->discount_amount ;?></td>				
			</tr>

			
			
		</table>


		<table style="margin-top: 40px;">
			<tr>
				
				<td>Member's signature</td>
				<td></td>
				<td>Guarantor signature</td>
				<td></td>
				
			</tr>
		</table>

		<?php } ?>


		<h3>Approval Informaion</h3>

		<table >
			<tr>
				<td>Total amount of loan</td>
				<td><?php echo $account_info->loan_amount;?> </td>
				<td>Installment duration</td>
				<td><?php echo $account_info->number_of_istallment ." ".OOP::installmentTypeForstrtotime($account_info->installment_type) ;?></td>
			</tr>
			<tr>
				<td>Installement type</td>
				<td> <?php echo OOP::getInstallmentType($account_info->installment_type);?></td>
				<td>Number of installement</td>
				<td><?php echo $account_info->number_of_istallment;?></td>
			</tr>
			<tr>
				<td>Amount of installation</td>
				<td><?php echo $account_info->installment_amount;?> </td>
				<td>Amount of deposit</td>
				<td><?php echo $account_info->deposit_amount;?></td>
			</tr>
			<tr>
				<td>Area name</td>
				<td><?php echo $account_info->area_name;?> </td>
				<td>Society name</td>
				<td><?php echo $account_info->society_name;?></td>
			</tr>			
			
		</table>


		<h3>Schedule date</h3>

		<table class="loan_transaction"  cellpadding="0" cellspacing="0">
			<tr>
				<th>Sl</th>
				<th>Schedule date</th>
				<th>Collection date</th>
				<th>Loan collection <br> (<?php echo $account_info->installment_amount;?>)</th>
				<th>Deposit collection <br>(<?php echo $account_info->deposit_amount;?>)</th>
				<th>Signature</th>
			</tr>

			<?php
				$i = 0; 


				//$schedule_date = OOP::installmentDateList( $account_info->issue_date,$account_info->installment_type,$pay_day,$num_of_installment);
			 foreach( $loan_transaction as $d){
			 		$i++;
			 	?>
			<tr>
				<td><?php echo $i;?></td>
				<td> <?php echo date('d-M-Y (D)',strtotime($d->collection_date));?></td>	
				<td> <?php echo strlen($d->pay_date > 5)? date('d-M-Y (D)',strtotime($d->pay_date)):"";?></td>	
				<td> <?php echo $d->collection_loan_amount<1 ? "" : $d->collection_loan_amount ;?></td>		                    		
		     	<td> <?php echo $d->collection_deposit_amount <1 ? "" : $d->collection_deposit_amount;?></td>
		     	<td></td>
			</tr>	

			<?php } ;?>				
			
		</table>

		<table style="margin-top: 40px;">
			<tr>
				
				<td>Area officers signature</td>
				<td>Managers signature</td>
				<td>Managing directors signature</td>
				
				
			</tr>
		</table>


		<?php if($withdrawl){ ?>


		<h3>Withdrawal transaction</h3>

		<table class="loan_transaction"  cellpadding="0" cellspacing="0">
			<tr>
				<th>Sl</th>
				<th>Withdrawal date</th>
				<th>Deposit balance</th>
				<th>Withdrawal amount</th>
				
				
			</tr>

			<?php
				$i = 0; 


				//$schedule_date = OOP::installmentDateList( $account_info->issue_date,$account_info->installment_type,$pay_day,$num_of_installment);
				//withdrawal_date prv_amount withdrawal_amount
			 foreach( $withdrawl as $d){
			 		$i++;
			 	?>
			<tr>
				<td><?php echo $i;?></td>
				<td> <?php echo date('d-M-Y (D)',strtotime($d->withdrawal_date));?></td>	
				<td> <?php echo $d->prv_amount;?></td>	
				<td> <?php echo $d->withdrawal_amount; ?></td>		                    		
		     	
		     	
			</tr>	

			<?php } ;?>				
			
		</table>

		<table style="margin-top: 40px;">
			<tr>
				
				<td>Area officers signature</td>
				<td>Managers signature</td>
				<td>Managing directors signature</td>
				
				
			</tr>
		</table>


		<?php  }?>

<style type="text/css">
	
	table{width: 100%; }
	td{padding: 0px 10px 0px 10px;}
	th{padding: 0px 10px 0px 10px;}
	h3{text-align: center;text-decoration: underline;}
	.loan_transaction{border: 1px solid;}
	.loan_transaction td{border: 1px solid; text-align: center;}
	.loan_transaction th{border: 1px solid; text-align: center;}
	td.txt-right{text-align: right;}
	td.txt-left{text-align: left;}
</style>

</body>
</html>