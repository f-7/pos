 
  
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
			<div class="box-header with-border">
					<h3 class="box-title"> <b class="red_color">Area wise </b> active account list </h3>
					<div class="box-tools pull-right">
						<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
					</div>
			</div> 

			
			<div class="box-body">
				<div class="row">
				 <div class="col-md-12">  
				 
				 
		<ul class="list-group">
			<?php foreach($data_list as $key){ ?>
				<li class="list-group-item account_list_li">
				<a href="<?=base_url('account_information/area_wise_account_list/?area_code='.$key->area_code)?>" target="_blank">
				<?=$key->area_name?>
				</br> 
				<b>Total Account (<?=$key->total_account?>)</b>
				</a>
				
				</li>
			<?php } ?>
</ul>
				 
				 
				 </div>
				
				</div> 
			</div> 


			<div class="box-footer"> <!---box footer ---> </div>
</div>


	

  