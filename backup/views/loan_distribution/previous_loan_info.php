

	<table class="table table-striped table-bordered responsive nowrap responsive_table">
						<thead>
							<tr>
								<th>Account number</th>
								<th>Issue date</th>
								<th>Loan amount</th>
								<th>Installment type</th>
								<th>Installment amount</th>
								<td>Remark</td>
							</tr>
						</thead>
						<tbody>

							<?php
							if($previous_loan){
							 foreach( $previous_loan as $d){?>
							
								<tr>
							 	<td><?php echo $d->account_number; ?></td>
							 	<td><?php echo date('d-F-Y',strtotime($d->issue_date)) ; ?></td>
							 	<td><?php echo $d->loan_amount; ?></td>
							 	<td><?php echo OOP::getInstallmentType($d->installment_type); ?></td>
							 	<td><?php echo $d->installment_amount; ?></td>
							 	<td><?php echo $d->remark; ?></td>
							 </tr>

							<?php }} ?>
							
						</tbody>
					</table>