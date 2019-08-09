<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('documents/photo/') ?><?=($this->session->userdata('member_photo'))?$this->session->userdata('member_photo'):'default.png'?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= " " . $this->session->userdata('username'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
         <!--   <li class="header">MAIN NAVIGATION</li> -->
       
            
                <li <?= $treeview_menu == 'Name & Age Correction' ? "class='active'" : ""; ?> >
					
					  <a href="<?= site_url() ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                    </a>
					
				</li>
              
              <?php if(OOP::isAdmin()){?>

			  <li class="treeview <?= $treeview == 'Setting' ? "active" : ""; ?>">
                    <a href="#">
                        <i class="fa fa-gears"></i> <span>Account Setting</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $treeview_menu == 'Address Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>setting/address-info"><i class="fa fa-laptop"></i>Address Information</a></li>
                        <li <?= $treeview_menu == 'Area Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>setting/area-info"><i class="fa fa-laptop"></i> Area Information</a></li>
						<li <?= $treeview_menu == 'Society Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>setting/society-info"><i class="fa fa-laptop"></i> Society Information</a></li>
						 
                    </ul>
                </li>
				
				 <li class="treeview <?= $treeview == 'Product Setting' ? "active" : ""; ?>">
                    <a href="#">
                        <i class="fa fa-gears"></i> <span>Product Setting</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $treeview_menu == 'Category Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>setting/product-category-info"><i class="fa fa-laptop"></i> Category Information</a></li>
						<li <?= $treeview_menu == 'Brand Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>setting/brand-info"><i class="fa fa-laptop"></i> Brand Information</a></li>
						<li <?= $treeview_menu == 'Product Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>setting/product-name-info"><i class="fa fa-laptop"></i> Product Information</a></li>
                    </ul>
                </li>

                 <?php } ?>
				
				
			  <li class="treeview <?= $treeview == 'Stock' ? "active" : ""; ?>">
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Stock Information</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $treeview_menu == 'Stock Information' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>stock/stock-info"><i class="fa fa-laptop"></i>Product Receive</a></li>
						<li <?= $treeview_menu == 'Product List' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>stock/product-list"><i class="fa fa-laptop"></i>Product List</a></li>
                        <li <?= $treeview_menu == 'Product Serial Number' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>stock/get-product-serial-number"><i class="fa fa-laptop"></i>Product Serial Number</a></li>
						<li <?= $treeview_menu == 'Stock status' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>stock/get-stock-status"><i class="fa fa-laptop"></i>Stock status</a></li>
                    </ul>
                </li>
			  <li class="treeview <?= $treeview == 'Account' ? "active" : ""; ?>">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i> <span>Account Information</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $treeview_menu == 'Account Create' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>account-information/index"><i class="fa fa-laptop"></i>Account Create</a></li>
                        <li <?= $treeview_menu == 'Account List' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>account-information/account-list"><i class="fa fa-laptop"></i> Activated Account List</a></li>
							<?php if(OOP::currrent_user_type()==1){?>
						<li <?= $treeview_menu == 'Inactive Account List' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>account-information/inactive-account-list"><i class="fa fa-laptop"></i>Deactivated Account List</a></li>
						 <li <?= $treeview_menu == 'ID Card Print' ? "class='active'" : ""; ?> ><a href="<?=base_url('account-information/id-card-list')?>"><i class="fa fa-laptop"></i>All ID Card </a></li>
							<?php } ?>
                    </ul>
                </li>
				<!-------------------------------------------------------------- Monir----------------------------------------------------------- -->


                     <li class="treeview <?= $treeview == 'Loan distribution' ? "active" : ""; ?>">
                        <a href="#">
                            <i class="fa fa-institution"></i> <span>Loan Activities</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $treeview_menu == 'Exsisting Loan distribution' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/loan"><i class="fa fa-laptop"></i>Exsisting Loan distribution</a></li>
                            <li <?= $treeview_menu == 'Loan distribution' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution"><i class="fa fa-laptop"></i> Distribute a loan</a></li>

                             <li <?= $treeview_menu == 'Only depositor list' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/depositor-list"><i class="fa fa-laptop"></i>Only depositor list</a></li>

                             <li <?= $treeview_menu == 'Completed loan distribution list' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/completed-loan-list"><i class="fa fa-laptop"></i>Completed loan list</a></li>
                             <li <?= $treeview_menu == 'Archive of Loan distribution' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/archive-loan-list"><i class="fa fa-laptop"></i>Archive of Loan distribution </a></li>

                            <li <?= $treeview_menu == 'Approved loan distribution list' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/approved-loan-list"><i class="fa fa-laptop"></i>Approved loan distribution</a></li>
                            <li <?= $treeview_menu == 'Pending loan distribution list' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/pending-loan-list"><i class="fa fa-laptop"></i>Pending loan distribution list</a></li>

                             
                             <li <?= $treeview_menu == 'Loan collection list' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/loan-collection"><i class="fa fa-laptop"></i>Loan collection entry </a></li>

                         <!--    <li <?//= $treeview_menu == 'Loan collection report' ? "class='active'" : ""; ?> ><a href="<?//= site_url() ?>loan-distribution/loan-collection-report"><i class="fa fa-laptop"></i>Loan collection Schedule </a></li> -->
                            
                        </ul>
                    </li>


                    <li class="treeview <?= $treeview == 'sell' ? "active" : ""; ?>">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span>Cash Product sell</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $treeview_menu == 'Create invoice' ? "class='active'" : ""; ?> ><a href="<?= site_url('sell') ?>"><i class="fa fa-laptop"></i>Create invoice</a></li>
                            <li <?= $treeview_menu == 'Invoice list view' ? "class='active'" : ""; ?> ><a href="<?= site_url('sell/invoice-list') ?>"><i class="fa fa-laptop"></i>Invoice list</a></li>
                           
                            
                        </ul>
                    </li>

                     <li class="treeview <?= $treeview == 'withdrawal' ? "active" : ""; ?>">
                        <a href="#">
                            <i class="fa fa-cubes"></i> <span>Withdrawal</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $treeview_menu == 'withdrawal amount' ? "class='active'" : ""; ?> ><a href="<?= site_url('withdrawal') ?>"><i class="fa fa-laptop"></i>Deposits withdrawal</a></li>
                            <li <?= $treeview_menu == 'withdrawal list' ? "class='active'" : ""; ?> ><a href="<?= site_url('withdrawal/withdrawal-list') ?>"><i class="fa fa-laptop"></i>Deposits withdrawal list</a></li>
                           
                            
                        </ul>
                    </li>

                <!-------------------------------------------------------------- Monir----------------------------------------------------------- -->
				
				<li class="treeview <?= $treeview == 'Staff' ? "active" : ""; ?>">
                    <a href="#">
                        <i class="fa fa-group"></i> <span>Staff Information</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $treeview_menu == 'Staff List' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>staff-information/index"><i class="fa fa-laptop"></i>Staff List</a></li>
                       
                    </ul>
                </li>
				 
			 

 
		<li class="treeview <?= $treeview == 'Users' ? "active" : ""; ?>">
				<a href="#">
					<i class="fa fa-user"></i> <span>Users Info</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li <?= $treeview_menu == 'User List' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>user-information/user-list"><i class="fa fa-laptop"></i>User List</a></li>
					<li <?= $treeview_menu == 'User Create' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>user-information/index"><i class="fa fa-laptop"></i>User Create</a></li>
					<?php if(OOP::currrent_user_type()==1){?>
					<li <?= $treeview_menu == 'Inactive User List' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>user-information/inactive-user-list"><i class="fa fa-laptop"></i>Inactive User List</a></li>
					<?php } ?>
					<li ><a href="<?= site_url() ?>auth/logout"><i class="fa fa-power-off"></i>Logout</a></li>
				</ul>
		</li>


         <li class="treeview <?= $treeview == 'All Report' ? "active" : ""; ?>">
                    <a href="#">
                        <i class="fa fa-clipboard"></i> <span>All Report</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?= $treeview_menu == 'Account Report' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/account-information"><i class="fa fa-laptop"></i>Account Information</a></li>
                        <li <?= $treeview_menu == 'Product Check' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/product-check"><i class="fa fa-laptop"></i>Product Check</a></li>
                        <li <?= $treeview_menu == 'Stock Status' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/stock-information"><i class="fa fa-laptop"></i>Stock Information</a></li>
                        <li <?= $treeview_menu == 'Staff Distribution' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/staff-distribution"><i class="fa fa-laptop"></i>Staff Distribution</a></li>                        
                        <li <?= $treeview_menu == 'Staff Distribution History' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/staff-distribution-history"><i class="fa fa-laptop"></i>Staff Distribution History</a></li>
                        <li <?= $treeview_menu == 'Monthly report' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/monthly-report"><i class="fa fa-laptop"></i>Loan schedule & monthly report</a></li>
                        <li <?= $treeview_menu == 'Area wise loan distribution' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>all-report/loan-distribution-report"><i class="fa fa-laptop"></i>Area wise loan distribution</a></li>
                        <li <?= $treeview_menu == 'Loan distribution report' ? "class='active'" : ""; ?> ><a href="<?= site_url() ?>loan-distribution/loan-distribution-report"><i class="fa fa-laptop"></i>Loan distribution report </a></li>
                        
                    </ul>
                </li>
	
	
	<li class="treeview <?= $treeview == 'Special' ? "active" : ""; ?>">
				<a href="#">
					<i class="fa  fa-file-text"></i> <span>Special feature</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
				 
					<li <?= $treeview_menu == 'Email sending' ? "class='active'" : ""; ?> >
					  <a href="<?= site_url() ?>special-information/"><i class="fa fa-laptop"></i> Send Email</a>
					</li>
					 <li <?= $treeview_menu == 'Database Backup' ? "class='active'" : ""; ?> >
					  <a href="<?= site_url() ?>special-information/database-backup/"><i class="fa fa-laptop"></i> Database Backup</a>
					</li>
					 
				</ul>
		</li>
	
  
	<li class="treeview <?= $treeview == 'Website' ? "active" : ""; ?>">
				<a href="#">
					<i class="fa fa-globe"></i> <span>Website feature</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
				 
					<li <?= $treeview_menu == 'Slider information' ? "class='active'" : ""; ?> >
					  <a href="<?= site_url() ?>Web-application/"><i class="fa fa-laptop"></i> Slider info</a>
					</li>
					 <li <?= $treeview_menu == 'Product information' ? "class='active'" : ""; ?> >
					  <a href="<?= site_url() ?>Web-application/product-upload/"><i class="fa fa-laptop"></i> Product info</a>
					</li>
					
					
					<li <?= $treeview_menu == 'Slider list' ? "class='active'" : ""; ?> >
					  <a href="<?= site_url() ?>Web-application/slider-list"><i class="fa fa-laptop"></i> All slider list</a>
					</li>
					
					
						<li <?= $treeview_menu == 'Product list' ? "class='active'" : ""; ?> >
					  <a href="<?= site_url() ?>Web-application/product-list"><i class="fa fa-laptop"></i> All Product list </a>
					</li>
					 
				</ul>
		</li>
  
  
  
  

            <!--
            <li <?= $treeview == 'Widgets' ? "class='active'" : ""; ?>>
              <a href="#">
                <i class="fa fa-th"></i> <span>Widgets</span> 
              </a>
            </li>
            
            -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>