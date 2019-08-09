<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="<?=(isset($metadata_description))? $metadata_description: '';?>">
    <meta name="keywords" content="<?=(isset($metadata_keyword))? $metadata_keyword: '';?>">
    <link rel="icon" type="image/gif" href="<?= $this->template->Images()?>icon.ico" />
    <title><?php echo $template['title']; ?></title>
    <link href="<?= $this->template->Css()?>loaders.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:700,300,600,400" rel="stylesheet" type="text/css">
    <link href="<?= $this->template->Fonts()?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $this->template->Css()?>all-skins.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->template->Css()?>bootstrap.css" rel="stylesheet">
    <link href="<?= $this->template->Css()?>AdminLTE.min.css" rel="stylesheet">
    <link href="<?= $this->template->Css()?>custom.css" rel="stylesheet">
    


    
    <?=(isset($template['metadata_css']))? $template['metadata_css']: '';?>
    <!-- jQuery -->
    <script src="<?= $this->template->Js()?>jquery-1.11.3.min.js"></script>
    <script src="<?= $this->template->Js()?>jquery-ui.min.js"></script>
    

    
    <!-- Custom CSS -->
    <style>
            .error p{ color: red;}
			.img-circle{flote:left;margin:17px 17px 0px 0px; float: left;}
    </style>
   
    <!-- Custom CSS -->
   
    <?=(isset($template['metadata_js']))? $template['metadata_js']: '';?>
   
</head>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
			<div class="user-panel">
					<div class="pull-left image">
					<img class="img-circle" alt="User Image" src="http://dhakaeducationboard.gov.bd/assets/custom/img/logo.png">
					<div  class="navbar-brand"><b>মাধ্যমিক ও উচ্চমাধ্যমিক শিক্ষা বোর্ড, ঢাকা</b><br>Board of Intermediate and Secondary Education, Dhaka</div>
					</div>
					
			</div>
             
            </div>

            
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          

          <!-- Main content -->
		  <section class="content">
			<?=(isset($template['body']))?$template['body']: ''; ?>
		  </section><!-- /.content -->
          
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="">Dhaka education board</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->




<div id="loader-holder" class="loader-holder">
    <div class="loader">
        <div class="loader-inner ball-clip-rotate-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

 <script src="<?= $this->template->Js()?>app.js"></script>
</body>

</html>
