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
    <link rel="shortcut icon"  href="<?= $this->template->Images()?>favicon.png" />
   
    <title><?php echo $template['title']; ?></title>
    
    <link href="//fonts.googleapis.com/css?family=Open+Sans:700,300,600,400" rel="stylesheet" type="text/css">
    <link href="<?= $this->template->Fonts()?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= $this->template->Css()?>all-skins.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?= $this->template->Css()?>bootstrap.css" rel="stylesheet">
    <link href="<?= $this->template->Css()?>AdminLTE.min.css" rel="stylesheet">
    <link href="<?= $this->template->Css()?>jquery-ui.min.css" rel="stylesheet">
    
	<link href="<?= $this->template->Css()?>micro_pos_system.css" rel="stylesheet">



    
    <?=(isset($template['metadata_css']))? $template['metadata_css']: '';?>
    <!-- jQuery -->
    <script src="<?= $this->template->Js()?>jquery-1.11.3.min.js"></script>
    <script src="<?= $this->template->Js()?>jquery-ui.min.js"></script>
	<script src="<?= $this->template->Js()?>bootstrap.min.js"></script>
    
	
<!---  just datatables --->	
<link href="<?= $this->template->Css()?>dataTables.bootstrap.css" rel="stylesheet">
<link href="<?= $this->template->Css()?>editor.dataTables.min.css" rel="stylesheet">
<link href="<?= $this->template->Css()?>buttons.dataTables.min.css" rel="stylesheet">
<link href="<?= $this->template->Css()?>select.dataTables.min.css" rel="stylesheet"> 

 
<script src="<?= $this->template->Js()?>jquery.dataTables.min.js"></script>
<script src="<?= $this->template->Js()?>dataTables.bootstrap.min.js"></script> 
<script src="<?= $this->template->Js()?>dataTables.buttons.min.js"></script>
<script src="<?= $this->template->Js()?>dataTables.select.min.js"></script> 
 
 
<script src="<?= $this->template->Js()?>frz_jquery.js"></script> 

  <link href="<?= $this->template->Css()?>jquery.confirm.css" rel="stylesheet">
    <script src="<?= $this->template->Js()?>jquery.confirm.js"></script>
  <script type="text/javascript" src="<?= $this->template->Js()?>webcam/webcam.js"></script>
  <script type="text/javascript" src="<?= $this->template->Js()?>web_cam_script.js"></script>
  
  
    <!-- Custom CSS -->
    <style>
            .error p{ color: red;}
    </style>
   
    <!-- Custom CSS -->
   
    <?=(isset($template['metadata_js']))? $template['metadata_js']: '';?>
   
</head>
<body class="skin-blue sidebar-mini">
<!-- Content Wrapper. Contains page content -->

<?php $this->view('layouts/internal/header');?>
<?php $this->view('layouts/internal/left_side');?>
      
        <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$title;?>
            <!-- <small>Version 2.0</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?=$treeview;?></a></li>
            <li class="active"><?=$treeview_menu;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
      
                  <!--                    dynamic content-->
                    <?=(isset($template['body']))?$template['body']: ''; ?>
                    <!--                    end dynamic content-->
        </section>

    </div><!-- /end content -->
<?php $this->view('layouts/internal/footer');?>

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

 <?php 
 require_once('modal.php');  
 
 ?>

 <link href="<?= $this->template->Css()?>loaders.css" rel="stylesheet">
 
 </body>

</html>
