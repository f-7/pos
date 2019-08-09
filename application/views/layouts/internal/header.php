<header class="main-header">
        <!-- Logo -->
        <a href="" class="logo" >
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UTC</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"  > <img class="img-circle" src="<?= $this->template->Images()?>utc-logo.png"  style=" height: 50px;background: white;"/></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          
         
              <div class='col-md-6' style="margin-top:8px; font-size:22px; color:white">  
			  <?php //echo $this->session->userdata('ins_name')."( ".$this->session->userdata('username')." )";?>
			   United trade and commerce  
			  </div>
        
         
          <div class="navbar-custom-menu">

            <div class="pull-right top10">
             <a class="btn btn-default btn-flat headerLogout" href="<?=site_url()?>auth/logout">Sign out</a>
            </div>
          </div>
        </nav>
 </header>
 
 
  <!---global baseic all value assaigne -->
  
<script>
var base_url="<?=base_url()?>";

$(document).on("click",".navbar-static-top",function(){navMenuHideShow();});

 
 </script> 
 
<nav class="navbar navbar-default option_hide" id="responsive_nave">
  <div class="container-fluid">    
    <ul class="nav navbar-nav">
      
      <li><a href="<?= site_url() ?>">Dashboard</a></li>
      <li><a href="<?= site_url() ?>account-information/inactive-account-list">Deactivated Account List</a></li>	    
	  <li><a href="<?= site_url() ?>user-information/inactive-user-list">Inactive User List</a></li>
	  <li><a href="<?= site_url() ?>staff-information/index">Staff List</a></li>
	  <li><a href="<?= site_url() ?>special-information/">Mail send </a></li>
	  <li><a href="<?= site_url() ?>special-information/database-backup/">Database Backup</a></li>
    </ul>
  </div>
</nav>
 
 
 
 
 
 
 